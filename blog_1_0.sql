-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2021 at 09:52 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_1_0`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_categoryid` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `creation_date`, `category_id`) VALUES
(1, 'Article 1 ', 'Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 Article 1 ', '2021-11-11 13:07:50', 1),
(2, 'Article 2', 'Article 2Article 2Article 2Article 2Article 2Article 2Article 2Article 2Article 2Article 2Article 2Article 2', '2021-11-25 13:08:13', 2),
(3, 'dc', 'cd', '2021-11-09 14:25:51', 1),
(4, 'dsssssss', 'dssssss', '2021-11-09 14:27:11', 2),
(5, 'sssssss', 'sd', '2021-11-09 14:32:02', 1),
(6, 'sdddddddddddddd', 'dddddddddd', '2021-11-09 14:43:58', 1),
(7, 'sdddddddddddddd', 'dddddddddd', '2021-11-09 14:44:27', 1),
(8, 'sdddddddddddddd', 'dddddddddd', '2021-11-09 14:44:51', 1),
(9, 'sddddddddd', 'ds', '2021-11-09 14:45:53', 2),
(10, 'sddddddddd', 'ds', '2021-11-09 14:47:07', 2),
(11, 'tes', 'sss', '2021-11-09 15:07:47', 2),
(12, 'zx', 'sx', '2021-11-09 20:47:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Review article'),
(2, 'Clinical trial');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article` int(11) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_article_id` (`article`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `article`, `creation_date`) VALUES
(1, 'first comment', 1, '2021-11-16 00:00:00'),
(2, 'test', 1, '2021-11-16 00:00:00'),
(3, 'test comment', 1, '2021-11-22 00:00:00'),
(4, 'test vue', 1, '2021-11-09 21:36:16'),
(5, 'vue', 1, '2021-11-09 21:38:28'),
(6, 'vue', 1, '2021-11-09 21:39:52'),
(7, 'ss', 1, '2021-11-09 21:50:28'),
(8, 'cvxxc', 1, '2021-11-09 21:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211107144917', '2021-11-07 14:49:53', 86),
('DoctrineMigrations\\Version20211108075557', '2021-11-08 07:56:08', 197),
('DoctrineMigrations\\Version20211108101340', '2021-11-08 10:13:51', 125),
('DoctrineMigrations\\Version20211108105148', '2021-11-08 10:51:57', 247),
('DoctrineMigrations\\Version20211109094451', '2021-11-09 09:45:13', 207),
('DoctrineMigrations\\Version20211109105709', '2021-11-09 10:57:18', 106),
('DoctrineMigrations\\Version20211109152136', '2021-11-09 15:21:45', 215),
('DoctrineMigrations\\Version20211109152228', '2021-11-09 15:22:36', 72),
('DoctrineMigrations\\Version20211109152656', '2021-11-09 15:27:02', 230),
('DoctrineMigrations\\Version20211109152752', '2021-11-09 15:28:03', 137),
('DoctrineMigrations\\Version20211109192902', '2021-11-09 19:29:20', 1213),
('DoctrineMigrations\\Version20211109192911', '2021-11-09 19:39:41', 1694),
('DoctrineMigrations\\Version20211109193930', '2021-11-09 19:44:21', 286),
('DoctrineMigrations\\Version20211109194020', '2021-11-09 19:44:48', 1006);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` json NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `roles`) VALUES
(1, 'esraaelzahaby40@gmail.com', '$2y$13$.4lJTY4vyAh3bDIySVpYXOC8RgmClLLRBsNiJS.qh05C/dGcSkAj.', '[]');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_categoryid` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_article_id` FOREIGN KEY (`article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
