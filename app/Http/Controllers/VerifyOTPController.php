<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\SmsGateway;
use App\User;
use App\Chatbox;
use Session;

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

    public function cacheTheOTP($otp = null)
    {
        $OTP = $otp ? $otp : rand(100000, 999999);

        Cache::put(['OTP' => $OTP], now()->addSeconds(600)); // 10 minutes only

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


    /* PASSWORD RESET FUNCTIONS */

    public function forgotPasswordOTP()
    {   
        // dd(cache('OTP'));
        return view('auth.sms-passreset');
    }

    public function forgotPasswordVerify(Request $request)
    {
        // Validation takes here
        $validate = $request->validate([
           'email' => 'required|email'     
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            // Put the user otp to cache
            $this->cacheTheOTP($user->otp);
            // Send OTP Code To User Phone
            $this->sendOTP($user->phone);

            return back()->with('success', 'Verification Code is has been sent to your phone.');

        }else{

            return back()->with('error', 'Error Something went wrong!');
        }
    }

    public function resendPasswordOTP()
    {   
        // Get the code from otp
        $OTPFromCache = Cache::get('OTP');

        // Get the User associated with that OTP
        $user = User::where('otp', $OTPFromCache)->first();

        // Resend OTP Code To User Phone
        $this->sendOTP($user->phone);

        return redirect()->back()->with('resent','A fresh verification code has been sent to your phone');
    }

    public function verifyOTPPassword(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate([
            'code' => 'required|numeric|min:6'
        ]);

        $user = User::where('otp', $request->code)->first();

        if($user){

            $email = $user->email;

            return redirect()->route('show.forgotpass.reset');

        }else{

            return back()->with('error','Invalid code try again!');
        }
    }

    public function showForgotPasswordReset()
    {
        $getOTP = Cache::get('OTP');

        $user = User::where('otp', $getOTP)->first();

        return view('auth.passwords.reset-sms', compact('user'));
    }

    public function ForgotPasswordReset(Request $request)
    {  
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();
        $password = $request->password;

        // Get the user data and the password to reset
        $this->resetPassword($user, $password);

        return redirect()->route('home');
    }

     /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }   

    /* TESTING SMS GATEWAY FUNCTION */

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
