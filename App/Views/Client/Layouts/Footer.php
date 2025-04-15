<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null): void
    {
?>

        <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="/"><img src="/public/assets/client/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: Cantho/Vietnam</li>
                            <li>Điện thoại: +84 11.188.888</li>
                            <li>Email: xalanh@fashion.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Liên kết hữu ích</h6>
                        <ul>
                            <li><a href="#">Giới thiệu về chúng tôi</a></li>
                            <li><a href="#">Giới thiệu về cửa hàng </a></li>
                            <li><a href="#">Mua sắm an toàn</a></li>
                            <li><a href="#">Thông tin giao hàng</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Sơ đồ trang web của chúng tôi</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Chúng tôi là ai</a></li>
                            <li><a href="#">Dịch vụ của chúng tôi</a></li>
                            <li><a href="#">Dự án</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Sự đổi mới</a></li>
                            <li><a href="#">Lời chứng thực</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia bản tin của chúng tôi ngay bây giờ</h6>
                        <p>Nhận email cập nhật về cửa hàng mới nhất và các ưu đãi đặc biệt của chúng tôi.</p>
                        <form action="#">
                            <input type="text" placeholder="Nhập email của bạn">
                            <button type="submit" class="site-btn">Đăng kí</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">FC Xalanh</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="/public/assets/client/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="/public/assets/client/js/jquery-3.3.1.min.js"></script>
    <script src="/public/assets/client/js/bootstrap.min.js"></script>
    <script src="/public/assets/client/js/jquery.nice-select.min.js"></script>
    <script src="/public/assets/client/js/jquery-ui.min.js"></script>
    <script src="/public/assets/client/js/jquery.slicknav.js"></script>
    <script src="/public/assets/client/js/mixitup.min.js"></script>
    <script src="/public/assets/client/js/owl.carousel.min.js"></script>
    <script src="/public/assets/client/js/main.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</body>

</html>


<?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>