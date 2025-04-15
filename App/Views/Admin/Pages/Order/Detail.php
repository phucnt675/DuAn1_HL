<?php

namespace App\Views\Admin\Pages\Order;

use App\Models\BaseModel;

class Detail extends BaseModel
{
    public static function render($data)
    {
        // Lấy thông tin đơn hàng và sản phẩm từ mảng $data
        $order = $data[0]; // Thông tin đơn hàng
        $products = []; // Mảng lưu thông tin sản phẩm

        // Lấy các sản phẩm từ dữ liệu đơn hàng
        foreach ($data as $item) {
            $products[] = [
                'product_name' => $item['product_name'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ];
        }

        // Render thông tin đơn hàng và sản phẩm
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Chi tiết đơn hàng</h1>

            <!-- Order Details -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin đơn hàng</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6><strong>ID đơn hàng:</strong> <?= htmlspecialchars($order['order_id']) ?></h6>
                            <h6><strong>Tên khách hàng:</strong> <?= htmlspecialchars($order['user_name']) ?></h6>
                            <h6><strong>Email:</strong> <?= htmlspecialchars($order['user_email']) ?></h6>
                            <h6><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['phone_number']) ?></h6>
                        </div>
                        <div class="col-md-6">
                            <h6><strong>Ngày tạo:</strong> <?= date('d/m/Y', strtotime($order['order_date'])) ?></h6>
                            <h6><strong>Trạng thái:</strong> <?= $order['status'] == 1 ? 'Hoàn thành' : 'Chưa hoàn thành' ?></h6>
                            <h6><strong>Phương thức thanh toán:</strong> <?= htmlspecialchars($order['payment_method']) ?></h6>
                        </div>
                    </div>

                    <!-- Product List -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalPrice = 0;
                                foreach ($products as $index => $product) {
                                    $totalItemPrice = $product['price'] * $product['quantity'];
                                    $totalPrice += $totalItemPrice;
                                ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= htmlspecialchars($product['product_name']) ?></td>
                                        <td><?= $product['quantity'] ?></td>
                                        <td><?= number_format($product['price'], 0, ',', '.') ?> VND</td>
                                        <td><?= number_format($totalItemPrice, 0, ',', '.') ?> VND</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Total Price -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <h5><strong>Tổng giá trị:</strong> <?= number_format($totalPrice, 0, ',', '.') ?> VND</h5>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            <a href="/admin/orders" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php
    }
}
