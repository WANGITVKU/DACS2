-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th5 28, 2023 lúc 06:10 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--
CREATE DATABASE IF NOT EXISTS `banhang` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `banhang`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `sdt` int(128) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(128) NOT NULL,
  `price` int(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `thanh_tien` int(255) NOT NULL,
  `tongtien` int(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `full_name`, `email`, `dia_chi`, `sdt`, `name`, `img`, `price`, `size`, `quantity`, `thanh_tien`, `tongtien`, `time`) VALUES
(1, 'quang', 'huynhquang91100@gmail.com', ' 11', 1, 'giay Nike 3', 'img/NikeAir3.jpg ', 3000000, '42', 3, 9000000, 9000000, '2023-05-27 08:09:55'),
(2, '', '', ' ', 0, 'giay Nike 4', 'img/NikeAir4.jpg', 3500000, 'Chọn size Giày', 2, 7000000, 7000000, '2023-05-27 08:55:39'),
(3, 'Tân', 'quang@gmail.com', ' hung vuong', 914341460, 'giay Nike 3', 'img/NikeAir3.jpg ', 3000000, '42.5', 2, 6000000, 6000000, '2023-05-27 10:44:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giay`
--

CREATE TABLE `giay` (
  `id` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `hot` int(50) NOT NULL,
  `sale` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giay`
--

INSERT INTO `giay` (`id`, `name`, `img`, `price`, `quantity`, `hot`, `sale`) VALUES
('1', 'Giay Nike 1', 'img/NikeAir1.jpg', 20, 2, 1, 1),
('01', 'Giay', 'img/NikeAir2.jpg', 359, 2, 2, 2),
('02', 'áo nam polo', 'img/NikeAir3.jpg', 450, 2, 2, 2),
('3', 'NOWSAIGON SHORT SLEEVE', 'img/3.webp ', 450000000, 2, 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaydep`
--

CREATE TABLE `giaydep` (
  `id` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `img` varchar(200) NOT NULL,
  `price` int(150) NOT NULL,
  `quantity` int(50) NOT NULL,
  `hot` int(50) NOT NULL,
  `sale` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giaydep`
--

INSERT INTO `giaydep` (`id`, `name`, `img`, `price`, `quantity`, `hot`, `sale`) VALUES
('2', 'giay Nike 2', 'img/NikeAir2.jpg', 3000000, 2, 2, 2),
('3', 'giay Nike 3', 'img/NikeAir3.jpg ', 3000000, 2, 2, 2),
('4', 'giay Nike 4', 'img/NikeAir4.jpg', 3500000, 2, 2, 2),
('6', 'Giay MLB', 'img/mlb.jpg', 3500000, 2, 2, 2),
('1', 'nike 1', 'img/NikeAir1.jpg', 25000000, 2, 2, 2),
('5', 'LuisVuitton', 'img/louisvuitton.webp', 35900000, 2, 2, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Cơ sở dữ liệu: `db_conn`
--
CREATE DATABASE IF NOT EXISTS `db_conn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_conn`;
--
-- Cơ sở dữ liệu: `login_register`
--
CREATE DATABASE IF NOT EXISTS `login_register` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `login_register`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'quangnh.22ns@vku.udn.vn', 'huynhquang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Nguyễn Huỳnh Quang', 'huynhquang91100@gmail.com', '$2y$10$WhBPNandJiQXmVAEzEYugOtpuxCHZvqpB9UFaaDAjf0nh8jcLDq.W'),
(2, 'quang', 'huynhquang91100@gmail.con', '$2y$10$sRTx4HVpIIpj6u5Bzx2VaOe61UbEd6SDkhWBFGcEijXuh9O0LDM/q'),
(3, 'Nguyễn Huỳnh Quang', 'huynhquang91100@gmail.com1', '$2y$10$Qi0j0hVotRT/17y22eGh9eKIJVJBE0Cn6dWSlnEqSdQeI1Zvxgfwa'),
(4, 'Nguyễn Huỳnh Quang', 'huynhquang9100@gmail.com1', '$2y$10$2LqmSRWhKA81hxGgXhny4.Y6JyHixCsELTpcaIRXbk4gXkwPEHqvK');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
