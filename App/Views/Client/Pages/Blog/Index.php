<?php
namespace App\Views\Client\Pages\Blog;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Index extends BaseView
{
    public static function render($data = null): void
    {

?>

<!-- Hero Section Begin -->

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/blog/banner-blog.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Bài viết</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang chủ</a>
                            <span>Bài viết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Tìm kiếm...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Danh mục</h4>
                            <ul>
                                <li><a href="#">Tất cả</a></li>
                                <li><a href="#">Găng tay</a></li>
                                <li><a href="#">Khăn</a></li>
                                <li><a href="#">Mũ Nón/Len</a></li>
                                <li><a href="#">Bịt tai len</a></li>
                                <li><a href="#">Dép</a></li>
                                <li><a href="#">Đồng hồ</a></li>
                                <li><a href="#">Kính mát/Gọng kính</a></li>
                                <li><a href="#">Khẩu trang</a></li>
                                <li><a href="#">Giày</a></li>
                                <li><a href="#">Trang sức</a></li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tin tức gần đây</h4>
                            <div class="blog__sidebar__recent">
                                <a href="./App/Views/Client/Pages/Blog_Detail/index.php" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="/public/assets/client/img/blog/sidebar/phu-kien-thoi-trang-la-gi-01.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>Phụ kiện thời trang là gì? <br> Đâu là xu hướng phụ kiện thời trang 2024</h6>
                                        <span>26/11/2024</span>
                                    </div>
                                </a>
                                <a href="..../App/Views/Client/Pages/Blog_Detail/" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="/public/assets/client/img/blog/sidebar/sr-2.png" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>Thời trang không chỉ đơn thuần<br /> là những bộ quần áo, trang phục</h6>
                                        <span>26/11/2024</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="/public/assets/client/img/blog/sidebar/sr-3.png" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>4 Principles Help You Lose <br />Weight With Vegetables</h6>
                                        <span>26/11/2024</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tìm kiếm theo</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Trang sức</a>
                                <a href="#">Găng tay</a>
                                <a href="#">Thắc lưng</a>
                                <a href="#">Làm đẹp</a>
                                <a href="#">Cá tính</a>
                                <a href="#">Phong cách</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="/public/assets/client/img/blog/phu-kien-thoi-trang-la-gi-01.jpg" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="./Blog_Detail/index.php">Phụ kiện thời trang là gì? Đâu là xu hướng phụ kiện thời trang 2024</a></h5>
                                    <p>Thời trang không chỉ đơn thuần là những bộ quần áo, trang phục mà còn là những món phụ kiện thời trang </p>
                                    <a href="/App/Views/Client/Pages/Blog_Detail/" class="blog__btn">ĐỌC THÊM <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="/public/assets/client/img/blog/blog-3.png" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">5 sai lầm thường gặp khi chọn phụ kiện thời trang</a></h5> 
                                    <p>Việc thay đổi tư duy về thời trang, đặc biệt trong cách phối đồ nữ sẽ giúp bạn nâng tầm phong cách cá nhân. Tuy nhiên, phái nữ vẫn thường mắc những sai lầm trong trang phục khiến bản thân trong già hơn so với tuổi thực.</p>
                                    <a href="#" class="blog__btn">ĐỌC THÊM <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="/public/assets/client/img/blog/blog-1.png" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Phụ kiện thời trang là gì</a></h5>
                                    <p>Phụ kiện thời trang có thể nói rằng là những món đồ tôn lên sự cá tính của người dùng. </p>
                                    <a href="#" class="blog__btn">ĐỌC THÊM <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="/public/assets/client/img/blog/bi-quyet-mac-dep-voi-5-dang-nguoi-co-ban-new.webp" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Bí quyết chọn phụ kiện phù hợp với từng dáng người</a></h5>
                                    <p>Bạn có biết, phụ kiện thời trang chính là "vũ khí bí mật" giúp bạn nâng tầm phong cách và thể hiện cá tính riêng? Nhưng làm thế nào để chọn được</p>
                                    <a href="#" class="blog__btn">ĐỌC THÊM <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="/public/assets/client/img/blog/blog-4.png" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Bí quyết chọn phụ kiện thời trang "chất lừ" cho nàng sành điệu</a></h5>
                                    <p>Cá tính với set đồ all black. Set đồ all black không thể thiếu trong tủ đồ của các cô nàng sành điệu. Tone màu full đen luôn là lựa chọn chất lừ và dễ dàng ...</p>
                                    <a href="#" class="blog__btn">ĐỌC THÊM <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
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
