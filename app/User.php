<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
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
    /**
     * Obtener Permisos.
     *
     * @return array Con los permisos.
     */
    static function getPermitions()
    {
        if (!\Session::exists('user_permissions')) {
            \Session::put('user_permissions',auth()->user()->getAllPermissions()->pluck('name')->toArray());
        }        
        return \Session::get('user_permissions');
    }
    /**
    * Route notifications for the mail channel.
    *
    * @param  \Illuminate\Notifications\Notification  $notification
    * @return string
    */
    public function routeNotificationForMail($notification)
    {
        return env('MAIL_TO_ADDRESS',$this->email);
    }        
}
