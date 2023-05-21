<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\models\{
    Product,
};
use Auth;

class CartController extends Controller
{
    public function cart(){
        $cart = session('cart');
        dd($cart);
        $products = Product::whereIn('id', $cart)->get();
        return view('cart', compact('products'));
    }

    public function add($id){
        if(!session('cart')){
            session(['cart' => []]);
        }
        $cart = session('cart');
        array_push($cart, $id);
        session(['cart' => $cart]);
        return redirect()->back();
    }
}
