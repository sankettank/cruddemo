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
            'subject' => 'Created User',
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
            'subject' => 'Updated User',
        );

        Mail::queue('sanket@logisticinfotech.co.in')->send(new DemoEmail($data));
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
            'subject' => 'Delete User',
        );

        Mail::queue('sanket@logisticinfotech.co.in')->send(new DemoEmail($data));
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
