<?php

namespace App\Http\Controllers;

use App\Models\Eat;
use App\Models\Move;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Order;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tour, $eat, $move, $accommodation, $hotel, $location, $restaurant, $vehicle;
    public function __construct(){
        $this->tour = new Tour();
        $this->move = new Move();
        $this->eat = new Eat();
        $this->accommodation = new Accommodation();
        $this->hotel = new Hotel();
        $this->restaurant = new Restaurant();
        $this->vehicle = new Vehicle();
        $this->location = new Location();

    }
    public function index()
    {
        $list = $this->tour->tours();
        return view('frontend.home', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = date("Y-m-d");
        $tour = DB::table('tours')->select('id', 'name' , 'description', 'start_time', 'end_time', 'start_date', 'end_date','image', 'outstanding', 'price')
        ->where('id', $id)
        ->first();
        return view('frontend.cart', [
            'tour'=>$tour,
            'now' => $now
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Tạo một khách hàng mới và lưu vào cơ sở dữ liệu
        $customer = Customer::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
        ]);

        // Lấy ID của khách hàng vừa tạo
        $customerId = $customer->id;

        // Tạo một đơn hàng mới và lưu vào cơ sở dữ liệu
        $order = Order::create([
            'tour_id' => $request->input('tour_id'),
            'customer_id' => $customerId,
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'employee_id' => $request->input('employee_id'),
            'order_date' => $request->input('order_date'),
        ]);

        return view('frontend.complete');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tour = DB::table('tours')->select('id', 'name' , 'description', 'start_time', 'end_time', 'start_date', 'end_date', 'image', 'outstanding', 'price')->where('id', $id)->first();
        $eats = $this->eat->eats();
        $moves = $this->move->moves();
        $vehicles = $this->vehicle->vehicles();
        $locations = $this->location->locations();
        $hotels = $this->hotel->hotels();
        $restaurants = $this->restaurant->restaurants();
        $accommodation = $this->accommodation->accommodations();
        return view('frontend.details', [
            'tour'=>$tour,
            'eats' => $eats,
            'moves' => $moves,
            'accommodations' => $accommodation,
            'vehicles' => $vehicles,
            'locations' => $locations,
            'hotels' => $hotels,
            'restaurants' => $restaurants,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
