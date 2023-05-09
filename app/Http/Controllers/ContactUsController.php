<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function sendEmail(Request $request)
    {
        $dataMail = $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'subject' =>'required',
            'message' =>'required'
        ]);

        Mail::to('hypeehoodie1212@gmail.com')->send(new ContactMail($dataMail));
        return back()->with('message_send' , 'Your Message Has Been Sent Successfully !');

    }


}
