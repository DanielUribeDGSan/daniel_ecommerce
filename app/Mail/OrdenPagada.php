<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrdenPagada extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $orden, $user, $items = [];

    public function __construct(User $user, Order $orden, $items)
    {
        $this->user = $user;
        $this->orden = $orden;
        $this->items = $items;
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
