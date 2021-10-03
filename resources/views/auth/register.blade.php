<x-login-layout>
    <div class="container-login">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('register') }}" class="sign-in-form">
                    @csrf
                    <h2 class="title">Registrate</h2>
                    <x-jet-validation-errors class="mb-4" />

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="name" name="name" :value="old('name')" required autofocus
                            autocomplete="name" placeholder="Nombre" onkeyup="onlyLetrasNum(this)" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" id="email" name="email" :value="old('email')" required placeholder="Correo"
                            onkeyup="onlyLetrasNum(this)" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="password" id="password" name="password" required autocomplete="new-password"
                            placeholder="Contraseña" />
                        <i class="fas fa-eye mostrarPass" onclick="mostrarPass()"></i>
                        <i class="fas fa-eye-slash ocultarPass ocultar" onclick="ocultarPass()"></i>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Repite tu contraseña" />
                        <i class="fas fa-eye mostrarPass2" onclick="mostrarPass2()"></i>
                        <i class="fas fa-eye-slash ocultarPass2 ocultar" onclick="ocultarPass2()"></i>
                    </div>

                    <button type="submit" class="btn solid">Registrarme</button>

                    <a class="mt-3 btn-login btn-light w-100 mostrar_movil" href="{{ route('login') }}">
                        <p class="link-password mt-2">Iniciar sesión</p>
                    </a>
                    <a class="mt-3 btn-login btn-light w-100 mostrar_movil" href="{{ route('inicio') }}">
                        <p class="link-password mt-2">Regresar al inicio</p>
                    </a>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel d-flex align-items-center justify-content-center">
                <div class="content">
                    <h3>¿Eres cliente?</h3>

                    <a class="btn transparent mt-3" href="{{ route('login') }}">
                        Iniciar sesión
                    </a>
                    <a class="btn transparent mt-3" href="{{ route('inicio') }}">
                        Regresar al inicio
                    </a>
                </div>
                <lottie-player src="{{ asset('json/login.json') }}" background="transparent" speed="1"
                    style="width: 400px; height: 400px;" loop autoplay></lottie-player>

            </div>

        </div>
    </div>
</x-login-layout>
