<div class="">
    <div class="product-area pb-60">
        <div class="container">
            <div class="search-wrap-1 search-wrap-2 mt-5 mb-4">
                <div class="">
                    <div class="form-search">
                        <input wire:model="search" placeholder="Buscar productos" type="text">
                        <button class="button-search" type="button" onclick="buscarProducto()"><i
                                class="pe-7s-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="section-title-tab-wrap mb-75">
                <div class="section-title-2" data-aos="fade-up" data-aos-delay="200">
                    <h2>Busquedas</h2>
                </div>
                <div class="tab-style-1 nav" data-aos="fade-up" data-aos-delay="400">
                    <a class="active" href="#pro-1" data-bs-toggle="tab">Productos </a>
                </div>
            </div>
            <div class="tab-content jump">
                <div id="pro-1" class="tab-pane active">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/images/product/product-5.png') }}" alt="kasa">
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
                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                class="pe-7s-cart"></i>
                                            Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Interior moderno render</a></h3>
                                    <div class="product-price">
                                        <span class="old-price">$25.89 </span>
                                        <span class="new-price">$20.25 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="400">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/images/product/product-6.png') }}" alt="kasa">
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
                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                class="pe-7s-cart"></i>
                                            Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Stylish Dining Chair</a></h3>
                                    <div class="product-price">
                                        <span>$50.25 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="600">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/images/product/product-7.png') }}" alt="kasa">
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
                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                class="pe-7s-cart"></i>
                                            Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Round Standard Chair</a></h3>
                                    <div class="product-price">
                                        <span class="old-price">$45.00 </span>
                                        <span class="new-price">$40.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="800">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/images/product/product-4.png') }}" alt="kasa">
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
                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                class="pe-7s-cart"></i>
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/images/product/product-8.png') }}" alt="kasa">
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
                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                class="pe-7s-cart"></i>
                                            Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Modern Swivel Chair</a></h3>
                                    <div class="product-price">
                                        <span class="old-price">$25.89 </span>
                                        <span class="new-price">$20.25 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="400">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/images/product/product-2.png') }}" alt="kasa">
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
                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                class="pe-7s-cart"></i>
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="600">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/images/product/product-3.png') }}" alt="kasa">
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
                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                class="pe-7s-cart"></i>
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="800">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/images/product/product-9.png') }}" alt="kasa">
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
                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                class="pe-7s-cart"></i>
                                            Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Modern Lounge Chairs</a></h3>
                                    <div class="product-price">
                                        <span>$30.25 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
