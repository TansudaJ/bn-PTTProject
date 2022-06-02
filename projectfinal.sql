-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 11:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `authorityID` int(1) NOT NULL,
  `n_authority` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`authorityID`, `n_authority`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'เจ้าหน้าที่บันทึกข้อมูล'),
(3, 'พนักงานทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `eco_animals`
--

CREATE TABLE `eco_animals` (
  `eco_animalsID` int(11) NOT NULL,
  `animal_name` varchar(100) NOT NULL,
  `type_animalID` varchar(100) NOT NULL,
  `activeFlag` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eco_animals`
--

INSERT INTO `eco_animals` (`eco_animalsID`, `animal_name`, `type_animalID`, `activeFlag`) VALUES
(1, 'นกเป็ดน้ำ', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eco_plant`
--

CREATE TABLE `eco_plant` (
  `eco_plantID` int(11) NOT NULL,
  `plantname` varchar(100) NOT NULL,
  `typeID` varchar(100) NOT NULL,
  `activeflag` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eco_plant`
--

INSERT INTO `eco_plant` (`eco_plantID`, `plantname`, `typeID`, `activeflag`) VALUES
(1, 'แสม', '1', 1),
(2, 'พลูด่าง', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `PrefixID` int(20) DEFAULT NULL,
  `f_name` varchar(25) DEFAULT NULL,
  `l_name` varchar(25) DEFAULT NULL,
  `telno` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `authority_authorityID` int(11) DEFAULT NULL,
  `imageURL` varchar(100) DEFAULT NULL,
  `activeflag` int(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `PrefixID`, `f_name`, `l_name`, `telno`, `email`, `username`, `password`, `authority_authorityID`, `imageURL`, `activeflag`) VALUES
(1, 2, 'สมสมร', 'เย็นใจ', '0911256654', 'somsee@gmail.com', 'admin', '1234', 1, 'image/employee/admin1.jpg', 1),
(2, 1, 'สมพร', 'ใจดี', '0879999999', 'sompoon@gmail.com', 'editor', '1234', 2, 'image/employee/jus.jpg', 1),
(3, 3, 'สุชานันท์', 'จันมณี', '0907095583', 'suchananmu@gmail.com', 'employee', '1234', 3, 'image/employee/m7.jpg', 1),
(4, 1, 'สุพร', 'จันดี', '0980000000', 'supoon@gmail.com', 'T00852', '1234', 2, 'image/employee/too.jpg', 1),
(5, 1, 'สมพร', 'จันดี', '0879999999', 'suchananmu@gmail.com', 'L1110-1', '~K_(7vU;QD', 2, 'image/employee/aa1.jpg', 0),
(6, 1, 'สังคม', 'คงดี', '0980000000', 'sangkom@gmail.com', 'samson', 'A/x|h:vHNE', 2, 'image/employee/too1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imageplant`
--

CREATE TABLE `imageplant` (
  `imageplantID` int(11) NOT NULL,
  `plants_plantID` int(11) NOT NULL,
  `plantpath_pathID` int(11) DEFAULT NULL,
  `URL` varchar(200) NOT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imageplant`
--

INSERT INTO `imageplant` (`imageplantID`, `plants_plantID`, `plantpath_pathID`, `URL`, `status`) VALUES
(1, 1, 2, 'image/plant/pp.jpg', 1),
(2, 1, 4, 'image/plant/เมล็ดพริกไทยอ่อน.jpg', NULL),
(3, 3, 5, 'image/plant/vv.jpg', 1),
(4, 4, 4, 'image/plant/เมล็ด.jpg', 1),
(5, 4, 12, 'image/plant/ดอกแห้ง.jpg', NULL),
(6, 6, 4, 'image/plant/341395.jpg', 1),
(7, 6, 5, 'image/plant/ใบผักบุ้งทะเล.jpg', NULL),
(8, 6, 7, 'image/plant/1448452413.jpg', NULL),
(9, 9, 7, 'image/plant/14484524131.jpg', 1),
(10, 10, 5, 'image/plant/รูปว่านหางจระเข้.jpg', 1),
(11, 11, 5, 'image/plant/ใบผักบุ้งทะเล1.jpg', 1),
(12, 12, 3, 'image/plant/ผลประดู่.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imagevegetation`
--

CREATE TABLE `imagevegetation` (
  `imagevegetationID` int(11) NOT NULL,
  `URL` varchar(200) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `vegetation_vegetationID` int(11) NOT NULL,
  `plantpath_pathID` int(3) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagevegetation`
--

INSERT INTO `imagevegetation` (`imagevegetationID`, `URL`, `detail`, `vegetation_vegetationID`, `plantpath_pathID`, `status`) VALUES
(1, 'image/vegetation/พริกไทย.jpg', NULL, 1, NULL, 1),
(2, 'image/vegetation/ใบพริกไทย.jpg', NULL, 1, 5, NULL),
(3, 'image/vegetation/เมล็ดพริกไทยอ่อน.jpg', NULL, 1, 4, NULL),
(4, 'image/vegetation/4-1-683x1024.jpg', NULL, 1, 7, NULL),
(5, 'image/vegetation/vv.jpg', NULL, 2, NULL, 1),
(6, 'image/vegetation/รูปว่านหางจระเข้.jpg', NULL, 2, 5, NULL),
(7, 'image/vegetation/ดอก_(2).jpg', NULL, 3, NULL, 1),
(8, 'image/vegetation/เมล็ด.jpg', NULL, 3, 4, NULL),
(9, 'image/vegetation/ใบ.jpg', NULL, 3, 5, NULL),
(10, 'image/vegetation/ดอกแห้ง.jpg', NULL, 3, 12, NULL),
(11, 'image/vegetation/รูปผักบุ้งทะเล.jpg', NULL, 4, NULL, 1),
(12, 'image/vegetation/ใบผักบุ้งทะเล.jpg', NULL, 4, 5, NULL),
(13, 'image/vegetation/341395.jpg', NULL, 4, 4, NULL),
(14, 'image/vegetation/1448452413.jpg', NULL, 4, 7, NULL),
(16, 'image/vegetation/71.jpg', NULL, 6, NULL, 1),
(17, 'image/vegetation/ต้นประดู่บ้าน.jpg', NULL, 6, 8, NULL),
(18, 'image/vegetation/ใบประดู่.jpg', NULL, 6, 5, NULL),
(19, 'image/vegetation/ผลประดู่.jpg', NULL, 6, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imagezone`
--

CREATE TABLE `imagezone` (
  `imagezoneID` int(11) NOT NULL,
  `imageURL` varchar(100) DEFAULT NULL,
  `imageTitle` varchar(225) DEFAULT NULL,
  `imagedetail` text DEFAULT NULL,
  `activeFlag` int(11) DEFAULT 1,
  `zone_zoneID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagezone`
--

INSERT INTO `imagezone` (`imagezoneID`, `imageURL`, `imageTitle`, `imagedetail`, `activeFlag`, `zone_zoneID`) VALUES
(1, 'imagemap/imagemap.jpg', NULL, '<area shape=\"poly\" alt=\"zone 1\" title=\"zone 1\" href=\"link_image_id_is_/1\"  coords=\"356, 620, 327, 619, 318, 601, 336, 520, 369, 443, 412, 391, 489, 357, 554, 362, 643, 405, 797, 464, 812, 480, 789, 519, 763, 597, 745, 627, 675, 620, 622, 594, 611, 567, 521, 492, 513, 463, 457, 474, 426, 496, 393, 570, 384, 599\" />\r\n    <area shape=\"poly\" alt=\"zone 4\" title=\"zone 4\" href=\"link_image_id_is_/4\"  coords=\"963, 804, 1043, 730, 995, 560, 1011, 557, 1069, 574, 1115, 611, 1143, 662, 1141, 716, 1134, 759, 1108, 790, 1022, 813, 985, 813\" />', 1, NULL),
(2, 'imagemap/m1.jpg', NULL, '', 1, 1),
(3, 'imagemap/m4.jpg', NULL, '', 1, 4),
(4, 'imagemap/m3.jpg', NULL, '', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `localname`
--

CREATE TABLE `localname` (
  `localnameID` int(11) NOT NULL,
  `localname` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `vegetation_vegetationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `localname`
--

INSERT INTO `localname` (`localnameID`, `localname`, `region`, `vegetation_vegetationID`) VALUES
(1, 'พริกน้อย', '1', 1),
(2, 'พริก', '6', 1),
(3, 'ว่านแข้,หว่านตะแข่,หว่านตะเข้', '1', 2),
(4, 'แก้ว', '1', 3),
(5, 'กุน', '6', 3),
(6, 'พิกุลทอง', '4', 3),
(7, 'ผักบุ้งเล', '6', 4),
(8, 'ผักบุ้งขน,ผักบุ้งต้น', '4', 4),
(12, 'ดู่บ้าน', '1', 6),
(13, 'อังสนา', '4', 6),
(14, 'ปะดู่', '2', 6);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenanceID` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `details` text NOT NULL,
  `maintenancetype_maintenancetypeID` int(11) NOT NULL,
  `employee_employeeID` int(11) NOT NULL,
  `vegetation_vegetationID` int(11) NOT NULL,
  `zone_zoneID` int(11) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `activeFlags` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenanceID`, `date`, `details`, `maintenancetype_maintenancetypeID`, `employee_employeeID`, `vegetation_vegetationID`, `zone_zoneID`, `note`, `activeFlags`) VALUES
(1, '2022-05-08 16:25:47', 'ใส่ปุ๋ยสูตร 20-0-0 ปริมาณ 30 กิโลกรัม', 1, 1, 1, 1, 'มีต้นพริกไทย 3 ต้นที่ต้องดูแลเป็นพิเศษ โดยการให้ปุ๋ย 0-0-60 เพิ่ม', 1),
(2, '2022-05-09 01:57:48', 'ถางหญ้ารอบๆโคนต้น', 2, 1, 2, 1, 'มีต้นวานหางจระเข้ที่ต้องดูแลเป็นพิเศษ 5 ต้น โดยการใส่ปุ๋ย เพื่อลดอาการเน่าของใบ', 1),
(3, '2022-05-09 02:25:07', 'พรวนดินมาแล้ว 2 ครั้ง', 3, 3, 3, 6, 'มีต้นพิกุลทองจำนวน 3 ต้นที่ต้องดูแลเป็นพิเศษ', 1),
(4, '2022-05-17 03:06:50', 'ฉีดพ้นยาฆ่าแมลงชีวภาพ', 2, 1, 1, 1, 'มีพริกไทย 2 ต้นที่ต้องเปลี่ยนใหม่', 1);

-- --------------------------------------------------------

--
-- Table structure for table `maintenancetype`
--

CREATE TABLE `maintenancetype` (
  `maintenancetypeID` int(11) NOT NULL,
  `n_maintenancetype` varchar(45) DEFAULT NULL,
  `detail` text NOT NULL,
  `recommend` text NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintenancetype`
--

INSERT INTO `maintenancetype` (`maintenancetypeID`, `n_maintenancetype`, `detail`, `recommend`, `status`) VALUES
(1, 'การใส่ปุ๋ย', 'ปุ๋ยอินทรีย์ เช่น ปุ๋ยคอก ปุ๋ยหมัก\r\nปุ๋ยอินทรีย์ ช่วยปรับปรุงดิน\r\n- โปร่ง ร่วนซุย ระบายน้ำดี\r\n- อากาศถ่ายเทสะดวก\r\n- บรรเทาควมเป็นกรดด่างของดิน\r\n- ดูดซับความชื้น\r\n- ช่วยให้ปุ๋ยเคมีมีประสิทธิภาพดีขึ้น\r\n- ให้ธาตุอาหารแก่พืช', '- ใส่ปุ๋ยอินทรีย์สลับปุ๋ยวิทยาศาสตร์\r\n- หว่านปุ๋ยให้ทั่วแล้วรดน้ำตามทันที\r\n- ให้ปุ๋ยครั้งละน้อยแต่บ่อยครั้ง\r\n- ให้ปุ๋ยในตอนเช้า\r\n', 1),
(2, 'การป้องกันและกำจัดศัตรูพืช', 'กำจัดวัชพืช เช่น หญ้าแห้วหม หญ้าขน หญ้าคา', '', 1),
(3, 'การพรวนดิน', 'ควรพรวนดินบ่อยๆตามความจำเป็น เพื่อให้ดินร่วนซุย เหมาะแกการชอนไชของรากพืช สามารถดูดซึมสารอาหารและน้ำได้ดี', '- ไม่ควรพรวนดินบ่อยมากเกินไป ทำให้ดินละเอียดและแน่นเกินไป รากพืชจะชอนไชได้ยาก\r\n-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicinalproperties`
--

CREATE TABLE `medicinalproperties` (
  `medicinalPropertiesID` int(11) NOT NULL,
  `properties` varchar(500) DEFAULT NULL,
  `instruction` varchar(500) DEFAULT NULL,
  `caution` varchar(100) DEFAULT NULL,
  `reference` text DEFAULT NULL,
  `vegetation_vegetationID` int(11) NOT NULL,
  `plantspath_pathID` int(3) NOT NULL,
  `activeflag` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicinalproperties`
--

INSERT INTO `medicinalproperties` (`medicinalPropertiesID`, `properties`, `instruction`, `caution`, `reference`, `vegetation_vegetationID`, `plantspath_pathID`, `activeflag`) VALUES
(1, 'แก้ลมจุกเสียดแน่น ท้องอืดเฟ้อ', '', '', 'http://www.rspg.or.th/plants_data/herbs/herbs_06_5.htm?fbclid=IwAR2a4etTlRYRtgzmUeN6DD2NCU2LavyBCCKhPZARv0m15jADJbaAxURl-MA', 1, 5, 1),
(2, 'ขับลม ขับเสมหะ ขับเหงื่อ ขับปัสสาวะ บำรุงธาตุ  อาหารไม่ย่อย', '', '', 'http://www.rspg.or.th/plants_data/herbs/herbs_06_5.htm?fbclid=IwAR2a4etTlRYRtgzmUeN6DD2NCU2LavyBCCKhPZARv0m15jADJbaAxURl-MA', 1, 4, 1),
(3, 'รสร้อน แก้อุระเสมหะหรือเสมหะในทรวงอก แก้อติสาร (อาการท้องร่วง อุจจาระเหม็นเน่า ถ่ายเป็นโลหิตจนลำไส้แตกทะลุ มีไข้แทรก)', '', '', 'https://pharmacy.su.ac.th/herbmed/herb/text/herb_detail.php?herbID=152&fbclid=IwAR2K5_m5OtIWFyoRc19NIR8PHLJwppuqbC0cudvjUL2kC_kpqUS6TN8QE28', 1, 7, 1),
(4, 'ช่วยรักษาอาการผิวหนังไหม้จากแสงแดด หรือไหม้เกรียมจากการฉายรังสี หรือแผลเรื้อรังจากการฉายรังสี', 'ควรปลอกเปลือกและล้างเมือกสีเหลือออกให้หมด', 'หากเกิดอาการแพ้ให้ล้างออกด้วยน้ำสะอาดเยอะๆ', 'https://www.disthai.com/17140403/%E0%B8%A7%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%AB%E0%B8%B2%E0%B8%87%E0%B8%88%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%82%E0%B9%89', 2, 5, 1),
(5, 'รสเฝื่อน นำไปโขลกให้ละเอียด ใช้เป็นยาขับปัสสาวะ ยาเหน็บทวารหนักเด็ก รักษาอาการท้องผูก', '-', '-', 'https://www.disthai.com/17140403/%E0%B8%A7%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%AB%E0%B8%B2%E0%B8%87%E0%B8%88%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%82%E0%B9%89', 3, 4, 1),
(6, 'รสเบื่อฝาด แก้หืด ฆ่าเชื้อกามโรค', '-', '-', 'https://www.disthai.com/17140403/%E0%B8%A7%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%AB%E0%B8%B2%E0%B8%87%E0%B8%88%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%82%E0%B9%89', 3, 5, 1),
(7, 'ใช้ชงแบบชาหรือใช้ต้มเอาน้ำรับประทาน ช่วยบำรุงหัวใจ บำรุงโลหิต แก้ปวดหัวใจ บำรุงโลหิต แก้ปวดหัว เจ็บคอ ขับเสมหะ แก้ร้อนใน แก้ไข้ แก้ท้องเสีย', '-', '-', 'https://www.disthai.com/17126486/%E0%B8%9E%E0%B8%B4%E0%B8%81%E0%B8%B8%E0%B8%A5', 3, 12, 1),
(8, '1. ใช้ใบผักบุ้งทะเลขยี้กับน้ำส้มสายชู หรือเหล้าขาวแล้วนำมาประคบผิวหนังบริเวณที่โดนพิษแมงกะพรุนและห่อด้วยผ้าขาวบางทิ้งไว้ ประมาณ 30-60 นาที อาการปวดแสบปวดร้อนจากพิษจะคลายลง\r\n2. นำใบมาโขลกให้ละเอียดคั้นเอาเฉพาะแต่น้ำ ใช้ทาบริเวณข้อ ช่วยลดอาการปวดบวมและอักเสบ\r\n3. นำใบต้มกับน้ำ ใช้ดื่มเพื่อลดอาการแน่นท้องและจุกเสียด', '-', '1. ในการใช้ใบผักบุ้งทะเลแก้พิษแมงกะพรุนควร ใช้ทรายขัดบริเวณที่โดนพิษแมงกะพรุนเพื่อเอาเมือกของแมงกะพร', 'https://www.disthai.com/17075536/%E0%B8%9C%E0%B8%B1%E0%B8%81%E0%B8%9A%E0%B8%B8%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B0%E0%B9%80%E0%B8%A5', 4, 5, 1),
(9, 'ทุบให้แตก ต้มกับน้ำ ใช้ดื่มเพื่อแก้อาการปวดท้องและกล้ามเนื้อเป็นตะคริว', '-', '-', 'https://www.disthai.com/17075536/%E0%B8%9C%E0%B8%B1%E0%B8%81%E0%B8%9A%E0%B8%B8%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B0%E0%B9%80%E0%B8%A5', 4, 4, 1),
(10, 'เถาหรือรากใช้ต้มกับน้ำ ใช้อาบเพื่อแก้อาหารคันตามผิวหนัง แก้ผดผื่น หรือนำลำต้นมาโขลกให้ละเอียดคั้นเอาแต่น้ำ ใช้ทาแก้พิษแมงกะพรุน', '-', '-', 'https://www.disthai.com/17075536/%E0%B8%9C%E0%B8%B1%E0%B8%81%E0%B8%9A%E0%B8%B8%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B0%E0%B9%80%E0%B8%A5', 4, 7, 1),
(11, 'เปลือกต้นมีรสฝาดจัด มีสรรพคุณเป็นยาบำรุงร่างกาย\r\nเปลือกต้นต้มน้ำดื่ม ใช้แก้ท้องเสีย แก้บิด บำรุงร่างกาย แก้ปากเปื่อยปากเป็นแผล', '-', '-', 'https://www.disthai.com/17189414/%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B9%E0%B9%88%E0%B8%9A%E0%B9%89%E0%B8%B2%E0%B8%99', 6, 8, 1),
(12, 'ตำให้ละเอียดใช้พอกบริเวณที่เป็นแผลฝี\r\nใช้ใบตากแห้งแล้วนำมาบดชงแบบดื่ม ใช้แก้อาการไอ ระคายคอ', '-', '-', 'https://www.disthai.com/17189414/%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B9%E0%B9%88%E0%B8%9A%E0%B9%89%E0%B8%B2%E0%B8%99', 6, 5, 1),
(13, 'ผลมีรสฝาดสมาน มีสรรพคุณเป็นยาแก้อาเจียน\r\nผลมีสรรพคุณเป็นยาแก้ท้องร่วง', '-', '-', 'https://medthai.com/%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B9%E0%B9%88%E0%B8%9A%E0%B9%89%E0%B8%B2%E0%B8%99/', 6, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plantpath`
--

CREATE TABLE `plantpath` (
  `pathID` int(3) NOT NULL,
  `plantpathname` varchar(45) DEFAULT NULL,
  `activeFlag` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plantpath`
--

INSERT INTO `plantpath` (`pathID`, `plantpathname`, `activeFlag`) VALUES
(1, 'ราก', 1),
(2, 'แก่นไม้', 1),
(3, 'ผล', 1),
(4, 'เมล็ด', 1),
(5, 'ใบ', 1),
(6, 'ดอก', 1),
(7, 'เถา', 1),
(8, 'เปลือกต้น', 1),
(9, 'เนื้อไม้', 1),
(10, 'ลำต้น', 1),
(11, 'ยอด1', 1),
(12, 'ดอกแห้ง', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `plantID` int(11) NOT NULL,
  `coordinates` varchar(45) DEFAULT NULL,
  `diameter` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `planting_area` varchar(45) DEFAULT NULL,
  `actual` varchar(45) DEFAULT NULL,
  `show` int(1) DEFAULT NULL,
  `exclusivity` text DEFAULT NULL,
  `zone_zoneID` int(11) NOT NULL,
  `vegetation_vegetationID` int(11) NOT NULL,
  `QRCode` varchar(200) DEFAULT NULL,
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`plantID`, `coordinates`, `diameter`, `height`, `planting_area`, `actual`, `show`, `exclusivity`, `zone_zoneID`, `vegetation_vegetationID`, `QRCode`, `active`) VALUES
(1, '8.5484012,99.9641146', '0.3', '0.3', NULL, 'สมบูรณ์ดี', 1, '', 4, 1, 'image/QRCode/qrcode_19497034_1.png', 1),
(3, '8.5484012,99.9641146', '2', '2', NULL, 'สมบูรณ์ดี', 1, '', 1, 2, 'image/QRCode/qrcode_19497034_3.png', 1),
(4, '8.5484012,99.9641146', '12', '10-25', NULL, 'สมบูรณ์ดี', 1, 'พระราชทาน', 1, 3, 'image/QRCode/พิกุล.png', 1),
(6, '8.5484012,99.9641146', '0.02', '5', NULL, 'สมบูรณ์ดี', 1, '', 8, 4, 'image/QRCode/ผักบุ้งทะเล.png', 1),
(9, '8.5484012,99.9641146', '0.02', '0.02', NULL, 'สมบูรณ์ดี', 0, '', 8, 4, 'image/QRCode/ผักบุ้งทะเล3.png', 1),
(10, '8.5484012,99.9641146', '0.3', '0.3', NULL, 'สมบูรณ์ดี', 1, '', 1, 2, 'image/QRCode/qrcode_19497034_.png', 1),
(11, '8.5484012,99.9641146', '0.02', '0.02', NULL, 'สมบูรณ์ดี', 0, '', 8, 4, 'image/QRCode/ผักบุ้งทะเล4.png', 1),
(12, '8.5484012,99.9641146', '45', '20', NULL, 'สมบูรณ์ดี', 1, 'พระราชทาน', 1, 6, 'image/QRCode/qrcode_20997164_.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `PrefixID` int(11) NOT NULL,
  `prefix_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`PrefixID`, `prefix_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `typeID` int(11) NOT NULL,
  `typename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeID`, `typename`) VALUES
(1, 'ไม้ยืนต้น'),
(2, 'ไม้พุ่ม'),
(3, 'ไม้คลุมดิน'),
(4, 'ไม้ประดับ'),
(5, 'ไม้เลื้อย'),
(6, 'ไม้น้ำ'),
(7, 'พืชสวนครัว'),
(8, 'พืชสมุนไพร'),
(9, 'ไม้ดอก'),
(10, 'ไม้มงคล');

-- --------------------------------------------------------

--
-- Table structure for table `type_animals`
--

CREATE TABLE `type_animals` (
  `type_animalID` int(11) NOT NULL,
  `type_animal_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_animals`
--

INSERT INTO `type_animals` (`type_animalID`, `type_animal_name`) VALUES
(1, 'สัตว์ปีก'),
(2, 'สัตว์น้ำ'),
(3, 'สัตว์ครึ่งบกครึ่งน้ำ'),
(4, 'สัตว์เลื้อยคลาน'),
(5, 'สัตว์เลี้ยงลูกด้วยน้ำนม');

-- --------------------------------------------------------

--
-- Table structure for table `vegetation`
--

CREATE TABLE `vegetation` (
  `vegetationID` int(11) NOT NULL,
  `n_common_TH` varchar(45) DEFAULT NULL,
  `n_common_ENG` varchar(45) DEFAULT NULL,
  `n_scientific` varchar(45) DEFAULT NULL,
  `n_family` varchar(45) DEFAULT NULL,
  `appearance` varchar(3000) DEFAULT NULL,
  `plant_origin` text DEFAULT NULL,
  `distribution` varchar(500) DEFAULT NULL,
  `typeID` int(11) DEFAULT NULL,
  `flowering_period` varchar(45) DEFAULT NULL,
  `produce_period` varchar(45) DEFAULT NULL,
  `reference` text DEFAULT NULL,
  `co2_storage` varchar(45) DEFAULT NULL,
  `reference_data` text DEFAULT NULL,
  `caution` text DEFAULT NULL,
  `propagation` text DEFAULT NULL,
  `ecological` text DEFAULT NULL,
  `activeFlag` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vegetation`
--

INSERT INTO `vegetation` (`vegetationID`, `n_common_TH`, `n_common_ENG`, `n_scientific`, `n_family`, `appearance`, `plant_origin`, `distribution`, `typeID`, `flowering_period`, `produce_period`, `reference`, `co2_storage`, `reference_data`, `caution`, `propagation`, `ecological`, `activeFlag`) VALUES
(1, 'พริกไทย', 'Pepper', 'Piper nigrum', 'Piperaceae', 'เป็นไม้เถาเลื้อยขึ้นตามต้นไม้อื่น ตามโขดหิน หรืออาจเลื้อยไปตามผิวดิน บางชนิดเป็นไม้พุ่ม พบน้อยมากที่เป็นพืชล้มลุก มีกลิ่นหอมเป็นเอกลักษณ์ ลำต้นหรือเถาเป็นข้อปล้อง ตรงข้อมักโป่งนูนออกชัดเจน ถ้าเป็นไม้เถามักพบแตกรากตามข้อ\r\nใบเป็นใบเดี่ยวเรียงตัวแบบสลับ แผ่นใบมักมีต่อมใสหรือต่อมมีสีขนาดเล็ก ในหนึ่งต้นใบมีขนาดและลักษณะหลากหลาย ใบบนลำต้นทั้งที่เลื้อยตามผิวดินหรือเลื้อยขึ้นที่สูงมักมีรูปทรงคล้ายๆ กันในชนิดเดียวกัน ในหลายชนิดพบว่าใบบนลำต้นที่เลื้อยตามผิวดินมีลักษณะคล้ายกันมาก มีเพียงบางชนิดเท่านั้นที่ใบบนลำต้นและใบบนกิ่งมีลักษณะแตกต่างกันชัดเจนและแตกต่างจากชนิดอื่นๆ จนสามารถนำมาใช้ประโยชน์ในการระบุชนิดได้ ใบบนกิ่งมีลักษณะต่างจากใบบนลำต้นและแตกต่างกันในแต่ละชนิด\r\nช่อดอกเป็นแบบช่อเชิงลด พบน้อยที่เป็นช่อเชิงลดประกอบแบบซี่ร่ม เกิดที่ข้อตรงข้ามกับใบ ดอกแยกเพศ อยู่ร่วมต้นกันโดยอยู่บนช่อดอกเดียวกัน อยู่คนละช่อดอก หรือพบทั้งสองลักษณะนี้ หรือดอกเพศผู้และเพศเมียอยู่แยกต้นกัน\r\nดอกมีขนาดเล็ก ไม่มีกลีบเลี้ยง ไม่มีกลีบดอก มีเฉพาะเกสรเพศผู้หรือเกสรเพศเมียและใบประดับขนาดเล็ก ใบประดับรูปกลมหรือรูปรี เชื่อมติดกับแกนช่อดอกหรือมีก้านชูให้ใบประดับยื่นออกมาจากแกนช่อดอก เกสรเพศผู้ 2-6 อัน เกสรเพศเมียมีรังไข่ฝังอยู่ในแกนช่อดอกหรือมีก้าน ยอดเกสรเพศเมีย 2-6 อัน\r\nผลแบบผลสด รูปกลมหรือรูปรี ติดกับแกนหรือมีก้าน สีเขียวหรือเขียวอมเหลือง เมื่อสุกเปลี่ยนเป็นสีเหลือง ส้มหรือแดง ส่วนใหญ่ออกดอกและติดผลเป็นช่วงๆ ตลอดปี ขึ้นกับความสมบูรณ์ของต้นและสภาพแวดล้อม ปัญหาที่สำคัญในการศึกษาพืชสกุลพริกไทย ก็คือ การตรวจสอบและระบุชนิดตัวอย่างพืชที่สำรวจพบ เนื่องจากพืชกลุ่มนี้มีลักษณะสัณฐานที่ซับซ้อนและหลากหลายในแต่ละชนิด เช่น บางชนิดดอกเพศผู้กับดอกเพศเมียอยู่แยกต้นกัน บางชนิดดอกเพศผู้กับดอกเพศเมียอยู่ร่วมต้นกัน ซึ่งดอกทั้งสองเพศอาจอยู่บนช่อดอกเดียวกันหรือต่างช่อดอกกัน ยิ่งไปกว่านั้นคือดอกไม่มีกลีบเลี้ยงและไม่มีกลีบดอก มีเฉพาะเกสรเพศผู้หรือเพศเมียและใบประดับ กอปรกับดอกมีขนาดเล็กมาก', 'แถบตอนใต้ของเทือกเขา กาต รัฐ เกละ ในประเทศอินเดีย และศรีลังกา', 'ประเทศแถบที่มีอากาศร้อน เช่น ไทย, บราซิล, อินเดีย, อินโดนีเซีย, มาเลเซีย', 5, 'ตลอดปี', 'ตลอดปี', '-', '-', 'https://www.disthai.com/16488254/%E0%B8%9E%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B9%84%E0%B8%97%E0%B8%A2', 'เนื่องจากใน พริกไทยดำ ก็มีสารสารอัลคาลอยด์ ไพเพอร์ริน เมื่อเข้าสู่ร่างกาย ก็จะถูกทำปฏิกิริยา เปลี่ยนเป็นสารก่อมะเร็งได้ จึงเห็นได้ชัดว่า พริกไทย ไม่ได้มีประโยชน์อย่างเดียว แต่ก็มีโทษด้วยเช่นกัน เพราะฉะนั้นแนะนำว่าให้ใช้ในปริมาณ ที่พอเหมาะ อีกทั้งผู้ที่ป่วยเป็นโรคตา และโรคริดสีดวงทวาร ไม่ควรทานพริกไทยดำ เพราะจะทำให้อาการ กำเริบขึ้นได้ ทำให้ตาลาย เวียนศีรษะ เกิดฝีหนองเนื่องจากพริกไทยมีคุณสมบัติร้อนและแห้ง ถ้ากินมากทำให้ม้าม กระเพาะอาหาร ปอดถูกทำลาย คนที่กินพริกไทยมากและบ่อยเกินไป ทำให้ตาอักเสบได้ง่าย ทำให้คอบวมอักเสบเจ็บคอบ่อย เป็นแผลในปากและฟันอักเสบเป็นหนอง', 'ปักชำ วิธีการปักชำ โดยตัดส่วนลำต้นที่ไม่แก่จัด ยาวประมาณ 5-7 ข้อ ปักชำไว้จนรากงอกออกมาแข็งแรง แล้วจึงนำไปปลูก โดยต้องทำค้างไว้ให้เกาะด้วย พริกไทยสามารถขึ้นได้ในดินทั่วๆ ไปที่มีการระบายน้ำได้ดี และชอบอากาศ ที่อบอุ่นและชื้น', '-', 1),
(2, 'ว่านหางจระเข้', 'Aloe vera', 'Aloe vera Linn.', 'Asphodelaceae', 'ว่านหางจระเข้จัดเป็นกลุ่มของไม้ล้มลุก มีลำต้นประมาณ 0.5-1 เมตร และมีข้อปล้องสั้นๆสีเขียวนวล มีรูปร่างทรงกลม เปลือกมียางสีเหลืองและขอบใบมีหนาม\r\nว่านหางจระเข้ เป็นพืชใบเลี้ยงเดี่ยว และออกเป็นใบเดี่ยว ออกเรียงเวียนรอบ ต้นเรียงสลับซ้อนกัน ใบมีความกว้าง 5-12 เซนติเมตร และมียาว 30-80 เซนติเมตร ใบมีลักษณะอูม และอวบน้ำข้างในเป็นวุ้นใสสีเขียวอ่อน และมีเมือกลื่น \r\nดอกว่านหางจระเข้แทงออกเป็นช่อ บริเวณกลางต้นดอกจะมีสีแดงอมเหลืองเป็นหลอดๆตัวของดอกมี6กลีบ ความยาวของดอกประมาณ 2-3 เซนติเมตร กว้าง 0.5-1 เซนติเมตร ส่วนของก้านจะมีความยาวยาวประมาณ 40-90 เซนติเมตร  ด้านในมีเกสรตัวผู้ 6 อัน ด้านล่างสุดเป็นรังไข่ ว่านหางจระเข้จะออกดอกในช่วงฤดูหนาวของปีและออกดอกมากที่สุดแถวบริเวณภาคเหนือของประเทศไทย', 'แถวบริเวณตอนใต้ของทวีปแอฟริกา', '-', 3, '-', '-', '-', '-', 'https://www.disthai.com/17140403/%E0%B8%A7%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%AB%E0%B8%B2%E0%B8%87%E0%B8%88%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%82%E0%B9%89-', '- ไม่ควรใช้ในหญิงที่ตั้งครรภ์และสตรีที่ให้นมบุตร\r\n- การรับประทานในปริมาณมากทำให้เกิดความผิดปกติที่เฉียบพลันของระบบทางเดินอาหารได้\r\n- ผู้ป่วยที่เป็นโรคหัวใจและหลอดเลือดรุนแรงไม่ควรรับประทาน\r\n- ผู้ที่มีความดันโลหิตสูงไม่ควรรับประทาน\r\n- การนำวุ้นใสของว่านหางจระเข้มาทาผิวหน้า หรือเส้นผม ต้องล้างน้ำยางสีเหลืองออกให้หมด เพราะจะเกิดอาการระคายเคืองได้หรือถึงขั้นอาการแพ้ย่างรุนแรงได้\r\n- ผู้ที่มีอาการแพ้หรือโรคที่ระบุไว้ด้านบนควรได้รับการปรึกษาแพทย์ก่อนที่จะนำมาใช้ ', '1.การเพราะเลี้ยงเนื้อเยื่อของว่านหางจระเข้ เหมาะสำหรับการปลูกเชิงพาณิชย์ และการปลูกขนาดใหญ่ 2.การปลูกด้วยการแยกหน่อ หน่อที่สามารถแยกมาปลูกต้องมีขนาดสูง 10-15 เซนติเมตร เหมาะสำหรับการปลูกในแปลงขนาดใหญ่ และปลูกในครัวเรือน การไว้หน่อเพื่อการทำพันธุ์ ไม่ควรเกิน 2 หน่อต่อต้น 3.การปักชำ วิธีนี้ไม่ค่อยนิยมนำมาใช้กัน เพราะต้องตัดยอดหรือโคลนต้นทำให้ได้รับคาวมเสียหายฉีดขาดหรือแตกของก้านใบ จึงเป็นวิธีที่ไม่ค่อยนิยมกันมากนัก', 'สามารถเติบโตได้ดีในฤดูหนาว', 1),
(3, 'พิกุล', 'Bullet wood', 'Mimusops elengi L.', 'Sapotaceae', 'พิกุลจัดเป็นไม้ยืนต้นขนาดกลางถึงขนาดใหญ่ที่สูงถึง 10-25 เมตร ไม่ผลัดใบ เรือนยอดเป็นพุ่มทรงกลมรูปเจดีย์หรือกลมทึบ ใบดกออกหนาแน่น เปลือกต้นสีน้ำตาลอมเทา แตกเป็นร่องตามแนวยาว ทั้งต้นมีน้ำยางสีขาว กิ่งอ่อนและตามีขนสีน้ำตาลปกคลุม ใบเป็นใบเดี่ยว เรียงสลับกันห่างๆ ใบรูปไข่ รูปรีหรือรูปขอบขนาน ใบกว้าง 2-6.5 เซนติเมตร ยาว 5-15 เซนติเมตร ก้านใบยาว 4-6 เซนติเมตร โคนใบมน ปลายใบแหลม เป็นติ่งสั้นๆ ขอบใบเรียบและเป็นคลื่นเล็กน้อย แผ่นใบค่อนข้างหนาและเหนียว สีเขียวสด เรียบเป็นมัน หูใบรูปเรียวแคบ ยาว 3-5 มม. ร่วงง่าย ดอกออกเดี่ยวๆ หรือเป็นกระจุก 2-6 ดอก ตามซอกใบใกล้ปลายกิ่ง ดอกมีกลิ่นหอม ก้านดอกย่อยยาว 2 เซนติเมตร กลีบเลี้ยง 8 กลีบ เรียง 2 ชั้น ชั้นละ 4 กลีบ กลีบเลี้ยงด้านนอกมีขนสั้นนุ่มสีน้ำตาล รูปใบหอก ปลายแหลม ยาว 7-8 มม. ติดทน กลีบดอกสั้นกว่ากลีบเลี้ยงเล็กน้อย กลีบดอก 8 กลีบ โคนเชื่อมกันเล็กน้อย เส้นผ่านศูนย์กลางดอก 0.8-1.5 เซนติเมตร กลีบดอกแต่ละกลีบจะมีส่วนยื่นออกมาด้านหลัง 2 ชิ้น ซึ่งส่วนที่ยื่นออกมาแต่ละชิ้นนี้จะมีลักษณะ ขนาดและสีคล้ายคลึงกันกับกลีบดอกมาก ทำให้ดูคล้ายกลีบดอกมีทั้งสิ้น 24 กลีบ เรียง 2 ชั้น ชั้นนอกมี 8 กลีบ ชั้นในมี 16 กลีบ กลีบดอกสีขาวนวล มีกลิ่นหอมเย็น กลิ่นยังคงอยู่แม้ตากแห้งแล้ว ดอกร่วงง่าย เมื่อใกล้โรยเป็นสีเหลืองอมน้ำตาล เกสรเพศผู้สมบูรณ์มี 8 อัน อับเรณูรูปใบหอก ยาวกว่าก้านชูอับเรณู และเกสรเพศผู้เป็นหมันมี 8 อัน มีขน รังไข่มี 8 ช่อง ผลเป็นผลสดแบบมีเนื้อ รูปไข่ ปลายแหลมสีเขียว กว้าง 1.5 เซนติเมตร ยาว 2.5-3 เซนติเมตร ที่ขั้วผลมีกลีบเลี้ยงติดคงทน ผลอ่อนสีเขียว มีขนสั้นนุ่ม ผลสุกสีเหลืองถึงสีส้ม มีรสหวานเล็กน้อย รับประทานได้ มีเมล็ดเดียว เมล็ดมีลักษณะแบนรี เปลือกแข็ง สีน้ำตาลเข้มหรือดำเป็นมัน', 'มีถิ่นกำเนิดในเขตร้อนของทวีปเอเชีย บริเวณภูมิภาคเอเชียใต้ และเอเชียตะวันออกเฉียงใต้ เช่น อินเดีย ศรีลังกา ไทย พม่า ลาว เวียดนาม กัมพูชา มาเลเชีย อินโดนีเซีย รวมถึงในหมู่เกาะต่างๆในทะเลอันดามัน', 'ปลูกมากในมาเลเซีย หมู่เกาะโซโลมอน นิวแคลิโดเนีย วานูอาตู และทางตอนเหนือของออสเตรเลีย รวมไปถึงเขตร้อนทั่ว ๆ ไป สำหรับในประเทศไทย พบได้ทั่วทุกภาคของประเทศ นอกจากนี้พิกุลยังเป็นต้นไม้ประจำจังหวัดลพบุรีอีกด้วย', 1, 'ตลอดปี', 'ตลอดปี', '-', '-', 'https://www.disthai.com/17140403/%E0%B8%A7%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%AB%E0%B8%B2%E0%B8%87%E0%B8%88%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%82%E0%B9%89', 'การใช้พิกุลในการนำมาใช้บำบัดรักษาโรค หรือนำมาเป็นส่วนผสมในตำรับยาต่างๆ ก็ควรใช้ด้วยความระมัดระวังเช่นเดียวกับกับสมุนไพรชนิดอื่นๆ คือไม่ควรใช้ในปริมาณที่มากเกินที่กำหนดได้ในตำรับตำรายาต่างๆและไม่ควรใช้ติดต่อกันเป็นระยะเวลานานจนเกินไป เพราะอาจส่งผลกระทบต่อสุขภาพได้ สำหรับสตรีมีครรภ์ผู้ป่วยโรคเรื้อรังและผู้ที่ต้องรับประทานยาต่อเนื่องก่อนจะใช้พิกุลในการช่วยบำบัดรักษาโรค ควรปรึกษาแพทย์ก่อนใช้', 'ขยายพันธุ์ได้โดย วิธีการตอน และวิธีการเพาะเมล็ด แต่วิธีที่เป็นที่นิยมในปัจจุบัน คือ การเพาะเมล็สำหรับวิธีการเพาะเมล็ดและวิธีการปลูกสามารถทำได้เช่นเดียวกันกับไม้ยืนต้นชนิดอื่นๆ', 'ปลูกได้ในดินเกือบทุกชนิด และสามารถทนต่อสภาพธรรมชาติได้ดี แต่จะชอบดินร่วนซุย มีความชื้นน้อยถึงปานกลาง และต้องการปริมาณน้ำน้อย ซึ่งหลังปลูกประมาณ 1 เดือน ควรให้น้ำ 7-10 วัน/ครั้ง และยังเป็นพืชที่ต้องการแสงแดดในการเจริญเติบโต ควรปลูกกลางแจ้ง', 1),
(4, 'ผักบุ้งทะเล', 'Beach morning-glory', 'Ipomoea pes-caprae (L.) R.Br.', 'CONVOLVULACEAE', 'ผักบุ้งทะเล จัดเป็นพรรณไม้ล้มลุกมีอายุหลายปี มีลำต้นทอดเลื้อยไปตามพื้นดิน เช่นเดียวกับผักบุ้งสามารถเลื้อยไปได้ยาวมาก ประมาณ 5-30 เมตร ลักษณะของลำต้นหรือเถากลมเป็นสีเขียวปนแดง ผิวเกลี้ยงลื่น ตามข้อจะมีรากฝอย ภายในกลวง ทั้งต้นและใบมียางสีขาว\r\nใบเป็นใบเดี่ยวออกเรียงสลับ ลักษณะของใบเป็นรูปกลม รูปไข่ รูปไต หรือรูปเกือกม้า ปลายใบเว้าบุ๋มเข้าหากัน โคนใบสอบแคบเป็นรูปหัวใจ ส่วนขอบใบเรียบ ใบมีขนาดกว้างประมาณ 7-11 เซนติเมตรและยาวประมาณ 5-8 เซนติเมตร เส้นใบเป็นแบบขนนก เนื้อใบค่อนข้างหนา ผิวใบมันเป็นสีเขียว หลังใบและท้องใบเรียบ ก้านใบยาวมีสีแดง\r\nดอกออกเป็นช่อแบบซี่ร่มตามง่ามใบ ในช่อดอกจะมีดอกประมาณ 2-6 ดอก และจะทยอยบานทีละดอก ลักษณะของดอกเป็นรูปปากแตร โคนกลีบดอกเชื่อมติดกัน ส่วนปลายดอกบานเป็นรูปปากแตร มี 5 กลีบ ลักษณะของกลีบดอกกลมรี แตกออกเป็นแฉก 5 แฉก มีขนาดเส้นผ่านศูนย์กลางประมาณ 4 เซนติเมตร ดอกมีเกสรเพศผู้ 5 ก้าน ดอกเป็นสีม่วงอมชมพู สีม่วงอมแดง สีชมพู หรือเป็นสีม่วง ผิวเกลี้ยง ด้านในของดอกส่วนโคนจะมีสีเข้มกว่าด้านนอก ส่วนกลีบดอกเลี้ยงเป็นสีเขียว และดอกจะเหี่ยวง่าย\r\nผลมีลักษณะเป็นรูปมนรีหรือรูปไข่มีเหลี่ยมคล้ายแคปซูล ผิวผลเรียบ พอผลแห้งจะแตกออกได้ มีความยาวประมาณ 2 เซนติเมตร ภายในมีเมล็ดลักษณะกลม เป็นสีเหลือง มีขนาดเส้นผ่านศูนย์กลางประมาณ 6 มิลลิเมตร มีขนสีน้ำตาลปกคลุม', 'พบได้ทั่วไปในแถบชายทะเลเขตร้อนทั่วโลก', 'ทั่วไปในแถบชายทะเลเขตร้อน', 5, 'ตลอดปี', 'ตลอดปี', '-', '-', 'https://www.disthai.com/17075536/%E0%B8%9C%E0%B8%B1%E0%B8%81%E0%B8%9A%E0%B8%B8%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B0%E0%B9%80%E0%B8%A5', '1. ผักบุ้งทะเลแม้จะอยู่ในวงศ์เดียวกันและมีลักษณะคล้ายกับผักบุ้งที่เราใช้รับประทาน แต่เป็นพืชคนละชนิดกัน ซึ่งยางจากต้นและใบของผักบุ้งทะเลมีพิษทำให้เกิดอาการวิงเวียน คลื่นไส้ หากได้รับพิษเข้าไปมากอาจทำให้เกิดอันตรายต่อร่างกายได้ ดังนั้นห้ามรับประทาน\r\n2. ถึงแม้ว่าผักบุ้งทะเลสามารถใช้รักษาแผลจากแมงกะพรุนได้ดีแต่ไม่มีที่ใช้ในผู้ป่วยที่มีอาการรุนแรงเฉียบพลัน\r\n3. การใช้น้ำส้มสายชูราดบริเวณแผล จากแมงกะพรุนยังเป็นสิ่งสำคัญมากและควรจะรีบทำก่อนใช้ผักบุ้งทะเล', 'ผักบุ้งทะเลสามารถขยายพันธุ์ได้โดยวิธีการใช้เมล็ด และใช้ลำต้นแก่ปักชำ', 'เป็นพืชที่ทนต่อความแห้งแล้งได้ดี และเป็นพืชที่ชอบดินร่วมปนทราย หรือดินทรายและยังเป็นพรรณไม้กลางแจ้งที่ไม่ต้องการร่มเงา', 1),
(6, 'ประดู่', 'Angsana Norra', 'Pterocarpus indicus Willd. ', 'PAPILIONOIDEAE', 'ประดู่บ้านจัดเป็นพรรณไม้ยืนต้นขนาดใหญ่ มีความสูงประมาณ 20-25 เมตร แตกกิ่งก้านเป็นทรงพุ่มกว้าง (กว้างกว่าประดู่ป่า) ปลายกิ่งห้อยลง ส่วนเปลือกลำต้นเป็นสีน้ำตาลเทา เป็นร่องลึกแต่ไม่มีน้ำยางสีแดงไหลออกมาเหมือนประดู่ป่า ใบเป็นใบประกอบแบบขนนก ออกเรียงสลับ แต่ละช่อจะมีใบย่อยประมาณ 7-11ใบ ลักษณะของใบเป็นรูปมนรี หรือรูปไข่ค่อนข้างมน ปลายใบแหลม โคนใบมนขอบใบเรียบ ใบมีขนาดกว้างประมาณ 3-5เซนติเมตร และยาวประมาณ 4-12เซนติเมตร แผ่นใบเป็นสีเขียว ก้านใบอ่อนมีขนขึ้นปกคลุมเล็กน้อย โคนก้านใบมีหูใบ 2 อัน เป็นเส้นยาว ดอกออกเป็นแบบช่อกระจะ โดยจะออกบริเวณซอกใบใกล้กับที่ปลายกิ่ง  กลีบดอกสีเหลืองแกมแสด มี 5 กลีบ ลักษณะคล้ายรูปผีเสื้อแต่จะออกดอกยากกว่าประดู่ป่า และ ดอกมีเกสรเพศผู้ 10 อัน ส่วนเกสรเพศเมียมี 1 อัน ดอกมีกลิ่นหอมแรง จะบานและร่วงพร้อมกันทั้งต้น ส่วนโคนก้านมีใบประดับ 1-2 อัน เป็นรูปรี กลีบเลี้ยงดอกมี 5 กลีบ ติดกันเป็นถ้วยสีเขียว ปลายแยกเป็นแฉก 2 แฉก  ผลเป็นผลแห้งลักษณะของผลเป็นรูปกลมหรือรี มีขนาดเส้นผ่านศูนย์กลางประมาณ 4-7 เซนติเมตร ที่ขอบมีปีกบาง แผ่นปีกบิดและเป็นคลื่นเล็กน้อย นูนตรงกลางลาดไปยังปีก โดยบริเวณปีกยาวประมาณ 1-2.5 เซนติเมตร ตรงกลางนูนป่องเป็นที่อยู่ของเมล็ด โดยภายในจะมีเมล็ดอยู่ 1 เมล็ด', 'ประเทศมาเลเซีย', 'ประเทศมาเลเซีย ประเทศไทย', 1, 'ช่วงเดือนมีนาคมถึงเดือนเมษายน', '-', '-', '-', 'https://www.disthai.com/17189414/%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B9%E0%B9%88%E0%B8%9A%E0%B9%89%E0%B8%B2%E0%B8%99', 'ในการใช้ประดู่บ้านเป็นสมุนไพรในการบำบัดรักษาโรคตามตำรับตำรายาต่างๆ ควรระมัดระวังในการใช้เช่นเดียวกันกับการใช้สมุนไพรชนิดอื่นๆ โดยควรใช้ในขนาดที่พอเหมาะที่ได้ระบุไว้ในตำรับตำรายาต่างๆ ไม่ควรใช้ในปริมาณที่มากหรือใช้ติดต่อกันนานจนเกินไป เพราะอาจส่งผลต่อสุขภาพได้ สำหรับ เด็ก สตรีมีครรภ์ ผู้ป่วยเรื้อรัง หรือผู้ที่ต้องรับประทานยาต่อเนื่องเป็นประจำ ก่อนจะใช้ประดู่บ้านเป็นสมุนไพรรักษาโรค ควรปรึกษาแพทย์ก่อนใช้เสมอ', 'วิธีการเพาะเมล็ดและปักชำกิ่ง แต่วิธีที่เป็นที่นิยมในปัจจุบันคือ การเพาะเมล็ด เพราะสะดวกในการจัดหาเมล็ด และสามารถทำได้รวดเร็ว รวมถึงประหยัดกว่าวิธีอื่นโดยสามารถเก็บเมล็ดพันธุ์ได้จากต้นแม่ที่เจริญเติบโตเต็ม ที่ ที่สามารถให้เมล็ดมาแล้วไม่น้อยกว่า 2 ปี โดยการเลือกต้นแม่พันธุ์ที่เจริญเติบโตดี ไม่มีโรค ต้นตรง และควรเก็บในระยะที่ฝักแก่เต็มที่หรือล่นจากต้นแล้ว', 'ในประเทศไทยสามารถได้ทุกภาคของประเทศแต่จะพบมากในป่าเบญจพรรณทางภาคใต้', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zoneID` int(11) NOT NULL,
  `nameEN` varchar(225) DEFAULT NULL,
  `nameTH` varchar(225) DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `status` int(1) DEFAULT 1 COMMENT '1=แสดง | 0=ไม่แสดง',
  `mapimageURL` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `directionsURL` varchar(500) DEFAULT NULL,
  `headzoneID` int(10) NOT NULL,
  `activeflag` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zoneID`, `nameEN`, `nameTH`, `detail`, `status`, `mapimageURL`, `location`, `directionsURL`, `headzoneID`, `activeflag`) VALUES
(1, 'Tropical evergreen forest', 'ป่าดิบเมืองร้อน', 'เป็นป่าที่อยู่ในเขตลมมรสุมพัดผ่านเกือบตลอดปี มีปริมาณน้ำฝนมาก', 1, NULL, '12.4566666,78.1666661', NULL, 0, 1),
(2, 'Tropical rain forest', 'ป่าดงดิบชื้น', 'ป่าดงดิบชื้นในประเทศไทยมีการกระจายส่วนใหญ่อยู่ทางภาคใต้และภาคตะวันออกของประเทศ อาจพบในภาคอื่นบ้าง แต่มักมีลักษณะโครงสร้างที่เป็นสังคมย่อยของสังคมป่าชนิดนี้ ป่าดงดิบชื้นขึ้นอยู่ในที่ราบรือบนภูเขาที่ระดับความสูงไม่เกิน 600 เมตรจากระดับน้ำทะเล ในภาคใต้พบได้ตั้งแต่ตอนล่างของจังหวัดประจวบคีรีขันธ์ลงไปจนถึงชายเขตแดน ส่วนทางภาคตะวันออกพบในจังหวัดตราด จันทบุรี ระยอง และบางส่วนของจังหวัดชลบุรี', 0, NULL, '8.6677197,99.9591365', NULL, 1, 1),
(3, 'Dry evergreen forest', 'ป่าดงดิบแล้ง', 'ป่าดงดิบแล้งของเมืองไทยพบกระจายตั้งแต่ตอนบนของทิวเขาถนนธงชัยจากจังหวัดชุมพรขึ้นมาทางเหนือ ปกคลุมลาดเขาทางทิศตะวันตกของทิวเขาตะนาวศรีไปจนถึงจังหวัดเชียงราย ส่วนซีกตะวันออกของประเทศปกคลุมตั้งแต่ทิวเขาภูพานต่อลงมามาถึงทิวเขาบรรทัด ทิวเขาพนมดงรักลงไปจนถึงจังหวัดระยองขึ้นไปตามทิวเขาดงพญาเย็น ทิวเขาเพชรบูรณ์จนถึงจังหวัดเลยและน่าน นอกจากนี้ ยังพบในจังหวัดสกลนคร และทางเหนือของจังหวัดหนองคายเลียบลำน้ำโขงในส่วนที่ติดต่อกับประเทศลาว ป่าชนิดนี้พบตั้งแต่ระดับความสูงจากน้ำทะเลปานกลางประมาณ 100 เมตรขึ้นไปถึง 800 เมตร', 0, NULL, '8.6677197,99.9591365', NULL, 1, 1),
(4, 'Hill evergreen forest', 'ป่าดงดิบเขา', '', 1, NULL, '8.6677197,99.9591365', NULL, 1, 1),
(5, 'Swamp forest', 'ป่าบึง', 'พบตามที่ราบลุ่มมีน้ำขังอยู่เสมอ และตามริมฝั่งทะเลที่มีโคลนเลนทั่วๆ ไป', 0, NULL, '8.6677197,99.9591365', NULL, 0, 1),
(6, 'Peat Swamp', 'ป่าพรุ', 'เป็นสังคมป่าที่อยู่ถัดจากบริเวณสังคมป่าชายเลน โดยอาจจะเป็นพื้นที่ลุ่มที่มีการทับถมของซากพืชและอินทรียวัตถุที่ไม่สลายตัว และมีน้ำท่วมขังหรือชื้นแฉะตลอดปี', 0, NULL, '8.6677197,99.9591365', NULL, 5, 1),
(7, 'Mixed Deciduous Forest', 'ป่าเบญจพรรณ', 'ลักษณะทั่วไปเป็นป่าโปร่ง พื้นที่ป่าไม้ไม่รกทึบ มีไม้ไผ่ชนิดต่างๆ ขึ้นอยู่มาก มีอยู่ทั่วไปตามภาคต่างๆ ที่เป็นที่ราบ หรือตามเนินเขา พันธุ์ไม้จะผลัดใบในฤดูแล้ง', 1, NULL, '123.456,789.101', NULL, 0, 1),
(8, 'Beach forest', 'ป่าชายหาด', 'แพร่กระจายอยู่ตามชายฝั่งทะเลที่เป็นดินกรวด ทราย และโขดหิน ดินมีฤทธิ์เป็นด่าง', 1, NULL, '12.4566666,78.1666661', NULL, 0, 1),
(10, 'Mangrove swamp forest', 'ป่าชายเลน', 'เป็นสังคมป่าไม้บริเวณชายฝั่งทะเลในจังหวัดทางภาคใต้ กลาง และภาคตะวันออก และมีน้ำขึ้น-น้ำลงอย่างเด่นชัดในรอบวัน', 1, NULL, '123.456,89.101', NULL, 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`authorityID`);

--
-- Indexes for table `eco_animals`
--
ALTER TABLE `eco_animals`
  ADD PRIMARY KEY (`eco_animalsID`);

--
-- Indexes for table `eco_plant`
--
ALTER TABLE `eco_plant`
  ADD PRIMARY KEY (`eco_plantID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `fk_employee_authorityID` (`authority_authorityID`) USING BTREE;

--
-- Indexes for table `imageplant`
--
ALTER TABLE `imageplant`
  ADD PRIMARY KEY (`imageplantID`),
  ADD KEY `fk_imageplant_plants1_idx` (`plants_plantID`),
  ADD KEY `fk_imageplant_plantpath1_idx` (`plantpath_pathID`);

--
-- Indexes for table `imagevegetation`
--
ALTER TABLE `imagevegetation`
  ADD PRIMARY KEY (`imagevegetationID`),
  ADD KEY `fk_imagevegetation_vegetationID` (`vegetation_vegetationID`) USING BTREE,
  ADD KEY `fk_imagevegetation_pathID` (`plantpath_pathID`) USING BTREE;

--
-- Indexes for table `imagezone`
--
ALTER TABLE `imagezone`
  ADD PRIMARY KEY (`imagezoneID`),
  ADD KEY `fk_imagezone_zone_idx` (`zone_zoneID`);

--
-- Indexes for table `localname`
--
ALTER TABLE `localname`
  ADD PRIMARY KEY (`localnameID`),
  ADD KEY `fk_localname_vegetationID` (`vegetation_vegetationID`) USING BTREE;

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenanceID`),
  ADD KEY `fk_maintenance_maintenancetype1_idx` (`maintenancetype_maintenancetypeID`),
  ADD KEY `fk_maintenance_employee1_idx` (`employee_employeeID`);

--
-- Indexes for table `maintenancetype`
--
ALTER TABLE `maintenancetype`
  ADD PRIMARY KEY (`maintenancetypeID`);

--
-- Indexes for table `medicinalproperties`
--
ALTER TABLE `medicinalproperties`
  ADD PRIMARY KEY (`medicinalPropertiesID`),
  ADD KEY `fk_medicinalProperties_pathID` (`plantspath_pathID`),
  ADD KEY `fk_medicinalProperties_vegetationID` (`vegetation_vegetationID`) USING BTREE;

--
-- Indexes for table `plantpath`
--
ALTER TABLE `plantpath`
  ADD PRIMARY KEY (`pathID`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plantID`),
  ADD KEY `fk_plants_zone1_idx` (`zone_zoneID`),
  ADD KEY `fk_plants_vegetation1_idx` (`vegetation_vegetationID`);

--
-- Indexes for table `prefix`
--
ALTER TABLE `prefix`
  ADD PRIMARY KEY (`PrefixID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `type_animals`
--
ALTER TABLE `type_animals`
  ADD PRIMARY KEY (`type_animalID`);

--
-- Indexes for table `vegetation`
--
ALTER TABLE `vegetation`
  ADD PRIMARY KEY (`vegetationID`),
  ADD KEY `fk_vegetation_typeID` (`typeID`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zoneID`),
  ADD KEY `fk_zone_headzoneID` (`headzoneID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `authorityID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eco_animals`
--
ALTER TABLE `eco_animals`
  MODIFY `eco_animalsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eco_plant`
--
ALTER TABLE `eco_plant`
  MODIFY `eco_plantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `imageplant`
--
ALTER TABLE `imageplant`
  MODIFY `imageplantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `imagevegetation`
--
ALTER TABLE `imagevegetation`
  MODIFY `imagevegetationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `imagezone`
--
ALTER TABLE `imagezone`
  MODIFY `imagezoneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `localname`
--
ALTER TABLE `localname`
  MODIFY `localnameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenancetype`
--
ALTER TABLE `maintenancetype`
  MODIFY `maintenancetypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicinalproperties`
--
ALTER TABLE `medicinalproperties`
  MODIFY `medicinalPropertiesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plantpath`
--
ALTER TABLE `plantpath`
  MODIFY `pathID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `plantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `PrefixID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `type_animals`
--
ALTER TABLE `type_animals`
  MODIFY `type_animalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vegetation`
--
ALTER TABLE `vegetation`
  MODIFY `vegetationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zoneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_authorityID` FOREIGN KEY (`authority_authorityID`) REFERENCES `authority` (`authorityID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `imageplant`
--
ALTER TABLE `imageplant`
  ADD CONSTRAINT `fk_imageplant_plantpath1` FOREIGN KEY (`plantpath_pathID`) REFERENCES `plantpath` (`pathID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imageplant_plants1` FOREIGN KEY (`plants_plantID`) REFERENCES `plants` (`plantID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `imagevegetation`
--
ALTER TABLE `imagevegetation`
  ADD CONSTRAINT `fk_imagevegetation_pathID` FOREIGN KEY (`plantpath_pathID`) REFERENCES `plantpath` (`pathID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imagevegetation_vegetationID` FOREIGN KEY (`vegetation_vegetationID`) REFERENCES `vegetation` (`vegetationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `imagezone`
--
ALTER TABLE `imagezone`
  ADD CONSTRAINT `fk_imagezone_zone` FOREIGN KEY (`zone_zoneID`) REFERENCES `zone` (`zoneID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `localname`
--
ALTER TABLE `localname`
  ADD CONSTRAINT `fk_localName_vegetation1_idx` FOREIGN KEY (`vegetation_vegetationID`) REFERENCES `vegetation` (`vegetationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `fk_maintenance_employee1` FOREIGN KEY (`employee_employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_maintenance_maintenancetype1` FOREIGN KEY (`maintenancetype_maintenancetypeID`) REFERENCES `maintenancetype` (`maintenancetypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medicinalproperties`
--
ALTER TABLE `medicinalproperties`
  ADD CONSTRAINT `fk_medicinalProperties_pathID` FOREIGN KEY (`plantspath_pathID`) REFERENCES `plantpath` (`pathID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_medicinalProperties_vegetationID` FOREIGN KEY (`vegetation_vegetationID`) REFERENCES `vegetation` (`vegetationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `fk_plants_vegetation1_idx` FOREIGN KEY (`vegetation_vegetationID`) REFERENCES `vegetation` (`vegetationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plants_zone1` FOREIGN KEY (`zone_zoneID`) REFERENCES `zone` (`zoneID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vegetation`
--
ALTER TABLE `vegetation`
  ADD CONSTRAINT `fk_vegatation_typeID` FOREIGN KEY (`typeID`) REFERENCES `type` (`typeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
