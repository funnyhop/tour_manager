@extends('frontend.layouts.app')
@section('title')
    <title>Việt Nam Tourist - Chi tiết</title>
@endsection
@section('link_css')
    {{-- <link rel="stylesheet" href="{{ asset('css/details.css') }}"> --}}
    <style>
        .product-detail .ibox-content {
            padding: 30px 30px 50px 30px;
        }

        .product-main-price small {
            font-size: 10px;
        }

        .product-images {
            margin-right: 20px;
            /* Di chuyển hình ảnh sang phải */
            margin-bottom: 20px;
            /* Tạo khoảng cách dưới hình ảnh */
        }
    </style>
@endsection
@section('content')
    <div id="wrap-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox product-detail">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-images" style="margin-bottom: 20px;">
                                    <img style="width: 99%; height: 100%;" src="{{ asset('img/home/' . $tour->image) }}"
                                        alt="">
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <h2 class="font-bold m-b-xs">
                                    {{ $tour->name }}
                                </h2>
                                <small>Hãy cùng Việt Nam khám phá miền đất mới.</small>
                                <dl class="small d-flex">
                                    <dt>Ngày giờ bắt đầu: </dt>
                                    <dd>{{ $tour->start_date }}&nbsp</dd>
                                    <dd>{{ $tour->start_time }}&nbsp&nbsp</dd>
                                    <dt>Ngày giờ kết thúc:</dt>
                                    <dd>{{ $tour->end_date }}&nbsp</dd>
                                    <dd>{{ $tour->end_time }}</dd>
                                </dl>
                                <div class="m-t-md">
                                    <h3 class="product-main-price">Giá: {{ number_format($tour->price, 0, '.', ',') }}<small
                                            class="text-muted">vnđ</small>
                                    </h3>
                                </div>
                                <h5>Giới thiệu</h5>
                                <div class="small text-muted">
                                    {{ $tour->description }}
                                </div>
                                <h5>Lịch trình</h5>
                                @foreach ($moves as $move)
                                    @if ($move->tour_id == $tour->id)
                                        <div class="row">
                                            <div class="col-3 date">
                                                <div class="d-flex">
                                                    <i class="fa fa-briefcase align-self-center mr-2"></i>
                                                    <div>
                                                        <strong>Ngày</strong><br>
                                                        <small class="text-muted">{{ $move->date_of_tour }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-9 content no-top-border">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="m-b-xs"><strong>Di chuyển</strong></p>
                                                        <p>
                                                            @foreach ($vehicles as $vehicle)
                                                                @if ($move->vehicle_id == $vehicle->id)
                                                                    {{ $vehicle->name }}
                                                                @endif
                                                            @endforeach
                                                            sẽ đưa du khách tới địa điểm du lịch
                                                            @foreach ($locations as $location)
                                                                @if ($move->location_id == $location->id)
                                                                    {{ $location->name }}
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @foreach ($eats as $eat)
                                    @if ($eat->tour_id == $tour->id)
                                        <div class="row">
                                            <div class="col-3 date">
                                                <div class="d-flex">
                                                    <i class="fa fa-briefcase align-self-center mr-2"></i>
                                                    <div>
                                                        <strong>Ngày</strong><br>
                                                        <small class="text-muted">{{ $eat->date_of_tour }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-9 content no-top-border">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="m-b-xs"><strong>Điểm ăn</strong></p>
                                                        <p>
                                                            Tại
                                                            @foreach ($locations as $location)
                                                                @if ($eat->location_id == $location->id)
                                                                    {{ $location->name }}.
                                                                @endif
                                                            @endforeach
                                                            du khách sẽ được phục vụ bởi
                                                            @foreach ($restaurants as $restaurant)
                                                                @if ($eat->restaurant_id == $restaurant->id)
                                                                    {{ $restaurant->name }}. {{ $restaurant->description }}
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @foreach ($accommodations as $accommodation)
                                    @if ($accommodation->tour_id == $tour->id)
                                        <div class="row">
                                            <div class="col-3 date">
                                                <div class="d-flex">
                                                    <i class="fa fa-briefcase align-self-center mr-2"></i>
                                                    <div>
                                                        <strong>Ngày</strong><br>
                                                        <small
                                                            class="text-muted">{{ $accommodation->date_of_tour }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-9 content no-top-border">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="m-b-xs"><strong>Nơi ở</strong></p>
                                                        <p>
                                                            Để đảm bảo nơi nghỉ ngơi cho du khách chúng tôi lựa chọn
                                                            @foreach ($hotels as $hotel)
                                                                @if ($accommodation->hotel_id == $hotel->id)
                                                                    {{ $hotel->name }}
                                                                @endif
                                                            @endforeach
                                                            tại
                                                            @foreach ($locations as $location)
                                                                @if ($accommodation->location_id == $location->id)
                                                                    {{ $location->name }}.
                                                                @endif
                                                            @endforeach
                                                            Nơi ở
                                                            @foreach ($hotels as $hotel)
                                                                @if ($accommodation->hotel_id == $hotel->id)
                                                                    {{ $hotel->description }}
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to
                                            cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
