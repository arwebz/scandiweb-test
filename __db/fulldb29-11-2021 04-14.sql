-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_sku` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float(50,2) NOT NULL,
  `product_type` int(3) NOT NULL,
  `product_attribute` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product` (`ID`, `product_sku`, `product_name`, `product_price`, `product_type`, `product_attribute`) VALUES
(1,	'7272097737142',	'Ad aut.',	310.07,	3,	'10x20x30'),
(2,	'4599283427742',	'Iusto fugit consectetur ducimus.',	137.56,	1,	'1500'),
(3,	'1863159332540',	'Nesciunt qui natus atque.',	59.88,	3,	'11x5x11'),
(4,	'3499636424729',	'Repellendus unde asperiores voluptatem facere.',	202.00,	1,	'800'),
(5,	'5312862829503',	'Eos dolorem ut quas.',	171.47,	2,	'1'),
(6,	'8016696705169',	'Consectetur fuga adipisci nam.',	2.38,	2,	'2'),
(7,	'4832125356528',	'Occaecati pariatur ad aut.',	16.00,	3,	'3x6x9'),
(8,	'6543961064499',	'Sint maiores et asperiores.',	993.81,	1,	'250'),
(9,	'7018884640895',	'Quas id nihil voluptate possimus.',	137.87,	1,	'666'),
(10,	'1776678742304',	'Nam molestiae incidunt adipisci alias.',	15.00,	1,	'999');

-- 2021-11-30 05:50:06
