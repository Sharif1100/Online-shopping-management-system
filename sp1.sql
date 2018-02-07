-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 05:40 AM
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
(1, 'men', '2017-02-03 21:09:14'),
(2, 'women', '2017-02-03 22:12:46'),
(3, 'child', '2017-02-03 22:32:31'),
(4, 'old', '2017-02-04 10:46:58'),
(5, 'young', '2017-02-13 18:25:23');

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
  `productname` varchar(24) NOT NULL,
  `accountspay` int(24) NOT NULL,
  `accountrec` int(100) NOT NULL,
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `userid`, `location`, `phonenumber`, `email`, `days`, `productid`, `productname`, `accountspay`, `accountrec`, `signup_date`) VALUES
(6, '5', 'xsx', 0, 'xsxs', 1, 4, 'fvfv', 0, 75, '2017-02-13 15:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` varchar(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `uniqueP` varchar(5) DEFAULT NULL,
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `price`, `category_id`, `image`, `discount`, `uniqueP`, `signup_date`) VALUES
(1, 'dcc d', 333, 33, 'men', '58950da1a103c.', 3, '1', '2017-02-03 23:09:21'),
(3, 'tshirt', 2322, 100, 'men', '58951d3ad40ed.jpg', 90, '1', '2017-02-13 18:15:34'),
(4, 'fvfv', 15, 100, 'men', '58951e8e0e934.jpg', 75, '0', '2017-02-13 16:30:40'),
(5, 'jeans', 20, 900, 'men', '5895b14c2febc.jpg', 810, '1', '2017-02-13 16:30:48'),
(6, 'shirt', 15, 100, 'men', '58a1dffdcfd51.', 90, '1', '2017-02-13 18:22:53');

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
(4, 'hkggk', 'kggkkk', 'hrido@gmail.com', '123456789r', '0000-00-00', '1', '01913997634', 2, '2017-02-03 22:40:55'),
(5, 'anu', 'das', 'anu@gmail.com', '123456789a', '1960-01-01', '1', '01913997635', 0, '2017-02-04 01:28:43'),
(6, 'debu', 'das', 'debu@gmail.com', '123456789d', '1960-01-01', '1', '01913997621', 0, '2017-02-04 02:47:20');

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
