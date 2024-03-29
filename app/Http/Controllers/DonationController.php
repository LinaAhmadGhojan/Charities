<?php

namespace App\Http\Controllers;

use App\Models\Donations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class DonationController extends Controller
{
    public function donationSave(Request $request){
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'created_at'=>'required',
            'donated_thing'=>'required',
            'id_charity' => 'required',
            'id_project'

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $donation  = Donations::create($request->all());
        return response()->json($donation,201);
    }
    public function upcomingDonations($id_charity){
        $projects = DB::table('donatinos')->select('id','first_name','last_name','created_date','donated_thing')->Where('type','=','upcoming')->Where('id_charity','=',$id_charity)->get();
        return response()->json($projects,200);
    }
    public function pendingDonations($id_charity){
        $projects = DB::table('donatinos')->select('id','first_name','last_name','created_date','donated_thing')->Where('type','=','pending')->Where('id_charity','=',$id_charity)->get();
        return response()->json($projects,200);
    }
    public function donationUpdate(Request $request, $id){
        $problem = Donations::find($id);
        if(is_null($problem)){
            return response()->json(["message"=>"Record not found"],404);
        }
        $problem->update($request->all());
        return response()->json($problem,200);
    }
    public function recordDonations($id_charity){
        $projects = DB::table('donatinos')->select('id','first_name','last_name','created_date','donated_thing')->Where('type','=','record')->Where('id_charity','=',$id_charity)->orderBy('created_at', 'DESC')->get();
        return response()->json($projects,200);
    }
    public function recordsDonations(Request $request,$id_charity){
        $month = $request->month;
        $records = Donations::whereMonth('created_at', '=', $month)->Where('type','=','record')->Where('id_charity','=',$id_charity)
              ->count();
         $users=DB::table('users')->count();
         $avg = ($records / $users * 100);
         return response()->json($avg,200);

    }
    public function recordsDonationsByYear(Request $request,$id_charity){
        $year = $request->year;
        $records = Donations::whereYear('created_at', '=', $year)->Where('type','=','record')->Where('id_charity','=',$id_charity)
              ->count();
         $users=DB::table('users')->count();
         $avg = ($records / $users * 100);
         return response()->json($avg,200);

    }
}
