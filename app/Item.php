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
        return $this->belongsToMany('App\User','user_item')->withPivot('user_id','item_id','id','in_use');
    }   

    public function reports(){
        return $this->belongsToMany('App\User','reports')->withPivot('user_id','item_id','description');
    }

    public function scopeSearch($query,$title){
        return $query->where('title','LIKE',"%$title%");
    }   
}
