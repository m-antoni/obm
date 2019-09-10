<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test\TestingGateway;
use App\Test\OrderDetails;

class TestController extends Controller
{		
    public function store(OrderDetails $orderDetails, TestingGateway $testingGateway)
    {
    		$order = $orderDetails->all();

    	  dd($testingGateway->charge(2500));
    }
}
