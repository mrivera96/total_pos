<form method="POST" enctype="multipart/form-data" action="{{$action ?? ''}}">
    @if(\Illuminate\Support\Facades\Route::currentRouteName() =='user.edit')
        @method('PUT')
    @endif
    @csrf
    <div class="form-group row align-content-center" style="position: relative">
        @isset($action)
            <label class="btn btn-default fas fa-camera rounded-circle bg-gradient-blue"
                   style="position: absolute; left: 43%; top: 85%">

                <input id="avatar" class="@error('avatar') is-invalid @enderror" type="file" name="avatar"
                       value="@if($errors->any()){{ old('avatar')}}@endif"
                       style="display: none;">

            </label>
        @endisset


        <img id="preview" class="rounded-circle m-auto" style="width: 130px;height: 130px"
             src=" @isset($user->avatar) {{asset('img/'.$user->avatar)}} @else {{asset('img/profile.png')}}@endisset">
        @if(!isset($action))
            <div class="col-md-12 text-center">
                <label class="btn btn-danger fas fa-trash-alt">
                    <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                </label>
            </div>
            @include('users.modal_delete')
        @endif
    </div>
    @error('avatar')
    <div class="alert alert-danger" role="alert"><strong>{{ $message }}</strong></div>
    @enderror
    <div class="form-group row">

        <div class="col-md-6">
            <label for="name" class="col-form-label text-left">{{ __('Nombre (s)') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   maxlength="45" @if(!isset($action)) readonly @endif
                   placeholder="{{__('Ingresa el nombre o nombres del usuario.')}}"
                   value="@if($errors->any()){{ old('name')}}@else{{ $user->name ?? '' }}@endif"
                   required autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="last_name"
                   class="col-form-label text-left">{{ __('Apellido (s)') }}</label>
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                   maxlength="45" @if(!isset($action)) readonly @endif
                   placeholder="{{__('Ingresa el o los apellidos del usuario.')}}"
                   name="last_name"
                   value="@if($errors->any()){{ old('last_name')}}@else{{ $user->last_name ?? '' }}@endif"
                   required autofocus>

            @error('last_name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="username"
                   class="col-form-label text-left">{{ __('Nombre de usuario (Se usará para iniciar sesión)') }}</label>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                   placeholder="{{__('Ingresa el nombre de usuario sin espacios.')}}" maxlength="15"
                   name="username" @if(!isset($action)) readonly @endif
                   value="@if($errors->any()){{ old('username')}}@else{{$user->username ?? ''}}@endif"
                   required autofocus>

            @error('username')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>


        <div class="col-md-6">
            <label for="dni" class="col-form-label text-left">{{ __('No. Identidad') }}</label>
            <input id="dni" type="text" minlength="13" maxlength="13" @if(!isset($action)) readonly @endif
            class="form-control @error('dni') is-invalid @enderror"
                   placeholder="{{__('Ingresa el número de identidad del usuario sin espacios ni guiones.')}}"
                   value="@if($errors->any()){{ old('dni')}}@else{{$user->dni ?? ''}}@endif"
                   name="dni" required>

            @error('dni')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="birthday" class="col-form-label text-left">{{ __('Fecha de nacimiento') }}</label>
            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
                   value="@if($errors->any()){{ old('birthday')}}@else{{$user->birthday ?? ''}}@endif"
                   name="birthday" @if(!isset($action)) readonly @endif required>

            @error('birthday')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="mobile"
                   class="col-form-label text-left">{{ __('Número celular') }}</label>
            <input id="mobile" type="tel" maxlength="8" minlength="8"
                   class="form-control @error('mobile') is-invalid @enderror"
                   placeholder="{{__('Ingresa el número de celular del usuario sin espacios ni guiones.')}}"
                   value="@if($errors->any()){{ old('mobile')}}@else{{ $user->mobile ?? ''}}@endif"
                   name="mobile" required @if(!isset($action)) readonly @endif>

            @error('mobile')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="address" class="col-form-label text-left">{{ __('Dirección') }}</label>
            <input id="address" type="text" maxlength="100"
                   class="form-control @error('address') is-invalid @enderror"
                   placeholder="{{__('Ingresa la dirección del usuario (máximo 100 caracteres).')}}"
                   value="@if($errors->any()){{ old('address')}}@else{{$user->address ?? ''}}@endif"
                   name="address" required @if(!isset($action)) readonly @endif>

            @error('address')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="email"
                   class="col-form-label text-left">{{ __('Dirección de correo electrónico') }}</label>
            <input id="email" type="email" maxlength="100" class="form-control @error('email') is-invalid @enderror"
                   placeholder="{{__('Ingresa el e-mail del usuario (máximo 100 caracteres).')}}"
                   value="@if($errors->any()){{ old('email')}}@else{{$user->email ?? ''}}@endif"
                   name="email" required @if(!isset($action)) readonly @endif>

            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

    </div>

    @if(!isset($user))
        <div class="form-group row">
            <div class="col-md-6">
                <label for="role_id" class="col-form-label text-left">{{ __('Rol') }}</label>
                <select class="form-control" name="role_id" required @if(!isset($action)) readonly @endif>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->description}}</option>
                    @endforeach
                </select>

                @error('role_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="branch_id" class="col-form-label text-left">{{ __('Sucursal') }}</label>
                <select class="form-control" name="branch_id" required @if(!isset($action)) readonly @endif>
                    @foreach($branchs as $branch)
                        <option value="{{$branch->id}}">{{$branch->description}}</option>
                    @endforeach
                </select>

                @error('branch_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="password"
                       class="col-form-label text-left">{{ __('Contraseña') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="{{__('Ingresa la nueva contraseña del usuario.')}}"
                       value="@if($errors->any()){{ old('password')}}@endif" @if(!isset($action)) readonly @endif
                       name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="password-confirm"
                       class="col-form-label text-left">{{ __('Confirmar contraseña') }}</label>
                <input id="password-confirm" type="password" @if(!isset($action)) readonly @endif
                class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                       required placeholder="{{__('Ingrese de nuevo la contraseña.')}}">

                @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

        </div>

    @endif

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            @isset($action)
                <button type="submit" class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-save"></i>
                </button>
            @else
                <button type="button" onclick="window.location.href='{{route('user.edit',$user->id)}}'"
                        class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-edit"></i>
                </button>
            @endisset
        </div>
    </div>
</form>


