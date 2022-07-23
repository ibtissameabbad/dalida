@extends('layouts.app')
@section('content')
    <section class="our-history-page text-center my-5">
        <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-lg-block mt-3 mb-5">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{__('constants.home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('constants.ourHistory')}}</li>
                </ol>
            </div>
        </nav>
        <h1 class="text-uppercase our-history mb-5 text-capitalize">{{__('constants.ourHistory')}}</h1>
        <div class="container px-5">
            <div class="header mb-3 mb-lg-5 text-lg-start">
                <div class="row align-items-center">
                    <div class="image-product col-12 col-lg-3">
                        <img src="/images/our-history-product.png" alt="produit" class="img-fluid product">
                    </div>
                    <div class="text col-12 col-lg-9 text-center text-lg-start">
                        <div>

                            <p class="text-black mb-2 mb-lg-4">{{__('constants.ourHistoryParagraph1')}}</p>
                            <p class="text-black mb-2 mb-lg-4">{{__('constants.ourHistoryParagraph2')}}</p>
                            <p class="text-black mb-2 mb-lg-4">{{__('constants.ourHistoryParagraph3')}}</p>
                            <p class="text-white">{{__('constants.ourHistoryParagraph4')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="why text-start mb-3 mb-lg-5 text-center">
            <div class="container d-none d-lg-block ">
                <h2 class="mb-2 mb-lg-3 position-relative text-capitalize">{{__('constants.whySite')}} ?</h2>
            </div>
            <h2 class="d-block d-lg-none mb-2 mb-lg-3 position-relative text-capitalize">{{__('constants.whySite')}} ?</h2>
            <div class="container px-5">
                <p class="mb-lg-5">{{__('constants.ourHistoryWhySiteText')}}</p>
            </div>
        </div>
        <div class="proprieties mt-4 text-start">
            <div class="container px-5">
                <img class="img-fluid products m-auto d-block mb-3" src="/images/our-history-products.png"
                     alt="products"/>
                <h2 class="pb-4 text-center top">{{__('constants.ourHistoryProprietiesTitle')}}</h2>

                <div class="row bottom align-items-center mb-2 mb-lg-5">
                    <div class="left col-6 pe-0">
                        <h2 class="mb-2 text-capitalize">{{__('constants.ourHistoryProperty1Title')}}</h2>
                        <p>{{__('constants.ourHistoryProperty1Paragraph1Text')}}</p>
                        <p>{{__('constants.ourHistoryProperty1Paragraph2Text')}}</p>
                    </div>
                    <div class="right col-6 pe-0">
                        <img src="{{ url('/images/bave.png') }}" alt="olive" class="img-fluid"/>
                    </div>
                </div>
                <div class="row bottom position-relative align-items-center mb-2 mb-lg-5">
                    <div class="left col-6 pe-0">
                        <h2 class="mb-2 text-capitalize">{{__('constants.ourHistoryProperty2Title')}}</h2>
                        <p>{{__('constants.ourHistoryProperty2Paragraph1Text')}}</p>
                        <p>{{__('constants.ourHistoryProperty2Paragraph2Text')}}</p>
                    </div>
                    <div class="right col-6 pe-0">
                        <img src="{{ url('/images/argan.png') }}" alt="olive" class="img-fluid"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
