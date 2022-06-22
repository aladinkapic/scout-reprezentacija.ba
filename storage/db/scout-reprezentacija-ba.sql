-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 08:03 PM
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
-- Table structure for table `affiliation`
--

CREATE TABLE `affiliation` (
  `id` int(11) NOT NULL,
  `keyword` varchar(9) DEFAULT NULL,
  `key_s` varchar(6) DEFAULT NULL,
  `title` varchar(72) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `affiliation`
--

INSERT INTO `affiliation` (`id`, `keyword`, `key_s`, `title`) VALUES
(1, 'O', '72', 'NOVI GRAD SARAJEVO'),
(2, 'O', '73', 'SARAJEVO STARI GRAD'),
(3, 'O', '74', 'HADŽIĆI'),
(4, 'D', '4', 'AFGHANISTAN'),
(5, 'D', '8', 'ALBANIA'),
(6, 'D', '12', 'ALGERIA'),
(7, 'D', '16', 'AMERICAN SAMOA'),
(8, 'D', '20', 'ANDORRA'),
(9, 'D', '24', 'ANGOLA'),
(10, 'D', '660', 'ANGUILLA'),
(11, 'D', '10', 'ANTARCTICA'),
(12, 'D', '28', 'ANTIGUA AND BARBUDA'),
(13, 'D', '32', 'ARGENTINA'),
(14, 'D', '51', 'ARMENIA'),
(15, 'D', '533', 'ARUBA'),
(16, 'D', '36', 'AUSTRALIA'),
(17, 'D', '40', 'AUSTRIA'),
(18, 'D', '31', 'AZERBAIJAN'),
(19, 'D', '44', 'BAHAMAS'),
(20, 'D', '48', 'BAHRAIN'),
(21, 'D', '50', 'BANGLADESH'),
(22, 'D', '52', 'BARBADOS'),
(23, 'D', '112', 'BELARUS'),
(24, 'D', '56', 'BELGIUM'),
(25, 'D', '84', 'BELIZE'),
(26, 'D', '204', 'BENIN'),
(27, 'D', '60', 'BERMUDA'),
(28, 'D', '64', 'BHUTAN'),
(29, 'D', '68', 'BOLIVIA'),
(30, 'D', '70', 'BOSNA I HERCEGOVINA'),
(31, 'D', '72', 'BOTSWANA'),
(32, 'D', '74', 'BOUVET ISLAND'),
(33, 'D', '76', 'BRAZIL'),
(34, 'D', '86', 'BRITISH INDIAN OCEAN TERRITORY'),
(35, 'D', '96', 'BRUNEI DARUSSALAM'),
(36, 'D', '100', 'BULGARIA'),
(37, 'D', '854', 'BURKINA FASO'),
(38, 'D', '108', 'BURUNDI'),
(39, 'D', '116', 'CAMBODIA'),
(40, 'D', '120', 'CAMEROON'),
(41, 'D', '124', 'CANADA'),
(42, 'D', '132', 'CAPE VERDE'),
(43, 'D', '136', 'CAYMAN ISLANDS'),
(44, 'D', '140', 'CENTRAL AFRICAN REPUBLIC'),
(45, 'D', '148', 'CHAD'),
(46, 'D', '152', 'CHILE'),
(47, 'D', '156', 'CHINA'),
(48, 'D', '162', 'CHRISTMAS ISLAND'),
(49, 'D', '166', 'COCOS (KEELING) ISLANDS'),
(50, 'D', '170', 'COLOMBIA'),
(51, 'D', '174', 'COMOROS'),
(52, 'D', '178', 'CONGO'),
(53, 'D', '184', 'COOK ISLANDS'),
(54, 'D', '188', 'COSTA RICA'),
(55, 'D', '384', 'COTE D\'IVOIRE'),
(56, 'D', '191', 'CROATIA (local name: Hrvatska)'),
(57, 'D', '192', 'CUBA'),
(58, 'D', '196', 'CYPRUS'),
(59, 'D', '203', 'CZECH REPUBLIC'),
(60, 'D', '208', 'DENMARK'),
(61, 'D', '262', 'DJIBOUTI'),
(62, 'D', '212', 'DOMINICA'),
(63, 'D', '214', 'DOMINICAN REPUBLIC'),
(64, 'D', '626', 'EAST TIMOR'),
(65, 'D', '218', 'ECUADOR'),
(66, 'D', '818', 'EGYPT'),
(67, 'D', '222', 'EL SALVADOR'),
(68, 'D', '226', 'EQUATORIAL GUINEA'),
(69, 'D', '232', 'ERITREA'),
(70, 'D', '233', 'ESTONIA'),
(71, 'D', '231', 'ETHIOPIA'),
(72, 'D', '238', 'FALKLAND ISLANDS (MALVINAS)'),
(73, 'D', '234', 'FAROE ISLANDS'),
(74, 'D', '242', 'FIJI'),
(75, 'D', '246', 'FINLAND'),
(76, 'D', '250', 'FRANCE'),
(77, 'D', '249', 'FRANCE, METROPOLITAN'),
(78, 'D', '254', 'FRENCH GUIANA'),
(79, 'D', '258', 'FRENCH POLYNESIA'),
(80, 'D', '260', 'FRENCH SOUTHERN TERRITORIES'),
(81, 'D', '266', 'GABON'),
(82, 'D', '270', 'GAMBIA'),
(83, 'D', '268', 'GEORGIA'),
(84, 'D', '276', 'GERMANY'),
(85, 'D', '288', 'GHANA'),
(86, 'D', '292', 'GIBRALTAR'),
(87, 'D', '300', 'GREECE'),
(88, 'D', '304', 'GREENLAND'),
(89, 'D', '308', 'GRENADA'),
(90, 'D', '312', 'GUADELOUPE'),
(91, 'D', '316', 'GUAM'),
(92, 'D', '320', 'GUATEMALA'),
(93, 'D', '324', 'GUINEA'),
(94, 'D', '624', 'GUINEA-BISSAU'),
(95, 'D', '328', 'GUYANA'),
(96, 'D', '332', 'HAITI'),
(97, 'D', '334', 'HEARD AND MC DONALD ISLANDS'),
(98, 'D', '340', 'HONDURAS'),
(99, 'D', '344', 'HONG KONG'),
(100, 'D', '348', 'HUNGARY'),
(101, 'D', '352', 'ICELAND'),
(102, 'D', '356', 'INDIA'),
(103, 'D', '360', 'INDONESIA'),
(104, 'D', '364', 'IRAN (ISLAMIC REPUBLIC OF)'),
(105, 'D', '368', 'IRAQ'),
(106, 'D', '372', 'IRELAND'),
(107, 'D', '376', 'ISRAEL'),
(108, 'D', '380', 'ITALY'),
(109, 'D', '388', 'JAMAICA'),
(110, 'D', '392', 'JAPAN'),
(111, 'D', '400', 'JORDAN'),
(112, 'D', '398', 'KAZAKHSTAN'),
(113, 'D', '404', 'KENYA'),
(114, 'D', '296', 'KIRIBATI'),
(115, 'D', '408', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF'),
(116, 'D', '410', 'KOREA, REPUBLIC OF'),
(117, 'D', '414', 'KUWAIT'),
(118, 'D', '417', 'KYRGYZSTAN'),
(119, 'D', '418', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC'),
(120, 'D', '428', 'LATVIA'),
(121, 'D', '422', 'LEBANON'),
(122, 'D', '426', 'LESOTHO'),
(123, 'D', '430', 'LIBERIA'),
(124, 'D', '434', 'LIBYAN ARAB JAMAHIRIYA'),
(125, 'D', '438', 'LIECHTENSTEIN'),
(126, 'D', '440', 'LITHUANIA'),
(127, 'D', '442', 'LUXEMBOURG'),
(128, 'D', '446', 'MACAU'),
(129, 'D', '807', 'REPUBLIKA SJEVERNA MAKEDONIJA'),
(130, 'D', '450', 'MADAGASCAR'),
(131, 'D', '454', 'MALAWI'),
(132, 'D', '458', 'MALAYSIA'),
(133, 'D', '462', 'MALDIVES'),
(134, 'D', '466', 'MALI'),
(135, 'D', '470', 'MALTA'),
(136, 'D', '584', 'MARSHALL ISLANDS'),
(137, 'D', '474', 'MARTINIQUE'),
(138, 'D', '478', 'MAURITANIA'),
(139, 'D', '480', 'MAURITIUS'),
(140, 'D', '175', 'MAYOTTE'),
(141, 'D', '484', 'MEXICO'),
(142, 'D', '583', 'MICRONESIA, FEDERATED STATES OF'),
(143, 'D', '498', 'MOLDOVA, REPUBLIC OF'),
(144, 'D', '492', 'MONACO'),
(145, 'D', '496', 'MONGOLIA'),
(146, 'D', '500', 'MONTSERRAT'),
(147, 'D', '504', 'MOROCCO'),
(148, 'D', '508', 'MOZAMBIQUE'),
(149, 'D', '104', 'MYANMAR'),
(150, 'D', '516', 'NAMIBIA'),
(151, 'D', '520', 'NAURU'),
(152, 'D', '524', 'NEPAL'),
(153, 'D', '528', 'NETHERLANDS'),
(154, 'D', '530', 'NETHERLANDS ANTILLES'),
(155, 'D', '540', 'NEW CALEDONIA'),
(156, 'D', '554', 'NEW ZEALAND'),
(157, 'D', '558', 'NICARAGUA'),
(158, 'D', '562', 'NIGER'),
(159, 'D', '566', 'NIGERIA'),
(160, 'D', '570', 'NIUE'),
(161, 'D', '574', 'NORFOLK ISLAND'),
(162, 'D', '580', 'NORTHERN MARIANA ISLANDS'),
(163, 'D', '578', 'NORWAY'),
(164, 'D', '512', 'OMAN'),
(165, 'D', '586', 'PAKISTAN'),
(166, 'D', '585', 'PALAU'),
(167, 'D', '591', 'PANAMA'),
(168, 'D', '598', 'PAPUA NEW GUINEA'),
(169, 'D', '600', 'PARAGUAY'),
(170, 'D', '604', 'PERU'),
(171, 'D', '608', 'PHILIPPINES'),
(172, 'D', '612', 'PITCAIRN'),
(173, 'D', '616', 'POLAND'),
(174, 'D', '620', 'PORTUGAL'),
(175, 'D', '630', 'PUERTO RICO'),
(176, 'D', '634', 'QATAR'),
(177, 'D', '638', 'REUNION'),
(178, 'D', '642', 'ROMANIA'),
(179, 'D', '643', 'RUSSIAN FEDERATION'),
(180, 'D', '646', 'RWANDA'),
(181, 'D', '659', 'SAINT KITTS AND NEVIS'),
(182, 'D', '662', 'SAINT LUCIA'),
(183, 'D', '670', 'SAINT VINCENT AND THE GRENADINES'),
(184, 'D', '882', 'SAMOA'),
(185, 'D', '674', 'SAN MARINO'),
(186, 'D', '678', 'SAO TOME AND PRINCIPE'),
(187, 'D', '682', 'SAUDI ARABIA'),
(188, 'D', '686', 'SENEGAL'),
(189, 'D', '690', 'SEYCHELLES'),
(190, 'D', '694', 'SIERRA LEONE'),
(191, 'D', '702', 'SINGAPORE'),
(192, 'D', '703', 'SLOVAKIA (Slovak Republic)'),
(193, 'D', '705', 'SLOVENIA'),
(194, 'D', '90', 'SOLOMON ISLANDS'),
(195, 'D', '706', 'SOMALIA'),
(196, 'D', '710', 'SOUTH AFRICA'),
(197, 'D', '239', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'),
(198, 'D', '724', 'SPAIN'),
(199, 'D', '144', 'SRI LANKA'),
(200, 'D', '654', 'ST. HELENA'),
(201, 'D', '666', 'ST. PIERRE AND MIQUELON'),
(202, 'D', '736', 'SUDAN'),
(203, 'D', '740', 'SURINAME'),
(204, 'D', '744', 'SVALBARD AND JAN MAYEN ISLANDS'),
(205, 'D', '748', 'SWAZILAND'),
(206, 'D', '752', 'SWEDEN'),
(207, 'D', '756', 'SWITZERLAND'),
(208, 'D', '760', 'SYRIAN ARAB REPUBLIC'),
(209, 'D', '158', 'TAIWAN, PROVINCE OF CHINA'),
(210, 'D', '762', 'TAJIKISTAN'),
(211, 'D', '834', 'TANZANIA, UNITED REPUBLIC OF'),
(212, 'D', '764', 'THAILAND'),
(213, 'D', '768', 'TOGO'),
(214, 'D', '772', 'TOKELAU'),
(215, 'D', '776', 'TONGA'),
(216, 'D', '780', 'TRINIDAD AND TOBAGO'),
(217, 'D', '788', 'TUNISIA'),
(218, 'D', '792', 'TURKEY'),
(219, 'D', '795', 'TURKMENISTAN'),
(220, 'D', '796', 'TURKS AND CAICOS ISLANDS'),
(221, 'D', '798', 'TUVALU'),
(222, 'D', '800', 'UGANDA'),
(223, 'D', '804', 'UKRAINE'),
(224, 'D', '784', 'UNITED ARAB EMIRATES'),
(225, 'D', '826', 'UNITED KINGDOM'),
(226, 'D', '840', 'UNITED STATES'),
(227, 'D', '581', 'UNITED STATES MINOR OUTLYING ISLANDS'),
(228, 'D', '858', 'URUGUAY'),
(229, 'D', '860', 'UZBEKISTAN'),
(230, 'D', '548', 'VANUATU'),
(231, 'D', '336', 'VATICAN CITY STATE (HOLY SEE)'),
(232, 'D', '862', 'VENEZUELA'),
(233, 'D', '704', 'VIET NAM'),
(234, 'D', '92', 'VIRGIN ISLANDS (BRITISH)'),
(235, 'D', '850', 'VIRGIN ISLANDS (U.S.)'),
(236, 'D', '876', 'WALLIS AND FUTUNA ISLANDS'),
(237, 'D', '732', 'WESTERN SAHARA'),
(238, 'D', '887', 'YEMEN'),
(239, 'D', '180', 'CONGO,THE DEMOCRATIC REPUBLIC OF THE'),
(240, 'D', '894', 'ZAMBIA'),
(241, 'D', '716', 'ZIMBABWE'),
(242, 'O', '75', 'ILIDŽA'),
(243, 'O', '76', 'ILIJAŠ'),
(244, 'O', '77', 'TRNOVO'),
(245, 'O', '78', 'VOGOŠĆA'),
(246, 'O', '79', 'LIVNO'),
(247, 'O', '80', 'BOSANSKO GRAHOVO'),
(248, 'O', '81', 'DRVAR'),
(249, 'O', '82', 'GLAMOČ'),
(250, 'O', '83', 'KUPRES'),
(251, 'O', '84', 'TOMISLAVGRAD'),
(252, 'O', '85', 'BANJA LUKA'),
(253, 'O', '86', 'GRADIŠKA'),
(254, 'O', '87', 'ČELINAC'),
(255, 'O', '88', 'KNEŽEVO'),
(256, 'O', '89', 'KOTOR VAROŠ'),
(257, 'O', '90', 'LAKTAŠI'),
(258, 'O', '91', 'PRNJAVOR'),
(259, 'O', '92', 'SRBAC'),
(260, 'O', '93', 'PRIJEDOR'),
(261, 'O', '94', 'KOZARSKA DUBICA'),
(262, 'O', '95', 'NOVI GRAD'),
(263, 'O', '96', 'KRUPA NA UNI'),
(264, 'O', '97', 'KOSTAJNICA'),
(265, 'O', '98', 'OŠTRA LUKA'),
(266, 'O', '99', 'MRKONJIĆ GRAD'),
(267, 'O', '100', 'JEZERO'),
(268, 'O', '101', 'PETROVAC'),
(269, 'O', '102', 'RIBNIK'),
(270, 'O', '103', 'ISTOČNI DRVAR'),
(271, 'O', '104', 'KUPRES'),
(272, 'O', '105', 'ŠIPOVO'),
(273, 'O', '106', 'DOBOJ'),
(274, 'O', '107', 'DERVENTA'),
(275, 'O', '108', 'MODRIČA'),
(276, 'O', '109', 'DONJI ŽABAR'),
(277, 'O', '110', 'PELAGIĆEVO'),
(278, 'O', '111', 'PETROVO'),
(279, 'O', '112', 'BROD'),
(280, 'O', '113', 'ŠAMAC'),
(281, 'O', '114', 'TESLIĆ'),
(282, 'O', '115', 'VUKOSAVLJE'),
(283, 'O', '116', 'BIJELJINA'),
(284, 'O', '117', 'LOPARE'),
(285, 'O', '118', 'UGLJEVIK'),
(286, 'O', '120', 'BRATUNAC'),
(287, 'O', '121', 'MILIĆI'),
(288, 'O', '122', 'OSMACI'),
(289, 'O', '123', 'SREBRENICA'),
(290, 'O', '124', 'ŠEKOVIĆI'),
(291, 'O', '125', 'VLASENICA'),
(292, 'O', '126', 'PALE'),
(293, 'O', '127', 'HAN PIJESAK'),
(294, 'O', '128', 'ROGATICA'),
(295, 'O', '129', 'SOKOLAC'),
(296, 'O', '130', 'ISTOČNA ILIDŽA'),
(297, 'O', '131', 'ISTOČNI STARI GRAD'),
(298, 'O', '132', 'ISTOČNO NOVO SARAJEVO'),
(299, 'O', '133', 'TRNOVO'),
(300, 'O', '134', 'FOČA'),
(301, 'O', '135', 'ČAJNIČE'),
(302, 'O', '136', 'KALINOVIK'),
(303, 'O', '137', 'RUDO'),
(304, 'O', '138', 'NOVO GORAŽDE'),
(305, 'O', '139', 'VIŠEGRAD'),
(306, 'O', '1', 'BIHAĆ'),
(307, 'O', '2', 'BOSANSKA KRUPA'),
(308, 'O', '3', 'BOSANSKI PETROVAC'),
(309, 'O', '4', 'BUŽIM'),
(310, 'O', '5', 'CAZIN'),
(311, 'O', '6', 'KLJUČ'),
(312, 'O', '7', 'SANSKI MOST'),
(313, 'O', '8', 'VELIKA KLADUŠA'),
(314, 'O', '9', 'ORAŠJE'),
(315, 'O', '10', 'DOMALJEVAC/ŠAMAC'),
(316, 'O', '11', 'ODŽAK'),
(317, 'O', '12', 'TUZLA'),
(318, 'O', '13', 'BANOVIĆI'),
(319, 'O', '14', 'ČELIĆ'),
(320, 'O', '15', 'DOBOJ ISTOK'),
(321, 'O', '16', 'GRAČANICA'),
(322, 'O', '17', 'GRADAČAC'),
(323, 'O', '18', 'KALESIJA'),
(324, 'O', '19', 'KLADANJ'),
(325, 'O', '20', 'LUKAVAC'),
(326, 'O', '21', 'SAPNA'),
(327, 'O', '22', 'SREBRENIK'),
(328, 'O', '23', 'TEOČAK'),
(329, 'O', '24', 'ŽIVINICE'),
(330, 'O', '25', 'ZENICA'),
(331, 'O', '26', 'BREZA'),
(332, 'O', '27', 'DOBOJ JUG'),
(333, 'O', '28', 'KAKANJ'),
(334, 'O', '29', 'MAGLAJ'),
(335, 'O', '30', 'OLOVO'),
(336, 'O', '31', 'TEŠANJ'),
(337, 'O', '32', 'USORA'),
(338, 'O', '33', 'VAREŠ'),
(339, 'O', '34', 'VISOKO'),
(340, 'O', '35', 'ZAVIDOVIĆI'),
(341, 'O', '36', 'ŽEPČE'),
(342, 'O', '37', 'GORAŽDE'),
(343, 'O', '38', 'FOČA'),
(344, 'O', '39', 'PALE'),
(345, 'O', '40', 'TRAVNIK'),
(346, 'O', '41', 'BUGOJNO'),
(347, 'O', '42', 'BUSOVAČA'),
(348, 'O', '43', 'DOBRETIĆI'),
(349, 'O', '44', 'DONJI VAKUF'),
(350, 'O', '45', 'FOJNICA'),
(351, 'O', '46', 'GORNJI VAKUF-USKOPLJE'),
(352, 'O', '47', 'JAJCE'),
(353, 'O', '48', 'KISELJAK'),
(354, 'O', '49', 'KREŠEVO'),
(355, 'O', '50', 'NOVI TRAVNIK'),
(356, 'O', '51', 'VITEZ'),
(357, 'O', '58', 'ČAPLJINA'),
(358, 'O', '59', 'ČITLUK'),
(359, 'O', '60', 'JABLANICA'),
(360, 'O', '61', 'KONJIC'),
(361, 'O', '62', 'NEUM'),
(362, 'O', '63', 'PROZOR'),
(363, 'O', '64', 'RAVNO'),
(364, 'O', '65', 'STOLAC'),
(365, 'O', '66', 'LJUBUŠKI'),
(366, 'O', '67', 'GRUDE'),
(367, 'O', '68', 'POSUŠJE'),
(368, 'O', '69', 'ŠIROKI BRIJEG'),
(369, 'O', '70', 'NOVO SARAJEVO'),
(370, 'O', '71', 'SARAJEVO CENTAR'),
(371, 'O', '140', 'TREBINJE'),
(372, 'O', '141', 'BERKOVIĆI'),
(373, 'O', '142', 'BILEĆA'),
(374, 'O', '143', 'GACKO'),
(375, 'O', '144', 'LJUBINJE'),
(376, 'O', '145', 'NEVESINJE'),
(377, 'O', '146', 'ISTOČNI MOSTAR'),
(378, 'O', '147', 'BRČKO DISTRIKT BIH'),
(379, 'O', '149', 'MOSTAR'),
(380, 'D', '902', 'UNITED NATIONS SPECIAL AGENCY'),
(381, 'D', '903', 'STATELESS PERSON'),
(382, 'D', '904', 'REFUGEE'),
(383, 'D', '905', 'REFUGEE OTHER THAN DEFINED IN CODE XXB'),
(384, 'D', '906', 'UNSPECIFIED NATIONALITY'),
(385, 'D', '907', 'PALESTINIAN NATIONAL AUTHORITY'),
(386, 'O', '999999', 'MCP-STRANCI VD'),
(387, 'O', '0', 'MCP'),
(388, 'O', '9999', '.INOSTRANSTVO'),
(389, 'D', '908', 'SERBIA (LOCAL NAME: SRBIJA)'),
(390, 'D', '909', 'CRNA GORA'),
(391, 'D', '895', 'NEUTRAL ZONE'),
(392, 'D', '896', 'UNITED KINGDOM DEPENDENT TERRITORIES CITIZEN'),
(393, 'D', '897', 'UNITED KINGDOM NATIONAL (OVERSEAS)'),
(394, 'D', '898', 'UNITED KINGDOM OVERSEAS CITIZEN'),
(395, 'D', '899', 'UNITED KINGDOM PROTECTED PERSON'),
(396, 'D', '900', 'UNITED KINGDOM SUBJECT'),
(397, 'D', '901', 'UNITED NATIONS'),
(398, 'O', '148', 'NEPOZNATA'),
(399, 'O', '150', 'STANARI'),
(400, 'O', '119', 'ZVORNIK');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `title`, `image`, `year`, `city`, `country`, `category`, `owner`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'FK Željezničar', '7517d9e15c6e7fab780dc48186f94570.png', 1936, 'Sarajevo', 30, 3, 8, NULL, '2022-06-06 16:58:26', '2022-06-18 17:23:25'),
(2, 'FK Sarajevo', '267a85d534b931696ecc15e762a5ae9a.png', 1960, 'Sarajevo', 30, 3, 12, NULL, '2022-06-06 16:58:39', '2022-06-20 17:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_11_07_105206___keywords', 2),
(6, '2022_06_06_182737___clubs', 3),
(7, '2022_06_07_192050___club_data', 4),
(8, '2022_06_07_200430___nat_team_data', 5),
(9, '2022_06_18_085406___posts', 6),
(10, '2022_06_19_081758___posts__likes', 7),
(11, '2022_06_19_084858___players_rates', 8),
(12, '2022_06_19_102403___partners', 9);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, '995e51c4c2514b2e2c284dd25051d8b6.png', 'https://stackoverflow.com/questions/47511138/input-type-file-no-file-chosen-after-submit', '2022-06-19 08:41:03', '2022-06-19 08:41:03'),
(2, 'e0e4f8dd77f8296e41769f10d58e149d.png', NULL, '2022-06-19 08:43:57', '2022-06-19 08:43:57'),
(3, 'b4acf3ed4eeec657ab1a052ae136b479.png', NULL, '2022-06-19 08:44:05', '2022-06-19 08:44:05'),
(4, '2a3fc29ff8f2f7c7aef848f8b56b0b92.png', NULL, '2022-06-19 08:44:13', '2022-06-19 08:44:13'),
(5, '2ec73befeae0a6587e7f906acf9c90b4.png', NULL, '2022-06-19 08:44:20', '2022-06-19 08:44:20'),
(7, '90aedd273cda0bf6470f777952872d8b.png', NULL, '2022-06-19 08:44:39', '2022-06-19 08:44:39');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `what` int(11) NOT NULL DEFAULT 0,
  `owner` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `what`, `owner`, `content`, `likes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 0, 8, '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make&nbsp;</span><a href=\"http://This is actually working\" target=\"_blank\">This is actually working</a>&nbsp;thing !<br></p>', 2, NULL, '2022-06-18 16:30:14', '2022-06-20 17:23:01'),
(9, 1, 1, '<p>This is some <b>post </b>mate! And I\'m gonna edit it! We&nbsp;<a href=\"http://google.com\" target=\"_blank\">google.com</a>. Lets try this <u>underline </u>text !</p>', 0, NULL, '2022-06-18 17:56:23', '2022-06-18 18:08:55'),
(10, 1, 2, '<p>We are here</p>', 0, NULL, '2022-06-18 18:07:33', '2022-06-18 18:07:33'),
(11, 1, 2, '<p>Ae</p>', 0, '2022-06-18 18:11:18', '2022-06-18 18:07:45', '2022-06-18 18:11:18'),
(12, 1, 2, '<p>Evo mene ime mi je Kemo, imal\' iko da bi me šta?&nbsp;<a href=\"http://Izleeemoooo\" target=\"_blank\">Izleeemoooo</a></p>', 0, NULL, '2022-06-20 17:44:01', '2022-06-20 17:44:01'),
(13, 0, 12, '<p>Ja sam John Doe !</p>', 0, NULL, '2022-06-20 17:45:13', '2022-06-20 17:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `posts__likes`
--

CREATE TABLE `posts__likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts__likes`
--

INSERT INTO `posts__likes` (`id`, `post_id`, `ip`, `created_at`, `updated_at`) VALUES
(9, 8, '127.0.0.1', '2022-06-19 06:36:44', '2022-06-19 06:36:44'),
(10, 8, '192.168.0.54', '2022-06-20 17:23:01', '2022-06-20 17:23:01');

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
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 0,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `sport` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) DEFAULT NULL,
  `stronger_limb` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `years_old` int(11) DEFAULT NULL,
  `birth_place` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_place` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` int(11) NOT NULL,
  `country` int(11) DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `under_contract` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ne',
  `facebook` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `active`, `role`, `image`, `category`, `sport`, `position`, `stronger_limb`, `birth_date`, `years_old`, `birth_place`, `living_place`, `citizenship`, `country`, `phone`, `gender`, `height`, `remember_token`, `note`, `under_contract`, `facebook`, `twitter`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'Root Admin', 'root', '2022-04-23 12:21:04', '$2y$10$av7Yibw4BeD3mZyJmnwLwOw53lAg7UohbsU2b0gzQPR7noK2cKHXS', 'd5da8e5b83e9036a8b24dabcf49846b124a3ecbd45f42238c489875081d940e1', 1, 0, 'affc0509f010175876310b386bfbaf18.png', 0, '0', 0, NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'Ne', NULL, NULL, NULL, '2022-04-23 12:21:05', '2022-06-17 13:20:01'),
(8, 'Aladin Kapić', 'kaapiic@hotmail.com', NULL, '$2y$10$av7Yibw4BeD3mZyJmnwLwOw53lAg7UohbsU2b0gzQPR7noK2cKHXS', '2b53247db2cd69c5a5a3136d18c1e559df341171a57fb18c2a29710d35cb1e68', 1, 1, '5ad1cb6444d7e4cc93eda7ed570dc167.png', NULL, '4', 14, 5, '1994-05-05', 28, 'Cazin', 'Velešići, Sarajevo', 30, 4, NULL, 7, 180, NULL, 'Textarea', 'Da', 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.instagram.com', '2022-06-05 14:35:47', '2022-06-18 17:17:33'),
(9, 'Edin', 'edin@coffeedzic.com', NULL, '$2y$10$h2GPzLpwgldJCCF/LJiaeudOor9Ce0KOoN1YVXL57IK/fD6fSNGD6', '99b22b6f6e2b9befe707a1ec44f39f7c77e94202b77c3ce67e4870c9f558d1e3', 0, 1, NULL, NULL, '4', 14, 5, '2022-06-08', 1, NULL, 'Visoko', 30, 30, NULL, 7, 185, NULL, 'Tawdawd', 'Ne', NULL, NULL, NULL, '2022-06-05 15:15:09', '2022-06-06 17:18:44'),
(10, 'Edin Kahvedžić', 'coffeedzic@gmail.com', NULL, '$2y$10$NiXAGKaMjlCO1bVJlrmoEOJH4ra6isTAQEXRBkdS4Pqyml0umHBkS', '961faa802b129c82da2c0238c6a10dc533ad1492ec040d980b541a149d130d29', 0, 1, NULL, NULL, '1', NULL, NULL, '2008-12-31', NULL, NULL, 'Visoko', 1, 1, '0621458547', NULL, NULL, NULL, NULL, 'Ne', NULL, NULL, NULL, '2022-06-05 15:32:50', '2022-06-05 15:32:50'),
(12, 'John Doe', 'kaapiic@gmail.com', NULL, '$2y$10$H/2UkhmpYXYsYiDea9T5Hu4Cng4ZUGYF6wj5Gr04O56/q7RicHdWq', 'c185747690cb2a0de4f06e58a97e935ed1e678bb60b1aacb55385a666da6d43e', 1, 1, 'b0a046eb0f78d61db1d4147de5ef2d3f.png', NULL, '3', 12, 5, '2022-06-16', NULL, NULL, 'Sarajevo', 30, 30, NULL, 7, 180, NULL, 'We are here ...', 'Ne', NULL, NULL, NULL, '2022-06-20 17:38:59', '2022-06-20 17:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `users__club_data`
--

CREATE TABLE `users__club_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` int(11) NOT NULL,
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

INSERT INTO `users__club_data` (`id`, `user_id`, `season`, `club_id`, `no_games`, `goals`, `assistance`, `minutes`, `red_cards`, `yellow_cards`, `without_goal`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 8, '2020 / 2021', 2, 14, 3, 7, 460, 2, 17, 6, NULL, '2022-06-07 17:56:08', '2022-06-07 17:56:08'),
(3, 8, '2020 / 2021', 1, 3, 3, 3, 5, 4, 1, 0, NULL, '2022-06-07 18:01:15', '2022-06-18 18:23:35'),
(6, 1, '2021 / 2022', 1, 6, 2, 1, 320, 1, 5, NULL, NULL, '2022-06-17 14:20:03', '2022-06-17 14:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `users__nat_team_data`
--

CREATE TABLE `users__nat_team_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
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

INSERT INTO `users__nat_team_data` (`id`, `user_id`, `season`, `country_id`, `category`, `no_games`, `goals`, `assistance`, `minutes`, `red_cards`, `yellow_cards`, `without_goal`, `no_invitations`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 8, '2021 / 2022', 30, 16, 2, 2, 2, 2, 2, 2, 2, 0, NULL, '2022-06-07 18:21:18', '2022-06-07 18:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `users__rates`
--

CREATE TABLE `users__rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users__rates`
--

INSERT INTO `users__rates` (`id`, `user_id`, `ip`, `rate`, `created_at`, `updated_at`) VALUES
(1, 8, '127.0.0.1', 8, '2022-06-01 06:55:38', '2022-06-19 06:55:38'),
(2, 8, '127.0.0.1', 4, '2022-06-11 06:58:28', '2022-06-19 06:58:28'),
(3, 8, '127.0.0.1', 10, '2022-06-02 06:58:48', '2022-06-19 06:58:48'),
(4, 8, '127.0.0.1', 10, '2022-06-19 07:29:18', '2022-06-19 07:29:18'),
(5, 8, '192.168.0.54', 10, '2022-06-20 17:07:47', '2022-06-20 17:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `__keywords`
--

CREATE TABLE `__keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_value` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__keywords`
--

INSERT INTO `__keywords` (`id`, `keyword`, `value`, `description`, `special_value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'yes_no', 'Da', NULL, NULL, NULL, '2022-06-05 14:40:21', '2022-06-05 14:40:21'),
(2, 'yes_no', 'Ne', NULL, NULL, NULL, '2022-06-05 14:40:26', '2022-06-05 14:40:26'),
(3, 'sport', 'Nogomet', NULL, NULL, NULL, '2022-06-05 14:41:03', '2022-06-05 14:41:03'),
(4, 'sport', 'Futsal', NULL, NULL, NULL, '2022-06-05 14:41:06', '2022-06-05 14:41:06'),
(5, 'arm_leg', 'Desna', NULL, NULL, NULL, '2022-06-05 14:42:21', '2022-06-05 14:42:37'),
(6, 'arm_leg', 'Lijeva', NULL, NULL, NULL, '2022-06-05 14:42:24', '2022-06-05 14:42:32'),
(7, 'gender', 'Muško', NULL, NULL, NULL, '2022-06-05 14:43:03', '2022-06-05 14:43:03'),
(8, 'gender', 'Žensko', NULL, NULL, NULL, '2022-06-05 14:43:06', '2022-06-05 14:43:06'),
(9, 'active', 'Zahtjev odobren', NULL, 1, NULL, '2022-06-05 14:43:49', '2022-06-05 14:43:49'),
(10, 'active', 'Na čekanju', NULL, 0, NULL, '2022-06-05 14:43:53', '2022-06-05 14:43:53'),
(11, 'position_football', 'Golman', NULL, NULL, NULL, '2022-06-06 17:01:30', '2022-06-06 17:01:30'),
(12, 'position_football', 'Lijevi bek', NULL, NULL, NULL, '2022-06-06 17:01:38', '2022-06-06 17:01:38'),
(13, 'position_football', 'Desni bek', NULL, NULL, NULL, '2022-06-06 17:01:41', '2022-06-06 17:01:41'),
(14, 'position_futsal', 'Golman', NULL, NULL, NULL, '2022-06-06 17:01:50', '2022-06-07 17:39:13'),
(15, 'position_futsal', 'Vratar', NULL, NULL, NULL, '2022-06-06 17:01:54', '2022-06-06 17:01:54'),
(16, 'nat_team', 'U-21', NULL, NULL, NULL, '2022-06-07 18:13:20', '2022-06-07 18:13:20'),
(17, 'nat_team', 'A selekcija', NULL, NULL, NULL, '2022-06-07 18:13:24', '2022-06-07 18:13:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliation`
--
ALTER TABLE `affiliation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
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
-- Indexes for table `posts__likes`
--
ALTER TABLE `posts__likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users__club_data`
--
ALTER TABLE `users__club_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users__nat_team_data`
--
ALTER TABLE `users__nat_team_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users__rates`
--
ALTER TABLE `users__rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `__keywords`
--
ALTER TABLE `__keywords`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliation`
--
ALTER TABLE `affiliation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts__likes`
--
ALTER TABLE `posts__likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users__club_data`
--
ALTER TABLE `users__club_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users__nat_team_data`
--
ALTER TABLE `users__nat_team_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users__rates`
--
ALTER TABLE `users__rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `__keywords`
--
ALTER TABLE `__keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
