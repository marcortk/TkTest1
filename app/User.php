<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table ='users';
    protected $fillable = [
        'name', 'email', 'address','user_type_id'
    ];

    public function userType(){
        return $this->belongsTo('App\UserType');
    }

    public function items(){
        return $this->belongsToMany('App\Item','user_item');
    }     
}
