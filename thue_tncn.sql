-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 06, 2024 lúc 04:02 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thue_tncn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thue`
--

CREATE TABLE `thue` (
  `id` int(11) NOT NULL,
  `soNguoiPhuThuoc` int(11) DEFAULT NULL,
  `tongThuNhap` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `thang` int(11) DEFAULT NULL,
  `thue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thue`
--

INSERT INTO `thue` (`id`, `soNguoiPhuThuoc`, `tongThuNhap`, `user_id`, `status`, `created_at`, `thang`, `thue`) VALUES
(0, 1, 18000000, 1, 'YES', '2024-06-06 03:40:08', 2, 130000),
(1, 1, 17000000, 1, 'YES', '2024-06-06 03:18:20', 1, 80000),
(3, 1, 20000000, 1, 'YES', '2024-06-06 03:54:52', 3, 230000),
(4, 1, 12000000, 1, 'YES', '2024-06-06 04:14:20', 4, 0),
(5, 1, 20000000, 4, 'YES', '2024-06-06 04:18:23', 1, 230000),
(6, 1, 15000000, 5, 'NO', '2024-06-06 13:34:12', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cccd` varchar(255) DEFAULT NULL,
  `birth` datetime DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tax_code` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `cccd`, `birth`, `fullname`, `phone`, `email`, `created_at`, `tax_code`, `dia_chi`) VALUES
(0, 'dai', '123', NULL, NULL, 'Tran Dai', '123', 'dai@gmail.com', '2024-06-05 08:36:14', NULL, NULL),
(1, 'duong', '123456', '123', '2024-06-20 00:00:00', 'Tran Duong', '0981675422', 'duong@gmail.com', '2024-06-06 10:47:22', '123', 'Ha Noi'),
(3, 'tam', '123', '1', '2024-06-06 12:34:56', 'Nguyễn Mạnh Tâm', '0981675422', 'tam@gmail.com', '2024-06-06 10:10:12', '1', NULL),
(4, 'son', '123', '1', NULL, 'Nguyễn Văn Sơn ', '0981675422', 'son@gmail.com', '2024-06-06 09:50:49', '2', NULL),
(5, 'ngan', '123', '123', '2024-06-19 00:00:00', 'Ngan', '0981', 'ngan@gmail.com', '2024-06-06 13:33:30', '123', 'hn');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_thue_user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `thue`
--
ALTER TABLE `thue`
  ADD CONSTRAINT `fk_thue_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
