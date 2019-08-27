<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\ReferralLink;
use Session;

class ClientsController extends Controller
{
    public function index()
    {
    	return view('profile.index');
    }

    public function user_profile()
    {   
        $users = User::where('id', '!=', auth()->user()->id)
                        ->orderBy('created_at', 'DESC')
                        ->paginate(8);

    	return view('profile.user-profile', compact('users'));
    }

    public function upload_image()
    {
		$validate = request()->validate([
			'image' => 'image|max:1999'
		]);

		if(request()->has('image')){
				
			$user = DB::table('users')->where('id', auth()->user()->id);

			$user->update([
				'image' => request()->image->store('profile', 'public')
			]);
		}
    	
        return redirect()->back();
    }

    public function referral_send(Request $request)
    {
        // return dd($request->all());

        $validate = $request->validate([
            'email' => 'required|email',
        ]);     

        $link = request()->root() .'/register/'. auth()->user()->referral_key;

        // Send an email
        Mail::to($request->email)->send(new ReferralLink($link));

        Session::flash('success', 'Referral link has been sent to your friend\'s email');

        return redirect()->route('home');
    }
}
