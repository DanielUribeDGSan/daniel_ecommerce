<div x-data wire:init="loadData" class="swiper-wrapper">
    @if ($product_clean == 1)
        <x-product-no-disponible />
    @endif

    @if (count($products))
        @foreach ($products as $product)
            <div class="swiper-slide">
                <div class="product-wrap">
                    <div class="product-img img-zoom mb-25">
                        <a href="{{ route('producto', $product) }}">
                            <div class="content__product"
                                style="background-image: url({{ asset('assets/images/' . $product->images->first()->url) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                            </div>
                        </a>
                        <div class="product-badge badge-top badge-right badge-pink">
                            <span>-10%</span>
                        </div>
                        <div class="product-action-wrap">
                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                            <button class="product-action-btn-1 cart-btn" title="Quick View"
                                wire:click="modalProduct({{ $product->id }})" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="pe-7s-look"></i>
                            </button>
                        </div>
                        <div class="product-action-2-wrap">
                            <img class=" img__cart img__none img-float"
                                src="{{ asset('assets/images/' . $product->images->first()->url) }}" alt="kasa"
                                width="50">
                            <button class="product-action-btn-2 cart-btn" title="Add To Cart"
                                wire:click="addItem({{ $product->id }})" wire:loading.attr="disabled"
                                wire:target="addItem({{ $product->id }})"><i class="pe-7s-cart"></i>
                                Agregar al carrito </button>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="{{ route('producto', $product) }}">{{ Str::limit($product->name, 20) }} </a>
                        </h3>
                        <div class="product-price">
                            <span>{{ $product->price }} MXN</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <script>
            $('.cart-btn').on('click', function() {
                $(".img__cart").removeClass("img__none");
                console.log('click');
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

    @else
        <x-loading-products />
    @endif



</div>
