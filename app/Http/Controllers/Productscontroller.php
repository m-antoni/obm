<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\User;
use App\Order;
use App\Product;

class Productscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Product $product)
    {  
        return view('product', compact('product'));
    }

    public function product_create($id)
    {   
        $product = Product::find($id);

        return view('product_create', compact('product'));
    }

    public function product_post(Request $request, Faker $faker, $product)
    {
        // return dd($request->all());

    	$request->validate([
            'phone' => 'required|numeric' , 
		    'address' => 'required|max:100',
            'quantity' => 'required|numeric',
		    'price' => 'required|numeric',
		]);

        // save order data
    	$order = Order::create([
			'reference' => $faker->ean13,
			'user_id' => auth()->user()->id,
			'product_id' => $product,
			'quantity' => $request->quantity,
			'price' => $request->price,
			'status' => 'pending',
			'date' => now()
    	]);

        // update data of users
        $user = DB::table('users')
                    ->where('id', auth()->user()->id)
                    ->update([
                        'address' => $request->address,
                        'phone' => $request->phone    
                    ]);
   

        //$order = Order::where('reference', $reference)->first();
    	return redirect()->route('summary', $order);
    }

    public function summary($id)
    {   

       // return dd($id); 
       $order = Order::find($id);
        
       return view('summary', compact('order')); 
    }
}



