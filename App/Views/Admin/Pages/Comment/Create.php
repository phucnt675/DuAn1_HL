<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/products" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm sản phẩm</h4>
                                    
                                    <!-- CSRF Token for security -->
                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

                                    <div class="form-group">
                                        <label for="name">Tên sản phẩm*</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm..." name="name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="image">Hình ảnh*</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="description">Mô tả*</label>
                                        <textarea class="form-control" id="description" placeholder="Nhập mô tả sản phẩm..." name="description" required></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="price">Giá tiền*</label>
                                        <input type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm..." name="price" required min="0">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="quantity">Số lượng*</label>
                                        <input type="number" class="form-control" id="quantity" placeholder="Nhập số lượng sản phẩm..." name="quantity" required min="1">
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
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
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
