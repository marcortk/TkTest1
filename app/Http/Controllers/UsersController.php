<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
use Laracasts\Flash\Flash;
use App\Http\Requests;
use Auth;

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
            $types=UserType::orderBy('name','DESC')->lists('name','id');
            return view('admin.users.create')->with('types',$types);
        }
        return view('welcome');
    }

    public function store(Request $request)
    {
        if(Auth::user()->user_type_id==2){
            $user= new User($request->all());
            $user->password=bcrypt($request->password);
            $user->save();
            Flash::message("Se ha registrado".$user->name." de forma exitosa");
            return redirect()->route('tk.users.index');
        }
        return view('welcome');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
