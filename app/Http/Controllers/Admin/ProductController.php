<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('backend.product.index');
    }
    
    public function productform(){
        return view('backend.product.productform');
    }

    public function productedit(){
        return view('backend.product.productedit');
    }
}
