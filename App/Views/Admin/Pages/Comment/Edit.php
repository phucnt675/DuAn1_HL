<?php

namespace App\Views\Admin\Pages\Comment;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null): void
    {

?>

<!-- Page wrapper  -->
        <!-- ============================================================== -->
      
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
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
                            <form class="form-horizontal" action="/admin/comments/<?= $data['id'] ?>" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa bình luận </h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <input type="text" class="form-control" id="id"  name="id" value="<?= $data['id'] ?>" disabled>
                                    <div class="form-group">
                                        <label for="username">Tài khoản*</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" disabled> 
                                    </div>

                                    <div class="form-group">
                                        <label for="product_name">Tên sản phẩm*</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $data['product_name'] ?>" disabled> 
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Nội dung bình luận*</label>
                                        <textarea class="form-control" id="content" name="content" rows="3" disabled><?= $data['content'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="date">Thời gian*</label>
                                        <input type="text" class="form-control" id="date" name="date" value="<?= $data['date'] ?>" disabled> 
                                    </div>

                                    <div class="form-group">
                                        <label for="rating">Xếp hạng*</label>
                                        <input type="text" class="form-control" id="rating" name="rating" value="<?= $data['rating'] ?>" disabled> 
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
                                        <button type="submit" class="btn btn-primary" name="">Xác nhận sửa</button>
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
