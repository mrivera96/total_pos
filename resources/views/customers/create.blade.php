@section('modal-content')
    @include('customers.form')
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#customer-create-modal").modal('show');
        });
    </script>
@endsection


