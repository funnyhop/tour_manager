@extends('layouts.app')
@section('title')
    <title>Dashboard - Địa điểm</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Địa điểm</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li><a href="{{ route('location') }}">Địa điểm</a></li>
                <li>
                    <a><strong>Chỉnh sửa</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('location.update', ['id' => $location->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="name">Tên địa điểm</label>
                            <input type="text" id="name" name="name" value="{{ $location->name }}"
                                placeholder="Nhập tên địa điểm" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="service">Dịch vụ</label>
                            <input type="text" id="service" name="service" value="{{ $location->service }}"
                                placeholder="Tham quan / trải nghiệm" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="price">Giá</label>
                            <input type="text" id="price" name="price" value="{{ $location->price }}"
                                placeholder="20000" class="form-control">
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
