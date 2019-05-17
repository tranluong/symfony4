-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 25, 2018 lúc 10:12 AM
-- Phiên bản máy phục vụ: 5.7.24-0ubuntu0.16.04.1-log
-- Phiên bản PHP: 7.2.11-2+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `symfony4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180905071018'),
('20180905072347');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `api_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `api_key`) VALUES
(1, 'luong', 'luong.tran@sutrixsolutions.com', '$2y$13$t0JgmQKH8g8mln1ncsS7veBZGdPF9afK149/8YF/6OBxb3MnHK5e.', ''),
(3, 'Test123', 'test.tran@sutrrrrixsolutions.com', '123456', ''),
(4, 'Test1', 'test1.tran@sutrixsolutions.com', '123456', ''),
(5, 'Test2', 'test2.tran@sutrixsolutions.com', '123456', ''),
(6, 'Test3', 'test3.tran@sutrixsolutions.com', '123456', ''),
(7, 'Test4', 'test4.tran@sutrixsolutions.com', '123456', ''),
(8, 'Test5', 'test5.tran@sutrixsolutions.com', '123456', ''),
(10, 'Test5', 'test6@sutrixsolutions.com', '123456', ''),
(11, 'Test7', 'test7@sutrixsolutions.com', '123456', ''),
(21, 'Test8', 'test8@sutrixsolutions.com', '123456', ''),
(22, 'Test7777', 'test9@sutrixsolutions.com', '66666', ''),
(23, 'Test11', 'test11@sutrixsolutions.com', '123456', ''),
(25, 'Test12', 'test12@sutrixsolutions.com', '123456', ''),
(26, 'Test13', 'test13@sutrixsolutions.com', '123456', ''),
(27, 'Test14', 'test14@sutrixsolutions.com', '123456', ''),
(41, 'Test15', 'test15@sutrixsolutions.com', '123456', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
