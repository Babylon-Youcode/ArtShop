<?php

// use App\Http\Controllers\CategoryController;

use App\Http\Controllers\FrontProductListController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\charge;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('admin.dashboard');
});


/*
Enregistrement de la route de l'authentification
login / register /logout
*/
Auth::routes();

Route::get('/home',[\App\Http\Controllers\ProductList::class,'index'])->name('home');
Route::get('/product/{id}',[\App\Http\Controllers\ProductList::class,'show'])->name('product.view');



Route::get('/checkoutt/{amount}','CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge',[\App\Http\Controllers\CartController::class,'charge'])->name('cart.charge');
Route::get('/orders',[\App\Http\Controllers\CartController::class,'order'])->name('cart.order')->middleware('auth');

Route::get('/addToCart/{product}','cartController@addTocart')->name('add.cart');
Route::get('/cart','CartController@showCart')->name('cart.show');
Route::post('/products/{product}','CartController@updateCart')->name('cart.update');
Route::post('/product/{product}','CartController@removeCart')->name('cart.remove');


Route::get('/',function(){
    if(Auth::user() && Auth::user()->is_admin)
        return redirect('/dashboard');
});

route::group(['prefix'=>'auth','middleware'=>['auth','isAdmin']],
function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    });


Route::resource('category','CategoryController');
Route::resource('product','ProductController');

});
