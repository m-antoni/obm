<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterDebitCard;
use App\Notif;

class MasterDebitCardController extends Controller
{
    public function index()
    {		
    		return view('card.index');
    }

    public function store()
    {		
  
				$validate = request()->validate([
					'first_id' => 'required|image|max:1999',
					'second_id' => 'required|image|max:1999',
					'selfie' => 'required|image|max:1999',
				]);

				// $exists = MasterDebitCard::where('user_id', auth()->user()->id)
				// 													->where('status', false)
				// 													->first();
				if(auth()->user()->card){
						// USER ALREADY HAVE CREDENTIALS
						return redirect()->route('card.register')->with('error', 'Credientials already exists.');

				}else{

						// save to database
						$credits = MasterDebitCard::create([
								'user_id' => auth()->user()->id,
								'first_id' => request()->first_id->store('first', 'public'),
								'second_id' => request()->second_id->store('second', 'public'),
								'selfie' => request()->selfie->store('selfie', 'public'),
						]);

						// SEND NOTIF TO BACKEND
		        Notif::create([
		            'notif_title' => 'One Beem Master Debit Card',
		            'notif_desc' => 'Uploaded two valid IDs and one selfie'
		        ]);
				}									

				return redirect()->route('card.register')->with('success', 'Please wait till we validate your credentials');	
    }
}
