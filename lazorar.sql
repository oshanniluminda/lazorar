-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 09:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lazorar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proId` int(11) NOT NULL,
  `proName` varchar(100) NOT NULL,
  `eachprice` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `proId`, `proName`, `eachprice`, `quantity`, `price`) VALUES
(50, 3, 5, 'Family Pic', 1800, 2, 3600);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `orderCode` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `totalProduct` varchar(200) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `user_id`, `orderCode`, `name`, `number`, `email`, `address`, `totalProduct`, `totalPrice`, `orderDate`) VALUES
(1, 0, '0', 'gayathri perera', '0711234568', 'gayait2000@gmail.com', '300/5', '', 0, '2023-09-11 19:16:06'),
(2, 0, '0', 'gayathri perera', '0711234568', 'gayait2000@gmail.com', '300/5', '', 0, '2023-09-11 19:16:06'),
(3, 0, '0', 'gayathri perera', '0711234568', 'gayait2000@gmail.com', '300/5', 'humble girl (1500 x 2) - cdgfdv (55 x 3) - ', 3165, '2023-09-11 19:16:06'),
(4, 0, '0', 'gayathri perera', '0711234568', 'gayait2000@gmail.com', '300/5', 'mother love (1800 x 1) - sweet book (2000 x 2) - ', 6200, '2023-09-11 19:16:06'),
(5, 0, '64feba9a61f51', 'gayathri ', '0711234568', 'gayait2000@gmail.com', '300/5', 'cdgfdv (55 x 1) - humble girl (1500 x 1) - ', 1955, '2023-09-11 19:16:06'),
(6, 0, '64febad483505', 'alani silva', '0711234567', 'gayait1555@gmail.com', 'gfghbhj', 'world map (2000 x 1) - ', 2400, '2023-09-11 19:16:06'),
(7, 0, '64febd1fc8724', 'gayathri perera', '0711234555', 'gayait2000@gmail.com', '300/5', 'humble girl (1500 x 1) - ', 1900, '2023-09-11 19:16:06'),
(8, 0, '64febda445748', 'gayathri perera', '0711234568', 'gayait2000@gmail.com', '300/5', 'mother love (1800 x 2) - ', 4000, '2023-09-11 19:16:06'),
(9, 0, '64febdf926685', 'kaushalya perera', '0711234567', 'gayait2000@gmail.com', '300/5', 'Family Pic (1800 x 2) - ', 4000, '2023-09-11 19:16:06'),
(10, 0, '64febecedbf7a', 'alani silva', '0711234568', 'gayait1555@gmail.com', 'gfghbhj', 'Family Pic (1800 x 2) - cdgfdv (55 x 1) - ', 4055, '2023-09-11 19:16:06'),
(11, 0, '64fec52a66853', 'alani silva', '0711234568', 'gayait1555@gmail.com', 'gfghbhj', 'humble girl (1500 x 1) - Family Pic (1800 x 1) - ', 3700, '2023-09-11 19:16:06'),
(12, 0, '64fecc914bc12', 'gayathri perera', '0711234568', 'gayait2000@gmail.com', '300/5', 'humble girl (1500 x 1) - sweet book (2000 x 2) - ', 5900, '2023-09-11 19:16:06'),
(13, 0, '64fed1f524fd1', 'gayathri perera', '0711234568', 'gayait2000@gmail.com', '300/5', 'Family Pic (1800 x 1) - humble girl (1500 x 1) - mother love (1800 x 1) - ', 5500, '2023-09-11 19:16:06'),
(14, 0, '64fed75975179', 'kaushalya', '0711234567', 'gayait2000@gmail.com', '300/5', 'humble girl (1500 x 2) - sweet book (2000 x 2) - mother love (1800 x 2) - ', 11000, '2023-09-11 19:16:06'),
(15, 3, '64fedc5af2931', 'Gayathri Fernando', '0711234568', 'gayait2000@gmail.com', '300/5 cdrd xrfdrdx xtcd', 'cdgfdv (55 x 5) - ', 675, '2023-09-11 19:16:06'),
(16, 3, '64fee0adda73f', 'gayathri perera', '0711234567', 'gayait2000@gmail.com', '300/5', 'cdgfdv (55 x 4) - ', 620, '2023-09-11 19:16:06'),
(17, 2, '64ff14d18e159', 'alani aroosha', '0711234567', 'gayait2000@gmail.com', '300/5', 'humble girl (1500 x 2) + ', 3400, '2023-09-11 19:16:06'),
(18, 2, '64ff1547bb27c', 'gayathri perera', '0711234568', 'gayait2000@gmail.com', '300/5', 'humble girl (1500 x 1) + ', 1900, '2023-09-11 19:16:06'),
(19, 2, '64ff1a59bcdc0', 'oshan niluminda', '0711234568', 'gayait2000@gmail.com', '300/5', 'world map (2000 x 2) + Family Pic (1800 x 2) + ', 8000, '2023-09-11 19:17:27'),
(20, 2, '64ff2b4e1b1a0', 'alani aroosha', '0711234568', 'gayait2000@gmail.com', '300/5', 'Family Pic (1800 x 2) + cdgfdv (55 x 2) + ', 4110, '2023-09-11 20:29:39'),
(21, 2, '64ff2c74040c4', 'gayathri perera', '0711234568', 'gayait2000@gmail.com', '300/5', 'sweet book (2000 x 1) + ', 2400, '2023-09-11 20:34:54'),
(22, 3, '650011975d384', 'gayathri perera', '0711234555', 'gayait2000@gmail.com', '300/5', 'cdgfdv (55 x 2) + ', 510, '2023-09-12 12:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `totalBill` int(11) NOT NULL,
  `cardName` varchar(50) NOT NULL,
  `cardNumber` varchar(100) NOT NULL,
  `exDate` varchar(100) NOT NULL,
  `cvv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentId`, `orderId`, `user_id`, `totalBill`, `cardName`, `cardNumber`, `exDate`, `cvv`) VALUES
(1, 10, 0, 4055, 'visa', 'cec489530a3126a3a4867dac3fb3de3f', '229afbc8dfa6559c5ec19ef93f603e9f', 'a3590023df66ac92ae35e3316026d17d'),
(2, 11, 0, 3700, 'Gaya', '522c88530c38f56f72e6cda1871e04cf', '41892c25c7259771ef858b478b758d71', '9996535e07258a7bbfd8b132435c5962'),
(3, 12, 0, 5900, 'alani', '2d39cfc0147567f2d190e0dc83ef843b', 'e1a42c47462bc31c704f9aafa02c31a0', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 13, 0, 5500, 'gygy', '38466f6540fdb6467855edf01283e43b', '550a141f12de6341fba65b0ad0433500', '00c17237d011cca999f55a43db2ce040'),
(5, 14, 0, 11000, 'ddd', 'e8e226d98d69839c16e9fc74cce8c2bc', '435c432b351913966c38108cf077eafe', 'f197002b9a0853eca5e046d9ca4663d5'),
(6, 15, 3, 675, 'ffgfgv', 'a5ceec01770787a9227dfaa59c76b68c', '965b31e51d54c2d604af3f8008dc1db6', 'b4572f47b7c69e27b8e46646d9579e67'),
(7, 16, 3, 620, 'ggb', '1dc8f00765bc5149fd33500f73649703', '0e6f4baa5ccc827f3d8bd72835ae4570', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 17, 2, 3400, 'gygy', 'aac966147e19acb457e7f5c80ac1e379', '4705fe1f3dbb2bbf657e2cd4a7f9f71f', '9996535e07258a7bbfd8b132435c5962'),
(9, 18, 2, 1900, 'vdsgh', '2db248fd25f87bbe6f1170150b16a7e3', '3ddd17edc4fcc7d6c54e239a4bfdaf8a', 'cb8bb2faab5d62d08f177121b177411f'),
(10, 18, 2, 1900, 'vdsgh', '2db248fd25f87bbe6f1170150b16a7e3', '3ddd17edc4fcc7d6c54e239a4bfdaf8a', 'cb8bb2faab5d62d08f177121b177411f'),
(11, 19, 2, 8000, 'fgfgfgg', '12c3d13c718fb3a897736e326aa1042e', '4705fe1f3dbb2bbf657e2cd4a7f9f71f', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 20, 2, 4110, 'kjhbhb', '0945b1494249eb02e01cb580086ab2a1', '0e6f4baa5ccc827f3d8bd72835ae4570', '81dc9bdb52d04dc20036dbd8313ed055'),
(13, 21, 2, 2400, 'ggb', '11b32332375f8ddae0d085cdcbb2621c', '1f6419b1cbe79c71410cb320fc094775', '2a79ea27c279e471f4d180b08d62b00a'),
(14, 22, 3, 510, 'ngmfg', '6f2bcf2871e393f0ae5bff4b15b3bc7b', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proId` int(11) NOT NULL,
  `proName` varchar(100) NOT NULL,
  `wood` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `proPic` varchar(500) NOT NULL,
  `star` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proId`, `proName`, `wood`, `price`, `proPic`, `star`) VALUES
(2, 'world map', 'teak', 2000, 'map.jpg', 2),
(3, 'mother love', 'mahogani', 1800, 'baby1.jpg', 3),
(4, 'sweet book', 'Teak', 2000, 'book1.jpg', 5),
(5, 'Family Pic', 'Teak', 1800, 'couple3.jpg', 0),
(6, 'humble girl', 'Teak', 1500, 'girl6.jpg', 4),
(9, 'cdgfdv', 'cdcd', 55, 'hhh.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `date`) VALUES
(1, 'Gayathri', 'gaya12546@gmail.com', '1605a1026c044ab584955ed7f7f7105c', '2023-09-02 21:31:03'),
(2, 'alani', 'alaniit1555@gmail.com', '5c593f72fa5d742b3053e86a9373e7c9', '2023-09-11 13:44:39'),
(3, 'Gaya', 'gayait2000@gmail.com', '1605a1026c044ab584955ed7f7f7105c', '2023-09-11 14:26:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
