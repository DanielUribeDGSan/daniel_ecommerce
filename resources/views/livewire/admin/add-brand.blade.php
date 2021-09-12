<div x-data>
    <form class="comment-form" wire:submit.prevent="saveBrand">
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

            <div class="col-lg-12">
                <div class="form-group mb-0">
                    <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                        wire:loading.remove>Crear marca</button>
                    <div wire:loading wire:loading.class="d-flex align-items-center justify-content-center">
                        <x-loading />
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('script')
        <script>
            Livewire.on('newBrand', function() {
                Swal.fire({
                    title: 'Marca creada',
                    text: '',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#crearMarcaModal').modal('hide');

            });
        </script>
    @endpush
</div>
