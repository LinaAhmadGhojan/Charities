<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;
trait user {

  public function user(Request $request)
  {
 $token =$request->bearerToken();
 $personal= PersonalAccessToken::findToken($token);
  return  $user=$personal->tokenable;
  }
}