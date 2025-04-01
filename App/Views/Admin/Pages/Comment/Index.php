<?php

namespace App\Views\Admin\Pages\Comment;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null, $pagination = null)
    {
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ BÌNH LUẬN</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách bình luận</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách bình luận</h5>

                                <!-- Search and Filters (Optional) -->
                                <form class="mb-4" action="/admin/comments" method="get">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm bình luận..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                                        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                                    </div>
                                </form>

                                <?php if (count($data)) : ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tài khoản</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Nội dung</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $item) : ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($item['id']) ?></td>
                                                        <td><?= htmlspecialchars($item['username']) ?></td>
                                                        <td><?= htmlspecialchars($item['product_name']) ?></td>
                                                        <td><?= nl2br(htmlspecialchars($item['content'])) ?></td>
                                                        <td><?= ($item['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                                        <td>
                                                            <a href="/admin/comments/<?= htmlspecialchars($item['id']) ?>" class="btn btn-primary">Sửa</a>
                                                            <form action="/admin/comments/<?= htmlspecialchars($item['id']) ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xoá?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Pagination -->
                                    <?php if ($pagination) : ?>
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item <?= $pagination['currentPage'] == 1 ? 'disabled' : '' ?>">
                                                    <a class="page-link" href="?page=<?= $pagination['currentPage'] - 1 ?>">Trước</a>
                                                </li>
                                                <?php for ($i = 1; $i <= $pagination['totalPages']; $i++) : ?>
                                                    <li class="page-item <?= $pagination['currentPage'] == $i ? 'active' : '' ?>">
                                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                                    </li>
                                                <?php endfor; ?>
                                                <li class="page-item <?= $pagination['currentPage'] == $pagination['totalPages'] ? 'disabled' : '' ?>">
                                                    <a class="page-link" href="?page=<?= $pagination['currentPage'] + 1 ?>">Sau</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    <?php endif; ?>

                                <?php else : ?>
                                    <h4 class="text-center text-danger">Không có dữ liệu</h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
