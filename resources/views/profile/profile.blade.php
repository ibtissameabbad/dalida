@extends('layouts.app')

@section('style')
    <style>
        .animation {
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        }

        .image {
        display: block;
        width: 100%;
        height: auto;
        }

        .overlay {
        position: absolute;
        background-color: #2e2d2d;
        overflow: hidden;
        width: 100%;
        bottom: 0;
        height: auto;
        transition: .5s ease;
        }

        .animation:hover .overlay {
            height: 90%;
        }

        .text {
        color: white;
        font-size: 15px;
        left: 95%;
        position: absolute;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
        }
        .wish:hover{
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%) !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        @if (Session::has('status'))
            <div class="alert alert-success mt-3 rounded-xl" role="alert">
                    <p>{{ Session::get('status') }}</p>
            </div>
        @endif
        @if (Session::has('danger'))
            <div class="alert alert-danger mt-3 rounded-xl" role="alert">
                    <p>{{ Session::get('danger') }}</p>
            </div>
        @endif
        <div class="row">
            <aside class="col-md-4 p-0">
                <!-- Avatar-->
                <div class="card bg-blue flex-column align-items-center border-0 rounded-xl shadow-lg mt-3 mb-2">
                    <div class="animation">
                        @if(Auth::user()->image)
                            <img id="avatar"  class="image img-fluid rounded-circle w-50 mt-4" src="/storage/{{ Auth::user()->image }}" alt="">
                        @else
                            <img id="avatar"  class="image img-fluid rounded-circle w-50 mt-4" src="/storage/images/avatar.png" alt="">
                        @endif
                        <div class="overlay rounded-circle w-50 d-flex align-items-center">
                            <form method="POST" action="{{ route('updateImage', ['user' => Auth::user()->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input class="text" onChange="this.form.submit()" type="file" name="image">
                            </form>
                        </div>
                    </div>
                    <h4 class="font-weight-bold"><b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</b></h4>
                    <h6>{{ Auth::user()->email }}</h6>
                    <ul class="level-marker mx-2">
                        <li class="blue">
                            <span class="marker"></span>
                            <span class="level-label">Blue</span>
                        </li>
                        <li class="silver">
                            <span class="marker"></span>
                            <span class="level-label">Silver</span>
                        </li>
                        <li class="gold">
                            <span class="marker"></span>
                            <span class="level-label">Gold</span>
                        </li>
                        <li class="platinum">
                            <span class="marker"></span>
                            <span class="level-label">Platinum</span>
                        </li>
                    </ul>
                </div>
                <!-- /Avatar-->
                <!-- Level-->
                <div class="card border-0 rounded-xl shadow-lg mt-3 mb-2">
                    <div class="card-header bg-white rounded-pill d-flex flex-row justify-content-between">
                        <div class="d-flex flex-column">
                            <span><b><span class="text-primary">Blue</span> Member</b></span>
                            <span class="small text-muted">Expiring in 363 days</span>
                        </div>
                        <div class="d-flex flex-column w-50 align-items-end border rounded-xl">
                            <span class="font-weight-bold mx-2">AED0.00</span>
                            <span class="small text-muted mx-2">Your available iPoints</span>
                        </div>
                    </div>
                    <div class="card-body p-3 d-flex flex-column justify-content-start">
                        <h6 class="font-weight-bold ml-3">Benefits</h6>
                        <ul>
                            <li class="text-muted small">Get back 1% of your purchase in iPoints for a 12 months trailing period.</li>
                        </ul>
                        <div class="progress mb-2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p>Purchase for <b>AED20,000</b> more to reach <b>Silver Level</b></p>
                    </div>
                </div>
                <!-- /Level-->
                <!-- Menu List-->
                <div class="card border-0 rounded-xl shadow-lg py-2 mt-3 mb-2">
                        <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="{{ route('details') }}">
                            <div class="align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                                <span class="ml-2 mt-2">Personal Details</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                            </svg>
                        </a>
                        <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="{{ route('ipoints') }}">
                            <div class="align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-currency-dollar border rounded-circle" viewBox="0 0 16 16">
                                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                                </svg>
                                <span class="ml-2 mt-2">iPoints</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                            </svg>
                        </a>
                        <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="{{ route('wishlist') }}">
                            <div class="align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                    <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                                </svg>
                                <span class="ml-2 mt-2">Wishlist</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                            </svg>
                        </a>
                        <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="{{ route('payment') }}">
                            <div class="align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                    <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                                </svg>
                                <span class="ml-2 mt-2">Payment options</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                            </svg>
                        </a>
                        <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="{{ route('settings') }}">
                            <div class="align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                </svg>
                                <span class="ml-2 mt-2">Settings</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                            </svg>
                        </a>
                        <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="{{ route('shipping-address') }}">
                            <div class="align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                                <span class="ml-2 mt-2">Shipping Address</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                            </svg>
                        </a>
                        @if(Auth::user()->is_admin)
                            <a class="btn bg-success text-white d-flex flex-row justify-content-between align-items-center p-3" href="{{ route('dashboard') }}">
                                <div class="align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                    </svg>
                                    <span class="ml-2 mt-2">Admin Dashboard</span>
                                </div>
                            </a>
                        @endif
                        <a class="btn d-flex flex-row justify-content-between align-items-center p-3" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <div class="align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                                <span class="ml-2 mt-2">{{ __('Logout') }}</span>
                            </div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
                <!-- /Menu List-->
            </aside>
            <!-- Content-->
            @yield('details')
            <!-- /Content-->
        </div>
    </div>
@endsection

