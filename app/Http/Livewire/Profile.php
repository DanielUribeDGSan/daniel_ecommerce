<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Locality;
use App\Models\Municipality;
use App\Models\Order;
use App\Models\State;
use Livewire\Component;

class Profile extends Component
{
    protected $listeners = ['render', 'deleteDireccion'];

    public $contact, $codePostal, $address, $reference, $phone, $email;
    public $states, $municipalities =  [], $localities = [];

    public $contact_update, $codePostal_update, $address_update, $reference_update, $phone_update, $email_update;
    public $states_update = [], $municipalities_update =  [], $localities_update = [];

    public $direcciones = [], $direccion_select = "";

    public $state_id = "", $municipality_id = "", $locality_id = "";

    public $state_id_update = "", $municipality_id_update = "", $locality_id_update = "";

    public $addressArr = [], $addressArrUpdate, $adresses = [], $orders = [];

    public $rules = [
        'contact' => 'required|max:255',
        'state_id' => 'required',
        'municipality_id' => 'required',
        'locality_id' => 'required',
        'codePostal' => 'required|max:5',
        'address' => 'required|max:255|unique:addresses,address',
        'reference' => 'required|max:255',
        'phone' => 'required|max:20',
        'email' => 'required|max:255',
    ];

    public function mount()
    {
        $this->states = State::orderByRaw('nombre ASC')->get();

        $this->addressArr = Address::where('user_id', auth()->user()->id)->first();
        $this->adresses = Address::where('user_id', auth()->user()->id)->get();

        $this->orders = Order::where('user_id', auth()->user()->id)->where('status', 2)->get();
    }

    public function mostrarDirecciones()
    {
        $this->adresses = Address::where('user_id', auth()->user()->id)->get();
    }

    public function updatedStateId($value)
    {
        $this->emit('Showdireccion');
        $this->municipalities = Municipality::where('estado_id', $value)->orderByRaw('nombre ASC')->get();
        $this->reset(['municipality_id', 'locality_id']);
    }

    public function updatedMunicipalityId($value)
    {
        $this->emit('Showdireccion');
        $this->localities = Locality::where('municipio_id', $value)->orderByRaw('nombre ASC')->get();
        $this->reset('locality_id');
    }

    public function updatedStateIdUpdate($value)
    {
        $this->emit('showUpdatedDirection');
        $this->municipalities_update = Municipality::where('estado_id', $value)->orderByRaw('nombre ASC')->get();
        $this->reset(['municipality_id', 'locality_id']);
    }

    public function updatedMunicipalityIdUpdate($value)
    {
        $this->emit('showUpdatedDirection');
        $this->localities_update = Locality::where('municipio_id', $value)->orderByRaw('nombre ASC')->get();
        $this->reset('locality_id');
    }

    public function create_direction()
    {
        $this->emit('Showdireccion');

        $this->validate($this->rules);

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
        $this->mostrarDirecciones();
        $this->emit('saveAddress');
        $this->reset(['contact', 'codePostal', 'phone', 'email', 'state_id', 'municipality_id', 'locality_id', 'address', 'reference']);
    }

    public function editDirection(Address $address)
    {
        $this->addressArrUpdate = $address;
        $this->emit('showUpdatedDirection');

        $this->states_update = State::where('id', $address->state_id)->orderByRaw('nombre ASC')->get();
        $this->municipalities_update = Municipality::where('estado_id', $address->state_id)->orderByRaw('nombre ASC')->get();
        $this->localities_update = Locality::where('municipio_id', $address->municipality_id)->orderByRaw('nombre ASC')->get();

        $this->contact_update = $address->contact;
        $this->codePostal_update = $address->code_postal;
        $this->address_update = $address->address;
        $this->reference_update = $address->referencia;
        $this->phone_update = $address->phone;
        $this->email_update = $address->email;
        $this->state_id_update = $address->state_id;
        $this->municipality_id_update = $address->municipality_id;
        $this->locality_id_update = $address->locality_id;
    }

    public function actualizarDirection()
    {
        $this->emit('showUpdatedDirection');
        $rules = [
            'contact_update' => 'required|max:255',
            'state_id_update' => 'required',
            'municipality_id_update' => 'required',
            'locality_id_update' => 'required',
            'codePostal_update' => 'required|max:5',
            'address_update' => 'required|max:255|unique:addresses,address,' . $this->addressArrUpdate->id,
            'reference_update' => 'required|max:255',
            'phone_update' => 'required|max:20',
            'email_update' => 'required|max:255',

        ];
        $this->validate($rules);

        $this->addressArrUpdate->update(
            [
                'user_id' => auth()->user()->id,
                'contact' => trim($this->contact_update),
                'code_postal' => trim($this->codePostal_update),
                'phone' => trim($this->phone_update),
                'email' => trim($this->email_update),
                'state_id' => $this->state_id_update,
                'municipality_id' => $this->municipality_id_update,
                'locality_id' => $this->locality_id_update,
                'address' => trim($this->address_update),
                'referencia' => trim($this->reference_update),
            ]
        );
        $this->mostrarDirecciones();
        $this->emit('editDireccionAlert');
    }

    public function deleteDireccion(Address $address)
    {
        $address->delete();
        $this->mostrarDirecciones();
        $this->emit('Showdirecciones');
    }

    public function render()
    {
        return view('livewire.profile')->layout('layouts.web');
    }
}
