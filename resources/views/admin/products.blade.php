@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <div class="mt-5">
        <div class="container">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <div class="d-flex justify-content-between">
                <h1>Produits</h1>
                <a href="/bc-admin/products/add" class="btn btn-primary rounded-pill mb-2">Nouveau Produit</a>
            </div>
        </div>
        @stop

        @section('content')
            <div class="container mt-5">
                <table class="table table-hover shadow-sm">
                    <thead class="">
                    <tr>
                        <th scope="col">Image</th>
                        {{--                        <th scope="col">#</th>--}}
                        <th scope="col">Nom</th>
                        {{--                        <th scope="col">Description</th>--}}
                        <th scope="col">Prix de vente</th>
                        <th scope="col">Prix de lancement</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Gamme de produit</th>
                        {{--                        <th scope="col">Slogan</th>--}}
                        {{--                        <th scope="col">Conseil d'utilisation</th>--}}
                        {{--                        <th scope="col">Composition</th>--}}
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            {{--                            <th scope="row">{{ $product->id }}</th>--}}
                            <td>
                                <a href="{{ $product->image }}" target="__blank">
                                    <img style="width: 50px;height:50px;object-fit: contain;" class="img-fluid"
                                         src="{{ $product->image }}"
                                         alt="">
                                </a>
                            </td>
                            <td><a href="{{ route('editProduct', ['product' => $product->id]) }}"
                                   class="name-edit">{{ $product->name }}</a></td>
                            {{--                            <td>{{ substr($product->description,0,50) }}</td>--}}
                            <td>{{ $product->selling_price_mad }} MAD</td>
                            @if(!empty($product->starting_price_mad))
                                <td>{{ $product->starting_price_mad }} MAD</td>
                            @else
                                <td><span class="text-decoration-line-through line-">0 MAD</span></td>
                            @endif
                            <td>{{ $product->qte }}</td>
                            <td><a href="/bc-admin/category/{{$product->category->id}}"
                                   class="name-edit">{{ $product->category->name }}</a>
                            {{--                            <td>{{$product->slogan === NULL ? 'vide' : $product->slogan}}</td>--}}
                            {{--                            <td>{{$product->using_advice === NULL ? 'vide' : substr($product->using_advice, 0, 15). ' ...'}}</td>--}}
                            {{--                            <td>{{$product->composition === NULL ? 'vide' : substr($product->composition, 0, 15). ' ...'}}</td>--}}
                            <td class="d-flex flex-row ">
                                {{--                                <a href="{{ route('editProduct', ['product' => $product->id]) }}"--}}
                                {{--                                   class="btn"><i class="fa fa-edit"></i></a>--}}
                                <form method="POST"
                                      action="{{ route('deleteProduct', ['product' => $product->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn "><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
