<form method="POST" action="{{$action ?? ''}}">

    @if($action ?? '' == 'customer.edit')
        @method('PUT')
    @endif
    @csrf
        @if(!isset($action))
            <div class="col-md-12 text-center">
                <label class="btn btn-danger fas fa-trash-alt">
                    <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                </label>
            </div>
            @include('customers.modal_delete')
        @endif

    <div class="form-group row">
        <div class="col-md-6">
            <label for="name" class="col-form-label">Nombre(s):</label>
            <input type="text" name="name" required @if(!isset($action)) readonly @endif maxlength="45"
                   class="form-control @error('name') is-invalid @enderror" id="name"
                   placeholder="Ingresa el nombre(s) del cliente (máximo 100 caracteres)." autofocus
                   value="@if($errors->any()){{ old('name')}}@else{{$customer->name ?? ''}}@endif"/>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="last_name" class="col-form-label">Apellido(s):</label>
            <input type="text" name="last_name" required maxlength="45" @if(!isset($action)) readonly
                   @endif class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                   placeholder="Ingresa el apellido(s) del cliente (máximo 100 caracteres)."
                   value="@if($errors->any()){{ old('last_name')}}@else{{$customer->last_name ?? ''}}@endif"/>
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="form-group row">

        <div class="col-md-6">
            <label for="birthday" class="col-form-label">Fecha de nacimiento:</label>
            <input type="date" name="birthday" required @if(!isset($action)) readonly
                   @endif class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                   placeholder="Ingresa la fecha de nacimiento del cliente."
                   value="@if($errors->any()){{ old('birthday')}}@else{{$customer->birthday ?? ''}}@endif"/>
            @error('birthday')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="dni" class="col-form-label">No. de Identidad:</label>
            <input type="text" name="dni" required @if(!isset($action)) readonly @endif maxlength="13" minlength="13"
                   class="form-control @error('dni') is-invalid @enderror" id="dni"
                   placeholder="Ingresa el número de identidad del cliente."
                   value="@if($errors->any()){{ old('dni')}}@else{{$customer->dni ?? ''}}@endif"/>
            @error('dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="form-group row">

        <div class="col-md-6">
            <label for="email" class="col-form-label">e-mail:</label>
            <input type="email" name="email" @if(!isset($action)) readonly @endif maxlength="100"
                   class="form-control @error('email') is-invalid @enderror" id="email"
                   placeholder="Ingresa el e-mail del cliente."
                   value="@if($errors->any()){{ old('email')}}@else{{$customer->email ?? ''}}@endif"/>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="cellphone_number" class="col-form-label">Número Celular:</label>
            <input type="tel" name="cellphone_number" required @if(!isset($action)) readonly @endif maxlength="8"
                   minlength="8" class="form-control @error('cellphone_number') is-invalid @enderror"
                   id="cellphone_number" placeholder="Ingresa el número celular del cliente."
                   value="@if($errors->any()){{ old('cellphone_number')}}@else{{$customer->cellphone_number ?? ''}}@endif"/>
            @error('cellphone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="form-group row">

        <div class="col-md-6">
            <label for="address" class="col-form-label">Dirección:</label>
            <input type="text" name="address" @if(!isset($action)) readonly @endif required maxlength="100"
                   class="form-control @error('address') is-invalid @enderror" id="address"
                   placeholder="Ingresa la dirección del cliente (máximo 100 caracteres)."
                   value="@if($errors->any()){{ old('address')}}@else{{$customer->address ?? ''}}@endif"/>
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row ">
        <div class="col-md-12 text-right">

            @isset($action)
                <button type="submit" class="btn bg-primary my-float">
                    <i class="fas fa-lg fa-save"></i>
                </button>
            @else
                <button type="button" class=" btn bg-primary my-float"
                        onclick="window.location.href='{{route('customer.edit',$customer->id ?? '')}}'">
                    <i class="fas fa-lg  fa-edit"></i>
                </button>
            @endisset
        </div>
    </div>

</form>
