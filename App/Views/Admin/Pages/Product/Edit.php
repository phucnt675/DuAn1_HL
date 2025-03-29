<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa người dùng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/users/<?= $data['id'] ?>" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa người dùng</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id"  name="id" value="<?= $data['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên sản phâm*</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập tên loại sản phẩm..." name="name" value="<?= $data['name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình ảnh*</label>
                                        <input type="file" class="form-control" id="image" placeholder="chọn hình ảnh sản phẩm..." name="image" value="<?= $data['name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Mô tả*</label>
                                        <textarea class="form-control" id="description" placeholder="Nhập mô tả sản phẩm..." name="description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Giá tiền*</label>
                                        <input type="number" class="form-control" id="price" placeholder="Nhập giá tiền sản phẩm..." name="priceprice" value="<?= $data['name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Số lượng*</label>
                                        <input type="number" class="form-control" id="quantity" placeholder="Nhập số lượng sản phẩm..." name="quantity" value="<?= $data['name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryId">Loại sản phẩm*</label>
                                        <select class="form-control" id="categoryId" name="categoryId" required>
                                            <option value="">Chọn loại sản phẩm...</option>
                                            <option value="dark_chocolate">Sô-cô-la đen</option>
                                            <option value="milk_chocolate">Sô-cô-la sữa</option>
                                            <option value="white_chocolate">Sô-cô-la trắng</option>
                                            <option value="ruby_chocolate">Sô-cô-la ruby</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" value="<?= $data['status'] ?>" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                            <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

    <?php
    }
}
