<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $items=Item::orderBy('id','ASC')->paginate(5);
        return view('admin.items.books')->with('items',$items);
    }*/
    public function indexBooks()
    {
        //
        $items=Item::where('item_type_id','=',1)->paginate(5);
        return view('admin.books.index')->with('items',$items);

    }
    public function createBooks(){
    	return view('admin.books.create');

    }
    public function storeBooks(Request $request){
    	$item=new Item($request->all());
    	$items=Item::orderBy('id','DESC');
    	$id=($items->first()->id) +1 ;
    	$cant=strlen((string)$id);
    	if($cant==1) $cod="ART00".$id;
    	else if($cant==2) $cod="ART0".$id;
    	else $cod="ART".$id;
    	//dd($cod);
    	$item->cod=$cod;
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
    public function createLaptops(){
    	return view('admin.laptops.create');

    }
    public function storeLaptops(Request $request){
    	$item=new Item($request->all());
    	$items=Item::orderBy('id','DESC');
    	$id=($items->first()->id) +1 ;
    	$cant=strlen((string)$id);
    	if($cant==1) $cod="ART00".$id;
    	else if($cant==2) $cod="ART0".$id;
    	else $cod="ART".$id;
    	//dd($cod);
    	$item->cod=$cod;
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
    public function createOthers(){
    	return view('admin.others.create');

    }
    public function storeOthers(Request $request){
    	$item=new Item($request->all());
    	$items=Item::orderBy('id','DESC');
    	$id=($items->first()->id) +1 ;
    	$cant=strlen((string)$id);
    	if($cant==1) $cod="ART00".$id;
    	else if($cant==2) $cod="ART0".$id;
    	else $cod="ART".$id;
    	//dd($cod);
    	$item->cod=$cod;
    	$item->item_type_id=3;
    	$item->save();
    	Flash::message("Se ha registrado el item ".$item->name);
    	return redirect()->route('tk.items.others.index');
    }







    public function assign($id){
    	$item=Item::find($id);
    	//$user_id
    	$users=User::orderBy('name','ASC')->lists('name','id');
    	return view('admin.assign')->with('users',$users)->with('item',$item);
    }
    public function update(Request $request,$id){
    	$item=Item::find($id);
    	$item->users()->sync($request->users);
        Flash::message('Se ha asignado el artículo exitosamente');
    	if($item->item_type_id==1) return redirect()->route('tk.items.books.index');
    	else if($item->item_type_id==2) return redirect()->route('tk.items.laptops.index');
    	else return redirect()->route('tk.items.others.index');
    }
    public function showUsers($id){
    	$item=Item::find($id);
    	$users=$item->users;
    	$user=$users->first();
    	//dd($user);
    	return view('admin.users')->with('user',$user)->with('users',$users);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
 /*    */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  /*  public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function destroy($id)
    {
        //
    }*/
}
