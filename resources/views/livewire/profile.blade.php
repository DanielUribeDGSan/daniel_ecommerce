 <div class="container-profile" x-data="{ rightSide: false, leftSide: false }">
     <div class="main-profile">
         <div class="main-container-profile">
             <div class="profile">
                 <div class="profile-avatar">
                     <x-user />
                     <div class="profile-name">{{ Auth::user()->name }}</div>
                 </div>

                 <div class="profile-fondo"
                     style="background-image: url({{ asset('assets/images/profile/fondo.jpg') }})"></div>
                 <div class="profile-menu">
                     <a class="profile-menu-link compras-link active" onclick="mostrarCompras()">Mis compras</a>
                     {{-- <a class="profile-menu-link deseos-link">Lista de deseos</a> --}}
                     <a class="profile-menu-link" href="{{ route('ordenes') }}">Mis ordenes</a>
                     {{-- <a class="profile-menu-link">Friends</a>
                     <a class="profile-menu-link">Photos</a>
                     <a class="profile-menu-link">More</a> --}}
                 </div>
             </div>
             <div class="timeline">
                 <div class="timeline-left">
                     <div class="intro box position-relative">
                         <div class="intro-title">
                             Datos personales
                             <div class="language-currency-wrap language-currency-wrap-modify btn-option">
                                 <div class="currency-wrap border-style">
                                     <a class="currency-active" href="#"><i class="fas fa-ellipsis-h"
                                             style="font-size: 23px;"></i></a>

                                     <div class="currency-dropdown">
                                         <ul>
                                             <li class="profile-li-menu" onclick="addDirecciones()">Agregar dirección
                                             </li>
                                             <li class="profile-li-menu" onclick="mostrarDirecciones()">Mis direcciones
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>

                         </div>
                         <div class="info">
                             <div class="info-item">
                                 <i class="far fa-envelope pt-3p mr-05r"></i>
                                 <span>{{ Auth::user()->email }}</span>
                             </div>
                             @if ($addressArr->count())
                                 <div class="info-item">
                                     <i class="far fa-address-card pt-3p mr-05r"></i>
                                     <span>{{ $addressArr->address }}</span>
                                 </div>
                                 <div class="info-item">
                                     <i class="far fa-address-card pt-3p mr-05r"></i>
                                     <span>{{ $addressArr->referencia }}</span>
                                 </div>
                                 <div class="info-item">
                                     <i class="far fa-address-card pt-3p mr-05r"></i>
                                     <span>{{ $addressArr->code_postal }}</span>
                                 </div>
                                 <div class="info-item">
                                     <i class="far fa-address-card pt-3p mr-05r"></i>
                                     <span> {{ $addressArr->state->nombre }},
                                         {{ $addressArr->municipality->nombre }},
                                         {{ $addressArr->locality->nombre }}</span>
                                 </div>

                             @endif
                         </div>
                     </div>
                 </div>
                 {{-- <div class="w-100" wire:loading>
                     <div class="content-info">
                         <div class="album box">
                             <div class="status-main">
                                 <x-loading-form />
                             </div>
                         </div>
                     </div>
                 </div> --}}
                 <div class="timeline-right">
                     <div class="content-info add-direccion-content ocultar">
                         <div class="album box">
                             <div class="status-main">
                                 <form wire:submit.prevent="create_direction">
                                     <div class="row">
                                         <div class="col-lg-12">
                                             <div class="billing-info-wrap">
                                                 <h3>Nueva dirección</h3>
                                                 <div class="row">
                                                     <div class="col-lg-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Nombre completo <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input type="text" wire:model.defer="contact"
                                                                 onkeyup="onlyLetrasNum(this)" maxlength="255">
                                                             @if ($errors->has('contact'))
                                                                 <span>{{ $errors->first('contact') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <div class="billing-select select-style mb-20">
                                                             <label>Estado <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <select class="form-control-select" wire:model="state_id">
                                                                 <option value="" disabled selected>Selecciona un estado
                                                                 </option>
                                                                 @foreach ($states as $state)
                                                                     <option value="{{ $state->id }}">
                                                                         {{ $state->nombre }}
                                                                     </option>
                                                                 @endforeach
                                                             </select>
                                                             @if ($errors->has('state_id'))
                                                                 <span>{{ $errors->first('state_id') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <div class="billing-select select-style mb-20">
                                                             <label>Municipio <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <select class="form-control-select"
                                                                 wire:model="municipality_id">
                                                                 <option value="" disabled selected>Selecciona un
                                                                     municipio</option>
                                                                 @foreach ($municipalities as $municipality)
                                                                     <option value="{{ $municipality->id }}">
                                                                         {{ $municipality->nombre }}
                                                                     </option>
                                                                 @endforeach
                                                             </select>
                                                             @if ($errors->has('municipality_id'))
                                                                 <span>{{ $errors->first('municipality_id') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <div class="billing-select select-style mb-20">
                                                             <label>Localidad <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <select class="form-control-select"
                                                                 wire:model="locality_id">
                                                                 <option value="" disabled selected>Selecciona una
                                                                     localidad</option>
                                                                 @foreach ($localities as $locality)
                                                                     <option value="{{ $locality->id }}">
                                                                         {{ $locality->nombre }}
                                                                     </option>
                                                                 @endforeach
                                                             </select>
                                                             @if ($errors->has('locality_id'))
                                                                 <span>{{ $errors->first('locality_id') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12 col-md-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Código postal <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input type="text" wire:model.defer="codePostal"
                                                                 onkeyup="onlyNum(this)" maxlength="5">
                                                             @if ($errors->has('codePostal'))
                                                                 <span>{{ $errors->first('codePostal') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Dirección <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input class="billing-address"
                                                                 placeholder="Número de casa y nombre de la calle"
                                                                 type="text" wire:model.defer="address"
                                                                 onkeyup="onlyLetrasNum(this)" maxlength="255">
                                                             @if ($errors->has('address'))
                                                                 <span>{{ $errors->first('address') }}</span>
                                                             @endif
                                                             <input placeholder="Referencia" type="text"
                                                                 wire:model.defer="reference"
                                                                 onkeyup="onlyLetrasNum(this)" maxlength="255">
                                                             @if ($errors->has('reference'))
                                                                 <span>{{ $errors->first('reference') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12 col-md-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Teléfono <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input type="text" wire:model.defer="phone"
                                                                 onkeyup="onlyNum(this)" maxlength="20">
                                                             @if ($errors->has('phone'))
                                                                 <span>{{ $errors->first('phone') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12 col-md-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Correo electrónico <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input type="email" wire:model.defer="email"
                                                                 onkeyup="onlyEmail(this)" maxlength="255">
                                                             @if ($errors->has('email'))
                                                                 <span>{{ $errors->first('email') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="btn-style-2 btn-hover">
                                                     <button type="submit" class="btn"
                                                         wire:loading.attr="disabled" wire:target="create_direction"
                                                         wire:loading.remove>
                                                         Agregar dirección</button>
                                                     <div wire:loading wire:target="create_direction"
                                                         wire:loading.class="parpadea">
                                                         Validando datos...
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                     <div class="content-info editar-direccion-content ocultar">
                         <div class="album box">
                             <div class="status-main">
                                 <form wire:submit.prevent="actualizarDirection">
                                     <div class="row">
                                         <div class="col-lg-12">
                                             <div class="billing-info-wrap">
                                                 <h3>Editar dirección</h3>
                                                 <div class="row">
                                                     <div class="col-lg-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Nombre completo <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input type="text" wire:model.defer="contact_update"
                                                                 onkeyup="onlyLetrasNum(this)" maxlength="255">
                                                             @if ($errors->has('contact_update'))
                                                                 <span>{{ $errors->first('contact_update') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <div class="billing-select select-style mb-20">
                                                             <label>Estado <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <select class="form-control-select"
                                                                 wire:model="state_id_update">
                                                                 <option value="" disabled selected>Selecciona un estado
                                                                 </option>
                                                                 @foreach ($states_update as $state)
                                                                     <option value="{{ $state->id }}">
                                                                         {{ $state->nombre }}
                                                                     </option>
                                                                 @endforeach
                                                             </select>
                                                             @if ($errors->has('state_id_update'))
                                                                 <span>{{ $errors->first('state_id_update') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <div class="billing-select select-style mb-20">
                                                             <label>Municipio <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <select class="form-control-select"
                                                                 wire:model="municipality_id_update">
                                                                 <option value="" disabled selected>Selecciona un
                                                                     municipio</option>
                                                                 @foreach ($municipalities_update as $municipality)
                                                                     <option value="{{ $municipality->id }}">
                                                                         {{ $municipality->nombre }}
                                                                     </option>
                                                                 @endforeach
                                                             </select>
                                                             @if ($errors->has('municipality_id_update'))
                                                                 <span>{{ $errors->first('municipality_id_update') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <div class="billing-select select-style mb-20">
                                                             <label>Localidad <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <select class="form-control-select"
                                                                 wire:model="locality_id_update">
                                                                 <option value="" disabled selected>Selecciona una
                                                                     localidad</option>
                                                                 @foreach ($localities_update as $locality)
                                                                     <option value="{{ $locality->id }}">
                                                                         {{ $locality->nombre }}
                                                                     </option>
                                                                 @endforeach
                                                             </select>
                                                             @if ($errors->has('locality_id_update'))
                                                                 <span>{{ $errors->first('locality_id_update') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12 col-md-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Código postal <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input type="text" wire:model.defer="codePostal_update"
                                                                 onkeyup="onlyNum(this)" maxlength="5">
                                                             @if ($errors->has('codePostal_update'))
                                                                 <span>{{ $errors->first('codePostal_update') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Dirección <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input class="billing-address"
                                                                 placeholder="Número de casa y nombre de la calle"
                                                                 type="text" wire:model.defer="address_update"
                                                                 onkeyup="onlyLetrasNum(this)" maxlength="255">
                                                             @if ($errors->has('address_update'))
                                                                 <span>{{ $errors->first('address_update') }}</span>
                                                             @endif
                                                             <input placeholder="Referencia" type="text"
                                                                 wire:model.defer="reference_update"
                                                                 onkeyup="onlyLetrasNum(this)" maxlength="255">
                                                             @if ($errors->has('reference_update'))
                                                                 <span>{{ $errors->first('reference_update') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12 col-md-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Teléfono <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input type="text" wire:model.defer="phone_update"
                                                                 onkeyup="onlyNum(this)" maxlength="20">
                                                             @if ($errors->has('phone_update'))
                                                                 <span>{{ $errors->first('phone_update') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12 col-md-12">
                                                         <div class="billing-info mb-20">
                                                             <label>Correo electrónico <abbr class="required"
                                                                     title="required">*</abbr></label>
                                                             <input type="email" wire:model.defer="email_update"
                                                                 onkeyup="onlyEmail(this)" maxlength="255">
                                                             @if ($errors->has('email_update'))
                                                                 <span>{{ $errors->first('email_update') }}</span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12 col-md-12">
                                                         <div class="billing-info mb-20">
                                                             <div class="btn-style-2 btn-hover">
                                                                 <button type="submit" class="btn"
                                                                     wire:loading.attr="disabled"
                                                                     wire:target="actualizarDirection"
                                                                     wire:loading.remove>
                                                                     Actualizar dirección</button>
                                                                 <div wire:loading wire:target="actualizarDirection"
                                                                     wire:loading.class="parpadea">
                                                                     Validando datos...
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                     <div class="content-info direccion-content ocultar">
                         @if ($adresses->count())
                             @foreach ($adresses as $addressItem)
                                 <div class="album box position-relative">
                                     <div class="status-main">
                                         <div
                                             class="language-currency-wrap language-currency-wrap-modify btn-option-edit">
                                             <div class="currency-wrap border-style">
                                                 <a class="currency-active" href="#"><i class="fas fa-ellipsis-h"
                                                         style="font-size: 23px;"></i></a>

                                                 <div class="currency-dropdown">
                                                     <ul>
                                                         <li class="profile-li-menu"
                                                             wire:click="editDirection('{{ $addressItem->id }}')">
                                                             Editar
                                                         </li>
                                                         <li class="profile-li-menu"
                                                             wire:click="$emit('eliminarDirecionAlert','{{ $addressItem->id }}')">

                                                             Eliminar
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Nombre</strong></p>
                                                 <p>{{ $addressItem->contact }}</p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Código postal</strong></p>
                                                 <p>{{ $addressItem->code_postal }}</p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Teléfono</strong></p>
                                                 <p>{{ $addressItem->phone }}</p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Email</strong></p>
                                                 <p>{{ $addressItem->email }}</p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Estado</strong></p>
                                                 <p>{{ $addressItem->state->nombre }}</p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Municipio</strong></p>
                                                 <p>{{ $addressItem->municipality->nombre }}</p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Localidad</strong></p>
                                                 <p>{{ $addressItem->locality->nombre }}</p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Dirección</strong></p>
                                                 <p>{{ $addressItem->address }}</p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Referencia</strong></p>
                                                 <p>{{ $addressItem->referencia }}</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         @else
                             <x-order-empty />
                         @endif
                     </div>
                     <div class="orders-content content-info">
                         @if ($orders->count())
                             @foreach ($orders as $order)
                                 <div class="album box">
                                     <div class="status-main">
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Orden</strong></p>
                                                 <p>orden-{{ $order->id }}</p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Envió</strong></p>
                                                 <p> <span>{{ $order->address }}</span>
                                                     <span>{{ $order->referencia }}</span>.
                                                     <span>{{ $order->state->nombre }}, </span><span>
                                                         {{ $order->municipality->nombre }},</span><span>
                                                         {{ $order->locality->nombre }}</span>
                                                 </p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Datos de contacto</strong></p>
                                                 <p> <span>{{ $order->contact }}</span>
                                                 </p>
                                             </div>
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Productos</strong></p>
                                             </div>
                                         </div>
                                         <div class="row">
                                             @foreach (json_decode($order->content) as $item)
                                                 <div class="col-auto mb-3 ">
                                                     <img src="{{ $item->options->image }}"
                                                         class="status-img float-left" />
                                                     <div>
                                                         <div class="album-title">
                                                             <strong>{{ $item->name }}</strong>
                                                             {{ $item->qty }}
                                                         </div>
                                                         <div class="album-date">
                                                             {{ number_format($item->subtotal, 2, '.', ',') }}</div>
                                                     </div>
                                                 </div>
                                             @endforeach
                                         </div>
                                         <div class="d-flex w-100 mb-2">
                                             <div>
                                                 <p class="border-b-primary"><strong>Total</strong></p>
                                                 <p> <span> {{ number_format($order->total, 2, '.', ',') }}
                                             </div></span>
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         @else
                             <x-order-empty />
                         @endif
                     </div>
                 </div>
             </div>
         </div>
     </div>
     @push('script')

         <script>
             Livewire.on('eliminarDirecionAlert', function(direccionId) {
                 Swal.fire({
                     title: '¿Está seguro(a)?',
                     text: "No podrás revertir esto.",
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Sí, bórralo.'
                 }).then((result) => {
                     if (result.isConfirmed) {
                         Livewire.emitTo('profile', 'deleteDireccion', `${direccionId}`);
                         Swal.fire({
                             title: 'Dirección elimada',
                             text: "",
                             icon: 'success',
                             showCancelButton: false,
                             confirmButtonColor: '#3085d6',
                             cancelButtonColor: '#d33',
                             confirmButtonText: 'Aceptar',
                             allowOutsideClick: false
                         })
                     }
                 })
             })
         </script>
     @endpush
 </div>
