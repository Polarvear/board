<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;


class MailSendController extends Controller
{


    public function mailSend(Request $request)
    {
    	return view('mailSend');
    }


    public function mailSendSubmit(Request $request){
    	$data_arr = array(
            'subject' => $request->subject,
            'name' => $request->name,
            'emailAddr' => $request->emailAddr,
            'content' => $request->content
        );

        Mail::send('mail.mail.form', ['data_arr' => $data_arr], function($message) use ($data_arr){
            $message->to('dlwkddlf114@gmail.com')->subject($data_arr['subject']);
            $message->from($data_arr['emailAddr']);
        });

        return $request;
    }

}
