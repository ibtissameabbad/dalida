@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <div class="mt-5">
        <div class="container">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <div class="d-flex justify-content-between">

                <h1>Detail de Commande</h1>
                <a href="{{ route('admin-order') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
        @stop

        @section('content')
            <div class="container mt-5">
                <div class="products mb-5">
                    <h1 class="mb-3">Les Produits</h1>
                    <table class="table table-hover shadow-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom de produit</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix de vente</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->orderProducts()->paginate(6) as $orderProduct)
                            <tr>
                                <th scope="row">
                                    {{ $orderProduct->id }}
                                </th>
                                <td>
                                    <a href="{{url('/product/'. $orderProduct->product->id)}}" target="_blank">
                                        {{ $orderProduct->product->name }}
                                    </a>
                                </td>
                                <td>{{ $orderProduct->quantity  }}</td>
                                <td>{{ currencySign($orderProduct->currency) }}{{' '}}{{ $orderProduct->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $order->orderProducts()->paginate(6)->links() }}
                    </div>
                </div>
                <div class="categories mb-5">
                    <h1 class="mb-3">Les Gammes</h1>
                    <table class="table table-hover shadow-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom de gamme</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Prix de vente</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->orderCategories()->paginate(6) as $orderCategory)
                            <tr>
                                <th scope="row">
                                    {{ $orderCategory->id }}
                                </th>
                                <td>
                                    <a href="{{url('/category/'. $orderCategory->category->id)}}" target="_blank">
                                        {{ $orderCategory->category->name }}
                                    </a>
                                </td>
                                <td>{{ $orderCategory->quantity  }}</td>
                                <td>{{ currencySign($orderCategory->currency) }}{{' '}}{{ $orderCategory->price  }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $order->orderCategories()->paginate(6)->links() }}
                    </div>
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
