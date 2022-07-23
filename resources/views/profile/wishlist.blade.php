@extends('profile.profile')


@section('details')
    <div class="col-md-8 mt-5">
        <h1 class="font-weight-bold">Wishlist</h1>
        @if(Auth::user()->wishlist)
            @foreach($wishlists as $wishlist)
                <div class="wish rounded-xl p-3 border-0 d-flex flex-row justify-content-between">
                    <div class="d-flex flex-row" data-th="campaign">
                        <div class="card w-120 pt-3 bg-white rounded-xl border-0 shadow-sm">
                            <img class="img-fluid" src="/storage/{{ $wishlist->campaign->image }}" alt="">
                        </div>
                        <div class="d-flex flex-column pt-3">
                            <span>{{ $wishlist->campaign->price }} worth of Gold</span>
                            <span>{{ $wishlist->campaign->name }}</span>
                            <span class="text-primary"><b>{{ $wishlist->campaign->price }}</b></span>
                            <div class="progress  mb-2">
                                @php $sum = 0 @endphp
                                @foreach ($wishlist->campaign->soldes as $solde)
                                    @php $sum += $solde->qte @endphp
                                @endforeach
                                @php $qte = $wishlist->campaign->qte ;
                                    $solde = $sum;
                                    $qteG = ($solde * 100)/$qte;
                                @endphp
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{ $qteG }}%" aria-valuenow="{{ $qteG }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            @php $sum = 0 @endphp
                            @foreach ($wishlist->campaign->soldes as $solde)
                                @php $sum += $solde->qte @endphp
                            @endforeach
                            <span class="text-muted sm-font">{{ $sum ?? '0' }} Sold out of {{ $wishlist->campaign->qte }}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center pt-4">
                        <a href="{{ route('addToCart', [$wishlist->campaign->id, 'type' =>'campaign']) }}" class="btn btn-primary rounded-xl w-100">Add to Cart</a>
                        <form class="frm" method="POST" action="{{ route('destroy', [$wishlist->id]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Remove from wishlist" class="btn btn-outline-secondary rounded-xl w-100 mt-3"/>
                            {{-- <a href="" class="btn btn-outline-secondary rounded-xl w-100 mt-3">Remove from wishlist</a> --}}
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="card rounded-xl shadow-sm p-3 border-0 text-center">
                <h4 class="text-success"><b>No Campaigns yet !</b></h4>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
@endsection

