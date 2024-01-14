-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 12:33 PM
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
-- Table structure for table `api__countries`
--

CREATE TABLE `api__countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ba` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_ba` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api__countries`
--

INSERT INTO `api__countries` (`id`, `name`, `name_ba`, `short_ba`, `code`, `flag`, `phone_code`, `created_at`, `updated_at`) VALUES
(1, 'Albania', 'Albanija', 'ALB', 'AL', 'AL.svg', '+355', '2023-06-11 12:05:30', '2024-01-13 09:13:46'),
(2, 'Algeria', 'Alžir', 'DZA', 'DZ', 'DZ.svg', '+213', '2023-06-11 12:05:30', '2024-01-13 09:13:47'),
(3, 'Andorra', 'Andora', 'AND', 'AD', 'AD.svg', '+376', '2023-06-11 12:05:30', '2024-01-13 09:13:47'),
(4, 'Angola', 'Angola', 'AGO', 'AO', 'AO.svg', '+244', '2023-06-11 12:05:30', '2024-01-13 09:13:47'),
(5, 'Argentina', 'Argentina', 'ARG', 'AR', 'AR.svg', '+54', '2023-06-11 12:05:30', '2024-01-13 09:13:48'),
(6, 'Armenia', 'Armenia', 'ARM', 'AM', 'AM.svg', '+374', '2023-06-11 12:05:30', '2024-01-13 09:13:48'),
(7, 'Aruba', 'Aruba', 'ABW', 'AW', 'AW.svg', '+297', '2023-06-11 12:05:30', '2024-01-13 09:13:48'),
(8, 'Australia', 'Australija', 'AUS', 'AU', 'AU.svg', '+61', '2023-06-11 12:05:30', '2024-01-13 09:13:48'),
(9, 'Austria', 'Austrija', 'AUT', 'AT', 'AT.svg', '+43', '2023-06-11 12:05:30', '2024-01-13 09:13:48'),
(10, 'Azerbaidjan', 'Azerbejdžan', 'AZE', 'AZ', 'AZ.svg', '+994', '2023-06-11 12:05:30', '2024-01-13 09:13:49'),
(11, 'Bahrain', 'Bahrein', 'BHR', 'BH', 'BH.svg', '+973', '2023-06-11 12:05:30', '2024-01-13 09:13:49'),
(12, 'Bangladesh', 'Bangladeš', 'BGD', 'BD', 'BD.svg', '+880', '2023-06-11 12:05:30', '2024-01-13 09:13:49'),
(13, 'Barbados', 'Barbados', 'BRB', 'BB', 'BB.svg', '+1-246', '2023-06-11 12:05:30', '2024-01-13 09:13:49'),
(14, 'Belarus', 'Bjelorusija', 'BLR', 'BY', 'BY.svg', '+375', '2023-06-11 12:05:30', '2024-01-13 09:13:49'),
(15, 'Belgium', 'Belgija', 'BEL', 'BE', 'BE.svg', '+32', '2023-06-11 12:05:30', '2024-01-13 09:13:49'),
(16, 'Belize', 'Belize', 'BLZ', 'BZ', 'BZ.svg', '+501', '2023-06-11 12:05:30', '2024-01-13 09:13:50'),
(17, 'Benin', 'Benin', 'BEN', 'BJ', 'BJ.svg', '+229', '2023-06-11 12:05:30', '2024-01-13 09:13:50'),
(18, 'Bermuda', 'Bermuda', 'BMU', 'BM', 'BM.svg', '+1-441', '2023-06-11 12:05:30', '2024-01-13 09:13:50'),
(19, 'Bhutan', 'Butan', 'BTN', 'BT', 'BT.svg', '+975', '2023-06-11 12:05:30', '2024-01-13 09:13:50'),
(20, 'Bolivia', 'Bolivija', 'BOL', 'BO', 'BO.svg', '+591', '2023-06-11 12:05:30', '2024-01-13 09:13:51'),
(21, 'Bosnia', 'Bosna i Hercegovina', 'BiH', 'BA', 'BA.png', '+387', '2023-06-11 12:05:30', '2024-01-13 09:13:51'),
(22, 'Botswana', 'Bocvana', 'BWA', 'BW', 'BW.svg', '+267', '2023-06-11 12:05:30', '2024-01-13 09:13:51'),
(23, 'Brazil', 'Brazil', 'BRA', 'BR', 'BR.svg', '+55', '2023-06-11 12:05:30', '2024-01-13 09:13:51'),
(24, 'Bulgaria', 'Bugarska', 'BGR', 'BG', 'BG.svg', '+359', '2023-06-11 12:05:30', '2024-01-13 09:13:51'),
(25, 'Burkina-Faso', 'Burkina Faso', 'BFA', 'BF', 'BF.svg', '+226', '2023-06-11 12:05:30', '2024-01-13 09:13:52'),
(26, 'Burundi', 'Burundi', 'BDI', 'BI', 'BI.svg', '+257', '2023-06-11 12:05:30', '2024-01-13 09:13:52'),
(27, 'Cambodia', 'Kambodža', 'KHM', 'KH', 'KH.svg', '+855', '2023-06-11 12:05:30', '2024-01-13 09:13:52'),
(28, 'Cameroon', 'Kamerun', 'CMR', 'CM', 'CM.svg', '+237', '2023-06-11 12:05:30', '2024-01-13 09:13:52'),
(29, 'Canada', 'Kanada', 'CAN', 'CA', 'CA.svg', '+1', '2023-06-11 12:05:30', '2024-01-13 09:13:52'),
(30, 'Chile', 'Čile', 'CHL', 'CL', 'CL.svg', '+56', '2023-06-11 12:05:30', '2024-01-13 09:13:53'),
(31, 'China', 'Kina', 'CHN', 'CN', 'CN.svg', '+86', '2023-06-11 12:05:30', '2024-01-13 09:13:53'),
(32, 'Chinese-Taipei', 'Tajvan', 'TWN', 'TW', 'TW.svg', '+886', '2023-06-11 12:05:30', '2024-01-13 09:13:53'),
(33, 'Colombia', 'Kolumbija', 'COL', 'CO', 'CO.svg', '+57', '2023-06-11 12:05:30', '2024-01-13 09:13:53'),
(34, 'Congo', 'Demokratska Republika Kongo', 'COG', 'CD', 'CD.svg', '+243', '2023-06-11 12:05:30', '2024-01-13 09:13:53'),
(35, 'Congo-DR', 'Demokratska Republika Kongo', 'COD', 'CG', 'CG.svg', '+243', '2023-06-11 12:05:30', '2024-01-13 09:13:53'),
(36, 'Costa-Rica', 'Kostarika', 'CRI', 'CR', 'CR.svg', '+506', '2023-06-11 12:05:30', '2024-01-13 09:13:54'),
(37, 'Crimea', 'Krim', NULL, 'UA', 'UA.svg', '+380', '2023-06-11 12:05:30', '2024-01-13 09:13:54'),
(38, 'Croatia', 'Hrvatska', 'HRV', 'HR', 'HR.svg', '+385', '2023-06-11 12:05:30', '2024-01-13 09:13:54'),
(39, 'Cuba', 'Kuba', 'CUB', 'CU', 'CU.svg', '+53', '2023-06-11 12:05:30', '2024-01-13 09:13:54'),
(40, 'Curacao', 'Kurasao', 'CUW', 'CW', 'CW.svg', '+599', '2023-06-11 12:05:30', '2024-01-13 09:13:54'),
(41, 'Cyprus', 'Kipar', 'CYP', 'CY', 'CY.svg', '+357', '2023-06-11 12:05:30', '2024-01-13 09:13:55'),
(42, 'Czech-Republic', 'Češka', 'CZE', 'CZ', 'CZ.svg', '+420', '2023-06-11 12:05:30', '2024-01-13 09:13:55'),
(43, 'Denmark', 'Danska', 'DNK', 'DK', 'DK.svg', '+45', '2023-06-11 12:05:30', '2024-01-13 09:13:55'),
(44, 'Dominican-Republic', 'Dominikanska Republika', 'DOM', 'DO', 'DO.svg', '+1-809', '2023-06-11 12:05:30', '2024-01-13 09:13:55'),
(45, 'Ecuador', 'Ekvador', 'ECU', 'EC', 'EC.svg', '+593', '2023-06-11 12:05:30', '2024-01-13 09:13:56'),
(46, 'Egypt', 'Egipat', 'EGY', 'EG', 'EG.svg', '+20', '2023-06-11 12:05:30', '2024-01-13 09:13:56'),
(47, 'El-Salvador', 'Salvador', 'SLV', 'SV', 'SV.svg', '+503', '2023-06-11 12:05:30', '2024-01-13 09:13:56'),
(48, 'England', 'Velika Britanija', 'GBR', 'GB', 'GB.svg', '+44', '2023-06-11 12:05:30', '2024-01-13 09:13:56'),
(49, 'Estonia', 'Estonija', 'EST', 'EE', 'EE.svg', '+372', '2023-06-11 12:05:30', '2024-01-13 09:13:56'),
(50, 'Eswatini', 'Svazilend', 'SWZ', 'SZ', 'SZ.svg', '+268', '2023-06-11 12:05:30', '2024-01-13 09:13:57'),
(51, 'Ethiopia', 'Etiopija', 'ETH', 'ET', 'ET.svg', '+251', '2023-06-11 12:05:30', '2024-01-13 09:13:57'),
(52, 'Faroe-Islands', 'Frska Ostrva', 'FLK', 'FO', 'FO.svg', '+298', '2023-06-11 12:05:30', '2024-01-13 09:13:57'),
(53, 'Fiji', 'Fidži', 'FJI', 'FJ', 'FJ.svg', '+679', '2023-06-11 12:05:30', '2024-01-13 09:13:57'),
(54, 'Finland', 'Finska', 'FIN', 'FI', 'FI.svg', '+358', '2023-06-11 12:05:30', '2024-01-13 09:13:57'),
(55, 'France', 'Francuska', 'FRA', 'FR', 'FR.svg', '+33', '2023-06-11 12:05:30', '2024-01-13 09:13:58'),
(56, 'Gabon', 'Gabon', 'GAB', 'GA', 'GA.svg', '+241', '2023-06-11 12:05:30', '2024-01-13 09:13:58'),
(57, 'Gambia', 'Gambija', 'GMB', 'GM', 'GM.svg', '+220', '2023-06-11 12:05:30', '2024-01-13 09:13:58'),
(58, 'Georgia', 'Gruzija', 'GEO', 'GE', 'GE.svg', '+995', '2023-06-11 12:05:30', '2024-01-13 09:13:58'),
(59, 'Germany', 'Njemačka', 'DEU', 'DE', 'DE.svg', '+49', '2023-06-11 12:05:30', '2024-01-13 09:13:58'),
(60, 'Ghana', 'Gana', 'GHA', 'GH', 'GH.svg', '+233', '2023-06-11 12:05:30', '2024-01-13 09:13:59'),
(61, 'Gibraltar', 'Gibraltar', 'GIB', 'GI', 'GI.svg', '+350', '2023-06-11 12:05:30', '2024-01-13 09:13:59'),
(62, 'Greece', 'Grčka', 'GRC', 'GR', 'GR.svg', '+30', '2023-06-11 12:05:30', '2024-01-13 09:13:59'),
(63, 'Guadeloupe', 'Gvadalupe', 'GLP', 'GP', 'GP.svg', '+590', '2023-06-11 12:05:30', '2024-01-13 09:13:59'),
(64, 'Guatemala', 'Gvatemala', 'GTM', 'GT', 'GT.svg', '+502', '2023-06-11 12:05:30', '2024-01-13 09:13:59'),
(65, 'Guinea', 'Gvineja', 'GIN', 'GN', 'GN.svg', '+224', '2023-06-11 12:05:30', '2024-01-13 09:14:00'),
(66, 'Haiti', 'Haiti', 'HTI', 'HT', 'HT.svg', '+509\n', '2023-06-11 12:05:30', '2024-01-13 09:14:00'),
(67, 'Honduras', 'Honduras', 'HND', 'HN', 'HN.svg', '+504', '2023-06-11 12:05:30', '2024-01-13 09:14:00'),
(68, 'Hong-Kong', 'Hong Kong', 'HKG', 'HK', 'HK.svg', '+852', '2023-06-11 12:05:30', '2024-01-13 09:14:00'),
(69, 'Hungary', 'Mađarska', 'HUN', 'HU', 'HU.svg', '+36', '2023-06-11 12:05:30', '2024-01-13 09:14:00'),
(70, 'Iceland', 'Island', 'ISL', 'IS', 'IS.svg', '+354', '2023-06-11 12:05:30', '2024-01-13 09:14:00'),
(71, 'India', 'Indija', 'IND', 'IN', 'IN.svg', '+91', '2023-06-11 12:05:30', '2024-01-13 09:14:01'),
(72, 'Indonesia', 'Indonezija', 'IDN', 'ID', 'ID.svg', '+62', '2023-06-11 12:05:30', '2024-01-13 09:14:01'),
(73, 'Iran', 'Iran', 'IRN', 'IR', 'IR.svg', '+98', '2023-06-11 12:05:30', '2024-01-13 09:14:01'),
(74, 'Iraq', 'Irak', 'IRQ', 'IQ', 'IQ.svg', '+964', '2023-06-11 12:05:30', '2024-01-13 09:14:01'),
(75, 'Ireland', 'Irska', 'IRL', 'IE', 'IE.svg', '+353', '2023-06-11 12:05:30', '2024-01-13 09:14:01'),
(76, 'Israel', 'Izrael', 'ISR', 'IL', 'IL.svg', '+972', '2023-06-11 12:05:30', '2024-01-13 09:14:02'),
(77, 'Italy', 'Italija', 'ITA', 'IT', 'IT.svg', '+39', '2023-06-11 12:05:30', '2024-01-13 09:14:02'),
(78, 'Ivory-Coast', 'Obala Slonovače', 'CIV', 'CI', 'CI.svg', '+225', '2023-06-11 12:05:30', '2024-01-13 09:14:02'),
(79, 'Jamaica', 'Jamajka', 'JAM', 'JM', 'JM.svg', '+1-876', '2023-06-11 12:05:30', '2024-01-13 09:14:02'),
(80, 'Japan', 'Japan', 'JPN', 'JP', 'JP.svg', '+81', '2023-06-11 12:05:30', '2024-01-13 09:14:02'),
(81, 'Jordan', 'Jordan', 'JOR', 'JO', 'JO.svg', '+962', '2023-06-11 12:05:30', '2024-01-13 09:14:03'),
(82, 'Kazakhstan', 'Kazahstan', 'KAZ', 'KZ', 'KZ.svg', '+7', '2023-06-11 12:05:30', '2024-01-13 09:14:03'),
(83, 'Kenya', 'Kenija', 'KEN', 'KE', 'KE.svg', '+254', '2023-06-11 12:05:30', '2024-01-13 09:14:03'),
(84, 'Kosovo', 'Kosovo', 'XK', 'XK', 'XK.svg', '+383', '2023-06-11 12:05:30', '2024-01-13 09:14:03'),
(85, 'Kuwait', 'Kuvajt', 'KWT', 'KW', 'KW.svg', '+965', '2023-06-11 12:05:30', '2024-01-13 09:14:03'),
(86, 'Kyrgyzstan', 'Kirgistan', 'KGZ', 'KG', 'KG.svg', '+996', '2023-06-11 12:05:30', '2024-01-13 09:14:04'),
(87, 'Laos', 'Laos', 'LAO', 'LA', 'LA.svg', '+856', '2023-06-11 12:05:30', '2024-01-13 09:14:04'),
(88, 'Latvia', 'Latvija', 'LVA', 'LV', 'LV.svg', '+371', '2023-06-11 12:05:30', '2024-01-13 09:14:04'),
(89, 'Lebanon', 'Liban', 'LBN', 'LB', 'LB.svg', '+961', '2023-06-11 12:05:30', '2024-01-13 09:14:04'),
(90, 'Lesotho', 'Lesoto', 'LSO', 'LS', 'LS.svg', '+266', '2023-06-11 12:05:30', '2024-01-13 09:14:04'),
(91, 'Liberia', 'Liberija', 'LBR', 'LR', 'LR.svg', '+231', '2023-06-11 12:05:30', '2024-01-13 09:14:05'),
(92, 'Libya', 'Libija', 'LBY', 'LY', 'LY.svg', '+218', '2023-06-11 12:05:30', '2024-01-13 09:14:05'),
(93, 'Liechtenstein', 'Lihtenštajn', 'LIE', 'LI', 'LI.svg', '+423', '2023-06-11 12:05:30', '2024-01-13 09:14:05'),
(94, 'Lithuania', 'Litvanija', 'LTU', 'LT', 'LT.svg', '+370', '2023-06-11 12:05:30', '2024-01-13 09:14:05'),
(95, 'Luxembourg', 'Luksemburg', 'LUX', 'LU', 'LU.svg', '+352', '2023-06-11 12:05:30', '2024-01-13 09:14:05'),
(96, 'Macao', 'Makao', 'MAC', 'MO', 'MO.svg', '+853', '2023-06-11 12:05:30', '2024-01-13 09:14:06'),
(97, 'Macedonia', 'Makedonija', 'MKD', 'MK', 'MK.svg', '+389', '2023-06-11 12:05:30', '2024-01-13 09:14:06'),
(98, 'Malawi', 'Malavi', 'MWI', 'MW', 'MW.svg', '+265', '2023-06-11 12:05:30', '2024-01-13 09:14:06'),
(99, 'Malaysia', 'Malezija', 'MYS', 'MY', 'MY.svg', '+60', '2023-06-11 12:05:30', '2024-01-13 09:14:06'),
(100, 'Maldives', 'Maldivi', 'MDV', 'MV', 'MV.svg', '+960', '2023-06-11 12:05:30', '2024-01-13 09:14:06'),
(101, 'Mali', 'Mali', 'MLI', 'ML', 'ML.svg', '+223', '2023-06-11 12:05:30', '2024-01-13 09:14:06'),
(102, 'Malta', 'Malta', 'MLT', 'MT', 'MT.svg', '+356', '2023-06-11 12:05:30', '2024-01-13 09:14:07'),
(103, 'Mauritania', 'Mauritanija', 'MRT', 'MR', 'MR.svg', '+222', '2023-06-11 12:05:30', '2024-01-13 09:14:07'),
(104, 'Mauritius', 'Mauricijus', 'MUS', 'MU', 'MU.svg', '+230', '2023-06-11 12:05:30', '2024-01-13 09:14:07'),
(105, 'Mexico', 'Meksiko', 'MEX', 'MX', 'MX.svg', '+52', '2023-06-11 12:05:30', '2024-01-13 09:14:08'),
(106, 'Moldova', 'Moldavija', 'MDA', 'MD', 'MD.svg', '+373', '2023-06-11 12:05:30', '2024-01-13 09:14:08'),
(107, 'Mongolia', 'Mongolija', 'MNG', 'MN', 'MN.svg', '+976', '2023-06-11 12:05:30', '2024-01-13 09:14:08'),
(108, 'Montenegro', 'Crna Gora', 'MNE', 'ME', 'ME.svg', '+382', '2023-06-11 12:05:30', '2024-01-13 09:14:08'),
(109, 'Morocco', 'Maroko', 'MAR', 'MA', 'MA.svg', '+212', '2023-06-11 12:05:30', '2024-01-13 09:14:08'),
(110, 'Myanmar', 'Mijanmar', 'MMR', 'MM', 'MM.svg', '+95', '2023-06-11 12:05:30', '2024-01-13 09:14:09'),
(111, 'Namibia', 'Namibija', 'NAM', 'NA', 'NA.svg', '+264', '2023-06-11 12:05:30', '2024-01-13 09:14:09'),
(112, 'Nepal', 'Nepal', 'NPL', 'NP', 'NP.svg', '+977', '2023-06-11 12:05:30', '2024-01-13 09:14:09'),
(113, 'Netherlands', 'Holandija', 'NLD', 'NL', 'NL.svg', '+31', '2023-06-11 12:05:30', '2024-01-13 09:14:09'),
(114, 'New-Zealand', 'Novi Zeland', 'NZL', 'NZ', 'NZ.svg', '+64', '2023-06-11 12:05:30', '2024-01-13 09:14:09'),
(115, 'Nicaragua', 'Nikaragva', 'NIC', 'NI', 'NI.svg', '+505', '2023-06-11 12:05:30', '2024-01-13 09:14:10'),
(116, 'Nigeria', 'Nigerija', 'NGA', 'NG', 'NG.svg', '+234', '2023-06-11 12:05:30', '2024-01-13 09:14:10'),
(117, 'Norway', 'Norveška', 'NOR', 'NO', 'NO.svg', '+47', '2023-06-11 12:05:30', '2024-01-13 09:14:10'),
(118, 'Oman', 'Oman', 'OMN', 'OM', 'OM.svg', '+968', '2023-06-11 12:05:30', '2024-01-13 09:14:10'),
(119, 'Pakistan', 'Pakistan', 'PAK', 'PK', 'PK.svg', '+92', '2023-06-11 12:05:30', '2024-01-13 09:14:10'),
(120, 'Palestine', 'Palestina', 'PSE', 'PS', 'PS.svg', '+970', '2023-06-11 12:05:30', '2024-01-13 09:14:11'),
(121, 'Panama', 'Panama', 'PAN', 'PA', 'PA.svg', '+507', '2023-06-11 12:05:30', '2024-01-13 09:14:11'),
(122, 'Paraguay', 'Paragvaj', 'PRY', 'PY', 'PY.svg', '+595', '2023-06-11 12:05:30', '2024-01-13 09:14:11'),
(123, 'Peru', 'Peru', 'PER', 'PE', 'PE.svg', '+51', '2023-06-11 12:05:30', '2024-01-13 09:14:11'),
(124, 'Philippines', 'Filipini', 'PHL', 'PH', 'PH.svg', '+63', '2023-06-11 12:05:30', '2024-01-13 09:14:11'),
(125, 'Poland', 'Poljska', 'POL', 'PL', 'PL.svg', '+48', '2023-06-11 12:05:30', '2024-01-13 09:14:12'),
(126, 'Portugal', 'Portugal', 'PRT', 'PT', 'PT.svg', '+351', '2023-06-11 12:05:30', '2024-01-13 09:14:12'),
(127, 'Qatar', 'Katar', 'QAT', 'QA', 'QA.svg', '+974', '2023-06-11 12:05:30', '2024-01-13 09:14:12'),
(128, 'Romania', 'Rumunija', 'ROU', 'RO', 'RO.svg', '+40', '2023-06-11 12:05:30', '2024-01-13 09:14:12'),
(129, 'Russia', 'Rusija', 'RUS	', 'RU', 'RU.svg', '+7', '2023-06-11 12:05:30', '2024-01-13 09:14:12'),
(130, 'Rwanda', 'Ruanda', 'RWA', 'RW', 'RW.svg', '+250', '2023-06-11 12:05:30', '2024-01-13 09:14:13'),
(131, 'San-Marino', 'San Marino', 'SMR', 'SM', 'SM.svg', '+378', '2023-06-11 12:05:30', '2024-01-13 09:14:13'),
(132, 'Saudi-Arabia', 'Saudijska Arabija', 'SAU', 'SA', 'SA.svg', '+966', '2023-06-11 12:05:30', '2024-01-13 09:14:13'),
(133, 'Senegal', 'Senegal', 'SEN', 'SN', 'SN.svg', '+221', '2023-06-11 12:05:30', '2024-01-13 09:14:13'),
(134, 'Serbia', 'Srbija', 'SRB', 'RS', 'RS.svg', '+381', '2023-06-11 12:05:30', '2024-01-13 09:14:13'),
(135, 'Singapore', 'Singapur', 'SGP', 'SG', 'SG.svg', '+65', '2023-06-11 12:05:30', '2024-01-13 09:14:14'),
(136, 'Slovakia', 'Slovačka', 'SVK', 'SK', 'SK.svg', '+421', '2023-06-11 12:05:30', '2024-01-13 09:14:14'),
(137, 'Slovenia', 'Slovenija', 'SVN', 'SI', 'SI.svg', '+386', '2023-06-11 12:05:30', '2024-01-13 09:14:14'),
(138, 'Somalia', 'Somalija', 'SOM', 'SO', 'SO.svg', '+252', '2023-06-11 12:05:30', '2024-01-13 09:14:14'),
(139, 'South-Africa', 'Južnoafrička Republika', 'ZAF', 'ZA', 'ZA.svg', '+27', '2023-06-11 12:05:30', '2024-01-13 09:14:14'),
(140, 'South-Korea', 'Južna Koreja', 'KOR', 'KR', 'KR.svg', '+82', '2023-06-11 12:05:30', '2024-01-13 09:14:15'),
(141, 'Spain', 'Španija', 'ESP', 'ES', 'ES.svg', '+34', '2023-06-11 12:05:30', '2024-01-13 09:14:15'),
(142, 'Sudan', 'Sudan', 'SDN', 'SD', 'SD.svg', '+249', '2023-06-11 12:05:30', '2024-01-13 09:14:15'),
(143, 'Surinam', 'Surinam', 'SUR', 'SR', 'SR.svg', '+597', '2023-06-11 12:05:30', '2024-01-13 09:14:15'),
(144, 'Sweden', 'Švedska', 'SWE', 'SE', 'SE.svg', '+46', '2023-06-11 12:05:30', '2024-01-13 09:14:15'),
(145, 'Switzerland', 'Švicarska', 'CHE', 'CH', 'CH.svg', '+41', '2023-06-11 12:05:30', '2024-01-13 09:14:16'),
(146, 'Syria', 'Sirija', 'SYR', 'SY', 'SY.svg', '+963', '2023-06-11 12:05:30', '2024-01-13 09:14:16'),
(147, 'Tajikistan', 'Tadžikistan', 'TJK', 'TJ', 'TJ.svg', '+992', '2023-06-11 12:05:30', '2024-01-13 09:14:16'),
(148, 'Tanzania', 'Tanzanija', 'TZA', 'TZ', 'TZ.svg', '+255', '2023-06-11 12:05:30', '2024-01-13 09:14:16'),
(149, 'Thailand', 'Tajland', 'THA', 'TH', 'TH.svg', '+66', '2023-06-11 12:05:30', '2024-01-13 09:14:16'),
(150, 'Trinidad-And-Tobago', 'Trinidad i Tobago', 'TTO', 'TT', 'TT.svg', '+1-868', '2023-06-11 12:05:30', '2024-01-13 09:14:17'),
(151, 'Tunisia', 'Tunis', 'TUN', 'TN', 'TN.svg', '+216', '2023-06-11 12:05:30', '2024-01-13 09:14:17'),
(152, 'Turkey', 'Turska', 'TUR', 'TR', 'TR.svg', '+90', '2023-06-11 12:05:30', '2024-01-13 09:14:17'),
(153, 'Turkmenistan', 'Turkmenistan', 'TKM', 'TM', 'TM.svg', '+993', '2023-06-11 12:05:30', '2024-01-13 09:14:17'),
(154, 'Uganda', 'Uganda', 'UGA', 'UG', 'UG.svg', '+256', '2023-06-11 12:05:30', '2024-01-13 09:14:17'),
(155, 'United-Arab-Emirates', 'Ujedinjeni Arapski Emirati', 'ARE', 'AE', 'AE.svg', '+971', '2023-06-11 12:05:30', '2024-01-13 09:14:18'),
(156, 'Uruguay', 'Urugvaj', 'URY', 'UY', 'UY.svg', '+598', '2023-06-11 12:05:30', '2024-01-13 09:14:18'),
(157, 'USA', 'Sjedinjene Američke Države', 'USA', 'US', 'US.svg', '+1', '2023-06-11 12:05:30', '2024-01-13 09:14:18'),
(158, 'Uzbekistan', 'Uzbekistan', 'UZB', 'UZ', 'UZ.svg', '+998', '2023-06-11 12:05:30', '2024-01-13 09:14:18'),
(159, 'Venezuela', 'Venecuela', 'VEN', 'VE', 'VE.svg', '+58', '2023-06-11 12:05:30', '2024-01-13 09:14:18'),
(160, 'Vietnam', 'Vijetnam', 'VNM', 'VN', 'VN.svg', '+84', '2023-06-11 12:05:30', '2024-01-13 09:14:19'),
(161, 'Zambia', 'Zambija', 'ZMB', 'ZM', 'ZM.svg', '+260', '2023-06-11 12:05:30', '2024-01-13 09:14:19'),
(162, 'Zimbabwe', 'Zimbabve', 'ZWE', 'ZW', 'ZW.svg', '+263', '2023-06-11 12:05:30', '2024-01-13 09:14:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api__countries`
--
ALTER TABLE `api__countries`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
