-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2024 at 11:01 AM
-- Server version: 8.0.36
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pktt_duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `createa_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint DEFAULT '1',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `image`) VALUES
(1, 'Găng Tay', 1, 'category-1.jpg'),
(2, 'Khăn', 1, 'category-2.jpg'),
(3, 'Mũ Nón/Mũ Len', 1, 'category-3.jpg'),
(4, 'Bịt Tai Len', 1, 'category-4.jpg'),
(5, 'Dép', 1, 'category-5.jpg'),
(6, 'Tất/Vớ', 1, 'category-6.jpg'),
(7, 'Kính Mát/ Gọng Kính', 1, 'category-7.jpg'),
(8, 'Khẩu Trang', 1, 'category-8.jpg'),
(9, 'Thắt Lưng', 1, 'category-9.jpg'),
(10, 'Trang Sức', 1, 'category-10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `desciption` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `order_date` date NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `total_amount` double NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `payment_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` double NOT NULL,
  `product_detail_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `discount_price` int NOT NULL,
  `category_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `is_featured` tinyint DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `view` int DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint DEFAULT '1',
  `is_sale` tinyint DEFAULT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `color_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount_price`, `category_id`, `quantity`, `stock`, `is_featured`, `image`, `view`, `date`, `status`, `is_sale`, `short_description`, `color_id`) VALUES
(1, 'Găng tay len lông xù Cute dog rabbit áo màu có tai', 'Găng tay len lông xù Cute dog rabbit áo màu có tai.', 1000, 800, 1, 30, 0, 1, 'product-1.jpg', 3, '2024-11-07 16:41:38', 1, 1, 'Găng tay len lông xù Cute dog rabbit áo màu có tai.', 0),
(2, 'Găng tay len lông xù Cute dog face all the little things', 'Găng tay len lông xù Cute dog face all the little things', 140000000, 2300000, 1, 25, 0, 1, 'product-2.jpg', 2, '2024-11-07 16:41:38', 1, 1, 'Găng tay len lông xù Cute dog face all the little things', 0),
(3, 'Găng tay len lông xoắn Basic baby bear stamp - Camel', 'Găng tay len lông xoắn Basic baby bear stamp - Camel', 100000, 50000, 1, 40, 0, 1, 'product-3.jpg', 0, '2024-11-07 16:41:38', 1, 1, '', 0),
(4, 'Găng tay len Little bow nơ nhỏ dây dài nền màu', 'Chiếc găng tay len Little Bow có thiết kế nơ nhỏ xinh xắn cùng dây dài tiện lợi. Nền màu tươi sáng và chất liệu len mềm mại giúp giữ ấm và thêm phần dễ thương cho trang phục mùa đông.', 60000, 4000, 1, 30, 0, 1, 'product-4.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(5, 'Găng tay cảm ứng Basic xoắn thừng nổi 1 màu', 'Chiếc găng tay cảm ứng Basic xoắn thừng nổi 1 màu thiết kế đơn giản, chất liệu len mềm mại, giữ ấm và tiện lợi sử dụng thiết bị điện tử trong mùa đông.', 7000, 700, 1, 25, 0, 2, 'product-3.jpg', 1, '2024-11-07 16:41:38', 1, 0, '', 0),
(6, 'Khăn len kèm mũ và bao tay Capybara face fruit - Nâu', 'Bộ khăn len kèm mũ và bao tay Capybara Face Fruit - Nâu có thiết kế đáng yêu với họa tiết capybara. Chất liệu len mềm mại, giữ ấm tốt, phù hợp cho mùa đông.', 180000, 9000, 2, 40, 0, 0, 'product-3.jpg', 1, '2024-11-07 16:41:38', 1, 1, '', 0),
(7, 'Khăn len kèm mũ và bao tay Baby bear tai gấu phối màu - Be', 'Bộ khăn len kèm mũ và bao tay Baby Bear tai gấu phối màu - Be được thiết kế dễ thương với hình gấu và màu sắc phối nhẹ nhàng. Chất liệu len mềm mại, giữ ấm tốt, là sự lựa chọn hoàn hảo để bảo vệ bạn trong mùa đông.', 170000, 0, 2, 40, 0, 0, 'product.jpg', 1, '2024-11-07 16:41:38', 1, NULL, '', 0),
(8, 'Khăn len Plaid kẻ ô phối màu tua rua 56x188', 'Chiếc khăn len Plaid kẻ ô phối màu với kích thước 56x188cm được thiết kế thời trang với họa tiết kẻ ô truyền thống và tua rua. Chất liệu len mềm mại và ấm áp, lý tưởng cho những ngày đông lạnh giá.', 130000, 0, 2, 30, 0, 0, 'product.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(9, 'Khăn quàng cổ Baby bear đứng nền màu 12x95 - Mix', 'Chiếc khăn quàng cổ Baby Bear đứng nền màu 12x95 - Mix có thiết kế dễ thương với hình gấu bé nổi bật. Màu sắc phối hợp tinh tế, chất liệu len mềm mại và kích thước vừa phải, giúp giữ ấm và mang đến phong cách đáng yêu, phù hợp cho mùa đông.', 80000, 0, 2, 30, 0, 0, 'product.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(10, 'Khăn len cashmere Basic ô vuông to phối màu tua rua 65x180', 'Khăn len cashmere Basic ô vuông to phối màu tua rua 65x180\r\nChiếc khăn len cashmere Basic ô vuông to phối màu với kích thước 65x180cm là sự kết hợp hoàn hảo giữa phong cách và chức năng.', 130000, 0, 2, 20, 0, 0, 'product.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(11, '\r\nMũ len lông xù quàng cổ Tai mèo viền màu viền lông - Be', 'Chiếc mũ len lông xù quàng cổ Tai mèo viền màu viền lông - Be có thiết kế vô cùng dễ thương và ấm áp. Được làm từ chất liệu len mềm mại, sản phẩm này giúp giữ ấm cho bạn trong mùa đông.\r\n', 150000, 0, 3, 50, 0, 0, 'product.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(12, 'Mũ len lông xù quàng cổ Tai mèo viền lông họa tiết gấp khúc - Camel', 'Chiếc mũ len lông xù quàng cổ Tai mèo viền lông họa tiết gấp khúc - Camel mang đến vẻ ngoài dễ thương và phong cách. Chất liệu len mềm mại và ấm áp, kèm theo thiết kế tai mèo và họa tiết gấp khúc tinh tế, giữ ấm và tạo điểm nhấn nổi bật cho trang phục.', 150000, 0, 3, 40, 0, 0, 'product-4.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(13, 'Mũ len lông xù quàng cổ Basic stamp viền lông - Camel', 'Chiếc mũ len lông xù quàng cổ Basic Stamp viền lông - Camel mang đến sự ấm áp và phong cách trong mùa đông. Chất liệu len mềm mại, kết hợp với thiết kế viền lông và màu camel trang nhã, tạo nên một sản phẩm vừa giữ ấm tốt vừa thời trang.', 160000, 0, 3, 60, 0, 0, 'product.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(14, 'Mũ len lông xù quàng cổ Tai gấu baby bear viền lông - Be', 'Chiếc mũ len lông xù quàng cổ Tai gấu Baby Bear viền lông - Be có thiết kế dễ thương và ấm áp. Chất liệu len mềm mại, kết hợp với phần tai gấu và viền lông, giúp giữ ấm hiệu quả trong mùa đông. Màu be nhẹ nhàng và tinh tế.', 180000, 0, 3, 55, 0, 0, 'product.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(15, 'Mũ len phi công Tai gấu phối màu', 'Chiếc mũ len phi công Tai gấu phối màu mang đến sự kết hợp hoàn hảo giữa phong cách cổ điển và đáng yêu. Thiết kế tai gấu dễ thương cùng màu sắc phối tinh tế tạo nên một sản phẩm vừa giữ ấm tốt vừa thể hiện cá tính. Chất liệu len mềm mại, ấm áp.', 190000, 0, 3, 30, 0, 2, 'product-4.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(16, 'Bịt tai len Bồ hóng biểu cảm', 'Chiếc bịt tai len Bồ Hóng Biểu Cảm mang đến sự ấm áp và dễ thương với thiết kế hình bồ hóng vui nhộn. Chất liệu len mềm mại giữ ấm tốt cho đôi tai trong mùa đông.', 110000, 0, 4, 25, 0, 0, 'product.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(17, 'Bịt tai len Cute bee chú ong nhỏ - Nâu', 'Chiếc bịt tai len Cute Bee Chú Ong Nhỏ - Nâu có thiết kế dễ thương với hình chú ong nhỏ và màu nâu ấm áp. Chất liệu len mềm mại và ấm áp, giúp giữ ấm đôi tai trong những ngày lạnh giá.', 100000, 0, 4, 40, 0, 2, 'product-2.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0),
(18, 'Bịt tai len Cute rabbit face mắt long lanh có tai - Mix', 'Chiếc bịt tai len Cute Rabbit Face mắt long lanh có tai - Mix mang đến sự dễ thương và ấm áp. Thiết kế hình thỏ với đôi mắt long lanh và tai xinh xắn, chất liệu len mềm mại giữ ấm tốt trong mùa đông.', 70000, 0, 4, 30, 0, 0, 'product.jpg', 0, '2024-11-07 16:41:38', 1, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `role` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `avatar`, `phone_number`, `status`, `role`) VALUES
(1, 'huy', 'trangiahuy2020kg@gmail.com', '$2y$10$BS2QOySAVPbGd1CEX8BsRu9EkPC8iXttj0yZVb3v7j3LVxI3NmLIO', 'trần gia hhuy', NULL, NULL, 1, 1),
(2, 'huy1', 'trangiahuy2020kg@gmail.com', '$2y$10$1fKX4848ZNNts7OBD39PS.xnuOtFFXfbjF9U3D9bVRHWJ.ZnZj9ES', 'trần gia huy huy gia trần', NULL, NULL, 1, 1),
(3, 'giahuy', 'Huytgpc08697@gmail.com', '$2y$10$.7JkbjvCvpP2NEk1cVjSdOgVZwq8mNyVH/.GZxoK6qJ3MCW3hjzDe', 'Trần Gia Huy', NULL, NULL, 1, 1),
(7, 'huy4', 'trangiahuy2020kg@gmail.com', '$2y$10$1J.NUKo.Be5B2uV/AEMeZepiW4QZs1oPNPUhZDZeWPgkzgbcmPIsG', 'trần gia huy huy gia trần', '20241118181139.jpg', '0327376744', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_card_users` (`user_id`) USING BTREE;

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cartdetails_cart` (`cart_id`),
  ADD KEY `fk_cartdetails_products` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users` (`user_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_detail_products` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `fk_cartdetails_cart` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`),
  ADD CONSTRAINT `fk_cartdetails_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_detail_orders` FOREIGN KEY (`id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_order_detail_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
