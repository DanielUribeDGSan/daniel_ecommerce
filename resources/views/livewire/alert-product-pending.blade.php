<div class="">
    @if ($pendiente)
        @if (Route::current()->getName() != 'order' && Route::current()->getName() != 'orderPayment' && Route::current()->getName() != 'viewOrder' && Route::current()->getName() != 'ordenes')
            <div class="fixed pin-l pin-b p-6 sm:p-10 z-100 alert__product__content ocultar">
                <div class="js-cookie-consent bg-white w-full sm:w-auto rounded-lg shadow-md p-6">

                    <div class="w-alert mx-auto relative -mt-alert mb-3">
                        <lottie-player src="{{ asset('json/productos-pendientes-alert.json') }}"
                            background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
                        </lottie-player>
                    </div>

                    <span
                        class="cookie-consent__message w-full sm:w-48  block font-lf leading-normal text-grey-darkest text-xs mb-3">
                        Usted tiene {{ $pendiente }} ordenes pendientes. No olvides pagar tus ordenes, para que
                        puedas disfrutar pronto tus productos.
                    </span>

                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('ordenes') }}"
                            class="js-cookie-consent-agree bg-lf-teal trans text-xs hover:bg-lf-teal-dark rounded inline-block shadow px-8 py-2 text-white font-lf-bold cursor-pointer">
                            Pagar ordenes
                        </a>

                        <a onclick="ocultarAlertaProductosPendientes()" class="font-lf text-xs text-grey-dark mar-2">
                            Cerrar</a>

                    </div>

                </div>
            </div>
        @endif
    @endif
</div>
