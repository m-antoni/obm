<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\InvoiceMail;

class MailController extends Controller
{
    public function send()
    {
    		Mail::send(new InvoiceMail());
    }
}
