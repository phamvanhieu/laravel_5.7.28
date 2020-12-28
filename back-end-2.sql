-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2020 lúc 05:23 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `back-end-2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `au_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`au_id`, `name`, `masv`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Văn Hiệu', '18211TT0435', '359003130', '2019-12-02 10:40:53', '2019-12-02 10:40:53'),
(2, 'Huỳnh Đại Long', '18211TT1949', '123456789', '2019-12-02 10:40:53', '2019-12-02 10:40:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetails`
--

CREATE TABLE `billdetails` (
  `billdetail_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `billdetails`
--

INSERT INTO `billdetails` (`billdetail_id`, `bill_id`, `pro_id`, `qty`, `unit_price`, `created_at`, `updated_at`) VALUES
(65, 117, 67, 1, 32000000, '2019-12-05 07:20:06', '2019-12-05 07:20:06'),
(66, 118, 35, 1, 40000000, '2019-12-07 13:29:28', '2019-12-07 13:29:28'),
(67, 119, 65, 1, 22000000, '2019-12-07 15:27:40', '2019-12-07 15:27:40'),
(68, 119, 2, 1, 10990000, '2019-12-07 15:27:40', '2019-12-07 15:27:40'),
(69, 120, 47, 2, 5000000, '2019-12-12 06:57:31', '2019-12-12 06:57:31'),
(70, 121, 64, 1, 29000000, '2019-12-12 07:04:45', '2019-12-12 07:04:45'),
(71, 122, 64, 12, 29000000, '2019-12-12 07:07:38', '2019-12-12 07:07:38'),
(73, 124, 66, 1, 20990000, '2020-11-09 04:12:19', '2020-11-09 04:12:19'),
(74, 124, 64, 1, 29000000, '2020-11-09 04:12:19', '2020-11-09 04:12:19'),
(75, 124, 67, 1, 32000000, '2020-11-09 04:12:19', '2020-11-09 04:12:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`bill_id`, `customer_id`, `status`, `note`, `total_price`, `created_at`, `updated_at`) VALUES
(117, 107, 1, 'Giao Hàng Nhanh', 32000000, '2019-12-05 07:20:06', '2019-12-05 07:20:40'),
(118, 108, 1, 'hehe', 40000000, '2019-12-07 13:29:28', '2019-12-07 13:30:03'),
(119, 109, 1, 'ye', 32990000, '2019-12-07 15:27:40', '2019-12-09 07:08:34'),
(120, 108, 1, 'fghjhjkl', 10000000, '2019-12-12 06:57:31', '2019-12-12 07:03:59'),
(121, 108, 1, 'ghjk', 29000000, '2019-12-12 07:04:45', '2019-12-12 08:05:44'),
(122, 108, 1, 'dfgdfgfd', 348000000, '2019-12-12 07:07:38', '2019-12-12 07:08:51'),
(124, 111, 0, 'dssadsada', 81990000, '2020-11-09 04:12:19', '2020-11-09 04:12:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`cate_id`, `cate_name`, `created_at`, `updated_at`) VALUES
(1, 'Điện Thoại', '2019-11-29 06:51:08', '2019-11-29 06:51:08'),
(2, 'Laptop', '2019-11-29 06:51:08', '2019-11-29 06:51:08'),
(3, 'Máy Tính Bảng', '2019-11-29 06:51:08', '2019-11-29 06:51:08'),
(4, 'Đồng Hồ', '2019-11-29 06:51:08', '2019-11-29 06:51:08'),
(5, 'Phụ Kiện', '2019-11-29 06:51:08', '2019-11-29 06:51:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `email`, `pro_id`, `comment`, `created_at`, `updated_at`) VALUES
(18, 'vanhieutdc4@gmail.com', 66, 'Sản phẩm rất tốt!!!', '2019-12-07 08:13:34', '2019-12-07 08:13:34'),
(20, 'admin@gmail.com', 66, 'ok', '2020-11-08 21:13:52', '2020-11-08 21:13:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configs`
--

CREATE TABLE `configs` (
  `config_id` int(11) NOT NULL,
  `name_site` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_site` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_site` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `source_map` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_map` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `configs`
--

INSERT INTO `configs` (`config_id`, `name_site`, `phone_site`, `address_site`, `source_map`, `link_map`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Nhóm 4', '0359003130', 'Trường Cao Đẳng Công nghệ Thủ Đức', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5622.150441825892!2d106.7567688125789!3d10.852165741172328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752797e321f8e9%3A0xb3ff69197b10ec4f!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEPDtG5nIG5naOG7hyBUaOG7pyDEkOG7qWM!5e0!3m2!1svi!2s!4v1574774365100!5m2!1svi!2s', 'https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+Cao+%C4%90%E1%BA%B3ng+C%C3%B4ng+ngh%E1%BB%87+Th%E1%BB%A7+%C4%90%E1%BB%A9c/@10.8522102,106.7563593,17z/data=!3m1!4b1!4m5!3m4!1s0x31752797e321f8e9:0xb3ff69197b10ec4f!8m2!3d10.8522102!4d106.758548?hl=vi-VN', '862101604906809screenshot.png', '2019-12-01 12:33:01', '2019-12-01 12:33:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`contact_id`, `email`, `vande`, `note`, `status`, `created_at`, `updated_at`) VALUES
(13, 'admin@gmail.com', 'Mua hàng', 'Gợi ý mua hàng', 1, '2019-12-07 16:30:34', '2019-12-07 16:30:47'),
(15, 'vanhieutdc6@gmail.com', 'Mua hàng', 'mua hang nhanh', 1, '2019-12-09 07:15:18', '2019-12-09 07:15:26'),
(16, 'vanhieutdc6666@gmail.com', 'Mua hàng', 'gfg', 1, '2019-12-12 07:00:33', '2019-12-12 07:05:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `fullname`, `phone`, `email`, `address`, `country`, `created_at`, `updated_at`) VALUES
(107, 'Huỳnh Đại Long', '0354442123', 'huynhdailong.tdc4@gmail.com', 'KDC 25,Phước Điền, Đức Hòa, Mộ Đức, Quảng Ngãi', 'Quảng Ngãi', '2019-12-05 07:20:06', '2019-12-05 07:20:06'),
(108, 'Phạm Văn Hiệu', '0359003130', 'vanhieutdc6@gmail.com', '143/12 đường 11, phường Trường Thọ,quận Thủ Đức,tp.Hồ Chí Minh', 'TP Hồ Chí Minh', '2019-12-07 13:29:28', '2019-12-07 13:29:28'),
(109, 'Phạm Văn Hiệu', '0359003130', 'vanhieutdc4@gmail.com', '143/12 đường 11, phường Trường Thọ,quận Thủ Đức,tp.Hồ Chí Minh', 'TP Hồ Chí Minh', '2019-12-07 15:27:40', '2019-12-07 15:27:40'),
(110, 'Phạm Văn Hiệu', '0359003130', 'TDC@GMAIL.COM', '143/12 đường 11, phường Trường Thọ,quận Thủ Đức,tp.Hồ Chí Minh', 'TP Hồ Chí Minh', '2019-12-12 08:16:22', '2019-12-12 08:16:22'),
(111, 'Phạm Văn Hiệu', '0359003130', 'admin@gmail.com', '143/12 đường 11, phường Trường Thọ,quận Thủ Đức,tp.Hồ Chí Minh', 'Cần Thơ', '2020-11-09 04:12:19', '2020-11-09 04:12:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`, `manu_image`) VALUES
(1, 'Apple', 'apple.jpg'),
(2, 'Samsung', 'samsung.jpg'),
(3, 'Oppo', 'oppo.jpg'),
(4, 'Asus', 'asus.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_28_140826_vp_user', 2),
(4, '2019_11_29_044200_create__categorys_table', 3),
(5, '2019_11_29_052250_create__manufactures_table', 4),
(6, '2019_12_07_123539_create__admins__table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vanhieutdc6@gmail.com', '$2y$10$APs2xI6cc8D2/lmnqox9WeAbWuWXP1JLLDBF53ny9fhE3U6y51Arq', '2019-11-28 07:00:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot` tinyint(4) NOT NULL,
  `sale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `manu_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pro_id`, `name`, `price`, `image`, `description`, `hot`, `sale`, `manu_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(66, 'Điện thoại OPPO Reno 10x Zoom Edition', '20990000', 'oppo-reno-10x-zoom-edition-black-400x460.png', '<h3>Khi chụp ảnh đẹp th&ocirc;i l&agrave; chưa đủ</h3>\r\n\r\n<p>B&ecirc;n cạnh cuộc chạy đua về cấu h&igrave;nh th&igrave; camera l&agrave; điểm n&oacute;ng của c&aacute;c h&atilde;ng khi li&ecirc;n tục c&oacute; những cải tiến mạnh mẽ về camera phone.</p>\r\n\r\n<p>Sau khi chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd/huawei-p30\" target=\"_blank\">Huawei P30 Pro</a>&nbsp;ra mắt kh&ocirc;ng l&acirc;u với khả năng zoom l&ecirc;n tới 10X hay 50X th&igrave; thậm ch&iacute; chiếc&nbsp;OPPO Reno 10x Zoom Edition c&ograve;n l&agrave;m tốt hơn thế.</p>\r\n\r\n<p>M&aacute;y sở hữu cụm 3 camera với độ ph&acirc;n giải camera ch&iacute;nh l&agrave; 48 MP,&nbsp;một camera g&oacute;c rộng 8 MP F/2.2 v&agrave; một&nbsp;ống k&iacute;nh tiềm vọng 13 MP khẩu độ F/3.0 với khả năng zoom hybrid 10X.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với&nbsp;OPPO Reno 10x Zoom Edition th&igrave; bạn c&oacute; thể sử dụng m&aacute;y như một chiếc &quot;k&iacute;nh viễn vọng&quot; khi c&oacute; thể quan s&aacute;t được những vật ở rất xa m&agrave; mắt thường cũng kh&oacute; c&oacute; thể thấy được.</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/201235/oppo-reno-10x-zoom-edition-2-1.jpg\" /></p>\r\n\r\n<p>Ảnh chụp camera thường điện thoại OPPO Reno 10x</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/201235/oppo-reno-10x-zoom-edition-6-1.jpg\" /></p>\r\n\r\n<p>Ảnh chụp ban đ&ecirc;m tr&ecirc;n điện thoại OPPO Reno 10x</p>\r\n\r\n<p>H&atilde;y thử tưởng tượng bạn đang đứng ở xa v&agrave; muốn chụp lấy phần ph&iacute;a tr&ecirc;n của một t&ograve;a nh&agrave; hay một ngọn n&uacute;i th&igrave; t&iacute;nh năng si&ecirc;u zoom tr&ecirc;n&nbsp;Reno 10x Zoom sẽ rất tuyệt vời.</p>\r\n\r\n<p>Đang tải...</p>\r\n\r\n<h3>Camera trước thoắt ẩn thoắt hiện</h3>\r\n\r\n<p>Kh&ocirc;ng chỉ c&oacute; camera sau m&agrave; camera trước tr&ecirc;n m&aacute;y cũng l&agrave; một bước s&aacute;ng tạo của OPPO so với những chiếc m&aacute;y kh&aacute;c đang c&oacute; tr&ecirc;n thị trường.</p>\r\n\r\n<p>OPPO Reno 10x Zoom Edition sở hữu&nbsp;camera selfie ẩn trong khung v&agrave; mở l&ecirc;n bằng cơ chế pop-up sử dụng động cơ để n&acirc;ng l&ecirc;n.</p>\r\n\r\n<p>Cơ chế n&agrave;y sẽ kh&aacute;c so với việc n&acirc;ng to&agrave;n bộ cụm camera như tr&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/dtdd/oppo-find-x\" target=\"_blank\">OPPO Find X</a>&nbsp;n&ecirc;n theo OPPO th&igrave; nhờ đ&oacute; n&oacute; sẽ c&oacute; độ bền cao hơn.</p>\r\n\r\n<p>Tốc độ n&acirc;ng l&ecirc;n hạ xuống của cụm camera n&agrave;y cũng rất nhanh gi&uacute;p bạn cảm thấy hầu như kh&ocirc;ng c&oacute; sự kh&aacute;c biệt so với việc c&oacute; một camera lu&ocirc;n xuất hiện ph&iacute;a trước.</p>\r\n\r\n<p>Xem th&ecirc;m:&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/danh-gia-camera-oppo-reno-10x-zoom-edition-co-ngon-nhu-loi-don--1174799\" target=\"_blank\">Đ&aacute;nh gi&aacute; camera si&ecirc;u phẩm OPPO Reno 10x Zoom Edition: C&oacute; ngon như lời đồn?</a></p>\r\n\r\n<h3>Nhiều c&ocirc;ng nghệ ti&ecirc;n tiến kh&aacute;c</h3>\r\n\r\n<p>Chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\">điện thoại OPPO</a>&nbsp;n&agrave;y sở hữu cấu h&igrave;nh mạnh mẽ nhất thế giới Android trong năm 2019 với con chip&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/snapdragon-855-tong-hop-thong-tin-ve-chip-cao-cap-cua-qualcomm-1110568\" target=\"_blank\">Snapdragon 855 8 nh&acirc;n 64-bit</a>&nbsp;kết hợp với 8 GB RAM v&agrave; 256 GB bộ nhớ trong.</p>\r\n\r\n<p>Cảm biến v&acirc;n tay b&ecirc;n trong m&agrave;n h&igrave;nh cũng xuất hiện tr&ecirc;n m&aacute;y song song với khả năng mở kh&oacute;a bằng khu&ocirc;n mặt gi&uacute;p bạn dễ d&agrave;ng sử dụng mọi l&uacute;c mọi nơi.</p>\r\n\r\n<p>M&aacute;y c&oacute; pin dung lượng 4065 mAh, hỗ trợ sạc nhanh VOOC 3.0 50W cho tốc độ sạc đầy pin nhanh hơn khoảng 30% so với VOOC 2.0 trước đ&oacute;.</p>\r\n\r\n<h3>Kh&ocirc;ng chỉ l&agrave; smartphone m&agrave; c&ograve;n l&agrave; m&oacute;n đồ thời trang</h3>\r\n\r\n<p>Kh&ocirc;ng chỉ c&oacute; nhiều c&ocirc;ng nghệ ti&ecirc;n tiến m&agrave; thiết kế tr&ecirc;n&nbsp;OPPO Reno 10x Zoom Edition cũng sẽ khiến bạn &quot;y&ecirc;u từ c&aacute;i nh&igrave;n đầu ti&ecirc;n&quot;.</p>\r\n\r\n<p>Đầu ti&ecirc;n phải kể đến thiết kế khung viền kim loại c&ugrave;ng 2 mặt k&iacute;nh cường lực&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/corning-ra-mat-gorilla-glass-6-chiu-va-dap-o-do-cao-1-met-1102577\" target=\"_blank\">Corning Gorilla Glass 6</a>&nbsp;mới nhất cho bạn một c&aacute;i nh&igrave;n rất h&agrave;o nho&aacute;ng v&agrave; sang trọng.</p>\r\n\r\n<p>Xem th&ecirc;m:&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/danh-gia-oppo-reno-10x-zoom-rat-dang-dong-tien-bat-gao-1163233\" target=\"_blank\">Đ&aacute;nh gi&aacute; OPPO Reno 10x Zoom: Rất đ&aacute;ng &quot;đồng tiền b&aacute;t gạo&quot;</a></p>\r\n\r\n<p>Điểm nhấn tới từ cụm 3 camera ở mặt lưng đặt dọc c&ugrave;ng&nbsp;logo v&agrave; c&aacute;c th&ocirc;ng tin sản phẩm được đặt dọc theo một đường chạy xuy&ecirc;n suốt vị tr&iacute; ch&iacute;nh giữa tr&ocirc;ng thiết kế n&agrave;y rất hợp l&yacute; v&agrave; đẹp mắt.</p>\r\n\r\n<p>Mặt lưng cũng được ho&agrave;n thiện cong 3D về c&aacute;c cạnh gi&uacute;p m&aacute;y &ocirc;m tay khi cầm nắm sử dụng trong thời gian d&agrave;i.</p>', 1, '0', 3, 1, '2019-11-29 06:20:27', '2019-12-05 06:47:57'),
(2, 'Điện thoại OPPO Reno', '12990000', 'oppo-reno-pink-400x460.png', 'Những năm gần đây OPPO luôn tạo được dấu ấn trên các sản phẩm mới của mình và smartphone vừa ra mắt OPPO Reno là một ví dụ điển hình.\r\n', 1, '10990000', 3, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(3, 'Điện thoại OPPO R17 Pro', '10490000', 'oppo-r17-pro-2-400x460.png', 'Đặc điểm nổi bật của OPPO R17 Pro\r\nTìm hiểu thêmOPPO R17 Pro được xem là chiếc ện đại, c', 0, '10000000', 3, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(4, 'Điện thoại OPPO A3s', '3390000', 'oppo-a3s-32gb-400x460.png', 'OPPO A3s 32GB là một chiếc smartphone mới của OPPO sở hữu giá rẻ hiếm hoi nhưng vẫn được trang bị màn hình tai thỏ và camera kép xu thế của năm 2018.', 0, '3000000', 3, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(5, 'Điện thoại OPPO A7', '4900000', 'oppo-a7-400x460.png', 'OPPO A7, chiếc điện thoại được xem là sự hiện thân của cái đẹp, cái sáng tạo mà OPPO mang đến cho người dùng với mặt lưng được tô điểm bởi những họa tiết 3D thú vị cùng chiếc tai thỏ hình giọt nước đáng yêu.', 0, '4490900', 3, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(6, 'Điện thoại OPPO F9', '5400000', 'oppo-f9-tim-400x460.png', 'Là chiếc điện thoại OPPO mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo, màn hình tràn viền giọt nước và camera chụp chân dung tích hợp trí tuệ nhân tạo A.I hoàn hảo.', 1, '5000000', 3, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(7, 'Điện thoại iPhone 8 Plus 64GB', '19990000', 'iphone-8-plus-1-400x460.png', 'Thừa hưởng những thiết kế đã đạt đến độ chuẩn mực, thế hệ iPhone 8 Plus thay đổi phong cách bóng bẩy hơn và bổ sung hàng loạt tính năng cao cấp cho trải nghiệm sử dụng vô cùng tuyệt vời.', 1, '19000000', 1, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(8, 'Điện thoại iPhone Xr ', '21900000', 'iphone-xr-128gb-red-400x460.png', 'Được xem là phiên bản iPhone giá rẻ đầy hoàn hảo, iPhone Xr 128GB khiến người dùng có nhiều sự lựa chọn hơn về màu sắc đa dạng nhưng vẫn sở hữu cấu hình mạnh mẽ và thiết kế sang trọng.', 1, '20000000', 1, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(9, 'Điện thoại iPhone X', '23000000', 'iphone-x-64gb-1-400x460-1-400x460.png', 'Phone X là cụm từ được rất nhiều người mong chờ muốn biết và tìm kiếm trên Google bởi đây là chiếc điện thoại mà Apple kỉ niệm 10 năm iPhone đầu tiên được bán ra.', 0, '19000000', 1, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(10, 'Điện thoại iPhone Xs', '26000000', 'iphone-xs-gold-400x460.png', 'Đến hẹn lại lên, năm nay Apple giới thiệu tới người dùng thế hệ tiếp theo với 3 phiên bản, trong đó có cái tên iPhone Xs với những nâng cấp mạnh mẽ về phần cứng đến hiệu năng, màn hình cùng hàng loạt các trang bị cao cấp khác. ', 1, '25000000', 1, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(64, 'Điện thoại iPhone Xs Max', '29990000', 'iphone-xs-max-gold-400x460.png', 'Hoàn toàn xứng đáng với những gì được mong chờ, phiên bản cao cấp nhất iPhone Xs Max của Apple năm nay nổi bật với chip A12 Bionic mạnh mẽ, màn hình rộng đến 6.5 inch, cùng camera kép trí tuệ nhân tạo và Face ID được nâng cấp.', 1, '29000000', 1, 1, '2019-11-29 06:20:27', '2019-12-05 06:39:25'),
(65, 'Điện thoại Samsung Galaxy S10+', '28990000', 'samsung-galaxy-s10-plus-512gb-ceramic-black-400x460.png', 'Samsung Galaxy S10+ (512GB) - phiên bản kỷ niệm 10 năm chiếc Galaxy S đầu tiên ra mắt, là một chiếc smartphone hội tủ đủ các yếu tố mà bạn cần ở một chiếc máy cao cấp trong năm 2019.', 1, '22000000', 2, 1, '2019-11-29 06:20:27', '2019-12-05 06:39:22'),
(63, 'Điện thoại Samsung Galaxy Note 10+', '26900000', 'samsung-galaxy-note-10-plus-white-400x460.png', 'Trông ngoại hình khá giống nhau, tuy nhiên Samsung Galaxy Note 10+ sở hữu khá nhiều điểm khác biệt so với Galaxy Note 10 và đây được xem là một trong những chiếc máy đáng mua nhất trong năm 2019, đặc biệt dành cho những người thích một chiếc máy màn hình lớn, camera chất lượng hàng đầu.', 1, '25000000', 2, 1, '2019-11-29 06:20:27', '2019-12-05 06:39:17'),
(62, 'Điện thoại Samsung Galaxy Note 9', '19900000', 'samsung-galaxy-note-9-black-400x460-400x460.png', 'Mang lại sự cải tiến đặc biệt trong cây bút S Pen, siêu phẩm Samsung Galaxy Note 9 còn sở hữu dung lượng pin khủng lên tới 4.000 mAh cùng hiệu năng mạnh mẽ vượt bậc, xứng đáng là một trong những chiếc điện thoại cao cấp nhất của Samsung', 0, '18000000', 2, 1, '2019-11-29 06:20:27', '2019-12-05 06:39:07'),
(15, 'Điện thoại Samsung Galaxy A80', '14000000', 'samsung-galaxy-a80-gold-400x460.png', 'Samsung Galaxy A80 là chiếc smartphone mang trong mình rất nhiều đột phá của Samsung và hứa hẹn sẽ là \"ngọn cờ đầu\" cho những chiếc smartphone sở hữu một màn hình tràn viền thật sự.', 0, '12900000', 2, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(16, 'Điện thoại Samsung Galaxy A70', '7900000', 'samsung-galaxy-a70-white-400x460.png', 'Samsung Galaxy A70 là một phiên bản phóng to của chiếc Samsung Galaxy A50 đã ra mắt trước đó với nhiều cải tiến tới từ bên trong.', 0, '6900000', 2, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(17, 'Điện thoại ASUS Zenfone Max Pro M2', '10900000', 'asus-zenfone-max-pro-m2-400x460.png', 'Sau thành công của Zenfone Max Pro M1, Asus tiếp tục giới thiệu đến người dùng phiên bản kế thừa với cái tên ASUS Zenfone Max Pro M2, một chiếc điện thoại đầy sự trẻ trung trong thiết kế, mạnh mẽ trong hiệu năng và bền bỉ trong trải nghiệm.', 0, '8900000', 4, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(18, 'Điện thoại Asus Zenfone 4 Max ZC520KL', '5600000', 'asus-zenfone-4-max-zc520kl-460-400x460.png', 'Tiếp nối sự thành công của chiếc Zenfone 3 Max thì Asus tiếp tục đưa đến người dùng thế hệ Zenfone Max tiếp theo với tên gọi Asus Zenfone 4 Max.', 0, '4600000', 4, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(19, 'Điện thoại ASUS Zenfone Max Plus M1 - ZB570TL', '6700000', 'asus-zenfone-max-m1-plus-zb570tl-1-400x460.png', 'Zenfone Max Plus M1 là chiếc smartphone theo xu thế màn hình viền mỏng đầu tiên của ASUS. Với ưu điểm thiết kế đẹp, pin lớn truyền thống dòng Zenfone Max, camera kép và mức giá tầm trung cực kì hấp dẫn và đáng sở hữu.', 0, '5670000', 4, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(20, 'Điện thoại Asus Zenfone C', '2500000', 'asus-zenfone-c-533-400x533.png', 'Zenfone C chính là dòng sản phẩm có giá thành thấp nhất trong các dòng sản phẩm Zenfone của Asus, máy có các chức năng cơ bản nhất cho người dùng.', 0, '2000000', 4, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(21, 'Điện thoại Asus Zenfone 5', '7890000', 'asus-zenfone-5-cpu-12ghz-400x533.png', 'Nếu bạn đã là một tín đồ của Zenfone thì nay đã có thêm một lựa chọn cho dòng Zenfone 5 với mức giá không thể rẻ hơn - Asus Zenfone 5 (CPU-1.2GHz). Phiên bản này không có gì khác với phiên bản Zenfone 5 trước đây ngoài xung nhịp vi xử lý được giảm xuống 1.2GHz cùng với mức giá dễ chịu hơn đàn anh. ', 1, '5670000', 4, 1, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(27, 'Laptop Apple MacBook Air 2017 i5 1.8GHz/8GB/128GB (MQD32SA/A)', '22000000', 'apple-macbook-air-mqd32sa-a-i5-5350u-600x600.jpg', 'MacBook Air 2017 i5 128GB là mẫu laptop văn phòng, có thiết kế siêu mỏng và nhẹ, vỏ nhôm nguyên khối sang trọng. Máy có hiệu năng ổn định, thời lượng pin cực lâu 12 giờ, phù hợp cho hầu hết các nhu cầu làm việc và giải trí. ', 1, '20000000', 1, 2, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(28, 'Laptop Apple MacBook Air 2018 i5/8GB/128GB', '30000000', 'apple-macbook-air-mre82sa-a-i5-8gb-128gb-2018-2-600x600.jpg', 'Sở hữu thiết kế đơn giản và sang trọng bậc nhất thế giới, Laptop Apple MacBook Air 128 GB hoàn toàn phù hợp với những ai yêu thích vẻ đẹp tinh tế, hiện đại. Bên cạnh đó, máy trang bị ổ cứng SSD có thể khởi chạy các ứng dụng cực nhanh, RAM 8 GB xử lý đa nhiệm hiệu quả và thời lượng pin ấn tượng lên đến 12 giờ.', 1, '28900000', 1, 2, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(67, 'Laptop Apple MacBook Air 2018 i5/8GB/256GB (MREF2SA/A)', '34000000', 'apple-macbook-air-mref2sa-a-i5-8gb-256gb-content-manhinhdmx-1-1-600x600.jpg', '<p>Với&nbsp;OPPO Reno 10x Zoom Edition th&igrave; bạn c&oacute; thể sử dụng m&aacute;y như một chiếc &quot;k&iacute;nh viễn vọng&quot; khi c&oacute; thể quan s&aacute;t được những vật ở rất xa m&agrave; mắt thường cũng kh&oacute; c&oacute; thể thấy được.</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/201235/oppo-reno-10x-zoom-edition-2-1.jpg\" /></p>\r\n\r\n<p>Ảnh chụp camera thường điện thoại OPPO Reno 10x</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/201235/oppo-reno-10x-zoom-edition-6-1.jpg\" /></p>\r\n\r\n<p>Ảnh chụp ban đ&ecirc;m tr&ecirc;n điện thoại OPPO Reno 10x</p>\r\n\r\n<p>H&atilde;y thử tưởng tượng bạn đang đứng ở xa v&agrave; muốn chụp lấy phần ph&iacute;a tr&ecirc;n của một t&ograve;a nh&agrave; hay một ngọn n&uacute;i th&igrave; t&iacute;nh năng si&ecirc;u zoom tr&ecirc;n&nbsp;Reno 10x Zoom sẽ rất tuyệt vời.</p>', 0, '32000000', 1, 2, '2019-11-29 06:20:27', '2019-12-05 08:24:21'),
(31, 'Laptop Asus VivoBook X507MA N4000/4GB/256GB/Win10 (BR318T)', '6490000', 'asus-x507ma-n4000-4gb-256gb-win10-br318t-8-600x600.jpg', 'Laptop Asus X507MA (BR318T) là chiếc laptop văn phòng - học tập sở hữu thiết kế mỏng nhẹ, hoạt động nhanh mượt với ổ cứng SSD. Máy tính xách tay này còn được trang bị tính năng bảo mật bằng vân tay 360 độ, giúp mở máy nhanh chóng và an toàn.', 1, '6000000', 4, 2, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(32, 'Laptop Asus ZenBook UX433FA i5 8265U/8GB/256GB/Win10 (A6061T)\r\n', '22490000', 'asus-zenbook-ux433fa-i5-8265u-8gb-256gb-win10-a60-1-600x600.jpg', 'Asus vừa cho ra mắt chiếc laptop Asus Zenbook UX433FA i5 (A6061T) với thiết kế cực kì sang trọng, hiện đại, siêu mỏng, siêu nhẹ giúp thuận tiện cho việc di chuyển. Cấu hình mạnh mẽ đáp ứng mượt mà các ứng dụng văn phòng và xử lý tốt các thao tác kéo thả cơ bản trên các ứng dụng đồ họa sẽ là một sự lựa chọn rất đáng để cân nhắc dành cho khách hàng là nhân viên văn phòng hoặc doanh nhân.', 1, '2190000', 4, 2, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(33, 'Laptop Asus VivoBook X509FJ i7 8565U/8GB/512GB/2GB MX230/Win10 (EJ133T)\r\n', '18890000', 'asus-vivobook-x509f-i7-8565u-8gb-mx230-win10-ej13-5-2-1-2-1-600x600.jpg', 'Laptop Asus Vivobook X509FJ (EJ133T) là chiếc máy tính xách tay mang đến hiệu năng mạnh mẽ cùng hình ảnh chân thực đáp ứng mọi nhu cầu cho dù là học tập văn phòng hay giải trí. ', 0, '17900000', 4, 2, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(34, 'Laptop Asus VivoBook S530UN i7 8550U/8GB/256GB/2GB MX150/Win10 (BQ028T)', '22190000', 'asus-s530un-bq028t-16-600x600.jpg', 'Laptop Asus S530UN i7 8550U là mẫu laptop mỏng nhẹ cấu hình mạnh đại diện cho sự hiện đại, tinh tế và thanh lịch. Điểm nhất đặc biệt ở chiếc máy tính là trọng lượng chỉ 1.76 kg hoàn toàn cơ động, dễ dàng để bạn cho vào balo và làm việc ở bất kì nơi đâu. Sáng tạo không giới hạn với chip Intel Core i7 mạnh mẽ, card đồ họa rời NVIDIA giải trí cực đỉnh.', 1, '21900000', 4, 2, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(35, 'Laptop Asus Gaming ROG Strix G531 i7 9750H/8GB/512GB/6GB GTX2060/Win10 (VAL218T)', '40490000', 'asus-rog-g531-i7-9750h-8gb-512gb-6gb-gtx2060-win10-14-600x600.jpg', 'Laptop Asus ROG G531 là dòng laptop gaming nổi bật của Asus. Máy sở hữu cấu hình khủng, thiết kế không quá hầm hố nhưng vẫn đầy uy lực kết hợp cùng dải đèn LED chuyển màu tạo sự bắt mắt, nâng tầm đẳng cấp. chỉ những nét nổi bật trên đã giúp máy có một màu sắc riêng trong dòng laptop gaming.', 1, '40000000', 4, 2, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(36, 'Máy tính bảng iPad Pro 11 inch Wifi 64GB (2018)', '21900000', 'ipad-pro-11-inch-2018-64gb-wifi-33397-chitiet-400x460.png', 'Máy tính bảng iPad Pro 11 inch 64GB Wifi (2018) được ra mắt vào cuối năm 2018, thu hút nhân viên văn phòng, doanh nhân bởi thiết kế hiện đại, đầy sức đột phá và một cấu hình mạnh mẽ đáp ứng tốt tất cả các nhu cầu từ giải trí đến làm việc.', 1, '20000000', 1, 3, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(37, 'Máy tính bảng iPad Mini 7.9 inch Wifi Cellular 64GB (2019)\r\n', '14490000', 'ipad-mini-79-inch-wifi-cellular-64gb-2019-gold-400x460.png', 'iPad Mini 7.9 inch Wifi Cellular 64GB (2019) đánh dấu sự trở lại mạnh mẽ của Apple trong phân khúc máy tính bảng nhỏ gọn, có thể dễ dàng mang theo bên mình.', 0, '14000000', 1, 3, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(38, 'Máy tính bảng iPad Wifi Cellular 32GB (2018)', '14100000', 'ipad-wifi-cellular-32g-2018-gold-400x460.png', 'Máy tính bảng iPad 6th Wifi Cellular 32 GB mang trong mình cấu hình mạnh mẽ cùng giá thành hợp lý.', 1, '13900000', 1, 3, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(39, 'Máy tính bảng iPad Wifi 32GB (2018)', '8900000', 'ipad-6th-wifi-32gb-1-400x460.png', 'iPad 6th Wifi 32GB với nhiều nâng cấp về phần cứng, đặc biệt hơn giá của sản phẩm này được định hình ở phân khúc giá rẻ, sinh viên sẽ là sự lựa chọn “không quá xa tầm tay” người dùng.', 1, '7900000', 1, 3, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(40, 'Máy tính bảng iPad Air 10.5 inch Wifi 64GB 2019', '13900000', 'ipad-air-105-inch-wifi-2019-gold-400x460.png', 'Đã rất lâu rồi Apple mới lại nâng cấp dòng iPad Air của mình và với phiên bản iPad Air 10.5 inch Wifi 2019 thì thực sự người dùng đã có được một thiết bị được nâng cấp mạnh mẽ sau thời gian dài chờ đợi.', 1, '13000000', 1, 3, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(41, 'Máy tính bảng Samsung Galaxy Tab S6\r\n', '18490000', 'samsung-galaxy-tab-s6-400x460.png', 'Samsung Galaxy Tab S6 là chiếc máy tính bảng 2 trong 1, được thiết kế để giúp cho những người cần một sản phẩm đủ gọn gàng nhưng mạnh mẽ.', 1, '18000000', 2, 3, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(42, 'Máy tính bảng Samsung Galaxy Tab A 10.1 T515 (2019)', '7490000', 'samsung-galaxy-tab-a-101-t515-2019-gold-400x460.png', 'Samsung Galaxy Tab A 10.1 T515 (2019) là chiếc máy tính bảng có màn hình lớn cùng cấu hình vừa phải đáp ứng tốt cho bạn trong hầu hết các nhu cầu giải trí hằng ngày.', 1, '6900000', 2, 3, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(43, 'Máy tính bảng Samsung Galaxy Tab A 10.5', '9490000', 'samsung-galaxy-tab-a-105-inch-chitietblue-400x460.png', 'Là một phiên bản máy tính bảng giá rẻ của dòng Tab S4, Samsung Galaxy Tab A 10.5 inch có giá bán phải chăng và phục vụ tốt nhu cầu sử dụng của người dùng.', 0, '9000000', 2, 3, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(44, 'Máy tính bảng Samsung Galaxy Tab A8 8\" T295 (2019)', '3290000', 'samsung-galaxy-tab-a8-t295-2019-silver-400x460.png', 'Samsung Galaxy Tab A8 8 inch T295 (2019) là một chiếc máy tính bảng gọn nhẹ, với màn hình vừa đủ có thể giúp bạn giải trí hay hỗ trợ trẻ nhỏ trong việc học tập.', 0, '3000000', 2, 3, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(45, 'Apple Watch S3 GPS 42mm viền nhôm xám dây cao su', '6490000', 'apple-watch-s3-gps-42mm-vien-nhom-day-cao-su-den-chi-tiet-600x600.png', 'Đo nhịp tim, Tính lượng Calories tiêu thụ, Đếm số bước chân, Tính quãng đường chạy, Chế độ luyện tập, Báo thức, Nghe nhạc với tai nghe Bluetooth, Từ chối cuộc gọi, Dự báo thời tiết, Điều khiển chơi nhạc, Thay mặt đồng hồ', 1, '6000000', 1, 4, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(46, 'Apple Watch S4 GPS 44mm viền nhôm dây vải\r\n', '11390000', 'apple-watch-s4-gps-44mm-vien-nhom-day-vai-hong-nt-600x600.jpg', 'Apple Watch S4 GPS 44mm viền nhôm dây vải có thiết kế khá đơn giản và nổi bật. Sử dụng dây từ chất liệu vải, giúp đồng hồ cá tính hơn, nhẹ nhàng hơn khi đeo trong thời gian dài. Ngoài ra dây vải còn giúp bạn thấy dễ chịu hơn khi tay ra mồ hôi lúc vận động nhiều.', 0, '11000000', 1, 4, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(47, 'Apple Watch S3 GPS, 38mm viền nhôm, dây cao su\r\n', '5690000', 'apple-watch-3-phien-ban-38-mm-chi-tiet-600x600.png', 'Theo dõi giấc ngủ, Đo nhịp tim, Tính lượng Calories tiêu thụ, Đếm số bước chân, Chế độ luyện tập, Báo thức, Gọi điện trên đồng hồ, Từ chối cuộc gọi, Đồng hồ bấm giờ, Rung thông báo, Thay mặt đồng hồ', 1, '5000000', 1, 4, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(48, 'Vòng đeo tay thông minh Samsung Gear Fit2 Pro', '3790000', 'samsung-gear-fit2-pro-2-330x330.png', 'Theo dõi giấc ngủ, Tính lượng Calories tiêu thụ, Đếm số bước chân, Tính quãng đường chạy, Chế độ luyện tập, Nghe nhạc với tai nghe Bluetooth, Màn hình luôn hiển thị, Đồng hồ bấm giờ, Rung thông báo', 1, '3500000', 2, 4, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(49, 'Đồng hồ thông minh Samsung Galaxy Watch 42mm', '6640000', 'samsung-galaxy-watch-42mm-nt-600x600.jpg', 'Theo dõi giấc ngủ, Đo nhịp tim, Tính lượng Calories tiêu thụ, Đếm số bước chân, Tính quãng đường chạy, Chế độ luyện tập, Cài ứng dụng Galaxy App, Báo thức, Nghe nhạc với tai nghe Bluetooth, Màn hình luôn hiển thị, Gọi điện trên đồng hồ, Từ chối cuộc gọi, Đồng hồ bấm giờ, Điều khiển chơi nhạc, Rung thông báo, Thay mặt đồng hồ, Nhận cuộc gọi, Tìm điện thoại, Nhắc nhở', 1, '6000000', 2, 4, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(50, 'Đồng hồ thông minh Samsung Galaxy Watch Active R500', '5290000', 'samsung-galaxy-watch-active-r500-10-600x600.jpg', 'Với thiết kế tối giản nhưng không kém phần thanh lịch, đồng hồ thông minh mới nhất của Samsung - Galaxy Watch Active, sẽ mang đến cho bạn trải nghiệm công nghệ và tính năng theo dõi sức khỏe tuyệt vời.', 0, '4900000', 2, 4, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(51, 'Adapter chuyển cổng Iphone 4 sang VGA Apple\r\n', '590000', 'adapter-chuyen-cong-iphone-4-sang-vga-apple-300x300.jpg', 'Sản phầm là phụ kiện cho phép chuyển dữ liệu từ chân cắm 30 chân của thiết bị di động iPhone 4, iPhone 4S, iPad 2, iPad 3 sang cổng VGA. Đây là một giải pháp cho phép đưa hình ảnh, video, Slideshows từ điện thoại, máy tính bảng tới TV, máy chiếu hay màn hình có hỗ trợ cổng kết nối VGA.', 1, '400000', 1, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(52, 'Dây đeo Apple watch 42-44mm Jinya JA4005 Đen\r\n', '550000', 'day-deo-apple-watch-42-44mm-jinya-ja4005-den-avatar-600x600.jpg', 'Được làm bằng chất liệu da cao cấp, không bị bong, tróc tạo cảm giác thoải mái trong quá trình sử dụng.', 1, '400000', 1, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(53, 'Bút cảm ứng Apple Pencil\r\n', '2990000', 'apple-pencil-10-400x460.png', 'Bút cảm ứng Apple Pencil không sử dụng cho iPad Pro 11inch và iPad dùng cổng sạc Type C', 0, '2000000', 1, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(54, 'Tai nghe Bluetooth AirPods 2 Apple MV7N2 Trắn', '5990000', 'tai-nghe-bluetooth-airpods-2-apple-mv7n2-trang-avatar-1-600x600.jpg', 'hiết kế đơn giản, thời trang và nhỏ gọn.\r\nTrang bị chip H1 hoàn toàn mới, cho tốc độ kết nối, chuyển đổi giữa các thiết bị nhanh chóng.\r\nKích hoạt nhanh trợ lý ảo Siri bằng cách nói \"Hey, Siri\".\r\nCó thể sử dụng nghe nhạc lên đến 5 giờ (âm lượng 50%) cho mỗi một lần sạc đầy.\r\nTích hợp công nghệ sạc nhanh hiện đại. Sạc nhanh 15 phút có thể nghe nhạc 3 giờ (âm lượng 50%).\r\nSử dụng song song với hộp sạc có thể dùng được lên đến 24 giờ.\r\nTính năng nhận cuộc gọi, kích hoạt Siri, nghe hoặc tạm dừng đoạn nhạc đang phát.\r\nSản phẩm chính hãng Apple, nguyên seal 100%.\r\nLưu ý: Thanh toán trước khi mở seal.', 1, '5000000', 1, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(55, 'Kính thực tế ảo Samsung Gear VR3\r\n', '2490000', 'kinh-thuc-te-ao-samsung-gear-vr-sm-r325-400x400.png', 'Kính thực tế ảo Samsung Gear VR3 mang đến cho bạn một trải nghiệm chưa từng có, nơi mà bạn sẽ được đắm chìm trong những thứ mà trước đây bạn chỉ có thể tưởng tượng mà thôi.', 1, '2000000', 2, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(56, 'Combo phụ kiện Galaxy S5 option 2\r\n', '500000', 'com-bo-phu-kien-s5-300-2-nowatermark-300x300.jpg', 'combo phụ kiện samsung', 0, '100000', 2, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(57, 'Dây đeo Samsung Galaxy Watch Active R500\r\n', '650000', 'day-samsung-galaxy-watch-active-samsung-r500-den-avatar-600x600.jpg', 'Dây đeo thiết kế sang trọng, màu sắc trẻ trung và hiện đại.\r\nDây đeo được làm từ chất liệu cao su tổng hợp, có độ dẻo dai, linh hoạt và độ bền rất cao.\r\nSản phẩm có nhiều màu sắc cho bạn chọn lựa và thay đổi.', 1, '600000', 2, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(58, 'Chuột quang có dây Asus UT210\r\n', '350000', 'Chuot-quang-co-day-Asus-UT210-l.jpg', 'Chuot-quang-co-day-Asus-UT210-l.jpg', 0, '200000', 4, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(59, 'Asus Zenwatch WI500Q\r\n', '1000000', 'asus-zenwatch-wi500q-400x460.png', 'Asus Zenwatch WI500Q - Smartwatch mới đến từ Asus', 1, '890000', 4, 4, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(60, 'Ốp lưng Oppo A5s nhựa dẻo Woven OSMIA Navy\r\n', '70000', 'op-lung-oppo-a5s-nhua-deo-woven-osmia-navy-1-600x600.jpg', 'Kiểu dáng thời trang và đẹp mắt\r\nThiết kế vừa vặn và ôm sát thân máy\r\nDễ dàng tháo/lắp ốp vào máy', 1, '69000', 3, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27'),
(61, 'Ốp lưng Oppo F1s Nhựa hình thú OSMIA Sao Hồng', '50000', 'op-lung-oppo-f1s-nhua-hinh-thu-osmia-ck160938-sao-avatar--300x300.jpg', '<p>Cung cấp sức mạnh cho chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">smartphone</a>&nbsp;l&agrave; con chip tầm trung mới Snapdragon 665. So với phi&ecirc;n bản Snapdragon 660 trước đ&oacute;, phi&ecirc;n bản chip n&agrave;y mang đến hiệu năng mạnh mẽ v&agrave; tối ưu tiết kiệm điện hơn.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/202028/oppo-a9-tgdd-5-1.jpg\" onclick=\"return false;\"><img alt=\"Điện thoại OPPO A9 2020 | Hiệu năng mạnh mẽ\" src=\"https://cdn.tgdd.vn/Products/Images/42/202028/oppo-a9-tgdd-5-1.jpg\" /></a></p>\r\n\r\n<p>Kết hợp với RAM lớn đến 8 GB v&agrave;&nbsp;chế độ GameBoost 2.0 đi k&egrave;m, OPPO A9 (2020) đem lại hiệu năng mạnh mẽ, trải nghiệm game ổn định v&agrave; đa nhiệm mượt m&agrave; hơn hẳn.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/202028/oppo-a9-tgdd-15.jpg\" onclick=\"return false;\"><img alt=\"Điện thoại OPPO A9 2020 | Điểm Antutu\" src=\"https://cdn.tgdd.vn/Products/Images/42/202028/oppo-a9-tgdd-15.jpg\" /></a></p>\r\n\r\n<p>M&aacute;y chiến tốt c&aacute;c d&ograve;ng game hiện nay như PUBG hay Li&ecirc;n Qu&acirc;n Mobile. Ở một số d&ograve;ng game kh&aacute;c như Asphalt 8, người d&ugrave;ng c&oacute; thể chỉnh cấu h&igrave;nh lại để đem lại trải nghiệm tốt hơn.</p>', 0, '20000', 3, 5, '2019-11-29 06:20:27', '2019-11-29 06:20:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reps`
--

CREATE TABLE `reps` (
  `rep_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `email_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reps`
--

INSERT INTO `reps` (`rep_id`, `contact_id`, `email_user`, `note`, `created_at`, `updated_at`) VALUES
(9, 13, 'admin@gmail.com', 'ok bạn', '2019-12-07 16:30:47', '2019-12-07 16:30:47'),
(10, 15, 'vanhieutdc6@gmail.com', 'ok ban', '2019-12-09 07:15:26', '2019-12-09 07:15:26'),
(11, 16, 'vanhieutdc6666@gmail.com', 'ok', '2019-12-12 07:05:24', '2019-12-12 07:05:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_users`
--

CREATE TABLE `vp_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) DEFAULT 1,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_users`
--

INSERT INTO `vp_users` (`id`, `email`, `password`, `level`, `fullname`, `phone`, `country`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vanhieutdc6@gmail.com', '$2y$10$wltoIu6.B9rOyfPVOE7znubodp7cRFjvnQfx7dnzfegZT1eycP4Ge', 1, 'Phạm Văn Hiệu', '0359003130', 'TP Hồ Chí Minh', '143/12 đường 11, phường Trường Thọ,quận Thủ Đức,tp.Hồ Chí Minh', 'i3BJVfhgiTbUPbAQUJ41L1WlRSOCYf6AmmI0cIH7ANzy7nzuXJ3aC33ETwEN', NULL, '2019-12-12 08:43:01'),
(2, 'admin@gmail.com', '$2y$10$fVx1eF5QtFyln0rPo4/yReOTkrxz95YX6lsh.DGPbEqz8OuMPPMr6', 2, 'Phạm Văn Hiệu', '0359003130', 'Cần Thơ', '143/12 đường 11, phường Trường Thọ,quận Thủ Đức,tp.Hồ Chí Minh', 'r5mHibdCyV0vedJPb2W7blgZwz2XoYR450TrbFbTiqrc2JxueVrSeaQovT0t', NULL, '2020-11-09 04:07:40'),
(11, 'huynhdailong.tdc4@gmail.com', '$2y$10$.xsHKMt4y0QwV7zVMWNlKei461ReBaN6b4g.J7/lGX5LtjwROq6Bq', 1, 'Huỳnh Đại Long', '0354442123', 'Quảng Ngãi', 'KDC 25,Phước Điền, Đức Hòa, Mộ Đức, Quảng Ngãi', NULL, '2019-12-05 00:18:16', '2019-12-05 00:19:35'),
(17, 'vanhieutdc6666@gmail.com', '$2y$10$27clks14R9wPrASdiv35X.NOsRclz6MweLTkwZ.JpdTnkpiBNVom2', 1, 'Phạm Văn Hiệu', NULL, NULL, NULL, 'gN5xV357EQOpptFbWJt4meceykq2ik0SEQBjHfAk66zZhhko4whYhfcF7leZ', '2019-12-11 23:59:11', '2019-12-12 07:07:11'),
(18, 'tdc@gmail.com', '$2y$10$XXQc0spVOdE7IzViCw88quIXreI3zLUXerHpOduNcqWed5E4KDMmm', 1, 'lolo', NULL, NULL, NULL, 'uQlyS845fGevYJRxDGNFUxLpAAT3Y5oMXZnZveIeTSWReqoZMsqZePuyBdF3', '2019-12-12 01:08:28', '2019-12-12 08:42:47'),
(19, 'vanhieutdc3@gmail.com', '$2y$10$wePwFGX8xb5zd2aSBZuQeuSC5000yqV1VVMC8uNSk0Hd5.8mhK3xG', 1, 'Phạm Văn Hiệu', NULL, NULL, NULL, NULL, '2020-06-20 23:06:36', '2020-06-20 23:06:36'),
(20, 'aaaa@gmail.com', '$2y$10$fVx1eF5QtFyln0rPo4/yReOTkrxz95YX6lsh.DGPbEqz8OuMPPMr6', 1, 'Phạm Văn Hiệu', NULL, NULL, NULL, 'Bip9zW2fVJcw0NFjjrNSXziVEmQpsMqwN1Fe0dq2rUEeBbhGSVpp75DQl59Q', '2020-11-08 21:07:01', '2020-11-09 04:07:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`au_id`);

--
-- Chỉ mục cho bảng `billdetails`
--
ALTER TABLE `billdetails`
  ADD PRIMARY KEY (`billdetail_id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`config_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Chỉ mục cho bảng `reps`
--
ALTER TABLE `reps`
  ADD PRIMARY KEY (`rep_id`);

--
-- Chỉ mục cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `billdetails`
--
ALTER TABLE `billdetails`
  MODIFY `billdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `configs`
--
ALTER TABLE `configs`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `reps`
--
ALTER TABLE `reps`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
