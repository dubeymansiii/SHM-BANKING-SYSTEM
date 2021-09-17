-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 07:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sno.` int(100) NOT NULL,
  `sender` varchar(35) NOT NULL,
  `receiver` varchar(38) NOT NULL,
  `balance` int(90) NOT NULL,
  `datetime` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sno.`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'Swati Tiwari', 'Reena Tiwari', 90, '2021-09-13 13:02:46.000000'),
(2, 'Rahul Sanon', 'Reena mishra', 45, '0000-00-00 00:00:00.000000'),
(3, 'Swati Tiwari', 'Reena Tiwari', 78, '2021-09-15 13:05:35.466358'),
(4, 'rhymingfeelings', 'hu@gmail.com', 43, '2021-09-15 20:55:45.287922'),
(5, 'Reena mishra', 'Rohan Tiwari', 67, '2021-09-16 05:09:35.407532'),
(6, 'Ramya Sinha', 'Reena mishra', 78, '2021-09-16 10:38:31.301028');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `balance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Ramya Sinha', 'rd@gmail.com', 5922),
(2, 'Swati Tiwari', 'st@gmail.com', 2652),
(4, 'Reena Tiwari', 'rd@gmail.com', 5558),
(5, 'Rahul Sanon', 'rs@gmail.com', 2621),
(6, 'Reena mishra', 'mr@gmail.com', 10090),
(7, 'mansi25', 'hu@gmail.com', 89),
(8, 'Rahul Tiwari', 'rts@gmail.com', 100),
(9, 'rhymingfeelings', 'hu@gmail.com', 67),
(11, 'Mantasha Sharif', 'mst@gmail.com', 56),
(12, 'Rohan Mishra', 'rm@gmail.com', 78),
(13, 'rohini Sharma', 'rm@gmail.com', 56),
(14, 'siddhi Agrawal', 'aa@gmail.com', 78);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`sno.`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `sno.` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
