<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;
use App\Models\User;

class Header extends BaseView
{
    public static function render($data = null): void
    {

        $is_login = AuthHelper::checkLogin();
        $usersModel = new User();
        $user = $usersModel->getOneUser($is_login);


?>
        <!DOCTYPE html>
        <html lang="zxx">

        <head>
            <meta charset="UTF-8">
            <meta name="description" content="">
            <meta name="keywords" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Dự Án 1</title>

            <!-- Google Font -->
            <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

            <!-- Css Styles -->
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/font-awesome.min.css" type="text/css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/elegant-icons.css" type="text/css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/nice-select.css" type="text/css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/jquery-ui.min.css" type="text/css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/owl.carousel.min.css" type="text/css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/slicknav.min.css" type="text/css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css" type="text/css">

            
        </head>
        <style>
            .comment-avatar {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                object-fit: cover;
            }
        </style>

        <body>
            <!-- Page Preloder -->
            <div id="preloder">
                <div class="loader"></div>
            </div>

            <!-- Humberger Begin -->
            <div class="humberger__menu__overlay"></div>
            <div class="humberger__menu__wrapper">
                <div class="humberger__menu__logo">
                    <a href="#"><img src="img/logo.png" alt=""></a>
                </div>
                <div class="humberger__menu__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                    </ul>
                    <div class="header__cart__price">Vật Phẩm: <span>150.00 Vnd</span></div>
                </div>
                <div class="humberger__menu__widget">
                    <div class="header__top__right__language">
                        <img src="/public/assets/client/img/language.png" alt="">
                        <div>Tiếng Việt</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="#">Tiếng Việt</a></li>
                            <li><a href="#">Tiếng Anh</a></li>
                        </ul>
                    </div>
                    <div class="header__top__right__auth">
                        <a href="/login"><i class="fa fa-user"></i> Đăng Nhập</a>
                        <a href="/register"><i class="fa fa-user"></i> Đăng Ký</a>
                    </div>
                </div>
                <nav class="humberger__menu__nav mobile-menu">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/products">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="/products_detail">Shop Details</a></li>
                                <li><a href="/cart">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
                <div class="header__top__right__social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                </div>
                <div class="humberger__menu__contact">
                    <ul>
                        <li><i class="fa fa-envelope"></i> xalanh@fashion.com</li>
                        <li>Miễn phí vận chuyển cho tất cả đơn hàng từ 99K</li>
                    </ul>
                </div>
            </div>
            <!-- Humberger End -->

            <!-- Header Section Begin -->
            <header class="header">
                <div class="header__top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="header__top__left">
                                    <ul>
                                        <li><i class="fa fa-envelope"></i> xalanh@fashion.com</li>
                                        <li>Miễn phí vận chuyển cho tất cả đơn hàng từ 99K</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="header__top__right">
                                    <div class="header__top__right__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                    <div class="header__top__right__language">
                                        <img src="/public/assets/client/img/language.png" alt="" width="27px">
                                        <div>Tiếng Việt</div>
                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li><a href="#">Tiếng Việt</a></li>
                                            <li><a href="#">Tiếng Anh</a></li>
                                        </ul>
                                    </div>
                                    <div class="header__top__right__language">
                                        <?php if ($is_login): ?>
                                            <!-- Lấy ảnh từ biến $user -->
                                            <img src="<?= APP_URL ?>/public/assets/admin/img/users/<?= $user['avatar'] ?>" alt="" width="27px">
                                        <?php else: ?>
                                            <img src="/public/assets/client/img/user1.png" alt="" width="20px">
                                        <?php endif; ?>

                                        <?php
                                        $user = $_SESSION['users'] ?? null;

                                        if (isset($_COOKIE['users']) && !$user) {
                                            $user = json_decode($_COOKIE['users'], true);
                                            $_SESSION['users'] = $user;
                                        }
                                        ?>
                                        <div>
                                            <?php if (!empty($user)): ?>
                                                Xin chào <?= htmlspecialchars($user['username']) ?>
                                            <?php else: ?>
                                                Khách
                                            <?php endif; ?>
                                        </div>


                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <?php if ($is_login): ?>
                                                <li><a href="/users_profile/<?= $_SESSION['users']['id'] ?>">Tài khoản</a></li>
                                                <li><a href="/logout">Đăng xuất</a></li>
                                            <?php else: ?>
                                                <li><a href="/login">Đăng Nhập</a></li>
                                                <li><a href="/register">Đăng Ký</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="header__logo">
                                <a href="/"><img src="/public/assets/client/img/Logo/logo/1.png" alt="" width="400px" height = "200px"></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <nav class="header__menu">
                                <ul>
                                    <li class="active"><a href="/">Trang chủ</a></li>
                                    <li><a href="/products">Cửa hàng</a></li>
                                    <li><a href="#">Trang</a>
                                        <ul class="header__menu__dropdown">
                                            <li><a href="/products_detail">Chi tiết cửa hàng</a></li>
                                            <li><a href="/cart">Giỏ hàng</a></li>
                                            <li><a href="/checkout">Thanh toán</a></li>
                                            <li><a href="/blog_detail">Chi tiết bài viết</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/blog">Blog</a></li>
                                    <li><a href="/contact">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-3">
                            <div class="header__cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                                    <li><a href="/cart"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                                </ul>
                                <div class="header__cart__price">Vật phẩm: <span>150.00 Vnd</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="humberger__open">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
            </header>
            <!-- Header Section End -->


    <?php

    }
}

    ?>