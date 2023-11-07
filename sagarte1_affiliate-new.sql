-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2023 at 01:13 AM
-- Server version: 10.6.15-MariaDB-cll-lve-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sagarte1_affiliate`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertiser`
--

CREATE TABLE `advertiser` (
  `advertiser_id` int(11) NOT NULL,
  `advertiser_name` varchar(255) NOT NULL,
  `advr_email` varchar(255) NOT NULL,
  `advr_password` varchar(255) NOT NULL,
  `advr_contact` varchar(255) NOT NULL,
  `company_names` varchar(255) NOT NULL,
  `company_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `advertiser`
--

INSERT INTO `advertiser` (`advertiser_id`, `advertiser_name`, `advr_email`, `advr_password`, `advr_contact`, `company_names`, `company_status`) VALUES
(1, 'Armaf Perfumes', 'armafperfumes@gmail.com', 'danish@123', '1234567890', 'Armaf Perfumes', 'active'),
(2, 'PHARMA', 'pharma@gmail.com', '12345678', '013456789', 'danish', 'active'),
(3, 'PHARMA', 'pharma@gmail.com', '12345678', '013456789', 'danish', 'active'),
(4, 'PHARMA', 'pharma@gmail.com', '12345678', '013456789', 'danish', 'active'),
(5, 'PHARMA', 'pharma@gmail.com', '12345678', '013456789', 'danish', 'active'),
(6, 'PHARMA', 'pharma@gmail.com', '12345678', '013456789', 'danish', 'active'),
(7, 'PHARMA', 'pharma@gmail.com', '12345678', '013456789', 'danish', 'active'),
(8, 'PHARMA', 'pharma@gmail.com', '12345678', '013456789', 'danish', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offers_id` int(11) NOT NULL,
  `offer_advertiser_name` varchar(255) NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `preview_link` varchar(255) NOT NULL,
  `tracking_link` varchar(255) NOT NULL,
  `payout` varchar(255) NOT NULL,
  `publisher_payout` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `overall_cap` varchar(255) NOT NULL,
  `daily_caps` varchar(255) NOT NULL,
  `secondary_offer` varchar(255) NOT NULL,
  `acess_type` varchar(255) NOT NULL,
  `currency_type` varchar(255) NOT NULL,
  `allowed_geo` varchar(255) NOT NULL,
  `expiration` varchar(255) NOT NULL,
  `offer_type` varchar(255) NOT NULL,
  `states` varchar(255) NOT NULL,
  `track_ip_city` varchar(255) NOT NULL,
  `order_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offers_id`, `offer_advertiser_name`, `offer_name`, `preview_link`, `tracking_link`, `payout`, `publisher_payout`, `descriptions`, `overall_cap`, `daily_caps`, `secondary_offer`, `acess_type`, `currency_type`, `allowed_geo`, `expiration`, `offer_type`, `states`, `track_ip_city`, `order_link`) VALUES
(1, '1', 'Armaf Perfumes 2023 Sep Month camp', 'http://armafperfume.com/?advr_id=1', 'https://armafperfume.com/', '00', '00', 'danissh', '1000', '30', '', 'Public', 'IND', 'India', '2024-06-13', 's2s', 'active', 'yes', 'http://armafperfume.com/?advr_id=1&order_id=1'),
(2, '2', 'gdsgdsg', 'https://sagartech.online/pharma/?advr_id=2', 'https://sagartech.online/pharma/', '0', '0', 'opoi', '557485', '578', '', 'Public', 'IND', 'India', '2023-11-11', 's2s', 'active', 'yes', 'https://sagartech.online/pharma/?advr_id=2&order_id=2'),
(3, '2', 'medicins', 'https://sagartech.online/pharma?advr_id=2', 'https://sagartech.online/pharma/', '575', '7575', 'gyyujytiu', '474', '4', '', 'Public', 'IND', 'India', '2028-10-26', 's2s', 'active', 'yes', 'https://sagartech.online/pharma?advr_id=2&order_id=3');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `advr_id_api` varchar(255) NOT NULL,
  `offers_id_api` varchar(500) NOT NULL,
  `pusr_id_api` varchar(255) NOT NULL,
  `order_details_api` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `customer_uniqueid` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `advr_id_api`, `offers_id_api`, `pusr_id_api`, `order_details_api`, `date`, `customer_uniqueid`) VALUES
