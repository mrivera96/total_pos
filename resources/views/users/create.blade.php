@extends('layouts.master')
@section('content')
    @include('dashboard.content_header')
    <div class="card ">
        @include('users.form')
    </div>
@endsection
