<?php

use Illuminate\Support\Facades\Route;

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
    return view('index',[
        'categories' =>\App\Models\Category::all(),
        'foods'=>\App\Models\Food::with(['User','Category'])->paginate('4'),
        'populars'=>\App\Models\Food::orderByDesc('views')->take('8')->get()


    ]);
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('dashboard')->middleware('role:chef')->group(function (){
    Route::resource('food',\App\Http\Controllers\FoodController::class)->except(['show']);
    Route::resource('tag',\App\Http\Controllers\TagController::class)->except(['show','create']);
    Route::resource('category',\App\Http\Controllers\CategoryController::class)->except(['show','create']);;
    Route::resource('orders',\App\Http\Controllers\OrderController::class)->only('index');
});

Route::get('/category/',function(){
    return view('category',[
        'foods'=>\App\Models\Food::with(['User','Category'])->get()
    ]);
})->name('categoryAll');

Route::get('/category/{category}',[\App\Http\Controllers\CategoryController::class,'show'])->name('category');
Route::get('/Tag/{tag}',[\App\Http\Controllers\TagController::class,'show'])->name('tag');


Route::middleware(['role:customer'])->group(function (){
    Route::get('/cart/add/{food}',[\App\Http\Controllers\CartController::class,'add'])->name('AddtoCart');
    Route::delete('/cart/remove/{food}',[\App\Http\Controllers\CartController::class,'Remove'])->name('RemoveCart');
    Route::get('food/{food}/like',[\App\Http\Controllers\CartController::class,'like'])->name('like');

    Route::get('/checkout',[\App\Http\Controllers\OrderController::class,'show'])->name('checkout');
    Route::post('/checkout',[\App\Http\Controllers\OrderController::class,'store'])->name('order');
    Route::prefix('dashboard')->group(function (){
        Route::get('order',[\App\Http\Controllers\OrderController::class,'CustomerOrder'])->name('orders');
    });

});

Route::get('food/{food}',[\App\Http\Controllers\FoodController::class,'show'])->name('food');



