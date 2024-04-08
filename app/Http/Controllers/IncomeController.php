<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use App\Models\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function dashboard_filter(Request $request)
    {
        $data = $request->all();
    }

    public function thirty_days(Request $request)
    {
        //
    }

    public function filter_by_date(Request $request)
    {
        // Lấy ngày bắt đầu và kết thúc từ request và định dạng chúng
        $from_date = $this->formatDate($request->input('from_date'));
        $to_date = $this->formatDate($request->input('to_date'));

        // Truy vấn dữ liệu từ bảng Order
        $orders = Order::whereBetween('created_at', [$from_date, $to_date])
                    ->orderBy('created_at','ASC')->get();

        // Truy vấn dữ liệu từ bảng Statistic
        $statistics = Statistic::whereBetween('order_date', [$from_date, $to_date])
                            ->orderBy('order_date','ASC')->get();

        // Khởi tạo mảng dữ liệu cho biểu đồ
        $chart_data = [];

        // Lặp qua dữ liệu từ bảng Order và thêm vào mảng dữ liệu cho biểu đồ
        foreach ($orders as $order) {
            $chart_data[] = [
                'period' => $order->created_at,
                'tour' => $order->tour_id,
                'status' => $order->status,
                'quantity' => $order->quantity
            ];
        }

        // Lặp qua dữ liệu từ bảng Statistic và thêm vào mảng dữ liệu cho biểu đồ
        foreach ($statistics as $statistic) {
            $chart_data[] = [
                'period' => $statistic->order_date,
                'order' => $statistic->total_order,
                'sales' => $statistic->sales,
                'profit' => $statistic->profit,
                'quantity' => $statistic->quantity
            ];
        }

        // Trả về dữ liệu dưới dạng JSON
        return response()->json($chart_data);
    }


    private function formatDate($date)
    {
        // Kiểm tra xem ngày tháng có đúng định dạng '%m/%d/%Y' hay không
        if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
            // Nếu đúng định dạng, chuyển đổi thành định dạng 'Y-m-d'
            return date('Y-m-d', strtotime(str_replace('/', '-', $date)));
        } else {
            // Ngược lại, giữ nguyên giá trị của ngày tháng
            return $date;
        }
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
        //
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
