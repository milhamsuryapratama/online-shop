<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
        $data['product'] = Product::all();
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
        return view('web/product_detail', $data);
    }
}
