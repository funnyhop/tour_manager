@extends('layouts.app')
@section('title')
    <title>Dashboard - Hóa đơn</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Hóa đơn</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a>Đơn hàng</a>
                </li>
                <li class="active">
                    <a href="#"><strong>Hóa đơn</strong></a>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>
                                    <th>Hóa đơn ID</th>
                                    <th data-hide="phone">Đơn hàng ID</th>
                                    <th data-hide="phone">Ngày lập</th>
                                    <th data-hide="phone">Trị giá</th>
                                    <th data-hide="phone">Nhân viên</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->order_id }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            {{ $item->total }} VND
                                        </td>
                                        <td>
                                            @foreach ($employees as $employee)
                                                @if ($employee->id == $item->employee_id)
                                                    {{ $employee->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="d-action">
                                            <a href="{{ route('bill_detail', ['id' => $item->id]) }}"
                                                class=" btn-warning btn btn-xs"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></a>
                                            <a href="{{ route('bill_print', ['id' => $item->id]) }}"
                                                class="btn-primary btn btn-xs"><i class="fa fa-print"
                                                    aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
