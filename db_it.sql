-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 04:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(10) NOT NULL,
  `class_name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(1, 'ปี 1'),
(2, 'ปี 2'),
(3, 'ปี 3'),
(4, 'ปี 4'),
(5, 'ปี 3 เทียบโอน'),
(6, 'ปี 4 เทียบโอน'),
(7, 'ปี 3 นอกเวลาราชการ'),
(8, 'ปี 4 นอกเวลาราชการ');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_title` varchar(400) NOT NULL,
  `news_detail` varchar(1000) NOT NULL,
  `news_img` varchar(200) NOT NULL,
  `news_type` int(10) NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `news_user_id` int(10) NOT NULL,
  `news_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_detail`, `news_img`, `news_type`, `news_date`, `news_user_id`, `news_status`) VALUES
(1, 'กิจกรรม “อนุรักษ์และเผยแพร่ภูมิปัญญาท้องถิ่น” ', 'กิจกรรม “อนุรักษ์และเผยแพร่ภูมิปัญญาท้องถิ่น” กิจกรรมย่อยที่ 2 เผยแพร่ภูมิปัญญาท้องถิ่นด้านอาหาร\r\nในวันที่ 26 มิถุนายน 2565 ณ คณะเทคโนโลยีสังคม        ', '14.jpg', 1, '2024-12-01 07:04:03', 1, 1),
(2, 'โครงการพัฒนาคุณภาพการศึกษาและการพัฒนาท้องถิ่น', 'โครงการพัฒนาคุณภาพการศึกษาและการพัฒนาท้องถิ่น\r\nโดยมีสถาบันอุดมศึกษาเป็นพี่เลี้ยง เครือข่ายเพื่อการพัฒนาอุดมศึกษา\r\nประจำปีงบประมาณ พ.ศ. 2565 ณ โรงเรียนวัดบางสระเก้า     ', '202412012076309606178885.jpg', 2, '2024-12-01 07:01:50', 1, 1),
(3, 'โครงการขับเคลื่อนเศรษฐกิจและสังคมฐานรากหลังโควิดด้วยเศรษฐกิจ BCG (U2T FOR BCG)', 'โครงการขับเคลื่อนเศรษฐกิจและสังคมฐานรากหลังโควิดด้วยเศรษฐกิจ BCG (U2T FOR BCG)', '10.jpg', 1, '2024-12-01 03:14:10', 1, 1),
(7, 'AR หอจดหมายเหตุแห่งชาติจันทบุรี', 'การศึกษาเรื่อง การพัฒนาเทคโนโลยีภาพเสมือนจริง หอจดหมายเหตุแห่งชาติ จันทบุรี มีวัตถุประสงค์เพื่อพัฒนาเทคโนโลยีภาพเสมือนจริง ให้กับหอจดหมายเหตุแห่งชาติ จันทบุรีและเพื่อประเมินความพึงพอใจของเจ้าหน้าที่ภายในหอจดหมายเหตุแห่งชาติ จันทบุรีในการรับชมชิ้นงานดังกล่าว โดยมีการนำข้อมูลที่เป็นข้อความบรรยายมาแปลงเป็นวิดีโอและภาพสามมิติ เพื่อให้มีความน่าสนใจมากขึ้น มีการเล่าถึงความเป็นมาในอดีตที่เกี่ยวข้องกับหอจดหมายเหตุจันทบุรี การเข้าสืบค้นเอกสารจดหมายเหตุ และแสดงให้เห็นสถานที่ทางประวัติศาสตร์ในปัจจุบัน กลุ่มเป้าหมายของงานวิจัยได้แก่ เจ้าหน้าที่  หอจดหมายเหตุแห่งชาติ จันทบุรี ผลการศึกษาพบว่า ความพึงพอใจด้านเนื้อหา โดยมีผลการประเมินความพึงพอใจได้ค่าเฉลี่ยเท่ากับ 4.97 และค่าส่วนเบี่ยงเบนมาตรฐานเฉลี่ยเท่ากับ 0.11 อยู่ในระดับมากที่สุด ความพึงพอใจด้านการออกแบบ โดยมีผลการประเมินความพึงพอใจได้ค่าเฉลี่ยเท่ากับ 4.89 และค่าส่วนเบี่ยงเบนมาตรฐานเฉลี่ยเท่ากับ 0.22 อยู่ในระดับมากที่สุด ความพึงพอใจด้านการสื่อสาร โดยมีผลการประเมินความพึงพอใจได้ค่าเฉลี่ยเท่ากับ 5.00 และค่าส่วนเบี่ยงเบนมาตรฐานเฉลี่ยเท่ากับ 0.00 อยู่', '202412013138598991688288714_871b47c710c25522cfb4ac1c87e0fd5d.png', 3, '2024-12-01 07:10:08', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

CREATE TABLE `news_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(400) NOT NULL,
  `type_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_type`
--

INSERT INTO `news_type` (`type_id`, `type_name`, `type_status`) VALUES
(1, 'ข่าวกิจกรรม', 1),
(2, 'บริการวิชาการ', 1),
(3, 'ผลงานนักศึกษา', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slite_show`
--

CREATE TABLE `slite_show` (
  `slite_id` int(11) NOT NULL,
  `slite_name` varchar(400) NOT NULL,
  `slite_img` varchar(1000) NOT NULL,
  `slite_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slite_show`
--

INSERT INTO `slite_show` (`slite_id`, `slite_name`, `slite_img`, `slite_status`) VALUES
(7, 'ภาพสไลท์1', '2024120716709656914_1657289536.jpg', 1),
(8, 'ภาพสไลท์2', '2024120715547603984_1718860813.jpg', 0),
(10, 'ภาพสไลท์3', '2024120720262366464_1718864869.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `std_id` varchar(20) NOT NULL COMMENT 'รหัสนักศึกษา',
  `std_prefix` varchar(40) NOT NULL,
  `std_name` varchar(400) NOT NULL,
  `std_class` int(10) NOT NULL,
  `std_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `std_id`, `std_prefix`, `std_name`, `std_class`, `std_phone`) VALUES
(1, '6620032321-3', 'นางสาว', 'ทดสอบ แก้ไขข้อมูล', 6, '0976545678'),
(2, '6620032322-3', 'นางสาว', 'มีนา ทำสวน', 2, '0878762345'),
(3, '6620032325-3', 'นางสาว', 'มานี มีนา', 7, '0978754321');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(400) NOT NULL,
  `user_username` varchar(400) NOT NULL,
  `user_password` varchar(600) NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_level`) VALUES
(1, 'suttipong klongdee', 'test', '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `slite_show`
--
ALTER TABLE `slite_show`
  ADD PRIMARY KEY (`slite_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news_type`
--
ALTER TABLE `news_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slite_show`
--
ALTER TABLE `slite_show`
  MODIFY `slite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
