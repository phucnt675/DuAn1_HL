<?php

namespace App\Controllers\Admin;

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
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
            'quantity' => $_POST['quantity'],
        ];
    
        // Kiểm tra và upload hình ảnh nếu có
        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }
    
        // Tạo sản phẩm và lấy ID của sản phẩm mới
        $product_id = $product->createProduct($data);  // Giả sử createProduct trả về product_id
        if ($product_id) {
            header('location: /admin/products');
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
            'category' => $data_category
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
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
            'quantity' => $_POST['quantity'],

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


}