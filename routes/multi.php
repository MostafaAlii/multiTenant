<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Config, Route};

/*
|--------------------------------------------------------------------------
| Multi Routes
|--------------------------------------------------------------------------
|
| Here is where you can register multi routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    //dd(DB::table('tenants')->get()->toArray());
    return view('welcome');
});

Route::get('/test', [App\Http\Controllers\Dashboard\HomeController::class, 'index']);