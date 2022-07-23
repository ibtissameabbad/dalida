@extends('profile.profile')

@section('details')
<div class="col-md-8 mt-5">
    <h1 class="font-weight-bold mb-4"><b>Shipping Address</b></h1>
    <form method="POST" action="{{ route('shipping') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="d-flex flex-row justify-content-between px-4">
                <h4 class="text-muted">Shipping Address Type :</h4>
                <select class="w-50 form-control rounded-xl" name="type" required>
                    @if(Auth::user()->shippingAddress)
                        <option selected value="{{ Auth::user()->shippingAddress->type }}">{{ Auth::user()->shippingAddress->type }}</option>
                    @else
                        <option class="d-none" selected value="">Select Type</option>
                        <option value="Home">Home</option>
                        <option value="Work">Work</option>
                        <option value="Other">Other</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <div class="col-md-12">
                <label class="text-muted" for="local">Apartment or Villa Name</label>
                @if(Auth::user()->shippingAddress)
                    <input id="local" type="text" name="apartment" value="{{ Auth::user()->shippingAddress->apartment }}" class="form-control rounded-xl h-70">
                @else
                    <input id="local" type="text" name="apartment" value="{{ old('apartment') }}" placeholder="Apartment or Villa Name" class="form-control rounded-xl h-70" required>
                @endif
            </div>
            <div class="col-md-12 my-3">
                <label class="text-muted" for="street">Street Name</label>
                @if(Auth::user()->shippingAddress)
                    <input id="street" type="text" name="street" value="{{ Auth::user()->shippingAddress->street }}" class="form-control rounded-xl h-70">
                @else
                    <input id="street" type="text" name="street" value="{{ old('street') }}" placeholder="Street Name or No." class="form-control rounded-xl h-70" required>
                @endif
            </div>
            <div class="col-md-12">
                <label class="text-muted" for="area">Area</label>
                @if(Auth::user()->shippingAddress)
                    <input id="area" type="text" name="area" value="{{ Auth::user()->shippingAddress->area }}" class="form-control rounded-xl h-70">
                @else
                    <input id="area" type="text" name="area" value="{{ old('area') }}" placeholder="Area" class="form-control rounded-xl h-70" required>
                @endif
            </div>
            <div class="col-md-12 my-3">
                <label class="text-muted" for="city">City</label>
                <select class="form-control rounded-xl h-70" name="city" id="city" required>
                    @if(Auth::user()->shippingAddress)
                        <option selected value="{{ Auth::user()->shippingAddress->city }}">{{ Auth::user()->shippingAddress->city}}</option>
                    @else
                        @foreach (\App\Models\City::all() as $city)
                            <option class="d-none" selected value="">City</option>
                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label class="text-muted" for="country">Country</label>
                <select class="form-control rounded-xl h-70" name="country" id="country" required>
                    @if(Auth::user()->shippingAddress)
                        <option selected value="{{ Auth::user()->shippingAddress->country }}">{{ Auth::user()->shippingAddress->country ?? 'Country' }}</option>
                    @else
                        @foreach (\App\Models\Country::all() as $country)
                            <option class="d-none" selected value="">Country</option>
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            @if(!Auth::user()->shippingAddress)
                <div class="col-md-6">
                    <input type="submit" value="Save Address" class="btn btn-primary w-75 rounded-xl h-70">
                </div>
            @endif
        </div>
        @include('partials.formErrors')
    </form>
</div>
@endsection

