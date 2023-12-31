<?php
namespace App\Http\Middleware;
use App\Facades\Tenants;
use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
class CheckTenant {
    public function handle(Request $request, Closure $next) {
        $host = $request->getHost();
        $tenant = Tenant::whereDomain($host)->first();
        Tenants::setTenantConnection($tenant);
        return $next($request);
    }
}