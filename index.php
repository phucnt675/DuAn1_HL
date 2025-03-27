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
Route::get('/register','App\Controllers\Client\AuthController@register');
Route::get('/about','App\Controllers\Client\AboutController@index');
Route::get('/chocolate','App\Controllers\Client\ChocolateController@index');
Route::get('/testimonial','App\Controllers\Client\TestimonialController@index');
Route::get('/contact','App\Controllers\Client\ContactController@index');




// trang contact
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


// Get list data users
Route::get('/admin/users','App\Controllers\Admin\UserController@index');

// GET /User/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/users/create', 'App\Controllers\Admin\UserController@create');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');


Route::dispatch($_SERVER['REQUEST_URI']);
