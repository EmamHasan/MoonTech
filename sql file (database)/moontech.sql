-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 03:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moontech`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `Customer_ID` int(9) NOT NULL,
  `Purchase_ID` int(13) NOT NULL,
  `Product_ID` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`Customer_ID`, `Purchase_ID`, `Product_ID`) VALUES
(7, 10001, 101),
(4, 10002, 129);

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `Admin_ID` int(8) NOT NULL,
  `Phone_Number` int(11) NOT NULL,
  `Admin_Name` varchar(60) NOT NULL,
  `Password` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`Admin_ID`, `Phone_Number`, `Admin_Name`, `Password`) VALUES
(6, 1771408290, 'Emam Hasan', 0x3832376363623065656138613730366334633334613136383931663834653762);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Purchase_ID` int(15) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Price` int(7) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Order_Date` date DEFAULT NULL,
  `Buyer_Customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Purchase_ID`, `Status`, `Price`, `Discount`, `Order_Date`, `Buyer_Customer`) VALUES
(10001, 'Complete', 1850, 10, '0000-00-00', 7),
(10002, 'Complete', 66000, 0, '2022-08-17', 4);

-- --------------------------------------------------------

--
-- Table structure for table `casing`
--

CREATE TABLE `casing` (
  `Product_ID` int(13) NOT NULL,
  `Color` varchar(60) NOT NULL,
  `Type` varchar(60) NOT NULL,
  `Side_Panel` varchar(60) NOT NULL,
  `Power_Supply` varchar(60) NOT NULL,
  `Motherboard_Type` varchar(60) NOT NULL,
  `Features` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casing`
--

INSERT INTO `casing` (`Product_ID`, `Color`, `Type`, `Side_Panel`, `Power_Supply`, `Motherboard_Type`, `Features`) VALUES
(142, 'Black, RGB', 'Mid Tower', 'Glass', 'No', 'ATX,Micro-ATX,Mini-ITX', ''),
(141, 'Black, RGB', 'Full Tower', 'Glass', 'No', 'ATX', '');

-- --------------------------------------------------------

--
-- Table structure for table `compatibility`
--

CREATE TABLE `compatibility` (
  `Previous_Product` int(13) NOT NULL,
  `New_Product` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compatibility`
--

INSERT INTO `compatibility` (`Previous_Product`, `New_Product`) VALUES
(106, 127),
(106, 128),
(108, 128),
(108, 127),
(129, 131),
(129, 132),
(130, 131),
(130, 132);

-- --------------------------------------------------------

--
-- Table structure for table `cooler`
--

CREATE TABLE `cooler` (
  `Product_ID` int(13) NOT NULL,
  `Cooler_Type` varchar(60) NOT NULL,
  `Socket` varchar(60) DEFAULT NULL,
  `Processor_Type` varchar(60) DEFAULT NULL,
  `Size` varchar(20) DEFAULT NULL,
  `Fan_Speed` int(5) DEFAULT NULL,
  `Features` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cooler`
--

INSERT INTO `cooler` (`Product_ID`, `Cooler_Type`, `Socket`, `Processor_Type`, `Size`, `Fan_Speed`, `Features`) VALUES
(140, 'Air Cooler', 'LGA1700, 1200, 2011, 2066', 'Intel, AMD', 'Hi', 800, NULL),
(139, 'Air Cooler', 'LGA1700, 1200', 'Intel, AMD', 'ATX', 1800, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `Courier_ID` int(13) NOT NULL,
  `Receiver_Name` varchar(60) NOT NULL,
  `Phone_Number` int(11) NOT NULL,
  `Cart_For_Delivery` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(9) NOT NULL,
  `Customer_Name` varchar(40) NOT NULL,
  `Phone_Number` int(11) NOT NULL,
  `Street` varchar(60) DEFAULT NULL,
  `House_Apartment` varchar(60) DEFAULT NULL,
  `City` varchar(60) DEFAULT NULL,
  `Password` varbinary(255) NOT NULL,
  `Email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_Name`, `Phone_Number`, `Street`, `House_Apartment`, `City`, `Password`, `Email`) VALUES
(4, 'Emam Hasan', 1771408299, NULL, NULL, NULL, 0x3832376363623065656138613730366334633334613136383931663834653762, NULL),
(5, 'Emam Hasan', 1871510299, NULL, NULL, NULL, 0x3832376363623065656138613730366334633334613136383931663834653762, NULL),
(6, 'Rifa Tasfiya', 1515218196, NULL, NULL, NULL, 0x6230633761653233313663376538323134666436353965346263386130646561, NULL),
(7, 'Rubaba Rashid', 789965, NULL, NULL, NULL, 0x3635333966353666353764636339313166613037633663306662623337643134, 'dddffff');

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `Product_ID` int(13) NOT NULL,
  `Chipset` varchar(40) NOT NULL,
  `Memory` int(5) NOT NULL,
  `Memory_Type` varchar(40) NOT NULL,
  `Max_Res` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`Product_ID`, `Chipset`, `Memory`, `Memory_Type`, `Max_Res`) VALUES
(121, 'AMD Radeon', 2, 'DDR3', '1920x1200'),
(122, 'AMD Radeon', 2, 'DDR3', '2000x1200');

-- --------------------------------------------------------

--
-- Table structure for table `hdd`
--

CREATE TABLE `hdd` (
  `Product_ID` int(13) NOT NULL,
  `Capacity` int(5) NOT NULL,
  `RPM` int(5) NOT NULL,
  `Interface` varchar(40) NOT NULL,
  `Form_Factor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hdd`
--

INSERT INTO `hdd` (`Product_ID`, `Capacity`, `RPM`, `Interface`, `Form_Factor`) VALUES
(129, 1, 5400, 'USB 3.0 Type-A', '4'),
(130, 1, 5400, 'USB 3.2 Gen 1', '4');

-- --------------------------------------------------------

--
-- Table structure for table `keyboard`
--

CREATE TABLE `keyboard` (
  `Product_ID` int(13) NOT NULL,
  `Type` varchar(60) NOT NULL,
  `Swtich_Type` varchar(60) DEFAULT NULL,
  `Interface` varchar(60) NOT NULL,
  `Special_Features` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mb_features`
--

CREATE TABLE `mb_features` (
  `Product_ID` int(13) NOT NULL,
  `Special_Features` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `Product_ID` int(13) NOT NULL,
  `Resolution` varchar(40) NOT NULL,
  `Screen_Size` float NOT NULL,
  `Response_Time` int(3) NOT NULL,
  `Refresh_Rate` int(4) NOT NULL,
  `Input_Type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`Product_ID`, `Resolution`, `Screen_Size`, `Response_Time`, `Refresh_Rate`, `Input_Type`) VALUES
(123, 'WXGA (1366 x 768)', 18.5, 5, 60, 'VGA'),
(124, '1366 x 768', 18.5, 5, 60, 'VGA');

-- --------------------------------------------------------

--
-- Table structure for table `monitor_features`
--

CREATE TABLE `monitor_features` (
  `Product_ID` int(13) NOT NULL,
  `Features` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `Product_ID` int(13) NOT NULL,
  `Socket` varchar(40) NOT NULL,
  `Size` varchar(15) NOT NULL,
  `Supported_RAM` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`Product_ID`, `Socket`, `Size`, `Supported_RAM`) VALUES
(119, 'AMD', '22.6x 18.7', 'DDR4 RAM'),
(120, 'AMD', '22.6x 18.7', 'DDR4 RAM'),
(127, 'LGA1200', 'Micro-ATX', 'DDR4'),
(128, 'LGA1200', 'ATX', 'DDR4'),
(131, 'LGA1700', 'Micro-ATX', 'DDR4'),
(132, 'LGA1700', 'Micro-ATX', 'DDR4');

-- --------------------------------------------------------

--
-- Table structure for table `mouse`
--

CREATE TABLE `mouse` (
  `Product_ID` int(13) NOT NULL,
  `Type` varchar(60) NOT NULL,
  `Interface` varchar(60) NOT NULL,
  `Total_Keys` int(11) NOT NULL,
  `Max_DPI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending_cart`
--

CREATE TABLE `pending_cart` (
  `prod_name` varchar(50) DEFAULT NULL,
  `purchaseid` int(11) NOT NULL,
  `o_date` date DEFAULT NULL,
  `quant` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `statusf` varchar(50) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_cart`
--

INSERT INTO `pending_cart` (`prod_name`, `purchaseid`, `o_date`, `quant`, `price`, `statusf`, `discount`, `total`) VALUES
(' Intel Core i3-2120 2nd Gen Processor (Tray) ', 6, '0000-00-00', 4, 3000, 'Complete', 10, 10800),
('  Patriot 4GB DDR4 2666MHz DESKTOP RAM ', 7, '0000-00-00', 3, 2400, 'Complete', 10, 6480),
(' AMD  Ryzen  5  1600X Processor (Tray) ', 8, '0000-00-00', 1, 12000, 'Complete', 10, 10800),
(' FURY Beast ', 9, '0000-00-00', 14, 3200, 'Complete', 10, 40320),
(' Intel Core i3-2120 2nd Gen Processor (Tray) ', 10, '2022-08-27', 3, 3000, 'Complete', 10, 8100),
('  MSI A520M PRO-VH AMD AM4 Micro-ATX Motherboard (', 11, '2022-08-27', 1, 6000, 'Complete', 10, 5400),
('  MSI A520M PRO-VH AMD AM4 Micro-ATX Motherboard (', 12, '2022-08-27', 1, 6000, 'Complete', 10, 5400),
(' Intel Core i3-2120 2nd Gen Processor (Tray) ', 13, '2022-08-27', 1, 3000, 'Complete', 10, 2700),
(' Ryzen 5 4500 ', 14, '2022-08-27', 1, 13600, 'Complete', 10, 12240),
(' Intel Core i3-2120 2nd Gen Processor (Tray) ', 15, '2022-08-27', 1, 3000, 'Complete', 10, 2700),
('  Intel Pentium Gold G6400 10th gen Coffee Lake Pr', 16, '2022-08-27', 1, 6200, 'Complete', 10, 5580),
(' Gigabyte P450B 450W 80 Plus Bronze Certified Powe', 17, '2022-08-27', 1, 2500, 'Complete', 10, 2250),
(' Gigabyte P450B 450W 80 Plus Bronze Certified Powe', 18, '2022-08-27', 1, 2500, 'Complete', 10, 2250),
(' Gigabyte P450B 450W 80 Plus Bronze Certified Powe', 19, '2022-08-27', 1, 2500, 'Complete', 10, 2250),
(' Gigabyte P450B 450W 80 Plus Bronze Certified Powe', 20, '2022-08-27', 1, 2500, 'Complete', 10, 2250),
(' Gigabyte P450B 450W 80 Plus Bronze Certified Powe', 21, '2022-08-28', 1, 2500, 'Complete', 10, 2250),
(' Intel Core i3-2120 2nd Gen Processor (Tray) ', 28, '2022-08-28', 1, 3000, 'pending', 10, 2700),
(' AMD  Ryzen  5  1600X Processor (Tray) ', 29, '2022-08-28', 1, 12000, 'pending', 10, 10800);

-- --------------------------------------------------------

--
-- Table structure for table `power_supply`
--

CREATE TABLE `power_supply` (
  `Product_ID` int(13) NOT NULL,
  `Wattage` int(5) NOT NULL,
  `Modular` varchar(100) DEFAULT NULL,
  `Efficiency` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `power_supply`
--

INSERT INTO `power_supply` (`Product_ID`, `Wattage`, `Modular`, `Efficiency`) VALUES
(125, 350, 'Semi Modular', '80+ Bronze'),
(126, 350, 'Non Modular', '80+ Bronze');

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

CREATE TABLE `printer` (
  `Product_ID` int(13) NOT NULL,
  `Printer_Type` varchar(60) NOT NULL,
  `Functionality` varchar(60) DEFAULT NULL,
  `Interface` varchar(60) DEFAULT NULL,
  `Color_Speed` int(5) DEFAULT NULL,
  `BW_Speed` int(5) DEFAULT NULL,
  `Paper_Size` varchar(60) DEFAULT NULL,
  `Color_Output` varchar(60) DEFAULT NULL,
  `Others` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `Product_ID` int(13) NOT NULL,
  `Socket` varchar(30) NOT NULL,
  `Cores` int(4) NOT NULL,
  `Threads` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`Product_ID`, `Socket`, `Cores`, `Threads`) VALUES
(105, 'LGA1155', 2, 4),
(106, 'LGA1200', 2, 4),
(107, 'LGA1155', 2, 4),
(108, 'LGA1200', 6, 6),
(109, 'LGA1155', 2, 4),
(110, 'LGA1200', 2, 4),
(111, 'LGA1200', 2, 4),
(112, 'MGDGR201', 2, 4),
(113, 'AM4', 6, 12),
(129, 'LGA1700', 12, 20),
(130, 'LGA1700', 16, 24);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(13) NOT NULL,
  `Model` varchar(60) NOT NULL,
  `Purchased_Price` int(8) NOT NULL,
  `Selling_Price` int(8) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Add_Admin` int(13) DEFAULT NULL,
  `Update_Admin` int(13) DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Model`, `Purchased_Price`, `Selling_Price`, `Brand`, `Add_Admin`, `Update_Admin`, `product_image`) VALUES
(101, ' Adata 4 GB DDR4 2666 BUS Desktop RAM', 1500, 1850, ' Adata ', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/ram/adata/4gb-ddr4-2666/4gb-2666-500x500.jpg'),
(102, 'GeIL PRISTINE 4GB 2400MHz DDR4 RAM', 1750, 1900, 'GeIL ', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/RAM/GeIL/GeIL%20DDR4%20Pristine-2400MHz%208GB/GeIL%20DDR4%20Pristine-2400MHz%208GB-1-500x500.jpg'),
(103, ' Patriot 4GB DDR4 2666MHz DESKTOP RAM', 2400, 2600, 'Patriot ', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/ram/patriot/4gb-2666mhz/4gb-2666mhz-500x500.jpg'),
(104, ' Apacer 4GB DDR4 2666MHz Desktop RAM', 2000, 2300, 'Apacer', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/ram/apacer/apacer-4gb-ddr4-2666mhz/apacer-4gb-ddr4-2666mhz-01-500x500.jpg'),
(105, 'Intel Core i3-2120 2nd Gen Processor (Tray)', 3000, 3600, 'Intel', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/processor/intel/i3-2120/i3-2120-tray-500x500.jpg'),
(106, ' Intel Pentium Gold G6400 10th gen Coffee Lake Processor', 6200, 6600, ' Intel', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/processor/Intel/g6400/g6400-500x500.jpg'),
(107, 'AMD  Ryzen  5  1600X Processor (Tray)', 12000, 16000, 'AMD', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/processor/amd/5600x/5600x-001-500x500.jpg'),
(108, ' Intel 9th Gen Core i5-9400 Processor', 16000, 17000, 'Intel', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/processor/intel/i5-9400/i5-9400-500x500.jpg'),
(109, 'Core i3-2120', 2800, 3000, 'Intel', 6, 6, 'https://www.startech.com.bd/image/cache/catalog/processor/intel/i3-2120/i3-2120-tray-500x500.jpg'),
(110, 'Intel Pentium Gold G6400', 6600, 6940, 'Intel', 6, 6, 'https://www.startech.com.bd/image/cache/catalog/processor/Intel/g6400/g6400-500x500.jpg'),
(111, 'Intel Pentium Gold G6405', 6700, 7050, 'Intel', 6, 6, 'https://www.startech.com.bd/image/cache/catalog/processor/intel/pentium-gold-g6405/pentium-gold-g6405-01-500x500.jpg'),
(112, 'Athlon 3000G', 7800, 8250, 'AMD', 6, 6, 'https://www.startech.com.bd/image/cache/catalog/processor/AMD/athlon-3000g/athlon-3000g-1-500x500.jpg'),
(113, 'Ryzen 5 4500', 13600, 14970, 'AMD', 6, 6, 'https://www.startech.com.bd/image/cache/catalog/processor/AMD/ryzen-5-4500/amd-ryzen-5-4500-01-500x500.jpg'),
(114, '4GB DDR4 2666', 1850, 2010, 'Adata', 6, 6, 'https://www.startech.com.bd/image/cache/catalog/ram/adata/4gb-ddr4-2666/4gb-2666-500x500.jpg'),
(116, 'Ripjaws V', 2500, 2750, 'G.Skill', 6, 6, 'https://www.startech.com.bd/image/cache/catalog/ram/gskill/ripjaws-v/ripjaws-v-01-500x500.jpg'),
(117, 'FURY Beast', 3200, 3630, 'Kingston', 6, 6, 'https://www.startech.com.bd/image/cache/catalog/ram/kingston/fury-beast/fury-beast-01-500x500.jpg'),
(118, 'ELITE U-Dimm DDR4 RAM', 3125, 3450, 'ELITE', 6, 6, 'https://www.startech.com.bd/image/cache/catalog/ram/team/elite-u-dimm-ddr4/elite-u-dimm-ddr4-1-500x500.jpg'),
(119, 'MSI A320M-A Pro AMD Micro-ATX Motherboard', 5000, 6200, 'MSI', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/motherboard/msi/a320m-a-pro/a320m-a-pro-500x500.jpg'),
(120, ' MSI A520M PRO-VH AMD AM4 Micro-ATX Motherboard (China) MSI ', 6000, 7700, 'MSI', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/motherboard/msi/a520m-pro-vh/a520m-pro-vh-500x500.jpg'),
(121, 'Gigabyte GT 710 2GB DDR3 Graphics Card', 4700, 5200, 'Gigabyte ', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/graphics/Gigabyte/Gigabyte%20GV-N710D3-2GL-1-500x500.png'),
(122, ' Palit GeForce GT 730 2GB DDR3 Graphics Card Palit GeForce G', 5000, 6000, ' Palit', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/graphics-card/palit/gt-730/gt-730-1-500x500.jpg'),
(123, 'Viewsonic VA1903H 18.5\" LED Monitor (VGA)', 8000, 10000, 'Viewsonic ', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/monitor/viewsonic/va1903h/va1903h-500x500.jpg'),
(124, 'PHILIPS 18.5\" 193V5LSB2 LED MONITOR', 9000, 11000, 'PHILIPS', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/monitor/philips/193v/193v-500x500.png'),
(125, 'Antec Atom 350W 350 Watt Power Supply', 2000, 2800, 'Antec', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/power-supply/antec/antec-atom/antec-atom-01-500x500.jpg'),
(126, 'Gigabyte P450B 450W 80 Plus Bronze Certified Power Supply', 2500, 3500, 'Gigabyte', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/power-supply/gigabyte/p450b/p450b-500x500.jpg'),
(127, 'Gigabyte H510M S2H Micro-ATX', 7500, 9400, 'Gigabyte', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/motherboard/gigabyte/h510m-s2h/h510m-s2h-box-500x500.jpg'),
(128, 'Gigabyte Z590 D ATX', 17000, 20000, 'Gigabyte', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/motherboard/gigabyte/z590-d/z590-d-500x500.jpg'),
(129, 'Intel 12th Gen Core i7-12700 Alder Lake', 39000, 42000, 'Intel', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/processor/intel/i7-12700/i7-12700-01-500x500.jpg'),
(130, 'Intel 12th Gen Core i9-12900K Alder Lake', 65000, 72000, 'Intel', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/processor/intel/i9-12900k/i9-12900k-01-500x500.jpg'),
(131, 'ASUS PRIME B660M-K D4 12th Gen Micro ATX', 12000, 14600, 'Asus', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/motherboard/asus/prime-b660m-k-d4/prime-b660m-k-d4-01-500x500.jpg'),
(132, 'Asus Prime Z690M-PLUS D4 Intel 12th Gen microATX', 20000, 22500, 'Asus', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/motherboard/asus/prime-z690m-plus-d4/prime-z690m-plus-d4-01-500x500.jpg'),
(133, 'Apacer 4GB DDR4 2666MHz', 1700, 2300, 'Apacer', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/ram/apacer/apacer-4gb-ddr4-2666mhz/apacer-4gb-ddr4-2666mhz-01-500x500.jpg'),
(134, 'TEAM ELITE U-Dimm 8GB 2400MHz DDR4 RAM', 3000, 3450, 'TEAM', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/ram/team/elite-u-dimm-ddr4/elite-u-dimm-ddr4-1-500x500.jpg'),
(135, 'HP S700 Pro 128GB 2.5\" SSD (Solid State Drive)', 2000, 2750, 'HP', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/ssd/hp-ssd/s700-500x500.jpg'),
(136, 'Netac N535S 120GB 2.5-inch SATAIII SSD', 2000, 2700, 'Netac', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/ssd/netac/n535s/n535s-001-500x500.jpg'),
(137, 'Western Digital Elements 1TB Portable HDD', 4000, 4500, '', NULL, NULL, 'https://www.startech.com.bd/image/cache/data/WD%20Elements%20(USB%203.0)%201TB-500x500.jpg'),
(138, ' Product Page After Image Western Digital 1TB My Passport Po', 4000, 4800, '', NULL, NULL, 'https://www.startech.com.bd/image/cache/data/WD%20Elements%20(USB%203.0)%201TB-500x500.jpg'),
(139, 'Antec A400 RGB CPU Cooler', 2500, 3100, 'Antec', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/cpu-cooler/antec/a400/a400-1-500x500.jpg'),
(140, 'Xigmatek AIR-KILLER PRO ARGB CPU Air Cooler', 2400, 2900, 'Xigmatek', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/cpu-cooler/xigmatek/air-killer-pro/air-killer-pro-01-500x500.jpg'),
(141, 'Xtreme T38 RGB ATX Gaming Casing', 2200, 2600, 'Xtreme', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/casing/xtreme/t38/xtreme-t38-500x500.jpg'),
(142, 'Antec NX200 Mid Tower RGB Gaming Casing', 2500, 3100, 'Antec', NULL, NULL, 'https://www.startech.com.bd/image/cache/catalog/casing/antec/nx200/nx200-1-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pro_additional_features`
--

CREATE TABLE `pro_additional_features` (
  `Product_ID` int(13) NOT NULL,
  `Additional_Features` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `Product_ID` int(13) NOT NULL,
  `Memory_Type` varchar(30) NOT NULL,
  `Capacity` int(3) NOT NULL,
  `Bus_Speed` int(5) NOT NULL,
  `Features` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`Product_ID`, `Memory_Type`, `Capacity`, `Bus_Speed`, `Features`) VALUES
(101, 'DDR4', 4, 2666, NULL),
(102, 'DDD4', 4, 2666, NULL),
(103, 'DDR4', 4, 2666, NULL),
(104, 'DDD4', 4, 2666, NULL),
(114, 'DDR4', 4, 2666, 'Null'),
(116, 'DDR4', 4, 2666, 'Null'),
(117, 'DDR4', 8, 3200, 'Null'),
(118, 'DDR4', 8, 2400, 'Null'),
(134, 'DDR4', 8, 2400, NULL),
(133, 'DDR4', 4, 2666, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ssd`
--

CREATE TABLE `ssd` (
  `Product_ID` int(13) NOT NULL,
  `Interface` varchar(40) NOT NULL,
  `Form_Factor` varchar(40) NOT NULL,
  `Read_Speed` int(10) NOT NULL,
  `Write_Speed` int(10) NOT NULL,
  `Capacity` int(10) NOT NULL,
  `Technology` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ssd`
--

INSERT INTO `ssd` (`Product_ID`, `Interface`, `Form_Factor`, `Read_Speed`, `Write_Speed`, `Capacity`, `Technology`) VALUES
(127, 'SATA III', '2.5', 560, 650, 4, 'NVME'),
(128, 'SATA III', '2.5', 560, 520, 4, 'NVME');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Purchase_ID` (`Purchase_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD UNIQUE KEY `Contact_no` (`Phone_Number`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Purchase_ID`),
  ADD KEY `Buyer_Customer` (`Buyer_Customer`);

--
-- Indexes for table `casing`
--
ALTER TABLE `casing`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `compatibility`
--
ALTER TABLE `compatibility`
  ADD KEY `Previous_Product` (`Previous_Product`),
  ADD KEY `New_Product` (`New_Product`);

--
-- Indexes for table `cooler`
--
ALTER TABLE `cooler`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`Courier_ID`),
  ADD UNIQUE KEY `Contact_no` (`Phone_Number`),
  ADD KEY `Cart_For_Delivery` (`Cart_For_Delivery`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD UNIQUE KEY `Contact_no` (`Phone_Number`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `hdd`
--
ALTER TABLE `hdd`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `keyboard`
--
ALTER TABLE `keyboard`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `mb_features`
--
ALTER TABLE `mb_features`
  ADD UNIQUE KEY `Feature` (`Special_Features`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `monitor_features`
--
ALTER TABLE `monitor_features`
  ADD UNIQUE KEY `Feature` (`Features`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD UNIQUE KEY `Product_ID_2` (`Product_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `mouse`
--
ALTER TABLE `mouse`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `pending_cart`
--
ALTER TABLE `pending_cart`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `power_supply`
--
ALTER TABLE `power_supply`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `printer`
--
ALTER TABLE `printer`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `processor`
--
ALTER TABLE `processor`
  ADD UNIQUE KEY `Product_ID_2` (`Product_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Add_Admin` (`Add_Admin`),
  ADD KEY `Update_Admin` (`Update_Admin`);

--
-- Indexes for table `pro_additional_features`
--
ALTER TABLE `pro_additional_features`
  ADD UNIQUE KEY `Feature` (`Additional_Features`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `ssd`
--
ALTER TABLE `ssd`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `Admin_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Purchase_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `Courier_ID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pending_cart`
--
ALTER TABLE `pending_cart`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD CONSTRAINT `add_to_cart_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `add_to_cart_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`),
  ADD CONSTRAINT `add_to_cart_ibfk_3` FOREIGN KEY (`Purchase_ID`) REFERENCES `cart` (`Purchase_ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Buyer_Customer`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `casing`
--
ALTER TABLE `casing`
  ADD CONSTRAINT `casing_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `compatibility`
--
ALTER TABLE `compatibility`
  ADD CONSTRAINT `compatibility_ibfk_1` FOREIGN KEY (`Previous_Product`) REFERENCES `products` (`Product_ID`),
  ADD CONSTRAINT `compatibility_ibfk_2` FOREIGN KEY (`New_Product`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `cooler`
--
ALTER TABLE `cooler`
  ADD CONSTRAINT `cooler_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `courier`
--
ALTER TABLE `courier`
  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`Cart_For_Delivery`) REFERENCES `cart` (`Purchase_ID`);

--
-- Constraints for table `gpu`
--
ALTER TABLE `gpu`
  ADD CONSTRAINT `gpu_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hdd`
--
ALTER TABLE `hdd`
  ADD CONSTRAINT `hdd_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `keyboard`
--
ALTER TABLE `keyboard`
  ADD CONSTRAINT `keyboard_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `mb_features`
--
ALTER TABLE `mb_features`
  ADD CONSTRAINT `mb_features_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `motherboard` (`Product_ID`);

--
-- Constraints for table `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `monitor_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `monitor_features`
--
ALTER TABLE `monitor_features`
  ADD CONSTRAINT `monitor_features_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `monitor` (`Product_ID`);

--
-- Constraints for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD CONSTRAINT `motherboard_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `mouse`
--
ALTER TABLE `mouse`
  ADD CONSTRAINT `mouse_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `power_supply`
--
ALTER TABLE `power_supply`
  ADD CONSTRAINT `power_supply_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `printer`
--
ALTER TABLE `printer`
  ADD CONSTRAINT `printer_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `processor`
--
ALTER TABLE `processor`
  ADD CONSTRAINT `processor_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Add_Admin`) REFERENCES `administrator` (`Admin_ID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`Update_Admin`) REFERENCES `administrator` (`Admin_ID`);

--
-- Constraints for table `pro_additional_features`
--
ALTER TABLE `pro_additional_features`
  ADD CONSTRAINT `pro_additional_features_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `processor` (`Product_ID`);

--
-- Constraints for table `ram`
--
ALTER TABLE `ram`
  ADD CONSTRAINT `ram_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `ssd`
--
ALTER TABLE `ssd`
  ADD CONSTRAINT `ssd_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
