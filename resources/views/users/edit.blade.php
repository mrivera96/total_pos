@extends('layouts.master')

@section('content')
    @include('dashboard.content_header')
    <div class="card ">

        <div class="card-header bg-light">
            <h3 class="card-title m-auto">{{$user->name}} {{$user->last_name}}</h3>
            <a href="{{route('user.delete', $user->id)}}"><i class="nav-icon fas fa-trash-alt float-right"></i></a>
        </div>
               @include('users.form')

    </div>


@endsection
