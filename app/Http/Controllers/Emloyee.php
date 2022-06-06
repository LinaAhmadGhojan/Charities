<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class Emloyee extends Controller
{
    public function sortEmployee(Request $request,$id_charity)
    {
        
        
        if (!Charity::find($id_charity)) {
            return response()->json(["message"=>"not found charity "], 401);
        }

        
     
      $employee=Employee::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'type' => $request->input('type'),
                'id_country' => $request->input('id_country'),
                'birthday' => $request->input('birthday'),
                'address' => $request->input('address'),
                'salary' => $request->input('salary'),
                'start' => $request->input('start'), 
                'id_charity' => $id_charity, 
                'phone'=> $request->input('phone'), 
                ]);

                return response()->json(["message"=>"Success",], 200);
    }

    public function indexEmployee($id_charity)
    {
        if (!Charity::find($id_charity)) {
            return response()->json(["message"=>"not found charity "], 401);
        }
        return response()->json(Employee::where('id_charity',$id_charity)->get());
       // return User::all()->res
    }

    public function addEmployee($id_charity)
    {
        if (!Charity::find($id_charity))
         {
            return response()->json(["message"=>"not found charity "], 401);
         }
          $country=DB::table('countries')->select('name')->get();
          return response()->json($country);
       // return User::all()->res
    }
}
