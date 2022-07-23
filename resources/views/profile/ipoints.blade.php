@extends('profile.profile')

@section('details')
<div class="col-md-8 mt-5">
    <h1 class="font-weight-bold">iPoints</h1>
    <div>
        <div class="card rounded-xl p-3 shadow-lg border-0 d-flex flex-row justify-content-between">
            <div class="d-flex flex-column align-items-start">
                <span>Your available iPoints </span>
                <h1><b>0</b></h1>
            </div>
            <div class="d-flex flex-column align-items-end">
                <span class="text-muted small">Cash Value in  </span>
                <h1 class="text-muted"><b>AED0.00</b></h1>
            </div>
        </div>
        <div class="card rounded-xl shadow-lg border-0 mt-4 p-3">
            <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="">
                <span class="ml-2 mt-2">Earned through purchases</span>
                <span class=""><b>0</b></span>
            </a>
            <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="">
                <span class="ml-2 mt-2">Earned through referrals</span>
                <span class=""><b>0</b></span>
            </a>
            <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="">
                <span class="ml-2 mt-2 text-success">Total Earned</span>
                <span class="text-success"><b>0</b></span>
            </a>
            <a class="btn separator d-flex flex-row justify-content-between align-items-center p-3" href="">
                <span class="ml-2 mt-2 text-danger">Total Spent</span>
                <span class="text-danger"><b>0</b></span>
            </a>
            <a class="btn d-flex flex-row justify-content-between align-items-center p-3" href="">
                <span class="ml-2 mt-2">Your available iPoints</span>
                <span class=""><b>0</b></span>
            </a>
        </div>
    </div>
</div>
@endsection

