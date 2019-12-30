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
                @foreach($suppliers as $supplr)
                    <tr style="cursor: pointer"
                        onclick="window.location.href='{{route('supplier.show', $supplr->id)}}'">
                        <th scope="row">{{$supplr->id}}</th>
                        <td scope="row">{{$supplr->name}}</td>
                        <td scope="row">{{$supplr->description}}</td>
                        <td scope="row">{{$supplr->phone_number}}</td>
                        <td scope="row">{{$supplr->address}}</td>
                        <td scope="row">{{$supplr->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-5">
                <a href="{{route('supplier.create')}}" class="btn btn-success">Nuevo proveedor</a>
            </div>
        </div>
    </div>
    @includeWhen($create ?? '','suppliers.create')

    @includeWhen($show?? '','suppliers.show')

    @includeWhen($edit ?? '','suppliers.edit')

@endsection
@section('scripts')

    @if($create ?? '')
        <script>
            $(document).ready(function () {
                $("#supplier-create-modal").modal('show');
            });

        </script>
    @elseif($edit ?? '')
        <script>
            $(document).ready(function () {
                $("#supplier-edit-modal").modal('show');
            });

        </script>
    @elseif($show ?? '')
        <script>
            $(document).ready(function () {
                $("#supplier-show-modal").modal('show');
            });
        </script>
    @endif


@endsection
