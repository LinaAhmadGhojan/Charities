<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentecationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $SERVER_API_KEY = 'BEs8u0HO42w7vO4djQab46JPfEdu5WzaAX3fP4_Npmtelybz-NBLnNGTuEovqZsLSJpH8k3xF1xMucWrdFIWUfI';

    $token_1 = 'Test Token';

    $data = [

        "registration_ids" => [
            $token_1
        ],

        "notification" => [

            "title" => 'Welcome',

            "body" => 'Description',

            "sound"=> "default" // required for sound on ios

        ],

    ];

    $dataString = json_encode($data);

    $headers = [

        'Authorization: key=' . $SERVER_API_KEY,

        'Content-Type: application/json',

    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);

    dd($response);
});
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/app', function () {
//     return view('welcome');
// });
// Route::get('user', function () {
//     return 'hello';
// });
// Route::get('register',[AuthentecationController::class,'register']);
