<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NofityDeployEmail;

class NotifyDeployController extends Controller {
    public function deploySuccess( /* Request $request */ ) {
        $mail = new \stdClass();
        $mail->status  = "Terminado con exito";
        $mail->message = "Sin nada";
        Mail::to("albertop2203@gmail.com")->send(new NofityDeployEmail($mail));
        return response( 'OK' );
    }
    public function deployError( $data ) {
        $mail = new \stdClass();
        $mail->status  = "Existe un error en el deploy";
        $mail->message = $data;
        Mail::to("albertop2203@gmail.com")->send(new NofityDeployEmail($mail));
        return response( 'OK' );
    }
}
