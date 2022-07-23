<section class="gammes text-center mt-5" id="gammes">
    <div class="wrapper">
        <div class="container">
            <h1 class="d-none d-xl-block title mb-3 text-center position-relative">{{ __('constants.ourProducts') }}</h1>
        </div>
        <h1 class="d-xl-none title mb-3 text-center position-relative">{{ __('constants.ourProducts') }}</h1>
        {{-- <p class="d-none d-lg-block">Découvrez nos soins les plus appréciés.</p> --}}
        <div class="all-gammes">
            @foreach ($categoriesAsc as $category)
                @if (count($category->products) > 1)
                    <div class="gamme">
                        {{-- <h1 class="d-lg-none mb-4 text-uppercase">GAMME {{ $category->name }}</h1> --}}
                        <div class="row mx-0 image-products justify-content-center">
                            <div class="col-12 col-sm-6 d-none d-sm-flex left position-relative text-uppercase">
                                {{-- <img src="/storage/{{$category->image}}" alt="gamme" class="img-fluid w-100"> --}}
                                <div class="image"></div>
                                @if ($category->id === 1)
                                    <h4 class="position-absolute py-5 mb-0 text-capitalize">{{ __('constants.category1Name') }}</h4>
                                @elseif($category->id === 2)
                                    <h4 class="position-absolute py-5 mb-0 text-capitalize">{{ __('constants.category2Name') }}</h4>
                                @elseif($category->id === 3)
                                    <h4 class="position-absolute py-5 mb-0 text-capitalize">{{ __('constants.category3Name') }}</h4>
                                @else
                                    <h4 class="position-absolute py-5 mb-0 text-capitalize">{{ __('constants.category4Name') }}</h4>
                                @endif
                            </div>
                            <div class="products-rotate-text position-relative col-12 col-sm-6 p-lg-5 mb-lg-0">
                                @if ($category->id === 1)
                                    <h4 class="rotate-text rotate position-absolute m-0 d-block d-lg-none">{{ __('constants.category1Name') }}</h4>
                                @elseif($category->id === 2)
                                    <h4 class="rotate-text rotate position-absolute m-0 d-block d-lg-none">{{ __('constants.category2Name') }}</h4>
                                @elseif($category->id === 3)
                                    <h4 class="rotate-text rotate position-absolute m-0 d-block d-lg-none">{{ __('constants.category3Name') }}</h4>
                                @else
                                    <h4 class="rotate-text rotate position-absolute m-0 d-block d-lg-none">{{ __('constants.category4Name') }}</h4>
                                @endif
                                <div class="row products ps-5 ps-lg-0">
                                    @for ($i = 0; $i < 4; $i++)
                                        @if(isset($category->products[$i]))
                                            <div class="product col-6">
                                                <a href="{{ '/product/' . $category->products[$i]->id }}">
                                                    <img src="{{ $category->products[$i]->image }}"
                                                         class="img-product img-fluid mb-2 mb-lg-4"/>
                                                </a>
                                                @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($category->products[$i]->name_en))
                                                    <h4 class="m-auto mb-1 mb-lg-3">{{ $category->products[$i]->name }}</h4>
                                                    {{-- If lang is english --}}
                                                @else
                                                    <h4 class="m-auto mb-1 mb-lg-3">{{ $category->products[$i]->name_en }}</h4>
                                                @endif
                                                @if (request()->currency === 'mad')
                                                    @if($category->products[$i]->starting_price_mad !== null)
                                                        <div class="price mb-3">
                                                            <span class="new me-2">{{ $category->products[$i]->starting_price_mad }} MAD</span>
                                                            <span class="correct text-decoration-line-through">{{ $category->products[$i]->selling_price_mad }}
                                MAD</span>
                                                        </div>
                                                    @else
                                                        <div class="price mb-3">
                                <span class="new">{{ $category->products[$i]->selling_price_mad }}
                                MAD</span>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if (request()->currency === 'dollar')
                                                    @if($category->products[$i]->starting_price_dollar !== null)
                                                        <div class="price mb-3">
                                                            <span
                                                                class="new me-2">$ {{ $category->products[$i]->starting_price_dollar }}</span>
                                                            <span class="correct text-decoration-line-through">$
                                {{ $category->products[$i]->selling_price_dollar }}</span>
                                                        </div>
                                                    @else
                                                        <div class="price mb-3">
                                <span class="new">$
                                {{ $category->products[$i]->selling_price_dollar }}</span>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if (request()->currency === 'euro')
                                                    @if($category->products[$i]->starting_price_euro !== null)
                                                        <div class="price mb-3">
                                                            <span
                                                                class="new me-2">$ {{ $category->products[$i]->starting_price_euro }}</span>
                                                            <span class="correct text-decoration-line-through">$
                                {{ $category->products[$i]->selling_price_euro }}</span>
                                                        </div>
                                                    @else
                                                        <div class="price mb-3">
                                <span class="new">$
                                {{ $category->products[$i]->selling_price_euro }}</span>
                                                        </div>
                                                    @endif
                                                @endif
                                                {{--                                            <div class="mb-1">--}}
                                                {{--                                                <img src="images/star.svg" alt="star" />--}}
                                                {{--                                                <img src="images/star.svg" alt="star" />--}}
                                                {{--                                                <img src="images/star.svg" alt="star" />--}}
                                                {{--                                                <img src="images/star.svg" alt="star" />--}}
                                                {{--                                                <img src="images/star.svg" alt="star" />--}}
                                                {{--                                            </div>--}}
                                                {{--                                            <span class="star-percentage d-block mb-1">4.5/5</span>--}}

                                                <a href="{{ '/product/' . $category->products[$i]->id }}"
                                                   class="link btn text-white fw-bold">{{ __('constants.BuyNow') }}</a>
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @else --}}
                    {{-- <p>Veuillez ajouter de gammes de produit et des produits</p> --}}
                @endif
            @endforeach
        </div>
    </div>
</section>
