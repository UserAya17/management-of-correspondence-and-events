-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 06:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gest_cour`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event_master`
--

CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_subject` varchar(250) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `direc_id` int(11) NOT NULL,
  `cr_id` int(11) NOT NULL,
  `type_cr` varchar(20) NOT NULL DEFAULT 'ent'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_subject`, `comment_text`, `comment_status`, `user_id`, `direc_id`, `cr_id`, `type_cr`) VALUES
(121, '1', 'ARMEX', 1, 32, 10, 100, 'ent'),
(122, '1', 'ARMEX', 0, 96, 10, 100, 'ent'),
(123, '1', 'ARMEX', 1, 30, 0, 100, 'ent'),
(124, 'objet1', 'ARMEX', 1, 32, 10, 101, 'ent'),
(125, 'objet1', 'ARMEX', 0, 96, 10, 101, 'ent'),
(126, 'objet1', 'ARMEX', 1, 30, 0, 101, 'ent'),
(127, 'objet2', 'SDTM', 1, 91, 9, 102, 'ent'),
(128, 'objet2', 'SDTM', 1, 103, 9, 102, 'ent'),
(129, 'objet2', 'SDTM', 0, 104, 9, 102, 'ent'),
(130, 'objet2', 'SDTM', 1, 30, 0, 102, 'ent'),
(131, 'objet3', 'SDTM', 1, 32, 10, 103, 'ent'),
(132, 'objet3', 'SDTM', 0, 96, 10, 103, 'ent'),
(133, 'objet3', 'SDTM', 1, 30, 0, 103, 'ent'),
(134, 'objet4', 'CTM', 1, 101, 14, 104, 'ent'),
(135, 'objet4', 'CTM', 1, 30, 0, 104, 'ent'),
(136, 'objet5', 'ARMEX', 1, 30, 0, 105, 'ent'),
(137, 'objet_cour', 'CTM', 1, 32, 10, 0, 'ent'),
(138, 'objet_cour', 'CTM', 0, 96, 10, 0, 'ent'),
(139, 'objet_cour', 'CTM', 1, 30, 0, 0, 'ent'),
(140, 'objet7', 'ARMEX', 1, 32, 10, 0, 'ent'),
(141, 'objet7', 'ARMEX', 0, 96, 10, 0, 'ent'),
(142, 'objet7', 'ARMEX', 1, 30, 0, 0, 'ent'),
(143, '1', 'ARMEX', 1, 30, 0, 0, 'sort'),
(144, 'objet9', 'CTM', 1, 30, 0, 106, 'ent'),
(145, 'objet10', 'ARMEX', 1, 32, 10, 107, 'ent'),
(146, 'objet10', 'ARMEX', 0, 96, 10, 107, 'ent'),
(147, 'objet10', 'ARMEX', 1, 30, 0, 107, 'ent'),
(148, 'objet11', 'CTM', 1, 101, 14, 108, 'ent'),
(149, 'objet11', 'CTM', 1, 30, 0, 108, 'ent'),
(150, 'objet12', 'SDTM', 1, 32, 10, 109, 'ent'),
(151, 'objet12', 'SDTM', 0, 96, 10, 109, 'ent'),
(152, 'objet12', 'SDTM', 1, 30, 0, 109, 'ent'),
(153, 'objetA', 'SDTM', 1, 30, 0, 17, 'sort'),
(154, 'objetB', 'ARMEX', 1, 30, 0, 18, 'sort'),
(155, 'objetC', 'CTM', 1, 30, 0, 19, 'sort'),
(156, 'objetD', 'CTM', 1, 30, 0, 20, 'sort'),
(157, 'objetD', 'ARMEX', 1, 30, 0, 0, 'sort'),
(158, 'objetD', 'ARMEX', 1, 30, 0, 21, 'sort'),
(159, 'objetE', 'CTM', 1, 30, 0, 22, 'sort'),
(160, 'OBJETF', 'ARMEX', 1, 30, 0, 0, 'sort'),
(164, 'test2', 'CTM', 1, 30, 0, 24, 'sort'),
(165, 'test', 'CTM', 1, 32, 10, 111, 'ent'),
(166, 'test', 'CTM', 0, 96, 10, 111, 'ent'),
(167, 'test', 'CTM', 1, 30, 0, 111, 'ent'),
(169, 'test2', 'CTM', 1, 30, 0, 0, 'sort'),
(170, 'test', 'CTM', 1, 30, 0, 24, 'sort'),
(171, '1', 'ARMEX', 1, 30, 0, 25, 'sort'),
(172, 'ss', 'ARMEX', 0, 91, 9, 112, 'ent'),
(173, 'ss', 'ARMEX', 1, 103, 9, 112, 'ent'),
(174, 'ss', 'ARMEX', 0, 104, 9, 112, 'ent'),
(175, '9', 'ARMEX', 1, 32, 10, 113, 'ent'),
(176, '9', 'ARMEX', 0, 96, 10, 113, 'ent'),
(177, '9', 'ARMEX', 1, 105, 10, 113, 'ent'),
(178, '12', 'ARMEX', 0, 32, 10, 114, 'ent'),
(179, '12', 'ARMEX', 0, 96, 10, 114, 'ent'),
(180, '12', 'ARMEX', 1, 105, 10, 114, 'ent'),
(181, '12', 'ARMEX', 1, 30, 0, 114, 'ent'),
(182, '12', 'ARMEX', 0, 91, 9, 115, 'ent'),
(183, '12', 'ARMEX', 1, 103, 9, 115, 'ent'),
(184, '12', 'ARMEX', 0, 104, 9, 115, 'ent'),
(185, '12', 'ARMEX', 1, 30, 0, 115, 'ent'),
(186, 'test', 'ARMEX', 0, 32, 10, 116, 'ent'),
(187, 'test', 'ARMEX', 0, 96, 10, 116, 'ent'),
(188, 'test', 'ARMEX', 1, 105, 10, 116, 'ent'),
(189, 'test', 'ARMEX', 1, 106, 10, 116, 'ent'),
(190, 'test', 'ARMEX', 1, 30, 0, 116, 'ent'),
(191, 'test_ent', 'SDTM', 0, 32, 10, 117, 'ent'),
(192, 'test_ent', 'SDTM', 0, 96, 10, 117, 'ent'),
(193, 'test_ent', 'SDTM', 1, 105, 10, 117, 'ent'),
(194, 'test_ent', 'SDTM', 1, 106, 10, 117, 'ent'),
(195, 'test_ent', 'SDTM', 1, 108, 10, 117, 'ent'),
(196, 'test_ent', 'SDTM', 0, 30, 0, 117, 'ent'),
(197, 'test10', 'CTM', 0, 32, 10, 118, 'ent'),
(198, 'test10', 'CTM', 0, 96, 10, 118, 'ent'),
(199, 'test10', 'CTM', 1, 105, 10, 118, 'ent'),
(200, 'test10', 'CTM', 1, 106, 10, 118, 'ent'),
(201, 'test10', 'CTM', 0, 108, 10, 118, 'ent'),
(202, 'test10', 'CTM', 0, 30, 0, 118, 'ent'),
(203, 'test_courrier', 'SDTM', 0, 32, 10, 119, 'ent'),
(204, 'test_courrier', 'SDTM', 0, 96, 10, 119, 'ent'),
(205, 'test_courrier', 'SDTM', 1, 105, 10, 119, 'ent'),
(206, 'test_courrier', 'SDTM', 1, 106, 10, 119, 'ent'),
(207, 'test_courrier', 'SDTM', 0, 108, 10, 119, 'ent'),
(208, 'test_courrier', 'SDTM', 0, 30, 0, 119, 'ent'),
(209, 'entrant', 'ARMEX', 0, 32, 10, 120, 'ent'),
(210, 'entrant', 'ARMEX', 0, 96, 10, 120, 'ent'),
(211, 'entrant', 'ARMEX', 1, 105, 10, 120, 'ent'),
(212, 'entrant', 'ARMEX', 1, 106, 10, 120, 'ent'),
(213, 'entrant', 'ARMEX', 0, 108, 10, 120, 'ent'),
(214, 'entrant', 'ARMEX', 0, 30, 0, 120, 'ent'),
(221, 'test_courrier_entrant', 'ARMEX', 0, 32, 10, 122, 'ent'),
(222, 'test_courrier_entrant', 'ARMEX', 0, 96, 10, 122, 'ent'),
(223, 'test_courrier_entrant', 'ARMEX', 1, 105, 10, 122, 'ent'),
(224, 'test_courrier_entrant', 'ARMEX', 1, 106, 10, 122, 'ent'),
(225, 'test_courrier_entrant', 'ARMEX', 0, 108, 10, 122, 'ent'),
(226, 'test_courrier_entrant', 'ARMEX', 0, 30, 0, 122, 'ent'),
(227, 'test_courrier_sortant', 'CTM', 0, 30, 0, 26, 'sort');

