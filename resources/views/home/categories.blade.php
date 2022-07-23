<section class="best-sellers text-center mt-5">
    <div class="container">
        <h1 class="title d-none d-xl-block title mb-3 text-center position-relative ">{{ __('constants.categoryCollectionTitle') }}</h1>
    </div>
    <h1 class="title d-xl-none title mb-3 text-center position-relative">{{ __('constants.categoryCollectionTitle') }}</h1>
    <p class="text-center">{{ __('constants.categoryCollectionText') }}</p>
    <div class="container">
        {{-- <h1 class="mb-2">NOS BEST-SELLERS</h1> --}}
        {{-- <p>Découvrez nos soins les plus appréciés.</p> --}}
        <div class="row best-seller">
            <div class="col-6 col-lg-3 mb-3">
                <div class="category p-3">
                    <div class="position-relative">
                        <img class="img-fluid mb-3 product-img" src="/images/principle-1.jpg"/>
                        <a class="btn position-absolute" href="{{ url('/category/' . $categoriesAsc[0]->id) }}"
                           title="Acheter maintenent">
                            <img class="img-fluid" src="/images/right-arrow.svg"/>
                        </a>
                    </div>
                    @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($categoriesAsc[0]->name_en))
                        <span class="text-uppercase mb-3">Pack Corps Oriental touch</span>
                    @else
                        <span class="text-uppercase mb-3">{{$categoriesAsc[0]->name_en}}</span>
                    @endif
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-3">
                <div class="category p-3">
                    <div class="position-relative">
                        <img class="img-fluid mb-3 product-img" src="/images/principle-2.jpg"/>
                        <a class="btn position-absolute" href="{{ url('/category/' . $categoriesAsc[1]->id) }}"
                           title="Acheter maintenent">
                            <img class="img-fluid" src="/images/right-arrow.svg"/>
                        </a>
                    </div>
                    @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($categoriesAsc[1]->name_en))
                        <span class="text-uppercase mb-3">Routine soin femme enceinte</span>
                    @else
                        <span class="text-uppercase mb-3">{{$categoriesAsc[1]->name_en}}</span>
                    @endif
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-3">
                <div class="category p-3">
                    <div class="position-relative">
                        <img class="img-fluid mb-3 product-img" src="/images/principle-3.jpg"/>
                        <a class="btn position-absolute" href="{{ url('/category/' . $categoriesAsc[2]->id) }}"
                           title="Acheter maintenent">
                            <img class="img-fluid" src="/images/right-arrow.svg"/>
                        </a>
                    </div>
                    @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($categoriesAsc[2]->name_en))
                        <span class="text-uppercase mb-3">Pack total lifting</span>
                    @else
                        <span class="text-uppercase mb-3">{{$categoriesAsc[2]->name_en}}</span>
                    @endif
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-3">
                <div class="category p-3">
                    <div class="position-relative">
                        <img class="img-fluid mb-3 product-img" src="/images/principle-4.jpg"/>
                        <a class="btn position-absolute" href="{{ url('/category/' . $categoriesAsc[3]->id) }}"
                           title="Acheter maintenent">
                            <img class="img-fluid" src="/images/right-arrow.svg"/>
                        </a>
                    </div>
                    @if(\Illuminate\Support\Facades\App::getLocale() === 'fr' || empty($categoriesAsc[3]->name_en))
                        <span class="text-uppercase mb-3">Duo soin lèvres</span>
                    @else
                        <span class="text-uppercase mb-3">{{$categoriesAsc[3]->name_en}}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
