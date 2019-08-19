<?php

namespace App\Http\Controllers;

use App\Friend;
use Auth;
use Illuminate\Http\Request;

class FriendController extends Controller
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
        // validate

        // store in database
        $friend = Friend::create([
            'user_id' => auth()->user()->id,
            'friend_id' => $request->friend_id
        ]);

        return redirect()->back()->wuth('success', 'Friend has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