-- --------------------------------------------------------

--
-- Table structure for table `cr_entrant`
--

CREATE TABLE `cr_entrant` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `entreprise` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `ville_ent` varchar(255) NOT NULL,
  `nbr_cour` int(20) NOT NULL,
  `numero` int(30) NOT NULL,
  `objet_ent` varchar(300) NOT NULL,
  `dest_direc` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `type_ent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_entrant`
--

INSERT INTO `cr_entrant` (`id`, `name`, `entreprise`, `date`, `ville_ent`, `nbr_cour`, `numero`, `objet_ent`, `dest_direc`, `comment`, `type_ent`) VALUES
(101, 'default-avatar.png', 'ARMEX', '2022-06-15 09:06:50', 'mohammedia', 2, 234759, 'objet1', 'Achat', '', 'livraison'),
(102, 'default-avatar.png', 'SDTM', '2022-06-15 09:07:29', 'mohammedia', 1, 5678, 'objet2', 'RH', '', 'Facture'),
(103, '15375422402447_DC.png', 'SDTM', '2022-06-15 09:08:27', 'mohammedia', 2, 56789, 'objet3', 'Achat', '', 'livraison'),
(104, 'book-4.jpg', 'CTM', '2022-06-15 09:09:17', 'casa', 1, 68583, 'objet4', 'exp', '', 'Facture'),
(105, 'Le-modèle-MVC.jpg', 'ARMEX', '2022-06-15 09:10:11', 'rabat', 2, 574784, 'objet5', 'DR', '', 'Facture'),
(106, 'Le-modèle-MVC.jpg', 'CTM', '2022-06-15 09:16:54', 'rabat', 2, 576575, 'objet9', 'SI', '', 'Facture'),
(107, 'yg-science-apres-covid-1200x675 (1).jpg', 'ARMEX', '2022-06-15 09:17:47', 'rabat', 1, 777656, 'objet10', 'Achat', '', 'livraison'),
(108, 'gestion de type courrier.png', 'CTM', '2022-06-15 09:18:40', 'casa', 2, 3535, 'objet11', 'exp', '', 'Facture'),
(109, 'Screenshot (2394).png', 'SDTM', '2022-06-15 09:19:46', 'casa', 1, 8373, 'objet12', 'Achat', '', 'Facture'),
(111, 'default-avatar.png', 'CTM', '2022-06-15 10:05:47', 'casa', 1, 83728, 'test', 'Achat', 'test ajouter courrier', 'Facture'),
(112, 'courriers_entrant (2).xls', 'ARMEX', '2022-06-15 14:30:25', 'mohammedia', 1, 1, 'ss', 'RH', '', 'livraison'),
(113, 'Rapport SGE (1).pdf', 'ARMEX', '2022-06-20 08:20:21', 'mohammedia', 9, 9, '9', 'Achat', '', 'livraison'),
(114, 'Rapport SGE (1).pdf', 'ARMEX', '2022-06-20 08:21:38', 'mohammedia', 12, 12, '12', 'Achat', '', 'livraison'),
(115, 'Admin.php', 'ARMEX', '2022-06-20 08:22:17', 'mohammedia', 12, 121, '12', 'RH', '', 'livraison'),
(116, 'Rapport SGE (1).pdf', 'ARMEX', '2022-06-20 19:31:54', 'rabat', 1, 76728, 'test', 'Achat', 'test courrier entrant', 'livraison'),
(117, 'Rapport SGE (1).pdf', 'SDTM', '2022-06-20 19:42:30', 'casa', 1, 67354, 'test_ent', 'Achat', 'test courrier entrant', 'Facture'),
(118, 'Rapport SGE (1) (3).pdf', 'CTM', '2022-06-20 19:54:45', 'casa', 1, 687234, 'test10', 'Achat', 'test', 'Facture'),
(119, 'Rapport SGE (1) (3).pdf', 'SDTM', '2022-06-20 19:57:44', 'casa', 1, 8763, 'test_courrier', 'Achat', 'test', 'Facture'),
(120, 'Rapport SGE (1) (3) (1).pdf', 'ARMEX', '2022-06-20 20:01:42', 'casa', 1, 786324, 'entrant', 'Achat', 'test', 'Facture');

