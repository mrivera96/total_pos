@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre(s)</th>
                    <th scope="col">Apellido(s)</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">No. de Identidad</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr style="cursor: pointer" onclick="window.location.href='{{route('customer.show', $customer->id)}}'">
                        <th scope="row">{{$customer->id}}</th>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->last_name}}</td>
                        <td>{{$customer->birthday}}</td>
                        <td>{{$customer->dni}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-5">
                <btn-new-customer-component></btn-new-customer-component>
                <new-customer-component></new-customer-component>
            </div>

        </div>
    </div>
@endsection
