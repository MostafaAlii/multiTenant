<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class Tenants extends Facade {
    public static function getFacadeAccessor() {
        return 'Tenants';
    }
}