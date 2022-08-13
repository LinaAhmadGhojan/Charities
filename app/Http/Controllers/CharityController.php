<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Http\Requests\StoreCharityRequest;
use App\Http\Requests\UpdateCharityRequest;

use App\Http\Traits\IDToken;
use App\Models\Country;
use App\Models\Service;
use App\Models\ServiceCharity;
use App\Models\SpecialCharity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;

class CharityController extends Controller
{
   public function userCharity(Request $request)
     {
    $token =$request->bearerToken();
    $personal= PersonalAccessToken::findToken($token);
     return  $user=$personal->tokenable;
     }

     public function get_register()
     {
  $country=DB::table('countries')->select('name_en','name_ar','id')->get();
  $service=DB::table('services')->select('name_en','name_ar','id')->get();
  $specials=DB::table('specials')->select('name_en','name_ar','id')->get();
   return response()->json(["country"=>$country,"service"=>$service,"specials"=>$specials]);
     }

    public function register(Request $request)
    {
       // return $request;
        //echo('request');
        $service_array=$request->service;
        $special_array=$request->special;
        $number_service= count($request->service);
        $number_spical=count($request->special);
        $charity= Charity::create([
                "id_country"=>$request->input('id_country'),
                'name' => $request->input('name'),
                'user_name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'description'=>$request->input('description'),
                'password' => Hash::make($request->input('password'))]
        );

     for($i=0;$i<$number_service;$i++)
     {
        ServiceCharity::create([
            "id_charity"=>$charity->id,
            "id_service"=>$service_array[$i]
          ]);
     }

     for($i=0;$i<$number_service;$i++)
     {
        SpecialCharity::create([
            "id_charity"=>$charity->id,
            "id_special"=>$special_array[$i]
          ]);
     }

     $token = $charity->createToken('token')->plainTextToken;
     $cookie=cookie('jwt',$token,60*24);
     return response()->json(["message"=>"Success",
     "token"=>$token,"id"=>$charity->id], 200)->withCookie($cookie);

    }



    public function login(Request $request)
    {


        $charity = $request->only('name', 'password');
        if (!Auth('charity')->attempt($charity)) {
            return response()->json(["message"=>"Login Failed"], 401);
        }

         /** @var \App\Models\Charity $charity **/
        $charity =Auth('charity')->user();
        $token = $charity->createToken('token')->plainTextToken;
        $cookie=cookie('jwt',$token,60*24);
        return response()->json(["message"=>"Success",

        "token"=>$token,"id"=>$charity->id], 200)->withCookie($cookie);
    }


    public function profile($id){

        //return  $charity=$this->userCharity($request);
        return response()->json(Charity::find($id),200);
    }


    public function needer(Request  $request )
    {
     return  $charity=$this->userCharity($request);
    }

    public function charityUpdate(Request $request, $id){
        $charity = Charity::find($id);
        if(is_null($charity)){
            return response()->json(["message"=>"Record not found"],404);
        }
        $charity->update($request->all());
        return response()->json($charity,200);
    }
    public function charities(){
        $charity=DB::table('charities')->select('name','email','phone','description','name_ar','address')
        ->join('countries', 'countries.id', '=', 'charities.id_country')->get();
        return response()->json($charity,200);

    }
    public function charityDetails($id){
        $charity=DB::table('charities')->select('name','email','phone','description','name_ar','address')
        ->join('countries', 'countries.id', '=', 'charities.id_country')->Where('charities.id','=',$id)->get();
        $service=DB::table('services')->select('name_ar')
        ->join('service_charities','services.id','=','service_charities.id_service')->Where('service_charities.id_charity','=',$id)->get();
        $specials=DB::table('specials')->select('name_ar')
        ->join('special_charities','specials.id','=','special_charities.id_special')->Where('special_charities.id_charity','=',$id)->get();
        return response()->json(["charity"=>$charity,"service"=>$service,"specials"=>$specials],200);

    }



}
