@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add New Product</h1>
@stop

@section('content')
    <a href="{{ route('admin-category') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i></a>
    <div class="container m-5">
        <div class="card col-md-8 p-5 shadow-sm border-0">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <form method="POST" action="{{ route('admin-store-category') }}" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <label class="mt-2">Nom</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                           placeholder="Nom de gamme" required>
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Apparaître dans l'accueil</label>
                    <input
                        type="checkbox"
                        class="form-control"
                        name="show"
                        value="true"
                        required
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
