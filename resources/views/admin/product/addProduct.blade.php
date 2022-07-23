@extends('adminlte::page')

@section('title', 'Ajouter produit')

@section('content_header')
    <div>
        <div class="container">
            <h1>Ajouter un produit</h1>
            <a href="{{ route('products') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
@stop

@section('content')
    <div class="container m-5">
        <div class="card col-md-8 p-5 shadow-sm border-0">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <form method="POST" action="{{ route('storeProduct') }}" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <label for="" class="mt-2">Nom</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                           placeholder="Nom de produit" required>
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Nom en anglais</label>
                    <input type="text" class="form-control" name="name_en" value="{{ old('name_en') }}"
                           placeholder="Nom en anglais" required>
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Description</label>
                    <textarea type="text" class="form-control"
                              name="description"
                              placeholder="Description" required></textarea>
                </fieldset>
                <div class="d-flex gap-3" style="gap:1rem">
                    <fieldset class="w-100">
                        <label for="" class="mt-2">Prix de vente (MAD)</label>
                        <input type="number" class="form-control" name="selling_price_mad"
                            value="{{ old('selling_price_mad') }}" placeholder="Prix de vente" required>
                    </fieldset>
                    <fieldset class="w-100">
                        <label for="" class="mt-2">Prix de lancement (MAD)</label>
                        <input type="number" class="form-control" name="starting_price_mad"
                            value="{{ old('starting_price_mad') }}" placeholder="Prix de lancement" >
                    </fieldset>
                </div>
                <div class="d-flex gap-3" style="gap:1rem">
                    <fieldset class="w-100">
                        <label for="" class="mt-2">Prix de vente (DOLLAR)</label>
                        <input type="number" class="form-control" name="selling_price_dollar"
                            value="{{ old('selling_price_dollar') }}" placeholder="Prix de vente" required>
                    </fieldset>
                    <fieldset class="w-100">
                        <label for="" class="mt-2">Prix de lancement (DOLLAR)</label>
                        <input type="number" class="form-control" name="starting_price_dollar"
                            value="{{ old('starting_price_dollar') }}" placeholder="Prix de lancement" >
                    </fieldset>
                </div>
                <div class="d-flex gap-3" style="gap:1rem">
                    <fieldset class="w-100">
                        <label for="" class="mt-2">Prix de vente (EURO)</label>
                        <input type="number" class="form-control" name="selling_price_euro"
                            value="{{ old('selling_price_euro') }}" placeholder="Prix de vente" required>
                    </fieldset>
                    <fieldset class="w-100">
                        <label for="" class="mt-2">Prix de lancement (EURO)</label>
                        <input type="number" class="form-control" name="starting_price_euro"
                            value="{{ old('starting_price_euro') }}" placeholder="Prix de lancement" >
                    </fieldset>
                </div>
                <fieldset>
                    <label for="" class="mt-2">Quantité</label>
                    <input type="number" class="form-control" name="qte" value="{{ old('qte') }}" placeholder="Quantity"
                           required>
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Gamme de produit</label>
                    <select class="form-control"  id="input" name="category" value="{{old('category')}}" required>
                        <option disabled selected>Gamme de produit</option>
                        @foreach (\App\Models\Category::orderBy("updated_at", 'DESC')->select('id','name')->get() as $category)
                            <option value="{{ $category->id }}">
                                {{ $category['name'] }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Slogan</label>
                    <input type="text" class="form-control" name="slogan" value="{{ old('slogan') }}" placeholder="Slogan"
                           >
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Conseil d'utilisation</label>
                    <textarea type="text" class="form-control"
                              name="using_advice"
                              placeholder="Conseil d'utilisation"></textarea>
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Composition</label>
                    <input type="text" class="form-control" name="composition" value="{{ old('composition') }}"
                           placeholder="Composition"
                           >
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </fieldset>
                <fieldset>
                    <label for="" class="mt-2">Gallerie</label>
                    <input type="file" class="form-control" name="gallery[]" multiple>
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
