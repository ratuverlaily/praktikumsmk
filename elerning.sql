-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 08:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elerning`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'siswa', 'Site Halaman Siswa'),
(2, 'guru', 'site Halaman Guru');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-21 18:52:49', 1),
(2, '::1', 'subianaserang21@gmail.com', 2, '2021-02-21 20:44:14', 1),
(3, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-02-21 21:17:43', 1),
(4, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-21 21:41:24', 1),
(5, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-02-21 22:05:52', 1),
(6, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-21 22:21:19', 1),
(7, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-21 22:35:47', 1),
(8, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-02-21 22:36:16', 1),
(9, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-02-21 22:57:45', 1),
(10, '::1', 'titaaprilliawati@gmail.com', 4, '2021-02-22 00:30:48', 1),
(11, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-02-22 00:31:24', 1),
(12, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-22 00:32:35', 1),
(13, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-22 08:29:39', 1),
(14, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-02-22 09:39:34', 1),
(15, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-22 09:44:00', 1),
(16, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-02-22 09:46:32', 1),
(17, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-22 20:58:46', 1),
(18, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-23 03:52:54', 1),
(19, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-23 09:43:04', 1),
(20, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-23 09:56:02', 1),
(21, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-02-23 21:03:05', 1),
(22, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-23 21:03:37', 1),
(23, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-24 00:04:19', 1),
(24, '::1', 'lugiverlaily@gmail.com', 1, '2021-02-24 07:08:39', 1),
(25, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-01 06:24:51', 1),
(26, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-01 19:30:05', 1),
(27, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-02 04:33:12', 1),
(28, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-02 17:08:16', 1),
(29, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-02 19:37:46', 1),
(30, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-02 19:42:10', 1),
(31, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-02 21:26:56', 1),
(32, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-02 21:28:18', 1),
(33, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-02 21:29:44', 1),
(34, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-02 21:30:24', 1),
(35, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-12 23:02:12', 1),
(36, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-13 22:41:16', 1),
(37, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-14 20:08:20', 1),
(38, '::1', 'ver12345', NULL, '2021-03-15 00:15:56', 0),
(39, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-15 00:17:08', 1),
(40, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-15 02:34:41', 1),
(41, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-16 04:43:12', 1),
(42, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-16 04:43:34', 1),
(43, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-16 04:43:52', 1),
(44, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-16 04:49:31', 1),
(45, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-16 17:58:06', 1),
(46, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-17 06:54:01', 1),
(47, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-18 03:26:56', 1),
(48, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-18 08:07:45', 1),
(49, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-20 09:03:29', 1),
(50, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-21 03:23:20', 1),
(51, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-21 03:23:48', 1),
(52, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-21 03:57:40', 1),
(53, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-21 03:57:58', 1),
(54, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-21 06:49:38', 1),
(55, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-21 17:55:55', 1),
(56, '::1', 'ratuverlaily', NULL, '2021-03-21 19:42:14', 0),
(57, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-21 19:42:32', 1),
(58, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-21 23:42:02', 1),
(59, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-22 09:43:29', 1),
(60, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-22 18:40:53', 1),
(61, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-22 18:44:11', 1),
(62, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-22 19:10:46', 1),
(63, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-23 00:46:58', 1),
(64, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-27 03:12:20', 1),
(65, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-27 07:48:27', 1),
(66, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-28 03:05:45', 1),
(67, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-28 07:17:30', 1),
(68, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-28 22:51:09', 1),
(69, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-28 23:33:15', 1),
(70, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-28 23:34:54', 1),
(71, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-29 04:36:13', 1),
(72, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-29 04:38:46', 1),
(73, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-29 04:42:16', 1),
(74, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-29 04:45:55', 1),
(75, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-29 04:46:21', 1),
(76, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-29 09:28:57', 1),
(77, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-29 18:11:13', 1),
(78, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-30 18:04:02', 1),
(79, '::1', 'lugiverlaily@gmail.com', 1, '2021-03-30 21:41:24', 1),
(80, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-30 22:01:29', 1),
(81, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-31 02:09:29', 1),
(82, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-03-31 05:29:12', 1),
(83, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-01 01:27:32', 1),
(84, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-02 05:50:50', 1),
(85, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-02 08:07:29', 1),
(86, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-02 21:41:03', 1),
(87, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-02 21:41:37', 1),
(88, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-03 01:05:41', 1),
(89, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-03 01:06:16', 1),
(90, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-03 19:34:43', 1),
(91, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-03 22:57:19', 1),
(92, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-04 04:30:47', 1),
(93, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-04 19:29:28', 1),
(94, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-04 20:17:38', 1),
(95, '::1', 'titaaprilliawati@gmail.com', 4, '2021-04-04 21:10:20', 1),
(96, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-04 21:20:45', 1),
(97, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-04 22:47:48', 1),
(98, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-05 03:55:56', 1),
(99, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-05 07:53:57', 1),
(100, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-05 20:14:29', 1),
(101, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-05 22:19:55', 1),
(102, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 03:23:42', 1),
(103, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 11:15:05', 1),
(104, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 11:30:35', 1),
(105, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 11:31:12', 1),
(106, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 11:34:41', 1),
(107, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 17:39:24', 1),
(108, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 17:44:29', 1),
(109, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 17:45:13', 1),
(110, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 17:47:00', 1),
(111, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 17:47:50', 1),
(112, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-06 19:18:35', 1),
(113, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:13:14', 1),
(114, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:13:51', 1),
(115, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:14:18', 1),
(116, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:15:05', 1),
(117, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:16:06', 1),
(118, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:18:52', 1),
(119, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:19:37', 1),
(120, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:20:17', 1),
(121, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:21:08', 1),
(122, '::1', 'verlailyratu', NULL, '2021-04-06 21:22:17', 0),
(123, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:22:27', 1),
(124, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:23:02', 1),
(125, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:23:24', 1),
(126, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:24:25', 1),
(127, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-06 21:28:52', 1),
(128, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:33:54', 1),
(129, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:34:19', 1),
(130, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:34:36', 1),
(131, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:34:57', 1),
(132, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:35:26', 1),
(133, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-06 21:37:15', 1),
(134, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:37:51', 1),
(135, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-06 21:38:34', 1),
(136, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 21:44:27', 1),
(137, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-06 21:51:16', 1),
(138, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 22:04:53', 1),
(139, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-06 22:07:59', 1),
(140, '::1', 'titaaprilliawati@gmail.com', 4, '2021-04-06 22:08:44', 1),
(141, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-06 22:09:20', 1),
(142, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 22:35:02', 1),
(143, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 23:05:24', 1),
(144, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-06 23:50:30', 1),
(145, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-07 06:33:30', 1),
(146, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-08 20:56:15', 1),
(147, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-09 10:14:12', 1),
(148, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-10 05:43:01', 1),
(149, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-10 17:56:25', 1),
(150, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 01:14:02', 1),
(151, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 01:14:38', 1),
(152, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-11 01:33:08', 1),
(153, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 02:46:22', 1),
(154, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-11 02:46:40', 1),
(155, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 03:35:23', 1),
(156, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 04:43:02', 1),
(157, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 05:15:43', 1),
(158, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 05:19:32', 1),
(159, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 05:21:33', 1),
(160, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 05:21:35', 1),
(161, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 05:31:07', 1),
(162, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 05:32:03', 1),
(163, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 05:34:07', 1),
(164, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-11 05:34:53', 1),
(165, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 05:39:09', 1),
(166, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-11 05:47:12', 1),
(167, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-11 06:04:26', 1),
(168, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-11 06:35:46', 1),
(169, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-11 06:40:12', 1),
(170, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-11 06:46:33', 1),
(171, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-11 18:39:49', 1),
(172, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-12 05:53:47', 1),
(173, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-12 09:35:49', 1),
(174, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-13 00:32:39', 1),
(175, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-13 00:44:21', 1),
(176, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-13 08:22:02', 1),
(177, '::1', 'verlailyratu@students.itb.ac.id', 3, '2021-04-13 22:05:47', 1),
(178, '::1', 'titaaprilliawati@gmail.com', 4, '2021-04-13 22:51:00', 1),
(179, '::1', 'lugiverlaily@gmail.com', 1, '2021-04-13 22:51:30', 1),
(180, '::1', 'titaaprilliawati@gmail.com', 4, '2021-04-13 22:51:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-siswa', 'Manage All Student'),
(2, 'manage-guru', 'Manage All Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode`, `nama`, `jurusan`, `jumlah`, `id_user`, `status_aktif`) VALUES
(1, 'NiiQ', 'XII EL001', 'Jaringan Komputer', 30, 3, 1),
(2, 'sFFO', 'XII EL002', 'Elektronika 1', 50, 3, 0),
(3, 'MXQH', 'XII EL003', 'Elektronika 2', 35, 3, 0),
(6, 'iic0', 'XII EL004', 'Elektronika 3', 35, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1613921577, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `link` varchar(225) NOT NULL,
  `format` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `judul`, `keterangan`, `link`, `format`, `tanggal`) VALUES
