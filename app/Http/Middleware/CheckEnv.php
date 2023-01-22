<?php
namespace App\Http\Middleware;
use Closure;
use App\Helpers\Environment;
use Illuminate\Http\Request;

class CheckEnv {
    public function handle(Request $request, Closure $next) {
        /*$environment = new Environment();
        $env = $environment->getEnvironment();
        $settings = $environment->getSettings();
        
        $request->merge(['env' => $env['environment']]);
        $request->merge(['settings' => $settings]);
        return $next($request);*/
        $environment = new Environment();
        $env = $environment->getEnvironment();
        $request->merge(['env' => $env['environment']]);
        $settings = $environment->getSettings();
        $request->merge(['settings' => $settings]);
        return $next($request);
    }
}