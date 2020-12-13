-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2020 at 04:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
                        `Identifier` varchar(255) NOT NULL,
                        `UserIdentifier` varchar(255) NOT NULL,
                        `ProductIdentifier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
                            `Identifier` varchar(255) NOT NULL,
                            `Label` mediumtext NOT NULL,
                            `Categories` longtext NOT NULL,
                            `Reference` int(11) NOT NULL,
                            `Amount` int(11) NOT NULL,
                            `Price` double NOT NULL,
                            `Description` longtext DEFAULT NULL,
                            `ThumbnailRelativePath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ProductsImage`
--

CREATE TABLE `ProductsImage` (
                                 `Identifier` varchar(255) NOT NULL,
                                 `ProductIdentifier` varchar(255) NOT NULL,
                                 `FileRelativePath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `PurchaseHistory`
--

CREATE TABLE `PurchaseHistory` (
                                   `Identifier` varchar(255) NOT NULL,
                                   `UserIdentifier` varchar(255) NOT NULL,
                                   `ProductIdentifier` varchar(255) NOT NULL,
                                   `PurchaseDateTime` datetime DEFAULT NULL,
                                   `PriceTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
                         `Identifier` varchar(255) NOT NULL,
                         `Email` varchar(255) NOT NULL,
                         `Password` varchar(255) NOT NULL,
                         `Alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Identifier`, `Email`, `Password`, `Alias`) VALUES
('2948e4ffc2894f29c26f5a80b9e9a2e55fd041c2dd8f9', 'douglasvaldo@gmail.com', '$2y$10$jewc3SDB3YbtQ2STPxofQ.D1sSKwPSxLNMUcf82x4gzLd/GMS.AuW', 'Douglas Valdo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
    ADD PRIMARY KEY (`Identifier`),
    ADD UNIQUE KEY `Identifier` (`Identifier`),
    ADD KEY `ConstriantUserIdentifier` (`UserIdentifier`),
    ADD KEY `ConstraintProductIdentifier` (`ProductIdentifier`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
    ADD PRIMARY KEY (`Identifier`),
    ADD UNIQUE KEY `Identifier` (`Identifier`);

--
-- Indexes for table `ProductsImage`
--
ALTER TABLE `ProductsImage`
    ADD KEY `ConstraitProductIdentifier` (`ProductIdentifier`);

--
-- Indexes for table `PurchaseHistory`
--
ALTER TABLE `PurchaseHistory`
    ADD PRIMARY KEY (`Identifier`),
    ADD UNIQUE KEY `Identifier` (`Identifier`),
    ADD KEY `ConstraintUserIDentifier` (`UserIdentifier`),
    ADD KEY `HistoryConstraintProductIdentifier` (`ProductIdentifier`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
    ADD UNIQUE KEY `Identifier` (`Identifier`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
    ADD CONSTRAINT `ConstraintProductIdentifier` FOREIGN KEY (`ProductIdentifier`) REFERENCES `Products` (`Identifier`),
    ADD CONSTRAINT `ConstriantUserIdentifier` FOREIGN KEY (`UserIdentifier`) REFERENCES `Users` (`Identifier`);

--
-- Constraints for table `ProductsImage`
--
ALTER TABLE `ProductsImage`
    ADD CONSTRAINT `ConstraitProductIdentifier` FOREIGN KEY (`ProductIdentifier`) REFERENCES `Products` (`Identifier`);

--
-- Constraints for table `PurchaseHistory`
--
ALTER TABLE `PurchaseHistory`
    ADD CONSTRAINT `ConstraintUserIDentifier` FOREIGN KEY (`UserIdentifier`) REFERENCES `Users` (`Identifier`),
    ADD CONSTRAINT `HistoryConstraintProductIdentifier` FOREIGN KEY (`ProductIdentifier`) REFERENCES `Products` (`Identifier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;