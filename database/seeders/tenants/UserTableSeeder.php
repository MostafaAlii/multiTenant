<?php
namespace Database\Seeders\tenants;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Schema};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class UserTableSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        User::factory(10)->create();
        Schema::enableForeignKeyConstraints();
    }
}