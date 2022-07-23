<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            @php $i=0; @endphp
            @foreach ($slides as $slide)
                @if ($i == 0)
                    <div class="carousel-item active position-relative">
                        <img src="{{ '/images/slider1-mobile.png' }}" class="d-block d-lg-none w-100" alt="...">
                        <img src="{{ url($slide->image) }}" class="d-none d-lg-block w-100" alt="...">
                        <div class="container d-block d-md-none">
                            <div class="description w-lg-75 flex flex-column gap-2 text-center">
                                <h1 class="text-black">{{ $tr->translate($slide->title) }}</h1>
                                <p class="mb-lg-4 p-2">{{ $tr->translate($slide->description) }}</p>
                                {{-- <img src="/images/snail.png" alt="bave" class="img-fluid snail d-block "/> --}}
                                <a href="{{ '/category/' . $slide->product->id }}"
                                   class="btn border-0 px-1 py-1 px-lg-2 py-lg-2 px-xg-5 py-xg-4 ">
                                    <span>{{__('constants.BuyNow')}}</span>
                                    <img src="/images/buy-now.svg" alt="Achetez maintenent" class="buy-now"/>
                                </a>
                            </div>
                        </div>
                        <div class="d-none d-md-block description w-lg-75 flex flex-column gap-2">
                            <h1 class="text-black">{{ $tr->translate($slide->title) }}</h1>
                            <p class="mb-lg-4 p-2">{{ $tr->translate($slide->description) }}</p>
                            <a href="{{ '/category/' . $slide->product->id }}"
                               class="btn border-0 px-1 py-1 px-lg-2 py-lg-2 px-xg-5 py-xg-4 ">
                                <span>{{__('constants.BuyNow')}}</span>
                                <img src="/images/buy-now.svg" alt="Achetez maintenent" class="buy-now"/>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="carousel-item position-relative">
                        <img src="{{ '/images/slider2-mobile.png' }}" class="d-block d-lg-none w-100" alt="...">
                        <img src="{{ url($slide->image) }}" class="d-none d-lg-block w-100" alt="...">
                        <div class="container d-block d-md-none">
                            <div class="description w-lg-75 flex flex-column gap-2 text-center">
                                <h1 class="text-black">{{ $tr->translate($slide->title) }}</h1>
                                <p class="mb-lg-4 p-2">{{ $tr->translate($slide->description) }}</p>
                                <a href="{{ '/category/' . $slide->product->id }}"
                                   class="btn border-0 px-1 py-1 px-lg-2 py-lg-2 px-xg-5 py-xg-4 ">
                                    <span>{{__('constants.BuyNow')}}</span>
                                    <img src="/images/buy-now.svg" alt="Achetez maintenent" class="buy-now"/>
                                </a>
                            </div>
                        </div>
                        <div class="d-none d-md-block description w-lg-75 flex flex-column gap-2">
                            <h1 class="text-black">{{ $tr->translate($slide->title) }}</h1>
                            <p class="mb-lg-4 p-2">{{ $tr->translate($slide->description) }}</p>
                            <a href="{{ '/category/' . $slide->product->id }}"
                               class="btn border-0 px-1 py-1 px-lg-2 py-lg-2 px-xg-5 py-xg-4 ">
                                <span>{{__('constants.BuyNow')}}</span>
                                <img src="/images/buy-now.svg" alt="Achetez maintenent" class="buy-now"/>
                            </a>
                        </div>
                    </div>
                @endif
                @php $i++; @endphp
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- <div class="slide-lg">
        @foreach ($slides as $slide)
            @if ($i == 0)
                <div class="d-flex d-lg-none  description w-lg-75 flex flex-column gap-2">
                    <h1 class="text-black">{{ $slide->title }}</h1>
                    <p class="mb-lg-4 p-2">{{ $slide->description }}</p>
                    <a href="{{ '/category/' . $slide->product->id }}"
                        class="btn border-0 px-1 py-1 px-lg-2 py-lg-2 px-xg-5 py-xg-4 ">
                        <span>Achetez
                            maintenant</span>
                        <img src="/images/buy-now.svg" alt="Achetez maintenent" />
                    </a>
                </div>
            @else
                <div class="d-flex d-lg-none  description w-lg-75 flex flex-column gap-2">
                    <h1 class="text-black">{{ $slide->title }}</h1>
                    <p class="mb-lg-4 p-2">{{ $slide->description }}</p>
                    <a href="{{ '/category/' . $slide->product->id }}"
                        class="btn border-0 px-1 py-1 px-lg-2 py-lg-2 px-xg-5 py-xg-4 ">
                        <span>Achetez
                            maintenant</span>
                        <img src="/images/buy-now.svg" alt="Achetez maintenent" />
                    </a>
                </div>
            @endif
            @php $i++; @endphp
        @endforeach
    </div> --}}
</section>
