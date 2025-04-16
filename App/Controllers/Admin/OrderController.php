<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Oder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Order\Create;
use App\Views\Admin\Pages\Order\Detail;
use App\Views\Admin\Pages\Order\ListOrders;

class OrderController
{


    // hiển thị danh sách
    public static function index()
    {
        $oder = new Order();
        $data = $oder->getAllOrderList();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ListOrders::render($data);
        Footer::render();
    }

    // hiển thị giao diện form sửa
    public static function detail($id)
    {
        $oder = new OrderDetail();
        $data = $oder->getOneOrder($id);
        // var_dump($data);
        Header::render();
        Detail::render($data);
        Footer::render();
    }

    // thực hiện xoá
    public static function delete(int $id)
    {
        $user = new Order();
        $result = $user->deleteOrder($id);

        if ($result) {
            NotificationHelper::success('delete', 'Xóa đơn hàng thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa đơn hàng  thất bại');
        }

        header('location: /admin/orders');
    }


    public static function create()
    {

        $order = new Order();
        $data = $order->getAllProductPayment();

        Header::render();
        Create::render($data);
        Footer::render();
    }

    public static function store()
    {
        $username = $_POST['username'];
        $user = new User();
        $is_exist = $user->getOneUserByUsername($username);

        if ($is_exist) {
            NotificationHelper::error('store', 'Không có tên người dùng');
            header('location: /admin/orders/create');
        }
    }

}
