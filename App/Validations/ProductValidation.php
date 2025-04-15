<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductValidation
{
  public static function create(): bool
  {
    $is_valid = true;
    // Tên sản phẩm
    if (!isset($_POST['name']) || $_POST['name'] === '') {
      NotificationHelper::error('name', 'Không được để trống tên sản phẩm');
      $is_valid = false;
    }
    // giá tiền
    if (!isset($_POST['price']) || $_POST['price'] === '') {
      NotificationHelper::error('price', 'Không được để trống giá tiền');
      $is_valid = false;
    } elseif ((int) $_POST['price'] <= 0) {
      NotificationHelper::error('price', 'Giá tiền phải lớn hơn 0');
      $is_valid = false;
    }
    if (!isset($_POST['quantity']) || $_POST['quantity'] === '') {
      NotificationHelper::error('quantity', 'Không được để trống tên số lượng');
      $is_valid = false;
    }
    // id loại sản phẩm
    if (!isset($_POST['category_id']) || $_POST['category_id'] === '') {
      NotificationHelper::error('category_id', 'Không được để trống tên loại');
      $is_valid = false;
    }
    // Trạng thái
    if (!isset($_POST['status']) || $_POST['status'] === '') {
      NotificationHelper::error('status', 'Không được để trống trạng thái');
      $is_valid = false;
    }


    return $is_valid;
  }

  public static function edit(): bool
  {
    return self::create();
  }
  // upload ảnh
  public static function uploadImage()
  {
    if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
      return false;
    }
    //nơi lưu trữ hình ảnh trong sourcode
    $target_dir = 'public/uploads/products/';

    // kiểm tra loại file uoload có hợp lệ không
    $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));
    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
      NotificationHelper::error('type_upload', 'Chỉ cho phép upload file JPG, JPEG, PNG, GIF');
      return false;
    }

    // thay đổi tên file thành dạng năm tháng ngày giờ phút giây
    $nameImage = date('YmdHmi') . '.' . $imageFileType;

    // đường dẫn đây đủ để di chuyển file
    $target_file = $target_dir . $nameImage;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {

      NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục đã lưu trữ');
      return false;
    }
    return $nameImage;
  }
}
