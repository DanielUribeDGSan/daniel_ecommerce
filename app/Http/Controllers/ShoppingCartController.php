<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function carrito()
    {
        return view('cart.cart-page');
    }
}
