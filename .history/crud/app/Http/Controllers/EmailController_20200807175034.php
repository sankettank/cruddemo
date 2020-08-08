<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $details=[
            "email"=>"thanhhoacth2013@gmail.com",
            "title"=>$request->title,
            "body"=>$request->body
        ];

        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(3));
        dispatch($emailJob);
        echo 'email sent';
    }
}
