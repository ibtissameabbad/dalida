@extends('layouts.app')
@section('content')
    <section class="product-page">
        <div class="container ps-4 pe-4">
            <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-lg-block mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{__('constants.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="/home/#gammes">{{__('constants.ourProducts')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($category->name_en))
                            {{ $category->name }}
                            {{-- If lang is english --}}
                        @else
                            {{ $category->name_en }}
                        @endif
                    </li>
                </ol>
            </nav>
            <div class="product row g-4 mb-3 mb-lg-5">
                <div class="left col-12 col-lg-6 rounded">
                    <div class="product-image p-5 text-center rounded mb-3">
                        <img src="{{ url($category->image) }}" alt="produit" class="img-fluid category"
                             data-toggle="magnify"/>
                    </div>
                    <div class="catalog d-flex gap-2 justify-content-center">
                        @foreach ($category->galleries as $gallery)
                            <div class="image-product-shape">
                                <img src="{{ url($gallery->path) }}" alt="produit" class="img-fluid"
                                     data-toggle="magnify"/>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="right col-12 col-lg-6 align-self-lg-center">
                    {{-- If lang is frensh --}}
                    @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($category->name_en))
                        <h1 class="head text-uppercase mb-3">{{ $category->name }}</h1>
                        {{-- If lang is english --}}
                    @else
                        <h1 class="head text-uppercase mb-3">{{ $category->name_en }}</h1>
                    @endif
                    @if ($category->slogan !== null)
                        <h3 class="type text-uppercase mb-3 pb-3 border-bottom">{{ $category->slogan }}</h3>
                    @endif

                    @if (request()->currency === 'mad')
                        <div class="price mb-3">
                            <span class="new me-2">{{ $category->starting_price_mad }} MAD</span>
                            <span class="correct text-decoration-line-through">{{ $category->selling_price_mad }}
                                MAD</span>
                        </div>
                    @endif
                    @if (request()->currency === 'dollar')
                        <div class="price mb-3">
                            <span class="new me-2">$ {{ $category->starting_price_dollar }}</span>
                            <span class="correct text-decoration-line-through">$
                                {{ $category->selling_price_dollar }}</span>
                        </div>
                    @endif
                    @if (request()->currency === 'euro')
                        <div class="price mb-3">
                            <span class="new me-2">€ {{ $category->starting_price_euro }}</span>
                            <span class="correct text-decoration-line-through">€
                                {{ $category->selling_price_euro }}</span>
                        </div>
                    @endif
                    <div class="stock mb-3">
                        @if ($category->qte > 0)
                            <div class="in d-flex align-items-center gap-2">
                                <span class="in">{{__('constants.inStock')}} : </span>
                                @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($category->shipping_en))
                                    <span class="shipping">{{ $category->shipping }}</span>
                                @else
                                    <span class="shipping">{{ $category->shipping_en }}</span>
                                @endif
                            </div>
                        @else
                            <div class="out">
                                <span class="in text-decoration-line-through">{{__('constants.soldOut')}}</span>
                            </div>
                        @endif
                    </div>
                    {{--                    <div class="stars mb-3 d-flex align-items-center gap-2">--}}
                    {{--                        <div class="d-flex align-items-center">--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star" />--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star" />--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star" />--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star" />--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star" />--}}
                    {{--                        </div>--}}
                    {{--                        <span class="number">4.5/5</span>--}}
                    {{--                    </div>--}}
                    <category-add-to-cart-wishlist :id="{{ $category->id }}"
                                                   :texts="{{json_encode(["addToCart"=> __('constants.addToCart')])}}"></category-add-to-cart-wishlist>
                    <div class="informations-tabs">
                        <ul class="nav nav-tabs gap-2 border-bottom-0 mb-2 mb-lg-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active text-uppercase rounded-0" id="home-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Description
                                </button>
                            </li>
                            @if (!empty($category->using_advice))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-0" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">{{__('constants.usingAdvice')}}</button>
                                </li>
                            @endif
                            @if (!empty($category->composition))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-0" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">COMPOSITION
                                    </button>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <p>{{ $tr->translate($category->description) }}</p>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @if(!empty($category->using_advice))
                                    <p>{{ $tr->translate($category->using_advice) }}</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                @if(!empty($category->composition))
                                    <p>{{ $tr->translate($category->composition) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p class="description"></p>
                </div>
            </div>
            <div class="product-tabs">
                <ul class="nav nav-tabs gap-2 border-bottom-0 mb-2 mb-lg-3" id="product-tab" role="tablist1">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-uppercase rounded-0" id="product-description-tab"
                                data-bs-toggle="tab" data-bs-target="#productdescription" type="button" role="tab"
                                aria-controls="home"
                                aria-selected="true">{{__('constants.productDescription')}}</button>
                    </li>
                    @if (!empty($category->ingredients))
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-0" id="ingredients-tab" data-bs-toggle="tab"
                                    data-bs-target="#ingredients" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">{{__('constants.ingredient')}}</button>
                        </li>
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active product-description" id="productdescription" role="tabpanel1"
                         aria-labelledby="product-description-tab">
                        {{-- <p>{{$category->product_description}}</p> --}}
                        {{-- <div v-html="{{$category->product_description}}"></div> --}}
                        @if ($category->id === 2)
                            <div class="">
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category1ProductDescriptionTitle1')}}</span>
                                    <span>{{__('constants.category1ProductDescriptionParagraph1')}}</span>
                                </p>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category1ProductDescriptionTitle2')}}</span>
                                    <span>{{__('constants.category1ProductDescriptionParagraph2')}}</span>
                                </p>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category1ProductDescriptionTitle3')}}</span>
                                    <span>{{__('constants.category1ProductDescriptionParagraph3')}}</span>
                                </p>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category1ProductDescriptionTitle4')}}</span>
                                    <span>{{__('constants.category1ProductDescriptionParagraph4')}}</span>
                                </p>
                            </div>
                        @endif
                        @if ($category->id === 1)
                            <div>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category2ProductDescriptionTitle1')}}</span>
                                    <span>{{__('constants.category2ProductDescriptionParagraph1')}}</span>
                                </p>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category2ProductDescriptionTitle2')}}</span>
                                    <span>{{__('constants.category2ProductDescriptionParagraph2')}}</span>
                                </p>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category2ProductDescriptionTitle3')}}</span>
                                    <span>{{__('constants.category2ProductDescriptionParagraph3')}}</span>
                                </p>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category2ProductDescriptionTitle4')}}</span>
                                    <span>{{__('constants.category2ProductDescriptionParagraph4')}}</span>
                                </p>
                            </div>
                        @endif
                        @if ($category->id === 3)
                            <div>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category3ProductDescriptionTitle1')}}</span>
                                    <span>{{__('constants.category3ProductDescriptionParagraph1')}}</span>
                                </p>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category3ProductDescriptionTitle2')}}</span>
                                    <span>{{__('constants.category3ProductDescriptionParagraph2')}}</span>
                                </p>
                            </div>
                        @endif
                        @if ($category->id === 4)
                            <div>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category4ProductDescriptionTitle1')}}</span>
                                    <span>{{__('constants.category4ProductDescriptionParagraph1')}}</span>
                                </p>
                                <p class="mb-3">
                                    <span
                                        class="d-block fw-bold mb-2">{{__('constants.category4ProductDescriptionTitle2')}}</span>
                                    <span>{{__('constants.category4ProductDescriptionParagraph2')}}</span>
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="ingredients" role="tabpanel1" aria-labelledby="ingredients-tab">
                        <p>{{ $category->ingredients }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="products-advise pt-4 mb-5">
            <h2 class="advise text-center position-relative"><span
                    class="fw-bold">DALIDA</span> {{" " .__('constants.alsoAdviseYou')}}</h2>
            <div class="owl-carousel owl-theme">
                @foreach ($anotherCategories as $category)
                    <div class="product text-center">
                        <div class="container">
                            <a href="{{ '/category/' . $category->id }}">
                                <img src="{{ url($category->image) }}" class="img-fluid m-auto mb-2 img-product"/>
                            </a>
                            <h4 class="m-auto mb-2">
                                @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($category->name_en))
                                    {{ $category->name}}
                                @else
                                    {{ $category->name_en }}
                                @endif
                            </h4>
                            {{--                            <div class="mb-1 d-flex gap-1 justify-content-center stars">--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star" />--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star" />--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star" />--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star" />--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star" />--}}
                            {{--                            </div>--}}
                            {{--                            <span class="star-percentage d-block mb-1">4.5/5</span>--}}
                            <add-to-category-cart :id="{{ $category->id }}"
                                                  :texts="{{json_encode(["addToCart"=> __('constants.addToCart')])}}"></add-to-category-cart>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function ($) {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 2
                    }
                }
            })
        })
    </script>
@endsection
