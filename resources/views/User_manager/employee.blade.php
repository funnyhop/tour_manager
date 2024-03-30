@extends('layouts.app')
@section('title')
    <title>Dashboard - Quản lý người dùng</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Quản lý người dùng</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a>Quản lý người dùng</a>
                </li>
                <li class="active">
                    <a href="#"><strong>Nhân viên</strong></a>
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
                            <label class="control-label">Tên nhân viên</label>
                            <input type="text" value=""
                                placeholder="Nhập tên nhân viên" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Giới tính</label>
                            <input type="text" value="" placeholder="Nam / Nữ"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày sinh</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" class="form-control" placeholder="03/27/2024" value="03/27/2024">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" value="" placeholder="123 3/2 p.Hưng Lợi q.Ninh Kiều TP.CT"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="status">Đơn vị</label>
                            <select name="status" id="status" class="form-control">
                                <option selected disabled>Chọn đơn vị</option>
                                <option value="">Enabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" value=""
                                placeholder="Nhập tên nhân viên" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" value=""
                                placeholder="Nhập tên nhân viên" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Mật khẩu</label>
                            <input type="text" value=""
                                placeholder="12345678" class="form-control">
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
                                    <th data-hide="phone">Tên</th>
                                    <th data-hide="phone">Giới tính</th>
                                    <th data-hide="phone">Ngày sinh</th>
                                    <th data-hide="phone">Đơn vị</th>
                                    <th data-hide="phone">Số điện thoại</th>
                                    <th data-hide="phone">Email</th>
                                    <th data-hide="phone,tablet">Địa chỉ</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        Du lịch 2 ngày 1 đêm
                                    </td>
                                    <td>
                                        Nam
                                    </td>
                                    <td>
                                        03/04/2015
                                    </td>
                                    <td>
                                        Phòng Marketing
                                    </td>
                                    <td>
                                        0912847653
                                    </td>
                                    <td>
                                        hop@gmail.com
                                    </td>
                                    <td>
                                        123 3/2 p.Hưng Lợi q.Ninh Kiều TP.CT
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
                                    <td colspan="8">
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
