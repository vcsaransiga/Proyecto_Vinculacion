<x-guest-layout>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <x-guest.sidenav-guest />
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent text-center">
                                    <h3 class="font-weight-black text-dark display-6" style="color:#4a59a4!important;">
                                        Bienvenido de Nuevo
                                    </h3>
                                    <p class="mb-0" style="color:#4a59a4!important;">Crea una nueva cuenta<br></p>
                                    <p class="mb-0" style="color:#4a59a4!important;">O inicia sesion con tus
                                        credenciales</p>
                                </div>
                                <div class="text-center">
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success text-sm" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger text-sm" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @error('message')
                                        <div class="alert alert-danger text-sm" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (session('retry_after'))
                                        <div id="countdown" class="alert alert-danger text-sm" role="alert">
                                            Inténtalo de nuevo en <span id="seconds">{{ session('retry_after') }}</span> segundos.
                                        </div>
                                    @endif
                                    {{-- @error('attempts')
                                        <div class="alert alert-danger text-sm" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror --}}
                                </div>
                                <div class="card-body">
                                    <form role="form" class="text-start" id="login-form" method="POST" action="sign-in">
                                        @csrf
                                        <label style="color:#4a59a4!important;">Correo Electronico</label>
                                        <div class="mb-3">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu Correo Electronico" value="{{ old('email') ? old('email') : '' }}" aria-label="Email" aria-describedby="email-addon">
                                        </div>
                                        <label style="color:#4a59a4!important;">Contraseña</label>
                                        <div class="mb-3">
                                            <input type="password" id="password" name="password" value="{{ old('password') ? old('password') : '' }}" class="form-control" placeholder="Contraseña" aria-label="Password" aria-describedby="password-addon">
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('password.request') }}" class="text-xs font-weight-bold ms-auto" style="color:#4a59a4!important;">Olvide mi contraseña</a>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark w-100 mt-4 mb-3" style="background-color:#84be51!important; border-color:#84be51;">Iniciar Sesion</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-xs mx-auto" style="color:#4a59a4!important;">
                                        No tienes una cuenta Aun?
                                        <a href="{{ route('sign-up') }}" class="text-dark font-weight-bold" style="color:#4a59a4!important;">Registrarse Ahora </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center">
                            <div class="text-center">
                                <img src="../assets/img/logoVertical.png" alt="Logo UEPS">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var countdownElement = document.getElementById('countdown');
            if (countdownElement) {
                var seconds = parseInt(document.getElementById('seconds').textContent);
                var interval = setInterval(function() {
                    seconds--;
                    document.getElementById('seconds').textContent = seconds;
                    if (seconds <= 0) {
                        clearInterval(interval);
                        countdownElement.style.display = 'none';
                    }
                }, 1000);
            }
        });
    </script>
</x-guest-layout>
