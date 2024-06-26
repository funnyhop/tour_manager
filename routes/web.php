<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EatController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OpjectController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
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
Route::middleware(['web','guest'])->group(function () {
    Route::match(['get', 'post'], 'login', [LoginController::class, 'index'])->name('login');
    Route::get('/', [FrontendController::class, 'index'])->name('/');
    Route::get('detail/{id}', [FrontendController::class, 'show'])->name('detail');
    Route::get('add_cart/{id}', [FrontendController::class, 'create'])->name('add_cart');
    Route::post('add_cart',[FrontendController::class,'store'])->name('add_cart.store');
    Route::get('search_item', [FrontendController::class, 'searchItem'])->name('search_item');
    Route::get('search_item_dm', [FrontendController::class, 'searchItem_dm'])->name('search_item_dm');

});


Route::middleware(['web','auth'])->group(function () {

    Route::get('/hello', [LoginController::class, 'home'])->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [LoginController::class, 'show'])->name('profile');
    Route::get('profile/{id}', [LoginController::class, 'edit'])->name('profile.edit');
    Route::match(['put','patch'], 'profile/{id}', [LoginController::class, 'update'])->name('profile.update');


    Route::get('accommodation', [AccommodationController::class, 'index'])->name('accommodation');
    // Route::get('accommodation/create', [AccommodationController::class, 'create'])->name('accommodation.create');
    Route::post('accommodation',[AccommodationController::class,'store'])->name('accommodation.store');
    Route::get('accommodation/{tour_id}/{location_id}/{hotel_id}', [AccommodationController::class, 'edit'])->name('accommodation.edit');
    Route::match(['put','patch'],'accommodation/{tour_id}/{location_id}/{hotel_id}', [AccommodationController::class, 'update'])->name('accommodation.update');
    Route::delete('accommodation/{tour_id}/{location_id}/{hotel_id}',[AccommodationController::class, 'destroy'])->name('accommodation.destroy');

    Route::get('bill', [BillController::class, 'index'])->name('bill');
    Route::get('bill_print/{id}', [BillController::class, 'bill_print'])->name('bill_print');
    Route::get('bill_detail/{id}', [BillController::class, 'show'])->name('bill_detail');

    Route::get('invoice/{id}', [BillController::class, 'invoice'])->name('invoice');
    Route::post('invoice',[BillController::class,'store'])->name('invoice.store');
    Route::match(['put','patch'],'invoice/{id}', [BillController::class, 'update'])->name('invoice.update');

    Route::get('invoice_print/{id}', [BillController::class, 'invoice_print'])->name('invoice_print');

    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    // Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('customer',[CustomerController::class,'store'])->name('customer.store');
    Route::get('customer/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::match(['put','patch'],'customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('customer/{id}',[CustomerController::class, 'destroy'])->name('customer.destroy');

    Route::get('eat', [EatController::class, 'index'])->name('eat');
    // Route::get('eat/create', [EatController::class, 'create'])->name('eat.create');
    Route::post('eat',[EatController::class,'store'])->name('eat.store');
    Route::get('eat/{tour_id}/{location_id}/{restaurant_id}', [EatController::class, 'edit'])->name('eat.edit');
    Route::match(['put','patch'],'eat/{tour_id}/{location_id}/{restaurant_id}', [EatController::class, 'update'])->name('eat.update');
    Route::delete('eat/{tour_id}/{location_id}/{restaurant_id}',[EatController::class, 'destroy'])->name('eat.destroy');

    Route::get('employee_position', [Employee_PositionController::class, 'index'])->name('employee_position');
    // Route::get('employee_position/create', [Employee_PositionController::class, 'create'])->name('employee_position.create');
    Route::post('employee_position',[Employee_PositionController::class,'store'])->name('employee_position.store')->middleware('permission.checker:admin');
    Route::get('employee_position/{employee_id}/{office_id}', [Employee_PositionController::class, 'edit'])->name('employee_position.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'employee_position/{employee_id}/{office_id}', [Employee_PositionController::class, 'update'])->name('employee_position.update')->middleware('permission.checker:admin');
    Route::delete('employee_position/{employee_id}/{office_id}',[Employee_PositionController::class, 'destroy'])->name('employee_position.destroy')->middleware('permission.checker:admin');

    Route::get('employee', [EmployeeController::class, 'index'])->name('employee');
    // Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('employee',[EmployeeController::class,'store'])->name('employee.store');
    Route::get('employee/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::match(['put','patch'],'employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('employee/{id}',[EmployeeController::class, 'destroy'])->name('employee.destroy');

    Route::get('hotel', [HotelController::class, 'index'])->name('hotel');
    // Route::get('hotel/create', [HotelController::class, 'create'])->name('hotel.create');
    Route::post('hotel',[HotelController::class,'store'])->name('hotel.store');
    Route::get('hotel/{id}', [HotelController::class, 'edit'])->name('hotel.edit');
    Route::match(['put','patch'],'hotel/{id}', [HotelController::class, 'update'])->name('hotel.update');
    Route::delete('hotel/{id}',[HotelController::class, 'destroy'])->name('hotel.destroy');

    Route::get('income', [IncomeController::class, 'index'])->name('income');
    Route::post('filter_by_date', [IncomeController::class, 'filter_by_date'])->name('filter_by_date');
    Route::post('dashboard_filter', [IncomeController::class, 'dashboard_filter'])->name('dashboard_filter');
    Route::post('thirty_days', [IncomeController::class, 'thirty_days'])->name('thirty_days');

    Route::get('location', [LocationController::class, 'index'])->name('location');
    // Route::get('location/create', [LocationController::class, 'create'])->name('location.create');
    Route::post('location',[LocationController::class,'store'])->name('location.store');
    Route::get('location/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::match(['put','patch'],'location/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('location/{id}',[LocationController::class, 'destroy'])->name('location.destroy');

    Route::get('move', [MoveController::class, 'index'])->name('move');
    // Route::get('employee_position/create', [MoveController::class, 'create'])->name('employee_position.create');
    Route::post('move',[MoveController::class,'store'])->name('move.store');
    Route::get('move/{tour_id}/{location_id}/{vehicle_id}', [MoveController::class, 'edit'])->name('move.edit');
    Route::match(['put','patch'],'move/{tour_id}/{location_id}/{vehicle_id}', [MoveController::class, 'update'])->name('move.update');
    Route::delete('move/{tour_id}/{location_id}/{vehicle_id}',[MoveController::class, 'destroy'])->name('move.destroy');

    Route::get('office', [OfficeController::class, 'index'])->name('office');
    // Route::get('office/create', [OfficeController::class, 'create'])->name('office.create');
    Route::post('office',[OfficeController::class,'store'])->name('office.store')->middleware('permission.checker:admin');
    Route::get('office/{id}', [OfficeController::class, 'edit'])->name('office.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'office/{id}', [OfficeController::class, 'update'])->name('office.update')->middleware('permission.checker:admin');
    Route::delete('office/{id}',[OfficeController::class, 'destroy'])->name('office.destroy')->middleware('permission.checker:admin');

    Route::get('opject', [OpjectController::class, 'index'])->name('opject');
    // Route::get('opject/create', [OpjectController::class, 'create'])->name('opject.create');
    Route::post('opject',[OpjectController::class,'store'])->name('opject.store');
    Route::get('opject/{id}', [OpjectController::class, 'edit'])->name('opject.edit');
    Route::match(['put','patch'],'opject/{id}', [OpjectController::class, 'update'])->name('opject.update');
    Route::delete('opject/{id}',[OpjectController::class, 'destroy'])->name('opject.destroy');

    Route::get('order', [OrderController::class, 'index'])->name('order');
    // Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('order',[OrderController::class,'store'])->name('order.store');
    Route::get('order/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::match(['put','patch'],'order/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('order/{id}',[OrderController::class, 'destroy'])->name('order.destroy');

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
    Route::post('unit',[UnitController::class,'store'])->name('unit.store')->middleware('permission.checker:admin');
    Route::get('unit/{id}', [UnitController::class, 'edit'])->name('unit.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'unit/{id}', [UnitController::class, 'update'])->name('unit.update')->middleware('permission.checker:admin');
    Route::delete('unit/{id}',[UnitController::class, 'destroy'])->name('unit.destroy')->middleware('permission.checker:admin');

    Route::get('vehicle', [VehicleController::class, 'index'])->name('vehicle');
    // Route::get('vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('vehicle',[VehicleController::class,'store'])->name('vehicle.store');
    Route::get('vehicle/{id}', [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::match(['put','patch'],'vehicle/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
    Route::delete('vehicle/{id}',[VehicleController::class, 'destroy'])->name('vehicle.destroy');

});





// Route::get('login', function () {
//     return view('login');
// });

// Route::get('/', function () {
//     return view('frontend.home');
// });
// Route::get('/search', function () {
//     return view('frontend.search');
// });
// Route::get('/cart', function () {
//     return view('frontend.cart');
// });
// Route::get('/category', function () {
//     return view('frontend.category');
// });
// Route::get('/complete', function () {
//     return view('frontend.complete');
// });
// Route::get('/details', function () {
//     return view('frontend.details');
// });
// Route::get('/email', function () {
//     return view('frontend.email');
// });

// Route::get('/bill_detail', function () {
//     return view('Order.bill_detail');
// });

// Route::get('/income', function () {
//     return view('index');
// });
// Route::get('/tour', function () {
//     return view('Tour.tour');
// });
