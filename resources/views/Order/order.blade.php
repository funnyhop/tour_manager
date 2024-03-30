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
            <form action="">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label" for="status">Tour du lịch</label>
                        <select name="status" id="status" class="form-control">
                            <option selected disabled>Chọn tour du lịch</option>
                            <option value="">Enabled</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label" for="status">Khách hàng ID</label>
                        <select name="status" id="status" class="form-control">
                            <option selected disabled>Chọn ID</option>
                            <option value="">Enabled</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label">Số khách</label>
                        <input type="text" value="" placeholder="2" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label">Trạng thái</label>
                        <input type="text" value="" placeholder="0(chưa thanh toán) / 1(đã thanh toán)" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3" hidden>
                    <div class="form-group">
                        <label class="control-label" for="status">Nhân viên</label>
                        <select name="status" id="status" class="form-control">
                            <option selected disabled>Chọn NV</option>
                            <option value="">Enabled</option>
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
                                    <th data-hide="phone">Số khách</th>
                                    <th data-hide="phone">Trạng thái</th>
                                    <th data-hide="phone">Ngày lập</th>
                                    <th data-hide="phone">Nhân viên</th>
                                    <th data-hide="phone,tablet">Tour du lịch</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        Nam
                                    </td>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        03/05/2015
                                    </td>
                                    <td>
                                        Phương
                                    </td>
                                    <td>
                                        Du lịch 2 ngày
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="/checkout" class=" btn-info btn btn-xs"><i
                                                    class="fa fa-credit-card" aria-hidden="true"></i></a>
                                            <a href="#" class="btn-danger btn btn-xs"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
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
