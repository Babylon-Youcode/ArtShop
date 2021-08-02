<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

    }
    public function create(){
     return view('admin.product.create');   
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required|min3',
            'image'=>'required|mimes:jpeg,png',
            'price'=>'required|numeric',
            'additional_info'=>'required',
            'category'=>'required'
        ]);
    }
}
