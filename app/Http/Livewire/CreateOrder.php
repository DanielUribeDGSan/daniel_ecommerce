<?php

namespace App\Http\Livewire;

use App\Models\Locality;
use App\Models\Municipality;
use App\Models\Order;
use App\Models\State;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class CreateOrder extends Component
{
    protected $listeners = ['render'];

    public $contact, $codePostal, $address, $reference, $phone, $email, $note, $costo = 200;
    public $states, $municipalities = [], $localities = [];

    public $state_id = "", $municipality_id = "", $locality_id = "";
    public $validate = false;

    public $rules = [
        'contact' => 'required',
        'state_id' => 'required',
        'municipality_id' => 'required',
        'locality_id' => 'required',
        'codePostal' => 'required',
        'address' => 'required',
        'reference' => 'required',
        'phone' => 'required',
        'email' => 'required',
    ];

    public function mount()
    {
        $this->states = State::all();
    }

    public function updatedStateId($value)
    {
        $this->municipalities = Municipality::where('estado_id', $value)->get();
        $this->reset(['municipality_id', 'locality_id']);
    }

    public function updatedMunicipalityId($value)
    {
        $this->localities = Locality::where('municipio_id', $value)->get();
        $this->reset('locality_id');
    }

    public function create_order()
    {
        if (FacadesCart::subtotal() > 2000) {
            $this->costo = 0;
        }
        $this->validate = true;
        $this->emit('select');
        $this->validate($this->rules);
        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->code_postal = $this->codePostal;
        $order->phone = $this->phone;
        $order->email = $this->email;
        $order->note = $this->note;
        $order->envio_type = 1;
        $order->shipping_cost = $this->costo;
        $order->total = $this->costo + FacadesCart::subtotal();
        $order->content = FacadesCart::content();
        $order->state_id = $this->state_id;
        $order->municipality_id = $this->municipality_id;
        $order->locality_id = $this->locality_id;
        $order->address = $this->address;
        $order->referencia = $this->reference;
        $order->save();
        foreach (FacadesCart::content() as $item) {
            discount($item);
        }
        FacadesCart::destroy();
        return redirect()->route('orderPayment', $order);
    }

    public function render()
    {
        $this->emit('select');
        return view('livewire.create-order');
    }
}
