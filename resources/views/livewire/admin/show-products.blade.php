<div x-data>
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Productos</h4>
                    <a class="btn btn-primary mb-1 mr-1 float-right" data-toggle="modal"
                        data-target="#crearProductoModal">Crear nuevo producto</a>

                </div>
                <div class="card-body">
                    <div class="input-group search-area d-xl-inline-flex d-none">
                        <div class="input-group-append">
                            <span class="input-group-text"><a href="javascript:void(0)"><i
                                        class="flaticon-381-search-2"></i></a></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search here..." wire:model="search">
                    </div>
                    <div class="table-responsive" wire:loading.remove>
                        <table class="table header-border table-hover verticle-middle">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th>Existencias</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($productos as $product)

                                    <tr>
                                        <td>
                                            @isset($product->images->first()->url)
                                                <img class="circle-image"
                                                    src="{{ asset('assets/images/' . $product->images->first()->url) }}"
                                                    alt="kasa shop">
                                            @endisset
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->subcategory->category->name }}</td>
                                        <td>{{ $product->price }} MXN</td>
                                        <td>
                                            @switch($product->status)
                                                @case(1)
                                                    <span class="badge light badge-borrador">
                                                        <i class="fa fa-circle text-borrador mr-1"></i>
                                                        Borrador
                                                    </span>
                                                @break
                                                @case(2)
                                                    <span class="badge light badge-publicado">
                                                        <i class="fa fa-circle text-publicado mr-1"></i>
                                                        Publicado
                                                    </span>
                                                @break

                                                @default

                                            @endswitch
                                        </td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="
                                                        {{ route('admin.products.edit', $product) }}"
                                                        target="__blank">Editar
                                                        producto</a>
                                                    <a class="dropdown-item" href="#">Eliminar producto</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $productos->links() }}
                    </div>
                    <div class="w-100" wire:loading>
                        <x-loading-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Crear producto --}}
    <div class="modal fade" id="crearProductoModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear producto</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    @livewire('admin.add-product')
                </div>
            </div>
        </div>
    </div>


</div>
