<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::query()->latest('id')->limit(8)->get();
        return view('client.home',compact('products'));
    }
    public function shop(){
        $categories = Category::all();
        $products = Product::all();
        $brands = Brand::all();
        $sizes = Size::all();
        return view('client.shop', compact('categories', 'products', 'brands', 'sizes'));
    }

   
}
