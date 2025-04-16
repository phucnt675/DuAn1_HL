<?php

namespace App\Views\Client;

use App\Views\BaseView;
use App\Views\Client\Components\Category;
class Home extends BaseView
{
    public static function render($data = null): void
    {

        ?>

        <section class="hero">
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
                                <form action="/search">
                                    <div class="hero__search__categories">
                                        Tất cả loại sản phấm
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" name="search" placeholder="Bạn cần gì?">
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
                        <div class="hero__item set-bg" data-setbg="/public/assets/client/img/banner/banner5.jpg">
                            <div class="hero__text">
                                <span>Chocolate Cao cấp</span>
                                <h3>Sang trọng quý phái<br />100%</h3>
                                <a href="/products" class="primary-btn">Cửa Hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Categories Section Begin -->
        <section class="categories">
            <div class="container">
                <div class="row">

                    <div class="categories__slider owl-carousel">
                        <?php
                        foreach ($data['categories'] as $item):
                            ?>
                            <div class="col-lg-3">
                                <div class="categories__item set-bg"
                                    data-setbg="<?= APP_URL ?>/public/uploads/categories/<?= $item['image'] ?>">
                                    <h5><a href="/products/categories/<?= $item['id'] ?>"><?= $item['name']; ?></a></h5>
                                </div>
                            </div>

                        <?php endforeach;

                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->
        <!-- Featured Section Begin -->
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Sản phẩm nổi bật</h2>
                        </div>
                        <div class="featured__controls">
                            <ul>
                                <li class="active" data-filter="*">All</li>
                                <?php
                                foreach ($data['categories'] as $item):
                                    ?>
                                    <li data-filter=".<?= $item['name'] ?>"><?= $item['name']; ?></li>
                                <?php endforeach;

                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row featured__filter">
                    <?php
                    foreach ($data['getAllOutstanding'] as $item):
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $item['name'] ?>">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                    data-setbg="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="/products/<?= $item['id'] ?>"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="/products/<?= $item['id'] ?>"><?= $item['name']; ?></a></h6>
                                    <h5><?= number_format($item['price']) ?> đ</h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;

                    ?>

                </div>
            </div>
        </section>
        <!-- Featured Section End -->

        <!-- Banner Begin -->
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="/public/assets/client/img/banner/banner-thoi-trang-nam-tinh.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="/public/assets/client/img/banner/banner-thoi-trang.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <!-- Latest Product Section Begin -->
        <section class="latest-product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>Sản phẩm mới nhất</h4>

                            <div class="latest-product__slider owl-carousel">

                                <div class="latest-prdouct__slider__item">
                                    <?php
                                    foreach ($data['getAllNew'] as $item):
                                        ?>

                                        <a href="/products/<?= $item['id'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="">
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
                                                <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="">
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

                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>Sản phẩm hot nhất</h4>

                            <div class="latest-product__slider owl-carousel">

                                <div class="latest-prdouct__slider__item">
                                    <?php
                                    foreach ($data['getAllHot'] as $item):
                                        ?>

                                        <a href="/products/<?= $item['id'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="">
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
                                    foreach ($data['getAllHot'] as $item):
                                        ?>
                                        <a href="/products/<?= $item['id'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="">
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
        </section>
        <!-- Latest Product Section End -->



        <!-- Blog Section Begin -->
        <section class="from-blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title from-blog__title">
                            <h2>Đến từ bài viết</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="blog__item">
            <div class="blog__item__pic">
                <img src="/public/assets/client/img/blog/blog-4.jpg" alt="">
            </div>
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                    <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Bí quyết chọn chocolate "chất lừ" cho người sành ăn</a></h5>
                <p>Khám phá hương vị độc đáo của chocolate đen nguyên chất. Đây là lựa chọn không thể thiếu với tín đồ yêu thích hương vị đậm đà và tinh tế...</p>
                <a href="#" class="blog__btn">ĐỌC THÊM <span class="arrow_right"></span></a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="blog__item">
            <div class="blog__item__pic">
                <img src="/public/assets/client/img/blog/blog-4.jpg" alt="">
            </div>
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                    <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Khám phá các loại chocolate hot nhất và tìm vị ngọt hoàn hảo cho từng ngày.</a></h5>
                <p>Những viên chocolate cao cấp không chỉ mang lại cảm giác ngọt ngào mà còn là món quà tinh tế dành tặng người thân yêu.</p>
                <a href="#" class="blog__btn">ĐỌC THÊM <span class="arrow_right"></span></a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="blog__item">
            <div class="blog__item__pic">
                <img src="/public/assets/client/img/blog/blog-4.jpg" alt="">
            </div>
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-calendar-o"></i> 10/12/2024</li>
                    <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Thế giới chocolate dành cho người yêu hương vị nguyên bản</a></h5>
                <p>Thưởng thức những dòng chocolate từ Bỉ, Pháp đến Thụy Sĩ với độ ngọt, đắng khác nhau giúp bạn trải nghiệm trọn vẹn sự tinh tế trong từng thanh chocolate.</p>
                <a href="#" class="blog__btn">ĐỌC THÊM <span class="arrow_right"></span></a>
            </div>
        </div>
    </div>
</div>

            </div>
        </section>
        <!-- Blog Section End -->
        <?php
    }
}
