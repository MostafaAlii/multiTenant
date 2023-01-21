<?php
namespace App\Helpers;
use Illuminate\Support\Str;
class Environment {
    public function getEnvironment() {
        $server_name = $_SERVER['SERVER_NAME'];
        $local_server_name = config('env.local.server_name');
        $local_domain_extension = config('env.local.domain_extension');
        $production_domain_extension = config('env.production.domain_extension');
        $local_domain_extension = config('env.local.domain_extension');
        $production_domain_extension = config('env.production.domain_extension');
        $local_env = config('env.local.environment');
        $production_env = config('env.production.environment');
        $local_base = config('env.local.base');
        $production_base = config('env.production.base');
        if(in_array($server_name, $local_server_name) || Str::endsWith($server_name, $local_domain_extension)) {
            $env = $local_env;
            $base = $local_base;
        } elseif(Str::endsWith($server_name, $production_domain_extension)) {
            $env = $production_env;
            $base = $production_base;
        } else {
            $env = $production_env;
            $base = $production_base;
        } 
        return [
            'environment' => $env,
            'base' => $base
        ];
    }

    public function getSettings() {
        $env = $this->getEnvironment();
        $settings = $env['base'];
        return $settings;
    }
}
    