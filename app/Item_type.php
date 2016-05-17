<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_type extends Model
{
    //
    protected $table ='item_types';
    protected $fillable = [
        'name', 
    ];    
    public function items(){

        return $this->hasMany('App\Item');
    }
}
