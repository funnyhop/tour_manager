@extends('frontend.layouts.app')
@section('title')
    <title>Việt Nam Tourist - Chi tiết</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="css/details.css">
@endsection
@section('content')
<div id="wrap-inner">
    <div id="product-info">
        <div class="clearfix p-1"></div>
        <h3>Điện thoại Apple iPhone 7 Plus - 32GB</h3>
        <div class="row">
            <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                <img width="270" height="142" src="img/home/product-1.png">
            </div>
            <div id="product-details" class="col-xs-12 col-sm-12 col-md-9 pt-1">
                <p>Giá: <span class="price">10.000.000</span></p>
                <p>Bảo hành: 1 đổi 1 trong 12 tháng</p>
                <p>Phụ kiện: Dây cáp sạc, tai nghe</p>
                <p>Tình trạng: Máy mới 100%</p>
                <p>Khuyến mại: Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank</p>
                <p>Còn hàng: Còn hàng</p>
                <p class="add-cart text-center"><a href="#">Đặt hàng online</a></p>
            </div>
        </div>
    </div>
    <div id="product-detail">
        <h3>Chi tiết sản phẩm</h3>
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div id="comment">
        <h3>Bình luận</h3>
        <div class="col-md-12 comment">
            <form>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input required type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="cm">Bình luận:</label>
                    <textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-default">Gửi</button>
                </div>
            </form>
        </div>
    </div>
    <div id="comment-list">
        <ul>
            <li class="com-title">
                Vietpro Education
                <br>
                <span>2017-19-01 10:00:00</span>
            </li>
            <li class="com-details">
                HTC One X 32GB là sản phẩm đáng chờ đợi nhất trong năm nay, với cấu hình mạnh và giá thành tương đối mềm so với các dòng Smart Phone của các hãng khác
            </li>
        </ul>
        <ul>
            <li class="com-title">
                Vietpro Education
                <br>
                <span>2017-19-01 10:00:00</span>
            </li>
            <li class="com-details">
                HTC One X 32GB là sản phẩm đáng chờ đợi nhất trong năm nay, với cấu hình mạnh và giá thành tương đối mềm so với các dòng Smart Phone của các hãng khác
            </li>
        </ul>
        <ul>
            <li class="com-title">
                Vietpro Education
                <br>
                <span>2017-19-01 10:00:00</span>
            </li>
            <li class="com-details">
                HTC One X 32GB là sản phẩm đáng chờ đợi nhất trong năm nay, với cấu hình mạnh và giá thành tương đối mềm so với các dòng Smart Phone của các hãng khác
            </li>
        </ul>
    </div>
</div>
@endsection
