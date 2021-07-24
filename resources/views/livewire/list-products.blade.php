<div wire:init="loadData">
    @if (count($products))
        @foreach ($products as $product)
            <div class="shop-list-wrap mb-30">
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                        <div class="product-list-img">
                            <a href="product-details.html">
                                <div class="content__product"
                                    style="background-image: url({{ asset('assets/images/' . $product->images->first()->url) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                                </div>
                            </a>
                            <div class="product-list-quickview">
                                <button class="product-action-btn-2" title="Quick View" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="pe-7s-look"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                        <div class="shop-list-content">
                            <h3><a href="product-details.html">{{ $product->name }}</a></h3>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod
                                tempor labor incididunt ut et dolore magna aliqua.</p>
                            <div class="product-list-action">
                                <button class="product-action-btn-3" title="Add to cart"><i
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
</div>
