<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Card;

class BeemBucksController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','verified']);
	}

    public function create(Request $request)
    {	

    	$cards = Card::where('user_id', auth()->user()->id)->get();

    	return view('users.create_beem', compact('cards'));
    }

    public function store(Request $request)
    {
    	 // return dd($request->all());

    	$request->validate([
    		'number' => 'required',
    		'expiry_month' => 'required',
    		'expiry_year' => 'required',
    		'cvc' => 'required'
    	]);

    	// store card data
    	$card_store = Card::create([
    		'user_id' => auth()->user()->id,
    		'number' => $request->number,
    		'expiry_month' => $request->expiry_month,
    		'expiry_year' => $request->expiry_year,
    		'cvc' => $request->cvc
    	]); 

    	$user = DB::table('users')
    				->where('id', auth()->user()->id)
    				->where('beem_activation', false)
    				->first();

    	if($user){
			// update user beem activation
	    	$user_update = DB::table('users')
				->where('id', auth()->user()->id)
				->update([
					'beem_activation' => true
				]);
    	}
    

    	return redirect()->back()->with('success', 'Credit Card Added Successfully.');
    	
    }

}
