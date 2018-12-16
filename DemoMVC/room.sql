-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 06:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(5) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`) VALUES
(1, 'Máy chiếu'),
(2, 'Loa'),
(3, 'Mic'),
(4, 'Bàn ghế'),
(5, 'Dụng cụ thực hành');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(1) NOT NULL,
  `gender` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(0, 'Nữ'),
(1, 'Nam'),
(2, '');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `job_name`) VALUES
(0, 'Administrator'),
(1, 'Giáo viên'),
(2, 'Sinh viên'),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(5) NOT NULL,
  `major_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `major_id`, `name`) VALUES
(1, '7420101', 'Sinh học'),
(2, '7420201', 'Công nghệ sinh học'),
(3, '7420201CLC', 'Công nghệ sinh học**'),
(4, '7440102', 'Vật lí học'),
(5, '7440112', 'Hoá học'),
(6, '7440112TT', 'Hoá học**'),
(7, '7440122', 'Khoa học vật liệu'),
(8, '7440217', 'Địa lí tự nhiên'),
(9, '7440230QTD', 'Khoa học thông tin địa không gian'),
(10, '7440301', 'Khoa học môi trường'),
(11, '7440301TT', 'Khoa học môi trường**'),
(12, '7460101', 'Toán học'),
(13, '7460117', 'Toán tin'),
(14, '7480110CLC', 'Máy tính và khoa học thông tin**'),
(15, '7480110QTD', 'Máy tính và khoa học thông tin'),
(16, '7510401', 'Công nghệ kỹ thuật hoá học'),
(17, '7510401CLC', 'Công nghệ kỹ thuật hoá học**'),
(18, '7510406', 'Công nghệ kỹ thuật môi trường'),
(19, '7510407', 'Công nghệ kỹ thuật hạt nhân'),
(20, '7720203CLC', 'Hoá dược'),
(21, '7850103', 'Quản lý đất đai'),
(22, 'QHTN01', 'Khí tượng Thủy văn và Biến đổi khí hậu'),
(23, 'QHTN02', 'Tài nguyên trái đất');

-- --------------------------------------------------------

--
-- Table structure for table `register`
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
-- Dumping data for table `register`
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
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `id_room` int(5) NOT NULL,
  `id_equipment` int(5) NOT NULL,
  `information` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
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
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id_time` int(11) NOT NULL,
  `khung_gio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `times`
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
-- Table structure for table `users`
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
  `major` int(5) NOT NULL,
  `gender` int(1) NOT NULL,
  `status` varchar(5000) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `password`, `role`, `fullname`, `dateOfBirth`, `email`, `job`, `major`, `gender`, `status`, `avatar`, `phone`) VALUES
(1, 'admin', 'admin', 1, 'Admin', '1975-04-30', 'admin@gmail.com', 0, 1, 1, 'No more information', '', 0),
(2, 'chinh', 'chinh', 0, 'Hà Thị Chinh', '1998-06-17', 'chinh@gmail.com', 2, 1, 0, 'Cuộc đời có kẽ hở, ánh nắng mới có thể rọi vào </br>Không có đêm tối vĩnh hằng, chỉ có bình minh chưa tới', 'http://sohanews.sohacdn.com/thumb_w/660/2017/photo-4-1509012560460-0-0-409-660-crop-1509012656515.jpg', 1674625466),
(3, 'to', '123456', 0, 'Nguyễn Thị Tơ', '1998-01-23', 'to123@gmail.com', 0, 1, 0, 'Hỏi thế gian tình là gì???', '', 0),
(4, 'merlin', 'merlin', 0, 'Merlin', '1985-05-12', 'merlin@gmail.com', 1, 1, 1, 'Giảng dạy: Môn Trí tuệ Nhân tạo', '', 0),
(6, 'gowther', 'gowther', 0, 'Gowther', '1989-09-07', 'gowther@gmail.com', 1, 1, 0, 'Giảng dạy: Giải tích 2 (Lý thuyết)', '', 0),
(7, 'meliodas', 'meliodas', 1, 'Meliodas', '1975-02-17', 'meliodas@gmail.com', 1, 1, 1, 'Giảng dạy: Giải tích 2 (Bài tập)', '', 0),
(18, 'gadien', 'gadien', 0, 'Gadien', '1991-12-30', 'gadien@gmail.com', 1, 1, 1, 'Giảng dạy: Lập trình hướng đối tượng', '', 0),
(25, 'linhngan', 'linhngan', 0, '', '0000-00-00', '', 3, 1, 2, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_register`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_room` (`id_room`),
  ADD KEY `id_time` (`id_time`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_room` (`id_room`),
  ADD KEY `id_equipment` (`id_equipment`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id_time`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `job` (`job`),
  ADD KEY `gender` (`gender`),
  ADD KEY `major` (`major`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`),
  ADD CONSTRAINT `register_ibfk_3` FOREIGN KEY (`id_time`) REFERENCES `times` (`id_time`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`id_equipment`) REFERENCES `equipment` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`job`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`major`) REFERENCES `major` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
