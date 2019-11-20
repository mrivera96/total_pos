<!DOCTYPE html>
<html>
@include('layouts.master_head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('layouts.master_navbar')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layouts.sidebar')
        <div class="container">
            @yield('content')
        </div>

    </div>


    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="#">SMARTEC DANLÍ</a>.</strong>
        Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('js/app.js')}}"></script>
</div>
</body>
</html>
