<?php


namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;
use App\Helpers\AuthHelper;
use App\Models\User;

class Create extends BaseView
{

    public static function render($data = null)
    {

        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        $is_login = AuthHelper::checkLogin();
        $user = null;

        // Nếu người dùng đã đăng nhập, lấy thông tin từ cơ sở dữ liệu
        if ($is_login) {
            $usersModel = new User();
            $user = $usersModel->getOneUser($is_login); // Lấy thông tin người dùng từ cơ sở dữ liệu
        } else {
            // Nếu không có người dùng đăng nhập, kiểm tra session hoặc cookie
            $user = $_SESSION['users'] ?? null;
            if (!$user && isset($_COOKIE['users'])) {
                $user = json_decode($_COOKIE['users'], true);
                $_SESSION['users'] = $user;
            }
        }

        // Lấy danh sách sản phẩm
        $productData = $data['products'];
        // Lấy danh sách phương thức thanh toán
        $payments = $data['payments'];
?>

        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form class="form-horizontal" action="/admin/orders" method="POST">
                            <div class="card-body">
                                <h4 class="card-title">Thêm đơn hàng</h4>
                                <input type="hidden" name="method" id="" value="POST">

                                <!-- Tên khách hàng -->
                                <div class="form-group row">
                                    <label for="user_name" class="col-sm-2 col-form-label">Tên khách hàng*</label>
                                    <div class="col-sm-10">
                                        <!-- Nếu có thông tin người dùng đang đăng nhập, điền vào trường -->
                                        <input type="text" class="form-control" id="user_name" placeholder="Nhập tên khách hàng..." name="user_name" value="<?= $user['name'] ?? '' ?>" required>
                                    </div>
                                </div>

                                <!-- Email khách hàng -->
                                <div class="form-group row">
                                    <label for="user_email" class="col-sm-2 col-form-label">Email khách hàng*</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="user_email" placeholder="Nhập email..." name="user_email" value="<?= $user['email'] ?? '' ?>" required>
                                    </div>
                                </div>

                                <!-- Số điện thoại khách hàng -->
                                <div class="form-group row">
                                    <label for="phone_number" class="col-sm-2 col-form-label">Số điện thoại*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone_number" placeholder="Nhập số điện thoại..." name="phone_number" value="<?= $user['phone_number'] ?? '' ?>" required>
                                    </div>
                                </div>

                                <!-- Trạng thái đơn hàng -->
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Trạng thái*</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="1">Hoàn thành</option>
                                            <option value="0">Chưa hoàn thành</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Phương thức thanh toán -->
                                <div class="form-group row">
                                    <label for="payment_id" class="col-sm-2 col-form-label">Phương thức thanh toán*</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="payment_id" name="payment_id" required>
                                            <?php
                                            foreach ($payments as $payment) :
                                            ?>
                                                <option value="<?= $payment['id'] ?>"><?= $payment['payment_method'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Thêm sản phẩm và nhập số lượng -->
                                <div class="form-group row">
                                    <label for="products" class="col-sm-2 col-form-label">Sản phẩm và Số lượng*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Chọn</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Giá</th>
                                                    <th>Số lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($productData as $product): ?>
                                                    <tr>
                                                        <td>
                                                            <!-- Checkbox chọn sản phẩm -->
                                                            <input type="checkbox" name="products[<?= $product['id'] ?>][selected]" value="1">
                                                        </td>
                                                        <td>
                                                            <?= $product['name'] ?>
                                                            <input type="hidden" name="products[<?= $product['id'] ?>][id]" value="<?= $product['id'] ?>">
                                                        </td>
                                                        <td><?= number_format($product['price'], 0, ',', '.') ?> VND</td>
                                                        <td>
                                                            <!-- Trường nhập số lượng -->
                                                            <input type="number" class="form-control" name="products[<?= $product['id'] ?>][quantity]" placeholder="Nhập số lượng" min="1">
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
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
