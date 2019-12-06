@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead class="table-head-fixed">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Número de teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">E-mail</th>
                </tr>
                </thead>
                <tbody>
                @foreach($suppliers as $supplier)
                    <tr style="cursor: pointer"
                        onclick="window.location.href='{{route('supplier.show', $supplier->id)}}'">
                        <th scope="row">{{$supplier->id}}</th>
                        <td scope="row">{{$supplier->name}}</td>
                        <td scope="row">{{$supplier->description}}</td>
                        <td scope="row">{{$supplier->phone_number}}</td>
                        <td scope="row">{{$supplier->address}}</td>
                        <td scope="row">{{$supplier->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-5">
                <a href="{{route('supplier.create')}}" class="btn btn-outline-primary">Nuevo proveedor</a>
            </div>
        </div>
    </div>
@endsection
