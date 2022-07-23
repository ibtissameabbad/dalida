<!-- Modal -->

<div class="modal fade rouded-2xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mx-width" role="document">
      <div class="modal-content rounded-2xl border-0">
        <div class="modal-body bg-light rounded-2xl p-0">
            <div class="bg-danger mr-auto py-3 rounded-top-2xl text-center">
                <span id="modal_left_label" class="text-white text-center font-italic font-weight-bold">{{ $campaign->left_label }}</span>
            </div>
            <div class="card d-flex flex-column border-0 bg-light rounded-top-2xl">
                <div class="first d-flex flex-row">
                    <div class="my-5 mx-3">
                        <img id="modal_image" class="img-fluid cursor-pointer" src="storage/{{ $campaign->image }}" alt="">
                    </div>
                    <div class="second d-flex flex-column justify-content-between mt-4 mr-3">
                        <div class="d-flex flex-column align-items-end">
                            <a class="btn btn-outline-light rounded-xl mb-2 border-secondary"  data-toggle="tooltip" data-placement="right" title="Close"  data-dismiss="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x text-dark" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                            <a id="modal_show_campaign" class="btn btn-outline-light rounded-xl mb-2 border-secondary"  data-toggle="tooltip" data-placement="right" title="See full view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrows-angle-expand text-dark" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                                </svg>
                            </a>
                            <div class="dropleft">
                                <form method="POST" action="{{ route('addToWishlist', ['id' =>$campaign->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="shareBtn btn btn-outline-light border rounded-xl mb-2 border-secondary">
                                        @if(Auth::user())
                                            @if(\App\Models\Wishlist::where('user_id', Auth::user()->id)->where('campaign_id', $campaign->id)->exists())
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-fill text-danger" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                </svg>
                                            @else
                                                <svg id="darkHeart" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart text-dark" viewBox="0 0 16 16">
                                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg id="darkHeart" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart text-dark" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </form>
                                <div class="dropdown-menu rounded-xl px-2 mr-2 border-0 shadow-lg">
                                  <a href="{{ route('wishlist') }}" class="btn btn-light bg-white rounded-xl w-100">Go to Wishlist</a>
                                </div>
                            </div>
                            <a class="shareBtn btn btn-outline-light border rounded-xl mb-2 border-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-share-fill text-dark" viewBox="0 0 16 16">
                                    <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                </svg>
                            </a>
                            <div class="modal-share popup popuptext bg-white d-flex flex-column rounded-xl shadow-sm border-1 p-0" id="myPopup">

                                <a id="modal_fb" href="https://facebook.com/sharer/sharer.php?u=https://lilya.medsoft.agency/campaign/{{ $campaign->id }}" class="btn border-bottom rounded-0 d-flex flex-row justify-content-start">
                                    <i class="fab fa-facebook-f mt-1"></i>
                                    <span class="ml-2">Facebook</span>
                                </a>
                                <a id="modal_twitter" href="https://twitter.com/share?url=https://lilya.medsoft.agency/campaign/{{ $campaign->id }}" class="btn border-bottom rounded-0 d-flex flex-row justify-content-start">
                                    <i class="fab fa-twitter mt-1"></i>
                                    <span class="ml-2">Twitter</span>
                                </a>
                                <a id="modal_likenIn" href="https://linkedin.com/shareArticle?mini=true&url=https://lilya.medsoft.agency/campaign/{{ $campaign->id }}" class="btn rounded-0 d-flex flex-row justify-content-start">
                                    <i class="fab fa-linkedin-in mt-1"></i>
                                    <span class="ml-2">LinkedIn</span>
                                </a>
                            </div>
                        </div>
                        <div class="progress_ blue"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                            <div class="progress-value d-flex flex-column">
                                @php $sum = 0 @endphp
                                @foreach ($campaign->soldes as $solde)
                                    @php $sum += $solde->qte @endphp
                                @endforeach
                                <span id="modal_solde" class="font-weight-bold">{{ $sum ?? '0' }}</span>
                                <span style="border-bottom: 1px solid lightgrey;" class="small w-75 ml-3">SOLD</span>
                                <span class="text-muted small">OUT OF</span>
                                <span id="modal_qte" class="text-muted">{{ $campaign->qte }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column p-3">
                        <b>Get a chance to win:</b>
                        <h2 id="modal_name">{{ $campaign->name }}</h2>
                        <p id="modal_description">{{ $campaign->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer d-flex flex-row justify-content-between">
          <span class="d-flex flex-column">
            <span id="modal_product_name" class="font-weight-bold">{{ $campaign->product_name }}</span>
            <span id="modal_price" class="text-primary font-weight-bold"><b>{{ $campaign->price }}</b></span>
            <span class="small text-muted">inclusive of VAT</span>
          </span>
          <a id="modal_addtocart" class="btn btn-primary rounded-xl w-50">Add to Cart</a>
        </div>
      </div>
    </div>
</div>
