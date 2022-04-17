<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceListServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_status',
        'service_id',
        'list_service_id'
    ];

    public function service()
    {
        return $this->hasMany(Service::class, 'customer_id');
    }
}
