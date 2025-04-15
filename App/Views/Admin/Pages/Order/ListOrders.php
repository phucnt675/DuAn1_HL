<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class ListOrders  extends BaseView
{
    public static function render($data = null)
    {

        

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Quản lý đơn hàng</h1>

            <!-- Search Form -->
            <form action="#" class="d-none d-sm-inline-block form-inline mr-auto ml-md-4 my-3 my-md-1 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tổng giá tiền đơn hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($data): ?>
                                    <?php foreach ($data as $order): ?>
                                        <tr>
                                            <td><?= $order['order_id'] ?></td>
                                            <td><?= $order['user_name'] ?></td>
                                            <td><?= number_format($order['total_amount'], 0) ?> VND</td>
                                            <td><?= $order['status'] == 1 ? 'Hoàn thành' : 'Chờ xử lý' ?></td>
                                            <td><?= date('Y/m/d', strtotime($order['order_date'])) ?></td>
                                            <td>
                                                <a href="/admin/orders/<?= $order['order_id'] ?>" class="btn btn-primary ">Xem</a>
                                                <form action="/admin/orders/<?= $order['order_id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có thật sự muốn xóa Không?')">
                                                    <input type="hidden" name="method" value="DELETE" id="">
                                                    <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Không có đơn hàng nào</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->



<?php
    }
}
