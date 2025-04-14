<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'config.php';



// *** Client
Route::get('/', 'App\Controllers\Client\HomeController@index');

Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');

Route::get('/login','App\Controllers\Client\AuthController@login');
Route::post('/login','App\Controllers\Client\AuthController@loginAction');

Route::get('/register','App\Controllers\Client\AuthController@register');
Route::post('/register','App\Controllers\Client\AuthController@registerAction');

Route::get('/forgot-password','App\Controllers\Client\AuthController@forgotPassword');
Route::post('/forgot-password','App\Controllers\Client\AuthController@forgotPasswordAction');

Route::get('/reset-password','App\Controllers\Client\AuthController@resetPassword');
Route::put('/reset-password','App\Controllers\Client\AuthController@resetPasswordAction');

Route::get('/about','App\Controllers\Client\AboutController@index');

Route::get('/chocolate','App\Controllers\Client\ChocolateController@index');

Route::get('/testimonial','App\Controllers\Client\TestimonialController@index');

Route::get('/contact','App\Controllers\Client\ContactController@index');






// *** Admin

Route::get('/admin', 'App\Controllers\Admin\HomeController@index');

//  *** Category
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');

// GET /categories/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');

// POST /categories (tạo mới một loại sản phẩm)
Route::post('/admin/categories', 'App\Controllers\Admin\CategoryController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@delete');


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

// Products
Route::get('/admin/products','App\Controllers\Admin\ProductController@index');

Route::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');
// POST /product (tạo mới một loại sản phẩm)
Route::post(url: '/admin/products', controllerMethod: 'App\Controllers\Admin\ProductController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');

// PUT /users/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');

// DELETE /users/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');

// Orders
Route::get('/admin/orders', 'App\Controllers\Admin\OrderController@index'); // Danh sách đơn hàng
Route::get('/admin/orders/create', 'App\Controllers\Admin\OrderController@create'); // Hiển thị form thêm đơn hàng
Route::post('/admin/orders', 'App\Controllers\Admin\OrderController@store'); // Xử lý thêm đơn hàng
Route::get('/admin/orders/{id}', 'App\Controllers\Admin\OrderController@show'); // Hiển thị chi tiết đơn hàng
Route::get('/admin/orders/{id}/edit', 'App\Controllers\Admin\OrderController@edit'); // Hiển thị form sửa đơn hàng
Route::put('/admin/orders/{id}', 'App\Controllers\Admin\OrderController@update'); // Cập nhật đơn hàng
Route::delete('/admin/orders/{id}', 'App\Controllers\Admin\OrderController@delete'); // Xóa đơn hàng


//  *** Comments
// GET /comments (lấy danh sách bình luận)
Route::get('/admin/comments', 'App\Controllers\Admin\CommentController@index');

// GET /comments/{id} (lấy chi tiết bình luận với id cụ thể)
Route::get('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@edit');

// PUT /comments/{id} (update bình luận với id cụ thể)
Route::put('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@update');

// DELETE /comments/{id} (delete bình luận với id cụ thể)
Route::delete('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@delete');

Route::dispatch($_SERVER['REQUEST_URI']);


