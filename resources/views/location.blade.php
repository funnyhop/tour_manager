@extends('layouts.app')
@section('title')
    <title>Dashboard - Địa điểm</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Địa điểm</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a><strong>Địa điểm</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('location.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="name">Tên địa điểm</label>
                            <input type="text" id="name" name="name" value=""
                                placeholder="Nhập tên địa điểm" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="service">Dịch vụ</label>
                            <input type="text" id="service" name="service" value=""
                                placeholder="Tham quan / trải nghiệm" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="price">Giá</label>
                            <input type="text" id="price" name="price" value="" placeholder="20000"
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
                                    <th>Địa điểm ID</th>
                                    <th data-hide="phone">Tên địa điểm</th>
                                    <th data-hide="phone">Dịch vụ</th>
                                    <th data-hide="phone">Giá vé</th>
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
                                            {{ $item->service }}
                                        </td>
                                        <td>
                                            {{ $item->price }}
                                        </td>
                                        <td class="d-action">
                                            <a href="{{ route('location.edit', ['id' => $item->id]) }}"
                                                class="btn-warning btn btn-xs"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                            <form action="{{ route('location.destroy', ['id' => $item->id]) }}"
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
