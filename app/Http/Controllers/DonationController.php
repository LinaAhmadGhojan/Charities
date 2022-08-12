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
            'created_date'=>'required',
            'donated_thing'=>'required',
            'id_branch' => 'required'

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $donation  = Donations::create($request->all());
        return response()->json($donation,201);
    }
    public function upcomingDonations($id_branch){
        $projects = DB::table('donatinos')->select('id','first_name','last_name','created_date','donated_thing')->Where('type','=','upcoming')->Where('id_branch','=',$id_branch)->get();
        return response()->json($projects,200);
    }
    public function pendingDonations($id_branch){
        $projects = DB::table('donatinos')->select('id','first_name','last_name','created_date','donated_thing')->Where('type','=','pending')->Where('id_branch','=',$id_branch)->get();
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
    public function recordDonations($id_branch){
        $projects = DB::table('donatinos')->select('id','first_name','last_name','created_date','donated_thing')->Where('type','=','record')->Where('id_branch','=',$id_branch)->orderBy('created_date', 'DESC')->get();
        return response()->json($projects,200);
    }
}
