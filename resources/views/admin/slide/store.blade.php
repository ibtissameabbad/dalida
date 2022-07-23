@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Ajouter nouveau slide</h1>
@stop

@section('content')
    <a href="{{ route('admin-category') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i></a>
    <div class="container m-5">
        <div class="card col-md-8 p-5 shadow-sm border-0">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <form method="POST" action="{{ route('admin-store-slide') }}" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <label class="mt-2">Titre</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                           placeholder="Titre" required>
                </fieldset>
                <fieldset>
                    <label class="mt-2">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ old('description') }}"
                           placeholder="Description" required>
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Produit</label>
                    <select class="form-control"  id="input" name="product" required>
                        <option disabled selected>Produit</option>
                        @foreach (\App\Models\Product::orderBy("updated_at", 'DESC')->select('id','name')->get() as $produit)
                            <option value="{{ $produit->id }}">
                                {{ $produit['name'] }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Apparaître dans l'accueil</label>
                    <input
                        type="checkbox"
                        class="form-control"
                        name="show"
                        value="true"
                    >
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </fieldset>
                <button type="submit" class="btn btn-primary rounded-lg w-25 mt-3">Save</button>
                @include('partials.formErrors')
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
