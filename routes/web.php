<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[CategoryController::class, 'categories']);

Route::get('/category',[CategoryController::class,'categoriesWithproducts']);

Route::get('/product/{cat_id?}',[ProductController::class,'products']);
Route::get('/addproduct',[ProductController::class, 'addproduct']);
/*
Route::get('/', function () {
    $results = Category::all();
    dd($results);
   return view('welcome',['categories'=>$results]);
});
Route::get('/product',function(){
    return view('product');
});

Route::get('/category',function(){
   
    return view('category');
});

Route::get('/test',function(){
    //$results = Category::all();
    //dd($results);
    return "Hello Test";
});
*/

