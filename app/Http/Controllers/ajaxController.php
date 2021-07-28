<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use DB;
use Session;

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
            'firstname'     => $request->firstname,
            'lastname'      => $request->lastname,
            'email'         => $request->email,
            'password'      => $request->password,
        ];

        $users = User::create($data);
        Session::put('nama', $request->firstname);
        
        return response()->json(['success' => 1]);

    }

    public function logout(Request $request){
        session()->forget('nama');
        return response()->json(['success' => 1]);
    }
}
