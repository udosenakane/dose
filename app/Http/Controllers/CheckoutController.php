<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getCheckout()
    {
        $oldCart = session()->has('cart')? session('cart'): null;
        $cart = new Cart($oldCart);

        return view('checkout', ['cart' => $cart]);
    }
}
