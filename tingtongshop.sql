-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2019 at 06:08 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tingtongshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `active`) VALUES
(1, 'Padrada_ttpp', '2851919e56ad5f6c04f0f2131d67f4a4', 'Padrada', 'Promkijjanon', 'padrada.ttpp@gmail.com', 1),
(2, '6239010013', 'c20ad4d76fe97759aa27a0c99bff6710', 'ภัทรดา', 'พร้อมกิจจานนท์', 'tukta_ttpp@hotmail.com', 0),
(4, 'padrada.ttpp', '81dc9bdb52d04dc20036dbd8313ed055', 'tukta', 'tatuk', 'ploy_perry@hotmail.com', 0),
(5, 'jabby', 'e10adc3949ba59abbe56e057f20f883e', 'jab', 'may', 'jabjab@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `unitInStock` int(11) NOT NULL,
  `category` int(3) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `unitInStock`, `category`, `picture`) VALUES
(1, 'DELL Inspiron 13', 'DELL Inspiron 13 5391-W566051007THW10 Silver', 28690, 15, 1, 'img1.jpg'),
(3, 'DELL Alienware m15', 'DELL Alienware m15 R2-W569051002THW10', 119900, 5, 1, 'img3.jpg'),
(4, 'Acer Aspire Nitro 5', 'Acer Aspire Nitro 5 17 AN517-51-72T9', 33690, 23, 1, 'img4.jpg'),
(5, 'Acer Swift 3', 'Acer Swift 3 SF314-57G-5023 Intel Core i5-1035G1 ', 20990, 30, 1, 'img5.jpg'),
(7, 'HP 22-c0001d', 'AMD A9-9425 (3.00 GHz up to 3.60 GHz, 1M Cache L2,)', 11900, 23, 2, 'img6.jpg'),
(8, 'ACER Aspire C20', 'Intel Pentium J3710 1.6 GHz(2M Cache, up to 2.64 GHz)', 9900, 40, 2, 'img7.jpg'),
(9, 'ACER Aspire C22', 'AMD A9-9425 (3.1GHz up to 3.7GHz, 1MB L2 Cache)', 11990, 36, 2, 'img8.jpg'),
(10, 'HP Pavilion 20', 'Intel Pentium Silver J5005 Processor (4M Cache, up to 2.80 GHz)', 9500, 100, 2, 'img9.jpg'),
(11, 'HP Pavilion 590', 'CPU AMD Ryzen 3 2200G\r\nGraphic SystemRadeon Vega 8', 11990, 23, 3, 'img10.jpg'),
(12, 'DELL Vostro 3670', 'CPU Intel Core i5-8400 Processor\r\nGraphic SystemIntel UHD 630', 15900, 26, 3, 'img11.jpg'),
(13, 'ACER Nitro N50', 'CPU Intel Core i3-8100 Processor\r\nGraphic SystemNVIDIA GTX1050Ti 4GB', 24990, 45, 3, 'img12.jpg'),
(14, 'ACER Aspire GX-281', 'CPU AMD Ryzen 5 1400\r\nGraphic SystemNVIDIA GTX1080TI 11G', 26900, 35, 3, 'img13.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
