<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class UsersController extends Controller
{
    public function index()
    {
        $users=User::orderBy('id','ASC')->paginate(5);
        
        return view('admin.users.index')->with('users',$users);
    }

    public function create()
    {
        if(Auth::user()->user_type_id==2){
            dd('hola');
        }
        $types=UserType::orderBy('name','DESC')->lists('name','id');
        return view('admin.users.create')->with('types',$types);
    }

    public function store(Request $request)
    {
        $user= new User($request->all());
        $user->password=$request->password;
        $user->save();

        Flash::message("Se ha registrado".$user->name." de forma exitosa");

        return redirect()->route('tk.users.index');
    }


}
