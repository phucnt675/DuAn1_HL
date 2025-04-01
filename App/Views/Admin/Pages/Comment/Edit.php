<?php

namespace App\Views\Admin\Pages\Comment;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">CHỈNH SỬA BÌNH LUẬN</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa bình luận</li>
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
                            <form class="form-horizontal" action="/admin/comments/<?= htmlspecialchars($data['id']) ?>" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa bình luận</h4>
                                    
                                    <!-- CSRF Token for security -->
                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

                                    <!-- Method Override -->
                                    <input type="hidden" name="method" value="PUT">

                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?= htmlspecialchars($data['id']) ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Tài khoản</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($data['username']) ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_name">Sản phẩm</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= htmlspecialchars($data['product_name']) ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea class="form-control" id="content" name="content" required><?= htmlspecialchars($data['content']) ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Trạng thái</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                            <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
