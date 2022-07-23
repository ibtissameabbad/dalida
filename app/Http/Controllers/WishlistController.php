<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        // dd($wishlists);
        return view('profile.wishlist', [
            'wishlists' => $wishlists
        ]);
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
        // dd(request()->get('id'));
        // $this->validate(request(), [
        //     'user_id'=>'required',
        //     'campaign_id' =>'required',
        // ]);

        $id = request()->get('id');

        $status = Wishlist::where('user_id', Auth::user()->id)
            ->where('campaign_id',$id)
            ->first();

        if(isset($status->user_id) and isset($id))
        {
            return redirect()->back()->with('warning', 'This Campaign is already in your
            wishlist!');
        }
        else
        {
            $wishlist = new Wishlist();
            $wishlist->campaign_id = $id;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();

            // return redirect()->back()->with('success', 'Element added to cart successfully!');

            return redirect()->back()->with(
                'success',
                'Campaign, '. $wishlist->campaign->name.' Added to your wishlist.'
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->back()->with(
            'success',
            'Campaign, '. $wishlist->campaign->name.' Removed from your wishlist.'
        );
    }
}
