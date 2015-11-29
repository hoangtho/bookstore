-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2015 at 01:55 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
  PRIMARY KEY (`bookID`),
  KEY `categoryID` (`bookCateID`),
  KEY `authorID` (`bookAuthorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `bookName`, `bookDesc`, `bookPrice`, `bookCateID`, `date`, `bookAuthorID`, `bookBestSeller`, `bookImage`) VALUES
(2, 'Game of Thrones', 'Robb and Catelyn arrive at the Twins for the wedding. Jon is put to the test to see where his loyalties truly lie. Bran''s group decides to split up. Daenerys plans an invasion of Yunkai.', 22222, 2, '2015-10-09 17:29:55', 2, 0, ''),
(5, 'Doi Gio Hu', 'asdfdfasfa', 356, 4, '2015-11-05 15:03:03', 2, 1, ''),
(6, 'Gone with the windddddddddddddddddddddd', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 33333333, 4, '2015-11-08 09:52:03', 4, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cateID` int(10) NOT NULL AUTO_INCREMENT,
  `cateName` varchar(100) NOT NULL,
  PRIMARY KEY (`cateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cateID`, `cateName`) VALUES
(2, 'Fiction123'),
(3, 'Educ'),
(4, 'commic'),
(5, 'adf'),
(9, 'Electric device12');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackID` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`feedbackID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `email`, `content`) VALUES
(2, 'nothing@nothing.com', 'Greater flexibility. Journaling filesystems often create and allocate inodes as they are needed, rather than preallocating a specific number of inodes when the filesystem is created. This removes limitations on the number of files and directories that can be created on that partition. Not having to manage lists of inodes that have not yet been allocated also reduces some of the overhead associated with maintaining filesystem metadata and reduces the overhead involved if you subsequently want to change the size of a journaling filesystem.');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderID` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `fullname`, `orderDate`) VALUES
(42, 'SuperAdmin', '2015-11-28 10:17:40'),
(43, 'Hoàng Thơ12', '2015-11-28 12:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_detailID` int(10) NOT NULL AUTO_INCREMENT,
  `orderID` int(10) NOT NULL,
  `bookID` int(10) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` varchar(11) NOT NULL,
  PRIMARY KEY (`order_detailID`),
  KEY `orderID` (`orderID`),
  KEY `bookID` (`bookID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detailID`, `orderID`, `bookID`, `quantity`, `price`) VALUES
(21, 42, 2, 1, '22222'),
(22, 42, 6, 1, '33333333'),
(23, 42, 5, 1, '356'),
(24, 43, 2, 4, '22222');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fullname`, `username`, `password`, `level`, `email`, `address`) VALUES
(4, 'Hoàng Thơ12', 'hoangtho', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 0, 'hoangtho.htt@gmail.com', 'Khương Đình, HN'),
(5, 'SuperAdmin', 'admin', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 1, 'admin@bookstore.com', '12 Hill St'),
(6, 'Hoàng Thị Thơ', 'tho12', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 0, 'newcentury_2030@yahoo.com', 'linhtinh');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`bookCateID`) REFERENCES `category` (`cateID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`bookAuthorID`) REFERENCES `author` (`authorID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
