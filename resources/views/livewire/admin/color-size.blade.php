<div>
    <form class="comment-form mt-2" wire:submit.prevent="save">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Color <span class="required">*</span></label>
                    <select class="form-control " tabindex="-98" name="color_id" wire:model.defer="color_id">
                        <option selected disabled value="">Seleccione una color</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('color_id'))
                        <span>{{ $errors->first('color_id') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Cantidad <span class="required">*</span></label>
                    <input type="number" class="form-control" placeholder="Ingrese una cantidad"
                        wire:model.defer="quantity">
                    @if ($errors->has('quantity'))
                        <span>{{ $errors->first('quantity') }}</span>
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

    @if ($size_colors->count())
        <div class="table-responsive">
            <table class="table header-border table-hover verticle-middle">
                <thead>
                    <tr>
                        <th>Color</th>
                        <th>Cantidad</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($size_colors as $size_color)
                        <tr wire:key="size-color-pivot-{{ $size_color->pivot->id }}">
                            <td>{{ $colors->find($size_color->pivot->color_id)->name }}
                            </td>
                            <td>{{ $size_color->pivot->quantity }}</td>
                            <td>
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
                                        <a class="dropdown-item" data-toggle="modal" data-target="#EditarColorModal"
                                            wire:click="edit({{ $size_color->pivot->id }})">Editar color</a>
                                        <a class="dropdown-item"
                                            wire:click="$emit('deleteColorSize',{{ $size_color->pivot->id }})">Eliminar
                                            color</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @endif
    <hr />

    {{-- Modal Crear producto --}}
    <div class="modal fade" id="EditarColorModal" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar color</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="comment-form" wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-black font-w600">Color <span
                                            class="required">*</span></label>
                                    <select class="form-control " tabindex="-98" name="pivot_color_id"
                                        wire:model.defer="pivot_color_id">
                                        <option selected disabled value="">Seleccione una color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pivot_color_id'))
                                        <span>{{ $errors->first('pivot_color_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-black font-w600">Cantidad <span
                                            class="required">*</span></label>
                                    <input type="number" class="form-control" placeholder="Ingrese una cantidad"
                                        wire:model.defer="pivot_quantity">
                                    @if ($errors->has('pivot_quantity'))
                                        <span>{{ $errors->first('pivot_quantity') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="submit btn btn-primary"
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
            Livewire.on('messageColorSize', function(message) {
                Swal.fire({
                    title: 'Color agregado',
                    text: message,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>

        <script>
            Livewire.on('updateColorSize', function(message) {
                Swal.fire({
                    title: 'Color actualizado',
                    text: message,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#EditarColorModal').modal('hide')

            });
        </script>

        <script>
            Livewire.on('deleteColorSize', function(id) {
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
                            title: 'Color elimado',
                            text: "",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }
                })
            })
        </script>
    @endpush
</div>
