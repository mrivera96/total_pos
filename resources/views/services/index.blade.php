@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead >
                <tr>
                    <th scope="col"># </th>
                    <th></th>
                    <th scope="col">{{__('Nombre')}} </th>
                    <th scope="col">{{__('Descripción')}} </th>
                    <th scope="col">{{__('Precio')}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr style="cursor: pointer" onclick="window.location.href='{{route('service.show', $service->id)}}'">
                        <th scope="row">{{$service->id}}</th>
                        <th scope="row">
                            <img class="rounded-circle img-size-32" src="@if(isset($service->image)){{asset('img/'.$service->image)}}@else{{asset('img/item_icon.png')}}@endif">
                        </th>
                        <td>{{$service->name}}</td>
                        <td>{{$service->description}}</td>
                        <td>Lps. {{$service->sale_price}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-5">
                <a href="{{route('service.create')}}" class="btn btn-success">{{__('Nuevo Servicio')}}</a>
            </div>
        </div>
    </div>

    @includeWhen($create ?? '','services.create')

    @includeWhen($show?? '','services.show')

    @includeWhen($edit ?? '','services.edit')

@endsection


@section('scripts')

    @if($create ?? '')
        <script>
            $(document).ready(function () {
                $("#service-create-modal").modal('show');
            });


        </script>
    @elseif($edit ?? '')
        <script>
            $(document).ready(function () {
                $("#service-edit-modal").modal('show');
            });

        </script>
    @elseif($show ?? '')
        <script>
            $(document).ready(function () {
                $("#service-show-modal").modal('show');
            });
        </script>
    @endif

@endsection

