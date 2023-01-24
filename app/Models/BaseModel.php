<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
    use HasFactory;

    public function status() {
        switch ($this->status) {
            case 'not_active': $result = '<label class="badge badge-warning">'. trans('dashboard/ganeral.not_active') .'</label>'; break;
            case 'active': $result = '<label class="badge badge-success">'. trans('dashboard/ganeral.active') .'</label>'; break;
        }
        return $result;
    }

    public function scopeGetActive() {
        return $this->whereStatus('active')->get();
    }
}