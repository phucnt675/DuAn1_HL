<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Pages\Comment\Index;
use App\Views\Admin\Pages\Comment\Edit;

class CommentController
{
    // Hiển thị danh sách bình luận
    public static function index()
    {
        // Giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            [
                'id' => 1,
                'username' => 'Nguyen Van A',
                'users_id' => 101,
                'product_name' => 'Dark Couverture Chocolate 60%',
                'product_id' => 201,
                'content' => 'Socola này ngon tuyệt!',
                'date' => '2025-03-01 14:30',
                'status' => 1
            ],
            [
                'id' => 2,
                'username' => 'Tran Thi B',
                'users_id' => 102,
                'product_name' => 'Milk Chocolate 45%',
                'product_id' => 202,
                'content' => 'Rất thích hợp để làm bánh!',
                'date' => '2025-03-02 10:15',
                'status' => 1
            ]
        ];

        Header::render();
        Index::render($data);
        Footer::render();
    }

    // Hiển thị giao diện form sửa bình luận
    public static function edit(int $id)
    {
        // Giả sử data lấy từ database
        $data = [
            'id' => $id,
            'username' => 'Nguyen Van A',
            'users_id' => 101,
            'product_name' => 'Dark Couverture Chocolate 60%',
            'product_id' => 201,
            'content' => 'Socola này ngon tuyệt!',
            'date' => '2025-03-01 14:30',
            'status' => 1
        ];
        
        if ($data) {
            Header::render();
            Edit::render($data);
            Footer::render();
        } else {
            header('location: /admin/comments');
        }
    }

    // Xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        echo 'Thực hiện cập nhật bình luận vào database';
    }

    // Thực hiện xoá bình luận
    public static function delete(int $id)
    {
        echo 'Thực hiện xoá bình luận';
    }
}
