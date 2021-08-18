<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function pagoExitoso(Order $orden, Request $request)
    {
        $this->authorize('author', $orden);

        if ($request->get('payment_id')) {
            $payment_id = $request->get('payment_id');
            $token = config('services.mercadopago.token');
            $reponse = Http::get('https://api.mercadopago.com/v1/payments/' . $payment_id . '?access_token=' . $token);
            $reponse = json_decode($reponse);
            $status = $reponse->status;
            if ($status == 'approved') {
                $orden->status = 2;
                $orden->save();
            }
        }
        $items = json_decode($orden->content);
        return view('payment.pago-exitoso-page', compact('orden', 'items'));
    }

    public function pagoPendiente(Order $orden)
    {
        $this->authorize('author', $orden);

        $items = json_decode($orden->content);
        return view('payment.pago-pendiente-page', compact('orden', 'items'));
    }

    public function pagoCancelado(Order $orden)
    {
        $this->authorize('author', $orden);

        $items = json_decode($orden->content);
        return view('payment.pago-cancelado-page', compact('orden', 'items'));
    }
}
