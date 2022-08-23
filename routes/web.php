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

Route::get('/restaurants', [R::class, 'index'])->name('r.index')->middleware('role:user');
Route::get('/restaurants/edit/{restaurantId}', [R::class, 'edit'])->name('r.edit')->middleware('role:admin');
Route::put('/restaurants/update/{restaurant}', [R::class, 'update'])->name('r.update')->middleware('role:admin');
Route::get('/restaurants/create', [R::class, 'create'])->name('r.create')->middleware('role:admin');
Route::post('/restaurants/store', [R::class, 'store'])->name('r.store')->middleware('role:admin');
Route::delete('/restaurants/delete/{restaurant}', [R::class, 'destroy'])->name('r.delete')->middleware('role:admin');


Route::get('/menius', [R::class, 'index'])->name('m.index')->middleware('role:user');
Route::get('/menius/edit/{meniuId}', [R::class, 'edit'])->name('m.edit')->middleware('role:admin');
Route::put('/menius/update/{meniu}', [R::class, 'update'])->name('m.update')->middleware('role:admin');
Route::get('/menius/create', [R::class, 'create'])->name('m.create')->middleware('role:admin');
Route::post('/menius/store', [R::class, 'store'])->name('m.store')->middleware('role:admin');
Route::delete('/menius/delete/{meniu}', [R::class, 'destroy'])->name('m.delete')->middleware('role:admin');

Route::get('/dishes', [D::class, 'index'])->name('d.index')->middleware('role:user');
Route::get('/dishes/edit/{dishId}', [D::class, 'edit'])->name('d.edit')->middleware('role:admin');
Route::put('/dishes/update/{dish}', [D::class, 'update'])->name('d.update')->middleware('role:admin');
Route::get('/dishes/create', [D::class, 'create'])->name('d.create')->middleware('role:admin');
Route::post('/dishes/store', [D::class, 'store'])->name('d.store')->middleware('role:admin');
Route::delete('/dishes/delete/{dish}', [D::class, 'destroy'])->name('d.detele')->middleware('role:admin');
Route::put('/dishes/photo/delete/{dish}', [D::class, 'del'])->name('d_p')->middleware('role:admin');


Route::post('/order/{uId}', [O::class, 'store'])->name('order')->middleware('role:user');
Route::get('/my/orders', [O::class, 'index'])->name('orders')->middleware('role:user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
