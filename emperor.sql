-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 11:32 AM
-- Server version: 10.1.39-MariaDB
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
-- Database: `emperor`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistants`
--

CREATE TABLE `assistants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_out` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_left` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in_hrs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_added` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assistant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foam` int(11) NOT NULL,
  `pax` int(11) NOT NULL,
  `towel` int(11) NOT NULL,
  `blanket` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gross` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deductions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_26_075803_create_assistants_table', 1),
(4, '2019_11_28_053459_create_rooms_type_table', 1),
(5, '2019_11_28_063958_create_rooms_table', 1),
(6, '2019_11_29_051500_create_customers_table', 1),
(7, '2019_12_05_074712_create_incomes_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount3` int(11) NOT NULL,
  `amount12` int(11) NOT NULL,
  `amount24` int(11) NOT NULL,
  `avail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_num`, `desc`, `amount3`, `amount12`, `amount24`, `avail`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'Aircon Room', 250, 600, 900, 'YES', '2019-12-04 04:42:19', '2019-12-14 02:12:31'),
(2, 'A7', 'AC w/ TV', 300, 650, 950, 'YES', '2019-12-04 04:42:30', '2019-12-06 06:44:34'),
(3, 'F1', 'Fan Room', 175, 400, 600, 'YES', '2019-12-04 04:42:43', '2019-12-06 06:47:04'),
(4, 'A2', 'Aircon Room', 250, 600, 900, 'YES', '2019-12-06 21:35:42', '2019-12-15 02:28:48'),
(5, 'A3', 'Aircon Room', 250, 600, 900, 'YES', '2019-12-06 21:38:47', '2019-12-06 21:38:47'),
(6, 'A4', 'Aircon Room', 250, 600, 900, 'YES', '2019-12-06 21:38:57', '2019-12-06 21:38:57'),
(7, 'A5', 'Aircon Room', 250, 600, 900, 'YES', '2019-12-06 21:39:16', '2019-12-06 21:39:16'),
(8, 'A6', 'Aircon Room', 250, 600, 900, 'YES', '2019-12-06 21:39:26', '2019-12-06 21:39:26'),
(9, 'A8', 'AC w/ TV', 300, 650, 950, 'YES', '2019-12-06 21:39:37', '2019-12-06 21:39:37'),
(10, 'A9', 'AC w/ TV', 300, 650, 950, 'YES', '2019-12-06 21:39:48', '2019-12-06 21:40:08'),
(11, 'F2', 'Fan Room', 175, 400, 600, 'YES', '2019-12-15 02:29:35', '2019-12-15 02:29:35'),
(12, 'F3', 'Fan Room', 175, 400, 600, 'YES', '2019-12-15 02:29:41', '2019-12-15 02:29:41'),
(13, 'F4', 'Fan Room', 175, 400, 600, 'YES', '2019-12-15 02:29:47', '2019-12-15 02:29:47'),
(14, 'F5', 'Fan Room', 175, 400, 600, 'YES', '2019-12-15 02:30:03', '2019-12-15 02:30:03'),
(15, 'F6', 'Fan Room', 175, 400, 600, 'YES', '2019-12-15 02:30:08', '2019-12-15 02:30:08'),
(16, 'F7', 'Fan Room', 175, 400, 600, 'YES', '2019-12-15 02:30:15', '2019-12-15 02:30:15'),
(17, 'F8', 'Fan Room', 175, 400, 600, 'YES', '2019-12-15 02:30:21', '2019-12-15 02:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount3` int(11) NOT NULL,
  `amount12` int(11) NOT NULL,
  `amount24` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `type`, `amount3`, `amount12`, `amount24`, `created_at`, `updated_at`) VALUES
(1, 'Fan Room', 175, 400, 600, '2019-12-04 04:41:37', '2019-12-04 04:41:37'),
(2, 'Aircon Room', 250, 600, 900, '2019-12-04 04:41:51', '2019-12-04 04:41:51'),
(3, 'AC w/ TV', 300, 650, 950, '2019-12-04 04:42:06', '2019-12-04 04:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `priority`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', 'HI', NULL, '$2y$10$GLGRbTqBQVNGaRdkFaIxyeVDD6s40jRY8Sckxj7hlS/Sflhlh8tNy', NULL, '2019-12-04 04:41:07', '2019-12-04 04:41:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistants`
--
ALTER TABLE `assistants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
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
-- AUTO_INCREMENT for table `assistants`
--
ALTER TABLE `assistants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
