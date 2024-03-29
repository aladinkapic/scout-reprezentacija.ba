-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 11:41 AM
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
-- Database: `stari-grad`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliation`
--
ALTER TABLE `affiliation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliation`
--
ALTER TABLE `affiliation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
