<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailSimples;

class MailController extends Controller
{
    public function sendSimples(Request $request){

        $config = null;

        if( ! is_null($request->input('mail_host')) && ! is_null($request->input('mail_port')) && ! is_null($request->input('mail_user')) && ! is_null($request->input('mail_password')) && ! is_null($request->input('mail_encryption')) ){
            $config = (object) array(
                "mail_host"         => $request->input('mail_host'),
                "mail_port"         => $request->input('mail_port'),
                "mail_user"         => $request->input('mail_user'),
                "mail_password"     => $request->input('mail_password'),
                "mail_encryption"   => $request->input('mail_encryption')
            );
        }


        \Mail::to($request->input('to'))
        //->cc('copy@email.com')
        ->send(
            new SendMailSimples(
                    $request->input('html'),
                    $request->input('from'),
                    $request->input('title'),
                    $config
                )
        );
    }
}
