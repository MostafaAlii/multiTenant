<?php
namespace App\Services;
use App\Models\Tenant;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\{DB, Config};
class TenantService {
    private static $tenant, $domain, $database_name, $database_drive, $database_username, $database_password;
    public static function setTenantConnection(Tenant $tenant) {
        if (!$tenant instanceof Tenant) 
            throw ValidationException::withMessages(['tenant' => 'Tenant not found']);
        
        if($tenant->domain_type !== config('tenant.primary_domain.domain_type')) {
            DB::purge('system');
            DB::purge('tenant');
            Config::set('database.connections.tenant.database', $tenant->database_name);
            Self::$tenant = $tenant;
            Self::$domain = $tenant->domain;
            Self::$database_name = $tenant->database_name;
            Self::$database_drive = $tenant->database_drive;
            Self::$database_username = $tenant->database_username;
            Self::$database_password = $tenant->database_password;
            DB::reconnect('tenant');
            DB::setDefaultConnection('tenant');
        }
    }

    public static function setSystemConnection() {
        DB::purge('system');
        DB::purge('tenant');
        DB::reconnect('system');
        DB::setDefaultConnection('system');
    }

    public static function getTenant() {
        return Self::$tenant;
    }
    
}