-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 04:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a54e45_parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `board_member`
--

CREATE TABLE `board_member` (
  `member_id` int(6) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `board_member`
--

INSERT INTO `board_member` (`member_id`, `member_name`, `position`, `description`) VALUES
(1, 'Abeer Abd Elnasser', 'Founder of Rakna', '                    Software Engineer\r\n                    graduated at 2018                      Eiusmod tempor incidiunt labore velit dolore magna aliqu\r\n                      sed eniminim veniam quis nostrud exercition eullamco\r\n                      l'),
(2, 'Abd ElHaleem Essam', 'Founder of Rakna', '                    Software Engineer\r\n                    graduated at 2016                      Eiusmod tempor incidiunt labore velit dolore magna aliqu\r\n                      sed eniminim veniam quis nostrud exercition eullamco\r\n                      l'),
(3, 'Mohammed Saleh', 'Founder of Rakna', '                    Software Engineer\r\n                    graduated at 2018                      Eiusmod tempor incidiunt labore velit dolore magna aliqu\r\n                      sed eniminim veniam quis nostrud exercition eullamco\r\n                      l'),
(4, 'Reem Abd ELmo\'men', 'Founder of Rakna', '                     BIS Helwan University\r\n                      graduated at 2019velit dolore magna aliqu\r\n                      sed eniminim veniam quis nostrud exercition eullamco\r\n                      laborisaa, Eiusmod tempor incidiunt labore velit'),
(5, 'Mennatullah Kamal', 'Founder of Rakna', '                     Commerce Cairo University\r\n                     graduated at 2019 labore velit dolore magna aliqu\r\n                      sed eniminim veniam quis nostrud exercition eullamco\r\n                      laborisaa, Eiusmod tempor incidiunt l'),
(6, 'Eman Jamal', 'Founder of Rakna', '                    Arabic Language And Literature Cairo University\r\n                     graduated at 2018  aliqu\r\n                      sed eniminim veniam quis nostrud exercition eullamco\r\n                      laborisaa, Eiusmod tempor incidiunt labor');

-- --------------------------------------------------------

--
-- Table structure for table `car numbers`
--

CREATE TABLE `car numbers` (
  `Car Number` varchar(6) NOT NULL,
  `Car Color` varchar(15) NOT NULL,
  `Car License Number` varchar(30) NOT NULL,
  `Car Type` varchar(40) NOT NULL,
  `Owner Id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `car numbers`
--

INSERT INTO `car numbers` (`Car Number`, `Car Color`, `Car License Number`, `Car Type`, `Owner Id`, `status`) VALUES
('111111', 'black', '111111', 'hhhhh', 24, 0),
('124Emy', 'Blue', '147896523', 'BMW', 25, 0),
('563hds', 'red', '1255', '', 1, 1),
('637dja', 'blue', 'mmjmn', 'toyota', 14, 1),
('fhuh-2', 'red', '5656', 'mercedes', 11, 0),
('hhh-12', 'red', '5147', 'honda', 14, 1),
('mr-12', 'green', 'mr12345', 'mercedes', 13, 0),
('my-123', 'blue', 'my5455', 'mercedes', 13, 1),
('xs-12', 'blue', 'xs12345', 'mercedes', 13, 1),
('zzzz', 'red', 'zzz122', 'mercedes', 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `car owner`
--

CREATE TABLE `car owner` (
  `Owner_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone_Number` varchar(11) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Photo_Name` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `nationalid` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `car owner`
--

INSERT INTO `car owner` (`Owner_Id`, `Name`, `Password`, `Phone_Number`, `Address`, `Email`, `Photo_Name`, `nationalid`) VALUES
(1, 'Abd-Elhaleem Essam Mahmoud ', 'Zxc@123456', '05039520245', ' Egypt', 'hhhh@gmail.com', 'default.jpg', NULL),
(11, 'hassan', 'Zxcv@123456', '01356395365', ' Egypt', 'hhhh12@gmail.com', 'default.jpg', NULL),
(13, 'mass', 'Zxcv@123456', '012354698', ' zayed', 'ghhh@gmail.com', '13.jpg', NULL),
(14, 'Haleem', 'Asdf@123456', '01027105712', ' zayed', 'haleemessam@gmail.com', '14.jpeg', 2147483647),
(17, 'omar', 'Zxcv@123456', '0232323133', ' zayed', 'omar@gmail.com', '17.jpg', NULL),
(19, 'mmm', 'Zxcv@123456', '0453256325', ' giza', 'hhhhhhh@gmail.com', 'default.jpg', NULL),
(20, 'saleh', '02115319e4c', '12346123562', ' zayed', 'saleh@gmail.com', 'default.jpg', NULL),
(25, 'Eman', '02115319e4cd6d00e61a98779efe26fb99e0b800', '01112223334', 'Helwan', 'eman@gmail.com', '25.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_slot`
--

CREATE TABLE `car_slot` (
  `Slot_Id` int(11) NOT NULL,
  `slot_code` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `Parking_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `car_slot`
--

INSERT INTO `car_slot` (`Slot_Id`, `slot_code`, `status`, `Parking_Id`) VALUES
(1, 'NC-1', 0, 1),
(2, 'NC-2', 0, 1),
(3, 'NC-3', 0, 1),
(4, 'NC-4', 0, 1),
(5, 'NC-5', 0, 1),
(6, 'NC-6', 1, 1),
(7, 'NC-7', 0, 1),
(8, 'NC-8', 0, 1),
(9, 'NC-9', 1, 1),
(10, 'NC-10', 1, 1),
(11, 'NC-11', 0, 1),
(12, 'NC-12', 0, 1),
(13, 'NC-13', 1, 1),
(14, 'NC-14', 0, 1),
(15, 'NC-15', 0, 1),
(16, 'NC-16', 0, 1),
(17, 'NC-17', 0, 1),
(18, 'NC-18', 0, 1),
(19, 'NC-19', 0, 1),
(20, 'NC-20', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `City_Id` int(11) NOT NULL,
  `City_Name` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City_Id`, `City_Name`, `Description`, `image`) VALUES
(1, 'Nasr_City', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.', '1.jpg'),
(2, 'Zayed', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.', '2.jpg'),
(3, 'Maadi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.', '3.jpg'),
(4, 'Haram', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.', '4.jpg'),
(5, 'New_Giza', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.', '5.jpg'),
(6, 'Fifth_Settlment', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.', '6.jpg'),
(7, 'Alrehab', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.', '7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `email` varchar(100) NOT NULL,
  `name` varchar(7) NOT NULL,
  `address` varchar(500) NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `phone1` varchar(11) NOT NULL,
  `phone2` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`email`, `name`, `address`, `latitude`, `longitude`, `phone1`, `phone2`) VALUES
('Rakna@gmail.com', 'Rakna', 'Smart Village, Abou Rawash, Giza Governorate', '30.072922', ' 31.021751', '02 26831037', '0127634764');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `deliveryno` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  `time` varchar(8) NOT NULL,
  `carno` varchar(7) NOT NULL,
  `userid` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`deliveryno`, `location`, `time`, `carno`, `userid`, `employeeid`, `status`, `timestamp`) VALUES
(1, 'giza', '20:00', '637dja', 14, 11, 0, '2020-04-11 09:35:28'),
(2, '6 october', '21:30', '637dja', 14, 1, 0, '2020-04-11 09:36:23'),
(3, '6 october', '17:30', '637dja', 14, 13, 0, '2020-04-11 09:53:43'),
(4, 'misr elgdeda', '10:30', 'hhh-12', 14, 13, 0, '2020-04-11 09:53:43'),
(5, 'giza', '17:00', '637dja', 14, 12, 0, '2020-04-11 10:30:13'),
(6, 'maadi', '19:00', 'hhh-12', 14, 12, 0, '2020-04-11 10:30:13'),
(7, '6 october', '17:00', '637dja', 14, 11, 0, '2020-04-11 10:33:31');

-- --------------------------------------------------------

--
-- Stand-in structure for view `deliveryview`
-- (See below for the actual view)
--
CREATE TABLE `deliveryview` (
`deliveryno` int(11)
,`location` varchar(500)
,`time` varchar(8)
,`deliveytimestamp` timestamp
,`userid` int(11)
,`username` varchar(50)
,`carno` varchar(6)
,`cartype` varchar(40)
,`carcolor` varchar(15)
,`licenseno` varchar(30)
,`employeename` varchar(50)
,`employeephone` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeid` int(11) NOT NULL,
  `employeename` varchar(50) NOT NULL,
  `employeephone` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `parking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeid`, `employeename`, `employeephone`, `status`, `parking_id`) VALUES
(1, 'ola', '00000', 0, 1),
(2, 'ali', '354', 0, 1),
(11, 'alaa', '44', 0, 6),
(12, 'ahmed', '654', 1, 3),
(13, 'salem', '5555', 1, 2),
(14, 'mohamed', '88', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_Id` int(11) NOT NULL,
  `sendTime` datetime NOT NULL,
  `messageBody` varchar(1000) NOT NULL,
  `adminReply` varchar(1000) DEFAULT NULL,
  `sendUser_Id` int(255) NOT NULL,
  `subject` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_Id`, `sendTime`, `messageBody`, `adminReply`, `sendUser_Id`, `subject`) VALUES
(1, '2020-04-15 07:36:14', 'please,solve this problem.', 'hi there', 14, 'ay 7aga'),
(17, '0000-00-00 00:00:00', 'Blaaa Blaaaa', '', 11, NULL),
(18, '2020-04-11 13:46:03', 'wkndskWN', NULL, 14, 'skjas'),
(19, '2020-04-11 15:04:01', 'djnaskjnfd', 'ahlan', 14, 'djwa'),
(20, '2020-04-11 15:04:55', 'djnaskjnfd', 'AHLAN TANY', 14, 'djwa'),
(21, '2020-04-11 15:10:41', 'DJBAEJEHB', 'hello ', 14, 'SJDN'),
(22, '2020-04-11 20:20:40', 'I Can not Work Under Stress :D', NULL, 25, 'complain');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notifyno` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `details` text DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deliveryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notifyno`, `type`, `details`, `userid`, `time`, `status`, `deliveryid`) VALUES
(2, 'first notification', 'this is first notification', 17, '2020-03-17 21:45:10', 0, 3),
(4, 'second notification', 'this is second notification', 13, '2020-03-17 21:45:10', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `Offer_No` int(11) NOT NULL,
  `Start_Date` datetime NOT NULL,
  `End_Date` datetime NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Details` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`Offer_No`, `Start_Date`, `End_Date`, `Title`, `Details`) VALUES
(1, '2020-01-01 00:00:00', '2020-02-11 10:12:00', 'sssss ddddddddd', 'hi from offer 1'),
(5, '2020-01-01 00:00:00', '2020-02-11 10:12:00', 'wwwww nnnnn', 'hi from offer 4'),
(8, '2020-01-01 00:00:00', '2020-05-01 10:12:00', 'new offer', 'new offer new offernew offer new offer'),
(9, '2020-04-06 13:02:00', '2020-04-16 00:21:00', 'sssss sssssss', 'ghhhhhhh hhhhhhhh hhhhggggg  ggggggg  gggggggggggg'),
(10, '2020-02-24 12:04:07', '2020-02-29 12:04:21', 'Parking openning discounts', 'Join to our family now and have 50% off for a week we are here to make your way easier . '),
(11, '2020-02-23 12:08:10', '2020-02-28 12:08:22', 'New Branch on Hurgada Comming Soon ', 'Be the first one to be on hurgada family and make your vaccation on beach easier '),
(12, '2020-02-09 12:11:02', '2020-03-07 12:11:09', 'Black Friday Discount', ' Hurry up to catch our Black Friday Offers and make your life good ');

-- --------------------------------------------------------

--
-- Stand-in structure for view `owners_messages_view`
-- (See below for the actual view)
--
CREATE TABLE `owners_messages_view` (
`Name` varchar(50)
,`Owner_Id` int(11)
,`message_Id` int(11)
,`sendTime` datetime
,`messageBody` varchar(1000)
,`adminReply` varchar(1000)
,`sendUser_Id` int(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `Parking_Id` int(11) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `Capacity` int(5) NOT NULL,
  `Slot_FeesPerHour` int(4) NOT NULL,
  `City_Id` int(11) DEFAULT NULL,
  `Parking_Name` varchar(255) NOT NULL,
  `Desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`Parking_Id`, `latitude`, `longitude`, `Capacity`, `Slot_FeesPerHour`, `City_Id`, `Parking_Name`, `Desc`) VALUES
(1, 'N 30° 4\' 4.8288\"', 'E 31° 19\' 54.1884\"', 20, 10, 1, 'Naser_City Parking-1', 'Lorem Ipsum is simply dummy text of the printing a.'),
(2, 'N 30° 10\' 32.538\"', 'E 31° 25\' 26.8176\"', 25, 30, 2, 'Zayed Parking-1', 'Lorem Ipsum is simply dummy text of the printing a'),
(3, 'N 29° 57\' 37.0404\"', 'E 31° 15\' 27.8244\"', 20, 10, 3, 'Maadi Parking-1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.'),
(4, 'N 29° 58\' 41.8224\"', 'E 31° 8\' 59.2404\"', 50, 15, 4, 'Haram Parking-1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.'),
(5, 'N 29° 59\' 23.8704\"', 'E 31° 9\' 49.4784\"', 30, 20, 4, 'Haram Parking-2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.'),
(6, 'N 30° 0\' 0\"', 'E 31° 12\' 0\"', 25, 15, 5, 'New Giza Parking-1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.'),
(7, 'N 30° 0\' 30.6\"', 'E 31° 25\' 42.6\"', 30, 20, 6, 'Fifth_settelment Parking-1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.'),
(8, 'N 30° 3\' 58.5756\"', 'E 31° 29\' 8.1636\"', 40, 25, 7, 'Alrehab Parking-1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.'),
(10, '12.2145', '32.545', 10, 54, 1, 'parking2', 'Lorem Ipsum is simply dummy text of the printing a.');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rentno` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `rentalcarno` varchar(6) NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL,
  `timefrom` time NOT NULL,
  `timeto` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rentno`, `userid`, `rentalcarno`, `datefrom`, `dateto`, `timefrom`, `timeto`, `timestamp`) VALUES
(12, 11, '879knd', '2020-03-31', '2020-04-11', '07:00:00', '03:00:00', '2020-04-11 01:47:17'),
(14, 14, '343hfc', '2020-03-31', '2020-03-31', '07:00:00', '12:00:00', '2020-04-10 05:40:00'),
(16, 13, '343hfc', '2020-03-31', '2020-03-31', '07:00:00', '12:00:00', '2020-04-10 05:40:00'),
(17, 17, '875knd', '2020-03-31', '2020-03-31', '07:00:00', '09:00:00', '2020-04-10 07:50:41'),
(18, 13, '879knd', '2020-03-31', '2020-04-11', '07:00:00', '04:00:00', '2020-04-11 01:46:52'),
(19, 14, '432ref', '2020-04-21', '2020-04-21', '07:00:00', '19:00:00', '2020-04-11 10:00:43'),
(20, 14, '879knd', '2020-04-21', '2020-04-21', '18:00:00', '22:30:00', '2020-04-11 10:08:36'),
(22, 14, '875knd', '2020-04-11', '2020-04-11', '13:00:00', '17:00:00', '2020-04-11 12:59:50'),
(23, 14, '283jkd', '2020-04-11', '2020-04-11', '13:00:00', '21:00:00', '2020-04-11 13:02:03'),
(24, 14, '343hfc', '2020-05-01', '2020-05-01', '01:00:00', '02:00:00', '2020-04-11 18:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `rentalcars`
--

CREATE TABLE `rentalcars` (
  `rentalcarno` varchar(6) NOT NULL,
  `rcarcolor` varchar(15) NOT NULL,
  `rcarlicenseno` varchar(30) NOT NULL,
  `rcartype` varchar(40) NOT NULL,
  `slotid` int(11) NOT NULL,
  `parkingid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentalcars`
--

INSERT INTO `rentalcars` (`rentalcarno`, `rcarcolor`, `rcarlicenseno`, `rcartype`, `slotid`, `parkingid`, `status`) VALUES
('283jkd', 'grey', '3y232832e2', 'mercedes', 16, 1, 1),
('343hfc', 'red', '984593934', 'toyota', 2, 4, 1),
('432ref', 'blue', '49387432d23', 'kia', 10, 1, 0),
('875knd', 'blue', '49387432d', 'bmw', 9, 2, 1),
('879knd', 'grey', '49389432d', 'bmw', 7, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rentdelivery`
--

CREATE TABLE `rentdelivery` (
  `rdeliveryno` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  `rentno` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentdelivery`
--

INSERT INTO `rentdelivery` (`rdeliveryno`, `location`, `rentno`, `employeeid`, `timestamp`) VALUES
(1, '23j3f', 12, 4, '2020-04-08 21:11:25'),
(5, '23j3f', 14, 2, '2020-04-08 22:44:41'),
(6, '23j3f', 16, 1, '2020-04-08 22:48:33'),
(7, 'manial', 17, 3, '2020-04-08 22:56:38'),
(8, 'mohandeseen', 20, 2, '2020-04-11 10:24:21'),
(9, 'mohandeseen', 21, 12, '2020-04-11 10:37:23'),
(10, '23j3f', 22, 13, '2020-04-11 13:00:15'),
(11, 'mohandeseen', 23, 12, '2020-04-11 13:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `Car_Number` varchar(6) NOT NULL,
  `Slot_Id` int(11) NOT NULL,
  `Parking_Id` int(11) NOT NULL,
  `Date_From` date NOT NULL,
  `Date_To` date NOT NULL,
  `Time_From` time NOT NULL,
  `Time_To` time NOT NULL,
  `Owner_Id` int(11) DEFAULT NULL,
  `total` float NOT NULL,
  `Reservation_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `Car_Number`, `Slot_Id`, `Parking_Id`, `Date_From`, `Date_To`, `Time_From`, `Time_To`, `Owner_Id`, `total`, `Reservation_Time`) VALUES
(1, '85', 1, 1, '2020-03-22', '2020-03-22', '12:00:00', '18:00:00', 19, 0, '2020-03-26 16:26:24'),
(2, 'fhuh-2', 1, 1, '2020-03-25', '2020-03-26', '05:00:00', '06:00:00', 11, 0, '2020-03-26 16:26:24'),
(3, '85', 9, 1, '2020-03-28', '2020-03-29', '05:00:00', '06:00:00', 19, 15.5, '2020-03-26 16:26:24'),
(4, '85', 2, 1, '2020-03-22', '2020-03-22', '12:00:00', '18:00:00', 11, 0, '2020-03-26 16:26:24'),
(11, 'zzzz', 6, 1, '2020-03-26', '2020-03-26', '13:00:00', '14:30:00', 17, 0, '2020-03-26 19:09:26'),
(12, 'zzzz', 10, 1, '2020-03-27', '2020-03-27', '14:15:00', '15:45:00', 17, 0, '2020-03-27 15:11:44'),
(13, 'zzzz', 10, 1, '2020-03-28', '2020-03-28', '13:15:00', '13:30:00', 17, 0, '2020-03-28 10:10:36'),
(14, 'zzzz', 10, 3, '2020-03-28', '2020-03-28', '13:15:00', '13:30:00', 17, 0, '2020-03-28 10:37:50'),
(15, 'zzzz', 10, 2, '2020-03-28', '2020-03-28', '13:15:00', '13:30:00', 17, 0, '2020-03-28 10:41:03'),
(16, 'zzzz', 10, 1, '2020-03-28', '2020-03-28', '13:15:00', '13:30:00', 17, 0, '2020-03-28 10:43:34'),
(17, 'zzzz', 10, 1, '2020-03-28', '2020-03-28', '13:15:00', '13:30:00', 17, 0, '2020-03-28 10:49:15'),
(18, 'zzzz', 10, 1, '2020-03-28', '2020-03-28', '13:15:00', '13:30:00', 17, 0, '2020-03-28 10:49:57'),
(29, 'zzzz', 10, 1, '2020-03-28', '2020-03-28', '20:00:00', '22:00:00', 17, 20, '2020-03-28 13:23:27'),
(30, 'zzzz', 10, 4, '2020-03-28', '2020-03-28', '20:00:00', '22:00:00', 17, 20, '2020-03-28 13:25:57'),
(31, 'zzzz', 10, 1, '2020-03-28', '2020-03-28', '20:00:00', '22:00:00', 17, 20, '2020-03-28 13:26:57'),
(42, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 19:08:56'),
(43, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 19:54:52'),
(44, '555-mm', 10, 5, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 19:57:56'),
(45, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 19:58:35'),
(46, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 20:01:49'),
(47, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 20:04:48'),
(48, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 20:05:37'),
(49, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 20:11:04'),
(50, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 20:13:09'),
(51, '637dja', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 14, 20, '2020-04-11 20:14:46'),
(52, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 20:15:27'),
(53, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 20:16:45'),
(54, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 21, 20, '2020-03-29 20:18:27'),
(55, '555-mm', 10, 1, '2020-03-29', '2020-03-29', '21:00:00', '23:00:00', 14, 20, '2020-04-11 20:18:59'),
(56, '555-mm', 10, 1, '2020-03-30', '2020-03-30', '14:00:00', '15:00:00', 21, 10, '2020-03-30 09:38:54'),
(57, '555-mm', 6, 1, '2020-04-04', '2020-04-04', '15:00:00', '17:00:00', 21, 20, '2020-04-03 22:10:16'),
(58, '555-mm', 6, 1, '2020-04-05', '2020-04-05', '16:00:00', '17:00:00', 21, 10, '2020-04-05 11:48:15'),
(59, '555-mm', 1, 1, '2020-04-05', '2020-04-05', '16:45:00', '17:15:00', 21, 5, '2020-04-05 12:14:05'),
(60, '555-mm', 6, 1, '2020-04-07', '2020-04-07', '02:15:00', '13:00:00', 21, 107.5, '2020-04-07 09:40:50'),
(61, '555-mm', 10, 1, '2020-04-07', '2020-04-07', '05:00:00', '15:00:00', 21, 100, '2020-04-07 09:42:58'),
(62, '555-mm', 11, 1, '2020-04-07', '2020-04-07', '01:00:00', '14:00:00', 21, 130, '2020-04-07 09:51:09'),
(63, '555-mm', 7, 1, '2020-04-07', '2020-04-07', '01:00:00', '13:00:00', 21, 120, '2020-04-07 10:08:01'),
(64, 'zzzz', 15, 1, '2020-04-07', '2020-04-07', '15:00:00', '16:00:00', 17, 10, '2020-04-07 10:13:15'),
(65, 'zzzz', 11, 1, '2020-04-07', '2020-04-07', '15:00:00', '16:00:00', 17, 10, '2020-04-07 10:26:14'),
(66, 'zzzz', 11, 1, '2020-04-07', '2020-04-07', '15:00:00', '16:00:00', 17, 10, '2020-04-07 10:26:28'),
(67, '637dja', 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 14, 10, '2020-04-11 19:02:52'),
(68, '124Emy', 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 25, 10, '2020-04-11 19:04:36'),
(69, '124Emy', 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 25, 120, '2020-04-11 19:07:15'),
(70, '124Emy', 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 25, 10, '2020-04-11 19:22:18'),
(71, '124Emy', 4, 1, '2020-04-12', '2020-04-12', '01:00:00', '02:00:00', 25, 10, '2020-04-11 20:00:16'),
(74, '124Emy', 10, 1, '2020-04-12', '2020-04-12', '01:00:00', '02:00:00', 25, 10, '2020-04-11 20:21:53'),
(75, '124Emy', 10, 1, '2020-04-12', '2020-04-12', '01:00:00', '02:00:00', 25, 10, '2020-04-11 20:22:46'),
(76, '124Emy', 10, 1, '2020-04-12', '2020-04-12', '01:00:00', '02:00:00', 25, 10, '2020-04-11 20:23:30'),
(79, '124Emy', 11, 1, '2020-04-12', '2020-04-12', '00:00:00', '11:45:00', 25, 117.5, '2020-04-12 09:07:45'),
(81, '124Emy', 10, 1, '2020-04-12', '2020-04-12', '14:00:00', '16:00:00', 25, 20, '2020-04-12 10:25:18'),
(82, '124Emy', 6, 1, '2020-04-12', '2020-04-12', '15:00:00', '16:00:00', 25, 10, '2020-04-12 10:27:23'),
(83, '124Emy', 2, 1, '2020-04-28', '2020-04-28', '15:00:00', '18:00:00', 25, 30, '2020-04-27 22:27:37'),
(84, '124Emy', 7, 1, '2020-04-28', '2020-04-28', '16:00:00', '17:00:00', 25, 10, '2020-04-27 22:30:04');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ticketbookedslots`
-- (See below for the actual view)
--
CREATE TABLE `ticketbookedslots` (
`Slot_Id` int(11)
,`slot_code` varchar(100)
,`Date_From` date
,`Date_To` date
,`Time_From` time
,`Time_To` time
,`Parking_Id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Haleem', 'haleemessam@gmail.com', NULL, '$2y$10$qolh/letNRu9KnPOXxpuP.c/tFOekUhDU6u4HryIVz.IwcDUO4ZzK', NULL, '2020-04-28 22:14:49', '2020-04-28 22:14:49');

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewcarowner`
-- (See below for the actual view)
--
CREATE TABLE `viewcarowner` (
`Car Number` varchar(6)
,`Car Color` varchar(15)
,`Car License Number` varchar(30)
,`Car Type` varchar(40)
,`Owner_Id` int(11)
,`Name` varchar(50)
,`Phone_Number` varchar(11)
,`Address` varchar(100)
,`Email` varchar(100)
,`Photo_Name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewcityparking`
-- (See below for the actual view)
--
CREATE TABLE `viewcityparking` (
`Parking_Id` int(11)
,`latitude` varchar(50)
,`longitude` varchar(50)
,`Capacity` int(5)
,`Slot_FeesPerHour` int(4)
,`Parking_Name` varchar(255)
,`City_Id` int(11)
,`City_Name` varchar(255)
,`Desc` text
,`City_Desc` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewemployeeparking`
-- (See below for the actual view)
--
CREATE TABLE `viewemployeeparking` (
`Parking_Name` varchar(255)
,`Parking_Id` int(11)
,`employeeid` int(11)
,`employeename` varchar(50)
,`employeephone` varchar(30)
,`status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewrent`
-- (See below for the actual view)
--
CREATE TABLE `viewrent` (
`rentno` int(11)
,`userid` int(11)
,`Name` varchar(50)
,`rentalcarno` varchar(6)
,`datefrom` date
,`dateto` date
,`timefrom` time
,`timeto` time
,`timestamp` timestamp
,`rcartype` varchar(40)
,`rcarcolor` varchar(15)
,`rcarlicenseno` varchar(30)
,`slotid` int(11)
,`status` tinyint(1)
,`slot_code` varchar(100)
,`Parking_Name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewrentalcars`
-- (See below for the actual view)
--
CREATE TABLE `viewrentalcars` (
`rentalcarno` varchar(6)
,`status` tinyint(1)
,`slot_code` varchar(100)
,`Parking_Name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewrentdelivery`
-- (See below for the actual view)
--
CREATE TABLE `viewrentdelivery` (
`rdeliveryno` int(11)
,`location` varchar(500)
,`rentno` int(11)
,`employeeid` int(11)
,`timestamp` timestamp
,`employeename` varchar(50)
,`employeephone` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewticket`
-- (See below for the actual view)
--
CREATE TABLE `viewticket` (
`ticket_id` int(11)
,`Car_Number` varchar(6)
,`Owner_Id` int(11)
,`Reservation_Time` timestamp
,`total` float
,`Date_From` date
,`Date_To` date
,`Time_From` time
,`Time_To` time
,`slot_code` varchar(100)
,`Parking_Name` varchar(255)
,`Car Color` varchar(15)
,`Car Type` varchar(40)
,`Car License Number` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_count_parking`
-- (See below for the actual view)
--
CREATE TABLE `view_count_parking` (
`City_Id` int(11)
,`City_Name` varchar(255)
,`Parking_Count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_count_parking_ticket`
-- (See below for the actual view)
--
CREATE TABLE `view_count_parking_ticket` (
`Parking_Id` int(11)
,`Parking_Name` varchar(255)
,`Desc` mediumtext
,`ticket_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_count_ticket`
-- (See below for the actual view)
--
CREATE TABLE `view_count_ticket` (
`City_Id` int(11)
,`City_Name` varchar(255)
,`ticket_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `deliveryview`
--
DROP TABLE IF EXISTS `deliveryview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `deliveryview`  AS  select `delivery`.`deliveryno` AS `deliveryno`,`delivery`.`location` AS `location`,`delivery`.`time` AS `time`,`delivery`.`timestamp` AS `deliveytimestamp`,`car owner`.`Owner_Id` AS `userid`,`car owner`.`Name` AS `username`,`car numbers`.`Car Number` AS `carno`,`car numbers`.`Car Type` AS `cartype`,`car numbers`.`Car Color` AS `carcolor`,`car numbers`.`Car License Number` AS `licenseno`,`employee`.`employeename` AS `employeename`,`employee`.`employeephone` AS `employeephone` from (((`delivery` join `car owner` on(`delivery`.`userid` = `car owner`.`Owner_Id`)) join `car numbers` on(`delivery`.`carno` = `car numbers`.`Car Number`)) join `employee` on(`delivery`.`employeeid` = `employee`.`employeeid`)) order by `delivery`.`deliveryno` ;

-- --------------------------------------------------------

--
-- Structure for view `owners_messages_view`
--
DROP TABLE IF EXISTS `owners_messages_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `owners_messages_view`  AS  select `car owner`.`Name` AS `Name`,`car owner`.`Owner_Id` AS `Owner_Id`,`messages`.`message_Id` AS `message_Id`,`messages`.`sendTime` AS `sendTime`,`messages`.`messageBody` AS `messageBody`,`messages`.`adminReply` AS `adminReply`,`messages`.`sendUser_Id` AS `sendUser_Id` from (`car owner` join `messages` on(`messages`.`sendUser_Id` = `car owner`.`Owner_Id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `ticketbookedslots`
--
DROP TABLE IF EXISTS `ticketbookedslots`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ticketbookedslots`  AS  select `car_slot`.`Slot_Id` AS `Slot_Id`,`car_slot`.`slot_code` AS `slot_code`,`ticket`.`Date_From` AS `Date_From`,`ticket`.`Date_To` AS `Date_To`,`ticket`.`Time_From` AS `Time_From`,`ticket`.`Time_To` AS `Time_To`,`car_slot`.`Parking_Id` AS `Parking_Id` from (`car_slot` left join `ticket` on(`car_slot`.`Slot_Id` = `ticket`.`Slot_Id` and `car_slot`.`Slot_Id` = `ticket`.`Slot_Id`)) order by `car_slot`.`Slot_Id` ;

-- --------------------------------------------------------

--
-- Structure for view `viewcarowner`
--
DROP TABLE IF EXISTS `viewcarowner`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcarowner`  AS  select `car numbers`.`Car Number` AS `Car Number`,`car numbers`.`Car Color` AS `Car Color`,`car numbers`.`Car License Number` AS `Car License Number`,`car numbers`.`Car Type` AS `Car Type`,`car owner`.`Owner_Id` AS `Owner_Id`,`car owner`.`Name` AS `Name`,`car owner`.`Phone_Number` AS `Phone_Number`,`car owner`.`Address` AS `Address`,`car owner`.`Email` AS `Email`,`car owner`.`Photo_Name` AS `Photo_Name` from (`car numbers` join `car owner` on(`car numbers`.`Owner Id` = `car owner`.`Owner_Id` and `car numbers`.`Owner Id` = `car owner`.`Owner_Id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewcityparking`
--
DROP TABLE IF EXISTS `viewcityparking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcityparking`  AS  select `parking`.`Parking_Id` AS `Parking_Id`,`parking`.`latitude` AS `latitude`,`parking`.`longitude` AS `longitude`,`parking`.`Capacity` AS `Capacity`,`parking`.`Slot_FeesPerHour` AS `Slot_FeesPerHour`,`parking`.`Parking_Name` AS `Parking_Name`,`parking`.`City_Id` AS `City_Id`,`city`.`City_Name` AS `City_Name`,`parking`.`Desc` AS `Desc`,`city`.`Description` AS `City_Desc` from (`parking` join `city` on(`parking`.`City_Id` = `city`.`City_Id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewemployeeparking`
--
DROP TABLE IF EXISTS `viewemployeeparking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewemployeeparking`  AS  select `parking`.`Parking_Name` AS `Parking_Name`,`parking`.`Parking_Id` AS `Parking_Id`,`employee`.`employeeid` AS `employeeid`,`employee`.`employeename` AS `employeename`,`employee`.`employeephone` AS `employeephone`,`employee`.`status` AS `status` from (`parking` join `employee` on(`parking`.`Parking_Id` = `employee`.`parking_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewrent`
--
DROP TABLE IF EXISTS `viewrent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewrent`  AS  select `rent`.`rentno` AS `rentno`,`rent`.`userid` AS `userid`,`car owner`.`Name` AS `Name`,`rent`.`rentalcarno` AS `rentalcarno`,`rent`.`datefrom` AS `datefrom`,`rent`.`dateto` AS `dateto`,`rent`.`timefrom` AS `timefrom`,`rent`.`timeto` AS `timeto`,`rent`.`timestamp` AS `timestamp`,`rentalcars`.`rcartype` AS `rcartype`,`rentalcars`.`rcarcolor` AS `rcarcolor`,`rentalcars`.`rcarlicenseno` AS `rcarlicenseno`,`rentalcars`.`slotid` AS `slotid`,`viewrentalcars`.`status` AS `status`,`viewrentalcars`.`slot_code` AS `slot_code`,`viewrentalcars`.`Parking_Name` AS `Parking_Name` from (((`rent` join `car owner` on(`rent`.`userid` = `car owner`.`Owner_Id`)) join `viewrentalcars` on(`rent`.`rentalcarno` = `viewrentalcars`.`rentalcarno`)) join `rentalcars` on(`rent`.`rentalcarno` = `rentalcars`.`rentalcarno`)) order by `rent`.`rentno` ;

-- --------------------------------------------------------

--
-- Structure for view `viewrentalcars`
--
DROP TABLE IF EXISTS `viewrentalcars`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewrentalcars`  AS  select `rentalcars`.`rentalcarno` AS `rentalcarno`,`rentalcars`.`status` AS `status`,`car_slot`.`slot_code` AS `slot_code`,`parking`.`Parking_Name` AS `Parking_Name` from ((`rentalcars` join `car_slot` on(`rentalcars`.`slotid` = `car_slot`.`Slot_Id`)) join `parking` on(`rentalcars`.`parkingid` = `parking`.`Parking_Id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewrentdelivery`
--
DROP TABLE IF EXISTS `viewrentdelivery`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewrentdelivery`  AS  select `rentdelivery`.`rdeliveryno` AS `rdeliveryno`,`rentdelivery`.`location` AS `location`,`rentdelivery`.`rentno` AS `rentno`,`rentdelivery`.`employeeid` AS `employeeid`,`rentdelivery`.`timestamp` AS `timestamp`,`employee`.`employeename` AS `employeename`,`employee`.`employeephone` AS `employeephone` from (`rentdelivery` join `employee` on(`rentdelivery`.`employeeid` = `employee`.`employeeid`)) order by `rentdelivery`.`rdeliveryno` ;

-- --------------------------------------------------------

--
-- Structure for view `viewticket`
--
DROP TABLE IF EXISTS `viewticket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewticket`  AS  select `ticket`.`ticket_id` AS `ticket_id`,`ticket`.`Car_Number` AS `Car_Number`,`ticket`.`Owner_Id` AS `Owner_Id`,`ticket`.`Reservation_Time` AS `Reservation_Time`,`ticket`.`total` AS `total`,`ticket`.`Date_From` AS `Date_From`,`ticket`.`Date_To` AS `Date_To`,`ticket`.`Time_From` AS `Time_From`,`ticket`.`Time_To` AS `Time_To`,`car_slot`.`slot_code` AS `slot_code`,`parking`.`Parking_Name` AS `Parking_Name`,`car numbers`.`Car Color` AS `Car Color`,`car numbers`.`Car Type` AS `Car Type`,`car numbers`.`Car License Number` AS `Car License Number` from (((`ticket` join `car_slot` on(`ticket`.`Slot_Id` = `car_slot`.`Slot_Id`)) join `parking` on(`ticket`.`Parking_Id` = `parking`.`Parking_Id`)) join `car numbers` on(`ticket`.`Car_Number` = `car numbers`.`Car Number`)) order by `ticket`.`ticket_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_count_parking`
--
DROP TABLE IF EXISTS `view_count_parking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_count_parking`  AS  select `city`.`City_Id` AS `City_Id`,`city`.`City_Name` AS `City_Name`,count(`parking`.`Parking_Id`) AS `Parking_Count` from (`city` left join `parking` on(`parking`.`City_Id` = `city`.`City_Id`)) group by `city`.`City_Id`,`city`.`City_Name` ;

-- --------------------------------------------------------

--
-- Structure for view `view_count_parking_ticket`
--
DROP TABLE IF EXISTS `view_count_parking_ticket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_count_parking_ticket`  AS  select `parking`.`Parking_Id` AS `Parking_Id`,`parking`.`Parking_Name` AS `Parking_Name`,`parking`.`Desc` AS `Desc`,count(`ticket`.`ticket_id`) AS `ticket_count` from (`parking` left join `ticket` on(`ticket`.`Parking_Id` = `parking`.`Parking_Id`)) union select `parking`.`Parking_Id` AS `Parking_Id`,`parking`.`Parking_Name` AS `Parking_Name`,`parking`.`Desc` AS `Desc`,ifnull(`ticket`.`ticket_id`,0) AS `ticket_count` from (`parking` left join `ticket` on(`ticket`.`Parking_Id` = `parking`.`Parking_Id`)) where `ticket`.`ticket_id` is null order by `ticket_count` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_count_ticket`
--
DROP TABLE IF EXISTS `view_count_ticket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_count_ticket`  AS  select `viewcityparking`.`City_Id` AS `City_Id`,`viewcityparking`.`City_Name` AS `City_Name`,count(`ticket`.`ticket_id`) AS `ticket_count` from (`viewcityparking` left join `ticket` on(`viewcityparking`.`Parking_Id` = `ticket`.`Parking_Id`)) group by `viewcityparking`.`City_Id`,`viewcityparking`.`City_Name` order by count(`ticket`.`ticket_id`) desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board_member`
--
ALTER TABLE `board_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `car numbers`
--
ALTER TABLE `car numbers`
  ADD PRIMARY KEY (`Car Number`) USING BTREE,
  ADD KEY `Owner Id` (`Owner Id`) USING BTREE;

--
-- Indexes for table `car owner`
--
ALTER TABLE `car owner`
  ADD PRIMARY KEY (`Owner_Id`) USING BTREE,
  ADD UNIQUE KEY `UQphone` (`Phone_Number`) USING BTREE,
  ADD UNIQUE KEY `UQemail` (`Email`) USING BTREE;

--
-- Indexes for table `car_slot`
--
ALTER TABLE `car_slot`
  ADD PRIMARY KEY (`Slot_Id`) USING BTREE,
  ADD KEY `car_slot_ibfk_1` (`Parking_Id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`City_Id`) USING BTREE;

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`deliveryno`),
  ADD KEY `delivery_user_fk` (`userid`),
  ADD KEY `delivery_employee_fk` (`employeeid`),
  ADD KEY `delivery_cars_fk` (`carno`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeid`),
  ADD KEY `employee_ibfk_1` (`parking_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_Id`) USING BTREE,
  ADD KEY `user_Id` (`sendUser_Id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifyno`),
  ADD KEY `notify_user_fk` (`userid`),
  ADD KEY `notify_delivery_fk` (`deliveryid`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`Offer_No`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`Parking_Id`) USING BTREE,
  ADD KEY `car_idFk` (`City_Id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rentno`),
  ADD KEY `rent_user_fk` (`userid`),
  ADD KEY `rent_rentalcars_fk` (`rentalcarno`);

--
-- Indexes for table `rentalcars`
--
ALTER TABLE `rentalcars`
  ADD PRIMARY KEY (`rentalcarno`),
  ADD UNIQUE KEY `slotid` (`slotid`),
  ADD KEY `rentalcars_parking_fk` (`parkingid`);

--
-- Indexes for table `rentdelivery`
--
ALTER TABLE `rentdelivery`
  ADD PRIMARY KEY (`rdeliveryno`),
  ADD KEY `rdelivery_employee_fk` (`employeeid`),
  ADD KEY `rdelivery_carno_fk` (`rentno`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`) USING BTREE,
  ADD KEY `Owner_Id` (`Owner_Id`) USING BTREE,
  ADD KEY `Slot_Id` (`Slot_Id`) USING BTREE,
  ADD KEY `Parking_Id` (`Parking_Id`) USING BTREE,
  ADD KEY `ticket_ibfk_4` (`Car_Number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board_member`
--
ALTER TABLE `board_member`
  MODIFY `member_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car owner`
--
ALTER TABLE `car owner`
  MODIFY `Owner_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `deliveryno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rentno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rentdelivery`
--
ALTER TABLE `rentdelivery`
  MODIFY `rdeliveryno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
