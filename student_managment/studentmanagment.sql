-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 03:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagment`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` varchar(30) NOT NULL,
  `Intime` time NOT NULL,
  `outtime` time NOT NULL,
  `date` date NOT NULL,
  `profid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `Intime`, `outtime`, `date`, `profid`) VALUES
('1602-18-733-029', '09:40:00', '10:40:00', '2021-11-01', '1602-math'),
('1602-18-733-029', '10:40:00', '11:40:00', '2021-11-01', '1602-phy'),
('1602-18-735-024', '09:28:00', '10:35:00', '2021-11-02', '1602-phy'),
('1602-18-735-024', '10:40:00', '11:40:00', '2021-11-02', '1602-math');

-- --------------------------------------------------------

--
-- Table structure for table `computerlab`
--

CREATE TABLE `computerlab` (
  `id` varchar(30) NOT NULL,
  `intime` time NOT NULL,
  `outtime` time NOT NULL,
  `date` date NOT NULL,
  `labname` varchar(30) NOT NULL,
  `profid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `computerlab`
--

INSERT INTO `computerlab` (`id`, `intime`, `outtime`, `date`, `labname`, `profid`) VALUES
('1602-18-733-029', '02:20:00', '03:20:00', '2021-11-01', 'Physicslab', '1602-phy'),
('1602-18-735-024', '02:20:00', '03:20:00', '2021-11-02', 'Chemistrylab', '1602-chem');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` varchar(30) NOT NULL,
  `Intime` time NOT NULL,
  `outtime` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `Intime`, `outtime`, `date`) VALUES
('1602-18-733-029', '01:20:00', '02:20:00', '2021-11-02'),
('1602-18-735-024', '01:20:00', '02:20:00', '2021-11-02'),
('1602-18-733-029', '01:20:00', '02:20:00', '2021-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `proffesorinfo`
--

CREATE TABLE `proffesorinfo` (
  `name` varchar(30) NOT NULL,
  `gmail` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proffesorinfo`
--

INSERT INTO `proffesorinfo` (`name`, `gmail`, `subject`, `id`) VALUES
('Alfred Noble', 'ANchem@gmail.com', 'Chemistry', '1602-chem'),
('Ramanujan', 'math@gmail.com', 'Maths', '1602-math'),
('Newton', 'phy@gmail.com', 'Physics', '1602-phy');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `password`, `year`) VALUES
('1602-18-733-029', 'niteesh', '1234', 4),
('1602-18-735-024', 'Mohith', 'Mohith', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD KEY `id` (`id`),
  ADD KEY `profid` (`profid`);

--
-- Indexes for table `computerlab`
--
ALTER TABLE `computerlab`
  ADD KEY `id` (`id`),
  ADD KEY `profid` (`profid`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD KEY `name` (`id`);

--
-- Indexes for table `proffesorinfo`
--
ALTER TABLE `proffesorinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id`) REFERENCES `studentinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`profid`) REFERENCES `proffesorinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `computerlab`
--
ALTER TABLE `computerlab`
  ADD CONSTRAINT `computerlab_ibfk_1` FOREIGN KEY (`id`) REFERENCES `studentinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `computerlab_ibfk_2` FOREIGN KEY (`profid`) REFERENCES `proffesorinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `name` FOREIGN KEY (`id`) REFERENCES `studentinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
