<?php
namespace Database\Seeders\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\{DB, Schema};
use Illuminate\Database\Seeder;
class TenantsTableSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('tenants')->truncate();
        DB::table('tenants')->insert([
            [
                'name' => 'Master',
                'domain' => 'www.multi.test',
                'domain_type' => 'primary',
                'database_name' => 'multi',
                'database_username' => 'root',
                'database_password' => '',
                'subscription_period' => '2025-01-01',
                'subscription_status' => 'active',
            ],[
                'name' => 'Tenant_1',
                'domain' => 'app1.multi.test',
                'domain_type' => 'tenant',
                'database_name' => 'news',
                'database_username' => 'root',
                'database_password' => '',
                'subscription_period' => '2024-01-01',
                'subscription_status' => 'active',
            ],[
                'name' => 'Tenant_2',
                'domain' => 'app2.multi.test',
                'domain_type' => 'tenant',
                'database_name' => 'school',
                'database_username' => 'root',
                'database_password' => '',
                'subscription_period' => '2023-12-01',
                'subscription_status' => 'active',
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}