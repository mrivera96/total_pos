<!DOCTYPE html>
<html>
@include('layouts.master_head')
<body class="hold-transition sidebar-mini layout-navbar-fixed">

<div id="app" class="wrapper">

@include('layouts.master_navbar')

@include('layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @includeWhen($modal ?? '','layouts.modal')
        <div class="content-header m-auto">
            @include('layouts.content_header')
        </div>

        <div class="content">
            <div class="container-fluid">
                @yield('content')
                <!-- route outlet -->
                <!-- component matched by the route will render here -->
                <router-view></router-view>
            </div>
        </div>
    </div>


    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="#">MELVIN RIVERA</a>.</strong>
        Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
    <!-- ./wrapper -->

</div>
<!-- jQuery -->
<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')
</body>
</html>
