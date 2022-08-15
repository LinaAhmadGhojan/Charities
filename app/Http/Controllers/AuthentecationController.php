<?php

namespace App\Http\Controllers;


use App\Models\InformationUser;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;



class AuthentecationController extends Controller
{
    public function register(Request $request)
    {

       $information=InformationUser::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'gender' => $request->input('gender'),
                'id_country' => $request->input('id_country'),
                'birthday' => $request->input('birthday'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
               ]);

   $user= User::create([
    'id_information'=>$information->id,
    'email' => $request->input('email'),
    'role' => $request->input('role'),
    'password' => Hash::make($request->input('password'))
    ]);
  return  $token = $user->createToken('token')->plainTextToken;

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
        "token"=>$token,"user"=>$user], 200)->withCookie($cookie);
    }

    // public function profile(){
    //     return response()->json(User::get(),200);}





public function user(Request $request) {
    $token =$request->bearerToken();
    $personal= PersonalAccessToken::findToken($token);
    $id_information=  $user=$personal->tokenable->id_information;
    return response()->json(InformationUser::find($id_information));
    }





    public function profile($id){
        $user=DB::table('users')->select('users.id','users.email','role','phone','first_name','last_name','address','birthday','gender')
        ->join('information_users', 'information_users.id', '=', 'users.id_information')->Where('users.id','=',$id)->get();
        return response()->json($user,200);

    }
}
