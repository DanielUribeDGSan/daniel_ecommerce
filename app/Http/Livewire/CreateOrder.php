<?php

namespace App\Http\Livewire;

use App\Models\Address;
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
    public $states, $municipalities =  [], $localities = [];

    public $direcciones = [], $direccion_select = "";

    public $state_id = "", $municipality_id = "", $locality_id = "";
    public $validate = false;

    public $rules = [
        'contact' => 'required|max:255',
        'state_id' => 'required',
        'municipality_id' => 'required',
        'locality_id' => 'required',
        'codePostal' => 'required|max:5',
        'address' => 'required|max:255',
        'reference' => 'required|max:255',
        'phone' => 'required|max:20',
        'email' => 'required|max:255',
        'note' => 'max:255',
    ];

    public function mount()
    {
        $this->states = State::orderByRaw('nombre ASC')->get();
        $this->direcciones = Address::where('user_id', auth()->user()->id)->get();
    }

    public function updatedDireccionSelect($value)
    {
        $direccion = Address::where('id', $value)->first();
        $this->municipalities = Municipality::where('estado_id', $direccion->state_id)->orderByRaw('nombre ASC')->get();
        $this->localities = Locality::where('municipio_id', $direccion->municipality_id)->orderByRaw('nombre ASC')->get();

        $this->contact = $direccion->contact;
        $this->codePostal = $direccion->code_postal;
        $this->address = $direccion->address;
        $this->reference = $direccion->referencia;
        $this->phone = $direccion->phone;
        $this->email = $direccion->email;
        $this->email = $direccion->email;
        $this->state_id = $direccion->state_id;
        $this->municipality_id = $direccion->municipality_id;
        $this->locality_id = $direccion->locality_id;
    }

    public function updatedStateId($value)
    {
        $this->municipalities = Municipality::where('estado_id', $value)->orderByRaw('nombre ASC')->get();
        $this->reset(['municipality_id', 'locality_id']);
    }

    public function updatedMunicipalityId($value)
    {
        $this->localities = Locality::where('municipio_id', $value)->orderByRaw('nombre ASC')->get();
        $this->reset('locality_id');
    }

    public function create_order()
    {

        if (floatval(str_replace(',', '', FacadesCart::subtotal())) > 2000) {
            $this->costo = 0;
        }
        $this->validate = true;
        $this->emit('select');
        $this->validate($this->rules);
        $order = new Order();
        $address = Address::where('address', trim($this->address))->get();

        $order->user_id = auth()->user()->id;
        $order->contact = trim($this->contact);
        $order->code_postal = trim($this->codePostal);
        $order->phone = trim($this->phone);
        $order->email = trim($this->email);
        $order->note = trim($this->note);
        $order->envio_type = 1;
        $order->shipping_cost = $this->costo;
        $order->total =  floatval(str_replace(',', '', FacadesCart::subtotal())) + floatval($this->costo);
        $order->content = FacadesCart::content();
        $order->state_id = $this->state_id;
        $order->municipality_id = $this->municipality_id;
        $order->locality_id = $this->locality_id;
        $order->address = trim($this->address);
        $order->referencia = trim($this->reference);
        $order->save();
        foreach (FacadesCart::content() as $item) {
            discount($item);
        }
        FacadesCart::destroy();

        if ($address->count() == 0) {
            $addressCreate = new Address();

            $addressCreate->user_id = auth()->user()->id;
            $addressCreate->contact = trim($this->contact);
            $addressCreate->code_postal = trim($this->codePostal);
            $addressCreate->phone = trim($this->phone);
            $addressCreate->email = trim($this->email);
            $addressCreate->state_id = $this->state_id;
            $addressCreate->municipality_id = $this->municipality_id;
            $addressCreate->locality_id = $this->locality_id;
            $addressCreate->address = trim($this->address);
            $addressCreate->referencia = trim($this->reference);
            $addressCreate->save();
        }

        return redirect()->route('orderPayment', $order);
    }

    public function render()
    {
        $this->emit('select');
        return view('livewire.create-order');
    }
}
