@extends('layouts.master')

@section('content')
    @include('dashboard.content_header')


            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif

                    You are logged in!
                        {{auth()->user()->role->id}}
                </div>
            </div>
@endsection
