<div class="row" x-data>
    <div class="col-xl-12 col-xxl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card plan-list">
                    <div class="card-header d-sm-flex flex-wrap d-block pb-0 border-0">
                        <div class="mr-auto pr-3 mb-3">
                            <h4 class="text-black  fs-20">Ordenes</h4>
                            {{-- <p class="fs-13 mb-0 text-black font-w400">Aquí podras ver las ordenes recibidas,
                                canceladas,completadas.</p> --}}
                            <div class="input-group search-area d-xl-inline-flex d-none">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="javascript:void(0)"><i
                                                class="flaticon-381-search-2"></i></a></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search here..."
                                    wire:model="search">
                            </div>
                        </div>
                        <div class="card-action card-tabs mr-4 mt-3 mt-sm-0 mb-3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#All" role="tab"
                                        aria-selected="false">Todas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#pendientes" role="tab"
                                        aria-selected="true">Pendientes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#recibidas"
                                        role="tab">Recibidas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#enviadas" role="tab">Enviadas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#entregadas"
                                        role="tab">Entregadas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#anuladas" role="tab">Anuladas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body tab-content pt-2">
                        <div class="w-100" wire:loading>
                            <x-loading-table />
                        </div>
                        <div class="tab-pane fade" id="All" wire:loading.remove>
                            <div class="table-responsive overflow-x-hidden">
                                <table class="table table-sm mb-0 table-responsive-lg text-black w-100">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Orden</th>
                                            <th class="align-middle pr-7">Fecha</th>
                                            <th class="align-middle">Dirección</th>
                                            <th class="align-middle text-right">Status</th>
                                            <th class="align-middle text-right">Total</th>
                                            <th class="no-sort">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($todas as $orderItem)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <a href="#">
                                                        <strong>#{{ $orderItem->id }}</strong></a> de
                                                    <strong>{{ $orderItem->contact }}</strong><br /><a
                                                        href="mailto:{{ $orderItem->email }}">{{ $orderItem->email }}</a>
                                                </td>
                                                <td class="py-2">
                                                    {{ $orderItem->created_at->format('d/m/y') }}</p></span>
                                                </td>
                                                <td class="py-2">{{ $orderItem->address }},
                                                    {{ $orderItem->referencia }}.
                                                    {{ $orderItem->municipality->nombre }},
                                                    {{ $orderItem->locality->nombre }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    @switch($orderItem->status)
                                                        @case(1)
                                                            <span class="badge badge-warning">pendiente</span>
                                                        @break
                                                        @case(2)
                                                            <span class="badge badge-success">Recibida<span
                                                                    class="ml-1 fa fa-check"></span></span>
                                                        @break
                                                        @case(3)
                                                            <span class="badge badge-primary">Enviada</span>
                                                        @break
                                                        @case(4)
                                                            <span class="badge badge-success">Entregada<span
                                                                    class="ml-1 fa fa-check"></span></span>
                                                        @break
                                                        @case(5)
                                                            <span class="badge badge-danger">Anulada</span>
                                                        @break
                                                        @default
                                                    @endswitch

                                                </td>
                                                <td class="py-2 text-right">{{ $orderItem->total }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            id="order-dropdown-0" data-toggle="dropdown"
                                                            data-boundary="viewport" aria-haspopup="true"
                                                            aria-expanded="false"><span><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                                        </circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            aria-labelledby="order-dropdown-0">
                                                            <div class="py-2">
                                                                @switch($orderItem->status)
                                                                    @case(1)
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin.order', $orderItem) }}"
                                                                            target="_blank">Ver
                                                                            orden</a>
                                                                    @break
                                                                    @case(2)
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin.order', $orderItem) }}"
                                                                            target="_blank">Ver
                                                                            orden</a>
                                                                        <a class="dropdown-item">Notificar que se envío</a>
                                                                    @break
                                                                    @case(3)
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin.order', $orderItem) }}"
                                                                            target="_blank">Ver
                                                                            orden</a>
                                                                    @break
                                                                    @case(4)
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin.order', $orderItem) }}"
                                                                            target="_blank">Ver
                                                                            orden</a>
                                                                    @break
                                                                    @case(5)
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin.order', $orderItem) }}"
                                                                            target="_blank">Ver
                                                                            orden</a>
                                                                    @break
                                                                    @default
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane show fade" id="pendientes" wire:loading.remove>
                            <div class="table-responsive overflow-x-hidden">
                                <table class="table table-sm mb-0 table-responsive-lg text-black w-100">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Orden</th>
                                            <th class="align-middle pr-7">Fecha</th>
                                            <th class="align-middle">Dirección</th>
                                            <th class="align-middle text-right">Status</th>
                                            <th class="align-middle text-right">Total</th>
                                            <th class="no-sort">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($pendiente as $orderItem)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <a href="#">
                                                        <strong>#{{ $orderItem->id }}</strong></a> de
                                                    <strong>{{ $orderItem->contact }}</strong><br /><a
                                                        href="mailto:{{ $orderItem->email }}">{{ $orderItem->email }}</a>
                                                </td>
                                                <td class="py-2">
                                                    {{ $orderItem->created_at->format('d/m/y') }}</p></span>
                                                </td>
                                                <td class="py-2">{{ $orderItem->address }},
                                                    {{ $orderItem->referencia }}.
                                                    {{ $orderItem->municipality->nombre }},
                                                    {{ $orderItem->locality->nombre }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <span class="badge badge-warning">pendiente</span>
                                                </td>
                                                <td class="py-2 text-right">{{ $orderItem->total }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            id="order-dropdown-0" data-toggle="dropdown"
                                                            data-boundary="viewport" aria-haspopup="true"
                                                            aria-expanded="false"><span><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                                        </circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            aria-labelledby="order-dropdown-0">
                                                            <div class="py-2">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.order', $orderItem) }}"
                                                                    target="_blank">Ver
                                                                    orden</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane active" id="recibidas" wire:loading.remove>
                            <div class="table-responsive overflow-x-hidden">
                                <table class="table table-sm mb-0 table-responsive-lg text-black w-100">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Orden</th>
                                            <th class="align-middle pr-7">Fecha</th>
                                            <th class="align-middle">Dirección</th>
                                            <th class="align-middle text-right">Status</th>
                                            <th class="align-middle text-right">Total</th>
                                            <th class="no-sort">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($recibido as $orderItem)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <a href="#">
                                                        <strong>#{{ $orderItem->id }}</strong></a> de
                                                    <strong>{{ $orderItem->contact }}</strong><br /><a
                                                        href="mailto:{{ $orderItem->email }}">{{ $orderItem->email }}</a>
                                                </td>
                                                <td class="py-2">
                                                    {{ $orderItem->created_at->format('d/m/y') }}</p></span>
                                                </td>
                                                <td class="py-2">{{ $orderItem->address }},
                                                    {{ $orderItem->referencia }}.
                                                    {{ $orderItem->municipality->nombre }},
                                                    {{ $orderItem->locality->nombre }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <span class="badge badge-success">Recibida<span
                                                            class="ml-1 fa fa-check"></span></span>
                                                </td>
                                                <td class="py-2 text-right">{{ $orderItem->total }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            id="order-dropdown-0" data-toggle="dropdown"
                                                            data-boundary="viewport" aria-haspopup="true"
                                                            aria-expanded="false"><span><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                                        </circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            aria-labelledby="order-dropdown-0">
                                                            <div class="py-2">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.order', $orderItem) }}"
                                                                    target="_blank">Ver
                                                                    orden</a>
                                                                <a class="dropdown-item">Notificar que se envío</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="enviadas" wire:loading.remove>
                            <div class="table-responsive overflow-x-hidden">
                                <table class="table table-sm mb-0 table-responsive-lg text-black w-100">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Orden</th>
                                            <th class="align-middle pr-7">Fecha</th>
                                            <th class="align-middle">Dirección</th>
                                            <th class="align-middle text-right">Status</th>
                                            <th class="align-middle text-right">Total</th>
                                            <th class="no-sort">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($enviado as $orderItem)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <a href="#">
                                                        <strong>#{{ $orderItem->id }}</strong></a> de
                                                    <strong>{{ $orderItem->contact }}</strong><br /><a
                                                        href="mailto:{{ $orderItem->email }}">{{ $orderItem->email }}</a>
                                                </td>
                                                <td class="py-2">
                                                    {{ $orderItem->created_at->format('d/m/y') }}</p></span>
                                                </td>
                                                <td class="py-2">{{ $orderItem->address }},
                                                    {{ $orderItem->referencia }}.
                                                    {{ $orderItem->municipality->nombre }},
                                                    {{ $orderItem->locality->nombre }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <span class="badge badge-primary">Enviada</span>
                                                </td>
                                                <td class="py-2 text-right">{{ $orderItem->total }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            id="order-dropdown-0" data-toggle="dropdown"
                                                            data-boundary="viewport" aria-haspopup="true"
                                                            aria-expanded="false"><span><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                                        </circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            aria-labelledby="order-dropdown-0">
                                                            <div class="py-2">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.order', $orderItem) }}"
                                                                    target="_blank">Ver
                                                                    orden</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="entregadas" wire:loading.remove>
                            <div class="table-responsive overflow-x-hidden">
                                <table class="table table-sm mb-0 table-responsive-lg text-black w-100">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Orden</th>
                                            <th class="align-middle pr-7">Fecha</th>
                                            <th class="align-middle">Dirección</th>
                                            <th class="align-middle text-right">Status</th>
                                            <th class="align-middle text-right">Total</th>
                                            <th class="no-sort">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($entregado as $orderItem)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <a href="#">
                                                        <strong>#{{ $orderItem->id }}</strong></a> de
                                                    <strong>{{ $orderItem->contact }}</strong><br /><a
                                                        href="mailto:{{ $orderItem->email }}">{{ $orderItem->email }}</a>
                                                </td>
                                                <td class="py-2">
                                                    {{ $orderItem->created_at->format('d/m/y') }}</p></span>
                                                </td>
                                                <td class="py-2">{{ $orderItem->address }},
                                                    {{ $orderItem->referencia }}.
                                                    {{ $orderItem->municipality->nombre }},
                                                    {{ $orderItem->locality->nombre }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <span class="badge badge-success">Entregada<span
                                                            class="ml-1 fa fa-check"></span></span>
                                                </td>
                                                <td class="py-2 text-right">{{ $orderItem->total }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            id="order-dropdown-0" data-toggle="dropdown"
                                                            data-boundary="viewport" aria-haspopup="true"
                                                            aria-expanded="false"><span><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                                        </circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            aria-labelledby="order-dropdown-0">
                                                            <div class="py-2">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.order', $orderItem) }}"
                                                                    target="_blank">Ver
                                                                    orden</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="anuladas" wire:loading.remove>
                            <div class="table-responsive overflow-x-hidden">
                                <table class="table table-sm mb-0 table-responsive-lg text-black w-100">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Orden</th>
                                            <th class="align-middle pr-7">Fecha</th>
                                            <th class="align-middle">Dirección</th>
                                            <th class="align-middle text-right">Status</th>
                                            <th class="align-middle text-right">Total</th>
                                            <th class="no-sort">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($anulado as $orderItem)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <a href="#">
                                                        <strong>#{{ $orderItem->id }}</strong></a> de
                                                    <strong>{{ $orderItem->contact }}</strong><br /><a
                                                        href="mailto:{{ $orderItem->email }}">{{ $orderItem->email }}</a>
                                                </td>
                                                <td class="py-2">
                                                    {{ $orderItem->created_at->format('d/m/y') }}</p></span>
                                                </td>
                                                <td class="py-2">{{ $orderItem->address }},
                                                    {{ $orderItem->referencia }}.
                                                    {{ $orderItem->municipality->nombre }},
                                                    {{ $orderItem->locality->nombre }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <span class="badge badge-danger">Anulada</span>
                                                </td>
                                                <td class="py-2 text-right">{{ $orderItem->total }}
                                                </td>
                                                <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            id="order-dropdown-0" data-toggle="dropdown"
                                                            data-boundary="viewport" aria-haspopup="true"
                                                            aria-expanded="false"><span><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                                        </circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            aria-labelledby="order-dropdown-0">
                                                            <div class="py-2">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.order', $orderItem) }}"
                                                                    target="_blank">Ver
                                                                    orden</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
