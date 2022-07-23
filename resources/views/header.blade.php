<header>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#main"
                aria-controls="main"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fa-solid fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/">
                <img src="/images/logo.png"/>
            </a>
            <a class="cart-wrapper p-2 p-lg-3 text-uppercase d-flex d-lg-none align-items-center gap-1 btn"
               href="/cart">
                <img class="cart" src="/images/cart.svg" alt="cart"/>
                @php
                    $totalCartItems=0;
                    if(isset(session('cart')['product']))
                        $totalCartItems+= count((array) session('cart')['product']);
                    if(isset(session('cart')['category']))
                        $totalCartItems+= count((array) session('cart')['category']);
                @endphp
                <span class="number">{{$totalCartItems}}</span>
                <div class="lang-select d-block d-sm-none">
                    <button class="btn-select" value=""
                            style="background: #ccc;border: 0;color: #000;  border: 1px solid #fff;"></button>
                    <div class="b">
                        <ul id="a" class="ul-lang" style="background: #ccc;color: #000;"></ul>
                    </div>
                </div>
            </a>
            <div class="collapse navbar-collapse" id="main">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 active text-capitalize" aria-current="page"
                           href="/home">{{ __('constants.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 text-capitalize"
                           href="/our-history">{{ __('constants.ourHistory') }}</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link p-2 p-lg-3 text-capitalize d-flex align-items-center gap-2"
                           href="/home#gammes">
                            <span>{{ __('constants.ourProducts') }}</span>
                            <img src="/images/arrow_down.svg" alt="down"/>
                        </a>
                    </li>
                    <li class="nav-item contact-us">
                        <a class="nav-link p-2 p-lg-3 text-uppercase d-flex align-items-center gap-2" href="/contact">
                            <span>{{ __('constants.contactUs') }}</span>
                            <!-- <img src="/images/send.svg" alt="down"/> -->
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-flex">
                        <a class="cart-wrapper nav-link p-2 p-lg-3 text-uppercase d-flex align-items-center gap-2"
                           href="/cart">
                            <img class="cart" src="/images/cart.svg" alt="cart"/>
                            <span class="number">{{$totalCartItems}}</span>
                        </a>
                    </li>
                    <li>
                        <select class="changeLang langs d-none"
                                data-lang="{{\Illuminate\Support\Facades\App::getLocale()}}">
                            <option value="en"
                                    data-thumbnail="https://flagpedia.net/data/flags/icon/36x27/us.png"
                                    data-check
                                    {{ \Illuminate\Support\Facades\App::getLocale() == 'en' ? 'selected' : '' }} style="background-image:url(https://flagpedia.net/data/flags/icon/36x27/us.png);">
                                EN
                            </option>
                            <option value="fr"
                                    data-thumbnail="https://flagpedia.net/data/flags/icon/36x27/fr.png"
                                {{ \Illuminate\Support\Facades\App::getLocale() == 'fr' ? 'selected' : '' }}>FR
                            </option>
                        </select>
                        <div class="lang-select">
                            <button class="btn-select" value=""
                                    style="background: #ccc;border: 0;color: #000;  border: 1px solid #fff;"></button>
                            <div class="b">
                                <ul id="a" class="ul-lang" style="background: #ccc;color: #000;"></ul>
                            </div>
                        </div>
                    </li>
                </ul>
                {{--                <div class="search ps-3 pe-3 d-none d-lg-block">--}}
                {{--                    <i class="fa-solid fa-magnifying-glass"></i>--}}
                {{--                </div>--}}
                {{--                <a class="btn rounded-pill main-btn" href="#">Login</a>--}}
                {{--                @guest--}}
                {{--                    @if (Route::has('login'))--}}
                {{--                        <a class="nav-link text-dark font-weight-bold border-right small"--}}
                {{--                           href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                {{--                    @endif--}}

                {{--                    @if (Route::has('register'))--}}
                {{--                        <a class="nav-link text-dark font-weight-bold small"--}}
                {{--                           href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                {{--                    @endif--}}
                {{--                @else--}}
                {{--                    <a id="navbarDropdown"--}}
                {{--                       class=" text-decoration-none d-flex flex-row justify-content-between align-items-center"--}}
                {{--                       href="/profile/details">--}}
                {{--                        <span class="mr-3 text-dark font-weight-bold">{{ Auth::user()->firstname }}</span>--}}
                {{--                        @if(Auth::user()->image)--}}
                {{--                            <img class="img-fluid flex-end rounded-circle w-10"--}}
                {{--                                 src="/storage/{{ Auth::user()->image }}" alt="">--}}
                {{--                        @else--}}
                {{--                            <img class="img-fluid flex-end rounded-circle w-10" src="/storage/images/avatar.png"--}}
                {{--                                 alt="">--}}
                {{--                        @endif--}}
                {{--                    </a>--}}

                {{--                    --}}{{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                {{--                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
                {{--                        onclick="event.preventDefault();--}}
                {{--                                        document.getElementById('logout-form').submit();">--}}
                {{--                            {{ __('Logout') }}--}}
                {{--                        </a>--}}

                {{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
                {{--                            @csrf--}}
                {{--                        </form>--}}
                {{--                    </div> --}}
                {{--                @endguest--}}
            </div>
        </div>
    </nav>
</header>
