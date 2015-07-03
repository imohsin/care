-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2015 at 12:06 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `care`
--
CREATE DATABASE IF NOT EXISTS `care` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `care`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `country_id` int(11) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE IF NOT EXISTS `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_provider_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `campaign_reference` varchar(100) NOT NULL,
  `campaign_start_date` datetime NOT NULL,
  `campaign_end_date` datetime NOT NULL,
  `deal_provider_commission` decimal(10,2) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `deal_provider_id` (`deal_provider_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `deal_provider_id`, `shop_id`, `campaign_reference`, `campaign_start_date`, `campaign_end_date`, `deal_provider_commission`) VALUES
(1, 2, 1, 'Campaign 20111210 - Mattress (Gumtree)', '2011-12-07 00:00:00', '2011-12-10 23:59:59', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `communication`
--

CREATE TABLE IF NOT EXISTS `communication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `communication_type_id` int(11) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `contact_id` (`contact_id`),
  KEY `communication_type_id` (`communication_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `communication_type`
--

CREATE TABLE IF NOT EXISTS `communication_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE IF NOT EXISTS `company_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`id`, `type`) VALUES
(1, 'Courier'),
(2, 'Shop'),
(3, 'Payment Provider'),
(4, 'Deal Provider');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `company_type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organization_id` (`organization_id`),
  KEY `company_type_id` (`company_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `organization_id`, `company_type_id`, `name`) VALUES
(1, 1, 1, 'Wowcher'),
(2, 1, 2, 'UKMetro'),
(3, 1, 2, 'Groupon'),
(4, 1, 3, 'Gumtree'),
(5, 1, 4, 'Savvy Mummys'),
(6, 1, 4, 'Mighty Deals');

-- --------------------------------------------------------

--
-- Table structure for table `company_backoffice`
--

CREATE TABLE IF NOT EXISTS `company_backoffice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company_backoffice`
--

INSERT INTO `company_backoffice` (`id`, `company_id`, `url`, `username`, `password`) VALUES
(1, 1, 'http://www.tnt.com/', 'test', 'test'),
(2, 2, 'http://www.lmrhome.com/', 'test', 'test'),
(3, 3, 'http://www.nightfreight.co.uk/', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `company_id`, `name`, `job_title`) VALUES
(1, 2, 'Indy Mukherjee', 'Deal Manager'),
(2, 1, 'Jessica Cooper', 'Online Shop Manager'),
(3, 1, 'Iain Mcdonald', 'Deal Manager'),
(4, 1, 'Claire Roach', 'Online Shop Manager'),
(5, 3, 'Rebecca Walsh', 'Online Shop Manager');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(49) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`, `sort_order`) VALUES
(1, 'BD', 'Bangladesh', 11),
(2, 'BE', 'Belgium', 13),
(3, 'BF', 'Burkina Faso', 23),
(4, 'BG', 'Bulgaria', 22),
(5, 'BA', 'Bosnia and Herz.', 18),
(6, 'BN', 'Brunei', 21),
(7, 'BO', 'Bolivia', 17),
(8, 'JP', 'Japan', 80),
(9, 'BI', 'Burundi', 24),
(10, 'BJ', 'Benin', 15),
(11, 'BT', 'Bhutan', 16),
(12, 'JM', 'Jamaica', 79),
(13, 'BW', 'Botswana', 19),
(14, 'BR', 'Brazil', 20),
(15, 'BS', 'Bahamas', 10),
(16, 'BY', 'Belarus', 12),
(17, 'BZ', 'Belize', 14),
(18, 'RU', 'Russia', 132),
(19, 'RW', 'Rwanda', 133),
(20, 'RS', 'Serbia', 137),
(21, 'LT', 'Lithuania', 94),
(22, 'LU', 'Luxembourg', 95),
(23, 'LR', 'Liberia', 92),
(24, 'RO', 'Romania', 131),
(25, 'GW', 'Guinea-Bissau', 66),
(26, 'GT', 'Guatemala', 64),
(27, 'GR', 'Greece', 62),
(28, 'GQ', 'Eq. Guinea', 48),
(29, 'GY', 'Guyana', 67),
(30, 'GE', 'Georgia', 59),
(31, 'GB', 'United Kingdom', 166),
(32, 'GA', 'Gabon', 57),
(33, 'GN', 'Guinea', 65),
(34, 'GM', 'Gambia', 58),
(35, 'GL', 'Greenland', 63),
(36, 'KW', 'Kuwait', 86),
(37, 'GH', 'Ghana', 61),
(38, 'OM', 'Oman', 119),
(39, '_1', 'Somaliland', 143),
(40, '_0', 'Kosovo', 85),
(41, 'JO', 'Jordan', 81),
(42, 'HR', 'Croatia', 36),
(43, 'HT', 'Haiti', 68),
(44, 'HU', 'Hungary', 70),
(45, 'HN', 'Honduras', 69),
(46, 'PR', 'Puerto Rico', 129),
(47, 'PS', 'Palestine', 121),
(48, 'PT', 'Portugal', 128),
(49, 'PY', 'Paraguay', 124),
(50, 'PA', 'Panama', 122),
(51, 'PG', 'Papua New Guinea', 123),
(52, 'PE', 'Peru', 125),
(53, 'PK', 'Pakistan', 120),
(54, 'PH', 'Philippines', 126),
(55, 'PL', 'Poland', 127),
(56, '-99', 'N. Cyprus', 109),
(57, 'ZM', 'Zambia', 175),
(58, 'EH', 'W. Sahara', 173),
(59, 'EE', 'Estonia', 50),
(60, 'EG', 'Egypt', 46),
(61, 'ZA', 'South Africa', 144),
(62, 'EC', 'Ecuador', 45),
(63, 'AL', 'Albania', 2),
(64, 'AO', 'Angola', 4),
(65, 'KZ', 'Kazakhstan', 82),
(66, 'ET', 'Ethiopia', 51),
(67, 'ZW', 'Zimbabwe', 176),
(68, 'ES', 'Spain', 145),
(69, 'ER', 'Eritrea', 49),
(70, 'ME', 'Montenegro', 105),
(71, 'MD', 'Moldova', 103),
(72, 'MG', 'Madagascar', 97),
(73, 'MA', 'Morocco', 106),
(74, 'UZ', 'Uzbekistan', 169),
(75, 'MM', 'Myanmar', 108),
(76, 'ML', 'Mali', 100),
(77, 'MN', 'Mongolia', 104),
(78, 'MK', 'Macedonia', 96),
(79, 'MW', 'Malawi', 98),
(80, 'MR', 'Mauritania', 101),
(81, 'UG', 'Uganda', 163),
(82, 'MY', 'Malaysia', 99),
(83, 'MX', 'Mexico', 102),
(84, 'VU', 'Vanuatu', 170),
(85, 'FR', 'France', 56),
(86, 'FI', 'Finland', 54),
(87, 'FJ', 'Fiji', 53),
(88, 'FK', 'Falkland Is.', 52),
(89, 'NI', 'Nicaragua', 115),
(90, 'NL', 'Netherlands', 112),
(91, 'NO', 'Norway', 118),
(92, 'NA', 'Namibia', 110),
(93, 'NC', 'New Caledonia', 113),
(94, 'NE', 'Niger', 116),
(95, 'NG', 'Nigeria', 117),
(96, 'NZ', 'New Zealand', 114),
(97, 'NP', 'Nepal', 111),
(98, 'CI', 'C', 35),
(99, 'CH', 'Switzerland', 151),
(100, 'CO', 'Colombia', 32),
(101, 'CN', 'China', 31),
(102, 'CM', 'Cameroon', 26),
(103, 'CL', 'Chile', 30),
(104, 'CA', 'Canada', 27),
(105, 'CG', 'Congo', 33),
(106, 'CF', 'Central African Rep.', 28),
(107, 'CD', 'Dem. Rep. Congo', 40),
(108, 'CZ', 'Czech Rep.', 39),
(109, 'CY', 'Cyprus', 38),
(110, 'CR', 'Costa Rica', 34),
(111, 'CU', 'Cuba', 37),
(112, 'SZ', 'Swaziland', 149),
(113, 'SY', 'Syria', 152),
(114, 'KG', 'Kyrgyzstan', 87),
(115, 'KE', 'Kenya', 83),
(116, 'SS', 'S. Sudan', 134),
(117, 'SR', 'Suriname', 148),
(118, 'KH', 'Cambodia', 25),
(119, 'SV', 'El Salvador', 47),
(120, 'SK', 'Slovakia', 139),
(121, 'KR', 'Korea', 84),
(122, 'SI', 'Slovenia', 140),
(123, 'KP', 'Dem. Rep. Korea', 41),
(124, 'SO', 'Somalia', 142),
(125, 'SN', 'Senegal', 136),
(126, 'SL', 'Sierra Leone', 138),
(127, 'SB', 'Solomon Is.', 141),
(128, 'SA', 'Saudi Arabia', 135),
(129, 'SE', 'Sweden', 150),
(130, 'SD', 'Sudan', 147),
(131, 'DO', 'Dominican Rep.', 44),
(132, 'DJ', 'Djibouti', 43),
(133, 'DK', 'Denmark', 42),
(134, 'DE', 'Germany', 60),
(135, 'YE', 'Yemen', 174),
(136, 'AT', 'Austria', 8),
(137, 'DZ', 'Algeria', 3),
(138, 'US', 'United States', 167),
(139, 'LV', 'Latvia', 89),
(140, 'UY', 'Uruguay', 168),
(141, 'LB', 'Lebanon', 90),
(142, 'LA', 'Lao PDR', 88),
(143, 'TW', 'Taiwan', 153),
(144, 'TT', 'Trinidad and Tobago', 159),
(145, 'TR', 'Turkey', 161),
(146, 'LK', 'Sri Lanka', 146),
(147, 'TN', 'Tunisia', 160),
(148, 'TL', 'Timor-Leste', 157),
(149, 'TM', 'Turkmenistan', 162),
(150, 'TJ', 'Tajikistan', 154),
(151, 'LS', 'Lesotho', 91),
(152, 'TH', 'Thailand', 156),
(153, 'TF', 'Fr. S. Antarctic Lands', 55),
(154, 'TG', 'Togo', 158),
(155, 'TD', 'Chad', 29),
(156, 'LY', 'Libya', 93),
(157, 'AE', 'United Arab Emirates', 165),
(158, 'VE', 'Venezuela', 171),
(159, 'AF', 'Afghanistan', 1),
(160, 'IQ', 'Iraq', 75),
(161, 'IS', 'Iceland', 71),
(162, 'IR', 'Iran', 74),
(163, 'AM', 'Armenia', 6),
(164, 'IT', 'Italy', 78),
(165, 'VN', 'Vietnam', 172),
(166, 'AR', 'Argentina', 5),
(167, 'AU', 'Australia', 7),
(168, 'IL', 'Israel', 77),
(169, 'IN', 'India', 72),
(170, 'TZ', 'Tanzania', 155),
(171, 'AZ', 'Azerbaijan', 9),
(172, 'IE', 'Ireland', 76),
(173, 'ID', 'Indonesia', 73),
(174, 'UA', 'Ukraine', 164),
(175, 'QA', 'Qatar', 130),
(176, 'MZ', 'Mozambique', 107);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `campaign_id` int(2) NOT NULL DEFAULT '0',
  `coupon_code` varchar(10) NOT NULL DEFAULT '',
  `value` int(3) DEFAULT NULL,
  `is-percentage` int(1) DEFAULT NULL,
  `use-once` int(1) DEFAULT NULL,
  `is-used` int(1) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `every_product` int(1) DEFAULT NULL,
  `start` varchar(16) DEFAULT NULL,
  `expiry` varchar(16) DEFAULT NULL,
  `condition` varchar(220) DEFAULT NULL,
  `coupon_redeemed` int(1) DEFAULT NULL,
  `coupon_date_redeemed` varchar(19) DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`campaign_id`,`coupon_code`),
  KEY `campaign_id` (`campaign_id`),
  KEY `coupon_code` (`coupon_code`),
  KEY `coupon_code_2` (`coupon_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE IF NOT EXISTS `deal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `deal_number` varchar(15) NOT NULL,
  `deal_price` double NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`id`, `product_id`, `deal_number`, `deal_price`) VALUES
