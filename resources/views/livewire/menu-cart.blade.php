<div x-data>
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
                    <div wire:loading wire:target="delete('{{ $item->rowId }}')">
                        <x-loading-delete-product />
                    </div>
                    <a wire:loading.remove wire:click="delete('{{ $item->rowId }}')">×</a>
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
    @endif
</div>
