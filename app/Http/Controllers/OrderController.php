<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $order;
    public function __construct(){
        $this->order = new Order();
    }
    public function index()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = date("Y-m-d");
        $list = $this->order->orders();
        $customers = DB::table('customers')->get()->all();
        $tours = DB::table('tours')->get()->all();
        $employees = DB::table('employees')->get()->all();
        return view('Order.order', compact('list', 'customers','tours', 'employees', 'now'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $order = Order::create([
            'tour_id' => $request->input('tour_id'),
            'customer_id' => $request->input('customer_id'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'employee_id' => $request->input('employee_id'),
            'order_date' => $request->input('order_date'),
        ]);

        $order->save();
        return redirect()->route('order');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = DB::table('customers')->get()->all();
        $tours = DB::table('tours')->get()->all();
        $order = DB::table('orders')->select('id', 'tour_id' , 'customer_id', 'quantity', 'status', 'order_date', 'employee_id')->where('id', $id)->first();
        return view('Order.order_edit', [
            'order'=>$order,
            'customers' => $customers,
            'tours' => $tours ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tour_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $order = DB::table('orders')->where('id', $id)
            ->update([
                'tour_id' => $request->input('tour_id'),
                'customer_id' => $request->input('customer_id'),
                'quantity' => $request->input('quantity'),
                'status' => $request->input('status'),
                'employee_id' => $request->input('employee_id'),
                'order_date' => $request->input('order_date'),

            ]);
        return redirect()->route('order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = DB::table('orders')->where('id', $id);
        $order->delete();
        return redirect()->route('order');
    }
}
