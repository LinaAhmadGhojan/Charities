<?php

namespace App\Http\Controllers;

use App\Models\AssemblyStock;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCharityRequest;
use App\Http\Requests\UpdateCharityRequest;

use App\Http\Traits\IDToken;
use App\Models\Country;
use App\Models\Service;
use App\Models\ServiceCharity;
use App\Models\SpecialCharity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AssemblyStockController extends Controller
{
    public function getAssemblyStock($id_charity){
        $assembly = DB::table('assembly__stock')->select('id','sum','type')->Where('id_chartiy','=',$id_charity)->get();

        return response()->json($assembly,200);
    }
    public function addToAssemblyStock(Request $request){
        $type = $request->type;
        $sum = $request->sum;
        $id_charity = $request->id_chartiy;
        $assembly = DB::table('assembly__stock')->select('id','sum','type')->Where('id_chartiy','=',$id_charity)->Where('type','=',$type)->get();
        if($assembly->isEmpty()){
            $newAssembly  = AssemblyStock::create($request->all());
            return response()->json($newAssembly,201);
        }
        else{
           $id = $assembly->first()->id;
            $assemblyNew = AssemblyStock::find($id)->increment('sum', $sum);
           // $assemblyNew->update($assemblyNew->all());
            return response()->json($assemblyNew,200);
        }
    }
}
