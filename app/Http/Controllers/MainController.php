<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\{
    Category,
    Subcategory,
    User,
    Product
};

use Auth;

use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $products = Product::where('is_available', 1)->where('is_prioritised', 0)->inRandomOrder()->limit(6)->get();
        $choises = Product::where('is_available', 1)->where('is_prioritised', 1)->inRandomOrder()->limit(2)->get();
        return view('index', compact('products', 'choises'));
    }

    public function categories(){
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function category($id){
        $category = Category::with('subcategories')->find($id);
        return view('category', compact('category'));
    }

    public function subcategory($id){
        $subcategory = Subcategory::with('products')->find($id);
        return view('subcategory', compact('subcategory'));
    }

    public function product(Product $product){
        return view('product_details', compact('product'));
    }

    public function favorite($id){
        $product = Product::find($id);
        if($product->users->pluck('id')->contains(Auth::id())) {
            DB::delete('delete from product_user where user_id=? and product_id=?', [Auth::id(), $id]);
        } else {
            DB::insert('insert into product_user (id, user_id, product_id) values (NULL, ?, ?)', [Auth::id(), $id]);
        }
        return redirect()->back();
    }

    public function favorites(){
        $user = Auth::user();
        return view('favorites', compact('user'));
    }

    public function search(Request $request){
        $query = $request->name;
        $products = product::where('name', 'LIKE', '%'.$query.'%')->get();
        return view('find', compact('products', 'query'));
    }
}
