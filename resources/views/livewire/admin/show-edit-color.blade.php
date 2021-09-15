<div x-data>
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tabla</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Colores</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Colores</h4>
                    <a class="btn btn-primary mb-1 mr-1 float-right" data-toggle="modal"
                        data-target="#crearColorModal">Crear nuevo color</a>

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
                                    <th>Exadecimal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($colores as $color)

                                    <tr>
                                        <td>{{ $color->name }}</td>
                                        <td>{{ $color->hex }}</td>
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
                                                        data-target="#editarColorModal"
                                                        wire:click="edit('{{ $color->id }}')">Editar
                                                        color</a>
                                                    <a class="dropdown-item"
                                                        wire:click="$emit('eliminarColor','{{ $color->id }}')">Eliminar
                                                        color</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $colores->links() }}
                    </div>
                    <div class="w-100" wire:loading>
                        <x-loading-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Crear producto --}}
    <div class="modal fade" id="crearColorModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear subcategoría</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    @livewire('admin.add-color', ['color' => $color])
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarColorModal" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar subcategoría</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="comment-form" wire:submit.prevent="editColor">
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-black font-w600">Color exadecimal <span
                                            class="required">*</span></label>
                                    <div class="example" wire:ignore>
                                        <input type="text" class="complex-colorpicker form-control w-100"
                                            wire:model.defer="editForm.hex" />
                                    </div>
                                    @if ($errors->has('editForm.hex'))
                                        <span>{{ $errors->first('editForm.hex') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                                        wire:loading.remove>Actualizar color</button>
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
            Livewire.on('eliminarColor', function(colorId) {
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
                        Livewire.emitTo('admin.show-edit-color', 'deleteColor', `${colorId}`);
                        Swal.fire({
                            title: 'Color elimado',
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
            Livewire.on('messageUpdateColors', function() {
                Swal.fire({
                    title: 'Color actualizado',
                    text: '',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#editarColorModal').modal('hide');

            });
        </script>
    @endpush
</div>
