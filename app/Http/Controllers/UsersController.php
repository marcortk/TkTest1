<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests;
use App\UserType;

class UsersController extends Controller
{
    public function index()
    {
        $users=User::orderBy('id','ASC')->paginate(5);
        
        return view('admin.users.index')->with('users',$users);
    }

    public function create()
    {
        $types=UserType::orderBy('name','DESC')->lists('name','id');

        return view('admin.users.create')->with('types',$types);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->password= bcrypt($request->input('password',1234));
        $user->name= $request->input('name');
        $user->address= $request->input('address');
        $user->email= $request->input('email');
        $user->user_type_id= $request->input('user_type_id');
        $user->save();

        Flash::message("Se ha registrado".$user->name." de forma exitosa");

        return redirect()->route('tk.users.index');
    }

    
}
