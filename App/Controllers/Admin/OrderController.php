<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Pages\Order\Create;
use App\Views\Admin\Pages\Order\Edit;
use App\Views\Admin\Pages\Order\Index;

class OrderController
{
    // Hiển thị danh sách đơn hàng
    public static function index()
    {
        // Giả sử data là mảng dữ liệu lấy từ database
        $data = [
            [
                'id' => 1,
                'customer_name' => 'Nguyễn Văn A',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'product' => 'Nhẫn vàng 24K',
                'quantity' => 1,
                'total_price' => '10.000.000₫',
                'status' => 'pending'
            ],
            [
                'id' => 2,
                'customer_name' => 'Trần Thị B',
                'phone' => '0987654321',
                'address' => 'TP.HCM',
                'product' => 'Dây chuyền bạc',
                'quantity' => 2,
                'total_price' => '5.000.000₫',
                'status' => 'shipped'
            ]
        ];

        Header::render();
        Index::render($data);
        Footer::render();
    }

    // Hiển thị giao diện form thêm đơn hàng
    public static function create()
    {
        Header::render();
        Create::render();
        Footer::render();
    }

    // Xử lý chức năng thêm đơn hàng
    public static function store()
    {
        echo 'Thực hiện lưu đơn hàng vào database';
    }

    // Hiển thị chi tiết đơn hàng
    public static function show(int $id)
    {
        echo "Chi tiết đơn hàng ID: $id";
    }

    // Hiển thị giao diện form sửa đơn hàng
    public static function edit(int $id)
    {
        $data = [
            'id' => $id,
            'customer_name' => 'Nguyễn Văn A',
            'phone' => '0123456789',
            'address' => 'Hà Nội',
            'product' => 'Nhẫn vàng 24K',
            'quantity' => 1,
            'total_price' => '10.000.000₫',
            'status' => 'pending'
        ];

        if ($data) {
            Header::render();
            Edit::render($data);
            Footer::render();
        } else {
            header('location: /admin/orders');
        }
    }

    // Xử lý chức năng cập nhật đơn hàng
    public static function update(int $id)
    {
        echo "Thực hiện cập nhật đơn hàng ID: $id vào database";
    }

    // Thực hiện xoá đơn hàng
    public static function delete(int $id)
    {
        echo "Thực hiện xoá đơn hàng ID: $id";
    }
}
