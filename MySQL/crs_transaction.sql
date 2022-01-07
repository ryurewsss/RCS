-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 02:43 PM
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
-- Database: `db_crs`
--

-- --------------------------------------------------------

--
-- Table structure for table `crs_transaction`
--

CREATE TABLE `crs_transaction` (
  `transaction_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `user_lessor_id` int(10) NOT NULL,
  `user_rental_id` int(10) NOT NULL,
  `user_doc_id` int(10) NOT NULL,
  `transaction_status` varchar(30) NOT NULL,
  `transaction_price` int(10) NOT NULL,
  `transaction_lessor_approve` varchar(10) NOT NULL,
  `transaction_rental_approve` varchar(10) NOT NULL,
  `transaction_image` varchar(100) NOT NULL, 
  `transaction_iden_approve` varchar(10) NOT NULL, 
  `transaction_transfer_approve` varchar(10) NOT NULL, 
  `transaction_reject_iden` varchar(100) NOT NULL, 
  `transaction_reject_transfer` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crs_transaction`
--
ALTER TABLE `crs_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crs_transaction`
--
ALTER TABLE `crs_transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
