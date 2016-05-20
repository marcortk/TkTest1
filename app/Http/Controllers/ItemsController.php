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

class ItemsController extends Controller
{
    public function indexBooks(Request $request)
    {
        $items=Item::Search($request->title)->where('item_type_id','=',1)->paginate(5);

        return view('admin.books.index')->with('items',$items);
    }

    public function createBooks()
    {
        return view('admin.books.create');
    }

    public function storeBooks(BookRequest $request)
    {
        $item=new Item($request->all());
        $items=Item::orderBy('id','DESC');
        $id=($items->first()->id) +1 ;
        $item->cod= "ART".sprintf('%03d',$id);
        $item->item_type_id=1;
        $item->save();

        Flash::message("Se ha registrado el libro ".$item->title);

        return redirect()->route('tk.items.books.index');
    }

    public function indexLaptops()
    {
        $items=Item::where('item_type_id','=',2)->paginate(5);

        return view('admin.laptops.index')->with('items',$items);
    }

    public function createLaptops()
    {
        return view('admin.laptops.create');
    }

    public function storeLaptops(LaptopRequest $request)
    {
        $item=new Item($request->all());
        $items=Item::orderBy('id','DESC');
        $id=($items->first()->id) +1 ;
        $item->cod= "ART".sprintf('%03d',$id);
        $item->item_type_id=2;
        $item->save();

        Flash::message("Se ha registrado la laptop ".$item->trademark." ".$item->model);

        return redirect()->route('tk.items.laptops.index');
    }

    public function indexOthers()
    {
        $items=Item::where('item_type_id','=',3)->paginate(5);

        return view('admin.others.index')->with('items',$items);
    }

    public function createOthers()
    {
        return view('admin.others.create');
    }

    public function storeOthers(OtherRequest $request)
    {
        $item = new Item($request->all());
        $items = Item::orderBy('id','DESC');
        $id=($items->first()->id) +1 ;
        $item->cod= "ART".sprintf('%03d',$id);
        $item->item_type_id=3;
        $item->save();
        
        Flash::message("Se ha registrado el item ".$item->name);
        
        return redirect()->route('tk.items.others.index');
    }
 
    public function assign($id){
        $item = Item::find($id);
        $users=User::orderBy('name','ASC')->lists('name','id');

        return view('admin.assign')->with('users',$users)->with('item',$item);
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