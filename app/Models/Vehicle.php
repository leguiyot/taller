<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'client_id',
        'brand',
        'model',
        'year',
        'license_plate',
        'vin_number',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
