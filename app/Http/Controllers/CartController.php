<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function index(){
        $oldCart = session()->has('cart')? session('cart'): null;
        $cart = new Cart($oldCart);

        return view('cart', ['cart' => $cart]);
    }
    
    public function store($id){
        $product = Product::find($id);
        $oldCart = session()->has('cart') ? session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addItem($product);

        session()->put('cart', $cart);
        return response()->json($cart);
    }

    public function decrement($id){
        $product = Product::find($id);
        $oldCart = session()->has('cart') ? session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->decrementItem($product);

        session()->put('cart', $cart);
        return response()->json($cart);
    }

    public function destroy($id){
        $product = Product::find($id);
        $oldCart = session()->has('cart') ? session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deleteItem($product);

        session()->put('cart', $cart);
        return response()->json($cart);
    }
}
