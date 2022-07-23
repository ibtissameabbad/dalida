@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <div class="mt-5">
        <div class="container">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <div class="d-flex justify-content-between">

                <h1>Les Commandes</h1>
                {{--                <a href="/admin/category/add" class="btn btn-primary rounded-pill mb-2">--}}
                {{--                    Nouvelle Gamme--}}
                {{--                </a>--}}
            </div>
        </div>
        @stop

        @section('content')
            <div class="container mt-5">
                <table class="table table-hover shadow-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Numéro de téléphone</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Addresse</th>
                        <th scope="col">Code postal</th>
                        <th scope="col">total</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->lastname }}</td>
                            <td>{{ $order->firstname  }}</td>
                            <td>{{ $order->email == null ? 'vide' : $order->email}}</td>
                            <td>{{ $order->telephone == null ? 'vide' : $order->telephone }}</td>
                            <td>{{ $order->city == null ? 'vide' : $order->city }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->code_postal == null ? 'vide' : $order->code_postal }}</td>
                            <td>{{currencySign($order->currency)}}{{' '}}{{ $order->total }}</td>
                            <td class="d-flex flex-row ">
                                <a href="{{ route('admin-preview', ['order' => $order->id]) }}" title="voir les produits et les gammes"
                                   class="btn"><i class="fa fa-eye"></i></a>
{{--                                <form method="POST"--}}
{{--                                      action="{{ route('admin-destroy-order', ['order' => $order->id]) }}">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn "><i class="fa fa-trash"></i></button>--}}
{{--                                </form>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $orders->links() }}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
