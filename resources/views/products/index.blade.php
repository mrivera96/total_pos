@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead >
                    <tr>
                        <th scope="col">Id</th>
                        <th></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Código de barra</th>
                        <th scope="col">En existencia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr style="cursor: pointer" onclick="window.location.href='{{route('product.show', $product->id)}}'">
                            <th scope="row">{{$product->id}}</th>
                            <th scope="row">
                                <img class="rounded-circle img-size-32" src="{{asset('img/'.$product->image)}}">
                            </th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->barcode}}</td>
                            <td>{{$product->in_stock}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-5">
                <a href="{{route('product.create')}}" class="btn btn-outline-primary">{{__('Nuevo Producto')}}</a>
            </div>
        </div>
    </div>
@endsection
