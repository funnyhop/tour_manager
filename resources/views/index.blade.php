@extends('layouts.app')
@section('title')
    <title>Dashboard - Tổng quan</title>
@endsection
@section('style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Tháng này</span>
                        <h5>Doanh thu</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ number_format($month_income->revenue, 0, '.', ',') }} đ</h1>
                        @php
                            // Tính tỷ lệ tăng/giảm
                            if ($lastMonthIncome->revenue != 0) {
                                $income_ratio =
                                    (($month_income->revenue - $lastMonthIncome->revenue) / $lastMonthIncome->revenue) *
                                    100;
                            } else {
                                // Nếu không có doanh thu trong tháng trước, đặt tỷ lệ tăng/giảm là một giá trị mặc định
                                $income_ratio = 100; // Đặt giá trị mặc định là 100% tăng
                            }
                            $absolute_income_ratio = abs($income_ratio); // Lấy giá trị tuyệt đối của $income_ratio
                        @endphp
                        @if ($income_ratio >= 0.0)
                            <div class="stat-percent font-bold text-navy">
                                {{ number_format($absolute_income_ratio, 0, '.', ',') }}% <i class="fa fa-level-up"></i>
                            </div>
                        @else
                            <div class="stat-percent font-bold text-danger">
                                {{ number_format($absolute_income_ratio, 0, '.', ',') }}% <i class="fa fa-level-down"></i>
                            </div>
                        @endif
                        <small>Tổng doanh thu</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">Hôm nay</span>
                        <h5>Đơn hàng</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ number_format($order_quantity_today, 0, '.', ',') }}</h1>
                        @php
                            // Tính tỷ lệ tăng/giảm
                            if ($order_quantity_yesterday != 0) {
                                $order_ratio =
                                    (($order_quantity_today - $order_quantity_yesterday) / $order_quantity_yesterday) *
                                    100;
                            } else {
                                // Nếu không có đơn hàng vào ngày hôm trước, đặt tỷ lệ tăng/giảm là một giá trị mặc định
                                $order_ratio = 100; // Đặt giá trị mặc định là 100% tăng
                            }
                            $absolute_order_ratio = abs($order_ratio); // Lấy giá trị tuyệt đối của $order_ratio
                        @endphp

                        @if ($order_ratio >= 0.0)
                            <div class="stat-percent font-bold text-navy">
                                {{ number_format($absolute_order_ratio, 0, '.', ',') }}% <i class="fa fa-level-up"></i>
                            </div>
                        @else
                            <div class="stat-percent font-bold text-danger">
                                {{ number_format($absolute_order_ratio, 0, '.', ',') }}% <i class="fa fa-level-down"></i>
                            </div>
                        @endif
                        <small>Đơn hàng mới</small>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Tháng này</span>
                        <h5>Khách hàng</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ number_format($cus_news_month, 0, '.', ',') }}</h1>
                        @php
                            // Tính tỷ lệ tăng/giảm
                            if ($cus_last_month != 0) {
                                $cus_ratio = (($cus_news_month - $cus_last_month) / $cus_last_month) * 100;
                            } else {
                                // Nếu không có khách hàng trong tháng trước, đặt tỷ lệ tăng/giảm là một giá trị mặc định
                                $cus_ratio = 100; // Đặt giá trị mặc định là 100% tăng
                            }
                            $cus_absolute_ratio = abs($cus_ratio); // Lấy giá trị tuyệt đối của $cus_ratio
                        @endphp
                        @if ($cus_ratio >= 0.0)
                            <div class="stat-percent font-bold text-navy">
                                {{ number_format($cus_absolute_ratio, 0, '.', ',') }}% <i class="fa fa-level-up"></i>
                            </div>
                        @else
                            <div class="stat-percent font-bold text-danger">
                                {{ number_format($cus_absolute_ratio, 0, '.', ',') }}% <i class="fa fa-level-down"></i>
                            </div>
                        @endif
                        <small>Khách hàng mới</small>
                    </div>

                </div>
            </div>
        </div>
        <div class="ibox-content m-b-sm border-bottom">
            <form autocomplete="off" action="{{ route('filter_by_date') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <div class="dashboard-filter form-group">
                            <label class="control-label" for="vehicle_id">Lọc theo</label>
                            <select name="dashboard_value" id="dashboard_value" class="form-control">
                                <option selected disabled>---Chọn--------------</option>
                                <option value="7ngay">7 ngày qua</option>
                                <option value="thangnay">Tháng này</option>
                                <option value="thangtruoc">Tháng trước</option>
                                <option value="365ngay">365 ngày</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Từ ngày</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" class="form-control" name="from_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Đến ngày</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                    id="date_modified" type="text" class="form-control" name="to_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <input type="button" id="btn-dashboard-filter" class="btn btn-warning" value="Lọc kết quả"
                                style="margin-top: 24px">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-lg-2">
                                <h5>Đơn hàng</h5>
                            </div>
                            <div class="pull-right" style="margin-right: 2%">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-white active">Tháng này</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="chart"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <ul class="stat-list">
                                    <li>
                                        <h2 class="no-margins">{{ number_format($paid_order, 0, '.', ',') }}</h2>
                                        <small>Số đơn được thanh toán</small>
                                        <div class="stat-percent">
                                            @if ($paid_order > 0)
                                                {{ number_format($paid_percent = ($paid_order / $order_total_month) * 100, 2, '.', ',') }}%
                                            @else
                                                0%
                                            @endif
                                            <i class="fa fa fa-bolt text-warning"></i>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar"
                                                style="width:
                                                @if (isset($paid_order) && $paid_order > 0) {{ $paid_percent }}%;
                                                @else
                                                    0%; @endif
                                            ">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">{{ number_format($canceled_order, 0, '.', ',') }}</h2>
                                        <small>Số đơn hủy</small>
                                        <div class="stat-percent">
                                            @if ($canceled_order > 0)
                                                {{ number_format($canceled_percent = ($canceled_order / $order_total_month) * 100, 2, '.', ',') }}%
                                            @else
                                                0%
                                            @endif
                                            <i class="fa fa fa-bolt text-danger"></i>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar"
                                                style="width:
                                            @if ($canceled_order > 0) {{ $canceled_percent }}%;
                                            @else
                                                0%; @endif
                                            ">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">{{ number_format($pending_order, 0, '.', ',') }}</h2>
                                        <small>Chưa giải quyết</small>
                                        <div class="stat-percent">
                                            @if ($pending_order > 0)
                                                {{ number_format($pending_percent = ($pending_order / $order_total_month) * 100, 2, '.', ',') }}%
                                            @else
                                                0%
                                            @endif
                                            <i class="fa fa fa-bolt text-navy"></i>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar"
                                                style="width:
                                            @if ($pending_order > 0) {{ $pending_percent }}%;
                                            @else
                                                0%; @endif
                                            ">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script>
        $(document).ready(function() {
            char30daysord();
            $chart = new Morris.Area({
                element: 'chart',
                lineColors: ['#00ADAA', '#FFC736', '#FF6345', '#474243'],
                hideHover: 'true', // Whether or not the series are hidden on hover
                pointFillColors: ['#ffffff'], //Point fill color
                pointStrokeColors: ['black'], // Point stroke color
                fillOpacity: 0.9, // Fill opacity.
                parseTime: false, // Whether to parse time or not. If true, time will be parsed from the string attribute named

                // The name of the data record attribute that contains x-values.
                xkey: 'period',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['total', 'tour', 'status', 'quantity'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                // behaveLikeLine: true,
                labels: ['Total', 'Tour', 'Status', 'Quantity']
            });

            function char30daysord() {
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url: "{{ route('thirty_days') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        $chart.setData(data)
                    }
                })
            }

            $('.dashboard-filter select').change(function() {
                var dashboard_value = $(this).val();
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url: "{{ route('dashboard_filter') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        dashboard_value: dashboard_value,
                        _token: _token
                    },
                    success: function(data) {
                        $chart.setData(data);
                    }
                });
            });



            $('#btn-dashboard-filter').click(function(event) {
                event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
                var _token = $('input[name=_token]').val();
                var from_date = $('#date_added').val();
                var to_date = $('#date_modified').val();
                $.ajax({
                    url: "{{ route('filter_by_date') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        _token: _token
                    },
                    success: function(data) {
                        $chart.setData(data)
                    }
                })
            });
        });
    </script>
@endsection
