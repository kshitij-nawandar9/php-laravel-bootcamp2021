<?php

namespace App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Service
{
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'email' => ['email:rfc,dns','unique:users'],
            'password' => ['required', 'max:255', 'min:7'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }


        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $id = DB::table('users')->insertGetId([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
        return $this->getUserById($id);
    }

    public function getAllUsers()
    {
        return DB::table('users')->get();
    }

    public function getUserById($id)
    {
        return DB::table('users')->where('id', '=', $id)->get();
    }
}
