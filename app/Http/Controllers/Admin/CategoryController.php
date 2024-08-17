<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    Public function index(){
        $categories = Category::query()->latest('id')->paginate(5);
        return view('admin.categories.index', compact('categories'));

    }
    public function create(Request $request){
        return view('admin.categories.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name'=> 'required | nullable',
            'image'=> 'required',
        ]);
        $data['image'] = '';

        if($request->hasFile('image')){
            $path_img  = $request->file('image')->store('categories');
            $data['image'] = $path_img;
        }
        
        Category::create($data);
        return redirect()->route('categories.index')->with('message', 'Thêm danh mục thành công ');
    }
    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category){
        $data = $request->validate([
            'name'=> 'required',
            'image'=> 'required',
        ]);
        $data['image'] = $category->image;
        if($request->hasFile('image')){
            if(file_exists('storage/'.$category->image)){
                unlink('storage/'.$category->image);
            }
            $path_img  = $request->file('image')->store('categories');
            $data['image'] = $path_img;
        }
        $category->update($data);
        return redirect()->route('categories.index')->with('message', 'Cập nhật thành công');

        
    }
    public function destroy(Category $category){
        if($category['image'] != null){
            unlink('storage/'.$category->image);
        }
        $category->delete($category);
        return redirect()->route('categories.index')->with('message', 'Xóa thành công');
    }
}

