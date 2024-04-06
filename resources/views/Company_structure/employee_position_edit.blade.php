@extends('layouts.app')
@section('title')
    <title>Dashboard - Chức vụ nhân viên</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Chức vụ nhân viên</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li><a>Cơ cấu công ty</a></li>
                <li><a href="{{ route('employee_position') }}">Chức vụ nhân viên</a></li>
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
            <form action="{{ route('employee_position.update', ['employee_id' => $employee_position->employee_id, 'office_id' => $employee_position->office_id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Nhân viên ID</label>
                            <select class="form-control" name="employee_id">
                                <option value="{{ $employee_position->employee_id }}">
                                @foreach ($employees as $employee)
                                    @if ($employee_position->employee_id ==  $employee->id)
                                        {{ $employee->id }}
                                    @endif
                                @endforeach
                                </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Chức vụ</label>
                            <select class="form-control" name="office_id">
                                <option value="{{ $employee_position->office_id }}">
                                    @foreach ($offices as $office)
                                        @if ($employee_position->office_id ==  $office->id)
                                            {{ $office->name }}
                                        @endif
                                    @endforeach
                                    </option>
                                @foreach ($offices as $office)
                                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày hiệu lực</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    name="effective" type="text" class="form-control" placeholder="04/30/2024"
                                    value="{{ $employee_position->effective }}">
                            </div>
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
