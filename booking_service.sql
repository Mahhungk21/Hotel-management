-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 04:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `phoneNumber`, `birthday`, `avatar`, `role`, `userName`, `password`) VALUES
(1, 'Trung Nghia', 'nghia.admin@gmail.com', '0123456789', '0000-00-00', '', 1, 'admin', '12345'),
(2, 'nghia', 'nghia.nannt@gmail.com', '012345678', '2003-06-08', '', 0, 'nghia', '$2y$10$z5QoSxxIvfbzH4lGLi0r/usNEpeHkGXwiPeQEh9qzS59hTozzOQOC');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_has_room`
--

CREATE TABLE `apartment_has_room` (
  `apartment_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment_has_room`
--

INSERT INTO `apartment_has_room` (`apartment_id`, `room_id`, `price`) VALUES
(1, 1, '1000000'),
(1, 2, '1500000'),
(1, 3, '700000');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_img`
--

CREATE TABLE `apartment_img` (
  `apartment_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment_img`
--

INSERT INTO `apartment_img` (`apartment_id`, `id`, `image`) VALUES
(1, 1, 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7'),
(1, 2, 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_location`
--

CREATE TABLE `apartment_location` (
  `location_id` int(10) NOT NULL,
  `apartment_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment_location`
--

INSERT INTO `apartment_location` (`location_id`, `apartment_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `apartment_type`
--

CREATE TABLE `apartment_type` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment_type`
--

INSERT INTO `apartment_type` (`id`, `name`, `description`) VALUES
(1, 'Khách sạn Palace Saigon', 'Lưu trú tại Palace Hotel Saigon là một lựa chọn đúng đắn khi quý khách đến thăm Bến Nghé.\r\n\r\nkhách sạn sở hữu vị trí đắc địa cách sân bay Sân bay Tân Sơn Nhất 6,93 km.\r\n\r\nkhách sạn nằm cách Saigon Waterbus Station 0,38 km.\r\n\r\nkhách sạn này rất dễ tìm bởi vị trí đắc địa, nằm gần với nhiều tiện ích công cộng.'),
(2, 'My Villa Airport Hotel ', 'My Villa Airport Hotel toạ lạc tại khu vực / thành phố Phường 2.\r\n\r\nkhách sạn sở hữu vị trí đắc địa cách sân bay Sân bay Tân Sơn Nhất 1,54 km.\r\n\r\nkhách sạn nằm cách Saigon Railway Station 3,38 km.\r\n\r\nCó rất nhiều điểm tham quan lân cận như Vườn thú Đại Nam ở khoảng cách 26,65 km, và Cu Chi Tunnels ở khoảng cách 43,14 km.'),
(3, 'Khách sạn Mường Thanh Grand Saigon Centre', 'Lưu trú tại Muong Thanh Grand Saigon Centre Hotel là một lựa chọn đúng đắn khi quý khách đến thăm Bến Nghé.');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'Hồ Chí Minh'),
(2, 'Hà Nội'),
(3, 'Đà Lạt'),
(4, 'Đà Nẵng');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `total_price` varchar(20) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `is_cart` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_has_room`
--

CREATE TABLE `order_has_room` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `apartment_id` int(10) NOT NULL,
  `room_count` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(10) NOT NULL,
  `rating_star` int(10) NOT NULL,
  `apartment_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating_star`, `apartment_id`, `user_id`) VALUES
(1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_typ`
--

CREATE TABLE `room_typ` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_typ`
--

INSERT INTO `room_typ` (`id`, `name`) VALUES
(1, 'Phòng 2 người - 1 giường đôi'),
(2, 'Phòng 4 người - 2 giường đôi'),
(3, 'Phòng 2 người - 2 giường đơn\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apartment_has_room`
--
ALTER TABLE `apartment_has_room`
  ADD PRIMARY KEY (`apartment_id`,`room_id`),
  ADD KEY `apartment_room_1` (`room_id`);

--
-- Indexes for table `apartment_img`
--
ALTER TABLE `apartment_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_img` (`apartment_id`);

--
-- Indexes for table `apartment_location`
--
ALTER TABLE `apartment_location`
  ADD KEY `apartment_location` (`apartment_id`),
  ADD KEY `apartment_location_1` (`location_id`);

--
-- Indexes for table `apartment_type`
--
ALTER TABLE `apartment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_has_room`
--
ALTER TABLE `order_has_room`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_user` (`user_id`),
  ADD KEY `rating_apartment` (`apartment_id`);

--
-- Indexes for table `room_typ`
--
ALTER TABLE `room_typ`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apartment_img`
--
ALTER TABLE `apartment_img`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apartment_type`
--
ALTER TABLE `apartment_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_has_room`
--
ALTER TABLE `order_has_room`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_typ`
--
ALTER TABLE `room_typ`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartment_has_room`
--
ALTER TABLE `apartment_has_room`
  ADD CONSTRAINT `apartment_room` FOREIGN KEY (`apartment_id`) REFERENCES `apartment_type` (`id`),
  ADD CONSTRAINT `apartment_room_1` FOREIGN KEY (`room_id`) REFERENCES `room_typ` (`id`);

--
-- Constraints for table `apartment_img`
--
ALTER TABLE `apartment_img`
  ADD CONSTRAINT `apartment_img` FOREIGN KEY (`apartment_id`) REFERENCES `apartment_type` (`id`);

--
-- Constraints for table `apartment_location`
--
ALTER TABLE `apartment_location`
  ADD CONSTRAINT `apartment_location` FOREIGN KEY (`apartment_id`) REFERENCES `apartment_type` (`id`),
  ADD CONSTRAINT `apartment_location_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_apartment` FOREIGN KEY (`apartment_id`) REFERENCES `apartment_type` (`id`),
  ADD CONSTRAINT `rating_user` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
