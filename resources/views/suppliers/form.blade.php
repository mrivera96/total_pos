<form method="POST" action="{{$action ?? ''}}">
    @if(\Illuminate\Support\Facades\Route::currentRouteName() =='supplier.edit')
        @method('PUT')
    @endif
    @csrf

    <div class="form-group row">
        @if(!isset($action))
            <div class="col-md-12 text-center">
                <label class="btn btn-danger fas fa-trash-alt">
                    <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                </label>
            </div>
            @include('suppliers.modal_delete')
        @endif
        <div class="col-md-6">
            <label for="name" class="col-form-label">{{__('Nombre de Proveedor')}}:</label>
            <input type="text" name="name" required maxlength="100" @if(!isset($action)) readonly @endif
            placeholder="{{__('Ingresa el nombre del proveedor (máximo 100 caracteres).')}}"
                   class="form-control @error('name') is-invalid @enderror"
                   id="name" autofocus
                   value="@if($errors->any()){{ old('name')}}@else{{$supplier->name ?? ''}}@endif">
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="description" class="col-form-label">{{__('Descripción')}}:</label>
            <textarea type="text" aria-multiline="true" name="description" required
                      placeholder="{{__('Ingresa la descripción del proveedor.')}}" @if(!isset($action)) readonly @endif
                      class="form-control @error('description') is-invalid @enderror"
                      id="description"> @if($errors->any()){{ old('description')}}@else{{$supplier->description ?? ''}}@endif</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="phone_number" class="col-form-label">{{__('Número de teléfono')}}:</label>
            <input type="tel" name="phone_number" required minlength="8" maxlength="8"
                   placeholder="{{__('Ingresa el número de teléfono del proveedor (sin espacios ni guiones).')}}"
                   class="form-control @error('phone_number') is-invalid @enderror"
                   id="phone_number" @if(!isset($action)) readonly @endif
                   value="@if($errors->any()){{ old('phone_number')}}@else{{$supplier->phone_number ?? ''}}@endif">
            @error('phone_number')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="address" class="col-form-label">{{__('Dirección')}}:</label>
            <input type="text" name="address" required maxlength="100"
                   placeholder="{{__('Ingresa la dirección del proveedor (máximo 100 caracteres).')}}"
                   class="form-control @error('address') is-invalid @enderror"
                   id="address" @if(!isset($action)) readonly @endif
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
                   id="email" @if(!isset($action)) readonly @endif
                   value="@if($errors->any()){{ old('email')}}@else{{$supplier->email ?? ''}}@endif">
            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

    </div>

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">

            @isset($action)
                <button type="submit" class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-save"></i>
                </button>
            @else
                <button type="button" onclick="window.location.href='{{route('supplier.edit',$supplier->id)}}'"
                        class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-edit"></i>
                </button>
            @endisset
        </div>
    </div>
</form>
