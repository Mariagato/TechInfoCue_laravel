@extends('admin.layouts.basic')
@section('body')
    <div class="center-block w-xxl w-auto-xs p-v-md">
        <div class="navbar">
            <div class="navbar-brand m-t-lg text-center">
                <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" width="40"
                                                 style="vertical-align:middle"></a>
                <span class="m-l inline text-white">Inicio de sesión</span>
            </div>
        </div>

        <div class="p-lg panel md-whiteframe-z1 text-color m">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="md-form-group float-label">
                    <input id="email" type="email" class="md-input @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label>Usuario (email)</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="md-form-group float-label">
                    <input id="password" type="password" class="md-input @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password">
                    <label>Contraseña</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="m-b-md">
                    <label class="md-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <i class="indigo"></i> Mantenerme activo
                    </label>
                </div>
                <button md-ink-ripple type="submit"
                        class="md-btn md-raised btn-main btn-block p-h-md">Ingresar
                </button>
                @if (Route::has('password.request'))
                    <div class="btn-forgot">
                        <a class="text-main" href="{{ route('password.request') }}">
                            Contraseña olvidada
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection