-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 02:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agric`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `date`) VALUES
(1, 'admin@gmail.com', 'admin', '2022-02-04 13:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `email`, `password`, `date`) VALUES
(1, 'dan@gmail.com', 'ASDF', '2022-02-04 15:12:38'),
(2, 'sip@gmail.com', 'silas', '2022-02-09 11:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `farmerdata`
--

CREATE TABLE `farmerdata` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmerdata`
--

INSERT INTO `farmerdata` (`id`, `first_name`, `last_name`, `email`, `date`) VALUES
(1, 'John', 'David', 'dan@gmail.com', '2022-02-04 15:12:38'),
(2, 'Silas', 'Paul', 'sip@gmail.com', '2022-02-09 11:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_owner` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_description`, `product_category`, `product_owner`, `product_image`, `date`) VALUES
(2, 'Rice', 5000, 'these is the best foreign rice in the market', 'cereal', 'dan@gmail.com', 'pic2.jfif', '2022-02-08 11:54:07'),
(3, 'Beans', 6000, 'a multi color beans for your nutrient', 'cereal', 'dan@gmail.com', 'pic3.jfif', '2022-02-08 11:56:19'),
(5, 'Onions', 6000, 'these is a fresh onions from the farm', 'Vegetable', 'sip@gmail.com', 'pic15.jpg', '2022-02-09 11:58:46'),
(6, 'Cali', 5400, 'these is very good for your growth', 'Vegetable', 'sip@gmail.com', 'pic16.webp', '2022-02-09 11:59:54'),
(7, 'Tomato', 2000, 'A fresh tomato just for you', 'Vegetable', 'sip@gmail.com', 'pic8.webp', '2022-02-09 12:01:00'),
(8, 'small tomato', 7000, 'these is a green tomato for you', 'Vegetable', 'dan@gmail.com', 'pic7.webp', '2022-02-09 12:09:31'),
(9, 'red maze', 5600, 'red maze for swallow', 'cereal', 'dan@gmail.com', 'pic5.jfif', '2022-02-09 12:10:19'),
(10, 'Arish', 4500, 'the best arish potato in the market', 'Tubber', 'dan@gmail.com', 'pic12.jpg', '2022-02-09 12:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `customer_name`, `email`, `address`, `quantity`, `phone`, `image`, `status`, `price`, `date`) VALUES
(2, 'Simon', 'em@gmail.com', 'these should probably contain you home or work address', 4, 2524262, 'pic2.jfif', 'Approved', 5000, '2022-02-09 08:42:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmerdata`
--
ALTER TABLE `farmerdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmerdata`
--
ALTER TABLE `farmerdata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
