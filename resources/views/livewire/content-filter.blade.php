<div x-data class="shop-area shop-page-responsive pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper mb-40">
                    <div class="shop-topbar-left" data-aos-delay="200">
                        <div class="showing-item">
                            <span>Showing 1–12 of 60 results</span>
                        </div>
                    </div>
                    <div class="shop-topbar-right" data-aos-delay="400">
                        <div class="shop-sorting-area">
                            <select class="nice-select nice-select-style-1">
                                <option>Default Sorting</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by latest</option>
                            </select>
                        </div>
                        <div class="shop-view-mode nav">
                            <a class="active" href="#shop-1" data-bs-toggle="tab"><i class=" ti-layout-grid3 "></i>
                            </a>
                            <a href="#shop-2" data-bs-toggle="tab" class=""><i class=" ti-view-list-alt "></i></a>
                        </div>
                    </div>
                </div>
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            @if ($product_clean == 1)
                                <x-product-no-disponible />
                            @endif
                            <div wire:init="loadData" class="row">
                                @if ($loading == 1)
                                    @foreach ($products as $product)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="product-wrap mb-35" data-aos-delay="400">
                                                <div class="product-img img-zoom mb-25">
                                                    <a href="{{ route('producto', $product) }}">
                                                        <div class="content__product"
                                                            style="background-image: url({{ asset('assets/images/' . $product->images->first()->url) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                                                        </div>
                                                    </a>
                                                    <div class="product-action-wrap">
                                                        <button class="product-action-btn-1" title="Wishlist"><i
                                                                class="pe-7s-like"></i></button>
                                                        <button class="product-action-btn-1" title="Quick View"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="pe-7s-look"></i>
                                                        </button>
                                                    </div>
                                                    <div class="product-action-2-wrap">
                                                        <img class=" img__cart img__none img-float"
                                                            src="{{ asset('assets/images/' . $product->images->first()->url) }}"
                                                            alt="kasa" width="50">
                                                        <button class="product-action-btn-2 cart-btn"
                                                            title="Add To Cart"
                                                            wire:click="addItem({{ $product->id }})"
                                                            wire:loading.attr="disabled"
                                                            wire:target="addItem({{ $product->id }})"><i
                                                                class="pe-7s-cart"></i>
                                                            Agregar al carrito </button>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a
                                                            href="{{ route('producto', $product) }}">{{ Str::limit($product->name, 20) }}</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span>{{ $product->price }} MXN</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <x-loading-products />
                                @endif
                                <script>
                                    $('.cart-btn').on('click', function() {
                                        console.log('click');
                                        $(".img__cart").removeClass("img__none");

                                        let cart = $('.cart-nav');
                                        // find the img of that card which button is clicked by user        
                                        let imgtodrag = $(this).parent('.product-action-2-wrap').find("img").eq(0);

                                        if (imgtodrag) {
                                            // duplicate the img
                                            var imgclone = imgtodrag.clone().offset({
                                                top: imgtodrag.offset().top,
                                                left: imgtodrag.offset().left
                                            }).css({
                                                'opacity': '0.8',
                                                'position': 'absolute',
                                                'height': '60px',
                                                'width': '60px',
                                                'z-index': '1000'
                                            }).appendTo($('body')).animate({
                                                'top': cart.offset().top + 17,
                                                'left': cart.offset().left + 10,
                                                'width': 75,
                                                'height': 75
                                            }, 1000, 'easeInOutExpo');


                                            imgclone.animate({
                                                'width': 0,
                                                'height': 0
                                            }, function() {
                                                $(this).detach()
                                            });
                                            setTimeout(function() {
                                                $(".img__cart").addClass("img__none");
                                            }, 1500);


                                        }
                                    });
                                </script>
                            </div>


                            <div class="pagination-style-1" data-aos-delay="200">
                                {{ $products->links() }}
                            </div>
                        </div>
                        <div id="shop-2" class="tab-pane">

                            <div wire:init="loadData">
                                @if ($loading == 1)
                                    @foreach ($products as $product)
                                        <div class="shop-list-wrap mb-30">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-5">
                                                    <div class="product-list-img">
                                                        <a href="{{ route('producto', $product) }}">
                                                            <div class="content__product"
                                                                style="background-image: url({{ asset('assets/images/' . $product->images->first()->url) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                                                            </div>
                                                        </a>
                                                        <div class="product-list-quickview">
                                                            <button class="product-action-btn-2" title="Quick View"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="pe-7s-look"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-sm-7">
                                                    <div class="shop-list-content">
                                                        <h3><a
                                                                href="{{ route('producto', $product) }}">{{ $product->name }}</a>
                                                        </h3>
                                                        <div class="product-price">
                                                            <span>{{ $product->price }} MXN </span>
                                                        </div>
                                                        <div class="product-list-rating">
                                                            <i class=" ti-star"></i>
                                                            <i class=" ti-star"></i>
                                                            <i class=" ti-star"></i>
                                                            <i class=" ti-star"></i>
                                                            <i class=" ti-star"></i>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do
                                                            eiusmod
                                                            tempor labor incididunt ut et dolore magna aliqua.</p>
                                                        <div class="product-list-action">
                                                            <img class=" img__cart img__none img-float"
                                                                src="{{ asset('assets/images/' . $product->images->first()->url) }}"
                                                                alt="kasa" width="50">
                                                            <button class="product-action-btn-3 cart-btn"
                                                                title="Add to cart"
                                                                wire:click="addItem({{ $product->id }})"
                                                                wire:loading.attr="disabled"
                                                                wire:target="addItem({{ $product->id }})"><i
                                                                    class="pe-7s-cart"></i></button>
                                                            <button class="product-action-btn-3" title="Wishlist"><i
                                                                    class="pe-7s-like"></i></button>
                                                            <button class="product-action-btn-3" title="Compare"><i
                                                                    class="pe-7s-shuffle"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <x-loading-products />
                                @endif
                                <script>
                                    $('.cart-btn').on('click', function() {
                                        console.log('click');
                                        $(".img__cart").removeClass("img__none");

                                        let cart = $('.cart-nav');
                                        // find the img of that card which button is clicked by user        
                                        let imgtodrag = $(this).parent('.product-list-action').find("img").eq(0);

                                        if (imgtodrag) {
                                            // duplicate the img
                                            var imgclone = imgtodrag.clone().offset({
                                                top: imgtodrag.offset().top,
                                                left: imgtodrag.offset().left
                                            }).css({
                                                'opacity': '0.8',
                                                'position': 'absolute',
                                                'height': '60px',
                                                'width': '60px',
                                                'z-index': '1000'
                                            }).appendTo($('body')).animate({
                                                'top': cart.offset().top + 17,
                                                'left': cart.offset().left + 10,
                                                'width': 75,
                                                'height': 75
                                            }, 1000, 'easeInOutExpo');


                                            imgclone.animate({
                                                'width': 0,
                                                'height': 0
                                            }, function() {
                                                $(this).detach()
                                            });
                                            setTimeout(function() {
                                                $(".img__cart").addClass("img__none");
                                            }, 1500);


                                        }
                                    });
                                </script>
                            </div>


                            <div class="pagination-style-1" data-aos-delay="200">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar-wrapper">


                    <div class="sidebar-widget mb-40">
                        <div class="search-wrap-2">
                            <form class="search-2-form" action="#">
                                <input placeholder="Search*" type="text">
                                <button class="button-search"><i class=" ti-search "></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-widget-border mb-40 pb-35">
                        <div class="sidebar-widget-title mb-30">
                            <h3>Filter By Price</h3>
                        </div>
                        <div class="price-filter">
                            <div id="slider-range"></div>
                            <div class="price-slider-amount">
                                <div class="label-input">
                                    <label>Price:</label>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget sidebar-widget-border mb-40 pb-35">
                        <div class="sidebar-widget-title mb-25">
                            <h3>Subcategorias</h3>
                        </div>
                        <div class="sidebar-list-style">
                            <ul>
                                @foreach ($category->subcategories as $subcategory)
                                    <li><a class="{{ $subcategoria == $subcategory->name ? 'active-a' : '' }}"
                                            wire:click="$set('subcategoria','{{ $subcategory->name }}')">{{ $subcategory->name }}
                                            <span>4</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <div class="sidebar-widget sidebar-widget-border mb-40 pb-35">
                        <div class="sidebar-widget-title mb-25">
                            <h3>Marcas</h3>
                        </div>
                        <div class="sidebar-list-style">
                            <ul>
                                @foreach ($category->brands as $brand)
                                    <li><a class="{{ $marca == $brand->name ? 'active-a' : '' }}"
                                            wire:click="$set('marca','{{ $brand->name }}')">{{ $brand->name }}
                                            <span>4</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <div class="sidebar-widget">
                        <div class="btn-style-2 btn-hover">
                            <a wire:click="limpiar" class="btn">
                                Borrar filtro
                            </a>
                        </div>
                    </div>

                    {{-- <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" 
                            data-aos-delay="200">
                            <div class="sidebar-widget-title mb-25">
                                <h3>Choose Colour</h3>
                            </div>
                            @livewire('color-filter',['category' => $category])
                        </div> --}}
                    {{-- <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" 
                            data-aos-delay="200">
                            <div class="sidebar-widget-title mb-25">
                                <h3>Size</h3>
                            </div>
                            <div class="sidebar-widget-size sidebar-list-style">
                                <ul>
                                    <li><a href="#">XL <span>4</span></a></li>
                                    <li><a href="#">M <span>9</span></a></li>
                                    <li><a href="#">LM <span>5</span></a></li>
                                    <li><a href="#">L <span>3</span></a></li>
                                    <li><a href="#">ML <span>4</span></a></li>
                                </ul>
                            </div>
                        </div> --}}

                </div>
            </div>
        </div>
    </div>

</div>
