<form method="POST" action="{{$action}}">
    @if(\Illuminate\Support\Facades\Route::currentRouteName() =='supplier.edit')
        @method('PUT')
    @endif
    @csrf

    <div class="form-group row">
        <div class="col-md-6">
            <label for="name" class="col-form-label">{{__('Nombre de Proveedor')}}:</label>
            <input type="text" name="name" required maxlength="100"
                   placeholder="{{__('Ingresa el nombre del proveedor (máximo 100 caracteres).')}}"
                   class="form-control @error('name') is-invalid @enderror"
                   id="name"
                   value="@if($errors->any()){{ old('name')}}@else{{$supplier->name ?? ''}}@endif">
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="description" class="col-form-label">{{__('Descripción')}}:</label>
            <textarea type="text" aria-multiline="true" name="description" required
                   placeholder="{{__('Ingresa la descripción del proveedor.')}}"
                   class="form-control @error('description') is-invalid @enderror"
                   id="description"> "@if($errors->any()){{ old('description')}}@else{{$supplier->description ?? ''}}@endif</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="phone_number" class="col-form-label">{{__('Número de teléfono')}}:</label>
            <input type="number" name="phone_number" required minlength="8" maxlength="8"
                   placeholder="{{__('Ingresa el número de teléfono del proveedor (sin espacios ni guiones).')}}"
                   class="form-control @error('phone_number') is-invalid @enderror"
                   id="phone_number"
                   value="@if($errors->any()){{ old('phone_number')}}@else{{$supplier->phone_number ?? ''}}@endif">
            @error('phone_number')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="address" class="col-form-label">{{__('Dirección')}}:</label>
            <input type="text"  name="address" required maxlength="100"
                   placeholder="{{__('Ingresa la dirección del proveedor (máximo 100 caracteres).')}}"
                   class="form-control @error('address') is-invalid @enderror"
                   id="address"
                   value="@if($errors->any()){{ old('address')}}@else{{$supplier->address ?? ''}}@endif">

            @error('address')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="email" class="col-form-label">{{__('e-mail')}}:</label>
            <input type="email" name="email" required maxlength="100"
                   placeholder="{{__('Ingresa el e-mail del proveedor (máximo 100 caracteres).')}}"
                   class="form-control @error('email') is-invalid @enderror"
                   id="email"
                   value="@if($errors->any()){{ old('email')}}@else{{$supplier->email ?? ''}}@endif">
            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

    </div>


    <button type="submit" class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;
                bottom:40px !important;right:40px !important;color:#FFF;
                border-radius:50px !important;text-align:center;
                box-shadow: 2px 2px 3px #999 !important;">
        <i class="fas fa-lg fa-save"></i>
    </button>
</form>
