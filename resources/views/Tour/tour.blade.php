@extends('layouts.app')
@section('title')
    <title>Dashboard - Tour du lịch</title>
@endsection
@section('style')
    <style>
        .image-crop img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Tour du lịch</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a>Tour du lịch</a>
                </li>
                <li class="active">
                    <a href="#"><strong>Danh sách</strong></a>
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
                            <label class="control-label" for="order_id">Tên tour du lịch</label>
                            <input type="text" id="order_id" name="order_id" value=""
                                placeholder="Nhập tên tour du lịch" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="amount">Giá tiền (VND)</label>
                            <input type="text" id="amount" name="amount" value="" placeholder="299000"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày bắt đầu</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" class="form-control" placeholder="03/27/2024" value="03/27/2024">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="">Giờ bắt đầu</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span><input id=""
                                    type="text" class="form-control" placeholder="08:00:00" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Ngày kết thúc</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                    id="date_modified" type="text" class="form-control" placeholder="03/29/2024"
                                    value="03/28/2024">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="">Giờ kết thúc</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span><input id=""
                                    type="text" class="form-control" placeholder="20:00:00" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Mô tả chi tiết</label>
                            <input type="text" id="order_id" name="order_id" value=""
                                placeholder="Nhập mô tả chi tiết" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-md-6">
                            <div class="image-crop">
                                <img id="previewImage" src="{{ asset('img/home/product-1.png') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>
                                Hãy chọn một ảnh mới.
                            </h5>
                            <div class="btn-group">
                                <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                    <input type="file" accept="image/*" name="file" id="inputImage"
                                        class="hide">
                                    Tải ảnh mới
                                </label>
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
                                    <th>Tour ID</th>
                                    <th data-hide="phone">Tên tour du lịch</th>
                                    <th data-hide="phone,tablet">Giá tiền (VND)</th>
                                    <th data-hide="phone,tablet">Chi tiết</th>
                                    <th data-hide="phone">Ngày bắt đầu</th>
                                    <th data-hide="phone">Giờ bắt đầu</th>
                                    <th data-hide="phone">Ngày kết thúc</th>
                                    <th data-hide="phone">Giờ kết thúc</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        Du lịch 2 ngày 1 đêm Du lịch 2 ngày 1 đêmDu lịch 2 ngày 1 đêmDu lịch 2 ngày 1 đêmDu
                                        lịch 2 ngày 1 đêmDu lịch 2 ngày 1 đêm
                                    </td>
                                    <td>
                                        299000.00đ
                                    </td>
                                    <td>
                                        Du lịch 2 ngày 1 đêm Du lịch 2 ngày 1 đêmDu lịch 2 ngày 1 đêmDu lịch 2 ngày 1 đêmDu
                                        lịch 2 ngày 1 đêmDu lịch</td>
                                    <td>
                                        03/04/2015
                                    </td>
                                    <td>
                                        08:00:00
                                    </td>
                                    <td>
                                        03/05/2015
                                    </td>
                                    <td>
                                        20:00:00
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
