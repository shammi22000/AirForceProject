-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2012 at 07:34 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airforceproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `activityID` int(4) NOT NULL AUTO_INCREMENT,
  `projectYear` varchar(4) NOT NULL,
  `activityName` varchar(75) NOT NULL,
  `dateStart` varchar(25) NOT NULL,
  `startTime` varchar(10) NOT NULL,
  `dateEnd` varchar(25) NOT NULL,
  `endTime` varchar(10) NOT NULL,
  PRIMARY KEY (`activityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activityID`, `projectYear`, `activityName`, `dateStart`, `startTime`, `dateEnd`, `endTime`) VALUES
(1, '1', 'Tender opening', '0000-00-00', '', '0000-00-00', ''),
(2, '0', 'Pre-qualification', '0000-00-00', '', '0000-00-00', ''),
(3, '1', 'issue pq invoice', '0000-00-00', '', '0000-00-00', ''),
(4, '1', 'issue bid invoice ', '0000-00-00', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bankID` int(5) NOT NULL AUTO_INCREMENT,
  `SupID` int(11) NOT NULL,
  `date` varchar(25) NOT NULL,
  `bankName` varchar(30) NOT NULL,
  `turnOver` int(10) NOT NULL,
  `OD` int(10) NOT NULL,
  `LTL` int(10) NOT NULL,
  `STL` int(10) NOT NULL,
  `FD` int(10) NOT NULL,
  `CF` int(11) NOT NULL,
  `projYear` varchar(4) NOT NULL,
  PRIMARY KEY (`bankID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bankID`, `SupID`, `date`, `bankName`, `turnOver`, `OD`, `LTL`, `STL`, `FD`, `CF`, `projYear`) VALUES
(1, 6, 'September 10, 2012, 7:58 ', 'Sampath Bank', 255, 105, 125, 155, 500, 500, '2012'),
(2, 6, 'September 6, 2012, 5:35 a', 'People Bank', 200, 150, 250, 250, 1500, 2000, '2012');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE IF NOT EXISTS `bid` (
  `bidId` int(5) NOT NULL AUTO_INCREMENT,
  `bidStatID` int(3) NOT NULL,
  `bidCatID` int(2) NOT NULL,
  `bidSupID` int(3) NOT NULL,
  `projectYear` int(4) NOT NULL,
  `isSelected` int(1) NOT NULL,
  `todayDate` varchar(35) NOT NULL,
  PRIMARY KEY (`bidId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bidId`, `bidStatID`, `bidCatID`, `bidSupID`, `projectYear`, `isSelected`, `todayDate`) VALUES
(18, 2, 1, 4, 2012, 1, 'September 13, 2012, 2:59 pm'),
(19, 2, 2, 4, 2012, 1, 'September 13, 2012, 2:59 pm'),
(20, 2, 3, 4, 2012, 1, 'September 13, 2012, 2:59 pm'),
(21, 2, 4, 4, 2012, 1, 'September 13, 2012, 2:59 pm'),
(22, 2, 5, 4, 2012, 0, 'September 13, 2012, 2:59 pm'),
(23, 2, 6, 4, 2012, 0, 'September 13, 2012, 2:59 pm'),
(24, 2, 7, 4, 2012, 0, 'September 13, 2012, 2:59 pm'),
(25, 2, 8, 4, 2012, 0, 'September 13, 2012, 2:59 pm'),
(26, 3, 1, 4, 2012, 1, 'September 13, 2012, 3:18 pm'),
(27, 3, 2, 4, 2012, 1, 'September 13, 2012, 3:18 pm'),
(28, 3, 3, 4, 2012, 0, 'September 13, 2012, 3:18 pm'),
(29, 3, 4, 4, 2012, 0, 'September 13, 2012, 3:18 pm'),
(30, 3, 6, 4, 2012, 1, 'September 13, 2012, 3:35 pm'),
(31, 3, 7, 4, 2012, 0, 'September 13, 2012, 3:35 pm'),
(32, 3, 8, 4, 2012, 0, 'September 13, 2012, 3:35 pm'),
(33, 1, 1, 4, 2012, 1, 'September 13, 2012, 5:10 pm'),
(35, 1, 3, 4, 2012, 1, 'September 13, 2012, 5:10 pm'),
(36, 1, 4, 4, 2012, 0, 'September 13, 2012, 5:10 pm'),
(37, 1, 5, 4, 2012, 0, 'September 13, 2012, 5:10 pm'),
(38, 1, 7, 4, 2012, 0, 'September 13, 2012, 5:34 pm'),
(39, 1, 8, 4, 2012, 0, 'September 13, 2012, 5:36 pm'),
(40, 1, 2, 4, 2012, 1, 'September 13, 2012, 5:37 pm'),
(41, 1, 6, 4, 2012, 0, 'September 13, 2012, 5:37 pm'),
(42, 3, 5, 4, 2012, 1, 'September 13, 2012, 5:41 pm'),
(43, 4, 1, 4, 2012, 1, ''),
(44, 2, 2, 1, 2012, 0, 'September 16, 2012, 1:55 pm'),
(45, 2, 3, 1, 2012, 0, 'September 16, 2012, 1:55 pm'),
(46, 3, 2, 1, 2012, 0, 'September 16, 2012, 1:55 pm'),
(47, 4, 2, 1, 2012, 0, 'September 16, 2012, 1:55 pm'),
(48, 5, 2, 1, 2012, 0, 'September 16, 2012, 1:55 pm');

-- --------------------------------------------------------

--
-- Table structure for table `bidderdocuments`
--

CREATE TABLE IF NOT EXISTS `bidderdocuments` (
  `bdID` int(11) NOT NULL AUTO_INCREMENT,
  `bdSupplID` int(11) NOT NULL,
  `qualification` varchar(75) NOT NULL,
  `points` int(3) NOT NULL,
  `year` int(11) NOT NULL,
  `docEvidence` text NOT NULL,
  PRIMARY KEY (`bdID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bidquote`
--

CREATE TABLE IF NOT EXISTS `bidquote` (
  `bidQuoteID` int(10) NOT NULL AUTO_INCREMENT,
  `date` varchar(35) NOT NULL,
  `projYear` int(4) NOT NULL,
  `bQitemID` int(5) NOT NULL,
  `bQstaID` int(11) NOT NULL,
  `bQcatID` int(11) NOT NULL,
  `bQSupId` int(11) NOT NULL,
  `priceQuote` double(8,2) NOT NULL,
  PRIMARY KEY (`bidQuoteID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `bidquote`
--

INSERT INTO `bidquote` (`bidQuoteID`, `date`, `projYear`, `bQitemID`, `bQstaID`, `bQcatID`, `bQSupId`, `priceQuote`) VALUES
(1, 'September 13, 2012, 5:46 am ', 2012, 6, 1, 2, 4, 52.00),
(2, '2012/08/01', 2012, 7, 1, 2, 4, 500.00),
(3, '2012/08/01', 2012, 8, 1, 2, 4, 650.00),
(4, 'September 13, 2012, 5:30 am ', 2012, 9, 1, 4, 4, 790.00),
(5, 'September 13, 2012, 5:29 am ', 2012, 10, 1, 4, 4, 560.00),
(6, '2012/08/01', 2012, 13, 1, 4, 4, 600.00),
(7, '2012/08/01', 2012, 14, 1, 4, 4, 325.00),
(12, 'September 13, 2012, 6:45 pm ', 2012, 1, 4, 1, 4, 71.00),
(13, 'September 12, 2012, 1:35 pm', 2012, 2, 4, 1, 4, 50.50),
(14, 'September 12, 2012, 1:35 pm', 2012, 3, 4, 1, 4, 75.00),
(15, 'September 12, 2012, 1:35 pm', 2012, 4, 4, 1, 4, 65.00),
(16, 'September 12, 2012, 1:35 pm', 2012, 5, 4, 1, 4, 100.00),
(17, 'September 12, 2012, 1:35 pm', 2012, 11, 4, 1, 4, 60.00),
(18, 'September 12, 2012, 1:35 pm', 2012, 12, 4, 1, 4, 52.00),
(19, 'September 12, 2012, 1:35 pm', 2012, 15, 4, 1, 4, 63.00),
(20, 'September 12, 2012, 1:35 pm', 2012, 16, 4, 1, 4, 50.00),
(21, 'September 12, 2012, 1:35 pm', 2012, 18, 4, 1, 4, 35.00),
(22, 'September 12, 2012, 1:35 pm', 2012, 19, 4, 1, 4, 95.00),
(23, 'September 12, 2012, 1:35 pm', 2012, 20, 4, 1, 4, 75.00),
(24, 'September 12, 2012, 1:35 pm', 2012, 21, 4, 1, 4, 45.00),
(25, 'September 12, 2012, 1:35 pm', 2012, 25, 4, 1, 4, 650.00),
(26, 'September 12, 2012, 6:14 pm', 2012, 6, 4, 2, 4, 55.00),
(27, 'September 12, 2012, 6:14 pm', 2012, 7, 4, 2, 4, 65.00),
(28, 'September 12, 2012, 6:14 pm', 2012, 8, 4, 2, 4, 178.00),
(29, 'September 14, 2012, 6:48 am ', 2012, 9, 2, 4, 4, 550.00),
(30, 'September 12, 2012, 6:19 pm', 2012, 10, 2, 4, 4, 585.00),
(31, 'September 12, 2012, 6:19 pm', 2012, 13, 2, 4, 4, 650.00),
(32, 'September 12, 2012, 6:19 pm', 2012, 14, 2, 4, 4, 750.00),
(33, 'September 12, 2012, 6:46 pm', 2012, 6, 1, 2, 4, 50.00),
(34, 'September 12, 2012, 6:46 pm', 2012, 7, 1, 2, 4, 55.00),
(35, 'September 12, 2012, 6:46 pm', 2012, 8, 1, 2, 4, 175.00),
(36, 'September 13, 2012, 6:02 am ', 2012, 9, 3, 4, 4, 550.00),
(37, 'September 13, 2012, 6:01 am', 2012, 10, 3, 4, 4, 900.00),
(38, 'September 13, 2012, 6:01 am', 2012, 13, 3, 4, 4, 950.00),
(39, 'September 13, 2012, 6:01 am', 2012, 14, 3, 4, 4, 780.00),
(40, 'September 13, 2012, 6:53 pm', 2012, 9, 0, 4, 4, 500.00),
(41, 'September 13, 2012, 6:53 pm', 2012, 10, 0, 4, 4, 495.00),
(42, 'September 13, 2012, 6:53 pm', 2012, 13, 0, 4, 4, 444.00),
(43, 'September 13, 2012, 6:53 pm', 2012, 14, 0, 4, 4, 550.00),
(44, 'September 16, 2012, 6:58 pm', 2012, 6, 1, 2, 1, 56.00),
(45, 'September 16, 2012, 6:58 pm', 2012, 7, 1, 2, 1, 65.00),
(46, 'September 16, 2012, 6:58 pm', 2012, 8, 1, 2, 1, 180.00),
(47, 'September 16, 2012, 7:02 pm', 2012, 6, 1, 2, 1, 56.00),
(48, 'September 16, 2012, 7:02 pm', 2012, 7, 1, 2, 1, 60.00),
(49, 'September 16, 2012, 7:02 pm', 2012, 8, 1, 2, 1, 165.00),
(50, 'September 16, 2012, 7:05 pm', 2012, 6, 2, 2, 1, 52.00),
(51, 'September 16, 2012, 7:05 pm', 2012, 7, 2, 2, 1, 55.00),
(52, 'September 16, 2012, 7:05 pm', 2012, 8, 2, 2, 1, 175.00),
(53, 'September 16, 2012, 7:06 pm', 2012, 6, 3, 2, 1, 56.00),
(54, 'September 16, 2012, 7:06 pm', 2012, 7, 3, 2, 1, 60.00),
(55, 'September 16, 2012, 7:06 pm', 2012, 8, 3, 2, 1, 182.00);

-- --------------------------------------------------------

--
-- Table structure for table `bidreqest`
--

CREATE TABLE IF NOT EXISTS `bidreqest` (
  `bidReID` int(5) NOT NULL AUTO_INCREMENT,
  `bidReSupID` int(3) NOT NULL,
  `bidReStaID` int(3) NOT NULL,
  `bidReCatID` int(2) NOT NULL,
  `bidReDate` varchar(25) NOT NULL,
  PRIMARY KEY (`bidReID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catId` int(2) NOT NULL AUTO_INCREMENT,
  `catName` varchar(40) NOT NULL,
  `catDescription` varchar(75) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`, `catDescription`) VALUES
(1, 'Vegetables, Fruits, Coconut & Eggs Hen', 'This category consist of ........... items'),
(2, 'Bakery Items', 'This category consist of ...........items'),
(3, 'Meat', ''),
(4, 'Fresh Fish', ''),
(5, 'Fowl Dressed', ''),
(6, 'Indigenous Breakfast Items', ''),
(7, 'Rice', ''),
(8, 'Dry Ration', '');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE IF NOT EXISTS `committee` (
  `commId` int(2) NOT NULL AUTO_INCREMENT,
  `totMembers` int(2) NOT NULL,
  `commName` enum('TEC','SCAPC') NOT NULL,
  `year` varchar(4) NOT NULL,
  PRIMARY KEY (`commId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`commId`, `totMembers`, `commName`, `year`) VALUES
(1, 4, 'SCAPC', ''),
(2, 10, 'TEC', '');

-- --------------------------------------------------------

--
-- Table structure for table `committemember`
--

CREATE TABLE IF NOT EXISTS `committemember` (
  `comMemId` int(2) NOT NULL AUTO_INCREMENT,
  `memName` varchar(50) NOT NULL,
  `memPosition` varchar(15) NOT NULL,
  `memWorkPlace` varchar(75) NOT NULL,
  `workPlaceAddress` varchar(200) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `phoneNo1` int(10) NOT NULL,
  `phoneNo2` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `faxNo` int(10) NOT NULL,
  `appoinmentDate` date NOT NULL,
  `endDate` date NOT NULL,
  `ComitteeID` int(11) NOT NULL,
  PRIMARY KEY (`comMemId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `committemember`
--

INSERT INTO `committemember` (`comMemId`, `memName`, `memPosition`, `memWorkPlace`, `workPlaceAddress`, `occupation`, `phoneNo1`, `phoneNo2`, `email`, `faxNo`, `appoinmentDate`, `endDate`, `ComitteeID`) VALUES
(1, 'NB.Liyanarachchi', 'Chairman', 'Chairman', 'aaaaaaaaaaaaaa', 'aaaaaaaa', 2147483647, 2147483647, '2566663123', 2147483647, '2012-05-23', '2012-05-15', 1),
(2, 'N.G.K.K.Seneviratne.', 'Member', 'Member', 'sdfdsfsdfdsfdfd', 'jksjfhdkfskl', 112566885, 112500600, '1225223', 125549687, '2012-05-02', '2012-05-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `contactID` int(2) NOT NULL AUTO_INCREMENT,
  `year` varchar(25) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `teleNo1` int(10) NOT NULL,
  `teleNo2` int(10) NOT NULL,
  `fax` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactID`, `year`, `Position`, `Address`, `teleNo1`, `teleNo2`, `fax`, `email`) VALUES
(1, '', 'Group Captain', 'Command Procurement Officer , Sri Lanka Air Force ', 112556325, 112556325, 1204457655, 'dfdgdg@yahoo.com'),
(2, '', 'Wing Commander', 'Assistant Command Procurement Officer, Tenders & Contract Management , Sri Lanka Air Force ', 1204457655, 1204457655, 1204457655, 'dfdgdg@yahoo.com'),
(4, '', 'wing Commander', 'sfsfdfsdf', 12454545, 54545757, 5454545, 'sjdfjs@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `expID` int(5) NOT NULL AUTO_INCREMENT,
  `expSupID` int(11) NOT NULL,
  `projectYear` varchar(4) NOT NULL,
  `year` year(4) NOT NULL,
  `institute` varchar(20) NOT NULL,
  `expCategory` varchar(40) NOT NULL,
  `totVal` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `expDate` varchar(35) NOT NULL,
  PRIMARY KEY (`expID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`expID`, `expSupID`, `projectYear`, `year`, `institute`, `expCategory`, `totVal`, `remarks`, `expDate`) VALUES
(1, 3, '', 2011, ' Army', 'Vegetable', 1000, 'ssssssssssssss', ''),
(2, 3, '', 2011, ' Navy', 'Vegetable', 50000, '', ''),
(3, 3, '', 2012, 'Army', 'bakery ites', 500, 'dfsfff dfsdsfsdfs', ''),
(4, 3, '', 2012, 'Navy', 'bakery ites', 500, 'dfsfff dfsdsfsdfs', ''),
(5, 3, '', 2012, 'Air Force', 'bakery ites', 500, 'dfsfff dfsdsfsdfs', ''),
(6, 3, '', 2012, 'Prison', 'bakery ites', 500, 'dfsfff dfsdsfsdfs', ''),
(7, 3, '', 2012, 'Hospital', 'bakery items', 500, 'dfsfff dfsdsfsdfs', ''),
(8, 6, '2012', 2012, ' Army', 'Vegetable, Fruits Farm Products and Egg ', 1000, 'supply all vegetables items ', 'September 10, 2012, 10:09 am'),
(9, 6, '2012', 2012, 'Army', 'Fresh Fish', 500, 'Supply of All Fresh Fish items', 'September 10, 2012, 10:09 am'),
(10, 6, '2012', 2011, 'Sri Lanka Army', 'Fresh Fish', 550, 'Supply of All Fresh Fish Items\r\n', 'September 10, 2012, 10:10 am'),
(11, 6, '2012', 2010, 'Department of Prison', 'Fresh Fish', 1000, 'Supplied All Fresh Fish items for Department of Prisons\r\n', 'September 12, 2012, 7:05 am'),
(12, 6, '2012', 2009, 'Department of Prison', 'Dry Ration', 5000, 'All Dry Ration items', 'September 12, 2012, 7:07 am');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `inqID` int(4) NOT NULL AUTO_INCREMENT,
  `inq_TypeID` int(2) NOT NULL,
  `projYear` varchar(4) NOT NULL,
  `inqSupId` int(4) NOT NULL,
  `inqStatId` int(4) NOT NULL,
  `inqCatId` int(2) NOT NULL,
  `inqItemId` int(4) NOT NULL,
  `inqDate` varchar(35) NOT NULL,
  `inqDesc` varchar(200) NOT NULL,
  `inqDecision` varchar(100) NOT NULL,
  `appPrice` double NOT NULL,
  `reqesPrice` int(11) NOT NULL,
  `appBrand` varchar(30) NOT NULL,
  `reqesBrand` varchar(30) NOT NULL,
  PRIMARY KEY (`inqID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inqID`, `inq_TypeID`, `projYear`, `inqSupId`, `inqStatId`, `inqCatId`, `inqItemId`, `inqDate`, `inqDesc`, `inqDecision`, `appPrice`, `reqesPrice`, `appBrand`, `reqesBrand`) VALUES
(1, 1, '', 1, 1, 1, 1, '2012-06-14', 'dfssfdfdffd', 'jhjhkjhkhkhk', 0, 0, '', ''),
(2, 1, '', 2, 2, 2, 2, '2012-06-14', 'thyuyutyu', 'uyutyutut', 0, 0, '', ''),
(6, 1, '', 0, 1, 2, 2, '2012-05-26', 'ttttttttttttttttttttt', '', 0, 0, '', ''),
(7, 1, '2012', 0, 1, 2, 0, '0000-00-00', 'ddddddddddd', '', 55, 60, '-', '-'),
(8, 1, '2012', 6, 1, 2, 0, '0000-00-00', 'ssssssssss', '', 55, 60, '-', '-'),
(9, 4, '2012', 6, 0, 1, 0, 'September 10, 2012, 5:27 pm', 'FGDGFGDFGDFGDFGDGD', '', 58, 60, '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_type`
--

CREATE TABLE IF NOT EXISTS `inquiry_type` (
  `inqTypeID` int(2) NOT NULL AUTO_INCREMENT,
  `inqName` varchar(50) NOT NULL,
  `inqDesc` varchar(150) NOT NULL,
  PRIMARY KEY (`inqTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `inquiry_type`
--

INSERT INTO `inquiry_type` (`inqTypeID`, `inqName`, `inqDesc`) VALUES
(1, 'Price Revision', 'Request to increase or Decrease Price of Ration Items'),
(2, 'Weight changes', 'change of weight by manufacturer'),
(3, 'Change Brand name', 'Change brand names of Dry Ration Items'),
(4, 'Substitute items', 'Get approval to supply substitute items instead of menu items'),
(5, 'Tax issues', 'Some issues of payment of Tax'),
(6, 'Payments', 'some issues related to payments of supplies');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemID` int(4) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(50) NOT NULL,
  `UOM` varchar(5) NOT NULL,
  `itemCatID` int(2) NOT NULL,
  `denomination` varchar(8) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `itemName`, `UOM`, `itemCatID`, `denomination`, `weight`) VALUES
(1, 'Ambarella', 'kg', 1, '', 1),
(2, 'Ash Plantain', 'kg', 1, '', 1),
(3, 'Ash Pumpkin', 'kg', 1, '', 1),
(4, 'Carrot', 'kg', 1, '', 1),
(5, 'Apple Red', 'kg', 1, '', 1),
(6, 'Bread', 'g', 2, 'each', 400),
(7, 'Bread Brown', 'g', 2, 'each', 400),
(8, 'Chocolate Cake', 'g', 2, 'each', 500),
(9, 'Mutton', 'kg', 4, '', 1),
(10, 'Pork', 'kg', 4, '', 1),
(11, 'Ladies Fingers', 'kg', 1, '', 1),
(12, 'Raddish', 'kg', 1, '', 1),
(13, 'Beef Boneless', 'kg', 4, '', 1),
(14, 'Ox Liver', 'kg', 4, '', 1),
(15, 'Cabbage', 'kg', 1, '', 1),
(16, 'Gotukola', 'kg', 1, '', 1),
(17, 'Sarana', 'kg', 0, 'each', 1),
(18, 'Red Onion', 'kg', 1, '', 1),
(19, 'B''onion', 'kg', 1, '', 1),
(20, 'Garlic', 'kg', 1, '', 1),
(21, 'Nelum Yam', 'kg', 1, '', 1),
(22, '', '', 0, '', 0),
(23, '', '', 0, '', 0),
(24, '', '', 0, '', 0),
(25, 'Green Grapes', 'kg', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_Id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `login_Type` varchar(20) NOT NULL,
  `login_Status` varchar(10) NOT NULL,
  `goupId` int(2) NOT NULL,
  `logGroupID` varchar(2) NOT NULL,
  `logComName` int(75) NOT NULL,
  `email` int(75) NOT NULL,
  PRIMARY KEY (`login_Id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_Id`, `name`, `userName`, `password`, `login_Type`, `login_Status`, `goupId`, `logGroupID`, `logComName`, `email`) VALUES
(1, 'M/S Wickramaratnes (PVT) Ltd', 'Tharanga', '123  ', 'admin', 'active', 3, 'u1', 0, 0),
(2, 'M/S SMA Azeez Brothers (Pvt) Ltd.', 'Premarathna', 'pre123     ', 'admin', 'active', 1, 'u0', 0, 0),
(3, 'M/S Sunil Traders', 'Mihini', 'mihini123', 'user', 'active', 2, 'u1', 0, 0),
(4, 'M/S Felix Perera & Company', 'Prabani', 'pra123 ', 'user', 'active', 1, 'u1', 0, 0),
(6, 'Rodesha Enterprises', 'vino', 'vino123 ', 'admin', 'active', 1, 'u0', 0, 0),
(7, 'Dilki', 'dilki', 'dilki123 ', 'admin', 'active', 3, 'u3', 0, 0),
(8, 'Rajith', 'rajith', 'rajith123 ', 'admin', 'active', 5, 'u4', 0, 0),
(9, 'tharanga', 'thara123', '1234 ', 'admin', 'active', 6, 'u2', 0, 0),
(10, 'dinusha', 'dinu', 'dinu123', 'admin', 'active', 6, 'u5', 0, 0),
(11, 'divarathna', 'divarathna', 'divarathna123', 'admin', 'active', 7, 'u6', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `minutes`
--

CREATE TABLE IF NOT EXISTS `minutes` (
  `minuteId` int(5) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `comName` varchar(6) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `docPath` varchar(50) NOT NULL,
  PRIMARY KEY (`minuteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `minutes`
--

INSERT INTO `minutes` (`minuteId`, `Date`, `comName`, `docType`, `docPath`) VALUES
(1, '2012-04-10', 'TEC', 'Agenda', ''),
(2, '2012-08-20', 'TEC', 'minute', 'SCAPC Meeting - 03.04.2009.doc'),
(3, '2012-06-06', 'SCAPC', 'minute', 'SCAPC Meeting - 03.04.2009.doc'),
(4, '2012-02-08', 'TEC', 'Agenda', 'Adjenda - 22.12.2009.doc'),
(5, '2012-05-10', 'TEC', 'minute', 'Minute -12.10.2009.doc'),
(6, '2012-05-10', 'TEC', 'Agenda', 'SCAPC Meeting - 03.04.2009.doc'),
(7, '2012-05-10', 'TEC', 'minute', 'Minute -12.10.2009.doc'),
(8, '2012-05-10', 'TEC', 'Agenda', 'SCAPC Meeting - 03.04.2009.doc'),
(9, '2012-06-06', 'SCAPC', 'minute', 'SCAPC Meeting - 03.04.2009.doc'),
(10, '2012-06-06', 'SCAPC', 'minute', 'SCAPC Meeting - 03.04.2009.doc'),
(11, '2012-08-15', 'SCAPC', 'minute', 'SCAPC Meeting - 03.04.2009.doc'),
(12, '2012-08-23', 'SCAPC', 'minute', 'SCAPC Meeting - 03.04.2009.doc');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `paymentId` int(10) NOT NULL AUTO_INCREMENT,
  `paySupId` int(3) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `invoiceNo` varchar(10) NOT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE IF NOT EXISTS `performance` (
  `perfID` int(4) NOT NULL AUTO_INCREMENT,
  `perStaID` int(11) NOT NULL,
  `perCatID` int(11) NOT NULL,
  `perSupId` int(11) NOT NULL,
  `feedback` varchar(15) NOT NULL,
  `perDescrip` varchar(50) NOT NULL,
  `projYear` varchar(4) NOT NULL,
  `perfMonth` varchar(10) NOT NULL,
  `currDay` varchar(35) NOT NULL,
  PRIMARY KEY (`perfID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`perfID`, `perStaID`, `perCatID`, `perSupId`, `feedback`, `perDescrip`, `projYear`, `perfMonth`, `currDay`) VALUES
(1, 1, 1, 1, 'satisfactory', 'dddddddddddddddd', '2012', 'may', '0'),
(2, 1, 1, 2, 'satisfactory', 'gggggggggggg', '2010', 'jan', '0'),
(3, 2, 2, 1, 'satisfactory', 'aaaaaaaaaaa', '2010', 'april', '0'),
(5, 2, 2, 2, 'Satisfactory', 'dddddddd', '2012', 'February', '0'),
(6, 2, 1, 2, 'Unsatisfactory', 'Sypply of Fruit items is not satisfactory', '2012', 'February', '0'),
(7, 3, 2, 2, 'Satisfactory', 'adfddsfdddddddd', '2012', 'March', '0'),
(8, 2, 1, 3, 'Satisfactory', 'aaaaaaaaaaaaaaaa', '2012', 'February', 'August 31, 2012, 5:08 am ');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `pointID` int(6) NOT NULL AUTO_INCREMENT,
  `projYear` varchar(4) NOT NULL,
  `supId` int(4) NOT NULL,
  `qualTypeId` int(2) NOT NULL,
  `recomPoints` int(4) NOT NULL,
  PRIMARY KEY (`pointID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pq`
--

CREATE TABLE IF NOT EXISTS `pq` (
  `pqid` int(4) NOT NULL AUTO_INCREMENT,
  `staId` int(4) NOT NULL,
  `catId` int(11) NOT NULL,
  `PQsupID` int(11) NOT NULL,
  PRIMARY KEY (`pqid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `pq`
--

INSERT INTO `pq` (`pqid`, `staId`, `catId`, `PQsupID`) VALUES
(1, 0, 1, 0),
(2, 0, 2, 0),
(3, 0, 3, 0),
(4, 0, 4, 0),
(5, 0, 5, 0),
(6, 0, 6, 0),
(7, 0, 7, 0),
(8, 0, 8, 0),
(9, 2, 2, 0),
(10, 2, 3, 0),
(11, 2, 4, 0),
(12, 2, 5, 0),
(13, 0, 1, 0),
(14, 0, 2, 0),
(15, 0, 3, 0),
(16, 0, 4, 0),
(17, 2, 1, 0),
(18, 2, 2, 0),
(19, 2, 3, 0),
(20, 1, 1, 0),
(21, 1, 2, 0),
(22, 1, 3, 0),
(23, 1, 4, 0),
(24, 1, 5, 0),
(25, 1, 6, 0),
(26, 1, 7, 0),
(27, 1, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pqpoints`
--

CREATE TABLE IF NOT EXISTS `pqpoints` (
  `PQpointID` int(4) NOT NULL AUTO_INCREMENT,
  `PQsupID` int(3) NOT NULL,
  `projectYear` varchar(4) NOT NULL,
  `avgAnnIncome` int(2) NOT NULL,
  `availCredit` int(2) NOT NULL,
  `staff` int(2) NOT NULL,
  `vehicle` int(2) NOT NULL,
  `coldRoom` int(2) NOT NULL,
  `stores` int(2) NOT NULL,
  `experience` int(2) NOT NULL,
  `performance` int(2) NOT NULL,
  `taxPayment` int(2) NOT NULL,
  `busNature` int(2) NOT NULL,
  PRIMARY KEY (`PQpointID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pqpoints`
--

INSERT INTO `pqpoints` (`PQpointID`, `PQsupID`, `projectYear`, `avgAnnIncome`, `availCredit`, `staff`, `vehicle`, `coldRoom`, `stores`, `experience`, `performance`, `taxPayment`, `busNature`) VALUES
(1, 2, '2010', 18, 16, 5, 2, 4, 4, 5, 5, 0, 0),
(2, 1, '2010', 18, 16, 4, 5, 4, 5, 18, 10, 0, 0),
(3, 3, '2011', 18, 16, 4, 5, 4, 6, 20, 10, 0, 0),
(4, 1, '2010', 5, 5, 4, 5, 5, 4, 5, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prequalificate`
--

CREATE TABLE IF NOT EXISTS `prequalificate` (
  `pqID` int(4) NOT NULL AUTO_INCREMENT,
  `stID` int(11) NOT NULL,
  `catId` int(2) NOT NULL,
  `supId` int(11) NOT NULL,
  `isQualified` int(1) NOT NULL,
  `isSelected` int(1) NOT NULL,
  `projectYear` int(4) NOT NULL,
  `reqDate` varchar(35) NOT NULL,
  PRIMARY KEY (`pqID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `prequalificate`
--

INSERT INTO `prequalificate` (`pqID`, `stID`, `catId`, `supId`, `isQualified`, `isSelected`, `projectYear`, `reqDate`) VALUES
(3, 3, 1, 1, 1, 0, 2010, ''),
(4, 4, 1, 1, 1, 0, 2011, ''),
(5, 5, 1, 1, 0, 0, 2011, ''),
(6, 6, 1, 4, 0, 0, 2011, ''),
(7, 7, 1, 1, 0, 0, 2011, ''),
(8, 1, 2, 4, 1, 0, 2011, ''),
(9, 2, 2, 1, 1, 0, 2012, ''),
(10, 3, 2, 1, 1, 0, 2012, ''),
(11, 4, 2, 1, 1, 0, 2012, ''),
(12, 5, 2, 1, 1, 0, 2012, ''),
(14, 7, 2, 1, 0, 0, 2012, ''),
(15, 1, 1, 1, 0, 0, 2012, ''),
(16, 2, 1, 1, 1, 0, 2011, ''),
(17, 3, 1, 1, 1, 0, 2011, ''),
(18, 4, 1, 1, 1, 0, 2011, ''),
(19, 7, 1, 1, 1, 0, 2011, ''),
(20, 1, 1, 1, 1, 0, 2011, ''),
(21, 1, 2, 1, 1, 0, 2011, ''),
(22, 1, 3, 1, 1, 0, 2011, ''),
(24, 2, 2, 1, 0, 0, 2012, ''),
(25, 2, 3, 1, 1, 0, 2012, ''),
(27, 3, 2, 4, 0, 0, 2010, ''),
(28, 3, 3, 4, 1, 0, 2010, ''),
(29, 4, 1, 1, 0, 0, 0, ''),
(30, 5, 1, 1, 0, 0, 0, ''),
(31, 6, 1, 1, 0, 0, 0, ''),
(33, 1, 2, 3, 0, 0, 2012, 'September 11, 2012, 5:40 am'),
(35, 2, 2, 3, 0, 0, 2012, 'September 11, 2012, 5:48 am'),
(41, 4, 1, 3, 0, 0, 2012, 'September 11, 2012, 4:31 pm'),
(42, 4, 2, 3, 0, 0, 2012, 'September 11, 2012, 4:31 pm'),
(43, 5, 1, 3, 0, 0, 2012, 'September 11, 2012, 4:31 pm'),
(44, 5, 2, 3, 0, 0, 2012, 'September 11, 2012, 4:31 pm'),
(45, 6, 1, 3, 0, 0, 2012, 'September 11, 2012, 4:31 pm'),
(46, 6, 2, 3, 0, 0, 2012, 'September 11, 2012, 4:31 pm'),
(47, 2, 6, 3, 0, 0, 2012, 'September 11, 2012, 4:33 pm'),
(48, 1, 8, 3, 0, 0, 2012, 'September 11, 2012, 4:33 pm'),
(49, -1, -1, 3, 0, 0, 2012, 'September 11, 2012, 6:16 pm'),
(50, 0, 1, 3, 0, 0, 2012, 'September 11, 2012, 7:19 pm'),
(51, 1, 1, 3, 0, 0, 2012, 'September 12, 2012, 4:51 am'),
(53, 1, 3, 3, 0, 0, 2012, 'September 12, 2012, 4:51 am'),
(54, 1, 4, 3, 0, 0, 2012, 'September 12, 2012, 4:51 am'),
(55, 1, 5, 3, 0, 0, 2012, 'September 12, 2012, 4:51 am'),
(56, 1, 6, 3, 0, 0, 2012, 'September 12, 2012, 4:51 am'),
(57, 1, 7, 3, 0, 0, 2012, 'September 12, 2012, 4:51 am'),
(59, 2, 1, 3, 0, 0, 2012, 'September 12, 2012, 5:29 am'),
(60, 3, 1, 3, 0, 0, 2012, 'September 12, 2012, 5:29 am'),
(61, 3, 2, 3, 0, 0, 2012, 'September 12, 2012, 5:29 am'),
(62, 3, 3, 3, 0, 0, 2012, 'September 12, 2012, 5:29 am'),
(63, 3, 4, 3, 0, 0, 2012, 'September 12, 2012, 5:29 am'),
(64, 3, 5, 3, 0, 0, 2012, 'September 12, 2012, 5:29 am'),
(65, 2, 3, 3, 0, 0, 2012, 'September 12, 2012, 5:45 am'),
(66, 2, 7, 3, 0, 0, 2012, 'September 12, 2012, 5:45 am'),
(67, 7, 1, 3, 0, 0, 2012, 'September 12, 2012, 5:46 am'),
(68, 7, 2, 3, 0, 0, 2012, 'September 12, 2012, 5:48 am'),
(69, 1, 1, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(70, 1, 2, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(71, 1, 3, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(72, 2, 2, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(73, 2, 3, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(74, 2, 5, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(75, 3, 3, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(76, 3, 5, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(77, 4, 3, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(78, 4, 5, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(79, 5, 3, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(80, 5, 5, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(81, 6, 3, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(82, 6, 4, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(83, 6, 5, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(84, 6, 6, 6, 1, 0, 2012, 'September 12, 2012, 1:29 pm'),
(85, 7, 3, 6, 1, 0, 2012, 'September 12, 2012, 1:29 pm'),
(86, 7, 4, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(87, 7, 5, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(88, 7, 6, 6, 0, 0, 2012, 'September 12, 2012, 1:29 pm'),
(89, 1, 4, 6, 0, 0, 2012, 'September 12, 2012, 1:31 pm'),
(93, 1, 1, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(94, 1, 2, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(95, 1, 3, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(96, 1, 4, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(97, 1, 5, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(98, 1, 6, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(99, 1, 7, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(100, 1, 8, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(101, 2, 1, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(102, 2, 2, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(103, 2, 3, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(104, 2, 4, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(105, 2, 5, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(106, 2, 6, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(107, 2, 7, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(108, 2, 8, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(109, 3, 1, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(110, 3, 2, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(111, 3, 3, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(112, 3, 4, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(113, 3, 5, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(114, 3, 6, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(115, 3, 7, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(116, 3, 8, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(117, 4, 1, 4, 1, 0, 2012, 'September 13, 2012, 1:54 pm'),
(118, 4, 2, 4, 0, 0, 2012, 'September 13, 2012, 1:54 pm'),
(119, 4, 3, 4, 0, 0, 2012, 'September 13, 2012, 1:54 pm'),
(120, 4, 4, 4, 0, 0, 2012, 'September 13, 2012, 1:54 pm'),
(121, 4, 5, 4, 0, 0, 2012, 'September 13, 2012, 1:54 pm'),
(122, 4, 6, 4, 0, 0, 2012, 'September 13, 2012, 1:54 pm'),
(123, 4, 7, 4, 0, 0, 2012, 'September 13, 2012, 1:54 pm'),
(124, 4, 8, 4, 0, 0, 2012, 'September 13, 2012, 1:54 pm');

-- --------------------------------------------------------

--
-- Table structure for table `prequalification`
--

CREATE TABLE IF NOT EXISTS `prequalification` (
  `PQId` int(4) NOT NULL AUTO_INCREMENT,
  `PQsupID` int(4) NOT NULL,
  `isRequested` tinyint(1) NOT NULL,
  `isQualified` tinyint(1) NOT NULL,
  `PQstaID` int(4) NOT NULL,
  `PQCatID` int(2) NOT NULL,
  `pqSuppID` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  PRIMARY KEY (`PQId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `prequalification`
--

INSERT INTO `prequalification` (`PQId`, `PQsupID`, `isRequested`, `isQualified`, `PQstaID`, `PQCatID`, `pqSuppID`, `year`) VALUES
(1, 1, 1, 1, 1, 1, 1, ''),
(2, 2, 1, 1, 1, 2, 1, ''),
(3, 0, 1, 1, 1, 2, 2, ''),
(4, 0, 1, 1, 1, 3, 2, ''),
(5, 0, 0, 0, 1, 4, 2, ''),
(6, 0, 1, 1, 2, 1, 3, ''),
(7, 0, 1, 1, 3, 2, 3, ''),
(8, 0, 0, 1, 3, 4, 3, ''),
(9, 0, 1, 1, 4, 1, 4, ''),
(10, 0, 1, 1, 4, 2, 4, ''),
(11, 0, 1, 1, 5, 4, 6, ''),
(12, 0, 1, 1, 5, 2, 5, ''),
(13, 0, 1, 0, 4, 2, 3, ''),
(14, 0, 1, 0, 2, 2, 3, ''),
(15, 0, 1, 0, 2, 4, 3, ''),
(16, 0, 1, 0, 1, 4, 3, ''),
(17, 0, 1, 0, 3, 1, 4, ''),
(18, 0, 1, 0, 3, 2, 4, ''),
(19, 0, 1, 0, 5, 11, 5, ''),
(20, 0, 1, 0, 5, 4, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `priceId` int(6) NOT NULL AUTO_INCREMENT,
  `priceItemID` int(5) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `brandName` varchar(15) NOT NULL,
  `priceDate` varchar(30) NOT NULL,
  `isRetail` enum('Retail','Wholesale') NOT NULL,
  `source` varchar(25) NOT NULL,
  `priceCatID` int(2) NOT NULL,
  PRIMARY KEY (`priceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`priceId`, `priceItemID`, `price`, `brandName`, `priceDate`, `isRetail`, `source`, `priceCatID`) VALUES
(7, 0, 99.99, '-', '08.13.12', 'Wholesale', 'HARTII', 1),
(8, 6, 50.00, '-ggggggg', '08.13.12', 'Wholesale', 'HARTII', 1),
(9, 2, 99.99, '-', '08.13.12', 'Wholesale', 'HARTII', 1),
(10, 3, 99.99, '-', '08.13.12', 'Retail', 'HARTII', 1),
(11, 7, 66.00, '-', '08.13.12', 'Retail', 'HARTII', 1),
(12, 4, 75.00, '-', '08.13.12', 'Retail', 'HARTII', 1),
(13, 3, 80.00, '-', '08.13.12', 'Retail', 'HARTII', 1),
(14, 6, 99.99, '-', '08.13.12', 'Wholesale', 'HARTII', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `projectID` int(4) NOT NULL AUTO_INCREMENT,
  `projectYear` year(4) NOT NULL,
  `startDate` varchar(15) NOT NULL,
  `endDate` varchar(15) NOT NULL,
  `projeNo` varchar(25) NOT NULL,
  PRIMARY KEY (`projectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `qualifiID` int(5) NOT NULL AUTO_INCREMENT,
  `qTypeId` int(3) NOT NULL,
  `QsuppID` int(3) NOT NULL,
  `bidYear` varchar(4) NOT NULL,
  `docEvidence` varchar(50) NOT NULL,
  PRIMARY KEY (`qualifiID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qualificationtype`
--

CREATE TABLE IF NOT EXISTS `qualificationtype` (
  `qualifiTypeID` int(3) NOT NULL AUTO_INCREMENT,
  `qualificatioName` varchar(50) NOT NULL,
  PRIMARY KEY (`qualifiTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `qualificationtype`
--

INSERT INTO `qualificationtype` (`qualifiTypeID`, `qualificatioName`) VALUES
(1, 'Past Experience'),
(2, 'Financial Capability'),
(3, 'Tax payment information'),
(4, 'Communication Facility'),
(5, 'Storage Facility'),
(6, 'Staff, personnel and office facilities'),
(7, 'Transport facilities including freezer trucks'),
(8, 'Business registration or incorporation with an ope');

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

CREATE TABLE IF NOT EXISTS `quantity` (
  `quantityID` int(11) NOT NULL AUTO_INCREMENT,
  `projectYear` varchar(4) NOT NULL,
  `date` varchar(30) NOT NULL,
  `actualQuantity` int(8) NOT NULL,
  `quanItemID` int(4) NOT NULL,
  `quanCatID` int(2) NOT NULL,
  `quanstaID` int(4) NOT NULL,
  `currDay` varchar(35) NOT NULL,
  PRIMARY KEY (`quantityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`quantityID`, `projectYear`, `date`, `actualQuantity`, `quanItemID`, `quanCatID`, `quanstaID`, `currDay`) VALUES
(28, '2010', 'March', 2500, 9, 4, 4, ''),
(29, '2010', 'March', 3000, 10, 4, 4, ''),
(30, '2010', 'March', 4000, 13, 4, 4, ''),
(31, '2010', 'March', 2000, 14, 4, 4, ''),
(32, '2010', 'January', 1700, 6, 2, 2, 'August 31, 2012, 3:55 am '),
(33, '2010', 'January', 2000, 7, 2, 2, ''),
(34, '2010', 'January', 1200, 8, 2, 2, ''),
(35, '2011', 'January', 1000, 6, 2, 2, ''),
(36, '2011', 'January', 2000, 7, 2, 2, ''),
(37, '2011', 'January', 1200, 8, 2, 2, ''),
(38, '2012', 'January', 1000, 6, 2, 2, ''),
(39, '2012', 'January', 2000, 7, 2, 2, ''),
(40, '2012', 'January', 1200, 8, 2, 2, ''),
(41, '2012', 'February', 500, 9, 4, 3, ''),
(42, '2012', 'February', 1500, 10, 4, 3, ''),
(43, '2012', 'February', 2500, 13, 4, 3, ''),
(44, '2012', 'February', 2000, 14, 4, 3, ''),
(45, '2012', 'February', 1000, 6, 2, 1, ''),
(46, '2012', 'February', 2000, 7, 2, 1, ''),
(47, '2012', 'February', 700, 8, 2, 1, ''),
(48, '2012', 'February', 1000, 6, 2, 2, ''),
(49, '2012', 'February', 2000, 7, 2, 2, ''),
(50, '2012', 'February', 2000, 8, 2, 2, ''),
(51, '2012', 'February', 1200, 1, 1, 3, 'August 31, 2012, 3:46 am'),
(52, '2012', 'February', 500, 2, 1, 3, 'August 31, 2012, 3:46 am'),
(53, '2012', 'February', 750, 3, 1, 3, 'August 31, 2012, 3:46 am'),
(54, '2012', 'February', 800, 4, 1, 3, 'August 31, 2012, 3:46 am'),
(55, '2012', 'February', 2100, 5, 1, 3, 'August 31, 2012, 3:46 am'),
(56, '2012', 'February', 1800, 11, 1, 3, 'August 31, 2012, 3:46 am'),
(57, '2012', 'February', 850, 12, 1, 3, 'August 31, 2012, 3:46 am'),
(58, '2012', 'February', 900, 15, 1, 3, 'August 31, 2012, 3:46 am'),
(59, '2012', 'February', 1300, 16, 1, 3, 'August 31, 2012, 3:46 am'),
(60, '2012', 'February', 1900, 18, 1, 3, 'August 31, 2012, 3:46 am'),
(61, '2012', 'February', 2000, 19, 1, 3, 'August 31, 2012, 3:46 am'),
(62, '2012', 'February', 2100, 20, 1, 3, 'August 31, 2012, 3:46 am'),
(63, '2012', 'February', 2000, 21, 1, 3, 'August 31, 2012, 3:46 am'),
(64, '2012', 'February', 1500, 25, 1, 3, 'August 31, 2012, 3:46 am'),
(65, '2012', 'August', 1200, 8, 2, 4, 'August 31, 2012, 3:48 am');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `reportID` int(3) NOT NULL AUTO_INCREMENT,
  `reComName` varchar(10) NOT NULL,
  `reportName` varchar(35) NOT NULL,
  `docPath` varchar(50) NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY (`reportID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `reComName`, `reportName`, `docPath`, `date`) VALUES
(1, 'TEC', 'Pre-qualification Evaluation Sheet ', 'reportEvaluation.php', ''),
(2, 'TEC', 'Pre-qualified List', 'preQualification.php', ''),
(3, 'TEC', 'List of  rejected bidders', 'rejected.php', ''),
(4, 'TEC', 'Inquiry information of the bidders', 'reportInquiry.php', '');

-- --------------------------------------------------------

--
-- Table structure for table `scapcrecommend`
--

CREATE TABLE IF NOT EXISTS `scapcrecommend` (
  `SCAPCrecID` int(10) NOT NULL AUTO_INCREMENT,
  `proYear` int(4) NOT NULL,
  `todayDate` varchar(35) NOT NULL,
  `MinuteDate` varchar(15) NOT NULL,
  `TRstaID` int(3) NOT NULL,
  `TRCatID` int(3) NOT NULL,
  `TRitemID` int(6) NOT NULL,
  `TRSupID` int(3) NOT NULL,
  `recomPrice` double(8,2) NOT NULL,
  PRIMARY KEY (`SCAPCrecID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `scapcrecommend`
--

INSERT INTO `scapcrecommend` (`SCAPCrecID`, `proYear`, `todayDate`, `MinuteDate`, `TRstaID`, `TRCatID`, `TRitemID`, `TRSupID`, `recomPrice`) VALUES
(1, 2012, 'September 16, 2012, 3:27 pm', '2012/09/15', 1, 2, 6, 4, 50.00),
(2, 2012, 'September 16, 2012, 3:27 pm', '2012/09/15', 1, 2, 7, 4, 55.00),
(3, 2012, 'September 16, 2012, 3:27 pm', '2012/09/15', 1, 2, 8, 4, 99.99),
(4, 2012, 'September 16, 2012, 3:27 pm', '2012/09/15', 1, 2, 6, 4, 50.00),
(5, 2012, 'September 16, 2012, 3:27 pm', '2012/09/15', 1, 2, 7, 4, 55.00),
(6, 2012, 'September 16, 2012, 3:27 pm', '2012/09/15', 1, 2, 8, 4, 99.99),
(7, 2012, 'September 16, 2012, 4:13 pm', '2012/09/15', 2, 4, 9, 4, 450.00),
(8, 2012, 'September 16, 2012, 4:13 pm', '2012/09/15', 2, 4, 10, 4, 50.00),
(9, 2012, 'September 16, 2012, 4:13 pm', '2012/09/15', 2, 4, 13, 4, 99.99),
(10, 2012, 'September 16, 2012, 4:13 pm', '2012/09/15', 2, 4, 14, 4, 99.99);

-- --------------------------------------------------------

--
-- Table structure for table `scapcsuggest`
--

CREATE TABLE IF NOT EXISTS `scapcsuggest` (
  `sugePriceId` int(4) NOT NULL AUTO_INCREMENT,
  `sugeItemID` int(4) NOT NULL,
  `year` varchar(4) NOT NULL,
  `SCAPCprice` double(8,2) NOT NULL,
  PRIMARY KEY (`sugePriceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `scapcsuggest`
--

INSERT INTO `scapcsuggest` (`sugePriceId`, `sugeItemID`, `year`, `SCAPCprice`) VALUES
(1, 1, '2012', 59.00),
(2, 2, '2012', 45.00),
(3, 3, '2012', 56.00),
(4, 4, '2012', 55.00),
(5, 5, '2012', 120.00),
(6, 11, '2012', 65.00),
(7, 12, '2012', 96.00),
(8, 15, '2012', 68.00),
(9, 16, '2012', 75.00),
(10, 18, '2012', 75.00),
(11, 19, '2012', 85.00),
(12, 20, '2012', 65.00),
(13, 21, '2012', 125.00),
(14, 6, '2012', 55.00),
(15, 7, '2012', 60.00),
(16, 1, '2012', 50.00),
(17, 2, '2012', 50.00),
(18, 3, '2012', 75.00),
(19, 4, '2012', 65.00),
(20, 5, '2012', 175.00),
(21, 11, '2012', 65.00),
(22, 12, '2012', 45.00),
(23, 15, '2012', 85.00),
(24, 16, '2012', 60.00),
(25, 18, '2012', 79.00),
(26, 19, '2012', 89.00),
(27, 20, '2012', 85.00),
(28, 21, '2012', 68.00),
(29, 25, '2012', 700.00);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `stationId` int(4) NOT NULL,
  `stationName` varchar(50) NOT NULL,
  `addLine1` varchar(50) NOT NULL,
  `addLine2` varchar(50) NOT NULL,
  `addLine3` varchar(50) NOT NULL,
  `addCity` varchar(30) NOT NULL,
  `contPersonName` varchar(50) NOT NULL,
  `phoneNo1` int(10) NOT NULL,
  `phoneNo2` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fax` int(10) NOT NULL,
  `currDay` varchar(35) NOT NULL,
  PRIMARY KEY (`stationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationId`, `stationName`, `addLine1`, `addLine2`, `addLine3`, `addCity`, `contPersonName`, `phoneNo1`, `phoneNo2`, `email`, `fax`, `currDay`) VALUES
(1, 'Vaunia', '25', 'abd Mawatha', 'gggggggg', 'fffffffffffffffffffffffff', 'N.M.Bandara ', 714507564, 718605375, 'prabanislk@yahoo', 112700706, ''),
(2, 'Amapara', '25', 'dkjfsk', 'dfdf', 'sdfd', ' perera ', 12543, 258963, 'tharanga@gmail.com', 112256321, ''),
(3, 'Anuradhapura', 'no.36', 'ABC kdosdks', 'kskdfjls', 'dfsdfsfgf', ' N.M.Silve', 325896855, 325896856, 'vidara@gmail.com', 325896855, ''),
(4, 'Batticaloa', 'No.200', 'Rathnayaka Mawatha', 'ddd', 'Batticalo', ' A.B.C.Fernando', 779638522, 442536877, 'abcd@yahoo.com', 442536877, ''),
(5, 'BIA-Katunayaka', 'No.200', '1st Lane', 'cccccccccccccc', 'vvvvvvvvvvvvv', ' D.M.Herath', 779652322, 112700715, 'pra@gmail.com', 112700715, ''),
(6, 'China Bay', 'no.123', 'ssssssssssss', 'ddddddddddddd', '', ' D.N.silva', 719352322, 355896856, 'dnsilve@yahoo.com', 112800812, ''),
(7, 'Thanthirimale', 'sssssssss', 'sssssssssssssssss', 'sssssssssss', 'Thanthirimale', 'A.B.C.Perera', 15896633, 12254669, 'thara@gmail.com', 12254669, ''),
(8, 'Colombo', 'adfkfsaa', 'aaaaaaa123', 'aaaaaa123', 'fffff', 'D.B.Bandara', 12587456, 2563333, 'difdsk123@yahoo.com', 15422563, '');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE IF NOT EXISTS `storage` (
  `storeID` int(5) NOT NULL AUTO_INCREMENT,
  `SupID` int(11) NOT NULL,
  `projectYear` varchar(4) NOT NULL,
  `addLine1` varchar(30) NOT NULL,
  `addLine2` varchar(30) NOT NULL,
  `addLine3` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `ownerShip` varchar(10) NOT NULL,
  `storeType` varchar(10) NOT NULL,
  `todayDate` varchar(35) NOT NULL,
  PRIMARY KEY (`storeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`storeID`, `SupID`, `projectYear`, `addLine1`, `addLine2`, `addLine3`, `city`, `ownerShip`, `storeType`, `todayDate`) VALUES
(1, 1, '', 'asdffff', 'cccccccccc', 'vvvvvvvvvvvv', 'Veyangoda', 'owner', 'cold room', ''),
(2, 1, '', 'vvvvvvvvv', 'vvvvvvvvvvvvvvv', 'vvvvvvvvvvvv', 'Mathara', 'hired', 'Warehouse', ''),
(3, 1, '', 'qqqqqqqqq', 'qqqqqqqqqqqq', 'qqqqqqqqqqqq', 'Jaffna', 'Leased', 'cold room', ''),
(4, 1, '', 'ffffffff', 'ggggggggggggg', 'gggggggggggggg', 'Anuradhapura', 'owner', 'Warehouse', ''),
(8, 6, '2012', 'No 40', 'Marapola', 'Naiwala', 'Veyangoda', 'owned', 'Warehouse', 'September 10, 2012, 2:51 pm');

-- --------------------------------------------------------

--
-- Table structure for table `suppliefinanceinfor`
--

CREATE TABLE IF NOT EXISTS `suppliefinanceinfor` (
  `FinanID` int(10) NOT NULL AUTO_INCREMENT,
  `supFinID` int(3) NOT NULL,
  `date` varchar(35) NOT NULL,
  `proYear` varchar(4) NOT NULL,
  `shareCapital` double(10,2) NOT NULL,
  `totAssest` double(10,2) NOT NULL,
  `currentAssest` double(10,2) NOT NULL,
  `otherLiabili` double(8,2) NOT NULL,
  `curreLiability` double(8,2) NOT NULL,
  `netWorth` double(8,2) NOT NULL,
  `WC` double(8,2) NOT NULL,
  `totProfit` double(8,2) NOT NULL,
  `avgIncome` double(10,2) NOT NULL,
  PRIMARY KEY (`FinanID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `suppliefinanceinfor`
--

INSERT INTO `suppliefinanceinfor` (`FinanID`, `supFinID`, `date`, `proYear`, `shareCapital`, `totAssest`, `currentAssest`, `otherLiabili`, `curreLiability`, `netWorth`, `WC`, `totProfit`, `avgIncome`) VALUES
(1, 2, 'September 6, 2012, 5:06 am', '2012', 100.00, 1000.00, 1200.00, 250.00, 100.00, 750.00, 900.00, 2500.00, 5000.00),
(2, 2, 'September 6, 2012, 5:06 am', '2012', 100.00, 1000.00, 1200.00, 250.00, 100.00, 750.00, 900.00, 2500.00, 5000.00),
(3, 6, 'September 10, 2012, 3:07 pm', '2012', 100.00, 1000.00, 450.00, 560.00, 458.00, 200.00, 500.00, 1500.00, 2500.00),
(4, 6, 'September 10, 2012, 3:10 pm', '2012', 100.00, 1000.00, 450.00, 560.00, 458.00, 200.00, 500.00, 1500.00, 2500.00),
(5, 6, 'September 10, 2012, 3:12 pm', '2012', 100.00, 1000.00, 450.00, 560.00, 458.00, 200.00, 500.00, 1500.00, 2500.00);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierID` int(3) NOT NULL AUTO_INCREMENT,
  `supLogID` int(3) NOT NULL,
  `compName` varchar(50) NOT NULL,
  `comAddress` varchar(150) NOT NULL,
  `TPNo1` int(10) NOT NULL,
  `TPNo2` int(10) NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `faxNo` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `busRegDate` varchar(35) NOT NULL,
  `VATregNo` int(12) NOT NULL,
  `city` varchar(40) NOT NULL,
  `busRegNo` int(10) NOT NULL,
  `busNature` varchar(40) NOT NULL,
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supLogID`, `compName`, `comAddress`, `TPNo1`, `TPNo2`, `mobileNo`, `faxNo`, `email`, `busRegDate`, `VATregNo`, `city`, `busRegNo`, `busNature`) VALUES
(1, 1, 'M/S Wickramaratnes (PVT) Ltd', 'Colombo', 142536, 123456, 789654, 12345685, 'prabanislk@yahoo.com', '2012-05-22', 2147483647, '', 0, ''),
(2, 2, 'M/S SMA Azeez Brothers (Pvt) Ltd.', 'aaaaaaaaaa', 124563, 32513245, 454552, 12132323, 'pra@gmail.com', '2012-08-14', 12547896, 'colombo', 258963147, ''),
(3, 3, 'M/S Sunil Traders', 'colombo 10  ', 12456322, 12456322, 454552, 5454545, 'pra@gmail.com', '1980/08/02', 12222222, '', 14582366, ' mkkmkkkkkkkk'),
(4, 4, 'M/S Felix Perera & Company', '', 0, 0, 0, 0, '', '0000-00-00', 0, '', 0, ''),
(5, 0, 'A.S.R. & Company', '', 0, 0, 0, 0, '', '0000-00-00', 0, '', 0, ''),
(6, 6, 'Rodesha Enterprises', 'gfhgfgfghhff, fghghgh, dfghgh, gfgff', 147852963, 852963456, 54682397, 21454545, 'prabanislk@yshoo', '2012-09-11', 588552698, 'Moratuwa', 1258447963, ''),
(7, 0, 'Edna Stores', '', 0, 0, 0, 0, '', '0000-00-00', 0, '', 0, ''),
(8, 0, 'Fontera Brands Lanka Ltd.', '', 0, 0, 0, 0, '', '0000-00-00', 0, '', 0, ''),
(9, 0, 'H.G.P.M. (Pvt) Ltd.', '', 0, 0, 0, 0, '', '0000-00-00', 0, '', 0, ''),
(10, 0, 'Harsha International', '', 0, 0, 0, 0, '', '0000-00-00', 0, '', 0, ''),
(11, 0, 'Theyagarajah & Company', '', 0, 0, 0, 0, '', '0000-00-00', 0, '', 0, ''),
(12, 0, 'T.H.wimalapala &sons', 'sssssss', 779638522, 112700715, 777362458, 112700715, 'pra@gmail.com', '0000-00-00', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `supplierinfo`
--

CREATE TABLE IF NOT EXISTS `supplierinfo` (
  `supInforID` int(4) NOT NULL AUTO_INCREMENT,
  `inforSupID` int(5) NOT NULL,
  `projectYear` varchar(4) NOT NULL,
  `date` varchar(35) NOT NULL,
  `staffMangers` int(5) NOT NULL,
  `staffskillLabour` int(5) NOT NULL,
  `staffUnskilledLabour` int(5) NOT NULL,
  `secureClearence` varchar(3) NOT NULL,
  `staffEPF` int(6) NOT NULL,
  `vehicleOwn` int(5) NOT NULL,
  `vehicleHire` int(5) NOT NULL,
  `vehicleLease` int(5) NOT NULL,
  `frezerTruck` int(4) NOT NULL,
  `receiptNo` int(15) NOT NULL,
  `supPerformance` varchar(20) NOT NULL,
  PRIMARY KEY (`supInforID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `supplierinfo`
--

INSERT INTO `supplierinfo` (`supInforID`, `inforSupID`, `projectYear`, `date`, `staffMangers`, `staffskillLabour`, `staffUnskilledLabour`, `secureClearence`, `staffEPF`, `vehicleOwn`, `vehicleHire`, `vehicleLease`, `frezerTruck`, `receiptNo`, `supPerformance`) VALUES
(3, 2, '2012', '', 25, 105, 125, 'yes', 250, 5, 20, 10, 10, 0, ''),
(4, 1, '', '', 50, 2500, 2500, 'yes', 5000, 100, 100, 100, 60, 0, ''),
(5, 1, '', '', 50, 2500, 2500, 'yes', 5000, 100, 100, 100, 60, 0, ''),
(6, 0, '2012', 'September 10, 2012, 7:35 am', 10, 500, 500, 'yes', 1050, 30, 50, 10, 15, 1258963, ''),
(7, 0, '2012', 'September 10, 2012, 7:40 am', 10, 500, 500, 'yes', 1050, 30, 50, 10, 15, 1258963, ''),
(8, 0, '2012', 'September 10, 2012, 7:42 am', 50, 100, 105, 'yes', 255, 30, 20, 14, 5, 1258963, ''),
(9, 6, '2012', 'September 10, 2012, 3:21 pm', 15, 105, 105, 'yes', 205, 15, 25, 10, 5, 1258963, ''),
(10, 6, '2012', 'September 10, 2012, 3:21 pm', 10, 105, 500, 'yes', 250, 15, 20, 10, 60, 1258963, '');

-- --------------------------------------------------------

--
-- Table structure for table `tecrecommend`
--

CREATE TABLE IF NOT EXISTS `tecrecommend` (
  `TCID` int(10) NOT NULL AUTO_INCREMENT,
  `proYear` int(4) NOT NULL,
  `todayDate` varchar(35) NOT NULL,
  `MinuteDate` varchar(15) NOT NULL,
  `TRstaID` int(3) NOT NULL,
  `TRCatID` int(3) NOT NULL,
  `TRitemID` int(10) NOT NULL,
  `TRSupID` int(3) NOT NULL,
  `recomPrice` double(6,2) NOT NULL,
  PRIMARY KEY (`TCID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tecrecommend`
--

INSERT INTO `tecrecommend` (`TCID`, `proYear`, `todayDate`, `MinuteDate`, `TRstaID`, `TRCatID`, `TRitemID`, `TRSupID`, `recomPrice`) VALUES
(1, 2012, 'September 16, 2012, 8:36 am', '2012/09/13', 1, 2, 8, 4, 99.99),
(2, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 6, 4, 50.00),
(3, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 7, 4, 55.00),
(4, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 8, 4, 99.99),
(5, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 6, 4, 50.00),
(6, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 7, 4, 55.00),
(7, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 8, 4, 99.99),
(8, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 6, 4, 50.00),
(9, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 7, 4, 55.00),
(10, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 8, 4, 99.99),
(11, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 6, 4, 50.00),
(12, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 7, 4, 55.00),
(13, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 8, 4, 99.99),
(14, 2012, 'September 16, 2012, 8:46 am', '2012/09/13', 1, 2, 8, 4, 99.99),
(15, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 25, 4, 560.00),
(16, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 1, 4, 71.00),
(17, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 2, 4, 50.50),
(18, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 3, 4, 56.00),
(19, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 4, 4, 65.00),
(20, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 5, 4, 100.00),
(21, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 11, 4, 56.00),
(22, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 12, 4, 52.00),
(23, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 15, 4, 52.00),
(24, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 16, 4, 50.00),
(25, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 18, 4, 35.00),
(26, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 19, 4, 85.00),
(27, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 20, 4, 75.00),
(28, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 21, 4, 45.00),
(29, 2012, 'September 16, 2012, 12:11 pm', '2012/09/13', 4, 1, 25, 4, 560.00),
(30, 2012, 'September 16, 2012, 12:13 pm', '2012/09/13', 2, 4, 9, 4, 450.00),
(31, 2012, 'September 16, 2012, 12:13 pm', '2012/09/13', 2, 4, 10, 4, 50.00),
(32, 2012, 'September 16, 2012, 12:13 pm', '2012/09/13', 2, 4, 13, 4, 99.99),
(33, 2012, 'September 16, 2012, 12:13 pm', '2012/09/13', 2, 4, 14, 4, 99.99);

-- --------------------------------------------------------

--
-- Table structure for table `tecsuggest`
--

CREATE TABLE IF NOT EXISTS `tecsuggest` (
  `sugePriceID` int(4) NOT NULL AUTO_INCREMENT,
  `sugeItemID` int(4) NOT NULL,
  `year` varchar(4) NOT NULL,
  `TECprice` double(8,2) NOT NULL,
  PRIMARY KEY (`sugePriceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `tecsuggest`
--

INSERT INTO `tecsuggest` (`sugePriceID`, `sugeItemID`, `year`, `TECprice`) VALUES
(1, 6, '2012', 60.00),
(2, 7, '2012', 55.00),
(3, 8, '2012', 99.99),
(5, 6, '2012', 50.00),
(6, 7, '2012', 55.00),
(7, 8, '2012', 99.99),
(24, 6, '2010', 50.00),
(25, 7, '2010', 55.00),
(26, 8, '2010', 99.99),
(27, 6, '2011', 99.99),
(28, 6, '2009', 50.00),
(29, 9, '2009', 450.00),
(30, 10, '2009', 50.00),
(31, 13, '2009', 99.99),
(32, 14, '2009', 99.99),
(33, 9, '2009', 44.00),
(34, 10, '2009', 44.00),
(35, 13, '2009', 99.99),
(36, 14, '2009', 500.00),
(37, 9, '2008', 99.99),
(38, 10, '2008', 99.99),
(39, 13, '2008', 99.99),
(40, 14, '2008', 99.99),
(41, 9, '2008', 99.99),
(42, 10, '2008', 99.99),
(43, 13, '2008', 99.99),
(45, 9, '2007', 99.99),
(46, 10, '2007', 44.00),
(48, 14, '2007', 99.99),
(49, 6, '2007', 99.99),
(50, 7, '2007', 99.99),
(51, 8, '2007', 99.99),
(52, 6, '2007', 50.00),
(53, 7, '2007', 99.99),
(54, 8, '2007', 99.99),
(55, 6, '2007', 99.99),
(56, 7, '2007', 55.00),
(57, 8, '2007', 99.99),
(58, 6, '2007', 50.00),
(59, 7, '2007', 99.99),
(60, 8, '2007', 99.99),
(61, 9, '2012', 455.00),
(62, 10, '2012', 585.00),
(63, 13, '2012', 600.00),
(64, 14, '2012', 540.00),
(65, 1, '2012', 78.00),
(66, 2, '2012', 75.00),
(67, 3, '2012', 56.00),
(68, 4, '2012', 65.00),
(69, 5, '2012', 125.00),
(70, 11, '2012', 56.00),
(71, 12, '2012', 80.00),
(72, 15, '2012', 52.00),
(73, 16, '2012', 58.00),
(74, 18, '2012', 90.00),
(75, 19, '2012', 85.00),
(76, 20, '2012', 75.00),
(77, 21, '2012', 65.00),
(78, 25, '2012', 560.00);

-- --------------------------------------------------------

--
-- Table structure for table `tenderdocuments`
--

CREATE TABLE IF NOT EXISTS `tenderdocuments` (
  `bidDocId` int(3) NOT NULL AUTO_INCREMENT,
  `docName` varchar(35) NOT NULL,
  `docPath` varchar(50) NOT NULL,
  `year` varchar(5) NOT NULL,
  PRIMARY KEY (`bidDocId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tenderdocuments`
--

INSERT INTO `tenderdocuments` (`bidDocId`, `docName`, `docPath`, `year`) VALUES
(1, 'Section IV. Bid-Securing Declaratio', 'bidSecurin_declaration.docx', '2012'),
(2, 'Section IV.  Bid Security (Guarante', 'bidSecurity.docx', '2012'),
(3, 'Section IV.  Bid submission form', 'bidSubmission.docx', '2012'),
(4, 'Section VIII 1. Contract Agreement', 'Conract_Agreement.docx', '2012'),
(5, 'Letter of Acceptance', 'Letter_of_Acceptance.docx', '2012'),
(6, 'Section IV.  Manufactures Authoriza', 'manuafacturer_Authorization.docx', '2012'),
(7, 'Section VIII 2. Performance Securit', 'performance_Security.docx', '2012');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `userGroupID` int(2) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(12) NOT NULL,
  `description` varchar(150) NOT NULL,
  PRIMARY KEY (`userGroupID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`userGroupID`, `groupName`, `description`) VALUES
(1, 'U0', 'bidder.redirect to ''PQbidder/index.php'''),
(2, 'U1', 'PQbidder. redirect to ''bid/index.php'''),
(3, 'U2', 'Air Force bases. redirect to '),
(4, 'U3', 'Staff'),
(5, 'U4', 'Staff Officer'),
(6, 'U5', 'TEC'),
(7, 'U6', 'SCAPC');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