(1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `tracking_number` varchar(50) NOT NULL,
  `dispatch_date` datetime NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `delivery_address` varchar(200) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `delivery_notes` varchar(500) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  KEY `courier_id` (`courier_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `shop_id`, `courier_id`, `purchase_id`, `tracking_number`, `dispatch_date`, `customer_name`, `delivery_address`, `contact_number`, `delivery_notes`) VALUES
(1, 1, 2, 2, '', '0000-00-00 00:00:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `import_paypal`
--

CREATE TABLE IF NOT EXISTS `import_paypal` (
  `shop_id` int(11) NOT NULL,
  `Date` varchar(9) DEFAULT NULL,
  `Time` varchar(8) DEFAULT NULL,
  `Time Zone` varchar(3) DEFAULT NULL,
  `Name` varchar(41) DEFAULT NULL,
  `Type` varchar(40) DEFAULT NULL,
  `Status` varchar(23) DEFAULT NULL,
  `Currency` varchar(3) DEFAULT NULL,
  `Gross` varchar(9) DEFAULT NULL,
  `Fee` varchar(4) DEFAULT NULL,
  `Net` varchar(9) DEFAULT NULL,
  `From Email Address` varchar(42) DEFAULT NULL,
  `To Email Address` varchar(25) DEFAULT NULL,
  `Transaction ID` varchar(17) NOT NULL DEFAULT '',
  `Counterparty Status` varchar(21) DEFAULT NULL,
  `Address Status` varchar(9) DEFAULT NULL,
  `Item Title` varchar(76) DEFAULT NULL,
  `Item ID` varchar(7) DEFAULT NULL,
  `Postage and Packaging Amount` varchar(1) DEFAULT NULL,
  `Insurance Amount` varchar(1) DEFAULT NULL,
  `VAT` varchar(1) DEFAULT NULL,
  `Option 1 Name` varchar(10) DEFAULT NULL,
  `Option 1 Value` varchar(10) DEFAULT NULL,
  `Option 2 Name` varchar(10) DEFAULT NULL,
  `Option 2 Value` varchar(10) DEFAULT NULL,
  `Auction Site` varchar(4) DEFAULT NULL,
  `Buyer ID` varchar(21) DEFAULT NULL,
  `Item URL` varchar(65) DEFAULT NULL,
  `Closing Date` varchar(9) DEFAULT NULL,
  `Reference Txn ID` varchar(17) DEFAULT NULL,
  `Invoice Number` varchar(10) DEFAULT NULL,
  `Custom Number` varchar(11) DEFAULT NULL,
  `Receipt ID` varchar(19) DEFAULT NULL,
  `Balance` varchar(8) DEFAULT NULL,
  `Address Line 1` varchar(33) DEFAULT NULL,
  `Address Line 2/District/Neighbourhood` varchar(40) DEFAULT NULL,
  `Town/City` varchar(19) DEFAULT NULL,
  `State/Province/Region/County/Territory/Prefecture/Republic` varchar(15) DEFAULT NULL,
  `Postcode` varchar(8) DEFAULT NULL,
  `Country` varchar(14) DEFAULT NULL,
  `Contact Phone Number` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`shop_id`,`Transaction ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_type_id` int(11) NOT NULL DEFAULT '0',
  `note` varchar(255) DEFAULT NULL,
  `parent_note_id` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(11) NOT NULL DEFAULT '1',
  `edited_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired` tinyint(1) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  KEY `note_type_id` (`note_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `note_type`
--

CREATE TABLE IF NOT EXISTS `note_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `note_type`
--

INSERT INTO `note_type` (`id`, `type`, `sort_order`) VALUES
(1, 'General Feedback', 1),
(2, 'Faulty Product', 2),
(3, 'Request Enhance', 3);

-- --------------------------------------------------------

--
-- Table structure for table `opancart_info`
--

CREATE TABLE IF NOT EXISTS `opancart_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `database` varchar(100) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organization_id` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `opancart_info`
--

INSERT INTO `opancart_info` (`id`, `organization_id`, `driver`, `hostname`, `username`, `password`, `database`, `prefix`) VALUES
(1, 1, 'mysqli', 'localhost', 'sean3691_mysql', 'test', 'sean3691_v3', 'atm_');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(100) NOT NULL,
  `long_name` varchar(256) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `short_name`, `long_name`) VALUES
(1, 'Zingy Tec', 'Zingy Tec');

-- --------------------------------------------------------

--
-- Table structure for table `redemption_item`
--

CREATE TABLE IF NOT EXISTS `redemption_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `redemption_report_id` int(11) NOT NULL,
  `merchant_name` varchar(100) NOT NULL,
  `coupon_code` varchar(10) NOT NULL,
  `coupon_value` double NOT NULL,
  `dealer_commission` double NOT NULL,
  `invoice_amount` double NOT NULL,
  `tracking_number` varchar(50) NOT NULL,
  `courier_name` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `delivery_postcode` varchar(250) NOT NULL,
  `dispatch_date` datetime NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `redemption_report_id` (`redemption_report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `redemption_report`
--

CREATE TABLE IF NOT EXISTS `redemption_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_provider_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `payment_made` tinyint(1) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `payment_account_id` int(11) NOT NULL,
  `payment_verified_by_id` int(11) NOT NULL,
  `report_csv_file` varchar(100) NOT NULL,
  `redemption_date` datetime NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `deal_provider_id` (`deal_provider_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smtp_info`
--

CREATE TABLE IF NOT EXISTS `smtp_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `host` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organization_id` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `smtp_info`
--

INSERT INTO `smtp_info` (`id`, `organization_id`, `host`, `port`, `username`, `password`) VALUES
(1, 1, 'smtp.zingytec.com', '25', 'care@zingytec.com', '21ngmhr45Y$');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`deal_provider_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `communication`
--
ALTER TABLE `communication`
  ADD CONSTRAINT `communication_ibfk_2` FOREIGN KEY (`communication_type_id`) REFERENCES `communication_type` (`id`),
  ADD CONSTRAINT `communication_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`),		
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`company_type_id`) REFERENCES `company_type` (`id`);

--
-- Constraints for table `company_backoffice`
--
ALTER TABLE `company_backoffice`
  ADD CONSTRAINT `company_backoffice_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`courier_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `import_paypal`
--
ALTER TABLE `import_paypal`
  ADD CONSTRAINT `import_paypal_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`note_type_id`) REFERENCES `note_type` (`id`);

--
-- Constraints for table `opancart_info`
--
ALTER TABLE `opancart_info`
  ADD CONSTRAINT `opancart_info_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`);

--
-- Constraints for table `redemption_item`
--
ALTER TABLE `redemption_item`
  ADD CONSTRAINT `redemption_item_ibfk_1` FOREIGN KEY (`redemption_report_id`) REFERENCES `redemption_report` (`id`);

--
-- Constraints for table `redemption_report`
--
ALTER TABLE `redemption_report`
  ADD CONSTRAINT `redemption_report_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `redemption_report_ibfk_1` FOREIGN KEY (`deal_provider_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `smtp_info`
--
ALTER TABLE `smtp_info`
  ADD CONSTRAINT `smtp_info_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`);

-- remove before handing over to 3rd party
UPDATE opancart_info set password = 'mysql@147' where id = 1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;