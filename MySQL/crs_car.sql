-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 09:37 AM
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
  `car_model_id` int(10) NOT NULL,
  `car_owner_id` int(10) NOT NULL,
  `car_price` int(10) NOT NULL,
  `car_status` varchar(10) NOT NULL,
  `car_image` varchar(100) NOT NULL,
  `car_proof_image` varchar(100) NOT NULL,
  `car_reject_deposit` varchar(100) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_car`
--

INSERT INTO `crs_car` (`car_id`, `car_registration`, `car_model_id`, `car_owner_id`, `car_price`, `car_status`, `car_image`, `car_proof_image`, `car_reject_deposit`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(1, 'ฎง 9999 กรุงเทพมหานคร', 1, 1, 2200, '1', 'hondabrio.jpg', 'hondabrio.jpg', NULL, '2022-01-06 11:35:00', '2022-03-04 20:37:10', 1, 1),
(2, 'กก 1150 ชลบุรี', 3, 1, 2600, '1', 'MITSUBISHI_PAJERO.jpg', 'MITSUBISHI_PAJERO.jpg', NULL, '2022-01-06 21:26:00', '2022-03-04 20:37:13', 1, 1),
(28, 'สส 5510 เชียงใหม่', 18, 1, 3000, '1', 'brioamaze2.jpg', 'brioamaze2.jpg', NULL, '2022-01-06 22:18:01', '2022-03-04 20:37:14', 1, 1),
(31, 'พก 7412 ชลบุรี', 20, 1, 2100, '1', 'fortuner_11.jpg', 'fortuner_11.jpg', NULL, '2022-02-20 16:05:46', '2022-03-04 20:37:15', 1, 1),
(32, 'รด 9412 สมุทรปราการ', 21, 1, 2000, '1', 'vios20191.jpg', 'vios20191.jpg', NULL, '2022-02-20 16:06:57', '2022-03-04 20:37:17', 1, 1),
(33, 'คฟ 7456 ชลบุรี', 22, 1, 1800, '1', 'TOYOTA_SIENTA_2020.jpg', 'TOYOTA_SIENTA_2020.jpg', NULL, '2022-02-20 16:11:05', '2022-03-04 20:37:18', 1, 1),
(34, 'กอ 1254 กรุงเทพมหานคร', 23, 1, 2800, '1', 'HONDA_MOBILIO_2019_RS.jpg', 'HONDA_MOBILIO_2019_RS.jpg', NULL, '2022-02-20 16:12:25', '2022-03-04 20:37:23', 1, 1),
(35, 'รย 5412 ชลบุรี', 24, 1, 2500, '1', 'mazda31.jpg', 'mazda31.jpg', NULL, '2022-02-20 16:16:29', '2022-03-04 20:37:26', 1, 1),
(36, '12 กกยน ชลบุรี', 20, 3, 1500, '2', 'mazinthai3.jpg', 'tran_img.PNG', NULL, '2022-03-06 10:52:17', '2022-03-06 10:52:17', 3, 3),
(37, '12 กกยน ชลบุรี', 20, 1, 1500, '2', 'vios201911.jpg', 'driving_img.PNG', NULL, '2022-03-11 10:19:03', '2022-03-11 10:19:03', 1, 1);

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
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
