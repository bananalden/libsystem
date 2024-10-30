-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 08:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(255) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `username`, `password`) VALUES
('11111111111', 'Thirty Five Bears', 'fnaf', '$2y$10$wNCn815M.jWsciw3KUeBEeGsx3t6Eg7JGnAXVjWeBzdHqj.uRGV9y'),
('21001396500', 'adminman', 'admin', '$2y$10$SE3fI9dAxQ0wK.E8CZVVz.lMDtr40ssAsZY0pd7vKLypoF8EwtmdG');

-- --------------------------------------------------------

--
-- Table structure for table `bookborrowlist`
--

CREATE TABLE `bookborrowlist` (
  `refID` int(11) NOT NULL,
  `bookID` varchar(255) NOT NULL,
  `booktitle` varchar(255) NOT NULL,
  `studentID` varchar(255) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `dateborrowed` date NOT NULL,
  `datedue` date NOT NULL,
  `datereturned` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `isbn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bookname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(255) NOT NULL,
  `yearpublished` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booklist`
--

INSERT INTO `booklist` (`isbn`, `bookname`, `author`, `category`, `yearpublished`, `status`) VALUES
('9780747548478', 'Holes', 'Louis Sachar', 'Fiction', 2000, 'ONSITE'),
('9781847496447', 'Moby Dick (Evergreens)', 'Herman Melville', 'Fiction', 2018, 'ONSITE'),
('9786214171217', 'Kronika Ekonomiks Grade 9', 'Alfredo A. Lozanta, JR.', 'Non-Fiction', 2018, 'ONSITE'),
('9789719807698', 'Practical Research for Senior High School 2', 'Amadeo Pangilinan Cristobal', 'Non-Fiction', 2017, 'ONSITE');

-- --------------------------------------------------------

--
-- Table structure for table `recyclebin`
--

CREATE TABLE `recyclebin` (
  `isbn` varchar(255) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `yearpublished` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentlist`
--

CREATE TABLE `studentlist` (
  `studentID` varchar(255) NOT NULL,
  `studentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentlist`
--

INSERT INTO `studentlist` (`studentID`, `studentName`) VALUES
('23530015523', 'Sang Joe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `bookborrowlist`
--
ALTER TABLE `bookborrowlist`
  ADD PRIMARY KEY (`refID`),
  ADD KEY `isbnFK` (`bookID`);

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `studentlist`
--
ALTER TABLE `studentlist`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookborrowlist`
--
ALTER TABLE `bookborrowlist`
  MODIFY `refID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
