<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentecationController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\DonerController;
use App\Http\Controllers\Emloyee;
use App\Http\Controllers\NeederController;
use App\Http\Controllers\ProjectCharityController;

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
 Route::get('my-profile',[AuthentecationController::class,'profile']);



 ///////////////////////////////////Charity///////////////////////
 Route::post('charity/register',[CharityController::class,'register']);
 Route::get('charity/register',[CharityController::class,'get_register']);
 Route::post('charity/login',[CharityController::class,'login'])->name('login.charity');



 ///////************** group charity ***************** */
Route::group(['middleware' => ['auth:sanctum']], function () {

 Route::post('charity/needer',[CharityController::class,'needer']);
Route::get('charity/my-profile',[CharityController::class,'profile']);
Route::get('projects/{charity_id}',[ProjectController::class,'projects']);
Route::post('add-project',[ProjectCharityController::class,'projectCharitySave']);

});



     /////*****************  Employee   *********************/////
    Route::controller(Emloyee::class)->group(function () {
        Route::get('employee','indexEmployee');
        Route::post('add/employee','sortEmployee');
        Route::get('add/employee','addEmployee');
        Route::delete('delete/employee/{id}','deleteEmlpyee');

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


   