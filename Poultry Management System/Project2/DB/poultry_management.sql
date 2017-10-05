-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 05:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poultry_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `BlockId` int(15) NOT NULL,
  `UserID` int(15) NOT NULL,
  `BlockDate` date NOT NULL,
  `BlockTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentId` int(15) NOT NULL,
  `PostId` int(15) NOT NULL,
  `UserID` int(15) NOT NULL,
  `Comments` varchar(200) NOT NULL,
  `CommentDate` date NOT NULL,
  `commentTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostId` int(15) NOT NULL,
  `UserID` int(15) NOT NULL,
  `PostDescription` text NOT NULL,
  `PostDate` date NOT NULL,
  `PostTime` time NOT NULL,
  `PostArea` varchar(20) NOT NULL,
  `PostType` varchar(20) NOT NULL,
  `PostStatus` tinyint(1) NOT NULL,
  `PostImage` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostId`, `UserID`, `PostDescription`, `PostDate`, `PostTime`, `PostArea`, `PostType`, `PostStatus`, `PostImage`) VALUES
(1, 5, 'this is a test post to check atabase.', '2017-08-14', '10:16:00', 'Rajshahi', 'idea', 1, NULL),
(2, 5, 'this is 2rd test post.', '2017-08-13', '10:38:00', 'Joypurhat', 'Buy', 0, NULL),
(3, 5, 'this is a 3rd test post.\r\n', '2017-08-13', '03:19:00', 'dinajspur', 'Sell', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(15) NOT NULL,
  `UserID` int(15) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductDescribtion` varchar(250) NOT NULL,
  `ProductType` varchar(20) NOT NULL,
  `LaunchingDate` date NOT NULL,
  `LaunchingTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportId` int(15) NOT NULL,
  `UserID` int(15) NOT NULL,
  `PostId` int(15) NOT NULL,
  `ReportDate` date NOT NULL,
  `ReportTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `UserType` varchar(15) NOT NULL,
  `UserStatus` tinyint(1) NOT NULL,
  `Image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `UserName`, `FirstName`, `LastName`, `Email`, `Mobile`, `password`, `DateOfBirth`, `UserType`, `UserStatus`, `Image`) VALUES
(2, 'Ehsan', 'Ehsanul', 'Haque', 'ehsanul14rb@gmail.com', '+8801987603822', '123456', '2017-08-14', 'Admin', 1, ''),
(3, 'Eh', 'Ehs', 'Hq', 'a@gmail.com', '01191499236', '1234567', '2017-08-16', 'Admin', 0, NULL),
(4, 'Ehsan1', 'Ehsan-ul-', 'Haque', 'ehsanul12rb@gmail.com', '01191499236', '123456', '2017-08-09', 'Admin', 0, 'any'),
(5, 'Raiyan90', 'Sharif', 'Raiyan', 'raiyan.sharif.1234@gmail.com', '+8801633673445', '12345678', '1994-08-01', 'Firm Owner', 1, 'any');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
