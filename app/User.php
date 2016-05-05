<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='users';
    protected $fillable = [
        'name', 'email', 'address','user_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 /*   protected $hidden = [
        'password', 'remember_token',
    ];*/
    public function user_type(){

        return $this->belongsTo('App\User_type');
    }
    public function items(){

        return $this->belongsToMany('App\Item');
    }     
}
