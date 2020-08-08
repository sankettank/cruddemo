<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function index()
    {
        return view('send_email');
    }

    public function send(Request $request)
    {
        /*$objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'Logistic';
        $objDemo->receiver = 'Sanket';
        Mail::to("sanket@logisticinfotech.co.in")->send(new DemoEmail($objDemo));*/


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'detail' => 'required',
        ]);

        if ($validator->fails()){
            return redirect('email')
                        ->withErrors($validator)
                        ->withInput();

        }else{
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'detail' => $request->detail,
            );
        }

        Mail::to($request->email)->send(new DemoEmail($data));
        return back()->with('success', 'mail send successful');

    }
}
