<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
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
                            <form class="form-horizontal" action="/admin/users" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm người dùng</h4>
                                    <input type="hidden" name="method" id="" value="POST">
                                    <div class="form-group">
                                        <label for="username">Tên đăng nhập *</label>
                                        <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập..." name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        <input type="text" class="form-control" id="email" placeholder="Nhập email..." name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Họ và tên*</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên..." name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu*</label>
                                        <input type="password" class="form-control" id="password" placeholder="Nhập tên mật khẩu..." name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Nhập lại mật khẩu*</label>
                                        <input type="password" class="form-control" id="confirm_password" placeholder="Nhập lại mật khẩu..." name="confirm_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại*</label>
                                        <input type="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại..." name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Địa chỉ</label>
                                        <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ..." name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Hình đại diện</label>
                                        <input type="file" class="form-control" id="avatar" placeholder="Chọn ảnh đại diện..." name="avatar">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Quyền*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="role" name="role">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="0">Quản trị viên</option>
                                            <option value="1">Khách hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Thêm</button>
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
