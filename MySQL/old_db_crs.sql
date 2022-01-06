-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 06:49 AM
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
-- Table structure for table `crs_car`
--

CREATE TABLE `crs_car` (
  `car_id` int(10) NOT NULL,
  `car_registration` varchar(15) NOT NULL,
  `car_brand` int(50) NOT NULL,
  `car_model` int(50) NOT NULL,
  `car_feature` int(100) NOT NULL,
  `car_description` int(100) NOT NULL,
  `car_price` int(10) NOT NULL,
  `car_upload` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crs_user`
--

CREATE TABLE `crs_user` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_type` enum('user','rental','depositor','lessor') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crs_car`
--
ALTER TABLE `crs_car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `crs_user`
--
ALTER TABLE `crs_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crs_car`
--
ALTER TABLE `crs_car`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crs_user`
--
ALTER TABLE `crs_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
