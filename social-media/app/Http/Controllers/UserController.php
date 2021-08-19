<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $name = $request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $id=DB::table('users')->insertGetId([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password
        ]);
        return $id;
    }

    public function getAllUsers()
    {
        $users = DB::table('users')->get();
        return $users;
    }

    public function getUserById($id)
    {
        $users = DB::table('users')->where('id','=',$id)->get();
        return $users;
    }
}
