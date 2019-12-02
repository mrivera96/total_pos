@extends('layouts.master')

@section('content')
    <div class="card ">
        <div class="card-header bg-blue ">
            <div class="row text-center" style="position: relative">
                <div class="col-md-12">
                    <img id="preview" class="rounded-circle m-auto"
                         @if(isset($user->avatar) && !empty($user->avatar))
                         src="{{asset('img/'.$user->avatar)}}"
                         @else src="{{asset('img/profile.png')}}"@endif>
                </div>

                <div class="col-md-12">
                    <h3>{{$user->name}} {{$user->last_name}}</h3>
                </div>
                <div class="col-md-12">
                    <label class="btn btn-danger fas fa-trash-alt">
                        <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                    </label>
                </div>

            </div>

        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <label for="username"
                           class="col-md-12 col-form-label text-left">{{ __('Nombre de usuario') }}</label>
                    <input id="username" type="text" class="form-control"
                           name="username" value="{{$user->username}}" readonly>
                </div>

                <div class="col-md-4">
                    <label for="dni" class="col-md-12 col-form-label ">{{ __('No. Identidad') }}</label>
                    <input id="dni" type="text" maxlength="13" class="form-control"
                    value="{{$user->dni}}"
                           readonly>
                </div>

                <div class="col-md-4">
                    <label for="birthday" class="col-md-12 col-form-label ">{{ __('Fecha de nacimiento') }}</label>
                    <input id="birthday" type="date" class="form-control"
                        value="{{$user->birthday}}" readonly>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="mobile"
                           class="col-md-12 col-form-label ">{{ __('Número celular') }}</label>
                    <input id="mobile" type="text" 
                           class="form-control"
                           value="{{ $user->mobile}}" name="mobile" readonly>
                </div>

                <div class="col-md-4">
                    <label for="address" class="col-md-12 col-form-label text-left">{{ __('Dirección') }}</label>
                    <input id="address" type="text" maxlength="100"
                           class="form-control"
                           value="{{$user->address}}"
                           name="address" readonly>
                </div>

                <div class="col-md-4">
                    <label for="email"
                           class="col-md-12 col-form-label text-left">{{ __('Dirección de correo electrónico') }}</label>
                    <input id="email" type="email" maxlength="100"
                           class="form-control @error('email') is-invalid @enderror"

                           value="@if(isset($user->email)) {{$user->email}} @endif"
                           name="email" readonly>
                </div>
            </div>


            <div class="row">

                <div class="col-md-4">
                    <label for="role_id" class="col-md-12 col-form-label text-left">{{ __('Rol') }}</label>
                    <input class="col-md-12" type="text"
                           value="@if(isset($user->role->description)) {{$user->role->description}}@endif"
                           readonly>
                </div>

                <div class="col-md-4">
                    <label for="branch_id"
                           class="col-md-12 col-form-label">{{ __('Sucursal') }}</label>
                    <input class="col-md-12" type="text"
                           value="@if(isset($user->branch->description)) {{$user->branch->description}} @endif"
                           readonly>
                </div>
            </div>


            <div class=" row mb-0">
                <div class="col-md-12 text-right">
                    <button class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;bottom:40px !important;right:40px !important;color:#FFF;
                        border-radius:50px !important;text-align:center;box-shadow: 2px 2px 3px #999 !important;"
                        onclick="window.location.href='{{route('user.edit', $user->id)}}'">
                        <i class="fas fa-lg fa-edit"></i>
                    </button>
                </div>
            </div>


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

    </div>
@endsection


