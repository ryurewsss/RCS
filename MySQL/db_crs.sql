-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 07:55 AM
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
(35, 'รย 5412 ชลบุรี', 24, 1, 2500, '1', 'mazda31.jpg', 'mazda31.jpg', '2022-02-20 16:16:29', '2022-03-04 20:37:26', 1, 1);

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
(2, 35, 0, 1, 15, 2, '2022-03-07 06:00:00', '2022-03-07 06:00:00', '2', 2500, '', '1', '', 'tran_img4.PNG', '', '', '', '', '2022-03-04 23:30:23', '2022-03-04 23:33:54', 1, 1),
(3, 33, 0, 1, 15, 2, '2022-03-07 06:00:00', '2022-03-07 06:00:00', '2', 1800, '', '1', '', 'tran_img5.PNG', '', '', '', '', '2022-03-04 23:39:12', '2022-03-04 23:40:22', 1, 1),
(4, 32, 1, 1, 15, 2, '2022-03-06 06:00:00', '2022-03-07 06:00:00', '3', 2000, '1', '1', '', 'tran_img6.PNG', '1', '1', '', '', '2022-03-04 23:42:19', '2022-03-04 23:48:20', 1, 1);

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
(3, 2, 'member2@gmail.com', '$2y$10$HIQDSNUqsB/IazU0rPITieDkhJsOaIgcVM3FTzECTN.FwN1qPwWHG', 'Sirapop', 'Koonsin', '0809425365', '300px-Scared_Hamster.jpg', '2022-01-31 16:26:40', '2022-02-11 11:44:38', 0, 3);

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
(14, 3, 'id_card.PNG', 'driving_img.PNG', '2022-02-14 11:51:39', '2022-02-25 17:30:11', 3, 3),
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
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crs_transaction_temp`
--
ALTER TABLE `crs_transaction_temp`
  MODIFY `transaction_temp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
