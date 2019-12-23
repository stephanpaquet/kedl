<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'email' => 'required|email',
        ]);

        $data = array('name' => "Virat Gandhi");

        Mail::send('mails.contact-us', $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
            $message->from('xyz@gmail.com','Virat Gandhi');
        });

        echo "HTML Email Sent. Check your inbox.";
    }
}
