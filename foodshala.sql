-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2020 at 08:33 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(30) CHARACTER SET utf8 NOT NULL,
  `address` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `category` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `fullname`, `email`, `contact`, `address`, `password`, `category`) VALUES
('kannav', 'kannav sharma', 'kannav4199@gmail.com', '9875478454', 'B-1,delhi,india', '1234', 'veg'),
('shalendra', 'shalendra', 'shalendra@gmail.com', '9875646568', 'B-12,delhi', '1234', 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fid` int(30) NOT NULL,
  `rusername` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fprice` bigint(15) NOT NULL,
  `fdescription` varchar(200) CHARACTER SET utf8 NOT NULL,
  `fcat` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fimg` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `available` varchar(25) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fid`, `rusername`, `fname`, `fprice`, `fdescription`, `fcat`, `fimg`, `available`) VALUES
(22, 'kartik1', 'zaika zabardast', 120, 'made with awsomeness.', 'Veg', 'Baahubali_Thali.jpg', 'yes'),
(23, 'kartik', 'burger', 50, 'Hot and tasty burger', 'Veg', 'burger.jpg', 'yes'),
(24, 'kartik', 'Cheese sandwich', 50, 'Tasty Sandwich Ready to be served', 'Veg', 'Cheese_Blast_Sandwich.jpg', 'yes'),
(25, 'kartik', 'Chocolate Golgappe', 60, 'Unique and Tasty Golgappe', 'Veg', 'Chocolate_Golgappe.jpg', 'yes'),
(26, 'kartik', 'French fries', 49, 'Tasty French fries The taste that you cant resist', 'Veg', 'slide001.jpg', 'yes'),
(28, 'pikadli', 'Cofee', 49, 'Sweet and Tasty !', 'Veg', 'coffee.jpg', 'yes'),
(29, 'pikadli', 'Chocolate truffle', 149, 'Just as you like It ;)', 'Veg', 'Chocolate_Hazelnut_Truffle.jpg', 'yes'),
(30, 'Radison', 'Paneer Pakora', 49, 'Made with love and care', 'Veg', 'paneer pakora.jpg', 'yes'),
(31, 'Radison', 'Samosa', 30, 'made with love and care', 'Veg', 'samosa.jpg', 'yes'),
(32, 'Radison', 'Kathi Roll', 45, 'Special kathi roll !!', 'Veg', 'Masala_Paneer_Kathi_Roll.jpg', 'yes'),
(33, 'kartik', 'Chicken Burger', 99, 'tasty', 'NonVeg', 'Shot_Gun_Chicken_Burger.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `orderss`
--

CREATE TABLE `orderss` (
  `oid` int(25) NOT NULL,
  `fid` int(25) NOT NULL,
  `username` varchar(35) CHARACTER SET utf8mb4 NOT NULL,
  `rusername` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fprice` bigint(15) NOT NULL,
  `quantity` int(30) NOT NULL,
  `datwtime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderss`
--

INSERT INTO `orderss` (`oid`, `fid`, `username`, `rusername`, `fname`, `fprice`, `quantity`, `datwtime`) VALUES
(24, 22, ' raghav ', 'kartik1 ', ' zaika zabardast', 120, 1, '2020-05-10 20:27:44.000000'),
(25, 23, ' raghav ', 'kartik ', ' burger', 50, 3, '2020-05-10 20:27:44.000000'),
(31, 23, ' kannav ', 'kartik ', ' burger', 50, 1, '2020-05-10 23:12:31.000000'),
(32, 23, ' kannav ', 'kartik ', ' burger', 50, 1, '2020-05-11 14:42:51.000000'),
(33, 22, ' shalendra ', 'kartik1 ', ' zaika zabardast', 120, 1, '2020-05-11 15:05:17.000000'),
(34, 23, ' shalendra ', 'kartik ', ' burger', 50, 1, '2020-05-11 15:05:17.000000');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(30) CHARACTER SET utf8 NOT NULL,
  `rname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `address` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`username`, `fullname`, `email`, `contact`, `rname`, `address`, `password`) VALUES
('jaba', 'jaba', 'ab@a.a', '9784557841', 'desi', 'sdgcugsdoich', '1234'),
('josh', 'josh', 'josh@gmail.com', '5478945687', 'josh', 'street 122', '1234'),
('kartik', 'kartik kumar', 'kartik@gmail.com', '9872575470', '5 star', 'B-12,delhi', '1234'),
('kartik1', 'kartik', 'a@a.b', '1234567890', 'kailash restaurant', 'B-2,delhi,india', '1234'),
('pikadli', 'picadli', 'pikadli@gmail.com', '9575424892', 'Pikadli', 'B-1 janakpuri,new delhi,india', '1234'),
('Radison', 'Rakesh', 'radison@gmail.com', '9574588640', 'Radison', 'Pitampura, delhi', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `rusername` (`rusername`);

--
-- Indexes for table `orderss`
--
ALTER TABLE `orderss`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orderss`
--
ALTER TABLE `orderss`
  MODIFY `oid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`rusername`) REFERENCES `restaurant` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
