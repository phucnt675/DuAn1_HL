<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Edit extends BaseView
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
                                    <li class="breadcrumb-item active" aria-current="page">Sửa đơn hàng</li>
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
                            <form class="form-horizontal" action="/admin/orders/<?= $data['id'] ?>" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa đơn hàng</h4>
                                    <input type="hidden" name="method" value="PUT">
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?= $data['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_name">Tên khách hàng*</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= $data['customer_name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại*</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= $data['phone'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Địa chỉ giao hàng*</label>
                                        <textarea class="form-control" id="address" name="address" required><?= $data['address'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="product">Sản phẩm*</label>
                                        <input type="text" class="form-control" id="product" name="product" value="<?= $data['product'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Số lượng*</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $data['quantity'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="total_price">Tổng tiền*</label>
                                        <input type="number" class="form-control" id="total_price" name="total_price" value="<?= $data['total_price'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái đơn hàng*</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="pending" <?= ($data['status'] == 'pending' ? 'selected' : '') ?>>Chờ xử lý</option>
                                            <option value="processing" <?= ($data['status'] == 'processing' ? 'selected' : '') ?>>Đang xử lý</option>
                                            <option value="shipped" <?= ($data['status'] == 'shipped' ? 'selected' : '') ?>>Đã giao hàng</option>
                                            <option value="cancelled" <?= ($data['status'] == 'cancelled' ? 'selected' : '') ?>>Đã hủy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                        <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
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
