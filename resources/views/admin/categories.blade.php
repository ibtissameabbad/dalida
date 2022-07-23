@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <div class="mt-5">
        <div class="container">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <div class="d-flex justify-content-between">

                <h1>Les Gammes</h1>
                {{--                <a href="/admin/category/add" class="btn btn-primary rounded-pill mb-2">--}}
                {{--                    Nouvelle Gamme--}}
                {{--                </a>--}}
            </div>
        </div>
        @stop

        @section('content')
            <div class="container mt-5">
                <table class="table table-hover shadow-sm">
                    <thead class="">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix de vente(MAD)</th>
                        <th scope="col">Prix de lancement(MAD)</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <a href="{{ $category->image }}" target="__blank">
                                    <img style="width: 50px;height:50px;object-fit: contain" class="img-fluid"
                                         src="{{ $category->image }}"
                                         alt="">
                                </a>
                            </td>
{{--                            <th scope="row">{{ $category->id }}</th>--}}
                            <td><a href="{{ route('admin-edit-category', ['category' => $category->id]) }}" class="name-edit">{{ $category->name }}</a></td>
{{--                            <td>{{ substr($category->description,0,50) }}</td>--}}
                            <td>MAD {{ $category->selling_price_mad }}</td>
                            <td>MAD {{ $category->starting_price_mad }}</td>
{{--                            <td>$ {{ $category->selling_price_dollar }}</td>--}}
{{--                            <td>$ {{ $category->starting_price_dollar }}</td>--}}
{{--                            <td>€ {{ $category->selling_price_euro }}</td>--}}
{{--                            <td>€ {{ $category->starting_price_euro }}</td>--}}
                            <td>{{ $category->qte }}</td>
{{--                            <td>{{$category->slogan === NULL ? 'vide' : $category->slogan}}</td>--}}
{{--                            <td>{{$category->using_advice === NULL ? 'vide' : substr($category->using_advice, 0, 15). ' ...'}}</td>--}}
{{--                            <td>{{$category->composition === NULL ? 'vide' : substr($category->composition, 0, 15). ' ...'}}</td>--}}
{{--                            <td>--}}
{{--                                <a href="{{ $category->image_hover }}" target="__blank">--}}
{{--                                    <img style="width: 50px;height:50px;object-fit: contain" class="img-fluid"--}}
{{--                                         src="{{ $category->image_hover }}"--}}
{{--                                         alt="">--}}
{{--                                </a>--}}
{{--                            </td>--}}
                            <td class="d-flex flex-row ">
{{--                                <a href="{{ route('admin-edit-category', ['category' => $category->id]) }}"--}}
{{--                                   class="btn"><i class="fa fa-edit"></i></a>--}}
                                <form method="POST"
                                      action="{{ route('admin-destroy-category', ['category' => $category->id]) }}">
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
                    {{ $categories->links() }}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
