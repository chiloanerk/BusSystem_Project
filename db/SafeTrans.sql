-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2023 at 10:02 PM
-- Server version: 10.5.22-MariaDB
-- PHP Version: 8.2.11

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
(68, 28, 'Nelson', 'Nelson', 11234556, 6),
(69, 28, 'Max', 'Musk', 1823994, 5),
(70, 28, 'Steve', 'John', 1928, 3),
(71, 28, 'Thandi', 'Musk', 912, 3),
(72, 28, 'Khumo', 'Chiloane', 19221, 1),
(73, 30, 'Lando', 'Norris', 192, 4),
(74, 32, 'Samu', 'Seete', 193348, 8),
(75, 32, 'Tebogo', 'Seete', 320230, 4),
(76, 33, 'Bongani', 'Fassie', 19228383, 3),
(77, 33, 'James', 'Fassie', 929338, 9);

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
(28, 'Elon', 'Musk', '1234', 'musk@mail.com', 11234567),
(29, 'Steve', 'Komphela', '1234', 'steve@gmail.com', 981033),
(30, 'Zach', 'Brown', '1234', 'zach@mail.com', 1229393),
(31, 'Manny', 'Pacquao', '1234', 'manny@mail.com', 112923),
(32, 'Thembi', 'Seete', '1234', 'thembis@mail.com', 1239404),
(33, 'Brenda', 'Fassie', '1234', 'branda@mail.com', 728339440);

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
(103, 28, 68, 1, '1A', '1B', 'pending', '2023-10-27 21:02:04'),
(104, 28, 69, 1, '', '1A', 'approved', '2023-10-27 21:02:46'),
(105, 28, 70, 3, '3B', '3B', 'approved', '2023-10-31 16:56:45'),
(106, 28, 71, 2, '2A', '2A', 'approved', '2023-10-31 17:45:16'),
(107, 28, 72, 3, '', '3B', 'approved', '2023-10-25 16:18:11'),
(108, 30, 73, 1, '1A', '1B', 'approved', '2023-11-04 19:59:12'),
(109, 32, 74, 1, '1A', '', 'approved', '2023-11-04 20:11:52'),
(110, 32, 75, 2, '2A', '2A', 'approved', '2023-11-04 20:16:48'),
(111, 33, 76, 1, '1A', '1A', 'approved', '2023-11-06 21:36:45'),
(112, 33, 77, 2, '2B', '2B', 'approved', '2023-11-06 22:34:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

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
