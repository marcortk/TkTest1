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
    }

    public function store(Request $request)
    {
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
