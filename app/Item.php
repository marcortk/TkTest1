<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table ='items';
    protected $fillable = [
        'name','cod','description','ram',
        'model','trademark','price','capacity','title','author','p_date','language','genre',
        'item_type_id'
    ];    
    public function item_type(){

        return $this->belongsTo('App\Item_type');
    }
    public function users(){

        return $this->belongsToMany('App\User','user_item');
    }    
}
