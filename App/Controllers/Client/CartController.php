<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Helpers\AuthHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Cart\Index;
use App\Models\CartModel;
use App\Models\Product;

use Exception;
class CartController
{
   
    public static function index()
    {
        $user_id  = $_SESSION['users']['id'];    
        if (!$user_id) {
            NotificationHelper::error('auth', 'Bạn cần đăng nhập để xem giỏ hàng');
            header('location: /login');
            exit;
        }
        
        $cartModel = new CartModel();
        $data  = $cartModel->getCartByUser($user_id);

       
        if ($data ) {
            foreach ($data  as &$item) {
                $item['total_price'] = $item['product_price'] * $item['quantity']; 
            }
        }

      
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }

    public static function add()
{
    $user_id  = $_SESSION['users']['id'];
    if (!$user_id) {
        NotificationHelper::error('auth', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng');
        header('location: /login');
        exit;
    }

   

    $product_skus_id = $_POST['productSku'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1; 

   
    $cartModel = new CartModel();
    $success = $cartModel->addProductToCart($user_id, $product_skus_id, $quantity);

    if ($success) {
        NotificationHelper::success('Giỏ hàng', 'Thêm sản phẩm vào giỏ hàng thành công');
        header('Location: /cart');
    } else {
        NotificationHelper::error('Giỏ hàng', 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng');
        header('Location: /products/' . $product_skus_id);
    }
    exit;
}

public function updateCart()
{
    $user_id  = $_SESSION['users']['id'];
    if (!$user_id) {
        NotificationHelper::error('auth', 'Bạn cần đăng nhập để cập nhật giỏ hàng');
        header('location: /login');
        exit;
    }

    // Lấy dữ liệu từ POST
    $quantities = isset($_POST['quantity']) ? $_POST['quantity'] : []; // Mảng quantity

    // Xác minh dữ liệu hợp lệ
    foreach ($quantities as $cart_id => $quantity) {
        if (!is_numeric($quantity) || $quantity <= 0) {
            NotificationHelper::error('Giỏ hàng', 'Dữ liệu không hợp lệ cho sản phẩm ID: ' . $cart_id);
            header('Location: /cart');
            exit;
        }

        // Cập nhật từng sản phẩm trong giỏ hàng
        $cartModel = new CartModel();
        $cartModel->updateCart($cart_id, ['quantity' => $quantity]);
    }

    NotificationHelper::success('Giỏ hàng', 'Cập nhật thành công');
    header('Location: /cart');
    exit();
}
public function deleteOneCart() {
    $CartModel = new CartModel();
    $id = $_POST['id'];
    $result = $CartModel->deleteCart($id);
    if($result) {
        NotificationHelper::success('Đã xóa sản phẩm', 'Đã xóa sản phẩm ra khỏi giỏ hàng');
        header('location: /cart');
        exit();
    } 
    NotificationHelper::error('Xóa sản phẩm thất bại', 'Không thể xóa sản phẩm ra khỏi giỏ hàng');
    header('location: /cart');
    exit();
}








    


    
   



    
}
