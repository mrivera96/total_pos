<div class="card-body">
    <form method="POST" enctype="multipart/form-data"
          @if(\Illuminate\Support\Facades\Route::currentRouteName() =='user.create')
            action="{{ route('user.store') }}"
          @elseif(\Illuminate\Support\Facades\Route::currentRouteName() =='user.edit')
            action="{{ route('user.update', $user->id) }}"@endif>

        @if(\Illuminate\Support\Facades\Route::currentRouteName() =='user.edit')
            @method('PUT')
        @endif
        @csrf
        <div class="form-group row align-content-center" style="position: relative">
            <label class="btn btn-default fas fa-camera rounded-circle bg-gradient-blue" style="position: absolute; left: 43%; top: 85%">
                <input id="avatar" class="@error('avatar') is-invalid @enderror" type="file" name="avatar"
                       @if($errors->any())
                        value="{{ old('avatar')}}"
                       @endif style="display: none;">
            </label>

            <img id="preview" class="rounded-circle m-auto" style="width: 25%;"
                 @if(isset($user->avatar) && !empty($user->avatar))
                    src="{{asset('img/'.$user->avatar)}}"
                 @else src="{{asset('img/profile.png')}}"@endif>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="name" class="col-md-4 col-form-label text-left">{{ __('Nombre (s)') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{__('Ingresa el primer nombre del usuario.')}}"
                       @if($errors->any())
                            value="{{ old('name')}}"
                       @endif
                       @if(\Illuminate\Support\Facades\Route::currentRouteName()=='user.edit')
                            value="{{ $user->name }}"
                       @endif required autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
            </div>

            <div class="col-md-6">
                <label for="last_name"
                       class="col-md-4 col-form-label text-left">{{ __('Apellido (s)') }}</label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="{{__('Ingresa el apellido del usuario.')}}"
                       name="last_name" @if($errors->any()) value="{{ old('last_name')}}" @endif
                       @if(\Illuminate\Support\Facades\Route::currentRouteName()=='user.edit')
                            value="{{ $user->last_name }}"
                       @endif required autofocus>

                @error('last_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="username"
                       class="col-md-12 col-form-label text-left">{{ __('Nombre de usuario (Se usará para iniciar sesión)') }}</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="{{__('Ingresa el nombre de usuario sin espacios.')}}"
                       name="username" @if($errors->any()) value="{{ old('username')}}" @endif
                       @if(\Illuminate\Support\Facades\Route::currentRouteName()=='user.edit')value="{{$user->username}}"
                       @endif required autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>


            <div class="col-md-6">
                <label for="dni" class="col-md-4 col-form-label text-left">{{ __('No. Identidad') }}</label>
                <input id="dni" type="number" maxlength="13" class="form-control @error('dni') is-invalid @enderror" placeholder="{{__('Ingresa el número de identidad del usuario sin espacios ni guiones.')}}"
                       @if($errors->any())
                            value="{{ old('dni')}}"
                       @endif
                       @if(\Illuminate\Support\Facades\Route::currentRouteName()=='user.edit')
                            value="{{$user->dni}}"
                       @endif name="dni" required>

                @error('dni')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="birthday" class="col-md-12 col-form-label text-left">{{ __('Fecha de nacimiento') }}</label>
                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
                       @if($errors->any())
                            value="{{ old('birthday')}}" @endif
                       @if(\Illuminate\Support\Facades\Route::currentRouteName()=='user.edit')
                            value="{{$user->birthday}}"
                       @endif  name="birthday" required>

                @error('birthday')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="cellphone_number"
                       class="col-md-12 col-form-label text-left">{{ __('Número celular') }}</label>
                <input id="cellphone_number" type="number" maxlength="8" minlength="8" class="form-control @error('cellphone_number') is-invalid @enderror"
                       placeholder="{{__('Ingresa el número de celular del usuario sin espacios ni guiones.')}}"
                       @if($errors->any())
                            value="{{ old('cellphone_number')}}"
                       @endif
                       @if(\Illuminate\Support\Facades\Route::currentRouteName()=='user.edit')
                            value="{{ $user->cellphone_number}}"
                       @endif name="cellphone_number" required>

                @error('cellphone_number')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="address" class="col-md-4 col-form-label text-left">{{ __('Dirección') }}</label>
                <input id="address" type="text" maxlength="100" class="form-control @error('address') is-invalid @enderror" placeholder="{{__('Ingresa la dirección del usuario (máximo 100 caracteres).')}}"
                       @if($errors->any())
                            value="{{ old('address')}}"
                       @endif
                       @if(\Illuminate\Support\Facades\Route::currentRouteName()=='user.edit')
                            value="{{$user->address}}"
                       @endif
                       name="address" required>

                @error('address')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="email" class="col-md-12 col-form-label text-left">{{ __('Dirección de correo electrónico') }}</label>
                <input id="email" type="email" maxlength="100" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('Ingresa el e-mail del usuario (máximo 100 caracteres).')}}"
                       @if($errors->any())
                            value="{{ old('email')}}"
                       @endif

                       @if(\Illuminate\Support\Facades\Route::currentRouteName()=='user.edit')
                            value="{{$user->email}}"
                       @endif name="email" required>

                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

        </div>

        @if(\Illuminate\Support\Facades\Route::currentRouteName()=='user.create')
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="role_id" class="col-md-4 col-form-label text-left">{{ __('Rol') }}</label>
                    <select class="form-control" name="role_id">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->description}}</option>
                        @endforeach
                    </select>


                    @error('role_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="branch_id"
                           class="col-md-12 col-form-label text-left">{{ __('Sucursal') }}
                        <select class="form-control" name="branch_id">
                            @foreach($branchs as $branch)
                                <option value="{{$branch->id}}">{{$branch->description}}</option>
                            @endforeach
                        </select>
                    </label>

                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="password"
                           class="col-md-12 col-form-label text-left">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('Ingresa la nueva contraseña del usuario.')}}"
                           @if($errors->any())
                                value="{{ old('password')}}"
                           @endif
                           name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="password-confirm" class="col-md-12 col-form-label text-left">{{ __('Confirmar contraseña') }}</label>
                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required placeholder="{{__('Ingrese de nuevo la contraseña.')}}">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

            </div>

        @endif

        <div class="form-group row mb-0">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-outline-primary">
                    @if(\Illuminate\Support\Facades\Route::currentRouteName() =='user.edit')
                        {{ __('Actualizar') }}
                    @elseif(\Illuminate\Support\Facades\Route::currentRouteName() =='user.create')
                        {{ __('Guardar') }}
                    @endif
                </button>
            </div>
        </div>
    </form>
</div>

@section('scripts')
        $('#avatar').change(function () {
            var imgPath = $(this)[0].value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Por favor, seleccione un archivo de imagen (jpg, jpeg, png).");
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }
            }
        }
@stop
