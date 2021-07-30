<x-web-layout>
    <div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2 data-aos="fade-up" data-aos-delay="200">{{ $product->name }}</h2>
                <ul data-aos="fade-up" data-aos-delay="400">
                    <li><a href="{{ route('inicio') }}">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>{{ $product->name }}</li>
                </ul>
            </div>
        </div>
        <div class="breadcrumb-img-1" data-aos="fade-right" data-aos-delay="200">
            <img src="{{ asset('assets/images/banner/breadcrumb-1.png') }}" alt="">
        </div>
        <div class="breadcrumb-img-2" data-aos="fade-left" data-aos-delay="200">
            <img src="{{ asset('assets/images/banner/breadcrumb-2.png') }}" alt="">
        </div>
    </div>
    <div class="product-details-area pb-100 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-details-img-wrap product-details-vertical-wrap" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="product-details-small-img-wrap">
                            <div class="swiper-container product-details-small-img-slider-1 pd-small-img-style">
                                <div class="swiper-wrapper">
                                    @foreach ($product->images as $image)
                                        <div class="swiper-slide">
                                            <div class="product-details-small-img">
                                                <div class="content__product__detail__small"
                                                    style="background-image: url({{ asset('assets/images/' . $image->url) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pd-prev pd-nav-style"> <i class="ti-angle-up"></i></div>
                            <div class="pd-next pd-nav-style"> <i class="ti-angle-down"></i></div>
                        </div>
                        <div class="swiper-container product-details-big-img-slider-1 pd-big-img-style">
                            <div class="swiper-wrapper">
                                @foreach ($product->images as $image)
                                    <div class="swiper-slide">
                                        <div class="easyzoom-style">
                                            <div class="easyzoom easyzoom--overlay">
                                                <a>
                                                    <div class="content__product__detail"
                                                        style="background-image: url({{ asset('assets/images/' . $image->url) }});    background-repeat: no-repeat;background-size: cover;background-position: center;">
                                                    </div>
                                                </a>
                                            </div>
                                            <a class="easyzoom-pop-up img-popup"
                                                href="{{ asset('assets/images/' . $image->url) }}">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
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
                            @livewire('add-cart-item-size',['product' => $product])
                        @elseif($product->subcategory->color)
                            @livewire('add-cart-item-color',['product' => $product])
                        @else
                            @livewire('add-cart-item',['product' => $product])
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
            </div>
        </div>
    </div>
    <div class="description-review-area pb-85">
        <div class="container">
            <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
                <a class="active" data-bs-toggle="tab" href="#des-details1"> Description </a>
                <a data-bs-toggle="tab" href="#des-details2" class=""> Information </a>
                {{-- <a data-bs-toggle="tab" href="#des-details3" class=""> Reviews </a> --}}
            </div>
            <div class="tab-content">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-content text-center">
                        <p data-aos="fade-up" data-aos-delay="200">{{ $product->description }}</p>
                    </div>
                </div>
                <div id="des-details2" class="tab-pane">
                    <div class="specification-wrap table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="width1">Brands</td>
                                    <td>Airi, Brand, Draven, Skudmart, Yena</td>
                                </tr>
                                <tr>
                                    <td class="width1">Color</td>
                                    <td>Blue, Gray, Pink</td>
                                </tr>
                                <tr>
                                    <td class="width1">Size</td>
                                    <td>L, M, S, XL, XXL</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div id="des-details3" class="tab-pane">
                    <div class="review-wrapper">
                        <h3>1 review for Sleeve Button Cowl Neck</h3>
                        <div class="single-review">
                            <div class="review-img">
                                <img src="{{ asset('assets/images/product-details/review-1.png') }}" alt="">
                            </div>
                            <div class="review-content">
                                <div class="review-rating">
                                    <a href="#"><i class="ti-star"></i></a>
                                    <a href="#"><i class="ti-star"></i></a>
                                    <a href="#"><i class="ti-star"></i></a>
                                    <a href="#"><i class="ti-star"></i></a>
                                    <a href="#"><i class="ti-star"></i></a>
                                </div>
                                <h5><span>HasTech</span> - April 29, 2020</h5>
                                <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a.
                                    Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac
                                    turpis pharetra, in vehicula lacus scelerisque</p>
                            </div>
                        </div>
                    </div>
                    <div class="ratting-form-wrapper">
                        <h3>Add a Review</h3>
                        <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                        <div class="your-rating-wrap">
                            <span>Your rating</span>
                            <div class="your-rating">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                        </div>
                        <div class="ratting-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="rating-form-style mb-15">
                                            <label>Name <span>*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="rating-form-style mb-15">
                                            <label>Email <span>*</span></label>
                                            <input type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="rating-form-style mb-15">
                                            <label>Your review <span>*</span></label>
                                            <textarea name="Your Review"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="save-email-option">
                                            <p><input type="checkbox"> <label>Save my name, email, and website in this
                                                    browser for the next time I comment.</label></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-submit">
                                            <input type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="related-product-area pb-95">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>Related Products</h2>
            </div>
            <div class="related-product-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a href="product-details.html">
                                    <img src="{{ asset('assets/images/product/product-1.png') }}" alt="">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>-10%</span>
                                </div>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i
                                            class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i>
                                        Add to cart</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                <div class="product-price">
                                    <span class="old-price">$25.89 </span>
                                    <span class="new-price">$20.25 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="400">
                            <div class="product-img img-zoom mb-25">
                                <a href="product-details.html">
                                    <img src="{{ asset('assets/images/product/product-2.png') }}" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i
                                            class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i>
                                        Add to cart</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                <div class="product-price">
                                    <span>$50.25 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="600">
                            <div class="product-img img-zoom mb-25">
                                <a href="product-details.html">
                                    <img src="{{ asset('assets/images/product/product-3.png') }}" alt="">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>-10%</span>
                                </div>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i
                                            class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i>
                                        Add to cart</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Easy Modern Chair</a></h3>
                                <div class="product-price">
                                    <span class="old-price">$45.00 </span>
                                    <span class="new-price">$40.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="800">
                            <div class="product-img img-zoom mb-25">
                                <a href="product-details.html">
                                    <img src="{{ asset('assets/images/product/product-4.png') }}" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i
                                            class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i>
                                        Add to cart</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Stylish Swing Chair</a></h3>
                                <div class="product-price">
                                    <span>$30.25 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-wrap">
                            <div class="product-img img-zoom mb-25">
                                <a href="product-details.html">
                                    <img src="{{ asset('assets/images/product/product-2.png') }}" alt="">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>-10%</span>
                                </div>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i
                                            class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i>
                                        Add to cart</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                <div class="product-price">
                                    <span class="old-price">$80.50 </span>
                                    <span class="new-price">$75.25 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
