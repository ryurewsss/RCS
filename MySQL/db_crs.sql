-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 12:04 PM
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
CREATE DATABASE IF NOT EXISTS `db_crs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_crs`;

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
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_car`
--

INSERT INTO `crs_car` (`car_id`, `car_registration`, `car_model_id`, `car_owner_id`, `car_price`, `car_status`, `car_image`, `car_proof_image`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(1, 'ฎง 9999 กรุงเทพมหานคร', 1, 1, 2200, '1', 'hondabrio.jpg', 'hondabrio.jpg', '2022-01-06 11:35:00', '2022-03-04 20:37:10', 1, 1),
(2, 'กก 1150 ชลบุรี', 3, 1, 2600, '1', 'MITSUBISHI_PAJERO.jpg', 'MITSUBISHI_PAJERO.jpg', '2022-01-06 21:26:00', '2022-03-04 20:37:13', 1, 1),
(28, 'สส 5510 เชียงใหม่', 18, 1, 3000, '1', 'brioamaze2.jpg', 'brioamaze2.jpg', '2022-01-06 22:18:01', '2022-03-04 20:37:14', 1, 1),
(31, 'พก 7412 ชลบุรี', 20, 1, 2100, '1', 'fortuner_11.jpg', 'fortuner_11.jpg', '2022-02-20 16:05:46', '2022-03-04 20:37:15', 1, 1),
(32, 'รด 9412 สมุทรปราการ', 21, 1, 2000, '1', 'vios20191.jpg', 'vios20191.jpg', '2022-02-20 16:06:57', '2022-03-04 20:37:17', 1, 1),
(33, 'คฟ 7456 ชลบุรี', 22, 1, 1800, '1', 'TOYOTA_SIENTA_2020.jpg', 'TOYOTA_SIENTA_2020.jpg', '2022-02-20 16:11:05', '2022-03-04 20:37:18', 1, 1),
(34, 'กอ 1254 กรุงเทพมหานคร', 23, 1, 2800, '1', 'HONDA_MOBILIO_2019_RS.jpg', 'HONDA_MOBILIO_2019_RS.jpg', '2022-02-20 16:12:25', '2022-03-04 20:37:23', 1, 1),
(35, 'รย 5412 ชลบุรี', 24, 1, 2500, '1', 'mazda31.jpg', 'mazda31.jpg', '2022-02-20 16:16:29', '2022-03-04 20:37:26', 1, 1),
(36, '12 กกยน ชลบุรี', 20, 3, 1500, '2', 'mazinthai3.jpg', 'tran_img.PNG', '2022-03-06 10:52:17', '2022-03-06 10:52:17', 3, 3),
(37, '12 กกยน ชลบุรี', 20, 1, 1500, '2', 'vios201911.jpg', 'driving_img.PNG', '2022-03-11 10:19:03', '2022-03-11 10:19:03', 1, 1);

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
(1, 7, 'Brio', '[\"5 ที่นั่ง\",\"ฟรีเงินมัดจำ\"]', 'Honda Brio รถยนต์อีโคคาร์จากค่ายฮอนด้าที่มาพร้อมรูปลักษณ์รูปทรงภายนอกที่เป็นเอกลักษณ์ของฮอนด้า โดยมีให้เลือกทั้ง 4 ประตูภายใต้ชื่อ Honda Brio Amaze และแบบ 5 ประตู Honda Brio V ภายในดีไซน์ได้อย่างลงตัว มาพร้อมเครื่องยนต์ 1.2 ลิตร 4 สูบ 90 แรงม้า', '2022-01-06 16:51:57', '2022-01-13 15:23:20', 1, 1),
(3, 8, 'Pajero 2019', '[\"4 ที่นั่ง\",\"ฟรีเงินมัดจำ\"]', 'NEW MITSUBISHI PAJERO SPORT รุ่นล่าสุดที่บุกตลาดรถอเนกประสงค์ในเวลานี้ ได้รับการปรับปรุง และพัฒนาให้ดีขึ้นมากกว่ารุ่นเดิมหลายด้าน ทั้งการดีไซน์รูปลักษณ์ภายนอกใหม่เพิ่มความล้ำสมัย และภายในห้องโดยสารตกแต่งใหม่ เพิ่มเติมออฟชั่นจำเป็นในการใช้งานที่น่าสนใจหลายด้าน รวมถึงการปรับเซ็ทช่วงล่างใหม่ให้นุ่มนวล', '2022-01-06 20:09:09', '2022-01-13 15:23:26', 1, 1),
(18, 7, 'Amaze', '[\"5 \\u0e17\\u0e35\\u0e48\\u0e19\\u0e31\\u0e48\\u0e07\"]', 'ระบบกุญแจอัจฉริยะ และกล้องมองภาพรอบคัน พร้อมเส้นกะระยะถูกใส่มาให้เพิ่มเติมในการปรับโฉมใหม่ครั้งนี้เพื่อความสะดวกสบายของผู้ใช้งาน  ส่วนความปลอดภัยที่มีอยู่เดิมคือถุงลมนิรภัยคู่หน้า ระบบเบรก ABS และ EBD รวมถึงโครงสร้างตัวถังนิรภัยขุมพลังขับเคลื่อนของ Amaze ยังคงเป็นเครื่องยนต์เบนซิน 4 สูบ ขนาด', '2022-01-13 14:16:06', '2022-01-14 16:23:12', 1, 1),
(20, 1, 'Fortuner', '[\"7 \\u0e17\\u0e35\\u0e48\\u0e19\\u0e31\\u0e48\\u0e07\"]', 'อนิว โตโยต้า ฟอร์จูนเนอร์ 2016 ใหม่ (All New Toyota Fortuner 2016) เป็นรถยนต์อเนกประสงค์ MPV โดยพัฒนามาจากพื้นฐานรถกระบะ โตโยต้า ไฮลักซ์ รีโว สามารถใช้งานได้เหมาะสมทั้งเขตพื้นที่ในชุมชนเมืองและต่างจังหวัด', '2022-02-20 16:05:02', '2022-02-20 16:05:02', 1, 1),
(21, 1, 'Vios 2019', '[\"5 \\u0e17\\u0e35\\u0e48\\u0e19\\u0e31\\u0e48\\u0e07\"]', 'TOYOTA VIOS MY2019 มากับการใส่ความโดดเด่นของกระจังหน้าตัววีพร้อมความดุดันของกันชนหน้าที่ทำให้ดูมีความเป็นสปอร์ตมากขึ้นกว่ารุ่นก่อนๆ TOYOTA VIOS MY2019 ถือว่าทำได้ดีกับการออกแบบสัดส่วนด้านหน้าด้วยการใส่องค์ประกอบที่โดดเด่นอย่างไฟหน้า LED แบบเส้นพร้อมไฟหน้าที่ดูลำยุคด้วยหลอดไฟโปรเจคเตอร์', '2022-02-20 16:06:27', '2022-02-20 16:06:27', 1, 1),
(22, 1, 'Sienta 2020', '[\"5 \\u0e17\\u0e35\\u0e48\\u0e19\\u0e31\\u0e48\\u0e07\"]', 'โตโยต้า เซียนต้า รูปลักษณ์ภายนอกออกแบบภายใต้แรงบันดาลใจจากรองเท้าเดินป่าสมัยใหม่ สะท้อนให้เห็นถึงคนรุ่นใหม่ที่รักการท่องเที่ยว มีไลฟ์สไตล์ที่หลากหลาย ภายในออกแบบให้มี 3 แถว 7 ที่นั่ง รองรับห้องโดยสารที่กว้างขวาง เน้นประโยชน์ใช้สอยและความสะดวกสบายในการใช้งานเป็นหลัก', '2022-02-20 16:10:31', '2022-02-20 16:10:31', 1, 1),
(23, 7, 'Mobilio 2019 RS', '[\"5 \\u0e17\\u0e35\\u0e48\\u0e19\\u0e31\\u0e48\\u0e07\"]', 'ฮอนด้า โมบิลิโอ ใหม่ มีระบบแบบยนตรกรรมอเนกประสงค์ขนาดซับคอมแพคท์ ที่มาพร้อมความหรูหราที่มากยิ่งขึ้นด้วยดีไซน์ใหม่ทั้งภายนอกและภายใน รวมถึงอุปกรณ์อำนวยความสะดวกสบาย และมาตรฐานความปลอดภัยที่ครบครันยิ่งขึ้น ห้องโดยสารที่กว้างขวาง และพื้นที่ใช้สอยที่รองรับทุกการใช้งาน เพื่อช่วยยกระดับไลฟ์สไตล์คนเมืองยุค', '2022-02-20 16:11:46', '2022-02-20 16:11:46', 1, 1),
(24, 10, 'NEW MAZDA3 SEDAN', '[\"5 \\u0e17\\u0e35\\u0e48\\u0e19\\u0e31\\u0e07\"]', 'New Mazda3 ยนตรกรรมสปอร์ตพรีเมี่ยมใหม่ ที่ปลุกจิตวิญญาณความสปอร์ตในตัวคุณให้มีชีวิต เติมเต็มเอกลักษณ์ที่โดดเด่นในแบบที่ไม่ซ้ำทางใคร ด้วยดีไซน์ที่สะกดสายตาทุกมุมมอง กับสีใหม่ Platinum Quartz ไฟหน้าและไฟท้ายแบบ LED Signature เพิ่มความสปอร์ตหรูที่เหนือกว่า กับหลังคาซันรูฟแบบไฟฟ้า ภายในห้องโดยสารพรีเมี่', '2022-02-20 16:15:57', '2022-02-20 16:15:57', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crs_place`
--

