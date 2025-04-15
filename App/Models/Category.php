<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'categories';
    protected $id = 'id';

    public function getAllCategory()
    {
        return $this->getAll();
    }
    public function getOneCategory($id)
    {
        return $this->getOne($id);
    }

    public function createCategory($data)
    {
        return $this->create($data);
    }
    public function updateCategory($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->delete($id);
    }
    public function getAllCategoryByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getOneCategoryByName($name)
    {
        return $this->getOneByName($name);
    }

    public function countTotalCategory(){
        return $this->countTotal();
    }
    public function getOneByName($name){
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE name=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $name);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy bằng tên: ' . $th->getMessage());
            return $result;
        }
    }

    public function countTotal()
    {
        $result = ['total' => 0]; // Giá trị mặc định là 0
        try {
            $sql = "SELECT COUNT(*) AS total FROM $this->table";
            $query = $this->_conn->MySQLi()->query($sql);
    
            // Kiểm tra nếu truy vấn thành công
            if ($query) {
                $result = $query->fetch_assoc();
            } else {
                // Trường hợp truy vấn không thành công
                error_log('Truy vấn không thành công: ' . $this->_conn->MySQLi()->error);
            }
        } catch (\Throwable $th) {
            // Log lỗi nếu có ngoại lệ
            error_log('Lỗi khi count tất cả dữ liệu: ' . $th->getMessage());
        }
    
        return $result;
    }
}
