<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use app\User;
use DB;

class ajaxController extends Controller
{
    public function login(Request $request){

        $hasil = DB::table('users')->select('firstname','email','password')
        ->where('email', '=', $request->email)
        ->where('password', '=', $request->password)
        ->first();

        if($hasil != null){
            session()->put('nama', $hasil->firstname);
            return response()->json(['success' => 1]);
        }else{
            return response()->json(['success' => 0]);
        }

    }

    public function register(Request $request){

        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password
        ];

        // $data = [
        //     'firstname' => "test",
        //     'lastname' => "test",
        //     'email' => "test",
        //     'password' => "test"
        // ];

        DB::table('users')->create([
                'firstname' => "test",
                'lastname' => "test",
                'email' => "test",
                'password' => "test",
                'created_at' => 'adf',
                'update_at' => 'asdf'
            ]);
        // if($result->id != null){
        //     session()->put('nama', $hasil->firstname);
        //     return response()->json(['success' => 1]);
        // }else{
        //     return response()->json(['success' => 0]);
        // }

        return response()->json(['success' => $data]);

    }

    public function logout(Request $request){
        session()->forget('nama');
        return response()->json(['success' => 1]);
    }
}
