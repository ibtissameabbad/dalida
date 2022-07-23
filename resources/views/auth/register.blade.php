@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center m-5">
        <div class="col-md-7">
            <div class="card rounded-xl border-0 shadow-lg p-4">
                <h2 class="font-weight-bold m-4"><b>New here? Register now</b></h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('storeUser') }}">
                        @csrf
                        <div class="form-group">
                            <input id="firstname" type="text" placeholder="First Name" class="form-control rounded-xl h-50 @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="lastname" type="text" placeholder="Last Name" class="form-control rounded-xl h-50 @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" name="lastname" required autocomplete="lastname">
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center mb-3">
                            <input class="w-h-33" type="radio" name="radio" value="male"><span class="ml-1">Male</span>
                            <input class="w-h-33 ml-4" type="radio" name="radio" value="female"><span class="ml-1">Female</span>
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" placeholder="Email Address" class="form-control rounded-xl h-50 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" placeholder="Password" class="form-control rounded-xl h-50 @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <input id="password" type="password" placeholder="Confirm Password" class="form-control rounded-xl h-50 @error('password') is-invalid @enderror" name="confirmPassword" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <input id="phone" type="text" placeholder="Mobile Phone" class="form-control rounded-xl h-50 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <select class="form-control rounded-xl h-50" name="country" value="{{ old('country') }}" id="" required>
                            @foreach (\App\Models\Country::all() as $country)
                                <option class="d-none" selected value="">Country</option>
                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-group mt-3">
                            <input id="invitation_code" type="text" placeholder="Invitation Code (Optional)" class="form-control rounded-xl h-50 @error('invitation_code') is-invalid @enderror" name="invitation_code" autocomplete="invitation_code">
                            @error('invitation_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary rounded-xl h-50 w-50">
                                {{ __('Register') }}
                            </button>
                        </div>
                        @include('partials.formErrors')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
