<?php

namespace App\Helpers;

use App\Models\Product;
use Dotenv\Parser\Value;

class ViewProductHelper
{
    public static function cookieView($id, $view)
    {
        // Lấy dữ liệu từ cookie 'view'
        if (isset($_COOKIE['view'])) {
            $view_data = json_decode($_COOKIE['view'], true);

            // Đảm bảo $view_data là mảng sau khi giải mã JSON
            //if (!is_array($view_data)) {
           ///     $view_data = [];
           // }
        } else {
            $view_data = [];
        }

        // Kiểm tra nếu $view_data thực sự là một mảng trước khi sử dụng array_column
       // if (is_array($view_data)) {
            $product_id_arr = array_column($view_data, 'product_id');
       // } else {
        //    $product_id_arr = [];
       // }
      // echo'<pre>';
       //var_dump($view_data);
       //var_dump($product_id_arr);

        

        // Kiểm tra nếu sản phẩm đã tồn tại trong danh sách đã xem
        if (in_array($id, $product_id_arr)) {
            foreach ($view_data as $key => $value) {
                if ($view_data[$key]['product_id'] == $id) {
                    if ($view_data[$key]['time'] < time() - 60*5 ) {
                        $view++;
                    }
                    $view_data[$key]['time'] = time();
                }
            }
        } else {
            // Nếu sản phẩm chưa có thì thêm vào cookie view
            $product_aray = [
                'product_id' => $id,
                'time' => time()
            ];
            $view++;
            $view_data[] = $product_aray;
        }

        // Chuyển mảng thành chuỗi JSON để lưu vào cookie view
        $product_data = json_encode($view_data);
        // Lưu cookie, thời gian là 1 năm
        setcookie('view', $product_data, time() + 3600 * 24 * 30 * 12, '/');
        
        return self::updateView($id,$view);
    }

    public static function updateView($id,$view){
        $product=new Product;
        $data=[
            'view'=>$view
        ];
        $result= $product->updateProduct($id,$data);
    }

    
}
