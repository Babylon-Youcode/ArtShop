<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/index', function(){
    return view('admin.dashboard');
    });

Route::get('/index',[testController::class,'index']);

// Route::get('/index',[CategoryController::class,'create']);
// Route::post('/post/{id}',[CategoryController::class,'post'])->name('mourad');
Route::get('subcategories/{id}','ProductController@loadSubCategories');
Route::resource('category','CategoryController');
Route::resource('product','ProductController');
Route::resource('subcategory','SubcategoryController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
