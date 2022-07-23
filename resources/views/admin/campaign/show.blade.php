@extends('layouts.app')

@section('content')
    <div class="row d-flex flex-row mt-4">
        <div class="col-md-8">
            <div class="card d-flex flex-row justify-content-between rounded-xl bg-white border-0 shadow-lg py-3 px-5">
                <div class="d-flex flex-column p-3">
                    <img class="img-fluid w-75" src="/storage/{{ $campaign->image }}" alt="">
                    <div class="d-flex flex-column align-items-center w-75">
                        <h5 class="font-weight-bold mb-0 text-dark mt-2">Buy a</h5>
                        <span class="">{{ $campaign->name }}</span>
                    </div>
                </div>
                <div class="p-4 mt-3 mr-5">
                    <div class="progress_ blue "> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                        <div class="progress-value d-flex flex-column">
                            @php $sum = 0 @endphp
                            @foreach ($campaign->soldes as $solde)
                                @php $sum += $solde->qte @endphp
                            @endforeach
                            <span class="font-weight-bold">{{ $sum ?? '0' }}</span>
                            <span style="border-bottom: 1px solid lightgrey;" class="small w-75 ml-3">SOLD</span>
                            <span class="text-muted small">OUT OF</span>
                            <span class="text-muted">{{ $campaign->qte }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex flex-column">
                <div class="card d-flex flex-row justify-content-between align-items-center border-0 rounded-xl shadow-lg py-2 px-3 mb-2">
                    <div class="d-flex flex-column align-items-start">
                        <h3 class="mb-0"><b>Price</b></h3>
                        <p class="mb-0">Inclusive of VAT</p>
                    </div>
                    <div>
                        <h3 class="text-success"><b>${{ $campaign->price }}</b></h3>
                    </div>
                </div>
                <a href="{{ route('addToCart', [$campaign->id,'type' =>'campaign']) }}" class="btn btn-primary rounded-xl">Add to Cart</a>
                <form method="POST" action="{{ route('addToWishlist', ['id' =>$campaign->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="shareBtn btn btn-outline-light border rounded-xl my-2 border-secondary w-100 d-flex flex-row align-items-center justify-content-center">
                        @if(Auth::user())
                            @if(\App\Models\Wishlist::where('user_id', Auth::user()->id)->where('campaign_id', $campaign->id)->exists())
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill text-danger" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                                <span class="text-gray-500 mx-3">Add to Wishlist</span>
                            @else
                                <svg id="darkHeart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart text-dark" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                                <span class="text-gray-500 mx-3">Add to Wishlist</span>
                            @endif
                        @else
                            <svg id="darkHeart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart text-dark" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                        @endif
                    </button>
                </form>
                {{-- <button class="btn btn-outline-light my-2 border-secondary rounded-xl text-dark">Add to Wishlist</button> --}}
            </div>
        </div>
        <div class="col-md-8 my-5">
            <h4 class="font-weight-bold mb-0 text-dark"><b>Buy a {{ $campaign->name }} and get a chance to win</b></h4>
            <h4 class="font-weight-bold text-dark"><b>${{ $campaign->price }} Cash</b></h4>
            <h3 class="text-dark mb-2 mt-4">Campaign details</h3>
            <p class="text-secondary">{{ $campaign->description }}</p>
        </div>
    </div>
@endsection
