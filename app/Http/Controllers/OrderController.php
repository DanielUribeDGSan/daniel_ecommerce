<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        return view('ordenes.orden-page');
    }

    public function orderPayment(Order $orden)
    {
        $this->authorize('author', $orden);
        $this->authorize('payment', $orden);

        $items = json_decode($orden->content);
        return view('ordenes.orden-payment-page', compact('orden', 'items'));
    }

    public function viewOrder(Order $orden)
    {
        $this->authorize('author', $orden);

        $items = json_decode($orden->content);
        return view('ordenes.view-orden-page', compact('orden', 'items'));
    }

    public function ordenes()
    {
        $ordenes = Order::all();
        return view('ordenes.view-ordenes-page', compact('ordenes'));
    }
}
