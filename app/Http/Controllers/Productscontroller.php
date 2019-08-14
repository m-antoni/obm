<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Mail;
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
        $appliances = Product::where('category', 'appliances')->paginate(8);

        return view('products.appliances', compact('appliances'));
    }
    
    public function kitchenware()
    {   
        $kitchenware = Product::where('category', 'kitchenware')->paginate(8);

        return view('products.kitchenware', compact('kitchenware'));
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

    public function checkout_cod()
    {   

        if(!Session::has('cart')){
            return view('products.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart;
        $details = Detail::where('user_id', auth()->user()->id)->get();
        $isDefault = Detail::where('isDefault', true)
                    ->where('user_id', auth()->user()->id)
                    ->first();

        return view('products.checkout_cod', ['products' => $products, 'details' => $details, 'isDefault' => $isDefault]);
    }

    public function cod_store(Request $request, Faker $faker)
    {      
        // dd($request->all()); 
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order_number = $faker->ean8 . $faker->ean8; // Generate a random numbers for Order No.
        $payment = 'COD';
        // $cart = serialize($cart);
        $cart = json_encode($cart);

        // Store data in database
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'order_number' => $order_number,
            'phone' => $request->phone,
            'address' => $request->address,
            'cart' => $cart,
            'status' => 'PENDING',
            'payment' => 'COD',
            'date' => now()
        ]);

        // Send To User Email The Order No.
        // Mail::to(auth()->user()->email)->send(new SendInvoice($order));

        // Remove the session data
        Session::forget('cart');

        return redirect()->route('confirm.order');
    }

    public function confirm_order()
    {   
        $order = auth()->user()->orders->last();

        $ordernumber = $order->order_number;
        $payment = $order->payment;
        $cart = json_decode($order->cart, true);

        // dd($payment);
        return view('products.confirm_order', compact('ordernumber', 'payment', 'cart'));
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
        $isDefault = Detail::where('isDefault', true)
            ->where('user_id', auth()->user()->id)
            ->first();
        // dd($order->cart);

        return view('products.generate_invoice', compact('order', 'isDefault', 'cart'));
    }

    // Pay On Bank
    public function checkout_payonbank()
    {
        if(!Session::has('cart')){
            return view('products.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart;
        $details = Detail::where('user_id', auth()->user()->id)->get();
        $isDefault = Detail::where('isDefault', true)
                    ->where('user_id', auth()->user()->id)
                    ->first();

        return view('products.checkout_payonbank',[
            'products' => $products, 
            'details' => $details, 
            'isDefault' => $isDefault
        ]);
    }

    public function payonbank_store(Request $request, Faker $faker)
    {   
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order_number = $faker->ean8 . $faker->ean8; // Generate a random numbers for Order No.
        $payment = 'PAY ON BANK';
        // $cart = serialize($cart);
        $cart = json_encode($cart);
        // Store data in database
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'order_number' => $order_number,
            'phone' => $request->phone,
            'address' => $request->address,
            'cart' => $cart,
            'status' => 'PENDING',
            'payment' => 'PAY ON BANK',
            'date' => now()
        ]);

        // Send To User Email The Order No.
        // Mail::to(auth()->user()->email)->send(new SendInvoice($order));

        // remove the session 
        Session::forget('cart');

        return redirect()->route('confirm.order');
    }
}