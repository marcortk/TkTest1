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
        return view('admin.books.create');
    }

    public function storeBooks(BookRequest $request)
    {
        $item= new Item;
        $item->title = $request->input('title');
        $item->author = $request->input('author');
        $item->language = $request->input('language');
        $item->genre = $request->input('genre');
        $item->p_date = $request->input('p_date');
        $items=Item::orderBy('id','DESC')->where('item_type_id','=',1)->get();
        $id=count($items)+1;
        $item->cod= sprintf('LIB%03d',$id);
        $item->item_type_id=1;
        $item->save();

        Flash::message("Se ha registrado el libro ".$item->title);

        return redirect()->route('tk.items.books.index');
;
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
        $laptop=new Item;
        $laptop->trademark = $request->input('trademark');
        $laptop->model = $request->input('model');
        $laptop->capacity = $request->input('capacity');
        $laptop->ram = $request->input('ram');
        $laptop->price = $request->input('price');
        $laptops=Item::orderBy('id','DESC')->where('item_type_id','=',2)->get();
        $id=count($laptops)+1;
        $laptop->cod= sprintf('LAP%03d',$id);
        $laptop->item_type_id=2;
        $mouse = new Item;
        $mouse->mouse_trademark = $request->input('mouse_trademark');
        $mouses=Item::orderBy('id','DESC')->where('item_type_id','=',3)->get();
        $id2=count($mouses)+1;
        $mouse->cod= sprintf('MOU%03d',$id);
        $laptop->laptop_cod = $mouse->cod;
        $laptop->save();
        $mouse->save();

        Flash::message("Se ha registrado la laptop ".$laptop->trademark." ".$laptop->model);

        return redirect()->route('tk.items.laptops.index');
    }

    public function indexOthers()
    {
        $items=Item::where('item_type_id','=',4)->paginate(5);

        return view('admin.others.index')->with('items',$items);
    }

    public function createOthers()
    {
        return view('admin.others.create');
    }

    public function storeOthers(OtherRequest $request)
    {
        $item = new Item;
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $items=Item::orderBy('id','DESC')->where('item_type_id','=',4)->get();
        $id=count($items)+1;
        $item->cod= sprintf('OTR%03d',$id);
        $item->item_type_id=4;
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
        $user=User::find($request->users);
        $itemType=$item->item_type_id;
        $userItems=($user->items())->where('item_type_id','=',$itemType)->get();

        if(count($userItems)>0){
            Flash::message('Este usuario ya tiene un artículo del mismo tipo');
        }
        else{
            if($itemType==2){
                $mouse=Item::where('cod','=',$item->laptop_cod)->get();
                $mouse->users()->attach($request->users);
            }
            $item->users()->attach($request->users);

            Flash::message('Se ha asignado el artículo exitosamente');
        }

        if($itemType==1) return redirect()->route('tk.items.books.index');
        else if($itemType==2) return redirect()->route('tk.items.laptops.index');
        else if($itemType==4) return redirect()->route('tk.items.others.index');
    }

    public function showUsers($id)
    {
        $item=Item::find($id);
        $users=$item->users;
        $user=$users->first();

        return view('admin.users')->with('user',$user)->with('users',$users);
    }
}