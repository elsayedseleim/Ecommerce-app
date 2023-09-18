<?php

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

Route::get('/',function(){
    $results = Category::all();
    //dd($results);
    return view('welcome',['categories'=>$results]);
});

Route::get('/category',function(){
    $results = Category::all();
    $products = Product::all();
    return view('category',['categories'=>$results, 'products'=>$products]);
});

Route::get('/product/{cat_id?}',function($cat_id=0){
    if($cat_id){
        $products = Product::where('category_id',$cat_id)->get();
    }else{

        $products = Product::all();
    }
    return view('product',['products'=>$products]);
});

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

