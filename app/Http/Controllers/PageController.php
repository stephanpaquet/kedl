<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function faq()
    {
        return view('pages.faq', ['faqs' => Faq::all()]);
    }

    public function price()
    {
        return view('pages.prices', ['prices' => Faq::all()]);
    }

    public function policy()
    {
        return view('pages.policy');
    }
}
