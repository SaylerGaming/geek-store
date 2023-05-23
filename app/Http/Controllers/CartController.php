<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\models\{
    Product,
    Cart,
    Order,
};
use Auth;

class CartController extends Controller
{

    public function __construct() { 
        if(!session('cart')){
            session(['cart' => []]);
        }
    }

    public function cart(){
        $cart = session('cart');
        $products = Product::whereIn('id', $cart)->get();
        $sum = $products->pluck('price')->sum();
        return view('cart', compact('products', 'sum'));
    }

    public function add($id){
        $cart = session('cart');
        if(!in_array($id, $cart)) array_push($cart, $id);
        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function remove($id){
        $cart = session('cart');
        $cart = array_diff($cart, [$id]);
        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function buy(Request $request){
        $cart = session('cart');
        $products = Product::whereIn('id', $cart)->get();
        $sum = $products->pluck('price')->sum();
        $cart = Cart::create([
            'user_id' => Auth::id(),
            'price' => $sum,
            'status' => 'Оплачено'
        ]);
        foreach ($products as $product) {
            Order::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }
        return redirect('/orders');
    }
}
