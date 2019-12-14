@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead >
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Productos</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <div class="modal fade" id="edit-{{$category->id}}" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">{{__('Editar Categoría')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('category.update', $category->id)}}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">Descripción de
                                                categoría:</label>
                                            <input type="text" name="description" required maxlength="100"
                                                   class="form-control @error('description') is-invalid @enderror"
                                                   id="description"
                                                   @if($errors->any()) value="{{ old('description')}}"
                                                   @endif  value="{{$category->description}}">
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancelar
                                            </button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>

                                        <div class="form-group text-left">
                                            <button type="button" data-toggle="modal" data-dismiss="modal"
                                                    data-target="#deleteAlert-{{$category->id}}" class="btn btn-danger">Eliminar
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteAlert-{{$category->id}}" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content bg-danger">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">{{__('Eliminar Categoría')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>{{__('¿Estás seguro de eliminar la categoría '.$category->description.'?')}}</p>
                                    <form id="delete-category" method="POST"
                                          action="{{route('category.destroy', $category->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <div class="form-group text-right">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancelar
                                            </button>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <tr id="row" data-toggle="modal" data-target="#edit-{{$category->id}}" style="cursor: pointer">
                        <th scope="row" >{{$category->id}}</th>
                        <td scope="row" >{{$category->description}}</td>
                        <td>{{$category->products()->count()}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>


            <div class="mt-5">
                <a data-toggle="modal" data-target="#create" class="btn btn-outline-primary">Nueva categoría</a>
            </div>
            <div class="modal fade" id="create" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel">{{__('Nueva Categoría')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('category.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Descripción de categoría:</label>
                                    <input type="text" name="description" required maxlength="100"
                                           class="form-control @error('description') is-invalid @enderror"
                                           id="description"
                                           @if($errors->any()) value="{{ old('description')}}"
                                           @endif  placeholder="{{__('Ingresa la descripción de la nueva categoría (máximo 100 caracteres).')}}">
                                </div>
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    $('#delete-category').on('submit',function(e){
    if(!confirm('¿Está seguro que desea elimar esta categoría?'){
    e.preventDefault();
    }
    });
@stop


