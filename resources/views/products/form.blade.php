<div class="card-body">
    <form method="POST" enctype="multipart/form-data" action="{{$action}}">
        @if(\Illuminate\Support\Facades\Route::currentRouteName() =='product.edit')
            @method('PUT')
        @endif
        @csrf
        <div class="form-group row align-content-center" style="position: relative">

            <label class="btn btn-default fas fa-camera rounded-circle bg-gradient-blue"
                   style="position: absolute; left: 43%; top: 85%">
                <input id="image" class="@error('image') is-invalid @enderror" type="file" name="image"
                       @if($errors->any())
                       value="{{ old('image')}}"
                       @endif style="display: none;">
            </label>

            <img id="preview" class="rounded-circle m-auto" style="width: 25%;"
                 @if(isset($product->image) && !empty($product->image))
                 src="{{asset('img/'.$product->image)}}"
                 @else src="{{asset('img/profile.png')}}"@endif>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="name" class="col-md-12 col-form-label text-left">{{ __('Nombre del producto') }}:</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                       placeholder="{{__('Ingresa el nombre del producto.')}}"
                       @if($errors->any())
                       value="{{ old('name')}}"
                       @endif
                       value="@if(isset($product->name)){{ $product->name }} @endif"
                       required autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="description"
                       class="col-md-12 col-form-label text-left">{{ __('Descripción') }}:</label>
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                       placeholder="{{__('Ingresa la descripción del producto.')}}"
                       name="description" @if($errors->any()) value="{{ old('description')}}" @endif
                       value="@if(isset($product->description)){{ $product->description }}@endif"
                       required autofocus>

                @error('description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="barcode"
                       class="col-md-12 col-form-label text-left">{{ __('Código de barra') }}:</label>
                <input id="barcode" type="text" class="form-control @error('productname') is-invalid @enderror"
                       placeholder="{{__('Ingresa el nombre de usuario sin espacios.')}}"
                       name="barcode" @if($errors->any()) value="{{ old('barcode')}}" @endif
                       value="@if(isset($product->barcode)){{$product->barcode}}@endif"
                       required autofocus>

                @error('barcode')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>


            <div class="col-md-6">
                <label for="cost" class="col-md-12 col-form-label text-left">{{ __('Costo') }}:</label>
                <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror"
                       placeholder="{{__('Ingresa el costo del producto.')}}"
                       @if($errors->any())
                       value="{{ old('cost')}}"
                       @endif
                       value="@if(isset($product->cost)){{$product->cost}}@endif"
                       name="cost" required>

                @error('cost')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="sale_price" class="col-md-12 col-form-label text-left">{{ __('Precio de venta') }}:</label>
                <input id="sale_price" type="text" class="form-control @error('sale_price') is-invalid @enderror"
                       value="@if(isset($product->sale_price)){{$product->sale_price}} @elseif($errors->any()) {{old('sale_price')}}@endif"
                       name="sale_price" required>

                @error('sale_price')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="in_stock"
                       class="col-md-12 col-form-label text-left">{{ __('En existencia') }}:</label>
                <input id="in_stock" type="text"
                       class="form-control @error('in_stock') is-invalid @enderror"
                       placeholder="{{__('Ingresa la cantidad en existencia.')}}"
                       value="@if($errors->any()){{ old('in_stock')}}
                       @elseif(isset($product->in_stock))
                        {{$product->in_stock}}
                       @endif"
                        name="in_stock" required>

                @error('in_stock')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="brand" class="col-md-12 col-form-label text-left">{{ __('Marca') }}:</label>
                <input id="brand" type="text" maxlength="100"
                       class="form-control @error('brand') is-invalid @enderror"
                       placeholder="{{__('Ingresa la marca del producto.')}}"
                       value="@if($errors->any()){{ old('brand')}}@elseif(isset($product->brand)){{$product->brand}}@endif"
                       name="brand" required>

                @error('brand')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="email"
                       class="col-md-12 col-form-label text-left">{{ __('Dirección de correo electrónico') }}</label>
                <input id="email" type="email" maxlength="100" class="form-control @error('email') is-invalid @enderror"
                       placeholder="{{__('Ingresa el e-mail del usuario (máximo 100 caracteres).')}}"
                       @if($errors->any())
                       value="{{ old('email')}}"
                       @endif

                       @if(\Illuminate\Support\Facades\Route::currentRouteName()=='product.edit')
                       value="{{$product->email}}"
                       @endif name="email" required>

                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

        </div>

        @if(\Illuminate\Support\Facades\Route::currentRouteName()=='product.create')
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{__('Ingresa la nueva contraseña del usuario.')}}"
                           @if($errors->any())
                           value="{{ old('password')}}"
                           @endif
                           name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="password-confirm"
                           class="col-md-12 col-form-label text-left">{{ __('Confirmar contraseña') }}</label>
                    <input id="password-confirm" type="password"
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
                <button type="submit" class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;
    bottom:40px !important;right:40px !important;color:#FFF;
    border-radius:50px !important;text-align:center;
    box-shadow: 2px 2px 3px #999 !important;">
                    <i class="fas fa-lg fa-save"></i>
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
