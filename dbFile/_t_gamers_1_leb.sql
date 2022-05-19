-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 06:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `@t_gamers#1_leb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(150) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `adminStatus` int(11) NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `code`, `status`, `adminStatus`, `registrationDate`, `updateDate`) VALUES
(1, 'admin', 'boutros.georges513@gmail.com', '$2y$10$FGMNROEYJe7f2.IpdC7uKuXn2E7IZDrQ2KoUG.VhEhc.Hv89OuSFy', 0, 'verified', 1, '2022-02-25 13:37:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminIP` tinyint(1) NOT NULL,
  `status` int(11) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logoutTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryToken` varchar(255) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `categoryStatus` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryToken`, `categoryName`, `categoryDescription`, `categoryStatus`, `createDate`, `updateDate`) VALUES
(1, 'qGkNmuFhOXK', 'laptops', 'contains all kinds of laptops', 1, '2022-03-28 07:56:41', '22-04-2022 01:39:45 PM'),
(2, 'ptM85P3a0Vk', 'desktops', 'contains .. ', 1, '2022-03-28 07:57:15', ''),
(3, 'oWIHsKric9h', 'accessories', 'contains .. ', 1, '2022-03-28 07:58:21', ''),
(4, 'Zk1H3mk9PH0', 'offers', 'contains ...', 0, '2022-04-12 13:43:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 1, '9', 2, '2021-12-17 11:53:57', 'COD', 'Delivered'),
(2, 1, '8', 1, '2021-12-17 12:05:35', 'COD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'in Process', 'It will take about 24H to get to your doorstep Titan Georges!!', '2021-12-17 11:55:49'),
(2, 1, 'Delivered', 'Congrats! Your order has been delivered successfully', '2021-12-17 11:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(1, 2, 0, 0, 0, '', '', '', '2022-02-03 17:05:25'),
(2, 0, 5, 5, 5, 'georges', 'great', '123', '2022-02-03 17:05:35'),
(3, 1, 0, 0, 0, '', '', '', '2022-02-03 17:05:59'),
(4, 0, 5, 5, 5, 'georges', 'great', '1234', '2022-02-03 17:06:24'),
(5, 1, 0, 0, 0, '', '', '', '2022-02-03 17:11:29'),
(6, 1, 0, 0, 0, '', '', '', '2022-02-03 17:11:32'),
(7, 1, 0, 0, 0, '', '', '', '2022-02-03 17:11:47'),
(8, 0, 0, 0, 0, '', '', '', '2022-02-03 17:12:11'),
(9, 1, 0, 0, 0, '', '', '', '2022-02-04 14:21:41'),
(10, 1, 0, 0, 0, '', '', '', '2022-02-04 14:22:14'),
(11, 2, 0, 0, 0, '', '', '', '2022-02-04 14:22:20'),
(12, 2, 0, 0, 0, '', '', '', '2022-02-04 14:22:24'),
(13, 3, 0, 0, 0, '', '', '', '2022-02-04 14:22:27'),
(14, 2, 0, 0, 0, '', '', '', '2022-02-04 14:22:34'),
(15, 1, 0, 0, 0, '', '', '', '2022-02-05 05:50:54'),
(16, 0, 0, 0, 0, '', '', '', '2022-02-05 05:55:16'),
(17, 0, 0, 0, 0, '', '', '', '2022-02-05 05:56:10'),
(18, 2, 0, 0, 0, '', '', '', '2022-02-05 05:56:13'),
(19, 1, 0, 0, 0, '', '', '', '2022-02-05 05:56:16'),
(20, 0, 0, 0, 0, '', '', '', '2022-02-05 05:56:24'),
(21, 2, 0, 0, 0, '', '', '', '2022-02-05 05:56:27'),
(22, 5, 0, 0, 0, '', '', '', '2022-02-05 05:56:34'),
(23, 1, 0, 0, 0, '', '', '', '2022-02-05 05:56:42'),
(24, 0, 0, 0, 0, '', '', '', '2022-02-05 05:57:17'),
(25, 1, 0, 0, 0, '', '', '', '2022-02-05 05:57:21'),
(26, 0, 0, 0, 0, '', '', '', '2022-02-05 05:58:36'),
(27, 1, 0, 0, 0, '', '', '', '2022-02-05 05:58:42'),
(28, 0, 0, 0, 0, '', '', '', '2022-02-05 05:59:08'),
(29, 1, 0, 0, 0, '', '', '', '2022-02-05 05:59:12'),
(30, 2, 0, 0, 0, '', '', '', '2022-02-05 06:00:31'),
(31, 0, 0, 0, 0, '', '', '', '2022-02-05 06:00:49'),
(32, 2, 0, 0, 0, '', '', '', '2022-02-05 06:01:03'),
(33, 5, 0, 0, 0, '', '', '', '2022-02-05 06:01:11'),
(34, 1, 0, 0, 0, '', '', '', '2022-02-05 06:01:20'),
(35, 0, 0, 0, 0, '', '', '', '2022-02-05 06:03:34'),
(36, 1, 0, 0, 0, '', '', '', '2022-02-05 06:03:36'),
(37, 5, 0, 0, 0, '', '', '', '2022-02-05 06:04:02'),
(38, 0, 0, 0, 0, '', '', '', '2022-02-05 06:04:15'),
(39, 1, 0, 0, 0, '', '', '', '2022-02-05 06:16:50'),
(40, 1, 0, 0, 0, '', '', '', '2022-02-05 11:51:08'),
(41, 0, 0, 0, 0, '', '', '', '2022-02-08 07:13:19'),
(42, 1, 0, 0, 0, '', '', '', '2022-02-08 07:13:25'),
(43, 2, 0, 0, 0, '', '', '', '2022-02-08 07:15:48'),
(44, 8, 0, 0, 0, '', '', '', '2022-02-08 07:27:30'),
(45, 5, 0, 0, 0, '', '', '', '2022-02-08 14:28:37'),
(46, 2, 0, 0, 0, '', '', '', '2022-02-09 18:35:20'),
(47, 1, 0, 0, 0, '', '', '', '2022-02-15 16:31:49'),
(48, 2, 0, 0, 0, '', '', '', '2022-02-16 08:28:35'),
(49, 2, 0, 0, 0, '', '', '', '2022-03-23 09:20:01'),
(50, 1, 0, 0, 0, '', '', '', '2022-03-23 11:07:37'),
(51, 2, 0, 0, 0, '', '', '', '2022-03-23 13:38:46'),
(52, 1, 0, 0, 0, '', '', '', '2022-03-25 17:40:46'),
(53, 3, 0, 0, 0, '', '', '', '2022-03-28 08:42:17'),
(54, 1, 0, 0, 0, '', '', '', '2022-03-31 06:19:50'),
(55, 1, 0, 0, 0, '', '', '', '2022-04-05 06:07:37'),
(56, 1, 0, 0, 0, '', '', '', '2022-04-12 07:00:52'),
(57, 1, 0, 0, 0, '', '', '', '2022-04-20 06:10:05'),
(58, 1, 0, 0, 0, '', '', '', '2022-04-23 10:00:17'),
(59, 1, 0, 0, 0, '', '', '', '2022-04-23 10:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `subcategoryName` varchar(255) NOT NULL,
  `productToken` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productCompany` varchar(255) NOT NULL,
  `productCompanyURL` varchar(255) NOT NULL,
  `productPrice` int(50) NOT NULL,
  `productPriceBeforeDiscount` int(50) NOT NULL,
  `productDescription` longtext NOT NULL,
  `productImage1` varchar(255) NOT NULL,
  `productImage2` varchar(255) NOT NULL,
  `productImage3` varchar(255) NOT NULL,
  `shippingCharge` int(50) NOT NULL,
  `productAvailability` varchar(255) NOT NULL,
  `productTypeName` varchar(255) NOT NULL,
  `productFeatured` int(11) NOT NULL,
  `productStatus` int(11) NOT NULL,
  `productViews` int(11) NOT NULL,
  `postDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productType` varchar(255) NOT NULL,
  `productTypeDescription` longtext NOT NULL,
  `productTypeStatus` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`id`, `productName`, `productType`, `productTypeDescription`, `productTypeStatus`, `createDate`, `updateDate`) VALUES
(1, 'dell alienware area51m r1', 'desktop replacement', 'something', 1, '2022-03-29 10:43:01', '30-03-2022 04:26:10 PM'),
(2, 'dell alienware aurora r5', 'high end gaming', 'sthg', 1, '2022-03-29 13:20:57', '');

-- --------------------------------------------------------

--
-- Table structure for table `requestproduct`
--

CREATE TABLE `requestproduct` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `requestStatus` varchar(255) NOT NULL,
  `requestAvailability` int(11) NOT NULL,
  `requestDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestproduct`
--

INSERT INTO `requestproduct` (`id`, `userEmail`, `brand`, `series`, `description`, `requestStatus`, `requestAvailability`, `requestDate`, `updateDate`) VALUES
(1, 'boutros.georges513@gmail.com', 'dell', 'alienware 17r5', 'STHG\r\n', 'successful', 1, '2022-03-28 08:22:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryToken` varchar(255) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `subcategoryToken` varchar(255) NOT NULL,
  `subcategoryName` varchar(255) NOT NULL,
  `subcategoryDescription` longtext NOT NULL,
  `subcategoryStatus` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryToken`, `categoryName`, `subcategoryToken`, `subcategoryName`, `subcategoryDescription`, `subcategoryStatus`, `createDate`, `updateDate`) VALUES
(1, 'qGkNmuFhOXK', 'laptops', 'SXvdKJUmejH', 'gaming laptops', 'contains ... ', 1, '2022-03-28 07:56:52', '31-03-2022 10:13:35 AM'),
(2, 'qGkNmuFhOXK', 'laptops', 'si5w0yAx5lL', 'non gaming laptops', 'contains ... ', 1, '2022-03-28 07:57:01', ''),
(3, 'ptM85P3a0Vk', 'desktops', 'bN9b6a8jSOo', 'gaming desktops', 'contains ... ', 1, '2022-03-28 07:57:32', ''),
(4, 'ptM85P3a0Vk', 'desktops', 'Mqfm2GAqhxO', 'non gaming desktops', 'contains ... ', 1, '2022-03-28 07:57:47', ''),
(5, 'ptM85P3a0Vk', 'desktops', 'ZKDQL81gNxX', 'custom dekstops', 'contains ... ', 1, '2022-03-28 07:58:09', ''),
(6, 'oWIHsKric9h', 'accessories', 'LZ1NgmUr5mR', 'gaming accessories', 'contains ... ', 1, '2022-03-28 07:58:38', ''),
(7, 'oWIHsKric9h', 'accessories', 'waC5oMG1YRG', 'non gaming accessories ', 'contains ... ', 1, '2022-03-28 07:58:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `user$`
--

CREATE TABLE `user$` (
  `id` bigint(150) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumtext NOT NULL,
  `status` text NOT NULL,
  `userStatus` int(11) NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user$`
--

INSERT INTO `user$` (`id`, `name`, `email`, `password`, `code`, `status`, `userStatus`, `registrationDate`, `updateDate`) VALUES
(1, 'georges', 'boutros.georges513@gmail.com', '$2y$10$WQ0CrzO8oLuumFAHjSv9tuh3yEVOO6CV3o.YHFL6vMbX2i0P35vK.', '0', 'verified', 1, '2022-03-26 08:03:50', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(150) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` tinyint(1) NOT NULL,
  `status` text NOT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logoutTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userIp`, `status`, `loginTime`, `logoutTime`) VALUES
(1, 'boutros.georges513@gmail.com', 0, '1', '2022-02-25 13:36:37', '25-02-2022 03:39:02 PM'),
(2, 'boutros.georges513@gmail.com', 0, '1', '2022-03-23 09:31:09', '24-03-2022 10:28:07 AM'),
(3, 'boutros.georges513@gmail.com', 0, '1', '2022-03-24 08:43:48', '25-03-2022 01:48:25 PM'),
(4, 'boutros.georges513@gmail.com', 0, '1', '2022-03-25 14:17:42', '28-03-2022 11:02:21 AM'),
(5, 'boutros.georges513@gmail.com', 0, '1', '2022-03-28 08:02:28', '28-03-2022 11:03:38 AM'),
(6, 'boutros.georges513@gmail.com', 0, '1', '2022-03-28 08:03:51', '12-04-2022 10:04:18 AM');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userEmail`, `productId`, `postingDate`) VALUES
(1, 'boutros.georges513@gmail.com', 1, '2022-02-04 14:22:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestproduct`
--
ALTER TABLE `requestproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user$`
--
ALTER TABLE `user$`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requestproduct`
--
ALTER TABLE `requestproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user$`
--
ALTER TABLE `user$`
  MODIFY `id` bigint(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
