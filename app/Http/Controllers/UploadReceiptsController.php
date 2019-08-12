<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UploadReceipt;

class UploadReceiptsController extends Controller
{
    public function upload_receipt()
    {   
    	// return dd(request()->all());
			$validate = request()->validate([
				'order_number' => 'required|numeric',
				'image' => 'required|image|max:1999'
			]);

			$compare = UploadReceipt::where('order_number', request()->order_number)->first();

	    if($compare){
	    		return redirect()->back()->with('error','Order Number is invalid!');
	    }
	    
			// save to database
			$upload = UploadReceipt::create([
				'user_id' => auth()->user()->id,
				'order_number' => request()->order_number,
	      'image' => request()->image->store('receipts', 'public'),
				'date' => now()
			]);
			
			return redirect()->back()->with('success','Please wait till we validate your receipt uploaded');
    }

}
