<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebhooksController extends Controller
{
    public function webhooks(Request $request)
    {
        if ($request->get('payment_id')) {
            $payment_id = $request->get('payment_id');
            $token = config('services.mercadopago.token');
            $reponse = Http::get('https://api.mercadopago.com/v1/payments/' . $payment_id . '?access_token=' . $token);
            $reponse = json_decode($reponse);
            $status = $reponse->status;

            dd($reponse);
            if ($status == 'approved') {
                // $orden->status = 2;
                // $orden->save();
            }
        }
    }
}
