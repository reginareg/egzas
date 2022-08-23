<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController as R;
use App\Http\Controllers\DishController as D;
use App\Http\Controllers\OrderController as O;

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

Route::get('/restaurants', [R::class, 'index'])->name('r.index');
Route::get('/restaurants/edit/{restaurantId}', [R::class, 'edit'])->name('r.edit');
Route::put('/restaurants/update/{restaurant}', [R::class, 'update'])->name('r.update');
Route::get('/restaurants/create', [R::class, 'create'])->name('r.create');
Route::post('/restaurants/store', [R::class, 'store'])->name('r.store');
Route::delete('/restaurants/delete/{restaurant}', [R::class, 'destroy'])->name('r.delete');


Route::get('/menius', [R::class, 'index'])->name('m.index');
Route::get('/menius/edit/{meniuId}', [R::class, 'edit'])->name('m.edit');
Route::put('/menius/update/{meniu}', [R::class, 'update'])->name('m.update');
Route::get('/menius/create', [R::class, 'create'])->name('m.create');
Route::post('/menius/store', [R::class, 'store'])->name('m.store');
Route::delete('/menius/delete/{meniu}', [R::class, 'destroy'])->name('m.delete');

Route::get('/dishes', [D::class, 'index'])->name('d.index');
Route::get('/dishes/edit/{dishId}', [D::class, 'edit'])->name('d.edit');
Route::put('/dishes/update/{dish}', [D::class, 'update'])->name('d.update');
Route::get('/dishes/create', [D::class, 'create'])->name('d.create');
Route::post('/dishes/store', [D::class, 'store'])->name('d.store');
Route::delete('/dishes/delete/{dish}', [D::class, 'destroy'])->name('d.detele');
Route::put('/dishes/photo/delete/{dish}', [D::class, 'del'])->name('d_p');


// Route::post('/order/{uId}', [O::class, 'store'])->name('order')->middleware('role:user');
// Route::get('/my/orders', [O::class, 'index'])->name('orders')->middleware('role:user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
