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
                <li><a href="{{ route('customer') }}">Khách hàng</a></li>
                <li class="active">
                    <a href="#"><strong></strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('customer.update', ['id' => $customer->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Tên Khách hàng</label>
                            <input type="text" value="{{ $customer->name }}" name="name"
                                placeholder="Nhập tên Khách hàng" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Giới tính</label>
                            <input type="text" value="{{ $customer->gender }}" name="gender" placeholder="Nam / Nữ"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày sinh</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" class="form-control" placeholder="03/27/2024"
                                    value="{{ $customer->birthday }}" name="birthday">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" value="{{ $customer->address }}" name="address"
                                placeholder="123 3/2 p.Hưng Lợi q.Ninh Kiều TP.CT" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="opject_id">Đối tượng</label>
                            <select name="opject_id" id="opject_id" class="form-control">
                                <option value="{{ $customer->opject_id }}">
                                    @foreach ($opjects as $opject)
                                        @if ($customer->opject_id == $opject->id)
                                            {{ $opject->type }}
                                        @endif
                                    @endforeach
                                </option>
                                @foreach ($opjects as $opject)
                                    <option value="{{ $opject->id }}">{{ $opject->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" value="{{ $customer->phone }}" name="phone"
                                placeholder="Nhập số điện thoại" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" value="{{ $customer->email }}" name="email" placeholder="hop@gmail.com"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Mật khẩu</label>
                            <input type="password" value="{{ $customer->password }}" name="password"
                                placeholder="MyPassword123!" class="form-control" readonly>
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
