-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 03:28 PM
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
-- Database: `fsp_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cerita`
--

CREATE TABLE `cerita` (
  `idcerita` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `idusers_pembuat_awal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cerita`
--

INSERT INTO `cerita` (`idcerita`, `judul`, `idusers_pembuat_awal`) VALUES
(1, 'erin1', '160421046'),
(2, 'nico1', '160421029'),
(3, 'ketrin1', '160421082'),
(4, 'erin2', '160421046'),
(5, 'nico2', '160421029'),
(6, 'ketrin2', '160421082'),
(7, 'nico3', '160421029'),
(8, 'nico4', '160421029'),
(9, 'erin3', '160421046'),
(10, 'nico5', '160421029'),
(11, 'erin4', '160421046'),
(12, 'erin5', '160421046'),
(13, 'erin6', '160421046'),
(14, 'nico6', '160421029'),
(15, 'nico7', '160421029');

-- --------------------------------------------------------

--
-- Table structure for table `paragraf`
--

CREATE TABLE `paragraf` (
  `idparagraf` int(11) NOT NULL,
  `idusers` varchar(40) NOT NULL,
  `idcerita` int(11) NOT NULL,
  `isi_paragraf` varchar(100) DEFAULT NULL,
  `tanggal_buat` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paragraf`
--

INSERT INTO `paragraf` (`idparagraf`, `idusers`, `idcerita`, `isi_paragraf`, `tanggal_buat`) VALUES
(1, '160421046', 1, 'erin1', '2023-10-06 16:49:10'),
(2, '160421029', 2, 'nico1', '2023-10-06 16:49:22'),
(3, '160421082', 3, 'ketrin1', '2023-10-06 16:49:32'),
(4, '160421046', 4, 'erin2', '2023-10-06 16:49:45'),
(5, '160421029', 5, 'nico2', '2023-10-06 16:50:02'),
(6, '160421082', 6, 'ketrin2', '2023-10-06 16:50:16'),
(7, '160421029', 7, 'seli1', '2023-10-07 03:26:47'),
(8, '160421029', 8, 'paragraf 1', '2023-10-07 03:27:05'),
(9, '160421046', 9, 'Harry Potter adalah anak yang baik', '2023-10-07 03:28:07'),
(10, '160421029', 3, 'ketrin2', '2023-10-07 03:57:24'),
(11, '160421029', 1, 'erin2', '2023-10-07 06:29:45'),
(12, '160421029', 2, 'nico2', '2023-10-07 06:30:03'),
(13, '160421029', 3, 'ketrin3', '2023-10-07 06:30:14'),
(14, '160421029', 10, 'tururu adalah kelompok', '2023-10-07 06:30:26'),
(15, '160421029', 10, 'duar', '2023-10-07 06:30:34'),
(16, '160421029', 3, 'ketrin4', '2023-10-07 06:31:27'),
(17, '160421029', 2, 'nico3', '2023-10-07 06:31:37'),
(18, '160421029', 14, 'nico6', '2024-01-07 13:49:16'),
(19, '160421029', 15, 'nico7', '2024-01-07 13:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` varchar(40) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `nama`, `password`, `salt`) VALUES
('160421029', 'Nico', '697c43b6118603ca5a4ebecb1bf5df6164c50346', '325147a062'),
('160421046', 'Valerin', 'a7f10cfba54a0af1646ee5683ba77a264e132e48', '95bd5accc1'),
('160421082', 'Catherine', '282a718804ea2d54fdea1b2c74e3565bbda18b22', 'ed1a35d585');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cerita`
--
ALTER TABLE `cerita`
  ADD PRIMARY KEY (`idcerita`),
  ADD KEY `fk_cerita_users_idx` (`idusers_pembuat_awal`);

--
-- Indexes for table `paragraf`
--
ALTER TABLE `paragraf`
  ADD PRIMARY KEY (`idparagraf`),
  ADD KEY `fk_paragraf_users1_idx` (`idusers`),
  ADD KEY `fk_paragraf_cerita1_idx` (`idcerita`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cerita`
--
ALTER TABLE `cerita`
  MODIFY `idcerita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paragraf`
--
ALTER TABLE `paragraf`
  MODIFY `idparagraf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cerita`
--
ALTER TABLE `cerita`
  ADD CONSTRAINT `fk_cerita_users` FOREIGN KEY (`idusers_pembuat_awal`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paragraf`
--
ALTER TABLE `paragraf`
  ADD CONSTRAINT `fk_paragraf_cerita1` FOREIGN KEY (`idcerita`) REFERENCES `cerita` (`idcerita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paragraf_users1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
