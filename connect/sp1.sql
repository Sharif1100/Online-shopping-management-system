-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2017 at 09:22 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `signup_date`) VALUES
(1, 'MEN', '2017-03-18 12:18:24'),
(2, 'WOMEN', '2017-03-18 12:31:13'),
(3, 'child', '2017-02-03 22:32:31'),
(4, 'old', '2017-02-04 10:46:58'),
(5, 'young', '2017-02-13 18:25:23'),
(8, 'test', '2017-03-16 11:49:36'),
(9, 'sds', '2017-03-17 12:03:19'),
(12, 'ddvddv', '2017-03-17 19:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(6) UNSIGNED NOT NULL,
  `userid` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phonenumber` int(24) NOT NULL,
  `email` varchar(24) NOT NULL,
  `days` int(24) NOT NULL,
  `productid` int(6) NOT NULL,
  `quantity` int(20) NOT NULL,
  `productname` varchar(24) NOT NULL,
  `accountspay` int(24) NOT NULL,
  `accountrec` int(100) NOT NULL,
  `emp` varchar(24) NOT NULL,
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `userid`, `location`, `phonenumber`, `email`, `days`, `productid`, `quantity`, `productname`, `accountspay`, `accountrec`, `emp`, `signup_date`) VALUES
(7, '5', 'fefef', 2147483647, 'frefefeer', 1, 7, 0, 'tshirt', 0, 1140, '', '2017-02-28 06:23:20'),
(8, '9', 'fsfsf', 1913997631, 'drkjitu24@gmail.com', 1, 7, 0, 'tshirt', 0, 1140, '', '2017-03-01 11:01:11'),
(9, '5', 'rerer', 0, 'jitu@gmail.com', 1, 12, 0, 'dggd', 0, 284444, '', '2017-03-01 11:01:26'),
(12, '5', 'wewe', 2121, 'sdsds', 1, 9, 0, 'Soft Toy', 0, 950, '', '2017-03-17 19:51:06'),
(16, '5', 'eded3', 43434, 'bgbgb', 1, 7, 11, 'tshirt', 0, 12540, '', '2017-03-18 16:06:10'),
(18, '5', 'bhdbhbhdf', 21212, 'fefefe', 1, 11, 30, 'shoes', 0, 34200, '', '2017-03-18 16:55:43'),
(19, '5', 'dcdcd', 168088924, 'drk@gmail.com', 1, 14, 12, 'scs', 0, 224004, '', '2017-03-18 19:45:00'),
(20, '5', 'rrgr', 1913997631, 'ghhuhu', 1, 11, 10, 'shoes', 0, 114890, '', '2017-03-18 19:45:56'),
(21, '5', 'tftf', 1913997631, 'drkjitu24@gmail.com', 1, 11, 10, 'shoes', 0, 114890, 'hridoy@gmail.com', '2017-03-18 19:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `uniqueP` varchar(5) DEFAULT NULL,
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `price`, `category_id`, `image`, `discount`, `uniqueP`, `signup_date`) VALUES
(7, 'tshirt', 43455, 1200, 1, 'images/product/586b4f36dca8e.jpg', 1140, '1', '2017-03-18 16:44:16'),
(8, 'Tshirt', 2002, 200, 3, 'images/product/58b04678456c5.jpg', 752, '1', '2017-03-18 19:11:29'),
(11, 'shoes', 3414, 1200, 1, 'images/product/5894f194ba2c2.jpg', 11489, '1', '2017-03-18 19:14:21'),
(14, 'scs', 3434, 21212, 1, 'images/product/17218364_802641706549833_857209098932077842_o.jpg', 18667, '1', '2017-03-18 19:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `phone`, `role`, `signup_date`) VALUES
(1, 'jitu', 'ghosh', 'drkjitu24@gmail.com', '123456789j', '1960-01-01', '1', '01913997631', 1, '2017-02-03 21:03:57'),
(2, 'raju', 'das', 'drk@gmail.com', '123456789r', '0000-00-00', '1', '01913997632', 2, '2017-02-03 22:02:23'),
(3, 'hridoy', 'das', 'hridoy@gmail.com', '123456789h', '0000-00-00', '2', '01913997633', 2, '2017-02-03 22:03:39'),
(5, 'anu', 'das', 'anu@gmail.com', '123456789a', '1960-01-01', '1', '01913997635', 0, '2017-02-04 01:28:43'),
(6, 'debu', 'das', 'debu@gmail.com', '123456789d', '1960-01-01', '1', '01913997621', 0, '2017-02-04 02:47:20'),
(7, 'erer', 'rerer', 'hridoy98@gmail.com', '12345678dx', '0000-00-00', '1', '01913997652', 2, '2017-02-28 07:00:53'),
(9, 'sakhwat', 'hossain', 'sakhawat@gmail.com', '123456789s', '1960-01-01', '1', '01913997664', 0, '2017-03-01 10:09:08'),
(10, 'tgtg', 'rfrfrfrf', 'hridoysw@gmail.com', '123456789r', '0000-00-00', '1', '12345969650', 2, '2017-03-18 12:57:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
