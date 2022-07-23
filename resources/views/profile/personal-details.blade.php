@extends('profile.profile')

@section('details')
    <div class="col-md-8 mt-5">
        <h1 class="font-weight-bold">Personal Details</h1>
        <div>
            <form class="d-flex flex-row flex-wrap" method="POST" action="{{ route('update', ['user' => Auth::user()->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="col-md-6 mt-3">
                    <label for="firstname" class="form-control-label text-muted small">First Name</label>
                    <input id="firstname" name="firstname" type="text" value="{{ Auth::user()->firstname }}" class="form-control rounded-xl h-70">
                </div>
                <div class="col-md-6 mt-3"><label for="lastname" class="form-control-label text-muted small">Last Name</label><input id="lastname" name="lastname" type="text" value="{{ Auth::user()->lastname }}" class="form-control rounded-xl h-70"></div>
                <div class="col-md-6 mt-3"><label for="email" class="form-control-label text-muted small">Email</label><input id="email" type="email" name="email" value="{{ Auth::user()->email }}" class="form-control rounded-xl h-70" disabled></div>
                <div class="col-md-6 mt-3"><label for="tel" class="form-control-label text-muted small">Phone</label><input id="tel" type="tel" name="phone" value="{{ Auth::user()->phone }}" placeholder="Phone" class="form-control rounded-xl h-70"></div>
                <div class="col-md-12 mt-3">
                    <label for="country" class="form-control-label text-muted small">Country</label>
                    <select class="form-control rounded-xl h-70" name="country" id="">
                        <option selected value="{{ Auth::user()->country }}">{{ Auth::user()->country }}</option>
                        @foreach (\App\Models\Country::all() as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex flex-column my-4 mx-3 align-items-center">
                    <div class="d-flex flex-row align-items-center mb-3">
                        @if(Auth::user()->gender == 'Male')
                            <input class="w-h-33" type="radio" name="radio" value="Male"  checked><span class="ml-1">Male</span>
                            <input class="w-h-33 ml-4" type="radio" name="radio" value="Female" ><span class="ml-1">Female</span>
                        @else
                            <input class="w-h-33" type="radio" name="radio" value="Male"><span class="ml-1">Male</span>
                            <input class="w-h-33 ml-4" type="radio" name="radio" value="Female" checked><span class="ml-1">Female</span>
                        @endif
                    </div>
                    <button class="btn btn-primary rounded-xl h-70 w-100">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
