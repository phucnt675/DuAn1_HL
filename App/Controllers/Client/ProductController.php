<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Helpers\ViewProductHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;


class ProductController
{
    // hiển thị danh sách
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByStatus();

        $productsnew = $product->getAllProductNew();
        $productsale = $product->getAllProductSale();
        $productcounttotal = $product->countTotal();

        // phân trang cho trang sản phẩm
        //  Lấy trang hiện tại (nếu page không hợp lệ thì trả về 1)
        $keyword = isset($_GET['search']) ? $_GET['search'] : '';  
        $page = isset($_GET['page']) && (int) $_GET['page'] > 0 ? (int) $_GET['page'] : 1;
        $perPage = 10;
        $productCountTotal = $product->countTotal($keyword);  

         // lấy vật liệu theo sản phẩm đc chọn từ url
        // Lấy các tham số từ URL
        $color = isset($_GET['color']) ? $_GET['color'] : null;
        $material = isset($_GET['material']) ? $_GET['material'] : null;
        //  Tính số trang, đảm bảo số trang tối thiểu là 1
        $totalPages = ceil($productCountTotal / $perPage);
        $paginatedProducts = $product->getProductsByPageAndFilters($page, $perPage, $color, $material, $keyword);
        // var_dump($page);
        $data = [
            'products' => [
                'all' => $products, // Tất cả sản phẩm
                'paginated' => $paginatedProducts // Các sản phẩm đã phân trang
            ],
            'categories' => $categories,
            'getAllNew' => $productsnew,
            'getAllSale' => $productsale,
            'countTotal' => $productcounttotal,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'keyword' => $keyword,
           

        ];
        // var_dump();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }


    public static function detail($id)
    {

        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $products = new Product();
        $products_detail = $products->getOneProductByStatus($id);
        // Lấy thông tin ảnh, màu, giá, vật liệu sản phẩm Biến thể của sản phẩm
        $productwithdetail = $products->getAllProductsWithDetails($id);

        if (!$products_detail) {
            NotificationHelper::error('products_detail', 'Không thể xem sản phẩm này');
            header('location:/products');
            exit;
        }
        // Lấy danh sách ảnh phụ sản phẩm
        $product_images = $products->getAllProductImages($id);
        
        // Lấy thông tin danh mục của sản phẩm hiện tại
        $category_id = $products_detail['category_id'];

        $comment = new Comment();
        $comments = $comment->get5CommentNewestByProductAndStatus($id);
        // Lấy sản phẩm liên quan dựa trên category_id
        $product_related = $products->getRelatedProducts($id, $category_id);
        $data = [
            'products' => $products_detail,
            'product_images' => $product_images,
            'product_related' => $product_related,
            'categories' => $categories,
            'productWithDetail' => $productwithdetail,
            'comment' => $comments,


        ];
        // loại bỏ các ảnh trùng lặp
        $unique_images = array_unique(array_column($product_images, 'image'));
        //lấy số lượt xem
        $view_result = ViewProductHelper::cookieView($id, $data['products']['view']);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Detail::render($data);
        Footer::render();
    }
    // lấy sản phẩm theo danh mục
    public static function getProductByCategory($id)
    {
        $products = new Product();

        $data['products'] = $products->getAllProductByCategoryAndStatus($id);
        $data['getAllNew'] = $products->getAllProductNew();
        $data['getAllSale'] = $products->getAllProductSale();
        $data['countTotal'] = $products->countTotal();

        // var_dump($test);
        $category = new Category();
        $data['categories'] = $category->getAllCategoryByStatus();
        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }







}
