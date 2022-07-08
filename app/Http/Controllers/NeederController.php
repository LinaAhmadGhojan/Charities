<?php

namespace App\Http\Controllers;

use App\Models\Needer;
use App\Http\Requests\StoreNeederRequest;
use App\Http\Requests\UpdateNeederRequest;
use App\Models\Charity;
use Illuminate\Support\Facades\Auth;
use DB;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\InformationUser;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;


class NeederController extends Controller
{

    
    public function userCharity(Request $request)
     {
           $token =$request->bearerToken();
           $personal= PersonalAccessToken::findToken($token);
           return  $user=$personal->tokenable;
     }
 
     public function sortNeeder(Request $request)
    {
        
        $charity= $this->userCharity($request);
        
        if (!Charity::find($charity->id)) {
            return response()->json(["message"=>"not found charity "], 401);
        }

    
      $information=InformationUser::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'id_country' => $request->input('id_country'),
                'birthday' => $request->input('birthday'),
                'address' => $request->input('address'),
                'phone'=> $request->input('phone'), 

              
                ]);

                $needer=Needer::create([
                    'id_information'=>$information->id, 
                    'id_charity' => $charity->id, 
                    "start"=> $request->input('start'), 
                    "accept"=>1,
                ]);
                return response()->json(["message"=>"Success",], 200);
    }


    public function indexNeeder(Request $request)
    {
        $charity= $this->userCharity($request);
        if (!Charity::find($charity->id)) {
            return response()->json(["message"=>"not found charity "], 401);
        }
        $employee=DB::table('needers')
        ->join('information_users','information_users.id','=','needers.id_information')
        ->where('id_charity',$charity->id)->get();
        
        return response()->json($employee);
    }

    public function addNeeder(Request $request)
    {
        
         $charity= $this->userCharity($request);

        
        if (!Charity::find($charity->id)) {
            return response()->json(["message"=>"not found charity "], 401);
        }
          $country=\DB::table('countries')->select('name')->get();
          return response()->json($country);
       // return User::all()->res
    }

    public function deleteNeeder($id)
    {

        $employee=Needer::find($id);
        if (!$employee)
        {
           return response()->json(["message"=>"not found Needer "], 401);
        }  

        else
        $employee->delete();
        return response()->json(["message"=>"Delete Needer "], 401);

    }

}
