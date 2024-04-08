@extends('layouts.app')
@section('title')
    <title>Dashboard - Thanh toán</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Thanh toán</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a>Đơn hàng</a>
                </li>
                <li>
                    <a href="{{ route('bill') }}">Hóa đơn</a>
                </li>
                <li class="active">
                    <strong>Chi tiết</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action">
                <a href="{{ route('bill_print', ['id' => $bill->id]) }}" target="_blank" class="btn btn-primary"><i
                        class="fa fa-print"></i>
                    In hóa đơn </a>
            </div>
        </div>
    </div>
    <form action="">
        <div class="row">
            <div class="col-lg-12">
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
                                    <span><strong>Ngày lập:</strong>{{ $bill->bill_date }}</span><br />
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
            </div>
        </div>
    </form>
@endsection