-- --------------------------------------------------------

--
-- Table structure for table `cr_sortant`
--

CREATE TABLE `cr_sortant` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `entreprise` varchar(70) NOT NULL,
  `date` datetime NOT NULL,
  `dest_direc` varchar(70) NOT NULL,
  `ville_ent` varchar(255) NOT NULL,
  `objet_ent` varchar(300) NOT NULL,
  `nbr_cour` int(11) NOT NULL,
  `type_ent` varchar(255) NOT NULL,
  `numero` int(20) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_sortant`
--

INSERT INTO `cr_sortant` (`id`, `name`, `entreprise`, `date`, `dest_direc`, `ville_ent`, `objet_ent`, `nbr_cour`, `type_ent`, `numero`, `comment`) VALUES
(17, 'Screenshot (2399).png', 'SDTM', '2022-06-15 09:20:43', 'RH', 'casa', 'objetA', 2, ' Facture', 658766, ''),
(18, 'Screenshot (2399).png', 'ARMEX', '2022-06-15 09:21:22', 'Achat', 'rabat', 'objetB', 3, ' Facture', 87387842, ''),
(19, 'Screenshot (1982).png', 'CTM', '2022-06-15 09:22:07', 'SI', 'casa', 'objetC', 2, ' Facture', 768478, ''),
(20, 'Screenshot (1985).png', 'CTM', '2022-06-15 09:23:01', 'DR', 'casa', 'objetD', 1, ' Facture', 876972, ''),
(21, 'gestion de ville.png', 'ARMEX', '2022-06-15 09:24:27', 'SI', 'mohammedia', 'objetD', 1, ' Facture', 657576, ''),
(22, 'gestion de ville.png', 'CTM', '2022-06-15 09:25:18', 'Achat', 'casa', 'objetE', 1, ' livraison', 7871692, ''),
(24, 'default-avatar.png', 'CTM', '2022-06-15 10:45:02', 'Achat', 'rabat', 'test', 1, ' livraison', 86232, 'tester courrier sortant');

-- --------------------------------------------------------

--
-- Table structure for table `direction`
--

CREATE TABLE `direction` (
  `direc_id` int(11) NOT NULL,
  `direc_name` varchar(70) NOT NULL,
  `detail` text NOT NULL,
  `util_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `direction`
