-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 11:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_rekweb_nameless`
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
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

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
(2, 2),
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
(1, '::1', 'admin', NULL, '2020-12-25 23:18:09', 0),
(2, '::1', 'user', NULL, '2020-12-25 23:18:35', 0),
(3, '::1', 'admin', NULL, '2020-12-25 23:20:30', 0),
(4, '::1', 'user123', NULL, '2020-12-25 23:55:21', 0),
(5, '::1', 'admin', 1, '2020-12-25 23:58:01', 0),
(6, '::1', 'ridhaaf@gmail.com', 1, '2020-12-25 23:58:21', 1),
(7, '::1', 'ridhaaf@gmail.com', 1, '2020-12-26 00:12:25', 1),
(8, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-26 00:18:19', 1),
(9, '::1', 'ridhaaf@gmail.com', 1, '2020-12-26 00:20:22', 1),
(10, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-26 00:21:34', 1),
(11, '::1', 'ridhaaf@gmail.com', 1, '2020-12-26 00:28:45', 1),
(12, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-26 00:52:28', 1),
(13, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-26 21:42:13', 1),
(14, '::1', 'ridhaaf@gmail.com', 1, '2020-12-26 21:49:42', 1),
(15, '::1', 'user', NULL, '2020-12-26 22:03:07', 0),
(16, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-26 22:03:13', 1),
(17, '::1', 'ridhaaf@gmail.com', 1, '2020-12-26 22:04:20', 1),
(18, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-26 22:33:21', 1),
(19, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-26 22:57:49', 1),
(20, '::1', 'ridhaaf@gmail.com', 1, '2020-12-28 04:34:34', 1),
(21, '::1', 'ridhaaf@gmail.com', 1, '2020-12-28 08:36:38', 1),
(22, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-28 09:03:49', 1),
(23, '::1', 'ridhaaf@gmail.com', 1, '2020-12-28 09:21:21', 1),
(24, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-28 09:24:44', 1),
(25, '::1', 'admin', NULL, '2020-12-28 10:19:39', 0),
(26, '::1', 'ridhaaf@gmail.com', 1, '2020-12-28 10:19:46', 1),
(27, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-28 10:20:04', 1),
(28, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-28 16:49:21', 1),
(29, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-28 17:50:21', 1),
(30, '::1', 'ridhaaf@gmail.com', 1, '2020-12-28 17:59:57', 1),
(31, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-28 18:40:42', 1),
(32, '::1', 'ridhaaf@gmail.com', 1, '2020-12-29 05:14:36', 1),
(33, '::1', 'user', NULL, '2020-12-29 05:24:03', 0),
(34, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-29 05:24:11', 1),
(35, '::1', 'ridhaaf@gmail.com', 1, '2020-12-29 11:05:19', 1),
(36, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-29 11:06:33', 1),
(37, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-30 00:26:11', 1),
(38, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-30 06:40:50', 1),
(39, '::1', 'ridhaaf@gmail.com', 1, '2020-12-30 09:40:25', 1),
(40, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-30 09:41:19', 1),
(41, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-30 21:50:59', 1),
(42, '::1', 'ridhaaf@gmail.com', 1, '2020-12-30 21:52:35', 1),
(43, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-30 22:18:11', 1),
(44, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-31 00:50:21', 1),
(45, '::1', 'ridhaaf@gmail.com', 1, '2020-12-31 01:18:48', 1),
(46, '::1', 'ridhaaf25@gmail.com', 2, '2020-12-31 01:20:16', 1);

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
(1, 'manage-product', 'Manage All Product'),
(2, 'order-product', 'Order Product');

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
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`) VALUES
(1, 'iPhone'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'Oppo'),
(5, 'Google'),
(6, 'Vivo'),
(7, 'Realme'),
(8, 'OnePlus');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1608958632, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `os` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type`, `slug`, `price`, `os`, `storage`, `cpu`, `ram`, `image`, `id_brand`) VALUES
(1, '12 Mini', '12-mini', 12999000, 'iOS 14', '62', 'Apple A14 Bionic', '4GB', 'iphone-12-mini.png', 1),
(2, 'Galaxy Z Fold 2', 'galaxy-z-fold-2', 31990000, 'Android 10', '16', 'Qualcomm SM8250 Snapdragon 865+', '12GB', 'fold-2.png', 2),
(3, 'Mi 10T Pro 5G', 'mi-10t-pro', 8499000, 'Android 10', '32', 'Qualcomm SM8250 Snapdragon 865', '8GB', 'mi-10t-pro.png', 3),
(4, '12 Pro', '12-pro', 18499000, 'iOS 14', '44', 'Apple A14 Bionic', '6GB', 'iphone-12-pro.png', 1),
(5, 'Reno5 Pro 5G', 'reno5-pro', 8400000, 'Android 11', '128', 'Mediatek MT6889Z Dimensity 1000+', '8GB', 'reno5-pro.png', 4),
(6, 'Redmi Note 9 Pro 5G', 'redmi-note-9-pro-5g', 4499000, 'Android 10', '256GB', 'Qualcomm SM7225 Snapdragon 750G', '8GB', '1609156195_9bf651628e9861fdcc34.png', 3),
(7, '11 Pro Max', '11-pro-max', 21000000, 'iOS 13', '256GB', ' Apple A13 Bionic', '6GB', '1608620776_9e647ab270e1e6102e42.png', 1),
(8, 'Galaxy Flip Z 5G', 'galaxy-flip-z-5g', 20999000, 'Android 10', '256GB', 'Qualcomm SM8250 Snapdragon 865+', '8GB', '1609151842_57806b08c9e4558c356c.png', 2),
(9, 'Pixel 4 XL', 'pixel-4-xl', 9700000, 'Android 10', '128GB', 'Qualcomm SM8150 Snapdragon 855', '6GB', '1609151910_647a3bdc1998bb1e25cf.png', 5),
(10, 'Galaxy Note 20 5G', 'galaxy-note-20-5g', 14999000, 'Android 10', '256GB', 'Qualcomm SM8250 Snapdragon 865+', '8GB', '1609158662_9ece30092a0b6888e32a.png', 2),
(11, 'A53 5G', 'a53-5g', 2999000, 'Android 10', '128GB', 'MediaTek MT6853V Dimensity 720 5G', '6GB', '1609159059_911af53618433697a176.png', 4),
(12, 'Pixel 5', 'pixel-5', 10300000, 'Android 11', '128GB', 'Qualcomm SM7250 Snapdragon 765G', '8GB', '1609200066_76bfcf25b470c05e555f.png', 5),
(13, 'V20 2021', 'v20-2021', 4800000, 'Android 11', '128GB', 'Qualcomm SDM730 Snapdragon 730', '8GB', '1609200400_f51f88f804fe31e00924.png', 6),
(14, 'SE 2020 2nd Gen', 'se-2020-2nd-gen', 7499000, 'iOS 13', '256GB', 'Apple A13 Bionic', '3GB', '1609200949_cfad69ba626d74204d07.png', 1),
(15, 'Q2 Pro', 'q2-pro', 6500000, 'Android 10', '256GB', 'MediaTek Dimensity 800U 5G', '8GB', '1609201308_2b4c7e78cdd7c44bf2c2.png', 7);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  `kurir` varchar(25) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `nama_lengkap`, `alamat`, `kota_tujuan`, `kurir`, `pembayaran`, `id_product`) VALUES
(1, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Bandung', 'JNE', 'Transfer Bank', 1),
(2, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Jakarta', 'TIKI', 'Kartu Kredit', 10),
(3, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Bandung', 'POS INDONESIA', 'Indomaret', 3),
(4, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Jakarta', 'JNE', 'Alfamart', 9),
(5, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Bandung', 'JNE', 'OVO', 8),
(6, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Jakarta', 'TIKI', 'Kartu Kredit', 6),
(7, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Bandung', 'POS INDONESIA', 'Kartu Kredit', 3),
(8, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Jakarta', 'JNE', 'Transfer Bank', 11),
(15, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Makassar', 'TIKI', 'Indomaret', 12),
(17, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Balikpapan', 'TIKI', 'OVO', 8),
(18, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Denpasar', 'POS INDONESIA', 'Kartu Kredit', 13),
(19, 'Ridha Ahmad Firdaus', 'Jl. Melati', 'Malang', 'JNE', 'OVO', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ridhaaf@gmail.com', 'admin', '$2y$10$Z/D23R3ZHiv7ZicLMEh0qedonBOK/QGY0Fbijzy70SjfOYirVoV1a', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-26 00:12:11', '2020-12-26 00:12:11', NULL),
(2, 'ridhaaf25@gmail.com', 'user', '$2y$10$r1BF417wH7mDJnFNYgq/S.NmXYMEP.05nsDu/ktYikfY/wF5DAmgS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-26 00:12:49', '2020-12-26 00:12:49', NULL),
(3, 'kangibing@gmail.com', 'kangibing', '$2y$10$jYXnffO9eyJhtChZfWx/oOTLV2tNKoufy8V8SVilUPesTjf/IPmDO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-26 00:16:00', '2020-12-26 00:16:00', NULL);

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
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_product` (`id_product`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
