<div x-data>
    <form class="comment-form">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Categorias <span class="required">*</span></label>
                    <select class="form-control default-select" tabindex="-98" wire:model="category_id">
                        <option selected disabled value="">Seleccione una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Subcategorias <span class="required">*</span></label>
                    <select class="form-control default-select" tabindex="-98" wire:model="subcategory_id">
                        <option selected disabled value="">Seleccione una subcategoría</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Nombre <span class="required">*</span></label>
                    <input type="text" class="form-control" placeholder="Nombre" wire:model.defer="name">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Marca <span class="required">*</span></label>
                    <select class="form-control default-select" tabindex="-98" wire:model="brand_id">
                        <option selected disabled value="">Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Precio <span class="required">*</span></label>
                    <input type="number" class="form-control" placeholder="Precio" wire:model.defer="price" step=".01">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="text-black font-w600">Cantidad de stock <span class="required">*</span></label>
                    <input type="number" class="form-control" placeholder="Cantidad" wire:model.defer="quantity">
                </div>
            </div>
            @if ($subcategory_id)
                @if (!$this->subcategory->color && !$this->subcategory->size)
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-black font-w600">Cantidad de stock <span
                                    class="required">*</span></label>
                            <input type="number" class="form-control" placeholder="Cantidad"
                                wire:model.defer="quantity">
                        </div>
                    </div>
                @endif
            @endif
            <div class="col-lg-12">
                <div class="form-group" wire:ignore>
                    <label class="text-black font-w600">Descripnción</label>
                    <textarea rows="8" class="form-control" placeholder="descripción" wire:model="description" x-init="ClassicEditor.create($refs.miEditor)
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );" x-ref="miEditor"></textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group mb-0">
                    <input type="submit" value="Post Comment" class="submit btn btn-primary" name="submit">
                </div>
            </div>
        </div>
    </form>
</div>
