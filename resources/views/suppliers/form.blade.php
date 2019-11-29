<form method="POST" @if(\Illuminate\Support\Facades\Route::currentRouteName()=='supplier.edit')
                        action="{{route('supplier.update', $supplier)}}"
                    @elseif(\Illuminate\Support\Facades\Route::currentRouteName()=='supplier.create')
                        action="{{route('supplier.store')}}"
                    @endif>
    @method('PUT')
    @csrf

    <div class="form-group row">
        <div class="col-md-6">
            <label for="name" class="col-form-label">{{__('Nombre de Proveedor')}}:</label>
            <input type="text" name="name" required maxlength="45" placeholder="{{__('Ingresa el nombre del proveedor (máximo 45 caracteres).')}}"
                   class="form-control @error('name') is-invalid @enderror"
                   id="name"
                   @if($errors->any()) value="{{ old('name')}}"
                   @endif
                   @if(\Illuminate\Support\Facades\Route::currentRouteName()=='supplier.edit')
                        value="{{$supplier->name}}"
                    @endif>
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="description" class="col-form-label">{{__('Descripción')}}:</label>
            <input type="text" aria-multiline="true" name="description" required maxlength="100" placeholder="{{__('Ingresa la descripción del proveedor.')}}"
                   class="form-control @error('description') is-invalid @enderror"
                   id="description"
                   @if($errors->any()) value="{{ old('description')}}"
                   @endif
                   @if(\Illuminate\Support\Facades\Route::currentRouteName()=='supplier.edit')
                    value="{{$supplier->description}}"
                    @endif>
            @error('description')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="phone_number" class="col-form-label">{{__('Número de teléfono')}}:</label>
            <input type="number" name="phone_number" required maxlength="8" placeholder="{{__('Ingresa el número de teléfono del proveedor (máximo 45 caracteres).')}}"
                   class="form-control @error('phone_number') is-invalid @enderror"
                   id="phone_number"
                   @if($errors->any()) value="{{ old('phone_number')}}"
                   @endif
                   @if(\Illuminate\Support\Facades\Route::currentRouteName()=='supplier.edit')
                    value="{{$supplier->phone_number}}"
                    @endif>
            @error('phone_number')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="address" class="col-form-label">{{__('Dirección')}}:</label>
            <input type="text" aria-multiline="true" name="address" required maxlength="100"
                   class="form-control @error('address') is-invalid @enderror"
                   id="address"
                   @if($errors->any()) value="{{ old('address')}}"
                   @endif
                   @if(\Illuminate\Support\Facades\Route::currentRouteName()=='supplier.edit')
                   value="{{$supplier->address}}"
                    @endif>

            @error('address')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="name" class="col-form-label">{{__('e-mail')}}:</label>
            <input type="email" name="email" required maxlength="100"
                   class="form-control @error('email') is-invalid @enderror"
                   id="email"
                   @if($errors->any()) value="{{ old('email')}}"
                   @endif
                   @if(\Illuminate\Support\Facades\Route::currentRouteName()=='supplier.edit')
                   value="{{$supplier->email}}"
                    @endif>
            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

    </div>

    <div class="form-group row mb-0">

        <div class="col-md-6 text-left">
            <button type="button" data-toggle="modal" data-dismiss="modal"
                    data-target="#deleteAlert" class="btn btn-lg btn-danger">Eliminar
            </button>
        </div>
    </div>
    <button type="submit" class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;
                bottom:40px !important;right:40px !important;color:#FFF;
                border-radius:50px !important;text-align:center;
                box-shadow: 2px 2px 3px #999 !important;">
        <i class="fas fa-lg fa-save"></i>
    </button>
</form>
