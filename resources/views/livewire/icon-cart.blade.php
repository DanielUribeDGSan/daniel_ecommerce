<div>
    @if (Cart::count())
        <div class="header-action-style header-action-cart">
            <a class="cart-active" href="#"><i class="pe-7s-shopbag"></i>
                <span class="product-count bg-black">{{ Cart::count() }}</span>
            </a>
        </div>
    @else
        <div class="header-action-style header-action-cart">
            <a class="cart-active" href=""><i class="pe-7s-shopbag"></i>
            </a>
        </div>
    @endif

</div>
