<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\SmsGateway;
use App\User;
use App\Chatbox;

class VerifyOTPController extends Controller
{
    public function show_verify()
    {		
		// dd(Cache::get('OTP'));
		return view('auth.sms-verify');
    }

    public function verifyOTP(Request $request)
    {
		if($request->otp == Cache::get('OTP'))
		{
			$update = User::where('id', auth()->user()->id)
    	    				->update([
    	    					'isVerified' => true,
    	    					'otp' => $request->otp
    	    				]);

            // If THE USER IS REFER BY                  
            if(auth()->user()->referBy){
                // UPDATE WHO REFER ADD 50 CREDITS
                $increment = DB::table('users')
                                ->where('referral_key', auth()->user()->referBy)
                                ->increment('credits', 50);
            }

            // SET A CHATBOX ID 
            $setChatId = Chatbox::create([
                'user_id' => auth()->user()->id
            ]);                
                
			return redirect()->route('home');
		}

		return redirect()->back()->with('error', 'Verification Code is invalid');
    }

    public function resend()
    {
		// Generate new OTP
		$generate = $this->cacheTheOTP();

		$phone = auth()->user()->phone;
		// send to user phone
		$sendOTP = $this->sendOTP($phone);

		return redirect()->route('verify.sms')->with('resent','A fresh verification code has been sent to your phone');
    }

     public function cacheTheOTP()
    {
        $OTP = rand(100000, 999999);

        Cache::put(['OTP' => $OTP], now()->addSeconds(300));

        return $OTP;
    }

    public function sendOTP($phone)
    {   
        // SMS Gateway Credentials Needed
        $token = env('SMS_TOKEN');
        $devide_id = env('SMS_DEVICE_ID');
        $options = [];
        $message = 'ONE BEEM CODE: ' . Cache::get('OTP');
        
        $smsGateway = new SmsGateway($token);
        $result = $smsGateway->sendMessageToNumber($phone, $message, $devide_id, $options);
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
