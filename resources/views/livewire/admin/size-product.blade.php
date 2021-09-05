<div>
    <hr />
    <form class="comment-form mt-5" wire:submit.prevent="save">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Talla <span class="required">*</span></label>
                    <input type="text" class="form-control" placeholder="Ingrese una talla, ejemplo: SM"
                        wire:model.defer="talla">
                    @if ($errors->has('talla'))
                        <span>{{ $errors->first('talla') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group mb-0">
                    <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                        wire:loading.remove>Agregar</button>
                    <div wire:loading wire:target="save"
                        wire:loading.class="d-flex align-items-center justify-content-center">
                        <x-loading />
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if ($sizes->count())
        <div class="table-responsive mt-5">
            <table class="table header-border table-hover verticle-middle">
                <thead>
                    <tr>
                        <th>Talla</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sizes as $size)
                        <tr wire:key="size-{{ $size->id }}">
                            <td style="border: 0px;">
                                {{ $size->name }}
                            </td>
                            <td style="border: 0px;">
                                <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#EditarSizeModal"
                                            wire:click="edit({{ $size->id }})">Editar talla</a>
                                        <a class="dropdown-item"
                                            wire:click="$emit('deleteSize',{{ $size->id }})">Eliminar
                                            talla</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr wire:key="size-color-{{ $size->id }}">
                            <td style="border: 0px;"> @livewire('admin.color-size', ['size' => $size],
                                key('color-size'.$size->id))</td>
                            <td style="border: 0px;"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    {{-- Modal Crear producto --}}
    <div class="modal fade" id="EditarSizeModal" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar talla</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="comment-form" wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-black font-w600">Talla <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control"
                                        placeholder="Ingrese una talla, ejemplo: SM" wire:model.defer="tallaUpdate">
                                    @if ($errors->has('tallaUpdate'))
                                        <span>{{ $errors->first('tallaUpdate') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                                        wire:loading.remove>Actualizar</button>
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
            Livewire.on('messageSise', function(message) {
                Swal.fire({
                    title: 'Talla agregada',
                    text: message,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>

        <script>
            Livewire.on('SizeUpdate', function(message) {
                Swal.fire({
                    title: 'Talla actualizada',
                    text: message,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#EditarSizeModal').modal('hide')

            });
        </script>

        <script>
            Livewire.on('deleteSize', function(id) {
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
                        Livewire.emit('delete', id);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Talla elimada',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                })
            })
        </script>
    @endpush
</div>
