@extends('layouts.app')
@section('title')
    <title>
        Dashboard - Thanh toán</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Thanh toán</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Thanh toán</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action" style="display: flex; justify-content: flex-end;">
                <form action="{{ route('invoice.update', ['id' => $ord->id]) }}" style="margin-right: 10px;" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" value="2" name="status" hidden/>
                    <button type="submit" class="btn btn-white"><i class="fa fa-ban"></i> Hủy đơn </button>
                </form>
                <a href="{{ route('invoice_print', ['id' => $ord->id]) }}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>
                    In hóa đơn </a>
            </div>
        </div>




    </div>
    <form action="{{ route('invoice.store') }}" method="POST">
        @csrf
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
                                <h4 class="text-navy">VNT-00{{ $ord->id }}-0{{ $i + $ord->id }}</h4>
                                <input type="text" name="id" value="VNT-00{{ $ord->id }}-0{{ $i + $ord->id }}"
                                    hidden />
                                <input type="text" name="employee_id" value="{{ $ord->employee_id }}" hidden />
                                <input type="text" name="order_id" value="{{ $ord->id }}" hidden />
                                <span>Đến:</span>
                                <address>
                                    <strong>
                                        @foreach ($customers as $customer)
                                            @if ($ord->customer_id == $customer->id)
                                                {{ $customer->name }}
                                            @endif
                                        @endforeach
                                    </strong><br>
                                    @foreach ($customers as $customer)
                                        @if ($ord->customer_id == $customer->id)
                                            {{ $customer->address }}
                                        @endif
                                    @endforeach
                                    <br>
                                    <abbr title="Phone">Phone:</abbr>
                                    @foreach ($customers as $customer)
                                        @if ($ord->customer_id == $customer->id)
                                            {{ $customer->phone }}
                                        @endif
                                    @endforeach
                                </address>
                                <p>
                                    <span><strong>Ngày lập:</strong> {{ $now }}</span><br />
                                    <input type="text" name="created_at" value="{{ $now }}" hidden />
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
                                            @foreach ($tours as $tour)
                                                @if ($ord->tour_id == $tour->id)
                                                    {{ $tour->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $ord->quantity }}</td>
                                        <td>
                                            @foreach ($tours as $tour)
                                                @if ($ord->tour_id == $tour->id)
                                                    {{ $price = $tour->price; }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <?php
                                        $total = $ord->quantity * $price;
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
                                    <input type="text" name="total" value="{{ $paid }}" hidden />
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-dollar"></i> Tiến hành thanh
                                toán</button>
                        </div>

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
