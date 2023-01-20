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
    $host = $request->getHost();
    $tenant_array = [
        'www.multi.test' => 'multi',
        'app1.multi.test' => 'school',
        'app2.multi.test' => 'news',
    ];
    if(in_array($host, array_keys($tenant_array))){
        //config(['database.connections.mysql.database' => $tenant_array[$host]]);
        $db = $tenant_array[$host];
        DB::purge('mysql');
        Config::set('database.connections.mysql.database', $tenant_array[$host]);
        DB::reconnect('mysql');
    }
    dd(DB::table('admins')->get()->toArray());
    return view('welcome', ['host' => $host]);
});