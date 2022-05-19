-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2021 at 08:46 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2017-01-24 16:21:18', '29-11-2021 07:32:48 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'laptops', 'Gaming and non gaming laptops\r\n', '2021-11-29 17:38:11', NULL),
(2, 'desktops', 'contains gaming and non gaming desktops and custom desktop!\r\n', '2021-11-29 17:38:38', NULL),
(3, 'Accessories', 'gaming and non gaming accessories\r\n', '2021-11-29 17:38:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

DROP TABLE IF EXISTS `ordertrackhistory`;
CREATE TABLE IF NOT EXISTS `ordertrackhistory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `orderId` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

DROP TABLE IF EXISTS `productreviews`;
CREATE TABLE IF NOT EXISTS `productreviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `productId` int DEFAULT NULL,
  `quality` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `value` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` int NOT NULL,
  `subCategory` int DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int DEFAULT NULL,
  `productPriceBeforeDiscount` int DEFAULT NULL,
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `featured` int NOT NULL,
  `prodStatus` int NOT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `featured`, `prodStatus`, `postingDate`, `updationDate`) VALUES
(1, 1, 1, 'Dell Alienware area51m r1', 'Dell', 2050, 2200, '	CPU: 3.6GHz Intel Core i9-9900K (8-core, 16MB cache, up to 5.0GHz)\r\nGraphics: Nvidia GeForce RTX 2080 (8GB GDDR6); Intel UHD Graphics 630\r\nRAM: 32GB DDR4 (2,400MHz)\r\nScreen: 17.3-inch Full HD (1,920 x 1,080) IPS, 144Hz, G-Sync\r\nStorage: 2 x 512GB RAID 0 SSD (PCIe), 1TB SSHD\r\nPorts: 3 x USB 3.1 Gen2, 1 x Thunderbolt 3 (USB-C), mini DisplayPort, HDMI-out, Gigabit Ethernet, 1 x Alienware Graphics Amplifier, 1 x Mic-in, 1 x Headphone-out\r\nConnectivity: Killer 1650X 802.11ac Wi-Fi ; Bluetooth 5.0\r\nWeight: 8.4 pounds (4.76kg)\r\nSize: 16.1 x 1.7 x 15.85 inches (410 x 43.18 x 402.6 mm; W x H x D)				', 'area51m1.png', 'area51m.png', 'area51m3.png', 0, 'In Stock', 1, 1, '2021-11-29 17:42:33', NULL),
(2, 1, 1, 'Acer Predator helios 500', 'Acer', 1590, 1840, '	Processor\r\n\r\nProcessor Manufacturer\r\n\r\nIntel®\r\n\r\nProcessor Type\r\n\r\nCore™ i7\r\n\r\nProcessor Model\r\n\r\ni7-8750H\r\n\r\nProcessor Speed\r\n\r\n2.20 GHz\r\n\r\nProcessor Core\r\n\r\nHexa-core (6 Core™)\r\n\r\nDisplay & Graphics\r\n\r\nGraphics Controller Manufacturer\r\n\r\nNVIDIA®\r\n\r\nGraphics Controller Model\r\n\r\nGeForce® GTX 1070\r\n\r\nGraphics Memory Capacity\r\n\r\nUp to 8 GB\r\n\r\nGraphics Memory Technology\r\n\r\nGDDR5\r\n\r\nGraphics Memory Accessibility\r\n\r\nDedicated\r\n\r\nScreen Size\r\n\r\n43.9 cm (17.3\")\r\n\r\nDisplay Screen Type\r\n\r\nLCD\r\n\r\nDisplay Screen Technology\r\n\r\nComfyView (Matte)\r\nIn-plane Switching (IPS) Technology\r\n\r\nScreen Mode\r\n\r\nFull HD\r\n\r\nBacklight Technology\r\n\r\nLED\r\n\r\nScreen Resolution\r\n\r\n1920 x 1080\r\n\r\nTearing Prevention Technology\r\n\r\nNVIDIA G-SYNC™\r\n\r\nStandard Refresh Rate\r\n\r\n144 Hz\r\n\r\nMemory\r\n\r\nStandard Memory\r\n\r\n32 GB\r\n\r\nMemory Technology\r\n\r\nDDR4 SDRAM\r\n\r\nNumber of Total Memory Slots\r\n\r\n4\r\n\r\nMemory Card Reader\r\n\r\nNo\r\n\r\nStorage\r\n\r\nTotal Hard Drive Capacity\r\n\r\n2 TB\r\n\r\nHard Drive Interface\r\n\r\nSerial ATA\r\n\r\nTotal Solid State Drive Capacity\r\n\r\n256 GB\r\n\r\nOptical Drive Type\r\n\r\nNo\r\n\r\nNetwork & Communication\r\n\r\nWireless LAN Standard\r\n\r\nIEEE 802.11ac\r\n\r\nEthernet Technology\r\n\r\nGigabit Ethernet\r\n\r\nBuilt-in Devices\r\n\r\nMicrophone\r\n\r\nYes\r\n\r\nFinger Print Reader\r\n\r\nNo\r\n\r\nNumber of Speakers\r\n\r\n2\r\n\r\nSound Mode\r\n\r\nStereo\r\n\r\nInterfaces/Ports\r\n\r\nHDMI\r\n\r\nYes\r\n\r\nDisplayPort\r\n\r\nYes\r\n\r\nNumber of USB 3.0 Ports\r\n\r\n3\r\n\r\nNumber of USB 3.1 Gen 2 Ports\r\n\r\n1\r\n\r\nTotal Number of USB Ports\r\n\r\n4\r\n\r\nUSB Type-C\r\n\r\nYes\r\n\r\nUSB Type-C Detail\r\n\r\nUSB Type-C (Thunderbolt 3) port: USB 3.1 Gen 2 (up to 10 Gbps) and Thunderbolt devices, as well as any display\r\n\r\nThunderbolt\r\n\r\nYes\r\n\r\nNumber of Thunderbolt 3 Ports\r\n\r\n1\r\n\r\nNetwork (RJ-45)\r\n\r\nYes\r\n\r\nSoftware\r\n\r\nOperating System\r\n\r\nWindows 10 Home\r\n\r\nOperating System Architecture\r\n\r\n64-bit\r\n\r\nUpgradable Windows OS\r\n\r\nYes\r\n\r\nInput Devices\r\n\r\nPointing Device Type\r\n\r\nTouchPad\r\n\r\nKeyboard\r\n\r\nYes\r\n\r\nKeyboard Backlight\r\n\r\nYes\r\n\r\nTouchPad Features\r\n\r\nMulti-touch Gesture\r\n\r\nBattery Information\r\n\r\nNumber of Cells\r\n\r\n4-cell\r\n\r\nBattery Chemistry\r\n\r\nLithium Polymer (Li-Polymer)\r\n\r\nBattery Capacity\r\n\r\n4810 mAh\r\n\r\nMaximum Battery Run Time\r\n\r\n3.50 Hour\r\n\r\nPower Description\r\n\r\nMaximum Power Supply Wattage\r\n\r\n230 W\r\n\r\nPhysical Characteristics\r\n\r\nHeight\r\n\r\n38.70 mm\r\n\r\nWidth\r\n\r\n428 mm\r\n\r\nDepth\r\n\r\n298 mm\r\n\r\nWeight (Approximate)\r\n\r\n4 kg\r\n\r\nColour\r\n\r\nObsidian Black\r\n\r\nMiscellaneous\r\n\r\nPackage Contents\r\n\r\nPredator Helios 500 PH517-51-78ME Gaming Notebook\r\nLithium Polymer Battery\r\nAC Adapter\r\nSecurity Features\r\n\r\nKensington Lock Slot\r\nBIOS Passwords :\r\nUser\r\nSupervisor\r\nHDD				', 'acer1.jfif', 'acer3.jfif', 'acer500-removebg-preview (1).png', 0, 'In Stock', 0, 0, '2021-11-29 17:44:28', NULL),
(3, 1, 2, 'Dell XPS 17 (2020)', 'Dell', 1350, 1400, '	Display size\r\n13.30-inch\r\nDisplay resolution\r\nDisplay resolution\r\n3200x1800 pixels\r\nTouchscreen\r\nTouchscreen\r\nYes\r\nProcessor\r\nProcessor\r\nCore i5\r\nRAM\r\nRAM\r\n8GB\r\nOS\r\nOS\r\nWindows 10\r\nHard disk\r\nHard disk\r\nNo\r\nSSD\r\nSSD\r\n128GB\r\nGraphics\r\nGraphics\r\nIntel Integrated HD Graphics 520\r\nWeight\r\nWeight\r\n1.29 kg				', 'xps1.jfif', 'xps2.jfif', 'xps3.jfif', 0, 'In Stock', 0, 0, '2021-11-29 17:45:10', NULL),
(4, 3, 6, 'Corsair K100 RGB Keyboard', 'Corsair', 85, 150, '	The CORSAIR HS60 HAPTIC Gaming Headset delivers haptic bass that you can feel, with comfortable memory foam ear pads and custom-tuned 50mm neodymium audio drivers for quality audio.\r\n\r\n				', 'corsair.jfif', 'corsair1.jfif', 'corsair2.jfif', 0, 'In Stock', 0, 0, '2021-11-29 17:45:58', NULL),
(5, 2, 4, 'Dell Alienware Aurora r4', 'Dell', 2000, 2200, '	tanding screen display size	?0.01\r\nProcessor	?4.6 GHz core_i7\r\nRAM	?16 GB DDR4\r\nHard Drive	?256 GB 256GB M.2 SATA SSD (Boot) + 2TB 7200RPM SATA 6Gb/s (Storage)\r\nGraphics Coprocessor	?NVIDIA GeForce RTX 2080				', 'aurora1.jfif', 'aurora2.jfif', 'aurora3.jfif', 0, 'In Stock', 0, 0, '2021-11-29 17:46:53', NULL),
(6, 1, 1, 'MSI Titan GT75', 'MSI', 1850, 2200, '	CPU: Intel Core i9-9900K\r\nGPU: NVIDIA GeForce RTX 2080 (Laptop)\r\nDISPLAY: 17.3”, 4K UHD (3840 x 2160), IPS\r\nSTORAGE: 2000GB SSD + 1000GB HDD\r\nRAM: 4x 32GB DDR4, 2666 MHz\r\nWEIGHT: 4.50 kg (9.9 lbs)				', 'msi-removebg-preview.png', 'msi2.png', 'msi3.png', 0, 'In Stock', 0, 0, '2021-11-29 17:48:34', NULL),
(7, 1, 1, 'Legion 7i Gen 6 Intel (16\") with RTX 3060', 'Lenovo', 1500, 1650, '	11th Gen Intel® Core™ processors\r\n\r\nUp to 165W NVIDIA® GeForce RTX™ 3080 graphics\r\n\r\n16? WQXGA gaming display, @ up to 165Hz\r\n\r\n3D Nahimic audio lets you hear every footstep that approache				', 'lenovo.png', 'lenovo1.png', 'lenovo2.png', 0, 'In Stock', 0, 0, '2021-11-29 17:50:08', NULL),
(8, 2, 4, 'OMEN 25L Gaming Desktop PC GT12-', 'HP', 800, 950, '	Windows 11 Home\r\nAMD Ryzen™ 5 processor\r\nAMD Radeon™ RX 5500 Graphics\r\n8 GB Memory; 256 SSD storage				', 'omendesk1.png', 'omendesk2.png', 'omendesk3.png', 0, 'In Stock', 0, 0, '2021-11-29 17:55:46', NULL),
(9, 3, 7, 'V7 Standard Full-Size Space Saving Spill Resistant USB Keyboard for Windows Desktop PC (KC0A1-4N6P) - Black', 'seven', 25, 50, '	USB wired connection for Simple plug and play installation.\r\nWorks with PC and desktop computers that have Windows 2000, XP, Vista, or Windows 7 operating				', 'key1.png', 'key2.png', 'key3.png', 0, 'In Stock', 0, 0, '2021-11-29 18:03:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryid` int DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'gaming laptops', '2021-11-29 17:39:11', NULL),
(2, 1, 'non - gaming laptops', '2021-11-29 17:39:25', NULL),
(3, 2, 'Non-gaming PC', '2021-11-29 17:39:35', NULL),
(4, 2, 'gaming PC', '2021-11-29 17:39:47', NULL),
(5, 2, 'custom PC', '2021-11-29 17:39:55', NULL),
(6, 3, 'gaming accessories', '2021-11-29 17:40:00', NULL),
(7, 3, 'non - gaming accessories', '2021-11-29 17:40:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'grg.me@gmail.com', 0x3a3a3100000000000000000000000000, '2021-11-29 17:34:09', '29-11-2021 08:05:15 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int DEFAULT NULL,
  `billingAddress` longtext,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(1, 'georges ', 'grg.me@gmail.com', 123456789, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-29 17:34:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  `productId` int DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
