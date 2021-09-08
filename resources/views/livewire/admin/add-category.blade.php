<div x-data>
    <form class="comment-form" wire:submit.prevent="saveCategory">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Nombre <span class="required">*</span></label>
                    <input type="text" class="form-control" placeholder="Nombre" wire:model.defer="createForm.name">
                    @if ($errors->has('name'))
                        <span>{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="text-black font-w600">Marcas <span class="required">*</span></label>
                    <div class="row m-0">
                        @foreach ($brands as $brand)
                            <div class="col-4 mb-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="{{ $brand->id }}"
                                            wire:model.defer="createForm.brands" name="brands[]" />
                                        {{ $brand->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Imagen <span class="required">*</span></label>
                    <input type="file" class="form-control" wire:model.defer="file">
                    @if ($errors->has('name'))
                        <span>{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group mb-0">
                    <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                        wire:loading.remove>Crear categoría</button>
                    <div wire:loading wire:loading.class="d-flex align-items-center justify-content-center">
                        <x-loading />
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('script')
        <script>
            Livewire.on('addCategory', function(message) {
                Swal.fire({
                    title: 'Producto creado',
                    text: message,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endpush
</div>
