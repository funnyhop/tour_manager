@extends('frontend.layouts.app')
@section('title')
    <title>Việt Nam Tourist - Home</title>
@endsection
@section('content')
    <div id="wrap-inner">
        <div class="products">
            <h3 class="text-center">sản phẩm nổi bật</h3>
            <div class="product-list row">
                @foreach ($list as $item)
                    @if ($item->outstanding == 'Yes')
                        <div class="product-item col-md-3 col-sm-6 col-xs-12">
                            <a href="#"><img width="430" height="242"
                                    src="{{ asset('img/home/' . $item->image) }}" class="img-thumbnail"></a>
                            <p><a href="#">{{ $item->name }}</a></p>
                            <p class="price">{{ $item->price }}</p>
                            <div class="marsk">
                                <a href="{{ route('detail', ['id' => $item->id]) }}">Xem chi tiết</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="products">
            <h3 class="text-center">sản phẩm</h3>
            <div class="product-list row">
                @foreach ($list as $item)
                    {{-- @if ($item->outstanding == 'No') --}}
                        <div class="product-item col-md-3 col-sm-6 col-xs-12">
                            <a href="#"><img width="430" height="242"
                                    src="{{ asset('img/home/' . $item->image) }}" class="img-thumbnail"></a>
                            <p><a href="#">{{ $item->name }}</a></p>
                            <p class="price">{{ $item->price }}</p>
                            <div class="marsk">
                                <a href="{{ route('detail', ['id' => $item->id]) }}">Xem chi tiết</a>
                            </div>
                        </div>
                    {{-- @endif --}}
                @endforeach
            </div>
        </div>
    </div>
@endsection
