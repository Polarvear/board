<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Mail;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {


    public function sendMail(Request $request)
    {
    	return view('mail');
    }


    public function sendMailSubmit(Request $request)
    {
        dd($request->all());

        $dataArr = array(
            'subject' => $request->emailAddr,
            'name' => $request->userName,
            'subject' => $request->subject,
            'content' => $request->content,

        );

        return $request;
    }

   public function basic_email()
   {
      $data = array('name'=>"Virat Gandhi");

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('dlwkddlf114@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('admin@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
   }


   public function html_email()
   {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('dlwkddlf114@gmail.com', 'admin@admin.com')->subject
            ('Laravel HTML Testing Mail');
         $message->from('admin@gmail.com','admin@admin.com');
      });
      echo "HTML Email Sent. Check your inbox.";
   }


   public function attachment_email() //첨부파일이 있는 경우
   {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('dlwkddlf114@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
        //  $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\Users\5\Desktop\board_git03\storage\app\docs\image.png');
         $message->attach('C:\Users\5\Desktop\board_git03\storage\app\docs\test.txt');
         $message->from('dlwkddlf114@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
