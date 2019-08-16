<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DetailsController extends Controller
{

	public function add_details(Request $request)
	{
		 // dd($request->all());
		$validate = $request->validate([
				'phone' => 'required|min:11|numeric',
				'city' => 'required',
				'barangay' => 'required',
				'zipcode' => 'required|numeric',
				'street' => 'required',
		]);

    // need to update all to all to false except the new default
    $details = Detail::create([
				'user_id' => auth()->user()->id,
				'phone' => $request->phone,
				'city' => $request->city,
				'barangay' => $request->barangay,
				'zipcode' => $request->zipcode,
				'street' => $request->street,
				'date' => Carbon::now(),
		]);	

		return  redirect()->route('checkout');

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
						
		 return redirect()->route('checkout');				
	 }
}
