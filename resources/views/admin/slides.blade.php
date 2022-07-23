@extends('adminlte::page')

@section('title', 'Slides')

@section('content_header')
    <div class="mt-5">
        <div class="container">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <div class="d-flex justify-content-between">

                <h1>Slides</h1>
                <a href="/admin/slide/add" class="btn btn-primary rounded-pill mb-2">
                    Nouveau Slide
                </a>
            </div>
        </div>
        @stop
        @section('content')
            <div class="container mt-5">
                <table class="table table-hover shadow-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th scope="col">Gamme de produit</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($slides as $slide)
                        <tr>
                            <th scope="row">{{ $slide->id }}</th>
                            <td>{{ $slide->title }}</td>
                            <td>{{ substr($slide->description,0,30) }}</td>
                            <td><a href="/admin/product/+{{$slide->product->id}}" target="_blank">{{$slide->product->name}}</a></td>
                            <td>
                                <a href="{{ $slide->image }}" target="__blank">
                                    <img style="width: 50px;height:50px;" class="img-fluid"
                                         src="{{ $slide->image }}" >
                                </a>
                            </td>
                            <td class="d-flex flex-row ">
                                <a href="{{ route('admin-edit-slide', ['slide' => $slide->id]) }}"
                                   class="btn"><i class="fa fa-edit"></i></a>
                                <form method="POST" action="{{ route('admin-destroy-slide', ['slide' => $slide->id]) }}">
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
                    {{ $slides->links() }}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
