<?php
namespace App\Views\Client\Pages\Auth;
use App\Views\Client\Components\Category;
use App\Views\BaseView;
class Register extends BaseView
{
    public static function render($data = null)
    {
?>
<!-- Hero Section Begin -->
<section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul>
                        <?php
                                Category::render($data['categories']);

                                ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Tất cả loại sản phẩm
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Bạn cần gì?">
                                <button type="submit" class="site-btn">Tìm Kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/banner/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đăng Ký</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang Chủ</a>
                            <span>Đăng Ký</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
     <!-- Form Đăng Ký -->
 <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Đăng Ký Tài Khoản</h3>
                        </div>
                        <div class="card-body">
                            <form action="/register" method="post">
                                <input type="hidden" name="method" value="POST" id="" >
                                <!-- Tên -->
                                <div class="form-group">
                                    <label for="username">Tên đăng nhập*</label>
                                    <input type="text" class="form-control"
                                        id="username" name="username"  placeholder="Vui lòng nhập tên của bạn" >
                                </div>

                                <div class="form-group">
                                    <label for="name">Họ và tên*</label>
                                    <input type="text" class="form-control"
                                        id="name" name="name"  placeholder="Vui lòng nhập tên của bạn" >
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="text" class="form-control"
                                        id="email" name="email" placeholder="Vui lòng nhập email của bạn" >
                                </div>

                                <!-- số điện thoại -->
                                <div class="form-group">
                                    <label for="phone_number">Số điện thoại</label>
                                    <input type="tel" class="form-control"
                                        id="phone_number" name="phone_number" placeholder="Vui lòng nhập số đi thoại của bạn" >
                                </div>

                                <!-- Mật Khẩu -->
                                <div class="form-group">
                                    <label for="password">Mật khẩu*</label>
                                    <input type="password" class="form-control"
                                        id="password" name="password" placeholder="Vui lòng nhập mật khẩu của bạn"
                                        >
                                </div>

                                <!-- Xác Nhận Mật Khẩu -->
                                <div class="form-group">
                                    <label for="confirm_password">Xác nhận mật khẩu*</label>
                                    <input type="password" class="form-control" placeholder="Vui lòng nhập lại mật khẩu"
                                        id="confirm_password"
                                        name="confirm_password" >
                                </div>

                                <!-- Nút Đăng Ký -->
                                <button type="submit"
                                    class="btn btn-primary btn-block">Đăng Ký</button>
                            </form>
                            
                        </div>
                        <div class="card-footer text-center">
                            <p>Đã có tài khoản? <a href="/login" style="text-decoration: none;" >Đăng nhập
                                    ngay</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}
