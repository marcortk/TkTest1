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
        $itemUser = (Auth::user()->items())->where('item_type_id','=',1)->get();
        $item = NULL;
        if($itemUser != NULL){
            foreach ($itemUser as $it) {
                if($it->pivot->in_use){
                    $item = $it;
                    break;
                }
            }
        }
        return view('admin.worker.book')->with('item',$item);
    }

    public function laptop(){
        $itemUser = (Auth::user()->items())->where('item_type_id','=',2)->get();
        $laptop = NULL;
        if($itemUser != NULL){
            foreach ($itemUser as $it) {
                if($it->pivot->in_use){
                    $laptop = $it;
                    break;
                }
            }
        }
        return view('admin.worker.laptop')->with('laptop',$laptop);
    }

    public function mouse(){
        $itemUser = (Auth::user()->items())->where('item_type_id','=',3)->get();
        $item = NULL;
        if($itemUser != NULL){
            foreach ($itemUser as $it) {
                if($it->pivot->in_use){
                    $item = $it;
                    break;
                }
            }
        }
        return view('admin.worker.mouse')->with('item',$item);
    
    }

    public function other(){
        $itemUser = (Auth::user()->items())->where('item_type_id','=',4)->get();
        $item = NULL;
        if($itemUser != NULL){
            foreach ($itemUser as $it) {
                if($it->pivot->in_use){
                    $item = $it;
                    break;
                }
            }
        }
        return view('admin.worker.other')->with('item',$item);
    }

    public function damaged($id)
    {
        return view('admin.worker.damaged')->with('id',$id);
    }
    
    public function report(Request $request,$id){

        $item = Item::find($id);
        $users = $item->users()->get();
        foreach($users as $us){
            if ($us->pivot->in_use){
                $item->users()->sync([($us->id) =>['in_use'=>false]],false);
            }
        }
        $des = (string)($request->des);
        $item->reports()->attach(Auth::user(),['description'=>$des]);
        $item->damaged = true;
        $item->save();
        return redirect()->route('worker.myReport');
    }

    public function myReport(){
        $items = Auth::user()->reports;
        return view('admin.worker.myReports')->with('items',$items);
    }
}

