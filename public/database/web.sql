-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2023 at 02:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `name`, `phone`) VALUES
(1, 'admin@gmail.com', '$2y$10$o/KkxWJy6w.sZ2iJEBWqN.t4vqliBnWQigoZwmq68KurELAWyIvMy', 'Admin', '0123456789'),
(2, 'bambee@gmail.com', '$2y$10$2dUU3VCBfTGqvp8hEe4GXexuQcK94M.IrLvp1WUbzK8nWe45Qj6yu', 'BamBee', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) UNSIGNED NOT NULL,
  `course_id` text NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_id`, `course_name`) VALUES
(1, 'BODA1', 'Bóng đá 1'),
(2, 'BODA2', 'Bóng đá 2'),
(3, 'CALO1', 'Cầu lông 1'),
(4, 'CALO2', 'Cầu lông 2'),
(5, 'BODA1', 'Bóng đá 1'),
(6, 'BODA2', 'Bóng đá 2'),
(7, 'BOCH1\r\n', 'Bóng chuyền 1'),
(8, 'BOCH2', 'Bóng chuyền 2'),
(9, 'BOBA2', 'Bóng bàn 2'),
(10, 'BOBA1', 'Bóng bàn 1\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-07-27-093720', 'App\\Database\\Migrations\\CreateTableUsers', 'default', 'App', 1690451432, 1),
(2, '2023-07-27-102806', 'App\\Database\\Migrations\\CreateTablePaperForm', 'default', 'App', 1690455829, 2),
(3, '2023-06-23-161103', 'App\\Database\\Migrations\\CreateTableUsers', 'default', 'App', 1691505337, 3),
(4, '2023-07-03-161337', 'App\\Database\\Migrations\\CreateTableUpload', 'default', 'App', 1691505337, 3),
(6, '2023-08-08-135743', 'App\\Database\\Migrations\\CreateTableAccount', 'default', 'App', 1691513179, 4),
(7, '2023-08-09-074815', 'App\\Database\\Migrations\\CreateTableCourse', 'default', 'App', 1691567426, 5);

-- --------------------------------------------------------

--
-- Table structure for table `paper_form`
--

CREATE TABLE `paper_form` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_birthday` varchar(100) NOT NULL,
  `user_class` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course_id` varchar(100) DEFAULT NULL,
  `course_name` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `exam_date` varchar(100) NOT NULL,
  `exam_mark` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `paper_form`
--

INSERT INTO `paper_form` (`id`, `user_id`, `user_fullname`, `user_birthday`, `user_class`, `user_phone`, `email`, `course_id`, `course_name`, `room`, `exam_date`, `exam_mark`, `semester`, `year`, `flag`) VALUES
(1, '3119410001', 'Nguyễn Vân', '2023-08-25', 'DCT1191', '0915213123', 'user1@gmail.com', '861303', 'Chủ nghĩa xã hội khoa học', 'C002', '2022-08-19', '4.95', '1', '2022', 0),
(2, '3119410011', 'Nguyễn Văn A', '2023-08-03', 'DCT1192', '0987654321', 'user2@gmail.com', '861303', 'Chủ nghĩa xã hội khoa học', 'C001', '2023-07-20', '6', '1', '2023', 0),
(3, '3119410232', 'Nguyễn Kha', '2023-08-25', 'DCT1191', '0915514935', 'admin1@gmail.com', '866102', 'Tiếng Anh II', 'HB001', '2023-08-31', '3.94', '3', '2023', 0),
(4, '3119560037', 'Hà Thị D', '2023-08-25', 'DCT1191', '0915213123', 'admin@gmail.com', '841044	', 'Lập trình hướng đối tượng', 'C001', '2023-08-19', '4.95', '1', '2023', 2),
(5, '3119410342', 'Nguyễn Vân', '2023-08-17', 'DCT1191', '0915514931', 'admin@gmail.com', '841044	', 'Lập trình hướng đối tượng', 'E002', '2023-08-17', '4.95', '1', '2023', 0),
(6, '3119560024', 'Nguyễn Thị C', '2023-08-03', 'DCT1191', '0915514931', 'jijang57@gmail.com', '861303', 'Chủ nghĩa xã hội khoa học', 'C003', '2023-07-20', '4.94', '1', '2023', 0),
(7, '3119410012', 'Trần Minh B', '2023-08-25', 'DCT1194', '0123456789', 'user3@gmail.com', '861303', 'Chủ nghĩa xã hội khoa học', 'HB001', '2021-08-31', '4.95', '3', '2021', 0),
(8, '3119560001', 'Trần Văn Hi', '2023-08-25', 'DCT1191', '0915213123', 'admin@gmail.com', '841044', 'Lập trình hướng đối tượng', 'C001', '2023-08-19', '4.95', '1', '2023', 0),
(9, '3119410001', 'Lý Hà', '2023-08-17', 'DCT1191', '0915514931', 'user1@gmail.com', '841048', 'P/tích thiết kế hệ thống thông tin', 'C003', '2021-08-17', '4.95', '3', '2021', 0),
(10, '3119410011', 'Nguyễn Văn A', '2023-08-03', 'DCT1192', '0987654321', 'user2@gmail.com', '861303', 'Chủ nghĩa xã hội khoa học', 'C001', '2024-07-20', '4.95', '2', '2024', 0),
(11, '3119410103', 'Trần H\'', '2023-08-25', 'DCT1197', '06532456789', 'user9@gmail.com', '861303', 'Chủ nghĩa xã hội khoa học', 'HB001', '2023-08-31', '3.94', '3', '2023', 0),
(12, '3119410001', 'Nguyễn Vân', '2023-08-17', 'DCT1191', '0915514931', 'user1@gmail.com', '841048', 'P/tích thiết kế hệ thống thông tin', 'C001', '2023-08-17', '4.95', '2', '2023', 1),
(13, '3119410011', 'Nguyễn Văn A', '2023-08-03', 'DCT1192', '0987654321', 'user2@gmail.com', '866102', 'Tiếng Anh II', 'C001', '2023-07-20', '4.957.58', '2', '2023', 0),
(14, '3119411017', 'Nguyễn Kha', '2023-08-25', 'DCT1191', '0915514935', 'admin1@gmail.com', '841108', 'Cấu trúc dữ liệu và giải thuật', 'HB001', '2023-08-31', '4.95', '3', '2023', 0),
(15, '3119410091', 'Trần K', '2023-08-25', 'DCT1204', '0123456987', 'user8@gmail.com', '841048', 'P/tích thiết kế hệ thống thông tin', 'C001', '2022-08-19', '2.76', '3', '2022', 0),
(16, '3119410001', 'Nguyễn Kha', '2023-08-17', 'DCT1191', '0915514931', 'user1@gmail.com', '841108', 'Cấu trúc dữ liệu và giải thuật', 'C001', '2023-08-17', '4.95', '3', '2023', 0),
(17, '3119410001', 'Nguyễn Kha', '2023-08-17', 'DCT1191', '0915514931', 'user1@gmail.com', '864001', 'Xác suất thống kê A', 'A001', '2023-08-17', '6', '1', '2023', 0),
(18, '3119410037', 'Nguyễn Minh D', '2023-08-17', 'DCT1191', '0981234567', 'user5@gmail.com', '841304', 'Phát triển ứng dụng web 1', 'C001', '2023-08-17', '7', '3', '2023', 0),
(19, '3119410012', 'Trần Minh B', '2023-08-17', 'DCT1194', '0123456789', 'user3@gmail.com', '841108', 'Cấu trúc dữ liệu và giải thuật', 'C001', '2023-08-17', '8', '1', '2023', 0),
(20, '3119410056', 'Minh Q', '2023-08-17', 'DCT1192', '0123321123', 'user7@gmail.com', '841304', 'Phát triển ứng dụng web 1', 'D001', '2023-08-17', '8', '1', '2023', 0),
(21, '3119410001', 'Nguyễn Vân', '2023-08-17', 'DCT1191', '0915514931', 'user1@gmail.com', '864001', 'Xác suất thống kê A', 'C001', '2022-08-17', '8', '1', '2022', 0),
(22, '3119410042', 'Quách V', '2023-08-17', 'DCT1201', '0987678986', 'user6@gmail.com', '841108', 'Cấu trúc dữ liệu và giải thuật', 'C102', '2023-08-17', '8', '2', '2023', 0),
(23, '3119410001', 'Nguyễn Minh N', '2023-08-17', 'DCT1191', '0915514931', 'user1@gmail.com', '864001', 'Xác suất thống kê A', 'C001', '2023-08-17', '8', '2', '2023', 0),
(24, '3119410028', 'Lê Nhật C', '2023-08-17', 'DKP1201', '0987651234', 'user4@gmail.com', '841304', 'Phát triển ứng dụng web 1', 'HB004', '2023-08-17', '8', '2', '2023', 0),
(25, '3119410001', 'Nguyễn Vân', '2023-08-17', 'DCT1191', '0915514931', 'user1@gmail.com', '841304', 'Phát triển ứng dụng web 1', 'C001', '2023-08-17', '8', '1', '2023', 2),
(30, '3119410001', 'Lý Hà', '2023-08-17', 'DCT1191', '0915514931', 'user1@gmail.com', '841114', 'Phát triển ứng dụng trên thiết bị di động', 'C001', '2023-08-17', '6', '2', '2023', 0),
(31, '3119410011', 'Nguyễn Văn A', '2023-08-03', 'DCT1192', '0987654321', 'user2@gmail.com', '866103', 'Tiếng Anh III', 'E403', '2023-07-20', '8', '1', '2023', 2),
(32, '3119410011', 'Nguyễn Văn A', '2023-08-03', 'DCT1192', '0987654321', 'user2@gmail.com', '841114', 'Phát triển ứng dụng trên thiết bị di động', 'C001', '2023-07-20', '7', '1', '2023', 1),
(33, '3119410001', 'Lý Hà', '2023-08-17', 'DCT1191', '0915514931', 'user1@gmail.com', '866103', 'Tiếng Anh III', 'E001', '2022-08-17', '7', '1', '2022', 1),
(34, '3119410011', 'Nguyễn Văn A', '2023-08-03', 'DCT1192', '0987654321', 'user2@gmail.com', '866103', 'Tiếng Anh III', 'C001', '2023-07-20', '7', '1', '2023', 0),
(35, '3119410111', 'Nguyễn Phan D', '01/03/2001', 'DCT1198', '05678954323', 'user10@gmail.com', '841114', 'Phát triển ứng dụng trên thiết bị di động', 'E403', '2023-08-15', '4', '1', '2023', 2),
(36, '3119410111', 'Hồ Vân', '01/03/2001', 'DCT1193', '0915213123', 'admin@gmail.com', '841114', 'Phát triển ứng dụng trên thiết bị di động', 'HB001', '2023-08-24', '8', '1', '2023', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_birthday` varchar(100) NOT NULL,
  `user_class` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_fullname`, `user_birthday`, `user_class`, `user_phone`, `email`, `password`) VALUES
(1, '3119410466', 'Lý Lê Trung', '08/01/2001', 'DCT1195', '0915514935', 'lyletrung@gmail.com', '$2y$10$.j0SuDGFHBGx5CNCE7tHROQDMWQ0qsDuF.3u3SNsStnMKITmpw2nS'),
(4, '3119410111', 'BamBee123', '01/03/2001', 'DCT1193', '0123456789', 'bambee1@gmail.com', '$2y$10$.j0SuDGFHBGx5CNCE7tHROQDMWQ0qsDuF.3u3SNsStnMKITmpw2nS'),
(5, '3119560024', 'Võ Minh Huân', '14/02/2001', 'DKP1191', '0123456789', 'minhhuanvox@gmail.com', '$2y$10$.j0SuDGFHBGx5CNCE7tHROQDMWQ0qsDuF.3u3SNsStnMKITmpw2nS'),
(6, '3119560037', 'Huỳnh Thị Kim Loan', '23/10/2001', 'DKP1191', '0123456789', 'kimloan@gmail.com', '$2y$10$.j0SuDGFHBGx5CNCE7tHROQDMWQ0qsDuF.3u3SNsStnMKITmpw2nS'),
(7, '3119411017', 'Nguyễn Phan Triều Dương', '05/06/2001', 'DCT119C1', '0123456789', 'trieuduong@gmail.com', '$2y$10$.j0SuDGFHBGx5CNCE7tHROQDMWQ0qsDuF.3u3SNsStnMKITmpw2nS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_form`
--
ALTER TABLE `paper_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paper_form`
--
ALTER TABLE `paper_form`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1312;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
