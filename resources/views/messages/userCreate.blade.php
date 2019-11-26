@extends('layouts.master')

@section('content')


    @if($status==0)
        <div class="mt-10 jumbotron bg-warning text-center">

            <div class="alert alert-warning m-auto" role="alert">
                <i class="fas fa-exclamation-triangle"> Lo sentimos, ha ocurrido un error al crear el usuario.</i>
            </div>
            <a class="btn btn-warning" href="{{route('dashboard')}}"> Aceptar</a>
        </div>
    @elseif($status==1)
        <div class="mt-10 jumbotron bg-success text-center">
            <div class="alert alert-success m-auto" role="alert">
                El usuario ha sido creado correctamente.
            </div>
            <a class="btn btn-success" href="{{route('user.index')}}"> Aceptar</a>
        </div>
    @endif
@endsection
