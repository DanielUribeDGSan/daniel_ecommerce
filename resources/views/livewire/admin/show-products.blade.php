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
                    <div class="table-responsive">
                        <table id="example5" class="datatable-add-products talbe-products display min-w850">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th>Existencias</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($productos as $producto)

                                    <tr>
                                        <td><span class="mr-2">#P-{{ $producto->id }}</span>
                                            @isset($producto->images->first()->url)
                                                <img class="circle-image"
                                                    src="{{ asset('assets/images/' . $producto->images->first()->url) }}"
                                                    alt="kasa shop">
                                            @endisset
                                        </td>
                                        <td>{{ $producto->name }}</td>
                                        <td>{{ $producto->subcategory->category->name }}</td>
                                        <td>{{ $producto->price }} MXN</td>
                                        <td>
                                            @switch($producto->status)
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
                                        <td>{{ $producto->quantity }}</td>
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
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#editarProductoModal">Editar
                                                        producto</a>
                                                    <a class="dropdown-item" href="#">Eliminar producto</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Actualizar producto -->
                                    <div class="modal fade" id="editarProductoModal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar producto</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    @livewire('admin.edit-product',['producto' => $producto])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
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
