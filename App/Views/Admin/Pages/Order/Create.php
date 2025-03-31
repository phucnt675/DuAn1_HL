<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ ĐƠN HÀNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm đơn hàng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/orders" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm đơn hàng</h4>
                                    <input type="hidden" name="method" value="POST">
                                    <div class="form-group">
                                        <label for="customer_name">Tên khách hàng*</label>
                                        <input type="text" class="form-control" id="customer_name" placeholder="Nhập tên khách hàng..." name="customer_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại*</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại..." name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Địa chỉ giao hàng*</label>
                                        <textarea class="form-control" id="address" placeholder="Nhập địa chỉ giao hàng..." name="address" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="product">Sản phẩm*</label>
                                        <input type="text" class="form-control" id="product" placeholder="Nhập tên sản phẩm..." name="product" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Số lượng*</label>
                                        <input type="number" class="form-control" id="quantity" placeholder="Nhập số lượng..." name="quantity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="total_price">Tổng tiền*</label>
                                        <input type="number" class="form-control" id="total_price" placeholder="Nhập tổng tiền..." name="total_price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái đơn hàng*</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="">Chọn trạng thái...</option>
                                            <option value="pending">Chờ xử lý</option>
                                            <option value="processing">Đang xử lý</option>
                                            <option value="shipped">Đã giao hàng</option>
                                            <option value="cancelled">Đã hủy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                        <button type="submit" class="btn btn-primary">Thêm đơn hàng</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<?php
    }
}
