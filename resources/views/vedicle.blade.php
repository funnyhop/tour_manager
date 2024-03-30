@extends('layouts.app')
@section('title')
    <title>Dashboard - Phương tiện</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Phương tiện</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a><strong>Phương tiện</strong></a>
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
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Tên phương tiện</label>
                            <input type="text" id="order_id" name="order_id" value=""
                                placeholder="Nhập tên phương tiện" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="amount">Loại phương tiện</label>
                            <input type="text" id="amount" name="amount" value="" placeholder="Ô tô"
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
                                    <th>Phương tiện ID</th>
                                    <th data-hide="phone">Tên phương tiện</th>
                                    <th data-hide="phone">Loại phương tiện</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        Xe khách 11 chỗ
                                    </td>
                                    <td>
                                        Ô tô
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
                                <tr>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        Tàu siêu tốc 32 chỗ
                                    </td>
                                    <td>
                                        Tàu thuyền
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
