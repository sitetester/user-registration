-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2018 at 11:46 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_registration1`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`) VALUES
(1, 'Andorra', 'AD'),
(2, 'United Arab Emirates', 'AE'),
(3, 'Afghanistan', 'AF'),
(4, 'Antigua and Barbuda', 'AG'),
(5, 'Anguilla', 'AI'),
(6, 'Albania', 'AL'),
(7, 'Armenia\r\n', 'AM'),
(8, 'Netherlands Antilles\r\n', 'AN'),
(9, 'Angola\r\n', 'AO'),
(10, 'Antarctica\r\n', 'AQ'),
(11, 'Argentina\r\n', 'AR'),
(12, 'American Samoa\r\n', 'AS'),
(13, 'Austria\r\n', 'AT'),
(14, 'Australia\r\n', 'AU'),
(15, 'Aruba\r\n', 'AW'),
(16, 'Aland Islands\r\nÅland Islands', 'AX'),
(17, 'Azerbaijan\r\n', 'AZ'),
(18, 'Bosnia and Herzegovina\r\n', 'BA'),
(19, 'Barbados\r\n', 'BB'),
(20, 'Bangladesh\r\n', 'BD'),
(21, 'Belgium\r\n', 'BE'),
(22, 'Burkina Faso\r\n', 'BF'),
(23, 'Bulgaria\r\n', 'BG'),
(24, 'Bahrain\r\n', 'BH'),
(25, 'Burundi\r\n', 'BI'),
(26, 'Benin\r\n', 'BJ'),
(27, 'Bermuda\r\n', 'BM'),
(28, 'Brunei Darussalam\r\n', 'BN'),
(29, 'Bolivia\r\nBolivia, Plurinational state of', 'BO'),
(30, 'Brazil\r\n', 'BR'),
(31, 'Bahamas\r\n', 'BS'),
(32, 'Bhutan\r\n', 'BT'),
(33, 'Bouvet Island\r\n', 'BV'),
(34, 'Botswana\r\n', 'BW'),
(35, 'Belarus\r\n', 'BY'),
(36, 'Belize\r\n', 'BZ'),
(37, 'Canada\r\n', 'CA'),
(38, 'Cocos (Keeling) Islands\r\n', 'CC'),
(39, 'Congo, The Democratic Republic of the\r\n', 'CD'),
(40, 'Central African Republic\r\n', 'CF'),
(41, 'Congo\r\n', 'CG'),
(42, 'Switzerland\r\n', 'CH'),
(43, 'Côte d\'Ivoire', 'CI'),
(44, 'Cook Islands\r\n', 'CK'),
(45, 'Chile', 'CL'),
(46, 'Cameroon\r\n', 'CM'),
(47, 'China\r\n', 'CN'),
(48, 'Colombia\r\n', 'CO'),
(49, 'Costa Rica\r\n', 'CR'),
(50, 'Cuba\r\n', 'CU'),
(51, 'Cape Verde\r\n', 'CV'),
(52, 'Christmas Island\r\n', 'CX'),
(53, 'Cyprus\r\n', 'CY'),
(54, 'Czech Republic\r\n', 'CZ'),
(55, 'Germany\r\n', 'DE'),
(56, 'Djibouti\r\n', 'DJ'),
(57, 'Denmark\r\n', 'DK'),
(58, 'Dominica\r\n', 'DM'),
(59, 'Dominican Republic\r\n', 'DO'),
(60, 'Algeria\r\n', 'DZ'),
(61, 'Ecuador\r\n', 'EC'),
(62, 'Estonia\r\n', 'EE'),
(63, 'Egypt\r\n', 'EG'),
(64, 'Western Sahara\r\n', 'EH'),
(65, 'Eritrea\r\n', 'ER'),
(66, 'Spain\r\n', 'ES'),
(67, 'Ethiopia\r\n', 'ET'),
(68, 'Finland\r\n', 'FI'),
(69, 'Fiji\r\n', 'FJ'),
(70, 'Falkland Islands (Malvinas)\r\n', 'FK'),
(71, 'Micronesia, Federated States of\r\n', 'FM'),
(72, 'Faroe Islands\r\n', 'FO'),
(73, 'France\r\n', 'FR'),
(74, 'Gabon', 'GA'),
(75, 'United Kingdom', 'GB'),
(76, 'Grenada', 'GD'),
(77, 'Georgia', 'GE'),
(78, 'French Guiana', 'GF'),
(79, 'Guernsey', 'GG'),
(80, 'Ghana\r\n', 'GH'),
(81, 'Gibraltar\r\n', 'GI'),
(82, 'Greenland\r\n', 'GL'),
(83, 'Gambia\r\n', 'GM'),
(84, 'Guinea\r\n', 'GN'),
(85, 'Guadeloupe\r\n', 'GP'),
(86, 'Equatorial Guinea\r\n', 'GQ'),
(87, 'Greece\r\n', 'GR'),
(88, 'South Georgia and the South Sandwich Islands\r\n', 'GS'),
(89, 'Guatemala\r\n', 'GT'),
(90, 'Guam\r\n', 'GU'),
(91, 'Guinea-Bissau\r\n', 'GW'),
(92, 'Guyana\r\n', 'GY'),
(93, 'Hong Kong\r\n', 'HK'),
(94, 'Heard Island and McDonald Islands\r\n', 'HM'),
(95, 'Honduras\r\n', 'HN'),
(96, 'Croatia\r\n', 'HR'),
(97, 'Haiti\r\n', 'HT'),
(98, 'Hungary\r\n', 'HU'),
(99, 'Indonesia\r\n', 'ID'),
(100, 'Ireland\r\n', 'IE'),
(101, 'Israel\r\n', 'IL'),
(102, 'Isle of Man\r\n', 'IM'),
(103, 'India\r\n', 'IN'),
(104, 'British Indian Ocean Territory\r\n', 'IO'),
(105, 'Iraq\r\n', 'IQ'),
(106, 'Iran, Islamic Republic of\r\n', 'IR'),
(107, 'Iceland\r\n', 'IS'),
(108, 'Italy', 'IT'),
(109, 'Jersey\r\n', 'JE'),
(110, 'Jamaica\r\n', 'JM'),
(111, 'Jordan\r\n', 'JO'),
(112, 'Japan\r\n', 'JP'),
(113, 'Kenya\r\n', 'KE'),
(114, 'Kyrgyzstan\r\n', 'KG'),
(115, 'Cambodia\r\n', 'KH'),
(116, 'Kiribati\r\n', 'KI'),
(117, 'Comoros\r\n', 'KM'),
(118, 'Saint Kitts and Nevis\r\n', 'KN'),
(119, 'Korea, Democratic People&#39;s Republic of\r\n', 'KP'),
(120, 'Korea, Republic of\r\n', 'KR'),
(121, 'Kuwait\r\n', 'KW'),
(122, 'Cayman Islands\r\n', 'KY'),
(123, 'Kazakhstan\r\n', 'KZ'),
(124, 'Lao People&#39;s Democratic Republic\r\n', 'LA'),
(125, 'Lebanon\r\n', 'LB'),
(126, 'Saint Lucia\r\n', 'LC'),
(127, 'Liechtenstein\r\n', 'LI'),
(128, 'Sri Lanka\r\n', 'LK'),
(129, 'Liberia\r\n', 'LR'),
(130, 'Lesotho\r\n', 'LS'),
(131, 'Lithuania\r\n', 'LT'),
(132, 'Luxembourg\r\n', 'LU'),
(133, 'Latvia\r\n', 'LV'),
(134, 'Libyan Arab Jamahiriya\r\n', 'LY'),
(135, 'Morocco\r\n', 'MA'),
(136, 'Monaco\r\n', 'MC'),
(137, 'Moldova, Republic of\r\n', 'MD'),
(138, 'Montenegro\r\n', 'ME'),
(139, 'Saint Martin', 'MF'),
(140, 'Madagascar\r\n', 'MG'),
(141, 'Marshall Islands\r\n', 'MH'),
(142, 'Macedonia\r\n', 'MK'),
(143, 'Mali\r\n', 'ML'),
(144, 'Myanmar\r\n', 'MM'),
(145, 'Mongolia\r\n', 'MN'),
(146, 'Macao\r\n', 'MO'),
(147, 'Northern Mariana Islands\r\n', 'MP'),
(148, 'Martinique\r\n', 'MQ'),
(149, 'Mauritania\r\n', 'MR'),
(150, 'Montserrat\r\n', 'MS'),
(151, 'Malta\r\n', 'MT'),
(152, 'Mauritius\r\n', 'MU'),
(153, 'Maldives\r\n', 'MV'),
(154, 'Malawi\r\n', 'MW'),
(155, 'Mexico\r\n', 'MX'),
(156, 'Malaysia\r\n', 'MY'),
(157, 'Mozambique\r\n', 'MZ'),
(158, 'Namibia\r\n', 'NA'),
(159, 'New Caledonia\r\n', 'NC'),
(160, 'Niger\r\n', 'NE'),
(161, 'Norfolk Island\r\n', 'NF'),
(162, 'Nigeria\r\n', 'NG'),
(163, 'Nicaragua\r\n', 'NI'),
(164, 'Netherlands\r\n', 'NL'),
(165, 'Norway', 'NO'),
(166, 'Nepal\r\n', 'NP'),
(167, 'Nauru\r\n', 'NR'),
(168, 'Niue\r\n', 'NU'),
(169, 'New Zealand\r\n', 'NZ'),
(170, 'Oman\r\n', 'OM'),
(171, 'Panama\r\n', 'PA'),
(172, 'Peru\r\n', 'PE'),
(173, 'French Polynesia\r\n', 'PF'),
(174, 'Papua New Guinea\r\n', 'PG'),
(175, 'Philippines\r\n', 'PH'),
(176, 'Pakistan\r\n', 'PK'),
(177, 'Poland\r\n', 'PL'),
(178, 'Saint Pierre and Miquelon\r\n', 'PM'),
(179, 'Pitcairn\r\n', 'PN'),
(180, 'Puerto Rico\r\n', 'PR'),
(181, 'Palestinian Territory, Occupied', 'PS'),
(182, 'Portugal\r\n', 'PT'),
(183, 'Palau\r\n', 'PW'),
(184, 'Paraguay\r\n', 'PY'),
(185, 'Qatar\r\n', 'QA'),
(186, 'Réunion', 'RE'),
(187, 'Romania\r\n', 'RO'),
(188, 'Serbia\r\n', 'RS'),
(189, 'Russian Federation\r\n', 'RU'),
(190, 'Rwanda\r\n', 'RW'),
(191, 'Saudi Arabia\r\n', 'SA'),
(192, 'Solomon Islands\r\n', 'SB'),
(193, 'Seychelles\r\n', 'SC'),
(194, 'Sudan\r\n', 'SD'),
(195, 'Sweden\r\n', 'SE'),
(196, 'Singapore\r\n', 'SG'),
(197, 'Saint Helena\r\n', 'SH'),
(198, 'Slovenia\r\n', 'SI'),
(199, 'Svalbard and Jan Mayen\r\n', 'SJ'),
(200, 'Slovakia\r\n', 'SK'),
(201, 'Sierra Leone\r\n', 'SL'),
(202, 'San Marino\r\n', 'SM'),
(203, 'Senegal\r\n', 'SN'),
(204, 'Somalia\r\n', 'SO'),
(205, 'Suriname\r\n', 'SR'),
(206, 'Sao Tome and Principe\r\n', 'ST'),
(207, 'El Salvador\r\n', 'SV'),
(208, 'Syrian Arab Republic\r\n', 'SY'),
(209, 'Swaziland\r\n', 'SZ'),
(210, 'Turks and Caicos Islands\r\n', 'TC'),
(211, 'Chad', 'TD'),
(212, 'French Southern Territories', 'TF'),
(213, 'Togo', 'TG'),
(214, 'Thailand', 'TH'),
(215, 'Tajikistan', 'TJ'),
(216, 'Tokelau', 'TK'),
(217, 'Timor-Leste', 'TL'),
(218, 'Turkmenistan\r\n', 'TM'),
(219, 'Tunisia\r\n', 'TN'),
(220, 'Tonga\r\n', 'TO'),
(221, 'Turkey', 'TR'),
(222, 'Trinidad and Tobago\r\n', 'TT'),
(223, 'Tuvalu\r\n', 'TV'),
(224, 'Taiwan\r\n', 'TW'),
(225, 'Tanzania, United Republic of\r\n', 'TZ'),
(226, 'Ukraine\r\n', 'UA'),
(227, 'Uganda\r\n', 'UG'),
(228, 'United States Minor Outlying Islands\r\n', 'UM'),
(229, 'United States\r\n', 'US'),
(230, 'Uruguay\r\n', 'UY'),
(231, 'Uzbekistan\r\n', 'UZ'),
(232, 'Holy See (Vatican City State)\r\n', 'VA'),
(233, 'Saint Vincent and the Grenadines\r\n', 'VC'),
(234, 'Venezuela, Bolivarian Republic of', 'VE'),
(235, 'Virgin Islands, British\r\n', 'VG'),
(236, 'Virgin Islands, U.S.\r\n', 'VI'),
(237, 'Viet Nam', 'VN'),
(238, 'Vanuatu\r\n', 'VU'),
(239, 'Wallis and Futuna\r\n', 'WF'),
(240, 'Samoa\r\n', 'WS'),
(241, 'Yemen\r\n', 'YE'),
(242, 'Mayotte\r\n', 'YT'),
(243, 'South Africa\r\n', 'ZA'),
(244, 'Zambia\r\n', 'ZM'),
(245, 'Zimbabwe', 'ZW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
