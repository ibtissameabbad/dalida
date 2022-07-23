@extends('layouts.app')

@section('content')
<main class="welcome py-4">
    <h3 class="font-weight-bold">Cosmetic Products</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-white d-flex flex-row flex-wrap border-0 rounded-xl shadow-lg py-5">
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="card d-flex flex-column p-3  border-0 rounded-xl shadow-lg">
                            <div class="d-flex flex-column align-items-center">
                                <img class="img-fluid" src="/storage/{{ $product->image }}" alt="">
                                <h5 class="color-purple font-weight-bold">{{ $product->name }}</h5>
                                <p class="text-center">{{ substr($product->description,0,60) }}</p>
                                </div>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <span class="text-primary font-weight-bold"><b>{{ $product->price }}</b></span>
                                <a href="{{ route('addToCart', [$product->id, 'type' =>'product']) }}" class="btn btn-success">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection

