<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductPhotosController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/',[CategoryController::class, 'categories']);

Route::get('/category',[CategoryController::class,'categoriesWithproducts'])->middleware('auth');
Route::get('/product/{cat_id?}',[ProductController::class,'products']);
Route::get('/addproduct',[ProductController::class, 'addproduct']);
Route::get('/productTable',[ProductController::class, 'productTable']);
Route::post('/storeproduct',[ProductController::class, 'storeproduct'])->middleware('auth');
Route::get('/deleteproduct/{product_id?}',[ProductController::class,'delete'])->middleware('auth');
Route::get('/editproduct/{product_id?}',[ProductController::class,'edit'])->middleware('auth');
Route::get('/reviews',[ReviewController::class,'view']);
Route::get('/addreview',[ReviewController::class,'add']);
Route::get('/search',[ProductController::class,'search']);

//shopping cart
Route::get('/cart',[CartController::class,'index'])->middleware('auth');
Route::get('/addtocart/{id?}',[CartController::class,'add'])->middleware('auth');
Route::get('/deletecart/{cartid?}',[CartController::class, 'delete'])->middleware('auth');

//single product details
Route::get('/product-details/{product_id?}',[ProductController::class,'show'])->middleware('auth');


// add product photos
Route::get('/product-photos/{product_id?}',[ProductPhotosController::class,'index']);
Route::post('/add-product-photo',[ProductPhotosController::class,'add']);
Route::get('/delete-product-photo/{product_id?}/{photo_id?}',[ProductPhotosController::class,'delete']);
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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
