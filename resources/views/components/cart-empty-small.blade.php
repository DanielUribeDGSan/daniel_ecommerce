<div class="">
    <!-- Error Page -->
    <div class="error ">
        <div class="container-floud">
            <div class="col-xs-12 ground-color text-center">
                <div class="container-error-404-small d-flex align-items-center justify-content-center">
                    <lottie-player src="{{ asset('json/emptyCart.json') }}" background="transparent" speed="1"
                        style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                    {{-- <div class="msg"><i class="fas fa-search"></i><span class="triangle"></span></div> --}}
                </div>
                <h2 class="h1 mt-4 small-text-cart">No tiene ningún producto en el carrito</b></h2>
            </div>
        </div>
    </div>
    <script>
        function randomNum() {
            "use strict";
            return Math.floor(Math.random() * 9) + 1;
        }
        var loop1, loop2, loop3, time = 30,
            i = 0,
            number, selector3 = document.querySelector('.thirdDigit'),
            selector2 = document.querySelector('.secondDigit'),
            selector1 = document.querySelector('.firstDigit');
    </script>
</div>
<!-- Error Page -->
