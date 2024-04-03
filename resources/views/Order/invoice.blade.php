@extends('layouts.app')
@section('title')
    <title>Dashboard - Thanh toán</title>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Thanh toán</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('income') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Thanh toán</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action" style="display: flex; justify-content: flex-end;">
                <form action="" style="margin-right: 10px;">
                    <input type="text" value="2" hidden>
                    <button type="submit" class="btn btn-white"><i class="fa fa-ban"></i> Hủy bỏ </button>
                </form>
                <a href="{{ route('invoice_print') }}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> In hóa đơn </a>
            </div>
        </div>




    </div>
    <form action="">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Từ:</h5>
                                <address>
                                    <strong>VietNam Tourist</strong><br>
                                    132 3/2, P.Hưng Lợi<br>
                                    Quận Ninh Kiều TP Cần Thơ<br>
                                    <abbr title="Phone">Phone:</abbr> +84 72 099 252
                                </address>
                            </div>

                            <div class="col-sm-6 text-right">
                                <h4>Mã hóa đơn</h4>
                                <h4 class="text-navy">INV-000567F7-00</h4>
                                <span>Đến:</span>
                                <address>
                                    <strong>Dinh Thai Hop</strong><br>
                                    địa chỉddddd ddddddddddđ dddddddddddđ<br>
                                    <abbr title="Phone">Phone:</abbr> +84 72 099 252
                                </address>
                                <p>
                                    <span><strong>Ngày lập:</strong> Marh 18, 2014</span><br />
                                </p>
                            </div>
                        </div>

                        <div class="table-responsive m-t">
                            <table class="table invoice-table">
                                <thead>
                                    <tr>
                                        <th>Danh sách mặt hàng</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Admin Theme with psd project layouts
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        </td>
                                        <td>1</td>
                                        <td>đ2,000,000.00</td>
                                        <td>đ2,000,000.00</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div><!-- /table-responsive -->

                        <table class="table invoice-total">
                            <tbody>
                                <tr>
                                    <td><strong>Tổng tiền :</strong></td>
                                    <td>đ2,000,000.00</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-dollar"></i> Tiến hành thanh
                                toán</button>
                        </div>

                        <div class="well m-t">
                            "Đừng ngồi một chỗ và chờ đợi cơ hội đến. Hãy đứng dậy và tạo ra chúng.”<strong> – Madam C.J.
                                Walker</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
