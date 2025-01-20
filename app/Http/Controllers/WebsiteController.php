<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.home.index', [
            'categories' => Category::all(),
            'new_products' => Product::latest()->get(),
            'first_new_products' => Product::latest()->take(2)->get(),
            'second_new_product' => Product::latest()->skip(2)->first(),
            'third_new_products' => Product::latest()->skip(3)->take(2)->get(),
            'home_category_one'  => Category::where('home_status', 1)->orderBy('id', 'asc')->first(),
            'home_category_two'  => Category::where('home_status', 1)->orderBy('id', 'asc')->skip(1)->first()
        ]);
    }

    public function category($id)
    {
        return view('website.category.index',['products' => Product::where('category_id', $id)->latest()->get()]);
    }

    public function product($id)
    {
        return view('website.product.index', ['product' => Product::find($id)]);
    }
}
