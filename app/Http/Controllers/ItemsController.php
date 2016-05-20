<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests;
use App\Http\Requests\BookRequest;
use App\Http\Requests\LaptopRequest;
use App\Http\Requests\OtherRequest;
use Auth;

class ItemsController extends Controller
{
    public function indexBooks(Request $request)
    {
        $items=Item::Search($request->title)->where('item_type_id','=',1)->paginate(5);

        return view('admin.books.index')->with('items',$items);
    }

    public function createBooks()
    {
        if(Auth::user()->user_type_id==2){
            return view('admin.books.create');
        }
        return view('welcome');
    }

    public function storeBooks(BookRequest $request)
    {
        if(Auth::user()->user_type_id==2){
            $item=new Item($request->all());
            $items=Item::orderBy('id','DESC');
            $id=($items->first()->id) +1 ;
            $item->cod= "ART".sprintf('%03d',$id);
            $item->item_type_id=1;
            $item->save();

            Flash::message("Se ha registrado el libro ".$item->title);

            return redirect()->route('tk.items.books.index');
        }
        return view('welcome');
    }

    public function indexLaptops()
    {
        $items=Item::where('item_type_id','=',2)->paginate(5);

        return view('admin.laptops.index')->with('items',$items);
    }

    public function createLaptops()
    {
        if(Auth::user()->user_type_id==2){
            return view('admin.laptops.create');
        }
        return view('welcome');
    }

    public function storeLaptops(LaptopRequest $request)
    {
        if(Auth::user()->user_type_id==2){
            $item=new Item($request->all());
            $items=Item::orderBy('id','DESC');
            $id=($items->first()->id) +1 ;
            $item->cod= "ART".sprintf('%03d',$id);
            $item->item_type_id=2;
            $item->save();

            Flash::message("Se ha registrado la laptop ".$item->trademark." ".$item->model);

            return redirect()->route('tk.items.laptops.index');
        }
        return view('welcome');
    }

    public function indexOthers()
    {
        $items=Item::where('item_type_id','=',3)->paginate(5);

        return view('admin.others.index')->with('items',$items);
    }

    public function createOthers()
    {
        if(Auth::user()->user_type_id==2){
            return view('admin.others.create');
        }
        return view('welcome');
    }

    public function storeOthers(OtherRequest $request)
    {
        if(Auth::user()->user_type_id==2){
            $item = new Item($request->all());
            $items = Item::orderBy('id','DESC');
            $id=($items->first()->id) +1 ;
            $item->cod= "ART".sprintf('%03d',$id);
            $item->item_type_id=3;
            $item->save();
            
            Flash::message("Se ha registrado el item ".$item->name);
            
            return redirect()->route('tk.items.others.index');
        }
        return view('welcome');
    }

    public function assign($id){
        if(Auth::user()->user_type_id==2){
        $item = Item::find($id);
        $users=User::orderBy('name','ASC')->lists('name','id');

        return view('admin.assign')->with('users',$users)->with('item',$item);
        }
        return view('welcome');
    }

    public function update(Request $request,$id)
    {
        $item=Item::find($id);
        $item->users()->attach($request->users);

        Flash::message('Se ha asignado el artículo exitosamente');

        if($item->item_type_id==1) return redirect()->route('tk.items.books.index');
        else if($item->item_type_id==2) return redirect()->route('tk.items.laptops.index');
        else return redirect()->route('tk.items.others.index');
    }

    public function showUsers($id)
    {
        $item=Item::find($id);
        $users=$item->users;
        $user=$users->first();

        return view('admin.users')->with('user',$user)->with('users',$users);
    }
}