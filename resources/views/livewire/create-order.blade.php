<div x-data>
    @if (Cart::count() == 0)
        @php
            redirect()->route('inicio');
        @endphp
    @endif
    <div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Checkout </h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>Checkout </li>
                </ul>
            </div>
        </div>
        <div class="breadcrumb-img-1">
            <img src="assets/images/banner/breadcrumb-1.png" alt="">
        </div>
        <div class="breadcrumb-img-2">
            <img src="assets/images/banner/breadcrumb-2.png" alt="">
        </div>
    </div>
    <div class="checkout-main-area pb-100 pt-100">
        <div class="container">
            <div class="customer-zone mb-20">
                <p class="cart-page-title">¿Tienes un cupón? <a class="checkout-click3" href="#">Haga clic aquí para
                        introducir su código</a></p>
                <div class="checkout-login-info3">
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <input type="submit" value="Apply Coupon">
                    </form>
                </div>
            </div>
            <div class="checkout-wrap pt-30">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Datos de facturación</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Nombre completo <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model.defer="contact">
                                        @if ($contact == '' && $validate)
                                            <p class="cl-danger mt-3">El nombre no puede quedar vacío</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select select-style mb-20">
                                        <label>Estado <abbr class="required" title="required">*</abbr></label>
                                        <select class="form-control-select" wire:model="state_id">
                                            <option value="" disabled selected>Selecciona un estado</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @if ($state_id == '' && $validate)
                                            <p class="cl-danger mt-3">El estado no puede quedar vacío</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select select-style mb-20">
                                        <label>Municipio <abbr class="required" title="required">*</abbr></label>
                                        <select class="form-control-select" wire:model="municipality_id">
                                            <option value="" disabled selected>Selecciona un municipio</option>
                                            @foreach ($municipalities as $municipality)
                                                <option value="{{ $municipality->id }}">{{ $municipality->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($municipality_id == '' && $validate)
                                            <p class="cl-danger mt-3">El municipio no puede quedar vacío</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select select-style mb-20">
                                        <label>Localidad <abbr class="required" title="required">*</abbr></label>
                                        <select class="form-control-select" wire:model="locality_id">
                                            <option value="" disabled selected>Selecciona una localidad</option>
                                            @foreach ($localities as $locality)
                                                <option value="{{ $locality->id }}">{{ $locality->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @if ($locality_id == '' && $validate)
                                            <p class="cl-danger mt-3">La localidad no puede quedar vacía</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Pueblo / Ciudad <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model.defer="city">
                                        @if ($city == '' && $validate)
                                            <p class="cl-danger mt-3">La ciudad no puede quedar vacía</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Código postal <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model.defer="codePostal">
                                        @if ($codePostal == '' && $validate)
                                            <p class="cl-danger mt-3">El código postal no puede quedar vacío</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Dirección <abbr class="required" title="required">*</abbr></label>
                                        <input class="billing-address" placeholder="Número de casa y nombre de la calle"
                                            type="text" wire:model.defer="address">
                                        @if ($address == '' && $validate)
                                            <p class="cl-danger">La dirección no puede quedar vacía</p>
                                        @endif
                                        <input placeholder="Referencia" type="text" wire:model.defer="reference">
                                        @if ($reference == '' && $validate)
                                            <p class="cl-danger mt-3">La referencia no puede quedar vacía</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Teléfono <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model.defer="phone">
                                        @if ($phone == '' && $validate)
                                            <p class="cl-danger mt-3">El teléfono no puede quedar vacío</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Correo electrónico <abbr class="required"
                                                title="required">*</abbr></label>
                                        <input type="email" wire:model.defer="email">
                                        @if ($email == '' && $validate)
                                            <p class="cl-danger mt-3">El Correo electrónico no puede quedar vacío</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="additional-info-wrap">
                                <label>Notas de pedido
                                </label>
                                <textarea
                                    placeholder="Notas sobre su pedido, por ejemplo, notas especiales para la entrega."
                                    wire:model.defer="note"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>Su pedido</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-info-wrap">
                                    <div class="your-order-info">
                                        <ul>
                                            <li>Producto <span>Total</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @foreach (Cart::content() as $item)

                                                <li>{{ $item->name }} X {{ $item->qty }}
                                                    <span>{{ $item->price }}
                                                        MXN</span>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="your-order-info order-subtotal">
                                        <ul>
                                            <li>Subtotal <span>{{ Cart::subtotal() }} MXN </span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            @if (floatval(str_replace(',', '', Cart::subtotal())) > 2000)
                                            <li>Costo Envío <span>0 MXN </span>
                                            </li>
                                        @else
                                            <li>Costo Envío <span>200 MXN </span>
                                            </li>
                                            @endif

                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            @if (floatval(str_replace(',', '', Cart::subtotal())) > 2000)
                                            <li>Total <span>{{ Cart::subtotal() }} MXN </span>
                                            </li>
                                        @else
                                            <li>Total
                                                <span>
                                                    @php
                                                        setlocale(LC_MONETARY, 'en_US');
                                                    @endphp
                                                    {{ str_replace('USD', '', money_format('%i', floatval(str_replace(',', '', Cart::subtotal())) + floatval(200))) }}
                                                    MXN
                                                </span>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order btn-hover">
                                <button wire:loading.attr="disabled" wire:target="create_order" wire:loading.remove
                                    wire:click="create_order">Realizar el pago</button>
                                <div wire:loading wire:target="create_order"
                                    wire:loading.class="d-flex align-items-center justify-content-center">
                                    <x-create-order />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
