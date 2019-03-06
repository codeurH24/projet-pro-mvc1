-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 06 Mars 2019 à 10:11
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pc-config`
--
CREATE DATABASE IF NOT EXISTS `pc-config` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `pc-config`;

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `pass_right` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `access`
--

INSERT INTO `access` (`id`, `url`, `role_id`, `pass_right`) VALUES
(1, '^/admin/*', 1, 0),
(3, '^/admin/utilisateurs/*', 2, 0),
(6, '^/admin/roles/*', 2, 0),
(7, '^/admin/log/*', 2, 0),
(8, '^/admin/acces/*', 2, 0),
(9, ' ^/admin/*', 5, 0),
(10, '^/mes-creations/*', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'carte graphique'),
(4, 'mémoire vive'),
(6, 'disque dur'),
(7, 'alimentation'),
(8, 'processeur'),
(9, 'carte mère');

-- --------------------------------------------------------

--
-- Structure de la table `compatibility`
--

CREATE TABLE `compatibility` (
  `id` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `id_component1` int(11) NOT NULL,
  `id_component2` int(11) NOT NULL,
  `date_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `compatibility`
--

INSERT INTO `compatibility` (`id`, `autor`, `id_component1`, `id_component2`, `date_at`) VALUES
(1, 'codeurh24', 54, 38, '2018-11-04 16:14:53'),
(2, 'codeurh24', 38, 53, '2018-11-04 16:35:14'),
(3, 'admin master', 37, 88, '2018-12-16 21:10:18');

-- --------------------------------------------------------

--
-- Structure de la table `compatibility_tag`
--

