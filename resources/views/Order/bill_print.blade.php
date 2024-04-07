<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VietNamTourist | In hóa đơn</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="white-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content p-xl">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Từ:</h5>
                    <address>
                        <strong>VietNam Tourist</strong><br>
                        132 3/2, P.Hưng Lợi<br>
                        Quận Ninh Kiều TP Cần Thơ<br>
                        <abbr title="Phone">Phone:</abbr> +84 72 099 252
                    </address>
                </div>

                <div class="col-sm-6 text-right">
                    <h4>Mã hóa đơn</h4>
                    <h4 class="text-navy">{{ $bill->id }}</h4>
                    <span>Đến:</span>
                    <address>
                        <strong>
                            @foreach ($orders as $order)
                                @if ($bill->order_id == $order->id)
                                    @foreach ($customers as $customer)
                                        @if ($order->customer_id == $customer->id)
                                            {{ $customer->name }}
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </strong><br>
                        @foreach ($orders as $order)
                            @if ($bill->order_id == $order->id)
                                @foreach ($customers as $customer)
                                    @if ($order->customer_id == $customer->id)
                                        {{ $customer->address }}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        <br>
                        <abbr title="Phone">Phone:</abbr>
                        @foreach ($orders as $order)
                            @if ($bill->order_id == $order->id)
                                @foreach ($customers as $customer)
                                    @if ($order->customer_id == $customer->id)
                                        {{ $customer->phone }}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </address>
                    <p>
                        <span><strong>Ngày lập:</strong>{{ $bill->created_at }}</span><br />
                    </p>
                </div>
            </div>

            <div class="table-responsive m-t">
                <table class="table invoice-table">
                    <thead>
                        <tr>
                            <th>Mặt hàng</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @foreach ($orders as $order)
                                    @if ($bill->order_id == $order->id)
                                        @foreach ($tours as $tour)
                                            @if ($order->tour_id == $tour->id)
                                                {{ $tour->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($orders as $order)
                                    @if ($bill->order_id == $order->id)
                                        {{ $ord_quantity = $order->quantity }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($orders as $order)
                                    @if ($bill->order_id == $order->id)
                                        @foreach ($tours as $tour)
                                            @if ($order->tour_id == $tour->id)
                                                {{ $price = $tour->price }}
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <?php
                            $total = $ord_quantity * $price;
                            ?>
                            <td>{{ number_format($total, 2) }}</td>
                        </tr>

                    </tbody>
                </table>
            </div><!-- /table-responsive -->

            <table class="table invoice-total">
                <tbody>
                    <tr>
                        <td><strong>Thuế :</strong></td>
                        <?php
                        $tax = $total * 0.05;
                        ?>
                        <td>{{ number_format($tax, 2) }} VND</td>
                    </tr>
                    <tr>
                        <td><strong>Tổng tiền :</strong></td>
                        <?php
                        $paid = $total + $tax;
                        ?>
                        <td>{{ number_format($paid, 2) }} VND</td>
                    </tr>
                </tbody>
            </table>

            <div class="well m-t text-center">
                "Đừng ngồi một chỗ và chờ đợi cơ hội đến. Hãy đứng dậy và tạo ra chúng.”<strong> – Madam C.J.
                    Walker</strong>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