CREATE TABLE `crs_place` (
  `place_id` int(10) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `place_address` varchar(300) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_place`
--

INSERT INTO `crs_place` (`place_id`, `place_name`, `place_address`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(1, 'สนามบินสุวรรณภูมิ', 'shorturl.at/ghvL0', '2022-01-13 19:04:27', '2022-01-13 19:05:39', 1, 1),
(2, 'สนามบินเชียงใหม่', 'shorturl.at/biF28', '2022-01-13 19:07:26', '2022-01-13 19:07:26', 1, 1);

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
  `place_id` int(10) NOT NULL,
  `transaction_receive_date` datetime NOT NULL,
  `transaction_return_date` datetime NOT NULL,
  `transaction_status` varchar(30) NOT NULL,
  `transaction_price` int(10) NOT NULL,
  `transaction_lessor_approve` varchar(1) NOT NULL,
  `transaction_rental_approve` varchar(1) NOT NULL,
  `transaction_depositor_approve` varchar(1) NOT NULL,
  `transaction_image` varchar(100) NOT NULL,
  `transaction_iden_approve` varchar(1) NOT NULL,
  `transaction_transfer_approve` varchar(1) NOT NULL,
  `transaction_reject_iden` varchar(100) NOT NULL,
  `transaction_reject_transfer` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_create_id` int(10) NOT NULL,
  `user_update_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_transaction`
--

INSERT INTO `crs_transaction` (`transaction_id`, `car_id`, `user_lessor_id`, `user_rental_id`, `user_doc_id`, `place_id`, `transaction_receive_date`, `transaction_return_date`, `transaction_status`, `transaction_price`, `transaction_lessor_approve`, `transaction_rental_approve`, `transaction_depositor_approve`, `transaction_image`, `transaction_iden_approve`, `transaction_transfer_approve`, `transaction_reject_iden`, `transaction_reject_transfer`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(1, 35, 1, 3, 14, 2, '2022-03-08 06:00:00', '2022-03-10 06:00:00', '3', 5000, '1', '1', '', 'tran_img.PNG', '1', '1', '', '', '2022-03-05 19:53:30', '2022-03-05 19:55:09', 3, 3),
(2, 35, 1, 3, 14, 2, '2022-03-15 06:00:00', '2022-03-16 06:00:00', '5', 2500, '1', '1', '', 'tran_img2.PNG', '1', '1', '', '', '2022-03-05 20:05:16', '2022-03-05 21:55:31', 3, 3),
(3, 34, 1, 3, 14, 2, '2022-03-09 06:00:00', '2022-03-10 06:00:00', '5', 2800, '1', '1', '', 'tran_img3.PNG', '1', '1', '', '', '2022-03-06 10:36:06', '2022-03-06 10:47:55', 3, 3),
(4, 36, 0, 3, 14, 2, '2022-03-15 06:00:00', '2022-03-16 06:00:00', '1', 1500, '', '1', '', 'tran_img4.PNG', '', '', '', '', '2022-03-11 10:14:39', '2022-03-11 10:14:39', 3, 3),
(5, 37, 0, 3, 14, 2, '2022-03-14 06:00:00', '2022-03-15 06:00:00', '1', 1500, '', '1', '', 'tran_img5.PNG', '', '', '', '', '2022-03-11 16:15:15', '2022-03-11 16:15:15', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `crs_transaction_temp`
--

CREATE TABLE `crs_transaction_temp` (
  `transaction_temp_id` int(10) NOT NULL,
  `transaction_id` int(10) NOT NULL,
  `transaction_depositor_token` varchar(30) NOT NULL,
  `transaction_lessor_token` varchar(30) NOT NULL,
  `transaction_rental_token` varchar(30) NOT NULL,
  `transaction_depositor_approve` varchar(1) DEFAULT NULL,
  `transaction_rental_approve` varchar(1) DEFAULT NULL,
  `transaction_lessor_approve` varchar(1) DEFAULT NULL,
  `car_id` int(10) NOT NULL,
  `user_rental_id` int(10) NOT NULL,
  `user_lessor_id` int(10) NOT NULL,
  `user_doc_id` int(10) NOT NULL,
  `place_id` int(10) NOT NULL,
  `transaction_iden_approve` varchar(1) NOT NULL,
  `transaction_transfer_approve` varchar(10) NOT NULL,
  `transaction_reject_iden` varchar(100) NOT NULL,
  `transaction_reject_transfer` varchar(100) NOT NULL,
  `transaction_receive_date` datetime NOT NULL,
  `transaction_return_date` datetime NOT NULL,
  `transaction_status` varchar(30) NOT NULL,
  `transaction_price` int(10) NOT NULL,
  `transaction_image` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, 1, 'rewsirapop@gmail.com', '$2y$10$Rl73nMUKaOFGoE9k7vpEtOYL21FJpMmeLUsWT49eciWDzy99rFrUe', 'Sirapop', 'Koonsinchai', '0809425365', '5ebbaa1dedc5d_thumb900.jpg', '2022-01-06 11:23:14', '2022-02-28 14:56:47', 1, 1),
(2, 2, 'tiwaza13@gmail.com', '$2y$10$A1F5iYn39ogCH/Kyi3oTjOYbMpTggw5X1ETsz8joyOwHG.wXGAw7O', 'Tiwa', 'Singsong', '0817711410', NULL, '2022-01-26 14:31:17', '2022-02-28 15:08:33', 0, 0),
(3, 2, '61160076@go.buu.ac.th', '$2y$10$HIQDSNUqsB/IazU0rPITieDkhJsOaIgcVM3FTzECTN.FwN1qPwWHG', 'Sirapop', 'Koonsin', '0809425365', '300px-Scared_Hamster.jpg', '2022-01-31 16:26:40', '2022-03-05 17:04:10', 0, 3);

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

--
-- Dumping data for table `crs_user_doc`
--

INSERT INTO `crs_user_doc` (`user_doc_id`, `user_id`, `user_doc_iden_image`, `user_doc_license_image`, `create_date`, `update_date`, `user_create_id`, `user_update_id`) VALUES
(14, 3, 'id_card.PNG', 'driving_img.PNG', '2022-02-14 11:51:39', '2022-03-05 19:45:53', 3, 3),
(15, 1, 'id_card1.PNG', 'driving_img1.PNG', '2022-02-25 17:39:56', '2022-03-04 00:47:41', 1, 1);

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
(2, 'ผู้เช่า', '2022-01-06 11:29:52', '2022-01-21 17:43:50', 1, 1),
(3, 'ผู้ฝากเช่า', '2022-01-06 11:30:03', '2022-01-21 17:43:52', 1, 1);

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
-- Indexes for table `crs_place`
--
ALTER TABLE `crs_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `crs_transaction`
--
ALTER TABLE `crs_transaction`
  ADD PRIMARY KEY (`transaction_id`);
ALTER TABLE `crs_transaction` ADD FULLTEXT KEY `transaction_iden_approve` (`transaction_iden_approve`,`transaction_transfer_approve`,`transaction_reject_iden`,`transaction_reject_transfer`);
ALTER TABLE `crs_transaction` ADD FULLTEXT KEY `transaction_iden_approve_2` (`transaction_iden_approve`,`transaction_transfer_approve`,`transaction_reject_iden`,`transaction_reject_transfer`);

--
-- Indexes for table `crs_transaction_temp`
--
ALTER TABLE `crs_transaction_temp`
  ADD PRIMARY KEY (`transaction_temp_id`);

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
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `crs_car_brand`
--
ALTER TABLE `crs_car_brand`
  MODIFY `car_brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `crs_car_model`
--
ALTER TABLE `crs_car_model`
  MODIFY `car_model_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `crs_place`
--
ALTER TABLE `crs_place`
  MODIFY `place_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crs_transaction`
--
ALTER TABLE `crs_transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crs_transaction_temp`
--
ALTER TABLE `crs_transaction_temp`
  MODIFY `transaction_temp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `crs_user`
--
ALTER TABLE `crs_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crs_user_doc`
--
ALTER TABLE `crs_user_doc`
  MODIFY `user_doc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `crs_user_type`
--
ALTER TABLE `crs_user_type`
  MODIFY `user_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `db_ie`
--
CREATE DATABASE IF NOT EXISTS `db_ie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_ie`;

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
(7, '500.00', 'ขายรองเท้า', '2021-03-08 17:37:01', 'inactive', 7),
(8, '-123.00', 'ซื้อข้าว', '2021-02-04 23:06:14', 'active', 7),
(9, '500.00', 'ขโมยมา', '2021-03-04 23:06:48', 'active', 8),
(10, '1200.00', 'ขายขนม', '2021-02-04 23:42:26', 'active', 7),
(11, '500.00', 'แม่ให้', '2021-03-08 17:38:32', 'inactive', 7),
(12, '300.00', 'พ่อให้', '2021-01-04 23:43:58', 'active', 7),
(13, '-230.00', 'ซื้อขนม', '2021-02-04 23:44:32', 'active', 7),
(14, '-300.00', 'จ่ายค่าไฟ', '2021-03-04 23:44:50', 'active', 7),
(15, '-500.00', 'จ่ายค่าบ้าน', '2021-03-12 10:13:45', 'inactive', 7),
(16, '10500.00', 'เงินเดือนออก', '2021-03-12 10:45:35', 'inactive', 7),
(17, '3000.00', 'ขายของเก่า', '2020-12-05 00:07:18', 'active', 7),
(18, '-2000.00', 'ซื้อยา', '2021-03-05 00:07:28', 'active', 7),
(19, '300.00', 'เล่นหุ้น', '2021-03-05 00:07:38', 'active', 7),
(20, '-500.00', 'ซื้อดินสอสี', '2021-03-05 00:07:59', 'active', 7),
(21, '-5000.00', 'ซื้อบ้าน', '2020-12-05 00:08:25', 'active', 7),
(22, '3000.00', 'ถูกหวย', '2020-11-05 00:44:24', 'active', 7),
(23, '-1000.00', 'ซื้อหวย', '2020-10-05 00:44:34', 'active', 7),
(24, '200.00', 'เก็บได้', '2021-03-05 02:03:04', 'active', 7),
(25, '-2000.00', 'จ้างพนักงาน', '2020-09-05 02:03:17', 'active', 7),
(26, '500.00', 'ได้งบทำระบบทีม 4', '2021-03-05 02:03:27', 'active', 7),
(27, '3500.00', 'ขายไก่ทอด', '2020-09-05 02:03:47', 'active', 7),
(28, '-5000.00', 'เสียพนันบอล', '2020-07-05 02:03:58', 'active', 7),
(29, '1000.00', 'เล่นหุ้น', '2021-03-05 02:04:18', 'active', 7),
(30, '500.00', 'แม่ให้', '2020-10-05 02:04:34', 'active', 7),
(31, '900.00', 'ปู่ให้', '2020-06-05 02:04:43', 'active', 7),
(32, '-352.00', 'ทำตก', '2020-06-05 02:05:40', 'active', 7),
(33, '5500.00', 'ขายหมา', '2020-07-05 02:05:56', 'active', 7),
(34, '-22150.00', 'จ่ายค่าเทอม', '2020-08-05 02:06:07', 'active', 7),
(35, '25000.00', 'ขอเงินแม่มาจ่ายค่าเทอม', '2020-08-05 02:06:30', 'active', 7),
(36, '-500.00', 'จ่ายค่าปรับ', '2021-03-05 02:10:11', 'active', 8),
(37, '500.00', 'ขายของ', '2021-03-05 09:56:29', 'active', 7),
(38, '-500.00', 'ซื้อข้าว', '2021-03-11 21:19:00', 'inactive', 7),
(39, '1.00', 'asd', '2021-03-08 17:41:31', 'active', 11),
(42, '1.00', '123', '2021-03-08 18:16:19', 'inactive', 11),
(44, '500.00', 'ขายข้าวแกง', '2021-03-12 10:47:10', 'inactive', 7),
(45, '500.00', 'ได้เงินจากแม่', '2021-03-12 11:38:55', 'active', 7),
(46, '-500.00', 'ซื้อขนม', '2021-03-12 11:39:25', 'inactive', 7),
(47, '99999999.99', '', '2021-12-27 15:20:23', 'inactive', 7),
(48, '41234.00', '123', '2022-01-13 18:35:43', 'active', 1),
(49, '-44.00', '444', '2022-01-13 18:35:46', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ie_user`
--

CREATE TABLE `ie_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_username` varchar(60) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_delete_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ie_user`
--

INSERT INTO `ie_user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_date`, `user_delete_status`) VALUES
(7, 'Sirapop คูณสินชัย', 'admin', '$2y$10$OOZqm34eU.1AJLHwEqoXJuA02lg.xobbWlV097.LMfeapNZg7TwMy', '2021-03-12 11:40:31', 'active'),
(8, 'สิรภพ', 'admin2', '$2y$10$J2T88errhqTXfXFdIXcSIO9c8Jx3Wic3Igw0BNOL9nSt8JfBnh8xe', '2021-03-05 09:31:42', 'active');

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
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `ie_user`
--
ALTER TABLE `ie_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Database: `db_scs`
--
CREATE DATABASE IF NOT EXISTS `db_scs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_scs`;

-- --------------------------------------------------------

--
-- Table structure for table `scs_bill_detail`
--

CREATE TABLE `scs_bill_detail` (
  `bdt_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสข้อมูลรายละเอียดของใบเสร็จ',
  `bdt_bill_header_id` int(10) NOT NULL COMMENT 'รหัสใบเสร็จ',
  `bdt_product_id` int(10) NOT NULL COMMENT 'รหัสข้อมูลสินค้า',
  `bdt_amount` int(10) NOT NULL COMMENT 'จำนวนสินค้า',
  `bdt_sale_price` decimal(10,2) NOT NULL COMMENT 'ราคาของสินค้าต่อชิ้น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_bill_detail`
--

INSERT INTO `scs_bill_detail` (`bdt_id`, `bdt_bill_header_id`, `bdt_product_id`, `bdt_amount`, `bdt_sale_price`) VALUES
(8, 6, 2, 1, '10.00'),
(9, 6, 3, 1, '6.00'),
(10, 6, 58, 1, '6.00'),
(11, 6, 1, 2, '13.00'),
(12, 7, 1, 1, '13.00'),
(13, 8, 1, 1, '13.00'),
(14, 9, 1, 1, '13.00'),
(15, 10, 1, 3, '13.00'),
(16, 10, 2, 3, '10.00'),
(17, 11, 2, 1, '10.00'),
(18, 11, 1, 1, '13.00'),
(19, 12, 1, 1, '13.00'),
(20, 13, 2, 1, '10.00'),
(21, 14, 2, 1, '10.00'),
(22, 15, 2, 1, '10.00'),
(23, 16, 2, 1, '10.00'),
(24, 17, 2, 1, '10.00'),
(25, 18, 1, 1, '13.00'),
(26, 19, 4, 1, '31.00'),
(27, 20, 1, 1, '13.00'),
(28, 21, 4, 1, '31.00'),
(29, 22, 1, 1, '13.00'),
(30, 23, 4, 1, '31.00'),
(31, 24, 18, 1, '33.00'),
(32, 24, 6, 1, '31.00'),
(33, 25, 7, 1, '34.00'),
(34, 25, 5, 1, '31.00'),
(35, 25, 8, 1, '28.00'),
(36, 25, 9, 1, '29.00'),
(37, 25, 2, 5, '10.00'),
(38, 25, 4, 2, '31.00'),
(39, 25, 3, 4, '6.00'),
(40, 26, 34, 1, '32.00'),
(41, 26, 25, 1, '30.00'),
(42, 26, 24, 1, '35.00'),
(43, 26, 37, 1, '39.00'),
(44, 26, 36, 1, '36.00'),
(45, 26, 5, 1, '31.00'),
(46, 26, 7, 3, '34.00'),
(47, 26, 8, 5, '28.00'),
(48, 26, 9, 2, '29.00'),
(49, 26, 4, 1, '31.00'),
(50, 26, 3, 1, '6.00'),
(51, 26, 2, 1, '10.00'),
(52, 26, 1, 4, '13.00'),
(53, 27, 95, 7, '10.00'),
(54, 27, 96, 1, '10.00'),
(55, 27, 84, 5, '12.00'),
(56, 27, 82, 5, '12.00'),
(57, 27, 13, 1, '35.00'),
(58, 27, 12, 2, '28.00'),
(59, 27, 5, 1, '31.00'),
(60, 28, 152, 1, '15.00'),
(61, 28, 150, 1, '15.00'),
(62, 28, 149, 2, '30.00'),
(63, 28, 151, 2, '15.00'),
(64, 28, 147, 3, '26.00'),
(65, 28, 146, 4, '28.00'),
(66, 28, 145, 2, '30.00'),
(67, 29, 68, 2, '6.00'),
(68, 29, 63, 2, '6.00'),
(69, 29, 69, 2, '6.00'),
(70, 29, 70, 1, '6.00'),
(71, 29, 67, 3, '6.00'),
(72, 29, 64, 2, '6.00'),
(73, 29, 62, 1, '6.00'),
(74, 29, 61, 2, '6.00'),
(75, 29, 60, 2, '6.00'),
(76, 29, 3, 2, '6.00'),
(77, 29, 56, 2, '6.00'),
(78, 30, 8, 2, '28.00'),
(79, 30, 9, 2, '29.00'),
(80, 30, 7, 2, '34.00'),
(81, 30, 2, 3, '10.00'),
(82, 30, 3, 3, '6.00'),
(83, 30, 5, 2, '31.00'),
(84, 30, 4, 4, '31.00'),
(85, 31, 146, 2, '28.00'),
(86, 31, 147, 3, '26.00'),
(87, 31, 27, 3, '30.00'),
(88, 31, 8, 5, '28.00'),
(89, 31, 2, 5, '10.00'),
(90, 31, 9, 3, '29.00'),
(91, 32, 203, 2, '5.00'),
(92, 32, 171, 3, '5.00'),
(93, 32, 170, 2, '5.00'),
(94, 32, 204, 4, '5.00'),
(95, 32, 202, 2, '5.00'),
(96, 32, 172, 4, '5.00'),
(97, 32, 146, 4, '28.00'),
(98, 33, 233, 3, '20.00'),
(99, 33, 231, 2, '7.00'),
(100, 33, 232, 4, '20.00'),
(101, 33, 230, 2, '10.00'),
(102, 34, 221, 2, '8.00'),
(103, 34, 240, 3, '25.00'),
(104, 34, 219, 2, '15.00'),
(105, 34, 242, 3, '25.00'),
(106, 34, 220, 1, '7.00'),
(107, 34, 234, 2, '20.00'),
(108, 35, 96, 5, '10.00'),
(109, 35, 95, 5, '10.00'),
(110, 36, 235, 2, '25.00'),
(111, 36, 240, 2, '25.00'),
(112, 36, 10, 1, '29.00'),
(113, 36, 32, 2, '33.00'),
(114, 36, 3, 1, '6.00'),
(115, 36, 9, 3, '29.00'),
(116, 36, 5, 1, '31.00'),
(117, 37, 94, 3, '18.00'),
(118, 37, 242, 6, '25.00'),
(119, 37, 96, 3, '10.00'),
(120, 37, 95, 3, '10.00'),
(121, 1, 144, 1, '220.00'),
(122, 1, 98, 1, '57.00'),
(123, 1, 31, 1, '28.00'),
(124, 1, 95, 1, '10.00'),
(125, 1, 3, 1, '6.00'),
(126, 1, 7, 1, '34.00'),
(127, 2, 137, 1, '129.00'),
(128, 2, 155, 1, '15.00'),
(129, 2, 63, 1, '6.00'),
(130, 2, 5, 1, '31.00'),
(131, 2, 83, 1, '11.00'),
(132, 2, 81, 1, '16.00'),
(133, 3, 164, 1, '20.00'),
(134, 3, 156, 1, '10.00'),
(135, 3, 77, 1, '11.00'),
(136, 3, 90, 1, '15.00'),
(137, 3, 75, 1, '12.00'),
(138, 3, 39, 1, '39.00'),
(139, 3, 47, 1, '34.00'),
(140, 3, 38, 1, '40.00'),
(141, 3, 64, 1, '6.00'),
(142, 4, 166, 1, '20.00'),
(143, 4, 129, 1, '85.00'),
(144, 4, 87, 1, '11.00'),
(145, 4, 109, 1, '58.00'),
(146, 4, 56, 1, '6.00'),
(147, 5, 118, 1, '60.00'),
(148, 5, 81, 1, '16.00'),
(149, 5, 242, 1, '25.00'),
(150, 5, 63, 4, '6.00'),
(151, 5, 84, 1, '12.00'),
(152, 43, 97, 1, '11.00'),
(153, 43, 242, 1, '25.00'),
(154, 43, 142, 1, '227.00'),
(155, 43, 133, 1, '101.00'),
(156, 43, 58, 6, '6.00'),
(157, 44, 94, 1, '18.00'),
(158, 44, 111, 1, '59.00'),
(159, 44, 115, 1, '59.00'),
(160, 44, 62, 1, '6.00'),
(161, 44, 92, 1, '12.00'),
(162, 44, 98, 1, '57.00'),
(163, 45, 75, 6, '12.00'),
(164, 46, 2, 1, '10.00'),
(165, 46, 29, 1, '34.00'),
(166, 47, 16, 2, '33.00'),
(167, 47, 19, 2, '34.00'),
(168, 47, 11, 2, '28.00'),
(169, 47, 8, 2, '28.00'),
(170, 47, 4, 2, '31.00'),
(171, 48, 31, 2, '28.00'),
(172, 48, 35, 2, '31.00'),
(173, 48, 16, 2, '33.00'),
(174, 48, 23, 2, '27.00'),
(175, 48, 14, 2, '26.00'),
(176, 48, 4, 3, '31.00'),
(177, 49, 128, 3, '32.00'),
(178, 49, 115, 4, '59.00'),
(179, 49, 107, 5, '62.00'),
(180, 49, 83, 4, '11.00'),
(181, 49, 84, 6, '12.00'),
(182, 49, 95, 3, '10.00'),
(183, 49, 72, 5, '6.00'),
(184, 50, 23, 1, '27.00'),
(185, 51, 1, 1, '13.00'),
(186, 52, 2, 1, '10.00'),
(187, 52, 1, 1, '13.00');

-- --------------------------------------------------------

--
-- Table structure for table `scs_bill_header`
--

CREATE TABLE `scs_bill_header` (
  `bhd_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสข้อมูลใบเสร็จ',
  `bhd_total_sub` decimal(10,2) NOT NULL COMMENT 'รับเงินมาทั้งหมด',
  `bhd_total_price` decimal(10,2) NOT NULL COMMENT 'ยอดราคาสินค้าทั้งหมด',
  `bhd_total_change` decimal(10,2) NOT NULL COMMENT 'ยอดเงินที่ต้องทอน',
  `bhd_total_amount` int(10) NOT NULL,
  `bhd_active_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการใช้งาน\r\n1 = ยังใช้งานอยู่\r\n2 = ยกเลิก',
  `bhd_employee_create_id` int(11) NOT NULL COMMENT 'รหัสพนักงานที่สร้างข้อมูล	',
  `bhd_create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สร้าง	',
  `bhd_employee_update_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่แก้ไขข้อมูล',
  `bhd_update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่ปรับปรุงล่าสุด',
  `bhd_delete_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการลบข้อมูล\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_bill_header`
--

INSERT INTO `scs_bill_header` (`bhd_id`, `bhd_total_sub`, `bhd_total_price`, `bhd_total_change`, `bhd_total_amount`, `bhd_active_status`, `bhd_employee_create_id`, `bhd_create_date`, `bhd_employee_update_id`, `bhd_update_date`, `bhd_delete_status`) VALUES
(1, '370.00', '355.00', '15.00', 6, 'active', 1, '2020-01-08 21:36:24', 0, '2021-03-06 21:45:17', 'active'),
(2, '500.00', '208.00', '292.00', 6, 'active', 1, '2020-02-11 21:36:38', 0, '2021-03-06 21:45:45', 'active'),
(3, '200.00', '187.00', '13.00', 9, 'active', 1, '2020-03-10 21:36:46', 0, '2021-03-06 21:45:52', 'active'),
(4, '180.00', '180.00', '0.00', 5, 'active', 1, '2020-04-13 21:36:52', 0, '2021-03-06 21:46:00', 'active'),
(5, '150.00', '137.00', '13.00', 8, 'active', 1, '2020-05-08 21:37:11', 0, '2021-03-06 21:46:10', 'active'),
(6, '50.00', '48.00', '2.00', 5, 'active', 1, '2020-06-20 21:37:17', 0, '2021-03-06 21:46:17', 'active'),
(7, '13.00', '13.00', '0.00', 1, 'active', 1, '2020-07-09 21:37:23', 0, '2021-03-06 21:46:23', 'active'),
(8, '13.00', '13.00', '0.00', 1, 'active', 1, '2020-07-17 21:37:30', 0, '2021-03-06 21:46:59', 'active'),
(9, '13.00', '13.00', '0.00', 1, 'active', 1, '2020-07-28 21:47:47', 0, '2021-03-06 21:47:53', 'active'),
(10, '100.00', '69.00', '31.00', 6, 'active', 1, '2020-08-24 21:35:20', 0, '2021-03-06 21:47:12', 'active'),
(11, '23.00', '23.00', '0.00', 2, 'active', 1, '2020-08-28 21:35:11', 0, '2021-03-06 21:47:58', 'active'),
(12, '13.00', '13.00', '0.00', 1, 'active', 1, '2020-09-23 21:34:58', 0, '2021-03-06 21:48:03', 'active'),
(13, '10.00', '10.00', '0.00', 1, 'active', 1, '2020-09-27 21:34:46', 0, '2021-03-06 21:48:53', 'active'),
(14, '10.00', '10.00', '0.00', 1, 'active', 1, '2020-09-30 21:34:27', 0, '2021-03-06 21:48:56', 'active'),
(15, '10.00', '10.00', '0.00', 1, 'active', 1, '2020-10-15 21:34:17', 0, '2021-03-06 21:49:00', 'active'),
(16, '10.00', '10.00', '0.00', 1, 'active', 1, '2020-10-20 21:34:07', 0, '2021-03-06 21:49:04', 'active'),
(17, '10.00', '10.00', '0.00', 1, 'active', 1, '2020-10-25 21:34:12', 0, '2021-03-06 22:15:09', 'active'),
(18, '1000.00', '13.00', '987.00', 1, 'active', 1, '2020-10-30 21:33:49', 0, '2021-03-06 22:17:16', 'active'),
(19, '500.00', '31.00', '469.00', 1, 'active', 1, '2020-11-10 21:33:43', 0, '2021-03-06 22:17:23', 'active'),
(20, '1000.00', '13.00', '987.00', 1, 'active', 1, '2021-03-10 21:33:36', 0, '2021-03-11 12:14:34', 'active'),
(21, '1000.00', '31.00', '969.00', 1, 'active', 1, '2020-11-25 21:33:13', 0, '2021-03-06 22:17:29', 'active'),
(22, '1000.00', '13.00', '987.00', 1, 'active', 1, '2020-12-16 21:33:08', 0, '2021-03-06 22:15:48', 'active'),
(23, '1000.00', '31.00', '969.00', 1, 'active', 1, '2020-12-24 21:32:47', 0, '2021-03-06 22:15:53', 'active'),
(24, '500.00', '64.00', '436.00', 2, 'active', 1, '2020-12-28 21:33:01', 0, '2021-03-06 22:17:48', 'active'),
(25, '258.00', '258.00', '0.00', 15, 'active', 1, '2021-01-08 21:32:15', 0, '2021-03-06 22:18:44', 'active'),
(26, '602.00', '602.00', '0.00', 23, 'active', 1, '2021-01-12 15:03:12', 0, '2021-03-06 21:32:08', 'active'),
(27, '322.00', '322.00', '0.00', 22, 'active', 1, '2021-01-16 21:31:53', 0, '2021-03-06 21:31:56', 'active'),
(28, '370.00', '370.00', '0.00', 15, 'active', 1, '2021-01-18 21:31:33', 0, '2021-03-06 21:31:40', 'active'),
(29, '126.00', '126.00', '0.00', 21, 'active', 1, '2021-01-20 15:04:05', 0, '2021-03-06 21:31:27', 'active'),
(30, '416.00', '416.00', '0.00', 18, 'active', 1, '2021-02-01 15:09:07', 0, '2021-03-06 22:19:47', 'active'),
(31, '501.00', '501.00', '0.00', 21, 'active', 1, '2021-02-02 21:31:00', 0, '2021-03-06 22:19:16', 'active'),
(32, '197.00', '197.00', '0.00', 21, 'active', 1, '2021-02-04 15:09:58', 0, '2021-03-06 21:30:48', 'active'),
(33, '174.00', '174.00', '0.00', 11, 'active', 1, '2021-02-10 15:10:07', 0, '2021-03-06 21:30:37', 'active'),
(34, '243.00', '243.00', '0.00', 13, 'active', 1, '2021-02-14 21:30:00', 0, '2021-03-06 21:30:18', 'active'),
(35, '100.00', '100.00', '0.00', 10, 'active', 1, '2021-02-15 21:30:23', 0, '2021-03-06 21:30:26', 'active'),
(36, '319.00', '319.00', '0.00', 12, 'active', 1, '2021-03-01 15:11:13', 0, '2021-03-06 22:20:50', 'active'),
(37, '264.00', '264.00', '0.00', 15, 'active', 1, '2021-03-01 22:20:29', 0, '2021-03-06 22:20:32', 'active'),
(43, '500.00', '400.00', '100.00', 10, 'active', 1, '2021-03-02 21:29:12', 0, '2021-03-06 22:20:00', 'active'),
(44, '300.00', '211.00', '89.00', 6, 'active', 1, '2021-03-03 21:29:05', 0, '2021-03-06 22:20:05', 'active'),
(45, '100.00', '72.00', '28.00', 6, 'active', 1, '2021-03-04 17:21:16', 0, '2021-03-04 17:21:16', 'active'),
(46, '44.00', '44.00', '0.00', 2, 'active', 1, '2021-03-06 21:19:46', 0, '2021-03-06 21:19:46', 'active'),
(47, '308.00', '308.00', '0.00', 10, 'active', 2, '2021-03-07 15:19:22', 0, '2021-03-07 15:19:22', 'active'),
(48, '500.00', '383.00', '117.00', 13, 'active', 11, '2021-03-07 15:20:51', 0, '2021-03-07 15:20:51', 'active'),
(49, '1000.00', '818.00', '182.00', 30, 'active', 11, '2021-03-07 15:21:03', 0, '2021-03-07 15:21:03', 'active'),
(50, '27.00', '27.00', '0.00', 1, 'active', 1, '2021-03-08 05:26:42', 0, '2021-03-08 05:26:42', 'active'),
(51, '40.00', '13.00', '27.00', 1, 'active', 1, '2021-03-11 14:57:22', 0, '2021-03-11 14:57:22', 'active'),
(52, '23.00', '23.00', '0.00', 2, 'active', 1, '2022-01-31 11:17:00', 0, '2022-01-31 11:17:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `scs_category_product`
--

CREATE TABLE `scs_category_product` (
  `cpd_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสข้อมูลประเภทสินค้า',
  `cpd_name` varchar(50) NOT NULL COMMENT 'ชื่อประเภทสินค้า',
  `cpd_active_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการใช้งาน\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน',
  `cpd_description` varchar(100) NOT NULL COMMENT 'คำอธิบายประเภทสินค้า',
  `cpd_employee_create_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่สร้างข้อมูล',
  `cpd_create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สร้างข้อมูล',
  `cpd_employee_update_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่แก้ไขข้อมูล',
  `cpd_update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่ปรับปรุงล่าสุด',
  `cpd_delete_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการลบข้อมูล\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_category_product`
--

INSERT INTO `scs_category_product` (`cpd_id`, `cpd_name`, `cpd_active_status`, `cpd_description`, `cpd_employee_create_id`, `cpd_create_date`, `cpd_employee_update_id`, `cpd_update_date`, `cpd_delete_status`) VALUES
(1, 'อุปกรณ์การเรียน', 'active', 'สินค้าที่ใช้ในกาเรียน', 1, '2020-08-19 13:55:47', 1, '2021-02-03 21:04:40', 'active'),
(2, 'เครื่องดืม', 'active', 'ของเหลวสำหรับดื่มแก้กระหาย', 1, '2020-08-19 13:55:47', 1, '2021-02-03 21:04:12', 'active'),
(3, 'ของใช้ทั่วไป', 'active', 'สินค้าจิปาถะ', 1, '2020-12-15 13:05:45', 1, '2021-02-03 21:03:33', 'active'),
(4, 'อาหารแห้ง', 'active', 'อาหารที่สามารถเก็บได้นาน', 1, '2020-12-15 13:06:02', 1, '2021-02-03 21:03:24', 'active'),
(5, 'ขนมปัง', 'active', 'อาหารประเภทแป้ง', 1, '2020-12-15 13:06:12', 1, '2021-02-03 21:03:13', 'active'),
(6, 'ขนมขบเคี้ยว', 'active', 'ของกินเล่นทั่วไป', 1, '2020-12-15 13:06:21', 1, '2021-02-03 21:02:58', 'active'),
(29, 'เครื่องปรุง', 'active', 'สิ่งที่ใช้ในการปรุงอาหาร', 1, '2020-12-29 12:10:39', 1, '2021-02-15 14:37:12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `scs_counter_transaction`
--

CREATE TABLE `scs_counter_transaction` (
  `cts_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสเคาน์เตอร์',
  `cts_bill_header_id` int(10) NOT NULL COMMENT 'รหัสใบเสร็จสินค้า',
  `cts_money_in_counter` decimal(10,2) NOT NULL COMMENT 'เงินคงเหลือเคาน์เตอร์',
  `cts_income` decimal(10,2) NOT NULL COMMENT 'จำนวนเงินที่นำเข้าจากเคาน์เตอร์',
  `cts_outcome` decimal(10,2) NOT NULL COMMENT 'จำนวนเงินที่นำออกจากเคาน์เตอร์',
  `cts_note_id` int(10) NOT NULL COMMENT 'รหัสหมายเหตุ',
  `cts_note_other_detail` varchar(100) NOT NULL COMMENT 'หมายเหตุอื่นๆ',
  `cts_employee_create_id` int(10) NOT NULL COMMENT 'รหัสพนักงาน',
  `cts_create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันและเวลาที่มีการนำเงินเข้าหรือออก',
  `cts_delete_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการลบข้อมูล\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_counter_transaction`
--

INSERT INTO `scs_counter_transaction` (`cts_id`, `cts_bill_header_id`, `cts_money_in_counter`, `cts_income`, `cts_outcome`, `cts_note_id`, `cts_note_other_detail`, `cts_employee_create_id`, `cts_create_date`, `cts_delete_status`) VALUES
(123, 0, '500.00', '500.00', '0.00', 0, '', 1, '2021-02-15 20:45:14', 'active'),
(124, 0, '400.00', '0.00', '100.00', 1, '', 1, '2021-02-15 20:45:27', 'active'),
(125, 24, '464.00', '64.00', '0.00', 0, '', 1, '2021-02-15 20:50:54', 'active'),
(126, 25, '722.00', '258.00', '0.00', 0, '', 1, '2021-02-26 19:33:31', 'active'),
(127, 26, '1324.00', '602.00', '0.00', 0, '', 1, '2021-02-27 15:03:13', 'active'),
(128, 27, '1646.00', '322.00', '0.00', 0, '', 1, '2021-02-27 15:03:28', 'active'),
(129, 28, '2016.00', '370.00', '0.00', 0, '', 1, '2021-02-27 15:03:44', 'active'),
(130, 29, '2142.00', '126.00', '0.00', 0, '', 1, '2021-02-27 15:04:05', 'active'),
(131, 30, '2558.00', '416.00', '0.00', 0, '', 1, '2021-02-27 15:09:08', 'active'),
(132, 31, '3059.00', '501.00', '0.00', 0, '', 1, '2021-02-27 15:09:47', 'active'),
(133, 32, '3256.00', '197.00', '0.00', 0, '', 1, '2021-02-27 15:09:59', 'active'),
(134, 33, '3430.00', '174.00', '0.00', 0, '', 1, '2021-02-27 15:10:07', 'active'),
(135, 34, '3673.00', '243.00', '0.00', 0, '', 1, '2021-02-27 15:10:20', 'active'),
(136, 35, '3773.00', '100.00', '0.00', 0, '', 1, '2021-02-27 15:10:37', 'active'),
(137, 36, '4092.00', '319.00', '0.00', 0, '', 1, '2021-02-27 15:11:13', 'active'),
(138, 37, '4356.00', '264.00', '0.00', 0, '', 1, '2021-02-27 15:11:26', 'active'),
(139, 38, '4711.00', '355.00', '0.00', 0, '', 1, '2021-03-06 16:52:01', 'active'),
(140, 39, '4919.00', '208.00', '0.00', 0, '', 1, '2021-03-06 16:58:37', 'active'),
(141, 40, '5106.00', '187.00', '0.00', 0, '', 1, '2021-03-06 17:04:28', 'active'),
(142, 41, '5286.00', '180.00', '0.00', 0, '', 1, '2021-03-06 17:09:36', 'active'),
(143, 42, '5423.00', '137.00', '0.00', 0, '', 1, '2021-03-06 17:11:38', 'active'),
(144, 43, '5823.00', '400.00', '0.00', 0, '', 1, '2021-03-06 17:20:09', 'active'),
(145, 44, '6034.00', '211.00', '0.00', 0, '', 1, '2021-03-06 17:20:37', 'active'),
(146, 45, '6106.00', '72.00', '0.00', 0, '', 1, '2021-03-06 17:21:16', 'active'),
(147, 46, '6150.00', '44.00', '0.00', 0, '', 1, '2021-03-06 21:19:46', 'active'),
(148, 0, '7650.00', '1500.00', '0.00', 0, '', 1, '2021-03-06 22:24:49', 'active'),
(149, 0, '7150.00', '0.00', '500.00', 1, '', 1, '2021-03-06 22:25:08', 'active'),
(150, 47, '7458.00', '308.00', '0.00', 0, '', 2, '2021-03-07 15:19:22', 'active'),
(151, 48, '7841.00', '383.00', '0.00', 0, '', 11, '2021-03-07 15:20:51', 'active'),
(152, 49, '8659.00', '818.00', '0.00', 0, '', 11, '2021-03-07 15:21:03', 'active'),
(153, 50, '8686.00', '27.00', '0.00', 0, '', 1, '2021-03-08 05:26:42', 'active'),
(154, 51, '8699.00', '13.00', '0.00', 0, '', 1, '2021-03-11 14:57:22', 'active'),
(155, 52, '8722.00', '23.00', '0.00', 0, '', 1, '2022-01-31 11:17:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `scs_employee`
--

CREATE TABLE `scs_employee` (
  `ep_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสพนักงานใช้บอกถึงลำดับ',
  `ep_username` varchar(30) NOT NULL COMMENT 'รหัสแทนตัวพนักงาน',
  `ep_passwordcode` varchar(100) NOT NULL COMMENT 'รหัสผ่านในการเข้าใช้งาน',
  `ep_firstname` varchar(30) NOT NULL COMMENT 'ชื่อของพนักงาน',
  `ep_lastname` varchar(30) NOT NULL COMMENT 'นามสกุลของพนักงาน',
  `ep_type` enum('Admin','Employee','Reporter') NOT NULL COMMENT 'ประเภทของพนักงาน\r\n1 = ผู้ดูแลระบบ\r\n2 = พนักงาน\r\n3 = ผู้ดูรายงาน',
  `ep_profile_path` varchar(50) NOT NULL COMMENT 'รูปโปรไฟล์',
  `ep_active_status` enum('active','inactive') NOT NULL COMMENT 'สถานะของพนักงาน\r\n1 = ใช้งาน\r\n2 = ไม่ใช้งาน\r\n',
  `ep_employee_create_id` int(10) NOT NULL COMMENT 'รหัสของพนักงานที่สร้างบัญชีผู้ใช้',
  `ep_create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สร้าง',
  `ep_employee_update_id` int(10) DEFAULT NULL COMMENT 'รหัสพนักงานที่แก้ไขข้อมูล',
  `ep_update_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่ปรับปรุงล่าสุด',
  `ep_delete_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการลบข้อมูล\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_employee`
--

INSERT INTO `scs_employee` (`ep_id`, `ep_username`, `ep_passwordcode`, `ep_firstname`, `ep_lastname`, `ep_type`, `ep_profile_path`, `ep_active_status`, `ep_employee_create_id`, `ep_create_date`, `ep_employee_update_id`, `ep_update_date`, `ep_delete_status`) VALUES
(1, 'admin', '$2y$10$4zusXhnjPOEK88bavycSheGvrVco8CRuRwF7EgQbT4oBhNGVip3UC', 'Sirapop', 'Koonsinchai', 'Admin', '', 'active', 0, '2020-08-15 15:29:56', 1, '2022-03-03 16:38:36', 'active'),
(2, 'employee', '$2y$10$g4LYL.XS42Yf9GhdyehxFuT1oJGJhujzOQOBiBH1vJ6IIaxsW.qjG', 'Kittichai', 'Anansinchai', 'Employee', '', 'active', 1, '2020-08-19 12:14:19', 1, '2020-08-19 12:14:19', 'active'),
(3, 'reporter', '$2y$10$l90PIgLUCp0iOyjwSr0cuuq0RWoyxB4STTtcE15Ncl/IuLKsaIjja', 'Ryu', 'Viewer', 'Reporter', '', 'active', 1, '2020-09-15 20:03:46', 1, '2020-09-15 20:03:46', 'active'),
(11, 'Oat', '$2y$10$9Q3HbAKypSt8Ej7UJ/pPvO1Tj5cf8NqEWd9hQubgfchY33EY.Sjhu', 'Thitipong', 'Phuttacharoenpong', 'Employee', '', 'active', 1, '2020-10-07 16:00:58', 1, '2021-03-07 15:20:27', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `scs_note`
--

CREATE TABLE `scs_note` (
  `nt_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสข้อมูลหมายเหตุ',
  `nt_name` varchar(50) NOT NULL COMMENT 'ชื่อหมายเหตุ',
  `nt_type` enum('หมายเหตุการเงิน','หมายเหตุการตัดจ่าย','อื่นๆ') NOT NULL COMMENT 'หมายเหตุ 1 = หมายเหตุการเงิน 2 = หมายเหตุการตัดจ่าย\r\n3 = อื่นๆ',
  `nt_active_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการใช้งาน\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน',
  `nt_employee_create_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่สร้างข้อมูล',
  `nt_create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สร้าง',
  `nt_employee_update_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่แก้ไขข้อมูล',
  `nt_update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่ปรับปรุงล่าสุด',
  `nt_delete_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการลบข้อมูล\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_note`
--

INSERT INTO `scs_note` (`nt_id`, `nt_name`, `nt_type`, `nt_active_status`, `nt_employee_create_id`, `nt_create_date`, `nt_employee_update_id`, `nt_update_date`, `nt_delete_status`) VALUES
(0, 'อื่นๆ', 'อื่นๆ', 'inactive', 1, '2020-11-25 19:08:46', 1, '2021-01-26 19:58:09', 'active'),
(1, 'เงินในเครื่องเยอะเกินที่กำหนด', 'หมายเหตุการเงิน', 'active', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'active'),
(2, 'สินค้าหมดอายุ', 'หมายเหตุการตัดจ่าย', 'active', 1, '2020-10-02 16:39:33', 1, '2021-01-26 19:58:06', 'active'),
(3, 'สินค้าชำรุด', 'หมายเหตุการตัดจ่าย', 'active', 1, '2020-10-02 16:41:19', 1, '2021-01-26 19:58:05', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `scs_product`
--

CREATE TABLE `scs_product` (
  `pd_id` int(10) UNSIGNED NOT NULL COMMENT 'ลำดับสินค้า',
  `pd_code` varchar(15) NOT NULL COMMENT 'รหัสข้อมูลบาร์โค้ด',
  `pd_name` varchar(50) NOT NULL COMMENT 'ชื่อสินค้า',
  `pd_category_product_id` int(10) NOT NULL COMMENT 'รหัสข้อมูลประเภทสินค้า',
  `pd_amount` int(10) NOT NULL COMMENT 'จำนวนสินค้าที่มี',
  `pd_sale_price` decimal(10,2) NOT NULL COMMENT 'ราคาขาย',
  `pd_cost_price` decimal(10,2) NOT NULL COMMENT 'ราคาต้นทุน',
  `pd_pics_path` varchar(50) NOT NULL COMMENT 'path รูป',
  `pd_active_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการใช้งาน\r\n1 = ใช้งาน\r\n2 = ไม่ได้ใช้งาน',
  `pd_employee_create_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่สร้างข้อมูล',
  `pd_create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สร้าง',
  `pd_employee_update_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่แก้ไขข้อมูล',
  `pd_update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่ปรับปรุงตล่าสุด',
  `pd_delete_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการลบข้อมูล\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_product`
--

INSERT INTO `scs_product` (`pd_id`, `pd_code`, `pd_name`, `pd_category_product_id`, `pd_amount`, `pd_sale_price`, `pd_cost_price`, `pd_pics_path`, `pd_active_status`, `pd_employee_create_id`, `pd_create_date`, `pd_employee_update_id`, `pd_update_date`, `pd_delete_status`) VALUES
(1, '881228', 'ปากกาสีตราม้า', 1, 11, '13.00', '7.00', '', 'active', 1, '2020-08-12 16:46:03', 1, '2022-01-31 11:17:00', 'active'),
(2, '881229', 'นมดีน่างาดำ', 2, 5, '10.00', '10.00', '', 'active', 2, '2020-08-19 13:52:24', 1, '2022-01-31 11:17:00', 'active'),
(3, '881230', 'มาม่าต้มยำกุ้ง', 4, 11, '6.00', '5.31', '', 'active', 2, '2020-08-19 14:15:34', 1, '2021-03-06 16:52:01', 'active'),
(4, '881231', 'ยาสีฟันคอลเกต สูตรธรรมดา', 3, 7, '31.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 11, '2021-03-07 15:20:51', 'active'),
(5, '881232', 'ยาสีฟันคอลเกต สูตรโททอลโปรเบรทท์ เฮลท์', 3, 13, '31.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 19:26:17', 'active'),
(6, '881233', 'ยาสีฟันคอลเกต สูตรเนเชอรัลส์ กัม คอมฟอร์ท', 3, 12, '31.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:25:07', 'active'),
(7, '881234', 'ยาสีฟันคอลเกต สูตรเนเชอรัลส์ เพียว เฟรช', 3, 15, '34.00', '24.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 19:26:17', 'active'),
(8, '881235', 'ยาสีฟันคอลเกต สูตรเนเชอรัลส์ เรียล ไวท์', 3, 13, '28.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 2, '2021-03-07 15:19:22', 'active'),
(9, '881236', 'ยาสีฟันคอลเกต สูตรเกลือ ไวท์เทนนิ่ง', 3, 14, '29.00', '21.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:49:03', 'active'),
(10, '881237', 'ยาสีฟันคอลเกต สูตรเกลือ ถ่านชาร์โคล', 3, 12, '29.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:25:07', 'active'),
(11, '881238', 'ยาสีฟันคอลเกต สูตรชาร์โคล คลีน', 3, 14, '28.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 2, '2021-03-07 15:19:22', 'active'),
(12, '881239', 'ยาสีฟันคอลเกต สูตรเกลือ เฟรช มิ้นท์', 3, 16, '28.00', '21.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:28', 'active'),
(13, '881240', 'ยาสีฟันคอลเกต สูตรเกลือ สมุนไพร', 3, 21, '35.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:28', 'active'),
(14, '881241', 'ยาสีฟันคอลเกต สูตรเซนซิทีฟ โปรรีลีฟ คอมพลีท โปรเทค', 3, 9, '26.00', '24.00', '', 'active', 1, '0000-00-00 00:00:00', 11, '2021-03-07 15:20:51', 'active'),
(15, '881242', 'ยาสีฟันคอลเกต สูตรเซนซิทีฟ โปรรีลีฟ ออริจินัล', 3, 11, '34.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(16, '881243', 'ยาสีฟันคอลเกต สูตรเซนซิทีฟ โปรรีลีฟ ไวท์เทนนิ่ง', 3, 14, '33.00', '22.00', '', 'active', 1, '0000-00-00 00:00:00', 11, '2021-03-07 15:20:51', 'active'),
(17, '881244', 'ยาสีฟันคอลเกต สูตรเซนซิทีฟ ซอลท์ มิเนอรัลส์', 3, 10, '30.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(18, '881245', 'ยาสีฟันคอลเกต สูตรเซนซิทีฟ เซนซิโฟม ไวท์เทนนิ่ง', 3, 12, '33.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-15 20:50:54', 'active'),
(19, '881246', 'ยาสีฟันคอลเกต สูตรอ๊อฟติค ไวท์ พลัส ชายน์', 3, 8, '34.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 2, '2021-03-07 15:19:22', 'active'),
(20, '881247', 'ยาสีฟันคอลเกต สูตรสดชื่นเย็นซ่า', 3, 24, '32.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(21, '881248', 'ยาสีฟันคอลเกต สูตรริ้วใสเย็นสดชื่น', 3, 22, '35.00', '22.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(22, '881249', 'ยาสีฟันคอลเกต สูตรรสยอดนิยม', 3, 23, '27.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(23, '881250', 'ยาสีฟันคอลเกต สำหรับเด็ก สูตรบาร์บี้', 3, 13, '27.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-08 05:26:42', 'active'),
(24, '881251', 'ยาสีฟันคอลเกต สำหรับเด็ก สูตรแบทแมน', 3, 18, '35.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:13', 'active'),
(25, '881252', 'ยาสีฟันคอลเกต สำหรับเด็ก สูตรฟรีฟรอม 3-5 ขวบ', 3, 15, '30.00', '24.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:13', 'active'),
(26, '881253', 'ยาสีฟันคอลเกต สำหรับเด็ก สูตรฟรีฟรอม 6-9 ขวบ', 3, 13, '31.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(27, '881254', 'ยาสีฟันคอลเกต สำหรับเด็ก สูตรเสือจอมซน', 3, 17, '30.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:09:46', 'active'),
(28, '881255', 'ยาสีฟันคอลเกต สำหรับเด็ก สูตรมินเนี่ยน', 3, 15, '27.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(29, '881256', 'ยาสีฟันคอลเกต สูตรปัญจเวท สมุนไพร ดีท็อกซ์', 3, 19, '34.00', '30.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 21:19:46', 'active'),
(30, '881257', 'ยาสีฟันคอลเกต สูตรเกลือ ดับเบิ้ลคลีน', 3, 18, '27.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(31, '881258', 'ยาสีฟันคอลเกต สูตรโททอล แอดวานส์ เฟรช', 3, 17, '28.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 11, '2021-03-07 15:20:51', 'active'),
(32, '881259', 'ยาสีฟันคอลเกต สูตรโททอล ชาร์โคล ดีพ คลีน', 3, 22, '33.00', '24.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:11:13', 'active'),
(33, '881260', 'ยาสีฟันคอลเกต สูตรอ๊อฟติค ไวท์ โวลคานิคมิเนอรัล', 3, 18, '26.00', '22.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(34, '881261', 'ยาสีฟันคอลเกต สูตรเนเชอร์รัลส์ ปัญจเวท', 3, 11, '32.00', '21.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:13', 'active'),
(35, '881262', 'ยาสีฟันสมุนไพร ดอกบัวคู่ สูตรดังเดิม', 3, 18, '31.00', '15.00', '', 'active', 1, '0000-00-00 00:00:00', 11, '2021-03-07 15:20:51', 'active'),
(36, '881263', 'ยาสีฟันสมุนไพร ดอกบัวคู่ สูตรเอเวอร์เฟรช', 3, 18, '36.00', '21.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:13', 'active'),
(37, '881264', 'แชมพูเนเชอรัลอัลมอนด์แอนด์ฮันนี่แอนตี้เบรกเกจ', 3, 22, '39.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:13', 'active'),
(38, '881265', 'คูลลิ่งเนเชอรัลซูเปอร์สลิม', 3, 19, '40.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:04:28', 'active'),
(39, '881266', 'ครีมอาบน้ำโพรเทคส์ เฟรช', 3, 9, '39.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:04:28', 'active'),
(40, '881267', 'แพรอท เฮอร์เบิล สบู่สมุนไพร มังคุดสกัด', 3, 10, '40.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(41, '881268', 'นีเวียโลชั่นบอดี้เอ็กซ์ตร้าไวท์ ซีแอนด์เอ', 3, 16, '37.00', '24.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(42, '881269', 'ลอริเอะ ผ้าอนามัย ซอฟ แอนด์ เซฟ สลิม', 3, 17, '38.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(43, '881270', 'แคร์ แป้งเด็ก คลาสสิค', 3, 11, '39.00', '24.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(44, '881271', 'Lux ลักส์ ครีมอาบน้ำ คูลลิ่ง โกลว์', 3, 16, '34.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(45, '881272', 'เคลียร์ ไมเซลล่า แชมพู โฟรเซน พีโอนี', 3, 21, '39.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(46, '881273', 'รีจอยส์ ริช ซอฟท์ สมูท แชมพู', 3, 12, '39.00', '21.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(47, '881274', 'เบบี้มายด์น้ำยาล้างขวดนมหัวปั้ม', 3, 20, '34.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:04:28', 'active'),
(48, '881275', 'มิสทิน ซุปเปอร์ แมทท์ ลิป คัลเลอร์', 3, 10, '35.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(49, '881276', 'นอริชชิ่ง ซีเครท ทิคเคนนิ่ง ริชวล แชมพู', 3, 24, '37.00', '22.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(50, '881277', 'พอนด์ส ไวท์ บิวตี้ ซุปเปอร์ครีม เอสพีเอฟ 30 พีเอ', 3, 17, '40.00', '21.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(51, '881278', 'มามี่โพโค แพ้นท์ แฮปปี้ เดย์แอนด์ไนท์', 3, 19, '37.00', '21.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(52, '881279', 'ยาสีฟัน ดั้งเดิม', 3, 21, '38.00', '21.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(53, '881280', 'การ์นิเย่ วิตามิน ซี ซูเปอร์ เอสเซนส์', 3, 25, '40.00', '24.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:15:33', 'active'),
(54, '881281', 'ยาสีฟันดาร์ลี่ ดับเบิ้ล แอคชั่น', 3, 23, '38.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(55, '881282', 'แพนทีนแชมพูแฮร์ฟอลคอนโทรล', 3, 12, '36.00', '21.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(56, '881283', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสหมูสับ', 4, 18, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:09:36', 'active'),
(57, '881284', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสต้มยำกุ้ง', 4, 16, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(58, '881285', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสต้มยำกุ้งน้', 4, 11, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:20:09', 'active'),
(59, '881286', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสเป็ดพะโล้', 4, 23, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(60, '881287', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสต้มยำเส้นชา', 4, 20, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 19:40:41', 'active'),
(61, '881288', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสหมูน้ำตก', 4, 26, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 20:08:51', 'active'),
(62, '881289', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสหมูต้มยำ', 4, 17, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:20:37', 'active'),
(63, '881290', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง เส้นโฮลวีตหมู', 4, 15, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 19:24:54', 'active'),
(64, '881291', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสผัดขี้เมาแห', 4, 14, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:04:28', 'active'),
(65, '881292', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสต้มแซบ', 4, 20, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(66, '881293', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง เจรสเห็ดหอม', 4, 18, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(67, '881294', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง เจรสต้มยำ', 4, 22, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-02-27 15:04:05', 'active'),
(68, '881295', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสซุปไก่', 4, 20, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 19:40:41', 'active'),
(69, '881296', 'บะหมี่เส้นเหลืองกึ่งสำเร็จรูป แบบซอง รสโปรตีนไข่', 4, 22, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:15:33', 'active'),
(70, '881297', 'เส้นขาวกึ่งสำเร็จรูป แบบซอง รสน้ำใส', 4, 15, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-02-27 15:04:05', 'active'),
(71, '881298', 'เส้นขาวกึ่งสำเร็จรูป แบบซอง รสต้มยำ', 4, 13, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(72, '881299', 'เส้นขาวกึ่งสำเร็จรูป แบบซอง รสต้มแซบ', 4, 5, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 11, '2021-03-07 15:21:03', 'active'),
(73, '881300', 'เส้นขาวกึ่งสำเร็จรูป แบบซอง รสหมูน้ำตก', 4, 21, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(74, '881301', 'เส้นขาวกึ่งสำเร็จรูป แบบซอง รสเย็นตาโฟ', 4, 21, '6.00', '5.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(75, '881302', 'นมจืด รสสตอเบอร์รี่', 2, 47, '12.00', '16.53', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 20:45:25', 'active'),
(76, '881303', 'นมถั่วเหลือง', 2, 22, '15.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(77, '881304', 'ชานมกระป๋อง', 2, 23, '11.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:04:28', 'active'),
(78, '881305', 'น้ำอัดลมกลิ่นโคล่า สูตรน้ำตาล ดั้งเดิม', 2, 11, '15.00', '9.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(79, '881306', 'น้ำอัดลมกลิ่นโคล่า สูตรน้ำตาล 0%', 2, 21, '18.00', '8.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(80, '881307', 'ชาขาว รสเก๊กฮวย', 2, 31, '10.00', '22.55', '', 'active', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'active'),
(81, '881308', 'ชาขาว มิ๊กเบอร์รี่', 2, 15, '16.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:11:37', 'active'),
(82, '881309', 'น้ำชาเขียวญี่ปุ่น รสน้ำผึ้งมะนาว', 2, 7, '12.00', '9.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:28', 'active'),
(83, '881310', 'น้ำชาเขียวญี่ปุ่น รสข้าวญี่ปุ่น', 2, 12, '11.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 11, '2021-03-07 15:21:03', 'active'),
(84, '881311', 'นมUHT รสจืด', 2, 10, '12.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 11, '2021-03-07 15:21:03', 'active'),
(85, '881312', 'นมพร่องมันเนย', 2, 13, '18.00', '8.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(86, '881313', 'น้ำอัดลมรสส้ม', 2, 12, '11.00', '8.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(87, '881314', 'รูทเบียร์', 2, 22, '11.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:09:36', 'active'),
(88, '881315', 'น้ำอัดลมสตรอว์เบอร์รี', 2, 11, '14.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(89, '881316', 'น้ำอัดลมน้ำผึ้งมะนาว', 2, 11, '16.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(90, '881317', 'น้ำชาเขียว', 2, 18, '15.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:16:58', 'active'),
(91, '881318', 'น้ำเสาวรส', 2, 18, '15.00', '9.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-14 21:38:11', 'active'),
(92, '881319', 'น้ำมัลเบอร์รี่', 2, 19, '12.00', '9.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:20:37', 'active'),
(93, '881320', 'น้ำฝรั่ง', 2, 13, '17.00', '8.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(94, '881321', 'น้ำผลไม้รวมผสมผักใบเขียว', 2, 10, '18.00', '8.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:20:37', 'active'),
(95, '881322', 'น้ำมะพร้าว', 2, 3, '10.00', '9.00', '', 'active', 1, '0000-00-00 00:00:00', 11, '2021-03-07 15:21:03', 'active'),
(96, '881323', 'น้ำสตรอว์เบอร์รี', 2, 16, '10.00', '9.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:11:26', 'active'),
(97, '881324', 'น้ำยาล้างจาน', 3, 17, '11.00', '8.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:20:09', 'active'),
(98, '881325', 'บรีสเอกเซลโกลด์', 3, 14, '57.00', '55.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:20:37', 'active'),
(99, '881326', 'บรีสเอกเซลคอมฟอร์ทผลิตภัณฑ์ซักผ้า', 3, 23, '58.00', '50.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(100, '881327', 'บรีสเอกเซลลิควิด ชนิดน้ำ', 3, 21, '62.00', '52.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(101, '881328', 'ผงซักฟอก สีม่วง', 3, 25, '64.00', '47.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(102, '881329', 'ผงซักฟอก สีชมพู', 3, 22, '63.00', '50.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(103, '881330', 'น้ำยาปรับผ้านุ่ม สีฟ้า', 3, 23, '56.00', '43.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(104, '881331', 'น้ำยาปรับผ้านุ่มสูตรเข้มข้นกลิ่นมิลค์กี้ทัช', 3, 13, '60.00', '53.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(105, '881332', 'ผงซักฟอกสูตรเข้มข้น', 3, 19, '65.00', '54.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(106, '881333', 'น้ำยาปรับผ้านุ่มเข้มข้นสูตรแอนตี้แบค', 3, 20, '56.00', '51.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(107, '881334', 'ผลิตภัณฑ์ซักผ้าชนิดน้ำสูตรซันนี่โกลด์', 3, 5, '62.00', '50.00', '', 'active', 2, '0000-00-00 00:00:00', 11, '2021-03-07 15:21:03', 'active'),
(108, '881335', 'ผลิตภัณฑ์ซักผ้าชนิดน้ำกลิ่นโรแมนติกเลิฟ', 3, 17, '59.00', '49.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(109, '881336', 'น้ำยาปรับผ้านุ่มเรดแพชชั่น', 3, 22, '58.00', '47.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:09:36', 'active'),
(110, '881337', 'น้ำยาปรับผ้านุ่มกลิ่นเนเจอร์เฮฟเว่น', 3, 19, '62.00', '49.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(111, '881338', 'น้ำยาล้างจาน', 3, 14, '59.00', '52.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:20:37', 'active'),
(112, '881339', 'ผลิตภัณฑ์ซักผ้า', 3, 22, '58.00', '54.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(113, '881340', 'สเปรย์กำจัดยุงกลิ่นยูคาลิปตัส', 3, 18, '58.00', '47.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(114, '881341', 'น้ำยาซักผ้าสีชมพู', 3, 17, '64.00', '46.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(115, '881342', 'น้ำยาทำความสะอาดพื้นสีชมพู', 3, 14, '59.00', '51.00', '', 'active', 2, '0000-00-00 00:00:00', 11, '2021-03-07 15:21:03', 'active'),
(116, '881343', 'น้ำยาทำความสะอาดห้องครัว', 3, 14, '63.00', '47.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(117, '881344', 'เป็ดมิสเตอร์มัสเซิลผลิตภัณฑ์ทำความสะอาดห้องน้ำ', 3, 21, '65.00', '42.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(118, '881345', 'กระดาษอเนกประสงค์บิ๊กโรล', 3, 11, '60.00', '45.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:11:37', 'active'),
(119, '881346', 'น้ำยาซักผ้าขาวสีชมพู', 3, 24, '60.00', '55.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(120, '881347', 'สวีทฟลอรัลขจัดคราบชนิดน้ำสำหรับผ้าสี', 3, 24, '61.00', '48.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(121, '881348', 'เดทตอลไฮยีน', 3, 21, '60.00', '53.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(122, '881349', 'แม็กกี้ซอสปรุงอาหาร 680มล', 29, 19, '27.00', '23.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'active'),
(123, '881350', 'แม็กกี้ซอสเหยาะจิ้ม 100มล.', 29, 23, '16.00', '12.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'active'),
(124, '881351', 'แม็กกี้ซอสเหยาะจิ้ม 200มล', 4, 23, '29.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(125, '881352', 'ภูเขาทองซอสปรุงรสฝาเขียว 500มล.', 4, 11, '28.00', '22.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(126, '881353', 'ภูเขาทองซอสปรุงรสอาหาร 700มล.', 4, 13, '33.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(127, '881354', 'พันท้ายนรสิงห์น้ำจิ้มสุกี้สูตรกวางตุ้ง 800กรัม', 4, 17, '105.00', '88.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(128, '881355', 'แม่ประนอมน้ำจิ้มไก่ 390กรัม', 4, 10, '32.00', '25.00', '', 'active', 1, '0000-00-00 00:00:00', 11, '2021-03-07 15:21:03', 'active'),
(129, '881356', 'คิวพีน้ำสลัดงาคั่วญี่ปุ่น 210มล.', 4, 18, '85.00', '76.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:09:36', 'active'),
(130, '881357', 'คิวพีน้ำสลัดงาคั่วญี่ปุ่น 1000มล.', 4, 14, '235.00', '210.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(131, '881358', 'เฮลแมนส์เรียลมายองเนส 200มล.', 4, 24, '75.00', '59.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(132, '881359', 'แม็คคอร์มิคน้ำสลัดเซซามิ 150มล.', 4, 12, '65.00', '60.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(133, '881360', 'คราฟท์มายองเนส 443มล.', 4, 20, '101.00', '88.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:20:09', 'active'),
(134, '881361', 'นูเทลล่าเฮเซลนัทบดผสมโกโก้ 350กรัม', 4, 18, '198.00', '150.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:16:59', 'active'),
(135, '881362', 'ท็อปส์น้ำผึ้งดอกลำไย 700กรัม', 4, 11, '159.00', '140.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(136, '881363', 'ดอยคำน้ำผึ้งเกสรดอกลำไย 770กรัม', 4, 24, '185.00', '160.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(137, '881364', 'สมักเกอร์แยมสตรอเบอร์รี่ 340กรัม', 4, 10, '129.00', '108.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 16:58:36', 'active'),
(138, '881365', 'สมักเกอร์แยมองุ่น 340กรัม', 4, 19, '129.00', '105.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(139, '881366', 'สมักเกอร์แยมรสส้ม 340กรัม', 4, 24, '129.00', '115.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(140, '881367', 'เฮอร์ชี่ส์ช็อกโกแลตไซรัป 650กรัม', 4, 19, '160.00', '114.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(141, '881368', 'หงษ์ทองข้าวขาวหอมมะลิใหม่ 5กก.', 4, 25, '232.00', '195.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(142, '881369', 'ฉัตรข้าวขาวหอมมะลิใหม่ 5กก.', 4, 12, '227.00', '183.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 17:20:09', 'active'),
(143, '881370', 'ฉัตรส้มข้าวหอมผสม 5กก.', 4, 23, '244.00', '198.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(144, '881371', 'ปิ่นเงินเพชรข้าวขาวหอมมะลิ 5กก.', 4, 10, '220.00', '187.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 16:52:01', 'active'),
(145, '881372', 'ฟาร์มเฮ้าส์ขนมปังโฮลวีต 500กรัม', 5, 17, '30.00', '18.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:44', 'active'),
(146, '881373', 'ฟาร์มเฮ้าส์ขนมปังแซนวิช 480กรัม', 5, 8, '28.00', '18.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-02-27 15:09:59', 'active'),
(147, '881374', 'ดีพลัสขนมปังรสนมฮอกไกโดเอ็กซ์ตร้า 70กรัม', 5, 16, '26.00', '18.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-02-27 15:09:46', 'active'),
(148, '881375', 'ดีพลัสขนมปังไส้ถั่วแดง 90กรัม', 5, 24, '27.00', '14.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(149, '881376', 'คิวบิกขนมปังโฮลวีตแครนเบอร์รี่บัน 80กรัม', 5, 22, '30.00', '11.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:44', 'active'),
(150, '881377', 'ปังทูน่า', 5, 24, '15.00', '10.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:44', 'active'),
(151, '881378', 'ปังไส้กรอก', 5, 23, '15.00', '10.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:44', 'active'),
(152, '881379', 'ปังไส้กรอกมายองเนส', 5, 24, '15.00', '10.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-02-27 15:03:44', 'active'),
(153, '881380', 'ปังไก่หยอง', 5, 25, '15.00', '10.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(154, '881381', 'ปังไก่หยองพริกเผา', 5, 25, '15.00', '10.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(155, '881382', 'ปังไก่หยองมายองเนส', 5, 24, '15.00', '10.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 16:58:36', 'active'),
(156, '881383', 'ปังปูอัดมายองเนส', 5, 24, '10.00', '7.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:04:28', 'active'),
(157, '881384', 'ปังไส้ครีม', 5, 20, '10.00', '7.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(158, '881385', 'ปังไส้เผือก', 5, 20, '10.00', '7.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(159, '881386', 'ปังถั่วแดง', 5, 20, '10.00', '7.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(160, '881387', 'ปังมันม่วง', 5, 20, '10.00', '7.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(161, '881388', 'ปังลูกเกด', 5, 20, '10.00', '7.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(162, '881389', 'ปังมะพร้าว', 5, 20, '10.00', '7.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(163, '881390', 'ปังช็อคโกแลต', 5, 20, '10.00', '7.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(164, '881391', 'ปังแฮมชีส', 5, 29, '20.00', '15.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:04:28', 'active'),
(165, '881392', 'ปังเนยสด', 5, 20, '20.00', '15.00', '', 'active', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(166, '881393', 'ปังเนยหนึบ', 5, 19, '20.00', '15.00', '', 'active', 2, '0000-00-00 00:00:00', 1, '2021-03-06 17:09:36', 'active'),
(167, '881394', 'ข้าวเกรียบกุ้ง พร้อมน้ำพริกเผา', 6, 11, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(168, '881395', 'ขนมทอดกรอบ รสดั้งเดิม', 6, 15, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(169, '881396', 'ขนมทอดกรอบ รสโนริสาหร่าย', 6, 22, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(170, '881397', 'ขนมทอดกรอบ รสปลาหมึก', 6, 16, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:09:59', 'active'),
(171, '881398', 'ข้าวอบกรอบสาหร่ายสไปซี่', 6, 11, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:09:59', 'active'),
(172, '881399', 'ขนมรูปน่องไก่ รสบาร์บีคิวเกาหลีผสมสาหร่าย', 6, 21, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:09:59', 'active'),
(173, '881400', 'มินิรสบาร์บีคิว', 6, 12, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(174, '881401', 'ปลากรอบ', 6, 10, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(175, '881402', 'กล้วยกรอบรสบาร์บีคิว', 6, 41, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 20:07:43', 'active'),
(176, '881403', 'เอ็กซ์ตรีมชีส', 6, 22, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(177, '881404', 'อเมริกันชีส', 6, 18, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(178, '881405', 'ช็อกโกแยมมิกซ์เบอร์รี่', 6, 11, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(179, '881406', 'ช็อกโกแลต', 6, 22, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(180, '881407', 'มันฝรั่งแท้ทอดกรอบแผ่นเรียบ รสต้มยำกุ้ง', 6, 21, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-14 19:58:27', 'active'),
(181, '881408', 'มันฝรั่งอบกรอบแผ่นหยัก รสเอ็กซ์ตร้าบาร์บีคิว', 6, 19, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(182, '881409', 'มันฝรั่งอบกรอบแผ่นหยัก รสโนริสาหร่าย', 6, 25, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(183, '881410', 'มันฝรั่งอบกรอบแผ่นหยัก รสกระเพรากรอบ', 6, 22, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(184, '881411', 'มันฝรั่งอบกรอบแผ่นหยัก รสมันฝรั่งแท้', 6, 25, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(185, '881412', 'มันฝรั่งอบกรอบแผ่นหยัก รสสุกี้ซีฟู้ด', 6, 24, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(186, '881413', 'มันฝรั่งอบกรอบแผ่นหยัก รสสไปซี่ซีฟู้ด', 6, 11, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(187, '881414', 'มันฝรั่งอบกรอบแผ่นหยัก รสสเต๊ะทรงเครื่อง', 6, 13, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(188, '881415', 'มันฝรั่งแท้ทอดกรอบแผ่นเรียบ รสเวียนนาบาร์บีคิว+ฮอต', 6, 12, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(189, '881416', 'มันฝรั่งแท้ทอดกรอบแผ่นเรียบ รสน้ำตกหม้อไฟ', 6, 11, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(190, '881417', 'ขนมอบกรอบผสม', 6, 17, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(191, '881418', 'ถั่วลันเตาเคลือบ รสศรีราชา', 6, 16, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(192, '881419', 'ถั่วลิสงเคลือบ รสวาซาบิ', 6, 25, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(193, '881420', 'ถั่วลิสงเคลือบ รสกาแฟ', 6, 14, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(194, '881421', 'ถั่วลิสงเคลือบ รสกะทิ', 6, 21, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(195, '881422', 'ถั่วลันเตาเคลือบ รสวาซาบิ', 6, 24, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(196, '881423', 'ขนมถั่วลันเตาอบกรอบ รสดั้งเดิม', 6, 18, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(197, '881424', 'ขนมถั่วลันเตาอบกรอบ รสวาซาบิ', 6, 10, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-14 19:58:27', 'active'),
(198, '881425', 'ข้าวเกรียบกุ้ง รสดั้งเดิม', 6, 25, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(199, '881426', 'ข้าวเกรียบกุ้ง รสไข่แดงไข่เค็ม', 6, 15, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(200, '881427', 'ขนมขาไก่ รสต้นตำรับ', 6, 21, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-14 19:58:27', 'active'),
(201, '881428', 'มันฝรั่งกรอบ', 6, 25, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(202, '881429', 'มันฝรั่งกรอบ', 6, 22, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:09:59', 'active'),
(203, '881430', 'ข้าวโพดกรอบ รสชีส', 6, 19, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:09:59', 'active'),
(204, '881431', 'ข้าวโพดกรอบ', 6, 18, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:09:59', 'active'),
(205, '881432', 'ขนมข้าวโพดอบกรอบ รสดั้งเดิม', 6, 11, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(206, '881433', 'ข้าวเกรียบปลาหมึก', 6, 25, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(207, '881434', 'ข้าวโพดอบกรอบ รสปลาหมึก', 6, 24, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(208, '881435', 'ขนมอบกรอบรสมะเขือเทศ', 6, 15, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(209, '881436', 'ขนมอบกรอบรสพริกหยวก', 6, 25, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(210, '881437', 'หมูแผ่นกรอบ', 6, 13, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(211, '881438', 'ข้าวตังหน้าหมึกย่าง', 6, 10, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(212, '881439', 'ข้าวตังหน้ากุ้งหยอง', 6, 22, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(213, '881440', 'ข้าวตังหน้าหมูหยอง', 6, 12, '5.00', '4.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(214, '881441', 'ขนมถั่วตัด', 6, 20, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(215, '881442', 'ขนมงาดำตัด ', 6, 25, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'active'),
(216, '881443', 'ปากกาลูกลื่นตราม้า H611', 1, 35, '13.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:09:41', 'active'),
(217, '881444', 'ปากกาลูกลื่นตราม้า H610', 1, 20, '12.00', '11.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:09:36', 'active'),
(218, '881445', 'ปากกาลูกลื่นตราม้า H1400', 1, 45, '10.00', '5.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 20:09:58', 'active'),
(219, '881446', 'ปากกาลูกลื่นตราม้า H750', 1, 38, '15.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 19:40:41', 'active'),
(220, '881447', 'ปากกาลูกลื่นตราม้า H108', 1, 16, '7.00', '5.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:10:20', 'active'),
(221, '881448', 'ปากกาลูกลื่นตราม้า H557', 1, 28, '8.00', '6.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:10:20', 'active'),
(222, '881449', 'ปากกาลูกลื่นตราม้า H1000', 1, 32, '9.00', '5.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:09:16', 'active'),
(223, '881450', 'ปากกาลูกลื่นตราม้า H612', 1, 39, '13.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:09:11', 'active'),
(224, '881451', 'ปากกาลูกลื่นตราม้า H613', 1, 35, '11.00', '6.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:09:04', 'active'),
(225, '881452', 'ปากกาลูกลื่นตราม้า H022', 1, 23, '12.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:08:29', 'active'),
(226, '881453', 'ยางลบแท่งหมุน H101', 1, 20, '15.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:08:24', 'active'),
(227, '881454', 'ยางลบ H100', 1, 20, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:08:19', 'active'),
(228, '881455', 'ยางลบ H20', 1, 50, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:08:16', 'active'),
(229, '881456', 'ยางลบดินสอ H45', 1, 25, '5.00', '3.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 20:41:18', 'active'),
(230, '881457', 'ยางลบดินสอก้อนดำตราม้า H11', 1, 58, '10.00', '5.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:10:07', 'active'),
(231, '881458', 'ยางลบดินสอ AR270', 1, 18, '7.00', '5.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:10:07', 'active'),
(232, '881459', 'กระดาษ A4', 1, 16, '20.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:10:07', 'active'),
(233, '881460', 'กระดาษ Idea', 1, 17, '20.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:10:07', 'active'),
(234, '881461', 'Pental กระดาษรายงาน', 1, 92, '20.00', '10.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 20:34:04', 'active'),
(235, '881462', 'Pental ปากกาลบคบผิด NP10', 1, 40, '25.00', '18.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-03-06 20:40:24', 'active'),
(237, '881464', 'Pental เทปลบคำผิด', 1, 20, '25.00', '15.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:10:50', 'active'),
(238, '881465', 'Pental ลิควิดเปเปอร์ลายน่ารัก', 1, 20, '25.00', '20.00', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-02-03 21:10:43', 'active'),
(239, '881466', 'Pental ลิควิดเกรด A', 1, 30, '25.00', '19.67', '', 'active', 1, '0000-00-00 00:00:00', 1, '2021-01-28 13:43:22', 'inactive'),
(240, '881467', 'Pental ลิควิดเกรด B', 1, 15, '25.00', '12.00', '', 'inactive', 1, '0000-00-00 00:00:00', 1, '2021-02-27 15:11:13', 'active'),
(242, '882467', 'ชานมเย็น', 2, 29, '25.00', '20.00', '', 'inactive', 1, '2021-02-04 13:16:39', 1, '2021-03-06 19:37:55', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `scs_product_loss_detail`
--

CREATE TABLE `scs_product_loss_detail` (
  `pld_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสข้อมูลการตัดจ่าย',
  `pld_product_id` int(10) NOT NULL COMMENT 'รหัสข้อมูลสินค้า',
  `pld_amount` int(10) NOT NULL COMMENT 'จำนวนสินค้าที่ตัดจ่ายในครั้งนี้',
  `pld_note_id` int(10) NOT NULL COMMENT 'รหัสข้อมูลหมายเหตุการเงิน',
  `pld_cost_price` decimal(10,2) NOT NULL COMMENT 'ราคาต้นทุนต่อหน่วย',
  `pld_description` varchar(100) NOT NULL COMMENT 'คำอธิบายการตัดจ่าย',
  `pld_product_loss_header_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_product_loss_detail`
--

INSERT INTO `scs_product_loss_detail` (`pld_id`, `pld_product_id`, `pld_amount`, `pld_note_id`, `pld_cost_price`, `pld_description`, `pld_product_loss_header_id`) VALUES
(45, 91, 8, 2, '9.00', '', 1),
(46, 95, 4, 2, '9.00', '', 1),
(47, 94, 4, 2, '8.00', '', 1),
(48, 7, 6, 2, '24.00', '', 2),
(49, 234, 6, 3, '10.00', '', 3),
(50, 75, 5, 2, '16.53', '', 4),
(51, 235, 8, 3, '18.00', '', 5),
(52, 229, 5, 0, '3.00', 'หาย', 6),
(53, 75, 14, 0, '16.53', 'หาย', 7);

-- --------------------------------------------------------

--
-- Table structure for table `scs_product_loss_header`
--

CREATE TABLE `scs_product_loss_header` (
  `plh_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสหัวตัดจ่ายสินค้า',
  `plh_total_price` decimal(10,2) NOT NULL COMMENT 'ราคารวมทั้งหมด',
  `plh_total_amount` int(10) NOT NULL COMMENT 'จำนวนสินค้า',
  `plh_employee_create_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่สร้างข้อมูล',
  `plh_create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สร้าง',
  `plh_employee_update_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่แก้ไขข้อมูล',
  `plh_update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่ปรับปรุงตล่าสุด',
  `plh_delete_status` enum('active','inactive','','') NOT NULL COMMENT 'สถานะการลบข้อมูล 1 = ยังใช้งาน 2 = ไม่ได้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_product_loss_header`
--

INSERT INTO `scs_product_loss_header` (`plh_id`, `plh_total_price`, `plh_total_amount`, `plh_employee_create_id`, `plh_create_date`, `plh_employee_update_id`, `plh_update_date`, `plh_delete_status`) VALUES
(1, '140.00', 16, 1, '2020-08-19 20:42:23', 1, '2021-03-06 20:46:45', 'inactive'),
(2, '144.00', 6, 1, '2020-10-13 00:00:00', 0, '2021-03-06 20:46:59', 'active'),
(3, '60.00', 6, 1, '2020-11-15 00:00:00', 0, '2021-03-06 20:47:08', 'active'),
(4, '82.65', 5, 1, '2020-12-25 00:00:00', 0, '2021-03-06 20:47:16', 'active'),
(5, '144.00', 8, 1, '2021-01-10 20:43:03', 0, '2021-03-06 20:47:27', 'active'),
(6, '15.00', 5, 1, '2021-02-11 00:00:00', 0, '2021-03-06 20:47:36', 'active'),
(7, '231.42', 14, 1, '2021-02-15 00:00:00', 0, '2021-03-06 20:47:44', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `scs_stock_transaction_detail`
--

CREATE TABLE `scs_stock_transaction_detail` (
  `std_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสรายละเอียดข้อมูลประวัติการสั่งซื้อสิ้นค้า',
  `std_product_id` int(10) NOT NULL COMMENT 'รหัสข้อมูลสินค้า',
  `std_amount` int(10) NOT NULL COMMENT 'จำนวนสินค้าที่ได้รับ',
  `std_cost_price` decimal(10,2) NOT NULL COMMENT 'ราคาต้นทุน',
  `std_stock_transaction_id` int(10) NOT NULL COMMENT 'รหัสข้อมูลประวัติการสั่งซื้อสิ้นค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_stock_transaction_detail`
--

INSERT INTO `scs_stock_transaction_detail` (`std_id`, `std_product_id`, `std_amount`, `std_cost_price`, `std_stock_transaction_id`) VALUES
(143, 180, 12, '4.00', 93),
(144, 200, 12, '3.00', 93),
(145, 197, 12, '4.00', 93),
(146, 2, 1, '10.00', 94),
(147, 53, 12, '24.00', 95),
(148, 69, 12, '5.00', 95),
(149, 134, 6, '150.00', 96),
(150, 84, 12, '10.00', 96),
(151, 90, 6, '10.00', 96),
(152, 4, 12, '20.00', 97),
(153, 6, 12, '10.00', 97),
(154, 10, 12, '20.00', 97),
(155, 9, 12, '21.00', 98),
(156, 63, 12, '5.00', 99),
(157, 8, 10, '25.00', 100),
(158, 5, 10, '10.00', 100),
(159, 7, 10, '24.00', 100),
(160, 242, 20, '20.00', 101),
(161, 68, 12, '5.00', 102),
(162, 219, 30, '10.00', 102),
(163, 60, 12, '5.00', 102),
(164, 175, 24, '3.00', 103),
(165, 61, 12, '5.00', 104),
(166, 218, 30, '5.00', 105);

-- --------------------------------------------------------

--
-- Table structure for table `scs_stock_transaction_header`
--

CREATE TABLE `scs_stock_transaction_header` (
  `sts_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสข้อมูลประวัติการสั่งซื้อสิ้นค้า',
  `sts_code` varchar(15) NOT NULL COMMENT 'หมายเลขใบเสร็จ',
  `sts_supplier_id` int(10) NOT NULL COMMENT 'รหัสข้อมูลบริษัทที่จำหน่ายสินค้า',
  `sts_total_price` decimal(10,2) NOT NULL COMMENT 'ราคารวมทั้งหมด',
  `sts_total_amount` int(10) NOT NULL COMMENT 'จำนวนสินค้าทั้งหมด',
  `sts_employee_create_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่รับสินค้า',
  `sts_create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่รับสินค้า',
  `sts_employee_update_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่แก้ไขข้อมูล	',
  `sts_update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่ปรับปรุงล่าสุด	',
  `sts_delete_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการลบข้อมูล\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_stock_transaction_header`
--

INSERT INTO `scs_stock_transaction_header` (`sts_id`, `sts_code`, `sts_supplier_id`, `sts_total_price`, `sts_total_amount`, `sts_employee_create_id`, `sts_create_date`, `sts_employee_update_id`, `sts_update_date`, `sts_delete_status`) VALUES
(93, '99', 1, '132.00', 36, 1, '2021-02-14 19:06:16', 1, '2021-03-06 20:11:11', 'inactive'),
(94, '1', 1, '10.00', 1, 1, '2020-07-08 17:44:02', 0, '2021-03-06 20:18:11', 'active'),
(95, '2', 4, '348.00', 24, 1, '2020-08-09 20:18:32', 0, '2021-03-06 20:18:37', 'active'),
(96, '3', 5, '1080.00', 24, 1, '2020-09-09 17:16:58', 0, '2021-03-06 20:18:49', 'active'),
(97, '4', 5, '600.00', 36, 1, '2020-10-15 17:25:07', 0, '2021-03-06 20:18:56', 'active'),
(98, '5', 4, '252.00', 12, 1, '2020-11-12 17:49:03', 0, '2021-03-06 20:19:08', 'active'),
(99, '6', 5, '60.00', 12, 1, '2020-12-18 19:24:54', 0, '2021-03-06 20:19:14', 'active'),
(100, '7', 1, '590.00', 30, 1, '2021-01-11 19:26:16', 0, '2021-03-06 20:19:30', 'active'),
(101, '8', 1, '400.00', 20, 1, '2021-02-17 19:37:55', 0, '2021-03-06 20:19:35', 'active'),
(102, '9', 4, '420.00', 54, 1, '2021-02-22 19:40:40', 0, '2021-03-06 20:19:43', 'active'),
(103, '10', 5, '72.00', 24, 1, '2021-02-28 20:19:54', 0, '2021-03-06 20:19:57', 'active'),
(104, '11', 5, '60.00', 12, 1, '2021-03-01 20:08:51', 0, '2021-03-06 20:20:11', 'active'),
(105, '12', 4, '150.00', 30, 1, '2021-03-06 20:09:58', 0, '2021-03-06 20:09:58', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `scs_supplier`
--

CREATE TABLE `scs_supplier` (
  `sp_id` int(10) UNSIGNED NOT NULL COMMENT 'รหัสข้อมูลบริษัทที่จำหน่ายสินค้า',
  `sp_name` varchar(50) NOT NULL COMMENT 'ชื่อบริษัทที่จำหน่ายสินค้า',
  `sp_tel` varchar(15) NOT NULL COMMENT 'เบอร์โทรติดต่อ',
  `sp_active_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการใช้งาน\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน',
  `sp_employee_create_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่สร้างข้อมูล',
  `sp_create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สร้าง',
  `sp_employee_update_id` int(10) NOT NULL COMMENT 'รหัสพนักงานที่แก้ไขข้อมูล',
  `sp_update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่ปรับปรุงล่าสุด',
  `sp_delete_status` enum('active','inactive') NOT NULL COMMENT 'สถานะการลบข้อมูล\r\n1 = ยังใช้งาน\r\n2 = ไม่ได้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scs_supplier`
--

INSERT INTO `scs_supplier` (`sp_id`, `sp_name`, `sp_tel`, `sp_active_status`, `sp_employee_create_id`, `sp_create_date`, `sp_employee_update_id`, `sp_update_date`, `sp_delete_status`) VALUES
(1, 'ก. จำกัด', '09942010201', 'active', 1, '2020-08-19 14:02:08', 1, '2021-02-03 21:06:16', 'active'),
(4, 'ข. จำกัด', '09942010152', 'active', 1, '2020-12-24 15:33:45', 1, '2021-02-03 21:06:20', 'active'),
(5, 'ค. จำกัด', '0809425366', 'active', 1, '2021-02-03 21:05:33', 1, '2021-02-03 21:06:38', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scs_bill_detail`
--
ALTER TABLE `scs_bill_detail`
  ADD PRIMARY KEY (`bdt_id`);

--
-- Indexes for table `scs_bill_header`
--
ALTER TABLE `scs_bill_header`
  ADD PRIMARY KEY (`bhd_id`);

--
-- Indexes for table `scs_category_product`
--
ALTER TABLE `scs_category_product`
  ADD PRIMARY KEY (`cpd_id`);

--
-- Indexes for table `scs_counter_transaction`
--
ALTER TABLE `scs_counter_transaction`
  ADD PRIMARY KEY (`cts_id`);

--
-- Indexes for table `scs_employee`
--
ALTER TABLE `scs_employee`
  ADD PRIMARY KEY (`ep_id`);

--
-- Indexes for table `scs_note`
--
ALTER TABLE `scs_note`
  ADD PRIMARY KEY (`nt_id`);

--
-- Indexes for table `scs_product`
--
ALTER TABLE `scs_product`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `scs_product_loss_detail`
--
ALTER TABLE `scs_product_loss_detail`
  ADD PRIMARY KEY (`pld_id`);

--
-- Indexes for table `scs_product_loss_header`
--
ALTER TABLE `scs_product_loss_header`
  ADD PRIMARY KEY (`plh_id`);

--
-- Indexes for table `scs_stock_transaction_detail`
--
ALTER TABLE `scs_stock_transaction_detail`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `scs_stock_transaction_header`
--
ALTER TABLE `scs_stock_transaction_header`
  ADD PRIMARY KEY (`sts_id`);

--
-- Indexes for table `scs_supplier`
--
ALTER TABLE `scs_supplier`
  ADD PRIMARY KEY (`sp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scs_bill_detail`
--
ALTER TABLE `scs_bill_detail`
  MODIFY `bdt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลรายละเอียดของใบเสร็จ', AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `scs_bill_header`
--
ALTER TABLE `scs_bill_header`
  MODIFY `bhd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลใบเสร็จ', AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `scs_category_product`
--
ALTER TABLE `scs_category_product`
  MODIFY `cpd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลประเภทสินค้า', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `scs_counter_transaction`
--
ALTER TABLE `scs_counter_transaction`
  MODIFY `cts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสเคาน์เตอร์', AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `scs_employee`
--
ALTER TABLE `scs_employee`
  MODIFY `ep_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงานใช้บอกถึงลำดับ', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `scs_note`
--
ALTER TABLE `scs_note`
  MODIFY `nt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลหมายเหตุ', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `scs_product`
--
ALTER TABLE `scs_product`
  MODIFY `pd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ลำดับสินค้า', AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `scs_product_loss_detail`
--
ALTER TABLE `scs_product_loss_detail`
  MODIFY `pld_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลการตัดจ่าย', AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `scs_product_loss_header`
--
ALTER TABLE `scs_product_loss_header`
  MODIFY `plh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสหัวตัดจ่ายสินค้า', AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `scs_stock_transaction_detail`
--
ALTER TABLE `scs_stock_transaction_detail`
  MODIFY `std_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดข้อมูลประวัติการสั่งซื้อสิ้นค้า', AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `scs_stock_transaction_header`
--
ALTER TABLE `scs_stock_transaction_header`
  MODIFY `sts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลประวัติการสั่งซื้อสิ้นค้า', AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `scs_supplier`
--
ALTER TABLE `scs_supplier`
  MODIFY `sp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลบริษัทที่จำหน่ายสินค้า', AUTO_INCREMENT=6;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"db_crs\",\"table\":\"crs_transaction\"},{\"db\":\"db_crs\",\"table\":\"crs_transaction_temp\"},{\"db\":\"db_crs\",\"table\":\"crs_car\"},{\"db\":\"db_crs\",\"table\":\"crs_user\"},{\"db\":\"db_crs\",\"table\":\"crs_user_type\"},{\"db\":\"db_crs\",\"table\":\"crs_car_brand\"},{\"db\":\"db_crs\",\"table\":\"crs_transaction_user\"},{\"db\":\"db_crs\",\"table\":\"crs_user_doc\"},{\"db\":\"db_crs\",\"table\":\"crs_car_model\"},{\"db\":\"db_crs\",\"table\":\"crs_place\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'db_crs', 'crs_car', '{\"sorted_col\":\"`crs_car`.`car_owner_id`  ASC\"}', '2022-03-05 14:45:36'),
('root', 'db_crs', 'crs_car_brand', '{\"sorted_col\":\"`crs_car_brand`.`car_brand_name_en` ASC\"}', '2022-02-20 09:25:53'),
('root', 'db_crs', 'crs_car_model', '{\"sorted_col\":\"`crs_car_model`.`car_brand_id` ASC\"}', '2022-02-19 11:46:09'),
('root', 'db_crs', 'crs_place', '{\"sorted_col\":\"`crs_place`.`place_name`  DESC\"}', '2022-01-21 09:44:59'),
('root', 'db_crs', 'crs_transaction', '{\"sorted_col\":\"`crs_transaction`.`transaction_status`  DESC\"}', '2022-03-05 11:45:33'),
('root', 'db_crs', 'crs_transaction_temp', '{\"sorted_col\":\"`crs_transaction_temp`.`user_doc_id` ASC\",\"CREATE_TIME\":\"2022-03-04 00:17:07\"}', '2022-03-04 15:47:39'),
('root', 'db_crs', 'crs_user', '{\"sorted_col\":\"`crs_user`.`user_id` ASC\"}', '2022-03-05 14:30:57'),
('root', 'db_crs', 'crs_user_doc', '{\"sorted_col\":\"`crs_user_doc`.`user_id` ASC\",\"CREATE_TIME\":\"2022-01-06 11:33:19\",\"col_order\":[0,1,3,2,4,5,6,7],\"col_visib\":[1,1,1,1,1,1,1,1]}', '2022-02-11 04:54:07'),
('root', 'db_ie', 'ie_transaction', '{\"sorted_col\":\"`ie_transaction`.`transaction_delete_status` ASC\"}', '2021-03-12 03:20:16'),
('root', 'db_ie', 'ie_user', '{\"sorted_col\":\"`ie_user`.`user_delete_status`  DESC\"}', '2021-03-12 03:43:59'),
('root', 'db_scs', 'scs_bill_header', '{\"sorted_col\":\"`scs_bill_header`.`bhd_create_date`  DESC\"}', '2021-03-11 05:25:45'),
('root', 'db_scs', 'scs_product', '{\"sorted_col\":\"`scs_product`.`pd_category_product_id`  ASC\"}', '2021-03-06 15:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-03-12 10:56:58', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `web_secure`
--
CREATE DATABASE IF NOT EXISTS `web_secure` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web_secure`;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'admin', '123', 'sirapop', 'koonsinchai'),
(2, 'admin2', '123', 'testA', 'testB'),
(3, 'admin3', '123', '1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `wine`
--

CREATE TABLE `wine` (
  `id` int(11) NOT NULL,
  `wine_brand` varchar(500) NOT NULL,
  `wine_type` varchar(500) NOT NULL,
  `grape_variety` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wine`
--

INSERT INTO `wine` (`id`, `wine_brand`, `wine_type`, `grape_variety`) VALUES
(1, 'Terra Mater \\\"Premium Vineyard\\\"', 'Red Wine', 'Cabernet Sauvignon'),
(2, 'Lazo', 'Red Wine', 'Cabernet Sauvignon'),
(3, 'Teeter-Totter', 'Red Wine', 'Cabernet Sauvignon'),
(4, 'De Wetshof Naissance', 'Red Wine', 'Cabernet Sauvignon'),
(5, 'Fog Mountain Cabernet', 'Red Wine', 'Cabernet Sauvignon'),
(6, 'Angus The Bull', 'Red Wine', 'Cabernet Sauvignon'),
(7, '30 MILE Shiraz', 'Red Wine', 'Shiraz'),
(8, 'Terra Mater - MAGNA', 'Red Wine', 'Shiraz'),
(9, 'The Curious Grape', 'Red Wine', 'Shiraz'),
(10, 'Vina Maipo \\\"Mi Pueblo\\\"', 'Red Wine', 'Merlot'),
(11, 'Torresella Merlot', 'Red Wine', 'Merlot'),
(12, 'Rawson\\\'s Retreat', 'Red Wine', 'Merlot'),
(13, 'Beaulieu Vineyard (BV)', 'Red Wine', 'Merlot'),
(14, 'Samuel Robert Winery', 'Red Wine', 'Pinot Noir'),
(15, 'LE Grand Noir', 'Red Wine', 'Pinot Noir'),
(16, 'Goose Bay', 'Red Wine', 'Pinot Noir'),
(17, 'Vignobles Roussellet', 'Red Wine', 'Pinot Noir'),
(18, 'OCEAN BAY', 'White Wine', 'Sauvignon Blanc'),
(19, 'Paua Bay', 'White Wine', 'Sauvignon Blanc'),
(20, 'Blank Canvas', 'White Wine', 'Sauvignon Blanc'),
(21, 'Vina Maipo \\\"Mi Pueblo\\\"', 'White Wine', 'Chardonnay'),
(22, 'Robertson Winery Chardonnay', 'White Wine', 'Chardonnay'),
(23, 'SELBACH', 'White Wine', 'Riesling'),
(24, 'Robert Mondavi', 'White Wine', 'Riesling'),
(25, 'Zonin Borgo SanLeo', 'Sparkling Wine', 'Glera'),
(26, 'Glera', 'Sparkling Wine', 'Glera'),
(27, 'Glera Frizzante', 'Sparkling Wine', 'Glera'),
(28, 'Santa Ana', 'Sparkling Wine', 'Moscato'),
(29, 'VALLEBELBO LE FILERE', 'Sparkling Wine', 'Moscato'),
(30, 'AZAHARA', 'Sparkling Wine', 'Moscato'),
(31, 'A. Scherer', 'Sparkling Wine', 'Pinot Blanc'),
(32, 'Cave de Ribeauville', 'Sparkling Wine', 'Pinot Blanc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wine`
--
ALTER TABLE `wine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
