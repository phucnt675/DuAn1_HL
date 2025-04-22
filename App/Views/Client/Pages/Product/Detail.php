<?php


namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Views\Client\Components\Category;

use App\Models\Comment;
use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null): void
    {
        $comment = new Comment();
        // $result = $comment->getAllCommentJoinProductAndUser();

        $is_login = AuthHelper::checkLogin();


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
        <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/banner/banner-3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Chocolate shop</h2>
                            <div class="breadcrumb__option">
                                <a href="/">Trang Chủ</a>
                                <a href="/products">Cửa Hàng</a>
                                <span><?= $data['products']['name'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Product Details Section Begin -->
        <section class="product-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                <img id="product-main-image" class="product__details__pic__item--large"
                                    src="<?= APP_URL ?>/public/uploads/products/<?= isset($data['products']['image']) && !empty($data['products']['image']) ? $data['products']['image'] : 'default-image.jpg' ?>"
                                    alt="Product Image">
                            </div>
                            <div class="product__details__pic__slider owl-carousel">
                                <?php foreach ($data['product_images'] as $image) { ?>
                                    <!-- Hiển thị ảnh phụ -->
                                    <img data-imgbigurl="<?= APP_URL ?>/public/uploads/products/<?= $image['image'] ?>"
                                        src="<?= APP_URL ?>/public/uploads/products/<?= $image['image'] ?>" alt="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3><?= $data['products']['name'] ?></h3>
                            <div class="product__details__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(18 reviews)</span>
                            </div>

                            <div class="product__details__price" id="product-price">
                                <?php if ($data['products']['discount_price'] > 0): ?>
                                    <h6>Giá gốc: <strike><?= number_format($data['products']['price']) ?> đ</strike></h6>
                                    <h6>Giá giảm: <strong
                                            class="text-danger"><?= number_format($data['products']['price'] - $data['products']['discount_price']) ?>
                                            đ</strong></h6>
                                <?php else: ?>
                                    <h6>Giá tiền: <?= number_format($data['products']['price']) ?> đ</h6>
                                <?php endif; ?>
                            </div>
                            <div class="sidebar__item sidebar__item__color--option">
                                <div>Chọn màu và chất liệu:</div>

                                <div class="product-sku-wrapper">
                                    <?php foreach ($data['productWithDetail'] as $item): ?>
                                        <div class="product-sku-item">
                                            <label class="product-sku-label">
                                                <input form="addToCart" name="productSku" type="radio" value="<?= $item['sku_id'] ?>" class="hidden-radio">

                                                <div class="sku-option" onclick="changeProductOption('<?= $item['option_values'] ?>', '<?= $item['main_image'] ?>', '<?= $item['price'] ?>', '<?= isset($item['discount_price']) ? $item['discount_price'] : 0 ?>')">
                                                    <?= $item['option_values']  ?></div>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>




                            <p><?= $data['products']['short_description'] ?>

                            </p>



                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input form="addToCart" name="quantity" type="text" value="1">

                                    </div>
                                </div>
                            </div>
                            <?php if (is_array($data['products']) && !empty($data['products'])): ?>
                                <?php foreach ($data['products'] as $item): ?>
                                    <?php if (is_array($item) && isset($item['id'])): ?>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <form id="addToCart" action="/cart/add" method="POST">
                                <!-- Gửi product_id -->
                                <input type="hidden" name="productId" value="<?= $data['products']['id'] ?>">
                                <input type="hidden" name="method" value="POST" id="productSku">
                                <!-- Nếu chọn radio thì giá trị productSku sẽ tự động gửi -->
                                <!-- Trường số lượng -->

                                <input type="hidden" name="method" value="POST" id="quantity">


                                <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                            </form>


                            <ul>
                                <li><b>Lượt xem</b> <span><?= $data['products']['view'] ?></span></li>
                                <li><b>Số lượng</b> <span><?= $data['products']['quantity'] ?></span></li>
                                <li><b>Vận Chuyển</b> <span>trong 1 ngày. <samp>Miễn phí vận chuyển</samp></span></li>
                                <li><b>Chia sẻ</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                        aria-selected="true">Mô Tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Bình
                                        Luận</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Đánh
                                        Giá <span>(1)</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Thông Tin Sản Phẩm</h6>
                                        <p><?= $data['products']['description'] ?></p>


                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center mt-100 mb-100">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h4 class="card-title">Bình luận mới nhất</h4>
                                            </div>
                                            <div class="comment-widgets">
                                                <?php
                                                if (isset($data) && isset($data['comment']) && $data && $data['comment']) :

                                                    foreach ($data['comment'] as  $item) :
                                                ?>
                                                        <!-- Comment Row -->
                                                        <div class="d-flex flex-row comment-row m-t-0">
                                                            <div class="p-2">
                                                                <?php
                                                                if ($item['avatar']) :
                                                                ?>
                                                                    <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="user" width="50" class="rounded-circle">
                                                                <?php
                                                                else :
                                                                ?>
                                                                    <img src="<?= APP_URL ?>/public/uploads/users/default_user2.png" alt="user" width="50" class="rounded-circle">
                                                                <?php
                                                                endif;
                                                                ?>
                                                            </div>
                                                            <div class="comment-text w-100">
                                                                <h6 class="font-medium"><?= $item['name'] ?> - <?= $item['username'] ?> </h6>
                                                                <span class="m-b-15 d-block"><?= $item['content'] ?>...</span>
                                                                <div class="comment-footer">
                                                                    <span class="text-muted float-right"><?= $item['date'] ?></span>
                                                                    <?php
                                                                    if (isset($data) &&  $is_login && ($_SESSION['users']['id'] == $item['users_id'])) :
                                                                    ?>
                                                                        <!-- <button type="button" class="btn btn-cyan btn-sm" data-toggle="collapse" data-target="#<?= $item['username'] ?><?= $item['id'] ?>" aria-expanded="false" aria-controls="<?= $item['username'] ?><?= $item['id'] ?>">Sửa</button> -->
                                                                        <!-- Nút để hiển thị form cập nhật -->
                                                                        <button type="button" class="btn btn-warning btn-sm" onclick="toggleEditForm(<?= $item['id'] ?>)">Sửa</button>

                                                                        <form action="/comments/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
                                                                            <input type="hidden" name="method" value="DELETE" id="">
                                                                            <input type="hidden" name="product_id" value="<?= $data['products']['id'] ?>" id="">
                                                                            <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                                        </form>
                                                                        <!-- <form action="/comments/<?= $item['id'] ?>" method="post">
                                                                            <input type="hidden" name="_method" value="PUT">
                                                                            <input type="hidden" name="product_id" value="<?= $data['products']['id'] ?>">
                                                                            <input type="text" name="content" value="<?= $item['content'] ?>" required>
                                                                            <button type="submit" class="btn btn-warning btn-sm">Cập nhật</button>
                                                                        </form> -->
                                                                        <form id="edit-form-<?= $item['id'] ?>" action="/comments/<?= $item['id'] ?>" method="post" style="display: none; margin-top: 10px;">
                                                                            <input type="hidden" name="_method" value="PUT">
                                                                            <input type="hidden" name="product_id" value="<?= $data['products']['id'] ?>">
                                                                            <input type="text" name="content" value="<?= $item['content'] ?>" required>
                                                                            <button type="submit" class="btn btn-success btn-sm">Cập nhật</button>
                                                                        </form>
                                                                        <script>
                                                                            function toggleEditForm(id) {
                                                                                const form = document.getElementById('edit-form-' + id);
                                                                                form.style.display = form.style.display === 'none' ? 'block' : 'none';
                                                                            }
                                                                        </script>







                                                                    <?php
                                                                    endif;
                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    <?php
                                                    endforeach;
                                                else :
                                                    ?>
                                                    <h6 class="text-center text-danger"> Chưa có bình luận</h6>

                                                <?php
                                                endif;
                                                ?>

                                                <?php
                                                if (isset($data) &&  $is_login) :
                                                ?>
                                                    <div class="d-flex flex-row comment-row">

                                                        <div class="p-2">

                                                            <?php
                                                            if ($_SESSION['users'] && $_SESSION['users']['avatar']) :
                                                            ?>
                                                                <img src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['users']['avatar'] ?>" alt="users" width="50" class="rounded-circle">
                                                            <?php
                                                            else :
                                                            ?>
                                                                <img src="<?= APP_URL ?>/public/uploads/users/default_user2.png" alt="users" width="50" class="rounded-circle">
                                                            <?php
                                                            endif;
                                                            ?>

                                                        </div>
                                                        <div class="comment-text w-100">
                                                            <h6 class="font-medium"><?= $_SESSION['users']['name'] ?> - <?= $_SESSION['users']['username'] ?></h6>
                                                            <form action="/comments" method="post">
                                                                <input type="hidden" name="method" value="POST" id="" required>
                                                                <input type="hidden" name="product_id" id="product_id" value="<?= $data['products']['id'] ?>">
                                                                <input type="hidden" name="users_id" id="users_id" value="<?= $_SESSION['users']['id'] ?>">
                                                                <div class="form-group">
                                                                    <label for="content">Bình luận</label>
                                                                    <textarea class="form-control rounded-0" name="content" id="content" rows="3" placeholder="Nhập bình luận..."></textarea>
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                <?php
                                                else :
                                                ?>
                                                    <h6 class="text-danger text-center"> Vui lòng Đăng nhập để bình luận</h6>
                                                <?php
                                                endif;
                                                ?>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Product Details Section End -->

        <!-- Related Product Section Begin -->
        <section class="related-product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title related__product__title">
                            <h2>Sản Phẩm Liên Quan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($data['product_related'] as $item):
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="/products/<?= $item['id'] ?>"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="/products/<?= $item['id'] ?>"><?= $item['name'] ?></a></h6>
                                    <h5><?= number_format($item['price']) ?>đ</h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;

                    ?>
                </div>
            </div>
        </section>
        <!-- Related Product Section End -->
        <script>
            function changeProductOption(optionValue, newImage, newPrice, discountPrice) {
                console.log("Clicked option:", optionValue);
                console.log("Image:", newImage, "Price:", newPrice, "Discount Price:", discountPrice);

                // Cập nhật hình ảnh mới
                var imageElement = document.getElementById('product-main-image');
                if (imageElement) {
                    if (newImage) {
                        imageElement.src = "<?= APP_URL ?>/public/uploads/products/" + newImage + "?t=" + new Date().getTime();
                        console.log("Hình ảnh đã được cập nhật:", imageElement.src);
                    } else {
                        console.error("newImage không hợp lệ.");
                    }
                } else {
                    console.error('Không tìm thấy phần tử hình ảnh với id "product-main-image".');
                }

                // Cập nhật giá mới
                var priceElement = document.getElementById('product-price');
                if (priceElement) {
                    if (discountPrice > 0) {
                        priceElement.innerHTML = '<h6>Giá gốc: <strike>' + formatNumber(newPrice) + ' đ</strike></h6>' +
                            '<h6>Giá giảm: <strong class="text-danger">' + formatNumber(newPrice - discountPrice) + ' đ</strong></h6>';
                    } else {
                        priceElement.innerHTML = '<h6>Giá tiền: ' + formatNumber(newPrice) + ' đ</h6>';
                    }
                    console.log("Giá đã được cập nhật:", newPrice, discountPrice);
                } else {
                    console.error('Không tìm thấy phần tử giá với id "product-price".');
                }
            }

            // Hàm format để định dạng số tiền
            function formatNumber(num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
            }
        </script>






<?php

    }
}
