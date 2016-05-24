<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Item;
use Laracasts\Flash\Flash;
use App\Http\Requests;

class WorkerController extends Controller
{
    public function book(){
        $items = (Auth::user()->items())->where('item_type_id','=',1)->get();
        $item = $items->first();
       // dd($items);
        return view('admin.worker.book')->with('item',$item);
    }

    public function laptop(){
        $laptops = ((Auth::user()->items())->where('item_type_id','=',2));
        $mouses = ((Auth::user()->items())->where('item_type_id','=',3));
        $laptop = $laptops->first();
        $mouse = $mouses->first();

        return view('admin.worker.laptop')->with('laptop',$laptop)->with('mouse',$mouse);
    }

    public function other(){
        $items = ((Auth::user()->items())->where('item_type_id','=',4));
        $item = $items->first();

        return view('admin.worker.other')->with('item',$item);
    }

    public function damaged($id){
        
    }
    
    public function report(){

    }
}
