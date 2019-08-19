<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Credit;
use App\Receipt;

class CreditsController extends Controller
{
    public function show_credits(Request $request)
    {
				$credits = auth()->user()->credits;

				$pending = Credit::where('user_id', auth()->user()->id)
																->select('credits')->first();

				$list = [
					100, 200, 500, 1000, 1500, 2500, 3000 ,4000, 5000, 6000, 7000, 8000, 9000, 10000, 15000, 20000,
				];

				return view('credits.credits',compact('credits', 'pending', 'list'));	
    }

    public function post_credits(Request $request)
    {		
			$validate = $request->validate([
				'credits' => 'required|numeric',
			]);
			
			$credits = Credit::create([
				'user_id' => auth()->user()->id,
				'credits' => $request->credits,
				'date' => now()
			]);
					
			Session::flash('success', 'Bank Transfer and upload your receipts to validate');
					
			return redirect()->route('show.credits');
    }

    public function show_receipt()
		{
				return view('credits.upload-receipt');
		}

    public function post_receipt()
    {   
		    // return dd(request()->all());
				$validate = request()->validate([
					'transactionNumber' => 'required|numeric',
					'image' => 'required|image|max:1999'
				]);

				// save to database
				$credits = Receipt::create([
						'user_id' => auth()->user()->id,
						'image' => request()->image->store('receipts', 'public'),
						'transactionNumber' => request()->transactionNumber,
						'date' => now()
					]);
				
				return redirect()->route('show.credits')->with('success','Please wait till we validate your receipt uploaded');
    }

}
