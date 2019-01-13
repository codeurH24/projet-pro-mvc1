-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 13 Janvier 2019 à 21:32
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

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
(8, '^/admin/acces/*', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(2, 'carte graphique'),
(4, 'mémoire vive'),
(6, 'disque dur'),
(7, 'alimentation'),
(8, 'processeur'),
(9, 'carte mère');

-- --------------------------------------------------------

--
-- Structure de la table `compatibilite`
--

CREATE TABLE `compatibilite` (
  `id` int(11) NOT NULL,
  `degrer` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_composant1` int(11) NOT NULL,
  `id_composant2` int(11) NOT NULL,
  `date_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `compatibilite`
--

INSERT INTO `compatibilite` (`id`, `degrer`, `auteur`, `id_composant1`, `id_composant2`, `date_at`) VALUES
(1, 100, 'codeurh24', 54, 38, '2018-11-04 16:14:53'),
(2, 100, 'codeurh24', 38, 53, '2018-11-04 16:35:14'),
(3, 100, 'admin master', 37, 88, '2018-12-16 21:10:18');

-- --------------------------------------------------------

--
-- Structure de la table `compatibility_tag`
--

CREATE TABLE `compatibility_tag` (
  `id` int(11) NOT NULL,
  `id_composant` int(11) NOT NULL,
  `tag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `compatibility_tag`
--

INSERT INTO `compatibility_tag` (`id`, `id_composant`, `tag`) VALUES
(2, 16, '1151'),
(3, 17, '1151'),
(4, 18, '1151'),
(5, 19, 'am4'),
(6, 21, 'am4'),
(7, 23, 'am4'),
(8, 24, 'am4'),
(9, 20, '1151'),
(10, 18, '1151'),
(11, 20, '1151'),
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
(47, 116, '3 barrettes');

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

CREATE TABLE `composant` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `point_puissance` int(11) DEFAULT '0',
  `auteur` varchar(255) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `date_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `composant`
--

INSERT INTO `composant` (`id`, `model`, `marque`, `point_puissance`, `auteur`, `id_cat`, `date_at`) VALUES
(16, 'CPU INTEL CELERON G4900 - DOUBLE COEUR DE 3.1GHZ - 8EME GNRATION - COFFEE LAKE', 'intel', 3290, 'admin master', 8, '2019-01-13 19:13:00'),
(17, 'CPU INTEL CELERON G4920 - DOUBLE COEUR DE 3.2GHZ - 8EME GNRATION - COFFEE LAKE', 'Intel', 3521, 'codeurh24', 8, '2018-10-14 08:23:00'),
(18, 'CPU INTEL PENTIUM G5400 - DOUBLE COEUR DE 3.7GHZ - 8EME GNRATION - COFFEE LAKE-S', 'Intel', 5231, 'codeurh24', 8, '2018-10-14 08:23:00'),
(19, 'CPU AMD RYZEN 3 1200 WRAITH STEALTH EDITION - 4C/4T - 3.1  3.4GHZ', 'AMD', 6758, 'Florent Corlouer', 8, '2018-10-27 13:10:15'),
(20, 'CPU INTEL PENTIUM G5500 - DOUBLE COEUR DE 3.8GHZ - 8EME GNRATION - COFFEE LAKE-S', 'Intel', 5194, 'Florent Corlouer', 8, '2018-10-27 12:42:45'),
(21, 'CPU AMD RYZEN 3 2200 WRAITH STEALTH EDITION - 4C/4T - 3.5  3.7GHZ', 'AMD', 7434, 'Florent Corlouer', 8, '2018-10-27 12:43:59'),
(22, 'CPU INTEL PENTIUM G5600 - DOUBLE COEUR DE 3.9GHZ - 8EME GNRATION - COFFEE LAKE-S', 'Intel', 5707, 'Florent Corlouer', 8, '2018-10-27 12:45:50'),
(23, 'CPU AMD RYZEN 5 2400G WRAITH STEALTH EDITION - 4C/8T - 3.6  3.9GHZ', 'AMD', 9282, 'Florent Corlouer', 8, '2018-10-27 12:47:13'),
(24, 'CPU AMD RYZEN 5 2600 WRAITH STEALTH EDITION - 6C/12T - 3.4  3.9GHZ', 'AMD', 13508, 'Florent Corlouer', 8, '2018-10-27 12:48:39'),
(25, 'CPU INTEL CORE I3-7350K - DOUBLE COEUR DE 4.2GHZ - 7EME GNRATION - KABY LAKE', 'Intel', 6620, 'Florent Corlouer', 8, '2018-10-27 12:50:43'),
(26, 'CPU AMD Athlon 200GE - 2C/4T - 3.2 Ghz', 'AMD', 4928, 'Florent Corlouer', 8, '2018-10-27 13:08:24'),
(27, 'CPU Intel Core i5-7640X - Quadruple Coeur de 4.0  4.2Ghz - 8eme gnration - Kaby Lake X', 'AMD', 9585, 'Florent Corlouer', 8, '2018-10-27 13:32:09'),
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
(49, ' Carte Mre MSI B250M PRO VD - pour CPU Intel 6me et 7me Gnration', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:31:29'),
(50, 'Carte Mre MSI H110M ECO - DDR4 - Socket 1151 - pour CPU Intel 6me Gnration', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:34:09'),
(51, 'Carte Mre GIGABYTE H110M-M2 - pour CPU Intel 6me et 7me Gnration', 'GIGABYTE', 0, 'Florent Corlouer', 9, '2018-10-27 16:35:32'),
(52, 'Carte Mre MSI A320M PRO-VH - Socket AM4 - pour CPU AMD', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:36:35'),
(53, 'Carte Mre MSI H310M PRO-VH - DDR4 - Socket 1151 - pour CPU Intel 8me Gnration', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:50:32'),
(54, ' Carte Mre ASUS H310M K - DDR4 - Socket 1151 - pour CPU Intel 8me Gnration', 'ASUS', 0, 'Florent Corlouer', 9, '2018-10-27 16:41:30'),
(55, 'Carte Mre MSI B350M PRO VD PLUS - Socket AM4 - pour CPU AMD RYZEN', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:40:20'),
(56, ' Carte Mre GIGABYTE B360M H - DDR4 - Socket 1151 - pour CPU Intel 8me Gnration', 'GIGABYTE', 0, 'Florent Corlouer', 9, '2018-10-27 16:55:20'),
(57, 'Carte Mre MSI B350M GAMING PRO - Socket AM4 - pour CPU AMD RYZEN', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:56:26'),
(58, 'Carte Mre ASUS STRIX B360 G GAMING - Socket 1151 - pour CPU Intel 8me Gnration', 'ASUS', 0, 'Florent Corlouer', 9, '2018-10-27 16:57:42'),
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
(127, 'G.Skill RipJaws X Series 8 Go (2x 4Go) DDR3 2133 MHz CL9', 'G.Skill ', NULL, 'Florent Corlouer', 4, '2018-11-27 11:12:06');

-- --------------------------------------------------------

--
-- Structure de la table `creation`
--

CREATE TABLE `creation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `creation`
--

INSERT INTO `creation` (`id`, `name`, `enable`, `description`, `id_user`, `date_creation`) VALUES
(7, 'PC familiale', 0, 'Besoin d\'un pc pour toute la famille', 14, '2018-10-28 03:01:43'),
(9, 'Ordinateur pour le voisin', 0, 'Mon voisin  besoin d\'un ordinateur pour surfer sur internet', 14, '2018-10-28 03:04:07'),
(32, 'PC Gamer', 1, '', 14, '2018-11-03 14:23:31'),
(34, 'config X', 0, 'test X', 24, '2018-11-04 09:35:28'),
(41, 'Config No Name', 1, 'Config No Name', 24, '2018-11-04 09:52:30'),
(42, 'PC familial', 0, 'Besoin d\'un pc pour toute la famille', 14, '2018-12-15 21:37:54'),
(44, 'config de test', 0, 'pour tester', 14, '2019-01-13 10:41:53');

-- --------------------------------------------------------

--
-- Structure de la table `creation_conception`
--

CREATE TABLE `creation_conception` (
  `id` int(11) NOT NULL,
  `id_composant` int(11) NOT NULL,
  `id_creation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `creation_conception`
--

INSERT INTO `creation_conception` (`id`, `id_composant`, `id_creation`, `id_user`, `date_create`) VALUES
(2, 28, 6, 14, '2018-10-10 00:00:00'),
(4, 19, 6, 14, '2018-10-10 00:00:00'),
(5, 16, 6, 14, '2018-10-10 00:00:00'),
(21, 19, 41, 24, '2018-11-04 09:52:30'),
(22, 49, 41, 24, '2018-11-04 09:52:42'),
(27, 16, 32, 14, '2018-11-26 10:25:49'),
(29, 56, 32, 14, '2018-11-26 10:30:23'),
(30, 125, 32, 14, '2018-11-27 11:14:31'),
(33, 19, 7, 14, '2018-12-01 16:38:00');

-- --------------------------------------------------------

--
-- Structure de la table `creation_conception2`
--

CREATE TABLE `creation_conception2` (
  `id` int(11) NOT NULL,
  `id_composant` int(11) NOT NULL,
  `id_creation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `creation_conception2`
--

INSERT INTO `creation_conception2` (`id`, `id_composant`, `id_creation`, `id_user`, `date_create`) VALUES
(21, 19, 41, 24, '2018-11-04 09:52:30'),
(22, 49, 41, 24, '2018-11-04 09:52:42'),
(27, 16, 32, 14, '2018-11-26 10:25:49'),
(29, 56, 32, 14, '2018-11-26 10:30:23'),
(30, 125, 32, 14, '2018-11-27 11:14:31'),
(33, 19, 7, 14, '2018-12-01 16:38:00');

-- --------------------------------------------------------

--
-- Structure de la table `image_composant`
--

CREATE TABLE `image_composant` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_composant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `image_composant`
--

INSERT INTO `image_composant` (`id`, `image`, `id_composant`) VALUES
(11, 'G4920x300.jpg', 16),
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
(122, 'LD0000913130.jpg', 127);

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
(84, 14, 'Se connecte', '2019-01-13 21:13:41');

-- --------------------------------------------------------

--
-- Structure de la table `marque_composant`
--

CREATE TABLE `marque_composant` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `revendeur`
--

CREATE TABLE `revendeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `revendeur`
--

INSERT INTO `revendeur` (`id`, `nom`) VALUES
(2, 'materiel.net'),
(4, 'cdiscount'),
(5, 'amazon'),
(6, 'LDLC');

-- --------------------------------------------------------

--
-- Structure de la table `revendeur_composant`
--

CREATE TABLE `revendeur_composant` (
  `id` int(11) NOT NULL,
  `prix` float(10,2) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_revendeur` int(11) NOT NULL,
  `id_composant` int(11) NOT NULL,
  `date_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'super admin');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registration` datetime NOT NULL,
  `date_last_login` datetime NOT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `pseudo`, `email`, `age`, `password`, `date_registration`, `date_last_login`, `id_adresse`, `id_role`) VALUES
(14, 'florent', 'Corlouer', 'admin master', 'cci.corlouer@gmail.com', 33, '81dc9bdb52d04dc20036dbd8313ed055', '2018-09-30 08:10:32', '2019-01-13 21:13:41', 0, 4),
(24, '', '', 'codeurh24', 'codeurh24@gmail.com', 0, '81dc9bdb52d04dc20036dbd8313ed055', '2018-11-04 08:30:42', '2018-12-15 21:18:22', 0, 3),
(26, 'Delmos', 'angalo', 'angelo', 'angelo@gmail.fr', 0, '81dc9bdb52d04dc20036dbd8313ed055', '2018-12-04 13:22:25', '2018-12-04 13:22:25', NULL, 2),
(27, '', '', 'Alice', 'alice@gmail.com', 0, '81dc9bdb52d04dc20036dbd8313ed055', '2018-12-15 19:16:44', '2018-12-20 19:25:00', NULL, 1),
(28, '', '', 'Bob', 'bob@gmail.com', 0, '81dc9bdb52d04dc20036dbd8313ed055', '2018-12-15 19:17:13', '2018-12-15 21:37:11', NULL, 1),
(29, '', '', 'Charlie', 'charlie@gmail.com', 0, '81dc9bdb52d04dc20036dbd8313ed055', '2018-12-15 19:18:03', '2018-12-16 06:07:53', NULL, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compatibilite`
--
ALTER TABLE `compatibilite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `composant1_compatible2` (`id_composant1`),
  ADD KEY `composant2_compatible1` (`id_composant2`);

--
-- Index pour la table `compatibility_tag`
--
ALTER TABLE `compatibility_tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `composant`
--
ALTER TABLE `composant`
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
  ADD KEY `creation composant` (`id_composant`);

--
-- Index pour la table `creation_conception2`
--
ALTER TABLE `creation_conception2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creation titre` (`id_creation`),
  ADD KEY `creation user` (`id_user`),
  ADD KEY `creation composant` (`id_composant`);

--
-- Index pour la table `image_composant`
--
ALTER TABLE `image_composant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_composant` (`id_composant`);

--
-- Index pour la table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marque_composant`
--
ALTER TABLE `marque_composant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revendeur`
--
ALTER TABLE `revendeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revendeur_composant`
--
ALTER TABLE `revendeur_composant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revLnkComp` (`id_composant`),
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `compatibilite`
--
ALTER TABLE `compatibilite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `compatibility_tag`
--
ALTER TABLE `compatibility_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `composant`
--
ALTER TABLE `composant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT pour la table `creation`
--
ALTER TABLE `creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `creation_conception`
--
ALTER TABLE `creation_conception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `creation_conception2`
--
ALTER TABLE `creation_conception2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `image_composant`
--
ALTER TABLE `image_composant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT pour la table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT pour la table `marque_composant`
--
ALTER TABLE `marque_composant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `revendeur`
--
ALTER TABLE `revendeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `revendeur_composant`
--
ALTER TABLE `revendeur_composant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compatibilite`
--
ALTER TABLE `compatibilite`
  ADD CONSTRAINT `composant1_compatible2` FOREIGN KEY (`id_composant1`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composant2_compatible1` FOREIGN KEY (`id_composant2`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `composant`
--
ALTER TABLE `composant`
  ADD CONSTRAINT `composant_categorie` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `creation_conception2`
--
ALTER TABLE `creation_conception2`
  ADD CONSTRAINT `creation?composant` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`),
  ADD CONSTRAINT `creation?titre` FOREIGN KEY (`id_creation`) REFERENCES `creation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `creation?user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_composant`
--
ALTER TABLE `image_composant`
  ADD CONSTRAINT `image_composant` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `revendeur_composant`
--
ALTER TABLE `revendeur_composant`
  ADD CONSTRAINT `compLnkRev` FOREIGN KEY (`id_revendeur`) REFERENCES `revendeur` (`id`),
  ADD CONSTRAINT `revLnkComp` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
