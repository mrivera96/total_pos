<!DOCTYPE html>
<html>
@include('layouts.master_head')
<body class="hold-transition sidebar-mini layout-navbar-fixed">

<div class="wrapper">

@include('layouts.master_navbar')

@include('layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header m-auto">
        @include('layouts.content_header')
        </div>

        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
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
    <script>
        @yield('scripts')
    </script>

</div>
</body>
</html>
