<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'id';

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    public function createProduct($data)
    {
        return $this->create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function getAllProductByStatus()
    {
        return $this->getAllByStatus();
    }

    public function getOneProductByStatus($id)
    {
        return $this->getOneByStatus($id);
    }

    public function getOneProductByName($name)
    {
        return $this->getOneByName($name);
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

    public function getOneByStatus(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->id=? AND status=" . self::STATUS_ENABLE;
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // sản pẩm nổi bật
    public function getAllProductOutstanding()
    {
        /*  $sql = "SELECT products.*, categories.name AS category_name 
         FROM products 
         JOIN categories ON products.category_id = categories.id 
         WHERE products.is_featured = 1 
         ORDER BY categories.id"; */
        $sql = "SELECT * FROM products WHERE is_featured = 1";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    // sản phẩm mới
    public function getAllProductNew()
    {

        $sql = "SELECT * FROM products WHERE is_featured = 2";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    // sản phẩm hot
    public function getAllProductHot()
    {

        $sql = "SELECT * FROM products WHERE is_featured = 3";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    // sản phẩm sale
    public function getAllProductSale()
    {
        $sql = "SELECT products.*, categories.name AS category_name
        FROM products
        INNER JOIN categories ON products.category_id = categories.id
        WHERE products.is_sale = 1";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllProductJoinCategory()
    {
        $result = [];
        try {

            $sql = "SELECT products.*, categories.name AS category_name FROM products INNER JOIN categories ON products.category_id = categories.id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }


    public function getAllProductByCategoryAndStatus($id)
    {
        // $this->_conn = new Database();

        $sql = "SELECT products.*, categories.name AS category_name
            FROM products INNER JOIN categories ON products.category_id = categories.id 
            WHERE products.category_id=? AND products.status=" . self::STATUS_ENABLE .
            " AND categories.status=" . self::STATUS_ENABLE;
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }




    //tìm kiếm bên client

    public function search($keyword, $page, $perPage)
    {
        try {
            // Tính toán offset cho phân trang
            $offset = ($page - 1) * $perPage;
            
            // Câu truy vấn tìm kiếm sản phẩm theo từ khóa
            $sql = "SELECT * FROM products WHERE name LIKE ? LIMIT ? OFFSET ?";
            
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $searchTerm = "%" . $keyword . "%";
            
            // Gắn tham số vào câu truy vấn
            $stmt->bind_param("sii", $searchTerm, $perPage, $offset);
            
            // Thực thi câu truy vấn
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $data;
        } catch (\Throwable $th) {
            error_log('Lỗi khi tìm kiếm sản phẩm: ' . $th->getMessage());
            return [];
        }
    }

    public function getAllProductImages($id)
    {

        $sql = "SELECT * FROM product_images WHERE product_id = ? LIMIT 6";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    // tổng số lượng sản phẩm
    public function countTotal($keyword = null)
{
    try {
        // Câu truy vấn cơ bản để đếm số lượng sản phẩm
        $sql = "SELECT COUNT(*) AS total FROM Products";

        // Nếu có từ khóa tìm kiếm, thêm điều kiện WHERE vào câu truy vấn
        if ($keyword) {
            $sql .= " WHERE name LIKE ?";
        }

        // Kết nối cơ sở dữ liệu
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);

        // Liên kết tham số vào câu truy vấn
        if ($keyword) {
            $searchTerm = "%" . $keyword . "%";
            $stmt->bind_param("s", $searchTerm); // "s" đại diện cho kiểu dữ liệu string
        }

        // Thực thi câu truy vấn
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Trả về tổng số sản phẩm
        return $row['total'];
    } catch (\Throwable $th) {
        error_log('Lỗi khi count tất cả dữ liệu: ' . $th->getMessage());
        return 0;
    }
}




    // truy vấn chia trang sản phẩm
    public function getProductsByPageAndFilters($page, $perPage, $color = null, $material = null)
    {
        // Xác định vị trí bắt đầu cho phân trang
        $offset = ($page - 1) * $perPage;

        // Câu truy vấn cơ bản
        $sql = "SELECT p.id, p.name, p.price, p.image
                FROM Products p
                LEFT JOIN product_skus ps ON p.id = ps.product_id
                LEFT JOIN sku_values sv ON ps.id = sv.product_sku_id
                LEFT JOIN option_values ov ON sv.option_value_id = ov.id
                LEFT JOIN options o ON sv.option_id = o.id
                WHERE p.status = 1";

        // Thêm điều kiện lọc màu sắc nếu có
        if ($color) {
            $sql .= " AND ov.value_name = ?";  // Lọc theo màu sắc
        }

        // Thêm điều kiện lọc vật liệu nếu có
        if ($material) {
            $sql .= " AND o.name = 'Material' AND sv.option_value_id = (SELECT id FROM option_values WHERE value_name = ? LIMIT 1)";  // Lọc theo vật liệu

        }

        // Thêm GROUP BY để nhóm các sản phẩm, tránh lặp lại sản phẩm
        $sql .= " GROUP BY p.id";

        // Thêm phân trang
        $sql .= " LIMIT ?, ?"; // Phân trang từ vị trí $offset và lấy $perPage sản phẩm

        // Kết nối cơ sở dữ liệu và chuẩn bị câu lệnh
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);

        // Liên kết các tham số vào câu truy vấn
        if ($color && $material) {
            $stmt->bind_param('ssii', $color, $material, $offset, $perPage);
        } elseif ($color) {
            $stmt->bind_param('sii', $color, $offset, $perPage);
        } elseif ($material) {
            $stmt->bind_param('sii', $material, $offset, $perPage);
        } else {
            $stmt->bind_param('ii', $offset, $perPage);
        }

        // Thực thi câu truy vấn
        $stmt->execute();
        // Trả về kết quả
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    // sản phẩm liên quan
    public function getRelatedProducts($currentProduct_id, $category_id)
    {
        // $this->_conn = new Database();

        $sql = "SELECT * FROM products WHERE category_id = ? AND id != ? LIMIT 4";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $category_id, $currentProduct_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }



    public function searchProduct($searchTerm)
    {
        $conn = $this->_conn->MySQLi();

        // Kiểm tra nếu từ khóa là số
        if (is_numeric($searchTerm)) {
            $stmt = $conn->prepare(
                "SELECT id, name, description, price, discount_price, category_id, quantity, 
                        stock, is_featured, image, view, date, status, is_sale, 
                        short_description, color_id
                 FROM products
                 WHERE id = ? 
                 OR price = ? 
                 OR discount_price = ? 
                 OR category_id = ? 
                 OR quantity = ? 
                 OR stock = ? 
                 OR view = ? 
                 OR color_id = ?"
            );
            $stmt->bind_param(
                "iiiiiiii",
                $searchTerm,
                $searchTerm,
                $searchTerm,
                $searchTerm,
                $searchTerm,
                $searchTerm,
                $searchTerm,
                $searchTerm
            );
        } else {
            // Nếu từ khóa là chuỗi, tìm kiếm trên các cột kiểu chuỗi
            $searchPattern = "%" . $searchTerm . "%";
            $stmt = $conn->prepare(
                "SELECT id, name, description, price, discount_price, category_id, quantity, 
                        stock, is_featured, image, view, date, status, is_sale, 
                        short_description, color_id
                 FROM products
                 WHERE name LIKE ? 
                 OR description LIKE ? 
                 OR short_description LIKE ? 
                 OR image LIKE ?"
            );
            $stmt->bind_param(
                "ssss",
                $searchPattern,
                $searchPattern,
                $searchPattern,
                $searchPattern
            );
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    // số lượng sản phẩm bên admin
    public function countTotalProduct()
    {
        $result = ['total' => 0]; // Giá trị mặc định là 0
        try {
            $sql = "SELECT COUNT(*) AS total FROM products";
            $query = $this->_conn->MySQLi()->query($sql);

            // Kiểm tra kết quả trả về
            if ($query) {
                $result = $query->fetch_assoc();  // Trả về mảng với khóa 'total'
            }
        } catch (\Throwable $th) {
            error_log('Lỗi khi count total product: ' . $th->getMessage());
        }

        return $result;  // Đảm bảo trả về mảng với khóa 'total'
    }


    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count, categories.name
FROM products
INNER JOIN categories ON products.category_id = categories.id
GROUP BY products.category_id;
";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    // Biến thể 
    public function getAllProductsWithDetails($id)
    {
        $sql = "
SELECT p.id AS product_id, p.name AS product_name, p.description, ps.id AS sku_id, ps.sku, ps.images AS main_image, 
ps.price, ps.discount_price, ps.quantity, 
GROUP_CONCAT(ov.value_name SEPARATOR ', ') AS option_values FROM products AS p 
JOIN product_skus AS ps ON p.id = ps.product_id 
LEFT JOIN sku_values AS sv ON ps.id = sv.product_sku_id 
LEFT JOIN option_values AS ov ON sv.option_value_id = ov.id 
LEFT JOIN options AS o ON sv.option_id = o.id WHERE p.status = 1 AND p.id = ? GROUP BY ps.id ORDER BY p.id, ps.id;
";

        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);  // Bind tham số $id vào câu lệnh SQL
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy màu sắc có sản phẩm cụ thể
    public function getProductsByColor($color)
    {
        // Truy vấn lấy sản phẩm theo màu
        $sql = "SELECT p.id, p.name, p.price, p.image, ov.value_name AS color
        FROM Products p
        JOIN product_skus ps ON p.id = ps.product_id
        LEFT JOIN sku_values sv ON ps.id = sv.product_sku_id
        LEFT JOIN option_values ov ON sv.option_value_id = ov.id
        WHERE p.status = 1
        AND ov.value_name = ?";  // Lọc theo màu sắc

        // Kết nối cơ sở dữ liệu
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $color);  // Liên kết tham số màu sắc (s - chuỗi)

        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy màu sắc có sản phẩm cụ thể
    public function getProductsByMateil($material)
    {
        // Truy vấn lấy sản phẩm theo vật liệu
        $sql = "SELECT DISTINCT p.id, p.name, p.price, p.image, MAX(ov.value_name) AS material
FROM Products p
JOIN product_skus ps ON p.id = ps.product_id
LEFT JOIN sku_values sv ON ps.id = sv.product_sku_id
LEFT JOIN option_values ov ON sv.option_value_id = ov.id
LEFT JOIN options o ON sv.option_id = o.id
WHERE p.status = 1
AND o.name = 'Material'  -- Lọc theo loại tùy chọn là vật liệu
AND ov.value_name = ?  -- Lọc theo vật liệu
GROUP BY p.id
";

        // Kết nối cơ sở dữ liệu
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $material);  // Liên kết tham số màu sắc (s - chuỗi)

        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lọc sản phẩm theo cả màu và vật liệu



    public function getProductVariants($product_id)
    {
        try {
            $sql = "
        SELECT 
            ps.id AS sku_id,
            ps.sku,
            ps.price,
            ps.discount_price,
            ps.quantity,
            GROUP_CONCAT(ov.value_name SEPARATOR ', ') AS variant_values
        FROM 
            product_skus AS ps
        LEFT JOIN 
            sku_values AS sv ON ps.id = sv.product_sku_id
        LEFT JOIN 
            option_values AS ov ON sv.option_value_id = ov.id
        WHERE 
            ps.product_id = ?
        GROUP BY 
            ps.id;
        ";

            // Debugging: In câu SQL để kiểm tra
            error_log("Câu SQL: " . $sql);

            $stmt = $this->_conn->MySQLi()->prepare($sql);
            $stmt->bind_param('i', $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $data = $result->fetch_all(MYSQLI_ASSOC);
                // Debugging: In ra dữ liệu trả về từ câu truy vấn
                error_log("Dữ liệu trả về: " . print_r($data, true));
                return $data;
            } else {
                error_log("Không có dữ liệu cho product_id = {$product_id}");
                return [];
            }
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return [];
        }
    }




}
