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
                <li><a href="{{ route('tour') }}">Danh sách</a></li>
                <li class="active">
                    <a href="#"><strong>Chỉnh sửa</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('tour.update', ['id' => $tour->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label class="control-label" for="name">Tên tour du lịch</label>
                            <input type="text" id="name" name="name" value="{{ $tour->name }}"
                                placeholder="Nhập tên tour du lịch" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="price">Giá tiền (VND)</label>
                            <input type="text" id="price" name="price" value="{{ $tour->price }}"
                                placeholder="299000" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày bắt đầu</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" class="form-control" placeholder="04/30/2024" name="start_date"
                                    value="{{ $tour->start_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="">Giờ bắt đầu</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span><input id="start_time"
                                    type="text" class="form-control" placeholder="08:00:00" name="start_time"
                                    value="{{ $tour->start_time }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Ngày kết thúc</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                    id="date_modified" type="text" class="form-control" placeholder="03/29/2024"
                                    name="end_date" value="{{ $tour->end_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="">Giờ kết thúc</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span><input id="end_time"
                                    type="text" class="form-control" placeholder="20:00:00" name="end_time"
                                    value="{{ $tour->end_time }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="description">Mô tả chi tiết</label>
                            <input type="text" id="description" name="description" value="{{ $tour->description }}"
                                placeholder="Nhập mô tả chi tiết" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-md-6">
                            <div class="image-crop">
                                <img id="previewImage" src="{{ asset("img/home/$tour->image") }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="outstanding">Sản phẩm nổi bật</label>
                            <div id="outstanding">
                                @if (isset($tour) && $tour->outstanding == 'Yes')
                                    <div class="i-checks col-md-2">
                                        <label class="">
                                            <div class="iradio_square-green" style="position: relative;">
                                                <input type="radio" checked="" value="Yes" name="outstanding"
                                                    style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"
                                                    style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>Yes
                                        </label>
                                    </div>
                                    <div class="i-checks">
                                        <label class="">
                                            <div class="iradio_square-green" style="position: relative;">
                                                <input type="radio" value="No" name="outstanding"
                                                    style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"
                                                    style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>No
                                        </label>
                                    </div>
                                @else
                                    <div class="i-checks col-md-2">
                                        <label class="">
                                            <div class="iradio_square-green" style="position: relative;">
                                                <input type="radio" value="Yes" name="outstanding"
                                                    style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"
                                                    style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>Yes
                                        </label>
                                    </div>
                                    <div class="i-checks">
                                        <label class="">
                                            <div class="iradio_square-green" style="position: relative;">
                                                <input type="radio" checked="" value="No" name="outstanding"
                                                    style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"
                                                    style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>No
                                        </label>
                                    </div>
                                @endif
                            </div>
                            <label for="newimg">Hãy chọn một ảnh mới.</label>
                            <div id="newimg">
                                <div class="btn-group">
                                    <label title="Upload image image" for="inputImage" class="btn btn-primary">
                                        <input type="file" accept="image/*" name="image" id="inputImage"
                                            class="hidden">
                                        Tải ảnh mới
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
