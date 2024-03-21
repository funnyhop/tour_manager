<?php

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

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/search', function () {
    return view('frontend.search');
});
Route::get('/cart', function () {
    return view('frontend.cart');
});
Route::get('/category', function () {
    return view('frontend.category');
});
Route::get('/complete', function () {
    return view('frontend.complete');
});
Route::get('/details', function () {
    return view('frontend.details');
});
Route::get('/email', function () {
    return view('frontend.email');
});
