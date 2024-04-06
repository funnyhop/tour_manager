@extends('layouts.app')
@section('title')
    <title>Dashboard - Tour du lịch</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Nơi ở</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li>
                    <a>Tour du lịch</a>
                </li>
                <li><a href="{{ route('accommodation') }}">Nơi ở</a></li>
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
            <form
                action="{{ route('accommodation.update', ['tour_id' => $accommodation->tour_id, 'location_id' => $accommodation->location_id, 'hotel_id' => $accommodation->hotel_id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="tour_id">Tour du lịch</label>
                            <select name="tour_id" id="tour_id" class="form-control">
                                <option value="{{ $accommodation->tour_id }}">
                                    @foreach ($tours as $tour)
                                        @if ($accommodation->tour_id == $tour->id)
                                            {{ $tour->name }}
                                        @endif
                                    @endforeach
                                </option>
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
                                <option value="{{ $accommodation->location_id }}">
                                    @foreach ($locations as $location)
                                        @if ($accommodation->location_id == $location->id)
                                            {{ $location->name }}
                                        @endif
                                    @endforeach
                                </option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="hotel_id">Khách sạn</label>
                            <select name="hotel_id" id="hotel_id" class="form-control">
                                <option value="{{ $accommodation->hotel_id }}">
                                    @foreach ($hotels as $hotel)
                                        @if ($accommodation->hotel_id == $hotel->id)
                                            {{ $hotel->name }}
                                        @endif
                                    @endforeach
                                </option>
                                @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Ngày</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    name="date_of_tour" type="text" class="form-control" placeholder="03/27/2024"
                                    value="{{ $accommodation->date_of_tour }}">
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
