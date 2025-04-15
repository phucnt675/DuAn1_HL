<?php


namespace App\Models;

class OrderDetail extends BaseModel{

    protected $table = 'order_details';
    protected $id = 'id';



    public function getOneOrder($id)
    {
        $sql = "SELECT 
                    o.id AS order_id, 
                    o.order_date, 
                    o.status, 
                    o.total_amount, 
                    o.phone_number, 
                    u.name AS user_name, 
                    u.email AS user_email,  
                    p.payment_method, 
                    pr.name AS product_name, 
                    od.quantity, 
                    od.price
                FROM orders o
                JOIN users u ON o.user_id = u.id
                JOIN payments p ON o.payment_id = p.id
                JOIN order_details od ON o.id = od.order_id
                JOIN products pr ON od.product_id = pr.id
                WHERE o.id = ?";
        
        // Prepare and execute the query
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id); // Bind the order ID parameter as an integer
        $stmt->execute();
        
        // Return the result
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
}