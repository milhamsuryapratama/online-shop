<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'price',
        'stock',
        'description',
        'picture',
        'slug',
        'category_id'
    ];

    public function category()
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }
}
