<x-web-layout>
    <div class="slider-area">
        <div class="slider-active swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-1"
                        style="background-image:url({{ asset('assets/images/slider/slider-bg-1.jpeg') }})">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="slider-content-1 slider-animated-1">
                                        <h3 class="animated">new arrival</h3>
                                        <h1 class="animated">Summer <br>Collection</h1>
                                        <div class="slider-btn btn-hover">
                                            <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"
                                                class="btn animated">
                                                Shop Now <i class=" ti-arrow-right "></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="hero-slider-img-1 slider-animated-1">
                                        <img class="animated animated-slider-img-1"
                                            src="{{ asset('assets/images/slider/slider-img-1.png') }}" alt="kasa">
                                        <div class="product-offer animated">
                                            <h5>30% <span>Off</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-1"
                        style="background-image:url({{ asset('assets/images/slider/slider-bg-1.jpeg') }})">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="slider-content-1 slider-animated-1">
                                        <h3 class="animated">new arrival</h3>
                                        <h1 class="animated">Summer <br>Collection</h1>
                                        <div class="slider-btn btn-hover">
                                            <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"
                                                class="btn animated">
                                                Shop Now <i class=" ti-arrow-right "></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="hero-slider-img-1 slider-animated-1">
                                        <img class="animated animated-slider-img-1"
                                            src="{{ asset('assets/images/slider/slider-img-1-2.png') }}" alt="kasa">
                                        <div class="product-offer animated">
                                            <h5>30% <span>Off</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="home-slider-prev main-slider-nav"><i class="fa fa-angle-left"></i></div>
                <div class="home-slider-next main-slider-nav"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="banner-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"><img
                                src="{{ asset('assets/images/banner/banner-1.png') }}" alt="kasa"></a>
                        <div class="banner-content-1">
                            <h5>new arrival</h5>
                            <h3>Office Chair</h3>
                            <div class="banner-btn">
                                <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"><img
                                src="{{ asset('assets/images/banner/banner-2.png') }}" alt="kasa"></a>
                        <div class="banner-content-1">
                            <h5>new arrival</h5>
                            <h3>Hanging Chair</h3>
                            <div class="banner-btn">
                                <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="600">
                        <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"><img
                                src="{{ asset('assets/images/banner/banner-3.png') }}" alt="kasa"></a>
                        <div class="banner-content-1">
                            <h5>new arrival</h5>
                            <h3>Folding Chair</h3>
                            <div class="banner-btn">
                                <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Productos --}}
    <div class="product-area pb-95">
        <div class="container">
            @foreach ($categories as $category)
                @if ($category->products()->where('status', 2)->get()->count())
                    <div class="section-border section-border-margin-1" data-aos-delay="200">
                        <div class="section-title-timer-wrap bg-white">
                            <div class="section-title-1">
                                <h2>{{ $category->name }}</h2>
                            </div>
                            {{-- <div id="timer-1-active" class="timer-style-1">
                            <span>End In: </span>
                            <div data-countdown="2021/8/30"></div>
                        </div> --}}
                            <div class="timer-style-1">
                                <a class="text-white" href="{{ route('categoria', $category) }}">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-slider-active-1 swiper-{{ $category->id }} swiper-container">

                        @livewire('category-products',['category' => $category])

                        <div class="product-prev-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i
                                class="fa fa-angle-left"></i></div>
                        <div class="product-next-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i
                                class="fa fa-angle-right"></i></div>
                    </div>

                @endif
            @endforeach
        </div>
    </div>
    <div class="banner-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="banner-wrap mb-30">
                        <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"><img
                                src="{{ asset('assets/images/banner/banner-4.png') }}" alt="kasa"></a>
                        <div class="banner-content-2">
                            <span>Sale 30%</span>
                            <h2>New Furniture</h2>
                            <p>Lorem ipsum dolor sit amet consecte adipisicing elit sed do</p>
                            <div class="btn-style-2 btn-hover">
                                <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"
                                    class="btn">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="banner-wrap mb-30">
                        <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"><img
                                src="{{ asset('assets/images/banner/banner-5.png') }}" alt="kasa"></a>
                        <div class="banner-content-3">
                            <h3>Up To 30% <img src="{{ asset('assets/images/icon-img/sale.png') }}" alt="kasa"> Every
                                Item</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="service-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                    <div class="service-wrap">
                        <div class="service-img">
                            <img src="{{ asset('assets/images/icon-img/car.png') }}" alt="kasa">
                        </div>
                        <div class="service-content">
                            <h3>Free Shipping</h3>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                    <div class="service-wrap">
                        <div class="service-img">
                            <img src="{{ asset('assets/images/icon-img/time.png') }}" alt="kasa">
                        </div>
                        <div class="service-content">
                            <h3>Support 24/7</h3>
                            <p>Support 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                    <div class="service-wrap">
                        <div class="service-img">
                            <img src="{{ asset('assets/images/icon-img/dollar.png') }}" alt="kasa">
                        </div>
                        <div class="service-content">
                            <h3>Money Return</h3>
                            <p>Back Guarantee Under </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                    <div class="service-wrap">
                        <div class="service-img">
                            <img src="{{ asset('assets/images/icon-img/discount.png') }}" alt="kasa">
                        </div>
                        <div class="service-content">
                            <h3>Order Discount</h3>
                            <p>Onevery order over $150</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="home-single-product-img">
                        <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"><img
                                src="{{ asset('assets/images/product/single-product.png') }}" alt="kasa"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="home-single-product-content">
                        <h2 data-aos="fade-up" data-aos-delay="200">Modern Chair</h2>
                        <h3 data-aos="fade-up" data-aos-delay="400">$20.25</h3>
                        <p data-aos="fade-up" data-aos-delay="600">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore mt aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate</p>
                        <div class="product-color" data-aos="fade-up" data-aos-delay="800">
                            <span>Color :</span>
                            <ul>
                                <li><a title="Pink" class="pink" href="#">pink</a></li>
                                <li><a title="Yellow" class="yellow" href="#">yellow</a></li>
                                <li><a title="Purple" class="purple" href="#">purple</a></li>
                            </ul>
                        </div>
                        {{-- <div class="product-details-action-wrap" data-aos="fade-up" data-aos-delay="1000">
                            <div class="product-quality">
                                <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                            </div>
                            <div class="single-product-cart btn-hover">
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="single-product-wishlist">
                                <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                            </div>
                            <div class="single-product-compare">
                                <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area pb-95">
        <div class="container">
            <div class="bg-img bg-padding-1" style="background-image:url(assets/images/bg/bg-1.png)">
                <div class="banner-content-4">
                    <h2>New Dining <br>Chair Set</h2>
                    <h3>Up To 30% Off</h3>
                    <div class="btn-style-2 btn-hover">
                        <a href="{{ route('categoria', $categories->where('name', 'sillas')->first()) }}"
                            class="btn">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="brand-logo-area pb-95">
        <div class="container">
            <div class="brand-logo-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="single-brand-logo">
                            <a href="#"><img src="{{ asset('assets/images/brand-logo/brand-logo-1.png') }}"
                                    alt="kasa"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo">
                            <a href="#"><img src="{{ asset('assets/images/brand-logo/brand-logo-2.png') }}"
                                    alt="kasa"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo">
                            <a href="#"><img src="{{ asset('assets/images/brand-logo/brand-logo-3.png') }}"
                                    alt="kasa"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo">
                            <a href="#"><img src="{{ asset('assets/images/brand-logo/brand-logo-4.png') }}"
                                    alt="kasa"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo">
                            <a href="#"><img src="{{ asset('assets/images/brand-logo/brand-logo-5.png') }}"
                                    alt="kasa"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo">
                            <a href="#"><img src="{{ asset('assets/images/brand-logo/brand-logo-1.png') }}"
                                    alt="kasa"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
