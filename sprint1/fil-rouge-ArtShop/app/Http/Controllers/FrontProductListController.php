<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \App\Models\Product;
use Illuminate\Support\Facades\DB;

class FrontProductListController extends Controller
{
    public function index(){
        $products = Product::latest()->limit(6)->get();
        $randomActiveProducts = Product::inRandomOrder()->limit(3)->get();
        $randomActiveProductIds=[];
        foreach($randomActiveProducts as $product){
            array_push($randomActiveProductIds,$product->id);
        }
        $randomItemProducts = Product::whereNotIn('id', $randomActiveProductIds)->limit(3)->get();
       return view('product', compact('products', 'randomItemProducts', 'randomActiveProducts'));
    }

    public function show($id)
    {

        $product = Product::find($id);
        $productFromSameCategories = Product::inRandomOrder()
        ->where('category_id',$product->category_id)
        ->where('id','!=',$product->id)->limit(3)->get();
        return view('show', compact('product','productFromSameCategories'));
        
    }



    public static function getProduct()
    {

        $products = DB::table('products','t')
        ->join("categories","t.category_id",'=','categories.id')
        ->get(array(
            't.category_id',
            't.id',
            "t.name",
            'categories.slug',
            't.description',
            't.price',
            't.image'
           
        ));
        
    
         return ($products);
        
    }

    

}
