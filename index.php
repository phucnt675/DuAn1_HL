<?php
session_start();
ini_set(option: 'display_errors', value: '1');
ini_set(option: 'display_startup_errors', value: '1');
error_reporting(error_level: E_ALL);
ini_set(option: 'log_errors', value: TRUE);
ini_set(option: 'error_log', value: './logs/php/php-errors.log');

use App\Helpers\AuthHelper;
use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(paths: __DIR__);
$dotenv->load();

require_once 'config.php';

AuthHelper::middleware();

// *** Client
Route::get(url: '/', controllerMethod: 'App\Controllers\Client\HomeController@index');
// sản phẩm
Route::get('/search', 'App\Controllers\Client\SearchController@search');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');
Route::get('/products/categories/{id}', 'App\Controllers\Client\ProductController@getProductByCategory');

// giỏ hàng
// Route để hiển thị giỏ hàng
Route::get('/cart', 'App\Controllers\Client\CartController@index');
// Route để xử lý thêm sản phẩm vào giỏ hàng (sử dụng POST)
Route::post('/cart/add', 'App\Controllers\Client\CartController@add');


Route::post('/cart/update', 'App\Controllers\Client\CartController@updateCart');

Route::post('/cart/delete', 'App\Controllers\Client\CartController@deleteOneCart');







// bài viết Blog
Route::get(url: '/blog', controllerMethod: 'App\Controllers\Client\BlogController@index');
// liên hệ
Route::get(url: '/contact', controllerMethod: 'App\Controllers\Client\ContactController@index');
// thanh toán 
Route::get(url: '/checkout', controllerMethod: 'App\Controllers\Client\CheckOutController@index');
// chi tiết bài viết
Route::get(url: '/blog_detail', controllerMethod: 'App\Controllers\Client\Blog_DetailController@index');
// hiện thị form đăng kí
Route::get(url: '/register', controllerMethod: 'App\Controllers\Client\AuthController@register');
// xử lí chức năng đăng kí
Route::post('/register', 'App\Controllers\Client\AuthController@registerAction');

// hiện thị form đăng nhập
Route::get('/login', 'App\Controllers\Client\AuthController@login');
// xử lí chức năng đăng nhập
Route::post('/login', 'App\Controllers\Client\AuthController@loginAction');
// xử lí đăng xuất
Route::get('/logout','App\Controllers\Client\AuthController@logout');

// Giao diện trang thông tin người dùng
Route::get('/users_profile/{id}','App\Controllers\Client\AuthController@edit_profile');
// Hiển thị form sửa người dùng của người dùng
Route::get('/users/{id}','App\Controllers\Client\AuthController@edit');
// xử lí chức năng sửa người dùng
Route::put('/users/{id}','App\Controllers\Client\AuthController@update');

// Quên mặt khẩu
Route::get('/forgot-password', 'App\Controllers\Client\AuthController@forgotPassword');
Route::post('/forgot-password', 'App\Controllers\Client\AuthController@forgotPasswordAction');
// Đặt lại mật khẩu
Route::get('/reset-password', 'App\Controllers\Client\AuthController@resetPassword');
Route::put('/reset-password', 'App\Controllers\Client\AuthController@resetPasswordAction');

Route::get('/change-password', 'App\Controllers\Client\AuthController@changePassword');
Route::put('/change-password', 'App\Controllers\Client\AuthController@changePasswordAction');










// *** Admin

Route::get(url: '/admin', controllerMethod: 'App\Controllers\Admin\HomeController@index');
//  *** Category
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');

// GET /categories/create (hiển thị form thêm loại sản phẩm)
Route::get(url: '/admin/categories/create', controllerMethod: 'App\Controllers\Admin\CategoryController@create');

// POST /categories (tạo mới một loại sản phẩm)
Route::post(url: '/admin/categories', controllerMethod: 'App\Controllers\Admin\CategoryController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get(url: '/admin/categories/{id}', controllerMethod: 'App\Controllers\Admin\CategoryController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/categories/{id}', controllerMethod: 'App\Controllers\Admin\CategoryController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/categories/{id}', controllerMethod: 'App\Controllers\Admin\CategoryController@delete');


// *** Product
// GET /product (lấy dang sách sản phẩm)
Route::get(url: '/admin/products', controllerMethod: 'App\Controllers\Admin\ProductController@index');

// GET /product/create (hiển thị form thêm loại sản phẩm)
Route::get(url: '/admin/products/create', controllerMethod: 'App\Controllers\Admin\ProductController@create');

// POST /product (tạo mới một loại sản phẩm)
Route::post(url: '/admin/products', controllerMethod: 'App\Controllers\Admin\ProductController@store');

// GET /product/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get(url: '/admin/products/{id}', controllerMethod: 'App\Controllers\Admin\ProductController@edit');

// PUT /product/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/products/{id}', controllerMethod: 'App\Controllers\Admin\ProductController@update');

// DELETE /product/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/products/{id}', controllerMethod: 'App\Controllers\Admin\ProductController@delete');



//  *** Users
// GET /users (lấy danh sách người dùng)
Route::get('/admin/users', 'App\Controllers\Admin\UserController@index');

// GET /users/create (hiển thị form thêm người dùng)
Route::get('/admin/users/create', 'App\Controllers\Admin\UserController@create');

// POST /users (tạo mới một người dùng)
Route::post('/admin/users', 'App\Controllers\Admin\UserController@store');

// GET /users/{id} (lấy chi tiết người dùng với id cụ thể)
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');

// PUT /users/{id} (update người dùng với id cụ thể)
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');

// DELETE /users/{id} (delete người dùng với id cụ thể)
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');




// Get /users (Tìm kiếm người dùng)
Route::get('/admin/user/search', 'App\Controllers\Admin\UserController@search');

// Get /users (Tìm kiếm danh sách sản phẩm)
Route::get('/admin/categories/search', 'App\Controllers\Admin\UserController@search');

// Get /users (Tìm kiếm sản phẩm)
Route::get('/admin/products/search', 'App\Controllers\Admin\ProductController@search');



//  *** Comment
// GET /comment (lấy danh sách bình luận)
Route::get('/admin/comments', 'App\Controllers\Admin\CommentController@index');

// GET /comment/{id} (lấy chi tiết bình luận với id cụ thể)
Route::get('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@edit');

// PUT /comment/{id} (update bình luận với id cụ thể)
Route::put('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@update');

// DELETE /comment/{id} (delete bình luận với id cụ thể)
Route::delete('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@delete');



// *** Oders

//GET /oders (lấy danh sách đơn hàng)
Route::get('/admin/orders','App\Controllers\Admin\OrderController@index');

//GET /orders/{id}
Route::get('/admin/orders/{id}', 'App\Controllers\Admin\OrderController@detail');

//Get /create thêm đơn hàng
Route::get('/admin/orders/create', 'App\Controllers\Admin\OrderController@create');

// DELETE /comment/{id} (delete đơn hàng với id cụ thể)
Route::delete('/admin/orders/{id}', 'App\Controllers\Admin\OrderController@delete');



// *** Trang thông tin
// Giao diện trang thông tin người dùng
Route::get('/admin/profile/{id}','App\Controllers\Admin\AuthController@profile');


// hiện thị form đăng nhập
Route::get('/admin/login', 'App\Controllers\Admin\AuthController@loginAdmin');
// xử lí chức năng đăng nhập
Route::post('/admin/login', 'App\Controllers\Admin\AuthController@loginActionAdmin');
// xử lí đăng xuất
Route::get('/admin/logout','App\Controllers\Admin\AuthController@logout');


Route::dispatch(uri: $_SERVER['REQUEST_URI']);


