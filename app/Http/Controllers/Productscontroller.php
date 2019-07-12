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

    	$order = Order::create([
			'reference' => $faker->ean13,
			'user_id' => auth()->user()->id,
			'product_id' => $product,
			'quantity' => $request->quantity,
			'price' => $request->price,
			'status' => 'pending',
			'date' => now()
    	]);

        $user = DB::table('users')
                    ->where('id', $order->id)
                    ->update([
                        'address' => $request->address,
                        'phone' => $request->phone    
                    ]);
   

        //$order = Order::where('reference', $reference)->first();
    	return redirect()->route('summary', $order->id);
    }

    public function summary($id)
    {   
       $order = Order::find($id)->first();
        
       return view('summary', compact('order')); 
    }

    public function edit_summary($id)
    {   
        $order = Order::find($id)->first();

        return view('edit_summary', compact('order'));
    }

    public function update_summary(Request $request, Order $order)
    {   
        // Validation data
        $request->validate([
            'address' => 'required|max:100',
            'phone' => 'required|numeric|min:11',
            'quantity' => 'required|numeric',
        ]);

        // $user = User::find($order->user_id);
        // $user->address = $request->address;
        // $user->phone = $request->phone;
        // $user->save();

        // $user = DB::table('users')
        //             ->where('id', $order->id)
        //             ->update([
        //                 'address' => $request->address,
        //                 'phone' => $request->phone    
        //             ]);
       
        // $order = DB::table('orders')
        //             ->where('id', $request->id)
        //             ->update([
        //                 'quantity' => $request->quantity    
        //             ]);

        return redirect()->route('summary', $request->id);
    }
   

}



