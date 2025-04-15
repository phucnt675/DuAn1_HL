<?php

namespace App\Views\Client\Pages\Auth;
use App\Views\Client\Components\Category;
use App\Views\BaseView;


class ForgotPassword extends BaseView
{
    public static function render($data = null)
    {
?>
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
                        <h2>Lấy Mật Khẩu</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang Chủ</a>
                            <span>Lấy Mật Khẩu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h4 class="text-center text-danger">Lấy lại mật khẩu</h4>
                        <form action="/forgot-password" method="post">
                            <input type="hidden" name="method" value="POST" id="">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" >
                            </div>

                            <!-- <button type="reset" class="btn btn-outline-danger">Nhập lại</button> -->
                            <button type="submit" class="btn btn-outline-info">Lấy lại mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}
