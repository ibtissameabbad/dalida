<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        return view('profile.profile');
    }

    public function details(){
        return view('profile.personal-details');
    }

    public function ipoints(){
        return view('profile.ipoints');
    }

    public function wishlist(){
        return view('profile.wishlist');
    }

    public function payment(){
        return view('profile.payment');
    }

    public function settings(){
        return view('profile.settings');
    }
    public function shippingAddress(){
        return view('profile.shipping-address');
    }
}
