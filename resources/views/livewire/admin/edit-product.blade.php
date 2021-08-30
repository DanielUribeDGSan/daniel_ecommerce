   <div x-data>
       <div class="page-titles">
           <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="javascript:void(0)">Producto</a></li>
               <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $product->name }}</a></li>
           </ol>
       </div>
       <!-- row -->
       <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-header">
                       <h4 class="card-title">Editar</h4>

                   </div>
                   <div class="card-body">
                       <form class="comment-form" wire:submit.prevent="save">
                           <div class="row">
                               <div class="col-lg-6">
                                   <div class="form-group">
                                       <label class="text-black font-w600">Categorias <span
                                               class="required">*</span></label>
                                       <select class="form-control default-select" tabindex="-98"
                                           wire:model="category_id">
                                           <option selected disabled value="">Seleccione una categoría</option>
                                           @foreach ($categories as $category)
                                               <option value="{{ $category->id }}">{{ $category->name }}</option>
                                           @endforeach
                                       </select>
                                       @if ($errors->has('category_id'))
                                           <span>{{ $errors->first('category_id') }}</span>
                                       @endif
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-group">
                                       <label class="text-black font-w600">Subcategorias <span
                                               class="required">*</span></label>
                                       <select class="form-control default-select" tabindex="-98"
                                           wire:model="product.subcategory_id">
                                           <option selected disabled value="">Seleccione una subcategoría</option>
                                           @foreach ($subcategories as $subcategory)
                                               <option value="{{ $subcategory->id }}">{{ $subcategory->name }}
                                               </option>
                                           @endforeach
                                       </select>
                                       @if ($errors->has('product.subcategory_id'))
                                           <span>{{ $errors->first('product.subcategory_id') }}</span>
                                       @endif
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-group">
                                       <label class="text-black font-w600">Nombre <span
                                               class="required">*</span></label>
                                       <input type="text" class="form-control" placeholder="Nombre"
                                           wire:model.defer="product.name">
                                       @if ($errors->has('product.name'))
                                           <span>{{ $errors->first('product.name') }}</span>
                                       @endif
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-group">
                                       <label class="text-black font-w600">Marca <span class="required">*</span></label>
                                       <select class="form-control default-select" tabindex="-98"
                                           wire:model="product.brand_id">
                                           <option selected disabled value="">Seleccione una marca</option>
                                           @foreach ($brands as $brand)
                                               <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                           @endforeach
                                       </select>
                                       @if ($errors->has('product.brand_id'))
                                           <span>{{ $errors->first('product.brand_id') }}</span>
                                       @endif
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-group">
                                       <label class="text-black font-w600">Precio<span class="required">*</span></label>
                                       <input type="number" class="form-control" placeholder="Precio"
                                           wire:model.defer="product.price" step=".01">
                                       @if ($errors->has('product.price'))
                                           <span>{{ $errors->first('product.price') }}</span>
                                       @endif
                                   </div>
                               </div>
                               @if ($this->subcategory)
                                   @if (!$this->subcategory->color && !$this->subcategory->size)
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label class="text-black font-w600">Cantidad de stock <span
                                                       class="required">*</span></label>
                                               <input type="number" class="form-control" placeholder="Cantidad"
                                                   wire:model.defer="product.quantity">
                                               @if ($errors->has('product.quantity'))
                                                   <span>{{ $errors->first('product.quantity') }}</span>
                                               @endif
                                           </div>
                                       </div>
                                   @endif
                               @endif
                           </div>
                           <div class="row">
                               <div class="col-lg-12">
                                   <div class="form-group" wire:ignore>
                                       <label class="text-black font-w600">Descripnción</label>
                                       <textarea rows="8" class="form-control" placeholder="descripción" rows="4"
                                           wire:model="description" x-data x-init="ClassicEditor.create($refs.miEditor)
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
                                       <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                                           wire:loading.remove>Editar producto</button>
                                       <div wire:loading
                                           wire:loading.class="d-flex align-items-center justify-content-center">
                                           <x-loading />
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </form>
                       @push('script')

                           <script>
                               Livewire.on('messageUpdate', function(message) {
                                   Swal.fire({
                                       title: 'Producto editado',
                                       text: message,
                                       icon: 'success',
                                       showCancelButton: false,
                                       confirmButtonColor: '#3085d6',
                                       confirmButtonText: 'Aceptar'
                                   });
                               });
                           </script>

                       @endpush


                       @if ($this->subcategory)

                           @if ($this->subcategory->size)

                               @livewire('admin.size-product', ['product' => $product], key('size-product-' .
                               $product->id))

                           @elseif($this->subcategory->color)

                               @livewire('admin.color-product', ['product' => $product], key('color-product-' .
                               $product->id))

                           @endif

                       @endif

                   </div>
               </div>
           </div>
       </div>
   </div>
