@extends('profile.profile')

@section('details')
<div class="col-md-8 mt-5">
    <h1 class="font-weight-bold mb-4"><b>Settings</b></h1>
    <div>
        <div class="col-md-8">
            <label for="currency" class="form-control-label text-muted small">Currency</label>
            <select class="form-control rounded-xl h-70" name="currency" id="currency">
                <option selected value="">Please select</option>
                <option value="">AED - United Arab Emirates Dirham</option>
                <option value="">AED - United Arab Emirates Dirham</option>
                <option value="">USD - US Dollar</option>
                <option value="">MAD - Morocco Dirham</option>
            </select>
        </div>
        <div class="col-md-8 mt-2">
            <label for="language" class="form-control-label text-muted small">Language</label>
            <select class="form-control rounded-xl h-70" name="language" id="language">
                <option selected value="">English</option>
                <option value="">العربية</option>
            </select>
        </div>
    </div>
    <h1 class="font-weight-bold mt-5 mb-4"><b>Change Password</b></h1>
    <form method="POST" action="{{ route('updatePassword', ['user' => Auth::user()->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-8">
            <label for="password" class="form-control-label text-muted small">Current Password</label>
            <input id="password" type="password" value="{{ Auth::user()->password }}" class="form-control rounded-xl h-70">
        </div>
        <div class="col-md-8 my-3">
            <input id="newPassword" name="newPassword" type="password" placeholder="New Password" value="" class="form-control rounded-xl h-70">
        </div>
        <div class="col-md-8 mb-3">
            <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm New Password" value="" class="form-control rounded-xl h-70">
        </div>
        <div class="col-md-6">
            <input type="submit" value="Update Changes" class="btn btn-primary w-75 rounded-xl h-70">
        </div>
    </form>
</div>
@endsection

