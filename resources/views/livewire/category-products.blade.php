<div wire:init="loadData" class="swiper-wrapper">
    @if (count($products))
        @foreach ($products as $product)
            <div class="swiper-slide" :wire:key="$product->id">
                <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
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
                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="pe-7s-look"></i>
                            </button>
                        </div>
                        <div class="product-action-2-wrap">
                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i>
                                Add
                                to cart </button>
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
    @else
        <x-loading-products />
    @endif

</div>
