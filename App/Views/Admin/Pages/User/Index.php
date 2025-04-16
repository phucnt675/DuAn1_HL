<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Danh sách người dùng</h1>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <form action="/admin/user/search/"
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-4 my-3 my-md-1 mw-100 navbar-search"
                    method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                            aria-label="Search" aria-describedby="basic-addon2" value="<?= $_GET['search'] ?? ''; ?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        if (count($data)):
                        ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Số điện thoại</th>
                                        <th>Quyền</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($data as $item) :
                                    ?>
                                        <tr>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['email'] ?></td>
                                            <td>
                                                <img src="<?= !empty($item['avatar']) ? APP_URL . '/public/uploads/avatars/' . $item['avatar'] : APP_URL . '/public/assets/client/img/user.png' ?>"
                                                    alt="" width="100px">
                                            </td>
                                            <td><?= !empty($item['phone_number']) ? $item['phone_number'] : 'Không sử dụng số điện thoại' ?></td>
                                            <td><?= ($item['role'] == 1) ? 'Quản trị viên' : 'Khách hàng' ?></td>
                                            <td><?= ($item['status'] == 0) ? 'Hoạt động' : 'Khóa' ?></td>
                                            <td>
                                                <a href="/admin/users/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>

                                                <form action="/admin/users/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có thật sự muốn xóa Không?')">
                                                    <input type="hidden" name="method" value="DELETE" id="">
                                                    <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        else:
                        ?>
                            <h4 class="text-center text-danger">Không có dữ liệu</h4>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

<?php
    }
}
