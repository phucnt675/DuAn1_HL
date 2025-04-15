<?php

namespace App\Views\Admin\Pages\Category;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null): void
    {
       
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Loại sản phẩm</h1>
            <!-- <p class="mb-4">
                This table lists all product categories. For more information about DataTables, please visit the
                <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
            </p> -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách loại sản phẩm</h6>
                </div>
                <div class="card-body">
                <?php
                                if (count($data)) :
                                ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr> 
                                        <th>ID</th>
                                        <th>Tên loại sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $item) : ?>
                                        <tr>
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td><img src="<?= APP_URL ?>/public/uploads/categories/<?= $item['image'] ?>" alt=""
                                            width="100px"></td>
                                            <td><?= ($item['status'] == 1) ? 'Hiển thị ' : 'Ẩn' ?></td>
                                            <td>
                                                            <a href="/admin/categories/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                            <form action="/admin/categories/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
                                                                <input type="hidden" name="method" value="DELETE" id="">
                                                                <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                            </form>
                                                        </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <h4 class="text-center text-danger">No data available</h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php
    }
}
