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
        $details=["email"=>"sanket1@logisticinfotech.co.in"];

        $emailJob = (new SendEmailJob($details))->delay(Carbon::now()->addSeconds(3600));
        dispatch($emailJob);
        echo 'email sent';
    }
}