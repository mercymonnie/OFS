-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2018 at 06:52 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `boutique`
--

CREATE TABLE `boutique` (
  `Warehouse_ID` int(255) NOT NULL,
  `Country` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `street` varchar(55) NOT NULL,
  `Warehouse` varchar(55) NOT NULL,
  `building` varchar(55) NOT NULL,
  `floor` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boutique`
--

INSERT INTO `boutique` (`Warehouse_ID`, `Country`, `City`, `street`, `Warehouse`, `building`, `floor`) VALUES
(10, 'UG', 'Mbarara', 'Mbaguta', 'Tony Fashions', 'Sky Blue', '1st'),
(12, 'UG', 'Mbarara', 'Mbaguta', 'Amazo Mall', 'Amazon Mall', 'ist'),
(13, 'UG', 'Mbarara', 'High_Street', 'jk fashions', 'lagrand', '2nd'),
(14, 'UG', 'Mbarara', 'High_Street', 'Essyfashions', 'lagrand', 'ist'),
(15, 'UG', 'Mbarara', 'Mbaguta', 'mercy beauty boutique', 'Easyview', '3rd'),
(16, 'UG', 'Mbarara', 'Macanisin', 'loisricher designs', 'citysky', 'ist'),
(17, 'UG', 'Mbarara', 'High_Street', 'janet collection', 'citycenter', 'ist');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(255) NOT NULL,
  `Category_Name` varchar(123) NOT NULL,
  `Discription` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Discription`, `Picture`) VALUES
(48, 'dresses', 'ladies dresses', ''),
(49, 'skirts', 'streachers', ''),
(50, 'jumpsuits', 'ladies', '');

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id` int(11) NOT NULL,
  `user` varchar(60) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id`, `user`, `message`, `date_time`, `ip_address`) VALUES
(7, 'Abdirasaaq', 'Tell  Me The Black Pepsi', '2014-08-13 02:04:15', '127.0.0.1'),
(8, 'Admin', 'Halo Iam Here', '2014-08-13 02:05:04', '127.0.0.1'),
(9, 'Abdirasaaq', 'How The price of b pepsui', '2014-08-13 02:05:29', '127.0.0.1'),
(10, 'Admin', '!0 dollar at lest', '2014-08-13 02:05:50', '127.0.0.1'),
(11, 'Nimco Qadaafi', 'OO Walaal Tuxaaafa Waa Qaalia WWa sidee', '2014-08-15 04:36:58', '127.0.0.1'),
(12, 'Admin', 'It&#39;s Too Fair According Ware House Mannager', '2014-08-15 04:37:34', '127.0.0.1'),
(13, 'Janan', 'Any Budy There????????????????????', '2014-08-15 05:44:33', '127.0.0.1'),
(14, 'mahamed', 'gudoomiye waran bal', '2014-08-17 17:15:15', '::1'),
(15, 'admin', 'wa khayr sxb sare', '2014-08-17 17:15:39', '::1'),
(16, 'opm', 'hey', '2018-05-19 04:08:27', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `website` varchar(40) DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(29) NOT NULL,
  `Phone` varchar(29) NOT NULL,
  `Subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `Name`, `Email`, `Phone`, `Subject`) VALUES
(7, 'A.rahman Osman', 'Mucaad33@gmail.com', '252634188000', ' i like this Shopping site '),
(8, 'Abdirahman Ali Abdi', 'jananalibritish@gmail.com', '0252634138440', ' What a nice shopping site');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_Id` int(15) NOT NULL,
  `FullName` varchar(25) NOT NULL DEFAULT '',
  `UserName` varchar(255) NOT NULL DEFAULT '',
  `Phone` varchar(25) NOT NULL DEFAULT '',
  `Email` varchar(55) NOT NULL DEFAULT '',
  `Password` varchar(20) NOT NULL DEFAULT '',
  `Re_Password` varchar(20) NOT NULL DEFAULT '',
  `Country` varchar(25) NOT NULL DEFAULT '',
  `City` varchar(25) NOT NULL DEFAULT '',
  `Adress` varchar(55) NOT NULL DEFAULT '',
  `PostalCode` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_Id`, `FullName`, `UserName`, `Phone`, `Email`, `Password`, `Re_Password`, `Country`, `City`, `Adress`, `PostalCode`) VALUES
(17, 'Abdirahman Ali Abdi', 'admin', '063 4138440', 'jananalibritish@gmail.com', 'admin123', 'admin123', 'Somalia', 'Awdal', 'Hargeisa', '767u'),
(18, 'Abdirahman Osman', 'Osman', '+252-63-418440', 'Mucaad@gmail.com', 'osman123', 'osman123', 'Somalia', 'Awdal', 'Xalane', 'Borama201'),
(19, 'Janan Ali British', 'arabsiyo', '+252-63-4138440', 'Arabsiyo@gmail.com', 'arabsiyo123', 'arabsiyo123', 'Somalia', 'Woqooyi Galbeed', 'Arabsiyo', 'Hr103'),
(20, 'Openja Moses', 'opm', '+256753955636', 'openjamosesopm@gmail.com', 'opm123', 'opm123', 'Uganda', 'Mbarara', 'Mbarara', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(95) NOT NULL,
  `Employee_Name` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Employee_Name`, `Username`, `Password`, `Picture`) VALUES
