<div x-data>
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tabla</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Marcas</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Marcas</h4>
                    <a class="btn btn-primary mb-1 mr-1 float-right" data-toggle="modal"
                        data-target="#crearMarcaModal">Crear nueva marca</a>

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
                                    <th>Nombre</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($brands as $brandItem)

                                    <tr>
                                        <td>{{ $brandItem->name }}</td>
                                        <td>
                                            <div class="dropdown">
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
                                                        data-target="#editarMarcasModal"
                                                        wire:click="edit('{{ $brandItem->id }}')">Editar
                                                        marca</a>
                                                    <a class="dropdown-item"
                                                        wire:click="$emit('eliminarBrand','{{ $brandItem->id }}')">Eliminar
                                                        marca</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $brands->links() }}
                    </div>
                    <div class="w-100" wire:loading>
                        <x-loading-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Crear producto --}}
    <div class="modal fade" id="crearMarcaModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear subcategoría</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    @livewire('admin.add-brand', ['brand' => $brand])
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarMarcasModal" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar subcategoría</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="comment-form" wire:submit.prevent="editBrand">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-black font-w600">Nombre <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nombre"
                                        wire:model.defer="editForm.name">
                                    @if ($errors->has('editForm.name'))
                                        <span>{{ $errors->first('editForm.name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                                        wire:loading.remove>Actualizar marca</button>
                                    <div wire:loading
                                        wire:loading.class="d-flex align-items-center justify-content-center">
                                        <x-loading />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')

        <script>
            Livewire.on('eliminarBrand', function(brandId) {
                Swal.fire({
                    title: '¿Está seguro(a)?',
                    text: "No podrás revertir esto.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, bórralo.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.show-edit-brand', 'deleteBrand', `${brandId}`);
                        Swal.fire({
                            title: 'Marca elimada',
                            text: "",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false
                        })
                    }
                })
            })
        </script>

        <script>
            Livewire.on('messageUpdateBrands', function() {
                Swal.fire({
                    title: 'Marca actualizada',
                    text: '',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#editarMarcasModal').modal('hide');

            });
        </script>
    @endpush
</div>
