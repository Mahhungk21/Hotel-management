-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 06:16 PM
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
(2, 'Nguyễn Trung Nghĩa', 'nghia.nannt@gmail.com', '088888888', '2024-05-09', '', 0, 'nghia', '$2y$10$MOrVfnHAc1.tvpgJt5JYjefNp/fwUKaRr5jzZdZwctLJKlvd9Rbnm');

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `apartment_img` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`id`, `name`, `address`, `description`, `apartment_img`, `status`, `category_id`) VALUES
(1, 'Palace Sài Gòn', '56 - 66 Nguyễn Huệ, Bến Nghé, Quận 1 Hồ Chí Minh', 'Lưu trú tại Palace Hotel Saigon là một lựa chọn đúng đắn khi quý khách đến thăm Bến Nghé.\r\n\r\nkhách sạn sở hữu vị trí đắc địa cách sân bay Sân bay Tân Sơn Nhất 6,93 km.\r\n\r\nkhách sạn nằm cách Saigon Waterbus Station 0,38 km.\r\n\r\nkhách sạn này rất dễ tìm bởi vị trí đắc địa, nằm gần với nhiều tiện ích công cộng.', 'https://gcs.tripi.vn/hms_prod/photo/thumb/460088Idc/10985_14061911160019922568.jpg', 1, 1),
(2, 'My Villa Airport Hotels', '54/34 Bach Dang Street, Ward 02, Tan Binh District, Ho Chi Minh City, Tân Bình, Ho Chi Minh City, Vietnam.', 'My Villa Airport Hotel toạ lạc tại khu vực / thành phố Phường 2.\r\n\r\nkhách sạn sở hữu vị trí đắc địa cách sân bay Sân bay Tân Sơn Nhất 1,54 km.\r\n\r\nkhách sạn nằm cách Saigon Railway Station 3,38 km.\r\n\r\nCó rất nhiều điểm tham quan lân cận như Vườn thú Đại Nam ở khoảng cách 26,65 km, và Cu Chi Tunnelss ở khoảng cách 43,14 km.', 'https://pix8.agoda.net/hotelImages/4389275/-1/31878dace42aedfc38394ffbb95712d0.jpg?ca=16&ce=1&s=1024x', 1, 1),
(3, 'Khách sạn Nikko Sài Gòn', '235 Nguyễn Văn Cừ, Phường Nguyễn Cư Trinh, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000\r\n', 'Hotel Nikko Saigon là lựa chọn sáng giá dành cho những ai đang tìm kiếm một trải nghiệm xa hoa đầy thú vị trong kỳ nghỉ của mình. Lưu trú tại đây cũng là cách để quý khách chiều chuộng bản thân với những dịch vụ xuất sắc nhất và khiến kỳ nghỉ của mình trở nên thật đáng nhớ.\r\n\r\nBạn có phải là tín đồ mua sắm? Lưu trú tại Hotel Nikko Saigon chắc chắn sẽ thoả mãn bạn với hàng loạt các trung tâm mua sắm kề cận.', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/10027533-8936a739daf46bb17c623254e65eadfb.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(4, 'Cozrum Lux Hotel', '19C Bùi Thị Xuân, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Khách sạn này là lựa chọn hoàn hảo cho các kỳ nghỉ mát lãng mạn hay tuần trăng mật của các cặp đôi. Quý khách hãy tận hưởng những đêm đáng nhớ nhất cùng người thương của mình tại Cozrum Lux Hotel\r\n\r\nCozrum Lux Hotel là lựa chọn sáng giá dành cho những ai đang tìm kiếm một trải nghiệm xa hoa đầy thú vị trong kỳ nghỉ của mình. Lưu trú tại đây cũng là cách để quý khách chiều chuộng bản thân với những dịch vụ xuất sắc nhất và khiến kỳ nghỉ của mình trở nên thật đáng nhớ.', 'https://ik.imagekit.io/tvlk/generic-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20034365-94417fec51d5e0dfe6a52d3ff7b4c4cc.png?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 0, 1),
(5, 'Silverland Ben Thanh', '14-16 Lê Lai, Phường Bến Thành, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách.\r\n\r\nSóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/10018716-bff33297ba13cad8e9895bfad12034b0.png?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(6, 'Cityhouse - Ariosa', '174 Nam Kỳ Khởi Nghĩa, P. Võ Thị Sáu, Quận 3, Vo Thi Sau, Quận 3, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Cityhouse - Ariosa là một nơi nghỉ nằm trong khu vực an ninh, toạ lạc tại Vo Thi Sau. Sóng WiFi phủ khắp các khu vực chung của nơi nghỉ cho phép quý khách luôn kết nối với gia đình và bè bạn.', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/67831169-b9ef9cbc95d73097a4cb08c5e283bbac.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(7, 'Sen Viet Hotel\r\n', '33 Cao Thắng, Phường 2, phường 2, Quận 3, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Lưu trú tại Sen Viet Hotel là một lựa chọn đúng đắn khi quý khách đến thăm phường 2. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/442783525.jpg?k=39eb508890400de3ee81231599df6f6daae0c173bc5df4d67a152777fec1a8d5&o=&hp=1', 1, 1),
(8, 'Cozrum Homes - Sonata Residence\r\n', '41 Nguyễn Thị Thập, Phường Tân Phú, Quận 7, Tân Phú, Quận 7, Thành phố Hồ Chí Minh, Việt Nam, 70000', 'Lưu trú tại Cozrum Homes - Sonata Residence là một lựa chọn đúng đắn khi quý khách đến thăm Tân Phú. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của nơi nghỉ cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20016842-3078abf5cf90a3ec8b59453f05737775.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(9, 'Amory Apartment\r\n', '88 Lê Lai, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Amory Apartment là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phường Bến Thành. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\nhttps://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20013811-aa06cbdb73babbf529100d97fe7265b0.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20013811-aa06cbdb73babbf529100d97fe7265b0.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(10, 'Silverland Mây Hotel\r\n', '28-30 Thi Sach Str, Ben Nghe Ward, Dist 1, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Silverland Mây Hotel là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Bến Nghé. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20068926-8f596704fd15654463e26e2adfbc569f.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(11, 'Asian Ruby Hotel & Apartment', '122F-122F1 Bùi Thị Xuân, Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 711326', 'Asian Ruby Hotel & Apartment - Bui Thi Xuan là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phạm Ngũ Lão. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/10030728-a6ee19c2638409ef7386fcd8a747acfc.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(12, '22Land Hotel & Spa Saigon\r\n', '25 Lê Thánh Tôn, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 70000', '22Land Hotel & Spa Saigon là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Bến Nghé. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/680015552-aeab8fc486c72fa2015464308b033fd6.png?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(13, 'M Village Cuu Long\r\n', '44A Cửu Long, Phường 2, Quận Tân Bình, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'M Village Cuu Long là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phường 2. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20062353-20e993d0c308115e431ffb6c6977ff44.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(14, 'La Paix Saigon Boutique Hotel\r\n', '59 Hai Bà Trưng, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'La Paix Saigon Boutique Hotel toạ lạc tại khu vực / thành phố Bến Nghé. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtejIL9oEZPvjBthEy4heMGYwVQaRZRY_YCK1dzNq9jw&s', 1, 1),
(15, 'Wink Hotel Saigon Centre', 'Wink Hotel Saigon Centre- Full 24hrs stay upon check-in là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phường Đa Kao. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', '75 Nguyễn Bỉnh Khiêm, Phường Đa Kao, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 70000', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20036688-7ac5922bbae7664b092dee6cc5612065.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(16, 'Eastin Grand Hotel Saigon \r\n', '253 Nguyễn Văn Trỗi, phường 10, Quận Phú Nhuận, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Lưu trú tại Eastin Grand Hotel Saigon là một lựa chọn đúng đắn khi quý khách đến thăm phường 10. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10018569-9ad7f65ac51ec4702f0f84a38ba445dd.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 1),
(17, 'Khách sạn Alagon City Hotel & Spa', '56-58 Phạm Hồng Thái, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Alagon City Hotel & Spa toạ lạc tại khu vực / thành phố Phường Bến Thành. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10024443-4d18181bd491b47d574b2717dc23d7ca.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(18, 'Khách sạn La Vela Saigon\r\n', '280 đường Nam Kỳ Khởi Nghĩa, Phường 8, Quận 3, Vo Thi Sau, Quận 3, Thành phố Hồ Chí Minh, Việt Nam, 70000', 'La Vela Saigon Hotel toạ lạc tại khu vực / thành phố Vo Thi Sau. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20035611-44754e0c22bf63ea1061faf359706ff0.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(19, 'Vy Vy Airport Hotel\r\n', '283 Hoàng Văn Thụ, Phường 2, Quận Tân Bình, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Vy Vy Airport Hotel là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phường 2. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10029910-3e41d49710452e6ec5b084d60f37d665.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(20, 'Somerset Ho Chi Minh City\r\n', '8A Nguyễn Bỉnh Khiêm, Phường Đa Kao, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 70000\r\n', 'Lưu trú tại Somerset Ho Chi Minh City là một lựa chọn đúng đắn khi quý khách đến thăm Phường Đa Kao. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của nơi nghỉ cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20048847-61d3f96c4c116099fc1b637df83c7df3.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(21, 'Mari Hotel by Connek\r\n', '158B Bùi Thị Xuân, Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 71012', 'Từ sự kiện doanh nghiệp đến họp mặt công ty, Mari Hotel by Connek cung cấp đầy đủ các dịch vụ và tiện nghi đáp ứng mọi nhu cầu của quý khách và đồng nghiệp.\r\n\r\nDu lịch một mình cũng không hề kém phần thú vị và Mari Hotel by Connek là nơi thích hợp dành riêng cho những ai đề cao sự riêng tư trong kỳ lưu trú.\r\n\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20046493-bcc6aa06566d2919172ac1cc0329286e.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(22, 'Somerset Ho Chi Minh City\r\n', '8A Nguyễn Bỉnh Khiêm, Phường Đa Kao, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 70000', 'Lưu trú tại Somerset Ho Chi Minh City là một lựa chọn đúng đắn khi quý khách đến thăm Phường Đa Kao. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của nơi nghỉ cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20048847-61d3f96c4c116099fc1b637df83c7df3.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(23, 'Cicilia Hotel Saigon Center\r\n', '12D Cách Mạng Tháng 8, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 711133', 'Hãy tận hưởng thời gian vui vẻ cùng cả gia đình với hàng loạt tiện nghi giải trí tại Cicilia Hotel Saigon Center, một khách sạn tuyệt vời phù hợp cho mọi kỳ nghỉ bên người thân.\r\n\r\nHãy sẵn sàng đón nhận trải nghiệm khó quên bằng dịch vụ độc đáo và hoàn hảo của khách sạn cùng các tiện nghi đầy đủ, đáp ứng mọi nhu cầu của quý khách', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20002093-858191f57984121f69baf00c85ef3e1f.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(24, 'Fusion Original Saigon Centre', '65 Lê Lợi, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 70000', 'Fusion Original Saigon Centre là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Bến Nghé. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/67824884-370f621fe19f0f115f266b4ba59e9e02.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(25, 'Khánh sạn Mi Linh - Airport \r\n', 'B38A, Bạch Đằng, Phường 2, Quận Tân Bình, Thành phố Hồ Chí Minh, Việt Nam, 70000', 'Lưu trú tại Mi Linh Hotel ( Near Tan Son Nhat International Airport ) là một lựa chọn đúng đắn khi quý khách đến thăm Phường 2. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10024873-d765e7c3d91a0a6cc3d623c80fdcf0a0.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(26, 'Muong Thanh Luxury Saigon Hotel\r\n', '261C Nguyen Van Troi, Ward 10, Phu Nhuan, Ho Chi Minh, phường 10, Quận Phú Nhuận, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Muong Thanh Luxury Saigon Hotel là lựa chọn sáng giá dành cho những ai đang tìm kiếm một trải nghiệm xa hoa đầy thú vị trong kỳ nghỉ của mình. Lưu trú tại đây cũng là cách để quý khách chiều chuộng bản thân với những dịch vụ xuất sắc nhất và khiến kỳ nghỉ của mình trở nên thật đáng nhớ.\r\n\r\nMột trong những đặc điểm chính của khách sạn này là các liệu pháp spa đa dạng. Hãy nâng niu bản thân bằng các liệu pháp thư giãn, phục hồi giúp quý khách tươi trẻ thân, tâm.', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20041384-2baccc63a2ff501a47208a50cbb347d8.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(27, 'Cozrum Homes - Premier Residence\r\n', '135/4 Nguyễn Cửu Vân, Phường 17, Quận Bình Thạnh, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Cozrum Homes - Premier Residence là lựa chọn sáng giá dành cho những ai đang tìm kiếm một trải nghiệm xa hoa đầy thú vị trong kỳ nghỉ của mình. Lưu trú tại đây cũng là cách để quý khách chiều chuộng bản thân với những dịch vụ xuất sắc nhất và khiến kỳ nghỉ của mình trở nên thật đáng nhớ.\r\n\r\nTừ sự kiện doanh nghiệp đến họp mặt công ty, Cozrum Homes - Premier Residence cung cấp đầy đủ các dịch vụ và tiện nghi đáp ứng mọi nhu cầu của quý khách và đồng nghiệp.', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67765696-2be837f631488bd5136aa05970753402.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(28, 'Thanh Long Hotel', '18-20 Trà Khúc, Phường 2, Quận Tân Bình, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Thanh Long Hotel là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phường 2. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20031437-abdb7d71114fa640d5b1e2e920628014.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(29, 'Windsor Plaza Hotel\r\n', '18 An Dương Vương, phường 9, Quận 5, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Windsor Plaza Hotel toạ lạc tại khu vực / thành phố phường 9. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/67823132-af48d589aa599e93446a1c464b4d038c.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(30, 'Khách Sạn Airport Misaki Hotel by Sazi\r\n', '18 Sông Nhuệ, Phường 2, Quận Tân Bình, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Airport Misaki Hotel by Sazi là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phường 2. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20055607-e2285ece28393e2902bf9cb2e9769773.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 2),
(31, 'Khách sạn C Central Đề Thám\r\n', '216 Đề Thám , Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'C Central Hotel là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phạm Ngũ Lão. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10031926-2048x1366-FIT_AND_TRIM-3768ad20cdb491758c960a2fd96e85f4.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 0, 3),
(32, 'Khách sạn Winsuites Saigon - Luxury Boutique\r\n', '28-30-32 Lê Lai, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Winsuites Saigon - Luxury Boutique Hotel là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phường Bến Thành. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20023844-3302571859cd699a1b8b92f914c3f2af.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(33, 'An Lam Retreats Saigon River\r\n', '21/4 khu phố Trung, phường Vĩnh Phú, thành phố Thuận An, tỉnh Bình Dương, Bến tàu tại,, An Phú Đông, Quận 12, Thành phố Hồ Chí Minh, Việt Nam, 70000', 'Lưu trú tại An Lam Retreats Saigon River là một lựa chọn đúng đắn khi quý khách đến thăm An Phú Đông. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của nơi nghỉ cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20024014-4fc82360f3260f39aacdac6dc8891e81.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(34, 'Hilton Saigon\r\n', '11 Me Linh Square Ben Nghe Ward, Di, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam', 'Hilton Saigon toạ lạc tại khu vực / thành phố Bến Nghé. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/rvN7CENfvyT2YVqT-7R6UjRIibYDnsWI+-nAv8mJ7GI=/160486/photos/89824201_XL.jpg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(35, 'Pullman Saigon Centre\r\n', '148 Tran Hung Dao Boulevard, District 1, Phường Nguyễn Cư Trinh, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 70000', 'Lưu trú tại Pullman Saigon Centre là một lựa chọn đúng đắn khi quý khách đến thăm Phường Nguyễn Cư Trinh. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/rvN7CENfvyT2YVqT-7R6UjRIibYDnsWI+-nAv8mJ7GI=/38380/photos/68624362_XL.jpg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(36, 'M Village The Tropic\r\n', '298/107/2 Điện Biên Phủ, Phường 17, Quận Bình Thạnh, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Lưu trú tại M Village The Tropic là một lựa chọn đúng đắn khi quý khách đến thăm Phường 17. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20060030-156e5e554f234d4605a2cfe9809f3d8c.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(37, 'Tan Son Nhat Saigon Hotel\r\n', '202 Hoàng Văn Thụ, Phường 9, Phường 9, Quận Phú Nhuận, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Lưu trú tại Tan Son Nhat Saigon Hotel là một lựa chọn đúng đắn khi quý khách đến thăm Phường 9. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10024672-28dc5e904898506b46b49fe9ac195c60.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(38, 'ACE Hotel Saigon\r\n', '139H Nguyễn Trãi, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 711090\r\n', 'Lưu trú tại ACE Hotel Saigon là một lựa chọn đúng đắn khi quý khách đến thăm Phường Bến Thành. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10029650-840x460-FIT_AND_TRIM-4ea0ff8417715477c230d60ff8b4da8b.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(39, 'Dyn Opera Hotel ', '18 Cao Bá Quát, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Dyn Opera Hotel là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Bến Nghé. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10024968-cf83f6059f107a77c55499cceb1a4f91.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(40, 'Khách sạn Mai House Sài Gòn\r\n', '157 Nam Kỳ Khởi Nghĩa, Phường Võ Thị Sáu, Quận 3, Vo Thi Sau, Quận 3, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Mai House Saigon Hotel là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Vo Thi Sau. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20023423-2f7b726b23275f99974bde5e9c2bad8e.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(41, '22Land Hotel & Spa Saigon\r\n', '25 Lê Thánh Tôn, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 70000', '22Land Hotel & Spa Saigon là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Bến Nghé. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/680015552-e05107b82933b96b8534fc5154b9822d.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(42, 'Fusion Suites Saigon\r\n', '3 - 3A - 3B - 5 Sương Nguyệt Ánh, Phường Bến Thành, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh, Việt Nam, 700000', 'Fusion Suite Saigon có thể được ví như một chốn bình yên giữa lòng Sài Gòn vội vã. Du khách sẽ được thức dậy giữa mảng xanh của công viên Tao Đàn, tận hưởng một phong cách hiện đại, nhịp sống thư thái, ngập tràn năng lượng khi dừng chân nơi đây.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10019505-1179x853-FIT_AND_TRIM-fd07ac3de294b502f6cd08930407004d.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 3),
(43, 'Classy Boutique Hotel\r\n', '21 Hàng Cá, Hàng Đào, Quận Hoàn Kiếm, Hà Nội, Việt Nam, 101113', 'Lưu trú tại Classy Boutique Hotel là một lựa chọn đúng đắn khi quý khách đến thăm Hàng Đào. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10032202-a86c147575f516313d0c02fd172e095d.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 4),
(44, 'Mövenpick Living West Hanoi\r\n', '21 Duy Tan Street, Dich Vong Hau Ward, Cau Giay District, Quận Cầu Giấy, Hà Nội, Việt Nam, 100000', 'Mövenpick Living West Hanoi toạ lạc tại khu vực / thành phố Quận Cầu Giấy. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/rvN7CENfvyT2YVqT-7R6UjRIibYDnsWI+-nAv8mJ7GI=/158886/photos/76603871_XL.jpg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 4),
(45, 'Mina Hotel & Spa\r\n', '40 Hàng Buồm, Hàng Buồm, Quận Hoàn Kiếm, Hà Nội, Việt Nam, 100000\r\n', 'Mina Hotel & Spa toạ lạc tại khu vực / thành phố Hàng Buồm. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67782748-f4e2c4907a529c058caa41c17c7702ff.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 4),
(46, '3T Hotel & Travel\r\n', '41 Nguyễn Thái Học, Điện Biên, Quận Ba Đình, Hà Nội, Việt Nam, 10000', 'Lưu trú tại 3T Hotel & Travel là một lựa chọn đúng đắn khi quý khách đến thăm Điện Biên. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20050636-cf4c5a5936cc908a23f44ee54f253675.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 4),
(47, 'REY HOTEL HANOI\r\n', '14 P. Lý Nam Đế, Quán Thánh, Hoàn Kiếm, Hàng Mã, Quận Hoàn Kiếm, Hà Nội, Việt Nam, 100000', 'Lưu trú tại REY HOTEL HANOI là một lựa chọn đúng đắn khi quý khách đến thăm Hàng Mã. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20075775-ef6f960a411c39742518456acd6a3b59.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 4),
(48, '22land Residence Hotel 71 Hang Bong\r\n', 'Số 71 Hàng Bông, Hoàn Kiếm, Hàng Bông, Quận Hoàn Kiếm, Hà Nội, Việt Nam, 11000', '22land Residence Hotel 71 Hang Bong là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Hàng Bông. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20058295-e5c5dca7b571594dc93a72836b8f352f.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 4),
(49, 'Khách sạn The Light\r\n', '128-130 Hàng Bông, Hàng Bông, Quận Hoàn Kiếm, Hà Nội, Việt Nam, 111489', 'The Light Hotel Hanoi là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Hàng Bông. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/10026937-f0824149fc940abdc460b8fe68036b97.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 4),
(50, 'Khách sạn Marina Hanoi\r\n', '22 Miếu Đầm, Phường Mễ Trì, Nam Từ Liêm, Hà Nội, Việt Nam, 100000', 'Lưu trú tại Marina Hotel Hanoi là một lựa chọn đúng đắn khi quý khách đến thăm Phường Mễ Trì. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67764379-2000x3000-FIT_AND_TRIM-cc680f5541c5ecbb4bea22e344f5b9f1.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 4),
(51, 'Khách sạn Melia Hà Nội\r\n', '44 Lý Thường Kiệt, Quận Hoàn Kiếm, Trần Hưng Đạo, Quận Hoàn Kiếm, Hà Nội, Việt Nam\r\n', 'Lưu trú tại Melia Hanoi Hotel là một lựa chọn đúng đắn khi quý khách đến thăm Trần Hưng Đạo. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/10027360-bd53841823c9630eaf6fb84263ab3e97.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 0, 4),
(52, 'SOJO Ga Hanoi\r\n', '115 Trần Hưng Đạo, Cửa  Nam, Quận Hoàn Kiếm, Hà Nội, Việt Nam, 10000', 'SOJO Ga Hanoi toạ lạc tại khu vực / thành phố Cửa Nam. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20052027-b6cb3988280dad6e47cd6e6eec3abba0.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 0, 4),
(53, '22Land Residence Hotel\r\n', '50 Phố Trương Công Giai, Quận Cầu Giấy, Hà Nội, Việt Nam, 100000\r\n', 'Lưu trú tại 22Land Residence Hotel là một lựa chọn đúng đắn khi quý khách đến thăm Quận Cầu Giấy. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20055658-ad591b18437109941f15a99a05d73e7a.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 0, 4),
(54, 'Wyndham Garden Hanoi Hotel\r\n', 'HH01 Tố Hữu, Vạn Phúc, Quận Hà Đông, Hà Nội, Việt Nam, 100000', 'Lưu trú tại Wyndham Garden Hanoi Hotel là một lựa chọn đúng đắn khi quý khách đến thăm Vạn Phúc. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20019200-e20221833e7b7606bdc5fb523fc2f1ee.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 0, 4),
(55, 'L7 West Lake Hanoi By Lotte\r\n', '683 Đ. Lạc Long Quân, Phú Thượng, Tây Hồ, Hà Nội, Việt Nam, 100000', 'L7 West Lake Hanoi By Lotte là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Phú Thượng. Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách. Sóng WiFi phủ khắp các khu vực chung của khách sạn cho phép quý khách luôn kết nối với gia đình và bè bạn.\r\n', 'https://ik.imagekit.io/tvlk/apr-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20067381-806a65216bc45a90c771a4088c023772.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `apartment_has_room`
--

CREATE TABLE `apartment_has_room` (
  `apartment_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `price` varchar(20) NOT NULL,
  `image` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment_has_room`
--

INSERT INTO `apartment_has_room` (`apartment_id`, `room_id`, `price`, `image`) VALUES
(1, 1, '1000000', 'https://www.hoteljob.vn/files/Anh-HTJ-Hong/mau-tam-trang%20tri-giuong-khach-san-dep-nhat-19.jpg'),
(1, 2, '2000000', 'http://www.palacesaigon.com/wp-content/uploads/sites/27/2016/06/2024-family-suite-view-1.jpg'),
(1, 3, '10000000', 'https://www.hoteljob.vn/files/Anh-HTJ-Hong/tieu-chi-can-co-trong-thiet-ke-phong-khach-san-1.jpg');

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catagory_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catagory_name`, `location_id`) VALUES
(1, 'Deluxe', 1),
(2, 'Luxury', 1),
(3, 'Premium', 1),
(4, 'Deluxe', 2),
(5, 'Luxury', 2),
(6, 'Prenium', 2),
(7, 'Deluxe', 3),
(8, 'Luxury', 3),
(9, 'Prenium', 3),
(10, 'Deluxe', 4),
(11, 'Luxury', 4),
(12, 'Premium', 4);

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
(4, 'Đà Nẵng'),
(5, 'Nha Trang');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `days` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `total_price` varchar(20) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_date`, `days`, `fullname`, `phone_number`, `total_price`, `customer_id`, `status`) VALUES
(1, '2024-05-03', 0, 'Trần Duy Trường', '0387693816', '1000000', 2, 2),
(2, '2024-05-11', 0, 'nghia', '0', '1000000', 2, 2),
(3, '2024-05-11', 0, 'nghia', '0', '2000000', 2, 2),
(6, '2024-05-11', 0, 'Nguyễn Trung Nghĩa', '088888888', '1000000', 2, NULL),
(8, '2024-05-11', 0, 'Nguyễn Trung Nghĩa', '088888888', '1000000', 2, NULL),
(9, '2024-05-11', 1, 'Nguyễn Trung Nghĩa', '088888888', '1000000', 2, NULL),
(10, '2024-05-11', 1, 'Nguyễn Trung Nghĩa', '088888888', '1000000', 2, NULL),
(11, '2024-05-11', 2, 'Nguyễn Trung Nghĩa', '088888888', '2000000', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_has_room`
--

CREATE TABLE `order_has_room` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `apartment_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_has_room`
--

INSERT INTO `order_has_room` (`id`, `order_id`, `room_id`, `apartment_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 2, 1),
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 1, 1),
(9, 10, 1, 1),
(10, 11, 1, 1);

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
(1, 4, 1, 1);

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
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
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
-- Indexes for table `category`
--
ALTER TABLE `category`
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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `apartment_img`
--
ALTER TABLE `apartment_img`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_has_room`
--
ALTER TABLE `order_has_room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `apartment_room` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`id`),
  ADD CONSTRAINT `apartment_room_1` FOREIGN KEY (`room_id`) REFERENCES `room_typ` (`id`);

--
-- Constraints for table `apartment_img`
--
ALTER TABLE `apartment_img`
  ADD CONSTRAINT `apartment_img` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_apartment` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`id`),
  ADD CONSTRAINT `rating_user` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
