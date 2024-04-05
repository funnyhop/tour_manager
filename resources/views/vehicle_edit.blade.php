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
                <li><a href="{{ route('vehicle') }}">Phương tiện</a></li>
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
            <form action="{{ route('vehicle.update', ['id' => $vehicle->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label class="control-label" for="name">Tên phương tiện</label>
                            <input type="text" id="name" name="name" value="{{ $vehicle->name }}"
                                placeholder="Nhập tên phương tiện" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="type">Loại phương tiện</label>
                            <input type="text" id="type" name="type" value="{{ $vehicle->type }}" placeholder="Ô tô"
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
