@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header bg-blue">
        <div class="row text-center" style="position: relative">
            <div class="col-md-12 ">
                <h3>{{$supplier->name}}</h3>
            </div>

            <div class="col-md-12">
                <label class="btn btn-danger fas fa-trash-alt">
                    <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                </label>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label for="name" class="col-md-12 col-form-label">{{__('Nombre de Proveedor')}}:</label>
                <input class="form-control" type="text" name="name" value="{{$supplier->name}}" readonly/>
            </div>

            <div class="col-md-4">
                <label for="description" class="col-md-12 col-form-label">{{__('Descripción')}}:</label>
                <input type="text" class="form-control" aria-multiline="true" name="description"  id="description" value="{{$supplier->description}}" readonly>
               
            </div>

            <div class="col-md-4">
                <label for="phone_number" class="col-md-12 col-form-label">{{__('Número de teléfono')}}:</label>
                <input class="form-control" type="text" name="phone_number" value="{{$supplier->phone_number}}" readonly>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-4">
                <label for="address" class="col-form-label">{{__('Dirección')}}:</label>
                <input type="text" class="form-control" id="address" value="{{$supplier->address}}" readonly>
            </div>

            <div class="col-md-4">
                <label for="name" class="col-form-label">{{__('e-mail')}}:</label>
                <input type="email" name="email" class="form-control" id="email" value="{{$supplier->email}}"
                readonly>
            </div>
        </div>


        <button class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;
                bottom:40px !important;right:40px !important;color:#FFF;
                border-radius:50px !important;text-align:center;
                box-shadow: 2px 2px 3px #999 !important;"
                onclick="window.location.href='{{route('supplier.edit', $supplier->id)}}'">
            <i class="fas fa-lg fa-edit"></i>
        </button>





        <div class="modal fade" id="deleteAlert" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">{{__('Eliminar Proveedor')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__('¿Estás seguro de eliminar el proveedor '.$supplier->name.'?')}}</p>
                        <form id="delete-category" method="POST" action="{{route('supplier.destroy', $supplier->id)}}">
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