(1, '2', '2', '3', '', '', '6hOomz'),
(2, '2', '2', '3', '', '', '6hOomz'),
(3, '2', '2', '3', '', '', 'hC6f00'),
(4, 'null', 'null', 'null', '', '', 'ScBSsa'),
(5, 'null', 'null', 'null', '', '', 'vixp9Y'),
(6, 'null', 'null', 'null', '', '', 'M5GJpV'),
(7, 'null', 'null', 'null', '', '', 'ak30WK'),
(8, 'null', 'null', 'null', '', '', 'zdeFRY'),
(9, 'null', 'null', 'null', '', '', 'cYJ3hJ'),
(10, 'null', 'null', 'null', '', '', 'z9BNOr'),
(11, 'null', 'null', 'null', '', '', '8HX3CI'),
(12, 'null', 'null', 'null', '', '', '8bXGqq'),
(13, 'null', 'null', 'null', '', '', 'cEOP4w'),
(14, 'null', 'null', 'null', '', '', 'JHnH6S'),
(15, 'null', 'null', 'null', '', '', 'M0bUEK'),
(16, 'null', 'null', 'null', '', '', '7k5TfY'),
(17, 'null', 'null', 'null', '', '', 'd9AtBy'),
(18, 'null', 'null', 'null', '', '', '71NqYZ'),
(19, 'null', 'null', 'null', '', '', 'ejl442'),
(20, 'null', 'null', 'null', '', '', 'xE8Cs8'),
(21, 'null', 'null', 'null', '', '', 'rLXYgs'),
(22, 'null', 'null', 'null', '', '', '3eM58Z'),
(23, 'null', 'null', 'null', '', '', 'VKJJwv'),
(24, 'null', 'null', 'null', '', '', 'kSD9AV'),
(25, 'null', 'null', 'null', '', '', 'YCNsG0'),
(26, 'null', 'null', 'null', '', '', '8c4BBV'),
(27, 'null', 'null', 'null', '', '', 'xA0BJF'),
(28, 'null', 'null', 'null', '', '', 'N9iB94'),
(29, 'null', 'null', 'null', '', '', 'uxT2gj'),
(30, 'null', 'null', 'null', '', '', 'BtxbWw'),
(31, 'null', 'null', 'null', '', '', 'qf0sa3'),
(32, 'null', 'null', 'null', '', '', 'GzMTPf'),
(33, 'null', 'null', 'null', '', '', '5p51Jh'),
(34, 'null', 'null', 'null', '', '', 'pICe1f'),
(35, 'null', 'null', 'null', '', '', 'cBd84Y'),
(36, 'null', 'null', 'null', '', '', 'QKCsab'),
(37, 'null', 'null', 'null', '', '', 'CLwO4K'),
(38, 'null', 'null', 'null', '', '', 'sVZWFq'),
(39, 'null', 'null', 'null', '', '', 'nwMcom'),
(40, 'null', 'null', 'null', '', '', 'jogjqh'),
(41, 'null', 'null', 'null', '', '', 'EziS3s'),
(42, 'null', 'null', 'null', '', '', 'p7gflC'),
(43, 'null', 'null', 'null', '', '', 'jJg425'),
(44, 'null', 'null', 'null', '', '', 'nilbmW'),
(45, 'null', 'null', 'null', '', '', 'zHqKNz'),
(46, 'null', 'null', 'null', '', '', 'DBoAHd'),
(47, 'null', 'null', 'null', '', '', 'LM3pHQ'),
(48, 'null', 'null', 'null', '', '', 'end6N2'),
(49, 'null', 'null', 'null', '', '', 'gIu8XV'),
(50, 'null', 'null', 'null', '', '', 'qKWxpg'),
(51, 'null', 'null', 'null', '', '', 'zJAAwP'),
(52, 'null', 'null', 'null', '', '', 'G2Kdoq'),
(53, 'null', 'null', 'null', '', '', '7Vz9C3'),
(54, 'null', 'null', 'null', '', '', 'ayoe1D'),
(55, 'null', 'null', 'null', '', '', 'r5maHb'),
(56, 'null', 'null', 'null', '', '', '47uSu9'),
(57, 'null', 'null', 'null', '', '', 'hyXYXx'),
(58, 'null', 'null', 'null', '', '', 'FhKSsi'),
(59, 'null', 'null', 'null', '', '', 'ZHjngm'),
(60, 'null', 'null', 'null', '', '', 'NH7A6P'),
(61, 'null', 'null', 'null', '', '', 'VTUcWP'),
(62, 'null', 'null', 'null', '', '', 'C9bnhk'),
(63, 'null', 'null', 'null', '', '', 'jJFFxP'),
(64, 'null', 'null', 'null', '', '', '9taFUs'),
(65, 'null', 'null', 'null', '', '', 'TIXUfl'),
(66, 'null', 'null', 'null', '', '', '77Se2u'),
(67, 'null', 'null', 'null', '', '', 'cKmIjw'),
(68, 'null', 'null', 'null', '', '', 'jVpoia'),
(69, 'null', 'null', 'null', '', '', 'KO40a8'),
(70, 'null', 'null', 'null', '', '', 'zjqpWH'),
(71, 'null', 'null', 'null', '', '', 'k9xVET'),
(72, 'null', 'null', 'null', '', '', 'z33Ir1'),
(73, 'null', 'null', 'null', '', '', 'bBzlvV'),
(74, 'null', 'null', 'null', '', '', '2hSXCp'),
(75, 'null', 'null', 'null', '', '', 'NOp7Ys'),
(76, 'null', 'null', 'null', '', '', 'w5NOp7'),
(77, 'null', 'null', 'null', '', '', 'SLdtvr'),
(78, 'null', 'null', 'null', '', '', '3vLZDD'),
(79, 'null', 'null', 'null', '', '', 'g8ZsMC'),
(80, 'null', 'null', 'null', '', '', 'mgAect'),
(81, 'null', 'null', 'null', '', '', 'Ju7s7a'),
(82, 'null', 'null', 'null', '', '', 'aNHVlI'),
(83, 'null', 'null', 'null', '', '', 'fPvWQc'),
(84, 'null', 'null', 'null', '', '', 'gcpaKJ'),
(85, 'null', 'null', 'null', '', '', 'CHfspJ'),
(86, 'null', 'null', 'null', '', '', 'GumHEl'),
(87, 'null', 'null', 'null', '', '', 'onbaJV'),
(88, 'null', 'null', 'null', '', '', 'acvr5v'),
(89, 'null', 'null', 'null', '', '', 'JDRgEu'),
(90, 'null', 'null', 'null', '', '', 'IZO9WI'),
(91, 'null', 'null', 'null', '', '', 'LLKZXQ'),
(92, 'null', 'null', 'null', '', '', 'xHWXjK'),
(93, 'null', 'null', 'null', '', '', 'BoobTS'),
(94, 'null', 'null', 'null', '', '', 'wdgmOa'),
(95, 'null', 'null', 'null', '', '', 'BoLEkg'),
(96, 'null', 'null', 'null', '', '', 'uwQe01'),
(97, 'null', 'null', 'null', '', '', 'zJZyMx'),
(98, 'null', 'null', 'null', '', '', 'T2pU7Y'),
(99, 'null', 'null', 'null', '', '', 'YlUONL'),
(100, 'null', 'null', 'null', '', '', 'JCMBNm'),
(101, 'null', 'null', 'null', '', '', 'BNDgDt'),
(102, 'null', 'null', 'null', '', '', 'alSSEp'),
(103, 'null', 'null', 'null', '', '', '4CRvuS'),
(104, 'null', 'null', 'null', '', '', '7RrDfl'),
(105, 'null', 'null', 'null', '', '', 'aUbkmm'),
(106, '1', '1', '1', '', '', 'tOpE3G'),
(107, 'null', 'null', 'null', '', '', 'tAUL2S'),
(108, 'null', 'null', 'null', '', '', 'IPopA3'),
(109, 'null', 'null', 'null', '', '', 'gUVRqG'),
(110, 'null', 'null', 'null', '', '', 'UlhX5F'),
(111, 'null', 'null', 'null', '', '', 'BcXHnB'),
(112, 'null', 'null', 'null', '', '', 'uVk1C5'),
(113, 'null', 'null', 'null', '', '', 'NST1GW'),
(114, 'null', 'null', 'null', '', '', 'H6JYqf'),
(115, 'null', 'null', 'null', '', '', 'mQe716'),
(116, 'null', 'null', 'null', '', '', 'S1Z7tC'),
(117, 'null', 'null', 'null', '', '', 'OZif2p'),
(118, 'null', 'null', 'null', '', '', '9gy4A2'),
(119, 'null', 'null', 'null', '', '', 'yDXHmW'),
(120, 'null', 'null', 'null', '', '', 'ZXRSvV'),
(121, 'null', 'null', 'null', '', '', 'INCcPv'),
(122, 'null', 'null', 'null', '', '', 'qJQ0v2'),
(123, 'null', 'null', 'null', '', '', 'APsfNl'),
(124, 'null', 'null', 'null', '', '', 't9V2Ax'),
(125, 'null', 'null', 'null', '', '', 'EYpG2O'),
(126, 'null', 'null', 'null', '', '', 'F4j4ry'),
(127, 'null', 'null', 'null', '', '', 'mxam67'),
(128, '1', '1', '1', '', '', 'IzEcNT'),
(129, 'null', 'null', 'null', '', '', '23L7Nr'),
(130, 'null', 'null', 'null', '', '', 'WHQgZM'),
(131, 'null', 'null', 'null', '', '', '5YU8vd'),
(132, 'null', 'null', 'null', '', '', 'ZXlaE2'),
(133, 'null', 'null', 'null', '', '', 'KWWQjr'),
(134, 'null', 'null', 'null', '', '', '37d7EG'),
(135, 'null', 'null', 'null', '', '', 'hKzJYq'),
(136, '1', '1', '1', '', '', 'NxSKPq'),
(137, 'null', 'null', 'null', '', '', '7CbRQD'),
(138, 'null', 'null', 'null', '', '', '5X5tSv'),
(139, 'null', 'null', 'null', '', '', 'foiOMH'),
(140, 'null', 'null', 'null', '', '', 'HOoouk'),
(141, 'null', 'null', 'null', '', '', 'F13VzN'),
(142, 'null', 'null', 'null', '', '', 'xqh9HY'),
(143, 'null', 'null', 'null', '', '', 'OZEl22'),
(144, 'null', 'null', 'null', '', '', 'HpOyl5'),
(145, 'null', 'null', 'null', '', '', '3OgyL4'),
(146, 'null', 'null', 'null', '', '', 'ORGUSn'),
(147, 'null', 'null', 'null', '', '', '41LgEK'),
(148, 'null', 'null', 'null', '', '', '5vxpOX'),
(149, 'null', 'null', 'null', '', '', 'p4mAI1'),
(150, 'null', 'null', 'null', '', '', 'p6OvhT'),
(151, 'null', 'null', 'null', '', '', '0rQmBV'),
(152, 'null', 'null', 'null', '', '', 'pyjmNn'),
(153, 'null', 'null', 'null', '', '', 'wakWvX'),
(154, 'null', 'null', 'null', '', '', 'NnOXLL'),
(155, 'null', 'null', 'null', '', '', 'xfwnSY'),
(156, 'null', 'null', 'null', '', '', 'phATRs'),
(157, 'null', 'null', 'null', '', '', 'XoZw5N'),
(158, 'null', 'null', 'null', '', '', 'hUodzH'),
(159, 'null', 'null', 'null', '', '', 'GACd0N'),
(160, 'null', 'null', 'null', '', '', 'AIHfIx'),
(161, 'null', 'null', 'null', '', '', 'mkfQHe'),
(162, 'null', 'null', 'null', '', '', 'MrD4DC'),
(163, 'null', 'null', 'null', '', '', 'dBvSZp'),
(164, 'null', 'null', 'null', '', '', 'nFlUtH'),
(165, 'null', 'null', 'null', '', '', 'fEjmvP'),
(166, 'null', 'null', 'null', '', '', 'DvoNMV'),
(167, 'null', 'null', 'null', '', '', 'EuzvqZ'),
(168, 'null', 'null', 'null', '', '', 'hSGmAi'),
(169, 'null', 'null', 'null', '', '', 'wlNu7f'),
(170, 'null', 'null', 'null', '', '', 'Mp4fiL'),
(171, 'null', 'null', 'null', '', '', '4m9GFo'),
(172, 'null', 'null', 'null', '', '', 'LZwizW'),
(173, 'null', 'null', 'null', '', '', 'T26dNg'),
(174, 'null', 'null', 'null', '', '', 'wYD2wb'),
(175, 'null', 'null', 'null', '', '', 'aRUbxd'),
(176, 'null', 'null', 'null', '', '', '9LSRTM'),
(177, 'null', 'null', 'null', '', '', '5NOp7Y'),
(178, 'null', 'null', 'null', '', '', '8ctKhI'),
(179, 'null', 'null', 'null', '', '', '6G7qvy'),
(180, 'null', 'null', 'null', '', '', '1LERtC'),
(181, 'null', 'null', 'null', '', '', 'T5xUW2'),
(182, 'null', 'null', 'null', '', '', 'LseAou'),
(183, 'null', 'null', 'null', '', '', 'su8Fue'),
(184, 'null', 'null', 'null', '', '', '6Vr6x7'),
(185, 'null', 'null', 'null', '', '', 'mUzTcP'),
(186, 'null', 'null', 'null', '', '', 'rcrd4l'),
(187, 'null', 'null', 'null', '', '', 'k7N1aU'),
(188, 'null', 'null', 'null', '', '', 'Av1Bev'),
(189, 'null', 'null', 'null', '', '', 'sjUJ4Q'),
(190, 'null', 'null', 'null', '', '', 'wDXYQL'),
(191, 'null', 'null', 'null', '', '', 'w5NOp7'),
(192, 'null', 'null', 'null', '', '', 'fIDceK'),
(193, 'null', 'null', 'null', '', '', 'QY6o14'),
(194, 'null', 'null', 'null', '', '', '6rUB1q'),
(195, 'null', 'null', 'null', '', '', 'nrxo5h'),
(196, 'null', 'null', 'null', '', '', 'HIkgDT'),
(197, 'null', 'null', 'null', '', '', 'vjN7B3'),
(198, 'null', 'null', 'null', '', '', 'cZeTbo'),
(199, 'null', 'null', 'null', '', '', 'MzQhlZ'),
(200, 'null', 'null', 'null', '', '', 'qhyMVQ'),
(201, 'null', 'null', 'null', '', '', 'lcLbqT'),
(202, 'null', 'null', 'null', '', '', 'MqG8g1'),
(203, 'null', 'null', 'null', '', '', 'cZEjD0'),
(204, 'null', 'null', 'null', '', '', 'pPQmAL'),
(205, 'null', 'null', 'null', '', '', 'RH0Bu4'),
(206, 'null', 'null', 'null', '', '', 'vRhUCs'),
(207, 'null', 'null', 'null', '', '', 'KpnuZU'),
(208, 'null', 'null', 'null', '', '', 'zBstWn'),
(209, 'null', 'null', 'null', '', '', 'A3GqM5'),
(210, 'null', 'null', 'null', '', '', 'EnIFIj'),
(211, 'null', 'null', 'null', '', '', 'cTbzU3'),
(212, 'null', 'null', 'null', '', '', 'N1lucM'),
(213, 'null', 'null', 'null', '', '', 'fRr4ek'),
(214, 'null', 'null', 'null', '', '', 'mKx7Qo'),
(215, 'null', 'null', 'null', '', '', 'kwO93y'),
(216, 'null', 'null', 'null', '', '', 'kkYy0c'),
(217, 'null', 'null', 'null', '', '', 'CDNu6T'),
(218, 'null', 'null', 'null', '', '', 'QlR2EC'),
(219, 'null', 'null', 'null', '', '', 'QmV0Fi'),
(220, 'null', 'null', 'null', '', '', 'HTQptp'),
(221, 'null', 'null', 'null', '', '', 'YjSyum'),
(222, 'null', 'null', 'null', '', '', '09HAmx'),
(223, 'null', 'null', 'null', '', '', 'mJV3Lr'),
(224, 'null', 'null', 'null', '', '', 'xr4Vq9'),
(225, 'null', 'null', 'null', '', '', 'CEpTe7'),
(226, 'null', 'null', 'null', '', '', 'd5irMM'),
(227, 'null', 'null', 'null', '', '', 'ks33XP'),
(228, 'null', 'null', 'null', '', '', 'TasiLO'),
(229, 'null', 'null', 'null', '', '', 'eBdWUw'),
(230, 'null', 'null', 'null', '', '', 'rgHNQ2'),
(231, 'null', 'null', 'null', '', '', 'ZIaJAu'),
(232, 'null', 'null', 'null', '', '', 'xezh09'),
(233, 'null', 'null', 'null', '', '', 'V1cVVz'),
(234, 'null', 'null', 'null', '', '', 'UA9lSA'),
(235, 'null', 'null', 'null', '', '', 'PvDVA4'),
(236, 'null', 'null', 'null', '', '', 'eHGdTA'),
(237, 'null', 'null', 'null', '', '', 'e9xUPX'),
(238, 'null', 'null', 'null', '', '', 'wmaKiM'),
(239, 'null', 'null', 'null', '', '', 'SAU9QV'),
(240, 'null', 'null', 'null', '', '', 'fOV6gn'),
(241, 'null', 'null', 'null', '', '', 'a3Xs2W'),
(242, 'null', 'null', 'null', '', '', '4vQowH'),
(243, 'null', 'null', 'null', '', '', 'ceCNYh'),
(244, 'null', 'null', 'null', '', '', 'cEblyh'),
(245, 'null', 'null', 'null', '', '', 'mQvGGy'),
(246, 'null', 'null', 'null', '', '', 'MwloZM'),
(247, 'null', 'null', 'null', '', '', 'BwpBz7'),
(248, 'null', 'null', 'null', '', '', 'Op7Ysj'),
(249, 'null', 'null', 'null', '', '', 'WLtmu0'),
(250, 'null', 'null', 'null', '', '', 'G4uvo8'),
(251, 'null', 'null', 'null', '', '', 'NOp7Ys'),
(252, 'null', 'null', 'null', '', '', 'w5NOp7'),
(253, 'null', 'null', 'null', '', '', 'asgrlj'),
(254, 'null', 'null', 'null', '', '', 'UzQneM'),
(255, 'null', 'null', 'null', '', '', '74LgLd'),
(256, 'null', 'null', 'null', '', '', 'nSLNuv'),
(257, 'null', 'null', 'null', '', '', 'NUvrLn'),
(258, 'null', 'null', 'null', '', '', 'xbGifq'),
(259, 'null', 'null', 'null', '', '', 'RBHCCE'),
(260, 'null', 'null', 'null', '', '', 'APhryw'),
(261, 'null', 'null', 'null', '', '', '8lA143'),
(262, 'null', 'null', 'null', '', '', 'tZoFQ3'),
(263, 'null', 'null', 'null', '', '', '0T9ds1'),
(264, '1', '1', '1', '', '', 'R7Yyg7'),
(265, 'null', 'null', 'null', '', '', 'VEcs0C'),
(266, 'null', 'null', 'null', '', '', 'mEmJmL'),
(267, 'null', 'null', 'null', '', '', 'kDpWTU'),
(268, 'null', 'null', 'null', '', '', 'MdOxsx'),
(269, 'null', 'null', 'null', '', '', 'AZoqnY'),
(270, 'null', 'null', 'null', '', '', 'FJfjPz'),
(271, 'null', 'null', 'null', '', '', 'NOp7Ys'),
(272, 'null', 'null', 'null', '', '', 'NOp7Ys'),
(273, 'null', 'null', 'null', '', '', 'w5NOp7'),
(274, 'null', 'null', 'null', '', '', 'H6OFEr'),
(275, 'null', 'null', 'null', '', '', 'Upot1C'),
(276, 'null', 'null', 'null', '', '', 'vqB8Zq'),
(277, 'null', 'null', 'null', '', '', '5as2TF'),
(278, 'null', 'null', 'null', '', '', 'XNv4ka'),
(279, 'null', 'null', 'null', '', '', 'izoAHQ'),
(280, '2', '2', '3', '', '', 'hDNjh5'),
(281, 'null', 'null', 'null', '', '', '16BCNK'),
(282, 'null', 'null', 'null', '', '', 'UlKJDT'),
(283, 'null', 'null', 'null', '', '', '3GM3P6'),
(284, 'null', 'null', 'null', '', '', 'LdB5ix'),
(285, '2', '2', '3', '', '', 'N52UvB'),
(286, 'null', 'null', 'null', '', '', 'r86rai'),
(287, '2', '3', '3', '', '', 'I0VUwW'),
(288, 'null', 'null', 'null', '', '', 'hoMlJj'),
(289, 'null', 'null', 'null', '', '', 'hNwxmq');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `pusr_email` varchar(255) NOT NULL,
  `pusr_password` varchar(255) NOT NULL,
  `pusr_contact` varchar(255) NOT NULL,
  `company_names` varchar(255) NOT NULL,
  `pusr_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `pusr_email`, `pusr_password`, `pusr_contact`, `company_names`, `pusr_status`) VALUES
(1, 'Danish Shaikh', 's.danish0827@gmail.com', '123465', '09867356907', 'Danish Shaikh', 'active'),
(2, 'Maroof Khan', 'maroof@gmail.com', '1234567890', '1234567890', 'Maroof Khan', 'active'),
(3, 'Shadab Khan', 'shadab@gmail.com', '123456789', '1234567890', 'Shadab Khan', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 's.danish0827@gmail.com', '$2y$10$zhn8ViiwOMiSj7y4xBcKbe92HWdHSL4nYdtiHpl7RnzOWmRCwNZQW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertiser`
--
ALTER TABLE `advertiser`
  ADD PRIMARY KEY (`advertiser_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offers_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertiser`
--
ALTER TABLE `advertiser`
  MODIFY `advertiser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
