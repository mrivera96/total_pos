@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead >
                    <tr>
                        <th scope="col"># </th>
                        <th></th>
                        <th scope="col">{{__('Nombre         ')}} </th>
                        <th scope="col">{{__('Descripción    ')}} </th>
                        <th scope="col">{{__('Categoría      ')}} </th>
                        <th scope="col">{{__('Código de barra')}} </th>
                        <th scope="col">{{__('En existencia  ')}} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr style="cursor: pointer" onclick="window.location.href='{{route('product.show', $product->id)}}'">
                            <th scope="row">{{$product->id}}</th>
                            <th scope="row">
                                <img class="rounded-circle img-size-32" src="@if(isset($product->image)){{asset('img/'.$product->image)}}@else{{asset('img/item_icon.png')}}@endif">
                            </th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category->description}}</td>
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
