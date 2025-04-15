<?php
namespace App\Views\Client\Pages\Auth;
use App\Views\Client\Components\Category;

use App\Views\BaseView;


class ChangePassword extends BaseView
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


        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h4 class="text-center text-danger">Đặt lại mật khẩu</h4>
                        <form action="/change-password" method="post">
                            <input type="hidden" name="method" id="" value="PUT">
                           
                            <div class="form-group">
                                <label for="password">Mật khẩu*</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập Mật khẩu" value="">
                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu*</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu" value="">
                            </div>
                            
                            <!-- <button type="reset" class="btn btn-outline-danger">Nhập lại</button> -->
                            <button type="submit" class="btn btn-outline-info">Đặt lại mật khẩu</button>

                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

       
<?php
    }
}
