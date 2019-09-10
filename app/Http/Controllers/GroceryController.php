<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grocery;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\SendInvoice;
use App\User;
use App\Notif;
use App\Cart;
use App\Detail;
use Session;

class GroceryController extends Controller
{
    public function index()
    {
    		return view('grocery.index');
    }

    public function rice()
    {		
    		$rice = Grocery::where('category', 'PASTA & RICE')->simplePaginate(1);

    		return view('grocery.rice', compact('rice'));
    }

    public function add_to_cart(Request $request, $id)
    {
        $grocery = Grocery::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($grocery, $grocery->id);
        
        $request->session()->put('cart', $cart);
        
        return redirect()->back();
    }

}
