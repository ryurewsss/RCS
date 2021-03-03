-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 08:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp(),
  `transaction_delete_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `transaction_employee_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ie_transaction`
--

INSERT INTO `ie_transaction` (`transaction_id`, `transaction_cash`, `transaction_description`, `transaction_date`, `transaction_delete_status`, `transaction_employee_id`) VALUES
(1, '10000.00', 'แม่ให้เงิน', '2021-03-02 14:27:47', 'active', 1),
(2, '-321.00', 'ซื้อนิยาย', '2021-03-02 14:28:03', 'active', 1),
(3, '10.00', 'ขโมยเงินมา', '2021-03-02 20:32:39', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ie_user`
--

CREATE TABLE `ie_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_delete_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ie_user`
--
ALTER TABLE `ie_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
