<?php

namespace App\Models;

class ProductSku extends BaseModel
{
    protected $table = 'product_skus';
    protected $id = 'id';

    public function createSku($skuData) {
      
        return $this->create($skuData);
    }

    public function getSkusByProductId($product_id) {
        return $this->findByColumn('product_id', $product_id);
    }

    public function getAllSkuByProduct($id) {
        // Câu lệnh SQL để lấy thông tin SKU của sản phẩm
        $sql = "SELECT pskus.* 
                FROM products 
                JOIN product_skus AS pskus 
                ON pskus.product_id = products.id 
                WHERE products.id = ?";
    
        // Kết nối tới cơ sở dữ liệu
        $conn = $this->_conn->MySQLi();  // Kiểm tra chắc chắn rằng kết nối này hợp lệ
    
        // Chuẩn bị câu lệnh SQL
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            // Nếu có lỗi khi chuẩn bị câu lệnh SQL
            error_log("Lỗi khi chuẩn bị câu lệnh SQL.");
            return false;
        }
    
        // Liên kết tham số đầu vào (id sản phẩm) với câu lệnh SQL
        $stmt->bind_param('i', $id);
    
        // Thực thi câu lệnh SQL
        $stmt->execute();
    
        // Lấy kết quả của câu truy vấn
        $result = $stmt->get_result();
    
        if ($result === false) {
            // Nếu không có kết quả hoặc có lỗi khi thực thi truy vấn
            error_log("Lỗi khi thực thi câu lệnh SQL.");
            $stmt->close();
            return false;
        }
    
        // Lấy tất cả kết quả dưới dạng mảng kết hợp
        $skuData = $result->fetch_all(MYSQLI_ASSOC);
    
        // Đóng kết nối
        $stmt->close();
    
        // Trả về kết quả
        return $skuData;
    }
    
        
    

    public function updateSku($id, $skuData) {
        return $this->update($id, $skuData);
    }

    public function deleteSku($id) {
        return $this->delete($id);
    }
    public function saveSku($skus, $productId){
        return $this->saveSku($skus, $productId);
    }

    public function getOneSku($id) {
        return $this->getOne($id);
    }
    // sản pẩm nổi bật
    

    


}
