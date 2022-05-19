<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NotebookController;
use App\Models\Product;
use Illuminate\Http\Request;

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

Route::resource('products', ProductController::class);
Route::resource('notebook', NotebookController::class);
Route::resource('project', ProjectController::class);
Route::get('/books_list',[ProductController::class,'books_list']);
Route::get('/products_list',[ProductController::class,'products_list']);
// {

//      return Product::where('school_id', $request->school_id)->get();
// });
// Route::get('/products_list',function (Request $request)
// {

//     return Product::where('school_id', $request->school_id)->where('class_id', $request->class_id)->get();
// });


