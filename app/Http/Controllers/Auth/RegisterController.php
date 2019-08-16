<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Address;
use App\SmsGateway;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first' => ['required', 'string', 'max:20'],
            'middle' => ['required', 'string', 'max:20'],
            'last' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'phone' => ['required', 'numeric', 'min:11', 'unique:users'],
            'city' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referBy' => ['nullable', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['referBy'] != null){
            $query = User::where('referral_key', $data['referBy'] )
                            ->increment('credits', 50);
        }
        
        // generate Cache
        $generatedCache = $this->cacheTheOTP();
        // $getOTP = Cache::get('OTP');

        // send OTP to the Number
        $sendOTP = $this->sendOTP($data['phone']);
       
        return User::create([
            'first' => $data['first'],
            'middle' => $data['middle'],
            'last' => $data['last'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'barangay' => $data['barangay'],
            'zipcode' => $data['zipcode'],
            'street' => $data['street'],
            'password' => Hash::make($data['password']),
            'otp' => Cache::get('OTP'),
            'referral_key' => strtoupper(str_random(10)),
            'referBy' => $data['referBy'], 
        ]);
    }

    public function cacheTheOTP()
    {
        $OTP = rand(100000, 999999);

        Cache::put(['OTP' => $OTP], now()->addSeconds(60));

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

    public function showRegistrationForm()
    {   
        $address = DB::table('addresses')->groupBy('city')->get();
        // dd($address);
        return view('auth.register')->with('address', $address); 
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('addresses')
                    ->where($select, $value)
                    ->groupBy($dependent)
                    ->get();

        $output = '<option value=""> Select ' . ucfirst($dependent). '</option>';

        foreach ($data as $row) 
        {
            $output .= '<option value="'. $row->$dependent .'">' . $row->$dependent . '</option>';
        }

        echo $output;
    } 
}
