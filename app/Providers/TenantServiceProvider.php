<?php
namespace App\Providers;
use App\Services\TenantService;
use Illuminate\Support\ServiceProvider;
class TenantServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->singleton('Tenants', function ($app) {
            return new TenantService();
        });
    }

    public function boot() {
        //
    }
}