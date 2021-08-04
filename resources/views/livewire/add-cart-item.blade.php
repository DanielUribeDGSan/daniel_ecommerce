<div x-data>
    @if ($product_clean == 1)
        <x-product-no-disponible />
    @endif

    <div class="product-details-action-wrap mt-3">
        <div class="product-quality" wire:loading.remove>
            <button class="dec qtybutton" disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" wire:click="decrement">-</button>
            <input class="cart-plus-minus-box input-text " name="qtybutton" value="{{ $qty }}" readonly>
            <button class="inc qtybutton" x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                wire:target="increment" wire:click="increment">+</button>
        </div>
        <div class="single-product-cart btn-hover" wire:loading.remove>
            <img class=" img__cart img__none img-float"
                src="{{ asset('assets/images/' . $product->images->first()->url) }}" alt="kasa" width="50">
            <button class="cart-btn" x-bind:disabled="!$wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
                wire:target="addItem" x-bind:disabled="$wire.qty > $wire.quantity">Agregar al carrito</button>
        </div>
        <div wire:loading>
            <x-loading-cart />
        </div>
        <div class="single-product-wishlist" wire:loading.remove>
            <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
        </div>
        <div class="single-product-compare" wire:loading.remove>
            <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
        </div>
    </div>
    <script>
        $('.cart-btn').on('click', function() {
            $(".img__cart").removeClass("img__none");

            let cart = $('.cart-nav');
            // find the img of that card which button is clicked by user        
            let imgtodrag = $(this).parent('.single-product-cart').find("img").eq(0);

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
    <div class="product-details-meta" wire:loading.remove>
        <ul>
            <li><span class="title">Marca:</span> {{ $product->brand->name }}</li>
            {{-- <li><span class="title">Category:</span>
                <ul>
                    <li><a href="#">Office</a>,</li>
                    <li><a href="#">Home</a></li>
                </ul>
            </li> --}}
            <li><span class="title">Disponible:</span>
                <ul class="tag">
                    <li><a>{{ $quantity }}</a></li>
                </ul>

            </li>
        </ul>
    </div>
</div>
