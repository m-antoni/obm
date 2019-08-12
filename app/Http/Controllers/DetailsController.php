<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    public function add_details(Request $request)
	{
			// dd($request->all());

			$validate = $request->validate([
				'phone' => 'required|min:11|numeric',
				'address' => 'required'
			]);

	    // need to update all to false except the new default
	    $details = Detail::create([
				'user_id' => auth()->user()->id,
				'phone' => $request->phone,
				'address' => $request->address,
				'isDefault' => $request->isDefault
			]);	
	    // if another default is added every data will be false except new default
			$updateToFalse = Detail::where('id' ,'!=', $details->id)
		     				->where('user_id', auth()->user()->id)
								->update(['isDefault' => false]);

			return redirect()->route('checkout.cod');
	}    

	public function update_details(Request $request)
	{
		$validation = $request->validate([
			'id' => 'required|numeric'
		]);

		$UpdateTrue = DB::table('details')->where('id', $request->id)
						->where('user_id', auth()->user()->id)
						->update([
							'isDefault' => true
						]);

		$UpdateFalse = DB::table('details')->where('id', '!=', $request->id)
						->where('user_id', auth()->user()->id)
						->update([
							'isDefault' => false
						]);
						

		return  redirect()->route('checkout.cod');				
	}

	public function add_details_bank(Request $request)
	{
		// return dd($request->all());
		$validate = $request->validate([
			'phone' => 'required|min:11|numeric',
			'address' => 'required',
		]);

    // need to update all to all to false except the new default
    $details = Detail::create([
				'user_id' => auth()->user()->id,
				'phone' => $request->phone,
				'address' => $request->address,
				'isDefault' => $request->isDefault
		]);	

		$updateFalse = Detail::where('id' ,'!=', $details->id)
		     			->where('user_id', auth()->user()->id)
							->update(['isDefault' => false]);

		return  redirect()->route('checkout.payonbank');

	}

	public function update_details_bank(Request $request)
	{

		$validation = $request->validate([
			'id' => 'required|numeric'
		]);

		$UpdateTrue = DB::table('details')->where('id', $request->id)
						->where('user_id', auth()->user()->id)
						->update([
								'isDefault' => true
						]);

		$UpdateFalse = DB::table('details')->where('id', '!=', $request->id)
						->where('user_id', auth()->user()->id)
						->update([
							'isDefault' => false
						]);
						
		return redirect()->route('checkout.payonbank');				
	}
}
