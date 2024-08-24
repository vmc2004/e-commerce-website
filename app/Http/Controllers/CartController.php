<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('client.cart');
    }
    public function addToCart(Request $request){
        $cart = session('cart') ??[];
         $product_id = $request('product_id');
         $color = $request('color');
         $size = $request('size');
         $quantity = $request('quantity');

        $variant = ProductVariant::query()
                                    ->where('product_id' ,$product_id)
                                    ->where('size_id', $size)
                                    ->where('color_id', $color)
                                    ->first();

         $product = [
            'product_id'=> $request['product_id'],
            'color'=> $request['color'],
            'size'=> $request['size'],
            'quantity'=> $request['quantity'],
         ];

    }
    public function edit(){

    }

}
