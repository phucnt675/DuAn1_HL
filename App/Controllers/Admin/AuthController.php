<?php

namespace App\Controllers\Admin;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\AuthValidation;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Layouts\HeaderLogin;
use App\Views\Admin\Pages\Auth\Login;
use App\Views\Admin\Pages\Auth\User_profile;

class AuthController
{
    public static function profile($id)
    {
        $user = new User();
        $data = $user->getOneUser($id);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        User_profile::render($data);
        Footer::render();
    }


    public static function loginAdmin()
    {
      HeaderLogin::render();
      Notification::render();
      NotificationHelper::unset();
      Login::render();
    }


    public static function loginActionAdmin()
  {
    //bắt lỗi 
    $is_valid = AuthValidation::login();


    if (!$is_valid) {
      NotificationHelper::error('login', 'Đăng nhập thất bại');
      header('location: /admin/login');
      exit;
    }

    $data = [
      'email' => $_POST['email'],
      'password' => $_POST['password'],
      'remember' => isset($_POST['remember'])
    ];

    $result = AuthHelper::login($data);

    if ($result) {
      NotificationHelper::success('login', 'Đăng nhập thành công');
      header('location: /admin');
      // echo 'thanhnee';
    } else {
      NotificationHelper::error('login', 'Đăng nhập thất bại');
      header('location: /admin/login');
    }
  }

    public static function logout()
    {
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('location: /');
    }
}
