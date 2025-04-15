<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null): void
    {
        //var_dump($data['currentPage']);
        //echo'<pre>'

        ?>

        <section class="hero hero-normal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Danh Mục Sản Phẩm</span>
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


                                <form action="/search" method="get">
                                    <div class="hero__search__categories">
                                        Tất cả loại sản phẩm
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input name="search" type="text" placeholder="Bạn cần gì?">
                                    <button type="submit" class="site-btn">Tìm Kiếm</button>
                                </form>

                                <!-- 
                                <form action="/products" method="get">
                                    <div class="hero__search__categories">
                                        Tất cả loại sản phẩm
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="Bạn cần gì?">
                                    <button type="submit" class="site-btn">Tìm Kiếm</button>
                                </form> -->


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
                            <h2>XaLanh Fashion</h2>
                            <div class="breadcrumb__option">
                                <a href="/">Trang Chủ</a>
                                <span>Cửa Hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="sidebar">
                            <div class="sidebar__item">
                                <h4>Danh Mục Sản Phẩm</h4>
                                <?php
                                Category::render($data['categories']);
                                ?>

                            </div>
                            <div class="sidebar__item">
                                <h4>Giá</h4>
                                <form method="GET" action="">
                                    <div class="price-range-wrap">
                                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                            data-min="10" data-max="540">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                        <div class="range-slider">
                                            <div class="price-input">
                                                <input type="text" id="minamount">
                                                <input type="text" id="maxamount">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="sidebar__item sidebar__item__color--option">
                                <h4>Màu Sản Phẩm</h4>
                                <div class="sidebar__item__color sidebar__item__color--white">
                                    <label for="white">
                                        Trắng
                                        <input type="radio" id="white" name="color" value="Màu trắng"
                                            onclick="filterByColor('Màu trắng')">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--gray">
                                    <label for="gray">
                                        Xám
                                        <input type="radio" id="gray" value="Màu xám " name="color"
                                            onclick="filterByColor('Màu xám')">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--red">
                                    <label for="red">
                                        Đỏ
                                        <input type="radio" id="red" name="color" value="Màu đỏ"
                                            onclick="filterByColor('Màu đỏ')">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--black">
                                    <label for="black">
                                        Đen
                                        <input type="radio" name="color" id="black" value="Màu đen"
                                            onclick="filterByColor('Màu đen')">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--blue">
                                    <label for="blue">
                                        Xanh
                                        <input type="radio" id="blue">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--green">
                                    <label for="green">
                                        Xanh lá
                                        <input type="radio" id="green">
                                    </label>
                                </div>
                            </div>
                            <div class="sidebar__item">
                                <h4>Chất Liệu</h4>
                                <div class="sidebar__item__size">
                                    <label for="large">
                                        Vải lụa
                                        <input type="radio" name="material" id="large" value="Vải lụa"
                                            onclick="filterByMaterial('Vải lụa')">
                                    </label>
                                </div>
                                <div class="sidebar__item__size">
                                    <label for="medium">
                                        Vải len
                                        <input type="radio" name="material" id="medium" value="Vải len"
                                            onclick="filterByMaterial('Vải len')">
                                    </label>
                                </div>
                                <div class="sidebar__item__size">
                                    <label for="small">
                                        Da
                                        <input type="radio" id="small">
                                    </label>
                                </div>
                                <div class="sidebar__item__size">
                                    <label for="tiny">
                                        Tiny
                                        <input type="radio" id="tiny">
                                    </label>
                                </div>
                            </div>
                            <div class="sidebar__item">
                                <div class="latest-product__text">
                                    <h4>Sản Phẩm Mới</h4>
                                    <div class="latest-product__slider owl-carousel">
                                        <div class="latest-prdouct__slider__item">
                                            <?php
                                            foreach ($data['getAllNew'] as $item):
                                                ?>
                                                <a href="/products/<?= $item['id'] ?>" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>"
                                                            alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6><?= $item['name']; ?></h6>
                                                        <span><?= number_format($item['price']) ?> đ</span>
                                                    </div>
                                                </a>
                                            <?php endforeach;

                                            ?>


                                        </div>
                                        <div class="latest-prdouct__slider__item">
                                            <?php
                                            foreach ($data['getAllNew'] as $item):
                                                ?>
                                                <a href="/products/<?= $item['id'] ?>" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>"
                                                            alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6><?= $item['name']; ?></h6>
                                                        <span><?= number_format($item['price']) ?> đ</span>
                                                    </div>
                                                </a>
                                            <?php endforeach;

                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="product__discount">
                            <div class="section-title product__discount__title">
                                <h2>Sản Phẩm Khuyến Mãi</h2>
                            </div>
                            <div class="row">
                                <div class="product__discount__slider owl-carousel">

                                    <?php

                                    foreach ($data['getAllSale'] as $product):
                                        $discount = 0;
                                        if ($product['price'] > 0 && $product['discount_price'] > 0) {
                                            $discount = round((($product['price'] - $product['discount_price']) / $product['price']) * 100);
                                        }
                                        ?>
                                        <div class="col-lg-4">
                                            <div class="product__discount__item">
                                                <div class="product__discount__item__pic set-bg"
                                                    data-setbg="<?= APP_URL ?>/public/uploads/products/<?= $product['image'] ?>"
                                                    alt="">
                                                    <div class="product__discount__percent">-<?= $discount ?>%</div>
                                                    <ul class="product__item__pic__hover">
                                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="/products/<?= $item['id'] ?>"><i class="fa fa-retweet"></i></a>
                                                        </li>
                                                        <form action="/cart/add" method="post" style="display: inline;">
                                                            <input type="hidden" name="method" value="POST">
                                                            <input type="hidden" name="id" value="<?= $item['id'] ?>" required>
                                                            <button type="submit"
                                                                style="background: none; border: none; padding: 0; cursor: pointer;">
                                                                <i class="fa fa-shopping-cart"
                                                                    style="font-size: 20px; color: #000;"></i>
                                                            </button>
                                                        </form>
                                                    </ul>
                                                </div>
                                                <div class="product__discount__item__text">
                                                    <span><?= $product['category_name']; ?></span>
                                                    <h5><a href="/products/<?= $product['id'] ?>"><?= $product['name']; ?></a></h5>


                                                    <div class="product__item__price"><?= number_format($product['price']) ?> đ
                                                        <span><?= number_format($product['discount_price']) ?> đ </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;

                                    ?>


                                </div>
                            </div>
                        </div>
                        <div class="filter__item">
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="filter__sort">
                                        <span>Sắp xếp</span>
                                        <select>
                                            <option value="0">Mặc định</option>
                                            <option value="0">Default</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="filter__found">
                                        <h6><span><?= $data['countTotal'] ?></span> Sản Phẩm</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3">
                                    <div class="filter__option">
                                        <span class="icon_grid-2x2"></span>
                                        <span class="icon_ul"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            // Duyệt qua các sản phẩm đã phân trang
                            foreach ($data['products']['paginated'] as $item):
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="/products/<?= $item['id'] ?>"><i class="fa fa-retweet"></i></a></li>
                                                <form action="/cart/add" method="post" style="display: inline;">
                                                    <input type="hidden" name="method" value="POST">
                                                    <input type="hidden" name="id" value="<?= $item['id'] ?>" required>
                                                    <button type="submit"
                                                        style="background: none; border: none; padding: 0; cursor: pointer;">
                                                        <i class="fa fa-shopping-cart" style="font-size: 20px; color: #000;"></i>
                                                    </button>
                                                </form>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="/products/<?= $item['id'] ?>"><?= $item['name']; ?></a></h6>
                                            <h5><?= number_format($item['price']) ?>đ</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Phân trang cho sản phẩm -->

                        <div class="product__pagination">
    <?php if ($data['currentPage'] > 1): ?>
        <a href="?page=1&search=<?= $data['keyword'] ?>">1</a>
        <a href="?page=<?= $data['currentPage'] - 1 ?>&search=<?= $data['keyword'] ?>">&#10094;</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
        <a href="?page=<?= $i ?>&search=<?= $data['keyword'] ?>"
            class="<?= $i == $data['currentPage'] ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($data['currentPage'] < $data['totalPages']): ?>
        <a href="?page=<?= $data['currentPage'] + 1 ?>&search=<?= $data['keyword'] ?>">&#10095;</a>
        <a href="?page=<?= $data['totalPages'] ?>&search=<?= $data['keyword'] ?>">&#187;</a>
    <?php endif; ?>
</div>



                    </div>
                </div>
            </div>
        </section>
        <!-- Product Section End -->
        <Script>

            function filterByColor(color) {
                var url = new URL(window.location.href);  // Lấy URL hiện tại
                url.searchParams.set('color', color);    // Cập nhật hoặc thêm tham số 'color'
                url.searchParams.set('page', 1);         // Đặt lại trang về trang đầu tiên
                window.location.href = url.toString();   // Chuyển hướng đến URL mới với màu đã chọn
            }

            function filterByMaterial(material) {
                var url = new URL(window.location.href);  // Lấy URL hiện tại
                url.searchParams.set('material', material);    // Cập nhật hoặc thêm tham số 'material'
                url.searchParams.set('page', 1);         // Đặt lại trang về trang đầu tiên
                window.location.href = url.toString();   // Chuyển hướng đến URL mới với vật liệu đã chọn
            }


        </Script>


        <?php

    }
}
