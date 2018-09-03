-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2018 at 12:23 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.2.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biolab`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--
-- Creation: Sep 03, 2018 at 06:49 AM
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `pid` int(11) NOT NULL,
  `tl_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--
-- Creation: Sep 03, 2018 at 06:49 AM
-- Last update: Sep 03, 2018 at 06:49 AM
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_16_092140_create_events_table', 1),
(4, '2018_06_17_211952_create_tools_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--
-- Creation: Sep 03, 2018 at 06:49 AM
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--
-- Creation: Sep 03, 2018 at 06:49 AM
-- Last update: Sep 03, 2018 at 06:49 AM
--

CREATE TABLE `tools` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tl_name` longtext NOT NULL,
  `tl_desc` varchar(255) NOT NULL DEFAULT 'NA',
  `color` varchar(7) NOT NULL DEFAULT '#ffffff'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `created_at`, `updated_at`, `tl_name`, `tl_desc`, `color`) VALUES
(1, NULL, NULL, 'Microvolume Spectrophotometer', 'NA', '#ffffff'),
(2, NULL, NULL, 'Multimode Microplate Reader', 'NA', '#ffffff'),
(3, NULL, NULL, 'Gel Documentation System', 'NA', '#ffffff'),
(4, NULL, NULL, 'Gel Doc System', 'NA', '#ffffff'),
(5, NULL, NULL, 'FPLC For Protein purification', 'NA', '#ffffff'),
(6, NULL, NULL, 'Refrigeration System for Chromatography', 'NA', '#ffffff'),
(7, NULL, NULL, 'UV-VIS-NIR Spectrophotometer', 'NA', '#ffffff'),
(8, NULL, NULL, 'Spectrofluorometer', 'NA', '#ffffff'),
(9, NULL, NULL, 'Ultrasonic Processor', 'NA', '#ffffff'),
(10, NULL, NULL, 'NGS facility', 'NA', '#ffffff'),
(11, NULL, NULL, 'Microplate shaker', 'NA', '#ffffff'),
(12, NULL, NULL, 'Focused ultrasonicator', 'NA', '#ffffff'),
(13, NULL, NULL, 'Bio analyser with accessories', 'NA', '#ffffff'),
(14, NULL, NULL, 'Bioreactor and accessories', 'NA', '#ffffff'),
(15, NULL, NULL, 'Flow cytometry and accessories', 'NA', '#ffffff'),
(16, NULL, NULL, 'Stopped Flow Spectrophotometer', 'NA', '#ffffff'),
(17, NULL, NULL, 'GC-MS', 'NA', '#ffffff'),
(18, NULL, NULL, 'Trans blot-ElectrophoreticTransfer Apparatus', 'NA', '#ffffff'),
(19, NULL, NULL, 'Gel electrophoresis System', 'NA', '#ffffff'),
(20, NULL, NULL, 'Gel electrophoresis with accessories', 'NA', '#ffffff'),
(21, NULL, NULL, 'Refrigerated Shaking Incubator with parts', 'NA', '#ffffff'),
(22, NULL, NULL, 'Ice Flaking Machine', 'NA', '#ffffff'),
(23, NULL, NULL, 'Real time PCR With Accessories', 'NA', '#ffffff'),
(24, NULL, NULL, 'CO2 Incubator Galaxy+CO2Cylinder', 'NA', '#ffffff'),
(25, NULL, NULL, 'ProflexPCR System', 'NA', '#ffffff'),
(26, NULL, NULL, 'Nikon Inverted Microscope and accessories', 'NA', '#ffffff'),
(27, NULL, NULL, 'EPI Fluoresence Attachment for nikon TS 100 Fluoresence Microscope', 'NA', '#ffffff'),
(28, NULL, NULL, 'Digital Magnetic Stirrer+oil bath+RTC basic', 'NA', '#ffffff'),
(29, NULL, NULL, 'Hot Air Oven', 'NA', '#ffffff'),
(30, NULL, NULL, 'Esco Fume Hood', 'NA', '#ffffff'),
(31, NULL, NULL, 'Speed Vac System', 'NA', '#ffffff'),
(32, NULL, NULL, 'Biosafety cabinet', 'NA', '#ffffff'),
(33, NULL, NULL, 'Biosafety cabinet', 'NA', '#ffffff'),
(34, NULL, NULL, 'Biosafety cabinet', 'NA', '#ffffff'),
(35, NULL, NULL, 'Biosafety cabinet', 'NA', '#ffffff'),
(36, NULL, NULL, 'Biosafety cabinet', 'NA', '#ffffff'),
(37, NULL, NULL, 'Biosafety - Microbiology', 'NA', '#ffffff'),
(38, NULL, NULL, 'Biosafety cabinet Fungal ', 'NA', '#ffffff'),
(39, NULL, NULL, 'Vertical Autoclave', 'NA', '#ffffff'),
(40, NULL, NULL, 'Analytical Balance', 'NA', '#ffffff'),
(41, NULL, NULL, 'Research Plus 3 pack', 'NA', '#ffffff'),
(42, NULL, NULL, 'Ultrasonic Bath', 'NA', '#ffffff'),
(43, NULL, NULL, 'UV-VIS Spectrophotometer', 'NA', '#ffffff'),
(44, NULL, NULL, 'Digital Magnetic Stirrer+oil bath+RTC basic', 'NA', '#ffffff'),
(45, NULL, NULL, 'Centrifuge5424R', 'NA', '#ffffff'),
(46, NULL, NULL, 'Accessories for Gel Doc System', 'NA', '#ffffff'),
(47, NULL, NULL, 'Hot Air Oven', 'NA', '#ffffff'),
(48, NULL, NULL, 'Speed Vac System', 'NA', '#ffffff'),
(49, NULL, NULL, 'Water bath with Flask clip', 'NA', '#ffffff'),
(50, NULL, NULL, 'Heating Shaking Dry bath', 'NA', '#ffffff'),
(51, NULL, NULL, 'Water purification System', 'NA', '#ffffff'),
(52, NULL, NULL, 'MAC orbital shaking Incubator', 'NA', '#ffffff'),
(53, NULL, NULL, 'Spinot Magnetic Stirrer with hot plate', 'NA', '#ffffff'),
(54, NULL, NULL, 'Centrifuge 5424R', 'NA', '#ffffff'),
(55, NULL, NULL, 'Micro pipetteset(9)+tip box(33)+carousel(5)', 'NA', '#ffffff'),
(56, NULL, NULL, 'Samsung Refrigerator', 'NA', '#ffffff'),
(57, NULL, NULL, 'Samsung Refrigerator', 'NA', '#ffffff'),
(58, NULL, NULL, 'Power Supply', 'NA', '#ffffff'),
(59, NULL, NULL, 'Multifunctional Rocker(micropipette set)2', 'NA', '#ffffff'),
(60, NULL, NULL, 'Micro pipette set+Tip box+carousel', 'NA', '#ffffff'),
(61, NULL, NULL, 'Samsung Refrigerator(2)', 'NA', '#ffffff'),
(62, NULL, NULL, 'Gel electrophoresis System', 'NA', '#ffffff'),
(63, NULL, NULL, 'Micro plate reader', 'NA', '#ffffff'),
(64, NULL, NULL, 'Gel electrophoresis with accessories', 'NA', '#ffffff'),
(65, NULL, NULL, 'SpencersDeep freeze-40(2)', 'NA', '#ffffff'),
(66, NULL, NULL, 'UPS back up', 'NA', '#ffffff'),
(67, NULL, NULL, 'Magnetic Stirrer(Prism)', 'NA', '#ffffff'),
(68, NULL, NULL, 'Weighing balance(2)', 'NA', '#ffffff'),
(69, NULL, NULL, 'PH meter', 'NA', '#ffffff'),
(70, NULL, NULL, 'PH meter with standard buffer', 'NA', '#ffffff'),
(71, NULL, NULL, 'PH meter with range 2.0to 20.0+ electrode', 'NA', '#ffffff'),
(72, NULL, NULL, 'Color Imaging System(EVOS)', 'NA', '#ffffff'),
(73, NULL, NULL, 'UV Transilluminator', 'NA', '#ffffff'),
(74, NULL, NULL, 'Refrigerator(2)+Microoven', 'NA', '#ffffff'),
(75, NULL, NULL, 'UV transilluminator', 'NA', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Sep 03, 2018 at 06:49 AM
-- Last update: Sep 03, 2018 at 06:49 AM
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@admin.com', '$2y$10$N23H9Uu.B.n5E4jQbLVhHecyIojl.iT.3AjPy98/hXtorIy4gh7UW', 1, NULL, '2018-09-03 01:19:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
