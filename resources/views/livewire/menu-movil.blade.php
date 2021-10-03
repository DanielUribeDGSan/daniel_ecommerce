 <div class="off-canvas-active">
     <a class="off-canvas-close"><i class=" ti-close "></i></a>
     <div class="off-canvas-wrap">
         {{-- <div class="welcome-text off-canvas-margin-padding">
             <p>Default Welcome Msg! </p>
         </div> --}}
         <div class="mobile-menu-wrap off-canvas-margin-padding-2">
             <div id="mobile-menu" class="slinky-mobile-menu text-left">
                 <ul>
                     <li>
                         <a href="{{ route('inicio') }}" class="text-uppercase link_ref">Inicio</a>
                     </li>
                     <li><a href="{{ route('nosotros') }}" class="text-uppercase link_ref">Sobre
                             Nosotros</a></li>
                     <li><a href="{{ route('contacto') }}" class="text-uppercase link_ref">Contacto</a>
                     </li>

                     <div class="welcome-text off-canvas-margin-padding mb-3 pb-3">
                         <p class="ft-14 mt-2 text-uppercase">Categorias</p>
                     </div>
                     @foreach ($categories as $category)

                         <li>
                             <a class="link_ref"
                                 href="{{ route('categoria', $category) }}">{{ $category->name }}</a>
                             <ul>
                                 @foreach ($category->subcategories as $subcategory)
                                     <li><a class="link_ref"
                                             href="{{ route('categoria', $category) . '?subcategoria=' . $subcategory->slug }}">{{ $subcategory->name }}</a>
                                     </li>
                                 @endforeach

                             </ul>
                         </li>
                     @endforeach

                 </ul>
             </div>
         </div>
         {{-- <div class="language-currency-wrap language-currency-wrap-modify">
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
                 <a class="language-active" href="#"><img src="{{ asset('assets/images/icon-img/flag.png') }}"
                         alt="kasa">
                     English
                     <i class=" ti-angle-down "></i></a>
                 <div class="language-dropdown">
                     <ul>
                         <li><a href="#"><img src="{{ asset('assets/images/icon-img/flag.png') }}" alt="kasa">English
                             </a>
                         </li>
                         <li><a href="#"><img src="{{ asset('assets/images/icon-img/spanish.png') }}"
                                     alt="kasa">Spanish</a></li>
                         <li><a href="#"><img src="{{ asset('assets/images/icon-img/arabic.png') }}" alt="kasa">Arabic
                             </a></li>
                     </ul>
                 </div>
             </div>
         </div> --}}
     </div>
 </div>
