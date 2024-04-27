@extends('frontend.layouts.app')
@section('title')
    <title>Việt Nam Tourist - Search</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="css/search.css">
@endsection
@section('content')
    <div id="wrap-inner">
        <div class="products">
            <h3>Tìm kiếm với từ khóa: <span>{{ $key }}</span></h3>
            <div class="product-list row">
                @foreach ($list as $item)
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="#"><img width="430" height="242" src="{{ asset('img/home/' . $item->image) }}"
                                class="img-thumbnail"></a>
                        <p><a href="#">{{ $item->name }}</a></p>
                        <p class="price">{{ $item->price }}</p>
                        <div class="marsk">
                            <a href="{{ route('detail', ['id' => $item->id]) }}">Xem chi tiết</a>
                        </div>
                    </div>
                @endforeach
                <div class="product-item col-md-3 col-sm-6 col-xs-12">
                    <a href="#"><img width="430" height="242" src="img/home/product-2.png"
                            class="img-thumbnail"></a>
                    <p><a href="#">Du lịch Sapa: Bản Cát Cát - Moana - Fansipan 3N2Đ</a></p>
                    <p class="price">10.000.000</p>
                    <div class="marsk">
                        <a href="#">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div id="pagination">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item disabled"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div> --}}
    </div>
@endsection
