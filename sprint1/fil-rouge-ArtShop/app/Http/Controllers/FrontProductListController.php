<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class FrontProductListController extends Controller
{
    public function index(){
       return view('product');
    }

}
