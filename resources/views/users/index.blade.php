@extends('layouts.master')
@section('content')
    <user-index-component></user-index-component>
@endsection

@section('scripts')

    @if($create ?? '')
        <script>
            $(document).ready(function () {
                $("#user-create-modal").modal('show');
            });

            
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
