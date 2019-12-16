@extends('layouts.master')
@section('content')


    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre(s)</th>
                    <th scope="col">Apellido(s)</th>
                    <th scope="col">Número Celular</th>
                    <th scope="col">email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $cust)
                    <tr style="cursor: pointer"
                        onclick="window.location.href='{{route('customer.show', $cust->id)}}'">
                        <th scope="row">{{$cust->id}}</th>
                        <td>{{$cust->name}}</td>
                        <td>{{$cust->last_name}}</td>
                        <td>{{$cust->cellphone_number}}</td>
                        <td>{{$cust->email ?? ''}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-5">
                <a href="{{route('customer.create')}}" class="btn btn-outline-primary">Nuevo Cliente</a>
            </div>

        </div>
    </div>

    @includeWhen($create ?? '','customers.create')

    @includeWhen($show?? '','customers.show')

    @includeWhen($edit ?? '','customers.edit')
@endsection


