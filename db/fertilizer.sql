-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 11:33 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fertilizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `budget_id` int(255) NOT NULL,
  `budget_year` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `ferti_type` varchar(255) NOT NULL,
  `timesaved` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budget_id`, `budget_year`, `budget`, `ferti_type`, `timesaved`) VALUES
(3, '2022', '2000000', ' npk', '2022-11-24 12:58:33'),
(7, '2023', '5000000', ' sodium', '2022-12-02 13:32:32'),
(8, '2021', '1000000', 'fct', '2022-12-02 13:34:06'),
(10, '2020', '8000000', ' npk', '2022-12-17 10:02:01'),
(11, '2019', '5000000', ' npk', '2022-12-17 10:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmer_id` int(255) NOT NULL,
  `farmer_names` varchar(255) NOT NULL,
  `land_scale` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `villages` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`farmer_id`, `farmer_names`, `land_scale`, `district`, `sector`, `cell`, `villages`, `user_id`) VALUES
(13, 'kenny rugaba', '120', 'Burera', 'gic', 'reme', 'ter', 2),
(14, 'phil ndizeye', '120', 'Gatsibo', 'ewe', 'kicuki', 'ter', 2),
(15, 'aline', '120', 'Muhanga', 'gahanga', 'kicuki', 'ter', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer`
--

CREATE TABLE `fertilizer` (
  `ferti_id` int(255) NOT NULL,
  `ferti_type` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fertilizer`
--

INSERT INTO `fertilizer` (`ferti_id`, `ferti_type`, `price`) VALUES
(13, 'sodium', '1000'),
(14, 'npk', '1030'),
(15, 'yuwee', '500');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `recieve_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timesent` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `recieve_id`, `message`, `timesent`) VALUES
(12, 1, 8, 'fye', '2022-08-08 07:51:59.000000'),
(13, 8, 1, 'welcome', '2022-08-08 08:24:45.000000'),
(18, 1, 3, 'kiri gute?', '2022-08-10 08:45:38.000000'),
(19, 9, 1, 'hello', '2022-08-15 07:12:45.000000'),
(20, 8, 2, 'vcv', '2022-09-27 18:45:08.000000');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(255) NOT NULL,
  `farmer_id` varchar(255) NOT NULL,
  `ferticategory` varchar(255) NOT NULL,
  `landscale` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `fertiquantity` varchar(255) NOT NULL,
  `fertilizerunit` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `timesent` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_id` int(255) NOT NULL,
  `status` text NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `farmer_id`, `ferticategory`, `landscale`, `order_date`, `fertiquantity`, `fertilizerunit`, `district`, `sector`, `cell`, `village`, `timesent`, `user_id`, `status`) VALUES
(24, '14', 'npk', '126', '', '5', 'tone', 'Gatsibo', 'gic', 'reme', 'dwxas', '2022-11-24 13:03:56.027022', 2, 'Approved'),
(25, '13', 'sodium', '126', '', '2', 'kg', 'Burera', 'ewe', 'reme', 'dwxas', '2022-12-17 10:29:41.810357', 2, 'Approved'),
(26, '13', 'npk', '126', '', '10', 'kg', 'Bugesera', 'ewe', 'reme', 'dwxas', '2022-12-17 10:03:11.883591', 2, 'Approved'),
(27, '15', 'yuwee', '20', '2023-05-30', '10', 'tone', 'Muhanga', 'gahanga', 'kicuki', 'kanombe', '2022-12-14 10:16:43.301723', 2, 'Approved'),
(28, '14', 'npk', '200hect', '2022-12-16', '5', 'tone', 'Huye', 'kanombe', 'remera', 'galle', '2022-12-14 10:26:17.747517', 2, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `id` int(11) NOT NULL,
  `ferti_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `timeimported` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`id`, `ferti_id`, `quantity`, `timeimported`) VALUES
(10, 'npk', '1475', '2022-12-17 10:15:09'),
(11, 'yuwee', '488', '2022-12-14 10:16:44'),
(13, 'sodium', '538', '2022-12-17 10:29:42'),
(14, 'npk', '1000', '2022-12-17 10:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `fertilizer` varchar(255) NOT NULL,
  `unit` text NOT NULL,
  `farmer_id` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `timesent` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockout`
--

INSERT INTO `stockout` (`id`, `quantity`, `fertilizer`, `unit`, `farmer_id`, `district`, `timesent`, `user_id`) VALUES
(8, '2', 'npk', 'kg', '13', 'Burera', '2022', 2),
(12, '2', 'sodium', 'tone', '15', 'Muhanga', '2023', 2),
(13, '2', 'npk', 'tone', '15', 'Muhanga', '2023', 2),
(14, '2', 'npk', 'tone', '15', 'Muhanga', '2023', 2),
(15, '2', 'npk', 'tone', '15', 'Muhanga', '2023', 2),
(16, '2', 'npk', 'tone', '15', 'Muhanga', '2023', 2),
(17, '2', 'yuwee', 'tone', '15', 'Muhanga', '2023', 2),
(18, '10', 'yuwee', 'tone', '15', 'Muhanga', '2023', 2),
(19, '10', 'npk', 'kg', '13', 'Bugesera', '', 2),
(20, '2', 'sodium', 'kg', '13', 'Burera', '', 2),
(21, '5', 'npk', 'tone', '14', 'Huye', '2022', 2),
(22, '10', 'npk', 'kg', '13', 'Bugesera', '', 2),
(23, '2', 'sodium', 'kg', '13', 'Burera', '', 2),
(24, '2', 'sodium', 'kg', '13', 'Burera', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `phone`, `address`, `password`, `role`) VALUES
(1, 'Elie', 'Mugisha', 'Elie@gmail.com', '078856789', '', '1212', 'admin'),
(2, 'annick', 'linca', 'lincaannick@gmail.com', '079087654', 'Kigali', '3434', 'retailer'),
(3, 'dinee', 'ishimwe', 'ishimwedinee@gmail.com', '078664545', 'North', '3636', 'retailer'),
(8, 'philbert', 'nyi', 'ndzphilbert@gmail.com', '0875422333', 'East', '1414', 'retailer'),
(9, 'elie', 'mugisha', 'elie@gmail.com', '0875422333', 'kigali', 'elie', 'retailer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `fertilizer` (`ferti_type`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `fertilizer`
--
ALTER TABLE `fertilizer`
  ADD PRIMARY KEY (`ferti_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `id` (`sender_id`),
  ADD KEY `recieve_id` (`recieve_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budget_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fertilizer`
--
ALTER TABLE `fertilizer`
  MODIFY `ferti_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmers`
--
ALTER TABLE `farmers`
  ADD CONSTRAINT `farmers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
