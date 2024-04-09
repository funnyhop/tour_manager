<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Order;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $bill;
    public function __construct(){
        $this->bill = new Bill();
    }

    public function index()
    {
        // Tính doanh thu của tháng hiện tại
        $month_income = DB::table('bills')
            ->select(DB::raw('SUM(total) as revenue'))
            ->whereMonth('bill_date', '=', date('m'))
            ->whereYear('bill_date', '=', date('Y'))
            ->first();

        // Tính doanh thu của tháng trước
        $lastMonthIncome = DB::table('bills')
            ->select(DB::raw('SUM(total) as revenue'))
            ->whereMonth('bill_date', '=', date('m', strtotime('-1 month')))
            ->whereYear('bill_date', '=', date('Y', strtotime('-1 month')))
            ->first();

        // Số lượng đơn hàng của ngày hôm trước
        $order_quantity_yesterday = DB::table('orders')
            ->whereDate('order_date', '=', date('Y-m-d', strtotime('-1 day')))
            ->count();

        // Số lượng đơn hàng của ngày hôm nay
        $order_quantity_today = DB::table('orders')
            ->whereDate('order_date', '=', date('Y-m-d'))
            ->count();


        // Số lượng khách hàng mới của tháng hiện tại
        $cus_news_month = DB::table('customers')
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->count();

        // Số lượng khách hàng mới của tháng trước
        $cus_last_month = DB::table('customers')
            ->whereMonth('created_at', '=', date('m', strtotime('-1 month')))
            ->whereYear('created_at', '=', date('Y', strtotime('-1 month')))
            ->count();

        // Tổng số đơn hàng trong tháng hiện tại
        $order_total_month = DB::table('orders')
            ->whereMonth('order_date', '=', date('m'))
            ->whereYear('order_date', '=', date('Y'))
            ->count();

        // Số đơn hàng đã thanh toán trong tháng hiện tại
        $paid_order = DB::table('orders')
            ->whereMonth('order_date', '=', date('m'))
            ->whereYear('order_date', '=', date('Y'))
            ->where('status', '1')
            ->count();

        // Số đơn hàng bị hủy trong tháng hiện tại
        $canceled_order = DB::table('orders')
            ->whereMonth('order_date', '=', date('m'))
            ->whereYear('order_date', '=', date('Y'))
            ->where('status', '2')
            ->count();

        // Số đơn hàng đang chờ xử lý trong tháng hiện tại
        $pending_order = DB::table('orders')
            ->whereMonth('order_date', '=', date('m'))
            ->whereYear('order_date', '=', date('Y'))
            ->where('status', '0')
            ->count();


        // dd($pending_order, $canceled_order, $paid_order);
        return view('index', compact( 'month_income', 'order_quantity_today',
         'cus_news_month','paid_order', 'order_total_month', 'canceled_order',
          'pending_order', 'lastMonthIncome', 'cus_last_month', 'order_quantity_yesterday'));
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
            $orders = Order::whereBetween('order_date', [$sub7days, $now])
                ->orderBy('order_date', 'ASC')
                ->get();

            $bills = Bill::whereBetween('bill_date', [$sub7days, $now])
                ->orderBy('bill_date', 'ASC')
                ->get();

            // $statistics = Statistic::whereBetween('order_date', [$sub7days, $now])
            //         ->orderBy('order_date', 'ASC')
            //         ->get();

                // dd($orders, $statistics);
        } elseif ($data['dashboard_value'] == 'thangnay') {
            // dd($dauthangnay, $now);
            $orders = Order::whereBetween('order_date', [$dauthangnay, $now])
                ->orderBy('order_date', 'ASC')
                ->get();

            $bills = Bill::whereBetween('bill_date', [$dauthangnay, $now])
                ->orderBy('bill_date', 'ASC')
                ->get();

            // $statistics = Statistic::whereBetween('order_date', [$dauthangnay, $now])
            //     ->orderBy('order_date', 'ASC')
            //     ->get();
                // dd($orders, $statistics);
        } elseif ($data['dashboard_value'] == 'thangtruoc') {
            $orders = Order::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])
                ->orderBy('order_date', 'ASC')
                ->get();

            $bills = Bill::whereBetween('bill_date', [$dau_thangtruoc, $cuoi_thangtruoc])
                ->orderBy('bill_date', 'ASC')
                ->get();

            // $statistics = Statistic::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])
            //     ->orderBy('order_date', 'ASC')
            //     ->get();
                // dd($orders, $statistics);
        } elseif ($data['dashboard_value'] == '365ngay') {
            $orders = Order::whereBetween('order_date', [$sub365days, $now])
                ->orderBy('order_date', 'ASC')
                ->get();

            $bills = Bill::whereBetween('bill_date', [$sub365days, $now])
                ->orderBy('bill_date', 'ASC')
                ->get();

            // $statistics = Statistic::whereBetween('order_date', [$sub365days, $now])
            //     ->orderBy('order_date', 'ASC')
            //     ->get();
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

        foreach ($bills as $bill) {
            $chart_data[] = [
                'period' => $bill->bill_date,
                'total' => $bill->total,
            ];
        }

        // Loop through the data from the Statistic table and add it to the chart data array
        // foreach ($statistics as $statistic) {
        //     $chart_data[] = [
        //         'period' => $statistic->order_date,
        //         'order' => $statistic->total_order,
        //         'sales' => $statistic->sales,
        //         'profit' => $statistic->profit,
        //         'quantity' => $statistic->quantity
        //     ];
        // }

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

        // Truy vấn dữ liệu từ bảng Order trong khoảng 30 ngày gần đây
        $orders = Order::whereBetween('order_date', [$thirty_days_ago, $now])
                        ->orderBy('order_date', 'ASC')
                        ->get();

        $bills = Bill::whereBetween('bill_date', [$thirty_days_ago, $now])
                        ->orderBy('bill_date', 'ASC')
                        ->get();

        // // Truy vấn dữ liệu từ bảng Statistic trong khoảng 30 ngày gần đây
        // $statistics = Statistic::whereBetween('order_date', [$thirty_days_ago, $now])
        //                         ->orderBy('order_date', 'ASC')
        //                         ->get();

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

        foreach ($bills as $bill) {
            $chart_data[] = [
                'period' => $bill->bill_date,
                'total' => $bill->total,
            ];
        }

        // // Loop qua dữ liệu từ bảng Statistic và thêm vào mảng dữ liệu cho biểu đồ
        // foreach ($statistics as $statistic) {
        //     $chart_data[] = [
        //         'period' => $statistic->order_date,
        //         'order' => $statistic->total_order,
        //         'sales' => $statistic->sales,
        //         'profit' => $statistic->profit,
        //         'quantity' => $statistic->quantity
        //     ];
        // }

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

        $bills = Bill::whereBetween('bill_date', [$from_date, $to_date])
                    ->orderBy('bill_date', 'ASC')
                    ->get();

        // Truy vấn dữ liệu từ bảng Statistic
        // $statistics = Statistic::whereBetween('order_date', [$from_date, $to_date])
        //                     ->orderBy('order_date','ASC')
        //                     ->get();

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

        foreach ($bills as $bill) {
            $chart_data[] = [
                'period' => $bill->bill_date,
                'total' => $bill->total,
            ];
        }

        // Lặp qua dữ liệu từ bảng Statistic và thêm vào mảng dữ liệu cho biểu đồ
        // foreach ($statistics as $statistic) {
        //     $chart_data[] = [
        //         'period' => $statistic->order_date,
        //         'order' => $statistic->total_order,
        //         'sales' => $statistic->sales,
        //         'profit' => $statistic->profit,
        //         'quantity' => $statistic->quantity
        //     ];
        // }

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
