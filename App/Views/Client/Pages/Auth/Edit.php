<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null): void
    {
?>

<section class="hero hero-normal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>All departments</span>
                            </div>
                            <ul>
                                <li><a href="#">Fresh Meat</a></li>
                                <li><a href="#">Vegetables</a></li>
                                <li><a href="#">Fruit & Nut Gifts</a></li>
                                <li><a href="#">Fresh Berries</a></li>
                                <li><a href="#">Ocean Foods</a></li>
                                <li><a href="#">Butter & Eggs</a></li>
                                <li><a href="#">Fastfood</a></li>
                                <li><a href="#">Fresh Onion</a></li>
                                <li><a href="#">Papayaya & Crisps</a></li>
                                <li><a href="#">Oatmeal</a></li>
                                <li><a href="#">Fresh Bananas</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <div class="hero__search__categories">
                                        All Categories
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="What do you need?">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+65 11.188.888</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/breadcrumb.jpg">
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

       
        <div class="container mt-5">
            <div class="row">
                <div class="offset-mb-1 col-md-3">
                    <?php
                    if ($data && $data['avatar']) :
                    ?>
                        <img src="<?= APP_URL ?>/public/uploads/avatars/<?= $data['avatar'] ?>" alt="" width="100%" style=" border-radius: 5px; " >
                    <?php
                    else :
                    ?>
                        <img src="/public/assets/client/img/user.png" alt="" width="100%">

                    <?php
                    endif;
                    ?>
                </div>
                <div class="col-md-7">
                    <div class="card card-body">
                        <h4 class="text-center text-danger">Thay đổi thông tin</h4>
                        <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="method" value="PUT">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" value="<?= $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập Email" value="<?= $data['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Họ và tên*</label>
                                <input type="name" name="name" id="name" class="form-control" placeholder="Nhập Họ và tên" value="<?= $data['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Ảnh đại diện*</label>
                                <input type="file" name="avatar" id="avatar"  placeholder="Chọn ảnh đại diện" value="<?= $data['avatar'] ?>">
                            </div>

                            <button type="submit" >Cập nhật</button>
                            <!-- <button type="reset" >Nhập lại</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>







<?php
    }
}
?>