<div x-data>
    <ul>
        @forelse (Cart::content() as $item)
            <li>
                <div class="cart-img">
                    <a>
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
                    <h4><a>{{ $item->name }}</a></h4>
                    <span> {{ $item->qty }} × {{ $item->price }} MXN</span><br>
                    @isset($item->options['color'])
                        <span><b>Color:</b> {{ $item->options['color'] }}</span><br>
                    @endisset
                    @isset($item->options['size'])
                        <span><b>Talla:</b> {{ $item->options['size'] }}</span>
                    @endisset
                </div>
                <div class="cart-delete">
                    <div wire:loading wire:target="delete('{{ $item->rowId }}')">
                        <x-loading-delete-product />
                    </div>
                    <button class="btn" wire:loading.remove wire:loading.attr="disabled"
                        wire:click="delete('{{ $item->rowId }}')">×</button>
                </div>
            </li>
        @empty
            <li>
                <div class="cart-title">
                    <x-cart-empty-small />

                </div>
            </li>
        @endforelse
    </ul>
    @if (Cart::count())
        <div class="cart-total">
            <h4>Subtotal: <span>{{ Cart::subtotal() }} MXN</span></h4>
        </div>
        <div class="cart-btn btn-hover">
            <a class="theme-color" href="{{ route('carrito') }}">Ver el carrito de compras</a>
        </div>
        <div class="checkout-btn btn-hover">
            <a class="theme-color" href="{{ route('order') }}">Crear orden</a>
        </div>
    @endif
</div>
