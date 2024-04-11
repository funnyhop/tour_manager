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
                                <div class="m-t-md">
                                    <h3 class="product-main-price">Giá: {{ number_format($tour->price, 0, '.', ',') }}<small class="text-muted">vnđ</small>
                                    </h3>
                                </div>
                                <hr>

                                <h4>Giới thiệu</h4>

                                <div class="small text-muted">
                                    {{  $tour->description }}
                                </div>
                                <dl class="small m-t-md">
                                    <dt>Ngày bắt đầu</dt>
                                    <dd>{{ $tour->start_date }}</dd>
                                    <dt>Thời gian khởi hành</dt>
                                    <dd>{{ $tour->start_time }}</dd>
                                    <dt>Ngày kết thúc</dt>
                                    <dd>{{ $tour->end_date }}</dd>
                                    <dt>Thời gian kết thúc</dt>
                                    <dd>{{ $tour->end_time }}</dd>
                                </dl>
                                <hr>

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
