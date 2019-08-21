<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class ClientsAreaController extends Controller
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
						'image' => request()->image->store('uploads', 'public')
				]);

				return redirect()->route('user.profile');
    		}
    		
    }
}
