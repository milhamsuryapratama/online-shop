<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction_Details extends Model
{
    protected $table = 'transaction_details';
    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'sub_total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
