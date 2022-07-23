@extends('adminlte::page')

@section('title', 'Leads')

@section('content_header')
    <div class="mt-5">
        <div class="container">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <div class="d-flex justify-content-between">
                <h1>Leads</h1>
                <a href="/bc-admin/lead/export" class="btn btn-primary rounded-pill mb-2">Exporter</a>
            </div>
        </div>
        @stop

        @section('content')
            <div class="container mt-5">
                <table class="table table-hover shadow-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">De</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($leads as $lead)
                        <tr>
                            <th scope="row">{{ $lead->id }}</th>
                            <td>{{ $lead->email}}</td>
                            <td>{{ $lead->from }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $leads->links() }}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