(52, 'Janan Ali British', 'mercy', 'mercy123', 'jananka.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Due',
  `date_due` date DEFAULT NULL,
  `client` int(10) UNSIGNED DEFAULT NULL,
  `client_contact` int(10) UNSIGNED DEFAULT NULL,
  `client_address` int(10) UNSIGNED DEFAULT NULL,
  `client_phone` int(10) UNSIGNED DEFAULT NULL,
  `client_email` int(10) UNSIGNED DEFAULT NULL,
  `client_website` int(10) UNSIGNED DEFAULT NULL,
  `client_comments` int(10) UNSIGNED DEFAULT NULL,
  `subtotal` decimal(9,2) DEFAULT NULL,
  `discount` decimal(4,2) DEFAULT '0.00',
  `tax` decimal(9,2) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT '0.00',
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice` int(10) UNSIGNED DEFAULT NULL,
  `item` varchar(200) DEFAULT NULL,
  `unit_price` decimal(9,2) DEFAULT '0.00',
  `qty` decimal(9,3) DEFAULT '1.000',
  `tax` decimal(4,2) DEFAULT '0.00',
  `price` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership_grouppermissions`
--

CREATE TABLE `membership_grouppermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `groupID` int(11) DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_grouppermissions`
--

INSERT INTO `membership_grouppermissions` (`permissionID`, `groupID`, `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete`) VALUES
(1, 1, 'clients', 0, 0, 0, 0),
(2, 1, 'invoices', 0, 0, 0, 0),
(3, 1, 'invoice_items', 0, 0, 0, 0),
(4, 2, 'clients', 0, 0, 0, 0),
(5, 2, 'invoices', 0, 0, 0, 0),
(6, 2, 'invoice_items', 0, 0, 0, 0),
(7, 3, 'clients', 1, 3, 3, 3),
(8, 3, 'invoices', 1, 3, 3, 3),
(9, 3, 'invoice_items', 1, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `membership_groups`
--

CREATE TABLE `membership_groups` (
  `groupID` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` text,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_groups`
--

INSERT INTO `membership_groups` (`groupID`, `name`, `description`, `allowSignup`, `needsApproval`) VALUES
(1, 'anonymous', 'Anonymous group created automatically on 2014-08-17', 0, 0),
(2, 'anonymous', 'Anonymous group created automatically on 2014-08-17', 0, 0),
(3, 'Admins', 'Admin group created automatically on 2014-08-17', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership_userrecords`
--

CREATE TABLE `membership_userrecords` (
  `recID` bigint(20) UNSIGNED NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(20) DEFAULT NULL,
  `dateAdded` bigint(20) UNSIGNED DEFAULT NULL,
  `dateUpdated` bigint(20) UNSIGNED DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership_users`
--

CREATE TABLE `membership_users` (
  `memberID` varchar(20) NOT NULL,
  `passMD5` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text,
  `custom2` text,
  `custom3` text,
  `custom4` text,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_users`
--

INSERT INTO `membership_users` (`memberID`, `passMD5`, `email`, `signupDate`, `groupID`, `isBanned`, `isApproved`, `custom1`, `custom2`, `custom3`, `custom4`, `comments`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '2014-08-17', 3, 0, 1, '', '', '', '', 'Admin member created automatically on 2014-08-17'),
('guest', '', '', '2014-08-17', 1, 0, 1, '', '', '', '', 'Anonymous member created automatically on 2014-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `order_ID` int(255) NOT NULL,
  `Full_Name` varchar(25) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Postal_Code` varchar(55) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `Country` varchar(55) NOT NULL,
  `City` varchar(55) NOT NULL,
  `Phone` varchar(55) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Dilivery_Address` varchar(75) NOT NULL,
  `Total_Amount` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Warehouse_ID` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `productName`, `Category_ID`, `Model`, `Type`, `Warehouse_ID`, `Description`, `Price`, `Picture`) VALUES
(1, 'beachpockectwear', 1, 'blue', '12', 10, 'Good Looking', '320000', '1 blue.jpg'),
(2, 'Flats 1235', 2, 'blue', '21', 10, 'Flat and Nice', '21000', '2.jpg'),
(3, 'Womens Sleeveless', 1, 'blue', '213', 10, 'Nice One', '230000', 'army green.jpg'),
(4, 'dress', 3, 'blue', '14', 10, 'ladies dresses', '30000', 'wine red_1.jpg'),
(5, 'skirts', 6, 'blue', '30', 10, 'office', '25000', 'black_5.jpg'),
(6, 'jumpsuite', 10, 'blue', '35', 15, 'hollowslim', '35000', '2_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_descriptions` varchar(100) NOT NULL,
  `Category_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_name`, `sub_descriptions`, `Category_ID`) VALUES
(3, 'offshoulder', 'sleeveless', 48),
(4, 'floral print dress', 'summer', 48),
(5, 'netted dress', 'beach', 48),
(6, 'zipskirts', 'office', 49),
(7, 'streacherskirts', 'casual', 49),
(8, 'highwaiste', 'office', 49),
(9, 'deepVhollowed', 'backtight', 50),
(10, 'shortsleeved', 'hollowslim', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tblsongs`
--

CREATE TABLE `tblsongs` (
  `id` int(100) NOT NULL,
  `songsinger` varchar(100) DEFAULT NULL,
  `songfile` varchar(50) DEFAULT NULL,
  `songwriter` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsongs`
--

INSERT INTO `tblsongs` (`id`, `songsinger`, `songfile`, `songwriter`) VALUES
(38, 'Parokya ', 'Parokya Ni Edgar - One And Only You.mp3', 'Parokya '),
(37, 'Amber Pacific', 'Amber Pacific - Falling Away.mp3', 'Them'),
(42, 'Parokya ', 'Parokya Ni Edgar - Gitara.mp3', 'Parokya '),
(43, 'Boyce Avenue', 'Boyce Avenue - Because of You.mp3', 'Boyce Avenue'),
(44, 'Boyce Avenue', 'Boyce Avenue - Every Breath.mp3', 'Boyce Avenue'),
(45, 'Eminem', 'Eminen 8 miles.mp3', 'Eminem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`boutique_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_Id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `client` (`client`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice` (`invoice`);

--
-- Indexes for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  ADD PRIMARY KEY (`permissionID`);

--
-- Indexes for table `membership_groups`
--
ALTER TABLE `membership_groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Indexes for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  ADD PRIMARY KEY (`recID`),
  ADD KEY `pkValue` (`pkValue`),
  ADD KEY `tableName` (`tableName`);

--
-- Indexes for table `membership_users`
--
ALTER TABLE `membership_users`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `Warehouse_ID` (`Warehouse_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `tblsongs`
--
ALTER TABLE `tblsongs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `Warehouse_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(95) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `membership_groups`
--
ALTER TABLE `membership_groups`
  MODIFY `groupID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  MODIFY `recID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `order_ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblsongs`
--
ALTER TABLE `tblsongs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Warehouse_ID`) REFERENCES `boutique` (`Warehouse_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
