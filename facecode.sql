-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 04:30 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facecode`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `posts_id`, `created_at`) VALUES
(1, 'Nice Comment', 4, 40, '2019-09-29 06:37:13'),
(2, 'Nice Bro', 2, 40, '2019-09-29 06:48:24'),
(3, 'asdasdasd', 3, 56, '2019-09-29 07:58:05'),
(4, 'asdasd', 3, 57, '2019-09-29 08:17:19'),
(5, 'Wow is so awsome', 3, 64, '2019-09-30 14:08:00'),
(6, 'link ajug', 3, 72, '2019-10-01 03:39:36'),
(7, 'canteq', 3, 74, '2019-10-01 03:45:38'),
(8, 'wauw', 3, 75, '2019-10-01 04:03:42'),
(9, 'gud', 4, 75, '2019-10-01 04:25:09'),
(10, 'Hansum', 4, 75, '2019-10-01 04:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `user_one`, `user_two`, `status`) VALUES
(1, 3, 4, 0),
(2, 5, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `id` int(11) NOT NULL,
  `requester` int(11) NOT NULL,
  `user_requested` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`id`, `requester`, `user_requested`, `status`, `updated_at`, `created_at`) VALUES
(1, 2, 3, 1, '2019-09-21 02:47:27', '2019-09-21 02:47:27'),
(2, 2, 4, 1, '2019-09-21 02:48:09', '2019-09-21 02:48:09'),
(3, 2, 6, 1, '2019-09-21 02:52:23', '2019-09-21 02:52:23'),
(4, 2, 5, 1, '2019-09-21 05:29:09', '2019-09-21 05:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `posts_id`, `user_id`, `created_at`) VALUES
(1, 39, 4, '2019-09-28 13:11:41'),
(3, 39, 3, '2019-09-29 05:47:59'),
(6, 38, 3, '2019-09-29 06:05:10'),
(7, 49, 3, '2019-09-29 06:19:50'),
(8, 50, 3, '2019-09-29 06:19:51'),
(9, 40, 3, '2019-09-29 06:47:22'),
(10, 55, 3, '2019-09-29 06:56:11'),
(11, 37, 3, '2019-09-29 06:57:20'),
(12, 35, 3, '2019-09-29 06:57:33'),
(13, 57, 3, '2019-09-29 08:06:47'),
(14, 62, 3, '2019-09-30 13:53:11'),
(15, 64, 3, '2019-09-30 14:07:52'),
(16, 67, 3, '2019-09-30 14:18:13'),
(17, 72, 3, '2019-10-01 03:39:28'),
(18, 74, 3, '2019-10-01 03:45:32'),
(19, 69, 3, '2019-10-01 04:00:55'),
(20, 68, 3, '2019-10-01 04:02:33'),
(21, 66, 3, '2019-10-01 04:02:35'),
(22, 75, 3, '2019-10-01 04:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_from`, `user_to`, `conversation_id`, `msg`, `status`) VALUES
(1, 3, 4, 1, 'Hello There, how are u ', 1),
(2, 4, 3, 1, 'Im FIne dude', 1),
(3, 3, 4, 1, 'What ur doing ?', 1),
(4, 3, 5, 2, 'Hi DUde', 1),
(5, 5, 3, 2, 'Im Fine', 1),
(6, 3, 4, 1, 'Hello DUDE', 1),
(7, 3, 5, 2, 'Hello', 1),
(8, 3, 5, 2, 'Q Max', 1),
(9, 3, 5, 2, 'Q Max ANDA', 1),
(10, 3, 4, 1, 'WASSUP', 1),
(11, 3, 4, 1, 'GUD LA', 1),
(12, 4, 3, 1, 'WAT ?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_09_14_112557_create_profile_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_logged` int(11) NOT NULL,
  `user_hero` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `note` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_logged`, `user_hero`, `status`, `note`, `updated_at`, `created_at`) VALUES
(2, 3, 2, 1, 'Accepted Your Friend Request', '2019-09-21 02:47:54', '2019-09-21 02:47:54'),
(3, 4, 2, 1, 'Accepted Your Friend Request', '2019-09-21 02:48:23', '2019-09-21 02:48:23'),
(4, 6, 2, 1, 'Accepted Your Friend Request', '2019-09-21 02:52:33', '2019-09-21 02:52:33'),
(5, 5, 2, 1, 'Accepted Your Friend Request', '2019-09-21 05:29:15', '2019-09-21 05:29:15'),
(6, 4, 3, 0, 'Accepted Your Friend Request', '2019-09-21 06:59:40', '2019-09-21 06:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `status`, `image`, `updated_at`, `created_at`) VALUES
(1, 3, 'GeGas Test', 0, NULL, NULL, NULL),
(2, 4, 'Yusa Test', 0, NULL, NULL, NULL),
(3, 3, 'saya mencoba ini', 0, NULL, '2019-09-22 22:13:48', '2019-09-22 22:13:48'),
(4, 3, 'Update johhhh', 0, NULL, '2019-09-22 22:32:31', '2019-09-22 22:32:31'),
(5, 3, 'test', 0, NULL, '2019-09-23 02:24:04', '2019-09-23 02:24:04'),
(6, 3, 'lagi', 0, NULL, '2019-09-23 02:25:30', '2019-09-23 02:25:30'),
(7, 3, 'asd', 0, NULL, '2019-09-23 02:27:31', '2019-09-23 02:27:31'),
(8, 3, 'tsestst', 0, NULL, '2019-09-23 02:27:57', '2019-09-23 02:27:57'),
(9, 3, 'asadasdasdasd', 0, NULL, '2019-09-23 02:29:24', '2019-09-23 02:29:24'),
(10, 4, 'asdasd', 0, NULL, '2019-09-23 05:00:23', '2019-09-23 05:00:23'),
(11, 4, 'testtttt', 0, NULL, '2019-09-23 05:22:37', '2019-09-23 05:22:37'),
(12, 4, 'testtttt', 0, NULL, '2019-09-23 05:22:39', '2019-09-23 05:22:39'),
(13, 4, 'alert', 0, NULL, '2019-09-23 05:28:43', '2019-09-23 05:28:43'),
(14, 4, 'alwerwerew', 0, NULL, '2019-09-23 05:28:50', '2019-09-23 05:28:50'),
(15, 4, 'asdasd', 0, NULL, '2019-09-23 05:30:01', '2019-09-23 05:30:01'),
(16, 4, 'real time', 0, NULL, '2019-09-23 05:31:51', '2019-09-23 05:31:51'),
(17, 4, 'broh', 0, NULL, '2019-09-23 05:31:59', '2019-09-23 05:31:59'),
(18, 4, 'Real Time', 0, NULL, '2019-09-23 05:32:28', '2019-09-23 05:32:28'),
(19, 4, 'Bradar', 0, NULL, '2019-09-23 05:32:32', '2019-09-23 05:32:32'),
(20, 3, 'BARBAR', 0, NULL, '2019-09-23 05:38:28', '2019-09-23 05:38:28'),
(21, 3, 'BARBARIAN', 0, NULL, '2019-09-23 05:40:12', '2019-09-23 05:40:12'),
(22, 2, 'DEMO HERE', 0, NULL, '2019-09-23 05:40:54', '2019-09-23 05:40:54'),
(23, 3, 'test bro', 0, NULL, '2019-09-23 05:52:32', '2019-09-23 05:52:32'),
(24, 2, 'memek', 0, NULL, '2019-09-23 06:18:10', '2019-09-23 06:18:10'),
(25, 3, 'asdasdasdasdasdasdasd', 0, NULL, '2019-09-23 23:22:04', '2019-09-23 23:22:04'),
(26, 3, 'gnhghjhjykjykjy', 0, NULL, '2019-09-23 23:29:36', '2019-09-23 23:29:36'),
(27, 3, 'gnhghjhjykjykjy\nasdasd', 0, NULL, '2019-09-23 23:29:45', '2019-09-23 23:29:45'),
(28, 3, 'dhfaufhaefhssg', 0, NULL, '2019-09-25 02:13:19', '2019-09-25 02:13:19'),
(29, 3, 'dfsfsdfsdf', 0, NULL, '2019-09-25 02:13:28', '2019-09-25 02:13:28'),
(31, 3, 'DASDASDSADASDSADASD', 0, NULL, '2019-09-25 05:47:16', '2019-09-25 05:47:16'),
(33, 4, 'test', 0, NULL, '2019-09-28 04:28:14', '2019-09-28 04:28:14'),
(34, 4, 'asdasdasdasd', 0, NULL, '2019-09-28 11:32:24', '2019-09-28 11:32:24'),
(35, 4, 'asdasdasdasd', 0, NULL, '2019-09-28 11:46:27', '2019-09-28 11:46:27'),
(37, 4, 'TEST DATA', 0, NULL, '2019-09-28 12:52:13', '2019-09-28 12:52:13'),
(38, 4, 'Lorem Ipsum Dolor Sit Amet', 0, NULL, '2019-09-28 12:59:57', '2019-09-28 12:59:57'),
(39, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus feugiat quis lorem ut malesuada. Suspendisse pellentesque hendrerit augue eget fermentum. Cras vehicula erat justo, id semper quam luctus viverra.', 0, NULL, '2019-09-28 13:00:23', '2019-09-28 13:00:23'),
(40, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue eros, convallis vel dui pretium, vehicula maximus dui. Vestibulum porta, ipsum id aliquam fringilla, ipsum metus accumsan nisl, a luctus urna purus ut neque. Etiam fermentum bibendum pos', 0, NULL, '2019-09-29 06:16:38', '2019-09-29 06:16:38'),
(55, 3, 'asdasd', 0, NULL, '2019-09-29 06:55:33', '2019-09-29 06:55:33'),
(56, 3, 'asdasd', 0, NULL, '2019-09-29 07:43:32', '2019-09-29 07:43:32'),
(57, 3, 'duarrrr', 0, NULL, '2019-09-29 08:06:45', '2019-09-29 08:06:45'),
(58, 3, 'asdasdasdasdasdasd', 0, NULL, '2019-09-29 08:23:16', '2019-09-29 08:23:16'),
(59, 3, 'asdasdasd', 0, NULL, '2019-09-29 11:06:07', '2019-09-29 11:06:07'),
(60, 3, 'Tst Hilang', 0, NULL, '2019-09-29 11:09:25', '2019-09-29 11:09:25'),
(61, 3, 'gone d', 0, NULL, '2019-09-29 11:10:29', '2019-09-29 11:10:29'),
(62, 3, 'dummy text', 0, 'tmOO8CwII528X0bT.png', '2019-09-30 13:30:05', '2019-09-30 13:30:05'),
(64, 3, 'Look At my Awesome photo dude', 0, '65eHyIvzaTs7XrJI.jpg', '2019-09-30 14:07:33', '2019-09-30 14:07:33'),
(65, 3, 'Cool', 0, 'gHcekmGLZQ6fW65M.jpg', '2019-09-30 14:09:55', '2019-09-30 14:09:55'),
(66, 3, 'Nice', 0, 'Tcgys53DT0xkD8p5.jpg', '2019-09-30 14:10:15', '2019-09-30 14:10:15'),
(67, 3, 'a', 0, NULL, '2019-09-30 14:16:28', '2019-09-30 14:16:28'),
(68, 3, 'asdasdas', 0, NULL, '2019-09-30 14:24:01', '2019-09-30 14:24:01'),
(69, 3, 'asdasdasd', 0, 'JWvV0K17ifbGMEE7.jpg', '2019-09-30 14:24:08', '2019-09-30 14:24:08'),
(75, 3, 'qqqq', 0, 'dHqMA3avA7OFtn4G.png', '2019-10-01 04:03:34', '2019-10-01 04:03:34'),
(76, 3, 'kul', 0, '2mmr3Nsd7rbPEYPt.png', '2019-10-01 14:00:30', '2019-10-01 14:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `city`, `country`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'london', NULL, NULL, NULL, '2019-09-14 04:49:54', '2019-09-14 04:49:54'),
(2, 3, 'Banyuwangi', 'Indonesia', 'I Am Iron Man', NULL, '2019-09-14 05:19:40', '2019-09-14 05:19:40'),
(3, 4, 'Gresik', 'Indonesia', 'And I Love u 3000', NULL, '2019-09-14 23:51:41', '2019-09-14 23:51:41'),
(4, 5, NULL, NULL, NULL, NULL, '2019-09-20 05:50:08', '2019-09-20 05:50:08'),
(5, 6, NULL, NULL, NULL, NULL, '2019-09-20 05:50:29', '2019-09-20 05:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `slug`, `pic`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'demo', 'male', 'demo', 'http://localhost:8000/img/Asset1.png', 'demo@mail.com', '$2y$10$Onbx5qJgxqdPP/sQ/Ar./er0Wv3m.tGS0JN6jT7igvwKjsfT.qmJ.', 'ddGpU2vWJUAlrBNZBdx4XWwJrE1MT4bF936y5mvgkJ8433rvABZDKbdIQJTS', '2019-09-14 04:49:54', '2019-09-14 04:49:54'),
(3, 'Geofany Galindra', 'male', 'geofany-galindra', 'http://localhost:8000/img/15726340_1624014034279120_1341475946178749225_n.jpg', 'geofanygalindra@ymail.com', '$2y$10$sl4xQUfBXyZjV090GQe6IOvJLoJRwOGmCjQQiVx1d6L3zr1n7jzEC', 'nIohD29XqwRmcDBPNSHn7F71oOHbIQnjSHvWsiO0YnR4jVTX1ZAidtqQdNdp', '2019-09-14 05:19:40', '2019-09-28 01:10:01'),
(4, 'Nur Firdausa', 'female', 'nur-firdausa', 'http://localhost:8000/img/Asset2.png', 'firdausa@gmail.com', '$2y$10$MsGGwMAufg6WuqCWLUzuWOW1o/USMVLkc4glReM56zfwmja9FinFC', 'dXV6ePYihv5JzvNdQ125jLmIVuA4KGVSwriiD4f81EtrKItthlr5daVu7cTG', '2019-09-14 23:51:41', '2019-09-14 23:51:41'),
(5, 'abcdef', 'male', 'abcdef', 'http://localhost:8000/img/Asset1.png', 'abcdef@gmail.com', '$2y$10$kbbbsGUnDHUc904qkwpZhOOmbWayWHuY0bBEwSB.3iriWaGqhmBcy', 'VmvwDP82vUMLQc0Z8uHR7Tif5wHm550ZUMjMJnyS9NHeMNlb3xScMRGWz1mG', '2019-09-20 05:50:08', '2019-09-20 05:50:08'),
(6, 'defghi', 'female', 'defghi', 'http://localhost:8000/img/Asset2.png', 'defghi@gmail.com', '$2y$10$b8rgiZYdAVX8wtXLD6GFh.Ox8JK7Ebh5JhkASd4aN3jgjPVAGnAS2', 'GPhzryCwzNokAcl1rHCAI41yBVKEo50Ka5bN8RCw8X1CLzoHfgfgmm7dG2id', '2019-09-20 05:50:29', '2019-09-20 05:50:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
