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
    Route::get('bill_detail', [BillController::class, 'show'])->name('bill_detail');
    Route::get('invoice', [BillController::class, 'invoice'])->name('invoice');
    Route::get('invoice_print', [BillController::class, 'invoice_print'])->name('invoice_print');

    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('eat', [EatController::class, 'index'])->name('eat');
    Route::get('employee_position', [Employee_PositionController::class, 'index'])->name('employee_position');
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee');

    Route::get('hotel', [HotelController::class, 'index'])->name('hotel');
    // Route::get('hotel/create', [HotelController::class, 'create'])->name('hotel.create');
    Route::post('hotel',[HotelController::class,'store'])->name('hotel.store');
    Route::get('hotel/{id}', [HotelController::class, 'edit'])->name('hotel.edit');
    Route::match(['put','patch'],'hotel/{id}', [HotelController::class, 'update'])->name('hotel.update');
    Route::delete('hotel/{id}',[HotelController::class, 'destroy'])->name('hotel.destroy');

    Route::get('income', [IncomeController::class, 'index'])->name('income');

    Route::get('location', [LocationController::class, 'index'])->name('location');
    // Route::get('location/create', [LocationController::class, 'create'])->name('location.create');
    Route::post('location',[LocationController::class,'store'])->name('location.store');
    Route::get('location/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::match(['put','patch'],'location/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('location/{id}',[LocationController::class, 'destroy'])->name('location.destroy');

    Route::get('move', [MoveController::class, 'index'])->name('move');

    Route::get('office', [OfficeController::class, 'index'])->name('office');
    // Route::get('office/create', [OfficeController::class, 'create'])->name('office.create');
    Route::post('office',[OfficeController::class,'store'])->name('office.store');
    Route::get('office/{id}', [OfficeController::class, 'edit'])->name('office.edit');
    Route::match(['put','patch'],'office/{id}', [OfficeController::class, 'update'])->name('office.update');
    Route::delete('office/{id}',[OfficeController::class, 'destroy'])->name('office.destroy');

    Route::get('opject', [OpjectController::class, 'index'])->name('opject');
    // Route::get('opject/create', [OpjectController::class, 'create'])->name('opject.create');
    Route::post('opject',[OpjectController::class,'store'])->name('opject.store');
    Route::get('opject/{id}', [OpjectController::class, 'edit'])->name('opject.edit');
    Route::match(['put','patch'],'opject/{id}', [OpjectController::class, 'update'])->name('opject.update');
    Route::delete('opject/{id}',[OpjectController::class, 'destroy'])->name('opject.destroy');

    Route::get('order', [OrderController::class, 'index'])->name('order');

    Route::get('restaurant', [RestaurantController::class, 'index'])->name('restaurant');
    // Route::get('restaurant/create', [RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('restaurant',[RestaurantController::class,'store'])->name('restaurant.store');
    Route::get('restaurant/{id}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::match(['put','patch'],'restaurant/{id}', [RestaurantController::class, 'update'])->name('restaurant.update');
    Route::delete('restaurant/{id}',[RestaurantController::class, 'destroy'])->name('restaurant.destroy');

    Route::get('schedule', [ScheduleController::class, 'index'])->name('schedule');

    Route::get('tour', [TourController::class, 'index'])->name('tour');
    // Route::get('tour/create', [TourController::class, 'create'])->name('tour.create');
    Route::post('tour',[TourController::class,'store'])->name('tour.store');
    Route::get('tour/{id}', [TourController::class, 'edit'])->name('tour.edit');
    Route::match(['put','patch'],'tour/{id}', [TourController::class, 'update'])->name('tour.update');
    Route::delete('tour/{id}',[TourController::class, 'destroy'])->name('tour.destroy');

    Route::get('unit', [UnitController::class, 'index'])->name('unit');
    // Route::get('unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('unit',[UnitController::class,'store'])->name('unit.store');
    Route::get('unit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::match(['put','patch'],'unit/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::delete('unit/{id}',[UnitController::class, 'destroy'])->name('unit.destroy');

    Route::get('vehicle', [VehicleController::class, 'index'])->name('vehicle');
    // Route::get('vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('vehicle',[VehicleController::class,'store'])->name('vehicle.store');
    Route::get('vehicle/{id}', [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::match(['put','patch'],'vehicle/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
    Route::delete('vehicle/{id}',[VehicleController::class, 'destroy'])->name('vehicle.destroy');

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

Route::get('/bill_detail', function () {
    return view('Order.bill_detail');
});

// Route::get('/income', function () {
//     return view('index');
// });
// Route::get('/tour', function () {
//     return view('Tour.tour');
// });
