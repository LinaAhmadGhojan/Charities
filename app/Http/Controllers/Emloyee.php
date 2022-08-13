<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\Country;
use App\Models\Employee;
use App\Models\InformationUser;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;

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

        // $charity= $this->userCharity($request);

        // if (!Charity::find($charity->id)) {
        //     return response()->json(["message"=>"not found charity "], 401);
        // }


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
                    // 'id_charity' => $charity->id,
                    'id_charity' =>$request->input('id_charity')
                ]);
                return response()->json($employee, 201);
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

      //  $charity= $this->userCharity($request);
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
      $rules = [
        'id_information'=>$information->id,
        'type'=> 'required' ,
        'salary'=> 'required' ,
        'start',
        'id_charity'=> 'required',

    ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $employee  = Employee::create($request->all());
        return response()->json($employee,201);
        // if (!Charity::find($charity->id)) {
        //     return response()->json(["message"=>"not found charity "], 401);
        // }
        //   $country=DB::table('countries')->select('name')->get();
        //   return response()->json($country);
       // return User::all()->res
    }

    public function deleteEmlpyee($id)
    {

         // $charity= $this->userCharity($request);

        // if (!Charity::find($charity->id)) {
        //     return response()->json(["message"=>"not found charity "], 401);
        // }

        $employee = Employee::find($id);
        //$information = InformationUser::find($employee->id_information);
        $information_id = $employee->id_information;
        //$employee->delete();
      //$information->delete();
      DB::delete('DELETE FROM employees WHERE id = ?', [$id]);
      DB::delete('DELETE FROM information_users WHERE id = ?', [$information_id]);
        return response()->json('deleted successfuly', 204);

    }
    public function editEmployee(Request $request,$id)
    {
         // $charity= $this->userCharity($request);

        // if (!Charity::find($charity->id)) {
        //     return response()->json(["message"=>"not found charity "], 401);
        // }

        $employee = Employee::find($id);
        $information = InformationUser::find($employee->id_information);
      $information->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'gender' => $request->input('gender'),
        'id_country' => $request->input('id_country'),
        'birthday' => $request->input('birthday'),
        'address' => $request->input('address'),
        'phone'=> $request->input('phone'),

        ]);

        $employee->update([
            'id_information'=>$information->id,
            'type' => $request->input('type'),
            'salary' => $request->input('salary'),
            'start' => $request->input('start'),
            // 'id_charity' => $charity->id,
            'id_charity' =>$request->input('id_charity')
        ]);
        return response()->json($employee, 200);
    }

    public function getEmployee($id_charity){
        $employee=DB::table('employees')
        ->join('information_users','information_users.id','=','employees.id_information')
        ->where('id_charity',$id_charity)->get();

        return response()->json($employee);


    }
}
