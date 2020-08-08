<?php

namespace App\Observers;

use App\User;

use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'detail' => '',
            'subject' => '',
        );

        Mail::to('sanket@logisticinfotech.co.in')->send(new DemoEmail($data));
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'detail' => '',
        );

        Mail::to('sanket@logisticinfotech.co.in')->send(new DemoEmail($data));
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'detail' => '',
        );

        Mail::to('sanket@logisticinfotech.co.in')->send(new DemoEmail($data));

        //Mail::to('sanket@logisticinfotech.co.in')->subject('Deleted Record')->send(new DemoEmail($data));

        /*Mail::send(['text'=>'mail'], new DemoEmail($data), function($message) {
            $message->to('sanket@logisticinfotech.co.in', 'Tutorials Point')->subject('Deleted Record');
            $message->from('sanket@logisticinfotech.co.in','Virat Gandhi');
        });*/

    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
