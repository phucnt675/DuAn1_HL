<?php

namespace App\Views\Client\Pages\CheckOut;


use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = [])
    {


?>

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Thanh Toán</h2>
                            <div class="breadcrumb__option">
                                <a href="/">Trang chủ</a>
                                <span>Thanh Toán</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Checkout Section Begin -->


        <section class="checkout spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                        </h6>
                    </div>
                </div>
                <div class="checkout__form">
                    <h4>Thông tin khách hàng</h4>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                        <label for="fullname" class="form-label">Tên đầy đủ</label>
                                            <input form="paymentForm" type="text" id="fullname" name="fullname" value="<?= isset($_SESSION['user']['fullname']) ? htmlspecialchars($_SESSION['user']['fullname']) : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Điện thoại<span>*</span></p>
                                            <input type="text" id="phone">
                                        </div>
                                    </div>

                                </div>

                                <div class="checkout__input">
                                    <p>Địa chỉ giao hàng<span>*</span></p>
                                    <input type="text" id="street_address" placeholder="Street Address" class="checkout__input__add">

                                </div>



                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text" id="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout__input">
                                    <p>Ghi chú đơn hàng<span>*</span></p>
                                    <input type="text" id="order_notes" placeholder="Ghi chú về đơn hàng của bạn, ví dụ ghi chú đặc biệt về việc giao hàng.">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">

                                <div class="checkout__order">
                                    <h4>Đơn hàng của bạn</h4>
                                    <div class="checkout__order__products">Các sản phẩm</div>
                                    <ul>
                                        <?php
                                        $totalPrice = 0; 
                                        foreach ($data as $item):
                                            $totalPrice += $item['total_price']; 
                                        ?>
                                            <li><?= htmlspecialchars($item['product_name']) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    
                                    <div class="checkout__order__total">Tổng giá đơn hàng <span><?= number_format($totalPrice, ); ?> VNĐ</span></div>
                                    <div class="checkout__input__checkbox">
                                        <label for="acc-or">
                                            Tạo tài khoản
                                            <input type="checkbox" id="acc-or">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="checkout__input__checkbox">
                                        <label for="payment">
                                            Kiểm tra thanh toán
                                            <input type="checkbox" id="payment">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__input__checkbox">
                                        <label for="paypal">
                                            MoMo
                                            <input type="checkbox" id="paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <button type="submit" class="site-btn">ĐẶT HÀNG</button>
                                </div>

                            </div>

                        </div>
                </div>
        </section>
        <!-- Checkout Section End -->



<?php
    }
}
