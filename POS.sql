-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 02:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `athlete`
--

-- --------------------------------------------------------

--
-- Table structure for table `athletes`
--

CREATE TABLE `athletes` (
  `ID` int(11) NOT NULL,
  `Student_ID` varchar(20) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Course` varchar(30) NOT NULL,
  `Year_Level` int(11) NOT NULL,
  `Height` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Event` varchar(30) NOT NULL,
  `Blood_Type` varchar(20) NOT NULL,
  `Sex` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `athletes`
--

INSERT INTO `athletes` (`ID`, `Student_ID`, `Image`, `First_Name`, `Last_Name`, `Age`, `Address`, `Phone`, `Course`, `Year_Level`, `Height`, `Weight`, `Status`, `Event`, `Blood_Type`, `Sex`) VALUES
(38, '123', 'Basketball.jpeg', 'asdg', 'dasg', 21, 'agdasg', '12121', 'BS-InfoTech', 3, 176, 60, 'Regular', 'Basketball', 'A+', 'Male'),
(39, '2020043-1', 'Angelo.jpg', 'Narciso Angelo', 'Teofilo', 22, 'T. Dagohoy Street', '09555466396', 'BS-InfoTech', 3, 171, 60, 'Irregular', 'Table Tennis', 'B+', 'Male'),
(40, '1234', 'Taekwondo.jpg', 'sdagdsag', 'dasgadsg', 18, 'adgsagdsag', '12121', 'BS-InfoTech', 1, 160, 50, 'Irregular', 'Arnis', 'O+', 'Male'),
(41, '222', 'Volleyball.jpg', 'sadgsadg', 'dsagadsgdsag', 18, 'sdgsadg', '12121', 'BS-InfoTech', 2, 160, 50, 'Regular', 'Volleyball', 'O+', 'Female'),
(42, '122', 'Tennis.jpg', 'sdgasdgas', 'dsagdsagasdsagdsagsa', 21, 'dsagasg', '12121', 'BS-InfoTech', 4, 168, 56, 'Regular', 'Tennis', 'O+', 'Male'),
(51, '3213131', 'Angelo.jpg', 'Ma', 'Long', 23, 'sdgdsgads', '1212121', 'BS-InfoTech', 3, 170, 60, 'Regular', 'Table Tennis', 'B+', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Barcode` int(11) NOT NULL,
  `Product` varchar(50) NOT NULL,
  `Unit` varchar(50) NOT NULL,
  `Costing` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Wholesale` int(11) NOT NULL,
  `Promo` int(11) NOT NULL,
  `Categories` varchar(50) NOT NULL,
  `Seller` varchar(50) NOT NULL,
  `Supplier` varchar(50) NOT NULL,
  `Date_Registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Barcode`, `Product`, `Unit`, `Costing`, `Price`, `Wholesale`, `Promo`, `Categories`, `Seller`, `Supplier`, `Date_Registered`) VALUES
(3, 1212165, 'asgasgd', 'PCS', 9000, 10000, 9500, 9800, 'Arnis', 'Bizma', 'Bizma', '2024-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Password`, `Username`, `Name`) VALUES
(1, 'admin', 'admin', 'Espinas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athletes`
--
ALTER TABLE `athletes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
