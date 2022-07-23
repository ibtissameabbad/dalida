@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Pay $1000</a>
        @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            {{ \Session::forget('error') }}
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success">{{ \Session::get('success') }}</div>
            {{ \Session::forget('success') }}
        @endif
    </div>
@endsection
