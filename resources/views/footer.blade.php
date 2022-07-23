@php $setting = \App\Models\Setting::find(1);  @endphp
<footer class="text-center">
    <div class="top mt-lg-3 ">
        <div class="container">
            <h1 class="title d-none d-xl-block title mb-5 text-center position-relative ">{{ __('constants.ourPrinciples') }}</h1>
        </div>
        <h1 class="title d-xl-none title mb-5 text-center position-relative">{{ __('constants.ourPrinciples') }}</h1>
        <div class="container">
            {{--            <img src="{{url('/images/footer-women.jpg')}} " alt="women" class="two-womens img-fluid d-md-none mb-5"/>--}}
            <div class="row policies container">
                <div class="col-12 col-lg-4 policy">
                    <img src="{{url('/images/efficace.svg')}}" alt="livraison" class="img-fluid mb-3"/>
                    <h4 class="mb-3">{{ __('constants.principle1') }}</h4>
                    <p class="m-lg-auto">{{ __('constants.principle1Text') }}</p>
                </div>
                <div class="col-12 col-lg-4 policy">
                    <img src="{{url('/images/vegan.svg')}}" alt="paiement" class="img-fluid mb-3"/>
                    <h4 class="mb-3">{{ __('constants.principle2') }}</h4>
                    <p class="m-lg-auto">{{ __('constants.principle2Text') }}</p>
                </div>
                <div class="col-12 col-lg-4 policy">
                    <img src="{{url('/images/recherche-dev.svg')}}" alt="guarantee" class="img-fluid mb-3"/>
                    <h4 class="mb-3">{{ __('constants.principle3') }}</h4>
                    <p class="m-lg-auto">{{ __('constants.principle3Text') }}</p>
                </div>
            </div>
        </div>

    </div>
    <div class="instagram-feeds mt-5  p-1">
        <div class="container-fluid">
            <div class="feeds row g-1 g-lg-2 position-relative ps-lg-5">
                {{-- @if (count($instagramImages) === 0) --}}
                <div class="row g-1 g-lg-2">
                    <div class="feed col-6  col-lg-3">
                        <img src="/images/instagram1.png" alt="feed" class="img-fluid"/>
                    </div>
                    <div class="feed col-6 col-lg-3">
                        <img src="/images/instagram2.png" alt="feed" class="img-fluid"/>
                    </div>
                    <div class="feed col-6 col-lg-3">
                        <img src="/images/instagram3.png" alt="feed" class="img-fluid"/>
                    </div>
                    <div class="feed col-6 col-lg-3">
                        <img src="/images/instagram4.png" alt="feed" class="img-fluid"/>
                    </div>
                </div>
                <div class="position-absolute follow-us d-flex gap-2 flex-column align-items-center">
                    <div class="box p-2 p-lg-5">
                        <img src="/images/instagram1.svg" alt="box" class="img-fluid mb-4"/>
                        <p class="text-center">dalida.ma</p>

                        <a href="{{ $setting !== null ? url('https://instagram.com/' . $setting->instagram) : '#' }}"
                           class="btn  px-3 px-lg-3 py-lg-2 text-uppercase">{{__('constants.followUs')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom  pb-3 pb-lg-5 position-relative">
        <div class="container">
            <div class="row justify-content-between">
                <div class="subscribe-urls col-12 col-lg-6">
                    <p class="m-auto ms-lg-0 mb-3 text-lg-start">{{__('constants.footerOffre')}}</p>
                    <lead-footer subscribetext="{{__('constants.subscribe')}}"></lead-footer>
                    <div class="row ">
                        <ul class="col-6 text-uppercase list-unstyled d-flex flex-column align-items-start">
                            <li>
                                <a href="/home">{{__('constants.home')}}</a>
                            </li>
                            <li>
                                <a href="/our-history">{{__('constants.ourHistory')}}</a>
                            </li>
                        </ul>
                        <ul class="col-6 text-uppercase list-unstyled d-flex flex-column align-items-start">
                            <li>
                                <a href="/home#gammes">{{__('constants.ourProducts')}}</a>
                            </li>
                            <li>
                                <a href="/contact">{{__('constants.contactUs')}}</a>
                            </li>
                            {{--                            <li>--}}
                            {{--                                <a href="#">POLITIQUE DE CONFIDENTIALITÉ</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a href="#">CONDITIONS D'UTILISATION</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a href="#">LIVRAISON ET RETOURS</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a href="#">faq</a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-4 logo-social-media d-flex align-items-end">
                    <div
                        class="ms-auto ms-lg-0 d-lg-flex align-items-lg-center gap-lg-2 flex-lg-column align-items-lg-baseline">
                        <img src="{{url('/images/logo.png')}}" alt="logo" class="img-fluid logo mb-2"/>
                        <div class="d-flex flex-column flex-lg-row align-items-center gap-2">
                            <span class="contact-us mb-2 mb-lg-0">{{__('constants.contactUsAt')}}</span>
                            <div class="social-media d-flex flex-row gap-2 justify-content-center ">
                                <a class="d-block text-light" target="_blank"
                                   href="{{'https://instagram.com/'.$setting->instagram}}">
                                    <img src="{{url('/images/instagram.svg')}}" alt="instagram" class="img-fluid"/>
                                </a>
                                <a class="d-block text-light" target="_blank"
                                   href="{{'https://facebook.com/'.$setting->facebook}}">
                                    <img src="{{url('/images/facebook.svg')}}" alt="instagram" class="img-fluid"/>
                                </a>
                                {{--                                <a class="d-block text-light" target="_blank" href="#">--}}
                                {{--                                    <img src="{{url('/images/call.svg')}}" alt="instagram" class="img-fluid"/>--}}
                                {{--                                </a>--}}
                                {{-- <a class="d-block text-light" target="_blank" href="{{'https://youtube.com/'.$setting->youtube}}">
                                    <img src="{{url('/images/youtube.svg')}}" alt="instagram" class="img-fluid"/>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- Absolute tree--}}

    </div>
</footer>
