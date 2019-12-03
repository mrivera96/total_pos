@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header bg-blue">
        <div class="row text-center" style="position: relative">
        <div class="col-md-12 ">
                <img class="rounded-circle" width="20%" src="{{asset('img/'.$product->image)}}"/>
            </div>
            <div class="col-md-12 ">
                <h3>{{$product->name}}</h3>
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
                <label for="name" class="col-md-12 col-form-label">{{__('Nombre de Producto')}}:</label>
                <input class="form-control" type="text" name="name" value="{{$product->name}}" readonly/>
            </div>

            <div class="col-md-4">
                <label for="description" class="col-md-12 col-form-label">{{__('Descripción')}}:</label>
                <input type="text" class="form-control" aria-multiline="true" name="description"  id="description" value="{{$product->description}}" readonly>
               
            </div>

            <div class="col-md-4">
                <label for="barcode" class="col-md-12 col-form-label">{{__('Código de barra')}}:</label>
                <input class="form-control" type="text" name="barcode" value="{{$product->barcode}}" readonly>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-4">
                <label for="cost" class="col-form-label">{{__('Costo')}}:</label>
                <input type="text" class="form-control" id="cost" value="Lps. {{$product->cost}}" readonly>
            </div>

            <div class="col-md-4">
                <label for="sale_price" class="col-form-label">{{__('Precio de venta')}}:</label>
                <input type="text" name="sale_price" class="form-control" id="sale_price" value="Lps. {{$product->sale_price}}"
                readonly>
            </div>

            <div class="col-md-4">
                <label for="in_stock" class="col-form-label">{{__('En existencia')}}:</label>
                <input type="text" name="in_stock" class="form-control" id="in_stock" value="{{$product->in_stock}}"
                readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="brand" class="col-form-label">{{__('Marca')}}:</label>
                <input type="text" name="brand" class="form-control" id="brand" value="{{$product->brand}}"
                readonly>
            </div>

            <div class="col-md-4">
                <label for="supplier" class="col-form-label">{{__('Proveedor')}}:</label>
                <input type="text" name="supplier" class="form-control" id="supplier" value="{{$product->supplier->name}}"
                readonly>
            </div>
            <div class="col-md-4">
                <label for="category" class="col-form-label">{{__('Categoría')}}:</label>
                <input type="text" name="category" class="form-control" id="category" value="{{$product->category->description}}"
                readonly>
            </div>
        </div>


        <button class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;
                bottom:40px !important;right:40px !important;color:#FFF;
                border-radius:50px !important;text-align:center;
                box-shadow: 2px 2px 3px #999 !important;"
                onclick="window.location.href='{{route('product.edit', $product->id)}}'">
            <i class="fas fa-lg fa-edit"></i>
        </button>



        <div class="modal fade" id="deleteAlert" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">{{__('Eliminar Producto')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__('¿Estás seguro de eliminar el producto '.$product->name.'?')}}</p>
                        <form id="delete-product" method="POST" action="{{route('product.destroy', $product->id)}}">
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