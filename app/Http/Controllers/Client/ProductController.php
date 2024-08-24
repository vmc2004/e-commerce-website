<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail( $slug){
        $product = Product::query()->where('slug' , $slug)->firstOrFail();
        $variants = $product->variants;
        return view('client.detail-product', compact('product', 'variants'));
    }
}
