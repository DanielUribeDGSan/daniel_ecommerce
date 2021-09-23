 <div class="row">
     <div class="col-xl-12 col-xxl-12">
         <div class="row">
             <div class="col-xl-12">
                 <div class="card">
                     <div class="card-header d-block pb-0 border-0">
                         <div class="d-sm-flex flex-wrap align-items-center d-block mb-md-3 mb-0">
                             <div class="mr-auto pr-3 mb-3">
                                 <h4 class="text-black fs-20">Orden #{{ $order->id }}</h4>

                             </div>
                         </div>
                     </div>
                     <div class="card-body loadmore-content" id="DietMenusContent">
                         <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
                             <div class="media-body col-lg-8 pl-0">
                                 <h6 class="fs-16 font-w600"><a class="text-black">{{ $order->contact }}</a>
                                 </h6>
                                 <p class="fs-14"><strong>Dirección: </strong>{{ $order->address }}.
                                 </p>
                                 <p class="fs-14"><strong>Referencia: </strong>
                                     {{ $order->referencia }}.</p>
                                 <p class="fs-14"><strong>Código postal: </strong>{{ $order->code_postal }}.
                                 </p>
                                 <p class="fs-14">
                                     <strong>Estado, municipio y localidad: </strong>{{ $order->state->nombre }},
                                     {{ $order->municipality->nombre }},
                                     {{ $order->locality->nombre }}
                                 </p>
                                 @if ($order->note)
                                     <p class="fs-14"><strong>Nota: </strong>{{ $order->note }}.
                                 @endif
                                 </p>
                                 <div class="d-flex flex-wrap align-items-center">
                                     <ul class="d-flex flex-wrap mb-sm-0 mb-2 mt-3">
                                         <li class="mb-2 mr-4 text-nowrap">

                                             <i class="fas fa-calendar-minus scale5 mr-2"></i>
                                             <span
                                                 class="fs-14 text-nowrap font-w500">{{ $order->created_at->format('d/m/y') }}
                                             </span>
                                         </li>
                                         <li class="mb-2 mr-4 text-nowrap">
                                             <i class="fas fa-phone-alt scale5 mr-2"></i>
                                             <span class="text-nowrap fs-14 font-w500"><a
                                                     href="tel:{{ $order->phone }}">{{ $order->phone }}</a></span>
                                         </li>
                                         <li class="text-nowrap mb-2">
                                             <i class="fas fa-envelope mr-2 scale5"></i>
                                             <span class="text-nowrap fs-14 font-w500"><a
                                                     href="mailto:{{ $order->email }}">{{ $order->email }}</a></span>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                             <a href="javascript:void(0);" data-toggle="modal" data-target="#aAddDietMenus"
                                 class="btn btn-primary light btn-md ml-auto"><i class="fa fa-plus scale5 mr-3"></i>Add
                                 Menu</a>
                         </div>
                     </div>
                     <div class="card-footer style-1 text-center border-0 pt-0 pb-4 d-flex align-items-center justify-content-center"
                         style="margin-top: -1rem">
                         @switch($order->status)
                             @case(1)
                                 <lottie-player src="{{ asset('json/pago-pendiente.json') }}" background="transparent"
                                     speed="1" style="width: 300px; height: auto;" loop autoplay></lottie-player>
                             @break
                             @case(2)
                                 <lottie-player src="{{ asset('json/pago-exitoso.json') }}" background="transparent"
                                     speed="1" style="width: 300px; height: auto;" loop autoplay></lottie-player>
                             @break
                             @case(3)
                                 <lottie-player src="{{ asset('json/enviado.json') }}" background="transparent" speed="1"
                                     style="width: 150px; height: auto;" loop autoplay></lottie-player>
                             @break
                             @case(4)
                                 <lottie-player src="{{ asset('json/entregado.json') }}" background="transparent"
                                     speed="1" style="width: 300px; height: auto; margin-top: -7rem;" loop autoplay>
                                 </lottie-player>
                             @break
                             @case(5)
                                 <lottie-player src="{{ asset('json/pago-cancelado.json') }}" background="transparent"
                                     speed="1" style="width: 300px; height: auto;" loop autoplay></lottie-player>
                             @break
                             @default
                         @endswitch
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>
