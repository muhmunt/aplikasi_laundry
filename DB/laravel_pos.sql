-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2019 at 08:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `laundry_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laundries`
--

CREATE TABLE `laundries` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laundries`
--

INSERT INTO `laundries` (`id`, `type_id`, `price`, `created_at`, `updated_at`) VALUES
(4, 8, 20000, '2019-08-06 11:27:56', '2019-08-09 23:08:03'),
(5, 9, 10000, '2019-08-06 11:28:14', '2019-08-06 11:28:14'),
(6, 10, 14500, '2019-08-06 20:54:47', '2019-08-09 23:11:14');

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
(3, '2019_08_05_150905_create_pemasoks_table', 2),
(4, '2019_08_05_151110_create_produks_table', 3),
(5, '2019_08_06_022333_create_type_laundries_table', 4),
(6, '2019_08_06_022530_create_laundries_table', 5),
(7, '2019_08_06_172825_create_orders_table', 6),
(8, '2019_08_07_013204_create_order_details_table', 7),
(9, '2019_08_07_013652_create_carts_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `change_money` int(11) NOT NULL,
  `customer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `no_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `total_price`, `paid`, `change_money`, `customer`, `address`, `no_phone`, `created_at`, `updated_at`) VALUES
(67, 'OR0001', 150000, 2000000, 1850000, 'agam', 'wangun', '088888888', '2019-08-09 23:35:24', '2019-08-09 23:35:24'),
(68, 'OR067001', 430000, 500000, 70000, 'agam', 'tajur', '08888888', '2019-08-10 06:01:40', '2019-08-10 06:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `laundry_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `laundry_id`, `qty`, `created_at`, `updated_at`) VALUES
(15, 67, 4, 2, '2019-08-09 23:35:24', '2019-08-09 23:35:24'),
(16, 67, 5, 3, '2019-08-09 23:35:24', '2019-08-09 23:35:24'),
(17, 67, 6, 2, '2019-08-09 23:35:24', '2019-08-09 23:35:24'),
(18, 68, 4, 8, '2019-08-10 06:01:40', '2019-08-10 06:01:40'),
(19, 68, 6, 4, '2019-08-10 06:01:40', '2019-08-10 06:01:40'),
(20, 68, 5, 5, '2019-08-10 06:01:40', '2019-08-10 06:01:40');

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
-- Table structure for table `type_laundries`
--

CREATE TABLE `type_laundries` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_laundries`
--

INSERT INTO `type_laundries` (`id`, `type`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Sepatu', NULL, '2019-08-06 09:30:03', '2019-08-09 23:06:59'),
(9, 'Kiloan', NULL, '2019-08-06 11:27:29', '2019-08-06 11:27:29'),
(10, 'Karpet', NULL, '2019-08-06 11:27:38', '2019-08-06 11:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, 'admin@admin.com', NULL, '$2y$10$mIV.qYOhjPUUgAKrNP8l6eQEQG1MO9awUVye/ivmFLR8QoSi9MVCG', 'MNd0XwvHrd0cbXLNP1qGYdKXA16rxxqM749Wd3Z3Uy3nIxfOMbkW8WPYgrkk', '2019-08-05 05:03:40', '2019-08-05 05:03:40'),
(2, 'user', NULL, NULL, 'user@user.com', NULL, '$2y$10$W3DoF4FwB6b1JLEF4Rofnuvz4v0JVo6WoGMQ/7vnFgyGMdAm8R8GG', 'mfvm1XcaOWIBxgkYY0FmKk3V9DmngtSO8eaZ0S4LBE68fi6expLaPp8HIkBT', '2019-08-05 05:16:04', '2019-08-05 05:16:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_laundry_id_foreign` (`laundry_id`);

--
-- Indexes for table `laundries`
--
ALTER TABLE `laundries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundries_type_id_foreign` (`type_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_laundry_id_foreign` (`laundry_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `type_laundries`
--
ALTER TABLE `type_laundries`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundries`
--
ALTER TABLE `laundries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `type_laundries`
--
ALTER TABLE `type_laundries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_laundry_id_foreign` FOREIGN KEY (`laundry_id`) REFERENCES `laundries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laundries`
--
ALTER TABLE `laundries`
  ADD CONSTRAINT `laundries_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type_laundries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_laundry_id_foreign` FOREIGN KEY (`laundry_id`) REFERENCES `laundries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
