-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 22, 2023 at 07:41 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeecrush`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `customerID` int NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpassword` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`customerID`, `fname`, `lname`, `email`, `cpassword`) VALUES
(1, 'katie1', 'lname123', 'katie098', 'katie098');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `itemID` int NOT NULL,
  `itemN` int NOT NULL,
  `price` int NOT NULL,
  `itemD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderDetails`
--

CREATE TABLE `orderDetails` (
  `orderID` int NOT NULL,
  `itemID` int NOT NULL,
  `orderQ` int NOT NULL,
  `price` int NOT NULL,
  `points` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `price` int NOT NULL,
  `date` int NOT NULL,
  `orderID` int NOT NULL,
  `customerID` int NOT NULL,
  `paymentM` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `test` (`itemN`),
  ADD KEY `price` (`price`);

--
-- Indexes for table `orderDetails`
--
ALTER TABLE `orderDetails`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `itemID` (`itemID`),
  ADD KEY `price` (`price`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`price`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `customerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `itemID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderDetails`
--
ALTER TABLE `orderDetails`
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `price` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`price`) REFERENCES `menu` (`itemID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `test` FOREIGN KEY (`itemN`) REFERENCES `menu` (`itemID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orderDetails`
--
ALTER TABLE `orderDetails`
  ADD CONSTRAINT `orderDetails_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `orderDetails` (`orderID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orderDetails_ibfk_2` FOREIGN KEY (`price`) REFERENCES `orderDetails` (`orderID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `payment` (`price`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `payment` (`price`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

