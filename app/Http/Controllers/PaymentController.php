<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pagoExitoso(Order $orden)
    {
        $items = json_decode($orden->content);
        return view('payment.pago-exitoso-page', compact('orden', 'items'));
    }

    public function pagoPendiente(Order $orden)
    {
        $items = json_decode($orden->content);
        return view('payment.pago-pendiente-page', compact('orden', 'items'));
    }

    public function pagoCancelado(Order $orden)
    {
        $items = json_decode($orden->content);
        return view('payment.pago-cancelado-page', compact('orden', 'items'));
    }
}
