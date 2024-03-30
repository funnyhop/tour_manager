<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EatController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OpjectController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\Employee_PositionController;

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

Route::middleware([])->group(function () {
    Route::get('accommodation', [AccommodationController::class, 'index'])->name('accommodation');
    Route::get('bill', [BillController::class, 'index'])->name('bill');
    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('eat', [EatController::class, 'index'])->name('eat');
    Route::get('employee_position', [Employee_PositionController::class, 'index'])->name('employee_position');
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('hotel', [HotelController::class, 'index'])->name('hotel');
    Route::get('income', [IncomeController::class, 'index'])->name('income');
    Route::get('location', [LocationController::class, 'index'])->name('location');
    Route::get('move', [MoveController::class, 'index'])->name('move');
    Route::get('office', [OfficeController::class, 'index'])->name('office');
    Route::get('opject', [OpjectController::class, 'index'])->name('opject');
    Route::get('order', [OrderController::class, 'index'])->name('order');
    Route::get('restaurant', [RestaurantController::class, 'index'])->name('restaurant');
    Route::get('schedule', [ScheduleController::class, 'index'])->name('schedule');
    Route::get('tour', [TourController::class, 'index'])->name('tour');
    Route::get('unit', [UnitController::class, 'index'])->name('unit');
    Route::get('vehicle', [VehicleController::class, 'index'])->name('vehicle');
});







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

Route::get('/checkout', function () {
    return view('Order.checkout');
});

// Route::get('/income', function () {
//     return view('index');
// });
// Route::get('/tour', function () {
//     return view('Tour.tour');
// });
