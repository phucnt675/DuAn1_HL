<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuthValidation
{
  // bắt lỗi form đăng ký
  public static function register(): bool
  {
    $is_action = true;
    // Tên đăng nhập
    if (!isset($_POST['username']) || $_POST['username'] === '') {
      NotificationHelper::error('username', 'Vui lòng không để trống tên đăng nhập');
      $is_action = false;
    }
    if (!isset($_POST['name']) || $_POST['name'] === '') {
      NotificationHelper::error('name', 'Vui lòng không được để trống họ và tên');
      $is_action = false;
    }
    // email
    if (!isset($_POST['email']) || $_POST['email'] === '') {
      NotificationHelper::error('email', 'Vui lòng không được để trống email');
      //echo "<div class='alert alert-danger'>Vui lòng nhập email.</div>";
      $is_action = false;
    } else {
      // Kiểm tra định dạng email
      $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
      if (!preg_match($emailPattern, $_POST['email'])) {
        NotificationHelper::error('email', 'Email không hợp lệ');
        $is_action = false;
      }
    }
    // Số điện thoại
    if (!isset($_POST['phone_number']) || $_POST['phone_number'] === '') {
      NotificationHelper::error('phone', 'Vui lòng không được để trống số điện thoại');
      $is_action = false;
    } else {
      // Kiểm tra định dạng số điện thoại
      $phonePattern = "/^(09|03|07|08|05)+([0-9]{8})$/";
      if (!preg_match($phonePattern, $_POST['phone_number'])) {
        NotificationHelper::error('phone_number', 'Số điện thoại không hợp lệ');
        $is_action = false;
      }
    }

    // Mật khẩu
    if (!isset($_POST['password']) || $_POST['password'] === '') {
      NotificationHelper::error('password', 'Vui lòng không được để trống mật khẩu');
      $is_action = false;
    } else {
      // Kiểm tra độ dài
      if (strlen($_POST['password']) < 3) {
        NotificationHelper::error('password', 'Mật khẩu phải từ 3 ký tự');
        $is_action = false;
      }
    }
    // Nhập lại mật khẩu
    if (!isset($_POST['confirm_password']) || $_POST['confirm_password'] === '') {
      NotificationHelper::error('confirm_password', 'Vui lòng không để trống nhập lại mật khẩu');
      $is_action = false;
    } else {
      if ($_POST['password'] != $_POST['confirm_password']) {
        NotificationHelper::error('confirm_password', 'Mật khẩu và mật khẩu nhập lại phải giống nhau');
        $is_action = false;
      }
    }
    return $is_action;
  }

  //bắt lỗi form đăng nhập
  public static function login(): bool
  {
    $is_valid = true;

    // tên đăng nhập
    if (!isset($_POST['username']) || $_POST['username'] === '') {
      NotificationHelper::error('username', 'không để trống tên đăng nhập và email');
      $is_valid = false;
    }

    // mật khẩu
    if (!isset($_POST['password']) || $_POST['password'] === '') {
      NotificationHelper::error('password', 'không để trống tên mật khẩu');
      $is_valid = false;
    }
    return $is_valid;
  }

  public static function edit(): bool
    {
        $is_valid = true;

        // email
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'không để trống email');
            $is_valid = false;
        } else {
            //    kiểm tra đúng dạng email
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
            }
        }

        //họ và tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'không để họ và tên');
            $is_valid = false;
        }

        return $is_valid;
    }
  public static function uploadAvatar()
  {
    if (!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
      return false;
    }
    //nơi lưu trữ hình ảnh trong sourcecode
    $target_dir = 'public/uploads/avatars/';
    //kiểm tra loại file upload có hợp lệ ko
    $imageFileType = strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));

    // echo  $imageFileType;
    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
      NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF');
      return false;
    }

    // thay đổi tên file thành dạng năm tháng ngày giờ phút giây
    $nameImage = date('YmdHmi') . '.' . $imageFileType;

    // đường dẫn đầy đủ để di chuyển file
    $target_file = $target_dir . $nameImage;

    // echo $target_file;

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
      NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục đã lưu trữ');
      return false;
    }

    return $nameImage;
  }
  public static function forgotPassword(): bool
  {
      $is_valid = true;

      // tên đăng nhập
      if (!isset($_POST['username']) || $_POST['username'] === '') {
          NotificationHelper::error('username', 'không để trống tên đăng nhập');
          $is_valid = false;
      }

      // email
      if (!isset($_POST['email']) || $_POST['email'] === '') {
          NotificationHelper::error('email', 'không để trống email');
          $is_valid = false;
      } else {
          //    kiểm tra đúng dạng email
          $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
          if (!preg_match($emailPattern, $_POST['email'])) {
              NotificationHelper::error('email', 'Email không đúng định dạng');
          }
      }

      return $is_valid;
  }


  public static function resetPassword(): bool
  {
      $is_valid = true;

      // mật khẩu
      if (!isset($_POST['password']) || $_POST['password'] === '') {
          NotificationHelper::error('password', 'không để trống tên mật khẩu');
          $is_valid = false;
      } else {
          if (strlen($_POST['password']) < 3) {
              NotificationHelper::error('password', 'Mật khẩu phải lớn hơn 3 ký tự');
              $is_valid = false;
          }
      }

      // nhập lại mật khẩu
      if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
          NotificationHelper::error('re_password', 'không để trống tên mật khẩu');
          $is_valid = false;
      } else {
          // kiểm tra độ dài
          if ($_POST['password'] != $_POST['re_password']) {
              NotificationHelper::error('re_password', 'Trường mật khẩu và nhập lại mật khẩu phải giống nhau');
          }
      }


      return $is_valid;
  }

  public static function changePassword(): bool
  {
      $is_valid = true;

      // mật khẩu
      if (!isset($_POST['password']) || $_POST['password'] === '') {
          NotificationHelper::error('password', 'không để trống tên mật khẩu');
          $is_valid = false;
      } else {
          if (strlen($_POST['password']) < 3) {
              NotificationHelper::error('password', 'Mật khẩu phải lớn hơn 3 ký tự');
              $is_valid = false;
          }
      }

      // nhập lại mật khẩu
      if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
          NotificationHelper::error('re_password', 'không để trống tên mật khẩu');
          $is_valid = false;
      } else {
          // kiểm tra độ dài
          if ($_POST['password'] != $_POST['re_password']) {
              NotificationHelper::error('re_password', 'Trường mật khẩu và nhập lại mật khẩu phải giống nhau');
          }
      }


      return $is_valid;
  }
}
