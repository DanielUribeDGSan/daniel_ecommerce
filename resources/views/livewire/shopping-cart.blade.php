<div>
    <div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Cart</h2>
                <ul>
                    <li><a href="{{ route('inicio') }}">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>Cart</li>
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
                    <form action="#">
                        <div class="cart-table-content">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="width-thumbnail"></th>
                                            <th class="width-name">Producto</th>
                                            <th class="width-quantity">Cantidad</th>
                                            <th class="width-subtotal">Subtotal</th>
                                            <th class="width-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse (Cart::content() as $item)
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
                                                        @livewire('update-cart-item-color',['rowId' => $item->rowId],
                                                        key($item->rowId))
                                                    @else
                                                        @livewire('update-cart-item',['rowId' => $item->rowId],
                                                        key($item->rowId))

                                                    @endif

                                                </td>
                                                <td class="product-total"><span>{{ $item->price }}</span></td>
                                                <td class="product-remove"><a href="#"><i class=" ti-trash "></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <x-cart-empty />
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update btn-hover">
                                        <a href="#">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear-wrap">
                                        <div class="cart-clear btn-hover">
                                            <button>Update Cart</button>
                                        </div>
                                        <div class="cart-clear btn-hover">
                                            <a href="#">Clear Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <h4>Calculate shipping </h4>
                        <div class="calculate-discount-content">
                            <div class="select-style mb-15">
                                <select class="select-two-active">
                                    <option>Bangladesh</option>
                                    <option>Bahrain</option>
                                    <option>Azerbaijan</option>
                                    <option>Barbados</option>
                                    <option>Barbados</option>
                                </select>
                            </div>
                            <div class="select-style mb-15">
                                <select class="select-two-active">
                                    <option>State / County</option>
                                    <option>Bahrain</option>
                                    <option>Azerbaijan</option>
                                    <option>Barbados</option>
                                    <option>Barbados</option>
                                </select>
                            </div>
                            <div class="input-style">
                                <input type="text" placeholder="Town / City">
                            </div>
                            <div class="input-style">
                                <input type="text" placeholder="Postcode / ZIP">
                            </div>
                            <div class="calculate-discount-btn btn-hover">
                                <a class="btn theme-color" href="#">Update</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <h4>Coupon Discount </h4>
                        <div class="calculate-discount-content">
                            <p>Enter your coupon code if you have one.</p>
                            <div class="input-style">
                                <input type="text" placeholder="Coupon code">
                            </div>
                            <div class="calculate-discount-btn btn-hover">
                                <a class="btn theme-color" href="#">Apply Coupon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="grand-total-wrap">
                        <div class="grand-total-content">
                            <h3>Subtotal <span>$180.00</span></h3>
                            <div class="grand-shipping">
                                <span>Shipping</span>
                                <ul>
                                    <li><input type="radio" name="shipping" value="info" checked="checked"><label>Free
                                            shipping</label></li>
                                    <li><input type="radio" name="shipping" value="info" checked="checked"><label>Flat
                                            rate: <span>$100.00</span></label></li>
                                    <li><input type="radio" name="shipping" value="info" checked="checked"><label>Local
                                            pickup: <span>$120.00</span></label></li>
                                </ul>
                            </div>
                            <div class="shipping-country">
                                <p>Shipping to Bangladesh</p>
                            </div>
                            <div class="grand-total">
                                <h4>Total <span>$185.00</span></h4>
                            </div>
                        </div>
                        <div class="grand-total-btn btn-hover">
                            <a class="btn theme-color" href="checkout.html">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
