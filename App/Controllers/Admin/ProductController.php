<?php

namespace App\Controllers\Admin;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSku;
use App\Validations\ProductValidation;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;
use App\Views\Admin\Pages\Product\Index;
use App\Views\Admin\Pages\Product\Search;




class ProductController
{
    // Hiển thị danh sách

    public static function index()
    {

        $is_valid = AuthHelper::checkLogin();


        if (!$is_valid) {
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('location: /admin/login');
            exit;
        }

        $products = new Product();

        // Lấy tất cả sản phẩm và danh mục
        $data = $products->getAllProductJoinCategory();

        // Duyệt qua từng sản phẩm và lấy các biến thể
        // Duyệt qua từng sản phẩm và lấy các biến thể

        foreach ($data as &$product) {
            error_log("Lấy biến thể cho sản phẩm ID: {$product['id']}");
            $product['variants'] = $products->getProductVariants($product['id']);
            //var_dump($product['variants']); // Kiểm tra dữ liệu trả về từ phương thức
        }
        //var_dump($product);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
    // hiển thị giao diện form thêm
    public static function create()
    {
        $category = new Category();
        $data = $category->getAllCategory();
        //var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Create::render($data);
        Footer::render();
    }

    // xử lý chức năng thêm
    public static function store()
    {
        // Validation các trường dữ liệu
        $is_valid = ProductValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }

        $name = $_POST['name'];

        // Kiểm tra tên sản phẩm có tồn tại chưa => không được trùng tên
        $product = new Product();
        $is_exist = $product->getOneProductByName($name);
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên sản phẩm đã tồn tại');
            header('location: /admin/products/create');
            exit;
        }

        // Thực hiện thêm sản phẩm
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'is_featured' => $_POST['is_featured'],
            'description' => $_POST['description'],
            'short_description' => $_POST['short_description'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
        ];

        // Kiểm tra và upload hình ảnh nếu có
        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }

        // Tạo sản phẩm và lấy ID của sản phẩm mới
        $product_id = $product->createProduct($data);  // Giả sử createProduct trả về product_id

        if ($product_id) {
            // Nếu sản phẩm được tạo thành công, xử lý SKU (biến thể)
            if (isset($_POST['sku']) && !empty($_POST['sku'])) {
                // Xử lý từng SKU
                $skuData = [];
                foreach ($_POST['sku'] as $sku) {
                    // Lưu thông tin SKU vào mảng, gắn product_id vào SKU
                    $skuData[] = [
                        'sku' => $sku['sku'],
                        'price' => $sku['price'],
                        'discount_price' => $sku['discount_price'],
                        'quantity' => $sku['quantity'],
                        'images' => $sku['images'], // Đây là tên hình ảnh hoặc URL
                        'product_id' => $product_id, // Gắn product_id vào SKU
                        'options' => isset($sku['properties']) ? json_encode($sku['properties']) : null, // Nếu có thuộc tính
                        'values' => isset($sku['values']) ? json_encode($sku['values']) : null, // Nếu có giá trị thuộc tính
                        'materials' => isset($sku['materials']) ? json_encode($sku['materials']) : null, // Vật liệu
                        'material_values' => isset($sku['material_values']) ? json_encode($sku['material_values']) : null // Giá trị vật liệu
                    ];
                }

                // Lưu SKU vào cơ sở dữ liệu
                $productSkuModel = new ProductSku();
                foreach ($skuData as $sku) {
                    $productSkuModel->createSku($sku);
                }
            }

            // Thông báo thành công và chuyển hướng
            NotificationHelper::success('store', 'Thêm sản phẩm thành công');
            header('location: /admin/products');
            exit;
        } else {
            // Nếu có lỗi khi tạo sản phẩm
            NotificationHelper::error('store', 'Có lỗi khi thêm sản phẩm');
            header('location: /admin/products/create');
            exit;
        }
    }




    public static function edit(int $id)
    {

        $product = new Product();
        $data_product = $product->getOneProduct($id);

        $category = new Category();
        $data_category = $category->getAllCategory();

        if (!$data_product) {
            NotificationHelper::error('edit', 'Không thể xem được sản phẩm này');
            header('location: /admin/products');
            exit;
        }
        $data = [
            'product' => $data_product,
            'category' => $data_category,
            
        ];
        //echo'<pre>';
        //var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();


    }

    public static function update(int $id)
    {
        // vailidation các trường dữ liệu
        $is_valid = ProductValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }
        $name = $_POST['name'];


        // kiểm tra tên loại có tồn tại chưa=> kh được trùng tên
        $product = new Product();
        $is_exist = $product->getOneProductByName($name);

        if ($is_exist) {
            if ($is_exist['id'] != $id) {
                NotificationHelper::error('update', 'Tên sản phẩm đã tồn tại');
                header("location: /admin/products/$id");
                exit;

            }

        }
        //Thực hiện Cập nhật
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'is_featured' => $_POST['is_featured'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],

        ];

        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }


        $result = $product->updateProduct($id, $data);
        if ($result) {
            NotificationHelper::success('update', 'Cập nhật sản phẩm thành công');
            header('location: /admin/products');

        } else {
            NotificationHelper::error('update', 'Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
        }

    }
    // thực hiện xoá
    public static function delete(int $id)
    {
        $product = new Product();
        $result = $product->deleteProduct($id);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa sản phẩm thành công');

        } else {
            NotificationHelper::error('delete', 'Xóa sản phẩm thất bại');

        }
        header('location: /admin/products');
    }

    public static function search()
    {
        // var_dump($_GET);
        $product = new Product();
        $searchTerm = $_GET['search'] ?? ''; // Lấy từ khóa tìm kiếm từ URL
        $data = $product->searchProduct($searchTerm); // Gọi phương thức searchUsers thay vì search

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Search::render($data);
        Footer::render();
    }


}