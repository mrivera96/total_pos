@extends('layouts.master')

@section('content')
        <div class="mt-10 jumbotron bg-{{$bg}} text-center">
            <div class="alert alert-{{$alert}} m-auto" role="alert">
                {{$message}}
            </div>
            <a class="btn btn-lg btn-{{$btn}}" href="{{$route}}"> {{$btn_text}}</a>
        </div>
@endsection
