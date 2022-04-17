<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_name',
        'car_plate_number',
        'car_in_workshop',
        'service_status',
        'customer_id',
        'mechanic_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
        // return $this->belongsTo(User::class);
    }
}
