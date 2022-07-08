<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\Country;
use App\Models\Employee;
use App\Models\InformationUser;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Laravel\Sanctum\PersonalAccessToken;

class Emloyee extends Controller
{

    public function userCharity(Request $request)
     {
    $token =$request->bearerToken();
    $personal= PersonalAccessToken::findToken($token);
     return  $user=$personal->tokenable;
     }

   
   
   
   
     public function sortEmployee(Request $request)
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

                $employee=Employee::create([
                    'id_information'=>$information->id,
                    'type' => $request->input('type'),
                    'salary' => $request->input('salary'),
                    'start' => $request->input('start'), 
                    'id_charity' => $charity->id, 
                ]);
                return response()->json(["message"=>"Success",], 200);
    }


    public function indexEmployee(Request $request)
    {
        $charity= $this->userCharity($request);
        if (!Charity::find($charity->id)) {
            return response()->json(["message"=>"not found charity "], 401);
        }
        $employee=DB::table('employees')
        ->join('information_users','information_users.id','=','employees.id_information')
        ->where('id_charity',$charity->id)->get();
        
        return response()->json($employee);
    }

    public function addEmployee(Request $request)
    {
        
        $charity= $this->userCharity($request);

        
        if (!Charity::find($charity->id)) {
            return response()->json(["message"=>"not found charity "], 401);
        }
          $country=\DB::table('countries')->select('name')->get();
          return response()->json($country);
       // return User::all()->res
    }

    public function deleteEmlpyee($id)
    {

        $employee=Employee::find($id);
        if (!$employee)
        {
           return response()->json(["message"=>"not found employee "], 401);
        }  

        else
        $employee->delete();
        return response()->json(["message"=>"Delete employee "], 401);

    }
}
