<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        // dd($data);
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['dashboard_value'] == '7ngay') {
            $statistics = Statistic::whereBetween('order_date', ['2024-04-01', '2024-04-08'])
                ->orderBy('order_date', 'ASC')
                ->get();

            $orders = Order::whereBetween('order_date', [$sub7days, $now])
                ->orderBy('order_date', 'ASC')
                ->get();
                // dd($orders, $statistics);
        } elseif ($data['dashboard_value'] == 'thangnay') {
            // dd($dauthangnay, $now);
            $statistics = Statistic::whereBetween('order_date', [$dauthangnay, $now])
                ->orderBy('order_date', 'ASC')
                ->get();
            $orders = Order::whereBetween('order_date', [$dauthangnay, $now])
                ->orderBy('order_date', 'ASC')
                ->get();
                // dd($orders, $statistics);
        } elseif ($data['dashboard_value'] == 'thangtruoc') {
            $statistics = Statistic::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])
                ->orderBy('order_date', 'ASC')
                ->get();

            $orders = Order::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])
                ->orderBy('order_date', 'ASC')
                ->get();
                // dd($orders, $statistics);
        } elseif ($data['dashboard_value'] == '365ngay') {
            $statistics = Statistic::whereBetween('order_date', [$sub365days, $now])
                ->orderBy('order_date', 'ASC')
                ->get();

            $orders = Order::whereBetween('order_date', [$sub365days, $now])
                ->orderBy('order_date', 'ASC')
                ->get();
                // dd($orders, $statistics);
        }

        $chart_data = [];

        // Loop through the data from the Order table and add it to the chart data array
        foreach ($orders as $order) {
            $chart_data[] = [
                'period' => $order->order_date,
                'tour' => $order->tour_id,
                'status' => $order->status,
                'quantity' => $order->quantity
            ];
        }

        // Loop through the data from the Statistic table and add it to the chart data array
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


    public function thirty_days(Request $request)
    {
        $data = $request->all();

        // Lấy ngày hiện tại và định dạng lại nó
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        // Lấy ngày 30 ngày trước và định dạng lại nó
        $thirty_days_ago = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();

        // Truy vấn dữ liệu từ bảng Statistic trong khoảng 30 ngày gần đây
        $statistics = Statistic::whereBetween('order_date', [$thirty_days_ago, $now])
                                ->orderBy('order_date', 'ASC')
                                ->get();

        // Truy vấn dữ liệu từ bảng Order trong khoảng 30 ngày gần đây
        $orders = Order::whereBetween('order_date', [$thirty_days_ago, $now])
                        ->orderBy('order_date', 'ASC')
                        ->get();

        // Khởi tạo mảng dữ liệu cho biểu đồ
        $chart_data = [];

        // Loop qua dữ liệu từ bảng Order và thêm vào mảng dữ liệu cho biểu đồ
        foreach ($orders as $order) {
            $chart_data[] = [
                'period' => $order->order_date,
                'tour' => $order->tour_id,
                'status' => $order->status,
                'quantity' => $order->quantity
            ];
        }

        // Loop qua dữ liệu từ bảng Statistic và thêm vào mảng dữ liệu cho biểu đồ
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


    public function filter_by_date(Request $request)
    {
        // Lấy ngày bắt đầu và kết thúc từ request và định dạng chúng
        $from_date = $this->formatDate($request->input('from_date'));
        $to_date = $this->formatDate($request->input('to_date'));

        // Truy vấn dữ liệu từ bảng Order
        $orders = Order::whereBetween('order_date', [$from_date, $to_date])
                    ->orderBy('order_date','ASC')->get();

        // Truy vấn dữ liệu từ bảng Statistic
        $statistics = Statistic::whereBetween('order_date', [$from_date, $to_date])
                            ->orderBy('order_date','ASC')->get();
        // Khởi tạo mảng dữ liệu cho biểu đồ
        $chart_data = [];

        // Lặp qua dữ liệu từ bảng Order và thêm vào mảng dữ liệu cho biểu đồ
        foreach ($orders as $order) {
            $chart_data[] = [
                'period' => $order->order_date,
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
        // Kiểm tra xem ngày tháng có đúng định dạng 'Y-m-d' hay không
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            // Nếu đúng định dạng 'Y-m-d', không cần chuyển đổi
            return $date;
        } elseif (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
            // Nếu đúng định dạng '%m/%d/%Y', chuyển đổi thành định dạng 'Y-m-d'
            return date('Y-m-d', strtotime($date));
        } else {
            // Ngược lại, giữ nguyên giá trị của ngày tháng
            return null; // hoặc bạn có thể trả về một giá trị mặc định khác tùy thuộc vào logic của bạn
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
