@extends('layouts.app')
@section('title')
    <title>Dashboard - Chức vụ nhân viên</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Chức vụ nhân viên</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li><a>Cơ cấu công ty</a></li>
                <li>
                    <a><strong>Chức vụ nhân viên</strong></a>
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
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Nhân viên ID</label>
                            <select class="form-control">
                                <option selected disabled>Chọn ID nhân viên</option>
                                <option value="">Enabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Chức vụ</label>
                            <select class="form-control">
                                <option selected disabled>Chọn chức vụ</option>
                                <option value="">Enabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày hiệu lực</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" class="form-control" placeholder="03/27/2024" value="03/27/2024">
                            </div>
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
                                    <th>Nhân viên ID</th>
                                    <th data-hide="phone">Tên chức vụ</th>
                                    <th data-hide="phone">Ngày có hiệu lực</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        Trưởng phòng
                                    </td>
                                    <td>
                                        03/29/2024
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