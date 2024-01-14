-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 12:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scout-reprezentacija-ba`
--

-- --------------------------------------------------------

--
-- Table structure for table `users__nat_team_data`
--

CREATE TABLE `users__nat_team_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `no_games` int(11) NOT NULL DEFAULT 0,
  `goals` int(11) NOT NULL DEFAULT 0,
  `assistance` int(11) NOT NULL DEFAULT 0,
  `minutes` int(11) NOT NULL DEFAULT 0,
  `red_cards` int(11) NOT NULL DEFAULT 0,
  `yellow_cards` int(11) NOT NULL DEFAULT 0,
  `without_goal` int(11) DEFAULT NULL,
  `no_invitations` int(11) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users__nat_team_data`
--

INSERT INTO `users__nat_team_data` (`id`, `user_id`, `season`, `season_name`, `country_id`, `category`, `no_games`, `goals`, `assistance`, `minutes`, `red_cards`, `yellow_cards`, `without_goal`, `no_invitations`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 25, '2024 / 2025', 'UEFA EURO Cup 2024 qualifying', 141, NULL, 6, 4, 0, 462, 0, 1, NULL, 0, NULL, '2024-01-13 10:56:52', '2024-01-13 10:56:52'),
(2, 25, '2022 / 2023', 'FIFA World Cup 2022', 5, 16, 4, 3, 1, 183, 0, 0, NULL, 0, NULL, '2024-01-13 10:56:52', '2024-01-13 13:06:50'),
(3, 25, '2022 / 2023', 'UEFA Nations League 2022-23', 141, NULL, 7, 3, 0, 471, 0, 1, NULL, 0, NULL, '2024-01-13 10:56:52', '2024-01-13 10:56:52'),
(4, 25, '2022 / 2023', 'FIFA World Cup Qualification 2022 UEFA', 141, NULL, 7, 2, 1, 492, 0, 0, NULL, 0, NULL, '2024-01-13 10:56:52', '2024-01-13 10:56:52'),
(5, 25, '2020 / 2021', 'UEFA Nations League 2020-21', 141, NULL, 2, 1, 0, 107, 0, 0, NULL, 0, NULL, '2024-01-13 10:56:52', '2024-01-13 10:56:52'),
(6, 25, '2021 / 2022', 'UEFA EURO Cup 2021', 141, NULL, 6, 3, 0, 451, 0, 0, NULL, 0, NULL, '2024-01-13 10:56:52', '2024-01-13 10:56:52'),
(7, 27, '2024 / 2025', 'UEFA EURO Cup 2024 qualifying', 21, NULL, 7, 1, 0, 552, 0, 1, NULL, 0, NULL, '2024-01-13 10:56:53', '2024-01-13 10:56:53'),
(8, 27, '2022 / 2023', 'UEFA Nations League 2022-23', 21, NULL, 6, 3, 2, 414, 0, 1, NULL, 0, NULL, '2024-01-13 10:56:53', '2024-01-13 10:56:53'),
(9, 27, '2022 / 2023', 'FIFA World Cup Qualification 2022 UEFA', 21, NULL, 6, 1, 1, 540, 0, 1, NULL, 0, NULL, '2024-01-13 10:56:53', '2024-01-13 10:56:53'),
(10, 27, '2020 / 2021', 'UEFA Nations League 2020-21', 21, NULL, 4, 1, 0, 207, 0, 0, NULL, 0, NULL, '2024-01-13 10:56:53', '2024-01-13 10:56:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users__nat_team_data`
--
ALTER TABLE `users__nat_team_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users__nat_team_data`
--
ALTER TABLE `users__nat_team_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
