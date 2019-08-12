<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UploadReceipt;

class UploadReceiptsController extends Controller
{
    public function upload_receipt()
    {   
    	
			$validate = request()->validate([
				'order_number' => 'required|numeric',
				'image' => 'required|image|max:1999'
			]);

	    if(UploadReceipt::where('order_number', $order_number->request())){
	        return response()->json(['error' => 'Order number is not valid']);
	    }

			// save to database
			$upload = UploadReceipt::create([
				'user_id' => auth()->user()->id,
				'order_number' => request()->order_number,
	      'image' => request()->image->store('receipts', 'public'),
				'date' => now()
			]);
			
			return redirect()->route('confirm.order')->with('success','Please wait till we validate your receipt uploaded');
    }
}
