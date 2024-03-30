@extends('layouts.app')
@section('title')
    <title>Dashboard - Đơn vị</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Đơn vị</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li><a>Cơ cấu công ty</a></li>
                <li>
                    <a><strong>Đơn vị</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" >Tên đơn vị</label>
                            <input type="text" value=""
                                placeholder="Nhập tên đơn vị" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" value="" placeholder="0972 099 252"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Số fax</label>
                            <input type="text" value="" placeholder="3 723 249"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Số giấy chứng nhận đăng ký DN</label>
                            <input type="text" value="" placeholder="0300588569"
                                class="form-control">
                        </div>
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
                                    <th>Đơn vị ID</th>
                                    <th data-hide="phone">Tên đơn vị</th>
                                    <th data-hide="phone">SDT</th>
                                    <th data-hide="phone" data-sort-ignore="true">Số fax</th>
                                    <th data-hide="phone" data-sort-ignore="true">Số giấy chứng nhận đăng ký DN</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        Phòng marketing
                                    </td>
                                    <td>
                                        0912345678
                                    </td>
                                    <td>
                                        3723249
                                    </td>
                                    <td>
                                        0300588569
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="#" class="btn-warning btn btn-xs"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
