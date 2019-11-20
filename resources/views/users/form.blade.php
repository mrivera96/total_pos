@csrf
<div class="form-group row align-content-center" style="position: relative">
    <label class="btn btn-default fas fa-camera rounded-circle bg-gradient-blue" style="position: absolute; left: 43%; top: 85%">
        <input class="@error('avatar') is-invalid @enderror"  type="file" name="avatar" @if($errors->any()) value="{{ old('avatar')}}"@endif style="display: none;">
    </label>
    <img class="rounded-circle m-auto" src="{{asset('img/'.$user->avatar)}}">
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label for="name" class="col-md-4 col-form-label text-left">{{ __('Nombre (s)') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
               name="name" @if($errors->any()) value="{{ old('name')}}"@endif value="{{ $user->name }}" required autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="last_name"
               class="col-md-4 col-form-label text-left">{{ __('Apellido (s)') }}</label>
        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
               name="last_name" @if($errors->any()) value="{{ old('last_name')}}"@endif value="{{ $user->last_name }}" required autofocus>

        @error('last_name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

</div>

<div class="form-group row">
    <div class="col-md-6">
        <label for="username"
               class="col-md-12 col-form-label text-left">{{ __('Nombre de usuario (Se usará para iniciar sesión)') }}</label>
        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
               name="username" @if($errors->any()) value="{{ old('username')}}"@endif value="{{$user->username}}" required autofocus>

        @error('username')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>


    <div class="col-md-6">
        <label for="dni" class="col-md-4 col-form-label text-left">{{ __('No. Identidad') }}</label>
        <input id="dni" type="number" maxlength="13" minlength="13"
               class="form-control @error('dni') is-invalid @enderror" @if($errors->any()) value="{{ old('dni')}}"@endif value="{{$user->dni}}"
               name="dni" required>

        @error('dni')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label for="birthday"
               class="col-md-4 col-form-label text-left">{{ __('Fecha de nacimiento') }}</label>
        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
               @if($errors->any()) value="{{ old('birthday')}}"@endif value="{{$user->birthday}}"  name="birthday" required>

        @error('birthday')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="cellphone_number"
               class="col-md-4 col-form-label text-left">{{ __('Número celular') }}</label>
        <input id="cellphone_number" type="number" maxlength="8" minlength="8"
               class="form-control @error('cellphone_number') is-invalid @enderror"
               @if($errors->any()) value="{{ old('cellphone_number')}}"@endif value="{{ $user->cellphone_number}}" name="cellphone_number" required>

        @error('cellphone_number')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

</div>

<div class="form-group row">
    <div class="col-md-6">
        <label for="address" class="col-md-4 col-form-label text-left">{{ __('Dirección') }}</label>
        <input id="address" type="text" maxlength="45"
               class="form-control @error('address') is-invalid @enderror" @if($errors->any()) value="{{ old('address')}}"@endif value="{{$user->address}}"
               name="address" required>

        @error('address')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="email"
               class="col-md-12 col-form-label text-left">{{ __('Dirección de correo electrónico') }}</label>
        <input id="email" type="email" maxlength="45"
               class="form-control @error('email') is-invalid @enderror" @if($errors->any()) value="{{ old('email')}}"@endif value="{{$user->email}}"
               name="email" required autocomplete="current-password">

        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

</div>

<div class="form-group row mb-0">
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-outline-primary">
            {{ __('Actualizar') }}
        </button>
    </div>
</div>
