<x-web-layout>
    <div class="container-fluid mt-3 mb-5">
        <div class="container__ordenes">
            <div class="sidebar">
                <a class="logo-expand">Ordenes</a>
                <div class="side-wrapper">
                    <div class="side-menu">
                        <a class="sidebar-link pendientes_link is-active p-relative">
                            <span class="counter_order">{{ $ordenes->where('status', 1)->count() }}</span>
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z" />
                            </svg>
                            Pendientes
                        </a>
                        <a class="sidebar-link recibidas_link p-relative">
                            <span class="counter_order">{{ $ordenes->where('status', 2)->count() }}</span>
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z" />
                            </svg>
                            Recibidas
                        </a>
                        <a class="sidebar-link enviadas_link p-relative">
                            <span class="counter_order">{{ $ordenes->where('status', 3)->count() }}</span>
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z" />
                            </svg>
                            Enviadas
                        </a>
                        <a class="sidebar-link entregadas_link p-relative">
                            <span class="counter_order">{{ $ordenes->where('status', 4)->count() }}</span>
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z" />
                            </svg>
                            Entregadas
                        </a>
                        <a class="sidebar-link anuladas_link p-relative">
                            <span class="counter_order">{{ $ordenes->where('status', 5)->count() }}</span>
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z" />
                            </svg>
                            Anuladas
                        </a>

                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="main-container">
                    <div class="pendientes">
                        <div class="main-header mt-10 anim" style="--delay: 0s">Ordenes pendientes</div>
                        <div class="main-ordenes">
                            <div class="row">
                                @forelse ($ordenes->where('status',1) as $orden)
                                    <div class="col-lg-4 col-md-6 col-12 mt-3">
                                        <div class="main-orden anim w-100" style="--delay: .2s">
                                            <div class="main-orden__title">Orden: {{ $orden->id }}</div>
                                            <div class="main-orden__orden tips">
                                                <div class="main-orden__img">
                                                    <lottie-player src="{{ asset('json/paquete.json') }}"
                                                        background="transparent" speed="1"
                                                        style="width: 150px; height: 150px;" loop autoplay>
                                                    </lottie-player>
                                                </div>
                                                <div class="main-orden__time">{{ $orden->total }} MXN</div>
                                                <div class="main-orden__link"><a class="text-white"
                                                        href="{{ route('orderPayment', $orden) }}">Pagar orden</a>
                                                </div>
                                                <div class="orden-img__wrapper">
                                                    <img class="orden-img"
                                                        src="{{ asset('assets/images/ordenes/pendiente.svg') }}" />
                                                </div>
                                                <div class="orden-detail">
                                                    <div class="orden-name">Pendiente</div>
                                                    <div class="orden-info">{{ $orden->created_at->format('d/m/y') }}
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <x-order-empty />
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="recibidas">
                        <div class="main-header mt-10 anim" style="--delay: 0s">Ordenes recibidas</div>
                        <div class="main-ordens">
                            <div class="row">
                                @forelse ($ordenes->where('status',2) as $orden)
                                    <div class="col-lg-4 col-md-6 col-12 mt-3">
                                        <div class="main-orden anim w-100" style="--delay: .2s">
                                            <div class="main-orden__title">Orden: {{ $orden->id }}</div>
                                            <div class="main-orden__orden tips">
                                                <div class="main-orden__img">
                                                    <lottie-player src="{{ asset('json/paquete.json') }}"
                                                        background="transparent" speed="1"
                                                        style="width: 150px; height: 150px;" loop autoplay>
                                                    </lottie-player>
                                                </div>
                                                <div class="main-orden__time">{{ $orden->total }} MXN</div>
                                                <div class="main-orden__link"><a class="text-white"
                                                        href="{{ route('viewOrder', $orden) }}">Ver orden</a></div>
                                                <div class="orden-img__wrapper">
                                                    <img class="orden-img"
                                                        src="{{ asset('assets/images/ordenes/recibido.svg') }}" />
                                                </div>
                                                <div class="orden-detail">
                                                    <div class="orden-name">Recibido</div>
                                                    <div class="orden-info">{{ $orden->created_at->format('d/m/y') }}
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <x-order-empty />
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="enviadas">
                        <div class="main-header mt-10 anim" style="--delay: 0s">Ordenes enviadas</div>
                        <div class="main-ordens">
                            <div class="row">
                                @forelse ($ordenes->where('status',3) as $orden)
                                    <div class="col-lg-4 col-md-6 col-12 mt-3">
                                        <div class="main-orden anim w-100" style="--delay: .2s">
                                            <div class="main-orden__title">Orden: {{ $orden->id }}</div>
                                            <div class="main-orden__orden tips">
                                                <div class="main-orden__img">
                                                    <lottie-player src="{{ asset('json/paquete.json') }}"
                                                        background="transparent" speed="1"
                                                        style="width: 150px; height: 150px;" loop autoplay>
                                                    </lottie-player>
                                                </div>
                                                <div class="main-orden__time">{{ $orden->total }} MXN</div>
                                                <div class="main-orden__link"><a class="text-white"
                                                        href="{{ route('viewOrder', $orden) }}">Ver orden</a></div>
                                                <div class="orden-img__wrapper">
                                                    <img class="orden-img"
                                                        src="{{ asset('assets/images/ordenes/enviado.svg') }}" />
                                                </div>
                                                <div class="orden-detail">
                                                    <div class="orden-name">Enviado</div>
                                                    <div class="orden-info">{{ $orden->created_at->format('d/m/y') }}
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <x-order-empty />
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="entregadas">
                        <div class="main-header mt-10 anim" style="--delay: 0s">Ordenes entregadas</div>
                        <div class="main-ordens">
                            <div class="row">
                                @forelse ($ordenes->where('status',4) as $orden)
                                    <div class="col-lg-4 col-md-6 col-12 mt-3">
                                        <div class="main-orden anim w-100" style="--delay: .2s">
                                            <div class="main-orden__title">Orden: {{ $orden->id }}</div>
                                            <div class="main-orden__orden tips">
                                                <div class="main-orden__img">
                                                    <lottie-player src="{{ asset('json/paquete.json') }}"
                                                        background="transparent" speed="1"
                                                        style="width: 150px; height: 150px;" loop autoplay>
                                                    </lottie-player>
                                                </div>
                                                <div class="main-orden__time">{{ $orden->total }} MXN</div>
                                                <div class="main-orden__link"><a class="text-white"
                                                        href="{{ route('viewOrder', $orden) }}">Ver orden</a></div>
                                                <div class="orden-img__wrapper">
                                                    <img class="orden-img"
                                                        src="{{ asset('assets/images/ordenes/entregado.svg') }}" />
                                                </div>
                                                <div class="orden-detail">
                                                    <div class="orden-name">Entregado</div>
                                                    <div class="orden-info">{{ $orden->created_at->format('d/m/y') }}
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <x-order-empty />
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="anuladas">
                        <div class="main-header mt-10 anim" style="--delay: 0s">Ordenes anuladas</div>
                        <div class="main-ordens">
                            <div class="row">
                                @forelse ($ordenes->where('status',5) as $orden)
                                    <div class="col-lg-4 col-md-6 col-12 mt-3">
                                        <div class="main-orden anim w-100" style="--delay: .2s">
                                            <div class="main-orden__title">Orden: {{ $orden->id }}</div>
                                            <div class="main-orden__orden tips">
                                                <div class="main-orden__img">
                                                    <lottie-player src="{{ asset('json/paquete.json') }}"
                                                        background="transparent" speed="1"
                                                        style="width: 150px; height: 150px;" loop autoplay>
                                                    </lottie-player>
                                                </div>
                                                <div class="main-orden__time">{{ $orden->total }} MXN</div>
                                                <div class="main-orden__link"><a class="text-white"
                                                        href="{{ route('viewOrder', $orden) }}">Ver orden</a></div>
                                                <div class="orden-img__wrapper">
                                                    <img class="orden-img"
                                                        src="{{ asset('assets/images/ordenes/anulado.svg') }}" />
                                                </div>
                                                <div class="orden-detail">
                                                    <div class="orden-name">Anulado</div>
                                                    <div class="orden-info">{{ $orden->created_at->format('d/m/y') }}
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <x-order-empty />
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
