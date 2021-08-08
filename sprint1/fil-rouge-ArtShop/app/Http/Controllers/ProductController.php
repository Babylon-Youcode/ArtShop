<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('admin.product.index',compact('products'));
        return view('admin.product.index');
    }
    public function create(){
     return view('admin.product.create');   
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required|min:3',
            'image'=>'required|mimes:jpeg,png',
            'price'=>'required|numeric',
            'additional_info'=>'required',
            'category'=>'required'
        ]);
        $image = $request->file('image')->store('public/product');
        Product::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'image'=>$image,
        'price'=>$request->price,
        'additional_info'=>$request->additional_info,
        'category_id'=>$request->category
        ]);
        notify()->success('Product deleted succefully !');
        return redirect()->back();
            
    }
        public function edit($id){
         $product = Product::find($id);
         return view('admin.product.edit',compact('product'));
        }
        public function update(Request $request,$id){
        
            $product = Product::find($id);
       $image = $product->image;
       if($request->hasFile('image')){
           $image = $request->file('image')->store('public/product');
          Storage::delete($image);
          $product->name = $request->name;
          $product->description = $request->description;
          $product->image = $image;
          $product->price=$request->price;
          $product->additional_info = $request->additional_info;
          $product->category_id = $request->category;
          $product->save();
       }else{
          $product->name = $request->name;
          $product->description= $request->description;
          $product->image = $image;
          $product->price=$request->price;
          $product->additional_info = $request->additional_info;
          $product->category_id = $request->category;
          $product->save();
        }
     
       notify()->success('product updeted successfully !');
       return redirect()->route('product.index');
        }
        public function destroy($id){
            $product = Product::find($id);
            $filname = $product->image;
            $product->delete();
            Storage::delete($filname);
            notify()->success('Product deleted succefully !');
            return redirect()->route('product.index');
        }
}
