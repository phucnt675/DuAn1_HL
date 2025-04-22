<?php

namespace App\Models;

use Exception;

class CartModel extends BaseModel
{
    protected $table = 'carts';
    protected $id = 'id';

    // Lấy tất cả các giỏ hàng
    public function getAllCart()
    {
        return $this->getAll();
    }
    public function getCartByUser($user_id)
    {
        try {
            $sql = "SELECT 
    carts.id AS cart_id,
    products.name AS product_name,
    products.description AS product_description,
    users.email AS user_email,
    product_skus.sku AS product_sku,
    product_skus.price AS product_price,
    product_skus.images AS product_images,
    carts.quantity AS quantity,
    (carts.quantity * product_skus.price) AS total_price,
    GROUP_CONCAT(option_values.value_name SEPARATOR ', ') AS product_variants
FROM carts
JOIN users ON carts.user_id = users.id
JOIN product_skus ON carts.product_skus_id = product_skus.id
JOIN products ON product_skus.product_id = products.id
LEFT JOIN sku_values ON product_skus.id = sku_values.product_sku_id
LEFT JOIN option_values ON sku_values.option_value_id = option_values.id
WHERE carts.user_id = ?
GROUP BY carts.id;
";


            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log("Lỗi khi lấy giỏ hàng: " . $th->getMessage());
            return [];
        }
    }

    public function addProductToCart($user_id, $product_skus_id, $product_id, $quantity)
    {
        try {
            $conn = $this->_conn->MySQLi();
    
            // Xây dựng truy vấn kiểm tra sản phẩm đã có trong giỏ chưa
            if ($product_skus_id) {
                $sql = "SELECT id, quantity FROM $this->table WHERE user_id = ? AND product_id = ? AND product_skus_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('iii', $user_id, $product_id, $product_skus_id);
            } else {
                $sql = "SELECT id, quantity FROM $this->table WHERE user_id = ? AND product_id = ? AND product_skus_id IS NULL";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ii', $user_id, $product_id);
            }
    
            $stmt->execute();
            $result = $stmt->get_result();
            $existingCartItem = $result->fetch_assoc();
    
            if ($existingCartItem) {
                $newQuantity = $existingCartItem['quantity'] + $quantity;
                $updateSql = "UPDATE $this->table SET quantity = ? WHERE id = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param('ii', $newQuantity, $existingCartItem['id']);
                return $updateStmt->execute();
            } else {
                if ($product_skus_id) {
                    $insertSql = "INSERT INTO $this->table (user_id, product_id, product_skus_id, quantity) VALUES (?, ?, ?, ?)";
                    $insertStmt = $conn->prepare($insertSql);
                    $insertStmt->bind_param('iiii', $user_id, $product_id, $product_skus_id, $quantity);
                } else {
                    $insertSql = "INSERT INTO $this->table (user_id, product_id, quantity) VALUES (?, ?, ?)";
                    $insertStmt = $conn->prepare($insertSql);
                    $insertStmt->bind_param('iii', $user_id, $product_id, $quantity);
                }
                return $insertStmt->execute();
            }
        } catch (Exception $e) {
            error_log('Lỗi khi thêm sản phẩm vào giỏ hàng: ' . $e->getMessage());
            return false;
        }
    }
    
    public function getOneCart($id)
    {
        return $this->getOne($id);
    }

    public function createCart($data)
    {
        return $this->create($data);
    }


    public function updateCart($id, $data)
    {
        return $this->update($id, $data);
    }




    public function deleteCart($id)
    {
        return $this->delete($id);
    }

    public function deleteAllCarts($userId)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE user_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $userId);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $e) {
            error_log('Loi khi delete all cart');
            return false;
        }
    }

    
    



    
 




}
