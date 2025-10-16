<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'work_order_id',
        'client_id',
        'total',
        'tax_amount',
        'issue_date',
    ];
}
