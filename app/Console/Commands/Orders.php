<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class Orders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminar ordenes que tienen mas de 10 minutos sin pagar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $hora = now()->subMinute(10);

        $orders = Order::where('status', 1)->whereTime('created_at', '<=', $hora)->get();

        foreach ($orders as $order) {

            $items = json_decode($order->content);

            foreach ($items as $item) {
                increase($item);
            }

            $order->status = 5;

            $order->save();
        }
    }
}
