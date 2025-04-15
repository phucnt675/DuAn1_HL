<?php

namespace App\Views\Admin\Pages\TrashBin;

use App\Views\BaseView;

class index extends BaseView
{
    public static function render($data = null)
    {
?>
        
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
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thùng rác</h5>
                                
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tài khoản</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Nội dung bình luận</th>
                                                    <th>Thời gian bình luận</th>
                                                    <th>Xếp hạng</th>
                                                    <th>Trạng thái</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    
                                                    foreach ($data as $item):

                                                ?>
                                                
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td><?= $item['username'] ?></td>
                                                        <td><?= $item['product_name'] ?></td>
                                                        <td><?= $item['content'] ?></td>
                                                        <td><?= $item['date'] ?></td>
                                                        <td><?= $item['rating'] ?></td>
                                                        <td><?= ($item['status'] == 1) ? 'Hiển thị ' : 'Ẩn' ?></td>
                                                        <td></td>
                                                        <td>
                                                            <a href="/admin/comments/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                            <form action="/admin/comments/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có thật sự muốn xóa?')">
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
                                    </div>
                               
                            </div>
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
