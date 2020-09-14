<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'province',
        'city',
        'postcode',
        'address',
        'status',
        'payment_process'
    ];
}
