<?php

namespace App\Helpers;

use App\Models\User;


class AuthHelper{

    public static function register($data){

        $user = new User();
        // bắt tồn tại username

        $is_exits = $user->getOneUserByUsername($data['username']);

        if($is_exits){
            NotificationHelper::error('exits_register','Tên đăng nhập đã tồn tại');
            return false;
        }

        $result = $user->createUser($data);

        if ($result){
            NotificationHelper::success('register','Đăng ký thành công');
            return true;
        }
        NotificationHelper::error('register','Đăng ký thất bại');
        return false;
    }

    public static function login($data)
    {
        // kiểm tra có tồn tại username trong database hay không => nếu không 'thông báo , trả về false
        $user = new User();
        // bắt lỗi tồn tại username

        $is_exist = $user->getOneUserByUsername($data['username']);

        if (!$is_exist) {
            NotificationHelper::error('rexist_username', 'Tên đăng nhập không tồn tại');
            return false;
        }
        // nếu có kiểm tra password có trùng không => nếu không: thông báo, trả về false
        // password người dùng nhập: $data['password']
        // password trong database: $is_exist->password

        if (!password_verify($data['password'], $is_exist['password'])) {
            NotificationHelper::error('password', 'Mật khẩu không đúng');
            return false;
        }

        // nếu có kiểm tra status == 0 => thông báo, trả về false
        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đã bị khoá');
            return false;
        }

        // nếu có kiểm tra remember => lưu session/cookie => thông báo thành công trả về true

        if ($data['remember']) {
            // lưu session/cookie
            self::updateCookie($is_exist['id']);
        } else {
            // ghi session
            self::updateSession($is_exist['id']);
        }

        NotificationHelper::success('login', 'Đăng nhập thành công');

        return true;
    }

    private static function updateCookie(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);
        if ($result) {
            // chuyển array thành string json lưu vào trong cookie user
            $user_data = json_encode($result);

            // lưu cookie
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');

            $_SESSION['user'] = $result;
        }
    }

    private static function updateSession(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);
        if ($result) {

            // lưu session
            $_SESSION['user'] = $result;
        }
    }

    public static function forgotPassword($data)
    {
        $user = new User();

        $result = $user->getOneUserByUsername($data['username']);
        return $result;
    }

    public static function resetPassword($data)
    {
        $user = new User();
        $resulf = $user->updateUserByUsernameAndEmail($data);
        return $resulf;
    }
}