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
                     <a class="profile-menu-link active">Mis compras</a>
                     <a class="profile-menu-link">Lista de deseos</a>
                     <a class="profile-menu-link" href="{{ route('ordenes') }}">Mis ordenes</a>
                     {{-- <a class="profile-menu-link">Friends</a>
                     <a class="profile-menu-link">Photos</a>
                     <a class="profile-menu-link">More</a> --}}
                 </div>
             </div>
             <div class="timeline">
                 <div class="timeline-left">
                     <div class="intro box">
                         <div class="intro-title">
                             Datos personales
                             <button class="intro-menu"></button>
                         </div>
                         <div class="info">
                             <div class="info-item">
                                 <i class="far fa-envelope pt-3p mr-05r"></i>
                                 <span>{{ Auth::user()->email }}</span>
                             </div>
                             @if ($address->count())
                                 <div class="info-item">
                                     <i class="far fa-address-card pt-3p mr-05r"></i>
                                     <span>{{ $address->address }}</span>
                                 </div>
                                 <div class="info-item">
                                     <i class="far fa-address-card pt-3p mr-05r"></i>
                                     <span>{{ $address->referencia }}</span>
                                 </div>
                                 <div class="info-item">
                                     <i class="far fa-address-card pt-3p mr-05r"></i>
                                     <span>{{ $address->code_postal }}</span>
                                 </div>
                                 <div class="info-item">
                                     <i class="far fa-address-card pt-3p mr-05r"></i>
                                     <span> {{ $address->state->nombre }},
                                         {{ $address->municipality->nombre }},
                                         {{ $address->locality->nombre }}</span>
                                 </div>

                             @endif
                         </div>
                     </div>
                 </div>
                 <div class="timeline-right">
                     @if ($orders->count())
                         @foreach ($orders as $order)
                             <div class="album box">
                                 <div class="status-main">
                                     <div class="d-flex w-100 mb-2">
                                         <div>
                                             <p class="border-b-primary"><strong>Orden</strong></p>
                                             <p>Orden {{ $order->id }}</p>
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
                                                     <div class="album-title"><strong>{{ $item->name }}</strong>
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
