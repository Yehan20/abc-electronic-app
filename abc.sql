-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2022 at 04:34 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no`, `username`, `password`) VALUES
(2, 'abc', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`no`, `name`, `type`, `price`, `amount`, `orderid`, `username`, `result`, `address`) VALUES
(27, 'SSD', 'others', 100, 2, 'OD329543', 'test', 'paid', 'abc new city'),
(26, 'Standard Keyboard', 'keyboards', 4, 1, 'OD863706', 'test', 'completed', '123 , new city'),
(25, 'Apple MacBook', 'laptops', 898, 1, 'OD540488', 'test', 'completed', '123 new road, botson');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` varchar(30) NOT NULL,
  `paid` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `orderId`, `paid`) VALUES
(20, 'OD329543', '100'),
(19, 'OD540488', '898'),
(18, 'OD863706', '4');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`no`, `type`, `name`, `description`, `price`, `stock`, `path`) VALUES
(3, 'laptops', 'Apple MacBook', '1TB, SSD 16Gb ram, Mac Os', 898, 18, 'images/laptops/61d5aaa726d526.58787738.jpg'),
(2, 'laptops', 'HP Pro(i5)', '512GB , with Nvdia Graphics 8gb Ram', 456, 15, 'images/laptops/61d59b0ddbb266.96596632.jpg'),
(4, 'laptops', 'Dell Future', 'i7 windows 11 512gb ssd ', 234, 1230, 'images/laptops/61d5ad2a50a7b3.14180370.jpg'),
(5, 'mobiles', 'Huwaei Y2', '8gb Ram , 8mp Camera, 6inch Gold', 34, 11, 'images/mobiles/61d5e7356f3ed4.73800098.jpg'),
(6, 'mouse', 'Wirless mouse ', 'cool mouse for gaming ', 12, 55, 'images/mouse/61d5e8309cdb50.56020304.jpg'),
(7, 'keyboards', 'LED Keyboard', 'Cool Keyboard used for Gaming', 4, 40, 'images/keyboards/61d5e881449fc3.00282360.jpg'),
(9, 'laptops', 'Ausus Rouge', 'Super gaming Lap 512gb ssd win 10 pro', 123, 49, 'images/laptops/61d6988806c0a9.50851639.jpg'),
(10, 'keyboards', 'Black Keyboard', 'Wired Rubber keyboard, 3.0 port', 15, 40, 'images/keyboards/61dfd3ca689b68.31374756.jpg'),
(12, 'mouse', 'Logitech Wireless Mouse', 'Lightweight thick grip mouse, 2.0 port', 5, 50, 'images/mouse/61dfd8b845c465.22102246.png'),
(14, 'mouse', 'HP Wired Mouse', 'Strong rough mouse, Smooth movement', 6, 50, 'images/mouse/61dfdb357cb8f4.17609457.jpg'),
(15, 'mobiles', 'Iphone 6', 'Black casing Iphone', 100, 50, 'images/mobiles/61dfddeb940134.53170156.png'),
(16, 'mobiles', 'Samsung Note 9', '8gb Ram , 512gb Storage, 400mah Battery', 120, 50, 'images/mobiles/61dfde5eeefb80.75971956.jpg'),
(17, 'mouse', 'PickTek Gaming mouse', '8 Programmable Buttons, Chroma RGB Backlit', 40, 20, 'images/mouse/61dfdf3c0f2912.70850693.jpg'),
(18, 'keyboards', 'Wireless keyboard', 'Strong keys, ideal for gaming, 3.0 port', 12, 50, 'images/keyboards/61dfe0279ba230.27864691.jpg'),
(19, 'mobiles', 'Xiaomi M11', '3GB Ram,108mp', 75, 4, 'images/mobiles/61dfe40d543820.74066389.jpg'),
(20, 'keyboards', 'Standard Keyboard', 'Excellent for School use , 2.0 port', 4, 3, 'images/keyboards/61dfe4b1a58e65.18251627.jpg'),
(21, 'others', 'SSD', 'Adata 512 Gb ssd ,', 50, 48, 'images/others/61dfe4ddcf8226.29381662.jpg'),
(22, 'others', 'pen', 'light weight sandisk , pen drive', 8, 55, 'images/others/61dfe4f331eee0.73505688.jpg'),
(23, 'others', 'beats', 'Super beats, High quality musics', 16, 15, 'images/others/61dfe508206d84.43660560.jpg'),
(24, 'others', 'Boom speakers', 'Smooth sounds, high base', 30, 15, 'images/others/61dfe51e8ed937.78836004.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `username`, `fullname`, `birthday`, `gender`, `password`) VALUES
(44, 'test', 'test user', '1998-08-01', 'male', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
