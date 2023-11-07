-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2023 at 02:07 PM
-- Server version: 10.5.22-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SafeTrans`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `initials` varchar(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `initials`, `surname`, `email`, `password`) VALUES
(1, 'D', 'Nkosi', 'dnkosi@impumelolo.high.school.co.za', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(2) NOT NULL,
  `route` varchar(55) NOT NULL,
  `capacity` int(13) NOT NULL,
  `ticket_price` int(11) NOT NULL DEFAULT 420
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `route`, `capacity`, `ticket_price`) VALUES
(1, 'Rooihuiskraal/The Reeds', 35, 420),
(2, 'Wierdapark/Amberfield', 15, 420),
(3, 'Centurion', 15, 420);

-- --------------------------------------------------------

--
-- Table structure for table `learner`
--

CREATE TABLE `learner` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `cellphone` int(10) NOT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learner`
--

INSERT INTO `learner` (`id`, `parent_id`, `name`, `surname`, `cellphone`, `grade`) VALUES
(78, 34, 'Carel', 'Smit', 833780177, 3),
(79, 34, 'Sally', 'Smit', 849224511, 9),
(80, 35, 'Daniel', 'Johnson', 712345678, 9),
(81, 36, 'Steve', 'Brown', 832220044, 10),
(82, 36, 'Thami', 'Brown', 723882122, 10),
(83, 36, 'Melisa', 'Brown', 825547890, 12),
(84, 37, 'Zama', 'Zulu', 829330444, 8),
(85, 37, 'Thembi', 'Zulu', 819876543, 9),
(86, 38, 'Max', 'Zwane', 782839994, 12),
(87, 38, 'Anele', 'Zwane', 765542113, 11),
(88, 39, 'Simphiwe', 'Lani', 833780166, 10),
(89, 39, 'Success', 'Lani', 735448786, 9),
(90, 39, 'Jama', 'Lani', 873338492, 8),
(91, 40, 'Ayanda', 'Mhlongo', 723882122, 12),
(92, 40, 'Betty', 'Mhlongo', 737284990, 9),
(93, 41, 'Tim', 'Way', 867381192, 10),
(94, 41, 'James', 'Way', 182399210, 11),
(95, 41, 'Lisa', 'Way', 783849212, 10),
(96, 42, 'Masego', 'Mashego', 827384992, 12),
(97, 42, 'Lwazi', 'Mashego', 824493210, 10),
(98, 42, 'Sanele', 'Mashego', 782239844, 9),
(99, 43, 'Simphiwe', 'Thabethe', 784429482, 11),
(100, 43, 'Bella', 'Xulu', 78293944, 8),
(101, 44, 'Nimrod', 'Nimrod', 123994220, 11),
(102, 44, 'Nicholas', 'Rathebe', 992923304, 10),
(103, 44, 'Bethuel', 'Rathebe', 882933844, 10),
(104, 45, 'Stanley', 'Ngubane', 892384421, 12),
(105, 45, 'Daphney', 'Ngubane', 782934402, 11),
(106, 46, 'Phil', 'Maseko', 829332244, 10),
(107, 46, 'James', 'Maseko', 889223843, 11),
(108, 47, 'Hlubu', 'Malele', 739294472, 10),
(109, 47, 'Thabo', 'Malele', 861823392, 9),
(110, 47, 'Sizwe', 'Malele', 892834421, 12),
(111, 48, 'Ben', 'Pretorius', 893840022, 11),
(112, 48, 'Glen', 'Glen', 832238484, 11),
(113, 48, 'Stan', 'Pretorius', 869923341, 10);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cellphone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `name`, `surname`, `password`, `email`, `cellphone`) VALUES
(34, 'Johan', 'Smit', 'JohanSmit123@', 'Johan.Smit@gmail.com', 833780166),
(35, 'Lisa', 'Johnson', 'LisaJohnson123@', 'Lisa.Johnson@gmail.com', 825547890),
(36, 'Michael', 'Brown', 'MichaelBrown123@', 'Michael.Brown@gmail.com', 819876543),
(37, 'Sibonelo', 'Zulu', 'SiboneloZulu123@', 'Sibonelo.Zulu@gmail.com', 819876543),
(38, 'Thembi', 'Zwane', 'ThembiZwane123@', 'Thembi.Zwane@gmail.com', 765542113),
(39, 'Matthew', 'Lani', 'MatthewLani123@', 'Matthew.Lani@gmail.com', 834449920),
(40, 'Somizi', 'Mhlongo', 'SomiziMhlongo123@', 'Somizi.Mhlongo@gmail.com', 827384421),
(41, 'Jeffrey', 'Way', 'JeffreyWay123@', 'Jeffrey.Way@gmail.com', 728839922),
(42, 'Lerato', 'Mashego', 'LeratoMashego123@', 'Lerato.Mashego@gmail.com', 842930402),
(43, 'Nicole', 'Xulu', 'NicoleXulu123@', 'Nicole.Xulu@gmail.com', 828374402),
(44, 'Samuel', 'Rathebe', 'SamuelRathebe123@', 'Samuel.Rathebe@gmail.com', 782939441),
(45, 'Menzi', 'Ngubane', 'MenziNgubane123@', 'Menzi.Ngubane@gmail.com', 783453231),
(46, 'Sandy', 'Maseko', 'SandyMaseko123@', 'Sandy.Maseko@gmail.com', 782930044),
(47, 'Beuty', 'Malele', 'BeutyMalele123@', 'Beuty.Malele@gmail.com', 238494952),
(48, 'Tim', 'Pretorius', 'TimPretorius123@', 'Tim.Pretorius@gmail.com', 723389021);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registration_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `bus_id` int(2) NOT NULL,
  `pickup_num` varchar(2) NOT NULL,
  `dropoff_num` varchar(2) NOT NULL,
  `status` varchar(55) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registration_id`, `parent_id`, `learner_id`, `bus_id`, `pickup_num`, `dropoff_num`, `status`, `date`) VALUES
(113, 34, 78, 1, '1A', '1B', 'approved', '2023-10-07 14:56:09'),
(114, 34, 79, 2, '2A', '2B', 'approved', '2023-10-07 14:59:58'),
(115, 35, 80, 3, '3B', '', 'approved', '2023-10-07 15:08:26'),
(116, 36, 81, 3, '3A', '3A', 'approved', '2023-10-07 15:10:41'),
(117, 36, 82, 3, '3B', '3B', 'approved', '2023-10-07 15:11:07'),
(118, 36, 83, 3, '3A', '3A', 'approved', '2023-11-07 15:11:34'),
(119, 37, 84, 2, '2A', '2A', 'approved', '2023-11-07 15:13:10'),
(120, 37, 85, 2, '2A', '2A', 'approved', '2023-11-07 15:13:44'),
(121, 38, 86, 1, '1B', '1A', 'approved', '2023-11-07 15:15:09'),
(122, 38, 87, 1, '1A', '1A', 'approved', '2023-11-07 15:15:35'),
(123, 39, 88, 3, '3B', '3B', 'approved', '2023-11-07 15:17:07'),
(124, 39, 89, 3, '3B', '', 'approved', '2023-11-07 15:17:51'),
(125, 39, 90, 3, '3B', '3B', 'approved', '2023-11-07 15:18:12'),
(126, 40, 91, 3, '3A', '3A', 'approved', '2023-11-07 15:19:55'),
(127, 40, 92, 3, '3B', '3A', 'approved', '2023-11-07 15:20:15'),
(128, 41, 93, 3, '3B', '3B', 'approved', '2023-11-07 15:21:54'),
(129, 41, 94, 3, '3B', '3B', 'approved', '2023-11-07 15:22:15'),
(130, 41, 95, 3, '3B', '3A', 'approved', '2023-11-07 15:22:34'),
(131, 42, 96, 3, '3A', '3B', 'approved', '2023-11-07 15:23:49'),
(132, 42, 97, 3, '3B', '3B', 'approved', '2023-11-07 15:24:10'),
(133, 42, 98, 3, '3A', '3A', 'approved', '2023-11-07 15:24:38'),
(134, 43, 99, 3, '3B', '3B', 'pending', '2023-11-07 15:26:23'),
(135, 43, 100, 3, '3B', '3B', 'pending', '2023-11-07 15:27:02'),
(136, 44, 101, 2, '2B', '2B', 'approved', '2023-11-07 15:28:48'),
(137, 44, 102, 2, '2B', '2B', 'approved', '2023-11-07 15:29:09'),
(138, 44, 103, 2, '2B', '2B', 'approved', '2023-11-07 15:29:36'),
(139, 45, 104, 2, '2A', '2A', 'approved', '2023-11-07 15:31:35'),
(140, 45, 105, 2, '2B', '2B', 'approved', '2023-11-07 15:31:57'),
(141, 46, 106, 2, '2B', '2B', 'approved', '2023-11-07 15:33:29'),
(142, 46, 107, 2, '2B', '2B', 'approved', '2023-11-07 15:33:56'),
(143, 47, 108, 2, '2A', '2A', 'approved', '2023-11-07 15:37:09'),
(144, 47, 109, 2, '2B', '2B', 'approved', '2023-11-07 15:37:34'),
(145, 47, 110, 2, '2B', '2A', 'approved', '2023-11-07 15:37:56'),
(146, 48, 111, 2, '2A', '2A', 'approved', '2023-11-07 15:39:27'),
(147, 48, 112, 1, '1B', '1B', 'approved', '2023-11-07 15:40:56'),
(148, 48, 113, 1, '1B', '1A', 'approved', '2023-11-07 15:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_id` int(11) NOT NULL,
  `bus_num` int(11) NOT NULL,
  `pickup_num` varchar(2) NOT NULL,
  `pickup_name` varchar(55) NOT NULL,
  `pickup_time` time NOT NULL,
  `dropoff_num` varchar(2) NOT NULL,
  `dropoff_name` varchar(55) NOT NULL,
  `dropoff_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_id`, `bus_num`, `pickup_num`, `pickup_name`, `pickup_time`, `dropoff_num`, `dropoff_name`, `dropoff_time`) VALUES
