@extends('adminlte::page')

@section('title', 'Add Campaign')

@section('content_header')
    <h1>Add New campaign</h1>
@stop

@section('content')
<a href="{{ route('campaigns') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i></a>
    <div class="container m-5">
        <div class="card col-md-8 p-5 shadow-sm border-0">
            <form method="POST" action="{{ route('storeCampaign') }}" enctype="multipart/form-data">
                @csrf
                <label for="" class="mt-2">Campaign Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Campaign Name" required>
                <label for="" class="mt-2">Campaign Description</label>
                <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Description" required>
                <label for="" class="mt-2">Campaign Price</label>
                <input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Price" required>
                <label for="" class="mt-2">Campaign Quantity</label>
                <input type="text" class="form-control" name="qte" value="{{ old('qte') }}" placeholder="Quantity" required>
                <label for="" class="mt-2">Product Name</label>
                <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" placeholder="Product Name" required>
                <label for="" class="mt-2">Left Label</label>
                <input type="text" class="form-control" name="left_label" value="{{ old('left_label') }}" placeholder="Left Label">
                <label for="" class="mt-2">Right Label</label>
                <input type="text" class="form-control" name="right_label" value="{{ old('right_label') }}" placeholder="Right Label">
                <label for="" class="mt-2">Campaign Image</label>
                <input type="file" class="form-control" name="image" required>
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
