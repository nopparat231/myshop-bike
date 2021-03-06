-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 11:01 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `admin_user` varchar(20) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_address` varchar(100) NOT NULL,
  `admin_tel` varchar(10) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_user`, `admin_pass`, `admin_name`, `admin_address`, `admin_tel`, `admin_email`, `status`, `date_save`) VALUES
(000001, '1', '1', 'admin', 'asd', '0123456789', '', 'admin', '2017-08-30 01:57:41'),
(000002, '2', '2', 'ทดสอบ แอดมิน', 'testtt', '0123456789', '', 'staff', '2018-01-25 04:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `b_id` int(11) NOT NULL,
  `b_number` varchar(50) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `b_type` varchar(50) NOT NULL,
  `b_owner` varchar(50) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  `b_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`b_id`, `b_number`, `b_name`, `b_type`, `b_owner`, `bn_name`, `b_logo`) VALUES
(2, '232-326-54543-425', 'กรุงไทย', 'ออมทรัพ', 'สมชาย ใจดี', 'พระสมุทรเจดีย์', 'imgb87159464020180819_000254.jpg'),
(3, '435-545-65454-545', 'กสิกรไทย', 'ออมทรัพย์', 'มงคล ศรีสุข', 'พระสมุทรเจดีย์', 'imgb197504342620180818_223441.png'),
(4, '235-545-66684-845', 'ไทยพาณิชย์', 'ออมทรัพย์', 'สมบูรณ์ มั่งมี', 'พระสมุทรเจดีย์', 'imgb133828463220180818_223607.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mem_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `mem_name` varchar(50) NOT NULL,
  `mem_address` varchar(255) NOT NULL,
  `mem_tel` varchar(10) NOT NULL,
  `mem_username` varchar(20) NOT NULL,
  `mem_password` varchar(20) NOT NULL,
  `mem_email` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  `sid` varchar(32) NOT NULL,
  `active` varchar(3) NOT NULL,
  `dateinsert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `mem_name`, `mem_address`, `mem_tel`, `mem_username`, `mem_password`, `mem_email`, `status`, `sid`, `active`, `dateinsert`) VALUES
