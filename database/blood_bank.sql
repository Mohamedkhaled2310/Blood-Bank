-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 06:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `national_id` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `national_id`, `email`, `name`, `password`, `code`) VALUES
(14, '45336536356366', 'mmtco2212023@gmail.com', 'محمد خالد', 0, 601461),
(15, '25413856214785', 'mmtco2212023@gmail.com', 'ahmed', 0, 601461),
(17, '78455014445558', 'mmtco2212023@gmail.com', 'محمد خالد حسن', 0, 601461),
(18, '45336538356366', 'mmtco2212023@gmail.com', 'حودا', 250, 601461),
(19, '45336538356367', 'Mohamedkhaled999996@gmail.com', 'محمود وليد محمود محمد', 475, 0),
(20, '30211162105138', 'mmtco221888@gmail.com', 'حودا', 827, 0),
(21, '30111182700216', 'mahmoudwalied2001@gmail.com', 'محمود وليد محمود محمد', 0, 0),
(22, '15466847785454', 'mmtco2212023@gmail.com', 'محمود وليد محمود محمد', 827, 601461);

-- --------------------------------------------------------

--
-- Table structure for table `need`
--

CREATE TABLE `need` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` text NOT NULL,
  `t_blood` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `notes` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `place` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `feedback` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'NotDone',
  `order_date` date DEFAULT NULL,
  `donor_nationalid` int(11) DEFAULT NULL,
  `donor_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `need`
--

INSERT INTO `need` (`id`, `name`, `phone`, `t_blood`, `notes`, `place`, `feedback`, `status`, `order_date`, `donor_nationalid`, `donor_name`) VALUES
(26, 'mahmoud', '01062437507', '-O', 'اننمياا', 'داخل المستشفي', 'هه', 'done', '2023-11-28', 2147483647, 'محمود هشام حسني '),
(27, 'محمود وليد محمود محمد', '01010101011', '+O', 'انميا', 'مباشر خارج المستشفي', 'مش محترم', 'done', '2023-11-28', 2147483647, 'عاشور احمد عطية'),
(34, 'محمود وليد محمود محمد ', '01062437507', 'B', 'عملية جراحيه', 'داخل المستشفي', '', 'done', '2023-11-28', 2147483647, 'محمد خالد حسن '),
(35, 'mm aa hh', '01062437507', '-O', 'سكر', 'مباشر خارج المستشفي', '', 'done', '2023-11-28', 2147483647, 'محمود وليد محمود محمد '),
(40, 'محمد سمير محمود شحاتة', '01288796663', '+A', 'عملية طارئة', 'داخل المستشفي', 'جيد', 'done', '2023-11-28', 2147483647, 'محمد خالد حسن عبدالواحد  '),
(41, 'فتحي احمد حسين', '01099875644', '+A', 'اريد ', 'داخل المستشفي', '', 'NotDone', '2023-11-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `national_id` text NOT NULL,
  `phone` text NOT NULL,
  `t_blood` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_sick` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL,
  `call_time` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `t_cuminication` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `feedback` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `name`, `national_id`, `phone`, `t_blood`, `address`, `is_sick`, `date`, `call_time`, `t_cuminication`, `feedback`, `order_date`) VALUES
(2, 'عاشور احمد عطية', '2565889787546', '01155097715', 'B', 'giza elsaf attiyat', 'نعم ', '2023-11-08', 'بليل', 'رساله نصية واتساب', '', '2023-11-28'),
(3, 'محمد خالد حسن عبدالواحد  ', '30211162105138', '01155097716', '-AB', 'ابو طشت', 'نعم   ', '2023-01-01', 'صباحا', 'رساله نصية واتساب  ', '', '2023-11-28'),
(4, 'محمود وليد محمود محمد', '30111182700216', '01155097715', 'B', 'قنا ابو تشت', 'نعم ', '2023-11-23', 'صباحا', 'الاتصال مباشر', 'علللللللق', '2023-11-28'),
(6, 'محمود وليد محمود محمد ', '15466847785454', '01155097715', '+A', 'قنا ابو تشت', 'لا ', '2023-11-21', 'صباحا', 'الاتصال مباشر ', '', '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `passsword` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `passsword`, `code`) VALUES
(1, 'محمود وليد محمود', 'mohamedkhaled999996@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(4, 'mahmoud', 'mohamedkhaled00013@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(6, 'MAHMOUD', 'mahmodhesham351@gmail.com', 'b706835de79a2b4e80506f582af3676a', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `need`
--
ALTER TABLE `need`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `need`
--
ALTER TABLE `need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
