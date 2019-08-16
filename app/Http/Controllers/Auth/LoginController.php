<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\SmsGateway;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

   /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $result = $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );

        // if($result){
        //     $this->sendOTP();
        // }

        return $result;
    }


    public function cacheTheOTP()
    {
        $OTP =  'ONE BEEM CODE: ' . rand(100000, 999999);

        Cache::store(['OTP' => $OTP], now()->addSeconds(60));

        return $OTP;
    }

    public function sendOTP()
    {   
        // SMS Gateway Credentials Needed
        $token = env('SMS_TOKEN');
        $devide_id = env('SMS_DEVICE_ID');
        $options = [];

        $smsGateway = new SmsGateway($token);
        $result = $smsGateway->sendMessageToNumber(auth()->user()->phone, $this->cacheTheOTP(), $devide_id, $options);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'userLogout']);
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();

        return redirect('/');
    }

    public function credentials(Request $request){
        $credentials = $request->only($this->username(),'password');
        return array_add($credentials, 'isBan', 0);
    }

} 
