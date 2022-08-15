<?php

namespace App\Http\Controllers;

use App\Models\ProblemEntry;
use App\Http\Requests\StoreProblemEntryRequest;
use App\Http\Requests\UpdateProblemEntryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProblemEntryController extends Controller
{
    public function problemSave(Request $request){
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'id_type_problem'=>'required',
            'phone'=>'required',
            'status'=>'required',
            'description' => 'required',
            'attchment',
            'id_user_enter',
            'id_charity',

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $problem  = ProblemEntry::create($request->all());
        return response()->json($problem,201);
    }
    public function upcomingProblem($id_charity){
        $projects = DB::table('problem_entries')->select('id','first_name','last_name','status')->Where('id_type_problem','=',1)->Where('id_charity','=',$id_charity)->get();
        return response()->json($projects,200);
    }
    public function pendingProblem($id_charity){
        $projects = DB::table('problem_entries')->select('id','first_name','last_name','status')->Where('id_type_problem','=',2)->Where('id_charity','=',$id_charity)->get();
        return response()->json($projects,200);
    }
    public function emergencyProblem($id_charity){
        $projects = DB::table('problem_entries')->select('id','first_name','last_name','status')->Where('id_type_problem','=',3)->Where('id_charity','=',$id_charity)->get();
        return response()->json($projects,200);
    }
    public function recordProblem($id_charity){
        $projects = DB::table('problem_entries')->select('id','first_name','last_name','status')->Where('id_type_problem','=',4)->Where('id_charity','=',$id_charity)->orderBy('created_at', 'DESC')->get();
        return response()->json($projects,200);
    }
    public function problemUpdate(Request $request, $id){
        $problem = ProblemEntry::find($id);
        if(is_null($problem)){
            return response()->json(["message"=>"Record not found"],404);
        }
        $problem->update($request->all());
        return response()->json($problem,200);
    }
    public function recordsNeedersByMonth(Request $request,$id_charity){
        $month = $request->month;
        $records = ProblemEntry::whereMonth('created_at', '=', $month)->Where('id_type_problem','=',4)->Where('id_charity','=',$id_charity)
              ->count();
         $users=DB::table('users')->count();
         $avg = ($records / $users * 100);
         return response()->json($avg,200);

    }
    public function recordsNeedersByYear(Request $request,$id_charity){
        $year = $request->year;
        $records = ProblemEntry::whereMonth('created_at', '=', $year)->Where('id_type_problem','=',4)->Where('id_charity','=',$id_charity)
              ->count();
         $users=DB::table('users')->count();
         $avg = ($records / $users * 100);
         return response()->json($avg,200);

    }

}
