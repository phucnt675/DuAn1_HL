<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        
        <nav class="nav flex-column border-right">
            <a class="nav-link active" href="/products">Tất cả</a>
            <?php
            foreach ($data as $item) :
            ?>
                <a class="nav-link" href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a>
            <?php
            endforeach;
            ?>
        </ul>
       <style>
        /* Kiểu dáng cho các liên kết */
.nav-link {
    display: block; /* Đảm bảo các liên kết chiếm toàn bộ chiều rộng */
    padding: 10px 15px; /* Khoảng cách bên trong */
    color: #333; /* Màu chữ tối */
    font-size: 16px; /* Kích thước chữ */
    text-decoration: none; /* Bỏ gạch chân */
    border-radius: 4px; /* Bo tròn các góc */
    margin-bottom: 8px; /* Khoảng cách giữa các liên kết */
    transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu nền khi hover */
}

/* Màu nền khi hover hoặc liên kết đang được chọn */
.nav-link:hover, .nav-link.active {
    background-color: #F5F5F5; /* Màu nền khi hover */
    color: #1F2837; /* Màu chữ trắng khi hover */
    text-decoration: none; /* Đảm bảo không có gạch chân */
}

/* Thay đổi kiểu dáng cho liên kết đang hoạt động */


/* Phần tử cha của menu sidebar */

       </style>
<?php

    }
}
