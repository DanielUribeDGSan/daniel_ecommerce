<?php

namespace App\Http\Controllers;

use App\Mail\OrdenPagada;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function pagoExitoso(Order $orden, Request $request)
    {
        $this->authorize('payment', $orden);
        $this->authorize('author', $orden);

        if ($request->get('payment_id')) {
            $payment_id = $request->get('payment_id');

            $reponse = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=APP_USR-7260790674054640-081218-df6bacdd5688965f92aca54c2782d7ef-806649757");
            $reponse = json_decode($reponse);
            $status = $reponse->status;
            if ($status == 'approved') {
                $items = json_decode($orden->content);

                if ($orden->status != 2) {
                    $orden->status = 2;
                    $orden->save();
                    $user = User::where('email', Auth::user()->email)->first();
                    Mail::to($orden->email)->send(new OrdenPagada($user, $orden, $items));
                }
                return view('payment.pago-exitoso-page', compact('orden', 'items'));
            } else {
                return redirect()->route('pagoCancelado', $orden);
            }
        }
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
