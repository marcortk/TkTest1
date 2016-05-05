<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    //
    protected $table ='user_types';
    protected $fillable=['name'];
    public function users(){

        return $this->hasMany('App\User');
    } 
}
