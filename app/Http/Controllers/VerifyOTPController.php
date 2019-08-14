<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\SmsGateway;

class VerifyOTPController extends Controller
{
    public function show_verify()
    {		
    		// $OTP =  'ONE BEEM CODE: ' . rand(100000, 999999);

      	// Cache::put(['OTP' => $OTP], now()->addSeconds(20));
    		// dd(Cache::get('OTP'));
    		return view('auth.sms-verify');
    }

    public function verifyOTP(Request $request)
    {
    		if($request->opt == Cache::get('OTP'))
    		{
    				auth()->user()->update(['isVerified' => true]);

    				return redirect()->route('home');
    		}
    }

		public function test()
		{
				// dd($request->all());
				$token = env('SMS_TOKEN');

				$phoneNumber = env('SMS_SERVER');

				$devide_id = env('SMS_DEVICE_ID');

				// $message =  'CODE: ' . strtoupper(str_random(6)) ;
				$message =  'VERIFICATION CODE: ' . rand(100000, 999999);

				$options = [];

				$smsGateway = new SmsGateway($token);
				$result = $smsGateway->sendMessageToNumber($phoneNumber, $message, $devide_id, $options);

				if($result){

						echo 'Message Sent';

				}else{

						echo 'Something went wrong!!!';
				}
		}

}
