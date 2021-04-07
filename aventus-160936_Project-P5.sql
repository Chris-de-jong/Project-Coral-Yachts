-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2021 at 01:34 PM
-- Server version: 10.1.48-MariaDB-0+deb9u1
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aventus-160936_Project-P5`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bookings`
--

CREATE TABLE `Bookings` (
  `bookingID` int(10) NOT NULL,
  `Customers_customerID` int(10) NOT NULL,
  `Yachts_yachtID` int(10) NOT NULL,
  `status` enum('option','confirmed','cancelled') NOT NULL DEFAULT 'option',
  `paymentStatus` enum('open','waiting','partial','done','credited') NOT NULL DEFAULT 'open',
  `paymentPreference` enum('directdebit','creditcard','paypal','ideal') NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `catering` enum('Y','N') NOT NULL DEFAULT 'N',
  `skipper` enum('Y','N') NOT NULL DEFAULT 'N',
  `flottielje` enum('Y','N') NOT NULL DEFAULT 'N',
  `groceries` enum('Y','N') NOT NULL DEFAULT 'N',
  `transfer` enum('Y','N') NOT NULL DEFAULT 'N',
  `insurance` enum('Y','N') NOT NULL DEFAULT 'N',
  `childlifejackets` enum('Y','N') NOT NULL DEFAULT 'N',
  `fishinggear` enum('Y','N') NOT NULL DEFAULT 'N',
  `paddleboard` enum('Y','N') NOT NULL DEFAULT 'N',
  `agreedToTerms` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `customerID` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` char(2) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `internalNotes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Pages`
--

CREATE TABLE `Pages` (
  `pageID` int(20) NOT NULL,
  `online` enum('Y','N') NOT NULL DEFAULT 'Y',
  `type` enum('page','contact','booking') NOT NULL DEFAULT 'page',
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ports`
--

CREATE TABLE `Ports` (
  `PortID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` char(2) NOT NULL,
  `contactperson` varchar(255) NOT NULL,
  `contactphone` varchar(20) NOT NULL,
  `contactemail` varchar(100) NOT NULL,
  `facilities` text NOT NULL,
  `directions` text NOT NULL,
  `parking` text NOT NULL,
  `catering` enum('Y','N') NOT NULL,
  `skipper` enum('Y','N') NOT NULL,
  `flottielje` enum('Y','N') NOT NULL,
  `groceries` enum('Y','N') NOT NULL,
  `transfer` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Settings`
--

CREATE TABLE `Settings` (
  `settingID` int(10) NOT NULL,
  `keyNumber` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Yachts`
--

CREATE TABLE `Yachts` (
  `YachtID` int(10) NOT NULL,
  `Yachttypes_yachtTypeID` int(10) NOT NULL,
  `Ports_portID` int(10) NOT NULL,
  `status` enum('available','maintenance','retired','') NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `YachtTypes`
--

CREATE TABLE `YachtTypes` (
  `YachtTypeID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `type` enum('catamaran','monohull','','') NOT NULL,
  `length` double(10,2) NOT NULL,
  `depth` double(10,2) NOT NULL,
  `engine` varchar(100) NOT NULL,
  `sail` double(10,2) NOT NULL,
  `1pcabins` int(10) NOT NULL,
  `2pcabins` int(10) NOT NULL,
  `beds` int(10) NOT NULL,
  `toilets` int(10) NOT NULL,
  `showers` int(10) NOT NULL,
  `gear` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `Pages`
--
ALTER TABLE `Pages`
  ADD PRIMARY KEY (`pageID`);

--
-- Indexes for table `Ports`
--
ALTER TABLE `Ports`
  ADD PRIMARY KEY (`PortID`);

--
-- Indexes for table `Settings`
--
ALTER TABLE `Settings`
  ADD PRIMARY KEY (`settingID`);

--
-- Indexes for table `Yachts`
--
ALTER TABLE `Yachts`
  ADD PRIMARY KEY (`YachtID`);

--
-- Indexes for table `YachtTypes`
--
ALTER TABLE `YachtTypes`
  ADD PRIMARY KEY (`YachtTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `bookingID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `customerID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pages`
--
ALTER TABLE `Pages`
  MODIFY `pageID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Ports`
--
ALTER TABLE `Ports`
  MODIFY `PortID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Settings`
--
ALTER TABLE `Settings`
  MODIFY `settingID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Yachts`
--
ALTER TABLE `Yachts`
  MODIFY `YachtID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `YachtTypes`
--
ALTER TABLE `YachtTypes`
  MODIFY `YachtTypeID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
