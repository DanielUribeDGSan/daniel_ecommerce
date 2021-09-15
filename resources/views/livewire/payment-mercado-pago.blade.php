<div>
    @php
        // SDK de Mercado Pago
        require base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        $shipments = new MercadoPago\Shipments();
        $shipments->cost = $orden->shipping_cost;
        $shipments->mode = 'not_specified';
        $preference->shipments = $shipments;
        // Crea un ítem en la preferencia
        
        foreach ($items as $product) {
            $item = new MercadoPago\Item();
            $item->title = $product->name;
            $item->quantity = $product->qty;
            $item->unit_price = $product->price;
            $products[] = $item;
        }
        $preference->back_urls = [
            'success' => route('pagoExitoso', $orden),
            'failure' => route('pagoCancelado', $orden),
            'pending' => route('pagoPendiente', $orden),
        ];
        $preference->auto_return = 'approved';
        $preference->items = $products;
        $preference->save();
    @endphp
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
                                    <span><b>Precio</b><span><br>{{ number_format($item->price, 2, '.', ',') }}</span>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center mt-2">
                                    <span><b>Cantidad</b><span><br>{{ $item->qty }}</span>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center mt-2">
                                    <span><b>Total</b><span><br>{{ number_format($item->subtotal, 2, '.', ',') }}
                                            MXN</span>
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
                            <p class=" border-b-primary">Total:</p> <span
                                class="float-right">{{ number_format($orden->total, 2, '.', ',') }} MXN</span><br>
                            <div class="divisor-20"></div>
                            {{-- <div class="slider-btn btn-hover">
                                <a href="" class="btn animated d-block">
                                    Pagar <i class="far fa-credit-card"></i>
                                </a>
                            </div> --}}
                            <div class="cho-container d-block"></div>
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
    <script>
        var expDate = document.getElementById('exp');
        expDate.onkeyup = function(e) {
            if (this.value == this.lastValue) return;
            var caretPosition = this.selectionStart;
            var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
            var parts = [];

            for (var i = 0, len = sanitizedValue.length; i < len; i += 2) {
                parts.push(sanitizedValue.substring(i, i + 2));
            }
            for (var i = caretPosition - 1; i >= 0; i--) {
                var c = this.value[i];
                if (c < '0' || c > '9') {
                    caretPosition--;
                }
            }
            caretPosition += Math.floor(caretPosition / 2);

            this.value = this.lastValue = parts.join('/');
            this.selectionStart = this.selectionEnd = caretPosition;
        }

        // Radio button
        $('.radio-group .radio').click(function() {
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });
    </script>
    @push('script')
        <script src="https://sdk.mercadopago.com/js/v2"></script>

        <script>
            // Agrega credenciales de SDK
            const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
                locale: 'es-AR'
            });

            // Inicializa el checkout
            mp.checkout({
                preference: {
                    id: '{{ $preference->id }}'
                },
                render: {
                    container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
                }
            });
        </script>
    @endpush

</div>