(1, 'Modul Listrik Dasar Pada Perumahan', 'Praktikum Listrik Dasar 1', 'link pdf', 'pdf', '2021-03-03'),
(2, 'Modul Listrik Dasar Pada Hotel', 'Praktikum Listrik Dasar 2', 'link pdf', 'pdf', '2021-03-03'),
(3, 'Modul Listrik Dasar Pada Kantor', 'Praktikum Listrik Dasar 3', 'link pdf', 'pdf', '2021-03-03'),
(4, 'Modul Listrik Dasar Pada Gudang', 'Praktikum Listrik Dasar 4', 'link pdf', 'pdf', '2021-03-03'),
(5, 'Modul Listrik Dasar Pada Gudang 1', 'Praktikum Listrik Dasar 5', 'link pdf', 'pdf', '2021-03-03'),
(6, 'Modul Listrik Dasar Bandara', 'Praktikum Listrik Dasar 6', 'link pdf', 'pdf', '2021-03-03'),
(7, 'Modul Listrik Dasar Pasar', 'Praktikum Listrik Dasar 7', 'link pdf', 'pdf', '2021-03-03'),
(8, 'Modul Listrik Dasar Stasiun', 'Praktikum Listrik Dasar 7', 'link pdf', 'pdf', '2021-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `praktikum`
--

CREATE TABLE `praktikum` (
  `id_praktikum` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `komentar` varchar(500) NOT NULL,
  `id_games` int(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `praktikum`
--

INSERT INTO `praktikum` (`id_praktikum`, `judul`, `komentar`, `id_games`, `id_user`) VALUES
(1, 'Praktikum Listrik Dasar Perumahan', 'Selamat Siang, Silahkan lakukan simulasi praktikum listrik dasar melalui aplikasi game praktikum yang sudah di sediakan. Sebelum melakukan praktikum lebih baik download modul praktikum agar dapat mengikuti kegiatan praktikum ini. Persiakan diri dan materi terkait kelistrikan karena akan ada soal pre test, pos test dan experiment. terimakasih. ', 1, 3),
(2, 'Praktikum Listrik Dasar Pada Hotel', 'Selamat Siang, Silahkan melakukan praktikum yang 2. terimakasih', 2, 3),
(3, 'Praktikum Listrik Dasar Pada Hotel', 'Assalamualaikum wr wb. Silahkan anak2 melakukan praktikum listrik dasar pada pada lingkungan hotel dengan metode bembelajaran simulasi game praktikum. Untuk lebih detail nya dapat kalian coba dengan cara klik link dibawah ini. terimakasih. selamat mencoba ', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `praktikum_dikelas`
--

CREATE TABLE `praktikum_dikelas` (
  `id_kelasprak` int(11) NOT NULL,
  `id_praktikum` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tgl_publis` date NOT NULL,
  `waktu_publis` time NOT NULL,
  `tgl_batas` date NOT NULL,
  `waktu_batas` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `praktikum_dikelas`
--

INSERT INTO `praktikum_dikelas` (`id_kelasprak`, `id_praktikum`, `id_kelas`, `tgl_publis`, `waktu_publis`, `tgl_batas`, `waktu_batas`) VALUES
(1, 1, 1, '2021-04-01', '00:00:08', '2021-04-06', '00:00:08'),
(2, 1, 2, '2021-04-01', '00:00:08', '2021-04-06', '00:00:08'),
(3, 1, 3, '2021-04-01', '00:00:08', '2021-04-06', '00:00:08'),
(4, 2, 2, '2021-04-12', '00:00:08', '2021-04-17', '00:00:08'),
(5, 3, 1, '2021-04-11', '00:00:08', '2021-04-14', '00:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `praktikum_experiment`
--

CREATE TABLE `praktikum_experiment` (
  `id_experiment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_praktikum` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal_finish` date NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `praktikum_experiment`
--

INSERT INTO `praktikum_experiment` (`id_experiment`, `id_user`, `id_praktikum`, `waktu`, `tanggal_finish`, `tanggal`) VALUES
(1, 1, 1, '02:00:00', '2021-03-23', '2021-03-23'),
(2, 1, 1, '03:00:00', '2021-03-24', '2021-03-24'),
(3, 1, 1, '02:30:00', '2021-03-25', '2021-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `praktikum_games`
--

CREATE TABLE `praktikum_games` (
  `id_games` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `link_vidio` varchar(225) NOT NULL,
  `link_games` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `praktikum_games`
--

INSERT INTO `praktikum_games` (`id_games`, `judul`, `id_modul`, `photo`, `link_vidio`, `link_games`) VALUES
(1, 'Praktikum 1', 1, '', '', 'https://www.google.com/'),
(2, 'Praktikum 2', 2, '', '', 'https://www.google.com/'),
(3, 'Praktikum 3', 3, '', '', 'https://www.google.com/'),
(4, 'Praktikum 4', 4, '', '', 'https://www.google.com/'),
(5, 'Praktikum 5', 5, '', '', 'https://www.google.com/'),
(6, 'Praktikum 6', 6, '', '', 'https://www.google.com/'),
(7, 'Praktikum 7', 7, '', '', 'https://www.google.com/'),
(8, 'Praktikum 8', 8, '', '', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `praktikum_posttest`
--

CREATE TABLE `praktikum_posttest` (
  `id_posttes` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_praktikum` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktu` time NOT NULL,
  `fault_counter` int(11) NOT NULL,
  `tanggal_finish` date NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `praktikum_posttest`
--

INSERT INTO `praktikum_posttest` (`id_posttes`, `id_user`, `id_praktikum`, `status`, `waktu`, `fault_counter`, `tanggal_finish`, `tanggal`) VALUES
(1, 1, 1, 'gagal', '03:35:00', 1, '2021-03-23', '2021-03-23'),
(2, 1, 1, 'gagal', '09:41:02', 1, '2021-03-23', '2021-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `praktikum_pretest`
--

CREATE TABLE `praktikum_pretest` (
  `id_pretest` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_praktikum` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktu` time NOT NULL DEFAULT current_timestamp(),
  `tanggal_finish` date NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `praktikum_pretest`
--

INSERT INTO `praktikum_pretest` (`id_pretest`, `id_user`, `id_praktikum`, `status`, `waktu`, `tanggal_finish`, `tanggal`) VALUES
(1, 1, 1, 'gagal', '03:30:00', '2021-03-23', '2021-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `praktikum_status_siswa`
--

CREATE TABLE `praktikum_status_siswa` (
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `praktikum_status_siswa`
--

INSERT INTO `praktikum_status_siswa` (`id_status`, `id_user`, `status`, `tanggal`) VALUES
(1, 1, 1, '2021-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_tlp` varchar(100) NOT NULL,
  `no_fax` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama`, `alamat`, `no_tlp`, `no_fax`, `kode_pos`) VALUES
(5, 'SMA N 1 TIRTAYASA', 'Jl Hj Sanwani no 5 Rt 03 rw 01  serang banten', '087825216163', '123432', '08921');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `type` varchar(255) NOT NULL COMMENT 'File Type'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='users table';

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `type`) VALUES
(1, 'ratu.PNG', 'image/png');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `id` int(11) NOT NULL,
  `nis` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `no_telpon` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `media_sosial` varchar(225) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tanggal` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`id`, `nis`, `jenis_kelamin`, `no_telpon`, `alamat`, `media_sosial`, `id_user`, `id_kelas`, `tanggal`) VALUES
(1, '23219016', 'Perempuan', '087825216163', '', '', 1, 1, ''),
(2, '23219020', 'laki-laki', '087825216163', '', '', 2, 0, ''),
(3, '23219018', 'perempuan', '087825216163', '', '', 4, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `useridentitas`
--

CREATE TABLE `useridentitas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_sekolah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'lugiverlaily@gmail.com', 'ratuverlaily', 'Ratu Verlaili E', 'default.svg', '$2y$10$dczu8luXkG/QhtTq8j.6/.JKZf3stJAPjbOw.eUtRoGhzxPlQddCm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-21 18:36:35', '2021-02-21 18:36:35', NULL),
(2, 'subianaserang21@gmail.com', 'subiana', 'Erlangga Subiana', 'default.svg', '$2y$10$FLdGYz4OU11Rw28rjltdmOGeX8GmTg.fvneqbs37fR1CJLtGclJL.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-21 20:43:56', '2021-02-21 20:43:56', NULL),
(3, 'verlailyratu@students.itb.ac.id', 'verlailyratu', 'Laili Erlina', 'default.svg', '$2y$10$B6Cw1nxQVh2vRDm9OUuCI.cAkpEOYvoQTZDDsG3h6hIVIRRVl2BM6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-21 21:02:16', '2021-02-21 21:02:16', NULL),
(4, 'titaaprilliawati@gmail.com', 'titaaprilliawati', 'Tita Apriliawati', 'default.svg', '$2y$10$lOwG71VZSGFeVWEMM/WfhOf7t.AcYp0MmSOKVUGLqsGy4R.gybLie', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-22 00:30:20', '2021-02-22 00:30:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `praktikum`
--
ALTER TABLE `praktikum`
  ADD PRIMARY KEY (`id_praktikum`);

--
-- Indexes for table `praktikum_dikelas`
--
ALTER TABLE `praktikum_dikelas`
  ADD PRIMARY KEY (`id_kelasprak`);

--
-- Indexes for table `praktikum_experiment`
--
ALTER TABLE `praktikum_experiment`
  ADD PRIMARY KEY (`id_experiment`);

--
-- Indexes for table `praktikum_games`
--
ALTER TABLE `praktikum_games`
  ADD PRIMARY KEY (`id_games`);

--
-- Indexes for table `praktikum_posttest`
--
ALTER TABLE `praktikum_posttest`
  ADD PRIMARY KEY (`id_posttes`);

--
-- Indexes for table `praktikum_pretest`
--
ALTER TABLE `praktikum_pretest`
  ADD PRIMARY KEY (`id_pretest`);

--
-- Indexes for table `praktikum_status_siswa`
--
ALTER TABLE `praktikum_status_siswa`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useridentitas`
--
ALTER TABLE `useridentitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `praktikum`
--
ALTER TABLE `praktikum`
  MODIFY `id_praktikum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `praktikum_dikelas`
--
ALTER TABLE `praktikum_dikelas`
  MODIFY `id_kelasprak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `praktikum_experiment`
--
ALTER TABLE `praktikum_experiment`
  MODIFY `id_experiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `praktikum_games`
--
ALTER TABLE `praktikum_games`
  MODIFY `id_games` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `praktikum_posttest`
--
ALTER TABLE `praktikum_posttest`
  MODIFY `id_posttes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `praktikum_pretest`
--
ALTER TABLE `praktikum_pretest`
  MODIFY `id_pretest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `praktikum_status_siswa`
--
ALTER TABLE `praktikum_status_siswa`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `useridentitas`
--
ALTER TABLE `useridentitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
