-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 03:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `status`, `location`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'a@a.com', NULL, '$2y$10$zSPpHUg6sKyCAXLP8G4/KuJtj.pBECCkToJrsO6EP.UFA1k8qfdoe', 'ADMIN', 1, 'http://127.0.0.1:8000/storage/newspic/1594911022.jpeg', NULL, '2020-07-03 05:57:41', '2020-07-16 08:50:22'),
(2, 'sub admin', 'a@b.com', NULL, '$2y$10$QE7OHiYjWwYK5DKQwkVJZuHuhUJaUay0s.eoOb5PTO8WkgadbYMUS', 'SUBADMIN', 1, '', NULL, '2020-07-03 05:59:35', '2020-07-03 06:12:00'),
(3, 'user', 'a@c.com', NULL, '$2y$10$NNi3GWn8URCUBVgkX2Uus./4/RckQV9Y8N/Fv2TGGo0Ss0aXElc4K', 'NORMAL', 1, 'http://127.0.0.1:8000/storage/newspic/1594922791.png', NULL, '2020-07-03 06:00:09', '2020-07-16 12:06:32'),
(4, 'sdf', 'a@a.dd', NULL, '$2y$10$jvxVxZX9pHiuSi6YQaM1R.6mDdM34Bs4a9ijXFOP9KDWVzdEabyoW', 'ADMIN', 1, '', NULL, '2020-07-03 06:25:14', '2020-07-03 06:59:24'),
(7, 'anuva', 'afroza.akhi78@gmail.com', NULL, '$2y$10$rxT5mL/JjbuIqk2RF08e6u6KPWnogVhR6gWLcRJi3rmaYg3THkoCy', 'NORMAL', NULL, 'http://127.0.0.1:8000/storage/newspic/1594935447.png', 'HLOwqYxAZ7uXpzaGYSsYyBENQm3mduq7RQclcGY62DRQqWy9nbJbJGxSM0xz', '2020-07-16 15:27:46', '2020-07-16 15:37:28');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
