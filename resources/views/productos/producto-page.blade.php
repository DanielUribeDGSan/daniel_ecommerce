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
                            @livewire('add-cart-item-size',['product' => $product], key('product-size'))
                        @elseif($product->subcategory->color)
                            @livewire('add-cart-item-color',['product' => $product], key('product-color'))
                        @else
                            @livewire('add-cart-item',['product' => $product], key('product-default'))
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
                <a data-bs-toggle="tab" href="#des-details2"
                    class=""> Information </a>
                {{-- <a data-bs-toggle="tab" href="#des-details3" class=""> Reviews </a> --}}
            </div>
            <div class="
                    tab-content">
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
    @livewire('related-product',['category' => $product->subcategory->category,'id_category'
    =>$product->subcategory->id])
</x-web-layout>
