<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','last_name','login', 'email', 'password', 'role_id',
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


    public function getFio(){
        return ($this->attributes['surname'] . ' ' . $this->attributes['name'] . ' ' . $this->attributes['last_name'] );
    }

    public function cabinet()
    {   
        $result = '<div> ФИО: '  . $this->getFio() . '</div> <div> Логин: '  . $this->attributes['login'] . '</div> <div> Электронная почта: '  . $this->attributes['email'] . '</div>';
        return $result;
        }
}