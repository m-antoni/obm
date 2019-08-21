<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EbooksController extends Controller
{
    public function index()
    {
    	return view('ebooks.index');
    }
}
