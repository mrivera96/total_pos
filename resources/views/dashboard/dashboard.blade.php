@extends('layouts.master')

@section('content')
@includeWhen(auth()->user()->role->id==1,'dashboard.admin')


@endsection
