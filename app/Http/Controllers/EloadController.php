<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loading;
use App\Eload;
use App\Notif;
use DB;
use Validator;

class EloadController extends Controller
{
    public function index()
    {
    	return view('eload.index');
    }

    public function form(Request $request, Eload $eload)
    {
        return view('eload.load-form', compact('eload'));
    }

    public function post(Request $request)
    {   
        // dd($request->all());
        $rules = array(
            'phone' => 'required|numeric|digits:11',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()){

            return response()->json(['errors' => $error->errors()->all()]);

        }else{

            if(auth()->user()->credits < $request->amount){

                return response()->json(['status' => 'You don\'t have enough balance!']);
            }

            $form_data = array(
                'user_id' => auth()->user()->id,
                'provider' => $request->provider,
                'promo' => $request->promo,
                'phone' => $request->phone,
                'amount' => $request->amount,
                'date' => now()
            );

            Loading::create($form_data);

            // SEND NOTIF TO BACKEND
            Notif::create([
                'notif_title' => 'E-load',
                'notif_desc' => 'Promo: ' . $request->promo .', Phone: ' . $request->phone . ', Amount: ' . $request->amount
            ]);


            // Decrement of beems
            $latest = auth()->user()->loading()->latest()->first();
            $decrement = auth()->user()->decrement('credits', $request->amount);

            return response()->json(['success' => 'Your transaction has been process']);     
        }

    }

    public function globe()
    {
    	$promos = DB::table('eloads')->where('provider', 'GLOBE')->get();

        $provider = DB::table('eloads')->where('provider', 'GLOBE')->first();

    	return view('eload.promo', compact('promos', 'provider'));
    }

    public function smart()
    {
        $promos = DB::table('eloads')->where('provider', 'SMART')->get();

        $provider = DB::table('eloads')->where('provider', 'SMART')->first();

        return view('eload.promo', compact('promos', 'provider'));
    }

    public function sun()
    {
        $promos = DB::table('eloads')->where('provider', 'SUN')->get();

        $provider = DB::table('eloads')->where('provider', 'SUN')->first();

        return view('eload.promo', compact('promos', 'provider'));
    }

    public function tnt()
    {
        $promos = DB::table('eloads')->where('provider', 'TNT')->get();

        $provider = DB::table('eloads')->where('provider', 'TNT')->first();

        return view('eload.promo', compact('promos', 'provider'));
    }

    public function tm()
    {
        $promos = DB::table('eloads')->where('provider', 'TM')->get();

        $provider = DB::table('eloads')->where('provider', 'TM')->first();

        return view('eload.promo', compact('promos', 'provider'));
    }

    public function cherry()
    {
        $promos = DB::table('eloads')->where('provider', 'CHERRY')->get();

        $provider = DB::table('eloads')->where('provider', 'CHERRY')->first();

        return view('eload.promo', compact('promos', 'provider'));
    }

    public function cignal()
    {
        $promos = DB::table('eloads')->where('provider', 'CIGNAL')->get();

        $provider = DB::table('eloads')->where('provider', 'CIGNAL')->first();

        return view('eload.promo', compact('promos', 'provider'));
    }

    public function pldt()
    {
        $promos = DB::table('eloads')->where('provider', 'PLDT')->get();

        $provider = DB::table('eloads')->where('provider', 'PLDT')->first();

        return view('eload.promo', compact('promos', 'provider'));
    }

    public function steam()
    {
        $promos = DB::table('eloads')->where('provider', 'STEAM')->get();

        $provider = DB::table('eloads')->where('provider', 'STEAM')->first();

        return view('eload.promo', compact('promos', 'provider'));
    }

}
