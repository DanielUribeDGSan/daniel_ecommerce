<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        return view('orden.orden-page');
    }

    public function orderPayment(Order $orden)
    {
        $items = json_decode($orden->content);
        return view('orden.orden-payment-page', compact('orden', 'items'));
    }
}
