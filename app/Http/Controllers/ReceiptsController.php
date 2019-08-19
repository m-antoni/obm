<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiptsController extends Controller
{
		public function show_receipt()
		{
				return view('credit.receipt');
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
				'transactionNumber' => request()->transactionNumber,
				'date' => now()
			]);
		
		return redirect()->back()->with('success','Please wait till we validate your receipt uploaded');
    }
}
