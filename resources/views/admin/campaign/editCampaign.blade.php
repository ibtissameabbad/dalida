@extends('adminlte::page')

@section('title', 'Update Campaign')

@section('content_header')
    <h1>Update Campaign</h1>
@stop

@section('content')
    <a href="{{ route('campaigns') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i></a>
    <div class="container m-5">
        <div class="card col-md-8 p-5 shadow-sm border-0">
            <form method="POST" action="{{ route('updateCampaign', ['campaign' => $campaign->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="" class="mt-2">Campaign Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $campaign->name ?? null) }}">
                <label for="" class="mt-2">Campaign Description</label>
                <input type="text" class="form-control" name="description" value="{{ old('description', $campaign->description ?? null) }}">
                <label for="" class="mt-2">Campaign Price</label>
                <input type="text" class="form-control" name="price" value="{{ old('price', $campaign->price ?? null) }}">
                <label for="" class="mt-2">Campaign Quantity</label>
                <input type="text" class="form-control" name="qte" value="{{ old('qte', $campaign->qte ?? null) }}">
                <label for="" class="mt-2">Product Name</label>
                <input type="text" class="form-control" name="product_name" value="{{ old('product_name', $campaign->product_name ?? null) }}">
                <label for="" class="mt-2">Left Label</label>
                <input type="text" class="form-control" name="left_label" value="{{ old('left_label', $campaign->left_label ?? null) }}">
                <label for="" class="mt-2">Right Label</label>
                <input type="text" class="form-control" name="right_label" value="{{ old('right_label', $campaign->right_label ?? null) }}">
                <label for="" class="mt-4">Campaign Image</label>
                <input type="file" class="form-control" name="image" value="{{ old('image', $campaign->image) }}">
                <button type="submit" class="btn btn-success rounded-lg w-25 mt-3">Save Changes</button>
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
