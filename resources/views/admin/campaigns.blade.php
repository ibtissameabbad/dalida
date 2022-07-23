@extends('adminlte::page')

@section('title', 'Campaigns')

@section('content_header')
    <h1>Campaigns</h1>
@stop

@section('content')
    <div class="container mt-5">
        <a href="{{ route('addCampaign') }}" class="btn btn-primary rounded-pill mb-2">
            New Campaign
        </a>
        <table class="table table-hover shadow-sm">
            <thead class="bg-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Product Name</th>
                <th scope="col">Left Label</th>
                <th scope="col">Right Label</th>
                <th scope="col">Image</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($campaigns as $campaign)
                    <tr>
                        <th scope="row">{{ $campaign->id }}</th>
                        <td>{{ $campaign->name }}</td>
                        <td>{{ substr($campaign->description,0,50) }}</td>
                        <td>{{ $campaign->price }}</td>
                        <td>{{ $campaign->qte }}</td>
                        <td>{{ $campaign->product_name }}</td>
                        <td>{{ $campaign->left_label }}</td>
                        <td>{{ $campaign->right_label }}</td>
                        <td>
                            <img style="width: 50px;height:50px;" class="img-fluid" src="/storage/{{ $campaign->image }}" alt="">
                        </td>
                        <td class="d-flex flex-row justify-content-between">
                            <a href="{{ route('editCampaign', ['campaign' => $campaign->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{ route('deleteCampaign', ['campaign' => $campaign->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-center">
            {{ $campaigns->links() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
