<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null): void
    {
        //var_dump($data)

        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (count($data)): ?>
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
                                        <th>Biến thể</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $product): ?>
                                        <tr>
                                            <td><?= $product['id'] ?></td>
                                            <td><?= $product['name'] ?></td>
                                            <td><img src="<?= APP_URL ?>/public/uploads/products/<?= $product['image'] ?>" alt=""
                                                    width="100px"></td>
                                            <td><?= number_format($product['price']) ?></td>
                                            <td><?= number_format($product['discount_price'] ?? 0) ?></td>
                                            <td><?= ($product['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                            <td><?= $product['category_name'] ?></td>

                                            <!-- Hiển thị biến thể của sản phẩm -->
                                            <td>
                                                <?php if (isset($product['variants']) && is_array($product['variants']) && !empty($product['variants'])): ?>
                                                    <ul>
                                                        <?php foreach ($product['variants'] as $variant): ?>
                                                            <li>
                                                                SKU: <?= htmlspecialchars($variant['sku']) ?> -
                                                                <?= htmlspecialchars($variant['variant_values']) ?> -
                                                                Giá: <?= number_format($variant['price']) ?> -
                                                                Số lượng: <?= htmlspecialchars($variant['quantity']) ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <span>Không có biến thể</span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <a href="/admin/products/<?= $product['id'] ?>" class="btn btn-primary">Sửa</a>
                                                <form action="/admin/products/<?= $product['id'] ?>" method="post"
                                                    style="display: inline-block;"
                                                    onsubmit="return confirm('Bạn có thật sự muốn xóa Không?')">
                                                    <input type="hidden" name="method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger text-white">Xoá</button>
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
        <!-- /.container-fluid -->
        <?php
    }
}
