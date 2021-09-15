<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrdenEnviada extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order, $user;

    public function __construct(User $user, Order $orden)
    {
        $this->user = $user;
        $this->orden = $orden;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.orden-pagada')->from('daniel.uribe.garcia07@gmail.com', 'Kasa Shop Orden Pagada')
            ->subject('Tu compra se ha realizado con éxito');
    }
}
