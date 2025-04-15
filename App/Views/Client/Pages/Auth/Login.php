<?php

namespace App\Views\Client\Pages\Auth;
use App\Views\Client\Components\Category;
use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null): void
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
                                    <button type="submit" class="site-btn">Tìm kiếm</button>
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
                            <h2>Đăng Nhập</h2>
                            <div class="breadcrumb__option">
                                <a href="/">Trang Chủ</a>
                                <span>Đăng Nhập</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Form Đăng Nhập -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Đăng Nhập Tài Khoản</h3>
                        </div>
                        <div class="card-body">
                            <form action="/login" method="post">
                                <input type="hidden" name="method" value="POST">

                                <!-- Tên Đăng Nhập -->
                                <div class="form-group">
                                    <label for="username">Tên đăng nhập hoặc email*</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Vui lòng nhập tên đăng nhập hoặc email">
                                </div>

                                <!-- Mật Khẩu -->
                                <div class="form-group">
                                    <label for="password">Mật khẩu*</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Vui lòng nhập mật khẩu">
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Ghi nhớ đăng nhập -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input col-md-1" name="remember" id="" checked>
                                        <label class="form-check-label text-muted">
                                            Ghi nhớ đăng nhập
                                        </label>
                                    </div>

                                    <!-- Quên mật khẩu -->
                                    <a href="/forgot-password" class="text-muted">Quên mật khẩu?</a>
                                </div>

                                <!-- Nút Đăng Nhập -->
                                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                            </form>

                            <!-- Hoặc Đăng Nhập Bằng -->
                            <div class="text-center my-3">
                                <span>Hoặc đăng nhập bằng</span>
                            </div>

                            <!-- Nút Đăng Nhập Bằng Facebook và Google -->
                            <div class="d-flex justify-content-center">
                                <a href="/login/facebook" class="btn btn-primary mx-2" style="background-color: #3b5998; border-color: #3b5998;">
                                    <i class="fa fa-facebook mr-2"></i> Facebook
                                </a>
                                <a href="/login/google" class="btn btn-danger mx-2" style="background-color: #db4437; border-color: #db4437;">
                                    <i class="fa fa-google mr-2"></i> Google
                                </a>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <p>Chưa có tài khoản? <a href="/register" style="text-decoration: none;">Đăng ký ngay</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
?>