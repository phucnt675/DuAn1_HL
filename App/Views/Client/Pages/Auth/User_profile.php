<?php

namespace App\Views\Client\Pages\Auth;
use App\Views\Client\Components\Category;
use App\Views\BaseView;

class User_profile extends BaseView
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
                        <h2>Thông Tin Người Dùng</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang Chủ</a>
                            <span>Thông Tin Người Dùng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">
                    <h3>Thông Tin Người Dùng</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <?php if ($data && $data['avatar']) : ?>
                                <img src="<?= APP_URL ?>/public/assets/admin/img/users/<?= $data['avatar'] ?>" alt="User Avatar" class="img-fluid shadow-lg border rounded-3" style="width: 200px; height: 200px; object-fit: cover;">
                            <?php else : ?>
                                <img src="/public/assets/client/img/user.png" class="img-thumbnail rounded-circle">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <h4 class="mb-3">Thông Tin Cá Nhân</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Họ và Tên:</strong> <?= $data['username'] ?></li>
                                <li class="list-group-item"><strong>Quê Quán:</strong> <?= $data['address'] ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?= $data['email'] ?></li>
                                <li class="list-group-item"><strong>Số điện thoại:</strong> <?= $data['phone_number'] ?></li>
                                <li class="list-group-item">
                                    <a href="/change-password" class="btn btn-info btn-sm">
                                        <i class="bi bi-key-fill"></i> Đổi mật khẩu
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="/users/<?= $data['id'] ?>" class="primary-btn">Chỉnh Sửa Thông Tin</a>
                    <a href="/" class="btn btn-secondary">Quay Lại</a>
                </div>
            </div>
        </div>


<?php

    }
}
