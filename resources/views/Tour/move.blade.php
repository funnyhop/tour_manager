@extends('layouts.app')
@section('title')
    <title>Dashboard - Tour du lịch</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Di chuyển</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a>Tour du lịch</a>
                </li>
                <li class="active">
                    <a href="#"><strong>Di chuyển</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('move.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="tour_id">Tour du lịch</label>
                            <select name="tour_id" id="tour_id" class="form-control">
                                <option selected disabled>Chọn tour</option>
                                @foreach ($tours as $tour)
                                    <option value="{{ $tour->id }}">{{ $tour->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="location_id">Địa điểm</label>
                            <select name="location_id" id="location_id" class="form-control">
                                <option selected disabled>Chọn địa điểm</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="vehicle_id">Phương tiện</label>
                            <select name="vehicle_id" id="vehicle_id" class="form-control">
                                <option selected disabled>Chọn phương tiện</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    name="date_of_tour" type="text" class="form-control" placeholder="01/01/2024"
                                    value="01/01/2024">
                            </div>
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
                                    <th data-hide="phone">Tour du lịch</th>
                                    <th data-hide="phone">Địa điểm</th>
                                    <th data-hide="phone">Phương tiện</th>
                                    <th data-hide="phone">Ngày</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <td>
                                            @foreach ($tours as $tour)
                                                @if ($item->tour_id == $tour->id)
                                                    {{ $tour->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($locations as $location)
                                                @if ($item->location_id == $location->id)
                                                    {{ $location->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($vehicles as $vehicle)
                                                @if ($item->vehicle_id == $vehicle->id)
                                                    {{ $vehicle->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $item->date_of_tour }}
                                        </td>
                                        <td class="d-action">
                                            <a href="{{ route('move.edit', ['tour_id' => $item->tour_id, 'location_id' => $item->location_id, 'vehicle_id' => $item->vehicle_id]) }}"
                                                class="btn-warning btn btn-xs"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                            <form
                                                action="{{ route('move.destroy', ['tour_id' => $item->tour_id, 'location_id' => $item->location_id, 'vehicle_id' => $item->vehicle_id]) }}"
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
