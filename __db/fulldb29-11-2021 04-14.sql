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
  `product_size` varchar(255) DEFAULT NULL,
  `product_weight` varchar(255) DEFAULT NULL,
  `product_height` varchar(255) DEFAULT NULL,
  `product_width` varchar(255) DEFAULT NULL,
  `product_length` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product` (`ID`, `product_sku`, `product_name`, `product_price`, `product_type`, `product_size`, `product_weight`, `product_height`, `product_width`, `product_length`) VALUES
(2,	'4599283427742',	'Iusto fugit consectetur ducimus.',	137.56,	1,	'1500',	NULL,	NULL,	NULL,	NULL),
(3,	'1863159332540',	'Nesciunt qui natus atque.',	59.88,	3,	NULL,	NULL,	'11',	'5',	'11'),
(4,	'3499636424729',	'Repellendus unde asperiores voluptatem facere.',	202.00,	1,	'800',	NULL,	NULL,	NULL,	NULL),
(5,	'5312862829503',	'Eos dolorem ut quas.',	171.47,	2,	NULL,	'1',	NULL,	NULL,	NULL),
(6,	'8016696705169',	'Consectetur fuga adipisci nam.',	2.38,	2,	NULL,	'2',	NULL,	NULL,	NULL),
(7,	'4832125356528',	'Occaecati pariatur ad aut.',	16.00,	3,	NULL,	NULL,	'3',	'6',	'9'),
(8,	'6543961064499',	'Sint maiores et asperiores.',	993.81,	1,	'250',	NULL,	NULL,	NULL,	NULL),
(15,	'SKU001',	'NAME001',	666.00,	3,	NULL,	NULL,	'9',	'9',	'9');

-- 2021-12-11 06:26:30
