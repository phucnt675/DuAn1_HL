<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\CheckOut\Index;
use App\Models\CartModel;

class CheckOutController
{
    // hiển thị danh sách
    public static function index(): void
    {
        $user_id  = $_SESSION['users']['id'];
        $CartModel = new CartModel();
        $data = $CartModel->getCartByUser($user_id);
        $id = $_SESSION['users']['id'];
      
        Header::render();
        Index::render($data);
        Footer::render();
    }
}
