<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('og')
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{--    <link rel="stylesheet" href="css/bootstrap.min.css"/>--}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.carousel.min.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.theme.default.min.css') }}">--}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300&display=swap"
          rel="stylesheet">
    <link rel="icon" href="/images/favicon.png" type="image/x-icon">
    <style>
        .vodiapicker {
            display: none;
        }

        .ul-lang {
            padding-left: 0px;
        }

        .ul-lang img, .btn-select img {
            width: 15px;

        }

        .ul-lang li {
            list-style: none;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .ul-lang li:hover {
            /*background-color: #F4F3F3;*/
            font-weight: bold;
        }

        .ul-lang li img {
            margin: 5px;
        }

        .ul-lang li span, .btn-select li span {
            margin-left: 8px;
        }

        /* item list */

        .b {
            display: none;
            /*width: 100%;*/
            max-width: 350px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: 5px;
            position: absolute;
            width: 78px;
        }

        .open {
            display: show !important;
        }

        .btn-select {
            /*margin-top: 10px;*/
            width: 100%;
            max-width: 350px;
            height: 34px;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ccc;

        }

        .btn-select li {
            list-style: none;
            float: left;
            padding-bottom: 0px;
        }

        .btn-select:hover li {
            margin-left: 0px;
        }

        .btn-select:hover {
            background-color: #F4F3F3;
            border: 1px solid transparent;
            box-shadow: inset 0 0px 0px 1px #ccc;


        }

        .btn-select:focus {
            outline: none;
        }

        .lang-select {
            /*margin-left: 50px;*/
        }

    </style>
    @yield('style')
    {{--        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css">--}}
    {{--        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css">--}}

    {{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
    {{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js" defer></script>--}}
    {{--    <style>--}}
    {{--        .owl-carousel .item {--}}
    {{--            height: 10rem;--}}
    {{--            background: #4DC7A0;--}}
    {{--            padding: 1rem;--}}
    {{--        }--}}

    {{--        .owl-carousel .item h4 {--}}
    {{--            color: #FFF;--}}
    {{--            font-weight: 400;--}}
    {{--            margin-top: 0rem;--}}
    {{--        }--}}
    {{--    </style>--}}
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}
    {{--    <link rel="stylesheet"--}}
    {{--          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>--}}
</head>
<body>
<div id="app">
    @include("header")
    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @elseif(session('warning'))
        <div class="alert alert-warning mt-4">
            {{ session('warning') }}
        </div>
    @endif
    @yield('content')

    @include('footer')



    <!--Cart-->
    @if(Route::currentRouteName() != "cart")
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown fixed dropdown-cart rounded">
                <a href="/cart" type="button" class="bg-black btn rounded-xl py-2 text-white border"
                   data-toggle="dropdown">
                    @php
                        $totalCartItems=0;
                        if(isset(session('cart')['product']))
                            $totalCartItems+= count((array) session('cart')['product']);
                        if(isset(session('cart')['category']))
                            $totalCartItems+= count((array) session('cart')['category']);
                    @endphp
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{__('constants.cart')}} <span
                        class="badge badge-pill badge-danger">{{$totalCartItems }}</span>
                </a>
                <div class="dropdown-menu p-2 border-0 rounded-xl shadow-xl mb-1">
                    <div class="row total-header-section p-3 d-flex flex-row justify-content-between">
                        {{-- <div class="">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div> --}}
                        @php $total = 0 @endphp
                        @if(isset(session('cart')['product']))
                            @foreach((array) session('cart')['product'] as $id => $details)
                                @php $total += $details['price'] * $details['qte'] @endphp
                            @endforeach
                        @endif
                        @if(isset(session('cart')['campaign']))
                            @foreach((array) session('cart')['campaign'] as $id => $details)
                                @php $total += $details['price'] * $details['qte'] @endphp
                            @endforeach
                        @endif
                        <div class="total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(isset(session('cart')['product']))
                        @foreach(session('cart')['product'] as $id => $details)
                            <div class="row cart-detail separator">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="/storage/{{ $details['image'] }}" width="60" height="60"/>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product d-flex flex-column">
                                    <p class="mb-0">{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['qte'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if(isset(session('cart')['campaign']))
                        @foreach(session('cart')['campaign'] as $id => $details)
                            <div class="row cart-detail separator">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="/storage/{{ $details['image'] }}" width="60" height="60"/>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product d-flex flex-column">
                                    <p class="mb-0">{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['qte'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        @if($total > 0)
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout mt-3">
                                <a href="{{ route('cart', ['session' => session('cart')]) }}"
                                   class="btn btn-primary rounded-xl btn-block">View all</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--/Cart-->
</div>
<!-- Scripts -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset("js/owl.carousel.min.js") }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> --}}
{{--<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>--}}
{{--<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/all.min.js') }}"></script>--}}
@yield('scripts')

<script src="{{ asset('js/app.js') }}" defer></script>
<script>
    $(document).ready(function () {
        const lang = $('.langs').attr("data-lang");
        console.log('lang', lang);
        let langArray = []
        $('.langs option').each(function () {
            console.log($(this))
            var img = $(this).attr("data-thumbnail");
            var text = this.innerText;
            var value = $(this).val();
            var item = '<li role="button"><img src="' + img + '" alt="" value="' + value + '"/><span>' + text + '</span></li>';
            langArray.push(item);
        })
        if (lang === 'fr')
            $('.ul-lang').html(langArray.reverse());
        else
            $('.ul-lang').html(langArray);

        //Set the button value to the first el of the array
        $('.btn-select').html(langArray[0]);
        $('.btn-select').attr('value', 'en');

        //change button stuff on click
        $('.ul-lang li').click(function () {
            var img = $(this).find('img').attr("src");
            var value = $(this).find('img').attr('value');
            var text = this.innerText;
            var item = '<li><img src="' + img + '" alt="" /><span>' + text + '</span></li>';
            $('.btn-select').html(item);
            $('.btn-select').attr('value', value);
            $(".b").toggle();
            console.log(value);
            var url = "/lang/change";
            window.location.href = url + "?lang=" + value;
        });

        $(".btn-select").click(function () {
            $(".b").toggle();
            $(".b").css("position", "absolute")
            console.log($(".btn-select"))
        });

        //check local storage for the lang
        var sessionLang = localStorage.getItem('lang');
        if (sessionLang) {
            //find an item with value of sessionLang
            var langIndex = langArray.indexOf(sessionLang);
            $('.btn-select').html(langArray[langIndex]);
            $('.btn-select').attr('value', sessionLang);
        } else {
            var langIndex = langArray.indexOf('ch');
            console.log(langIndex);
            $('.btn-select').html(langArray[langIndex]);
            //$('.btn-select').attr('value', 'en');
        }
    });
</script>
</body>
</html>
