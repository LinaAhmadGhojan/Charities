<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentecationController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProjectCharityController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user', function () {
    return 'hello';
});
///////////////////////Users//////////////////////////////////
Route::post('register',[AuthentecationController::class,'register']);
Route::post('login',[AuthentecationController::class,'login'])->name('login');
//Route::get('my-profile',[AuthentecationController::class,'profile']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('my-profile',[AuthentecationController::class,'profile']);

});
///////////////////////////////////Charity///////////////////////
Route::post('charity/register',[CharityController::class,'register']);
Route::post('charity/login',[CharityController::class,'login'])->name('login');
Route::get('charity/my-profile',[CharityController::class,'profile']);
Route::get('projects/{charity_id}',[ProjectController::class,'projects']);
Route::post('add-project',[ProjectCharityController::class,'projectCharitySave']);
Route::get('my-profile/{id}',[CharityController::class,'profile']);
Route::post('charity/add-donation',[DonationController::class,'donationSave']);
Route::get('charity/upcoming-donations/{id_branch}',[DonationController::class,'upcomingDonations']);
Route::get('charity/pending-donations/{id_branch}',[DonationController::class,'pendingDonations']);
