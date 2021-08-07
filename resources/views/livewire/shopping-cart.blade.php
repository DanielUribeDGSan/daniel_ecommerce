<div x-data>
    <div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Carrito de compras</h2>
                <ul>
                    <li><a href="{{ route('inicio') }}">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>Carrito de compras</li>
                </ul>
            </div>
        </div>
        <div class="breadcrumb-img-1">
            <img src="assets/images/banner/breadcrumb-1.png" alt="">
        </div>
        <div class="breadcrumb-img-2">
            <img src="assets/images/banner/breadcrumb-2.png" alt="">
        </div>
    </div>
    <div class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (Cart::count())
                        <form action="#">
                            <div class="cart-table-content">
                                <div class="table-content table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="width-thumbnail"></th>
                                                <th class="width-name">Producto</th>
                                                <th class="width-quantity">Cantidad</th>
                                                <th class="width-subtotal">Precio</th>
                                                <th class="width-subtotal">Subtotal</th>
                                                <th class="width-remove"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::content() as $item)
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="product-details.html">
                                                            @if ($item->options->image)
                                                                <div class="content__product__cart2"
                                                                    style="background-image: url({{ asset($item->options->image) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                                                                </div>
                                                            @else
                                                                <div class="content__product__cart2"
                                                                    style="background-image: url({{ asset($item->options['image']) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                                                                </div>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <h5><a href="product-details.html">{{ $item->name }}</a></h5>
                                                        @isset($item->options['color'])
                                                            <span><b>Color:</b> {{ $item->options['color'] }}</span><br>
                                                        @endisset
                                                        @isset($item->options['size'])
                                                            <span><b>Talla:</b> {{ $item->options['size'] }}</span>
                                                        @endisset
                                                    </td>
                                                    <td class="cart-quality">
                                                        @if ($item->options->size)
                                                            @livewire('update-cart-item-size',['rowId' => $item->rowId],
                                                            key($item->rowId))
                                                        @elseif ($item->options->color)
                                                            @livewire('update-cart-item-color',['rowId' =>
                                                            $item->rowId],
                                                            key($item->rowId))
                                                        @else
                                                            @livewire('update-cart-item',['rowId' => $item->rowId],
                                                            key($item->rowId))

                                                        @endif

                                                    </td>
                                                    <td class="product-total"><span>{{ $item->price }} MXN</span></td>
                                                    <td class="product-total"><span>{{ $item->price * $item->qty }}
                                                            MXN</span>
                                                    </td>
                                                    <td class="product-remove">
                                                        <div wire:loading wire:target="delete('{{ $item->rowId }}')">
                                                            <x-loading-delete-product />
                                                        </div>
                                                        <a wire:loading.remove
                                                            wire:click="delete('{{ $item->rowId }}')"><i
                                                                class=" ti-trash "></i></a>
                                                    </td>

                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update btn-hover">
                                            <a href="{{ route('inicio') }}">Continuar comprando</a>
                                        </div>
                                        <div class="cart-clear-wrap">
                                            <div class="cart-clear btn-hover">
                                                <a wire:click="destroy" class="">Limpiar carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <x-cart-empty />
                    @endif

                </div>
            </div>
            @if (Cart::count())
                <div class="row d-flex justify-content-end">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="grand-total-wrap">
                            <div class="grand-total-content">
                                <h3>Total <span>{{ Cart::subTotal() }} MXN</span></h3>
                                <div class="grand-shipping">
                                    <span>Shipping</span>
                                    <ul>
                                        <li><input type="radio" name="shipping" value="info"
                                                checked="checked"><label>Free
                                                shipping</label></li>
                                        <li><input type="radio" name="shipping" value="info"
                                                checked="checked"><label>Flat
                                                rate: <span>$100.00</span></label></li>
                                        <li><input type="radio" name="shipping" value="info"
                                                checked="checked"><label>Local
                                                pickup: <span>$120.00</span></label></li>
                                    </ul>
                                </div>

                                <div class="grand-total">
                                    <h4>Total <span>{{ Cart::subTotal() }} MXN</span></h4>
                                </div>
                            </div>
                            <div class="grand-total-btn btn-hover">
                                <a class="btn theme-color" href="{{ route('order') }}">Proceder al pago</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
