<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function contact()
    {
        return view('pages.contact');
    }

    public function faq()
    {
        return view('pages.faq', ['faqs' => Faq::all()]);
    }
}
