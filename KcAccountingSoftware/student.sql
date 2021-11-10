-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 04:53 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `client_info` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `roll` varchar(250) NOT NULL,
  `class` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `pcontact` varchar(25) NOT NULL,
  `clientemail` varchar(50) DEFAULT NULL,
  `gstnumber` varchar(50) DEFAULT NULL,
  `qstnumber` varchar(50) DEFAULT NULL,
  `neqnumber` varchar(50) DEFAULT NULL,
  `dasfed` varchar(50) DEFAULT NULL,
  `daspro` varchar(50) DEFAULT NULL,
  `dasfedcyc` varchar(50) DEFAULT NULL,
  `dasprocyc` varchar(50) DEFAULT NULL,
  `yearend` date DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `clientemail`, `gstnumber`, `qstnumber`, `neqnumber`, `dasfed`, `daspro`, `dasfedcyc`, `dasprocyc`, `yearend`, `datetime`) VALUES
(48, 'andre', 'odin ss', 'monthly', '123265', '194444444', 'daffdd@gmail.com', '25152', '02533', '3333', '33333', '3333', 'monthly', 'monthly', NULL, '2021-05-19 22:56:03'),
(61, 'andre22', 'cats', 'Monthly', '331 699 e', '5145445768', 'sddsdd@gmail.com', '2151511', '2151115', '22121', '422525', '255252', 'Monthly', 'Monthly', '2021-05-21', '2021-05-20 04:06:28'),
(62, 'andre33', 'make 33', 'monthly', '3333333', '3333333333', '33333333@gmail.com', '33333333333', '33333333333', '3333', '33333', '255252', 'Select', 'Select', '2021-01-01', '2021-05-20 04:07:35'),
(63, 'Kiki', 'Kc Acounting', 'monthly', '5136 cure labelle', '5148963255', 'kikikc@kcacounting.Com', '12253', '33655', '12155', '422525', '255252', 'Select', 'Select', '2021-02-05', '2021-05-20 05:55:53'),
(64, 'NewstOne', 'Gold inc', 'Anually', 'gold street', '5149999999', 'gold@gmail.com', '15454ss', '21511d15d', '22121ds', '422525sd', '255252dsd', 'Quarterly', 'Semi-Anually', '2021-04-01', '2021-05-20 06:09:31'),
(65, 'adam sandler', 'Happy Gilmore', 'Anually', 'hoollywood', '9126659955', 'adam@happy.com', '115115', '15999', '665652', '656555', '65556', 'Monthly', 'Monthly', '2021-05-01', '2021-05-21 00:23:06'),
(66, 'johnny bravo', 'hairGGGEL', 'Monthly', 'cartoonvile', '98988566552', 'johnnybravo@gmail.com', '326556', '65623', '266565', '656566', '2322322', 'Monthly', 'Monthly', '2021-01-01', '2021-05-24 01:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'active',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(21, 'andre', 'af22@gmail.com', 'andref22', '56d015ad8e7876c66ab61123fe3356e4cea07269', 'andref2200-05-21-05-2021MyLogo.PNG', 'active', '2021-05-19 20:14:42'),
(24, 'kiki', 'kiki', 'kiki', '95752f86c99f1055feba64e03924cb71f0c08315', NULL, 'active', '2021-05-21 00:56:02'),
(25, 'test', 'test@test.com', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test36-05-21-05-2021KC-Logo-Abbrev.jpg', 'active', '2021-05-24 03:07:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `client_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
