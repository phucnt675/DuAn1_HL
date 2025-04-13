<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\UserValidation;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Pages\User\Create;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\User\Index;

class UserController
{
    // hiển thị danh sách
    public static function index()
    {
        $User = new User();
        $data = $User->getAllUser();
        // var_dump($data);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }

    // Hiển thị giao diện form thêm
    public static function create()
    {
        // var_dump($_SESSION);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị giao diện form thêm
        Create::render();
        Footer::render();
    }
    // Xử lý chức năng thêm
    public static function store()
    {
        // Validation các trường dữ liệu
        $is_valid = UserValidation::create();
        if (!$is_valid) {
            NotificationHelper::error('store','Thêm người dùng thất bại');
            header('location: /admin/users/create');
            exit();
        }
        $username = $_POST['username'];
        // $status = $_POST['status'];
        // Kiểm tra tên đăng nhập có tồn tại chưa => không được trùng tên đăng nhập
        $user = new User();
        $is_exist = $user->getOneUserByUserName($username);
        if ($is_exist) {
            NotificationHelper::error('store','Tên đăng nhập đã tồn tại');
            header('location: /admin/users/create');
            exit();
        }
        // echo 'oki';
        // Thực hiện thêm

        $data = [
            'username' => $username,
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'status' => $_POST['status'],
        ];
        $is_upload = UserValidation::uploadAvatar();
        if($is_upload){
            $data['avatar'] = $is_upload;
        }

        $result = $user->createuser($data);
        if ($result) {
            NotificationHelper::success('store','Thêm người dùng thành công');
            header('location: /admin/users/');
        } else {
            NotificationHelper::error('store','Thêm người dùng thất bại');
            header('location: /admin/users/create');
        }
    }

    // Hiển thị chi tiết

    // hiển thị giao diện form sửa

    public static function edit(int $id)
    {
        $User = new User();
        $data = $User->getOneUser($id);
        if (!$data) {
            NotificationHelper::error('edit','Không thể xem người dùng');
            header('location: /admin/users');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị giao diện form sửa
        Edit::render($data);
        Footer::render();
    }

    // Xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // Validation các trường dữ liệu
        $is_valid = UserValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update','Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
            exit();
        }
        $User = new User();

        // Thực hiện cập nhật

        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
           'status' => $_POST['status'],
        ];
        if($_POST['password'] !== '') {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        
        $is_upload = UserValidation::uploadAvatar();
        if($is_upload){
            $data['avatar'] = $is_upload;
        }
        $result = $User->updateUser($id, $data);
        if ($result) {
            NotificationHelper::success('update','Cập nhật người dùng thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('update','Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
        }
    }

    // Thực hiện xóa
    public static function delete(int $id)
    {
        $User = new User();
        $result = $User->deleteUser($id);
        
        // if (!$result) {
        //     NotificationHelper::error('delete','Không thể xóa người dùng');
        //     header('location: /admin/users');
        //     exit();
        // }
        // $result = $User->deleteUser($id);
        if ($result) {
            NotificationHelper::success('delete','Xóa người dùng thành công');
            // header('location: /admin/users');
        } else {
            NotificationHelper::error('delete','Xóa người dùng thất bại');
        }
        header('location: /admin/users');
    }
}