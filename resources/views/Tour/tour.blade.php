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
            <form action="{{ route('tour.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label class="control-label" for="name">Tên tour du lịch</label>
                            <input type="text" id="name" name="name" value=""
                                placeholder="Nhập tên tour du lịch" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="price">Giá tiền (VND)</label>
                            <input type="text" id="price" name="price" value="" placeholder="299000"
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
                                    type="text" class="form-control" placeholder="01/01/2024" name="start_date"
                                    value="01/01/2024" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="start_time">Giờ bắt đầu</label>
                            <div class="input-group" data-autoclose="true">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                <input id="start_time" type="text" class="form-control" placeholder="08:00:00"
                                    name="start_time" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Ngày kết thúc</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                    id="date_modified" type="text" class="form-control" placeholder="01/02/2024"
                                    name="end_date" value="01/02/2024">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="end_time">Giờ kết thúc</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                <input id="end_time" type="text" class="form-control" placeholder="20:00:00"
                                    name="end_time" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="description">Mô tả chi tiết</label>
                            <input type="text" id="description" name="description" value=""
                                placeholder="Nhập mô tả chi tiết" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-md-6">
                            <div class="image-crop">
                                <img id="previewImage" src="{{ asset('img/home/slide-1.png') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="outstanding">Sản phẩm nổi bật</label>
                            <div id="outstanding">
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
                            </div>
                            <label for="newimg">Hãy chọn một ảnh mới.</label>
                            <div id="newimg">
                                <div class="btn-group">
                                    <label title="Upload image image" for="inputImage" class="btn btn-primary">
                                        <input type="file" accept="image/*" name="image" id="inputImage"
                                            class="hide">
                                        Tải ảnh mới
                                    </label>
                                </div>
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
                                    <th data-hide="phone,tablet">Img</th>
                                    <th data-hide="phone,tablet">Chi tiết</th>
                                    <th data-hide="phone">Ngày bắt đầu</th>
                                    <th data-hide="phone">Giờ bắt đầu</th>
                                    <th data-hide="phone">Ngày kết thúc</th>
                                    <th data-hide="phone">Giờ kết thúc</th>
                                    <th data-hide="phone">Nổi bật</th>
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
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->price }}
                                        </td>
                                        <td>{{ $item->image }}</td>
                                        <td>
                                            {{ $item->description }}
                                        </td>
                                        <td>
                                            {{ $item->start_date }}
                                        </td>
                                        <td>
                                            {{ $item->start_time }}
                                        </td>
                                        <td>
                                            {{ $item->end_date }}
                                        </td>
                                        <td>
                                            {{ $item->end_time }}
                                        </td>
                                        <td>
                                            {{ $item->outstanding }}
                                        </td>
                                        <td class="d-action">
                                            <a href="{{ route('tour.edit', ['id' => $item->id]) }}"
                                                class="btn-warning btn btn-xs"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                            <form action="{{ route('tour.destroy', ['id' => $item->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button href="#" class="btn-danger btn btn-xs"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
