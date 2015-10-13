-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2015 at 10:33 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `authorID` int(10) NOT NULL AUTO_INCREMENT,
  `authorName` varchar(100) NOT NULL,
  `bookID` int(10) NOT NULL,
  PRIMARY KEY (`authorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorID`, `authorName`, `bookID`) VALUES
(1, 'Nicolas Sparks', 1),
(2, 'George R. R. Martin', 2),
(3, 'Nicolas Sparks', 3),
(4, 'David Benioff', 2);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bookID` int(10) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(100) NOT NULL,
  `bookDesc` text NOT NULL,
  `bookPrice` double NOT NULL,
  `bookCateID` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bookAuthorID` int(10) NOT NULL,
  `bookBestSeller` tinyint(1) NOT NULL,
  `bookImage` varchar(100) NOT NULL COMMENT 'Nơi chứa link upload của file ảnh',
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `bookName`, `bookDesc`, `bookPrice`, `bookCateID`, `date`, `bookAuthorID`, `bookBestSeller`, `bookImage`) VALUES
(1, 'The Best of Me', 'A young woman with a mysterious past lands in Southport, North Carolina where her bond with a widower forces her to confront the dark secret that haunts her. ', 34, 1, '2015-10-09 17:18:14', 1, 1, ''),
(2, 'Game of Thrones', 'Robb and Catelyn arrive at the Twins for the wedding. Jon is put to the test to see where his loyalties truly lie. Bran''s group decides to split up. Daenerys plans an invasion of Yunkai.', 22, 2, '2015-10-09 17:29:55', 2, 0, ''),
(3, 'Dear John', 'A romantic drama about a soldier who falls for a conservative college student while he''s home on leave', 10, 1, '2015-10-09 17:36:17', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cateID` int(10) NOT NULL AUTO_INCREMENT,
  `cateName` varchar(100) NOT NULL,
  PRIMARY KEY (`cateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cateID`, `cateName`) VALUES
(1, 'romance'),
(2, 'fiction'),
(3, 'education'),
(4, 'commic');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderID` int(10) NOT NULL AUTO_INCREMENT,
  `bookID` int(10) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipDate` timestamp NOT NULL,
  `paidStatus` tinyint(2) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierID` int(10) NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(100) NOT NULL,
  `supplierAddress` varchar(150) NOT NULL,
  `supplierPhone` int(15) NOT NULL,
  `supplierEmail` varchar(50) NOT NULL,
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplierName`, `supplierAddress`, `supplierPhone`, `supplierEmail`) VALUES
(1, 'Higginbothams Private Limited', 'Iyattil Junction, Chittoor Road, Ernakulam-682 011', 484368834, 'rajththachapuzha@yahoo.com'),
(2, 'V Publishers', 'CMS College Road, Kottayam PIN-686 001', 481256747, 'vpublisher@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` tinyint(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fullname`, `username`, `password`, `level`, `email`, `address`) VALUES
(2, 'ndchinh', 'chinh', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 0, 'chinh@gmail.com', '12343fsdfdsgd'),
(4, 'Hoàng Thị Thơ', 'hoangtho', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 0, 'hoangtho.htt@gmail.com', 'Khương Đình, HN'),
(5, 'SuperAdmin', 'admin', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 1, 'admin@bookstore.com', '12 Hill St');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
