@extends('frontend.layouts.app')
@section('title')
    <title>Việt Nam Tourist - Giỏ hàng</title>
@endsection

@section('content')
    <div id="wrap-inner">
        <form action="{{ route('add_cart.store') }}" method="POST">
            @csrf
            <div id="list-cart">
                <h3>Giỏ hàng</h3>
                <table class="table table-bordered .table-responsive text-center">
                    <tr class="active">
                        <td width="11.111%">Ảnh mô tả</td>
                        <td width="22.222%">Tên sản phẩm</td>
                        <td width="22.222%">Số lượng</td>
                        <td width="16.6665%">Đơn giá</td>
                        <td width="16.6665%">Thành tiền</td>
                    </tr>
                    <tr>
                        <td><img width="230" height="142"class="img-responsive"
                                src="{{ asset('img/home/' . $tour->image) }}"></td>
                        <td>{{ $tour->name }}</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" type="number" min="0" value="1" name="quantity"
                                    id="quantity">
                                <input name="tour_id" value="{{ $tour->id }}" hidden>
                                <input name="employee_id" value="1" hidden>
                                <input name="status" value="0" hidden>
                                <input type="text" name="order_date" value="{{ $now }}" hidden />
                            </div>
                        </td>
                        <td><span class="price" id="unit-price" data-value="{{ $tour->price }}">{{ number_format($tour->price, 0, '.', ',') }}</span> VND</td>
                        <td><span class="price" id="total-price" data-value="{{ $tour->price }}">{{ number_format($tour->price, 0, '.', ',') }}</span> VND</td>
                    </tr>
                </table>
                <div class="row" id="tax">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        Thuế: <span id="tax-value">{{ $tour->price * 0.05 }}</span> VND
                    </div>
                </div>
                <div class="row" id="total">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        Tổng thanh toán: <span id="total-value">{{ $tour->price }}</span> VND
                    </div>
                </div>
                <div id="xac-nhan">
                    <h3>Xác nhận mua hàng</h3>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input required type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Họ và tên:</label>
                        <input required type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input required type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="add">Địa chỉ:</label>
                        <input required type="text" class="form-control" id="add" name="address">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-info">Thực hiện đơn hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
<script>
$(document).ready(function(){
    function update_quantity(){
        var quantity = $('#quantity').val();
        var unitPrice = $('#unit-price').data('value'); // Get the raw unit price value
        var totalPrice = parseFloat(quantity) * parseFloat(unitPrice);
        $('#total-price').text(number_format(totalPrice)); // Format and display total price

        // Calculate tax
        var taxRate = 0.05;
        var taxAmount = totalPrice * taxRate;
        $('#tax-value').text(number_format(taxAmount)); // Format and display tax amount

        // Calculate total including tax
        var totalIncludingTax = totalPrice + taxAmount;
        $('#total-value').text(number_format(totalIncludingTax)); // Format and display total including tax
    }

    $('#quantity').on('change', function() {
        var id = $(this).data('id');
        update_quantity(id);
    });
});

// Function to format number with comma as thousands separator
function number_format(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


</script>
@endsection

