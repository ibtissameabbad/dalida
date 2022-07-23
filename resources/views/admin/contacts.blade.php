@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <div class="mt-5">
        <div class="container">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <div class="d-flex justify-content-between">
                <h1>Contacts</h1>
                <a href="/bc-admin/contact/export" class="btn btn-primary rounded-pill mb-2">Exporter</a>
            </div>
        </div>
        @stop

        @section('content')
            <div class="container mt-5">
                <table class="table table-hover shadow-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom et prénom</th>
                        <th scope="col">N° de téléphone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->telephone }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $contacts->links() }}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
