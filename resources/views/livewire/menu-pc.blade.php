<div wire:init="loadData">
    <header class="header-area header-responsive-padding header-height-1">
        {{-- <div class="header-top d-none d-lg-block bg-gray">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-6">
                        <div class="welcome-text">
                            <p>Default Welcome Msg! </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-6">
                        <div class="language-currency-wrap">
                            <div class="currency-wrap border-style">
                                <a class="currency-active" href="#">$ Dollar (US) <i class=" ti-angle-down "></i></a>
                                <div class="currency-dropdown">
                                    <ul>
                                        <li><a href="#">Taka (BDT) </a></li>
                                        <li><a href="#">Riyal (SAR) </a></li>
                                        <li><a href="#">Rupee (INR) </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="language-wrap">
                                <a class="language-active" href="#"><img
                                        src="{{ asset('assets/images/icon-img/flag.png') }}" alt=""> English <i
                                        class=" ti-angle-down "></i></a>
                                <div class="language-dropdown">
                                    <ul>
                                        <li><a href="#"><img src="{{ asset('assets/images/icon-img/flag.png') }}"
                                                    alt="">English
                                            </a></li>
                                        <li><a href="#"><img src="{{ asset('assets/images/icon-img/spanish.png') }}"
                                                    alt="">Spanish</a></li>
                                        <li><a href="#"><img src="{{ asset('assets/images/icon-img/arabic.png') }}"
                                                    alt="">Arabic
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="header-bottom sticky-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="logo">
                            <a href="{{ route('inicio') }}"><img
                                    src="{{ asset('assets/images/logo/logo_kasa.png') }}" style="width: 95px"
                                    alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                        <div class="main-menu text-center">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('inicio') }}">HOME</a>
                                    </li>
                                    <li><a href="shop.html">SHOP</a>
                                        <ul class="mega-menu-style mega-menu-mrg-1">
                                            <li>
                                                <ul>
                                                    <div
                                                        class="row w-100 d-flex align-items-center justify-content-between">
                                                        @if (count($categories))
                                                            @foreach ($categories as $category)
                                                                <div class="col-auto mt-2 mr-auto ml-auto overflow-auto"
                                                                    style="height: 300px">
                                                                    <li>
                                                                        <div class="mb-3"
                                                                            style="width: 150px; height: 100px;background-image: url('{{ asset('assets/images/categories/' . $category->image) }}');background-repeat: no-repeat;background-size: cover;background-position: center;">
                                                                        </div>
                                                                        <a class="dropdown-title"
                                                                            href="{{ route('categoria', $category) }}">{{ $category->name }}</a>
                                                                        <ul>
                                                                            @foreach ($category->subcategories as $subcategory)
                                                                                <li><a
                                                                                        href="shop.html">{{ $subcategory->name }}</a>
                                                                                </li>
                                                                            @endforeach

                                                                        </ul>
                                                                    </li>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <x-loading-products />
                                                        @endif
                                                        {{-- <div class="col-auto mt-2">
                                                            <li>
                                                                <a class="dropdown-title" href="#">Shop Layout</a>
                                                                <ul>
                                                                    <li><a href="shop.html">standard style</a></li>
                                                                    <li><a href="shop-sidebar.html">shop grid
                                                                            sidebar</a>
                                                                    </li>
                                                                    <li><a href="shop-list.html">shop list style</a>
                                                                    </li>
                                                                    <li><a href="shop-list-sidebar.html">shop list
                                                                            sidebar</a></li>
                                                                    <li><a href="shop-right-sidebar.html">shop right
                                                                            sidebar</a></li>
                                                                    <li><a href="shop-location.html">store location</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </div> --}}
                                                    </div>
                                                    {{-- <li>
                                                        <div class="row">
                                                            <div class="col-auto mt-2">
                                                                <a href="shop.html"><img
                                                                        src="{{ asset('assets/images/banner/menu.png') }}"
                                                                        alt=""></a>
                                                            </div>
                                                            <div class="col-auto mt-2">
                                                                <a href="shop.html"><img
                                                                        src="{{ asset('assets/images/banner/menu.png') }}"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                    </li> --}}
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">PAGES</a>
                                    </li>
                                    <li><a href="blog.html">BLOG</a>
                                    </li>
                                    <li><a href="about-us.html">ABOUT</a></li>
                                    <li><a href="contact-us.html">CONTACT US</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="header-action-wrap">
                            <div class="header-action-style header-search-1">
                                <a class="search-toggle" href="#">
                                    <i class="pe-7s-search s-open"></i>
                                    <i class="pe-7s-close s-close"></i>
                                </a>
                                <div class="search-wrap-1">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="form-search">
                                            <input id="search" placeholder="Buscar productos" type="text">
                                            <button class="button-search" type="button" onclick="buscarProducto()"><i
                                                    class="pe-7s-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    const buscarProducto = () => {
                                        const busqueda = document.querySelector('#search').value;
                                        if (busqueda == '') {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Busqueda vacía',
                                                html: 'Debes escribir algo antes de buscar un producto',
                                                confirmButtonText: 'Aceptar',
                                            });
                                            return false;
                                        }
                                        location.href = '/busqueda/' + busqueda;
                                    }
                                </script>
                            </div>
                            <div class="header-action-style">

                                <div class="language-currency-wrap language-currency-wrap-modify">
                                    <div class="currency-wrap border-style">
                                        <a class="currency-active" href="#"><i class="pe-7s-user"
                                                style="font-size: 23px;"></i></a>
                                        <div class="currency-dropdown">
                                            <ul>
                                                @auth
                                                    <li><a href="#">Mi perfil</a></li>
                                                    <li><a class="hover__orange"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                                            Sesión </a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" style="display: none;">
                                                            @csrf </form>
                                                    </li>
                                                @else
                                                    <li><a href="{{ route('login') }}">Iniciar sesión </a></li>
                                                    <li><a href="{{ route('register') }}">Registrarme </a></li>
                                                @endauth
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-style">
                                <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                            </div>

                            @livewire('icon-cart')

                            <div class="header-action-style d-block d-lg-none">
                                <a class="mobile-menu-active-button" href="#"><i class="pe-7s-menu"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
