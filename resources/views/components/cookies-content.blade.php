<div class="fixed pin-l pin-b p-6 sm:p-10 z-100 cookie__content ocultar">
    <div class="js-cookie-consent bg-white w-full sm:w-auto rounded-lg shadow-md p-6">

        <div class="w-16 mx-auto relative -mt-10 mb-3">
            <lottie-player src="{{ asset('json/cookie.json') }}" background="transparent" speed="1"
                style="width: 100px; height: 100px;" loop autoplay></lottie-player>
        </div>

        <span
            class="cookie-consent__message w-full sm:w-48  block font-lf leading-normal text-grey-darkest text-xs mb-3">
            Nos preocupan sus datos y nos encantaría utilizar cookies para mejorar su experiencia.
        </span>

        <div class="d-flex align-items-center justify-content-between">
            <a class="font-lf text-xs text-grey-dark mar-2" href="">Política de privacidad</a>
            <button onclick="aceptarCookies()"
                class="js-cookie-consent-agree bg-lf-teal trans text-xs hover:bg-lf-teal-dark rounded inline-block shadow px-8 py-2 text-white font-lf-bold cursor-pointer">
                Aceptar
            </button>
        </div>

    </div>
</div>
