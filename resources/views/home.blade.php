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

        .modal-share {
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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

    </style>
@endsection

@section('content')
    <main class="welcome">
        @php $type = [] @endphp
        <!--SliderWin -->
        @include('carousel')
        {{-- Start Why Dalida --}}
        @include('home.why-dalida')
        {{-- End Why Dalida --}}
        {{-- Start Best Sellers --}}
        {{-- End Best Sellers --}}
        {{-- Start Guarantee --}}
        <!-- <section class="guarantee text-center pt-5 mt-lg-5">
                    <div class="container">
                        <h1 class="text-white text-center d-none d-md-block m-auto mb-5">NOS ENGAGEMENTS ENVERS VOTRE SANTÉ ET
                            L'ENVIRONNEMENT</h1>
                        <div class="row term">
                            <div
                                class="col-12 col-md-6 col-lg-4 mb-3 d-flex flex-column align-items-center gap-2 position-relative policy">
                                <img alt="check" src="images/check.svg" class="img-fluid mb-4"/>
                                <span class="text-white w-75  mb-3">UNE QUALITÉ DONT VOUS POUVEZ PROFITER</span>
                                <p>Nous croyons en la création de soins de peau et de cheveux de haute qualité. C'est pourquoi
                                    nous nous efforçons à développer des formules efficaces et respectueuses de la peau.</p>
                            </div>
                            <div
                                class="col-12 col-md-6 col-lg-4 mb-3 d-flex flex-column align-items-center gap-2 position-relative policy">
                                <img alt="check" src="images/cruaute.svg" class="img-fluid mb-4"/>
                                <span class="text-white w-75 mb-3">SANS CRUAUTÉ</span>
                                <p>Chez Dalida, nous ne supervisons ni ne réalisons des tests sur les animaux, et nous nous
                                    engageons dans la lutte contre ces tests dans l'industrie de la cosmétique.</p>
                            </div>
                            <div
                                class="col-12 col-md-6 col-lg-4 mb-3 d-flex flex-column align-items-center gap-2 position-relative policy">
                                <img alt="check" src="images/check.svg" class="img-fluid mb-4"/>
                                <span class="text-white w-75 mb-3">UNE QUALITÉ DONT VOUS POUVEZ PROFITER</span>
                                <p>Nous croyons en la création de soins de peau et de cheveux de haute qualité. C'est pourquoi
                                    nous nous efforçons à développer des formules efficaces et respectueuses de la peau.</p>
                            </div>
                        </div>
                    </div>
                </section> -->
        {{-- end Guarantee --}}
        {{-- Start Gamme --}}
        @include('home.best-seller-gamme')

        {{-- End Gamme --}}
        {{-- Start Buy By Category --}}
        @include('home.categories')
        {{-- End Buy By Category --}}
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const shareBtns = Object.values(document.querySelectorAll(".shareBtn"));
            shareBtns.forEach(shareBtn => {
                shareBtn.addEventListener('click', event => {
                    const myPopup = shareBtn.nextElementSibling;
                    console.log(myPopup);
                    myPopup.addEventListener('click', function() {
                        console.log('test');
                    });
                    event.preventDefault();
                    myPopup.classList.toggle("show");
                });
            });
        })

        function redHeart() {
            var dark = document.getElementById("darkHeart");
            var red = document.getElementById("redHeart");
            dark.classList.add("d-none");
            red.classList.remove("d-none");
        }

        $(document).on("click", "#image_show_modal", function() {
            var itemid = $(this).attr('data-item');
            var solde = $(this).attr('data-solde');
            const obj = JSON.parse(itemid);
            const modal_description = document.querySelector('#modal_description');
            let url = "{{ route('addToCart', [':id', 'type' => 'campaign']) }}";
            let showCampaignUrl = "{{ route('showCampaign', [':id']) }}";
            let urlFb = "https://facebook.com/sharer/sharer.php?u=https://lilya.medsoft.agency/campaign/:id"
            let urlTwitter = "https://twitter.com/share?url=https://lilya.medsoft.agency/campaign/:id"
            let urlTLinkedIn =
                "https://linkedin.com/shareArticle?mini=true&url=https://lilya.medsoft.agency/campaign/:id"

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
            modal_product_name.innerText = 'Buy ' + obj.product_name;
            modal_left_label.innerText = obj.left_label;
            modal_description.innerText = obj.description;
            modal_qte.innerText = obj.qte;
            modal_image.src = 'storage/' + obj.image;
            modal_price.innerText = obj.price;
            modal_solde.innerText = solde;
        });

    </script>
@endsection
