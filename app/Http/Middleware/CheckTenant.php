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
        return $next($request);
    }
}