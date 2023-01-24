<?php
namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\System;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call([
           System\TenantsTableSeeder::class, 
        ]);
    }
}