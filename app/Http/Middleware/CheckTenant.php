<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Config};

class CheckTenant {
    public function handle(Request $request, Closure $next) {
        $host = $request->getHost();
        $tenant = DB::table('tenants')->whereDomain($host)->first();
        if($tenant->domain_type !== config('tenant.primary_domain.domain_type')) {
            DB::purge('system');
            Config::set('database.connections.tenant.database', $tenant->database_name);
            DB::reconnect('tenant');
            DB::setDefaultConnection('tenant');
            
        }
        return $next($request);
    }
}