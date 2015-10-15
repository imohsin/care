-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 12:48 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `address1` varchar(49) NOT NULL,
  `address2` varchar(49) DEFAULT NULL,
  `city` varchar(49) NOT NULL,
  `state` varchar(49) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `country_id` int(11) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `company_id`, `address1`, `address2`, `city`, `state`, `zip`, `country_id`, `expired`) VALUES
(1, 17, 'Seal House', '1 Swan Lane', 'Longon', '', 'EC4R 3TN', 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `bank_type_id` int(11) NOT NULL,
  `name` varchar(49) NOT NULL,
  `description` varchar(49) DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `organization_id`, `company_id`, `bank_type_id`, `name`, `description`, `expired`) VALUES
(1, 2, 24, 1, '03730565', ' WeRTech Savings Acc', 0),
(2, 2, 24, 1, '83695662', ' WeRTech Current Acc', 0),
(3, 1, 11, 1, '93319857', 'B3 Corp Current Acc', 0),
(4, 1, 11, 1, '93419657', 'B3 Corp Savings Acc', 0),
(5, 1, 14, 2, 'maimuna_78692110', NULL, 0),
(6, 1, 15, 2, 'Mashhood_smh14', NULL, 0),
(7, 1, 16, 2, 'tara', NULL, 0),
(8, 1, 17, 2, 'sania_zoya', NULL, 0),
(9, 1, 18, 2, 'iStarz_Bullet ', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank_type`
--

CREATE TABLE IF NOT EXISTS `bank_type` (
  `id` int(11) NOT NULL,
  `type` varchar(49) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_type`
--

INSERT INTO `bank_type` (`id`, `type`, `expired`) VALUES
(1, 'Barclays', 0),
(2, 'PayPal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE IF NOT EXISTS `campaign` (
  `id` int(11) NOT NULL,
  `deal_provider_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `campaign_reference` varchar(49) NOT NULL,
  `campaign_start_date` datetime NOT NULL,
  `campaign_end_date` datetime NOT NULL,
  `deal_provider_commission` decimal(10,2) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `deal_provider_id`, `shop_id`, `campaign_reference`, `campaign_start_date`, `campaign_end_date`, `deal_provider_commission`, `expired`) VALUES
(1, 2, 1, 'Campaign 20111210 - Mattress (Gumtree)', '2011-12-07 00:00:00', '2011-12-10 23:59:59', '30.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `communication`
--

CREATE TABLE IF NOT EXISTS `communication` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `communication_type_id` int(11) NOT NULL,
  `value` varchar(40) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `communication`
--

INSERT INTO `communication` (`id`, `contact_id`, `communication_type_id`, `value`, `expired`) VALUES
(1, 6, 1, 'goodspartnermgmt@groupon.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `communication_type`
--

CREATE TABLE IF NOT EXISTS `communication_type` (
  `id` int(11) NOT NULL,
  `name` varchar(49) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `communication_type`
--

INSERT INTO `communication_type` (`id`, `name`, `expired`) VALUES
(1, 'Email', 0),
(2, 'Mobile', 0),
(3, 'Office', 0),
(4, 'Fax', 0),
(5, 'Home', 0),
(6, 'Other', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `company_type_id` int(11) NOT NULL,
  `name` varchar(49) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `organization_id`, `company_type_id`, `name`, `expired`) VALUES
(1, 1, 1, 'Maimuna @ EBay', 0),
(2, 1, 1, 'Mashhood @ EBay', 0),
(3, 1, 1, 'Tara @ EBay', 0),
(4, 1, 1, 'Sania Zoya @ EBay', 0),
(5, 1, 1, 'iStarz Bullet @ EBay', 0),
(6, 1, 2, 'Go Groopie', 0),
(7, 1, 2, 'Groupon UK', 0),
(8, 1, 2, 'Groupon Ireland', 0),
(9, 1, 2, 'Living Social', 0),
(10, 1, 2, 'Tap4Deals', 0),
(11, 1, 3, 'Barclays', 0),
(12, 1, 3, 'PayPal', 0),
(13, 1, 4, 'Royal Mail', 0),
(14, 2, 1, 'Maimuna @ EBay', 0),
(15, 2, 1, 'Mashhood @ EBay', 0),
(16, 2, 1, 'Tara @ EBay', 0),
(17, 2, 1, 'Sania Zoya @ EBay', 0),
(18, 2, 1, 'iStarz Bullet @ EBay', 0),
(19, 2, 2, 'Go Groopie', 0),
(20, 2, 2, 'Groupon UK', 0),
(21, 2, 2, 'Groupon Ireland', 0),
(22, 2, 2, 'Living Social', 0),
(23, 2, 2, 'Tap4Deals', 0),
(24, 2, 3, 'Barclays', 0),
(25, 2, 3, 'PayPal', 0),
(26, 2, 4, 'Royal Mail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_backoffice`
--

CREATE TABLE IF NOT EXISTS `company_backoffice` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `username` varchar(49) NOT NULL,
  `password` varchar(49) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_backoffice`
--

INSERT INTO `company_backoffice` (`id`, `company_id`, `url`, `username`, `password`, `expired`) VALUES
(1, 1, 'http://www.tnt.com/', 'test', 'test', 0),
(2, 2, 'http://www.lmrhome.com/', 'test', 'test', 0),
(3, 3, 'http://www.nightfreight.co.uk/', 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE IF NOT EXISTS `company_type` (
  `id` int(11) NOT NULL,
  `type` varchar(49) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`id`, `type`, `expired`) VALUES
(1, 'Ebay Shop', 0),
(2, 'Deal Provider', 0),
(3, 'Payment Provider', 0),
(4, 'Courier', 0),
(5, 'OpenCart Shop', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(49) NOT NULL,
  `job_title` varchar(49) DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `company_id`, `name`, `job_title`, `expired`) VALUES
(1, 2, 'Indy Mukherjee', 'Deal Manager', 0),
(2, 1, 'Jessica Cooper', 'Online Shop Manager', 0),
(3, 1, 'Iain Mcdonald', 'Deal Manager', 0),
(4, 1, 'Claire Roach', 'Online Shop Manager', 0),
(5, 3, 'Rebecca Walsh', 'Online Shop Manager', 0),
(6, 17, 'Robert Jongstra', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(49) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`, `sort_order`, `expired`) VALUES
(1, 'BD', 'Bangladesh', 11, 0),
(2, 'BE', 'Belgium', 13, 0),
(3, 'BF', 'Burkina Faso', 23, 0),
(4, 'BG', 'Bulgaria', 22, 0),
(5, 'BA', 'Bosnia and Herz.', 18, 0),
(6, 'BN', 'Brunei', 21, 0),
(7, 'BO', 'Bolivia', 17, 0),
(8, 'JP', 'Japan', 80, 0),
(9, 'BI', 'Burundi', 24, 0),
(10, 'BJ', 'Benin', 15, 0),
(11, 'BT', 'Bhutan', 16, 0),
(12, 'JM', 'Jamaica', 79, 0),
(13, 'BW', 'Botswana', 19, 0),
(14, 'BR', 'Brazil', 20, 0),
(15, 'BS', 'Bahamas', 10, 0),
(16, 'BY', 'Belarus', 12, 0),
(17, 'BZ', 'Belize', 14, 0),
(18, 'RU', 'Russia', 132, 0),
(19, 'RW', 'Rwanda', 133, 0),
(20, 'RS', 'Serbia', 137, 0),
(21, 'LT', 'Lithuania', 94, 0),
(22, 'LU', 'Luxembourg', 95, 0),
(23, 'LR', 'Liberia', 92, 0),
(24, 'RO', 'Romania', 131, 0),
(25, 'GW', 'Guinea-Bissau', 66, 0),
(26, 'GT', 'Guatemala', 64, 0),
(27, 'GR', 'Greece', 62, 0),
(28, 'GQ', 'Eq. Guinea', 48, 0),
(29, 'GY', 'Guyana', 67, 0),
(30, 'GE', 'Georgia', 59, 0),
(31, 'GB', 'United Kingdom', 166, 0),
(32, 'GA', 'Gabon', 57, 0),
(33, 'GN', 'Guinea', 65, 0),
(34, 'GM', 'Gambia', 58, 0),
(35, 'GL', 'Greenland', 63, 0),
(36, 'KW', 'Kuwait', 86, 0),
(37, 'GH', 'Ghana', 61, 0),
(38, 'OM', 'Oman', 119, 0),
(39, '_1', 'Somaliland', 143, 0),
(40, '_0', 'Kosovo', 85, 0),
(41, 'JO', 'Jordan', 81, 0),
(42, 'HR', 'Croatia', 36, 0),
(43, 'HT', 'Haiti', 68, 0),
(44, 'HU', 'Hungary', 70, 0),
(45, 'HN', 'Honduras', 69, 0),
(46, 'PR', 'Puerto Rico', 129, 0),
(47, 'PS', 'Palestine', 121, 0),
(48, 'PT', 'Portugal', 128, 0),
(49, 'PY', 'Paraguay', 124, 0),
(50, 'PA', 'Panama', 122, 0),
(51, 'PG', 'Papua New Guinea', 123, 0),
(52, 'PE', 'Peru', 125, 0),
(53, 'PK', 'Pakistan', 120, 0),
(54, 'PH', 'Philippines', 126, 0),
(55, 'PL', 'Poland', 127, 0),
(56, '-99', 'N. Cyprus', 109, 0),
(57, 'ZM', 'Zambia', 175, 0),
(58, 'EH', 'W. Sahara', 173, 0),
(59, 'EE', 'Estonia', 50, 0),
(60, 'EG', 'Egypt', 46, 0),
(61, 'ZA', 'South Africa', 144, 0),
(62, 'EC', 'Ecuador', 45, 0),
(63, 'AL', 'Albania', 2, 0),
(64, 'AO', 'Angola', 4, 0),
(65, 'KZ', 'Kazakhstan', 82, 0),
(66, 'ET', 'Ethiopia', 51, 0),
(67, 'ZW', 'Zimbabwe', 176, 0),
(68, 'ES', 'Spain', 145, 0),
(69, 'ER', 'Eritrea', 49, 0),
(70, 'ME', 'Montenegro', 105, 0),
(71, 'MD', 'Moldova', 103, 0),
(72, 'MG', 'Madagascar', 97, 0),
(73, 'MA', 'Morocco', 106, 0),
(74, 'UZ', 'Uzbekistan', 169, 0),
(75, 'MM', 'Myanmar', 108, 0),
(76, 'ML', 'Mali', 100, 0),
(77, 'MN', 'Mongolia', 104, 0),
(78, 'MK', 'Macedonia', 96, 0),
(79, 'MW', 'Malawi', 98, 0),
(80, 'MR', 'Mauritania', 101, 0),
(81, 'UG', 'Uganda', 163, 0),
(82, 'MY', 'Malaysia', 99, 0),
(83, 'MX', 'Mexico', 102, 0),
(84, 'VU', 'Vanuatu', 170, 0),
(85, 'FR', 'France', 56, 0),
(86, 'FI', 'Finland', 54, 0),
(87, 'FJ', 'Fiji', 53, 0),
(88, 'FK', 'Falkland Is.', 52, 0),
(89, 'NI', 'Nicaragua', 115, 0),
(90, 'NL', 'Netherlands', 112, 0),
(91, 'NO', 'Norway', 118, 0),
(92, 'NA', 'Namibia', 110, 0),
(93, 'NC', 'New Caledonia', 113, 0),
(94, 'NE', 'Niger', 116, 0),
(95, 'NG', 'Nigeria', 117, 0),
(96, 'NZ', 'New Zealand', 114, 0),
(97, 'NP', 'Nepal', 111, 0),
(98, 'CI', 'C', 35, 0),
(99, 'CH', 'Switzerland', 151, 0),
(100, 'CO', 'Colombia', 32, 0),
(101, 'CN', 'China', 31, 0),
(102, 'CM', 'Cameroon', 26, 0),
(103, 'CL', 'Chile', 30, 0),
(104, 'CA', 'Canada', 27, 0),
(105, 'CG', 'Congo', 33, 0),
(106, 'CF', 'Central African Rep.', 28, 0),
(107, 'CD', 'Dem. Rep. Congo', 40, 0),
(108, 'CZ', 'Czech Rep.', 39, 0),
(109, 'CY', 'Cyprus', 38, 0),
(110, 'CR', 'Costa Rica', 34, 0),
(111, 'CU', 'Cuba', 37, 0),
(112, 'SZ', 'Swaziland', 149, 0),
(113, 'SY', 'Syria', 152, 0),
(114, 'KG', 'Kyrgyzstan', 87, 0),
(115, 'KE', 'Kenya', 83, 0),
(116, 'SS', 'S. Sudan', 134, 0),
(117, 'SR', 'Suriname', 148, 0),
(118, 'KH', 'Cambodia', 25, 0),
(119, 'SV', 'El Salvador', 47, 0),
(120, 'SK', 'Slovakia', 139, 0),
(121, 'KR', 'Korea', 84, 0),
(122, 'SI', 'Slovenia', 140, 0),
(123, 'KP', 'Dem. Rep. Korea', 41, 0),
(124, 'SO', 'Somalia', 142, 0),
(125, 'SN', 'Senegal', 136, 0),
(126, 'SL', 'Sierra Leone', 138, 0),
(127, 'SB', 'Solomon Is.', 141, 0),
(128, 'SA', 'Saudi Arabia', 135, 0),
(129, 'SE', 'Sweden', 150, 0),
(130, 'SD', 'Sudan', 147, 0),
(131, 'DO', 'Dominican Rep.', 44, 0),
(132, 'DJ', 'Djibouti', 43, 0),
(133, 'DK', 'Denmark', 42, 0),
(134, 'DE', 'Germany', 60, 0),
(135, 'YE', 'Yemen', 174, 0),
(136, 'AT', 'Austria', 8, 0),
(137, 'DZ', 'Algeria', 3, 0),
(138, 'US', 'United States', 167, 0),
(139, 'LV', 'Latvia', 89, 0),
(140, 'UY', 'Uruguay', 168, 0),
(141, 'LB', 'Lebanon', 90, 0),
(142, 'LA', 'Lao PDR', 88, 0),
(143, 'TW', 'Taiwan', 153, 0),
(144, 'TT', 'Trinidad and Tobago', 159, 0),
(145, 'TR', 'Turkey', 161, 0),
(146, 'LK', 'Sri Lanka', 146, 0),
(147, 'TN', 'Tunisia', 160, 0),
(148, 'TL', 'Timor-Leste', 157, 0),
(149, 'TM', 'Turkmenistan', 162, 0),
(150, 'TJ', 'Tajikistan', 154, 0),
(151, 'LS', 'Lesotho', 91, 0),
(152, 'TH', 'Thailand', 156, 0),
(153, 'TF', 'Fr. S. Antarctic Lands', 55, 0),
(154, 'TG', 'Togo', 158, 0),
(155, 'TD', 'Chad', 29, 0),
(156, 'LY', 'Libya', 93, 0),
(157, 'AE', 'United Arab Emirates', 165, 0),
(158, 'VE', 'Venezuela', 171, 0),
(159, 'AF', 'Afghanistan', 1, 0),
(160, 'IQ', 'Iraq', 75, 0),
(161, 'IS', 'Iceland', 71, 0),
(162, 'IR', 'Iran', 74, 0),
(163, 'AM', 'Armenia', 6, 0),
(164, 'IT', 'Italy', 78, 0),
(165, 'VN', 'Vietnam', 172, 0),
(166, 'AR', 'Argentina', 5, 0),
(167, 'AU', 'Australia', 7, 0),
(168, 'IL', 'Israel', 77, 0),
(169, 'IN', 'India', 72, 0),
(170, 'TZ', 'Tanzania', 155, 0),
(171, 'AZ', 'Azerbaijan', 9, 0),
(172, 'IE', 'Ireland', 76, 0),
(173, 'ID', 'Indonesia', 73, 0),
(174, 'UA', 'Ukraine', 164, 0),
(175, 'QA', 'Qatar', 130, 0),
(176, 'MZ', 'Mozambique', 107, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `campaign_id` int(2) NOT NULL DEFAULT '0',
  `coupon_code` varchar(10) NOT NULL DEFAULT '',
  `value` int(3) DEFAULT NULL,
  `is_percentage` int(1) DEFAULT NULL,
  `use_once` int(1) DEFAULT NULL,
  `is_used` int(1) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `every_product` int(1) DEFAULT NULL,
  `start` varchar(16) DEFAULT NULL,
  `expiry` varchar(16) DEFAULT NULL,
  `condition` varchar(220) DEFAULT NULL,
  `coupon_redeemed` int(1) DEFAULT NULL,
  `coupon_date_redeemed` varchar(19) DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE IF NOT EXISTS `deal` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `deal_number` varchar(15) NOT NULL,
  `deal_price` double NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`id`, `company_id`, `product_id`, `deal_number`, `deal_price`, `expired`) VALUES
(1, 0, 1, '1', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deal_provider`
--

CREATE TABLE IF NOT EXISTS `deal_provider` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `deal_provider_type_id` int(11) NOT NULL,
  `name` varchar(49) NOT NULL,
  `description` varchar(49) DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deal_provider`
--

INSERT INTO `deal_provider` (`id`, `organization_id`, `company_id`, `deal_provider_type_id`, `name`, `description`, `expired`) VALUES
(1, 1, 6, 1, 'Go Groopie', NULL, 0),
(2, 1, 7, 2, 'Groupon UK', NULL, 0),
(3, 1, 8, 3, 'Groupon Ireland', NULL, 0),
(4, 1, 9, 4, 'Living Social', NULL, 0),
(5, 1, 10, 5, 'Tap4Deals', NULL, 0),
(6, 2, 19, 1, 'Go Groopie', NULL, 0),
(7, 2, 20, 2, 'Groupon UK', NULL, 0),
(8, 2, 21, 3, 'Groupon Ireland', NULL, 0),
(9, 2, 22, 4, 'Living Social ', NULL, 0),
(10, 2, 23, 5, 'Tap4Deals', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deal_provider_type`
--

CREATE TABLE IF NOT EXISTS `deal_provider_type` (
  `id` int(11) NOT NULL,
  `type` varchar(49) NOT NULL,
  `table` varchar(20) DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deal_provider_type`
--

INSERT INTO `deal_provider_type` (`id`, `type`, `table`, `expired`) VALUES
(1, 'Go Groopie', 'import_go_groopie', 0),
(2, 'Groupon UK', 'import_groupon', 0),
(3, 'Groupon Ireland', 'import_groupon', 0),
(4, 'Living Social', 'import_living_social', 0),
(5, 'Tap4Deals', 'import_tap4deals', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `tracking_number` varchar(50) NOT NULL,
  `dispatch_date` datetime NOT NULL,
  `customer_name` varchar(49) NOT NULL,
  `delivery_address` varchar(200) NOT NULL,
  `contact_number` varchar(49) NOT NULL,
  `delivery_notes` varchar(500) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `shop_id`, `courier_id`, `purchase_id`, `tracking_number`, `dispatch_date`, `customer_name`, `delivery_address`, `contact_number`, `delivery_notes`, `expired`) VALUES
(1, 1, 2, 2, '', '0000-00-00 00:00:00', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_company`
--

CREATE TABLE IF NOT EXISTS `delivery_company` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `delivery_company_type_id` int(11) NOT NULL,
  `name` varchar(49) NOT NULL,
  `description` varchar(49) DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_company`
--

INSERT INTO `delivery_company` (`id`, `organization_id`, `company_id`, `delivery_company_type_id`, `name`, `description`, `expired`) VALUES
(1, 1, 13, 1, '1234567', 'Royal Mail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_company_type`
--

CREATE TABLE IF NOT EXISTS `delivery_company_type` (
  `id` int(11) NOT NULL,
  `type` varchar(49) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_company_type`
--

INSERT INTO `delivery_company_type` (`id`, `type`, `expired`) VALUES
(1, 'Royal Mail', 0),
(2, 'TNT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `import_barclays`
--

CREATE TABLE IF NOT EXISTS `import_barclays` (
  `organization_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `number` varchar(49) NOT NULL,
  `date` varchar(10) NOT NULL DEFAULT '',
  `account` varchar(20) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `subcategory` varchar(20) NOT NULL DEFAULT '',
  `memo` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `import_go_groopie`
--

CREATE TABLE IF NOT EXISTS `import_go_groopie` (
  `organization_id` int(11) NOT NULL,
  `deal_provider_id` int(11) NOT NULL,
  `Product` varchar(49) NOT NULL DEFAULT '',
  `Voucher Code` int(11) NOT NULL DEFAULT '0',
  `Deal Price` decimal(5,2) DEFAULT NULL,
  `First Name` varchar(49) DEFAULT NULL,
  `Last Name` varchar(49) DEFAULT NULL,
  `Address 1` varchar(49) DEFAULT NULL,
  `Address 2` varchar(49) DEFAULT NULL,
  `City` varchar(49) DEFAULT NULL,
  `Post code` varchar(15) DEFAULT NULL,
  `Country code` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `import_groupon`
--

CREATE TABLE IF NOT EXISTS `import_groupon` (
  `organization_id` int(11) NOT NULL,
  `deal_provider_id` int(11) NOT NULL,
  `fulfillment_line_item_id` int(11) NOT NULL DEFAULT '0',
  `groupon_number` int(11) DEFAULT NULL,
  `order_date` varchar(16) DEFAULT NULL,
  `merchant_sku_item` varchar(49) DEFAULT NULL,
  `quantity_requested` int(11) DEFAULT NULL,
  `shipment_method_requested` varchar(49) DEFAULT NULL,
  `shipment_address_name` varchar(49) DEFAULT NULL,
  `shipment_address_street` varchar(49) DEFAULT NULL,
  `shipment_address_street_2` varchar(49) DEFAULT NULL,
  `shipment_address_city` varchar(49) DEFAULT NULL,
  `shipment_address_stat` varchar(49) DEFAULT NULL,
  `shipment_address_postal_code` varchar(15) DEFAULT NULL,
  `shipment_address_country` varchar(2) DEFAULT NULL,
  `gift` varchar(49) DEFAULT NULL,
  `gift_message` varchar(49) DEFAULT NULL,
  `quantity_shipped` varchar(49) DEFAULT NULL,
  `shipment_carrier` varchar(49) DEFAULT NULL,
  `shipment_method` varchar(49) DEFAULT NULL,
  `shipment_tracking_number` varchar(49) DEFAULT NULL,
  `ship_date` varchar(49) DEFAULT NULL,
  `groupon_sku` varchar(49) DEFAULT NULL,
  `custom_field_value` varchar(49) DEFAULT NULL,
  `permalink` varchar(200) DEFAULT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `salesforce_deal_option_id` varchar(49) DEFAULT NULL,
  `groupon_cost` decimal(5,2) DEFAULT NULL,
  `billing_address_name` varchar(49) DEFAULT NULL,
  `billing_address_street` varchar(49) DEFAULT NULL,
  `billing_address_city` varchar(49) DEFAULT NULL,
  `billing_address_stat` varchar(49) DEFAULT NULL,
  `billing_address_postal_code` varchar(15) DEFAULT NULL,
  `billing_address_country` varchar(49) DEFAULT NULL,
  `purchase_order_number` varchar(49) DEFAULT NULL,
  `product_weight` decimal(5,2) DEFAULT NULL,
  `product_weight_unit` varchar(49) DEFAULT NULL,
  `product_length` decimal(5,2) DEFAULT NULL,
  `product_width` decimal(5,2) DEFAULT NULL,
  `product_height` decimal(5,2) DEFAULT NULL,
  `product_dimension_unit` varchar(49) DEFAULT NULL,
  `customer_phone` varchar(49) DEFAULT NULL,
  `incoterms` varchar(49) DEFAULT NULL,
  `hts_code` varchar(49) DEFAULT NULL,
  `3pl_name` varchar(49) DEFAULT NULL,
  `3pl_warehouse_location` varchar(49) DEFAULT NULL,
  `kitting_details` varchar(49) DEFAULT NULL,
  `sell_price` decimal(5,2) DEFAULT NULL,
  `deal_opportunity_id` int(11) DEFAULT NULL,
  `shipment_strategy` varchar(49) DEFAULT NULL,
  `fulfillment_method` varchar(49) DEFAULT NULL,
  `country_of_origin` varchar(49) DEFAULT NULL,
  `merchant_permalink` varchar(49) DEFAULT NULL,
  `feature_start_date` varchar(49) DEFAULT NULL,
  `feature_end_date` varchar(49) DEFAULT NULL,
  `bom_sku` varchar(49) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `import_living_social`
--

CREATE TABLE IF NOT EXISTS `import_living_social` (
  `organization_id` int(11) NOT NULL,
  `deal_provider_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL DEFAULT '0',
  `charged_at` varchar(49) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `name` varchar(49) DEFAULT NULL,
  `purchase_state` varchar(49) DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `voucher_code` varchar(49) DEFAULT NULL,
  `option` varchar(100) DEFAULT NULL,
  `email` varchar(49) DEFAULT NULL,
  `phone` varchar(49) DEFAULT NULL,
  `street_address_1` varchar(49) DEFAULT NULL,
  `street_address_2` varchar(49) DEFAULT NULL,
  `city` varchar(49) DEFAULT NULL,
  `state` varchar(49) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `import_paypal`
--

CREATE TABLE IF NOT EXISTS `import_paypal` (
  `organization_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `date` varchar(9) NOT NULL DEFAULT '',
  `time` varchar(8) NOT NULL DEFAULT '',
  `time_zone` varchar(3) NOT NULL DEFAULT '',
  `name` varchar(41) DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL,
  `status` varchar(23) DEFAULT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `gross` varchar(9) NOT NULL DEFAULT '',
  `fee` varchar(4) DEFAULT NULL,
  `net` varchar(9) DEFAULT NULL,
  `from_email_address` varchar(42) NOT NULL DEFAULT '',
  `to_email_address` varchar(25) DEFAULT NULL,
  `transaction_id` varchar(17) NOT NULL DEFAULT '',
  `counterparty_status` varchar(21) DEFAULT NULL,
  `address_status` varchar(9) DEFAULT NULL,
  `item_title` varchar(76) DEFAULT NULL,
  `item_id` varchar(7) DEFAULT NULL,
  `postage_and_packaging_amount` varchar(1) DEFAULT NULL,
  `insurance_amount` varchar(1) DEFAULT NULL,
  `vat` varchar(1) DEFAULT NULL,
  `option_1_name` varchar(10) DEFAULT NULL,
  `option_1_value` varchar(10) DEFAULT NULL,
  `option_2_name` varchar(10) DEFAULT NULL,
  `option_2_value` varchar(10) DEFAULT NULL,
  `auction_site` varchar(4) DEFAULT NULL,
  `buyer_id` varchar(21) DEFAULT NULL,
  `item_url` varchar(65) DEFAULT NULL,
  `closing_date` varchar(9) DEFAULT NULL,
  `escrow_id` varchar(17) DEFAULT NULL,
  `invoice_id` varchar(17) DEFAULT NULL,
  `reference_txn_id` varchar(17) DEFAULT NULL,
  `invoice_number` varchar(10) DEFAULT NULL,
  `custom_number` varchar(11) DEFAULT NULL,
  `receipt_id` varchar(19) DEFAULT NULL,
  `balance` varchar(8) DEFAULT NULL,
  `address_line_1` varchar(33) DEFAULT NULL,
  `address_line_2` varchar(40) DEFAULT NULL,
  `city` varchar(19) DEFAULT NULL,
  `state` varchar(15) DEFAULT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `country` varchar(14) DEFAULT NULL,
  `contact_phone_number` varchar(10) DEFAULT NULL,
  `tracking` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `import_tap4deals`
--

CREATE TABLE IF NOT EXISTS `import_tap4deals` (
  `organization_id` int(11) NOT NULL,
  `deal_provider_id` int(11) NOT NULL,
  `DealID` int(11) NOT NULL DEFAULT '0',
  `Leadlogid` varchar(2) DEFAULT NULL,
  `PurchaseDate` varchar(49) DEFAULT NULL,
  `RedeemedDate` varchar(49) DEFAULT NULL,
  `DealName` varchar(49) DEFAULT NULL,
  `DealDescriptionMulti` varchar(49) DEFAULT NULL,
  `Price` decimal(5,2) DEFAULT NULL,
  `Postage` int(11) DEFAULT NULL,
  `VoucherCode` varchar(49) NOT NULL DEFAULT '',
  `FirstName` varchar(49) DEFAULT NULL,
  `Surname` varchar(49) DEFAULT NULL,
  `Address1` varchar(49) DEFAULT NULL,
  `Address2` varchar(49) DEFAULT NULL,
  `Town` varchar(49) DEFAULT NULL,
  `Postcode` varchar(15) DEFAULT NULL,
  `Telephone` varchar(49) DEFAULT NULL,
  `Email` varchar(49) DEFAULT NULL,
  `Customernote` varchar(49) DEFAULT NULL,
  `DealSKU` varchar(49) DEFAULT NULL,
  `Tracking Number` varchar(49) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `import_type`
--

CREATE TABLE IF NOT EXISTS `import_type` (
  `id` int(11) NOT NULL,
  `name` varchar(49) NOT NULL,
  `table_name` varchar(49) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `import_type`
--

INSERT INTO `import_type` (`id`, `name`, `table_name`, `sort_order`, `expired`) VALUES
(1, 'Barclays', 'Barclays', 1, 0),
(2, 'PayPal', 'PayPal', 2, 0),
(3, 'Royal Mail', 'RoyalMail', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL,
  `note_type_id` int(11) NOT NULL DEFAULT '0',
  `note` varchar(255) DEFAULT NULL,
  `parent_note_id` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(11) NOT NULL DEFAULT '1',
  `edited_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired` tinyint(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `note_type`
--

CREATE TABLE IF NOT EXISTS `note_type` (
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `note_type`
--

INSERT INTO `note_type` (`id`, `type`, `sort_order`, `expired`) VALUES
(1, 'General Feedbac', 1, 0),
(2, 'Faulty Product', 2, 0),
(3, 'Request Enhance', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `opencart_info`
--

CREATE TABLE IF NOT EXISTS `opencart_info` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `driver` varchar(49) NOT NULL,
  `host` varchar(49) NOT NULL,
  `username` varchar(49) NOT NULL,
  `password` varchar(49) NOT NULL,
  `database` varchar(49) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL,
  `short_name` varchar(49) NOT NULL,
  `long_name` varchar(256) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `short_name`, `long_name`, `expired`) VALUES
(1, 'B3 Corp', 'Bing Bang Bosh Corporation', 0),
(2, 'WeRTEch', 'We Are Technology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `redemption_item`
--

CREATE TABLE IF NOT EXISTS `redemption_item` (
  `id` int(11) NOT NULL,
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
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `redemption_report`
--

CREATE TABLE IF NOT EXISTS `redemption_report` (
  `id` int(11) NOT NULL,
  `deal_provider_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `payment_made` tinyint(1) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `payment_account_id` int(11) NOT NULL,
  `payment_verified_by_id` int(11) NOT NULL,
  `report_csv_file` varchar(100) NOT NULL,
  `redemption_date` datetime NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `smtp_info`
--

CREATE TABLE IF NOT EXISTS `smtp_info` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `host` varchar(49) NOT NULL,
  `port` varchar(10) NOT NULL,
  `username` varchar(49) NOT NULL,
  `password` varchar(49) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smtp_info`
--

INSERT INTO `smtp_info` (`id`, `organization_id`, `host`, `port`, `username`, `password`, `expired`) VALUES
(1, 1, 'smtp.bingbangbosh.com', '25', 'care@bingbangbosh.com', '21ngmhr45Y$', 0),
(2, 2, 'smtp.zingytec.com', '25', 'care@zingytec.com', '21ngmhr45Y$', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(49) NOT NULL,
  `email` varchar(49) NOT NULL,
  `password` varchar(100) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `expired` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `organization_id`, `remember_token`, `updated_at`, `created_at`, `expired`) VALUES
(1, 'Imran Mohsin', 'imohsins@chmail.ir', '$2y$10$IfYmsWegKWmsozAZr94.LuLb9weB6LziEya3S7pIChFOVxnEarGGK', 1, NULL, NULL, '2015-10-09 08:12:03', 0),
(2, 'Mohsin Shah', 'mohsin.shah@gmail.com', '$2y$10$AwnvVnsnSiCERHfycfNpkeOLNnq7EAKghqIVrefRh0M9/fpTOZzAu', 1, NULL, NULL, '2015-10-09 08:12:03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `organization_id` (`organization_id`),
  ADD KEY `bank_type_id` (`bank_type_id`);

--
-- Indexes for table `bank_type`
--
ALTER TABLE `bank_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deal_provider_id` (`deal_provider_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `communication_type_id` (`communication_type_id`);

--
-- Indexes for table `communication_type`
--
ALTER TABLE `communication_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_id` (`organization_id`),
  ADD KEY `company_type_id` (`company_type_id`);

--
-- Indexes for table `company_backoffice`
--
ALTER TABLE `company_backoffice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`campaign_id`,`coupon_code`),
  ADD KEY `campaign_id` (`campaign_id`),
  ADD KEY `coupon_code` (`coupon_code`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `deal_provider`
--
ALTER TABLE `deal_provider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `organization_id` (`organization_id`),
  ADD KEY `deal_provider_type_id` (`deal_provider_type_id`);

--
-- Indexes for table `deal_provider_type`
--
ALTER TABLE `deal_provider_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `courier_id` (`courier_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `delivery_company`
--
ALTER TABLE `delivery_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `organization_id` (`organization_id`),
  ADD KEY `delivery_company_type_id` (`delivery_company_type_id`);

--
-- Indexes for table `delivery_company_type`
--
ALTER TABLE `delivery_company_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_barclays`
--
ALTER TABLE `import_barclays`
  ADD UNIQUE KEY `organization_id` (`organization_id`,`bank_id`,`date`,`account`,`amount`,`memo`);

--
-- Indexes for table `import_go_groopie`
--
ALTER TABLE `import_go_groopie`
  ADD UNIQUE KEY `organization_id` (`organization_id`,`deal_provider_id`,`Product`,`Voucher Code`,`Deal Price`,`First Name`,`Last Name`,`Address 1`,`Address 2`,`City`,`Post code`,`Country code`),
  ADD KEY `deal_provider_id` (`deal_provider_id`),
  ADD KEY `organization_id_2` (`organization_id`);

--
-- Indexes for table `import_groupon`
--
ALTER TABLE `import_groupon`
  ADD UNIQUE KEY `organization_id` (`organization_id`,`deal_provider_id`,`fulfillment_line_item_id`),
  ADD KEY `organization_id_2` (`organization_id`),
  ADD KEY `deal_provider_id` (`deal_provider_id`);

--
-- Indexes for table `import_living_social`
--
ALTER TABLE `import_living_social`
  ADD UNIQUE KEY `organization_id` (`organization_id`,`deal_provider_id`,`purchase_id`),
  ADD KEY `deal_provider_id` (`deal_provider_id`),
  ADD KEY `organization_id_2` (`organization_id`);

--
-- Indexes for table `import_paypal`
--
ALTER TABLE `import_paypal`
  ADD UNIQUE KEY `organization_id` (`organization_id`,`bank_id`,`date`,`time`,`name`,`status`,`gross`,`from_email_address`);

--
-- Indexes for table `import_tap4deals`
--
ALTER TABLE `import_tap4deals`
  ADD UNIQUE KEY `organization_id_2` (`organization_id`,`deal_provider_id`,`DealID`,`VoucherCode`,`FirstName`,`Surname`,`Address1`,`Address2`,`Town`,`Postcode`,`Telephone`,`Email`),
  ADD KEY `organization_id` (`organization_id`),
  ADD KEY `deal_provider_id` (`deal_provider_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
