-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2018 lúc 11:46 AM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `room`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gender`
--

CREATE TABLE `gender` (
  `id` int(1) NOT NULL,
  `gender` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(0, 'Nữ'),
(1, 'Nam'),
(2, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `job`
--

INSERT INTO `job` (`id`, `job_name`) VALUES
(0, 'Administrator'),
(1, 'Giáo viên'),
(2, 'Sinh viên'),
(3, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register`
--

CREATE TABLE `register` (
  `id_register` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_room` int(11) DEFAULT NULL,
  `id_time` int(11) DEFAULT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `register`
--

INSERT INTO `register` (`id_register`, `id_user`, `id_room`, `id_time`, `time_start`, `time_end`) VALUES
(1, 1, 3, 8, '15:00:00', '16:00:00'),
(2, 1, 4, 1, '07:00:00', '08:00:00'),
(3, 2, 4, 9, '16:00:00', '17:00:00'),
(11, 2, 1, NULL, '10:00:00', '12:00:00'),
(13, 3, 7, NULL, '07:00:00', '08:00:00'),
(37, 2, 1, NULL, '07:00:00', '08:00:00'),
(39, 18, 6, NULL, '13:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id_room`, `name`) VALUES
(1, '501T52'),
(2, '502T5'),
(3, '503T5'),
(4, '504T5'),
(5, '505T5'),
(6, '506T5'),
(7, '507T5'),
(8, '508T5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `times`
--

CREATE TABLE `times` (
  `id_time` int(11) NOT NULL,
  `khung_gio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `times`
--

INSERT INTO `times` (`id_time`, `khung_gio`) VALUES
(1, '07:00 - 08:00'),
(2, '08:00 - 09:00'),
(3, '09:00 - 10:00'),
(4, '10:00 - 11:00'),
(5, '11:00 - 12:00'),
(6, '13:00 - 14:00'),
(7, '14:00 - 15:00'),
(8, '15:00 - 16:00'),
(9, '16:00 - 17:00'),
(10, '17:00 - 18:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `email` varchar(70) NOT NULL,
  `job` int(3) NOT NULL,
  `gender` int(1) NOT NULL,
  `status` varchar(5000) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `password`, `role`, `fullname`, `dateOfBirth`, `email`, `job`, `gender`, `status`, `avatar`, `phone`) VALUES
(1, 'admin', 'admin', 1, 'Admin', '1975-04-30', 'admin@gmail.com', 0, 1, 'No more information', '', 0),
(2, 'chinh', 'chinh', 0, 'Hà Thị Chinh', '1998-06-17', 'chinh@gmail.com', 2, 0, 'Cuộc đời có kẽ hở, ánh nắng mới có thể rọi vào </br>Không có đêm tối vĩnh hằng, chỉ có bình minh chưa tới', 'http://sohanews.sohacdn.com/thumb_w/660/2017/photo-4-1509012560460-0-0-409-660-crop-1509012656515.jpg', 1674625466),
(3, 'to', '123456', 0, 'Nguyễn Thị Tơ', '1998-01-23', 'to123@gmail.com', 0, 0, 'Hỏi thế gian tình là gì???', '', 0),
(4, 'merlin', 'merlin', 0, 'Merlin', '1985-05-12', 'merlin@gmail.com', 1, 1, 'Giảng dạy: Môn Trí tuệ Nhân tạo', '', 0),
(6, 'gowther', 'gowther', 0, 'Gowther', '1989-09-07', 'gowther@gmail.com', 1, 0, 'Giảng dạy: Giải tích 2 (Lý thuyết)', '', 0),
(7, 'meliodas', 'meliodas', 1, 'Meliodas', '1975-02-17', 'meliodas@gmail.com', 1, 1, 'Giảng dạy: Giải tích 2 (Bài tập)', '', 0),
(18, 'gadien', 'gadien', 0, 'Gadien', '1991-12-30', 'gadien@gmail.com', 1, 1, 'Giảng dạy: Lập trình hướng đối tượng', '', 0),
(25, 'linhngan', 'linhngan', 0, '', '0000-00-00', '', 3, 2, '', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_register`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_room` (`id_room`),
  ADD KEY `id_time` (`id_time`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Chỉ mục cho bảng `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id_time`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `job` (`job`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `register`
--
ALTER TABLE `register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `times`
--
ALTER TABLE `times`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`),
  ADD CONSTRAINT `register_ibfk_3` FOREIGN KEY (`id_time`) REFERENCES `times` (`id_time`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`job`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
