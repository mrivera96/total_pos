@extends('layouts.master')
@section('content')
    @include('dashboard.content_header')
<div class="card">
    <div class="card-body">
        <table class="table table-hover table-striped border-0 ">
            <thead class="bg-gradient-blue">
            <tr>
                <th scope="col">Id</th>
                <th scope="col"></th>
                <th scope="col">Nombre(s)</th>
                <th scope="col">Apellido(s)</th>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Rol</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                    <tr style="cursor: pointer" onclick="window.location.href='{{route('user.edit', $user->id)}}'">
                        <th scope="row">{{$user->id}}</th>
                        <th scope="row">
                            <img class="rounded-circle img-size-32" src="{{asset('img/'.$user->avatar)}}">
                        </th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->role->description}}</td>

                    </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-5">
            <a href="{{route('user.create')}}" class="btn btn-outline-primary">Nuevo usuario</a>
        </div>
    </div>
</div>


@endsection
