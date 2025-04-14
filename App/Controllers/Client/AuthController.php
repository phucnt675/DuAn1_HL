<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\ResetPassword;

class AuthController{

    public static function register()
    {
        // hiển thị Header
        Header::render();


        // hiển thị thông báo
        Notification::render();

        // hủy session thông báo
        NotificationHelper::unset();
        // hiển thị form đăng ký
        Register::render();
        // hiển thị footer
        Footer::render();
    }
    public static function registerAction()
    {
        //    bắt lỗi validate
        // Kiểm tra thỏa mãn không?
        // nếu có: tiếp tục chạy lệnh ở dưới
        // nếu không thỏa (lỗi): thông báo và chuyển về trang đăng ký

        $is_valid = AuthValidation::register();
     
        if (!$is_valid) {
            NotificationHelper::error('register_valid', 'Đăng ký thất bại, vui lòng nhập đủ thông tin');
            header('location: /register');
            exit();
        }

        // lấy dữ liệu người dùng nhập
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        
        

        // đưa dữ liệu vào mảng, lưu ý "key" trùng với tên cột trong database
        $data = [
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $hash_password,
            
            
        ];

        $result = AuthHelper::register($data);
        if ($result) {
            header('location: /');
        } else {
            header('location: /register');
        }
    }

    public static function login() {
        // hiển thị Header
        Header::render();
        // hiển thị thông báo
        Notification::render();
        // hủy session thông báo
        NotificationHelper::unset();
        // hiển thị form đăng nhập
        Login::render();
        // hiển thị footer
        Footer::render();
    }

    public static function loginAction() {
        // bắt lỗi
        $is_valid = AuthValidation::login();

        if (!$is_valid) {
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('location: /login');
            exit();
        }

        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'remember' => isset($_POST['member']),

        ];

        $result = AuthHelper::login($data);
        if ($result) {
            header('location: /');
        } else {
            header('location: /login');
        }
    }

    public static function resetPassword()
    {
        // Kiểm tra session reset_password đã tồn tại hay chưa
        if (!isset($_SESSION['reset_password'])) {
            NotificationHelper::error('reset_password', 'Vui lòng nhập đầy đủ thông tin cho form này');
            header('location: /forgot-password');
            exit();
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị form đặt lại mật khẩu
        ResetPassword::render();
        Footer::render();
    }

    public static function resetPasswordAction()
    {
        // Validation
        $is_valid = AuthValidation::resetPassword();

        if (!$is_valid) {
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
            exit();
        }

        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $_SESSION['reset_password']['username'],
            'email' => $_SESSION['reset_password']['email'],
            'password' => $hash_password,
        ];
        $result = AuthHelper::resetPassword($data);
        if ($result) {
            NotificationHelper::success('reset_password', 'Đặt lại mật khẩu thành công');
            unset($_SESSION['reset_password']);
            header('location: /login');
        }else{
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
        }
    }

        // Hiển thị giao diện form lấy lại mật khẩu
        public static function forgotPassword()
        {
            Header::render();
            Notification::render();
            NotificationHelper::unset();
            // Hiển thị form đăng nhập
            ForgotPassword::render();
            Footer::render();
        }
    
        // Thực hiện chức năng lấy lại mật khẩu
        public static function forgotPasswordAction()
        {
            // Validation
            $is_valid = AuthValidation::forgotPassword();
            if (!$is_valid) {
                NotificationHelper::error('forgot_password', 'Gửi yêu cầu lấy lại mật khẩu thất bại');
                header('location: /forgot-password');
                exit();
            }
            $username = $_POST['username'];
            $email = $_POST['email'];
            $data = [
                'username' => $username,
                //'email' => $email,
            ];
            $result = AuthHelper::forgotPassword($data);
            if (!$result) {
                NotificationHelper::error('username_exist', 'Không tồn tại tài khoản này');
                header('location: /forgot-password');
                exit();
            }
    
            if ($result['email' != $email]) {
                NotificationHelper::error('email_exist', 'Email không khớp với tài khoản này');
                header('location: /forgot-password');
                exit();
            }
    
            $_SESSION['reset_password'] = ['username' => $username, 'email' => $email];
            header('location: /reset-password');
            // echo thành công
        }
}