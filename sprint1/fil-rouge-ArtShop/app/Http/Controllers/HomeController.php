<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_admin === 1 && auth()->user()->name === "mmerguoum")
        {
            return redirect()->to('/auth/dashboard');
        }
        else{
            return redirect()->to('/');
        }

    }

    public static function getOrders(){
        $order = Order::all();
        return $order->count();
    }

    public static function getProducts(){
        $prod = Product::all();
        return $prod->count();

    }
    public static function  getUsers(){

            $users = User::all();
            unset($users[0]);
            return $users->count();

    }


    public static function ProductInCategory()
    {

        $count=DB::table('categories')
            ->select("categories.name", DB::raw("COUNT(products.id) as products"))
            ->groupBy('categories.name')
            ->join('products','products.category_id','=','categories.id')
            ->get();


        return $count;


    }


}

