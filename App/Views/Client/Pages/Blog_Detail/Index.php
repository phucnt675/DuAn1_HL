<?php
namespace App\Views\Client\Pages\Blog_Detail;

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

        <!-- Blog Details Hero Begin -->
        <section class="blog-details-hero set-bg" data-setbg="https://www.blogger.com/about/img/social/facebook-1200x630.jpg " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog__details__hero__text">
                            <h2>Phụ kiện thời trang là gì? Đâu là xu hướng phụ kiện thời trang 2024</h2>
                            <ul>
                                <li>Bởi Trọng Phúc</li>
                                <li>26/11/2024</li>
                                <li>8 bình luận</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Details Hero End -->

        <!-- Blog Details Section Begin -->
        <section class="blog-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 order-md-1 order-2">
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
                                    <a href="#" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="/public/assets/client/img/blog/sidebar/sr-1.jpg" alt="" width="100px" height="auto">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>Phụ kiện thời trang là gì?<br /> Đâu là xu hướng phụ kiện thời trang 2024</h6>
                                            <span>26/11/2024</span>
                                        </div>
                                    </a>
                                    <a href="#" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="https://cdn.tgdd.vn/Files/2021/02/22/1329655/cach-lua-chon-phu-kien-thoi-trang-dep-ma-phai-nu-nen-biet-202102222211079281.jpg" alt="" width = '100px'>
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>Cách lựa chọn phụ kiện <br> thời trang đẹp mà phái nữ nên biết</h6>
                                            <span>26/11/2024</span>
                                        </div>
                                    </a>
                                    <a href="#" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                        <img src="https://zerdio.com.vn/wp-content/uploads/2021/07/cac-loai-phu-kien-thoi-trang-nu.jpg" alt="" width="100px" height="auto">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>25+ Các Phụ Kiện Thời Trang Nữ Cao Cấp <br> Mà Phái Đẹp Cần Biết</h6>
                                            <span>26/11/2024</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="blog__sidebar__item">
                                <h4>Tìm kiếm theo</h4>
                                <div class="blog__sidebar__item__tags">
                                    <a href="#">lối sống</a>
                                    <a href="#">làm đẹp</a>
                                    <a href="#">Cách phối đồ</a>
                                    <a href="#">Lợi ích</a>
                                    <a href="#">Tác hại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 order-md-1 order-1">
                        <div class="blog__details__text">
                            <img src="/public/assets/client/img/blog/details/phu-kien-thoi-trang-la-gi-01.jpg" alt="">
                            <p>Phụ kiện thời trang có thể nói rằng là những món đồ tôn lên sự cá tính của người dùng. Phụ kiện
                                giúp người mang trở nên nổi bật và ấn tượng hơn. Ngày nay, nhu cầu là đẹp càng đi vào chiều sâu
                                không chỉ đơn thuần là những bộ quần áo mà còn là túi xách, ví da, vòng cổ, khuyên tai, dây nịt,
                                mắt kính,...

                                Phụ kiện thời trang đang dần trở nên quen thuộc với giới trẻ hiện nay. Nhờ những lợi thế riêng
                                biệt, phụ kiện thời trang có những bước chuyển mình với sự ra đời của nhiều phụ kiện để đáp ứng
                                nhu cầu ngày càng phổ biến.</p>
                            <h3>Lợi ích của phụ kiện thời trang</h3>
                            <p>Những món phụ kiện thường được làm từ nhiều vật liệu khác nhau, chú trọng vào sự độc đáo, phong
                                cách cho người mặc. Và đặc biệt không quan trọng về giá trị vật chất. Chính vì điều này, những
                                món phụ kiện thường bán với giá mềm, phù hợp với nhu cầu của nhiều đối tượng khách hàng.</p>
                        </div>
                        <div class="blog__details__content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog__details__author">
                                        <div class="blog__details__author__pic">
                                            <img src="https://t4.ftcdn.net/jpg/04/75/00/99/360_F_475009987_zwsk4c77x3cTpcI3W1C1LU4pOSyPKaqi.jpg" alt="">
                                        </div>
                                        <div class="blog__details__author__text">
                                            <h6>Trọng Phúc</h6>
                                            <span>Admin</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="blog__details__widget">
                                        <ul>
                                            <li><span>Danh mục:</span> Bài viết</li>
                                            <li><span>Thẻ:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                        </ul>
                                        <div class="blog__details__social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Details Section End -->

        <!-- Related Blog Section Begin -->
        <section class="related-blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title related-blog-title">
                            <h2>Bài viết bạn có thể thích</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="https://file.hstatic.net/200000472237/file/phu-kien-thoi-trang_3ee433cd88a34404903beefc3c935fa3_grande.png" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Kinh doanh phụ kiện thời trang lần đầu, ít vốn: Nên làm gì?</a></h5>
                                <p>Phụ kiện thời trang luôn là ngành hàng kinh doanh tiềm năng bởi thay đổi theo xu hướng hàng ngà </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="https://pos.nvncdn.com/a11880-4373/art/artCT/20210917_dHqIfreYN9nj6dVxWCkSWEl2.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Những ưu điểm mà phụ kiện thời trang mang lại bạn đã biết chưa?</a></h5>
                                <p>Thời trang không chỉ đơn thuần là quần áo, nó còn là những món phụ kiện kèm theo như vòng tay, túi, kính mắt, khăn… </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="https://cdn.tgdd.vn/Files/2021/02/22/1329655/cach-lua-chon-phu-kien-thoi-trang-dep-ma-phai-nu-nen-biet-202102222211079281.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Cách lựa chọn phụ kiện thời trang đẹp mà phái nữ nên biết</a></h5>
                                <p>Bạn đang tìm phụ kiện đẹp phù hợp với bản thân mình, để trở nên xinh đẹp hơn </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related Blog Section End -->





        <?php

    }
}
