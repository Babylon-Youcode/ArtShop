<?php

// use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
Route::get('/', 'FrontProductListController@index');

Route::get('/dashboard', function(){
    return view('admin.dashboard');
});




Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home',function(){
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
Route::resource('subcategory','SubcategoryController');
});
