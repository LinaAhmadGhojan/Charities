<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthentecationController extends Controller
{
    public function register(Request $request)
    {
        echo('request');
        return User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'id_country' => $request->input('id_country'),
                'birthday' => $request->input('birthday'),
                'id_city' => $request->input('id_city'),
                'password' => Hash::make($request->input('password'))]
        );
    }
    public function login(Request $request)
    {
        $user = $request->only('email', 'password');
        if (!Auth::attempt($user)) {
            return response()->json(["message"=>"Login Failed"], 401);
        }
         /** @var \App\Models\User $user **/
        $user =Auth::user() ;
        $token = $user->createToken('token')->plainTextToken;
        $cookie=cookie('jwt',$token,60*24);
        return response()->json(["message"=>"Success",
        "token"=>$token], 200)->withCookie($cookie);
    }
    public function profile(){
        return response()->json(User::get(),200);

    }
}
