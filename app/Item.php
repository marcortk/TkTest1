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

    public function itemType(){
        return $this->belongsTo('App\ItemType');
    }

    public function users(){
        return $this->belongsToMany('App\User','user_item');
    }   

    public function scopeSearch($query,$title){
        return $query->where('title','LIKE',"%$title%");
    }   
}
