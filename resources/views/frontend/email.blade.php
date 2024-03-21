@extends('frontend.layouts.app')
@section('title')
    <title>Việt Nam Tourist - Email</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="css/email.css">
@endsection
@section('content')
<div id="wrap-inner">
    <div id="khach-hang">
        <h3>Thông tin khách hàng</h3>
        <p>
            <span class="info">Khách hàng: </span>
            Vietpro
        </p>
        <p>
            <span class="info">Email: </span>
            vietpro@gmail.com
        </p>
        <p>
            <span class="info">Điện thoại: </span>
            01234567988
        </p>
        <p>
            <span class="info">Địa chỉ: </span>
            Hà Nội
        </p>
    </div>
    <div id="hoa-don">
        <h3>Hóa đơn mua hàng</h3>
        <table class="table table-hover">
            <tr class="bold">
                <td width="30%">Tên sản phẩm</td>
                <td width="25%">Giá</td>
                <td width="20%">Số lượng</td>
                <td width="15%">Thành tiền</td>
            </tr>
            <tr>
                <td>Du lịch Phú Quốc 2024: Hành Trình Kỳ Diệu Bãi Sao + Cầu Hôn + VinWonders 4N3Đ</td>
                <td class="price">4.000.000 VNĐ</td>
                <td>1</td>
                <td class="price">4.000.000 VNĐ</td>
            </tr>
            <tr>
                <td>Du lịch Sapa: Bản Cát Cát - Moana - Fansipan 3N2Đ</td>
                <td class="price">8.500.000 VNĐ</td>
                <td>2</td>
                <td class="price">17.000.000VNĐ</td>
            </tr>
            <tr>
                <td colspan="3">Tổng tiền:</td>
                <td class="total-price">21.000.000VNĐ</td>
            </tr>
        </table>
    </div>
    <div id="xac-nhan">
        <br>
        <p align="justify">
            <b>Quý khách đã đặt hàng thành công!</b><br />
            • Quý khách lưu ý chụp hóa đơn này để tránh tình trạng nhầm lẫn khi tham gia tour (thay cho vé tour).<br />
            • Nhân viên sẽ liên hệ với quý khách qua số điện thoại trước khi bắt đầu tour khoảng 2-3 ngày.<br />
            <b><br />Cảm ơn quý khách đã sử dụng dịch vụ của Công ty chúng tôi!</b>
        </p>
    </div>
</div>
@endsection
