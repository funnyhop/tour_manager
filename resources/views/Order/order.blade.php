@extends('layouts.app')
@section('title')
    <title>Dashboard - Đơn hàng</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Đơn hàng</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a>Đơn hàng</a>
                </li>
                <li class="active">
                    <a href="#"><strong>Đơn hàng</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="tour_id">Tour du lịch</label>
                        <select name="tour_id" id="tour_id" class="form-control">
                            <option selected disabled>Chọn tour du lịch</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id }}">{{ $tour->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label" for="customer_id">Khách hàng ID</label>
                        <select name="customer_id" id="customer_id" class="form-control">
                            <option selected disabled>Chọn ID</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label">Số lượng</label>
                        <input type="text" value="" name="quantity" placeholder="2" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3" hidden>
                    <div class="form-group">
                        <label class="control-label" for="status">Trạng thái</label>
                        <input type="text" value="0" name="status" placeholder="0(pending) / 1(paid) / 2(cancel)"
                            class="form-control">
                        {{-- <select name="status" id="status" class="form-control">
                            <option value="0">Chưa giải quyết</option>
                            <option value="1">Đã thanh toán</option>
                            <option value="2">Hủy đơn</option>
                        </select> --}}
                    </div>
                </div>
                <div class="col-sm-3" hidden>
                    <div class="form-group">
                        <label class="control-label" for="employee_id">Nhân viên</label>
                        <select name="employee_id" id="employee_id" class="form-control">
                            {{-- <option selected disabled>Chọn NV</option> --}}
                            <option selected value="1">Enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>
                                    <th>Đơn hàng ID</th>
                                    <th data-hide="phone">Khách hàng</th>
                                    <th data-hide="phone">Số lượng</th>
                                    <th data-hide="phone">Ngày lập</th>
                                    <th data-hide="phone">Trạng thái</th>
                                    <th data-hide="phone">Nhân viên</th>
                                    <th data-hide="phone,tablet">Tour du lịch</th>
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
                                            @foreach ($customers as $customer)
                                                @if ($item->customer_id == $customer->id)
                                                    {{ $customer->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $item->quantity }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="label label-primary">Pending</span>
                                            @elseif ($item->status == 1)
                                                <span class="label label-success">Paid</span>
                                            @else
                                                <span class="label label-danger">Canceled</span>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($employees as $employee)
                                                @if ($item->employee_id == $employee->id)
                                                    {{ $employee->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($tours as $tour)
                                                @if ($item->tour_id == $tour->id)
                                                    {{ $tour->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="d-action">
                                            @if ($item->status == 0)
                                                <a href="{{ route('invoice', ['id' => $item->id]) }}"
                                                    class=" btn-info btn btn-xs"><i class="fa fa-credit-card"
                                                        aria-hidden="true"></i></a>
                                                <form action="{{ route('order.destroy', ['id' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-danger btn btn-xs"><i
                                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            @elseif($item->status == 1)
                                                <a href="#" class=" btn-info btn btn-xs"><i class="fa fa-credit-card"
                                                        aria-hidden="true"></i></a>
                                                <button type="submit" class="btn-danger btn btn-xs"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            @else
                                                <a href="#" class=" btn-info btn btn-xs"><i class="fa fa-credit-card"
                                                        aria-hidden="true"></i></a>
                                                <form action="{{ route('order.destroy', ['id' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-danger btn btn-xs"><i
                                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            @endif
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
