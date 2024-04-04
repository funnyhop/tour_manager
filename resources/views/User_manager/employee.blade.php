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
            <form action="{{ route('employee.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Tên nhân viên</label>
                            <input type="text" name="name" placeholder="Nhập tên nhân viên" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Giới tính</label>
                            <input type="text" name="gender" placeholder="Nam / Nữ" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày sinh</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" name="birthday" class="form-control" placeholder="03/27/2024"
                                    value="01/01/2024">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" name="address" placeholder="123 3/2 p.Hưng Lợi q.Ninh Kiều TP.CT"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="unit_id">Đơn vị</label>
                            <select name="unit_id" id="unit_id" class="form-control">
                                <option selected disabled>Chọn đơn vị</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" name="phone" placeholder="0912345612" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" name="email" placeholder="hop@gmail.com" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Mật khẩu</label>
                            <input type="password" name="password" placeholder="MyPassword123!" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Phân quyền</label>
                            <select name="role" class="form-control">
                                <option value="2">Emloyee</option>
                                <option value="1">Admin</option>
                            </select>
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
                                    <th data-hide="phone">Vai trò</th>
                                    <th data-hide="phone,tablet">Địa chỉ</th>
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
                                            {{ $item->gender }}
                                        </td>
                                        <td>
                                            {{ $item->birthday }}
                                        </td>
                                        <td>
                                            @foreach ($units as $unit)
                                                @if ($unit->id == $item->unit_id)
                                                    {{ $unit->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $item->phone }}
                                        </td>
                                        <td>
                                            {{ $item->email }}
                                        </td>
                                        <td>
                                            {{ $item->role }}
                                        </td>
                                        <td>
                                            {{ $item->address }}
                                        </td>
                                        <td class="d-action">
                                            <a href="{{ route('employee.edit', ['id' => $item->id]) }}"
                                                class="btn-warning btn btn-xs"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                            <form action="{{ route('employee.destroy', ['id' => $item->id]) }}"
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
                                    <td colspan="9">
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
