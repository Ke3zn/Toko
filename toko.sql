-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2026 at 01:50 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_13_071054_add_role_to_users_table', 1),
(5, '2026_01_13_071339_create_products_table', 2),
(6, '2026_01_13_071513_create_carts_table', 3),
(7, '2026_01_13_071648_create_orders_table', 4),
(8, '2026_01_13_092329_add_stock_to_products_table', 5),
(9, '2026_01_13_103212_create_order_items_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 50, '2026-01-13 00:59:29', '2026-01-13 00:59:29'),
(2, 1, 0, '2026-01-13 01:10:35', '2026-01-13 01:10:35'),
(3, 2, 50, '2026-01-13 01:21:45', '2026-01-13 01:21:45'),
(4, 1, 50000, '2026-01-13 02:20:08', '2026-01-13 02:20:08'),
(5, 1, 0, '2026-01-13 02:20:13', '2026-01-13 02:20:13'),
(6, 1, 100000, '2026-01-13 02:28:40', '2026-01-13 02:28:40'),
(7, 1, 50000, '2026-01-13 02:29:04', '2026-01-13 02:29:04'),
(8, 1, 50000, '2026-01-13 02:34:58', '2026-01-13 02:34:58'),
(9, 1, 100000, '2026-01-13 02:35:45', '2026-01-13 02:35:45'),
(10, 1, 50000, '2026-01-13 02:41:10', '2026-01-13 02:41:10'),
(11, 1, 100000, '2026-01-13 02:44:15', '2026-01-13 02:44:15'),
(12, 1, 12000, '2026-01-13 03:37:39', '2026-01-13 03:37:39'),
(13, 2, 12000, '2026-01-13 03:47:03', '2026-01-13 03:47:03'),
(14, 1, 7000, '2026-01-15 00:56:13', '2026-01-15 00:56:13'),
(15, 1, 14000, '2026-01-15 00:56:32', '2026-01-15 00:56:32'),
(16, 2, 19000, '2026-01-15 00:57:13', '2026-01-15 00:57:13'),
(17, 1, 18000, '2026-01-15 01:30:09', '2026-01-15 01:30:09'),
(18, 2, 14000, '2026-01-15 01:32:12', '2026-01-15 01:32:12'),
(19, 1, 7000, '2026-01-15 01:48:21', '2026-01-15 01:48:21'),
(20, 1, 3000, '2026-01-15 02:18:36', '2026-01-15 02:18:36'),
(21, 1, 9000, '2026-01-15 02:30:59', '2026-01-15 02:30:59'),
(22, 4, 3000, '2026-01-15 02:33:24', '2026-01-15 02:33:24'),
(23, 4, 6000, '2026-01-15 02:33:51', '2026-01-15 02:33:51'),
(24, 1, 14000, '2026-01-15 03:20:19', '2026-01-15 03:20:19'),
(25, 1, 7000, '2026-01-15 03:30:29', '2026-01-15 03:30:29'),
(26, 1, 7000, '2026-01-15 03:42:50', '2026-01-15 03:42:50'),
(27, 1, 25000, '2026-01-15 03:43:01', '2026-01-15 03:43:01'),
(28, 2, 13000, '2026-01-15 03:44:18', '2026-01-15 03:44:18'),
(29, 1, 3000, '2026-01-15 17:28:33', '2026-01-15 17:28:33'),
(30, 2, 12000, '2026-01-15 17:29:25', '2026-01-15 17:29:25'),
(31, 1, 3000, '2026-01-15 17:32:33', '2026-01-15 17:32:33'),
(32, 2, 14000, '2026-01-15 17:33:12', '2026-01-15 17:33:12'),
(33, 6, 80000, '2026-01-20 23:29:23', '2026-01-20 23:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 12, 2, 4, 3000, '2026-01-13 03:37:39', '2026-01-13 03:37:39'),
(2, 13, 4, 1, 12000, '2026-01-13 03:47:03', '2026-01-13 03:47:03'),
(3, 14, 3, 1, 7000, '2026-01-15 00:56:13', '2026-01-15 00:56:13'),
(4, 15, 3, 2, 7000, '2026-01-15 00:56:32', '2026-01-15 00:56:32'),
(5, 16, 6, 2, 6000, '2026-01-15 00:57:13', '2026-01-15 00:57:13'),
(6, 16, 3, 1, 7000, '2026-01-15 00:57:13', '2026-01-15 00:57:13'),
(7, 17, 2, 6, 3000, '2026-01-15 01:30:09', '2026-01-15 01:30:09'),
(8, 18, 3, 2, 7000, '2026-01-15 01:32:12', '2026-01-15 01:32:12'),
(9, 19, 3, 1, 7000, '2026-01-15 01:48:21', '2026-01-15 01:48:21'),
(10, 20, 2, 1, 3000, '2026-01-15 02:18:36', '2026-01-15 02:18:36'),
(11, 21, 2, 3, 3000, '2026-01-15 02:30:59', '2026-01-15 02:30:59'),
(12, 22, 2, 1, 3000, '2026-01-15 02:33:24', '2026-01-15 02:33:24'),
(13, 23, 2, 2, 3000, '2026-01-15 02:33:51', '2026-01-15 02:33:51'),
(14, 24, 3, 2, 7000, '2026-01-15 03:20:19', '2026-01-15 03:20:19'),
(15, 25, 3, 1, 7000, '2026-01-15 03:30:29', '2026-01-15 03:30:29'),
(16, 26, 3, 1, 7000, '2026-01-15 03:42:50', '2026-01-15 03:42:50'),
(17, 27, 3, 1, 7000, '2026-01-15 03:43:01', '2026-01-15 03:43:01'),
(18, 27, 4, 1, 12000, '2026-01-15 03:43:01', '2026-01-15 03:43:01'),
(19, 27, 6, 1, 6000, '2026-01-15 03:43:01', '2026-01-15 03:43:01'),
(20, 28, 3, 1, 7000, '2026-01-15 03:44:18', '2026-01-15 03:44:18'),
(21, 28, 6, 1, 6000, '2026-01-15 03:44:18', '2026-01-15 03:44:18'),
(22, 29, 2, 1, 3000, '2026-01-15 17:28:33', '2026-01-15 17:28:33'),
(23, 30, 2, 3, 3000, '2026-01-15 17:29:25', '2026-01-15 17:29:25'),
(24, 30, 10, 1, 3000, '2026-01-15 17:29:25', '2026-01-15 17:29:25'),
(25, 31, 2, 1, 3000, '2026-01-15 17:32:33', '2026-01-15 17:32:33'),
(26, 32, 3, 2, 7000, '2026-01-15 17:33:12', '2026-01-15 17:33:12'),
(27, 33, 10, 1, 3000, '2026-01-20 23:29:23', '2026-01-20 23:29:23'),
(28, 33, 3, 11, 7000, '2026-01-20 23:29:23', '2026-01-20 23:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `created_at`, `updated_at`, `stock`) VALUES
(2, 'Air putih', 3000, 'Air yang segar', 'products/qfdnAbE2Pl16dAg1h5Wjq4THvjsiqjGzLBDweTpq.jpg', '2026-01-13 02:46:19', '2026-01-15 17:32:33', 28),
(3, 'Garam', 7000, 'Asin awas', 'products/wTHwWYtGct8jU8Q7wSXr6weZrpMGSilv9HpQz6YO.jpg', '2026-01-13 02:47:27', '2026-01-20 23:29:23', 4),
(4, 'Minyak', 12000, 'Minyak yang botolan ajah', 'products/bJWpuGornjDArZA6ZWPSrchDuuBgCjWEU8MIkXm6.png', '2026-01-13 02:48:27', '2026-01-15 03:43:01', 15),
(5, 'Apel', 35000, 'Apel yang sangat manis wajib beli', 'products/0oAI4NwLsKFMCR5Fauc1p98Nh6shIdtQK2GW8zxz.jpg', '2026-01-13 03:57:05', '2026-01-13 03:57:05', 100),
(6, 'Sabun', 6000, 'Biar wangi make ini', 'products/AJymLji3dz3SUP5T7VazPQHG6hTqHsaQnfJyS7Wb.jpg', '2026-01-13 03:59:29', '2026-01-15 03:44:18', 66),
(7, 'Shampoo', 16000, 'Biar ga ketombean brok pake ini', 'products/gNvVvCNGiGkRpw5yCwTlldf57OVX7uct0easczCn.jpg', '2026-01-13 03:59:58', '2026-01-13 03:59:58', 90),
(8, 'Taro', 1500, 'Taro🤤🤤', 'products/qlLFEPutyIULumXVrDpbS7qjdM11FNGSUlkP8FJu.jpg', '2026-01-13 04:03:36', '2026-01-13 04:03:36', 100),
(10, 'Indomie', 3000, 'Enak cui', 'products/Ztp9eRCZSuxPvEZCnl1L1l90vMtDBU08Q66GbBVO.jpg', '2026-01-15 02:29:50', '2026-01-20 23:29:23', 48);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tEMEgnVz25JnMj0DbQ749ewqWjvVv4QJTefeKZaI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYk0wTHlYdGxpVjhvaTlURVVsUFNkVmhVem1lZFFxSGVvVzlORXM3QiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1769656183),
('VyDQsy4dplQRhPd0QQdiknQaaLlrB8RTU6PV4Cxf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianZvVTN5UUtrVVRDckgyOG54S25iNkdnM2dFTVRkZzVDMGJSbnp4eCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768976997);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$lFxn9QHbxABndqw/xXUfBe8APoFP0GQamqF7sdgbKvWjI7Iu/L0BW', NULL, '2026-01-13 00:44:19', '2026-01-13 00:44:19', 'admin'),
(2, 'pelanggan', 'pelanggan@gmail.com', NULL, '$2y$12$f9YJrqdr8LdsKsGscpEdpen8SKMfX7v1U0O2J22C1yrkB7Be7Cbzu', NULL, '2026-01-13 01:20:54', '2026-01-13 01:20:54', 'user'),
(3, 'riken', 'Riken@gmail.com', NULL, '$2y$12$1SEwsvE1PnUKK8yOyAenSu533NPj25nCKEWuTHcQCPp4pU/j54LEi', NULL, '2026-01-15 00:57:27', '2026-01-15 00:57:27', 'user'),
(4, 'Agam', 'agam@gmail.com', NULL, '$2y$12$g9w0cAMIQVSv4K.qg9r4qe5TQ9PEkDgnrOJEB9ffkWH.pZWhJ7yLu', NULL, '2026-01-15 02:32:30', '2026-01-15 02:32:30', 'user'),
(5, 'reza', 'reza@gmail.com', NULL, '$2y$12$JtK..0IsClfywhtiLyDxl.n5eYfFXYmXHSgTbiRZgBjbIFQTfm0fe', NULL, '2026-01-15 03:06:17', '2026-01-15 03:06:17', 'user'),
(6, 'ujang', 'ujang@gmail.com', NULL, '$2y$12$uIEP8bShMSkBPSctFcCiBe/STp27ZmSiHQ6f0dHFyNfK2oa3.f3zu', NULL, '2026-01-20 23:28:36', '2026-01-20 23:28:36', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
