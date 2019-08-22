<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\SendInvoice;
use App\User;
use App\Order;
use App\Product;
use App\Cart;
use App\Detail;
use Session;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function appliances()
    {   
        $appliances = Product::where('category', 'appliances')->simplePaginate(1);

        return view('products.appliances', compact('appliances'));
    }
    
    public function kitchenware()
    {   
        $kitchenware = Product::where('category', 'kitchenware')->simplePaginate(1);

        return view('products.kitchenware', compact('kitchenware'));
    }

    public function show_all($category)
    {
        $show = Product::where('category', $category)->paginate(7);

        return view('products.show-all', compact('show'));
    }

    public function single_product(Product $product)
    {   
        // dd($id);
        // $single_product = DB::table('products')->where('id',)
        return view('products.single_product', compact('product'));
    }

    /*
        Adding to Cart Implementation starts here
    */
    public function shopping_cart()
    {
        if(!Session::has('cart')){
            return view('products.shopping-cart', ['products' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
    
        return view('products.shopping-cart', [
                'products' => $cart->items, 
                'totalPrice' => $cart->totalPrice
            ]);

        // return response()->json(['products' => $cart->items, 
        //         'totalPrice' => $cart->totalPrice]);
    }    

    public function add_to_cart(Request $request, $id)
    {
        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function delete_item($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        Session::put('cart', $cart);

        return redirect()->back();
    }

    public function confirm_order()
    {   
        $order = auth()->user()->orders->last();

        $payment = $order->payment;
        $cart = json_decode($order->cart, true);

        // dd($payment);
        return view('products.confirm_order', compact('order', 'payment', 'cart'));
    }

    // View List of Orders
    public function list_orders()
    {
        $orders = Order::where('user_id', auth()->user()->id)
                ->orderBy('date', 'desc')
                ->get();

        return view('products.list_orders', compact('orders'));
    }

    public function generate_invoice($id)
    {
        $order = Order::where('id', $id)->first();
        $cart = json_decode($order->cart, true);

        return view('products.generate_invoice', compact('order', 'cart'));
    }
    
    // Bank Transfer
    public function checkout()
    {   
        // dd(auth()->user()->phone);
        if(!Session::has('cart')){
            return view('products.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart;
        $date = Carbon::now();
        $address = DB::table('addresses')->groupBy('city')->get();
        $barangay = DB::table('addresses')->select('barangay')->get();
        $zipcode = DB::table('addresses')->select('zipcode')->get();
        $detail = Detail::where('user_id', auth()->user()->id)->latest()->first();

        return view('products.checkout',[
            'products' => $products,
            'detail' => $detail,
            'address' => $address,
            'barangay' => $barangay,
            'zipcode' => $zipcode,
        ]);
    }

    public function checkout_store(Request $request, Faker $faker)
    {   
        // dd($request->all());
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order_number = $faker->ean8 . $faker->ean8; // Generate a random numbers for Order No.
        $payment = 'PENDING';

        // $cart = serialize($cart);
        $cart = json_encode($cart);

        // Store data in database
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'order_number' => $order_number,
            'phone' => $request->phone,
            'city' => $request->city,
            'barangay' => $request->barangay,
            'zipcode' => $request->zipcode,
            'street' => $request->street,
            'cart' => $cart,
            'status' => 'PENDING',
            'payment' => 'BEEMS',
            'date' => now()
        ]);

        // delete the user address input if any 
        $detail = Detail::where('user_id', auth()->user()->id)->delete();

         // Immediately fetch the latest order
        $latest = auth()->user()->orders()->latest()->first();
        $decoded = json_decode($latest->cart ,true);

        // Send to email the Invoice
        Mail::to(auth()->user()->email)->send(new SendInvoice($latest, $decoded));

        // decrement the user credits
        $latest = Order::where('user_id', auth()->user()->id)->latest()->first();
        $totalPrice = json_decode($latest->cart);
        $decrement = auth()->user()->decrement('credits', $totalPrice->totalPrice);

        // remove the session 
        Session::forget('cart');    
        
        // dd($request->all());
        return redirect()->route('confirm.order');
    }

    /*
        Checkout Cash On Delivery Methods
    */

    public function checkout_cod()
    {   
         // dd(auth()->user()->phone);
        if(!Session::has('cart')){
            return view('products.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart;
        $date = Carbon::now();
        $address = DB::table('addresses')->groupBy('city')->get();
        $barangay = DB::table('addresses')->select('barangay')->get();
        $zipcode = DB::table('addresses')->select('zipcode')->get();
        $detail = Detail::where('user_id', auth()->user()->id)->latest()->first();

        return view('products.cod_checkout',[
            'products' => $products,
            'detail' => $detail,
            'address' => $address,
            'barangay' => $barangay,
            'zipcode' => $zipcode,
        ]);
    }

    public function cod_store(Request $request, Faker $faker)
    {
        // dd($request->all());
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order_number = $faker->ean8 . $faker->ean8; // Generate a random numbers for Order No.
        $payment = 'PENDING';

        // $cart = serialize($cart);
        $cart = json_encode($cart);

        // Store data in database
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'order_number' => $order_number,
            'phone' => $request->phone,
            'city' => $request->city,
            'barangay' => $request->barangay,
            'zipcode' => $request->zipcode,
            'street' => $request->street,
            'cart' => $cart,
            'status' => 'PENDING',
            'payment' => 'COD',
            'date' => now()
        ]);

        // delete the user address input if any 
        $detail = Detail::where('user_id', auth()->user()->id)->delete();

        // Immediately fetch the latest order
        $latest = auth()->user()->orders()->latest()->first();
        $decoded = json_decode($latest->cart ,true);

        // Send to email the Invoice
        Mail::to(auth()->user()->email)->send(new SendInvoice($latest, $decoded));

        // remove the session 
        Session::forget('cart');    
        
        // dd($request->all());
        return redirect()->route('confirm.order');
    }
}