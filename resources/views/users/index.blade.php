@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">{{__('Nombre(s)')}}</th>
                    <th scope="col">{{__('Apellido(s)')}}</th>
                    <th scope="col">{{__('Nombre de usuario')}}</th>
                    <th scope="col">{{__('Rol')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr style="cursor: pointer" onclick="window.location.href='{{route('user.show', $user->id)}}'">
                        <th scope="row">{{$user->id}}</th>
                        <th scope="row">
                            <img class="rounded-circle img-size-32"
                                 src="@if(isset($user->avatar) && !empty($user->avatar)){{asset('img/'.$user->avatar)}}@else{{asset('img/profile.png')}}@endif">
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
