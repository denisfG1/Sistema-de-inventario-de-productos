-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-09-2022 a las 16:59:21
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id_inventory` int(11) NOT NULL AUTO_INCREMENT,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `id_product` int(11) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `entries` int(11) NOT NULL,
  `outlets` int(11) NOT NULL,
  PRIMARY KEY (`id_inventory`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventory`
--

INSERT INTO `inventory` (`id_inventory`, `date_in`, `date_out`, `id_product`, `stock_in`, `entries`, `outlets`) VALUES
(2, '2021-01-31', '2022-01-18', 45, 1000, 500, 1400),
(3, '2021-01-31', '2022-01-18', 45, 1000, 500, 1400),
(4, '2022-08-10', '2022-09-24', 45, 700, 900, 500);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
