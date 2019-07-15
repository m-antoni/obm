<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.admin');
    }


    public function products()
    {
        $products = Product::paginate(7);

        return view('admin.products.products', compact('products'));
                   
    }
}
