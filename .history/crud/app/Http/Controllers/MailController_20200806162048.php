<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'Logistic';
        $objDemo->receiver = 'Sanket';

        Mail::to("sanket@logisticinfotech.co.in")->send(new DemoEmail($objDemo));
    }
}
