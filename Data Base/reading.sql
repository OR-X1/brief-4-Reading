-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 03:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reading`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `idA` int(4) NOT NULL,
  `Fname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) DEFAULT NULL,
  `dateN` date DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`idA`, `Fname`, `Lname`, `dateN`, `image`) VALUES
(1, 'Amal', 'Mtahri', '2000-10-16', 'external-content.duckduckgo.png'),
(2, 'Othmane', 'Rhazlani', '1998-05-19', 'auteur1.jpg'),
(3, 'soumia ', 'kabrane', '2021-03-27', 'external-content.duckduckgo.png'),
(5, 'amine', 'abdlmaati', '2021-03-11', 'auteur1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `idB` int(4) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Price` int(4) DEFAULT NULL,
  `dateB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`idB`, `image`, `Name`, `Price`, `dateB`) VALUES
(46, 'book6.jpg', 'All the light we cannot', 150, '2021-03-12'),
(47, 'book1.jpg', 'The dreamers karen', 300, '2021-03-11'),
(48, 'book4.jpg', 'The water cure', 120, '2021-03-11'),
(52, 'book8.jpg', 'The age of light', 170, '2021-03-08'),
(53, 'book2.jpg', 'The lost girls of paris', 310, '5644-12-31'),
(54, 'maid_hc__2__copy.jpg', 'maid', 220, '5644-12-31'),
(55, 'book5.jpg', 'The last romantics', 230, '2021-03-06'),
(56, 'book4.jpg', 'The water cure', 400, '2021-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `idg` int(4) NOT NULL,
  `idB` int(4) DEFAULT NULL,
  `idA` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`idg`, `idB`, `idA`) VALUES
(60, 47, 1),
(61, 47, 2),
(68, 48, 2),
(69, 52, 1),
(72, 54, 1),
(73, 54, 2),
(74, 53, 1),
(75, 53, 2),
(76, 55, 3),
(77, 56, 1),
(78, 56, 3),
(82, 46, 1),
(83, 46, 2),
(84, 46, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`idA`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`idB`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`idg`),
  ADD KEY `idB` (`idB`),
  ADD KEY `idA` (`idA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `idA` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `idB` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `idg` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`idB`) REFERENCES `books` (`idB`),
  ADD CONSTRAINT `gallery_ibfk_2` FOREIGN KEY (`idA`) REFERENCES `authors` (`idA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
