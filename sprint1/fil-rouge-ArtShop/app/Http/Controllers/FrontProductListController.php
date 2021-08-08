<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;

class FrontProductListController extends Controller
{
    public function index(){
        $products = Product::get();
       return view('product', compact('products'));
    }
    public function show($id){
        $product = Product::find($id);
        return view('show', compact('product'));
    }

}
