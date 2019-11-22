@extends('layouts.master')

@section('content')

    @if($status==1)
        <div class="mt-10 jumbotron bg-success text-center">
            <div class="alert alert-success m-auto" role="alert">
                ¡Usuario actualizado correctamente!
            </div>
            <a class="btn btn-success" href="{{route('dashboard')}}"> Aceptar</a>
        </div>

    @elseif($status==0)
        <div class="alert alert-warning mb-5" role="alert">
            Ha ocurrido un error al actualizar el usuario. Intenta de nuevo.
        </div>
        <a class="btn btn-outline-primary mt-5" href="#"> Regresar</a>
    @endif
    @endsection