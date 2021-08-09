<x-login-layout>
    <div class="container-login">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                    @csrf
                    <h2 class="title">Iniciar sesión</h2>
                    <x-jet-validation-errors class="mb-4" />
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" id="email" placeholder="Correo" name="email" :value="old('email')" required
                            autofocus />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" placeholder="Contraseña" name="password" required
                            autocomplete="current-password" />
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">Recordarme</label>
                    </div>
                    <button type="submit" class="btn solid">Iniciar sesión</button>
                    <a href="{{ route('password.request') }}">
                        <p class="link-password mt-2">¿Olvidaste tu contraseña?</p>
                    </a>
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
                <form action="#" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" />
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel d-flex align-items-center justify-content-center">
                <div class="content">
                    <h3>¿Es nuevo aquí?</h3>

                    <a class="btn transparent mt-3" href="{{ route('register') }}">
                        Registrate
                    </a>
                    <a class="btn transparent mt-3" href="{{ route('inicio') }}">
                        Regresar al inicio
                    </a>
                </div>
                <lottie-player src="{{ asset('json/login.json') }}" background="transparent" speed="1"
                    style="width: 400px; height: 400px;" loop autoplay></lottie-player>

            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
</x-login-layout>
