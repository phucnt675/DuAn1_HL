<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Comment\Create;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;

class CommentController
{


    // hiển thị danh sách bình luận
    public static function index()
    {
        $Comment = new Comment();
        $data = $Comment-> getAllCommentJoinProductAndUser();
        Header::render();
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
    }


    // xử lý chức năng thêm
    public static function store()
    {
      
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $Comment=new Comment();
        $data = $Comment->getOneCommentJoinProductAndUser($id); 
        if (!$data) {
            NotificationHelper::error('edit','Không thể xem được bình luận này');
            header('location: /admin/Comments');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        $is_valid =CommentValidation::edit();
        
        if (!$is_valid){
            NotificationHelper::error('update','Cập nhật bình luận thất bại');
            header("location: /admin/comments/$id");
            exit;
        }
        $status=$_POST['status'];
        $category=new Comment();


       //Thực hiện Cập nhật
       $data=[
        'status'=>$status
       ];
       $result=$category->updateComment($id,$data);
       if($result){
        NotificationHelper::success('update','cập nhật bình luận thành công');
            header('location: /admin/comments');
            
       }
       else{
        NotificationHelper::error('update','Cập nhật bình luận thất bại');
            header("location: /admin/comments/$id");
       }

    }


    // thực hiện xoá
    public static function delete(int $id)
    {
       
        $Comment =new Comment();
        $result = $Comment->deleteComment($id);
        if ($result) {
            NotificationHelper::success('delete','Xóa bình luận thành công');
            
        }
        else{
            NotificationHelper::error('delete','Xóa bình luận thất bại');
           
        }
        header('location:/admin/comments');
    }
};
