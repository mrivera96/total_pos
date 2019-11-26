@extends('layouts.master')

@section('content')
    @include('dashboard.content_header')
    <div class="card ">
        <div class="card-header bg-light ">
            <h3 class="card-title m-auto v-align-middle">{{$user->name}} {{$user->last_name}}</h3>
            <label  class="btn btn-danger fas fa-trash-alt float-right"><input data-toggle="modal" data-target="#deleteAlert" class="d-none" type="submit"></label>
        </div>
        @include('users.form')

        <div class="modal danger fade" id="deleteAlert" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">{{__('Eliminar Usuario')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__('¿Estás seguro de eliminar el usuario '.$user->name.'?')}}</p>
                        <form id="delete-user" method="POST" action="{{route('user.destroy', $user->id)}}">
                            @method('DELETE')
                            @csrf
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar
                                </button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


