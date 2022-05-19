-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 10:16 AM
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
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2017-01-24 16:21:18', '01-12-2021 08:22:13 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Laptops', 'contains gaming, non gaming laptops', '2021-12-01 18:33:36', '05-02-2022 08:20:18 AM'),
(2, 'desktops', 'contains gaming and non gaming desktops plus the custom PC', '2021-12-01 18:33:53', NULL),
(3, 'accessories', 'contains gaming and non gaming accessories', '2021-12-01 18:34:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laptype`
--

CREATE TABLE `laptype` (
  `typeID` int(150) NOT NULL,
  `typeName` varchar(255) NOT NULL,
  `typeDescription` varchar(255) NOT NULL,
  `typeCreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `typeUpdationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laptype`
--

INSERT INTO `laptype` (`typeID`, `typeName`, `typeDescription`, `typeCreationDate`, `typeUpdationDate`) VALUES
(1, 'low-end gaming laptop', 'Sometimes referred to as ultraportable or ultrathin, the lightweight laptop is twice the size of a netbook, yet it still feels light and easy to carry. This category offers a perfect balance of performance and portability, especially for frequent flyers. ', '2021-12-17 09:46:04', '05-02-2022 08:19:04 AM'),
(2, 'Everyday Computing', 'Also called a midsize or mainstream notebook, this category falls into the broad middle in terms of weight, screen size, technology, and price. A few models have top-shelf features such as a 17.3-inch diagonal widescreen or powerful processor. The everyda', '2021-12-17 09:46:04', ''),
(3, ' Business', 'Though this category of laptop doesn’t need to handle the demands of gaming or HD movies, it does need a processor that can juggle all the apps of an office suite. It also should have long battery life to hold its charge during extended stretches on the r', '2021-12-17 09:46:04', ''),
(4, 'entertainment', 'These media-centric laptops can serve as the center of your digital-entertainment world while also helping you power through schoolwork in style. Thanks to their awesome built-in speakers with sound enhancement technologies and Blu-ray™ player you’ll be a', '2021-12-17 09:46:04', ''),
(5, 'desktop replacement', 'This portable delivers a full PC experience. It offers a comfortable keyboard, large hard drive, a huge screen and great system memory. The stereo speakers are loud and rich, plus you’ll find exciting emerging mobile technology such as Intel Wireless Disp', '2021-12-17 09:46:04', ''),
(8, 'convertible ', 'contains convertible laptops 2 in 1', '2022-02-06 20:04:45', '');

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
(48, 2, 0, 0, 0, '', '', '', '2022-02-16 08:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(120) NOT NULL,
  `category` int(50) NOT NULL,
  `subcategory` int(50) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productCompany` varchar(255) NOT NULL,
  `productPrice` int(50) NOT NULL,
  `productPriceBeforeDiscount` int(50) NOT NULL,
  `productDescription` longtext NOT NULL,
  `productImage1` varchar(255) NOT NULL,
  `productImage2` varchar(255) NOT NULL,
  `productImage3` varchar(255) NOT NULL,
  `shippingCharge` int(50) NOT NULL,
  `productAvailability` varchar(255) NOT NULL,
  `productType` varchar(255) NOT NULL,
  `productFeatured` int(11) NOT NULL,
  `productStatus` int(11) NOT NULL,
  `productViewers` int(50) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subcategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `productType`, `productFeatured`, `productStatus`, `productViewers`, `postingDate`, `updationDate`) VALUES
(1, 1, 1, 'dell alienware area51m', 'dell', 3200, 3000, 'CPU: 3.6GHz Intel Core i9-9900K (8-core, 16MB cache, up to 5.0GHz)\r\nGraphics: Nvidia GeForce RTX 2080 (8GB GDDR6); Intel UHD Graphics 630\r\nRAM: 32GB DDR4 (2,400MHz)\r\nScreen: 17.3-inch Full HD (1,920 x 1,080) IPS, 144Hz, G-Sync\r\nStorage: 2 x 512GB RAID 0 SSD (PCIe), 1TB SSHD\r\nPorts: 3 x USB 3.1 Gen2, 1 x Thunderbolt 3 (USB-C), mini DisplayPort, HDMI-out, Gigabit Ethernet, 1 x Alienware Graphics Amplifier, 1 x Mic-in, 1 x Headphone-out\r\nConnectivity: Killer 1650X 802.11ac Wi-Fi ; Bluetooth 5.0\r\nWeight: 8.4 pounds (4.76kg)\r\nSize: 16.1 x 1.7 x 15.85 inches (410 x 43.18 x 402.6 mm; W x H x D)								', 'Presentation1.png', 'area51m1.png', 'area51m3.png', 0, 'In Stock', 'In Stock', 1, 1, 200, '2022-02-07 10:19:56', '08-02-2022 09:13:16 AM'),
(2, 1, 1, 'acer predator helios 500', 'acer', 3000, 3200, '		CPU: 2.90GHz Intel Core i9-8950HK (hexa-core, 12MB cache, up to 4.8GHz)\r\nGraphics: Nvidia GeForce GTX 1070 (8GB GDDR5); Intel UHD Graphics 630\r\nRAM: 16GB DDR4 SDRAM\r\nScreen: 17.3-inch FHD (1,920 x 1,080) 16:9 IPS (144Hz refresh rate)\r\nStorage: 512GB SSD, 2TB HDD\r\nPorts: 2 x Thunderbolt 3, 1 x USB 2.0, 3 x USB 3.0, HDMI 2.0, RJ-45 Ethernet, DisplayPort, Mic-In jack, 3.5mm headphone jack, Kensington Lock\r\nConnectivity: IEEE 802.11AC Gigabit Ethernet, Bluetooth 5.0\r\nCamera: HD webcam (1,280 x 720)\r\nWeight: 8.82 pounds (4kg)\r\nSize: 16.9 x 11.7 x 1.5 inches (42.9 x 29.7 x 3.8cm; W x D x H)', 'acer1.png', 'acer500-removebg-preview.png', 'acer1.jfif', 0, 'In Stock', 'In Stock', 1, 1, 350, '2022-02-07 19:37:59', '08-02-2022 09:15:44 AM'),
(3, 1, 2, 'dell xps core i7 ', 'dell', 1120, 1200, '		CPU: Intel Core i7-1165G7 (12MB cache, up to 4.7GHz boost)\r\nGraphics: Intel Iris Xe\r\nRAM: 16GB LPDDR4x (3,733MHz)\r\nScreen: 13.4-inch FHD (1,920 x 1,080) touch\r\nStorage: 512GB SSD (PCIe, NVMe, M.2)\r\nPorts: 2x USB-C 3.2 with Thunderbolt 4, microSD card reader, combi audio jack\r\nConnectivity: Killer Wi-Fi 6 AX1650, 2 x 2, Bluetooth 5.0\r\nCamera: 1080p IR Webcam\r\nWeight: 2.8 pounds (1.27 kg)\r\nSize: 11.6 x 7.8 x 0.58 inches (296 x 199 x 14.8 mm; W x D x H)			', 'xps1.png', 'xps1.jfif', 'xps2.jfif', 0, 'In Stock', 'Out of Stock', 1, 1, 123, '2022-02-08 07:17:48', ''),
(4, 3, 6, 'corsair gaming keyboard ', 'corsair ', 32, 45, '		mechanical keyboard 			', 'corsair.png', 'corsair1.jfif', 'corsair.jfif', 0, 'In Stock', 'In Stock', 1, 1, 0, '2022-02-08 07:19:24', ''),
(5, 2, 3, 'dell Alienware aurora r1', 'dell', 410, 450, '	CPU: Intel Core i7- 9700K 3.6Ghz (8-core, 12MB cache, up to 4.9GHz w/ Turbo Boost)\r\nGraphics: Nvidia GeForce RTX 2070 Super (8GB GDDR6)\r\nRAM: 16GB DDR4 (2,666MHz)\r\nStorage:  512GB M.2 PCIe NVMe SSD (Boot) + 2TB 7200RPM SATA 6Gb/s\r\nPorts:  Headphone/Line Out, Microphone/Line In, 6 x Type-A USB 3.1 Gen 1, 2 x Type-C USB 3.1 Gen 1, SPDIF Digital Output Coax, 5 x Type-A USB 2.0, 1 x Type-A USB 3.1 Gen 2\r\nConnectivity: RJ-45 Killer E2500 Gigabit Ethernet\r\nWeight: 39.2 pounds (17.86kg)\r\nSize: 8.7 x 17 x 18.9 inches (222.8 x 431.9 x 481.6mm; W x D x H) 				', 'aurora1.png', 'aurora2.jfif', 'aurora1.jfif', 0, 'In Stock', 'In Stock', 1, 1, 350, '2022-02-08 07:20:53', ''),
(6, 1, 1, 'msi titan g76', 'mSi', 2000, 2150, '	CPU: 2.4GHz Intel Core i9-12900HK (20 cores, 16MB cache, up to 5.0GHz Turbo)\r\nGraphics: Nvidia GeForce RTX 3080 Ti\r\nRAM: 32GB\r\nScreen: 17-inch LED, 360Hz, 3ms\r\nStorage: 2 X 1TB M.2 SSD\r\nOptical drive: N/A\r\nPorts: 3x USB-A,1 x USB-C with Thunderbolt 4, 1 x USB-C with DisplayPort, 1 x HDMI, 1 x MiniDisplayPort, SD card reader, audio combo jack\r\nConnectivity: Killer WiFi 6E AX1675 (2x2 ), Bluetooth 5.2\r\nCamera: FHD 1080p Webcam\r\nWeight: 6.9 pounds (2.5 kg)\r\nSize: 15.63 x 11.18 x 1.02 inches (397 x  283 x 25.9mm; W x D x H)				', 'msi3.png', 'msi2.png', 'msi.png', 0, 'In Stock', 'In Stock', 1, 1, 120, '2022-02-08 07:23:27', ''),
(7, 1, 1, 'lenovo legion 7i core i9 ', 'lenovo', 1760, 1980, '		CPU: 2.31 GHz Intel Core i7-10875H (8-core, 16MB cache, up to 5.1GHz)\r\nGraphics: GeForce RTX 2080 Super Max Q\r\nRAM: 16GB DDR4 (3200MHz)\r\nScreen: 15.6-inch FHD (1,920 x 1,080) 144hz\r\nStorage: 1TB M.2 NVMe SSD\r\nPorts: 1x USB-A 3.2 (gen 1), 2x Two USB-A 3.2 (Gen 2), USB-C 3.2, HDMI 2.0, RJ45 Ethernet, Thunderbolt 3, 3.5mm audio\r\nConnectivity: Intel Wi-Fi 6 802.11ax (2x2), Bluetooth 5.0\r\nCamera: 720p front facing, built in privacy cover\r\nWeight: 4.8lbs (2.2kg)\r\nSize: 14.1 x 10.2 x 0.78 inches (358 x 259 x 19 millimeter); W x D x H			', 'lenovo5.png', 'lenovo.png', 'lenovo1.png', 0, 'In Stock', 'In Stock', 1, 1, 350, '2022-02-08 07:24:45', ''),
(8, 2, 3, 'hP omen 30L gaming desktops', 'hP', 410, 450, '		CPU: Intel Core i9-10900K (3.7GHz base, 5.3GHz boost, 20MB cache)\r\nGraphics: Nvidia GeForce RTX 3080\r\nRAM: 4 x 8GB HyperX Fury DDR4 @ 3,200MHz\r\nMotherboard: Intel Z490\r\nPower Supply: Cooler Master 750W 80 Plus Platinum\r\nStorage: 2TB WD_Black PCIe NVMe SSD ; 2TB Seagate Barracuda HDD (7,200RPM)\r\nPorts (front): 2 x USB-A 3.2 Gen1; 1 x 3.5mm combo; 1 x 3.5mm mic\r\nPorts (rear): 3 x DisplayPort, 1 x HDMI, 1 x LAN, 1 x USB-C 3.2 Gen2, 2 x USB 3.2 Gen2, 2 USB 3.2 Gen1, 2 x USB 2.0, 1 x Audio out, 1 x Audio in, 1 x Mic\r\nConnectivity: Gigabit Ethernet, Wi-Fi 6 2x2, Bluetooth 5.0			', 'omendesk.png', 'omendesk1.png', 'omendesk2.png', 0, 'In Stock', 'In Stock', 1, 1, 350, '2022-02-08 07:26:16', ''),
(9, 3, 7, 'keyboard k7', 'k7', 7, 12, '	non-mechanical keyboard				', 'normalketboard.png', 'key3.png', 'key2.png', 0, 'In Stock', 'Out of Stock', 1, 1, 350, '2022-02-08 07:27:09', '');

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
(1, 'boutros.georges513@gmail.com', 'dell', 'alienware 17r5', 'core i9 17inch', 'successful', 1, '2022-02-04 08:05:15', ''),
(2, 'boutros.georges513@gmail.com', 'dell', 'alienware 17r5', 'core i9 17inch', 'successful', 1, '2022-02-04 08:05:34', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'gaming laptops', '2021-12-01 18:34:29', '05-02-2022 08:20:03 AM'),
(2, 1, 'non-gaming laptops', '2021-12-01 18:34:34', NULL),
(3, 2, 'gaming PC', '2021-12-01 18:34:40', NULL),
(4, 2, 'Non-gaming PC', '2021-12-01 18:34:45', NULL),
(5, 2, 'custom PC', '2021-12-01 18:34:50', NULL),
(6, 3, 'gaming accessories', '2021-12-01 18:34:58', NULL),
(7, 3, 'non-gaming accessories', '2021-12-01 18:35:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-01 15:42:01', '01-02-2022 05:46:20 PM', 1),
(2, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-01 15:48:39', '01-02-2022 05:52:33 PM', 1),
(3, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-01 15:54:28', NULL, 1),
(4, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-02 20:47:36', '03-02-2022 07:05:09 PM', 1),
(5, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-03 17:05:17', '03-02-2022 07:27:19 PM', 1),
(6, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-03 17:27:36', '03-02-2022 08:15:24 PM', 1),
(7, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-03 18:15:40', NULL, 0),
(8, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-03 18:15:44', '03-02-2022 08:33:16 PM', 1),
(9, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-03 18:36:01', '03-02-2022 08:36:04 PM', 1),
(10, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-03 18:38:40', NULL, 1),
(11, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-04 07:45:13', '04-02-2022 11:20:13 AM', 1),
(12, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-04 09:33:47', NULL, 0),
(13, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-04 09:33:57', '04-02-2022 11:34:36 AM', 1),
(14, 'boutros.georges@aut.edu', 0x3a3a3100000000000000000000000000, '2022-02-04 09:34:49', '04-02-2022 11:37:39 AM', 0),
(15, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-04 14:12:09', '04-02-2022 05:11:12 PM', 0),
(16, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-04 15:23:54', '16-02-2022 10:28:15 AM', 1),
(17, 'boutros.georges513@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-16 08:28:25', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `shippingAddress` longtext NOT NULL,
  `shippingState` varchar(255) NOT NULL,
  `shippingCity` varchar(255) NOT NULL,
  `shippingPincode` int(11) NOT NULL,
  `billingAddress` longtext NOT NULL,
  `billingState` varchar(255) NOT NULL,
  `billingCity` varchar(255) NOT NULL,
  `billingPincode` int(11) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `status` text NOT NULL,
  `code` mediumint(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `userStatus`, `status`, `code`, `RegDate`, `updationDate`) VALUES
(1, 'georges', 'boutros.georges513@gmail.com', 76126703, '$2y$10$4Y.IC/vWhCp3uVxSnXabDu.HnwfXIcjR6MgjlLxGVboOb/tuHFoRu', '																						facing blc bank chekka main road, near the pharmacie																			', 'north lebanon ', 'chekka', 0, '																						omt chekka																				', 'north lebanon', 'chekka', 0, 1, 'verified', 0, '2022-02-04 10:09:34', '05-02-2022 08:22:24 AM');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptype`
--
ALTER TABLE `laptype`
  ADD PRIMARY KEY (`typeID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laptype`
--
ALTER TABLE `laptype`
  MODIFY `typeID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requestproduct`
--
ALTER TABLE `requestproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
