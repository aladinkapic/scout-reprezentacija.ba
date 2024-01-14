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
-- Table structure for table `users__club_data`
--

CREATE TABLE `users__club_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `no_games` int(11) NOT NULL DEFAULT 0,
  `goals` int(11) NOT NULL DEFAULT 0,
  `assistance` int(11) NOT NULL DEFAULT 0,
  `minutes` int(11) NOT NULL DEFAULT 0,
  `red_cards` int(11) NOT NULL DEFAULT 0,
  `yellow_cards` int(11) NOT NULL DEFAULT 0,
  `without_goal` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users__club_data`
--

INSERT INTO `users__club_data` (`id`, `user_id`, `season`, `season_name`, `club_id`, `no_games`, `goals`, `assistance`, `minutes`, `red_cards`, `yellow_cards`, `without_goal`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 25, '2023 / 2024', 'SPAIN: Copa del Rey 2023-24', 2224, 1, 0, 0, 15, 0, 0, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(2, 25, '2023 / 2024', 'UEFA Champions League 2023-24', 2224, 6, 5, 1, 444, 0, 1, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(3, 25, '2023 / 2024', 'SPAIN: La Liga 2023-24', 2224, 18, 12, 1, 1272, 0, 2, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(4, 25, '2022 / 2023', 'SPAIN: Copa del Rey 2022-23', 2224, 4, 2, 1, 293, 0, 1, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(5, 25, '2022 / 2023', 'UEFA Champions League 2022-23', 2224, 5, 0, 0, 297, 0, 0, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(6, 25, '2022 / 2023', 'SPAIN: La Liga 2022-23', 2224, 36, 13, 2, 1905, 0, 4, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(7, 25, '2022 / 2023', 'ITALY: Serie A 2022-23', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(8, 25, '2021 / 2022', 'ITALY: Coppa Italia 2021-22', NULL, 5, 1, 0, 284, 0, 0, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(9, 25, '2021 / 2022', 'UEFA Champions League 2021-22', NULL, 7, 2, 0, 522, 0, 0, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(10, 25, '2021 / 2022', 'ITALY: Serie A 2021-22', NULL, 35, 9, 7, 2310, 0, 5, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(11, 25, '2020 / 2021', 'UEFA Champions League 2020-21', NULL, 8, 6, 1, 598, 0, 1, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(12, 25, '2020 / 2021', 'ITALY: Serie A 2020-21', NULL, 32, 11, 9, 2018, 1, 3, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(13, 25, '2020 / 2021', 'SPAIN: La Liga 2020-21', 2224, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(14, 25, '2019 / 2020', 'UEFA Champions League 2019-20', 2224, 8, 3, 1, 485, 0, 3, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(15, 25, '2019 / 2020', 'ENGLAND: Premier League 2019-20', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(16, 25, '2019 / 2020', 'SPAIN: La Liga 2019-20', 2224, 34, 12, 2, 2105, 0, 5, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(17, 25, '2018 / 2019', 'SPAIN: La Liga 2018-19', 2224, 15, 6, 1, 1089, 0, 5, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(18, 25, '2018 / 2019', 'ENGLAND: Premier League 2018-19', NULL, 16, 5, 0, 943, 0, 3, NULL, NULL, '2024-01-14 09:37:14', '2024-01-14 09:37:14'),
(19, 27, '2023 / 2024', 'UEFA Europa Conference League 2023-24', 7199, 2, 2, 0, 102, 0, 0, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:38:46'),
(20, 27, '2023 / 2024', 'TURKEY: Süper Lig 2023-24', NULL, 18, 16, 2, 1421, 0, 2, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(21, 27, '2023 / 2024', 'UEFA EURO Cup 2024 qualifying', 7199, 7, 1, 0, 552, 0, 1, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:39:17'),
(22, 27, '2022 / 2023', 'ITALY: Coppa Italia 2022-23', NULL, 5, 0, 0, 267, 0, 0, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(23, 27, '2022 / 2023', 'UEFA Champions League 2022-23', NULL, 13, 4, 1, 831, 0, 2, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(24, 27, '2022 / 2023', 'ITALY: Serie A 2022-23', NULL, 33, 9, 3, 1727, 0, 3, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(25, 27, '2022 / 2023', 'UEFA Nations League 2022-23', NULL, 6, 3, 2, 414, 0, 1, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(26, 27, '2021 / 2022', 'ITALY: Coppa Italia 2021-22', NULL, 5, 1, 1, 282, 0, 0, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(27, 27, '2021 / 2022', 'UEFA Champions League 2021-22', NULL, 7, 3, 1, 541, 0, 0, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(28, 27, '2021 / 2022', 'ITALY: Serie A 2021-22', NULL, 36, 13, 5, 2476, 0, 2, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(29, 27, '2022 / 2023', 'FIFA World Cup Qualification 2022 UEFA', NULL, 6, 1, 1, 540, 0, 1, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(30, 27, '2020 / 2021', 'UEFA Europa League 2020-21', 7191, 10, 6, 1, 569, 0, 2, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(31, 27, '2020 / 2021', 'UEFA Nations League 2020-21', NULL, 4, 1, 0, 207, 0, 0, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(32, 27, '2020 / 2021', 'ITALY: Serie A 2020-21', 7191, 27, 7, 4, 1829, 0, 2, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(33, 27, '2019 / 2020', 'UEFA Europa League 2019-20', 7191, 8, 3, 1, 686, 0, 0, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(34, 27, '2019 / 2020', 'ITALY: Serie A 2019-20', 7191, 35, 16, 7, 2853, 0, 4, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15'),
(35, 27, '2018 / 2019', 'ITALY: Serie A 2018-19', 7191, 33, 9, 6, 2576, 0, 9, NULL, NULL, '2024-01-14 09:37:15', '2024-01-14 09:37:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users__club_data`
--
ALTER TABLE `users__club_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users__club_data`
--
ALTER TABLE `users__club_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
