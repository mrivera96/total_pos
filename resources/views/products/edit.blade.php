@extends('layouts.master')

@section('content')
    <div class="card ">
        <div class="card-header bg-gradient-blue">
            <h3 class="card-title m-auto v-align-middle">{{$product->name}}</h3>
        </div>
        @include('products.form')
    </div>
@endsection
