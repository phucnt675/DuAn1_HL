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
        <section class="blog-details-hero">
    <img src="https://cdn.pixabay.com/photo/2016/11/29/09/32/chocolate-1869991_1280.jpg" alt="Chocolate Banner" style="width: 100%; height: auto;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text" style="margin-top: -200px; position: relative; color: white; text-shadow: 1px 1px 5px #000;">
                    <h2>Chocolate là gì? Những xu hướng chocolate không thể bỏ lỡ năm 2024</h2>
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
                                    <li><a href="#">Chocolate đen</a></li>
                                    <li><a href="#">Chocolate sữa</a></li>
                                    <li><a href="#">Truffle</a></li>
                                    <li><a href="#">Chocolate trắng</a></li>
                                    <li><a href="#">Quà tặng chocolate</a></li>
                                    <li><a href="#">Thương hiệu nổi bật</a></li>
                                </ul>
                            </div>
                            <div class="blog__sidebar__item">
                                <h4>Bài viết gần đây</h4>
                                <div class="blog__sidebar__recent">
                                    <a href="#" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="https://cdn.pixabay.com/photo/2017/05/07/08/56/chocolate-2296622_1280.jpg" alt="" width="100px" height="auto">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>Chocolate là gì?<br /> Xu hướng chocolate năm 2024</h6>
                                            <span>26/11/2024</span>
                                        </div>
                                    </a>
                                    <a href="#" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="https://cdn.pixabay.com/photo/2014/04/10/11/06/chocolate-320888_1280.jpg" alt="" width = '100px'>
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>Cách chọn chocolate <br> phù hợp khẩu vị và dịp lễ</h6>
                                            <span>26/11/2024</span>
                                        </div>
                                    </a>
                                    <a href="#" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="https://cdn.pixabay.com/photo/2016/11/29/05/15/chocolate-1869338_1280.jpg" alt="" width="100px" height="auto">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>Top 10 thương hiệu chocolate nổi bật thế giới</h6>
                                            <span>26/11/2024</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="blog__sidebar__item">
                                <h4>Tìm kiếm theo</h4>
                                <div class="blog__sidebar__item__tags">
                                    <a href="#">ngọt ngào</a>
                                    <a href="#">quà tặng</a>
                                    <a href="#">cao cấp</a>
                                    <a href="#">vị đắng</a>
                                    <a href="#">truyền thống</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 order-md-1 order-1">
                        <div class="blog__details__text">
                            <img src="https://cdn.pixabay.com/photo/2016/12/06/18/27/chocolate-1887836_1280.jpg" alt="">
                            <p>Chocolate là một trong những món ăn được yêu thích trên toàn thế giới. Với nhiều dạng và hương vị khác nhau, từ đắng nhẹ đến ngọt ngào, chocolate luôn là biểu tượng của sự tinh tế và niềm vui thưởng thức. Ngày nay, chocolate không chỉ đơn thuần là món tráng miệng mà còn được sử dụng làm quà tặng trong các dịp đặc biệt.</p>
                            <h3>Lợi ích của chocolate</h3>
                            <p>Chocolate, đặc biệt là chocolate đen, có chứa chất chống oxy hóa giúp cải thiện tâm trạng và sức khỏe tim mạch. Bên cạnh đó, vị ngon quyến rũ và khả năng kích thích serotonin khiến chocolate trở thành món quà tinh thần tuyệt vời cho mọi lứa tuổi.</p>
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
                                            <li><span>Thẻ:</span> All, Chocolate, Sweet, Bitter, Gift</li>
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
                                <img src="https://cdn.pixabay.com/photo/2017/01/20/15/06/chocolate-1998425_1280.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Bí quyết kinh doanh chocolate với vốn ít cho người mới</a></h5>
                                <p>Chocolate là mặt hàng dễ bán, thị trường rộng lớn và dễ dàng tiếp cận nhiều phân khúc khách hàng.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="https://cdn.pixabay.com/photo/2014/04/10/11/06/chocolate-320888_1280.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Những lợi ích tuyệt vời mà chocolate mang lại</a></h5>
                                <p>Chocolate không chỉ là món ăn ngon mà còn là người bạn đồng hành tuyệt vời cho sức khỏe.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="https://cdn.pixabay.com/photo/2016/12/06/18/27/chocolate-1887836_1280.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 26/11/2024</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Cách chọn chocolate ngon phù hợp với bạn</a></h5>
                                <p>Từ chocolate đen, trắng đến sữa, mỗi loại đều mang đến một trải nghiệm vị giác khác biệt.</p>
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
