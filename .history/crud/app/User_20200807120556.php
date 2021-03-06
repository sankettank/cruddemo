<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   /* public function getFullNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setFullNameAttribute($value)
    {
        return strtolower($value);
    }

    public function setNameAttributefull($fname ,$lname)
    {
        return ucfirst($fname .' '.$lname);
    }

    public function addSubsriptionDays($days)
    {
        $now = Carbon::now();
        return $now->copy()->addDays($days);
    }
*/




}
