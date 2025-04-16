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

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" style="background-image: url('https://cdn.pixabay.com/photo/2017/01/20/15/06/chocolate-1991124_1280.jpg'); height: 300px; background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text" style="padding-top: 100px; color: white; text-shadow: 1px 1px 3px #000;">
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
                            <li><a href="#">Socola đen</a></li>
                            <li><a href="#">Socola sữa</a></li>
                            <li><a href="#">Socola handmade</a></li>
                            <li><a href="#">Hộp quà socola</a></li>
                            <li><a href="#">Socola nhân hạt</a></li>
                            <li><a href="#">Truffle</a></li>
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tin tức gần đây</h4>
                        <div class="blog__sidebar__recent">
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="https://cdn.pixabay.com/photo/2017/01/20/15/06/chocolate-1991124_1280.jpg" alt="Socola quà tặng">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>Lựa chọn socola phù hợp cho mọi dịp<br> Quà tặng ngọt ngào cho người thương</h6>
                                    <span>10/04/2025</span>
                                </div>
                            </a>
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="https://cdn.pixabay.com/photo/2016/03/05/19/02/chocolates-1238613_1280.jpg" alt="Socola handmade">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>Socola handmade - Tinh tế trong từng miếng nhỏ</h6>
                                    <span>08/04/2025</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tìm kiếm theo</h4>
                        <div class="blog__sidebar__item__tags">
                            <a href="#">Socola</a>
                            <a href="#">Tình yêu</a>
                            <a href="#">Hộp quà</a>
                            <a href="#">Valentine</a>
                            <a href="#">Quà tặng</a>
                            <a href="#">Ngọt ngào</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="https://cdn.pixabay.com/photo/2016/12/26/17/28/chocolates-1938302_1280.jpg" alt="Xu hướng socola 2025">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 10/04/2025</li>
                                    <li><i class="fa fa-comment-o"></i> 3</li>
                                </ul>
                                <h5><a href="#">Xu hướng socola 2025: Sự giao thoa của hương vị và nghệ thuật</a></h5>
                                <p>Socola không chỉ là món quà tặng, mà còn là nghệ thuật của hương vị, mang đến trải nghiệm tinh tế cho người nhận.</p>
                                <a href="#" class="blog__btn">Đọc thêm <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Có thể thêm nhiều bài viết ở đây với hình ảnh tương tự -->
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