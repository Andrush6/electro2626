-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2015. Jan 18. 15:46
-- Szerver verzió: 5.5.40-0ubuntu0.14.04.1
-- PHP verzió: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `electro`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'TV-k', NULL),
(2, 'Konzolok', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `tel` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- A tábla adatainak kiíratása `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `tel`) VALUES
(1, 'Teszt Elek', 'teszt@elek.hu', 'Sirály utca 6.', '06201234567'),
(2, 'Teszt Elek', 'megintteszt@elek.hu', 'Sirály utca 6.', '06201234567'),
(3, 'Teszt Elek', 'teszt@elek.hu', 'Sirály utca 6.', '06203154562'),
(4, 'Teszt Elek', 'teszt@elek.hu', 'Sirály utca 6.', '06203154562');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_datas` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_datas`) VALUES
(1, 3, '[{"product_id":7,"quantity":1,"price":"120000"},{"product_id":2,"quantity":1,"price":"138000"}]'),
(2, 4, '[{"product_id":7,"quantity":1,"price":"120000"},{"product_id":2,"quantity":1,"price":"138000"}]'),
(3, 5, '[{"product_id":7,"quantity":1,"price":"120000"},{"product_id":2,"quantity":1,"price":"138000"}]'),
(4, 6, '[{"product_id":7,"quantity":1,"price":"120000"},{"product_id":2,"quantity":1,"price":"138000"}]'),
(5, 7, '[{"product_id":7,"quantity":1,"price":"120000"},{"product_id":2,"quantity":1,"price":"138000"}]'),
(6, 8, '[{"product_id":1,"quantity":1,"price":"120000"}]');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `manufacturer` text COLLATE utf8_bin NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `image` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `category_id`, `manufacturer`, `type`, `price`, `description`, `quantity`, `status`, `image`) VALUES
(1, 1, 'LG', '40LB650V1', 120000, '102cm-es SMART 3D LED TV.', 20, 1, NULL),
(2, 1, 'LG', '42LB671V1', 138000, '107cm-es SMART 3D LED TV.', 15, 1, NULL),
(3, 2, 'Sony', 'Playstation 4 (Jet Black)', 124000, 'Next gen Sony játékkonzol.', 60, 1, NULL),
(4, 2, 'Microsoft', 'Xbox ONE', 130000, 'Next gen konzol a Microsofttól.', 0, 1, NULL),
(7, 1, 'Sony', 'Bravia', 120000, 'Sony smart TV', 10, 1, 'images/sony_bravia.jpg'),
(8, 2, 'Sony', 'Playstation 3', 90000, 'Sony Playstation 3 jatÃ©kkonzol', 50, 1, 'images/sony_ps_3.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
