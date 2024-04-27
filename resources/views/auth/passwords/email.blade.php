@extends('admin.layouts.basic')
@section('body')
    <div class="center-block w-xxl w-auto-xs p-v-md">
        <div class="navbar">
            <div class="navbar-brand m-t-lg text-center">
                <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" width="40"
                                                 style="vertical-align:middle"></a>
                <span class="m-l inline text-white">Contraseña olvidada</span>
            </div>
        </div>

        <div class="p-lg panel md-whiteframe-z1 text-color m">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                <a md-ink-ripple href="{{route('home')}}"
                   class="md-btn md-raised btn-main btn-block p-h-md"> Ir a la página
                </a>
            @else
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="md-form-group float-label">
                        <input id="email" type="email" class="md-input @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label>Usuario (email)</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button md-ink-ripple type="submit"
                            class="md-btn md-raised btn-main btn-block p-h-md"> Enviar petición
                    </button>

                    <div class="btn-forgot">
                        <a class="text-main" href="{{ route('login') }}">
                          <i class="icon mdi-hardware-keyboard-backspace"></i>  Regresar
                        </a>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection



