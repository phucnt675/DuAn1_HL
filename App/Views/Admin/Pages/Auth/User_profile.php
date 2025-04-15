<?php

namespace App\Views\Admin\Pages\Auth;

use App\Views\BaseView;

class User_profile extends BaseView
{
    public static function render($data = null)
    {
?>


        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Thông Tin Cá nhân</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <?php if ($data && $data['avatar']) : ?>
                                <img src="<?= APP_URL ?>/public/assets/admin/img/users/<?= $data['avatar'] ?>" alt="User Avatar" class="img-fluid shadow-lg border rounded-3" style="width: 200px; height: 200px; object-fit: cover;">
                            <?php else : ?>
                                <img src="/public/assets/client/img/user.png" class="img-thumbnail rounded-circle">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <!-- <h4 class="mb-3">Thông Tin Cá Nhân</h4> -->
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Tên đăng nhập:</strong> <?= $data['name'] ?></li>
                                <li class="list-group-item"><strong>Họ và Tên:</strong> <?= $data['username'] ?></li>
                                <li class="list-group-item"><strong>Địa chỉ:</strong> <?= $data['address'] ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?= $data['email'] ?></li>
                                <li class="list-group-item"><strong>Số điện thoại:</strong> <?= $data['phone_number'] ?></li>
                                <li class="list-group-item"><strong>Trạng thái:</strong> <?= ($data['status']== 1) ? 'Hoạt động' : 'Khóa' ?></li>
                                <li class="list-group-item"><strong>Quyền:</strong> <?= ($data['role']== 1) ? 'Quản trị viên' : 'Khách hàng'  ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="/admin/users/<?= $data['id'] ?>" class="btn btn-primary">Chỉnh Sửa Thông Tin</a>
                    <a href="/admin" class="btn btn-secondary">Quay Lại</a>
                </div>
            </div>
        </div>


<?php

    }
}