(1, 1, '1A', 'Corner of Panorama and  Marabou Road', '06:22:00', '1A', 'Corner of Panorama and Marabou Road', '14:30:00'),
(2, 1, '1B', 'Corner of Kolgansstraat and Skimmerstraat', '06:30:00', '1B', 'Corner of Kolgansstraat and Skimmerstraat', '14:39:00'),
(3, 2, '2A', 'Corner of Reddersburg Street and Mafeking Drive', '06:25:00', '2A', 'Corner of Reddersburg Street and Mafeking Drive', '14:25:00'),
(4, 2, '2B', 'Corner of Theuns van Niekerkstraat and Roosmarynstraat', '06:35:00', '2B', 'Corner of Theuns van Niekerkstraat and Roosmarynstraat', '14:30:00'),
(5, 3, '3A', 'Corner of Jasper Drive and Tieroog Street', '06:20:00', '3A', 'Corner of Jasper Drive and Tieroog Street', '14:30:00'),
(6, 3, '3B', 'Corner of Louise Street and Von Willich Drive', '06:40:00', '3B', 'Corner of Louise Street and Von Willich Drive', '14:40:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learner`
--
ALTER TABLE `learner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_id`),
  ADD KEY `busNum` (`bus_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `learner`
--
ALTER TABLE `learner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `learner`
--
ALTER TABLE `learner`
  ADD CONSTRAINT `learner_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`bus_num`) REFERENCES `bus` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
