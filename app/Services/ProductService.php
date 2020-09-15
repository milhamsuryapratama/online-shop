<?php


namespace App\Services;


use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Str;
use ImageResize;
use File;

class ProductService
{
    public static function validatePicture($data, $id = null)
    {
        $product = Product::find($id);
        if ($data->hasFile('picture')) {

            $picture = $data['picture'];

            $name = uniqid() . '_' . trim($picture->getClientOriginalName());

            $img = ImageResize::make($picture->path());

            $img->resize(195, 243)->save('assets/photo/'.$name);

            if (request()->method() == 'PUT') {
                File::delete('assets/photo/' . $product->picture);
                return ProductRepository::update($data, $id, $name);
            } else {
                return ProductRepository::store($data, $name);
            }
        }

        return ProductRepository::update($data, $id, $product->picture);
    }
}