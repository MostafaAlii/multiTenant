<?php
namespace App\Http\Controllers\Dashboard;
use App\Facades\Tenants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function index() {
        return Tenants::getTenant();
        //return $users = DB::table('users')->get();
    }
}