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
    		'number' => 'required|min:12',
    		'expiry_month' => 'required|integer|between:1,12',
    		'expiry_year' => 'required|integer|min:'.date('y'),
    		'cvc' => 'required|integer'
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

        session()->flash('success', 'Card Added successfully');

    	return response()->json(['success' => true]);
    }

    public function ewallet()
    {   
       
        $cards = DB::table('cards')
                    ->where('user_id', auth()->user()->id )
                    ->get();

        return view('users.ewallet', compact('cards'));
    }

    public function card_destroy(Card $card)
    {   
        $card->delete();

        return back()->with('success', 'Card deleted successfully');
    }
}
