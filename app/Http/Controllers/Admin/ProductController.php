<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index(){
        $products = Product::OrderByDesc('id')->paginate(10);
        return view('admin.products.index', compact('products'));
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        $colors =Color::all();
        $sizes = Size::all();
        return view('admin.products.create', compact('categories', 'brands','colors','sizes'));
    }
    public function store(Request $request)
    {
        $data_product = [
            'code' => $request['code'],
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'price' => $request['price'],
            'sale_price' => $request['sale_price'],
            'description' => $request['description'],
            'material' => $request['material'],
            'category_id' => $request['category_id'],
            'brand_id' => $request['brand_id'],
        ];

        //Ảnh sản phẩm
        $data_product['image'] = "";
        //Nhập ảnrh
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $data_product['image'] = $path;
        }

        $product = Product::create($data_product);

        //Xử lý biến thể
        // dd($request->all());
        // dd($request['color_id']);
        for ($i = 0; $i < count($request['color_id']); $i++) {
            $variant = [
                'product_id' => $product->id,
                'color_id' => $request['color_id'][$i],
                'size_id' => $request['size_id'][$i],
                'quantity' => $request['quantity'][$i],
                'image' => $request['hinh'][$i]->store('images')
            ];
            // dd($variant);
            ProductVariant::create($variant);
        }

        return redirect()->route('products.index')->with('message', 'Thêm dữ liệu thành công');
    }

    public function edit(Product $product){
        // $product = Product::query()->findOrFail($product);
        $categories = Category::all();
        $brands = Brand::all();
        $colors =Color::all();
        $sizes = Size::all();
        $variants = $product->variants;
        return view('admin.products.edit', compact('categories', 'brands','colors','sizes', 'product', 'variants'));
    }
    public function update(Request $request, Product $product)
    {
        $data_product = [
            'code' => $request['code'],
            'name' => $request['name'],
            // 'slug' => Str::slug($request['name']),
            'price' => $request['price'],
            'sale_price' => $request['sale_price'],
            'description' => $request['description'],
            'material' => $request['material'],
            'category_id' => $request['category_id'],
            'brand_id' => $request['brand_id'],
        ];

        //Ảnh sản phẩm cũ
        $data_product['image'] = $product->image;
        //Nhập ảnh mới nếu có
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $data_product['image'] = $path;
        }

        // $product->update($data_product);

        foreach ($request['color_id'] as $index => $color_id) {
            $data_variant = [
                'product_id' => $product->id,
                'color_id' => $color_id,
                'size_id' => $request['size_id'][$index],
                'quantity' => $request['quantity'][$index]
            ];

            // dd($data_variant);
            //Update
            $find_variant = ProductVariant::query()
                ->where('product_id', $product->id)
                ->where('color_id', $color_id)
                ->where('size_id', $request['size_id'][$index])
                ->first();
            if ($find_variant) {
                $find_variant->update($data_variant); //Cập nhật 
            } else {
                ProductVariant::query()->create($data_variant);
            }
        } //end foreach

        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }
    public function destroy(Product $product){
        $product->delete($product);
        return redirect()->route('products.index')->with('message', 'Xóa dữ liệu thành công');
    }
}
