<?php
namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuthValidation{
    public static function register(): bool{ 
        $is_valid = true;

        if(isset($_POST['username']) || $_POST['username']===''){
            NotificationHelper::error('username','Không để trống tên đăng nhập');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function resetPassword(): bool
    {
        $is_valid = true;
       
        // Password
        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Vui lòng không để trống password');
            $is_valid = false;
        } else {
            // Kiểm tra độ dài
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Password phải nhập từ 3 ký tự');
                $is_valid = false;
            }
        }
        // Re_password
        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Vui lòng không để trống re_password');
            $is_valid = false;
        } else {
            if ($_POST['password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Password và Re_password phải giống nhau');
                $is_valid = false;
            }
        }
        
        return $is_valid;
    }

    public static function uploadAvatar()
    {
        if (!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            return false;
        }
        // Nơi lưu trữ hình ảnh trong sourcecode
        $target_dir = 'public/uploads/users/';
        // Kiểm tra loại file upload có hợp lệ không?
        $imageFileType = strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));

        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif' && $imageFileType != 'webp') {
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF, WEBP');
            return false;
        }
        // Thay đổi tên file theo dạng năm/tháng/ngày giờ/phút/giây
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        // Đường dẫn đủ để chuyển file
        $target_file = $target_dir . $nameImage;
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục đã lưu trữ');
            return false;
        }
        return $nameImage;
    }
}