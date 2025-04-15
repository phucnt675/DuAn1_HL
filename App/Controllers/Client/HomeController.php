<?php

namespace App\Controllers\Client;
use App\Models\Product;
use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Models\Category;
use App\Views\Client\Layouts\Header;

class HomeController
{
    // hiển thị danh sách
    public static function index(): void
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $data = [

            'categories' => $categories
        ];

        $products = new Product();
        // Kiểm tra sự tồn tại của tham số search
        $keyword = isset($_GET['search']) ? htmlspecialchars(trim($_GET['search'])) : '';

        $data['getAllOutstanding'] = $products->getAllProductOutstanding();
        $data['getAllNew'] = $products->getAllProductNew();
        $data['getAllHot'] = $products->getAllProductHot();
       // $data['products'] = $products->search($keyword);
        $data['keyword'] = $keyword;
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Home::render($data);
        Footer::render();
    }



}
