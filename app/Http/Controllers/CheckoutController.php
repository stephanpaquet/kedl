<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function roomview(Request $request)
    {
        //dd($request->session()->get('session'));
        return view('checkout.roomview', [
            'session' => $request->session()->get('session')
        ]);
    }

    public function session(Request $request) {
        return $request->session()->get('session');
    }
}
