<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tenant extends BaseModel {
    use HasFactory;
    protected $table = 'tenants';
    protected $fillable = [
        'name',
        'domain',
        'domain_type',
        'database_name',
        'database_drive',
        'database_username',
        'database_password',
        'subscription_period',
        'subscription_status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'subscription_period' => 'datetime',
        'subscription_status' => 'string',
    ];
}