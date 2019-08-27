<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Credit;
use App\Receipt;
use App\Notif;

class CreditsController extends Controller
{
    public function show_credits(Request $request)
    {
				$credits = auth()->user()->credits;

				$pending = Credit::where('user_id', auth()->user()->id)
													->where('status', false)
													->first();

				return view('credits.credits',compact('credits', 'pending'));	
    }

    public function post_credits(Request $request)
    {		
				$validate = $request->validate([
					'credits' => 'required|numeric|gt:300',
				]);
				
				// ALREADY EXITS JUST UPDATE
				if(Credit::where('user_id', auth()->user()->id)->first())
				{
					$update = auth()->user()->credits()
												->where('status', 0)
												->update([
														'credits' => $request->credits,
														'date' => now()
												]);					
				}else{

						// SAVE TO DB
						$credits = Credit::create([
								'user_id' => auth()->user()->id,
								'credits' => $request->credits,
								'date' => now()
						]);
				}

	
			return redirect()->route('show.credits')->with('success', 'Bank Transfer and upload your receipts to validate');

    }

    public function show_receipt()
		{
				return view('credits.upload-receipt');
		}

    public function post_receipt()
    {   
		    // return dd(request()->all());
				$validate = request()->validate([
					'transaction_number' => 'required|numeric',
					'image' => 'required|image|max:1999'
				]);

				$latest = auth()->user()->credits()
											->latest()
											->update([
												'image' => request()->image->store('receipts', 'public'),
												'transaction_number' => request()->transaction_number,
												'date' => now()
										]);

				// SEND NOTIF TO BACKEND
        Notif::create([
            'notif_title' => 'Credit Request',
            'notif_desc' => request()->transaction_number
        ]);

				return redirect()->route('show.credits')->with('success','Please wait till we validate your receipt uploaded');
    }

}
