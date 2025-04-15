<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Search extends BaseView
{
    public static function render($data = null): void
    {
?>

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <form action="/admin/products/search"
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-4 my-3 my-md-1 mw-100 navbar-search"
                    method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                            aria-label="Search" aria-describedby="basic-addon2" value="<?= htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (!empty($data) && is_array($data)): ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Giá giảm</th>
                                        <th>Trạng thái</th>
                                        <th>Loại</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($data as $product): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td>
                                                <img src="<?= APP_URL ?>/public/assets/client/img/product/<?= htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8') ?>"
                                                    alt="Hình ảnh sản phẩm" width="100px">
                                            </td>
                                            <td><?= number_format($product['price'] ?? 0) ?> VND</td>
                                            <td><?= number_format($product['discount_price'] ?? 0) ?> VND</td>
                                            <td><?= ($product['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                            <td><?= htmlspecialchars($product['category_id'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td>
                                                <a href="/admin/products/<?= $product['id'] ?>" class="btn btn-primary">Sửa</a>

                                                <form action="/admin/products/<?= $product['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có thật sự muốn xóa không?')">
                                                    <input type="hidden" name="method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger text-white">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h4 class="text-center text-danger">Không có dữ liệu</h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

<?php
    }
}
