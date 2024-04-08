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
                        <h1 class="no-margins">40 886,200</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
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
                        <h1 class="no-margins">275,800</h1>
                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                        <small>Đơn hàng mới</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Hôm nay</span>
                        <h5>Khách hàng</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">106,120</h1>
                        <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
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
                            <select name="vehicle_id" id="vehicle_id" class="form-control">
                                <option selected disabled>---Chọn--------------</option>
                                <option value="7ngayqua">7 ngày qua</option>
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
                        </div>
                        {{-- <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-white active">Tháng này</button>
                            </div>
                        </div> --}}
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
                                        <h2 class="no-margins">2,346</h2>
                                        <small>Số đơn được thanh toán</small>
                                        <div class="stat-percent">100% <i class="fa fa-level-up text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 100%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">4,422</h2>
                                        <small>Số đơn hủy</small>
                                        <div class="stat-percent">100% <i class="fa fa-level-down text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 60%;" class="progress-bar"></div>
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
        $chart = new Morris.Area({
                element: 'chart',
                lineColors:  ['#3c8dbc', '#fc8710', '#ff6541'],
                hideHover: 'true', // Whether or not the series are hidden on hover
                pointFillColors: ['#ffffff'], //Point fill color
                pointStrokeColors: ['black'],// Point stroke color
                fillOpacity: 0.9,// Fill opacity.
                parseTime:false,// Whether to parse time or not. If true, time will be parsed from the string attribute named

                // The name of the data record attribute that contains x-values.
                xkey: 'period',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['tour_id', 'status', 'quantity'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                // behaveLikeLine: true,
                labels: ['Tours', 'Status', 'Quantity']
            });

            function char30daysord(){
                var _token = $('input[name=_token]').val();
                $.ajax({
                url: "{{ route('thirty_days') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {_token:_token},
                    success: function(data) {
                        $chart.setData(data)
                    }
                })
            }

            $('.dashboard-filter').change(function() {
                var dashboard_value = $(this).val();
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url: "{{ route('dashboard_filter') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {dashboard_value:dashboard_value, _token:_token},
                    success: function(data) {
                        $chart.setData(data)
                    }
                })
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
    {{-- <script>
        $(document).ready(function() {
            // Sử dụng AJAX để gọi tuyến đường '/get-chart-data'
            $.ajax({
                url: "{{ route('getChartData') }}",
                method: 'GET',
                success: function(response) {
                    // Lấy dữ liệu từ response
                    var ordersData = response.ordersData;
                    var billsData = response.billsData;

                    // Xử lý dữ liệu biểu đồ
                    var data = [{
                            label: "Số đơn được thanh toán",
                            data: ordersData.map(function(item) {
                                return [new Date(item.created_at).getTime(), item.quantity];
                            }),
                            color: "#1ab394"
                        },
                        {
                            label: "Số đơn hủy",
                            data: billsData.map(function(item) {
                                return [new Date(item.created_at).getTime(), parseFloat(item.total)];
                            }),
                            color: "#1C84C6"
                        }
                    ];

                    // Tùy chọn của biểu đồ
                    var options = {
                        series: {
                            lines: {
                                show: true
                            },
                            points: {
                                show: true
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        },
                        xaxis: {
                            mode: "time",
                            timeformat: "%Y-%m-%d"
                        },
                        yaxis: {
                            ticks: 10,
                            tickFormatter: function(v) {
                                return v + " Đơn";
                            }
                        },
                        tooltip: true,
                        tooltipOpts: {
                            content: "%s: %y Đơn"
                        }
                    };

                    // Vẽ biểu đồ
                    $.plot($("#flot-dashboard-chart"), data, options);
                }
            });
        });
    </script> --}}
@endsection
