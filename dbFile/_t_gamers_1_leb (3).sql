-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 02:31 PM
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
  `ad_email` varchar(255) NOT NULL,
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

INSERT INTO `admin` (`id`, `name`, `ad_email`, `password`, `code`, `status`, `adminStatus`, `registrationDate`, `updateDate`) VALUES
(1, 'admin', 'boutros.georges513@gmail.com', '$2y$10$FGMNROEYJe7f2.IpdC7uKuXn2E7IZDrQ2KoUG.VhEhc.Hv89OuSFy', 0, 'verified', 1, '2022-02-25 13:37:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `bannerToken` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `endDate` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `bannerToken`, `name`, `URL`, `image`, `endDate`, `form`, `status`, `price`, `updateDate`) VALUES
(1, '0UzbTX2ocT0', 'E-Commerce', 'https://www.google.com', 'banner.png', '2022-05-11', 'landscape', 'active', 25, '07-05-2022 12:58:41 PM'),
(2, 'GuJCTy3VPxv', 'fourze', 'fourze.com', 'fourzet900atx.png', '2022-06-22', 'portrait', 'active', 14, ''),
(3, '1lqPqNoVkmI', 'alienware sc', 'www.dell.com', 'Screenshot (180).png', '2022-06-29', 'landscape', 'active', 15, ''),
(4, 'Am9NLvVdnmZ', 'alienware', 'https://www.google.com', 'area51m3.png', '2022-06-30', 'landscape', 'active', 15, ''),
(5, 'hjFpgA9SrvQ', 'grg', 'www.dell.com', 'lenovo-legion-7i-46.gif', '2022-07-04', 'portrait', 'active', 15, '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cartToken` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `productToken` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `shippingCharge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cartToken`, `userEmail`, `productToken`, `status`, `date`, `quantity`, `price`, `shippingCharge`) VALUES
(1, 'ff79d90b9de4a2c0d809e32843543e5a2f63fecb', 'boutros.georges@aut.edu', 'd67c4990e20bfc0804f6f8b90a487bfea8a4aec3', 'Inactive', '2022-06-02 07:52:21', '1', '2400', '8'),
(2, 'c4f75d83480b07ac23a028c803e462fd910c1cd5', 'boutros.georges@aut.edu', '7a45e05a5979082c405f81fbecbd04c9f3cdf62b', 'Inactive', '2022-06-03 08:36:12', '1', '3100', '10'),
(3, 'dd78c28294c02db2a61ff494bdd42e45c5ca10e2', 'boutros.georges@aut.edu', 'd67c4990e20bfc0804f6f8b90a487bfea8a4aec3', 'Inactive', '2022-06-03 09:08:48', '1', '2400', '8'),
(4, 'bca267c34c683b99b854355938947efbc2fce935', '', 'd67c4990e20bfc0804f6f8b90a487bfea8a4aec3', 'Inactive', '2022-06-07 07:13:14', '1', '2400', '8'),
(5, 'cf5a90a255f16c687dd07a1f8ba02b09eaa84e02', '', 'd67c4990e20bfc0804f6f8b90a487bfea8a4aec3', 'Inactive', '2022-06-17 07:27:14', '1', '2400', '8'),
(6, '311c738263a91c125326fd8409ec73554e144a34', 'boutros.georges@aut.edu', 'd67c4990e20bfc0804f6f8b90a487bfea8a4aec3', 'Inactive', '2022-06-17 07:27:55', '1', '2400', '8'),
(7, 'af31be831b300e7e860c76cb354bdd27a3c3d4c5', 'boutros.georges513@gmail.com', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'Inactive', '2022-06-22 07:01:57', '1', '4100', '12'),
(8, 'f954ba7042df17b48f6ff85dbe80efef1e8c6a99', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-06-30 07:17:19', '2', '1580', '12'),
(9, 'ba416f88eb9e92d3e9b98ebd0d9b6b95c07901e1', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-06-30 07:17:44', '1', '4000', '12'),
(10, '80846223e377f68a4158542c7e3025c69b9c116f', 'boutros.georges@aut.edu', '1461a106a067723341f0d5ae75cefeae8d654e5f', 'Inactive', '2022-06-30 07:36:16', '1', '1000', '10'),
(11, '569f5d47eda940758234a4be434ed5d0b5be5b61', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-05 12:16:43', '1', '4000', '12'),
(12, '7ce384ebc2d550089c958a0281b87f0ae8099190', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-05 12:16:53', '1', '1580', '12'),
(13, '0f5e2a066df50267ab653af8b5965ed70bbdc4c9', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-07 10:02:12', '1', '4000', '12'),
(14, 'ba226a0f30d34f4b5d89634de30d5a23bfe0c7fa', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-07 10:08:48', '1', '1580', '12'),
(15, '0813f63de490f13d192bcdf120d73e000995758e', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-07 10:08:50', '1', '4000', '12'),
(16, '28640d979296af9039810aaab1ef0fdbcada4a71', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-07 10:14:06', '1', '4000', '12'),
(17, '372216036bb0c25903d76feda1ec02de119a0464', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-07 10:14:27', '1', '1580', '12'),
(18, 'b4a82d56a1b49e51bf4de816b3bd139a98f91a08', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-12 07:39:01', '1', '1580', '12'),
(19, '59e5d04cc30c364aefbae5dfb744dec5a358f1c9', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-12 07:45:03', '1', '4000', '12'),
(20, 'd4d5e7a1c8d42e95639536bfdef824d46602b1e4', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-12 07:45:16', '1', '4000', '12'),
(21, '58a2643bd98e21dc11ee64c1f576671fc8ffab50', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-12 07:45:35', '1', '4000', '12'),
(22, '7cba9a75cd2b5c5808610af41685acf6907cf85b', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-12 07:46:21', '1', '4000', '12'),
(23, '82b8fcab813bb29c2c795e041129b14d773760f0', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-12 07:47:13', '1', '4000', '12'),
(24, '1d22956793a8472cdc4c86a6d9d3835ce29a5dd2', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-12 07:48:09', '1', '4000', '12'),
(25, '33c5baec2aa9b6bd8e15a27b3eec21f0a4c25f57', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-12 08:01:38', '1', '4000', '12'),
(26, '818ffa6ffe188a38c988a58bfadb583fea3e3b22', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-12 08:02:16', '1', '1580', '12'),
(27, 'bfa43c4b4b9c5f6130a58ac1bc9562a111a90488', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-12 08:03:46', '1', '1580', '12'),
(28, '09e9ec24a02c9f40bee5f5abbd513326bb67bb76', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-12 08:05:34', '1', '1580', '12'),
(29, '6202a056ad80234cc194e73ae252388d4199f857', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-12 08:06:18', '1', '1580', '12'),
(30, 'f0ab75cac778fe932026dd2ae11af8ba466ece52', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-12 08:07:21', '1', '1580', '12'),
(31, '2e3ab3dab3bd94870a817ccdbe36a82d5def8bb6', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Active', '2022-07-12 08:22:02', '1', '1580', '12'),
(32, 'dc165519bec4aaaeb66a5a6dd9ca66d265e4650d', '', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Active', '2022-07-13 08:32:05', '1', '1580', '12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryToken` varchar(255) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `categoryStatus` varchar(255) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryToken`, `categoryName`, `categoryDescription`, `categoryStatus`, `createDate`, `updateDate`) VALUES
(1, 'tzVWRRxCnm6', 'laptops', 'contains...', 'Active', '2022-05-09 05:54:34', ''),
(2, '8ky5o8cM1NY', 'desktops', 'contains...', 'Active', '2022-05-09 05:55:10', ''),
(3, 'NSOvtYWYlVy', 'accessories', 'contains...', 'Active', '2022-05-09 05:55:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `componentToken` varchar(255) NOT NULL,
  `componentName` varchar(255) NOT NULL,
  `componentStatus` varchar(255) NOT NULL,
  `componentCreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `componentUpdateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `componentToken`, `componentName`, `componentStatus`, `componentCreateDate`, `componentUpdateDate`) VALUES
(1, '953c9aacf6e93e414fd1b677b4a9a6c45b53203d', 'CPU', 'active', '2022-06-09 12:42:52', '09-06-2022 03:48:16 PM'),
(2, 'af6cf42bc5bc04cf6468351c9e500b502a939ba3', 'RAM', 'active', '2022-06-09 12:43:25', ''),
(3, '375d7c76aafddadc343a09eeda282233f37feb91', 'Case', 'active', '2022-06-09 12:43:35', ''),
(4, 'ded3ece7b72e5d89d7dab071b22fc0b474c2eeda', 'GPU', 'active', '2022-06-09 12:43:57', ''),
(5, '546fce2deb8a15e1c4abb074d9e93a33f1c9b916', 'board', 'active', '2022-06-09 12:44:09', ''),
(6, 'cea94c55322acdcadea2b5f0b6c6721583a3126f', 'mouse', 'inactive', '2022-06-09 12:44:18', '');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `couponToken` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `validDate` varchar(255) NOT NULL,
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `couponToken`, `name`, `type`, `discount`, `status`, `validDate`, `updateDate`) VALUES
(1, 'szGPge8dNPn', 'GB22', 'commercial', '5', 'active', '2022-05-30', '12-05-2022 12:30:52 PM'),
(2, '4HuoGka7dR4', 'AD3', 'marketing', '40', 'active', '2022-07-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currencyToken` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currencyToken`, `name`, `rate`, `status`, `createDate`, `updateDate`) VALUES
(1, '89cd74388d06255613490bf9d674d5ff2e7e3f55', 'LBP', '32000', 'inactive', '2022-05-23 10:01:28', '23-05-2022 01:04:54 PM');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderToken` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `orderStatus` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `toBeDelivered` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderToken`, `userEmail`, `productName`, `quantity`, `totalPrice`, `orderStatus`, `status`, `paymentMethod`, `orderDate`, `toBeDelivered`) VALUES
(1, '8e24b9b0b8325479070434d39a0ee98bbf9873ef', 'boutros.georges@aut.edu', 'lenovo legion 5', 2, 3013, 'Delivered', 'active', 'COD', '2022-06-30 07:17:30', '2022-07-31'),
(2, '06166e37aa4f065e95235cb2adefb72ae7ebfd97', 'boutros.georges@aut.edu', 'dell alienware area51m r1', 1, 2407, 'Requested', 'active', 'COD', '2022-06-30 07:17:51', '2022-08-05'),
(3, '1407e502953a2db4d6bcbb3ef64bb66bd0d76a1c', 'boutros.georges@aut.edu', 'dell alienware aurora r5', 1, 960, 'Requested', 'active', 'COD', '2022-06-30 07:36:19', '2022-08-06'),
(4, '884acfac4de63ca7f97acc9b15c248d26fdd50d4', 'boutros.georges@aut.edu', 'lenovo legion 5', 1, 1512, 'Requested', 'active', 'COD', '2022-07-05 12:17:10', '2022-07-31'),
(6, '75197ace17c8d07b31c35cdad9bff7f0d0002b75', 'boutros.georges@aut.edu', 'dell alienware area51m r1', 1, 955, 'Requested', 'active', 'COD', '2022-07-25 10:46:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderToken` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderToken`, `status`, `remark`, `postingDate`) VALUES
(1, '8e24b9b0b8325479070434d39a0ee98bbf9873ef', 'in Process', 'We are packing and checking your order.\r\nAll our drivers are busy, but once done we will deliver your product.\r\nMeanwhile Keep ordering from us Titan!', '2022-06-30 07:29:09'),
(2, '8e24b9b0b8325479070434d39a0ee98bbf9873ef', 'Delivered', 'Do not forget to give us your feedback on our products and continue buying from us!', '2022-07-01 06:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
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

INSERT INTO `productreviews` (`id`, `productName`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(1, '', 0, 0, 0, '', '', '', '2022-06-07 09:24:07'),
(2, '', 0, 0, 0, '', '', '', '2022-06-07 09:28:14'),
(3, '', 0, 0, 0, '', '', '', '2022-06-07 09:31:38'),
(4, '', 0, 0, 0, '', '', '', '2022-06-07 09:32:10'),
(5, '', 0, 0, 0, '', '', '', '2022-06-07 09:32:54'),
(6, '', 0, 0, 0, '', '', '', '2022-06-07 09:33:32'),
(7, '', 0, 0, 0, '', '', '', '2022-06-07 09:33:39'),
(8, '', 0, 0, 0, '', '', '', '2022-06-07 09:34:17'),
(9, '', 0, 0, 0, '', '', '', '2022-06-07 09:34:18'),
(10, '', 0, 0, 0, '', '', '', '2022-06-07 09:34:21'),
(11, '', 0, 0, 0, '', '', '', '2022-06-07 09:34:48'),
(12, '', 0, 0, 0, '', '', '', '2022-06-07 09:34:53'),
(13, '', 0, 0, 0, '', '', '', '2022-06-07 09:34:53'),
(14, '', 0, 0, 0, '', '', '', '2022-06-07 09:34:57'),
(15, '', 0, 0, 0, '', '', '', '2022-06-07 09:43:21'),
(16, '', 0, 0, 0, 'georges', 'good', 'awesome', '2022-06-07 09:43:41'),
(17, 'msi gT76', 0, 0, 0, 'georges', 'good', 'awesome', '2022-06-07 09:44:09'),
(18, 'msi gT76', 0, 0, 0, 'georges', 'good', 'awesome', '2022-06-07 09:44:19'),
(19, 'msi gT76', 5, 5, 5, 'georges', 'nice', 'Recommend', '2022-06-07 09:44:35'),
(20, 'acer predator helios 500 2021', 0, 0, 0, '', '', '', '2022-06-07 09:44:48'),
(21, 'dell alienware area51m r1', 0, 0, 0, '', '', '', '2022-06-07 09:44:51'),
(22, 'msi gT76', 0, 0, 0, '', '', '', '2022-06-07 09:44:54'),
(23, 'acer predator helios 500 2021', 0, 0, 0, '', '', '', '2022-06-08 14:52:08'),
(24, 'dell alienware area51-m r1', 0, 0, 0, '', '', '', '2022-06-22 07:20:10'),
(25, 'dell alienware area51m r1', 0, 0, 0, '', '', '', '2022-06-27 08:04:07'),
(26, 'dell alienware area51m r1', 0, 0, 0, '', '', '', '2022-07-02 20:33:06'),
(27, 'lenovo legion 5', 0, 0, 0, '', '', '', '2022-07-02 20:33:19'),
(28, 'lenovo legion 5', 0, 0, 0, '', '', '', '2022-07-07 10:57:00'),
(29, 'lenovo legion 5', 0, 0, 0, '', '', '', '2022-07-07 14:08:24'),
(30, 'lenovo legion 5', 0, 0, 0, '', '', '', '2022-07-18 12:07:31'),
(31, 'acer predator helios 500 2021', 0, 0, 0, '', '', '', '2022-09-01 14:00:19'),
(32, 'acer predator helios 500 2021', 0, 0, 0, '', '', '', '2022-09-01 14:00:27');

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
  `quantity` int(11) NOT NULL,
  `productTypeName` varchar(255) NOT NULL,
  `productFeatured` int(11) NOT NULL,
  `productStatus` varchar(255) NOT NULL,
  `productViews` int(11) NOT NULL,
  `postDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryName`, `subcategoryName`, `productToken`, `productName`, `productCompany`, `productCompanyURL`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `quantity`, `productTypeName`, `productFeatured`, `productStatus`, `productViews`, `postDate`, `updateDate`) VALUES
(1, 'laptops', 'gaming laptops', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'dell alienware area51m r1', 'dell', 'https://www.dell.com', 4000, 4500, '	core i9 				', 'Presentation1.png', 'area51m1.png', 'area51m3.png', 12, 'In Stock', 0, 'desktop replacement', 1, 'Active', 12431, '2022-06-22 07:21:22', ''),
(2, 'laptops', 'gaming laptops', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'lenovo legion 5', 'lenovo', 'https://www.lenovo.com', 1580, 1780, 'core i9 					', 'lenovo-legion-7i-46.gif', 'lenovo.png', 'lenovo1.png', 12, 'In Stock', 0, 'mid end gaming', 1, 'Active', 1244, '2022-06-22 07:22:14', ''),
(3, 'laptops', 'gaming laptops', '140206033ac5fd1d1bedb92be3291dd72fae31f2', 'acer predator helios 500 2021', 'acer', 'https://www.acer.com', 2310, 2500, 'core i9					', 'acer1.png', 'acer1.jfif', 'acer500-removebg-preview.png', 12, 'In Stock', 0, 'high end gaming', 1, 'Active', 123, '2022-06-30 07:35:17', ''),
(4, 'desktops', 'gaming desktops', '1461a106a067723341f0d5ae75cefeae8d654e5f', 'dell alienware aurora r5', 'dell', 'https://www.dell.com', 1000, 1200, '		core i7			', 'aurora1.png', 'aurora2.jfif', 'aurora3.jfif', 10, 'In Stock', 0, 'mid end gaming', 1, 'Active', 12, '2022-06-30 07:36:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productType` varchar(255) NOT NULL,
  `productTypeDescription` longtext NOT NULL,
  `productTypeStatus` varchar(255) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`id`, `productName`, `productType`, `productTypeDescription`, `productTypeStatus`, `createDate`, `updateDate`) VALUES
(1, 'dell alienware area51m r1', 'desktop replacement', 'A desktop in disguise ', 'Active', '2022-05-04 13:33:20', '13-05-2022 08:50:49 AM'),
(2, 'msi gT76', 'high end gaming', 'high end', 'Active', '2022-05-30 07:41:03', '30-05-2022 10:43:19 AM');

-- --------------------------------------------------------

--
-- Table structure for table `requestproduct`
--

CREATE TABLE `requestproduct` (
  `id` int(11) NOT NULL,
  `requestToken` varchar(255) NOT NULL,
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

INSERT INTO `requestproduct` (`id`, `requestToken`, `userEmail`, `brand`, `series`, `description`, `requestStatus`, `requestAvailability`, `requestDate`, `updateDate`) VALUES
(1, '', 'boutros.georges513@gmail.com', 'dell', 'alienware 17r5', 'STHG\r\n', 'successful', 1, '2022-03-28 08:22:43', ''),
(2, '', 'boutros.georges@aut.edu', 'dell', 'alienware 17r5', 'core i9 32gb ram', 'done', 0, '2022-05-05 06:16:15', ''),
(3, '', 'boutros.georges@aut.edu', 'dell', 'alienware 17r5', 'core i9, 32gb ram, gtx 1080 8GB, 17.3inch, 120HZ, 2K display, ', 'successful', 1, '2022-05-30 07:05:28', '');

-- --------------------------------------------------------

--
-- Table structure for table `requestproducthistory`
--

CREATE TABLE `requestproducthistory` (
  `id` int(11) NOT NULL,
  `requestID` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestproducthistory`
--

INSERT INTO `requestproducthistory` (`id`, `requestID`, `status`, `remark`, `postingDate`) VALUES
(1, 2, 'searching', 'ASD', '2022-05-06 10:31:25'),
(2, 2, 'done', 'FOUND!', '2022-05-06 10:31:42');

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
  `subcategoryStatus` varchar(255) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryToken`, `categoryName`, `subcategoryToken`, `subcategoryName`, `subcategoryDescription`, `subcategoryStatus`, `createDate`, `updateDate`) VALUES
(1, 'tzVWRRxCnm6', 'laptops', '3Cdhiqi9vGU', 'gaming laptops', 'contains...', 'Active', '2022-05-09 05:54:44', ''),
(2, 'tzVWRRxCnm6', 'laptops', 'pabMjyySqYD', 'non gaming laptops', 'contains...', 'Active', '2022-05-09 05:54:58', ''),
(3, '8ky5o8cM1NY', 'desktops', '37kDrwSJ6sK', 'gaming desktops', 'contains...', 'Active', '2022-05-09 05:55:19', ''),
(4, '8ky5o8cM1NY', 'desktops', '8KcqFiS71hH', 'non gaming desktops', 'contains...', 'Active', '2022-05-09 05:55:36', ''),
(5, '8ky5o8cM1NY', 'desktops', 'RHy4Ck0y7LE', 'custom desktops', 'contains...', 'Active', '2022-05-09 05:55:45', ''),
(6, 'NSOvtYWYlVy', 'accessories', 'YvjVPA6Ilj2', 'gaming accessories', 'contains...', 'Active', '2022-05-09 05:56:01', ''),
(7, 'NSOvtYWYlVy', 'accessories', 'nRE8TmzHFo4', 'non gaming accessories ', 'contains...', 'Active', '2022-05-09 05:56:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcomponents`
--

CREATE TABLE `subcomponents` (
  `id` int(11) NOT NULL,
  `componentToken` varchar(255) NOT NULL,
  `componentName` varchar(255) NOT NULL,
  `subcomponentToken` varchar(255) NOT NULL,
  `subcomponentName` varchar(255) NOT NULL,
  `subcomponentGen` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `subcomponentStatus` varchar(255) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcomponents`
--

INSERT INTO `subcomponents` (`id`, `componentToken`, `componentName`, `subcomponentToken`, `subcomponentName`, `subcomponentGen`, `image`, `price`, `subcomponentStatus`, `createDate`, `updateDate`) VALUES
(1, '375d7c76aafddadc343a09eeda282233f37feb91', 'Case', '109a4b428021fbbf87a338813b3558774d024970', 'fourze ', 'T900', 'fourzet900atx.png', '8', 'Active', '2022-06-27 07:14:46', ''),
(2, '953c9aacf6e93e414fd1b677b4a9a6c45b53203d', 'CPU', 'd9ef33ff7c53ed3fab85b55e7d29b4a984a2faf4', 'fourze ', 'T9008', 'fourzet900atx.png', '15', 'Active', '2022-06-29 07:53:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `titleToken` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleStatus` varchar(255) NOT NULL,
  `selected` varchar(255) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `titleToken`, `title`, `titleStatus`, `selected`, `createDate`, `updateDate`) VALUES
(1, 'b82iuTYUkzE', 't games', 'inactive', 'No', '2022-05-09 05:43:22', '09-05-2022 08:43:50 AM'),
(2, 'D583pFrYKxg', 'Titan Gamers', 'active', 'Yes', '2022-05-09 05:43:34', '09-05-2022 08:44:04 AM');

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
(6, 'boutros.georges513@gmail.com', 0, '1', '2022-03-28 08:03:51', '01-07-2022 09:19:19 AM'),
(7, 'boutros.georges@aut.edu', 0, '1', '2022-05-09 13:44:27', ''),
(8, 'boutros.georges@aut.edu', 0, '1', '2022-05-20 12:42:53', '20-05-2022 03:59:49 PM'),
(9, 'boutros.georges@aut.edu', 0, '1', '2022-05-20 13:00:02', ''),
(10, 'boutros.georges@aut.edu', 0, '1', '2022-05-20 19:57:13', ''),
(11, 'boutros.georges@aut.edu', 0, '1', '2022-05-21 10:16:41', '21-05-2022 01:44:57 PM'),
(12, 'boutros.georges@aut.edu', 0, '1', '2022-05-21 10:46:28', '21-05-2022 01:46:46 PM'),
(13, 'boutros.georges@aut.edu', 0, '1', '2022-05-21 10:47:01', '21-05-2022 01:53:06 PM'),
(14, 'boutros.georges@aut.edu', 0, '1', '2022-05-21 10:53:14', ''),
(15, 'boutros.georges@aut.edu', 0, '1', '2022-05-22 02:49:59', ''),
(16, 'boutros.georges@aut.edu', 0, '1', '2022-05-23 13:45:32', '23-05-2022 05:51:17 PM'),
(17, 'boutros.georges@aut.edu', 0, '1', '2022-05-23 14:54:56', '23-05-2022 05:57:31 PM'),
(18, 'boutros.georges@aut.edu', 0, '1', '2022-05-23 14:57:37', ''),
(19, 'boutros.georges@aut.edu', 0, '1', '2022-05-24 06:26:18', ''),
(20, 'boutros.georges@aut.edu', 0, '1', '2022-05-24 07:31:47', ''),
(21, 'boutros.georges@aut.edu', 0, '1', '2022-05-24 07:32:13', '24-05-2022 10:32:56 AM'),
(22, 'boutros.georges@aut.edu', 0, '1', '2022-05-24 07:33:01', '24-05-2022 10:33:34 AM'),
(23, 'boutros.georges@aut.edu', 0, '1', '2022-05-24 07:33:39', '24-05-2022 10:43:23 AM'),
(24, 'boutros.georges@aut.edu', 0, '1', '2022-05-24 13:24:58', ''),
(25, 'boutros.georges@aut.edu', 0, '1', '2022-05-24 19:17:01', ''),
(26, 'boutros.georges@aut.edu', 0, '1', '2022-05-25 06:45:05', '25-05-2022 10:00:07 AM'),
(27, 'boutros.georges@aut.edu', 0, '1', '2022-05-25 07:00:12', '25-05-2022 11:43:27 AM'),
(28, 'boutros.georges@aut.edu', 0, '1', '2022-05-25 08:43:33', ''),
(29, 'boutros.georges@aut.edu', 0, '1', '2022-05-25 12:34:17', '25-05-2022 04:40:36 PM'),
(30, 'boutros.georges@aut.edu', 0, '1', '2022-05-25 13:40:49', ''),
(31, 'boutros.georges@aut.edu', 0, '1', '2022-05-26 05:58:10', ''),
(32, 'boutros.georges@aut.edu', 0, '1', '2022-05-26 12:27:53', ''),
(33, 'boutros.georges@aut.edu', 0, '1', '2022-05-27 06:13:05', ''),
(34, 'boutros.georges@aut.edu', 0, '1', '2022-05-27 13:00:15', ''),
(35, 'boutros.georges@aut.edu', 0, '1', '2022-05-28 04:49:13', ''),
(36, 'boutros.georges@aut.edu', 0, '1', '2022-05-28 10:01:11', ''),
(37, 'boutros.georges@aut.edu', 0, '1', '2022-05-30 06:55:42', ''),
(38, 'boutros.georges@aut.edu', 0, '1', '2022-05-31 07:28:39', ''),
(39, 'boutros.georges@aut.edu', 0, '1', '2022-06-02 07:45:23', ''),
(40, 'boutros.georges@aut.edu', 0, '1', '2022-06-02 09:33:27', ''),
(41, 'boutros.georges@aut.edu', 0, '1', '2022-06-02 12:56:25', ''),
(42, 'boutros.georges@aut.edu', 0, '1', '2022-06-02 13:12:28', ''),
(43, 'boutros.georges@aut.edu', 0, '1', '2022-06-03 07:28:38', ''),
(44, 'boutros.georges@aut.edu', 0, '1', '2022-06-06 12:09:15', ''),
(45, 'boutros.georges@aut.edu', 0, '1', '2022-06-07 07:13:34', ''),
(46, 'boutros.georges@aut.edu', 0, '1', '2022-06-08 12:48:20', ''),
(47, 'boutros.georges@aut.edu', 0, '1', '2022-06-17 07:27:50', ''),
(48, 'boutros.georges@aut.edu', 0, '1', '2022-06-30 07:17:16', ''),
(49, 'boutros.georges@aut.edu', 0, '1', '2022-06-30 07:32:20', ''),
(50, 'boutros.georges@aut.edu', 0, '1', '2022-07-01 06:05:24', ''),
(51, 'boutros.georges@aut.edu', 0, '1', '2022-07-01 06:19:52', ''),
(52, 'boutros.georges@aut.edu', 0, '1', '2022-07-01 06:25:25', '01-07-2022 09:26:52 AM'),
(53, 'boutros.georges@aut.edu', 0, '1', '2022-07-01 06:27:09', '01-07-2022 10:34:09 AM'),
(54, 'boutros.georges@aut.edu', 0, '1', '2022-07-01 13:58:03', ''),
(55, 'boutros.georges@aut.edu', 0, '1', '2022-07-05 12:06:36', ''),
(56, 'boutros.georges@aut.edu', 0, '1', '2022-07-07 10:01:26', ''),
(57, 'boutros.georges@aut.edu', 0, '1', '2022-07-12 06:06:04', ''),
(58, 'boutros.georges@aut.edu', 0, '1', '2022-07-13 08:32:18', ''),
(59, 'boutros.georges@aut.edu', 0, '1', '2022-07-14 06:16:14', ''),
(60, 'boutros.georges@aut.edu', 0, '1', '2022-07-18 07:39:58', ''),
(61, 'boutros.georges@aut.edu', 0, '1', '2022-07-18 12:06:19', ''),
(62, 'boutros.georges@aut.edu', 0, '1', '2022-07-19 12:16:51', ''),
(63, 'boutros.georges@aut.edu', 0, '1', '2022-07-22 07:12:35', ''),
(64, 'boutros.georges@aut.edu', 0, '1', '2022-07-22 09:28:21', ''),
(65, 'boutros.georges@aut.edu', 0, '1', '2022-07-22 10:31:58', '22-07-2022 02:30:12 PM'),
(66, 'boutros.georges@aut.edu', 0, '1', '2022-07-22 11:30:18', ''),
(67, 'boutros.georges@aut.edu', 0, '1', '2022-07-22 11:52:10', ''),
(68, 'boutros.georges@aut.edu', 0, '1', '2022-07-22 14:57:54', ''),
(69, 'boutros.georges@aut.edu', 0, '1', '2022-07-25 06:39:55', ''),
(70, 'boutros.georges@aut.edu', 0, '1', '2022-07-25 10:19:43', ''),
(71, 'boutros.georges@aut.edu', 0, '1', '2022-07-26 07:51:41', ''),
(72, 'boutros.georges@aut.edu', 0, '1', '2022-07-26 13:29:03', ''),
(73, 'boutros.georges@aut.edu', 0, '1', '2022-08-05 10:01:39', ''),
(74, 'boutros.georges@aut.edu', 0, '1', '2022-09-10 11:34:30', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userToken` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `shippingAddress` longtext NOT NULL,
  `shippingState` varchar(255) NOT NULL,
  `shippingCity` varchar(255) NOT NULL,
  `shippingPinCode` int(11) NOT NULL,
  `donationCoupon` varchar(255) NOT NULL,
  `code` mediumint(9) NOT NULL,
  `status` text NOT NULL,
  `userStatus` varchar(255) NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userToken`, `name`, `email`, `phone`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPinCode`, `donationCoupon`, `code`, `status`, `userStatus`, `registrationDate`, `updateDate`) VALUES
(1, '', 'georges', 'boutros.georges@aut.edu', '76126703', '$2y$10$pdU0iP.e9RfrImYfUOTLH.sqbaFvyZPvTgWnAOxz2C3u3y1kWKhgm', 'main road, facing bLC bank', 'north lebanon', 'chekka jdideh', 0, '', 0, 'verified', '1', '2022-05-20 09:28:24', ''),
(2, '', 'sb', 'sb@gmail.com', '76126703', '$2y$10$a.nDuj6jfO.mFyMqOBoFxOSuTf1bWp9/Ar7JlXn.BTbFGxEfQOgj2', '', '', '', 0, '', 247904, 'notverified', '1', '2022-06-14 14:04:37', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `wishToken` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `productToken` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `wishToken`, `userEmail`, `productToken`, `status`, `date`) VALUES
(1, 'b51a11e2fa3b79b60fe78133154accce4f413e91', 'boutros.georges@aut.edu', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'Inactive', '2022-05-24 13:25:30'),
(2, 'b89e9615a1a47738c0429771e306269622ce44b4', 'boutros.georges@aut.edu', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'Inactive', '2022-05-25 07:07:01'),
(3, 'a5902925ef667ce410aced8de3df98d337192b57', 'boutros.georges@aut.edu', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'Inactive', '2022-05-25 08:15:01'),
(4, 'a106d3b78af11ea5e26f380bd90f33708c9f5e55', 'boutros.georges@aut.edu', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'Inactive', '2022-05-25 13:16:34'),
(5, 'f24e2ac0ee68d0b96cd9e7b3c7840e13f3dff6c3', 'boutros.georges@aut.edu', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'Inactive', '2022-05-27 06:58:36'),
(6, '43b245cf664992b23cfc72170cd2174301442b87', 'boutros.georges@aut.edu', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'Inactive', '2022-05-27 06:58:42'),
(7, 'f9868ac63ad16558f78a6cf155d3bcf275338bcd', 'boutros.georges@aut.edu', '7a45e05a5979082c405f81fbecbd04c9f3cdf62b', 'Inactive', '2022-05-27 06:58:46'),
(8, '034380f74d4d54e23ab127a90b64447206227ed3', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-07-07 10:08:16'),
(9, 'edc65c3e07845522e367b2834b1e0e126f37e8bd', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-07-07 10:08:18'),
(10, '2405213f3b9f4affdfd24166f1c69a0343e2b36e', 'boutros.georges@aut.edu', '1461a106a067723341f0d5ae75cefeae8d654e5f', 'Inactive', '2022-07-07 10:08:20'),
(11, '7de8d2588dae58dc04aaab73cf7b77723ba7fbaa', 'boutros.georges@aut.edu', '140206033ac5fd1d1bedb92be3291dd72fae31f2', 'Inactive', '2022-07-07 10:08:23'),
(12, '9f194709177e1310007be7b531b1efb88732158f', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Active', '2022-07-14 06:29:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
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
-- Indexes for table `requestproducthistory`
--
ALTER TABLE `requestproducthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcomponents`
--
ALTER TABLE `subcomponents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requestproduct`
--
ALTER TABLE `requestproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requestproducthistory`
--
ALTER TABLE `requestproducthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcomponents`
--
ALTER TABLE `subcomponents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
