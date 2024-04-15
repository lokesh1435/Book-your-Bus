-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2023 at 09:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `total_tickets` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=notpaid,1=confirm,2=cancel',
  `booked_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `schedule_id`, `total_tickets`, `user_id`, `status`, `booked_at`) VALUES
(1, 1, 3, 2, 1, '2023-04-07 10:25:46'),
(2, 1, 3, 4, 2, '2023-04-08 05:09:36'),
(3, 2, 2, 4, 1, '2023-04-08 06:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `bus_no` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `add_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `added_by`, `bus_no`, `image`, `seating_capacity`, `status`, `add_at`) VALUES
(1, 3, 'SK 25 BDU', 'bus1.jpg', 72, 1, '2023-04-07 11:24:12'),
(2, 3, 'SK 69 BDU', 'bus2.jpg', 65, 1, '2023-04-05 10:30:59'),
(3, 3, 'SK 75 XYZ', 'bus3.jpg', 72, 1, '2023-04-05 10:30:09'),
(4, 5, 'BDU 68 ZXB', 'bus3.jpg', 72, 1, '2023-04-08 05:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` char(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `msg_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `name`, `contact`, `email`, `message`, `msg_at`) VALUES
(1, 'Connor Barry', '070 7634 8298', 'ConnorBarry@armyspy.com', 'Am not be able to register...', '2023-04-08 05:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_point` varchar(50) NOT NULL,
  `end_point` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `user_id`, `start_point`, `end_point`) VALUES
(1, 3, 'Manchester', 'London'),
(2, 3, 'Liverpool', 'Manchester'),
(3, 3, 'Leeds', 'Scarborough'),
(4, 5, 'Bristol', 'London');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `start_time` datetime NOT NULL,
  `reached_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_seats` int(11) NOT NULL,
  `available_seats` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `added_by`, `route_id`, `bus_id`, `description`, `start_time`, `reached_time`, `status`, `added_at`, `total_seats`, `available_seats`, `cost`) VALUES
(1, 3, 2, 1, 'Reached On Time With Limited Luggage', '2023-04-08 09:00:00', '2023-04-08 23:30:00', 0, '2023-04-07 10:21:04', 72, 69, 239),
(2, 5, 4, 4, 'Please Carry Limited Luggage Only...', '2023-04-11 10:30:00', '2023-04-12 04:15:00', 0, '2023-04-08 06:03:20', 72, 70, 159);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `contact` char(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','busoperator','user') NOT NULL,
  `status` tinyint(4) NOT NULL,
  `document` varchar(100) DEFAULT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `role`, `status`, `document`, `registered_at`) VALUES
(1, 'Admin', '079 4008 9154', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin', 1, NULL, '2023-04-04 09:15:06'),
(2, 'Mason Gibbons', ' 079 8375 9436', 'MasonGibbons@jourrapide.com', '25d55ad283aa400af464c76d713c07ad', 'user', 1, NULL, '2023-04-04 09:17:03'),
(3, 'Ace Luxury Transportation Inc.', '079 5289 5358', 'AceLuxury@rhyta.com', '25d55ad283aa400af464c76d713c07ad', 'busoperator', 1, 'dummy.pdf', '2023-04-04 09:20:02'),
(4, 'Joseph Foster', '079 3889 8044', 'JosephFoster@rhyta.com', '25d55ad283aa400af464c76d713c07ad', 'user', 1, NULL, '2023-04-08 05:01:13'),
(5, 'COACHSPOTTER', '070 6463 9256', 'coachspotter@jourrapide.com', '25d55ad283aa400af464c76d713c07ad', 'busoperator', 1, 'dummy.pdf', '2023-04-08 05:22:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bus_no` (`bus_no`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
