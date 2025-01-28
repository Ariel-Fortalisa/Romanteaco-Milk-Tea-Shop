-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 02:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `romanteaco`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `log_id` int(122) NOT NULL,
  `activity` varchar(244) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`log_id`, `activity`, `date`, `time`) VALUES
(120, 'Admin updated the description of BBQ from 500g to 500gs', '2023-10-18', '00:15:22'),
(121, 'Admin updated the description of BBQ from 500gs to 500g', '2023-10-18', '00:52:41'),
(122, 'Admin updated the quantity of BBQ from 232 to 233', '2023-10-19', '12:18:23'),
(123, 'Admin updated the expiration date of Black Forest from 2023-09-14 to 2023-09-28', '2023-10-21', '20:11:01'),
(124, 'Admin updated the expiration date of Black Forest from 2023-09-28 to 2023-10-31', '2023-10-21', '20:11:52'),
(125, 'Admin added 12 pack of Choco Nuts Deez Nutz', '2023-10-22', '14:51:00'),
(126, 'Admin updated the quantity of Choco Nuts from 12 to 55', '2023-10-22', '14:51:14'),
(127, 'Admin updated the expiration date of Choco Nuts from 2025-09-09 to 2022-09-09', '2023-10-22', '14:51:42'),
(128, 'Admin updated the expiration date of Choco Nuts from 2022-09-09 to 2023-09-09', '2023-10-22', '14:52:45'),
(129, 'Admin updated the expiration date of Choco Nuts from 2023-09-09 to 2023-12-09', '2023-10-22', '14:53:16'),
(130, 'Admin added 12 pack of Lego Legos', '2023-10-22', '14:53:46'),
(131, 'Admin permanently deleted 12 pack of Lego with a measurement of Legos', '2023-10-22', '14:55:44'),
(132, 'Admin permanently deleted 55 pack of Choco Nuts with a measurement of Deez Nutz', '2023-10-22', '14:59:07'),
(133, 'Admin updated the quantity of Matcha from 45 to 55', '2023-10-22', '15:02:15'),
(140, 'Admin updated the quantity of Matcha from 55 to 33', '2023-10-22', '15:09:08'),
(141, 'Admin added 1 pack of 1 1', '2023-10-22', '15:09:17'),
(142, 'Admin permanently deleted 1 pack of 1 with a measurement of 1', '2023-10-22', '15:09:29'),
(143, 'Admin updated the quantity of  from  to  and Admin updated the description of  from  to  and Admin updated the expiration date of  from  to ', '2023-10-22', '15:09:29'),
(144, 'Admin added 1 pack of 1 100', '2023-10-22', '15:11:34'),
(145, 'Admin permanently deleted 1 pack of 1 with a measurement of 100', '2023-10-22', '15:11:42'),
(146, 'Admin updated the quantity of  from  to  and Admin updated the description of  from  to  and Admin updated the expiration date of  from  to ', '2023-10-22', '15:11:42'),
(147, 'Admin added 1 pack of 1 1', '2023-10-22', '15:12:21'),
(148, 'Admin permanently deleted 1 pack of 1 with a measurement of 1', '2023-10-22', '15:12:26'),
(149, 'Admin updated the quantity of  from  to  and Admin updated the description of  from  to  and Admin updated the expiration date of  from  to ', '2023-10-22', '15:12:26'),
(150, 'Admin added 1 pack of 1 1', '2023-10-22', '15:14:52'),
(151, 'Admin updated the quantity of 1 from 1 to 2', '2023-10-22', '15:14:59'),
(152, 'Admin permanently deleted 2 pack of 1 with a measurement of 1', '2023-10-22', '15:15:05'),
(153, 'Admin added 111 pack of aa 111', '2023-10-22', '15:16:25'),
(154, 'Admin updated the quantity of aaqwe from 111 to 12 and Admin updated the description of aaqwe from 111 to 12', '2023-10-22', '15:16:34'),
(155, 'Admin updated the quantity of aaqwe from 12 to 1231', '2023-10-22', '15:16:40'),
(156, 'Admin permanently deleted 1231 pack of aaqwe with a measurement of 12', '2023-10-22', '15:16:46'),
(157, 'Admin updated the expiration date of Cookies & Cream from 2023-09-10 to 2025-01-10', '2023-10-23', '11:52:51'),
(158, 'Admin updated the expiration date of Taro from 2023-09-10 to 2024-02-10', '2023-10-23', '11:53:02'),
(159, 'Admin updated the expiration date of Mango Cheesecake from 2023-09-10 to 2024-04-08', '2023-10-23', '11:53:20'),
(160, 'Admin updated the expiration date of Cheese from 2023-09-16 to 2023-12-16', '2023-10-23', '11:53:35'),
(161, 'Admin updated the quantity of Cheese from 34 to 0', '2023-10-30', '11:17:23'),
(162, 'Admin updated the quantity of BBQ from 233 to 0', '2023-10-30', '11:29:14'),
(163, 'Admin updated the quantity of Cheese from 0 to 56', '2023-10-30', '11:36:24'),
(164, 'Admin updated the quantity of BBQ from 0 to 067', '2023-10-30', '11:36:38'),
(165, 'Admin updated the quantity of BBQ from 67 to 61', '2023-10-30', '11:40:28'),
(166, 'Admin updated the quantity of BBQ from 61 to 0', '2023-10-30', '11:40:51'),
(167, 'Admin updated the expiration date of Cheese from 2023-12-16 to 2024-07-10', '2023-12-29', '11:15:28'),
(168, 'Admin updated the expiration date of BBQ from 2023-09-10 to 2024-03-27', '2023-12-29', '11:15:41'),
(169, 'Admin updated the expiration date of Sour & Cream from 2023-11-25 to 2024-08-28', '2023-12-29', '11:15:50'),
(170, 'Admin updated the expiration date of Okinawa from 2023-09-10 to 2024-02-15', '2023-12-29', '11:15:57'),
(171, 'Admin updated the expiration date of Red Velvet from 2023-09-10 to 2024-08-29', '2023-12-29', '11:16:07'),
(172, 'Admin updated the expiration date of Wintermelon from 2023-12-10 to 2024-09-11', '2023-12-29', '11:16:25'),
(173, 'Admin added 123 pack of dasd 100pcs', '2023-12-29', '12:46:57'),
(174, 'Admin updated the expiration date of dasd from  to \'2024-02-09\'', '2023-12-29', '12:52:48'),
(175, 'Admin updated the expiration date of dasd from 2024-02-09 to NULL', '2023-12-29', '12:52:58'),
(176, 'Admin updated the expiration date of Cheese from 2024-07-10 to NULL', '2023-12-29', '12:53:05'),
(177, 'Admin updated the expiration date of Cheese from  to \'2024-05-31\'', '2023-12-29', '12:53:14'),
(178, 'Admin permanently deleted 123 pack of dasd with a measurement of 100pcs', '2023-12-29', '12:53:21'),
(179, 'Admin updated the expiration date of BBQ from Mar. 27, 2024 to \'2024-04-05\'', '2023-12-30', '09:36:50'),
(180, 'Admin updated the expiration date of BBQ from Apr. 05, 2024 to \'2024-04-05\'', '2023-12-30', '09:41:52'),
(181, 'Admin updated the expiration date of Okinawa from N/A to Jun. 27, 2024', '2024-01-02', '09:37:15'),
(182, 'Admin updated the expiration date of Okinawa from Jun. 27, 2024 to Jun. 27, 2024', '2024-01-02', '09:38:19'),
(183, 'Admin updated the expiration date of Sour & Cream from Aug. 28, 2024 to May. 08, 2024', '2024-01-02', '09:38:51'),
(184, 'Admin updated the expiration date of Okinawa from Jun. 27, 2024 to Feb. 07, 2024', '2024-01-02', '09:39:11'),
(185, 'Admin updated the expiration date of Dark Choco from Nov. 10, 2023 to Feb. 10, 2024', '2024-01-02', '09:39:26'),
(186, 'Admin updated the expiration date of Black Forest from Oct. 31, 2023 to N/A', '2024-01-02', '09:39:40'),
(187, 'Admin updated the expiration date of Black Forest from N/A to Jan. 02, 2024', '2024-01-02', '09:39:52'),
(188, 'Admin updated the expiration date of Cheese from May. 01, 2024 to May. 01, 2024', '2024-01-02', '19:41:05'),
(189, 'Admin updated the quantity of Cheese from 903 to 90 and Admin updated the expiration date of Cheese from May. 01, 2024 to May. 01, 2024', '2024-01-02', '19:41:16'),
(190, 'Admin updated the expiration date of Black Forest from Jan. 02, 2024 to Jan. 24, 2024', '2024-01-02', '19:49:31'),
(191, 'Admin updated the quantity of Matcha from 33 to 60', '2024-01-02', '19:49:42'),
(192, 'Admin updated the quantity of Wintermelon from 3 to 50', '2024-01-02', '19:49:56'),
(193, 'Admin updated the description of Cheese cake from 500g to 300g', '2024-01-02', '19:50:13'),
(194, 'Admin updated the quantity of BBQ from 0 to 56', '2024-01-07', '00:34:17'),
(195, 'Admin updated the quantity of Okinawa from 0 to 50', '2024-01-07', '11:04:49'),
(196, 'Admin updated the quantity of BBQ from 56 to 0', '2024-01-07', '19:07:26'),
(197, 'Admin updated the quantity of BBQ from 0 to 50', '2024-01-09', '21:53:39'),
(198, 'Admin updated the expiration date of Black Forest from Jan. 24, 2024 to May. 24, 2024', '2024-01-13', '23:51:13'),
(199, 'Admin updated the expiration date of Matcha from Feb. 17, 2024 to N/A', '2024-01-17', '20:07:46'),
(200, 'Admin updated the expiration date of Matcha from N/A to Sep. 26, 2024', '2024-01-17', '20:07:57'),
(201, 'Admin updated the quantity of Sour & Cream from 44 to 0', '2024-01-21', '00:31:13'),
(202, 'Admin updated the quantity of Sour & Cream from 0 to 20', '2024-01-21', '00:31:25'),
(203, 'Admin added 123 pack of LOOLS 30g', '2024-01-21', '00:50:24'),
(204, 'Admin updated the cost of Cheese from 10 to 22', '2024-01-21', '00:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs_addons`
--

CREATE TABLE `activity_logs_addons` (
  `log_id` int(233) NOT NULL,
  `activity` varchar(233) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs_addons`
--

INSERT INTO `activity_logs_addons` (`log_id`, `activity`, `date`, `time`) VALUES
(11, 'Admin updated the expiration date of Black Pearl from 2023-09-19 to 2023-12-29', '2023-10-21', '20:12:28'),
(12, 'Admin updated the expiration date of Coffee Jelly from 2023-09-19 to 2024-07-02', '2023-10-21', '20:12:41'),
(13, 'Admin updated the expiration date of Nata de Coco from 2023-09-19 to 2023-12-13', '2023-10-21', '20:12:53'),
(14, 'Admin added 12 pack of 121 with a price of 12, and a measurement of 12', '2023-10-22', '15:19:35'),
(15, 'Admin permanently deleted 12 pack of 1w with a price of 12, and a measurement of 12', '2023-10-22', '15:20:18'),
(16, 'Admin added 1 pack of 1 with a price of 1, and a measurement of 1', '2023-10-22', '15:21:57'),
(17, 'Admin updated the expiration date of 1 from 1111-11-11 to 2025-11-11', '2023-10-22', '15:22:04'),
(18, 'Admin permanently deleted 1 pack of 1 with a price of 1, and a measurement of 1', '2023-10-22', '15:22:08'),
(19, 'Admin updated the expiration date of Egg Puding from 2023-09-19 to 2023-12-28', '2023-10-23', '11:01:44'),
(20, 'Admin updated the quantity of Coffee Jelly from 12 to 120', '2023-12-16', '19:39:26'),
(21, 'Admin updated the quantity of Black Pearl from 232 to 100', '2023-12-16', '19:39:33'),
(22, 'Admin updated the expiration date of Black Pearl from 2023-12-29 to 2024-03-01', '2023-12-29', '12:08:44'),
(23, 'Admin updated the expiration date of Nata de Coco from 2023-12-13 to 2024-08-07', '2023-12-29', '12:08:59'),
(24, 'Admin added 123 pack of opop with a price of 12, and a measurement of 100pcs', '2023-12-29', '13:04:17'),
(25, 'Admin updated the expiration date of opop from  to \'2024-03-08\'', '2023-12-29', '13:05:03'),
(26, 'Admin updated the expiration date of opop from 2024-03-08 to NULL', '2023-12-29', '13:05:14'),
(27, 'Admin permanently deleted 123 pack of opop with a price of 12, and a measurement of 100pcs', '2023-12-29', '13:05:20'),
(28, 'Admin updated the expiration date of Black Pearl from Mar. 01, 2024 to \'2024-03-16\'', '2023-12-30', '09:42:30'),
(29, 'Admin updated the expiration date of Black Pearl from Mar. 16, 2024 to \'2024-03-29\'', '2024-01-02', '18:39:59'),
(30, 'Admin updated the expiration date of Egg Puding from Dec. 28, 2023 to Feb. 02, 2024', '2024-01-02', '19:00:03'),
(32, 'Admin updated the quantity of Black Pearl from 90 to 100', '2024-01-02', '19:33:31'),
(33, 'Admin updated the quantity of Nata de Coco from 443 to 400', '2024-01-02', '19:33:48'),
(34, 'Admin updated the expiration date of Egg Puding from Feb. 02, 2024 to Feb. 28, 2024', '2024-01-02', '19:34:11'),
(35, 'Admin updated the quantity of Black Pearl from 100 to 0', '2024-01-07', '00:36:32'),
(36, 'Admin updated the quantity of Black Pearl from 0 to 100', '2024-01-07', '00:38:18'),
(37, 'Admin updated the expiration date of Black Pearl from Mar. 29, 2024 to Mar. 12, 2024', '2024-01-07', '19:08:25'),
(38, 'Admin added 100 pack of add ons with a price of 20, and a measurement of 100pcs', '2024-01-11', '23:48:59'),
(39, 'Admin permanently deleted 100 pack of add ons with a price of 20, and a measurement of 100pcs', '2024-01-13', '23:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs_m`
--

CREATE TABLE `activity_logs_m` (
  `log_id` int(122) NOT NULL,
  `activity` varchar(233) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs_m`
--

INSERT INTO `activity_logs_m` (`log_id`, `activity`, `date`, `time`) VALUES
(144, 'Admin updated the description of Combo cups from 100pcs to 100pc', '2023-10-18', '00:14:59'),
(145, 'Admin updated the description of Fries from 500g to 500pcs', '2023-10-19', '18:01:50'),
(146, 'Admin updated the quantity of Egg from 55 to 0', '2023-10-22', '15:40:04'),
(147, 'Admin updated the quantity of Egg from 0 to 120', '2023-10-22', '19:18:25'),
(148, 'Admin updated the quantity of Melted Cheese from 44 to 0', '2023-10-22', '19:18:36'),
(149, 'Admin updated the quantity of Melted Cheese from 0 to 45', '2023-10-22', '19:20:21'),
(150, 'Admin updated the quantity of Hotdog Buns from 33 to 0', '2023-10-22', '19:20:36'),
(151, 'Admin updated the quantity of Egg from 120 to 0', '2023-10-22', '19:22:41'),
(152, 'Admin updated the quantity of Hotdog Buns from 0 to 79', '2023-10-22', '19:25:12'),
(153, 'Admin updated the quantity of Egg from 0 to 233', '2023-10-22', '19:28:51'),
(154, 'Admin updated the quantity of Melted Cheese from 45 to 0', '2023-10-22', '19:43:09'),
(161, 'Admin added 1 pack of a with a measurement of 1', '2023-10-22', '14:32:32'),
(162, 'Admin permanently deleted 1 pack of a with a measurement of 1', '2023-10-22', '14:32:41'),
(163, 'Admin added 1 pack of a with a measurement of 1', '2023-10-22', '14:33:30'),
(164, 'Admin updated the quantity of a from 1 to 22', '2023-10-22', '14:33:38'),
(165, 'Admin permanently deleted 22 pack of a with a measurement of 1', '2023-10-22', '14:33:47'),
(166, 'Admin added 12 pack of sds with a measurement of 12', '2023-10-22', '14:34:35'),
(167, 'Admin added 12 pack of sdad with a measurement of 12', '2023-10-22', '14:37:59'),
(170, 'Admin permanently deleted 12 pack of sdad with a measurement of 12', '2023-10-22', '14:41:33'),
(175, 'Admin permanently deleted 23 pack of lllll with a measurement of 12', '2023-10-22', '15:03:28'),
(176, 'Admin updated the expiration date of Plastic cup L from 2023-09-09 to 2024-02-07', '2023-10-23', '11:55:08'),
(177, 'Admin updated the expiration date of Plastic cup M from 2023-09-09 to 2023-12-28', '2023-10-23', '11:55:19'),
(178, 'Admin updated the quantity of Paper cup M from 0 to 200', '2023-10-24', '09:04:36'),
(179, 'Admin updated the quantity of Plastic cup M from 21 to 0', '2023-10-28', '06:54:02'),
(180, 'Admin updated the quantity of Plastic cup M from 0 to 234', '2023-10-30', '07:18:28'),
(181, 'Admin updated the quantity of Plastic cup L from 34 to 20', '2023-10-30', '11:14:27'),
(182, 'Admin updated the quantity of Plastic cup L from 20 to 0', '2023-10-30', '11:15:48'),
(183, 'Admin updated the quantity of Plastic cup M from 234 to 0', '2023-10-30', '11:26:34'),
(184, 'Admin updated the quantity of Plastic cup L from 0 to 23', '2023-10-30', '11:27:23'),
(185, 'Admin updated the quantity of Plastic cup M from 0 to 89', '2023-10-30', '11:36:13'),
(186, 'Admin updated the quantity of Plastic cup M from 89 to 0', '2023-10-30', '11:39:33'),
(187, 'Admin updated the expiration date of Paper cup M from 2023-09-09 to 2024-09-09', '2023-12-13', '17:15:25'),
(188, 'Admin updated the expiration date of Footlong from 2023-11-17 to 2025-01-04', '2023-12-13', '17:15:52'),
(189, 'Admin updated the expiration date of Hotdog from 2023-11-17 to 2024-01-17', '2023-12-15', '20:25:28'),
(190, 'Admin updated the quantity of Egg from 233 to 100', '2023-12-16', '19:37:46'),
(191, 'Admin updated the quantity of Ham from 44 to 20', '2023-12-16', '19:38:01'),
(192, 'Admin updated the expiration date of Patty from 2023-11-17 to 2024-11-17', '2023-12-16', '19:38:13'),
(193, 'Admin updated the expiration date of Plastic cup M from 2023-12-28 to 2024-01-09', '2023-12-29', '10:20:39'),
(194, 'Admin updated the expiration date of Plastic cup M from  to 2024-01-09', '2023-12-29', '10:22:01'),
(195, 'Admin updated the expiration date of Plastic cup M from  to 2024-01-09', '2023-12-29', '10:34:21'),
(196, 'Admin updated the expiration date of Ham from 2024-02-17 to 2024-08-28', '2023-12-29', '10:55:05'),
(197, 'Admin updated the expiration date of Melted Cheese from 2024-01-17 to 2024-05-02', '2023-12-29', '10:55:31'),
(198, 'Admin updated the expiration date of Siomai from 2024-01-17 to 2024-05-07', '2023-12-29', '10:55:41'),
(199, 'Admin updated the expiration date of Patty from 2024-11-17 to NULL', '2023-12-29', '11:31:02'),
(200, 'Admin updated the expiration date of Patty from  to NULL', '2023-12-29', '11:32:43'),
(201, 'Admin added 8 pack of dasd with a measurement of jj', '2023-12-29', '11:36:09'),
(202, 'Admin updated the expiration date of dasd from  to \'2024-03-01\'', '2023-12-29', '11:36:32'),
(203, 'Admin updated the expiration date of dasd from 2024-03-01 to \'2024-08-30\'', '2023-12-29', '11:36:51'),
(204, 'Admin permanently deleted 8 pack of dasd with a measurement of jj', '2023-12-29', '11:36:59'),
(205, 'Admin updated the expiration date of Patty from  to \'2024-08-09\'', '2023-12-29', '11:37:19'),
(206, 'Admin updated the expiration date of Patty from 2024-08-09 to \'2024-08-14\'', '2023-12-29', '11:38:43'),
(207, 'Admin updated the expiration date of Patty from 2024-08-14 to \'2024-08-15\'', '2023-12-29', '11:40:01'),
(208, 'Admin added 12 pack of dasd with a measurement of 100pcs', '2023-12-29', '11:40:11'),
(209, 'Admin updated the expiration date of dasd from  to \'2024-03-29\'', '2023-12-29', '11:40:23'),
(210, 'Admin permanently deleted 12 pack of dasd with a measurement of 100pcs', '2023-12-29', '11:40:31'),
(211, 'Admin updated the expiration date of Patty from 2024-08-15 to \'2024-08-29\'', '2023-12-30', '08:12:54'),
(212, 'Admin updated the expiration date of Patty from Aug. 29, 2024 to \'2024-08-29\'', '2023-12-30', '08:22:50'),
(213, 'Admin updated the expiration date of Patty from Aug. 29, 2024 to \'2024-08-29\'', '2023-12-30', '08:26:56'),
(214, 'Admin updated the expiration date of Hotdog from Jan. 17, 2024 to \'2024-02-02\'', '2023-12-30', '08:27:14'),
(215, 'Admin updated the expiration date of Hotdog from Feb. 02, 2024 to ', '2023-12-30', '08:31:24'),
(218, 'Admin updated the expiration date of Footlong Buns from Feb. 09, 2024 to \'2024-02-09\'', '2023-12-30', '08:33:46'),
(219, 'Admin updated the expiration date of Footlong Buns from Feb. 09, 2024 to \'2024-02-09\'', '2023-12-30', '08:35:22'),
(220, 'Admin updated the expiration date of Footlong Buns from Feb. 09, 2024 to \'2024-02-09\'', '2023-12-30', '08:35:44'),
(221, 'Admin updated the expiration date of Footlong Buns from Feb. 09, 2024 to \'2024-02-09\'', '2023-12-30', '08:45:46'),
(223, 'Admin updated the expiration date of Footlong Buns from Feb. 09, 2024 to \'2024-02-09\'', '2023-12-30', '08:50:26'),
(224, 'Admin updated the expiration date of Cheese Sticks from Feb. 17, 2024 to \'2024-03-08\'', '2023-12-30', '08:50:55'),
(225, 'Admin updated the expiration date of Egg from Feb. 17, 2024 to \'2024-03-09\'', '2023-12-30', '08:55:48'),
(226, 'Admin updated the expiration date of Egg from Mar. 09, 2024 to \'2024-03-09\'', '2023-12-30', '09:11:03'),
(227, 'Admin updated the expiration date of Egg from Mar. 09, 2024 to \'2024-03-09\'', '2023-12-30', '09:33:46'),
(228, 'Admin updated the expiration date of Egg from Mar. 09, 2024 to \'2024-03-09\'', '2023-12-30', '09:36:35'),
(229, 'Admin updated the expiration date of Fries from Dec. 17, 2023 to \'2024-03-01\'', '2024-01-02', '09:14:34'),
(230, 'Admin updated the expiration date of Hotdog from Feb. 02, 2024 to \'2024-03-07\'', '2024-01-02', '09:14:44'),
(231, 'Admin updated the expiration date of Fries from Mar. 01, 2024 to \'2024-03-28\'', '2024-01-02', '09:17:35'),
(232, 'Admin updated the expiration date of Plastic cup M from Jan. 01, 1970 to \'2024-02-01\'', '2024-01-02', '09:17:51'),
(233, 'Admin updated the expiration date of Plastic cup M from Feb. 01, 2024 to NULL', '2024-01-02', '09:18:32'),
(234, 'Admin updated the expiration date of Plastic cup M from Jan. 01, 1970 to Jan. 01, 1970', '2024-01-02', '09:20:31'),
(235, 'Admin updated the expiration date of Hotdog from Mar. 07, 2024 to Jan. 01, 1970', '2024-01-02', '09:25:27'),
(236, 'Admin updated the expiration date of Patty from Aug. 29, 2024 to NULL', '2024-01-02', '09:27:23'),
(237, 'Admin updated the expiration date of Patty from Jan. 01, 1970 to Jan. 01, 1970', '2024-01-02', '09:29:41'),
(238, 'Admin updated the expiration date of Hotdog from Jan. 01, 1970 to Sep. 01, 2025', '2024-01-02', '09:29:54'),
(239, 'Admin updated the expiration date of Hotdog from Sep. 01, 2025 to Sep. 01, 2025', '2024-01-02', '09:31:05'),
(240, 'Admin updated the expiration date of Hotdog from Sep. 01, 2025 to N/A', '2024-01-02', '09:31:12'),
(241, 'Admin updated the expiration date of Hotdog from Jan. 01, 1970 to Jan. 18, 2024', '2024-01-02', '09:31:31'),
(242, 'Admin updated the expiration date of Combo cups from N/A to Jan. 03, 2024', '2024-01-02', '09:33:19'),
(243, 'Admin updated the expiration date of Combo cups from Jan. 03, 2024 to Jan. 03, 2024', '2024-01-02', '09:36:39'),
(244, 'Admin updated the expiration date of Patty from N/A to Jun. 06, 2024', '2024-01-02', '09:36:49'),
(245, 'Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '09:45:15'),
(246, 'Admin added 1 pack of a with a measurement of 1', '2024-01-02', '09:46:17'),
(248, 'Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '17:59:11'),
(249, 'Admin updated the expiration date of Plastic cup M from N/A to Feb. 09, 2024', '2024-01-02', '17:59:26'),
(250, 'Admin updated the expiration date of Plastic cup M from Feb. 09, 2024 to Feb. 09, 2024', '2024-01-02', '18:07:37'),
(251, 'Admin updated the expiration date of Plastic cup M from Feb. 09, 2024 to N/A', '2024-01-02', '18:07:43'),
(252, 'Admin permanently deleted 1 pack of a with a measurement of 1', '2024-01-02', '10:07:55'),
(253, 'Admin updated the expiration date of Buns from Jan. 17, 2024 to Jan. 19, 2024', '2024-01-02', '18:36:16'),
(254, 'Admin updated the quantity of Patty from 33 to 50 . Admin updated the expiration date of Patty from Jun. 06, 2024 to Jun. 06, 2024', '2024-01-02', '19:02:03'),
(257, 'Admin updated the quantity of Ham from 20 to 50 . Admin updated the expiration date of Ham from Aug. 28, 2024 to Aug. 28, 2024', '2024-01-02', '19:08:50'),
(258, 'Admin updated the expiration date of Ham from Aug. 28, 2024 to Aug. 28, 2024', '2024-01-02', '19:17:31'),
(259, 'Admin added 123 pack of asd with a measurement of 500pcs', '2024-01-02', '19:17:43'),
(260, 'Admin permanently deleted 123 pack of asd with a measurement of 500pcs', '2024-01-02', '19:17:53'),
(261, 'Admin updated the quantity of Ham from 50 to 100 . Admin updated the expiration date of Ham from Aug. 28, 2024 to Aug. 28, 2024', '2024-01-02', '19:18:07'),
(262, 'Admin updated the expiration date of Ham from Aug. 28, 2024 to Aug. 28, 2024', '2024-01-02', '19:19:36'),
(263, 'Admin updated the quantity of Plastic cup M from 0 to 1 . Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:20:03'),
(264, 'Admin updated the quantity of Plastic cup M from 1 to 2 . Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:21:26'),
(265, 'Admin updated the quantity of Plastic cup M from 2 to 3 . Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:22:40'),
(266, 'Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:23:02'),
(267, 'Admin updated the quantity of Plastic cup M from 3 to 4 . Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:23:22'),
(268, 'Admin updated the quantity of Combo cups from 861 to 860', '2024-01-02', '19:24:02'),
(269, 'Admin updated the quantity of Plastic cup M from 4 to 5 . Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:24:14'),
(270, 'Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:24:26'),
(271, 'Admin updated the quantity of Plastic cup M from 5 to 6 . Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:25:19'),
(272, 'Admin updated the quantity of Plastic cup M from 6 to 4 . Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:25:52'),
(273, 'Admin updated the quantity of Plastic cup M from 4 to 7 . Admin updated the expiration date of Plastic cup M from N/A to N/A', '2024-01-02', '19:26:19'),
(274, 'Admin updated the quantity of Plastic cup M from 7 to 3', '2024-01-02', '19:30:02'),
(275, 'Admin updated the expiration date of Plastic cup M from N/A to Sep. 09, 2025', '2024-01-02', '19:30:20'),
(276, 'Admin updated the quantity of Plastic cup M from 3 to 4', '2024-01-02', '19:30:28'),
(277, 'Admin updated the expiration date of Plastic cup M from Sep. 09, 2025 to N/A', '2024-01-02', '19:31:16'),
(278, 'Admin updated the description of Footlong from 30pcs to 300pcs', '2024-01-02', '19:31:35'),
(279, 'Admin updated the description of Footlong from 300pcs to 30pcs', '2024-01-02', '19:31:54'),
(280, 'Admin updated the quantity of Plastic cup M from 4 to 0', '2024-01-02', '19:34:34'),
(281, 'Admin updated the expiration date of Hotdog Buns from Mar. 17, 2024 to Apr. 17, 2024', '2024-01-02', '19:34:48'),
(282, 'Admin updated the quantity of Hotdog from 44 to 0', '2024-01-06', '20:17:36'),
(283, 'Admin updated the quantity of Hotdog from 0 to 50', '2024-01-06', '20:19:14'),
(284, 'Admin updated the quantity of Hotdog from 50 to 0', '2024-01-06', '20:23:13'),
(285, 'Admin updated the quantity of Hotdog from 0 to 50', '2024-01-06', '20:25:37'),
(286, 'Admin updated the quantity of Hotdog from 50 to 0', '2024-01-06', '22:03:59'),
(287, 'Admin updated the quantity of Hotdog from 0 to 50', '2024-01-06', '22:04:21'),
(288, 'Admin updated the quantity of Hotdog from 50 to 0', '2024-01-06', '23:31:47'),
(289, 'Admin updated the quantity of Hotdog from 0 to 50', '2024-01-06', '23:32:18'),
(290, 'Admin updated the quantity of Hotdog from 50 to 0', '2024-01-06', '23:33:10'),
(291, 'Admin updated the quantity of Hotdog from 0 to 50', '2024-01-06', '23:33:32'),
(292, 'Admin updated the quantity of Combo cups from 860 to 0', '2024-01-06', '23:37:51'),
(293, 'Admin updated the quantity of Plastic cup L from 23 to 0', '2024-01-06', '23:39:23'),
(294, 'Admin updated the quantity of Hotdog from 50 to 0', '2024-01-06', '23:43:50'),
(295, 'Admin updated the quantity of Hotdog from 0 to 12', '2024-01-06', '23:45:56'),
(296, 'Admin updated the quantity of Hotdog from 12 to 0', '2024-01-06', '23:50:03'),
(297, 'Admin updated the quantity of Hotdog from 0 to 12', '2024-01-06', '23:52:34'),
(298, 'Admin updated the quantity of Hotdog from 12 to 0', '2024-01-06', '23:53:37'),
(299, 'Admin updated the quantity of Hotdog from 0 to 23', '2024-01-06', '23:57:42'),
(300, 'Admin updated the quantity of Hotdog from 23 to 0', '2024-01-06', '23:58:39'),
(301, 'Admin updated the quantity of Hotdog from 0 to 12', '2024-01-07', '00:08:56'),
(302, 'Admin updated the quantity of Hotdog from 12 to 0', '2024-01-07', '00:09:19'),
(303, 'Admin updated the quantity of Hotdog from 0 to 123', '2024-01-07', '00:12:08'),
(304, 'Admin updated the quantity of Hotdog from 123 to 0', '2024-01-07', '00:14:04'),
(305, 'Admin updated the quantity of Hotdog from 0 to 45', '2024-01-07', '00:21:05'),
(306, 'Admin updated the quantity of Hotdog from 45 to 0', '2024-01-07', '00:21:41'),
(307, 'Admin updated the quantity of Hotdog from 0 to 56', '2024-01-07', '00:23:12'),
(308, 'Admin updated the quantity of Hotdog from 56 to 0', '2024-01-07', '00:28:12'),
(309, 'Admin updated the quantity of Hotdog from 0 to 12', '2024-01-07', '00:28:31'),
(310, 'Admin updated the quantity of Hotdog from 12 to 0', '2024-01-07', '00:33:40'),
(311, 'Admin updated the quantity of Combo cups from 0 to 56', '2024-01-07', '00:34:53'),
(312, 'Admin updated the quantity of Plastic cup M from 0 to 100', '2024-01-07', '00:36:06'),
(313, 'Admin updated the quantity of Plastic cup L from 0 to 50', '2024-01-07', '00:36:12'),
(314, 'Admin updated the quantity of Hotdog from 0 to 59', '2024-01-07', '00:50:08'),
(315, 'Admin updated the expiration date of Combo cups from Jan. 03, 2024 to Jun. 21, 2024', '2024-01-07', '11:04:26'),
(316, 'Admin updated the quantity of Plastic cup M from 100 to 19', '2024-01-07', '19:05:23'),
(317, 'Admin updated the quantity of Plastic cup M from 19 to 0', '2024-01-07', '19:06:06'),
(318, 'Admin updated the quantity of Paper cup M from 200 to 0', '2024-01-08', '17:34:31'),
(319, 'Admin updated the quantity of Plastic cup L from 50 to 0', '2024-01-08', '17:35:11'),
(320, 'Admin updated the quantity of Paper cup L  from 234 to 90', '2024-01-08', '17:35:53'),
(321, 'Admin updated the expiration date of Combo cups from Jun. 21, 2024 to Jun. 19, 2024', '2024-01-08', '17:36:35'),
(322, 'Admin updated the quantity of Plastic cup M from 0 to 100', '2024-01-08', '17:43:48'),
(323, 'Admin updated the quantity of Plastic cup L from 0 to 90', '2024-01-08', '17:43:54'),
(324, 'Admin updated the quantity of Paper cup M from 0 to 50', '2024-01-08', '17:44:01'),
(325, 'Admin updated the quantity of Plastic cup M from 100 to 0', '2024-01-08', '19:44:12'),
(326, 'Admin updated the quantity of Paper cup L  from 90 to 0', '2024-01-08', '19:44:38'),
(327, 'Admin updated the quantity of Plastic cup M from 0 to 21', '2024-01-08', '19:45:14'),
(328, 'Admin updated the quantity of Plastic cup M from 21 to 17', '2024-01-08', '19:45:29'),
(329, 'Admin updated the quantity of Plastic cup M from 17 to 0', '2024-01-08', '19:45:37'),
(330, 'Admin updated the quantity of Paper cup M from 50 to 90', '2024-01-08', '19:46:02'),
(331, 'Admin updated the quantity of Plastic cup L from 90 to 0', '2024-01-08', '20:20:56'),
(332, 'Admin updated the quantity of Plastic cup M from 0 to 44', '2024-01-08', '20:21:41'),
(333, 'Admin updated the quantity of Plastic cup M from 44 to 0', '2024-01-09', '17:59:12'),
(334, 'Admin updated the quantity of Plastic cup M from 0 to 34', '2024-01-09', '17:59:37'),
(335, 'Admin updated the quantity of Plastic cup L from 0 to 45', '2024-01-09', '18:00:18'),
(336, 'Admin updated the expiration date of Combo cups from Jun. 19, 2024 to Jun. 23, 2024', '2024-01-09', '18:01:01'),
(337, 'Admin updated the quantity of Plastic cup M from 34 to 0', '2024-01-09', '18:37:05'),
(338, 'Admin updated the quantity of Paper cups XL from 0 to 56', '2024-01-09', '18:37:53'),
(339, 'Admin updated the quantity of Plastic cup M from 0 to 90', '2024-01-09', '21:53:24'),
(340, 'Admin updated the quantity of Hotdog from 59 to 100', '2024-01-17', '14:43:53'),
(341, 'Admin updated the cost of Plastic cup M from  to 15', '2024-01-20', '18:34:01'),
(342, 'Admin updated the cost of Plastic cup M from 15 to 10', '2024-01-20', '18:34:40'),
(343, 'Admin added 309 pieces of LMAO', '2024-01-20', '18:35:33'),
(344, 'Admin updated the quantity of Plastic cup M from 90 to 91', '2024-01-21', '00:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `add_ons_id` int(11) NOT NULL,
  `add_id` int(122) NOT NULL,
  `product_id` int(11) NOT NULL,
  `add_ons_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_ons`
--

INSERT INTO `add_ons` (`add_ons_id`, `add_id`, `product_id`, `add_ons_name`, `status`, `price`) VALUES
(1, 1, 41, 'Black Pearl', 'available', 10),
(2, 2, 41, 'Nata de Coco', 'available', 10),
(3, 3, 41, 'Coffee Jelly', 'available', 10),
(4, 4, 41, 'Egg Pudding', 'available', 15),
(5, 1, 42, 'Black Pearl', 'available', 10),
(6, 2, 42, 'Nata de Coco', 'available', 10),
(7, 3, 42, 'Coffee Jelly', 'available', 10),
(8, 4, 42, 'Egg Pudding', 'available', 15),
(9, 1, 43, 'Black Pearl', 'available', 10),
(10, 2, 43, 'Nata de Coco', 'available', 10),
(11, 3, 43, 'Coffee Jelly', 'available', 10),
(12, 4, 43, 'Egg Pudding', 'available', 15);

-- --------------------------------------------------------

--
-- Table structure for table `add_ons1`
--

CREATE TABLE `add_ons1` (
  `add_id` int(233) NOT NULL,
  `name` varchar(233) NOT NULL,
  `price` int(233) NOT NULL,
  `quantity` int(122) NOT NULL,
  `cost` int(11) NOT NULL,
  `measurement` varchar(233) NOT NULL,
  `status` varchar(233) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `expiration_status` varchar(233) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_ons1`
--

INSERT INTO `add_ons1` (`add_id`, `name`, `price`, `quantity`, `cost`, `measurement`, `status`, `expiration_date`, `expiration_status`, `date`, `time`) VALUES
(1, 'Black Pearl', 10, 100, 10, '300g', 'available', '2024-03-12', 'NEARLY EXPIRED', '2023-09-19', '18:57:05'),
(2, 'Nata de Coco', 10, 400, 10, '300g', 'available', '2024-08-07', 'GOOD', '2023-09-19', '18:57:05'),
(3, 'Coffee Jelly', 10, 120, 10, '100g', 'available', '2024-07-02', 'GOOD', '2023-09-19', '18:57:05'),
(4, 'Egg Puding', 15, 2, 10, '100g', 'available', '2024-02-28', 'NEARLY EXPIRED', '2023-09-19', '18:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(233) NOT NULL,
  `fname` varchar(233) NOT NULL,
  `lname` varchar(233) NOT NULL,
  `email` varchar(233) NOT NULL,
  `phone` varchar(122) NOT NULL,
  `password` varchar(233) NOT NULL,
  `image` varchar(233) NOT NULL,
  `code` int(100) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `image`, `code`, `status`) VALUES
(1, 'Roman', 'Integro', 'romanteaco.01@gmail.com', '09083889381', '$2y$10$B0HDkGRO6ZU/2eBevkomqe2HhGU0jEvrzNwmIQhi51x0asjx59Gdm', 'admin_profile/admin.png', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_logo`) VALUES
(1, 'Milk Tea', 'images/milktea.png'),
(2, 'Burger / Footlong ', 'images/burger_footlong.png'),
(3, 'Fries ', 'images/fries.png'),
(4, 'Combo Meal', 'images/combo_meal.png'),
(5, 'Iced coffee', 'images/ice coffee.png'),
(6, 'Fruit tea', 'images/fruit-tea.png'),
(38, 'Pizza', 'images/pizza.png');

-- --------------------------------------------------------

--
-- Table structure for table `flavor`
--

CREATE TABLE `flavor` (
  `flavor_id` int(11) NOT NULL,
  `flavor_num` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `flavor_name` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flavor`
--

INSERT INTO `flavor` (`flavor_id`, `flavor_num`, `product_id`, `flavor_name`, `status`) VALUES
(1, 4, 1, 'Okinawa', 'available'),
(2, 6, 1, 'Wintermelon', 'available'),
(3, 4, 2, 'Okinawa', 'available'),
(4, 6, 2, 'Wintermelon', 'available'),
(5, 4, 3, 'Okinawa', 'available'),
(6, 6, 3, 'Wintermelon', 'available'),
(19, 5, 4, 'Red Velvet', 'unavailable'),
(70, 1, 15, 'Cheese', 'available'),
(71, 2, 15, 'BBQ', 'available'),
(72, 3, 15, 'Sour & Cream', 'available'),
(73, 1, 16, 'Cheese', 'available'),
(74, 2, 16, 'BBQ', 'available'),
(75, 3, 16, 'Sour & Cream', 'available'),
(79, 1, 18, 'Cheese', 'available'),
(80, 2, 18, 'BBQ', 'available'),
(81, 3, 18, 'Sour & Cream', 'available'),
(82, 1, 17, 'Cheese', 'available'),
(83, 2, 17, 'BBQ', 'available'),
(84, 3, 17, 'Sour & Cream', 'available'),
(85, 1, 19, 'Cheese', 'available'),
(86, 2, 19, 'BBQ', 'available'),
(87, 3, 19, 'Sour & Cream', 'available'),
(97, 1, 23, 'Cheese', 'available'),
(98, 2, 23, 'BBQ', 'available'),
(99, 3, 23, 'Sour & Cream', 'available'),
(100, 1, 20, 'Cheese', 'available'),
(101, 2, 20, 'BBQ', 'available'),
(102, 3, 20, 'Sour & Cream', 'available'),
(103, 1, 21, 'Cheese', 'available'),
(104, 2, 21, 'BBQ', 'available'),
(105, 3, 21, 'Sour & Cream', 'available'),
(106, 1, 22, 'Cheese', 'available'),
(107, 2, 22, 'BBQ', 'available'),
(108, 3, 22, 'Sour & Cream', 'available'),
(120, 4, 35, 'Okinawa', 'available'),
(121, 7, 35, 'Taro', 'available'),
(122, 5, 35, 'Red Velvet', 'unavailable'),
(123, 11, 35, 'Black Forest', 'available'),
(124, 9, 35, 'Cookies & Cream', 'available'),
(125, 6, 35, 'Wintermelon', 'available'),
(126, 10, 35, 'Dark Choco', 'available'),
(127, 8, 35, 'Mango Cheesecake', 'available'),
(128, 4, 36, 'Okinawa', 'available'),
(129, 6, 36, 'Wintermelon', 'available'),
(130, 10, 36, 'Dark Choco', 'available'),
(131, 9, 36, 'Cookies & Cream', 'available'),
(132, 5, 36, 'Red Velvet', 'unavailable'),
(144, 1, 14, 'Cheese', 'available'),
(145, 2, 14, 'BBQ', 'available'),
(146, 3, 14, 'Sour & Cream', 'available'),
(173, 82, 43, 'Matcha', 'available'),
(174, 7, 43, 'Taro', 'available'),
(175, 81, 43, 'Cheese cake', 'available'),
(176, 4, 43, 'Okinawa', 'available'),
(177, 5, 43, 'Red Velvet', 'unavailable'),
(178, 6, 43, 'Wintermelon', 'available'),
(179, 10, 43, 'Dark Choco', 'available'),
(180, 11, 43, 'Black Forest', 'available'),
(200, 1, 13, 'Cheese', 'available'),
(201, 2, 13, 'BBQ', 'available'),
(202, 3, 13, 'Sour & Cream', 'available'),
(242, 4, 41, 'Okinawa', 'available'),
(243, 7, 41, 'Taro', 'available'),
(244, 5, 41, 'Red Velvet', 'unavailable'),
(245, 11, 41, 'Black Forest', 'available'),
(246, 9, 41, 'Cookies & Cream', 'available'),
(247, 6, 41, 'Wintermelon', 'available'),
(248, 10, 41, 'Dark Choco', 'available'),
(249, 8, 41, 'Mango Cheesecake', 'available'),
(252, 9, 51, 'Cookies & Cream', 'available'),
(253, 10, 51, 'Dark Choco', 'available'),
(254, 0, 53, '', 'available'),
(263, 4, 42, 'Okinawa', 'available'),
(264, 6, 42, 'Wintermelon', 'available'),
(265, 10, 42, 'Dark Choco', 'available'),
(266, 9, 42, 'Cookies & Cream', 'available'),
(267, 5, 42, 'Red Velvet', 'unavailable'),
(268, 81, 42, 'Cheese cake', 'available'),
(269, 11, 42, 'Black Forest', 'available'),
(270, 7, 42, 'Taro', 'available'),
(272, 0, 54, '', 'available'),
(274, 0, 55, '', 'available'),
(276, 0, 56, '', 'available'),
(278, 0, 57, '', 'available'),
(280, 0, 58, '', 'available'),
(281, 0, 59, '', 'available'),
(283, 0, 60, '', 'available'),
(284, 0, 61, '', 'available'),
(285, 0, 62, '', 'available'),
(286, 1, 65, 'Cheese', 'available'),
(287, 3, 65, 'Sour & Cream', 'available'),
(288, 8, 66, 'Mango Cheesecake', 'available'),
(289, 4, 71, 'Okinawa', 'available'),
(290, 4, 72, 'Okinawa', 'available'),
(291, 4, 73, 'Okinawa', 'available'),
(292, 4, 74, 'Okinawa', 'available'),
(293, 4, 75, 'Okinawa', 'available'),
(294, 2, 80, 'BBQ', 'available'),
(296, 3, 83, 'Sour & Cream', 'available'),
(297, 5, 83, 'Red Velvet', 'unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `flavorings`
--

CREATE TABLE `flavorings` (
  `flavor_num` int(233) NOT NULL,
  `flavor_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `measurement` varchar(122) DEFAULT NULL,
  `status` varchar(233) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `expiration_status` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flavorings`
--

INSERT INTO `flavorings` (`flavor_num`, `flavor_name`, `quantity`, `cost`, `measurement`, `status`, `expiration_date`, `expiration_status`) VALUES
(1, 'Cheese', 90, 22, '500g', 'available', '2024-05-01', 'GOOD'),
(2, 'BBQ', 50, 10, '500g', 'available', '2024-04-05', 'NEARLY EXPIRED'),
(3, 'Sour & Cream', 20, 10, '500g', 'available', '2024-05-08', 'GOOD'),
(4, 'Okinawa', 50, 10, '500g', 'available', '2024-02-15', 'NEARLY EXPIRED'),
(5, 'Red Velvet', 0, 10, '500g', 'unavailable', '2024-08-29', 'GOOD'),
(6, 'Wintermelon', 50, 10, '500g', 'available', '2024-09-11', 'GOOD'),
(7, 'Taro', 4, 10, '500g', 'available', '2024-02-10', 'NEARLY EXPIRED'),
(8, 'Mango Cheesecake', 4, 10, '500g', 'available', '2024-04-08', 'NEARLY EXPIRED'),
(9, 'Cookies & Cream', 4, 10, '500g', 'available', '2025-01-10', 'GOOD'),
(10, 'Dark Choco', 33, 10, '500g', 'available', '2024-02-10', 'NEARLY EXPIRED'),
(11, 'Black Forest', 3, 10, '500g', 'available', '2024-05-24', 'GOOD'),
(81, 'Cheese cake', 34, 10, '300g', 'available', '2024-01-17', 'EXPIRED'),
(82, 'Matcha', 60, 10, '500g', 'available', '2024-09-26', 'GOOD'),
(93, 'LOOLS', 123, 12, '30g', 'available', NULL, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(233) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `measurement` varchar(122) DEFAULT NULL,
  `status` varchar(233) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `expiration_status` varchar(122) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `material_name`, `quantity`, `cost`, `measurement`, `status`, `expiration_date`, `expiration_status`) VALUES
(2, 'Plastic cup M', 91, 10, '100pcs', 'available', NULL, 'N/A'),
(3, 'Plastic cup L', 45, 12, '100pcs', 'available', NULL, 'N/A'),
(4, 'Paper cup M', 90, 12, '100pcs', 'available', NULL, 'N/A'),
(5, 'Paper cup L ', 0, 12, '100pcs', 'unavailable', NULL, 'N/A'),
(6, 'Paper cups XL', 56, 12, '100pcs', 'available', NULL, 'N/A'),
(7, 'Combo cups', 56, 12, '100pcs', 'available', '2024-06-23', 'GOOD'),
(8, 'Patty', 50, 12, '100pcs', 'available', '2024-06-06', 'GOOD'),
(10, 'Hotdog', 100, 12, '30pcs', 'available', '2024-01-18', 'EXPIRED'),
(11, 'Footlong', 33, 12, '30pcs', 'available', '2025-01-04', 'GOOD'),
(78, 'Fries', 333, 12, NULL, 'available', '2024-03-28', 'NEARLY EXPIRED'),
(80, 'Buns', 34, 12, NULL, 'available', '2024-01-19', 'EXPIRED'),
(81, 'Egg', 100, 12, NULL, 'available', '2024-03-09', 'NEARLY EXPIRED'),
(82, 'Melted Cheese', 0, 12, NULL, 'unavailable', '2024-05-02', 'GOOD'),
(83, 'Ham', 100, 12, NULL, 'available', '2024-08-28', 'GOOD'),
(84, 'Hotdog Buns', 79, 12, NULL, 'available', '2024-04-17', 'NEARLY EXPIRED'),
(85, 'Footlong Buns', 33, 12, NULL, 'available', '2024-02-09', 'NEARLY EXPIRED'),
(86, 'Shanghai', 44, 12, NULL, 'available', '2024-02-17', 'NEARLY EXPIRED'),
(87, 'Cheese Sticks', 55, 12, NULL, 'available', '2024-03-08', 'NEARLY EXPIRED'),
(88, 'Siomai', 45, 12, NULL, 'available', '2024-05-07', 'GOOD'),
(100, 'LMAO', 309, 13, NULL, 'available', NULL, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `material_usage`
--

CREATE TABLE `material_usage` (
  `usage_id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material_usage`
--

INSERT INTO `material_usage` (`usage_id`, `order_item_id`, `material_id`, `qty`, `cost`) VALUES
(17, 9, 2, 3, 10),
(18, 10, 3, 6, 12),
(19, 11, 2, 1, 10),
(20, 12, 4, 1, 12),
(21, 12, 78, 1, 12),
(22, 13, 80, 3, 12),
(23, 13, 81, 3, 12),
(24, 14, 80, 2, 12),
(25, 14, 81, 2, 12),
(26, 16, 2, 2, 10),
(27, 17, 4, 1, 12),
(28, 17, 8, 1, 12),
(29, 17, 78, 1, 12),
(30, 17, 80, 1, 12),
(31, 18, 3, 2, 12),
(32, 18, 78, 2, 12),
(33, 19, 2, 2, 10),
(34, 20, 2, 3, 10),
(35, 21, 8, 1, 12),
(36, 21, 80, 1, 12),
(37, 22, 10, 2, 12),
(38, 22, 84, 2, 12),
(39, 23, 2, 4, 10),
(40, 24, 7, 1, 12),
(41, 24, 11, 1, 12),
(42, 24, 78, 1, 12),
(43, 25, 4, 1, 12),
(44, 25, 10, 1, 12),
(45, 25, 78, 1, 12),
(46, 25, 84, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `size_id`, `order_name`, `quantity`, `subtotal`) VALUES
(7, 5, 5, 900, 'Regular burger   ', 2, 70),
(8, 5, 14, 836, 'Fries Overload Cheese Large ', 1, 85),
(9, 6, 109, 1026, 'AAAA  Small ', 1, 12),
(10, 6, 109, 1027, 'AAAA  Medium ', 2, 68),
(11, 7, 26, 840, 'Coffee Crumble  Medium ', 1, 35),
(12, 7, 14, 835, 'Fries Overload Cheese Medium ', 1, 65),
(13, 8, 7, 755, 'Egg Sandwich   ', 3, 135),
(14, 9, 7, 755, 'Egg Sandwich   ', 2, 90),
(15, 10, 107, 1020, 'Hawaiin Pizza   ', 2, 240),
(16, 11, 26, 840, 'Coffee Crumble  Medium ', 2, 70),
(17, 12, 20, 789, '(C1) Burger + Fries w/ Juice Cheese  ', 1, 65),
(18, 13, 14, 836, 'Fries Overload Cheese Large ', 2, 170),
(19, 14, 41, 891, 'Classic Milktea Okinawa Medium ', 2, 56),
(20, 14, 41, 891, 'Classic Milktea Black Forest Medium ', 3, 84),
(21, 14, 5, 900, 'Regular burger   ', 1, 35),
(22, 14, 10, 760, 'Hotdog Frank   ', 2, 130),
(23, 14, 25, 842, 'Cappuccino  Medium ', 4, 140),
(24, 14, 16, 780, '(K2) Fries w/ Drinks + 2pcs Hotdog Cheese  ', 1, 45),
(25, 14, 22, 791, '(C3) Hotdog Frank + Fries w/ Juice Cheese  ', 1, 75);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dining_option` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `estimated_arrival` time DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `user_id`, `user_name`, `email`, `dining_option`, `total`, `payment_method`, `screenshot`, `estimated_arrival`, `status`, `date`, `time`, `notif`) VALUES
(5, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 155, 'Cash', 'screenshots/', NULL, 4, '2023-01-21', '19:33:57', 2),
(6, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 80, 'Cash', 'screenshots/', NULL, 4, '2024-01-20', '19:33:58', 0),
(7, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 100, 'Cash', 'screenshots/', NULL, 4, '2024-01-21', '03:36:53', 1),
(8, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 135, 'Cash', 'screenshots/394714525_322218487234222_1317678856861763961_n.jpg', NULL, 4, '2024-01-22', '18:46:33', 1),
(9, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 90, 'Cash', 'screenshots/', NULL, 4, '2024-01-22', '18:46:31', 1),
(10, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 240, 'GCash', 'screenshots/394714525_322218487234222_1317678856861763961_n.jpg', NULL, 4, '2024-01-22', '18:46:28', 0),
(11, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 70, 'GCash', 'screenshots/mjv5inc9tlaa1.png', '19:54:00', 4, '2024-01-22', '18:56:47', 0),
(12, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 65, 'GCash', 'screenshots/dubidubidapdap.jpg', NULL, 4, '2024-01-22', '18:58:58', 0),
(13, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 170, 'Cash', 'screenshots/', NULL, 4, '2024-01-22', '20:57:20', 0),
(14, 300000059, 'Darren', 'renorcajada@gmail.com', 'Dine-in', 565, 'Cash', 'screenshots/', NULL, 4, '2024-01-22', '21:03:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_list1`
--

CREATE TABLE `order_list1` (
  `id` int(233) NOT NULL,
  `name` varchar(233) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `material_id` int(233) DEFAULT NULL,
  `size_name` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`size_id`, `product_id`, `material_id`, `size_name`, `status`, `price`) VALUES
(755, 7, NULL, NULL, 'available', 45),
(759, 9, NULL, NULL, 'available', 85),
(760, 10, NULL, NULL, 'available', 65),
(762, 11, NULL, NULL, 'available', 45),
(763, 12, NULL, NULL, 'available', 80),
(779, 15, NULL, NULL, 'available', 35),
(780, 16, NULL, NULL, 'available', 45),
(782, 18, NULL, NULL, 'available', 45),
(783, 17, NULL, NULL, 'available', 45),
(784, 19, NULL, NULL, 'available', 45),
(788, 23, NULL, NULL, 'available', 85),
(789, 20, NULL, NULL, 'available', 65),
(790, 21, NULL, NULL, 'unavailable', 70),
(791, 22, NULL, NULL, 'available', 75),
(835, 14, NULL, 'Medium', 'available', 65),
(836, 14, NULL, 'Large', 'available', 85),
(837, 14, NULL, 'X-Large', 'available', 125),
(838, 24, NULL, 'Medium', 'available', 35),
(839, 24, NULL, 'Large', 'available', 45),
(840, 26, NULL, 'Medium', 'available', 35),
(841, 26, NULL, 'Large', 'available', 45),
(842, 25, NULL, 'Medium', 'available', 35),
(843, 25, NULL, 'Large', 'available', 45),
(844, 27, NULL, 'Medium', 'available', 35),
(845, 27, NULL, 'Large', 'available', 45),
(846, 28, NULL, 'Medium', 'available', 28),
(847, 28, NULL, 'Large', 'available', 38),
(848, 29, NULL, 'Medium', 'available', 28),
(849, 29, NULL, 'Large', 'available', 38),
(850, 30, NULL, 'Medium', 'available', 28),
(851, 30, NULL, 'Large', 'available', 38),
(852, 31, NULL, 'Medium', 'available', 28),
(853, 31, NULL, 'Large', 'available', 38),
(854, 32, NULL, 'Medium', 'available', 28),
(855, 32, NULL, 'Large', 'available', 38),
(862, 43, NULL, 'Medium', 'available', 49),
(863, 43, NULL, 'Large', 'available', 59),
(871, 13, NULL, 'Medium', 'available', 45),
(872, 13, NULL, 'Large', 'unavailable', 65),
(873, 13, NULL, 'X-Large', 'available', 105),
(891, 41, NULL, 'Medium', 'available', 28),
(892, 41, NULL, 'Large', 'available', 38),
(899, 6, NULL, '', 'unavailable', 45),
(900, 5, NULL, '', 'available', 35),
(908, 8, NULL, '', 'unavailable', 65),
(912, 42, NULL, 'Medium', 'available', 39),
(913, 42, NULL, 'Large', 'available', 49),
(924, 59, NULL, '', 'available', 90),
(927, 60, NULL, '', 'available', 100),
(928, 61, NULL, '', 'available', 70),
(930, 63, NULL, '', 'available', 120),
(931, 64, NULL, '4444', 'available', 1111),
(932, 65, NULL, '11', 'available', 11),
(933, 66, NULL, 'q2', 'available', 1323),
(938, 71, NULL, '333', 'available', 333),
(939, 72, NULL, '333', 'available', 333),
(940, 73, NULL, '333', 'available', 333),
(941, 74, NULL, '333', 'available', 333),
(942, 75, NULL, '333', 'available', 333),
(944, 76, NULL, '1234', 'available', 123),
(947, 78, NULL, '', 'available', 100),
(960, 80, NULL, '', 'available', 120),
(963, 83, NULL, '', 'available', 100),
(964, 84, NULL, '', 'available', 70),
(965, 85, NULL, '', 'available', 130),
(966, 67, NULL, 'Medium', 'available', 120),
(967, 67, NULL, 'Large', 'available', 200),
(968, 68, NULL, 'Medium', 'available', 120),
(969, 68, NULL, 'Large', 'available', 200),
(970, 69, NULL, 'Medium', 'available', 200),
(971, 69, NULL, 'Large', 'available', 260),
(974, 70, NULL, 'Medium', 'available', 200),
(975, 70, NULL, 'Large', 'available', 260),
(976, 77, NULL, 'Medium', 'available', 250),
(977, 77, NULL, 'Large', 'available', 320),
(978, 81, NULL, '', 'available', 70),
(980, 82, NULL, '', 'available', 60),
(981, 86, NULL, '', 'available', 123),
(982, 87, NULL, '', 'available', 200),
(983, 88, NULL, 'Medium', 'available', 120),
(984, 88, NULL, 'Large', 'available', 320),
(985, 89, NULL, 'Medium', 'available', 120),
(986, 89, NULL, 'Large', 'available', 320),
(987, 90, NULL, 'Medium', 'available', 120),
(988, 90, NULL, 'Large', 'available', 320),
(989, 91, NULL, 'Medium', 'available', 120),
(990, 91, NULL, 'Large', 'available', 320),
(991, 92, NULL, 'Medium', 'available', 120),
(992, 92, NULL, 'Large', 'available', 320),
(993, 93, NULL, 'Medium', 'available', 120),
(994, 93, NULL, 'Large', 'available', 320),
(995, 94, NULL, 'Medium', 'available', 120),
(996, 94, NULL, 'Large', 'available', 320),
(997, 95, NULL, 'Medium', 'available', 120),
(998, 95, NULL, 'Large', 'available', 320),
(999, 96, NULL, 'Medium', 'available', 120),
(1000, 96, NULL, 'Large', 'available', 320),
(1001, 97, NULL, 'Medium', 'available', 120),
(1002, 97, NULL, 'Large', 'available', 320),
(1003, 98, NULL, 'Medium', 'available', 120),
(1004, 98, NULL, 'Large', 'available', 320),
(1005, 99, NULL, 'Medium', 'available', 120),
(1006, 99, NULL, 'Large', 'available', 320),
(1007, 100, NULL, 'Medium', 'available', 120),
(1008, 100, NULL, 'Large', 'available', 320),
(1009, 101, NULL, 'Medium', 'available', 120),
(1010, 101, NULL, 'Large', 'available', 320),
(1011, 102, NULL, 'Medium', 'available', 120),
(1012, 102, NULL, 'Large', 'available', 320),
(1013, 103, NULL, 'Medium', 'available', 120),
(1014, 103, NULL, 'Large', 'available', 320),
(1015, 104, NULL, 'Medium', 'available', 120),
(1016, 104, NULL, 'Large', 'available', 320),
(1017, 105, NULL, 'Medium', 'available', 120),
(1018, 106, NULL, 'Medium', 'available', 120),
(1019, 106, NULL, 'Large', 'available', 320),
(1020, 107, NULL, 'Medium', 'available', 120),
(1021, 108, NULL, '', 'unavailable', 300),
(1026, 109, NULL, 'Small', 'available', 12),
(1027, 109, NULL, 'Medium', 'available', 34);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `material_id` int(122) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `material_id`, `category_id`, `sub_category_id`, `image_name`, `archive`) VALUES
(5, 'Regular burger', 0, 2, 1, 'images/reg_burger.png', 0),
(6, 'Cheese burger', 0, 2, 1, 'images/cheese_burger.png', 0),
(7, 'Egg Sandwich', 0, 2, 1, 'images/egg_sandwich.png', 0),
(8, 'Egg & Cheese Burger', 0, 2, 1, 'images/egg_cheese_burger.png', 0),
(9, 'Ham & Egg Burger', 0, 2, 1, 'images/ham_egg_burger.png', 0),
(10, 'Hotdog Frank', 0, 2, 1, 'images/hotdog_frank.png', 0),
(11, 'Solo Footlong', 0, 2, 2, 'images/footlong.png', 0),
(12, 'Double Footlong', 0, 2, 2, 'images/double_footlong.png', 0),
(13, 'Regular Fries', 0, 3, 6, 'images/reg_fries.png', 0),
(14, 'Fries Overload', 0, 3, 6, 'images/fries_overload.png', 0),
(15, '(K1) Fries w/ Drinks', 0, 3, 7, 'images/K1.png', 0),
(16, '(K2) Fries w/ Drinks + 2pcs Hotdog', 0, 3, 7, 'images/k2.png', 0),
(17, '(K3) Fries w/ Drinks + 3pcs Shanghai', 0, 3, 7, 'images/k3.png', 0),
(18, '(K4) Fries w/ Drinks + 4pcs Cheese sticks', 0, 3, 7, 'images/k4.png', 0),
(19, '(K5) Fries w/ Drinks + 3pcs Siomai', 0, 3, 7, 'images/k5.png', 0),
(20, '(C1) Burger + Fries w/ Juice', 0, 4, 8, 'images/c1.png', 0),
(21, '(C2) Cheese Burger + Fries w/ Juice', 0, 4, 8, 'images/c2.png', 0),
(22, '(C3) Hotdog Frank + Fries w/ Juice', 0, 4, 8, 'images/c3.png', 0),
(23, '(C4) Footlong + Fries w/ Juice', 0, 4, 8, 'images/c4.png', 0),
(24, 'Iced Mocha', 0, 5, 9, 'images/iced_mocha.png', 0),
(25, 'Cappuccino', 0, 5, 9, 'images/cappuccino.png', 0),
(26, 'Coffee Crumble', 0, 5, 9, 'images/coffee_crum.png', 0),
(27, 'Caramel Macchiato', 0, 5, 9, 'images/caramel.png', 0),
(28, 'Blue Lemonade', 0, 6, 10, 'images/blue_lemo.png', 0),
(29, 'Green Citrus', 0, 6, 10, 'images/green_cit.png', 0),
(30, 'Red Berry', 0, 6, 10, 'images/red_ber.png', 0),
(31, 'Pineapple Burst', 0, 6, 10, 'images/pine_bur.png', 0),
(32, 'Burst Lemonade', 0, 6, 10, 'images/burst_lemo.png', 0),
(41, 'Classic Milktea', 0, 1, 3, 'images/classic_milktea.png', 0),
(42, 'Nutella Milktea', 0, 1, 4, 'images/nutella_milktea.png', 0),
(43, 'Oreo Milktea', 0, 1, 5, 'images/oreo_milktea.png', 0),
(77, 'All Cheese Pizza', 0, 27, 72, 'images/all cheese.png', 1),
(81, 'Chicken Burger', 0, 2, 1, 'images/chicken_burger.png', 1),
(82, 'Veggie Burger', 0, 2, 1, 'images/veggie_burger.png', 1),
(106, 'Peperoni Pizza', NULL, 38, 92, 'images/peperoni.png', 0),
(107, 'Hawaiin Pizza', NULL, 38, 92, 'images/hawaiian.png', 0),
(108, 'LMAOS', NULL, 1, 3, 'images/57cu55.jpg', 1),
(109, 'AAAA', 0, 1, 3, 'images/00095.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `size_materials`
--

CREATE TABLE `size_materials` (
  `s_m_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size_materials`
--

INSERT INTO `size_materials` (`s_m_id`, `size_id`, `material_id`, `qty`) VALUES
(1, 723, 2, 1),
(2, 724, 5, 1),
(3, 725, 2, 1),
(4, 726, 5, 1),
(5, 727, 2, 1),
(6, 728, 5, 1),
(7, 729, 1, 1),
(8, 730, 2, 1),
(9, 731, 1, 1),
(10, 732, 2, 1),
(11, 734, 1, 1),
(12, 735, 2, 1),
(13, 736, 12, 1),
(14, 737, 1, 1),
(15, 738, 1, 1),
(16, 738, 2, 1),
(17, 738, 3, 1),
(18, 738, 4, 1),
(19, 739, 1, 1),
(20, 739, 2, 1),
(21, 739, 3, 1),
(22, 739, 4, 1),
(23, 741, 1, 1),
(24, 741, 2, 1),
(25, 741, 3, 1),
(26, 741, 4, 1),
(27, 742, 1, 1),
(28, 742, 2, 1),
(29, 742, 3, 1),
(30, 742, 4, 1),
(31, 743, 1, 1),
(32, 743, 2, 1),
(33, 743, 3, 1),
(34, 743, 12, 1),
(35, 743, 78, 1),
(36, 743, 79, 1),
(37, 744, 1, 1),
(38, 744, 2, 1),
(39, 744, 3, 1),
(40, 744, 4, 1),
(41, 745, 1, 1),
(42, 745, 2, 1),
(43, 745, 3, 1),
(44, 745, 8, 1),
(45, 745, 10, 1),
(46, 745, 12, 1),
(47, 745, 78, 1),
(48, 745, 79, 1),
(49, 746, 6, 1),
(50, 747, 8, 1),
(51, 748, 8, 1),
(52, 748, 80, 1),
(53, 748, 81, 1),
(54, 749, 8, 1),
(55, 749, 80, 1),
(56, 749, 81, 1),
(57, 750, 8, 1),
(58, 750, 80, 1),
(59, 750, 81, 1),
(60, 751, 8, 1),
(61, 751, 80, 1),
(62, 751, 81, 1),
(63, 752, 8, 1),
(64, 752, 80, 1),
(65, 752, 81, 1),
(66, 753, 8, 1),
(67, 753, 80, 1),
(68, 753, 81, 1),
(69, 754, 8, 1),
(70, 754, 80, 1),
(71, 754, 81, 1),
(72, 754, 82, 1),
(73, 755, 80, 1),
(74, 755, 81, 1),
(75, 756, 8, 1),
(76, 756, 80, 1),
(77, 756, 81, 1),
(78, 756, 82, 1),
(79, 757, 8, 1),
(80, 757, 80, 1),
(81, 757, 81, 1),
(82, 757, 82, 1),
(83, 758, 8, 1),
(84, 758, 80, 1),
(85, 758, 81, 1),
(86, 759, 8, 1),
(87, 759, 80, 1),
(88, 759, 81, 1),
(89, 759, 83, 1),
(90, 760, 10, 1),
(91, 760, 84, 1),
(92, 761, 11, 1),
(93, 761, 85, 1),
(94, 762, 11, 1),
(95, 762, 85, 1),
(96, 763, 11, 1),
(97, 763, 85, 1),
(98, 764, 4, 1),
(99, 764, 78, 1),
(100, 767, 4, 1),
(101, 767, 78, 1),
(102, 770, 7, 1),
(103, 770, 78, 1),
(104, 771, 7, 1),
(105, 771, 11, 1),
(106, 771, 78, 1),
(107, 772, 81, 1),
(108, 773, 7, 1),
(109, 773, 78, 1),
(110, 773, 86, 1),
(111, 775, 7, 1),
(112, 775, 78, 1),
(113, 775, 87, 1),
(114, 776, 7, 1),
(115, 776, 78, 1),
(116, 777, 7, 1),
(117, 777, 78, 1),
(118, 777, 88, 1),
(119, 778, 7, 1),
(120, 778, 78, 1),
(121, 779, 7, 1),
(122, 779, 78, 1),
(123, 780, 7, 1),
(124, 780, 11, 1),
(125, 780, 78, 1),
(126, 781, 7, 1),
(127, 781, 78, 1),
(128, 781, 86, 1),
(129, 782, 7, 1),
(130, 782, 78, 1),
(131, 782, 87, 1),
(132, 783, 7, 1),
(133, 783, 78, 1),
(134, 783, 86, 1),
(135, 784, 7, 1),
(136, 784, 78, 1),
(137, 784, 88, 1),
(138, 785, 8, 1),
(139, 785, 78, 1),
(140, 785, 80, 1),
(141, 786, 8, 1),
(142, 786, 78, 1),
(143, 786, 80, 1),
(144, 786, 82, 1),
(145, 787, 10, 1),
(146, 787, 78, 1),
(147, 787, 84, 1),
(148, 788, 4, 1),
(149, 788, 11, 1),
(150, 788, 78, 1),
(151, 788, 85, 1),
(152, 789, 4, 1),
(153, 789, 8, 1),
(154, 789, 78, 1),
(155, 789, 80, 1),
(156, 790, 4, 1),
(157, 790, 8, 1),
(158, 790, 78, 1),
(159, 790, 80, 1),
(160, 790, 82, 1),
(161, 791, 4, 1),
(162, 791, 10, 1),
(163, 791, 78, 1),
(164, 791, 84, 1),
(165, 792, 2, 1),
(166, 794, 2, 1),
(167, 796, 2, 1),
(168, 800, 2, 1),
(169, 802, 2, 1),
(170, 804, 2, 1),
(171, 806, 2, 1),
(172, 808, 2, 1),
(173, 810, 82, 1),
(174, 811, 82, 1),
(175, 812, 2, 1),
(176, 814, 2, 1),
(177, 816, 12, 1),
(178, 818, 10, 1),
(179, 818, 11, 1),
(180, 818, 12, 1),
(181, 820, 82, 1),
(182, 821, 83, 1),
(183, 822, 81, 1),
(184, 823, 82, 1),
(185, 823, 83, 1),
(186, 824, 81, 1),
(187, 825, 81, 1),
(188, 825, 82, 1),
(189, 825, 83, 1),
(190, 826, 4, 1),
(191, 826, 78, 1),
(192, 827, 5, 1),
(193, 827, 78, 1),
(194, 828, 6, 1),
(195, 828, 78, 1),
(196, 829, 81, 1),
(197, 830, 80, 1),
(198, 830, 81, 1),
(199, 830, 82, 1),
(200, 830, 83, 1),
(201, 831, 81, 1),
(202, 832, 80, 1),
(203, 832, 81, 1),
(204, 832, 82, 1),
(205, 832, 83, 1),
(206, 833, 81, 1),
(207, 834, 80, 1),
(208, 834, 81, 1),
(209, 834, 82, 1),
(210, 834, 83, 1),
(211, 835, 4, 1),
(212, 835, 78, 1),
(213, 836, 3, 1),
(214, 836, 78, 1),
(215, 837, 6, 1),
(216, 837, 78, 1),
(217, 838, 2, 1),
(218, 839, 3, 1),
(219, 840, 2, 1),
(220, 841, 3, 1),
(221, 842, 2, 1),
(222, 843, 3, 1),
(223, 844, 3, 1),
(224, 846, 2, 1),
(225, 847, 3, 1),
(226, 848, 2, 1),
(227, 849, 3, 1),
(228, 850, 2, 1),
(229, 851, 3, 1),
(230, 852, 2, 1),
(231, 853, 3, 1),
(232, 854, 2, 1),
(233, 855, 3, 1),
(234, 856, 2, 1),
(235, 858, 2, 1),
(236, 860, 2, 1),
(237, 862, 2, 1),
(238, 863, 3, 1),
(239, 864, 2, 1),
(240, 865, 3, 1),
(241, 866, 2, 1),
(242, 867, 3, 1),
(243, 868, 4, 1),
(244, 868, 78, 1),
(245, 869, 5, 1),
(246, 869, 78, 1),
(247, 870, 6, 1),
(248, 870, 78, 1),
(249, 871, 4, 1),
(250, 871, 78, 1),
(251, 872, 5, 1),
(252, 872, 78, 1),
(253, 873, 6, 1),
(254, 873, 78, 1),
(255, 874, 82, 1),
(256, 876, 81, 1),
(257, 877, 82, 1),
(258, 877, 83, 1),
(259, 878, 82, 1),
(260, 879, 82, 1),
(261, 880, 78, 1),
(262, 880, 80, 1),
(263, 881, 82, 1),
(264, 882, 82, 1),
(265, 883, 2, 1),
(266, 884, 3, 1),
(267, 885, 2, 1),
(268, 886, 3, 1),
(269, 887, 2, 1),
(270, 888, 3, 1),
(271, 889, 2, 1),
(272, 890, 3, 1),
(273, 891, 2, 1),
(274, 892, 3, 1),
(275, 893, 8, 1),
(276, 893, 80, 1),
(277, 893, 81, 1),
(278, 894, 8, 1),
(279, 894, 80, 1),
(280, 894, 81, 1),
(281, 895, 8, 1),
(282, 895, 80, 1),
(283, 895, 81, 1),
(284, 896, 8, 1),
(285, 896, 80, 1),
(286, 896, 81, 1),
(287, 897, 8, 1),
(288, 897, 80, 1),
(289, 897, 81, 1),
(290, 898, 8, 1),
(291, 898, 80, 1),
(292, 898, 81, 1),
(293, 899, 8, 1),
(294, 899, 80, 1),
(295, 899, 82, 1),
(296, 900, 8, 1),
(297, 900, 80, 1),
(298, 901, 2, 1),
(299, 902, 3, 1),
(300, 903, 2, 1),
(301, 904, 3, 1),
(302, 905, 6, 1),
(303, 906, 2, 1),
(304, 907, 3, 1),
(305, 908, 8, 1),
(306, 908, 80, 1),
(307, 908, 81, 1),
(308, 908, 82, 1),
(309, 909, 3, 1),
(310, 909, 4, 1),
(311, 910, 2, 1),
(312, 911, 3, 1),
(313, 912, 2, 1),
(314, 913, 3, 1),
(315, 914, 3, 1),
(316, 914, 4, 1),
(317, 915, 3, 1),
(318, 915, 4, 1),
(319, 916, 3, 1),
(320, 916, 4, 1),
(321, 917, 3, 1),
(322, 917, 4, 1),
(323, 920, 3, 1),
(324, 920, 4, 1),
(325, 921, 3, 1),
(326, 921, 4, 1),
(327, 922, 2, 1),
(328, 922, 3, 1),
(329, 923, 2, 1),
(330, 923, 3, 1),
(331, 924, 7, 1),
(332, 925, 11, 1),
(333, 925, 80, 1),
(334, 926, 11, 1),
(335, 926, 80, 1),
(336, 927, 11, 1),
(337, 927, 80, 1),
(338, 928, 8, 1),
(339, 928, 11, 1),
(340, 928, 80, 1),
(341, 931, 2, 1),
(342, 932, 2, 1),
(343, 933, 2, 1),
(344, 933, 3, 1),
(345, 934, 81, 1),
(346, 935, 81, 1),
(347, 938, 2, 1),
(348, 939, 2, 1),
(349, 940, 2, 1),
(350, 941, 2, 1),
(351, 942, 2, 1),
(352, 948, 81, 1),
(353, 951, 81, 1),
(354, 952, 81, 1),
(355, 953, 81, 1),
(356, 956, 81, 1),
(357, 957, 81, 1),
(358, 966, 81, 1),
(359, 968, 81, 1),
(360, 1021, 2, 1),
(361, 1021, 3, 1),
(362, 1021, 4, 1),
(363, 1021, 5, 1),
(364, 1021, 6, 1),
(365, 1021, 7, 1),
(366, 1021, 8, 1),
(367, 1021, 10, 1),
(368, 1021, 11, 1),
(369, 1021, 78, 1),
(370, 1021, 80, 1),
(371, 1021, 81, 1),
(372, 1021, 82, 1),
(373, 1021, 83, 1),
(374, 1021, 84, 1),
(375, 1021, 85, 1),
(376, 1021, 86, 1),
(377, 1021, 87, 1),
(378, 1021, 88, 1),
(379, 1022, 2, 1),
(380, 1022, 4, 1),
(381, 1022, 6, 1),
(382, 1023, 2, 3),
(383, 1023, 4, 1),
(384, 1023, 6, 1),
(385, 1024, 2, 3),
(386, 1024, 4, 1),
(387, 1024, 6, 1),
(388, 1025, 3, 3),
(389, 1026, 2, 3),
(390, 1027, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`) VALUES
(1, 2, 'Buy 1 Take 1'),
(2, 2, 'Classic'),
(3, 1, 'Milktea-pid'),
(4, 1, 'Nutella-tea'),
(5, 1, 'Oreo-cream cheese'),
(6, 3, 'Fries Menu'),
(7, 3, 'K-Fries Menu'),
(8, 4, 'Classic'),
(9, 5, 'Classic'),
(10, 6, 'Classic'),
(57, 15, 'Classic'),
(58, 0, 'Classic'),
(59, 0, '456'),
(60, 0, '789'),
(61, 25, 'Classic'),
(62, 25, '123'),
(63, 25, '456'),
(64, 26, 'Classic'),
(65, 26, '12'),
(67, 26, '16'),
(68, 26, '123'),
(70, 28, 'Special'),
(72, 27, 'Overload Toppings'),
(83, 29, 'Grande'),
(84, 30, 'Grande'),
(85, 31, 'Overload Toppings'),
(86, 32, 'Overload Toppings'),
(87, 33, 'Overload Toppings'),
(88, 34, 'Overload Toppings'),
(89, 35, 'Overload Toppings'),
(90, 36, 'Overload Toppings'),
(91, 37, 'Overload Toppings'),
(92, 38, 'Overload Toppings');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `opening_hours` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gcash_qr` varchar(255) NOT NULL,
  `gcash_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `store_name`, `logo`, `email`, `opening_hours`, `address`, `contact_number`, `gcash_qr`, `gcash_number`) VALUES
(1, 'Romanteaco', 'images/Logo.png', 'romanteaco.01@gmail.com', '9:00am to 9:00pm', 'Blk 23 Lot 24 ph2. Langkiwa ', '09083889381', 'images/gcash_QR.png', '09551401347');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(100) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(100) NOT NULL,
  `status` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `fname`, `lname`, `age`, `address`, `name`, `email`, `password`, `code`, `status`, `avatar`) VALUES
(300000000, 'Ariel', 'Fortalisa', 30, 'Blk 23 Lot 24 Ph.1', 'Fort', 'arielfortalisa00@gmail.com', '$2y$10$4.MAb8VuxSRRqxRfHfH58.bSQ4G.sVhrHweVTUqBOCskyX3v0cBhO', 0, 'verified', 'user_profile/luffy.jpg'),
(300000002, 'Norielle', 'Palacios', 19, 'Blk 3 Lot 14 Ph.1', 'Norielle', 'noriellepalacios05@gmail.com', '$2y$10$NHkwVnoifRXnEBxHhkh6V.8EdEjmZ3hZBbkOm805vuSksj.w3Gn5.', 0, 'verified', 'images/profile.png'),
(300000042, 'Hussnie', 'Camar', 22, 'Blk 13 Lot 2 Ph.2', 'Hussnie', 'hussnie.camar@gmail.com', '$2y$10$Hn6.km1Sd/U7gcRAvdGSqOCOIg8fsrDZJUEt8PAxkN2yGJwE/OY/u', 0, 'verified', 'images/profile.png'),
(300000049, 'Melvin', 'Perez', 23, 'Blk 4 Lot 25 Ph.1', 'Melvin', 'melvin_perez00@gmail.com', '$2y$10$LK6ObUQ1B31Hr4EyqcLnFOQEypMijDm.xZ/UgGz3Jb4vdhHlvXPnO', 0, 'verified', 'images/profile.png'),
(300000050, 'Mark Lyod', 'Macaraeg', 23, 'Blk 10 Lot 5 Ph.3', 'Mark', 'mark_lyod@gmail.com', '$2y$10$NF1mNk4zOz0hm6jl9yIt.etNhNhe9AD90jU7LcXxD5rr1FcHxE5j.', 0, 'verified', 'user_profile/wallpaper.png'),
(300000051, 'Andre', 'Cruz', 21, 'Blk 11 Lot 12 Ph.1', 'Andre', 'andrecruz01@gmail.com', '$2y$10$YP3ki.JW0FB9ikLGfyzLYef3Z3UPZhMCprrvHvDma53QnhwpABV4G', 0, 'verified', 'images/profile.png'),
(300000052, 'Marvin', 'Macaraeg', 22, 'Blk 9 Lot 3 Ph.2', 'Marvin', 'marvin_macaraeg00@gmail.com', '$2y$10$dGI4SlAJWjx582z8WEUe3uiRwB5auQA8/RnYS0d5cMy4R8/r275Pi', 0, 'verified', 'images/profile.png'),
(300000053, 'John Oliver', 'Rabino', 22, 'Blk 33 Lot 17 Ph.1', 'Daniel', 'joliver07@gmail.com', '$2y$10$N2Q8sUWalEAxJsI88.QJ9efUdfQQf/yaBtNlBGxVomoLk600joV2W', 0, 'verified', 'images/profile.png'),
(300000059, 'Darren', 'Orcajada', 27, 'Blk 12 Lot 5 Ph.1 ', 'Darren', 'renorcajada@gmail.com', '$2y$10$1lVY17PcgPs2f.BuQVOEXuflrP28DOXr.0/.Pja3bBjHZCTkCehbW', 0, 'verified', 'user_profile/admin.png'),
(300000070, 'Billy Joe', 'Reyes', 23, 'Blk 21 Lot 21 ph.2', 'Billy', 'billyreyes21@gmail.com', '$2y$10$WMzVv1ArtVLipy6ogP7Pl.IpxAXh5y6bYi1NCoWJg5YW98oN7gjBi', 0, 'verified', 'images/profile.png'),
(300000071, 'Lawrence', 'Duka', 25, 'Blk 1 Lot 20 ph.1', 'Lawrence', 'lawrence_duka01@gmail.com', '$2y$10$w7nMKYeim7A6JPHQfC85M.d9T/9t28QF2ngrsXKSqnrdDp81oa4yW', 0, 'verified', 'user_profile/boy.jpg'),
(300000072, 'Jeremy', 'Tolentino', 20, 'Blk 2 Lot 19 ph.1', 'Jeremy', 'tolentino_jrmy@gmail.com', '$2y$10$56dpEv0PNeOsrE9Gb9aHtuxdqQ8NfkwW4k1AfpFV6pmfo9nQjUHOW', 0, 'verified', 'images/profile.png'),
(300000073, 'Gherwin', 'Pacheco', 23, 'Blk 13 Lot 10 ph.2', 'Gherwin', 'gherwinpacheco00@gmail.com', '$2y$10$C/RQZzFRAeae7YQV7JyvHOBOJ.5pxlR2yhjSv58MIaQ3qT6KrYCDO', 0, 'verified', 'images/profile.png'),
(300000074, 'Juan', 'Dela Cruz', 22, 'Blk 5 Lot 2 ph.1', 'Juan', 'juan_delacruz10@gmail.com', '$2y$10$8M5/xH1QA.TcfRx1/iI6LOU9qsJ9bebN03vubTAzBQ//8so1FeN0K', 0, 'verified', 'user_profile/boy.jpg'),
(300000075, 'John Albert', 'Hachac', 27, 'Blk 11 Lot 19 ph.2', 'Albert', 'johnalbert123@gmail.com', '$2y$10$FC1dSwIhYV3IQ6RjU6a.Q.cnblBg54bPJMW86tb7JpsFLRMNu9m/G', 0, 'verified', 'images/profile.png'),
(300000076, 'John Carl', 'Del Rosario', 20, 'Blk 4 Lot 11 ph.1', 'Carl', 'delrosario_jcarl@gmail.com', '$2y$10$q4PrSq/yKlRfs3JT0vL8O.le.L6rHhswzhQG4RVi5J7/VkWPcLxf2', 0, 'verified', 'user_profile/male.png'),
(300000077, 'Alexa', 'Sy', 23, 'Blk 1 Lot 35 ph.1', 'Alexa', 'alexa_sy@gmail.com', '$2y$10$2808gOoyhoHksZs3NNNEx.Zy2uyCnwPbA.p42WVbXteyEk.7glN7a', 0, 'verified', 'images/profile.png'),
(300000078, 'Princess Jane', 'Conje', 24, 'Blk 2 Lot 40 ph.1', 'Jane', 'conje_jane24@gmail.com', '$2y$10$pQYcQ4wiNltwsd1Pcv7MJ.TcdKW83EN7MXGzq6hsqXVHz71CORTGe', 0, 'verified', 'images/profile.png'),
(300000079, 'John', 'Lopez', 21, 'Blk 2 Lot 39 ph.1', 'John', 'johnlopez11@gmail.com', '$2y$10$EqUlxPIhNcD1PnIKMnYDFevHR/YUkIM721xzemY5L0oaNAuMvBcPy', 0, 'verified', 'user_profile/male.png'),
(300000080, 'Prince Andrew', 'Macasinag', 30, 'Blk 13 Lot 24 ph.2', 'Andrew', 'andrewmacasinag@gmail.com', '$2y$10$vUlGf5mTcdNMTvT1HbCjiOOopYS3pfbQWF/T6/oolhN7v/ZmFWmxK', 0, 'verified', 'images/profile.png'),
(300000081, 'Joy', 'Casiquin', 23, 'Blk 4 Lot 9 ph.3', 'Joy', 'casiquin001@gmail.com', '$2y$10$wU2u0hH8kDvCIo5hCC2WFOPrj.zFIhXF2NTo00G83dfkjx/.GaSJK', 0, 'verified', 'images/profile.png'),
(300000082, 'Christian', 'De Asis', 23, 'Blk 6 Lot 19 ph.3', 'Christian', 'christian_de_asis@gmail.com', '$2y$10$qwMLph1t9a2siYe95Puj3ewY4UO4cVehKcRoc8DoXq5R9j5UaBLQa', 0, 'verified', 'images/profile.png'),
(300000083, 'Joshua', 'Ventura', 24, 'Blk 31 Lot 21 ph.2', 'Joshua', 'joshuaventura@gmail.com', '$2y$10$d6vGC2xqz3ik/bmpMb5lw.UdDOR81wh594zMbodpwmc2TUpvQhUHe', 0, 'verified', 'user_profile/male.png'),
(300000084, 'Zoren', 'Gumabao', 26, 'Blk 31 Lot 31 ph.2', 'Zoren', 'zorengumabao@gmail.com', '$2y$10$0liavDPVEZIe/0zblT05SeEuTXFsMogoVRSLDBVyT1oXdH0zcfRDS', 0, 'verified', 'user_profile/boy.jpg'),
(300000085, 'Jonah Renz', 'Legazpi', 23, 'Blk 23 Lot 24 ph.3', 'Jonah', 'renzlegazpi002@gmail.com', '$2y$10$tGmiSf3ABusefrOkAO0W4.aaKt2mAoJ368Yy/Vr0XiG4BOpvgFgkS', 0, 'verified', 'images/profile.png'),
(300000086, 'Prince', 'Tumaladtad', 23, 'Blk 1 Lot 30 ph.1', 'Prince', 'prince_tumaladtad@gmail.com', '$2y$10$odZuoEp9zL80e1R4UYe74edjvT6p9zWi/tuamb9rVRGcSXbqNqgVa', 0, 'verified', 'images/profile.png'),
(300000087, 'Jack ', 'Rivera', 20, 'Blk 21 Lot 21 ph.1', 'Jack', 'jackrivera@gmail.com', '$2y$10$AxR6omTrvyWHp8c8z2CNSueJuIs5F.im9FgAjrvkKZsojGRhTp4j.', 0, 'verified', 'images/profile.png'),
(300000088, 'Mark Kevin', 'Saluyot', 26, 'Blk 20 Lot 4 ph.2', 'Kevin', 'kevin_mark00@gmail.com', '$2y$10$8QK5p3BK5VSCUGF2ml4s/e4QZLG758eu.hZaBys0sNd.uNl8NSBG6', 0, 'verified', 'images/profile.png'),
(300000089, 'Luisa Karen', 'Soriano', 23, 'Blk 2 Lot 23 ph.3', 'Karen', 'luisakaren01@gmail.com', '$2y$10$AnAgfSHNlJE/qmD3yU/97uorsjMDuJoaJwNKdfn8lpdkWz2VHgqU.', 0, 'verified', 'user_profile/female.png'),
(300000090, 'Maico', 'Barcelona', 25, 'Blk 2 Lot 19 ph.3', 'Maico', 'maicobarcelona@gmail.com', '$2y$10$daYoygPuQrBwlte1AcjkKeijV2en1UUEsjcfPJ43GzUFPQn3TzC5q', 0, 'verified', 'user_profile/male.png'),
(300000091, 'John Michael', 'Cortiguerra', 31, 'Blk 1 Lot 10 ph.1', 'Michael', 'michaeljohn@gmail.com', '$2y$10$MwOWMpU8SkpBvof4FuUwo.ksBpD9JWkntyxZ/36fBJVdqWm9hicHS', 0, 'verified', 'images/profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `activity_logs_addons`
--
ALTER TABLE `activity_logs_addons`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `activity_logs_m`
--
ALTER TABLE `activity_logs_m`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`add_ons_id`);

--
-- Indexes for table `add_ons1`
--
ALTER TABLE `add_ons1`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `flavor`
--
ALTER TABLE `flavor`
  ADD PRIMARY KEY (`flavor_id`);

--
-- Indexes for table `flavorings`
--
ALTER TABLE `flavorings`
  ADD PRIMARY KEY (`flavor_num`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `material_usage`
--
ALTER TABLE `material_usage`
  ADD PRIMARY KEY (`usage_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_list1`
--
ALTER TABLE `order_list1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `size_materials`
--
ALTER TABLE `size_materials`
  ADD PRIMARY KEY (`s_m_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `log_id` int(122) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `activity_logs_addons`
--
ALTER TABLE `activity_logs_addons`
  MODIFY `log_id` int(233) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `activity_logs_m`
--
ALTER TABLE `activity_logs_m`
  MODIFY `log_id` int(122) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `add_ons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `add_ons1`
--
ALTER TABLE `add_ons1`
  MODIFY `add_id` int(233) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(233) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1577;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `flavor`
--
ALTER TABLE `flavor`
  MODIFY `flavor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `flavorings`
--
ALTER TABLE `flavorings`
  MODIFY `flavor_num` int(233) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(233) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `material_usage`
--
ALTER TABLE `material_usage`
  MODIFY `usage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_list1`
--
ALTER TABLE `order_list1`
  MODIFY `id` int(233) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1028;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `size_materials`
--
ALTER TABLE `size_materials`
  MODIFY `s_m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300000092;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
