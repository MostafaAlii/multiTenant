<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->string('database_name');
            $table->string('database_drive')->default('mysql');
            $table->string('database_username')->nullable();
            $table->string('database_password')->nullable();
            $table->date('subscription_period')->nullable();
            $table->string('subscription_status')->nullable();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('set null');
            $table->unique(['domain', 'database_name']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tenants');
    }
};