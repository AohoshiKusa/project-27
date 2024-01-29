<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use File;
use Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $product = Product::orderBy('created_at','desc')->Paginate('10');
        return view('backend.product.index',compact('product'));
    }

    public function productform(){
        $category = Category::all();
        return view('backend.product.productform',compact('category'));
    }

    public function productedit($product_id){
        $pro = Product::find($product_id);
        $cat = Category::all();
        return view('backend.product.productedit',compact('pro','cat'));
    }

    public function insert(Request $request){
    //ป้องกันการกรอกข้อมูลผ่านฟอร์ม
    $validated = $request->validate([
    'name' => 'required|max:255',
    'price' => 'required|max:255',
    'description'=>'required',
    'image' => 'required|mimes:jpg,jpeg.png'
    ],
    [
    'name.required' => 'กรุณากรอกข้อมูลสินค้า',
    'name.max' => 'กรอกข้อมูลได้ 255 ตัวอักษร',
    'price.required' => 'กรุณากรอกข้อมูลราคาสินค้า',
    'price.max' => 'กรอกข้อมูลได้ 255 ตัวอักษร',
    'description.required' => 'กรุณากรอกข้อมูลประเภทสินค้าของสินค้า',
    'image.mimes' => 'อัพโหลดภาพที่มีนามสกุล .jpg .jpeg .png ได้เท่านั้น',
    ]);


        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if($request->hasFile('image')){
            $filename = Str::random(10).'.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/backend/product/',$filename);
            Image::make(public_path().'/backend/product/'.$filename)->resize(500,450)->save(public_path().'/backend/product/resize/'.$filename);
            $product->image = $filename;
        }else{
            $product->image = 'no image.jpg';
        }
        $product->save();
        return redirect('admin/product/index');
    }

    public function update(Request $request, $product_id){
        $product = Product::find($product_id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if($request->hasFile('image')){
            if($product->file != 'no image.jpg'){
                File::delete(public_path().'/backend/product/'.$product->file);
                File::delete(public_path().'/backend/product/resize/'.$product->file);
            }
            $filename = Str::random(10).'.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/backend/product/',$filename);
            Image::make(public_path().'/backend/product/'.$filename)->resize(500,450)->save(public_path().'/backend/product/resize/'.$filename);
            $product->image = $filename;

        }
        $product->update();
        return redirect('admin/product/index');
    }

    public function delete($product_id){
        $product = Product::find($product_id);
        if($product->file != 'no image.jpg'){
            File::delete(public_path().'/backend/product/'.$product->file);
            File::delete(public_path().'/backend/product/resize/'.$product->file);
        }
        $product->delete();
        return redirect('admin/product/index');
    }
}
