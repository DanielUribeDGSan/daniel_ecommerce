<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/webhooks', function (Request $request) {
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
});
