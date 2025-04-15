<?php
namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\ResetPassword;
use App\Views\Client\Pages\Auth\User_profile;
use App\Models\Category;

class AuthController
{
  // hiển thị giao diện form đăng ký 
  public static function register(): void
  {
    $category = new Category();
    $categories = $category->getAllCategoryByStatus();
    $data = [

        'categories' => $categories
    ];

    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Register::render($data);
    Footer::render();
  }

  // thực hiện đăng kí
  public static function registerAction()
  {
    // bắt lỗi dữ liệu 
    $is_action = AuthValidation::register();
    if (!$is_action) {
      // hiển thị thông báo lỗi
      NotificationHelper::error(key: 'register_action', message: 'Đăng ký không thành công');
      //Chuyển hướng về trang đăng ký
      header('location:/register');
      exit;
    }
    // Lấy dữ liệu người dùng nhập
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];

    $data = [
      'username' => $username,
      'password' => $hash_password,
      'email' => $email,
      'name' => $name,
      'phone_number' => $phone_number
    ];

    // Thêm người dùng vào cơ sở dữ liệu
    $result = AuthHelper::register($data);
    if ($result) {
      // Chuyển hướng về trang đăng nhập nếu đăng kí thành công
      header('location:/login');
    } else {
      header('location:/register');
    }
  }


  // hiện thị giao diện form đăng nhập
  public static function login()
  {
    $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $data = [

            'categories' => $categories
        ];
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Login::render($data);
    Footer::render();
  }

  // thực hiện đăng nhập
  public static function loginAction()
  {
      // Đảm bảo session hoặc cookie cũ được xóa trước khi đăng nhập tài khoản mới
      unset($_SESSION['users']);
      setcookie('users', '', time() - 3600, '/');
  
      // Tiến hành đăng nhập
      $data = [
          'username' => $_POST['username'],
          'password' => $_POST['password'],
          'remember' => isset($_POST['remember'])
      ];
  
      $result = AuthHelper::login($data);
  
      if ($result) {
          NotificationHelper::success('login', 'Đăng nhập thành công');
          header('location: /');
      } else {
          NotificationHelper::error('login', 'Đăng nhập thất bại');
          header('location: /login');
      }
  }
  

  public static function checkLogin():bool
  {
    if (isset($_COOKIE['users'])) {
      $user = $_COOKIE['users'];
      $user_data = json_decode($user);
      $_SESSION['users'] = (array) $user_data;
      return true;
    }
    if (isset($_SESSION['users'])) {
      return true;
    }
    return false;
  }

  public static function logout()
  {
    AuthHelper::logout();
    NotificationHelper::success('logout', 'Đăng xuất thành công');
    header('location: /');
  }


  public static function edit_profile($id)
    {
      $category = new Category();
      $categories = $category->getAllCategoryByStatus();
      $data = [
  
          'categories' => $categories
      ];
    $user = new User();
    $data = $user->getOneUser($id);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    User_profile::render($data);
    Footer::render();
  }

  public static function edit($id)
  {
    $result = AuthHelper::edit($id);

    if (!$result) {
      if (isset($_SESSION['error']['login'])) {
        header('location: /login');
        exit;
      }
      if (isset($_SESSION['error']['user_id'])) {

        $data = $_SESSION['user'];
        $user_id = $data['id'];
        header("location: /users/edit/$user_id");
        exit;
      }
    }
    $category = new Category();
    $categories = $category->getAllCategoryByStatus();
    $data = [

        'categories' => $categories
    ];
    $user = new User();

    $data = $user->getOneUser($id);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    //giao diện thông tin user
    Edit::render($data);
    // var_dump($data);

    Footer::render();
  }



  public static function update($id)
  {
    // $is_valid = Authvalidation::edit();

    // if (!$is_valid) {
    //     NotificationHelper::error('update_user', 'Cập nhật thông tin tài khoản thất bại');
    //     header("location: /users/$id");
    //     exit;
    // }

    $data = [
      'email' => $_POST['email'],
      'name' => $_POST['name'],
    ];

    //kiểm tra có uploads hình ảnh không. nếu có kiểm tra xem có hợp lệ không
    $is_upload = Authvalidation::uploadAvatar();
    if ($is_upload) {
      $data['avatar'] = $is_upload;
    }

    //gọi helper để update
    $result = AuthHelper::update($id, $data);
    //kiểm tra kết quả trả về và chuyển hướng
    header("location: /users_profile/$id");
  }

  //hiển thị giao diện form lấy lại mật khẩu
  public static function forgotPassword()
  {
    $category = new Category();
    $categories = $category->getAllCategoryByStatus();
    $data = [

        'categories' => $categories
    ];
    Header::render();
    Notification::render();
    NotificationHelper::unset();
     ForgotPassword::render($data);
    Footer::render();
  }


  // thực hiện lấy lại mật khẩu
  public static function forgotPasswordAction()
  {
    //validation
     $is_valid = Authvalidation::forgotPassword();

     if (!$is_valid) {
       NotificationHelper::error('forgot_password', 'Lấy lại mật khẩu thất bại');
       header('location: /forgot-password');
       exit;
     }

    $username = $_POST['username'];
    $email = $_POST['email'];

    $data = [
      'username' => $username
    ];

    //authHelper
    $result = AuthHelper::forgotPassword($data);

    if (!$result) {
      NotificationHelper::error('username_exist', 'Không tồn tại tài khoản này');
      header('location: /forgot-password');
      exit;
    }

    if ($result['email'] != $email) {
      NotificationHelper::error('email_exist', 'Email không đúng');
      header('location: /forgot-password');
      exit;
    }


    $_SESSION['reset_password'] = [
      'username' => $username,
      'email' => $email
    ];

    header('location: /reset-password');

    // echo 'Thanh cong';
  }


  //hiển thị giao diện form đặt lại mật khẩu
  public static function resetPassword()
  {
    if (!isset($_SESSION['reset_password'])) {
      NotificationHelper::error('reset_password', 'Vui lòng nhập đầy đủ thông tin của form này');
      header('location: /forgot-password');
      exit;
    }
    $category = new Category();
    $categories = $category->getAllCategoryByStatus();
    $data = [

        'categories' => $categories
    ];
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    ResetPassword::render($data);
    Footer::render();
  }

  public static function resetPasswordAction()
  {
    //validation
     $is_valid=Authvalidation::resetPassword();

    if(!$is_valid){
        NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
        header('location: /reset-password');
        exit;
     }

    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $data = [
      'username' => $_SESSION['reset_password']['username'],
      'email' => $_SESSION['reset_password']['email'],
      'password' => $hash_password
    ];

    $result = AuthHelper::resetPassword($data);

    if ($result) {
      NotificationHelper::success('reset_password', 'Đặt lại mật khẩu thành công');
      unset($_SESSION['reset_password']);
      header('location: /login');
    } else {
      NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
      header('location: /reset-password');
    }

  }


  public static function changePassword()
  {

    Header::render();
    Notification::render();
    NotificationHelper::unset();
     ChangePassword::render();
    Footer::render();
  }

  public static function changePasswordAction()
  {
    // Xác thực
     $is_valid = Authvalidation::changePassword();

     if (!$is_valid) {
        NotificationHelper::error('change_password', 'Đặt lại mật khẩu thất bại');
        header('location: /change-password');
        exit;
     }

    // Lấy username và email từ session
    $username = $_SESSION['users']['username'];
    $email = $_SESSION['users']['email'];

    // Băm mật khẩu mới
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $data = [
      'username' => $username,
      'email' => $email,
      'password' => $hash_password
    ];

    $result = AuthHelper::changePassword($data);

    if ($result) {
      NotificationHelper::success('change_password', 'Đặt lại mật khẩu thành công');
      unset($_SESSION['change_password']);
      header('location: /');
    } else {
      NotificationHelper::error('change_password', 'Đặt lại mật khẩu thất bại');
      header('location: /change-password');
    }
  }

}

