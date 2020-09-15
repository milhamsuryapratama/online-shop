<?php


namespace App\Repositories;


use App\Models\Product;
use Illuminate\Support\Str;

class ProductRepository
{
    /**
     * Handle store data product
     *
     */
    public static function store($data, $name)
    {
        return Product::create([
            'product_name' => $data['product_name'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'category_id' => $data['category'],
            'description' => $data['description'],
            'slug' => Str::slug($data['product_name']),
            'picture' => $name
        ]);
    }

    /**
     * Handle update data product
     *
     */
    public static function update($data, $id, $name)
    {
        return Product::find($id)->update([
            'product_name' => $data['product_name'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'category_id' => $data['category'],
            'description' => $data['description'],
            'slug' => Str::slug($data['product_name']),
            'picture' => $name
        ]);
    }
}