<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Card;
use App\Beem;

class BeemBucksController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','verified']);
	}

    public function create(Request $request)
    {	

    	$cards = Card::where('user_id', auth()->user()->id)->get();

    	return view('ewallet.create_beem', compact('cards'));
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


    public function card_destroy(Card $card)
    {   
        $card->delete();

        return back()->with('success', 'Card deleted successfully');
    }

    public function ewallet()
    {   
        $cards = DB::table('cards')
                    ->where('user_id', auth()->user()->id )
                    ->get();

        $beem = DB::table('beems')
                    ->where('user_id', auth()->user()->id)
                    ->get();

        return view('ewallet.ewallet', compact('cards', 'beem'));
    }

    public function ewallet_store(Request $request)
    {
        $request->validate([
            'points' => 'required|integer',
            'used_card' => 'required|min:12'
        ]);

        $beem_store = Beem::create([
            'user_id' => auth()->user()->id,
            'points' => $request->points,
            'used_card' => $request->used_card
        ]);

        session()->flash('success', 'Thank you, we will validated your purchased.');

        return response()->json(['success' => true]);
    }

    public function ewallet_update(Request $request, $id)
    {   
        $request->validate([
            'points' => 'required|integer',
            'used_card' => 'required|min:12'
        ]);

        $beem = DB::table('beems')
                    ->where('user_id', $id)
                    ->increment('points', $request->points);

        session()->flash('success', 'Thank you, we will validated your purchased.');

        return back();
    }

}
