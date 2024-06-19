-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2023 at 10:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polyclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `patientName` varchar(60) NOT NULL,
  `doctorName` varchar(60) NOT NULL,
  `appointment_date` date NOT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'no',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mob` int(10) NOT NULL,
  `query` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mob`, `query`) VALUES
(1, 'nnn', 'a@gmail.com', 12313, 'fsdfsdgsdfgdsg');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedule`
--

CREATE TABLE `doctorschedule` (
  `username` varchar(50) NOT NULL,
  `appointment_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `slots` int(11) NOT NULL,
  `specialty` varchar(50) NOT NULL,
  `qualifications` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorschedule`
--

INSERT INTO `doctorschedule` (`username`, `appointment_date`, `start_time`, `end_time`, `slots`, `specialty`, `qualifications`) VALUES
('doctor ', '2023-12-10', '04:20:00', '05:23:00', 2, 'heart', 'heart');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `doctorName` varchar(50) NOT NULL,
  `patientName` varchar(50) NOT NULL,
  `medications` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `addInfo` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`doctorName`, `patientName`, `medications`, `dosage`, `addInfo`, `timestamp`) VALUES
('doctor', 'user2', '12', '12', '12', '2023-10-07 15:26:28'),
('doctor', 'nabil', 'sdf', 'sdf', 'sdf', '2023-10-08 06:44:07'),
('doctor', 'qa', 'me', '12', 'milk', '2023-12-08 17:10:26'),
('doctor', 'qa', '11', '11', '11', '2023-12-08 17:16:14'),
('doctor', 'qa', '111', '11', '11', '2023-12-08 17:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `pretest`
--

CREATE TABLE `pretest` (
  `doctorName` varchar(50) NOT NULL,
  `patientName` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `symptoms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pretest`
--

INSERT INTO `pretest` (`doctorName`, `patientName`, `age`, `weight`, `height`, `gender`, `symptoms`) VALUES
('doctor ', 'nabil', 12, 12, 12, 'male', '12'),
('doctor2 ', 'user2', 13, 13, 13, 'female', '13'),
('doctor ', 'user2', 12, 12, 12, 'male', '12'),
('doctor ', 'qa', 1, 1, 1, 'male', 'fever'),
('doctor ', 'qa', 1, 1, 1, 'male', '1'),
('doctor ', 'qa', 11, 11, 11, 'male', '11');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(60) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `fullname`, `email`, `password`, `role`) VALUES
('admin', 'admin', 'a@gmail.com', 'admin', 'admin'),
('doctor', 'doctor', 'doctor@gmail.com', 'doctor', 'doctor'),
('doctor2', 'doctor2', 'doctor2@gmail.com', 'doctor2', 'doctor'),
('nabil', 'Nabil Shah', 'n@gmail.com', 'nabil', 'user'),
('user2', 'user2', 'user2@gmail.com', 'user2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD UNIQUE KEY `patientName` (`patientName`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
