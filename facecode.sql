-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 11:54 AM
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
(3, 2, 6, 1, '2019-09-21 02:52:23', '2019-09-21 02:52:23');

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
(4, 6, 2, 1, 'Accepted Your Friend Request', '2019-09-21 02:52:33', '2019-09-21 02:52:33');

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
(2, 'demo', 'male', 'demo', 'http://localhost:8000/img/Asset1.png', 'demo@mail.com', '$2y$10$Onbx5qJgxqdPP/sQ/Ar./er0Wv3m.tGS0JN6jT7igvwKjsfT.qmJ.', 'x4bLSzn5V9DbIE3iv3Yuh8TabZ8oQ978DCNOogKuExko2iwaiuZM9aKcwlP0', '2019-09-14 04:49:54', '2019-09-14 04:49:54'),
(3, 'Geofany Galindra', 'male', 'geofany-galindra', 'http://localhost:8000/img/15726340_1624014034279120_1341475946178749225_n.jpg', 'geofanygalindra@ymail.com', '$2y$10$4nP3CQIphTURNnMWMw8XBu7EKTqnTAjKsiXeaYPsy7brm9fJzz0WS', 'LpgB7x6xxWES8fEU2k3Q1zCjomf5HF9g99SxKoEcR23U9ZhSNHiTDGC3dAUk', '2019-09-14 05:19:40', '2019-09-14 05:19:40'),
(4, 'Nur Firdausa', 'female', 'nur-firdausa', 'http://localhost:8000/img/Asset2.png', 'firdausa@gmail.com', '$2y$10$MsGGwMAufg6WuqCWLUzuWOW1o/USMVLkc4glReM56zfwmja9FinFC', 'Za3FbIuOWVmCTVamIBePndkrzherENxHZLq4YeisELjGqoncarKeJT5lMpzW', '2019-09-14 23:51:41', '2019-09-14 23:51:41'),
(5, 'abcdef', 'male', 'abcdef', 'http://localhost:8000/img/Asset1.png', 'abcdef@gmail.com', '$2y$10$kbbbsGUnDHUc904qkwpZhOOmbWayWHuY0bBEwSB.3iriWaGqhmBcy', 'yf0I7x2Zducy8orDygs4nyrgBFWItW791SQ8i67UBCWTzPlmrmLznSCOBBe5', '2019-09-20 05:50:08', '2019-09-20 05:50:08'),
(6, 'defghi', 'female', 'defghi', 'http://localhost:8000/img/Asset2.png', 'defghi@gmail.com', '$2y$10$b8rgiZYdAVX8wtXLD6GFh.Ox8JK7Ebh5JhkASd4aN3jgjPVAGnAS2', 'GPhzryCwzNokAcl1rHCAI41yBVKEo50Ka5bN8RCw8X1CLzoHfgfgmm7dG2id', '2019-09-20 05:50:29', '2019-09-20 05:50:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
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
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
