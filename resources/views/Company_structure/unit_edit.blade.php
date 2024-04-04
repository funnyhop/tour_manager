@extends('layouts.app')
@section('title')
    <title>Dashboard - Đơn vị</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Đơn vị</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li><a>Cơ cấu công ty</a></li>
                <li>
                    <a href="{{ route('unit') }}">Đơn vị</a>
                </li>
                <li class="active">
                    <a><strong>Chỉnh sửa</strong></a>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('unit.update',['id' => $unit->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-sm-3" hidden>
                        <div class="form-group">
                            <label class="control-label" >Tên đơn vị</label>
                            <input type="text" name="id"
                            value="{{ $unit->id }}"    placeholder="Nhập tên đơn vị" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" >Tên đơn vị</label>
                            <input type="text" name="name"
                            value="{{ $unit->name }}"    placeholder="Nhập tên đơn vị" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" name="phone" placeholder="0972 099 252"
                            value="{{ $unit->phone }}"   class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Số fax</label>
                            <input type="text" name="fax" placeholder="3 723 249"
                            value="{{ $unit->fax }}"    class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Số giấy chứng nhận đăng ký DN</label>
                            <input type="text" name="thue" placeholder="0300588569"
                            value="{{ $unit->thue }}"    class="form-control">
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
