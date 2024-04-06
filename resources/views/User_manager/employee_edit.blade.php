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
                <li>
                    <a href="{{ route('employee') }}">Nhân viên</a>
                </li>
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
            <form action="{{ route('employee.update', ['id' => $employee->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Tên nhân viên</label>
                            <input type="text" name="name" value="{{ $employee->name }}"
                                placeholder="Nhập tên nhân viên" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Giới tính</label>
                            <input type="text" name="gender" value="{{ $employee->gender }}" placeholder="Nam / Nữ"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày sinh</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" name="birthday" class="form-control" placeholder="01/01/2024"
                                    value="{{ $employee->birthday }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" name="address" value="{{ $employee->address }}"
                                placeholder="123 3/2 p.Hưng Lợi q.Ninh Kiều TP.CT" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="unit_id">Đơn vị</label>
                            <select name="unit_id" id="unit_id" class="form-control">
                                <option value="{{ $employee->unit_id }}">
                                    @foreach ($units as $unit)
                                        @if ($unit->id == $employee->unit_id)
                                            {{ $unit->name }}
                                        @endif
                                    @endforeach
                                </option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" name="phone" value="{{ $employee->phone }}" placeholder="0912345612"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" name="email" value="{{ $employee->email }}" placeholder="hop@gmail.com"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Mật khẩu</label>
                            <input type="password" name="password" value="{{ $employee->password }}"
                                placeholder="MyPassword123!" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Phân quyền</label>
                            <select name="role" class="form-control">
                                <option value="{{ $employee->role }}">
                                    @if ($employee->role == 2)
                                        Emloyee
                                    @else
                                        Admin
                                    @endif
                                </option>
                                <option value="2">Emloyee</option>
                                <option value="1">Admin</option>
                            </select>
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
