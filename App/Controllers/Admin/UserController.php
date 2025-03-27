<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\User\Create;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\User\Index;

class UserController
{


    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            [
                'id' => 1,
                'username' => 'Phucnt675',
                'password' => 'phucdeptrai234',
                'email' => 'phucntpc08600@@gmail.com',
                'name' => 'Nguyễn Trọng Phúc',
                'phone' => '0989650276',
                'avatar' => 'Deptraiqua.pgn',
                'status' => 1
            ],
            [
                'id' => 2,
                'username' => 'MinhTeo123',
                'password' => 'minhdepzai456',
                'email' => 'minhnguyen@gmail.com',
                'name' => 'Nguyễn Văn Minh',
                'phone' => '0912345678',
                'avatar' => 'MinhPro.pgn',
                'status' => 1
            ],
            [
                'id' => 3,
                'username' => 'LanAnh99',
                'password' => 'lanxinhgai789',
                'email' => 'lananh@yahoo.com',
                'name' => 'Trần Thị Lan Anh',
                'phone' => '0987654321',
                'avatar' => 'LanXinh.pgn',
                'status' => 0
            ],
            [
                'id' => 4,
                'username' => 'DucVIP',
                'password' => 'ductop1top',
                'email' => 'ducpro@gmail.com',
                'name' => 'Lê Văn Đức',
                'phone' => '0978123456',
                'avatar' => 'DucVIP.pgn',
                'status' => 1
            ],
            [
                'id' => 5,
                'username' => 'HoaCoMay',
                'password' => 'hoaxinhxan123',
                'email' => 'hoanguyen@gmail.com',
                'name' => 'Nguyễn Thị Hoa',
                'phone' => '0965432198',
                'avatar' => 'HoaXinh.pgn',
                'status' => 1
            ],
            [
                'id' => 6,
                'username' => 'TuanAnhPro',
                'password' => 'tuananhdeptrai',
                'email' => 'tuananh@outlook.com',
                'name' => 'Phạm Tuấn Anh',
                'phone' => '0932165498',
                'avatar' => 'TuanPro.pgn',
                'status' => 0
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
    public static function show()
    {
    }


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
            header('location: /admin/user');
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
