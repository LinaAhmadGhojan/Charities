<?php

namespace App\Http\Controllers;

use App\Models\Doner;
use App\Http\Requests\StoreDonerRequest;
use App\Http\Requests\UpdateDonerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\InformationUser;
use App\Models\Charity;
use Illuminate\Support\Facades\Auth;

class DonerController extends Controller
{
    
    public function userCharity(Request $request)
     {
           $token =$request->bearerToken();
           $personal= PersonalAccessToken::findToken($token);
           return  $user=$personal->tokenable;
     }
 
     public function sortDoner(Request $request)
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

                $needer=Doner::create([
                    'id_information'=>$information->id, 
                    'id_charity' => $charity->id, 
                    "date"=> $request->input('date'), 
                    "quality"=>$request->input('quality'),
                ]);
                return response()->json(["message"=>"Success",], 200);
    }


    public function indexDoner(Request $request)
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

    public function addDoner(Request $request)
    {
        
         $charity= $this->userCharity($request);

        
        if (!Charity::find($charity->id)) {
            return response()->json(["message"=>"not found charity "], 401);
        }
          $country=\DB::table('countries')->select('name')->get();
          return response()->json($country);
       // return User::all()->res
    }

    public function deleteDoner($id)
    {

        $employee=Doner::find($id);
        if (!$employee)
        {
           return response()->json(["message"=>"not found Doner "], 401);
        }  

        else
        $employee->delete();
        return response()->json(["message"=>"Delete Doner "], 401);

    }
}
