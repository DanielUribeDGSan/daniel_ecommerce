<div x-data>
    <form class="comment-form" wire:submit.prevent="saveColor">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Nombre <span class="required">*</span></label>
                    <input type="text" class="form-control" placeholder="Nombre" wire:model.defer="createForm.name">
                    @if ($errors->has('createForm.name'))
                        <span>{{ $errors->first('createForm.name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Color exadecimal <span class="required">*</span></label>
                    <div class="example" wire:ignore>
                        <input type="text" class="complex-colorpicker form-control w-100" value="#7ab2fa"
                            wire:model.defer="createForm.hex" />
                    </div>
                    @if ($errors->has('createForm.hex'))
                        <span>{{ $errors->first('createForm.hex') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group mb-0">
                    <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                        wire:loading.remove>Crear color</button>
                    <div wire:loading wire:loading.class="d-flex align-items-center justify-content-center">
                        <x-loading />
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('script')
        <script>
            Livewire.on('newColor', function() {
                Swal.fire({
                    title: 'Color creado',
                    text: '',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#crearColorModal').modal('hide');

            });
        </script>
    @endpush
</div>
