<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone' => 'required',
            'country' => 'required',
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;

        if($request['radio'] == 'male'){
            $user->gender = 'Male' ;
        }
        elseif ($request['radio'] == 'female')   {
            $user->gender = 'Female' ;
        }

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->image = 'images/avatar.png';
        $user->save();

        return redirect('/login');
    }

    public function updatePassword(Request $request,$id)
    {
        $this->validate(request(), [
            'newPassword' => 'required',
            'confirmPassword' => 'required',
        ]);

        $confirm = $request->confirmPassword;
        $new = $request->newPassword;

        $user = User::findOrFail($id);
        if ($new == $confirm) {
            $user->password = Hash::make(request('newPassword'));
            $user->save();
            return redirect('/profile/settings')->with('status','Password changed successfully');
        }
        else {
            return redirect('/profile/settings')->with('danger','New Password and Confirm Password not equal !');
        }
    }

    public function updateImage(Request $request,$id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            $user->image = $request->file('image')->store('images', 'public');
            $user->save();
            return redirect('/profile/details')->with('status','Image changed successfully');
        }
        else {
            return redirect('/profile/settings')->with('danger','New Password and Confirm Password not equal !');
        }
    }

    public function storeShipping(Request $request)
    {
        $this->validate(request(), [
            'type' => 'required',
            'apartment' => 'required',
            'street' => 'required',
            'area' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $address = new ShippingAddress();

        $address->type = $request->type;
        $address->apartment = $request->apartment;
        $address->street = $request->street;
        $address->area = $request->area;
        $address->city = $request->city;
        $address->country = $request->country;
        $address->user_id = Auth::user()->id;
        $address->save();
        return redirect('/profile/shipping-address')->with('status','Address saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'country' => 'required',
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        if($request['radio'] == 'male'){
            $user->gender = 'Male' ;
        }
        elseif ($request['radio'] == 'female')   {
            $user->gender = 'Female' ;
        }

        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->save();
        return redirect('/profile/details')->with('status','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
