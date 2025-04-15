<?php

    namespace App\Models;

    class Order extends BaseModel
    {
        protected $table = 'orders';
        protected $id = 'id';

        public function getAllOrder()
        {
            return $this->getAll();
        }

        public function getOneOrder($id)
        {
            return $this->getOne($id);
        }

        public function createOrder($data)
        {
            return $this->create($data);
        }

        public function updateOrder($id, $data)
        {
            return $this->update($id, $data);
        }

        public function deleteOrder($id)
        {
            // Xóa chi tiết đơn hàng
            $sql = "DELETE FROM order_details WHERE order_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Xóa đơn hàng chính
                $sqlOrder = "DELETE FROM orders WHERE id = ?";
                $stmtOrder = $conn->prepare($sqlOrder);
                $stmtOrder->bind_param("i", $id);
                $stmtOrder->execute();

                if ($stmtOrder->affected_rows > 0) {
                    return true; // Xóa thành công cả đơn hàng và chi tiết
                }
            }

            return false; // Không thể xóa
        }

        public function getAllOrderList()
        {
            $sql = "
            SELECT 
                o.id AS order_id, 
                o.order_date, 
                o.status, 
                o.total_price, 
                o.phone_number, 
                o.delivery_address, 
                u.name AS user_name, 
                p.payment_method AS payment_method, 
                GROUP_CONCAT(pr.name SEPARATOR ', ') AS product_names, 
                GROUP_CONCAT(od.quantity SEPARATOR ', ') AS quantities 
            FROM orders o
            JOIN users u ON o.user_id = u.id
            JOIN payments p ON o.payment_id = p.id
            LEFT JOIN order_details od ON o.id = od.order_id
            LEFT JOIN products pr ON od.product_id = pr.id
            GROUP BY o.id;
            ";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllProductPayment()
        {
            $conn = $this->_conn->MySQLi();

            // Lấy danh sách sản phẩm
            $sqlProduct = "SELECT id, name, price, quantity FROM products WHERE status = 1";
            $stmtProduct = $conn->prepare($sqlProduct);
            $stmtProduct->execute();
            $resultProduct = $stmtProduct->get_result();

            // Lấy danh sách phương thức thanh toán
            $sqlPayment = "SELECT id, payment_method FROM payments";
            $stmtPayment = $conn->prepare($sqlPayment);
            $stmtPayment->execute();
            $resultPayment = $stmtPayment->get_result();

            // Trả về kết quả
            $products = $resultProduct->fetch_all(MYSQLI_ASSOC);
            $payments = $resultPayment->fetch_all(MYSQLI_ASSOC);

            return ['products' => $products, 'payments' => $payments];
        }

        public function addOrder($orderData, $orderDetails)
        {
            $conn = $this->_conn->MySQLi();

            // Bắt đầu giao dịch
            $conn->begin_transaction();

            // Thêm đơn hàng
            $sqlOrder = "INSERT INTO orders (user_id, order_date, status, total_price, phone_number, payment_id, delivery_address) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmtOrder = $conn->prepare($sqlOrder);
            $stmtOrder->bind_param(
                "issdiss",
                $orderData['user_id'],
                $orderData['order_date'],
                $orderData['status'],
                $orderData['total_price'],
                $orderData['phone_number'],
                $orderData['payment_id'],
                $orderData['delivery_address']
            );
            $stmtOrder->execute();

            // Lấy ID đơn hàng vừa thêm
            $orderId = $conn->insert_id;

            // Thêm chi tiết đơn hàng
            $sqlDetails = "INSERT INTO order_details (order_id, product_skus_id, quantity, price, total_price, created_at, updated_at) 
                        VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
            $stmtDetails = $conn->prepare($sqlDetails);

            // Lặp qua từng chi tiết đơn hàng
            foreach ($orderDetails as $detail) {
                $totalPrice = $detail['quantity'] * $detail['price'];
                $stmtDetails->bind_param(
                    "iiiii",
                    $orderId,
                    $detail['product_skus_id'],
                    $detail['quantity'],
                    $detail['price'],
                    $totalPrice
                );
                $stmtDetails->execute();
            }

            // Commit giao dịch
            $conn->commit();
            return $orderId; // Trả về ID đơn hàng vừa tạo
        }
    }
