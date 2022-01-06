-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 04:36 PM
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
  `car_promotion` int(10) NOT NULL,
  `car_image` varchar(100) NOT NULL,
  `car_proof_image` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_car`
--

INSERT INTO `crs_car` (`car_id`, `car_registration`, `car_model_id`, `car_owner_id`, `car_price`, `car_promotion`, `car_image`, `car_proof_image`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(1, 'ฎง 9999 กรุงเทพมหานคร', 1, 1, 2200, 0, 'hondabrio.jpg', 'hondabrio.jpg', '2022-01-06 11:35:00', '2022-01-06 11:35:00', 1, 1),
(2, 'กก 1150 ชลบุรี', 3, 1, 2600, 0, 'MITSUBISHI_PAJERO.jpg', 'MITSUBISHI_PAJERO.jpg', '2022-01-06 21:26:00', '2022-01-06 21:33:02', 1, 1),
(28, '45', 1, 1, 4, 0, '2peaceHam.jpg', '2peaceHam.jpg', '2022-01-06 22:18:01', '2022-01-06 22:20:52', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crs_car_brand`
--

CREATE TABLE `crs_car_brand` (
  `car_brand_id` int(10) NOT NULL,
  `car_brand_name_th` varchar(30) NOT NULL,
  `car_brand_name_en` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_car_brand`
--

INSERT INTO `crs_car_brand` (`car_brand_id`, `car_brand_name_th`, `car_brand_name_en`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(1, 'โตโยต้า', 'Toyota', '2022-01-06 13:48:05', '2022-01-06 20:57:21', 1, 1),
(2, 'อีซูซุ', 'Isuzu', '2022-01-06 13:58:06', '2022-01-06 20:57:26', 1, 1),
(7, 'ฮอนด้า', 'Honda', '2022-01-06 14:08:39', '2022-01-06 20:57:32', 1, 1),
(8, 'มิตซูบิชิ', 'Mitsubishi', '2022-01-06 14:08:55', '2022-01-06 20:57:41', 1, 1),
(9, 'นิสสัน', 'Nissan', '2022-01-06 14:09:12', '2022-01-06 20:57:47', 1, 1),
(10, 'มาสด้า', 'Mazda', '2022-01-06 14:09:31', '2022-01-06 20:57:54', 1, 1),
(11, 'ฟอร์ด', 'Ford', '2022-01-06 14:09:53', '2022-01-06 20:57:58', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crs_car_model`
--

CREATE TABLE `crs_car_model` (
  `car_model_id` int(10) NOT NULL,
  `car_brand_id` int(10) NOT NULL,
  `car_model_name` varchar(50) NOT NULL,
  `car_model_feature` varchar(100) DEFAULT NULL,
  `car_model_description` varchar(300) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_car_model`
--

INSERT INTO `crs_car_model` (`car_model_id`, `car_brand_id`, `car_model_name`, `car_model_feature`, `car_model_description`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(1, 7, 'Brio', '5 ที่นั่ง', 'Honda Brio รถยนต์อีโคคาร์จากค่ายฮอนด้าที่มาพร้อมรูปลักษณ์รูปทรงภายนอกที่เป็นเอกลักษณ์ของฮอนด้า โดยมีให้เลือกทั้ง 4 ประตูภายใต้ชื่อ Honda Brio Amaze และแบบ 5 ประตู Honda Brio V ภายในดีไซน์ได้อย่างลงตัว มาพร้อมเครื่องยนต์ 1.2 ลิตร 4 สูบ 90 แรงม้า', '2022-01-06 16:51:57', '2022-01-06 17:20:35', 1, 1),
(3, 8, 'Pajero 2019', '7 ที่นั่ง', 'NEW MITSUBISHI PAJERO SPORT รุ่นล่าสุดที่บุกตลาดรถอเนกประสงค์ในเวลานี้ ได้รับการปรับปรุง และพัฒนาให้ดีขึ้นมากกว่ารุ่นเดิมหลายด้าน ทั้งการดีไซน์รูปลักษณ์ภายนอกใหม่เพิ่มความล้ำสมัย และภายในห้องโดยสารตกแต่งใหม่ เพิ่มเติมออฟชั่นจำเป็นในการใช้งานที่น่าสนใจหลายด้าน รวมถึงการปรับเซ็ทช่วงล่างใหม่ให้นุ่มนวล', '2022-01-06 20:09:09', '2022-01-06 20:10:27', 1, 1);

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
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crs_transaction_user`
--

CREATE TABLE `crs_transaction_user` (
  `transaction_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crs_user`
--

CREATE TABLE `crs_user` (
  `user_id` int(10) NOT NULL,
  `user_type_id` int(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_image` varchar(100) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_user`
--

INSERT INTO `crs_user` (`user_id`, `user_type_id`, `user_email`, `user_password`, `user_fname`, `user_lname`, `user_phone`, `user_image`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(1, 1, 'admin@gmail.com', '$2y$10$Rl73nMUKaOFGoE9k7vpEtOYL21FJpMmeLUsWT49eciWDzy99rFrUe', 'Sirapop', 'Koonsinchai', '0809425365', NULL, '2022-01-06 11:23:14', '2022-01-06 11:23:14', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crs_user_doc`
--

CREATE TABLE `crs_user_doc` (
  `user_doc_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_doc_iden_image` varchar(100) NOT NULL,
  `user_doc_license_image` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crs_user_type`
--

CREATE TABLE `crs_user_type` (
  `user_type_id` int(10) NOT NULL,
  `user_type_name` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_user_type`
--

INSERT INTO `crs_user_type` (`user_type_id`, `user_type_name`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(1, 'ผู้ให้เช่า', '2022-01-06 11:29:08', '2022-01-06 11:29:08', 1, 1),
(3, 'ผู้เช่า', '2022-01-06 11:29:52', '2022-01-06 11:29:52', 1, 1),
(4, 'ผู้ฝากเช่า', '2022-01-06 11:30:03', '2022-01-06 11:30:03', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crs_car`
--
ALTER TABLE `crs_car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `crs_car_brand`
--
ALTER TABLE `crs_car_brand`
  ADD PRIMARY KEY (`car_brand_id`);

--
-- Indexes for table `crs_car_model`
--
ALTER TABLE `crs_car_model`
  ADD PRIMARY KEY (`car_model_id`);

--
-- Indexes for table `crs_transaction`
--
ALTER TABLE `crs_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `crs_transaction_user`
--
ALTER TABLE `crs_transaction_user`
  ADD PRIMARY KEY (`transaction_id`,`user_id`),
  ADD KEY `FKcrs_transa971945` (`user_id`);

--
-- Indexes for table `crs_user`
--
ALTER TABLE `crs_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `crs_user_doc`
--
ALTER TABLE `crs_user_doc`
  ADD PRIMARY KEY (`user_doc_id`);

--
-- Indexes for table `crs_user_type`
--
ALTER TABLE `crs_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crs_car`
--
ALTER TABLE `crs_car`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `crs_car_brand`
--
ALTER TABLE `crs_car_brand`
  MODIFY `car_brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `crs_car_model`
--
ALTER TABLE `crs_car_model`
  MODIFY `car_model_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crs_transaction`
--
ALTER TABLE `crs_transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crs_user`
--
ALTER TABLE `crs_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crs_user_doc`
--
ALTER TABLE `crs_user_doc`
  MODIFY `user_doc_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crs_user_type`
--
ALTER TABLE `crs_user_type`
  MODIFY `user_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crs_transaction_user`
--
ALTER TABLE `crs_transaction_user`
  ADD CONSTRAINT `FKcrs_transa700116` FOREIGN KEY (`transaction_id`) REFERENCES `crs_transaction` (`transaction_id`),
  ADD CONSTRAINT `FKcrs_transa971945` FOREIGN KEY (`user_id`) REFERENCES `crs_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
