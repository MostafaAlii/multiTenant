<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tenant extends BaseModel {
    use HasFactory;
    protected $table = 'tenants';
}