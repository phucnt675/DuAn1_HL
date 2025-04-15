<?php
namespace App\Helpers;
use App\Models\User;
class AuthHelper
{
    public static function register($data)
    {
        $user = new User();
        // bắt lỗi sự tồn tại của username
        $is_admin = $user->getOneUserByUsername(username: $data['username']);

        if ($is_admin) {
            NotificationHelper::error(key: 'admin_register', message: 'Tên đăng nhập đã tồn tại');
            return false;

        }
        $result = $user->createUser($data);
        if ($result) {
            NotificationHelper::success(key: 'register', message: 'Đăng ký thành công');
            return true;
        }
        NotificationHelper::success(key: 'register', message: 'Đăng ký thất bại');
        return false;
    }


    public static function login($data)
    {
        // Kiểm tra tên đăng nhập hoặc email
        $user = new User();
        // Kiểm tra nếu là email hay username
        $is_email = filter_var($data['username'], FILTER_VALIDATE_EMAIL);
        
        // Nếu là email, tìm người dùng theo email, nếu không tìm theo username
        if ($is_email) {
            $is_exist = $user->getOneUserByEmail($data['username']);
        } else {
            $is_exist = $user->getOneUserByUsername($data['username']);
        }
    
        // Nếu không tìm thấy người dùng, trả về thông báo lỗi
        if (!$is_exist) {
            NotificationHelper::error('username', 'Tên đăng nhập hoặc email không tồn tại');
            return false;
        }
    
        // Kiểm tra mật khẩu có chính xác không
        if (!password_verify($data['password'], $is_exist['password'])) {
            NotificationHelper::error('password', 'Mật khẩu không chính xác');
            return false;
        }
    
        // Kiểm tra tài khoản bị khóa hay không
        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đã bị khóa');
            return false;
        }
    
        // Lưu session hoặc cookie nếu người dùng chọn nhớ tài khoản
        if ($data['remember']) {
            // Lưu cookie và session
            self::updateCookie($is_exist['id']);
        } else {
            // Lưu chỉ session
            self::updateSession($is_exist['id']);
        }
    
        NotificationHelper::success('login', 'Đăng nhập thành công');
        return true;
    }
    

    public static function updateCookie(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            //chuyển array thành string json để lưu vào cookie user
            $user_data = json_encode($result);

            //Lưu cookie 
            setcookie('users', $user_data, time() + 3600 * 24 * 30 * 12, '/');

            $_SESSION['users'] = $result;
        }
        return true;
    }

    public static function updateSession(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {


            $_SESSION['users'] = $result;
        }
        return true;
    }

    
    public static function checkLogin(): bool
{
    // Kiểm tra session
    if (isset($_SESSION['users'])) {
        return isset($_SESSION['users']['id']); // Trả về true nếu ID tồn tại
    }

    return false; // Không đăng nhập
}


    



    public static function logout()
{
    // Xóa session
    unset($_SESSION['users']);
    
    // Xóa cookie
    if (isset($_COOKIE['users'])) {
        setcookie('users', '', time() - 3600, '/');
    }

    // Thông báo đăng xuất thành công
    NotificationHelper::success('logout', 'Đăng xuất thành công');
}


    public static function edit($id): bool
    {
        if (!self::checkLogin()) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập để xem thông tin');
            return false;
        }

        $data = $_SESSION['users'];
        $user_id = $data['id'];

        if (isset($_COOKIE['users'])) {
            self::updateCookie($user_id);
        }

        self::updateSession($user_id);

        if ($user_id != $id) {
            NotificationHelper::error('users', 'Không có quyền xem thông tin tài khoản này');
            return false;
        }
        return true;
    }

    public static function update($id, $data)
    {
        $user = new User();
        $result = $user->updateUser($id, $data);

        if (!$result) {
            NotificationHelper::error('update_users', 'Cập nhật thông tin tài khoản thất bại');
            return false;
        }

        if ($_SESSION['users']) {
            self::updateSession($id);
        }

        if ($_COOKIE['users']) {
            self::updateCookie($id);
        }

        NotificationHelper::success('update_users', 'cập nhật thông tin tài khoản thành công');
        return true;
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
        $result = $user->updateUserByUsernameAndEmail($data);

        return $result;
    }


    public static function changePassword($data)
    {
        $user = new User();
        $result = $user->changeUserByUsernameAndEmail($data);

        return $result;
    }
    


    // public static function middleware()
    // {
    //     // var_dump($_SERVER['REQUEST_URI']);
    //     $admin = explode('/admin', $_SERVER['REQUEST_URI']);
    //     // var_dump($admin);
    //     $admin = $admin[1];

    //     if ($admin == 'admin') {
    //         // if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    //         //     NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
    //         //     header('location: /login');
    //         //     exit;
    //         // }

    //             if (!isset($_SESSION['users'])) {
    //                 NotificationHelper::error('admin', 'Vui lòng đăng nhập');
    //                 header('location: /admin/login');
    //                 exit;
    //             }

    //             if ($_SESSION['users']['role'] != 1) {
    //                 NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
    //                 header('location: /admin/login');
    //                 exit;
    //             }
    //     }
        
    // }

    public static function middleware()
{
    // Lấy đường dẫn hiện tại
    $requestUri = $_SERVER['REQUEST_URI'];

    // Kiểm tra nếu đường dẫn chính xác là "/admin"
    if (trim($requestUri) === '/admin') {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!isset($_SESSION['users'])) {
            NotificationHelper::error('admin', 'Vui lòng đăng nhập');
            header('location: /admin/login');
            exit;
        }

        // Kiểm tra quyền của người dùng
        if ($_SESSION['users']['role'] != 1) {
            NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
            header('location: /admin/login');
            exit;
        }
    }
}

    
}
