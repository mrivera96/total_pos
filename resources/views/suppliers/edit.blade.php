@extends('layouts.master')

@section('content')
    @include('layouts.content_header')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('supplier.update', $supplier->id)}}">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name" class="col-form-label">{{__('Nombre de Proveedor')}}:</label>
                        <input type="text" name="name" required maxlength="45"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               @if($errors->any()) value="{{ old('name')}}"
                               @endif  value="{{$supplier->name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="col-form-label">{{__('Descripción')}}:</label>
                        <input type="text" aria-multiline="true" name="description" required maxlength="100"
                               class="form-control @error('description') is-invalid @enderror"
                               id="description"
                               @if($errors->any()) value="{{ old('description')}}"
                               @endif  value="{{$supplier->description}}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name" class="col-form-label">{{__('Número de teléfono')}}:</label>
                        <input type="number" name="phone_number" required maxlength="45"
                               class="form-control @error('phone_number') is-invalid @enderror"
                               id="phone_number"
                               @if($errors->any()) value="{{ old('phone_number')}}"
                               @endif  value="{{$supplier->phone_number}}">
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="col-form-label">{{__('Dirección')}}:</label>
                        <input type="text" aria-multiline="true" name="address" required maxlength="100"
                               class="form-control @error('address') is-invalid @enderror"
                               id="address"
                               @if($errors->any()) value="{{ old('address')}}"
                               @endif  value="{{$supplier->address}}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name" class="col-form-label">{{__('e-mail')}}:</label>
                        <input type="email" name="email" required maxlength="100"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               @if($errors->any()) value="{{ old('email')}}"
                               @endif  value="{{$supplier->email}}">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-6 text-left">
                        <button type="button" data-toggle="modal" data-dismiss="modal"
                                data-target="#deleteAlert-{{$supplier->id}}" class="btn btn-danger">Eliminar
                        </button>
                    </div>

                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>
                </div>
            </form>

            <div class="modal fade" id="deleteAlert-{{$supplier->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel">{{__('Eliminar Categoría')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{__('¿Estás seguro de eliminar la categoría '.$supplier->description.'?')}}</p>
                            <form id="delete-category" method="POST"
                                  action="{{route('supplier.destroy', $supplier->id)}}">
                                @method('DELETE')
                                @csrf
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