CREATE TABLE `compatibility_tag` (
  `id` int(11) NOT NULL,
  `id_component` int(11) NOT NULL,
  `tag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `compatibility_tag`
--

INSERT INTO `compatibility_tag` (`id`, `id_component`, `tag`) VALUES
(2, 16, '1151'),
(3, 17, '1151'),
(4, 18, '1151'),
(5, 19, 'am4'),
(6, 21, 'am4'),
(7, 23, 'am4'),
(8, 24, 'am4'),
(9, 20, '1151'),
(12, 22, '1151'),
(13, 25, '1151'),
(14, 26, 'am4'),
(15, 27, '2066'),
(16, 49, '1151'),
(17, 50, '1151'),
(18, 53, '1151'),
(19, 54, '1151'),
(20, 56, '1151'),
(21, 58, '1151'),
(22, 51, '1151'),
(23, 52, 'am4'),
(24, 55, 'am4'),
(25, 57, 'am4'),
(26, 56, 'RAM 2 slot'),
(27, 84, '2 barrettes'),
(28, 85, '2 barrettes'),
(29, 88, '2 barrettes'),
(30, 94, '2 barrettes'),
(31, 98, '2 barrettes'),
(32, 99, '2 barrettes'),
(33, 102, '2 barrettes'),
(34, 103, '2 barrettes'),
(35, 104, '2 barrettes'),
(36, 106, '2 barrettes'),
(37, 111, '2 barrettes'),
(38, 112, '2 barrettes'),
(39, 114, '2 barrettes'),
(40, 115, '2 barrettes'),
(41, 121, '2 barrettes'),
(42, 122, '2 barrettes'),
(43, 124, '2 barrettes'),
(44, 125, '2 barrettes'),
(45, 90, '3 barrettes'),
(46, 108, '3 barrettes'),
(47, 116, '3 barrettes'),
(49, 49, 'ddr4'),
(50, 57, 'ddr4'),
(51, 50, 'ddr4'),
(52, 53, 'ddr4'),
(53, 54, 'ddr4'),
(54, 56, 'ddr4'),
(55, 64, 'ddr4'),
(56, 65, 'ddr4'),
(57, 66, 'ddr4'),
(58, 67, 'ddr4'),
(59, 68, 'ddr4'),
(60, 69, 'ddr4'),
(61, 70, 'ddr4'),
(62, 71, 'ddr4'),
(63, 72, 'ddr4'),
(64, 73, 'ddr4'),
(65, 74, 'ddr4'),
(66, 128, '2066'),
(67, 129, '2066'),
(68, 128, 'ddr4'),
(69, 128, '8 fentes RAM'),
(70, 49, '2 fentes RAM'),
(71, 60, 'ddr3'),
(73, 52, 'ddr4'),
(74, 130, 'ddr3'),
(75, 130, 'am3+'),
(76, 130, '2 fentes RAM'),
(77, 131, 'am4'),
(79, 132, 'am4'),
(80, 132, '4 fentes RAM'),
(82, 143, '1151'),
(83, 143, 'ddr4'),
(84, 143, '2 fentes RAM');

-- --------------------------------------------------------

--
-- Structure de la table `component`
--

CREATE TABLE `component` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `point_puissance` int(11) DEFAULT '0',
  `autor` varchar(255) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `date_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `component`
--

INSERT INTO `component` (`id`, `model`, `marque`, `point_puissance`, `autor`, `id_cat`, `date_at`) VALUES
(17, 'CPU INTEL CELERON G4920 - DOUBLE COEUR DE 3.2GHZ - 8EME GENERATION - COFFEE LAKE', 'Intel', 3521, 'codeurh24', 8, '2018-10-14 08:23:00'),
(18, 'CPU INTEL PENTIUM G5400 - DOUBLE COEUR DE 3.7GHZ - 8EME GENERATION - COFFEE LAKE-S', 'Intel', 5231, 'codeurh24', 8, '2018-10-14 08:23:00'),
(19, 'CPU AMD RYZEN 3 1200 WRAITH STEALTH EDITION - 4C/4T - 3.1  3.4GHZ', 'AMD', 6758, 'Florent Corlouer', 8, '2018-10-27 13:10:15'),
(20, 'CPU INTEL PENTIUM G5500 - DOUBLE COEUR DE 3.8GHZ - 8EME GENERATION - COFFEE LAKE-S', 'Intel', 5194, 'Florent Corlouer', 8, '2018-10-27 12:42:45'),
(21, 'CPU AMD RYZEN 3 2200 WRAITH STEALTH EDITION - 4C/4T - 3.5  3.7GHZ', 'AMD', 7434, 'Florent Corlouer', 8, '2018-10-27 12:43:59'),
(22, 'CPU INTEL PENTIUM G5600 - DOUBLE COEUR DE 3.9GHZ - 8EME GENERATION - COFFEE LAKE-S', 'Intel', 5707, 'Florent Corlouer', 8, '2018-10-27 12:45:50'),
(23, 'CPU AMD RYZEN 5 2400G WRAITH STEALTH EDITION - 4C/8T - 3.6  3.9GHZ', 'AMD', 9282, 'Florent Corlouer', 8, '2018-10-27 12:47:13'),
(24, 'CPU AMD RYZEN 5 2600 WRAITH STEALTH EDITION - 6C/12T - 3.4  3.9GHZ', 'AMD', 13508, 'Florent Corlouer', 8, '2018-10-27 12:48:39'),
(25, 'CPU INTEL CORE I3-7350K - DOUBLE COEUR DE 4.2GHZ - 7EME GENERATION - KABY LAKE', 'Intel', 6620, 'Florent Corlouer', 8, '2018-10-27 12:50:43'),
(26, 'CPU AMD Athlon 200GE - 2C/4T - 3.2 Ghz', 'AMD', 4928, 'Florent Corlouer', 8, '2018-10-27 13:08:24'),
(27, 'CPU Intel Core i5-7640X - Quadruple Coeur de 4.0  4.2Ghz - 8eme GENERATION - Kaby Lake X', 'AMD', 9585, 'Florent Corlouer', 8, '2018-10-27 13:32:09'),
(28, ' PCI-E16X , MSI , Nvidia GEFORCE GT710 - 1Go', 'MSI', 678, 'Florent Corlouer', 2, '2018-10-27 14:58:06'),
(29, 'PCI-E16X , MSI , Nvidia GEFORCE GT710 - 2Go', 'MSI', 678, 'Florent Corlouer', 2, '2018-10-27 15:00:38'),
(30, 'PCI-E16X , MSI , Nvidia GEFORCE GT1030 - 2Go - OC', 'MSI', 2224, 'Florent Corlouer', 2, '2018-10-27 15:20:16'),
(31, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GT1030 - 2Go - Low Profile - OC', 'GIGABYTE ', 2224, 'Florent Corlouer', 2, '2018-10-27 15:22:13'),
(32, 'PCI-E16X , MSI , Nvidia GEFORCE GTX1050 - 2Go - OC', 'GEFORCE', 4607, 'Florent Corlouer', 2, '2018-10-27 15:24:51'),
(33, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1050 - 2Go', 'GIGABYTE ', 4607, 'Florent Corlouer', 2, '2018-10-27 15:27:10'),
(34, ' PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1050 - 2Go - G1 GAMING', 'GIGABYTE ', 4607, 'Florent Corlouer', 2, '2018-10-27 15:29:38'),
(35, 'ASUS , Nvidia GEFORCE GTX1050 - 2Go', 'ASUS', 4607, 'Florent Corlouer', 2, '2018-10-27 15:31:26'),
(36, 'PCI-E , MSI , Nvidia GEFORCE GTX1050 - 2Go - Low Profile', 'MSI ', 4607, 'Florent Corlouer', 2, '2018-10-27 15:33:11'),
(37, 'PCI-E16X , MSI , Nvidia GEFORCE GTX1050 - AERO ITX - 2Go - OC', 'MSI ', 4607, 'Florent Corlouer', 2, '2018-10-27 15:34:29'),
(38, ' PCI-E , MSI , Nvidia GEFORCE GTX1050TI - 4Go', 'MSI ', 5947, 'Florent Corlouer', 2, '2018-10-27 15:35:46'),
(39, 'PCI-E16X , ASUS , Nvidia GEFORCE GTX1050 - 2Go - OC STRIX GAMING', 'ASUS ', 5947, 'Florent Corlouer', 2, '2018-10-27 15:36:56'),
(40, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1050Ti - 4Go - G1 GAMING', 'GIGABYTE', 5947, 'Florent Corlouer', 2, '2018-10-27 15:39:44'),
(41, 'PCI-E16X , MSI , Nvidia GEFORCE GTX1050TI - 4Go - GAMING X', 'MSI', 5947, 'Florent Corlouer', 2, '2018-10-27 15:40:41'),
(42, ' PCI-E16X , ASUS , Nvidia GEFORCE GTX1060 - 3Go - Phoenix', 'ASUS', 9006, 'Florent Corlouer', 2, '2018-10-27 16:10:36'),
(43, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1070 - 8Go', 'GIGABYTE', 11204, 'Florent Corlouer', 2, '2018-10-27 16:12:25'),
(44, ' PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1080 - 8Go', 'GIGABYTE', 12323, 'Florent Corlouer', 2, '2018-10-27 16:13:46'),
(45, ' PCI-E16X , MSI , Nvidia GEFORCE RTX2070 - 8Go - AERO', 'MSI', 13435, 'Florent Corlouer', 2, '2018-10-27 16:15:33'),
(46, ' PCI-E16X , Gigabyte , Nvidia GEFORCE RTX2080 - 8Go - OC - GAMING', 'Gigabyte', 15657, 'Florent Corlouer', 2, '2018-10-27 16:17:37'),
(47, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX TITAN X EXTREME - 12Go', 'GIGABYTE', 13480, 'Florent Corlouer', 2, '2018-10-27 16:19:23'),
(48, ' PCI-E16X , MSI , Nvidia GEFORCE RTX2080 TI - 11Go - OC - GAMING X TRIO', 'MSI', 17210, 'Florent Corlouer', 2, '2018-10-27 16:21:13'),
(49, ' Carte Mère MSI B250M PRO VD - pour CPU Intel 6me et 7me GENERATION', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:31:29'),
(50, 'Carte Mère MSI H110M ECO - DDR4 - Socket 1151 - pour CPU Intel 6me GENERATION', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:34:09'),
(51, 'Carte Mère GIGABYTE H110M-M2 - pour CPU Intel 6me et 7me GENERATION', 'GIGABYTE', 0, 'Florent Corlouer', 9, '2018-10-27 16:35:32'),
(52, 'Carte Mère MSI A320M PRO-VH - Socket AM4 - pour CPU AMD', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:36:35'),
(53, 'Carte Mère MSI H310M PRO-VH - DDR4 - Socket 1151 - pour CPU Intel 8me GENERATION', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:50:32'),
(54, ' Carte Mère ASUS H310M K - DDR4 - Socket 1151 - pour CPU Intel 8me GENERATION', 'ASUS', 0, 'Florent Corlouer', 9, '2018-10-27 16:41:30'),
(55, 'Carte Mère MSI B350M PRO VD PLUS - Socket AM4 - pour CPU AMD RYZEN', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:40:20'),
(56, ' Carte Mère GIGABYTE B360M H - DDR4 - Socket 1151 - pour CPU Intel 8me GENERATION', 'GIGABYTE', 0, 'Florent Corlouer', 9, '2018-10-27 16:55:20'),
(57, 'Carte Mère MSI B350M GAMING PRO - Socket AM4 - pour CPU AMD RYZEN', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:56:26'),
(58, 'Carte Mère ASUS STRIX B360 G GAMING - Socket 1151 - pour CPU Intel 8me GENERATION', 'ASUS', 0, 'Florent Corlouer', 9, '2018-10-27 16:57:42'),
(60, 'DDR3 - KINGSTON - 2 Go - 1600 MHz - ValueSelect', 'KINGSTON', NULL, 'Florent Corlouer', 4, '2018-11-27 09:36:13'),
(61, 'DDR2 - Transcend - 2 Go - 800 MHz - PC2-6400', 'Transcend', NULL, 'Florent Corlouer', 4, '2018-11-27 09:42:16'),
(62, 'SODIMM DDR3 L - KINGSTON - 4Go - 1600 MHz -ValueSelect - Low Voltage', 'KINGSTON', NULL, 'Florent Corlouer', 4, '2018-11-27 09:45:02'),
(63, 'SODIMM DDR3 L - KINGSTON - 4Go - 1600 MHz -ValueSelect - Low Voltage', 'KINGSTON', NULL, 'Florent Corlouer', 4, '2018-11-27 09:45:41'),
(64, 'DDR4 - KINGSTON - 4Go - 2400MHz -Value', 'KINGSTON', NULL, 'Florent Corlouer', 4, '2018-11-27 09:48:00'),
(65, 'DDR4 - INTEGRAL - 4Go - 2400 MHz - Value', 'INTEGRAL', NULL, 'Florent Corlouer', 4, '2018-11-27 09:49:10'),
(66, 'DDR4 - CORSAIR - 4Go - 2400MHz - Vengeance LPX', 'CORSAIR', NULL, 'Florent Corlouer', 4, '2018-11-27 09:50:24'),
(67, 'DDR4 - HYPER X - 4Go - 2666MHz -FURY', 'HYPER X', NULL, 'Florent Corlouer', 4, '2018-11-27 09:51:43'),
(68, 'DDR4 - CRUCIAL - 4Go - 2666 MHz - Ballistix Sport LT White - CL16', 'CRUCIAL', NULL, 'Florent Corlouer', 4, '2018-11-27 09:52:48'),
(69, 'DDR4 - TRANSCEND - 4Go - 2133 Mhz - PC4-17000', 'TRANSCEND', NULL, 'Florent Corlouer', 4, '2018-11-27 09:54:24'),
(70, 'DDR4 - CRUCIAL - 4Go - 2400 MHz - Ballistix Sport LT Grey - CL16', 'CRUCIAL', NULL, 'Florent Corlouer', 4, '2018-11-27 09:55:18'),
(71, 'DDR4 - CRUCIAL - 4Go - 2666 MHz - Ballistix Sport LT Red - CL16', 'CRUCIAL', NULL, 'Florent Corlouer', 4, '2018-11-27 09:57:10'),
(72, 'DDR4 - KINGSTON - 4Go - 2400 MHz - ValueSelect', 'KINGSTON', NULL, 'Florent Corlouer', 4, '2018-11-27 09:58:41'),
(73, 'DDR4 - KINGSTON - 4Go - 2133MHz -Value', 'KINGSTON', NULL, 'Florent Corlouer', 4, '2018-11-27 09:59:42'),
(74, 'DDR4 - CORSAIR - 4Go - 2400MHz', 'CORSAIR', 0, 'Florent Corlouer', 4, '2018-11-27 10:03:57'),
(75, 'DDR3 - KINGSTON - 4 Go - 1600 MHz - ValueSelect', 'KINGSTON', NULL, 'Florent Corlouer', 4, '2018-11-27 10:05:43'),
(76, 'DDR3 - HYPER X - 4Go - 1333MHz - FURY', 'HYPER X', NULL, 'Florent Corlouer', 4, '2018-11-27 10:07:31'),
(77, 'DDR3 - HYPER X - 4Go - 1333MHz - FURY', ' HYPER X', NULL, 'Florent Corlouer', 4, '2018-11-27 10:08:49'),
(78, 'DDR3 - HYPER X - 8 Go - 1600 MHz - FURY', 'HYPER X', NULL, 'Florent Corlouer', 4, '2018-11-27 10:09:45'),
(79, 'DDR3 L - KINGSTON - 8Go - 1600 MHz - ValueSelect - Low Voltage', 'KINGSTON', NULL, 'Florent Corlouer', 4, '2018-11-27 10:10:57'),
(80, 'DDR3 - CORSAIR - 8Go (2X4G) - 1333MHz', 'CORSAIR', NULL, 'Florent Corlouer', 4, '2018-11-27 10:12:46'),
(81, 'Hyper X Fury 16 Go (2x 8Go) DDR3 1600 MHz CL10', 'Hyper X', NULL, 'Florent Corlouer', 4, '2018-11-27 10:15:28'),
(82, 'HyperX Fury 16 Go (2x 8Go) DDR3 1866 MHz CL10', 'Hyper X', NULL, 'Florent Corlouer', 4, '2018-11-27 10:16:16'),
(83, 'Ballistix Tactical 8 Go DDR3 1600 MHz CL8', 'Ballistix', NULL, 'Florent Corlouer', 4, '2018-11-27 10:17:25'),
(84, 'Ballistix Tactical 16 Go (2 x 8 Go) DDR3 1600 MHz CL8', 'Ballistix', NULL, 'Florent Corlouer', 4, '2018-11-27 10:18:09'),
(85, 'Ballistix Tactical 16 Go (2 x 8 Go) DDR3 1866 MHz CL9', 'Ballistix', NULL, 'Florent Corlouer', 4, '2018-11-27 10:18:58'),
(86, 'Ballistix Tactical 8 Go DDR3 1866 MHz CL9', 'Ballistix', NULL, 'Florent Corlouer', 4, '2018-11-27 10:19:23'),
(87, 'Corsair Vengeance Low Profile 8 Go (2x 4 Go) DDR3 1600 MHz CL9', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:20:14'),
(88, 'Corsair Vengeance Pro Series 16 Go (2 x 8 Go) DDR3 1600 MHz CL9 Red', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:30:37'),
(89, 'Corsair Vengeance Pro Series 32 Go (4 x 8 Go) DDR3 1600 MHz CL9 Red', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:33:10'),
(90, 'Corsair Vengeance Series 12 Go (3x 4 Go) DDR3 1600 MHz CL9', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:34:07'),
(91, 'Corsair Vengeance Series 16 Go (kit 2x 8 Go) DDR3 1600 MHz CL10 Rouge', 'Corsair', 0, 'Florent Corlouer', 4, '2018-11-27 10:35:26'),
(92, 'Corsair Vengeance Series 8 Go (2x 4 Go) DDR3 1600 MHz CL9', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:37:19'),
(93, 'Corsair Vengeance Series 8 Go DDR3 1600 MHz CL10', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:40:43'),
(94, 'Corsair XMS3 16 Go (2 x 8 Go) DDR3 1333 MHz CL9', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:41:22'),
(95, 'Corsair XMS3 16 Go (2x 8 Go) DDR3 1600 MHz CL11', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:42:02'),
(96, 'Corsair XMS3 4 Go DDR3 1333 MHz CL9', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:43:58'),
(97, 'Corsair XMS3 8 Go (2x 4 Go) DDR3 1333 MHz CL9', 'Corsair', NULL, 'Florent Corlouer', 4, '2018-11-27 10:44:37'),
(98, 'G.Skill Aegis Series 16 Go (2 x 8 Go) DDR3 1333 MHz CL9', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 10:45:47'),
(99, 'G.Skill Aegis Series 16 Go (2 x 8 Go) DDR3 1600 MHz CL11', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 10:46:38'),
(100, 'G.Skill Aegis Series 4 Go DDR3 1333 MHz CL9', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 10:49:13'),
(101, 'G.Skill Aegis Series 4 Go DDR3 1600 MHz CL11', 'G.Skill ', -3, 'Florent Corlouer', 4, '2018-11-27 10:49:58'),
(102, 'G.Skill Aegis Series 8 Go (2 x 4 Go) DDR3 1333 MHz CL9', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 10:51:01'),
(103, 'G.Skill Ares Blue Series 16 Go (2 x 8 Go) DDR3 2133 MHz CL10', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 10:51:51'),
(104, 'G.Skill Ares Blue Series 16 Go (2 x 8 Go) DDR3 2400 MHz CL11', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 10:52:31'),
(105, 'G.Skill Ares Blue Series 32 Go (4 x 8 Go) DDR3 2400 MHz CL11', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 10:53:21'),
(106, 'G.Skill Ares Blue Series 8 Go (2 x 4 Go) DDR3 1600 MHz CL9', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 10:54:25'),
(107, 'G.Skill HK Series 4 Go (2x 2Go) DDR3 1333 MHz', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 10:54:57'),
(108, 'G.Skill NQ Series 6 Go (3x 2Go) DDR3 1600 MHz', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 10:55:32'),
(109, 'G.Skill NS Series 2 Go DDR3-SDRAM PC3-10600', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 10:56:44'),
(110, 'G.Skill NS Series 4 Go DDR3 1333 MHz CL9', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 10:57:26'),
(111, 'G.Skill NS Series 8 Go (2 x 4 Go) DDR3 1333 MHz CL9', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 10:58:26'),
(112, 'G.Skill NT Series 16 Go (2 x 8 Go) DDR3 1600 MHz CL11', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 10:59:04'),
(113, 'G.Skill NT Series 4 Go DDR3 1333 MHz', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 10:59:44'),
(114, 'G.Skill RipJaws X Series 16 Go (2 x 8 Go) DDR3 2133 MHz CL11', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 11:00:29'),
(115, 'G.Skill RipJaws X Series 16 Go (2 x 8 Go) DDR3L 1600 MHz CL9 ', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 11:01:10'),
(116, 'G.Skill RL Series RipJaws 12 Go (3x 4Go) DDR3 1600 MHz', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 11:02:09'),
(117, 'G.Skill RL Series RipJaws 4 Go DDR3 1066 MHz', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 11:02:49'),
(118, 'G.Skill RL Series RipJaws 8 Go (2x 4Go) DDR3 1066 MHz', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 11:03:16'),
(119, 'G.Skill RL Series RipJaws 8 Go (2x 4Go) DDR3 1600 MHz', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 11:04:08'),
(120, 'G.Skill RL Series RipJaws 8 Go (kit 2x 4Go) DDR3 1333 MHz', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 11:04:46'),
(121, 'G.Skill Sniper 16 Go (2 x 8 Go) DDR3 1866 MHz CL9', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 11:06:27'),
(122, 'G.Skill Sniper 8 Go (2 x 4 Go) DDR3 2133 MHz CL10', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 11:07:09'),
(123, 'G.Skill Sniper 8 Go (2x 4Go) DDR3 1600 MHz CL9', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 11:07:44'),
(124, 'G.Skill Aegis Series 8 Go (2 x 4 Go) DDR3L 1600 MHz CL11', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 11:08:40'),
(125, 'G.Skill Ares Orange Series 8 Go (2 x 4 Go) DDR3 1600 MHz CL9', 'G.Skill', NULL, 'Florent Corlouer', 4, '2018-11-27 11:09:11'),
(126, 'G.Skill NS Series 4 Go (kit 2x 2 Go) DDR3-SDRAM PC3-10600', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 11:11:09'),
(127, 'G.Skill RipJaws X Series 8 Go (2x 4Go) DDR3 2133 MHz CL9', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 11:12:06'),
(128, 'ASRock Fatal1ty X299 Gaming K6', 'asrock', 0, 'admin master', 9, '2019-02-16 13:27:42'),
(129, 'Intel Core i7-7800X (3.5 GHz)', 'intel', 14598, 'admin master', 8, '2019-02-16 13:31:05'),
(130, 'Asus M5A78L-M LX3', 'asus', 0, 'admin master', 9, '2019-02-18 10:49:15'),
(131, 'AMD A10 9700 (3,5 GHz)', 'amd', 5677, 'admin master', 8, '2019-02-18 16:03:17'),
(132, 'Asus PRIME B450M-A', 'asus', 0, 'admin master', 9, '2019-02-23 11:41:26'),
(142, 'interessant', 'interessant', 1200, 'admin master', 8, '2019-02-23 11:46:13'),
(143, 'Emilie carte mere', 'Emilie', 0, 'admin master', 9, '2019-03-03 21:53:50');

-- --------------------------------------------------------

--
-- Structure de la table `creation`
--

CREATE TABLE `creation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `id_os` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `creation`
--

INSERT INTO `creation` (`id`, `name`, `enable`, `description`, `id_os`, `id_user`, `date_creation`) VALUES
(56, 'Configuration de test', 0, 'Juste pour tester', 3, 14, '2019-03-06 09:56:52'),
(57, 'Config pour un ami', 1, 'Un ami ma demandé un pc pour jouer', 1, 14, '2019-03-06 10:03:22'),
(59, 'Ma config 2019', 0, 'Renouvellement de mon matos PC', 1, 24, '2019-03-06 10:05:53'),
(62, 'Configuration  Entreprise', 1, 'Pour répondre aux besoins quotidiens', 4, 24, '2019-03-06 10:10:29');

-- --------------------------------------------------------

--
-- Structure de la table `creation_conception`
--

CREATE TABLE `creation_conception` (
  `id` int(11) NOT NULL,
  `id_component` int(11) NOT NULL,
  `id_creation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `creation_conception`
--

INSERT INTO `creation_conception` (`id`, `id_component`, `id_creation`, `id_user`, `date_create`) VALUES
(127, 49, 56, 14, '2019-03-06 09:56:52'),
(128, 17, 56, 14, '2019-03-06 10:03:32'),
(129, 49, 57, 14, '2019-03-06 10:03:49'),
(130, 49, 58, 24, '2019-03-06 10:05:06'),
(133, 64, 60, 24, '2019-03-06 10:07:09'),
(134, 19, 60, 24, '2019-03-06 10:07:15'),
(135, 52, 60, 24, '2019-03-06 10:07:18'),
(136, 49, 61, 24, '2019-03-06 10:07:51'),
(137, 64, 61, 24, '2019-03-06 10:07:56'),
(138, 17, 61, 24, '2019-03-06 10:08:00'),
(139, 64, 59, 24, '2019-03-06 10:08:26'),
(140, 68, 59, 24, '2019-03-06 10:08:31'),
(141, 53, 62, 24, '2019-03-06 10:10:56'),
(142, 17, 62, 24, '2019-03-06 10:11:00'),
(143, 64, 62, 24, '2019-03-06 10:11:04');

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_task` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `log`
--

INSERT INTO `log` (`id`, `user_id`, `name_task`, `date`) VALUES
(1, 14, 'logué sur le site', '2018-12-05 00:00:00'),
(2, 26, 'Se connect', '2018-12-15 14:57:51'),
(3, 14, 'Se connect', '2018-12-15 17:05:41'),
(4, 14, 'Se connect', '2018-12-15 17:49:32'),
(5, 14, 'Se connect', '2018-12-15 19:04:30'),
(6, 24, 'Se connect', '2018-12-15 19:30:00'),
(7, 28, 'Se connect', '2018-12-15 19:53:00'),
(8, 14, 'Se connecte', '2018-12-15 20:54:56'),
(9, 14, 'Se déconnecte', '2018-12-15 20:55:18'),
(10, 29, 'Se connecte', '2018-12-15 20:55:30'),
(11, 29, 'Se déconnecte', '2018-12-15 20:56:08'),
(12, 14, 'Se connecte', '2018-12-15 20:56:14'),
(13, 14, 'Se déconnecte', '2018-12-15 21:05:10'),
(14, 28, 'Se connecte', '2018-12-15 21:05:24'),
(15, 28, 'Se déconnecte', '2018-12-15 21:12:07'),
(16, 29, 'Se connecte', '2018-12-15 21:12:18'),
(17, 29, 'Se déconnecte', '2018-12-15 21:12:51'),
(18, 14, 'Se connecte', '2018-12-15 21:12:59'),
(19, 14, 'Se déconnecte', '2018-12-15 21:15:02'),
(20, 28, 'Se connecte', '2018-12-15 21:15:09'),
(21, 28, 'Se déconnecte', '2018-12-15 21:16:25'),
(22, 29, 'Se connecte', '2018-12-15 21:16:33'),
(23, 29, 'Se déconnecte', '2018-12-15 21:18:14'),
(24, 24, 'Se connecte', '2018-12-15 21:18:22'),
(25, 24, 'Se déconnecte', '2018-12-15 21:37:01'),
(26, 28, 'Se connecte', '2018-12-15 21:37:11'),
(27, 28, 'Se déconnecte', '2018-12-15 21:37:32'),
(28, 14, 'Se connecte', '2018-12-15 21:37:43'),
(29, 14, 'Se déconnecte', '2018-12-15 21:39:30'),
(30, 29, 'Se connecte', '2018-12-15 21:39:38'),
(31, 14, 'Se connecte', '2018-12-16 05:08:55'),
(32, 14, 'Se déconnecte', '2018-12-16 05:56:30'),
(33, 14, 'Se connecte', '2018-12-16 06:00:00'),
(34, 14, 'Se déconnecte', '2018-12-16 06:00:15'),
(35, 29, 'Se connecte', '2018-12-16 06:07:53'),
(36, 29, 'Se déconnecte', '2018-12-16 06:15:39'),
(37, 14, 'Se connecte', '2018-12-16 06:15:47'),
(38, 14, 'Se connecte', '2018-12-16 11:26:23'),
(39, 14, 'Se connecte', '2018-12-16 16:27:15'),
(40, 14, 'Se connecte', '2018-12-16 21:02:29'),
(41, 14, 'Se connecte', '2018-12-18 17:28:49'),
(42, 14, 'Se connecte', '2018-12-20 18:09:36'),
(43, 14, 'Se déconnecte', '2018-12-20 18:27:10'),
(44, 27, 'Se connecte', '2018-12-20 18:27:28'),
(45, 27, 'Se déconnecte', '2018-12-20 18:27:34'),
(46, 14, 'Se connecte', '2018-12-20 18:27:38'),
(47, 14, 'Se déconnecte', '2018-12-20 18:39:15'),
(48, 14, 'Se connecte', '2018-12-20 18:39:25'),
(49, 14, 'Se déconnecte', '2018-12-20 18:44:45'),
(50, 14, 'Se connecte', '2018-12-20 18:45:52'),
(51, 14, 'Se déconnecte', '2018-12-20 18:47:06'),
(52, 14, 'Se connecte', '2018-12-20 18:47:17'),
(53, 14, 'Se déconnecte', '2018-12-20 18:50:27'),
(54, 14, 'Se connecte', '2018-12-20 18:50:37'),
(55, 14, 'Se déconnecte', '2018-12-20 18:51:34'),
(56, 14, 'Se connecte', '2018-12-20 18:51:39'),
(57, 14, 'Se déconnecte', '2018-12-20 18:51:57'),
(58, 27, 'Se connecte', '2018-12-20 18:52:35'),
(59, 27, 'Se déconnecte', '2018-12-20 18:52:39'),
(60, 14, 'Se connecte', '2018-12-20 18:53:02'),
(61, 14, 'Se déconnecte', '2018-12-20 18:53:43'),
(62, 27, 'Se connecte', '2018-12-20 18:53:48'),
(63, 27, 'Se déconnecte', '2018-12-20 18:54:16'),
(64, 27, 'Se connecte', '2018-12-20 19:23:01'),
(65, 27, 'Se déconnecte', '2018-12-20 19:23:28'),
(66, 27, 'Se connecte', '2018-12-20 19:23:34'),
(67, 27, 'Se déconnecte', '2018-12-20 19:23:38'),
(68, 14, 'Se connecte', '2018-12-20 19:23:43'),
(69, 14, 'Se déconnecte', '2018-12-20 19:24:33'),
(70, 27, 'Se connecte', '2018-12-20 19:25:00'),
(71, 14, 'Se connecte', '2019-01-12 14:39:05'),
(72, 14, 'Se connecte', '2019-01-12 19:38:22'),
(73, 14, 'Se connecte', '2019-01-12 20:38:20'),
(74, 14, 'Se connecte', '2019-01-12 22:52:31'),
(75, 14, 'Se connecte', '2019-01-13 09:21:37'),
(76, 14, 'Se connecte', '2019-01-13 10:43:09'),
(77, 14, 'Se connecte', '2019-01-13 12:37:02'),
(78, 14, 'Se connecte', '2019-01-13 14:24:14'),
(79, 14, 'Se connecte', '2019-01-13 15:43:00'),
(80, 14, 'Se connecte', '2019-01-13 17:48:07'),
(81, 14, 'Se connecte', '2019-01-13 19:27:14'),
(82, 14, 'Se connecte', '2019-01-13 20:12:30'),
(83, 14, 'Se connecte', '2019-01-13 20:32:49'),
(84, 14, 'Se connecte', '2019-01-13 21:13:41'),
(85, 14, 'Se connecte', '2019-01-24 19:06:49'),
(86, 14, 'Se connecte', '2019-01-25 18:21:37'),
(87, 14, 'Se connecte', '2019-01-25 20:06:02'),
(88, 14, 'Se connecte', '2019-01-27 07:55:42'),
(89, 14, 'Se connecte', '2019-01-27 09:29:59'),
(90, 37, 'Se connecte', '2019-01-31 20:40:56');

-- --------------------------------------------------------

--
-- Structure de la table `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'terminal_icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `os`
--

INSERT INTO `os` (`id`, `name`, `picture`) VALUES
(1, 'windows 10', 'windows-10.png'),
(2, 'windows xp', 'windows-xp.png'),
(3, 'ubuntu', 'ubuntu.png'),
(4, 'xubuntu', 'xubuntu.png'),
(5, 'lubuntu', 'lubuntu.png');

-- --------------------------------------------------------

--
-- Structure de la table `picture_component`
--

CREATE TABLE `picture_component` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_component` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `picture_component`
--

INSERT INTO `picture_component` (`id`, `picture`, `id_component`) VALUES
(12, 'G4920x300.jpg', 17),
(13, 'G5400x300.jpg', 18),
(14, 'RYZEN31200x300.jpg', 19),
(15, 'G5400x300.jpg', 20),
(16, 'RYZEN31200x300.jpg', 21),
(17, 'G5400x300.jpg', 22),
(18, 'RYZEN31200x300.jpg', 23),
(19, 'RYZEN31200x300.jpg', 24),
(20, 'I37350Kx300.jpg', 25),
(21, 'ATHLON200GEx300.jpg', 26),
(22, 'I57640Xx300.jpg', 27),
(23, 'N7101GD3HLPx300.jpg', 28),
(24, 'N7101GD3HLPx300.jpg', 29),
(25, 'N7101GD3HLPx300.jpg', 30),
(26, 'GVN1030D52GLx300.jpg', 31),
(27, 'N10502GOCx300.jpg', 32),
(28, 'GVN1050D52GDx300.jpg', 33),
(29, 'GVN1050G1GAMING2Gx300.jpg', 34),
(30, 'GTX1050x300.jpg', 35),
(31, 'N10502GTLPx300.jpg', 36),
(32, 'N1050AERO2GOCx300.jpg', 37),
(33, 'N10502GOCx300.jpg', 38),
(34, 'GTX1050O2GGAMINGx300.jpg', 39),
(35, 'GVN1050TIG1GAMING4Gx300.jpg', 40),
(36, 'N1050TIGAMINGX4Gx300.jpg', 41),
(37, 'GTX10603Gx300.jpg', 42),
(38, 'GVN1070IXOC8GDx300.jpg', 43),
(39, 'GVN1080WF3OC8GDx300.jpg', 44),
(40, 'N2070AERO8Gx300.jpg', 45),
(41, 'GVN2080GAMINGOC8GCx300.jpg', 46),
(42, 'GVNTITANXXTREME12GDBx300.jpg', 47),
(43, 'N2080TIGAMINGXTRIOx300.jpg', 48),
(44, 'B250MPROVDx300.jpg', 49),
(45, 'H110MECOx300.jpg', 50),
(46, 'H110MM2x300.jpg', 51),
(47, 'A320MPROVHx300.jpg', 52),
(48, 'H310MPROVHx300.jpg', 53),
(49, 'H310MKx300.jpg', 54),
(50, 'B350MPROVDPLUSx300.jpg', 55),
(51, 'B360MHx300.jpg', 56),
(52, 'B350MGAMINGPROx300.jpg', 57),
(53, 'B360GGAMINGx300.jpg', 58),
(55, 'KVR16N11S62x100.jpg', 60),
(56, 'JM800QLU2Gx300.jpg', 61),
(57, 'KVR16LS114x300.jpg', 62),
(58, 'KVR16LS114x300.jpg', 63),
(59, 'KVR24N17S64x300.jpg', 64),
(60, 'IN4T4GNDURXx300.jpg', 65),
(61, 'CMK4GX4M1A2400C14Rx300.jpg', 66),
(62, 'HX426C15FB4x300.jpg', 67),
(63, 'BLS4G4D26BFSCx300.jpg', 68),
(64, 'TS512MLH64V1Hx300.jpg', 69),
(65, 'BLS4G4D240FSBx300.jpg', 70),
(66, 'BLS4G4D26BFSEx300.jpg', 71),
(67, 'KCP424NS64x300.jpg', 72),
(68, 'KCP424NS64x300.jpg', 73),
(69, 'CMV4GX4M1A2400C16x300.jpg', 74),
(70, 'KVR16N11S8H4x300.jpg', 75),
(71, 'HX313C9FR4x300.jpg', 76),
(72, 'HX313C9FB4x300.jpg', 77),
(73, 'HX316C10F8x300.jpg', 78),
(74, 'KVR16LN118x300.jpg', 79),
(75, 'CMV8GX3M2A1333C9x300.jpg', 80),
(76, 'LD0001545558_2_0001545612.jpg', 81),
(77, 'LD0001545558_2_0001545612.jpg', 82),
(78, 'LD0004383903_2.jpg', 83),
(79, 'LD0001026223_2_0001026228_0001026257_0001026267.jpg', 84),
(80, 'LD0001026223_2_0001026228_0001026257_0001026267.jpg', 85),
(81, 'LD0004383903_2.jpg', 86),
(82, 'LD0000903707_2.jpg', 87),
(83, 'LD0001299407_2_0001299533_0001300966.jpg', 88),
(84, 'LD0001301134_2.jpg', 89),
(85, 'LD0000824111.jpg', 90),
(86, 'LD0000903725_2_0000920397_0000920409_0001016463_0001104276.jpg', 91),
(87, 'LD0000824098.jpg', 92),
(88, 'LD0000824095_0000980231.jpg', 93),
(89, 'LD0000787367_0001079176.jpg', 94),
(90, 'LD0000937300_2_0001016516.jpg', 95),
(91, 'LD0000792163.jpg', 96),
(92, 'LD0001664479_2.jpg', 97),
(93, 'LD0001426723_2_0001426738.jpg', 98),
(94, 'LD0001426778_2_0001426798.jpg', 99),
(95, 'LD0001426708_2.jpg', 100),
(96, 'LD0001426768_2.jpg', 101),
(97, 'LD0001426723_2.jpg', 102),
(98, 'LD0001024085_2_0001292900.jpg', 103),
(99, 'LD0001024085_2_0001292900_0001310346.jpg', 104),
(100, 'LD0001024080_2_0001293070_0001293164_0001310423.jpg', 105),
(101, 'LD0001024214_2.jpg', 106),
(102, 'LD0000681275.jpg', 107),
(103, 'LD0000681219.jpg', 108),
(104, 'LD0000920441_2.jpg', 109),
(105, 'LD0000920441_2_0001180599.jpg', 110),
(106, 'LD0001180609_2_0001180614.jpg', 111),
(107, 'LD0001171742_2_0001171747.jpg', 112),
(108, 'LD0000832717.jpg', 113),
(109, 'LD0001522956_2.jpg', 114),
(110, 'LD0001522956_2.jpg', 115),
(111, 'LD0000768023.jpg', 116),
(112, 'LD0000722452.jpg', 117),
(113, 'LD0000722397.jpg', 118),
(114, 'LD0000722474.jpg', 119),
(115, 'LD0000724885.jpg', 120),
(116, 'LD0001121357_2_0001121371_0001167161.jpg', 121),
(117, 'LD0001016549_2_0001292905_0001292950.jpg', 122),
(118, 'LD0000863952.jpg', 123),
(119, 'LD0001426778_2_0001426847.jpg', 124),
(120, 'LD0001024210_2.jpg', 125),
(121, 'LD0000920429_2.jpg', 126),
(122, 'LD0000913130.jpg', 127),
(123, 'LD0004572488_2.jpg', 128),
(124, 'LD0004430669_2_0004430679.jpg', 129),
(125, 'MN0005206978_1.jpg', 130),
(126, 'AR201707210170_g1.jpg', 131),
(127, 'AR201807050068_g1.jpg', 132),
(137, 'AR201807050068_g1.jpg', 142),
(138, 'earth_low.jpg', 143);

-- --------------------------------------------------------

--
-- Structure de la table `reseller`
--

CREATE TABLE `reseller` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `reseller`
--

INSERT INTO `reseller` (`id`, `name`) VALUES
(2, 'materiel.net'),
(4, 'cdiscount'),
(5, 'amazon'),
(6, 'LDLC');

-- --------------------------------------------------------

--
-- Structure de la table `revendeur_component`
--

CREATE TABLE `revendeur_component` (
  `id` int(11) NOT NULL,
  `prix` float(10,2) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `id_revendeur` int(11) NOT NULL,
  `id_component` int(11) NOT NULL,
  `date_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `revendeur_component`
--

INSERT INTO `revendeur_component` (`id`, `prix`, `lien`, `autor`, `id_revendeur`, `id_component`, `date_at`) VALUES
(1, 699.59, 'http://www.ldlc.com/5451249', 'admin master', 5, 20, '2019-02-23 10:27:47');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'membre'),
(2, 'contributeur'),
(3, 'admin'),
(4, 'super admin'),
(5, 'aucun');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registration` datetime NOT NULL,
  `date_last_login` datetime NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `date_registration`, `date_last_login`, `id_role`) VALUES
(14, 'admin master', 'cci.corlouer@gmail.com', '$2y$10$6R.SHUzOOuTtpMLUJ1xPOeKXAa2G0jECCLczzjuX4W1QEORZdq9yK', '2018-09-30 08:10:32', '2019-01-27 09:29:59', 4),
(24, 'codeurh24', 'codeurh24@gmail.com', '$2y$10$cmm.azRib4dLD3xQP.7bwOgAwtwpusjB5r/DJHh/dDLi2VJy9cAbm', '2018-11-04 08:30:42', '2018-12-15 21:18:22', 1),
(26, 'angelo', 'angelo@gmail.fr', '$2y$10$cmm.azRib4dLD3xQP.7bwOgAwtwpusjB5r/DJHh/dDLi2VJy9cAbm', '2018-12-04 13:22:25', '2018-12-04 13:22:25', 2),
(27, 'Alice', 'alice@gmail.com', '$2y$10$cmm.azRib4dLD3xQP.7bwOgAwtwpusjB5r/DJHh/dDLi2VJy9cAbm', '2018-12-15 19:16:44', '2018-12-20 19:25:00', 1),
(29, 'Charlie', 'charlie@gmail.com', '$2y$10$cmm.azRib4dLD3xQP.7bwOgAwtwpusjB5r/DJHh/dDLi2VJy9cAbm', '2018-12-15 19:18:03', '2018-12-16 06:07:53', 2),
(35, 'bob', 'bob@gmail.com', '$2y$10$1nzvdsRmbMCrYlv7zbFEpO6pg6bEeZyB7AE/dNaPk9.FtOtSFSsTS', '2019-01-30 22:09:47', '2019-01-30 22:09:47', 1),
(37, 'visiteur', 'visiteur@gmail.com', 'd3000fa849c1dcf8ccc6e27003cd4d8c', '2019-01-01 00:00:00', '2019-01-31 20:40:56', 4),
(57, 'dream3d', 'dream3d@gmail.fr', '$2y$10$H6CCd63lANc4BqjyrX4RJu1okFEm4ISS.OuV83oB9HCvL8TCkjP2i', '2019-02-03 11:51:40', '2019-02-03 11:51:40', 1),
(59, 'rogerRabbit', 'rogerRabbit@gmail.com', '$2y$10$hBg1Fq0T4bAT.shdRSQH5.XHAbWmnZZk7xbKYlZ2ACGSt4xv1gRFW', '2019-02-03 14:20:13', '2019-02-03 14:20:13', 2),
(62, 'julien76', 'julien76@laposte.fr', '$2y$10$X7IuaKz/P7vj8OGh2nZFKO0nTf2QeAT0I.Ymnr3umyazy01nm5loa', '2019-02-09 01:02:29', '2019-02-09 01:02:29', 1),
(69, 'bob2', 'bob2@gmail.com', '$2y$10$nEQ6hm9KgLIUA.898pYa9eGrKW88sqrxzyGdTXUbiQWRtj1UE3ZMu', '2019-02-10 20:29:49', '2019-02-10 20:29:49', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compatibility`
--
ALTER TABLE `compatibility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `composant1_compatible2` (`id_component1`),
  ADD KEY `composant2_compatible1` (`id_component2`);

--
-- Index pour la table `compatibility_tag`
--
ALTER TABLE `compatibility_tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`),
  ADD KEY `composant_categorie` (`id_cat`);

--
-- Index pour la table `creation`
--
ALTER TABLE `creation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `creation_conception`
--
ALTER TABLE `creation_conception`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creation titre` (`id_creation`),
  ADD KEY `creation user` (`id_user`),
  ADD KEY `creation composant` (`id_component`);

--
-- Index pour la table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `picture_component`
--
ALTER TABLE `picture_component`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_composant` (`id_component`);

--
-- Index pour la table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revendeur_component`
--
ALTER TABLE `revendeur_component`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revLnkComp` (`id_component`),
  ADD KEY `compLnkRev` (`id_revendeur`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `compatibility`
--
ALTER TABLE `compatibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `compatibility_tag`
--
ALTER TABLE `compatibility_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT pour la table `component`
--
ALTER TABLE `component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT pour la table `creation`
--
ALTER TABLE `creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `creation_conception`
--
ALTER TABLE `creation_conception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT pour la table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT pour la table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `picture_component`
--
ALTER TABLE `picture_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT pour la table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `revendeur_component`
--
ALTER TABLE `revendeur_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compatibility`
--
ALTER TABLE `compatibility`
  ADD CONSTRAINT `composant1_compatible2` FOREIGN KEY (`id_component1`) REFERENCES `component` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composant2_compatible1` FOREIGN KEY (`id_component2`) REFERENCES `component` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `component`
--
ALTER TABLE `component`
  ADD CONSTRAINT `composant_categorie` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `picture_component`
--
ALTER TABLE `picture_component`
  ADD CONSTRAINT `image_composant` FOREIGN KEY (`id_component`) REFERENCES `component` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `revendeur_component`
--
ALTER TABLE `revendeur_component`
  ADD CONSTRAINT `compLnkRev` FOREIGN KEY (`id_revendeur`) REFERENCES `reseller` (`id`),
  ADD CONSTRAINT `revLnkComp` FOREIGN KEY (`id_component`) REFERENCES `component` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
