@extends('layouts.app')
@section('content')
    <section class="product-page">
        {{-- <img src="{{url($product->image)}}" alt="produit" class="img-fluid image-preview image-preview-js"/> --}}
        <div class="container ps-4 pe-4">
            {{-- <img class="image-preview image-preview-js" src="https://assets.petco.com/petco/image/upload/f_auto,q_auto/2668223-center-1"> --}}
            <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-lg-block mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{__('constants.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{__('constants.ourProducts')}}</a></li>
                    <li class="breadcrumb-item">
                        <a
                            href="/category/{{ $product->category->id }}">
                            @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($product->name_en))
                                {{ $product->category->name }}
                                {{-- If lang is english --}}
                            @else
                                {{ $product->category->name_en }}
                            @endif
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($product->name_en))
                            {{ $product->name }}
                            {{-- If lang is english --}}
                        @else
                            {{ $product->name_en }}
                        @endif
                    </li>
                </ol>
            </nav>
            <div class="product row g-4 ">
                <div class="left col-12 col-lg-6 rounded">
                    <div class="product-image p-5 text-center rounded mb-3">
                        <img src="{{ url($product->image) }}" alt="produit" data-toggle="magnify"
                             class="img-fluid "/>
                        <div class="loupe"></div>
                    </div>
                    <div class="catalog d-flex gap-2 justify-content-center">
                        @foreach ($product->galleries as $gallery)
                            <div class="image-product-shape">
                                <img src="{{ url('/storage/' . $gallery->path) }}" alt="produit" data-toggle="magnify"
                                     class="img-fluid"/>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="right col-12 col-lg-6 align-self-lg-center">
                    <h1 class="head text-uppercase mb-3">
                        @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($product->name_en))
                            <h1 class="head text-uppercase mb-3">{{ $product->name }}</h1>
                            {{-- If lang is english --}}
                        @else
                            <h1 class="head text-uppercase mb-3">{{ $product->name_en }}</h1>
                        @endif
                    </h1>
                    <h3 class="type text-uppercase mb-3 pb-3 border-bottom">{{ $product->slogan }}</h3>
                    @if (request()->currency === 'mad')
                        @if($product->starting_price_mad !== null)
                            <div class="price mb-3">
                                <span class="new me-2">{{ $product->starting_price_mad }} MAD</span>
                                <span class="correct text-decoration-line-through">{{ $product->selling_price_mad }}
                                MAD</span>
                            </div>
                        @else
                            <div class="price mb-3">
                                <span class="new">{{ $product->selling_price_mad }}
                                MAD</span>
                            </div>
                        @endif
                    @endif
                    @if (request()->currency === 'dollar')
                        @if($product->starting_price_dollar !== null)
                            <div class="price mb-3">
                                <span class="new me-2">$ {{ $product->starting_price_dollar }}</span>
                                <span class="correct text-decoration-line-through">$
                                {{ $product->selling_price_dollar }}</span>
                            </div>
                        @else
                            <div class="price mb-3">
                                <span class="new">$
                                {{ $product->selling_price_dollar }}</span>
                            </div>
                        @endif
                    @endif
                    @if (request()->currency === 'euro')
                        @if($product->starting_price_euro !== null)
                            <div class="price mb-3">
                                <span class="new me-2">$ {{ $product->starting_price_euro }}</span>
                                <span class="correct text-decoration-line-through">$
                                {{ $product->selling_price_euro }}</span>
                            </div>
                        @else
                            <div class="price mb-3">
                                <span class="new">$
                                {{ $product->selling_price_euro }}</span>
                            </div>
                        @endif
                    @endif
                    <div class="stock mb-3">
                        @if ($product->qte > 0)
                            <div class="in d-flex align-items-center gap-2">
                                <span class="in">{{__('constants.inStock')}} : </span>
                                <span class="shipping">{{__('constants.deliveryText')}}</span>
                            </div>
                        @else
                            <div class="out">
                                <span class="in text-decoration-line-through">{{__('constants.soldOut')}}}</span>
                            </div>
                        @endif
                    </div>
                    {{--                    <div class="stars mb-3 d-flex align-items-center gap-2">--}}
                    {{--                        <div class="d-flex align-items-center">--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star"/>--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star"/>--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star"/>--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star"/>--}}
                    {{--                            <img src="{{ url('/images/star.svg') }}" alt="star"/>--}}
                    {{--                        </div>--}}
                    {{--                        <span class="number">4.5/5</span>--}}
                    {{--                    </div>--}}
                    <product-add-to-cart-wishlist :id="{{ $product->id }}"
                                                  :texts="{{json_encode(["addToCart"=> __('constants.addToCart')])}}"></product-add-to-cart-wishlist>
                    <div class="informations-tabs">
                        <ul class="nav nav-tabs gap-2 border-bottom-0 mb-2 mb-lg-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active text-uppercase rounded-0" id="home-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Description
                                </button>
                            </li>
                            @if (!empty($product->using_advice))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-0" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile"
                                            aria-selected="false">
                                        {{__('constants.usingAdvice')}}
                                    </button>
                                </li>
                            @endif
                            @if (!empty($product->composition))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-0" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact" type="button" role="tab"
                                            aria-controls="contact"
                                            aria-selected="false">COMPOSITION
                                    </button>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <p>{{ $tr->translate($product->description) }}</p>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @if(!empty($product->using_advice))
                                    <p>{{ $tr->translate($product->using_advice) }}</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                @if(!empty($product->composition))
                                    <p>{{ $tr->translate($product->composition) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p class="description"></p>
                </div>
            </div>
        </div>
        <div class="products-advise pt-4 mb-5">
            <h2 class="advise text-center position-relative"><span
                    class="fw-bold">DALIDA</span>{{" " .__('constants.alsoAdviseYou')}}</h2>
            <div class="owl-carousel owl-theme">
                @foreach ($anotherProducts as $product)
                    <div class="product text-center">
                        <div class="container">
                            <a href="{{ '/product/' . $product->id }}">
                                <img src="{{ url($product->image) }}"
                                     class="img-fluid m-auto mb-2 mb-lg-4 img-product"/>
                            </a>
                            <h4 class="m-auto mb-2 mb-lg-3">
                                @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($product->name_en))
                                    {{ $product->name}}
                                @else
                                    {{ $product->name_en }}
                                @endif
                            </h4>
                            {{--                            <div class="mb-1 d-flex gap-1 justify-content-center stars">--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star"/>--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star"/>--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star"/>--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star"/>--}}
                            {{--                                <img src="{{ url('images/star.svg') }}" alt="star"/>--}}
                            {{--                            </div>--}}
                            {{--                            <span class="star-percentage d-block mb-1">4.5/5</span>--}}
                            <add-to-cart :id="{{ $product->id }}"
                                         :texts="{{json_encode(["addToCart"=> __('constants.addToCart')])}}"></add-to-cart>
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
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })
        })
    </script>
@endsection
