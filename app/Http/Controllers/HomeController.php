<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Order;
use App\Credit;
use App\MasterDebitCard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // $referBy = auth()->user()->referBy;

        // $referrals = User::where('referBy', auth()->user()->referral_key)
        //                      ->orderBy('created_at', 'DESC')
        //                      ->get();

        // $masterDebit = MasterDebitCard::where('user_id', auth()->user()->id)->first();

        // // get the credits status
        // $status = Credit::where('user_id', auth()->user()->id)
        //                 ->where('status', false)
        //                 ->first();

        // return view('home', compact('referBy','referrals','masterDebit','status'));

        return view('home');
    }
}
