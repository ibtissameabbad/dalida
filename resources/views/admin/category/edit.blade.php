@extends('adminlte::page')

@section('title', 'Update Product')

@section('content_header')
    <div>
        <div class="container">
            <h1>Modifier une gamme</h1>
        </div>
    </div>
@stop

@section('content')
    <section id="app">
        <div class="container">
            <a href="{{ route('admin-category') }}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left"></i>
            </a>
            <div class="container m-5">
                <div class="card col-md-8 p-5 shadow-sm border-0">
                    @if(Session::has('status'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
                    @endif
                    <form
                        method="POST"
                        action="{{ route('admin-update-category', ['category' => $category->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <label for="" class="mt-2">Nom *</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{ old('name', $category->name ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Nom en anglais *</label>
                            <input type="text" class="form-control" name="name_en"
                                   value="{{ old('name', $category->name_en ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Description *</label>
                            <input type="text" class="form-control" name="description"
                                   value="{{ old('description', $category->description ?? null) }}">
                        </fieldset>
                        <div class="d-flex gap-3" style="gap:1rem">
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de vente (MAD)</label>
                                <input type="number" class="form-control" name="selling_price_mad"
                                    value="{{ old('selling_price_mad', $category->selling_price_mad ?? null) }}"
                                    placeholder="Prix de vente" required step="any">
                            </fieldset>
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de lancement (MAD)</label>
                                <input type="number" class="form-control" name="starting_price_mad"
                                    value="{{ old('starting_price_mad', $category->starting_price_mad ?? null) }}" placeholder="Prix de lancement" required step="any">
                            </fieldset>
                        </div>
                        <div class="d-flex gap-3" style="gap:1rem">
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de vente (DOLLAR)</label>
                                <input type="number" class="form-control" name="selling_price_dollar"
                                    value="{{ old('selling_price_dollar', $category->selling_price_dollar ?? null) }}" placeholder="Prix de vente" required step="any">
                            </fieldset>
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de lancement (DOLLAR)</label>
                                <input type="number" class="form-control" name="starting_price_dollar"
                                    value="{{ old('starting_price_dollar', $category->starting_price_dollar ?? null) }}" placeholder="Prix de lancement" required step="any">
                            </fieldset>
                        </div>
                        <div class="d-flex gap-3" style="gap:1rem">
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de vente (EURO)</label>
                                <input type="number" class="form-control" name="selling_price_euro"
                                    value="{{ old('selling_price_euro', $category->selling_price_euro ?? null) }}" placeholder="Prix de vente" required step="any">
                            </fieldset>
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de lancement (EURO)</label>
                                <input type="number" class="form-control" name="starting_price_euro"
                                    value="{{ old('starting_price_euro', $category->starting_price_euro ?? null) }}" placeholder="Prix de lancement" required step="any">
                            </fieldset>
                        </div>
                        <fieldset>
                            <label for="" class="mt-2">Slogan</label>
                            <input type="text" class="form-control" name="slogan"
                                   value="{{ old('slogan', $category->slogan ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Conseil d'utilisation</label>
                            <textarea type="text" class="form-control" name="using_advice" rows="8">
                                {{ old('using_advice', $category->using_advice ?? null) }}
                            </textarea>
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Composition</label>
                            <textarea type="text" class="form-control" name="composition" rows="8">
                                {{ old('composition', $category->composition ?? null) }}
                            </textarea>
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Livraison</label>
                            <input type="text" class="form-control" name="shipping"
                                   value="{{ old('shipping', $category->shipping ?? null) }}">
                        </fieldset>
{{--                        <fieldset>--}}
{{--                            <label for="" class="mt-2">Produit description</label>--}}
{{--                            <textarea type="text" class="form-control" name="product_description" rows="8">--}}
{{--                                {{ old('product_description', $category->product_description ?? null) }}--}}
{{--                            </textarea>--}}
{{--                        </fieldset>--}}
{{--                        <fieldset>--}}
{{--                            <label for="" class="mt-2">INGRÉDIENTS</label>--}}
{{--                            <textarea type="text" class="form-control" name="ingredients" rows="8">--}}
{{--                                {{ old('ingredients', $category->ingredients ?? null) }}--}}
{{--                            </textarea>--}}
{{--                        </fieldset>--}}
                        <fieldset>
                            <label for="" class="mt-2">Quantité</label>
                            <input type="text" class="form-control" name="qte"
                                   value="{{ old('qte', $category->qte ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-4">L'Image</label>
                            <input type="file" class="form-control mb-2" name="image">
                            <div>
                                <img style="width: 100px;height:100px;"
                                     class="img-fluid"
                                     src="{{ $category->image }}" alt="produit">
                            </div>
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-4">L'Image hover</label>
                            <input type="file" class="form-control mb-2" name="image_hover">
                            <div>
                                <img style="width: 100px;height:100px;"
                                     class="img-fluid"
                                     src="{{ $category->image_hover }}" alt="hover">
                            </div>
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-4">Gallerie</label>
                            <input type="file" class="form-control mb-3 " name="gallery[]" multiple>
                            <category-gallery :galleries="{{$category->galleries}}"></category-gallery>
                        </fieldset>
                        <button type="submit" class="btn btn-success rounded-lg w-25 mt-3">Modifier</button>
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
    <script src='/js/app.js'></script>
@stop
