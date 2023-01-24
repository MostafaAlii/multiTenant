<?php
namespace App\Http\Middleware;

use App\Models\Tenant;
use App\Services\TenantService;
use Closure;
use Illuminate\Http\Request;
class CheckTenant {
    public function handle(Request $request, Closure $next) {
        $host = $request->getHost();
        $tenant = Tenant::whereDomain($host)->first();
        TenantService::setTenantConnection($tenant);





        
        /*if($tenant->domain_type !== config('tenant.primary_domain.domain_type')) {
            DB::purge('system');
            Config::set('database.connections.tenant.database', $tenant->database_name);
            DB::reconnect('tenant');
            DB::setDefaultConnection('tenant');
        }*/
        return $next($request);
    }
}