(000007, 'dddd', 'dddd', '0902020202', 'dddd', 'dddd', '23.noop@gmail.com', 'user', 'u3ia1e8d7ddbmcpqt7b0uq2tr0', 'yes', '2018-08-26 03:32:16'),
(000008, 'eeee', 'eeee', '2222222222', 'eeee', 'eeee', '23.noop@gmail.com', 'user', 'kgddv7hf9n54kltfgslnjmu7t3', 'yes', '2018-08-26 03:41:35'),
(000009, 'aaaa', 'bbbb', '2121212121', 'bbb', 'bbb', '23.noop@gmail.com', 'user', '7vff77gqj3l3ilmi20il62btd2', 'yes', '2018-08-26 05:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new`
--

CREATE TABLE `tbl_new` (
  `new_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `mem_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `order_status` int(1) NOT NULL,
  `pay_slip` varchar(200) DEFAULT NULL,
  `b_name` varchar(100) DEFAULT NULL,
  `b_number` varchar(200) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `pay_fa` float(10,2) NOT NULL,
  `pay_amount` float(10,2) DEFAULT NULL,
  `postcode` varchar(30) DEFAULT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `mem_id`, `name`, `address`, `email`, `phone`, `order_status`, `pay_slip`, `b_name`, `b_number`, `pay_date`, `pay_fa`, `pay_amount`, `postcode`, `order_date`) VALUES
(000003, 7, 'dddd', 'dddd', '23.noop@gmail.com', '0902020202', 4, '44421295020181106_231732.jpg', 'กสิกรไทย', '435-545-65454-545', '2018-11-06', 10000.00, 19189.38, '', '2018-11-06'),
(000004, 7, 'dddd', 'dddd', '23.noop@gmail.com', '0902020202', 2, '134863616320181107_001904.jpg', 'ไทยพาณิชย์', '235-545-66684-845', '2018-11-07', 3000.00, 47032.92, '', '2018-11-07'),
(000006, 7, 'dddd', 'dddd', '23.noop@gmail.com', '0902020202', 3, '34585961720181109_235600.jpg', 'ไทยพาณิชย์', '235-545-66684-845', '2018-11-09', 60602.72, 160602.72, 'TH1235455556', '2018-11-09'),
(000016, 9, 'aaaa', 'bbbb', '23.noop@gmail.com', '2121212121', 1, '', '', '', '0000-00-00', 44000.00, 0.00, '', '2019-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) DEFAULT NULL,
  `p_c_qty` int(11) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `order_id`, `p_id`, `p_name`, `p_c_qty`, `total`) VALUES
(1, 1, 27, '2018 TREK MARLIN 6', 1, '14370.1'),
(2, 1, 29, 'SURLY LONG HAUL TRUCKER', 15, '626688.3'),
(3, 2, 26, '2015 MERIDA BIG 9 - 500D', 1, '23516.46'),
(4, 3, 32, 'MERIDA JULIET7-100 (2017)', 1, '19189.38'),
(5, 4, 26, '2015 MERIDA BIG 9 - 500D', 2, '47032.92'),
(6, 5, 32, 'MERIDA JULIET7-100 (2017)', 1, '19189.38'),
(7, 6, 32, 'MERIDA JULIET7-100 (2017)', 1, '19189.38'),
(8, 6, 28, '2015 RIDLEY FENIX (CARBON)', 3, '141413.34'),
(9, 7, 32, 'MERIDA JULIET7-100 (2017)', 1, '19189.38'),
(10, 8, 32, 'MERIDA JULIET7-100 (2017)', 1, '19189.38'),
(11, 8, 31, 'LAMBORGHINI 20\" CONCETTO', 1, '23604.2'),
(12, 9, 30, 'BMC ALPENCHALLENGE AC02', 1, '15012.1'),
(13, 10, 31, 'LAMBORGHINI 20\" CONCETTO', 1, '23604.2'),
(14, 11, 32, 'MERIDA JULIET7-100 (2017)', 1, '19189.38'),
(15, 12, 32, 'MERIDA JULIET7-100 (2017)', 1, '19189.38'),
(16, 13, 31, 'LAMBORGHINI 20\" CONCETTO', 1, '23604.2'),
(17, 14, 29, 'SURLY LONG HAUL TRUCKER', 1, '41779.22'),
(18, 15, 28, '2015 RIDLEY FENIX (CARBON)', 1, '47137.78'),
(19, 16, 28, '2015 RIDLEY FENIX (CARBON)', 2, '94275.56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_size` varchar(11) NOT NULL,
  `p_detial` text NOT NULL,
  `p_price_a` float(10,2) NOT NULL,
  `p_price` float(10,2) NOT NULL,
  `p_unit` varchar(20) NOT NULL,
  `p_img1` varchar(200) NOT NULL,
  `p_img2` varchar(100) DEFAULT NULL,
  `p_view` int(11) NOT NULL,
  `p_qty` int(11) DEFAULT NULL,
  `p_ems` int(50) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `t_id`, `p_name`, `p_size`, `p_detial`, `p_price_a`, `p_price`, `p_unit`, `p_img1`, `p_img2`, `p_view`, `p_qty`, `p_ems`, `date_save`) VALUES
(26, 15, '2015 MERIDA BIG 9 - 500D', '15', '<p><strong>2015 Merida BIG NINE - 500</strong></p>\r\n\r\n<p>&nbsp;<strong>FRAME</strong>&nbsp;: Aluminum Big Seven TFS</p>\r\n\r\n<p>&nbsp;<strong>FORK</strong>&nbsp;: Rock Shox (เป็นโช็คแอร์)</p>\r\n\r\n<p>&nbsp;- Shimano Deore/SLX 30 Sp</p>\r\n\r\n<p>&nbsp;- ขนาดล้อ 29 นิ้ว</p>\r\n', 2000.00, 21900.00, 'คัน', 'img132868451620180823_231954.jpg', '', 11, 0, 78, '2018-08-23 16:19:54'),
(27, 15, '2018 TREK MARLIN 6', '18', '<p>TREK MARLIN6 -Orange- 2018</p>\r\n\r\n<p>- 24 สปีดส์</p>\r\n\r\n<p>- ดิสก์น้ำมัน</p>\r\n\r\n<p>- ไซส์ 13.5 , 15.5 (ล้อขนาด 27.5)</p>\r\n\r\n<p>- ไซส์ 18.5, 19.5, 21.5 (ล้อขนาด 27.5)</p>\r\n\r\n<p>_Ride the fastest wheel that fits with Smart Wheel Size<br />\r\n_Ride-tuned aluminum frame is XC light, mountain tough<br />\r\n_Extended size range gives you a better fit for a better ride<br />\r\n_Backed by Trek&#39;s limited lifetime warranty</p>\r\n\r\n<p>_Smart Wheel Size ให้ประสิทธิภาพการปั่นของคุณยอดเยี่ยมถึงขีดสุดได้ในทุกๆขนาดเฟรม ให้คุณไปได้เร็วกว่าในเส้นทางราบ และไต่เขาได้อย่างยอดเยี่ยมในเส้นทางเทรล<br />\r\n_เฟรมอลูมินั่มจากเทรค นอกเหนือจากเทคโนโลยีการผลิตจะยอดเยี่ยม สร้างเฟรมที่มีน้ำหนักเบา แข็งแรงทนทานแล้ว Ride-Tuned Frame ยังมีการออกแบบองศาเฟรมแต่ละขนาดอย่างเหมาะสม คงไว้ซึ่งประสิทธิภาพการปั่น<br />\r\n_ขนาดของเฟรมที่กว้างครอบคลุมตั้งแต่ 13.5&quot; ถึง 23&quot; ให้คุณสามารถเลือกใช้งานเฟรมขนาดที่เหมาะสมสำหรับคุณมากที่สุด เพื่อให้ได้ประสิทธิภาพการใช้งานที่ดีที่สุด</p>\r\n\r\n<p>&nbsp;</p>\r\n', 12000.00, 13400.00, 'คัน', 'img164019166420180823_232216.jpg', 'img264019166420180823_232216.jpg', 11, 2, 30, '2018-08-23 16:22:16'),
(28, 16, '2015 RIDLEY FENIX (CARBON)', '19', '<p>RIDLEY FENIX (Carbon) - 2015<br />\r\n<br />\r\nFRAME FENIX C : 24T HM UNIDIRECTIONAL CARBON<br />\r\nFORK FENIX C : 24T HM UDV CARBON / ALLOY STEERER<br />\r\nDRIVETRAIN : SHIMANO 105 11 SPEED (Mix)<br />\r\nWHEELSET : FULCRUM RACING SPORT</p>\r\n', 22000.00, 44000.00, 'คัน', 'img123966966620180823_232354.jpg', '', 1, 4, 54, '2018-08-23 16:23:54'),
(29, 17, 'SURLY LONG HAUL TRUCKER', '15', '<p>จักรยานทัวร์ริ่งรุ่นยอดนิยม เหมาะสำหรับการขี่ท่องเที่ยวระยะไกล&nbsp;<br />\r\nมีคุณสมบัติแข็งแรง ทนทานและมีความนุ่มนวลเพียงพอกับการขนสัมภาระหนักๆ&nbsp;<br />\r\nด้วยคุณสมบัติจักรยานทัวร์ริ่งแท้โดยมีหูยึดตะแกรงที่หางหลังและที่ตะเกียบหน้า<br />\r\nสามารถใช้เบรคผีเสือได้เพื่อจะได้ไม่เกะกะจุดยึดตะแกรงและบังโคลน</p>\r\n', 22000.00, 39000.00, 'คัน', 'img139683125820180823_232521.jpg', '', 0, 4, 46, '2018-08-23 16:25:21'),
(25, 15, 'BIANCHI JAB 27.3 (2017)', '17', '<p>เฟรมอลูมิเนียม Superlight ซ่อนสายลบรอยเชื่อม ขนาดล้อ 27.5 นิ้ว มากับเกียร์ Shimano XT/Deore แบบ 2x10 สปีด เบรคไฮดรอลิค ชุดจานหน้า แบบกระโหลกกลวง Hollowtech Octalink ของ Shimano พร้อมโช๊ค Rockshox มี Remote lockout</p>\r\n\r\n<p>มีมาให้เลือก 2&nbsp;สี คือ สีเขียวซีเลสเต้ (ด้าน), สีดำด้านคาดเขียว</p>\r\n\r\n<p>Model : JAB 27.3 XT/Deore 2x10 speed</p>\r\n\r\n<p>Frame : Alu 6061, Fork : Rock Shox 30 Silver Headset : FSA Orbit 1.5B ZS-1 Shifters : Shimano Deore 2x10 sp Rear derailleur : Shimano XT RD-M781 Shadow Design 10 sp Front derailleur : Shimano Deore FD-M610-B Crankset : Shimano FC-M523 38/24T Hollowtech Octalink, BB : Shimano BB-ES300 Chain : KMC X10 EPT&nbsp;<br />\r\nSprocket : Shimano Deore HG50-10sp, 11-13-15-17-19-21-24-28-32-36T Brakes : Shimano M396 Wheels : WTB XC21 TCS</p>\r\n\r\n<p>&nbsp;</p>\r\n', 22000.00, 32300.00, 'คัน', 'img188859081820180823_225652.jpg', 'img288859081820180823_225652.jpg', 5, 0, 30, '2018-08-23 15:56:52'),
(30, 18, 'BMC ALPENCHALLENGE AC02', '20', '<p><strong>Frame :</strong>&nbsp;Alpha Gold Aluminum</p>\r\n\r\n<p><strong>Front Susp. :</strong>&nbsp;SR Suntour , Coil Spring , 63mm. travel</p>\r\n\r\n<p><strong>Drivetrain :</strong>&nbsp;Shimano Acera 3*8 SP. Compact</p>\r\n\r\n<p><strong>Wheel&#39;s size :</strong>&nbsp;700c</p>\r\n', 12000.00, 14000.00, 'คัน', 'img1178139422120180823_232808.jpg', '', 2, 61, 30, '2018-08-23 16:27:33'),
(31, 19, 'LAMBORGHINI 20\" CONCETTO', '18', '<p>รถพับรูปลักษณ์แปลกตาสวยงาม ลิขสิทธิ์แท้จาก Tonino Lamborghini</p>\r\n\r\n<p><strong>Frame</strong>&nbsp;:Alloy</p>\r\n\r\n<p><strong>Brakes</strong>&nbsp;:Tektro R320</p>\r\n\r\n<p><strong>Wheel Size</strong>:20 inch wheels 451</p>\r\n\r\n<p><strong>Speeds</strong>:18</p>\r\n\r\n<p><strong>Weight</strong>:11.4 kg</p>\r\n\r\n<p><strong>Color</strong>&nbsp;: Gross black</p>\r\n', 2000.00, 22000.00, 'คัน', 'img112614947020180823_232934.jpg', '', 0, 15, 60, '2018-08-23 16:29:34'),
(32, 21, 'MERIDA JULIET7-100 (2017)', '15', '<p><br />\r\n- Frame JULIET TFS<br />\r\n- Fork Suntour SR 27 XCM HLO 100<br />\r\n- ชุดขับ Shimano Alivio/Altus 27 Speed</p>\r\n', 12000.00, 17900.00, 'คัน', 'img182381907120180823_233044.jpg', '', 1, 12, 34, '2018-08-23 16:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`t_id`, `t_name`) VALUES
(15, 'จักรยานเสือภูเขา'),
(18, 'ซิตี้ไบค์/ไฮบริด'),
(17, 'จักรยานทัวร์ริ่ง'),
(16, 'จักรยานเสือหมอบ'),
(19, 'จักรยานพับ'),
(20, 'จักรยานสำหรับเด็ก'),
(21, 'จักรยานสำหรับผู้หญิง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `mem_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