--

INSERT INTO `direction` (`direc_id`, `direc_name`, `detail`, `util_id`) VALUES
(9, 'RH', 'resource humaine', 1),
(10, 'Achat', 'achat ', 1),
(12, 'SI', 'si', 1),
(13, 'DR', 'direction', 1),
(14, 'exp', 'exploitation', 1),
(16, 'Bureau d\'ordre', '', 2),
(18, 'achat1', 'achat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `ent_id` int(11) NOT NULL,
  `ent_name` varchar(255) NOT NULL,
  `ent_detail` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`ent_id`, `ent_name`, `ent_detail`, `image`) VALUES
(1, 'ARMEX', 'Entreprise de logistique et de transport international', 'aramex-logo-2.png'),
(19, 'CTM', '..', 'ctm.png'),
(25, 'SDTM', '', 'téléchargement.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `start`, `end`) VALUES
(1, 'evenement de test', 'Test\r\n', '2022-05-25 17:09:57', '2022-05-25 17:09:57'),
(2, 'test_do', 'do it by your self', '2022-05-26 18:04:03', '2022-05-26 18:04:03'),
(26, 'description', 'description', '2022-05-09 17:29:00', '2022-05-09 17:39:00'),
(28, 'cr', 'cr', '2022-06-03 12:44:00', '2022-06-03 13:44:00'),
(30, 'test', 'test evenement', '2022-06-15 12:14:00', '2022-06-15 13:15:00'),
(33, 'hh', 'hhh', '2023-06-07 12:04:00', '2023-06-07 23:10:00'),
(34, 'ggg', 'ggg', '2023-05-26 12:05:00', '2023-05-26 17:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `type_cour`
--

CREATE TABLE `type_cour` (
  `type_id` int(11) NOT NULL,
  `type_cour` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_cour`
--

INSERT INTO `type_cour` (`type_id`, `type_cour`) VALUES
(3, 'livraison'),
(4, 'Facture');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_type` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user_type`) VALUES
(1, 'utilisateur'),
(2, 'bureau d ordre');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `utilname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `utiltype` varchar(50) NOT NULL DEFAULT 'Utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `utilname`, `password`, `image`, `direction`, `utiltype`) VALUES
(29, 'aa', 'aa', 'user_bureau', '4124bc0a9335c27f086f24ba207a4912', 'images.jpg', '16', 'bureau d ordre'),
(30, 'hello', 'hello', 'hello', '5d41402abc4b2a76b9719d911017c592', 'AWS for Cloud Computing.png', '', 'admin'),
(32, 'aya', 'aya.sakkour@gmail.com', 'aya', 'bf2bc2545a4a5f5683d9ef3ed0d977e0', 'file.jpg', '10', 'utilisateur'),
(91, 'hasna', 'aya.sakkour@gmail.com', 'hasna', '2510c39011c5be704182423e3a695e91', 'dd (2).PNG', '9', 'utilisateur'),
(96, 'ff', 'f@gmail.com', 'ff', 'bf2bc2545a4a5f5683d9ef3ed0d977e0', 'Mr._Smiley_Face.svg.png', '10', 'utilisateur'),
(100, 'g', 'g@gmail.com', 'g', 'b2f5ff47436671b6e533d8dc3614845d', '', '16', 'bureau d ordre'),
(101, 'b', 'b@gmail.com', 'b', '92eb5ffee6ae2fec3ad71c777531578f', '', '14', 'utilisateur'),
(103, 'a', 'aya.sakkour@gmail.com', 'a', '0cc175b9c0f1b6a831c399e269772661', '', '9', 'utilisateur'),
(104, 'aa', 'aa@gmail.com', 'aa', '47bce5c74f589f4867dbd57e9ca9f808', '', '9', 'utilisateur'),
(105, 'test user', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '', '10', 'utilisateur'),
(106, 'aya achat', 'user.achat@gmail.com', 'user_achat', 'ee11cbb19052e40b07aac0ca060c23ee', 'Crystal_Clear_kdm_user_female.svg.png', '10', 'utilisateur'),
(107, 'user rh', 'user.rhrh1@gmail.com', 'user_rh', 'ee11cbb19052e40b07aac0ca060c23ee', 'images (3).jpg', '9', 'utilisateur'),
(108, 'user achat2', 'user.achat2@gmail.com', 'user_achat2', 'ee11cbb19052e40b07aac0ca060c23ee', '', '10', 'utilisateur');

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `ville_id` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`ville_id`, `ville`) VALUES
(4, 'casa'),
(5, 'rabat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `cr_entrant`
--
ALTER TABLE `cr_entrant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cr_sortant`
--
ALTER TABLE `cr_sortant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direction`
--
ALTER TABLE `direction`
  ADD PRIMARY KEY (`direc_id`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`ent_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_cour`
--
ALTER TABLE `type_cour`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`ville_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `cr_entrant`
--
ALTER TABLE `cr_entrant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `cr_sortant`
--
ALTER TABLE `cr_sortant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `direction`
--
ALTER TABLE `direction`
  MODIFY `direc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `ent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `type_cour`
--
ALTER TABLE `type_cour`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `ville_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
