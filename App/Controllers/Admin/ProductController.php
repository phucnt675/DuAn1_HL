<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;
use App\Views\Admin\Pages\Product\Index;

class ProductController
{


    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            [
                'id' => 1,
                'name' => 'Dark Couverture Chocolate 60% / Block 1kg',
                'image' => 'block-dark60-1kg-1736327777715.webp',
                'description' => 'Socola đen couverture 60% thuộc Bộ sưu tập Nguyên liệu Chocolate của Belcholat là sự cân bằng tuyệt vời giữa vị đắng đót dìu dịu và cái ngọt êm ái của socola couverture thượng hạng, hoà quyện trong mùi hương cacao đậm đà, say đắm lòng người. Với việc được tinh tế từ hạt cacao nguyên chất từ tự nhiên, Dark Couverture 60% Block 1kg mang lại rất nhiều tác dụng tốt cho sức khoẻ, chống trầm cảm, hỗ trợ giảm cân, giúp ngủ ngon giấc hơn....
                Đặc biệt, Socola đen couverture 60% Belcholat sẽ biến trải nghiệm trong không gian bếp của bạn trở nên tuyệt vời hơn bao giờ hết với khả năng tạo ra các món truffle căng mịn, mousse chocolate trắng thơm ngon hoặc lớp vỏ socola giòn tan cho các món tráng miệng sang trọng. Với phong vị thượng hạng và chất lượng tuyệt hảo, hãy thoải mái sáng tạo nên những món ăn hấp dẫn, những đồ tráng miệng ngọt ngào từ Dark Couverture 60% Block 1kg của Belcholat.',
                'price' => '526.000₫',
                'quantity' => '20',
                'categoryId ' => 'Dark Chocolate ',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Milk Chocolate 45% / Block 1kg',
                'image' => 'milkchoco45',
                'description' => 'Sô-cô-la sữa 45% mang đến sự kết hợp hoàn hảo giữa vị béo ngậy của sữa và hương cacao dịu dàng. Được làm từ hạt cacao nguyên chất cùng sữa cao cấp, sản phẩm này là lựa chọn lý tưởng cho các món bánh, mousse và kẹo sô-cô-la.',
                'price' => '526.000₫',
                'quantity' => '15',
                'category_id' => 'Milk Chocolate',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'White Chocolate 35% / Block 1kg',
                'image' => 'whitechoco35',
                'description' => 'Sô-cô-la trắng 35% mang hương vị ngọt ngào, béo mịn đặc trưng của bơ ca cao, sữa và vani. Đây là nguyên liệu hoàn hảo để làm bánh, trang trí hoặc thưởng thức trực tiếp.',
                'price' => '526.000₫',
                'quantity' => '10',
                'category_id' => 'White Chocolate',
                'status' => 1
            ],
            [
                'id' => 4,
                'name' => 'Ruby Chocolate 47% / Block 1kg',
                'image' => 'rubychoco47',
                'description' => 'Sô-cô-la ruby 47% có màu hồng tự nhiên cùng hương vị trái cây chua nhẹ độc đáo. Đây là lựa chọn mới lạ dành cho các món tráng miệng sang trọng và sáng tạo.',
                'price' => '526.000₫',
                'quantity' => '12',
                'category_id' => 'Ruby Chocolate',
                'status' => 1
            ]

        ];

        Header::render();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        Header::render();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        echo 'Thực hiện lưu vào database';
    }


    // hiển thị chi tiết
    public static function show() {}


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            'id' => $id,
            'name' => 'User 1',
            'status' => 1
        ];
        if ($data) {
            Header::render();
            // hiển thị form sửa
            Edit::render($data);
            Footer::render();
        } else {
            header('location: /admin/products');
        }
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        echo 'Thực hiện cập nhật vào database';
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        echo 'Thực hiện xoá';
    }
}
