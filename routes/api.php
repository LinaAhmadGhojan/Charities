<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentecationController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProjectCharityController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DonerController;
use App\Http\Controllers\Emloyee;
use App\Http\Controllers\NeederController;
use App\Http\Controllers\ProblemEntryController;

use App\Http\Controllers\AssemblyStockController;
use App\Models\AssemblyStock;
use App\Models\ProjectCharity;

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
Route::get('all-charities',[CharityController::class,'charities']);
Route::get('charity-details/{id}',[CharityController::class,'charityDetails']);
Route::get('all-projects',[ProjectCharityController::class,'projects']);
Route::get('user-profile/{id}',[AuthentecationController::class,'profile']);
Route::middleware('auth:sanctum')->group(function (){
    Route::get('my-profile',[AuthentecationController::class,'profile']);

});
///////////////////////////////////Charity///////////////////////
Route::post('charity/register',[CharityController::class,'register']);
Route::post('charity/login',[CharityController::class,'login'])->name('login');
Route::get('charity/my-profile/{id}',[CharityController::class,'profile']);
Route::get('projects/{charity_id}',[ProjectController::class,'projects']);
Route::get('get-projects-by-charity/{id_charity}',[ProjectCharityController::class,'getProjectsCharity']);
Route::post('add-project',[ProjectCharityController::class,'projectCharitySave']);
Route::get('my-profile/{id}',[CharityController::class,'profile']);
Route::post('charity/add-donation',[DonationController::class,'donationSave']);
Route::get('charity/upcoming-donations/{id_charity}',[DonationController::class,'upcomingDonations']);
Route::get('charity/pending-donations/{id_charity}',[DonationController::class,'pendingDonations']);
Route::get('charity/record-donations/{id_charity}',[DonationController::class,'recordDonations']);
Route::get('charity/edit-donations/{id}',[DonationController::class,'Updatedonations']);
 Route::get('my-profile',[AuthentecationController::class,'profile']);
 Route::post('charity/edit-profile/{id}',[CharityController::class,'charityUpdate']);


 ///////////////////////////////////Charity///////////////////////
 Route::post('charity/register',[CharityController::class,'register']);
 Route::get('charity/register',[CharityController::class,'get_register']);
 Route::post('charity/login',[CharityController::class,'login'])->name('login.charity');



 ///////************** group charity ***************** */
Route::group(['middleware' => ['auth:sanctum']], function () {

 //Route::post('charity/needer',[CharityController::class,'needer']);
//Route::get('charity/my-profile',[CharityController::class,'profile']);
//Route::get('projects/{charity_id}',[ProjectController::class,'projects']);
//Route::post('add-project',[ProjectCharityController::class,'projectCharitySave']);

});



     /////*****************  Employee   *********************/////
    Route::controller(Emloyee::class)->group(function () {
        Route::get('employee','indexEmployee');
        Route::post('add/employee','sortEmployee');
      //  Route::post('add/employee','addEmployee');
        Route::delete('delete/employee/{id}','deleteEmlpyee');
        Route::post('edit/employee/{id}','editEmployee');
        Route::get('get-employees/{id_charity}','getEmployee');

    });



 /////*****************  Needer  *********************/////
    Route::controller(NeederController::class)->group(function () {
        Route::get('needer','indexNeeder');
        Route::post('add/needer','sortNeeder');
        Route::get('add/needer','addNeeder');
        Route::delete('delete/needer/{id}','deleteNeeder');


    });


     /////*****************  doner  *********************/////
     Route::controller(DonerController::class)->group(function () {
        Route::get('doner','indexDoner');
        Route::post('add/doner','sortDoner');
        Route::get('add/doner','addDoner');
        Route::delete('delete/doner/{id}','deleteDoner');

    });

    ///////////////**********problems **************///////////
Route::post('charity/add-problem',[ProblemEntryController::class,'problemSave']);
Route::get('charity/upcoming-problem/{id_branch}',[ProblemEntryController::class,'upcomingProblem']);
Route::get('charity/pending-problem/{id_branch}',[ProblemEntryController::class,'pendingProblem']);
Route::get('charity/emergency-problem/{id_branch}',[ProblemEntryController::class,'emergencyProblem']);
Route::get('charity/record-problem/{id_branch}',[ProblemEntryController::class,'recordProblem']);
Route::get('charity/edit-problem/{id}',[ProblemEntryController::class,'problemUpdate']);

//////////////////////*************Assembly Stock******************** *////////////////

Route::get('charity/get-assembly/{id_charity}',[AssemblyStockController::class,'getAssemblyStock']);
Route::post('charity/add-to-assembly',[AssemblyStockController::class,'addToAssemblyStock']);


