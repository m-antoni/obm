<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\User;
use App\Order;
use App\Product;
use App\Cart;
use Session;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);

        // $this->middleware(['beembucks'])->except(['single_product', 'products', 'order_cod', 'order_bank']);
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

    public function list_orders()
    {
        $orders = auth()->user()->orders; // dd($orders);
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('products.list_orders', ['orders' => $orders]);
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
    }    

    public function add_to_cart(Request $request, $id)
    {
        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        // dd($request->session()->get('cart'));
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
        $total = $cart->totalPrice;

        return view('products.checkout_cod', ['total' => $total]);
    }

    public function cod_store(Request $request, Faker $faker)
    {   
        $request->validate([
            'name' => 'required|max: 100',
            'phone' => 'required|numeric',
            'address' => 'required|max:150',
        ]);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $reference = 'OBM-' . $faker->isbn10;
        $payment = 'COD';
        $cart = serialize($cart); // this will convert the data to string

        // Store data in database
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'reference_id' => $reference,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'cart' => $cart,
            'status' => 'PENDING',
            'payment' => 'COD',
            'date' => now()
        ]);

        // remove the session 
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Successfully Purchased the product(s)');
    }

    // Pay On Bank
    public function checkout_payonbank()
    {
        if(!Session::has('cart')){
            return view('products.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('products.checkout_payonbank', ['total' => $total]);
    }

    public function payonbank_store(Request $request, Faker $faker)
    {   
        $request->validate([
            'name' => 'required|max: 100',
            'phone' => 'required|numeric',
            'address' => 'required|max:150',
        ]);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $reference = 'OBM-' . $faker->isbn10;
        $payment = 'COD';
        $cart = serialize($cart); // this will convert the data to string

        // Store data in database
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'reference_id' => $reference,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'cart' => $cart,
            'status' => 'PENDING',
            'payment' => 'PAY ON BANK',
            'date' => now()
        ]);

        // remove the session 
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Successfully Purchased the product(s)');
    }
}