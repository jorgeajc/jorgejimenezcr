<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Validator;

class MailContactController extends Controller {
    public function send( Request $request) {
        $validator = Validator::make($request->all(), [
            'subject'   => 'required',
            'name'      => 'required',
            'email'     => 'required',
            'message'   => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $mail = new \stdClass();
            $mail->subject  = $request->subject;
            $mail->name     = $request->name;
            $mail->email    = $request->email;
            $mail->message  = $request->message;
            Mail::to("albertop2203@gmail.com")->send(new ContactEmail($mail));
            return response( 'OK' );
        }
    }
}
