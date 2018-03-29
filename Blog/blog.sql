-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2018 at 03:05 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin_users`
--

CREATE TABLE `table_admin_users` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `login` char(55) NOT NULL,
  `password` char(60) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_admin_users`
--

INSERT INTO `table_admin_users` (`id_admin`, `login`, `password`, `is_active`) VALUES
(1, 'nico', '40f87474047b720c568c7eb668cd40272530043e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_article`
--

CREATE TABLE `table_article` (
  `id_art` int(10) UNSIGNED NOT NULL,
  `id_cat` int(10) UNSIGNED NOT NULL,
  `id_author` int(10) UNSIGNED NOT NULL,
  `title` char(30) NOT NULL,
  `content` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_article`
--

INSERT INTO `table_article` (`id_art`, `id_cat`, `id_author`, `title`, `content`, `date_time`) VALUES
(17, 2, 5, 'SZzzff', 'URURURUR', '2018-01-03 10:22:54'),
(18, 2, 6, 'Ratata', 'ghrezgez', '2018-01-03 12:32:32'),
(19, 2, 6, 'Urkurk', 'azt', '2018-01-03 12:32:45'),
(20, 2, 6, 'Rafaaaaaa', 'azetgtggg', '2018-01-03 12:33:02'),
(21, 2, 6, 'Grabou', 'fhklmùù*', '2018-01-03 12:33:20'),
(22, 2, 6, 'Graggrb', 'Gouloup', '2018-01-03 13:38:12'),
(23, 2, 6, 'Je suis là', '!!!!!!!!!!!', '2018-03-13 14:33:53'),
(24, 2, 6, 'Jean', 'Duponf', '2018-03-13 17:57:54'),
(25, 2, 6, 'Gurlu', 'Gefzeczefze', '2018-03-22 18:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `table_author`
--

CREATE TABLE `table_author` (
  `id_author` int(10) UNSIGNED NOT NULL,
  `name_author` varchar(50) NOT NULL,
  `subscribe_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_author`
--

INSERT INTO `table_author` (`id_author`, `name_author`, `subscribe_date`) VALUES
(5, 'Roger', '2017-12-06'),
(6, 'Herbert', '2017-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `table_cat`
--

CREATE TABLE `table_cat` (
  `id_cat` int(10) UNSIGNED NOT NULL,
  `name_cat` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_cat`
--

INSERT INTO `table_cat` (`id_cat`, `name_cat`, `is_active`) VALUES
(2, 'Voyage', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_comment`
--

CREATE TABLE `table_comment` (
  `id_com` int(10) UNSIGNED NOT NULL,
  `id_art` int(10) UNSIGNED NOT NULL,
  `pseudo` char(15) NOT NULL,
  `content_com` text NOT NULL,
  `date_comment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_comment`
--

INSERT INTO `table_comment` (`id_com`, `id_art`, `pseudo`, `content_com`, `date_comment`) VALUES
(1, 17, 'Zdf', 'afz', '2018-03-29 16:59:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin_users`
--
ALTER TABLE `table_admin_users`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `table_article`
--
ALTER TABLE `table_article`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_author` (`id_author`);

--
-- Indexes for table `table_author`
--
ALTER TABLE `table_author`
  ADD PRIMARY KEY (`id_author`);

--
-- Indexes for table `table_cat`
--
ALTER TABLE `table_cat`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `table_comment`
--
ALTER TABLE `table_comment`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_art` (`id_art`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin_users`
--
ALTER TABLE `table_admin_users`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `table_article`
--
ALTER TABLE `table_article`
  MODIFY `id_art` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `table_author`
--
ALTER TABLE `table_author`
  MODIFY `id_author` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `table_cat`
--
ALTER TABLE `table_cat`
  MODIFY `id_cat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `table_comment`
--
ALTER TABLE `table_comment`
  MODIFY `id_com` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_article`
--
ALTER TABLE `table_article`
  ADD CONSTRAINT `id_authorFK` FOREIGN KEY (`id_author`) REFERENCES `table_author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_catFK` FOREIGN KEY (`id_cat`) REFERENCES `table_cat` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_comment`
--
ALTER TABLE `table_comment`
  ADD CONSTRAINT `id_artFK` FOREIGN KEY (`id_art`) REFERENCES `table_article` (`id_art`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
