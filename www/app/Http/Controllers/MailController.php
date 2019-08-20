<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailSimples;

class MailController extends Controller
{
    public function sendSimples(Request $request){



        \Mail::to($request->input('to'))
        //->cc('copy@email.com')
        ->send(
            new SendMailSimples(
                    $request->input('html'),
                    $request->input('from')
                )
        );
    }
}
