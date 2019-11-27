@extends('layouts.master')
@section('content')
    @include('layouts.content_header')
    <div class="card ">
        @include('users.form')
    </div>
@endsection
