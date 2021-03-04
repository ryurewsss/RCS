-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 06:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ie`
--

-- --------------------------------------------------------

--
-- Table structure for table `ie_transaction`
--

CREATE TABLE `ie_transaction` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `transaction_cash` decimal(10,2) NOT NULL,
  `transaction_description` varchar(100) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_delete_status` enum('active','inactive') NOT NULL,
  `transaction_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ie_transaction`
--

INSERT INTO `ie_transaction` (`transaction_id`, `transaction_cash`, `transaction_description`, `transaction_date`, `transaction_delete_status`, `transaction_user_id`) VALUES
(7, '500.00', 'ขายรองเท้า', '2021-01-04 23:04:29', 'active', 7),
(8, '-123.00', 'ซื้อข้าว', '2021-02-04 23:06:14', 'active', 7),
(9, '500.00', 'ขโมยมา', '2021-03-04 23:06:48', 'active', 8),
(10, '1200.00', 'ขายขนม', '2021-02-04 23:42:26', 'active', 7),
(11, '500.00', 'แม่ให้', '2021-01-04 23:43:50', 'active', 7),
(12, '300.00', 'พ่อให้', '2021-01-04 23:43:58', 'active', 7),
(13, '-230.00', 'ซื้อขนม', '2021-02-04 23:44:32', 'active', 7),
(14, '-300.00', 'จ่ายค่าไฟ', '2021-03-04 23:44:50', 'active', 7),
(15, '-500.00', 'จ่ายค่าบ้าน', '2021-03-05 00:26:03', 'active', 7),
(16, '10000.00', 'เงินเดือนออก', '2021-03-04 23:45:09', 'active', 7),
(17, '3000.00', 'ขายของเก่า', '2021-03-05 00:07:18', 'active', 7),
(18, '-2000.00', 'ซื้อยา', '2021-03-05 00:07:28', 'active', 7),
(19, '300.00', 'เล่นหุ้น', '2021-03-05 00:07:38', 'active', 7),
(20, '-500.00', 'ซื้อดินสอสี', '2021-03-05 00:07:59', 'active', 7),
(21, '-5000.00', 'ซื้อบ้าน', '2020-12-05 00:08:25', 'active', 7),
(22, '3000.00', 'ถูกหวย', '2020-11-05 00:44:24', 'active', 7),
(23, '-1000.00', 'ซื้อหวย', '2020-10-05 00:44:34', 'active', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ie_user`
--

CREATE TABLE `ie_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_delete_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ie_user`
--

INSERT INTO `ie_user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_date`, `user_delete_status`) VALUES
(7, 'Sirapop Koonsinchai', 'admin', '$2y$10$OOZqm34eU.1AJLHwEqoXJuA02lg.xobbWlV097.LMfeapNZg7TwMy', '2021-03-04 23:09:09', 'inactive'),
(8, 'สิร', 'admin2', '$2y$10$J2T88errhqTXfXFdIXcSIO9c8Jx3Wic3Igw0BNOL9nSt8JfBnh8xe', '2021-03-04 23:06:28', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ie_transaction`
--
ALTER TABLE `ie_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `ie_user`
--
ALTER TABLE `ie_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ie_transaction`
--
ALTER TABLE `ie_transaction`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ie_user`
--
ALTER TABLE `ie_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
