<?php
namespace App\Validations;

use App\Helpers\NotificationHelper;

class UserValidation
{
  public static function create(): bool
  {
    $is_action = true;

    // Tên đăng nhập
    if (!isset($_POST['username']) || $_POST['username'] === '') {
      NotificationHelper::error('username', 'Vui lòng không để trống tên đăng nhập');
      
      $is_action = false;
    }
    // họ và tên
    if (!isset($_POST['name']) || $_POST['name'] === '') {
      NotificationHelper::error('name', 'Vui lòng không được để trống họ và tên');
      $is_action = false;
    }
    // Email
    if (!isset($_POST['email']) || $_POST['email'] === '') {
      //echo "<div class='alert alert-danger'>Vui lòng nhập email.</div>";
      NotificationHelper::error('email', 'Vui lòng không được để trống Email');
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
    if (!isset($_POST['phone']) || $_POST['phone'] === '') {
      NotificationHelper::error('phone', 'Vui lòng không để trống số điện thoại');
      $is_action = false;
    } else {
      // Kiểm tra đinh dạng số điện thoại
      $phonePattern = "/^\+?[0-9]{1,15}$/";
      if (!preg_match($phonePattern, $_POST['phone'])) {
        NotificationHelper::error('phone', 'Số điện thoại không hợp lệ');
        $is_action = false;
      }
    }
    // Mật khẩu
    if (!isset($_POST['password']) || $_POST['password'] === '') {
      NotificationHelper::error('password', 'Vui lòng không để trống mật khẩu');
      $is_action = false;
    } else {
      // Kiểm tra độ dài
      if (strlen($_POST['password']) < 3) {
        NotificationHelper::error('password', 'Vui lòng đặt mật khẩu phải từ 3 ký tự trở lên');
        $is_action = false;
      }
    }
    // Nhập lại mật khẩu
    if (!isset($_POST['confirm_password']) || $_POST['confirm_password'] === '') {
      NotificationHelper::error('confirm_password', 'Vui lòng không được để trống nhập lại mật khẩu');
      $is_action = false;
    } else {
      if ($_POST['password'] != $_POST['confirm_password']) {
        NotificationHelper::error('confirm_password', 'Mật khẩu và mật khẩu nhập lại phải giống nhau');
        $is_action = false;
      }
    }


    // trạng thái
    if (!isset($_POST['status']) || $_POST['status'] === '') {
      NotificationHelper::error('status', 'Không được để trống trạng thái');
      $is_action = false;
    }



    return $is_action;

  }


  public static function edit(): bool
  {
      $is_valid = true;

      // mật khẩu
      if (isset($_POST['password']) && $_POST['password'] !== '') {
          if (strlen($_POST['password']) < 3) {
              NotificationHelper::error('password', 'Mật khẩu phải lớn hơn 3 ký tự');
              $is_valid = false;
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

      //họ và tên
      if (!isset($_POST['name']) || $_POST['name'] === '') {
          NotificationHelper::error('name', 'không để trống họ và tên');
          $is_valid = false;
      }

      //trạng thái
      if (!isset($_POST['status']) || $_POST['status'] === '') {
          NotificationHelper::error('name', 'không để trống trạng thái');
          $is_valid = false;
      }



      return $is_valid;
  }
  
  public static function uploadAvartar()
  {
      return Authvalidation::uploadAvatar();
  }





}