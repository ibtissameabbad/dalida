@extends('layouts.app')

@section('style')
    <style>
        /* Popup container - can be anything you want */
        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        /* The actual popup */
        .popuptext {
            visibility: hidden;
            width: 140px;
            background-color: #fff;
            color: #555;
            text-align: center;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 40%;
            margin-left: -145px;
        }

        .modal-share{
            visibility: hidden;
            width: 140px;
            background-color: #fff;
            color: #555;
            text-align: center;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 60%;
            margin-right: 62px;
        }

        /* Toggle this class - hide and show the popup */
         .show {
            visibility: visible;
            display: block;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
        }
    </style>
@endsection

@section('content')
<main class="welcome py-4">
    @php $type = [] @endphp
    <!--SliderWin -->
    <section>
        @include('slider')
    </section>
    <!--Closing Soon -->
    <section class="mb-4">
        <div class="container-fluid">
            <h3 class="font-weight-bold">Closing soon</h3>
            <div class="row">
                <div class="col-md-12 pl-0 pr-lg-5 d-flex flex-row gap">
                    @foreach ($products as $product)
                        <div class="col-md-3 card border-0 m-2 p-2 shadow-lg d-flex flex-column bg-white rounded-xl ">
                            <span class="text-center">532 Sold out of 575</span>
                            <div class="progress mb-2" style="height:6px;">
                                <div class="progress-bar bg-danger rounded-lg" role="progressbar" style="width:60%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <img class="img-fluid" src="/storage/{{ $product->image }}" alt="">
                            <span class="text-center">Get a chance to <b class="text-danger font-italic">WIN</b></span>
                            <h6 class="text-center font-weight-bold">{{ $product->name }}</h6>
                            <a href="{{ route('addToCart', [$product->id, 'type' =>'product']) }}" class="btn btn-outline-primary btn-sm rounded-xl">Add to Cart</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Campaigns -->
    <section class="mb-4">
        <div class="container-fluid">
            <h3 class="font-weight-bold">Explore campaigns</h3>
            <div class="d-flex flex-column">
                @foreach($campaigns as $campaign)
                    <div class="camp row gap">
                        <div class="d-flex flex-fill">
                            @if ($campaign->right_label )
                            <div class="col-md-4 bg-success mr-auto pt-2 pb-4 rounded-top-xl text-center">
                                <span class="text-white text-center font-italic font-weight-bold">{{ $campaign->left_label }}</span>
                            </div>
                            @endif
                            @if ($campaign->right_label )
                                <div class="col-md-4 bg-secondary pt-2 pb-4 rounded-top-xl text-center">
                                    <span class="text-white text-center font-italic font-weight-bold">{{ $campaign->right_label }}</span>
                                </div>
                            @endif
                        </div>
                        @if (!$campaign->right_label && !$campaign->left_label )
                        <div class="card d-flex flex-row justify-content-between border-0 shadow-lg rounded-xl p-4 mt-4">
                            <div class="picture col-md-4 my-5">
                                @php $sum2 = 0 @endphp
                                @foreach ($campaign->soldes as $solde)
                                    @php $sum2 += $solde->qte @endphp
                                @endforeach
                                <img class="img-fluid cursor-pointer" src="/storage/{{ $campaign->image }}" alt="" data-item="{{ $campaign }}" data-solde="{{ $sum2 }}" data-toggle="modal" data-target="#exampleModalCenter" id="image_show_modal">
                            </div>

                            <div class="infos col-md-5 d-flex flex-row">
                                <div class="d-flex flex-column px-1 py-3">
                                    <h1><strong class="text-danger font-italic">Win</strong></h1>
                                    <h2>{{ $campaign->name }}</h2>
                                    <p>Buy a {{ $campaign->product_name }} and make it yours!</p>
                                    <span class="text-primary font-weight-bold m-top mb-2"><b>$ {{ $campaign->price }}</b></span>
                                    <div class="flex flex-row">
                                        <button class="btn btn-outline-light rounded-xl text-dark border-secondary" data-item="{{ $campaign }}" data-solde="{{ $sum2 }}" data-toggle="modal" data-target="#exampleModalCenter" id="image_show_modal">See details</button>
                                        <a href="{{ route('addToCart', [$campaign->id,'type' =>'campaign']) }}" class="btn btn-primary rounded-xl">Add to Cart</a>
                                    </div>
                                    <span class="mt-3 sm-font text-muted">Max draw date: December 25, 2021 or</span>
                                    <span class="sm-font text-muted">when the campaign is sold out. Which ever is earlier.</span>
                                </div>
                            </div>

                            <div class="progressBar col-md-2 d-flex flex-column justify-content-center align-items-center">
                                <div class="progress_ blue ">
                                    <span class="progress-left">
                                         <span class="progress-bar"></span>
                                     </span>
                                    <span class="progress-right">
                                        <span class="progress-bar"></span>
                                    </span>
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

                            <!-- Buttons-->
                            <div class="btns col-md-1  d-flex flex-column align-items-center justify-content-center">
                                <form method="POST" action="{{ route('addToWishlist', ['id' =>$campaign->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="shareBtn btn btn-outline-light border rounded-xl mb-2 border-secondary">
                                        @if(\App\Models\Wishlist::where('user_id', Auth::user()->id)->where('campaign_id', $campaign->id)->exists())
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill text-danger" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                            </svg>
                                        @else
                                            <svg id="darkHeart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart text-dark" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </form>
                                <a class="shareBtn btn btn-outline-light border rounded-xl mb-2 border-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-share-fill text-dark" viewBox="0 0 16 16">
                                        <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                    </svg>
                                </a>
                                <div class="popup popuptext bg-white d-flex flex-column rounded-xl shadow-sm border-1 p-0" id="myPopup">

                                    <a id="fb" href="https://facebook.com/sharer/sharer.php?u=https://lilya.medsoft.agency/campaign/{{ $campaign->id }}" class="btn border-bottom rounded-0 d-flex flex-row justify-content-start">
                                        <i class="fab fa-facebook-f mt-1"></i>
                                        <span class="ml-2">Facebook</span>
                                    </a>
                                    <a href="https://twitter.com/share?url=https://lilya.medsoft.agency/campaign/{{ $campaign->id }}" class="btn border-bottom rounded-0 d-flex flex-row justify-content-start">
                                        <i class="fab fa-twitter mt-1"></i>
                                        <span class="ml-2">Twitter</span>
                                    </a>
                                    <a href="https://linkedin.com/shareArticle?mini=true&url=https://lilya.medsoft.agency/campaign/{{ $campaign->id }}" class="btn rounded-0 d-flex flex-row justify-content-start">
                                        <i class="fab fa-linkedin-in mt-1"></i>
                                        <span class="ml-2">LinkedIn</span>
                                    </a>
                                </div>
                            </div>
                            <!-- /Buttons-->
                        </div>
                        @else
                        <div class="card d-flex flex-row justify-content-between border-0 shadow-lg rounded-xl p-4 m-top">
                            <div class="picture col-md-4 my-5">
                                @php $sum2 = 0 @endphp
                                @foreach ($campaign->soldes as $solde)
                                    @php $sum2 += $solde->qte @endphp
                                @endforeach
                                <img class="img-fluid cursor-pointer" src="/storage/{{ $campaign->image }}" alt="" data-item="{{ $campaign }}" data-solde="{{ $sum2 }}" data-toggle="modal" data-target="#exampleModalCenter" id="image_show_modal">
                            </div>

                            <div class="infos col-md-5 d-flex flex-row">
                                <div class="d-flex flex-column px-1 py-3">
                                    <h1><strong class="text-danger font-italic">Win</strong></h1>
                                    <h2>{{ $campaign->name }}</h2>
                                    <p>Buy a <b>{{ $campaign->product_name }}</b> and make it yours!</p>
                                    <span class="text-primary font-weight-bold m-top mb-2"><b>$ {{ $campaign->price }}</b></span>
                                    <div class="flex flex-row">
                                        <button class="btn btn-outline-light rounded-xl text-dark border-secondary" data-item="{{ $campaign }}" data-solde="{{ $sum2 }}" data-toggle="modal" data-target="#exampleModalCenter" id="image_show_modal">See details</button>
                                        <a href="{{ route('addToCart', [$campaign->id,'type' =>'campaign']) }}" class="btn btn-primary rounded-xl">Add to Cart</a>
                                    </div>
                                    <span class="mt-3 sm-font text-muted">Max draw date: December 25, 2021 or</span>
                                    <span class="sm-font text-muted">when the campaign is sold out. Which ever is earlier.</span>
                                </div>
                            </div>

                            <div class="progressBar col-md-2 d-flex flex-column justify-content-center align-items-center">
                                <div class="progress_ blue ">
                                    <span class="progress-left">
                                         <span class="progress-bar"></span>
                                     </span>
                                    <span class="progress-right">
                                        <span class="progress-bar"></span>
                                    </span>
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

                            <!-- Buttons-->
                            <div class="btns col-md-1  d-flex flex-column align-items-center justify-content-center">
                                <form method="POST" action="{{ route('addToWishlist', ['id' =>$campaign->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="shareBtn btn btn-outline-light border rounded-xl mb-2 border-secondary">
                                        @if(Auth::user())
                                            @if(\App\Models\Wishlist::where('user_id', Auth::user()->id)->where('campaign_id', $campaign->id)->exists())
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill text-danger" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                </svg>
                                            @else
                                                <svg id="darkHeart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart text-dark" viewBox="0 0 16 16">
                                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg id="darkHeart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart text-dark" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </form>
                                <a class="shareBtn btn btn-outline-light border rounded-xl mb-2 border-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-share-fill text-dark" viewBox="0 0 16 16">
                                        <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                    </svg>
                                </a>
                                <div class="popup popuptext bg-white d-flex flex-column rounded-xl shadow-sm border-1 p-0" id="myPopup">

                                    <a href="https://facebook.com/sharer/sharer.php?u=https://lilya.medsoft.agency/campaign/{{ $campaign->id }}" class="btn border-bottom rounded-0 d-flex flex-row justify-content-start">
                                        <i class="fab fa-facebook-f mt-1"></i>
                                        <span class="ml-2">Facebook</span>
                                    </a>
                                    <a href="https://twitter.com/share?url=https://lilya.medsoft.agency/campaign/{{ $campaign->id }}" class="btn border-bottom rounded-0 d-flex flex-row justify-content-start">
                                        <i class="fab fa-twitter mt-1"></i>
                                        <span class="ml-2">Twitter</span>
                                    </a>
                                    <a href="https://linkedin.com/shareArticle?mini=true&url=https://lilya.medsoft.agency/campaign/{{ $campaign->id }}" class="btn rounded-0 d-flex flex-row justify-content-start">
                                        <i class="fab fa-linkedin-in mt-1"></i>
                                        <span class="ml-2">LinkedIn</span>
                                    </a>
                                </div>
                            </div>
                            <!-- /Buttons-->
                        </div>
                        @endif
                    </div>
                @endforeach
                @include('modal')
            </div>
        </div>
    </section>
    <!--Winners -->
    <section class="mb-4">
        <div class="container-fluid purple rounded-xl shadow-lg py-4 pl-4 pr-5">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h3 class="font-weight-bold text-white">Winners</h3>
                    <p class="font-weight-bold text-white">All our winners are announced in this section.</p>
                </div>

                <div id="pagination" class="pagination bg-transparent justify-content-end">
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
            <div class="row m-auto">
                <div class="winners col-md-12 pl-0 pr-lg-5 d-flex flex-row gap">
                    @foreach ($products as $product)
                        <div class="col-md-3 card m-2 py-5 px-2 border-0 shadow-lg d-flex flex-column align-items-center bg-white rounded-xl ">
                            <img class="img-fluid" src="/storage/{{ $product->image }}" alt="">
                            <h4 class="color-purple font-weight-bold text-center">Congratulations</h4>
                            <h5 class="text-center">Albert Gharahpetian </h5>
                            <h5 class="text-center"><span>on winning </span><b class="font-weight-bold">{{ $product->name }}</b></h5>
                            <span class="text-center">Coupon no: JW-00046-00038-D</span>
                            <span class="small text-center">
                                Announced:
                                <span>{{ $product->created_at->format('H.i.s') }}  |  </span>
                                <span>{{ $product->created_at->format('d-m-Y') }}</span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')

    <script>
        $( document ).ready(function() {
            const shareBtns = Object.values(document.querySelectorAll(".shareBtn"));
            shareBtns.forEach(shareBtn => {
                shareBtn.addEventListener('click',event => {
                    const myPopup = shareBtn.nextElementSibling;
                    console.log(myPopup);
                    myPopup.addEventListener('click',function(){
                        console.log('test');
                    });
                    event.preventDefault();
                    myPopup.classList.toggle("show");
                });
            });
        })

        // function redHeart() {
        //     var dark = document.getElementById("darkHeart");
        //     var red = document.getElementById("redHeart");
        //     dark.classList.add("d-none");
        //     red.classList.remove("d-none");
        // }
        $(document).on("click", "#image_show_modal", function () {
            var itemid= $(this).attr('data-item');
            var solde= $(this).attr('data-solde');
            const obj = JSON.parse(itemid);
            const modal_description = document.querySelector
            ('#modal_description');
            let url = "{{ route('addToCart', [':id','type' =>'campaign']) }}";
            let showCampaignUrl = "{{ route('showCampaign', [':id']) }}";
            let urlFb = "https://facebook.com/sharer/sharer.php?u=https://lilya.medsoft.agency/campaign/:id"
            let urlTwitter = "https://twitter.com/share?url=https://lilya.medsoft.agency/campaign/:id"
            let urlTLinkedIn = "https://linkedin.com/shareArticle?mini=true&url=https://lilya.medsoft.agency/campaign/:id"

            url = url.replace(':id', obj.id);
            showCampaignUrl = showCampaignUrl.replace(':id', obj.id);
            urlFb = urlFb.replace(':id', obj.id);
            modal_fb.href = urlFb;
            urlTwitter = urlTwitter.replace(':id', obj.id);
            modal_twitter.href = urlTwitter;
            urlTLinkedIn = urlTLinkedIn.replace(':id', obj.id);
            modal_likenIn.href = urlTLinkedIn;
            modal_addtocart.href = url;
            modal_show_campaign.href = showCampaignUrl;
            modal_name.innerText = obj.name;
            modal_product_name.innerText = 'Buy '+obj.product_name;
            modal_left_label.innerText = obj.left_label;
            modal_description.innerText = obj.description;
            modal_qte.innerText = obj.qte;
            modal_image.src = 'storage/'+obj.image;
            modal_price.innerText = obj.price;
            modal_solde.innerText = solde;
        });
    </script>
@endsection

