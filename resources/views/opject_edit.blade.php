@extends('layouts.app')
@section('title')
    <title>Dashboard - Đối tượng</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Đối tượng</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a><strong>Đối tượng</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('opject.update', ['id' => $opject->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Loại đối tượng</label>
                            <input type="text" name="type" value="{{ $opject->type }}" placeholder="Khách hàng mới" class="form-control">
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
