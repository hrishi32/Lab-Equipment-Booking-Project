<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    protected $attributes = [
        'admin' => false
     ];

    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        if (Auth::Check()){
            $id=Auth::user()->getId();
        }
    }
    public function isAdmin(){
        return $this->admin;
    }
}
