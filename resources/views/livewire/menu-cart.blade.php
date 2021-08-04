<div class="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
        <div class="cart-content">
            <h3>Carrito de compras</h3>
            <ul>
                @forelse (Cart::content() as $item)
                    <li>
                        <div class="cart-img">
                            <a href="#">
                                @if ($item->options->image)
                                    <div class="content__product__cart"
                                        style="background-image: url({{ asset($item->options->image) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                                    </div>
                                @else
                                    <div class="content__product__cart"
                                        style="background-image: url({{ asset($item->options['image']) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="cart-title">
                            <h4><a href="#">{{ $item->name }}</a></h4>
                            <span> {{ $item->qty }} × {{ $item->price }} MXN</span><br>
                            @isset($item->options['color'])
                                <span><b>Color:</b> {{ $item->options['color'] }}</span><br>
                            @endisset
                            @isset($item->options['size'])
                                <span><b>Talla:</b> {{ $item->options['size'] }}</span>
                            @endisset
                        </div>
                        <div class="cart-delete">
                            <a href="#">×</a>
                        </div>
                    </li>
                @empty
                    <li>
                        <div class="cart-title">
                            <h4><a>No tiene ningún producto en el carrito</a></h4>
                        </div>
                    </li>
                @endforelse
            </ul>
            @if (Cart::count())
                <div class="cart-total">
                    <h4>Subtotal: <span>{{ Cart::subtotal() }} MXN</span></h4>
                </div>
            @endif
            <div class="cart-btn btn-hover">
                <a class="theme-color" href="{{ route('carrito') }}">Ver el carrito de compras</a>
            </div>
            <div class="checkout-btn btn-hover">
                <a class="theme-color" href="checkout.html">Pagar</a>
            </div>
        </div>
    </div>
</div>
