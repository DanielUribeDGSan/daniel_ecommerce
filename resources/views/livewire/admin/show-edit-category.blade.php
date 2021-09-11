<div x-data>
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tabla</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Categorías</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categorias</h4>
                    <a class="btn btn-primary mb-1 mr-1 float-right" data-toggle="modal"
                        data-target="#crearCategoriaModal">Crear nueva categoría</a>

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
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)

                                    <tr>
                                        <td class="d-flex align-items-center justify-content-center">
                                            @isset($category->image)
                                                <img class="circle-image" src="{{ Storage::url($category->image) }}"
                                                    alt="kasa shop">
                                            @endisset
                                        </td>
                                        <td>{{ $category->name }}</td>
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
                                                        data-target="#editarCategoriaModal"
                                                        wire:click="edit('{{ $category->slug }}')">Editar
                                                        categoría</a>
                                                    <a class="dropdown-item"
                                                        wire:click="$emit('eliminarCategory','{{ $category->slug }}')">Eliminar
                                                        categoría</a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.category.show', $category) }}"
                                                        target="_blank">Subcategorías</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                    <div class="w-100" wire:loading>
                        <x-loading-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Crear producto --}}
    <div class="modal fade" id="crearCategoriaModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear categoría</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    @livewire('admin.add-category')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarCategoriaModal" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar categoría</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="comment-form" wire:submit.prevent="updateCategory">
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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-black font-w600">Marcas <span
                                            class="required">*</span></label>
                                    <div class="row m-0">
                                        @foreach ($brands as $brand)
                                            <div class="col-4 mb-2">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            value="{{ $brand->id }}"
                                                            wire:model.defer="editForm.brands" name="brands[]" />
                                                        {{ $brand->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('editForm.brands'))
                                        <span>{{ $errors->first('editForm.brands') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-black font-w600">Imagen <span
                                            class="required">*</span></label>
                                    <input accept="image/*" type="file" class="form-control" wire:model="editImage">
                                    @if ($errors->has('editImage'))
                                        <span>{{ $errors->first('editImage') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="submit btn btn-primary"
                                        wire:loading.attr="disabled">Actualizar categoría</button>
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
            Livewire.on('eliminarCategory', function(categorySlug) {
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
                        Livewire.emitTo('admin.create-category', 'deleteCategory', `${categorySlug}`);
                        Swal.fire({
                            title: 'Categoría elimada',
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
            Livewire.on('messageUpdateCategory', function() {
                Swal.fire({
                    title: 'Categoría actualizada',
                    text: '',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#editarCategoriaModal').modal('hide');

            });
        </script>
    @endpush
</div>
