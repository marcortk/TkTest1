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
        $items = (Auth::user()->items())->orderBy('id','DESC');
        $items = $items->where('item_type_id','=',1)->get();
        $item = $items->first();
        return view('admin.worker.book')->with('item',$item);
    }

    public function laptop(){
        $laptops = (Auth::user()->items())->orderBy('id','DESC');
        $laptops = $items->where('item_type_id','=',2)->get();
        $laptop = $laptops->first();

        return view('admin.worker.laptop')->with('laptop',$laptop);
    }

    public function mouse(){
        $items = (Auth::user()->items())->orderBy('id','DESC');
        $items = $items->where('item_type_id','=',3)->get();
        $item = $items->first();

        return view('admin.worker.mouse')->with('item',$item);
    }

    public function other(){
        $items = (Auth::user()->items())->orderBy('id','DESC');
        $items = $items->where('item_type_id','=',4)->get();
        $item = $items->first();

        return view('admin.worker.other')->with('item',$item);
    }

    public function damaged($id)
    {
        return view('admin.worker.damaged')->with('id',$id);
    }
    
    public function report(Request $request,$id){

        $item=Item::find($id);
        $des=(string)($request->des);
        $item->reports()->attach(Auth::user(),['description'=>$des]);
        $item->damaged=true;
        $item->save();
        return redirect()->route('worker.myReport');
    }

    public function myReport(){
        $items = Auth::user()->reports;
        return view('admin.worker.myReports')->with('items',$items);
    }
}

