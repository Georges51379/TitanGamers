-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 12:03 PM
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
  `cartCode` varchar(255) NOT NULL,
  `cartToken` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `productToken` varchar(255) NOT NULL,
  `cartStatus` varchar(255) NOT NULL,
  `isCartEmpty` varchar(255) NOT NULL,
  `cartDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `shippingCharge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cartCode`, `cartToken`, `userEmail`, `productToken`, `cartStatus`, `isCartEmpty`, `cartDate`, `quantity`, `price`, `shippingCharge`) VALUES
(1, '5717880905', 'dd7b65838abe45b0a1cd3997be45fccb387c4579', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', 'Unlocked', '2022-12-09 09:50:44', '2', '1580', '12'),
(2, '5967703420', '5d939345a4cbe5961b2e7c1f5096ee984c59ae32', 'boutros.georges@aut.edu', '140206033ac5fd1d1bedb92be3291dd72fae31f2', 'Inactive', 'Unlocked', '2022-12-09 10:06:10', '1', '2310', '12'),
(3, '9091211526', 'e76940689b8003e39cf7a53374fcb885edb63b38', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', 'Unlocked', '2022-12-09 10:06:17', '1', '4000', '12'),
(4, '3695348689', '062c3d76b93c2b201a12848ad1a4d05a3bef8f90', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', 'Unlocked', '2022-12-09 11:39:50', '1', '1580', '12'),
(5, '3115455485', '371b8527713c88bdf7ee301fb4af36e0d37c8ede', '', '1461a106a067723341f0d5ae75cefeae8d654e5f', 'Inactive', 'No', '2022-12-30 08:21:45', '1', '1000', '10'),
(6, '3666865722', 'a7fcd0f7d7f997982becaea9bc78d0dd3ba87c51', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Active', 'No', '2023-01-03 09:25:00', '1', '1580', '12'),
(7, '8570969737', '852187b51bd84e7a883441812177863b28bebfd4', 'boutros.georges@aut.edu', '140206033ac5fd1d1bedb92be3291dd72fae31f2', 'Active', 'Unlocked', '2023-01-03 09:50:18', '1', '2310', '12');

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
  `couponStatus` varchar(255) NOT NULL,
  `validDate` varchar(255) NOT NULL,
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `couponToken`, `name`, `type`, `discount`, `couponStatus`, `validDate`, `updateDate`) VALUES
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
(2, '06166e37aa4f065e95235cb2adefb72ae7ebfd97', 'boutros.georges@aut.edu', 'dell alienware area51m r1', 1, 2407, 'Requested', 'active', 'COD', '2022-06-30 07:17:51', '2022-10-31'),
(3, '1407e502953a2db4d6bcbb3ef64bb66bd0d76a1c', 'boutros.georges@aut.edu', 'dell alienware aurora r5', 1, 960, 'Requested', 'active', 'COD', '2022-06-30 07:36:19', '2022-08-06'),
(4, '884acfac4de63ca7f97acc9b15c248d26fdd50d4', 'boutros.georges@aut.edu', 'lenovo legion 5', 1, 1512, 'Requested', 'active', 'COD', '2022-07-05 12:17:10', '2022-07-31'),
(6, '75197ace17c8d07b31c35cdad9bff7f0d0002b75', 'boutros.georges@aut.edu', 'dell alienware area51m r1', 1, 955, 'Requested', 'active', 'COD', '2022-07-25 10:46:47', '2022-02-15'),
(7, '7088cc5fcb1c46748eb1814b40809b959783b53f', 'boutros.georges@aut.edu', 'lenovo legion 5', 2, 955, 'Requested', 'active', 'COD', '2022-11-29 14:21:30', '2023-01-07'),
(8, '76b096de183eaf85347d26c506d118a120e502c3', 'boutros.georges@aut.edu', 'dell alienware aurora r5', 2, 1206, 'active', '', 'COD', '2022-11-30 09:33:37', '2022-12-16'),
(9, '9882c8db89b8fa4d4a8eb1abd7420dddc003e1c1', 'boutros.georges@aut.edu', '', 1, 955, 'active', '', 'COD', '2022-12-29 07:41:57', NULL),
(10, '41d97b3f6d396bf5010c5c143430dcf68958aa57', 'boutros.georges@aut.edu', 'lenovo legion 5', 2, 1903, 'active', '', 'COD', '2022-12-29 07:48:01', NULL),
(11, '1cd672210b663129092fcb528bf78d14c68c9c4c', 'boutros.georges@aut.edu', 'acer predator helios 500 2021', 1, 1393, 'Requested', 'active', 'COD', '2022-12-29 07:50:42', NULL),
(12, '49ddae9c3f776e26c49e2c1310c48b97a49ed4d9', 'boutros.georges@aut.edu', 'dell alienware area51m r1', 1, 2407, 'Requested', 'active', 'COD', '2022-12-29 07:52:21', NULL),
(13, '652fc230bc7295e8775af30623309f63aef5ef79', 'boutros.georges@aut.edu', 'acer predator helios 500 2021', 1, 1393, 'Requested', 'active', 'COD', '2022-12-30 13:29:24', NULL),
(14, '5d3ceb0e68dd5179fdc9d4058cba21f79400b47a', 'boutros.georges@aut.edu', 'dell alienware area51m r1', 1, 2407, 'Requested', 'active', 'COD', '2022-12-30 13:32:05', NULL);

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
(4, 'desktops', 'gaming desktops', '1461a106a067723341f0d5ae75cefeae8d654e5f', 'dell alienware aurora r5', 'dell', 'https://www.dell.com', 1000, 1200, '		core i7			', 'aurora1.png', 'aurora2.jfif', 'aurora3.jfif', 10, 'In Stock', 0, 'mid end gaming', 1, 'Active', 12, '2022-06-30 07:36:03', ''),
(5, 'accessories', 'gaming accessories', '0853917f0b5980f34b31bd54f1848159b10b80bb', 'corsair gaming keyboard', 'corsair', 'www.corsair.com', 42, 45, 'mechanical keyboard					', 'corsair.jfif', 'corsair.png', 'corsair1.jfif', 1, 'In Stock', 0, 'mid end gaming', 1, 'Active', 12, '2022-12-29 08:34:42', ''),
(6, 'laptops', 'gaming laptops', '4e46323b2131f9cb7a265cc5c82cf1e52f92a3ec', 'msi gt76 titan', 'msi', 'www.msi.com', 2340, 2450, '			core i9 		', 'msi3.png', 'msi2.png', 'msi.png', 8, 'In Stock', 0, 'desktop replacement', 1, 'Active', 432, '2023-01-03 09:59:57', '');

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
(3, '', 'boutros.georges@aut.edu', 'dell', 'alienware 17r5', 'core i9, 32gb ram, gtx 1080 8GB, 17.3inch, 120HZ, 2K display, ', 'done', 1, '2022-05-30 07:05:28', '');

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
(2, 'D583pFrYKxg', 'Titan ', 'active', 'Yes', '2022-05-09 05:43:34', '09-05-2022 08:44:04 AM');

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
(74, 'boutros.georges@aut.edu', 0, '1', '2022-09-10 11:34:30', ''),
(75, 'boutros.georges@aut.edu', 0, '1', '2022-10-19 07:03:06', '19-10-2022 10:24:33 AM'),
(76, 'boutros.georges@aut.edu', 0, '1', '2022-10-19 07:28:22', '19-10-2022 04:20:08 PM'),
(77, 'boutros.georges@aut.edu', 0, '1', '2022-10-19 13:20:20', ''),
(78, 'boutros.georges@aut.edu', 0, '1', '2022-10-20 12:22:11', ''),
(79, 'boutros.georges@aut.edu', 0, '1', '2022-10-26 12:59:54', ''),
(80, 'boutros.georges@aut.edu', 0, '1', '2022-10-27 07:43:28', '27-10-2022 10:59:55 AM'),
(81, 'boutros.georges@aut.edu', 0, '1', '2022-10-27 08:00:02', ''),
(82, 'boutros.georges@aut.edu', 127, '1', '2022-10-27 08:25:04', ''),
(83, 'boutros.georges@aut.edu', 127, '1', '2022-10-27 08:30:37', ''),
(84, 'boutros.georges@aut.edu', 0, '1', '2022-10-28 06:08:13', ''),
(85, 'boutros.georges@aut.edu', 127, '1', '2022-10-28 06:34:17', ''),
(86, 'boutros.georges@aut.edu', 127, '1', '2022-10-28 07:35:33', ''),
(87, 'boutros.georges@aut.edu', 0, '1', '2022-11-03 12:32:27', ''),
(88, 'boutros.georges@aut.edu', 0, '1', '2022-11-04 08:51:00', '04-11-2022 11:24:39 AM'),
(89, 'boutros.georges@aut.edu', 0, '1', '2022-11-11 18:37:51', ''),
(90, 'boutros.georges@aut.edu', 0, '1', '2022-11-22 09:22:14', ''),
(91, 'boutros.georges@aut.edu', 0, '1', '2022-11-24 06:58:19', ''),
(92, 'boutros.georges@aut.edu', 0, '1', '2022-11-26 07:41:40', ''),
(93, 'boutros.georges@aut.edu', 0, '1', '2022-11-27 12:03:29', ''),
(94, 'boutros.georges@aut.edu', 0, '1', '2022-11-28 06:30:30', '28-11-2022 09:20:51 AM'),
(95, 'boutros.georges@aut.edu', 0, '1', '2022-11-28 07:20:58', ''),
(96, 'boutros.georges@aut.edu', 0, '1', '2022-11-28 20:54:02', ''),
(97, 'boutros.georges@aut.edu', 0, '1', '2022-11-29 06:16:07', ''),
(98, 'boutros.georges@aut.edu', 0, '1', '2022-11-29 13:37:48', ''),
(99, 'boutros.georges@aut.edu', 0, '1', '2022-11-30 09:14:09', ''),
(100, 'boutros.georges@aut.edu', 0, '1', '2022-12-01 13:35:27', ''),
(101, 'boutros.georges@aut.edu', 0, '1', '2022-12-02 13:02:10', ''),
(102, 'boutros.georges@aut.edu', 0, '1', '2022-12-08 07:03:15', ''),
(103, 'boutros.georges@aut.edu', 0, '1', '2022-12-09 07:44:51', '09-12-2022 04:49:43 PM'),
(104, 'boutros.georges@aut.edu', 0, '1', '2022-12-09 14:49:58', ''),
(105, 'boutros.georges@aut.edu', 0, '1', '2022-12-11 09:54:05', ''),
(106, 'boutros.georges@aut.edu', 0, '1', '2022-12-13 13:54:31', ''),
(107, 'boutros.georges@aut.edu', 0, '1', '2022-12-14 07:17:51', ''),
(108, 'boutros.georges@aut.edu', 0, '1', '2022-12-15 07:26:56', ''),
(109, 'boutros.georges@aut.edu', 0, '1', '2022-12-15 21:30:49', '15-12-2022 11:31:00 PM'),
(110, 'boutros.georges@aut.edu', 0, '1', '2022-12-15 21:31:15', ''),
(111, 'boutros.georges@aut.edu', 0, '1', '2022-12-16 07:48:24', ''),
(112, 'boutros.georges@aut.edu', 0, '1', '2022-12-16 08:38:32', ''),
(113, 'boutros.georges@aut.edu', 0, '1', '2022-12-21 10:23:03', ''),
(114, 'boutros.georges@aut.edu', 0, '1', '2022-12-22 08:20:45', ''),
(115, 'boutros.georges@aut.edu', 0, '1', '2022-12-23 13:31:29', ''),
(116, 'boutros.georges@aut.edu', 0, '1', '2022-12-27 06:34:00', ''),
(117, 'boutros.georges@aut.edu', 0, '1', '2022-12-28 07:37:11', ''),
(118, 'boutros.georges@aut.edu', 0, '1', '2022-12-29 07:05:22', ''),
(119, 'boutros.georges@aut.edu', 0, '1', '2022-12-30 08:22:11', ''),
(120, 'boutros.georges@aut.edu', 0, '1', '2023-01-03 06:55:10', ''),
(121, 'boutros.georges@aut.edu', 0, '1', '2023-01-05 07:42:12', ''),
(122, 'boutros.georges@aut.edu', 127, '1', '2023-01-05 11:54:00', ''),
(123, 'boutros.georges@aut.edu', 0, '1', '2023-01-25 14:23:12', '25-01-2023 04:24:10 PM');

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
  `tokenStatus` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `wishToken`, `userEmail`, `productToken`, `tokenStatus`, `date`) VALUES
(1, '6ba37297c50be982222337fdefac6596b59d5d7d', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-29 13:39:20'),
(2, '505999c12efc941f719b5a30a1bafc290b3561a5', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-29 13:39:25'),
(3, 'd0112f0671d30b105598732e75ff8b1a87e20cf5', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-29 13:39:58'),
(4, 'fc52a2cae3161c89d5e145f27d40ca895c152eac', 'boutros.georges@aut.edu', '1461a106a067723341f0d5ae75cefeae8d654e5f', 'Inactive', '2022-11-29 13:43:55'),
(5, '28146c477ec846a335545ddc396092c992ff9bcc', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-29 13:56:39'),
(6, '5766607b3e8d2396c3c1eef04ea115a35bb83874', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-29 14:10:58'),
(7, 'e8754b8e1ed5e8a9c586b92ca3641ac8087d4367', 'boutros.georges@aut.edu', '140206033ac5fd1d1bedb92be3291dd72fae31f2', 'Inactive', '2022-11-29 14:12:14'),
(8, '87303a9b2b6533def1fe4729b1fd7a9e6b470570', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-29 14:12:26'),
(9, '26d75cc7cdf2764c2d28fd01a6fd5b96fab41834', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-29 14:14:24'),
(10, 'f1cf1ab54dfacee94b2b88ad579f510d36eeb648', 'boutros.georges@aut.edu', '140206033ac5fd1d1bedb92be3291dd72fae31f2', 'Inactive', '2022-11-29 14:14:38'),
(11, '1a43665ee5a0f331876018222d9af39a98b20a13', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-11-29 14:15:08'),
(12, '6d14a3572906c3c5b9f00e1cf9823de38dadbe23', 'boutros.georges@aut.edu', '1461a106a067723341f0d5ae75cefeae8d654e5f', 'Inactive', '2022-11-29 14:15:18'),
(13, '5a87667598afb860f0e7a7ba3e28595480537cd3', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-29 14:15:57'),
(14, '7c7ecdf39db1f02a9a7b3b3387d86939415d115d', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-11-29 14:16:00'),
(15, '942cb74e96c60b864d7ca839ea6becfdcf8148df', 'boutros.georges@aut.edu', '140206033ac5fd1d1bedb92be3291dd72fae31f2', 'Inactive', '2022-11-29 14:16:10'),
(16, '618438ab1d90ff817c1b1db482c1ee190e47d5c1', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-29 14:16:19'),
(17, 'a15b775dc5b31df15b0fbfcc9f9d8baa0d010c03', 'boutros.georges@aut.edu', 'f19b06f56731e5d1c1cbdc672c902fa0b505aea6', 'Inactive', '2022-11-29 14:16:23'),
(18, '284585a52db8608c2cf0421c46b3addf416afead', 'boutros.georges@aut.edu', '1461a106a067723341f0d5ae75cefeae8d654e5f', 'Inactive', '2022-11-29 14:16:26'),
(19, '698ec32f17ae7c19450dd2b07415d476b75813cd', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-11-30 09:19:58'),
(20, '462bbfc21a4dd71fc770f73c503a5775aabc4e7e', 'boutros.georges@aut.edu', '2ae476f8607cc4e6c94e4059f7639c7210937b00', 'Inactive', '2022-12-09 14:48:09'),
(21, '1c1b5a2c773e529a9ba0cb890997fef8695b0e7d', 'boutros.georges@aut.edu', '0853917f0b5980f34b31bd54f1848159b10b80bb', 'Inactive', '2022-12-30 08:22:21');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
