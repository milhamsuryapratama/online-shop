<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display homepage view
     *
     */
    public function index()
    {
        $data['title'] = 'Online Shop';
        $data['product'] = Product::orderBy('id', 'DESC')->get();
        $data['category'] = Category::with(['product' => function ($query) {
            $query->take(3);
        }])->take(3)->get();
        return view('web/home', $data);
    }

    /**
     * Display product detail page
     *
     */
    public function detail($slug)
    {
        $data['product'] = Product::whereSlug($slug)->first();
        $data['title'] = $data['product']->product_name .' - Online Shop';
        $data['other_product'] = Product::orderBy('id','DESC')->take(4)->get();
        return view('web/product_detail', $data);
    }
}
