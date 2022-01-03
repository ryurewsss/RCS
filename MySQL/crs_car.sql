-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 07:14 AM
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
  `car_registration` varchar(30) NOT NULL,
  `car_brand` varchar(50) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `car_feature` varchar(100) NOT NULL,
  `car_description` varchar(300) NOT NULL,
  `car_price` int(10) NOT NULL,
  `car_upload` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_car`
--

INSERT INTO `crs_car` (`car_id`, `car_registration`, `car_brand`, `car_model`, `car_feature`, `car_description`, `car_price`, `car_upload`) VALUES
(9, '1', '2', '3', '4', '5', 6, '2peaceHam.jpg'),
(10, 'ฎง 9999 กรุงเทพมหานคร', 'Honda', 'Brio', '5 ที่นั่ง', 'Honda Brio รถยนต์อีโคคาร์จากค่ายฮอนด้าที่มาพร้อมรูปลักษณ์รูปทรงภายนอกที่เป็นเอกลักษณ์ของฮอนด้า โดยมีให้เลือกทั้ง 4 ประตูภายใต้ชื่อ Honda Brio Amaze และแบบ 5 ประตู Honda Brio V ภายในดีไซน์ได้อย่างลงตัว มาพร้อมเครื่องยนต์ 1.2 ลิตร 4 สูบ 90 แรงม้า', 2200, 'hondabrio1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crs_car`
--
ALTER TABLE `crs_car`
  ADD PRIMARY KEY (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crs_car`
--
ALTER TABLE `crs_car`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
