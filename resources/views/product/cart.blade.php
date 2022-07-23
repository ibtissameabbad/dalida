@extends('layouts.app')
@section('content')
    <section class="cart-page">
        <main class="welcome py-4 mt-5">
            <div class="container d-flex flex-column">
                <h2 class="font-weight-bold">{{ __('constants.yourCart') }}</h2>
                <table id="cart" class="table table-striped border mt-4">
                    <thead>
                    <tr class="bg-grey">
                        <th style="width:50%">{{ __('constants.product') }}</th>
                        <th style="width:10%">{{ __('constants.price') }}</th>
                        <th style="width:8%">{{ __('constants.quantity') }}</th>
                        <th style="width:22%" class="text-center">{{ __('constants.total') }}</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @if(isset(session('cart')['product']))
                            @foreach(session('cart')['product'] as $id => $details)
                                @php $total += $details['price'] * $details['qte'] @endphp
                                <tr data-id="{{ $id }}">
                                    <td class="border-top-0" data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}"
                                                                                 width="100"
                                                                                 height="100" class="img-responsive "
                                                                                 style="object-fit: contain"/></div>
                                            <div class="col-sm-9 py-4">
                                                <h4 class="mt-1">{{ $details['name'] }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-top-0 py-5"
                                        data-th="Price">{{request()->currencySign}}{{ $details['price'] }}</td>
                                    <td class="border-top-0 py-4" data-th="Quantity">
                                        {{--                                        <input type="number"--}}
                                        {{--                                               value="{{ $details['qte'] }}"--}}
                                        {{--                                               class="form-control quantity update-cart mt-3" />--}}
                                        <cart-quantity-count :id="{{$details['id']}}"
                                                             :qte="{{$details['qte']}}"></cart-quantity-count>
                                    </td>
                                    <td class="border-top-0 text-center py-5" data-th="Subtotal">
                                        {{request()->currencySign}}{{ $details['price'] * $details['qte'] }}</td>
                                    <td class="border-top-0 py-4" class="actions" data-th="">
                                        <button class="btn btn-sm remove-from-cart mt-3">
                                            <i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        @if(isset(session('cart')['category']))
                            @foreach(session('cart')['category'] as $id => $details)
                                @php $total += $details['price'] * $details['qte'] @endphp
                                <tr data-id="{{ $id }}">
                                    <td class="border-top-0" data-th="Campaign">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}"
                                                                                 width="100" height="100"
                                                                                 class="img-responsive"/></div>
                                            <div class="col-sm-9 py-4">
                                                <h4 class="mt-1 text-uppercase">gamme {{ $details['name'] }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-top-0 py-5"
                                        data-th="Price">{{request()->currencySign}}{{ $details['price'] }}</td>
                                    <td class="border-top-0 py-4" data-th="Quantity">
                                        <cart-category-quantity-count :id="{{$details['id']}}"
                                                                      :qte="{{$details['qte']}}"></cart-category-quantity-count>
                                    </td>
                                    <td class="border-top-0 text-center py-5"
                                        data-th="Subtotal">{{request()->currencySign}}{{ $details['price'] * $details['qte'] }}</td>
                                    <td class="border-top-0 py-4" class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-category-cart mt-3">
                                            <i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                    </tbody>
                </table>
                <div class="card bg-light d-flex align-items-end h-70">
                    <h3 class="m-3">{{__('constants.total')}}: {{request()->currencySign}}{{ $total }}</h3>
                </div>
                <div class="d-flex flex-row justify-content-between my-3">
                    <a href="{{ url('/') }}" class="text-white font-weight-bold text-decoration-none btn btn-primary"><i
                            class="fas fa-arrow-left"></i> {{__('constants.continueYourPurchases')}}</a>
                    @if($total > 0)
                        <a href="{{ route('checkout', ['total' => $total, 'session' => session('cart')]) }}"
                           class="text-white cursor-pointer font-weight-bold btn btn-primary ">
                            {{__('constants.order')}} <i class="fa fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </main>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".update-cart").change(function (e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: '{{ route('update.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".qte").val()
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });

            $(".remove-from-cart").click(function (e) {
                e.preventDefault();

                var ele = $(this);

                if (confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove.from.cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
            $(".remove-from-category-cart").click(function (e) {
                e.preventDefault();

                var ele = $(this);

                if (confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove.from.category.cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
