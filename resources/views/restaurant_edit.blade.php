@extends('layouts.app')
@section('title')
    <title>Dashboard - Nhà hàng</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Nhà hàng</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a href="{{ route('restaurant') }}">Nhà hàng</a>
                </li>
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
            <form action="{{ route('restaurant.update', ['id' => $restaurant->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label class="control-label" for="name">Tên nhà hàng</label>
                            <input type="text" id="name" name="name" value="{{ $restaurant->name }}"
                                placeholder="Nhập tên nhà hàng" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="description">Mô tả</label>
                            <input type="text" id="description" name="description" value="{{ $restaurant->description }}" placeholder="****"
                                class="form-control">
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
