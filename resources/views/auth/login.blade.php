<x-web-layout>
    <style>
        body {
            background-color: #fafafa
        }

    </style>
    <div class="cont">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form sign-in">
                <h2 class="h2-login">Bienvenido de nuevo,</h2>
                <label class="label-login">
                    <span>Correo</span>
                    <input class="input-login" type="email" name="email" id="email" :value="old('email')" required
                        autofocus />
                </label>
                <label class="label-login">
                    <span>Contraseña</span>
                    <input class="input-login" type="password" name="password" id="password" required
                        autocomplete="current-password" />
                </label>
                <a href="{{ route('password.request') }}">
                    <p class="forgot-pass">¿Olvidaste tu contraseña?</p>
                </a>
                <div class="form-check d-flex align-items-center justify-content-center">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label recordarme ml-2" for="remember_me">Recordarme</label>
                </div>
                <button class="button-login submit" type="submit">Iniciar sesión</button>
                <button class="button-login fb-btn" type="button">Connect with <span>facebook</span></button>
            </div>
        </form>
        <div class="sub-cont">
            <div class="img">

                <lottie-player class="img__contetn" src="{{ asset('json/fondo.json') }}" background="transparent"
                    speed="1" style="" loop autoplay></lottie-player>

                <div class="img__text m--up">
                    <h2 class="h2-login ">¿Nuevo aquí?</h2>
                    <p class="text-white text-login">¡Regístrate y compra tu producto favorito!</p>
                </div>
                <div class="img__btn">
                    <span class="m--up">Registrarme</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2 class="h2-login">Time to feel like home,</h2>
                <label class="label-login">
                    <span>Name</span>
                    <input class="input-login" type="text" />
                </label>
                <label class="label-login">
                    <span>Email</span>
                    <input class="input-login" type="email" />
                </label>
                <label class="label-login">
                    <span>Password</span>
                    <input class="input-login" type="password" />
                </label>
                <button class="button-login" type="button" class="submit">Sign Up</button>
                <button class="button-login" type="button" class="fb-btn">Join with <span>facebook</span></button>
            </div>
        </div>
    </div>

</x-web-layout>
