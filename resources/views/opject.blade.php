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
            <form action="{{ route('opject.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Loại đối tượng</label>
                            <input type="text" name="type" placeholder="Khách hàng mới" class="form-control">
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
                                    <th>Đối tượng ID</th>
                                    <th data-hide="phone">Loại đối tượng</th>
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
                                            {{ $item->type }}
                                        </td>
                                        <td class="d-action">
                                            <a href="{{ route('opject.edit', ['id' => $item->id]) }}"
                                                class="btn-warning btn btn-xs"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                            <form action="{{ route('opject.destroy', ['id' => $item->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-danger btn btn-xs"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
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
