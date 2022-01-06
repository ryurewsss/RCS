-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 05:05 AM
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
(10, 'ฎง 9999 กรุงเทพมหานคร', 'Honda', 'Brio', '5 ที่นั่ง', 'Honda Brio รถยนต์อีโคคาร์จากค่ายฮอนด้าที่มาพร้อมรูปลักษณ์รูปทรงภายนอกที่เป็นเอกลักษณ์ของฮอนด้า โดยมีให้เลือกทั้ง 4 ประตูภายใต้ชื่อ Honda Brio Amaze และแบบ 5 ประตู Honda Brio V ภายในดีไซน์ได้อย่างลงตัว มาพร้อมเครื่องยนต์ 1.2 ลิตร 4 สูบ 90 แรงม้า', 2200, 'hondabrio.jpg'),
(11, 'กก 1150 ชลบุรี', 'Mitsubishi', 'Pajero 2019', '7 ที่นั่ง', 'NEW MITSUBISHI PAJERO SPORT รุ่นล่าสุดที่บุกตลาดรถอเนกประสงค์ในเวลานี้ ได้รับการปรับปรุง และพัฒนาให้ดีขึ้นมากกว่ารุ่นเดิมหลายด้าน ทั้งการดีไซน์รูปลักษณ์ภายนอกใหม่เพิ่มความล้ำสมัย และภายในห้องโดยสารตกแต่งใหม่ เพิ่มเติมออฟชั่นจำเป็นในการใช้งานที่น่าสนใจหลายด้าน รวมถึงการปรับเซ็ทช่วงล่างใหม่ให้นุ่มนวล', 2600, 'MITSUBISHI_PAJERO.jpg'),
(12, 'สส 5510 เชียงใหม่', 'Honda', 'Amaze', '5 ที่นั่ง', 'ระบบกุญแจอัจฉริยะ และกล้องมองภาพรอบคัน พร้อมเส้นกะระยะถูกใส่มาให้เพิ่มเติมในการปรับโฉมใหม่ครั้งนี้เพื่อความสะดวกสบายของผู้ใช้งาน  ส่วนความปลอดภัยที่มีอยู่เดิมคือถุงลมนิรภัยคู่หน้า ระบบเบรก ABS และ EBD รวมถึงโครงสร้างตัวถังนิรภัย\r\n\r\nขุมพลังขับเคลื่อนของ Amaze ยังคงเป็นเครื่องยนต์เบนซิน 4 สูบ ขนาด 1.2', 3000, 'brioamaze.jpg'),
(13, 'พก 7412 ชลบุรี', 'Toyota', 'Fortuner', '7 ที่นั่ง', 'อนิว โตโยต้า ฟอร์จูนเนอร์ 2016 ใหม่ (All New Toyota Fortuner 2016) เป็นรถยนต์อเนกประสงค์ MPV โดยพัฒนามาจากพื้นฐานรถกระบะ โตโยต้า ไฮลักซ์ รีโว สามารถใช้งานได้เหมาะสมทั้งเขตพื้นที่ในชุมชนเมืองและต่างจังหวัด', 2100, 'fortuner_1.jpg'),
(14, 'รด 9412 สมุทรปราการ', 'Toyota', 'Vios 2019', '5 ที่นั่ง', 'TOYOTA VIOS MY2019 มากับการใส่ความโดดเด่นของกระจังหน้าตัววีพร้อมความดุดันของกันชนหน้าที่ทำให้ดูมีความเป็นสปอร์ตมากขึ้นกว่ารุ่นก่อนๆ TOYOTA VIOS MY2019 ถือว่าทำได้ดีกับการออกแบบสัดส่วนด้านหน้าด้วยการใส่องค์ประกอบที่โดดเด่นอย่างไฟหน้า LED แบบเส้นพร้อมไฟหน้าที่ดูลำยุคด้วยหลอดไฟโปรเจคเตอร์', 2000, 'vios2019.jpg'),
(15, 'คฟ 7456 ชลบุรี', 'Toyota ', 'Sienta 2020', '5 ที่นั่ง', 'โตโยต้า เซียนต้า รูปลักษณ์ภายนอกออกแบบภายใต้แรงบันดาลใจจากรองเท้าเดินป่าสมัยใหม่ สะท้อนให้เห็นถึงคนรุ่นใหม่ที่รักการท่องเที่ยว มีไลฟ์สไตล์ที่หลากหลาย ภายในออกแบบให้มี 3 แถว 7 ที่นั่ง รองรับห้องโดยสารที่กว้างขวาง เน้นประโยชน์ใช้สอยและความสะดวกสบายในการใช้งานเป็นหลัก', 1800, 'TOYOTA SIENTA 2020.jpg'),
(16, 'กอ 1254 กรุงเทพมหานคร', 'Honda', 'Mobilio 2019 RS', '5 ที่นั่ง', 'ฮอนด้า โมบิลิโอ ใหม่ มีระบบแบบยนตรกรรมอเนกประสงค์ขนาดซับคอมแพคท์ ที่มาพร้อมความหรูหราที่มากยิ่งขึ้นด้วยดีไซน์ใหม่ทั้งภายนอกและภายใน รวมถึงอุปกรณ์อำนวยความสะดวกสบาย และมาตรฐานความปลอดภัยที่ครบครันยิ่งขึ้น ห้องโดยสารที่กว้างขวาง และพื้นที่ใช้สอยที่รองรับทุกการใช้งาน เพื่อช่วยยกระดับไลฟ์สไตล์คนเมืองยุค', 2800, 'HONDA MOBILIO 2019 RS.jpg');

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
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
