<div x-data>
    <form class="comment-form" wire:submit.prevent="saveSubcategory">
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
                    <label class="text-black font-w600">¿Está subcategoría necesita especificar color? <span
                            class="required">*</span></label>
                    <div class="form-group mb-0">
                        <label class="radio-inline mr-3"><input type="radio" name="color" value="1"
                                wire:model.defer="createForm.color"> Sí</label>
                        <label class="radio-inline mr-3"><input type="radio" name="color" value="0"
                                wire:model.defer="createForm.color"> No</label>

                    </div>
                    @if ($errors->has('createForm.color'))
                        <span>{{ $errors->first('createForm.color') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">¿Está subcategoría necesita especificar talla? <span
                            class="required">*</span></label>
                    <div class="form-group mb-0">
                        <label class="radio-inline mr-3"><input type="radio" name="size" value="1"
                                wire:model.defer="createForm.size"> Sí</label>
                        <label class="radio-inline mr-3"><input type="radio" name="size" value="0"
                                wire:model.defer="createForm.size"> No</label>

                    </div>
                    @if ($errors->has('createForm.size'))
                        <span>{{ $errors->first('createForm.size') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group mb-0">
                    <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                        wire:loading.remove>Crear subcategoría</button>
                    <div wire:loading wire:loading.class="d-flex align-items-center justify-content-center">
                        <x-loading />
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('script')
        <script>
            Livewire.on('newSubcategory', function() {
                Swal.fire({
                    title: 'Subcategoría creada',
                    text: '',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#crearSubcategoriaModal').modal('hide');

            });
        </script>
    @endpush
</div>
