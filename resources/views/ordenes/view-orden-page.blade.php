<x-web-layout>
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
                                    <span><b>Total</b><span><br>{{ number_format($item->subtotal, 2, '.', ',') }}</span>
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
                        @if ($orden->status == 2)
                            <div class="">
                                <p class=" border-b-primary">Orden:</p> <span
                                    class="float-right">Recibida</span><br>
                                <div class="divisor-20"></div>
                                {{-- Btn --}}

                                <div class="divisor-20"></div>
                                <lottie-player src="{{ asset('json/recibido.json') }}" background="transparent"
                                    speed="1" style="width: 321px; height: 321px;" loop autoplay></lottie-player>
                            </div>
                        @elseif ($orden->status == 3)
                            <div class="">
                                <p class=" border-b-primary">Orden:</p> <span
                                    class="float-right">Enviada</span><br>
                                <div class="divisor-20"></div>
                                {{-- Btn --}}

                                <div class="divisor-20"></div>
                                <lottie-player src="{{ asset('json/enviado.json') }}" background="transparent"
                                    speed="1" style="width: 321px; height: 321px;" loop autoplay></lottie-player>
                            </div>
                        @elseif ($orden->status == 4)
                            <div class="">
                                <p class=" border-b-primary">Orden:</p> <span
                                    class="float-right">Entregada</span><br>
                                <div class="divisor-20"></div>
                                {{-- Btn --}}

                                <div class="divisor-20"></div>
                                <lottie-player src="{{ asset('json/entregado.json') }}" background="transparent"
                                    speed="1" style="width: 321px; height: 321px;" loop autoplay></lottie-player>
                            </div>
                        @elseif ($orden->status == 5)
                            <div class="">
                                <p class=" border-b-primary">Orden:</p> <span
                                    class="float-right">Anulada</span><br>
                                <div class="divisor-20"></div>
                                {{-- Btn --}}

                                <div class="divisor-20"></div>
                                <lottie-player src="{{ asset('json/anulado.json') }}" background="transparent"
                                    speed="1" style="width: 321px; height: 321px;" loop autoplay></lottie-player>
                            </div>
                        @elseif ($orden->status == 1 && !$orden->payment_id)
                            <script>
                                location.href = "{{ route('orderPayment', $orden) }}";
                            </script>
                        @elseif ($orden->status == 1 && $orden->payment_id)
                            <div class="">
                                <p class=" border-b-primary">Orden:</p> <span
                                    class="float-right">Pendiente de recibir pago</span><br>
                                <div class="divisor-20"></div>
                                {{-- Btn --}}

                                <div class="divisor-20"></div>
                                <lottie-player src="{{ asset('json/pago-pendiente.json') }}" background="transparent"
                                    speed="1" style="width: 321px; height: 321px;" loop autoplay></lottie-player>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
