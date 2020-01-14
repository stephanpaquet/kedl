<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function roomview(Request $request)
    {
        return view('checkout.roomview');
    }

    public function options(Request $request)
    {
        return view('checkout.options');
    }

    public function session(Request $request) {
        return $request->session()->get('session');
    }
}
