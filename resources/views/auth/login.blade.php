@extends('auth.templates.index')

@section('content')
    <div class="col-md-6  mx-auto">
        <div class="col-md-6 col-sm-6 mx-auto">
            <h3 class="text-center font-weight-bolder">Total POS</h3>
        </div>
        <div class="col-md-6 mx-auto">
            <h2 class="text-center font-weight-light">¡Bienvenido!</h2>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 mx-auto">
        <div class="card rounded ">
            <div class="card-header bg-gradient-teal">{{ __(' Login') }}</div>

            <div class="card-body ">
                <form  method="POST" action="{{ route('login') }}" role="form">
                    @csrf

                    <div class="form-group text-center">
                        <img class="rounded-circle" width="20%" height="20%" src="{{asset('img/profile1.png')}}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">{{ __('Nombre de usuario') }}</label>

                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-user"></i></span>
                            </div>

                            <input id="username" type="text"
                                   class="form-control @error('username') is-invalid @enderror"
                                   name="username" value="{{ old('username') }}"
                                   placeholder="{{__('Ingresa tu usuario')}}"
                                   required autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">{{ __('Contraseña') }}</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="{{__('Ingresa tu contraseña')}}"
                                   name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label text-black-50" for="remember">
                                    {{ __('Recordar') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                {{ __('Login') }}
                            </button>


                        </div>
                        <div class="col-md-12 text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
