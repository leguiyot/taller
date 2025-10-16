<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = [
        'client_id',
        'vehicle_id',
        'quote_id',
        'description',
        'status',
        'assigned_to',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
