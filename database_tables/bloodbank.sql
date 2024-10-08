-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 11:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `bloodgrp` varchar(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`name`, `email`, `contact`, `bloodgrp`, `password`, `address`) VALUES
('Abir', 'abirangshu.gc1k@gmail.com', '5798194135', 'O-', '9876', 'Dunlop'),
('Arin12', 'arin@gmail.com', '9874563210', 'O-', '12345', 'GT Road'),
('Asim', 'asim@gmail.com', '7894541491416', 'A-', '3456', 'California'),
('Priyashi', 'pipi@gmail.com', '1567987951', 'A-', '1278', 'Dumdum'),
('Rimi', 'rimi@gmail.com', '1245789813', 'B+', '5676', 'Girishpark');

-- --------------------------------------------------------

--
-- Table structure for table `replyd`
--

CREATE TABLE `replyd` (
  `id` int(11) NOT NULL,
  `user` varchar(80) NOT NULL,
  `donor` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `reply` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replyd`
--

INSERT INTO `replyd` (`id`, `user`, `donor`, `date`, `purpose`, `address`, `reply`) VALUES
(3, 'rakshit55arati@gmail.com', 'abirangshu.gc1k@gmail.com', '2024-04-14', 'opoowpopopwpopowpo', 'MNK Road', 'approved'),
(4, 'rakshit55arati@gmail.com', 'abirangshu.gc1k@gmail.com', '2024-04-20', 'agvdaddnsdaslhj', 'DumDum', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `donor` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `user`, `donor`, `date`, `purpose`, `address`) VALUES
(10, 'rakshit55arati@gmail.com', 'abirangshu.gc1k@gmail.com', '2024-04-18', 'iyfuruh', 'grsaerwdftyh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `contact`, `password`, `address`) VALUES
('Cilias', 'Ccily@gmail.com', '2498846326', '7891', 'LA'),
('Denver', 'den@gmail.com', '78945412913', '54321', 'Spain'),
('Arati', 'rakshit55arati@gmail.com', '4478951387', '1122', 'CA'),
('Zeni', 'zeni@gmail.com', '7845126859214', '345', 'belgharia'),
('Zoe', 'zoi@gmail.com', '2165798321', '654676', 'Goa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `replyd`
--
ALTER TABLE `replyd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `replyd`
--
ALTER TABLE `replyd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
