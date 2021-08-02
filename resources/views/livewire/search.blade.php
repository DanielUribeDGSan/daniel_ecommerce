<div>
    <a class="search-toggle" href="#">
        <i class="pe-7s-search s-open"></i>
        <i class="pe-7s-close s-close"></i>
    </a>
    <div class="search-wrap-1">
        <div class="d-flex justify-content-center align-items-center">
            <div class="form-search mt-2" action="#">
                <input wire:model="search" placeholder="Busca un producto" type="text">
                <button class="button-search"><i class="pe-7s-search"></i></button>
            </div>
        </div>
        <div class="product-area pb-60 mt-4">
            <div class="container">
                <div class="section-title-tab-wrap mb-3">
                    <div class="section-title-2" data-aos="fade-up" data-aos-delay="200">
                        <h2>Productos encontrados</h2>
                    </div>
                    <div class="tab-style-1 nav" data-aos="fade-up" data-aos-delay="400">
                        <a class="active" href="#pro-1" data-bs-toggle="tab"> </a>
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
                                            <button class="product-action-btn-1" title="Quick View"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
