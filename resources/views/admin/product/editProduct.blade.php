@extends('adminlte::page')

@section('title', 'Update Product')

@section('content_header')
    <div>
        <div class="container">
            <h1>Update Product</h1>
        </div>
    </div>
@stop

@section('content')
    <section id="app">
        <div class="container">
            <a href="{{ route('products') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i></a>
            <div class="container m-5">
                <div class="card col-md-8 p-5 shadow-sm border-0">
                    @if (Session::has('status'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
                    @endif
                    <form method="POST" action="{{ route('updateProduct', ['product' => $product->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <label for="" class="mt-2">Nom</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $product->name ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Nom en anglais</label>
                            <input type="text" class="form-control" name="name_en"
                                   value="{{ old('name', $product->name_en ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Description</label>
                            <input type="text" class="form-control" name="description"
                                value="{{ old('description', $product->description ?? null) }}">
                        </fieldset>
                        <div class="d-flex gap-3" style="gap:1rem">
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de vente (MAD)</label>
                                <input type="number" class="form-control" name="selling_price_mad"
                                    value="{{ old('selling_price_mad', $product->selling_price_mad ?? null) }}"
                                    placeholder="Prix de vente" required step="any">
                            </fieldset>
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de lancement (MAD)</label>
                                <input type="number" class="form-control" name="starting_price_mad"
                                    value="{{ old('starting_price_mad', $product->starting_price_mad ?? null) }}"
                                    placeholder="Prix de lancement" step="any">
                            </fieldset>
                        </div>
                        <div class="d-flex gap-3" style="gap:1rem">
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de vente (DOLLAR)</label>
                                <input type="number" class="form-control" name="selling_price_dollar"
                                    value="{{ old('selling_price_dollar', $product->selling_price_dollar ?? null) }}"
                                    placeholder="Prix de vente" required step="any">
                            </fieldset>
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de lancement (DOLLAR)</label>
                                <input type="number" class="form-control" name="starting_price_dollar"
                                    value="{{ old('starting_price_dollar', $product->starting_price_dollar ?? null) }}"
                                    placeholder="Prix de lancement" step="any">
                            </fieldset>
                        </div>
                        <div class="d-flex gap-3" style="gap:1rem">
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de vente (EURO)</label>
                                <input type="number" class="form-control" name="selling_price_euro"
                                    value="{{ old('selling_price_euro', $product->selling_price_euro ?? null) }}"
                                    placeholder="Prix de vente" required step="any">
                            </fieldset>
                            <fieldset class="w-100">
                                <label for="" class="mt-2">Prix de lancement (EURO)</label>
                                <input type="number" class="form-control" name="starting_price_euro"
                                    value="{{ old('starting_price_euro', $product->starting_price_euro ?? null) }}"
                                    placeholder="Prix de lancement" step="any">
                            </fieldset>
                        </div>
                        <fieldset>
                            <label for="" class="mt-2">Conseil d'utilisation</label>
                            <textarea type="text" class="form-control" name="using_advice" rows="8">
                                {{ old('using_advice', $product->using_advice ?? null) }}
                            </textarea>
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Composition</label>
                            <textarea type="text" class="form-control" name="composition" rows="8">
                                {{ old('composition', $product->composition ?? null) }}
                            </textarea>
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Livraison</label>
                            <input type="text" class="form-control" name="shipping"
                                value="{{ old('shipping', $category->shipping ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Quantité</label>
                            <input type="text" class="form-control" name="qte"
                                value="{{ old('qte', $product->qte ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Gamme de produit</label>
                            <select class="form-control" name="category">
                                @foreach (\App\Models\Category::orderBy('updated_at', 'DESC')->get() as $category)
                                    @if ($category->id == $product->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-4">L'Image de produit</label>
                            <input type="file" class="form-control mb-2" name="image" area-label="file example">
                            <div>
                                <img class="image-edit-store img-fluid"
                                    src="{{ $product->image }}" alt="produit">
                            </div>
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-4">Gallerie</label>
                            <input type="file" class="form-control mb-3 " name="gallery[]" multiple>
                            <product-gallery :galleries="{{ $product->galleries }}"></product-gallery>
                        </fieldset>
                        <button type="submit" class="btn btn-success rounded-lg w-25 mt-3">Save Changes</button>
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
    <script>
        console.log('Hi!');
    </script>
    <script src='/js/app.js'></script>
@stop
