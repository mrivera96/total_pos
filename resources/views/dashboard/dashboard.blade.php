@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$users->count()}}</h3>

                <p>{{__('Usuarios')}}</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-people"></i>
            </div>
            
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$inventory}}</h3>

                <p>{{__('Inventario de productos')}}</p>
            </div>
            <div class="icon">
                <i class="ion ion-pricetag"></i>
            </div>
            
        </div>
    </div>
</div>


@endsection