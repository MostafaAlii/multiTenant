<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function index(Request $request) {
        dd(DB::getDefaultConnection());
    }
}