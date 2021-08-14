<div>
    <div class="container container__payment pt-20 pb-30 h-100">
        <div class="row h-100  content-payment">
            <div class="col-lg-8 col-md-6 col-12  p-0">
                <div class="card card-payment h-100">
                    <div class="card-body">
                        <p>Orden</p>
                        <h6>ORDEN-{{ $orden->id }}</h6>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <p class="border-b-primary">Envío</p>
                            </div>
                            <div class="col-12 mt-2">
                                <span><b>Dirección de envío:</b></span>
                                <span>{{ $orden->address }}</span>
                                <span>{{ $orden->referencia }}</span>.
                                <span>{{ $orden->state->nombre }}, </span><span>
                                    {{ $orden->municipality->nombre }},</span><span>
                                    {{ $orden->locality->nombre }}</span>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="border-b-primary">Datos de contacto</p><br>
                            </div>
                            <div class="col-auto mt-2">
                                <span><b>Nombre:</b></span>
                                <span>{{ $orden->contact }}</span>
                            </div>
                            <div class="col-auto mt-2">
                                <span><b>Teléfono:</b></span>
                                <span>{{ $orden->phone }}</span>
                            </div>
                            <div class="col-auto mt-2">
                                <span><b>Correo:</b></span>
                                <span>{{ $orden->email }}</span>
                            </div>
                            <div class="col-6"></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr>
                            </div>
                            <p class="mt-4">Resumen</p>
                            @foreach ($items as $item)
                                <div class="col-2 d-flex align-items-center justify-content-center mt-2">
                                    <div class="circular--landscape">
                                        <img class="img-orden " src="{{ $item->options->image }}" alt="kasa item">
                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-center justify-content-start mt-2">
                                    <span><b>Nombre</b><span><br>{{ $item->name }}</span>

                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center mt-2">
                                    <span><b>Precio</b><span><br>{{ $item->price }}</span>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center mt-2">
                                    <span><b>Cantidad</b><span><br>{{ $item->qty }}</span>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center mt-2">
                                    <span><b>Total</b><span><br>{{ $item->subtotal }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 pl-0">
                <div class="card card-payment h-100">
                    <div class="card-body d-flex align-items-start justify-content-center">
                        {{-- <div> --}}
                        <div class="">
                            <p class="border-b-primary">Total:</p> <span
                                class="float-right">{{ $orden->total }}</span><br>
                            <div class="divisor-20"></div>
                            <div id="paypal-button-container"></div>
                            {{-- <div class="slider-btn btn-hover">
                                <a href="" class="btn animated d-block">
                                    Pagar <i class="far fa-credit-card"></i>
                                </a>
                            </div> --}}
                            <div class="divisor-20"></div>
                            <x-gif-payment />
                        </div>
                        {{-- <p>Detalles del pago</p>
                             <form class="mt-3">
                                <div class="form-row">
                                    <div class="col mt-3">
                                        <label for="inputEmail4">Nombre del titular</label>
                                        <input type="text" class="form-control-payment" placeholder="Nombre">
                                    </div>
                                    <div class="col mt-3">
                                        <label for="inputEmail4">Número de tarjeta</label>
                                        <input type="text" class="form-control-payment"
                                            placeholder="5555 5555 5555 5555">
                                    </div>
                                </div>

                                <div class="form-row row mt-3">
                                    <div class="col-4">
                                        <label for="inputEmail4">Expiración</label>
                                        <input type="text" id="exp" class="form-control-payment" placeholder="MM/YY"
                                            minlength="5" maxlength="5">
                                    </div>
                                    <div class="col-4">
                                        <label for="inputEmail4">Cvv</label>
                                        <input type="password" class="form-control-payment"
                                            placeholder="&#9679;&#9679;&#9679;">
                                    </div>
                                    <div class="col-4 d-flex align-items-end justify-center">
                                        <button class="btn btn-payment"><i
                                                class="fas fa-arrow-right text-white"></i></button>
                                    </div>
                                </div>
                            </form> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=MXN">
            // Replace YOUR_CLIENT_ID with your sandbox client ID
        </script>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{ $orden->total }}'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        // console.log(details);
                        // alert('Transaction completed by ' + details.payer.name.given_name);
                        Livewire.emit('payOrder');
                    });
                }
            }).render('#paypal-button-container'); // Display payment options on your web page
        </script>
    @endpush
</div>
