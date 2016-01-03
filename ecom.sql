-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2014 at 07:57 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `apple`
--

CREATE TABLE IF NOT EXISTS `apple` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apple`
--

INSERT INTO `apple` (`id`, `name`, `price`) VALUES
(1, 'iphone 6', 53500),
(2, 'iphone 5s', 33999),
(3, 'iphone 4s', 19999),
(4, 'iphone 3gs', 11099);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE IF NOT EXISTS `bid` (
  `username` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `name` varchar(255) NOT NULL,
  `modelname` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `balance` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `name` varchar(255) NOT NULL,
  `cardnumber` bigint(20) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cvv` int(11) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `Balance` bigint(20) NOT NULL,
  PRIMARY KEY (`cardnumber`),
  UNIQUE KEY `cvv` (`cvv`,`contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`name`, `cardnumber`, `cardname`, `cvv`, `date`, `address`, `contact`, `Balance`) VALUES
('AakashGoplani', 1234567890123456, 'Visa', 123, '2014-10-31', 'Ulhasnagar', 8600223633, 608032),
('KashishKukreja', 1234567891234555, 'American Express', 321, '2014-11-28', 'Mulund', 9619575220, 500000),
('MohitGurbani', 1234567891234567, 'Master Card', 456, '2014-10-29', 'Kalyan', 9096333263, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `address` text,
  UNIQUE KEY `password` (`password`,`email`,`dob`,`contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `password`, `email`, `dob`, `contact`, `address`) VALUES
('AakashGoplani', '123456', 'goplaniaakash14@gmail.com', '1993-11-14', 8600223633, 'Ulhasnagar.'),
('KashishKukreja', '123456', 'kashish.kukreja@ves.ac.in', '1993-12-28', 9619575220, 'Mulund'),
('MohitGurbani', '123456', 'mohit.gurbani@ves.ac.in', '1993-11-18', 9096333263, 'Kalyan');

-- --------------------------------------------------------

--
-- Table structure for table `samsung`
--

CREATE TABLE IF NOT EXISTS `samsung` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `samsung`
--

INSERT INTO `samsung` (`id`, `name`, `price`) VALUES
(1, 'Samsung Galaxy Note 4', 50000),
(2, 'Samsung Galaxy Star', 5000),
(3, 'Samsung E1207', 5017),
(4, 'Samsung Primo', 5999);

-- --------------------------------------------------------

--
-- Table structure for table `windows`
--

CREATE TABLE IF NOT EXISTS `windows` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `windows`
--

INSERT INTO `windows` (`id`, `name`, `price`) VALUES
(1, 'Nokia Lumia 520', 6799),
(2, 'Nokia Lumia 620', 9900),
(3, 'Nokia Lumia 920', 32095),
(4, 'Nokia Lumia 1520', 35125);
