<?php

namespace App\Views\Client\Pages\Cart;
use App\Views\Client\Components\Category;
use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = []): void
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
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="/products">Cửa Hàng</a>
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        

        <!-- Shopping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <?php if (!empty($data)): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__table">
                                <table class="table table-hover table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Giá tiền</th>
                                            <th>Số lượng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $item): ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="/public/uploads/products/<?= htmlspecialchars($item['product_images'] ?? 'default.jpg') ?>"
                                                            width="80px" class="rounded">
                                                        <div class="ml-3">
                                                            <h5 class="mb-1"><?= htmlspecialchars($item['product_name']) ?></h5>
                                                            <small class="text-muted"><?= htmlspecialchars($item['product_variants'] ?? 'Biến thể không xác định') ?></small>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td><?= number_format($item['total_price'], ) ?> VND</td>


                                                <td>
                                                    <form action="/cart/update" method="POST">
                                                        <input type="hidden" name="method" value="POST">

                                                        <input type="number" name="quantity[<?= $item['cart_id'] ?>]" value="<?= htmlspecialchars($item['quantity']) ?>" data-id="<?= $item['cart_id'] ?>" onchange="this.form.submit()">
                                                    </form>

                                                </td>



                                                <td>
                                                    <form action="/cart/delete" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($item['cart_id']) ?>">
                                                    <input type="hidden" name="method" value="POST">
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="shoping__discount">
                                <h5>Áp dụng mã giảm giá</h5>
                                <form action="/cart/apply-coupon" method="post">
                                    <input type="text" name="coupon_code" class="form-control mb-2" placeholder="Nhập mã giảm giá">
                                    <button type="submit" class="btn btn-success">Áp dụng</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shoping__checkout">
                                <h5>Tổng giỏ hàng</h5>
                                <ul>
                                    
                                    <li>
                                       
                                        <span>
                                            <?= number_format(array_sum(array_column($data, 'total_price')), 0) ?>đ
                                        </span>
                                        <span>Tổng tiền:</span>
                                    </li>
                                </ul>
                                <a href="/checkout" class="primary-btn">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h5>Giỏ hàng của bạn đang trống.</h5>
                            <a href="/" class="btn btn-primary mt-3">Quay lại mua sắm</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <!-- Shopping Cart Section End -->
<?php
    }
}
?>