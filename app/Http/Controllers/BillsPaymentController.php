<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\BillsInvoice;
use App\BillsPayment;
use App\Notif;
use Session;

class BillsPaymentController extends Controller
{
    public function index()
    {	
    	 return view('bills.index');
    }

    public function store(Request $request, Faker $faker)
    {	
		// return dd(request()->all());
		$validate = request()->validate([
				'amount' => 'required|numeric',
				'bills' => 'required|string'
		]);

		if(auth()->user()->credits < $request->amount)
        {
			
			Session::flash('error', 'You need to load your Beems');

			return redirect()->back();
		}

		$order_number = $faker->ean8;

		$create = BillsPayment::create([
				'user_id' => auth()->user()->id,
				'order_number' => $order_number,
				'amount' => $request->amount,
				'bills' => $request->bills,
				'date' => now()
		]);

		// decrease the beems of user		
		$decrement = auth()->user()->decrement('credits', $request->amount);

		// latest order
		$data = auth()->user()->bills()->latest()->first();

        // SEND NOTIF TO BACKEND
        Notif::create([
            'notif_title' => 'Bills & Payment',
            'notif_desc' => $data->bills . ', ' . $data->amount
        ]);

		// Send Invoice to email
		Mail::to(auth()->user()->email)->send(new BillsInvoice($data));

		return redirect()->route('home')->with('success', 'Your Bill has been paid successfully.');
    }

    public function creditcard_loans()
    {	
		$credits = [
			'Banco Filipino Visa',
			'Bankard/RCBC',
			'CitiBank Mastercard/Visa',
			'Go! Mastercard',
			'HSBC Mastercard/Visa',
			'Metrobank Mastercard',
			'Metrobank Visa Card',
			'PSBank Mastercard',
			'SCB Mastercard/Visa',
			'SICC Diners/Mastercard',
			'Standard Chartered',
			'Unicard',
		];

		return view('bills.creditcard-loans', compact('credits'));
    }

    public function insurance()
    {	
		$insurance = [
				'Blue Cross Health Care Inc',
				'Blue Cross Insurance Insurance Inc',
				'First Life Financial Company, Inc',
				'Loyola Plans Consolidated Inc',
				'Manulife Financial Plans',
				'Manulife Philippines',
				'Philippine AXA Life',
				'Philippine Charter Insurance Corp.',
				'Pru Life U.K.',
		];

		return view('bills.insurance', compact('insurance'));
    }

    public function utility()
    {	
		$utility = [
				'Easytrip Trip Services',
				'Maynilad',
				'Meralco',
				'Visayan Electric Co., Inc.',
		];

		return view('bills.utility', compact('utility'));
    }

    public function telco()
    {	
		$telco = [
				'Cordia Communications Corp',
				'Extelcom',
				'Globe Telecoms',
				'ICC Bayantel',
				'Innove - Globelines',
				'Innove - G-Net ',
				'Innove BC-Lease',
				'Innove G-Quest',
				'Liberty',
				'OWTel',
				'PLDT',
				'Smart',
				'Teletech'
		];

		return view('bills.telco', compact('telco'));
    }

    public function cable()
    {	
		$cable = [
				'Destiny Cable - CATV',
				'Pacific Internet ',
				'Sky Cable ',
				'Skybroadband (ZPDee',
				'Smart (Smart Broadband) '
		];

		return view('bills.cable', compact('cable'));
    }

    public function government()
    {	
		$government = [
				'BIR EFPS',
				'Bureau of Customs',
				'SSS Contribution-Farmers & Fishermen',
				'SSS Contribution-OFW',
				'SSS Contribution-Self Employed',
				'SSS Contribution-Voluntary Member',
				'SSS Contribution-Non Working Spouse',
		];

		return view('bills.government', compact('government'));
    }

    public function others()
    {	
		$others = [
			'Air Asia',
			'AVON COSMETICS, INC.',
			'Blues Brothers',
			'Cathay Land Inc.',
			'Cebu Air Pacific',
			'Colgate Palmolive Philippines',
			'Dyna Drug Corporation',
			'Eagle Ridge Golf and Country Club',
			'First Metro Save & Learn Balanced Fund Inc.',
			'First Metro Save & Learn Equity Fund Inc.',
			'First Metro Save & Learn Fixed Income Fund Inc',
			'First Metro Save & Learn Money Market Fund Inc.',
			'Flyace',
			'Fortune Cement',
			'G-Xchange',
			'IPM Realty Development',
			'Kawasaki Motors Phils Corp',
			'Manila Memorial Park',
			'Nutri Asia Inc',
			'Rockwell Leisure Club',
			'South East Asia Food, Inc',
			'Stradcom',
			'Suysing',
			'Tyco ADT',
		];

		return view('bills.others', compact('others'));
    }
}



