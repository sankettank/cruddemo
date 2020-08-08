<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail()
{
   $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(3));
   dispatch($emailJob);

   echo 'email sent';
}
}
