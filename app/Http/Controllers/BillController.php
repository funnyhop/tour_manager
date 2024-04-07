<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $order, $bill;
    public function __construct(){
        $this->order = new Order();
        $this->bill = new Bill();
    }

    public function index()
    {
        $list = $this->bill->bills();
        // $orders =  DB::table('orders')->get()->all();
        $employees =  DB::table('employees')->get()->all();
        return view('Order.bill', compact('list', 'employees'));
    }
    public function bill_print(string $id)
    {
        $bill = DB::table('bills')
        ->where('id', $id)
        ->first();
        $orders =  DB::table('orders')->get()->all();
        $customers = DB::table('customers')->get()->all();
        $tours = DB::table('tours')->get()->all();
        $employees = DB::table('employees')->get()->all();
        return view('Order.bill_print', compact('orders', 'customers', 'tours','employees','bill'));

    }
    public function invoice(string $id)
    {
        $i=0;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = date("Y-m-d H:i:s");
        $ord = DB::table('orders')
        ->where('id', $id)
        ->first();
        $customers = DB::table('customers')->get()->all();
        $tours = DB::table('tours')->get()->all();
        $employees = DB::table('employees')->get()->all();
        return view('Order.invoice', compact('ord', 'customers', 'tours','employees', 'i', 'now'));
    }
    public function invoice_print(string $id)
    {
        $i=0;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = date("Y-m-d H:i:s");
        $ord = DB::table('orders')
        ->where('id', $id)
        ->first();
        $customers = DB::table('customers')->get()->all();
        $tours = DB::table('tours')->get()->all();
        $employees = DB::table('employees')->get()->all();
        return view('Order.invoice_print', compact('ord', 'customers', 'tours','employees', 'i', 'now'));

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
        $bill = Bill::create([
            'id' => $request->input('id'),
            'total' => $request->input('total'),
            'employee_id' => $request->input('employee_id'),
            'order_id' => $request->input('order_id'),
            'created_at' => $request->input('created_at'),
        ]);
        $bill->save();

        $order = DB::table('orders')
                ->where('id',$request->input('order_id'))
                ->update([
                    'status'=>1
                ]);

        return redirect()->route('order');

    }

    /**
     * Display the specified resource. show(string $id)
     */
    public function show(string $id)
    {
        $bill = DB::table('bills')
        ->where('id', $id)
        ->first();
        $orders =  DB::table('orders')->get()->all();
        $customers = DB::table('customers')->get()->all();
        $tours = DB::table('tours')->get()->all();
        $employees = DB::table('employees')->get()->all();
        return view('Order.bill_detail', compact('orders', 'customers', 'tours','employees','bill'));

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
        $order = DB::table('orders')->where('id', $id)
            ->update([
                'status' => $request->input('status'),
                // 'tour_id' => $request->input('tour_id'),
                // 'quantity' => $request->input('quantity'),
            ]);
        return redirect()->route('order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
