<x-guest-layout>
  <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
                      <h4 class="font-weight-bold">{{ __('Inicio Doble Factor de Autenticación') }}</h4>
                      <hr />
                      <p>1. Instale Google Authenticator en su teléfono y escanee el código QR:</p>
                      <div class="text-center">
                          <img id="imgQR" src="{{ $urlQR }}" alt="Código QR"/>
                      </div>
                      <p class="mt-4">2. Escriba el código generado por Google Authenticator o el token enviado a su correo y presione "Enviar".</p>
                      <form method="POST" action="{{ route('login.2fa', $user->id) }}" aria-label="{{ __('Login') }}">
                          @csrf
                          <div class="form-group row">
                              <div class="col-lg-8 offset-lg-2">
                                  <label for="code_verification" class="col-form-label">
                                      {{ __('CÓDIGO DE VERIFICACIÓN') }}
                                  </label>
                                  <input 
                                      id="code_verification" 
                                      type="text" 
                                      class="form-control @error('code_verification') is-invalid @enderror" 
                                      name="code_verification"
                                      value="{{ old('code_verification') }}" 
                                      required
                                      autofocus>
                                  @error('code_verification')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-lg-8 offset-lg-2">
                                  <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                              </div>
                          </div>
                      </form>
                      @if ($errors->has('error'))
                          <div class="alert alert-danger mt-4">
                              {{ $errors->first('error') }}
                          </div>
                      @endif
                      <div class="text-center mt-3">
                          <form method="POST" action="{{ route('send.2fa.code', $user->id) }}">
                              @csrf
                              <button type="submit" class="btn btn-link">No puedo escanear el código. Enviar código al correo.</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-guest-layout>
