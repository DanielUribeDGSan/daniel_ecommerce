   <div x-data>
       <div class="page-titles">
           <ol class="breadcrumb">
               <li class="breadcrumb-item li__title-product"><a href="javascript:void(0)">Producto</a></li>
               <li class="breadcrumb-item active li__name-product"><a
                       href="javascript:void(0)">{{ $product->name }}</a></li>
               <li class="li__btn-delete">
                   <button type="button" class="btn btn-danger float-right" wire:loading.attr="disabled"
                       wire:click="$emit('eliminarProducto')">Eliminar
                       producto</button>
                   <div wire:loading wire:target="save"
                       wire:loading.class="d-flex align-items-center justify-content-center">
                       <x-loading />
                   </div>
               </li>
           </ol>
       </div>
       @livewire('admin.status-product', ['product' => $product], key('status-product-'.$product->id))

       <div class="mb-4" wire:ignore>
           <form action="{{ route('admin.products.files', $product) }}" method="post" class="dropzone"
               id="my-awesome-dropzone"></form>
       </div>
       @if ($product->images->count())
           <div class="mb-3">
               <div class="card">
                   <div class="card-header">
                       <h4 class="card-title">Imagenes subidas</h4>
                   </div>
                   <div class="card-body">
                       <div class="row">
                           @foreach ($product->images as $image)
                               <div class="col-lg-3 col-md-4 col-6 mt-4 position-relative">
                                   <div class="d-flex align-items-center justify-content-center">
                                       <div class="content__product"
                                           style="background-image: url({{ asset('assets/images/' . $image->url) }});">
                                       </div>
                                   </div>
                                   <div class="d-flex align-items-center justify-content-center delete-image"
                                       wire:key="image-{{ $image->id }}">
                                       <button class="btn-delete" wire:click="deleteImage({{ $image->id }})"
                                           wire:loading.attr="disabled" wire:loading.remove><i
                                               class="far fa-trash-alt cl-azul"></i></button>
                                       <div wire:loading>
                                           <x-loading-img />
                                       </div>
                                   </div>
                               </div>
                           @endforeach
                       </div>
                   </div>
               </div>
           </div>
       @endif
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
                                               <option value="{{ $category->id }}">{{ $category->name }}
                                               </option>
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
                                           <option selected disabled value="">Seleccione una subcategoría
                                           </option>
                                           @foreach ($subcategories as $subcategory)
                                               <option value="{{ $subcategory->id }}">
                                                   {{ $subcategory->name }}
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
                                       <label class="text-black font-w600">Marca <span
                                               class="required">*</span></label>
                                       <select class="form-control default-select" tabindex="-98"
                                           wire:model="product.brand_id">
                                           <option selected disabled value="">Seleccione una marca</option>
                                           @foreach ($brands as $brand)
                                               <option value="{{ $brand->id }}">{{ $brand->name }}
                                               </option>
                                           @endforeach
                                       </select>
                                       @if ($errors->has('product.brand_id'))
                                           <span>{{ $errors->first('product.brand_id') }}</span>
                                       @endif
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-group">
                                       <label class="text-black font-w600">Precio<span
                                               class="required">*</span></label>
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
                                           wire:model.defer="description" x-data x-init="ClassicEditor.create($refs.miEditor)
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
                           </div>
                           <div class="row">
                               <div class="col-lg-12">
                                   <div class="form-group mb-0">
                                       <button type="submit" class="submit btn btn-primary"
                                           wire:loading.attr="disabled">Editar producto</button>
                                       <div wire:loading wire:target="save"
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

       @push('script')
           <script>
               Dropzone.options.myAwesomeDropzone = {
                   headers: {
                       'X-CSRF-TOKEN': "{{ csrf_token() }}"
                   },
                   dictDefaultMessage: "Selecciona o arrasta tu imagen",
                   acceptedFiles: 'image/*',
                   paramName: "file", // The name that will be used to transfer the file
                   maxFilesize: 2, // MB
                   complete: function(file) {
                       this.removeFile(file);
                   },
                   queuecomplete: function() {
                       Livewire.emit('refreshImage');
                   }
               };
           </script>

           <script>
               Livewire.on('eliminarProducto', function() {
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
                           Livewire.emitTo('admin.edit-product', 'delete');
                           Swal.fire({
                               title: 'Producto elimado',
                               text: "",
                               icon: 'success',
                               showCancelButton: false,
                               confirmButtonColor: '#3085d6',
                               cancelButtonColor: '#d33',
                               confirmButtonText: 'Aceptar',
                               allowOutsideClick: false
                           }).then((result) => {
                               if (result.isConfirmed) {
                                   // location.reload();
                               }
                           })
                       }
                   })
               })
           </script>

           <script>
               Livewire.on('closeWindow', function() {
                   window.close();
               })
           </script>
           {{-- Size product --}}
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
               Livewire.on('errorSize', function(message) {
                   Swal.fire({
                       title: message,
                       text: '',
                       icon: 'info',
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       confirmButtonText: 'Aceptar'
                   });

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
                           Livewire.emitTo('admin.size-product', 'delete', id);
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
           {{-- Color product --}}
           <script>
               Livewire.on('messageColor', function(message) {
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
               Livewire.on('updateColor', function(message) {
                   Swal.fire({
                       title: 'Color actualizado',
                       text: message,
                       icon: 'success',
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       confirmButtonText: 'Aceptar'
                   });
                   $('#EditarColorModal1').modal('hide');

               });
           </script>

           <script>
               Livewire.on('deleteColor', function(id) {
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
                           Livewire.emitTo('admin.color-product', 'delete', id);
                           Swal.fire({
                               position: 'top-end',
                               icon: 'success',
                               title: 'Color elimado',
                               showConfirmButton: false,
                               timer: 1500
                           })
                       }
                   })
               })
           </script>
           {{-- Color size --}}
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
                   $('#EditarColorModal2').modal('hide');

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
                           Livewire.emitTo('admin.color-size', 'delete', id);
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
                                   // location.reload();
                               }
                           })
                       }
                   })
               })
           </script>

           {{-- Ststus --}}
           <script>
               Livewire.on('messageStatus', function(message) {
                   Swal.fire({
                       title: message,
                       text: '',
                       icon: 'success',
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       confirmButtonText: 'Aceptar'
                   });
                   $('#EditarColorModal2').modal('hide');

               });
           </script>

           <script>
               Livewire.on('messageStatusError', function() {
                   Swal.fire({
                       title: 'Imagenes requeridas',
                       text: 'Es necesario que por lo menos exista una imagen en el producto, antes de poderlo publicar.',
                       icon: 'info',
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       confirmButtonText: 'Aceptar'
                   });
                   $('#EditarColorModal2').modal('hide');

               });
           </script>
       @endpush
   </div>
