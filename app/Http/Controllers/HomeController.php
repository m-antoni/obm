<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Order;
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
        $referBy = auth()->user()->referBy;

        $referrals = User::where('referBy', auth()->user()->referral_key)
                             ->orderBy('created_at', 'DESC')
                             ->get();
        $orders = Order::where('user_id', auth()->user()->id)
                ->orderBy('date', 'desc')
                ->get();    

        // broadcast(new WebsocketDemoEvent('some data'));
        return view('home', compact('referBy', 'referrals', 'orders'));
    }

}
