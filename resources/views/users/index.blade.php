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
                @foreach($users as $usr)
                    <tr style="cursor: pointer" onclick="window.location.href='{{route('user.show', $usr->id)}}'">
                        <th scope="row">{{$usr->id}}</th>
                        <th scope="row">
                            <img class="rounded-circle" style="width: 30px;height: 30px"
                                 src="@if(isset($usr->avatar) && !empty($usr->avatar)){{asset('img/'.$usr->avatar)}}@else{{asset('img/profile.png')}}@endif">
                        </th>
                        <td>{{$usr->name}}</td>
                        <td>{{$usr->last_name}}</td>
                        <td>{{$usr->username}}</td>
                        <td>{{$usr->role->description}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-5">
                <a href="{{route('user.create')}}" class="btn btn-outline-primary">Nuevo usuario</a>
            </div>
        </div>
    </div>
    @includeWhen($create ?? '','users.create')

    @includeWhen($show?? '','users.show')

    @includeWhen($edit ?? '','users.edit')
@endsection

@section('scripts')

    @if($create ?? '')
        <script>
            $(document).ready(function () {
                $("#user-create-modal").modal('show');
            });

            $('#avatar').change(function () {
                var imgPath = $(this)[0].value;
                var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                    readURL(this);
                else
                    alert("Por favor, seleccione un archivo de imagen (jpg, jpeg, png).");
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result);
                    }
                }
            }
        </script>
    @elseif($edit ?? '')
        <script>
            $(document).ready(function () {
                $("#user-edit-modal").modal('show');
            });

            $('#avatar').change(function () {
                var imgPath = $(this)[0].value;
                var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                    readURL(this);
                else
                    alert("Por favor, seleccione un archivo de imagen (jpg, jpeg, png).");
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result);
                    }
                }
            }
        </script>
    @elseif($show ?? '')
        <script>
            $(document).ready(function () {
                $("#user-show-modal").modal('show');
            });
        </script>
    @endif


@endsection
