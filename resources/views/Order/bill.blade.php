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
                    <a>Hóa đơn</a>
                </li>
                <li class="active">
                    <a href="#"><strong>Hóa đơn</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

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
                                <tr>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        03/05/2015
                                    </td>
                                    <td>
                                        200000đ
                                    </td>
                                    <td>
                                        Phương
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="#" class=" btn-info btn btn-xs"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
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
