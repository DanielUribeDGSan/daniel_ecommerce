<div x-data>
    <div class="row gx-0" wire:loading.remove>
        @if ($product)
            <div class="col-lg-5 col-md-5 col-12">
                <div class="modal-img-wrap">
                    <div class="content__product"
                        style="background-image: url({{ asset('assets/images/' . $product->images->first()->url) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-12">
                <div class="product-details-content">
                    <h2>{{ $product->name }}</h2>
                    <div class="product-details-price">
                        {{-- <span class="old-price">$25.89 </span> --}}
                        <span class="new-price">{{ $product->price }} MXN</span>
                    </div>
                    <div class="product-details-review">
                        <div class="product-rating">
                            <i class=" ti-star"></i>
                            <i class=" ti-star"></i>
                            <i class=" ti-star"></i>
                            <i class=" ti-star"></i>
                            <i class=" ti-star"></i>
                        </div>
                        <span>( 1 Customer Review )</span>
                    </div>
                    @if ($product->subcategory->size)
                        @livewire('add-cart-item-size',['product' => $product],
                        key('product-size-modal-'.$product->id))
                    @elseif($product->subcategory->color)

                        @livewire('add-cart-item-color',['product' => $product],
                        key('product-color-modal-'.$product->id))
                    @else
                        @livewire('add-cart-item',['product' => $product],
                        key('product-default-modal-'.$product->id ))
                    @endif

                    <div class="social-icon-style-4">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        @else
            <x-loading-product-modal />
        @endif
    </div>
    <div wire:loading>

        <x-loading-product-modal />

    </div>
</div>
