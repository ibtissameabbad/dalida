@extends('adminlte::page')

@section('title', 'Update Product')

@section('content_header')
    <div>
        <div class="container">
            <h1>Modifier une Slide</h1>
        </div>
    </div>
@stop

@section('content')
    <section>
        <div class="container">
            <a href="{{ route('admin-slide') }}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left"></i>
            </a>
            <div class="container m-5">
                <div class="card col-md-8 p-5 shadow-sm border-0">
                    @if(Session::has('status'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
                    @endif
                    <form
                        method="POST"
                        action="{{ route('admin-update-slide', ['slide' => $slide->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <label for="" class="mt-2">Titre</label>
                            <input type="text" class="form-control" name="title"
                                   value="{{ old('title', $slide->title ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Description</label>
                            <input type="text" class="form-control" name="description"
                                   value="{{ old('description', $slide->description ?? null) }}">
                        </fieldset><fieldset>
                            <label for="" class="mt-2">Produit</label>
                            <select class="form-control"  id="input" name="product" required>
                                <option disabled selected>Produit</option>
                                @foreach (\App\Models\Product::orderBy("updated_at", 'DESC')->select('id','name')->get() as $produit)
                                    <option value="{{ $produit->id }}" selected="{{$produit->id == $slide->product->id}}">
                                        {{ $produit['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Apparaitre dans l'accueil</label>
                            <input type="checkbox" class="form-control" name="show"
                                   value="true"
                                   @if($slide->show == true) checked @endif />
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-4">Image</label>
                            <input type="file" class="form-control mb-2" name="image">
                            <div>
                                <img style="width: 100px;height:100px;"
                                     class="img-fluid"
                                     src="{{ $slide->image }}" alt="image produit">
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-success rounded-lg w-25 mt-3">Sauvegarder</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
