<?php

use App\Http\NylasOAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Nylas\Client;
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
    return view('welcome');
});

Route::get('login', function () {


    return redirect(NylasOAuth::getAuthorizationURL());

});

Route::get('callback', function (Request $request) {
    dd(NylasOAuth::getNylasClient()
                        ->Authentication()
                        ->Hosted()
                        ->postOAuthToken($request->input('code')));
});
