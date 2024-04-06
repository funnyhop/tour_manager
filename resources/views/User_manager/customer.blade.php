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
                    <a href="#"><strong>Khách hàng</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('customer.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Tên Khách hàng</label>
                            <input type="text" value="" name="name" placeholder="Nhập tên Khách hàng"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Giới tính</label>
                            <input type="text" value="" name="gender" placeholder="Nam / Nữ" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày sinh</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" class="form-control" placeholder="03/27/2024" value="01/01/2001"
                                    name="birthday">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" value="" name="address"
                                placeholder="123 3/2 p.Hưng Lợi q.Ninh Kiều TP.CT" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="opject_id">Đối tượng</label>
                            <select name="opject_id" id="opject_id" class="form-control">
                                <option selected disabled>Chọn đối tượng</option>
                                @foreach ($opjects as $opject)
                                    <option value="{{ $opject->id }}">{{ $opject->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" value="" name="phone" placeholder="Nhập số điện thoại"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" value="" name="email" placeholder="hop@gmail.com"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Mật khẩu</label>
                            <input type="password" value="" name="password" placeholder="MyPassword123!"
                                class="form-control">
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
                                    <th>Khách hàng ID</th>
                                    <th data-hide="phone">Tên</th>
                                    <th data-hide="phone">Giới tính</th>
                                    <th data-hide="phone">Ngày sinh</th>
                                    <th data-hide="phone">Đối tượng</th>
                                    <th data-hide="phone">Số điện thoại</th>
                                    <th data-hide="phone">Email</th>
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
                                            @foreach ($opjects as $opject)
                                                @if ($item->opject_id == $opject->id)
                                                    {{ $opject->type }}
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
                                            {{ $item->address }}
                                        </td>
                                        <td class="d-action">
                                            <a href="{{ route('customer.edit', ['id' => $item->id]) }}"
                                                class="btn-warning btn btn-xs"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                            <form action="{{ route('customer.destroy', ['id' => $item->id]) }}"
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
