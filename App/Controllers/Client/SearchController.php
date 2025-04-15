<?php

namespace App\Controllers\Client;

use App\Models\Product;
use App\Models\Category;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\index;

class SearchController 
{
    public static function search()
    {
        // Lấy từ khóa tìm kiếm từ URL
        $keyword = isset($_GET['search']) ? $_GET['search'] : '';  

        // Nhận số trang từ URL, nếu không có thì mặc định là trang 1
        $page = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
        $perPage = 10;  // Số sản phẩm mỗi trang
        $product = new Product();
        $category = new Category();
        // Lấy tất cả danh mục sản phẩm
        $data['categories'] = $category->getAllCategoryByStatus();

        // Lấy tất cả sản phẩm theo từ khóa tìm kiếm (không phân trang)
        $data['products']['paginated'] = $product->search($keyword, $page, $perPage);  // Lấy tất cả sản phẩm
//var_dump($data);
        // Đếm tổng số sản phẩm để tính số trang
        $productCountTotal = $product->countTotal($keyword);  // Truyền từ khóa vào countTotal
        $data['countTotal'] = $productCountTotal;  // Truyền số lượng tổng sản phẩm vào
        $totalPages = ceil($productCountTotal / $perPage);

        // Lấy các sản phẩm đã phân trang
        $data['products']['all'] = $product->getProductsByPageAndFilters($page, $perPage, $keyword);  // Đưa vào key 'paginated'

        // Thêm thông tin phân trang vào dữ liệu
        $data['totalPages'] = $totalPages;
        $data['currentPage'] = $page;
        $data['keyword'] = $keyword;
        
        // Các sản phẩm theo các điều kiện khác (New, Sale)
        $data['getAllNew'] = $product->getAllProductNew();
        $data['getAllSale'] = $product->getAllProductSale();
    
        // Render các view với dữ liệu
        Header::render($data);
        index::render($data);
        Footer::render();
    }
}
