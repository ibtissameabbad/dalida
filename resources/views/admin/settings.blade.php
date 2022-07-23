@extends('adminlte::page')

@section('title', 'Update Product')

@section('content_header')
    <div>
        <div class="container">
            <h1>Réglages</h1>
        </div>
    </div>
@stop

@section('content')
    <section id="app">
        <div class="container">
{{--            <a href="{{ route('settings') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i></a>--}}
            <div class="container m-5">
                <div class="card col-md-8 p-5 shadow-sm border-0">
                    @if(Session::has('status'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
                    @endif
                    <form method="POST" action="{{ route('admin-update-setting', ['setting' => $setting->id]) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <label for="" class="mt-2">Instagram</label>
                            <input type="text" class="form-control" name="instagram"
                                   value="{{ old('instagram', $setting->instagram ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Facebook</label>
                            <input type="text" class="form-control" name="facebook"
                                   value="{{ old('facebook', $setting->facebook ?? null) }}">
                        </fieldset>
                        <fieldset>
                            <label for="" class="mt-2">Youtube</label>
                            <input type="text" class="form-control" name="youtube"
                                   value="{{ old('youtube', $setting->youtube ?? null) }}">
                        </fieldset>
                        <button type="submit" class="btn btn-success rounded-lg w-25 mt-3">Sauvegrader</button>
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
