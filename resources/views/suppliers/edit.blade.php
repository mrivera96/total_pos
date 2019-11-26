@extends('layouts.master')

@section('content')
@include('dashboard.content_header')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{route('supplier.update', $supplier->id)}}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">{{__('Nombre de Proveedor')}}:</label>
                                            <input type="text" name="name" required maxlength="45"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   id="name"
                                                   @if($errors->any()) value="{{ old('name')}}"
                                                   @endif  value="{{$supplier->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">{{__('Descripción de Proveedor')}}:</label>
                                            <input type="text" name="description" required maxlength="100"
                                                   class="form-control @error('description') is-invalid @enderror"
                                                   id="name"
                                                   @if($errors->any()) value="{{ old('name')}}"
                                                   @endif  value="{{$supplier->name}}">
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancelar
                                            </button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>

                                        <div class="form-group text-left">
                                            <button type="button" data-toggle="modal" data-dismiss="modal"
                                                    data-target="#deleteAlert-{{$supplier->id}}" class="btn btn-danger">Eliminar
                                            </button>
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
@endsection


  </div>

  
</div>

