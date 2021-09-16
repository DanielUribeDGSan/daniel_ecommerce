<div class="row gx-0 loading-skeleton">
    <style>
        .loading-skeleton .product-details-content .product-details-price span.new-price {
            color: transparent;
            font-size: 20px;
        }

        .loading-skeleton .single-product-cart>a {
            display: inline-block;
            font-weight: 600;
            color: #eee;
            background-color: #eee;
            padding: 20px 37px;
            z-index: 1;
        }

        .loading-skeleton .product-color ul li a.pink {
            background-color: #eee;
        }

        .loading-skeleton .product-quality>input {
            background-color: #eee;
            color: #eee !important;
        }

        .loading-skeleton .single-product-wishlist a,
        .loading-skeleton .single-product-compare a {
            font-size: 18px;
            color: #eee;
        }

    </style>
    <div class="col-lg-5 col-md-5 col-12">
        <div class="modal-img-wrap">
            <img src="{{ asset('assets/images/loading/loading.png') }}" alt="kasa">
        </div>
    </div>
    <div class="col-lg-7 col-md-7 col-12">
        <div class="product-details-content quickview-content">
            <h2>New Modern Chair </h2>
            <div class="product-details-price">
                <span class="new-price">$20.25</span>
            </div>
            <div class="product-color product-color-active product-details-color">
                <span>Color :</span>
                <ul>
                    <li><a title="Pink" class="pink" href="#">pink</a></li>
                    <li><a title="Pink" class="pink" href="#">pink</a></li>
                    <li><a title="Pink" class="pink" href="#">pink</a></li>
                </ul>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ornare tincidunt
                neque vel semper. Cras placerat enim sed nisl mattis eleifend.</p>
            <div class="product-details-action-wrap">
                <div class="product-quality">
                    <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                </div>
                <div class="single-product-cart btn-hover">
                    <a href="#">Add to cart</a>
                </div>
                <div class="single-product-wishlist">
                    <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                </div>
                <div class="single-product-compare">
                    <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
